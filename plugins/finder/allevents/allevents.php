<?php
defined('JPATH_BASE') or die('Restricted access');

use Joomla\Registry\Registry;

JLoader::register('FinderIndexerAdapter', JPATH_ADMINISTRATOR . '/components/com_finder/helpers/indexer/adapter.php');

/**
 * PlgFinderAllEvents : All functions need to get wrapped in class PlgFinderAllEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class PlgFinderAllEvents extends FinderIndexerAdapter
{
    /**
     * The plugin identifier.
     *
     * @var    string
     * @since  2.5
     */
    protected $context = 'AllEvents';

    /**
     * The extension name.
     *
     * @var    string
     * @since  2.5
     */
    protected $extension = 'com_allevents';

    /**
     * The sublayout to use when rendering the results.
     *
     * @var    string
     * @since  2.5
     */
    protected $layout = 'category';

    /**
     * The type of content that the adapter indexes.
     *
     * @var    string
     * @since  2.5
     */
    protected $type_title = 'AllEvents';

    /**
     * The table name.
     *
     * @var    string
     * @since  2.5
     */
    protected $table = '#__allevents_events';

    /**
     * Load the language file on instantiation.
     *
     * @var    boolean
     * @since  3.1
     */
    protected $autoloadLanguage = true;

    /**
     * The field the published state is stored in.
     *
     * @var    string
     * @since  2.5
     */
    protected $state_field = 'published';

    /**
     * Method to update the item link information when the item category is
     * changed. This is fired when the item category is published or unpublished
     * from the list view.
     *
     * @param   string $extension The extension whose category has been updated.
     * @param   array $pks A list of primary key ids of the content that has changed state.
     * @param   integer $value The value of the state that the content has been changed to.
     *
     * @return  void
     *
     * @since   2.5
     */
    public function onFinderCategoryChangeState($extension, $pks, $value)
    {
        // Make sure we're handling com_contact categories
        if ($extension == 'com_allevents') {
            $this->categoryStateChange($pks, $value);
        }
    }

    /**
     * Method to remove the link information for items that have been deleted.
     *
     * This event will fire when contacts are deleted and when an indexed item is deleted.
     *
     * @param   string $context The context of the action being performed.
     * @param   JTable $table A JTable object containing the record to be deleted
     *
     * @return  boolean  True on success.
     *
     * @since   2.5
     * @throws  Exception on database error.
     */
    public function onFinderAfterDelete($context, $table)
    {
        if ($context == 'com_allevents.event') {
            $id = $table->id;
        } elseif ($context == 'com_finder.index') {
            $id = $table->link_id;
        } else {
            return true;
        }

        // Remove the items.
        return $this->remove($id);
    }

    /**
     * Method to determine if the access level of an item changed.
     *
     * @param   string $context The context of the content passed to the plugin.
     * @param   JTable $row A JTable object
     * @param   boolean $isNew If the content has just been created
     *
     * @return  boolean  True on success.
     *
     * @since   2.5
     * @throws  Exception on database error.
     */
    public function onFinderAfterSave($context, $row, $isNew)
    {
        // We only want to handle web links here. We need to handle front end and back end editing.
        if ($context == 'com_allevents.event') {
            // Check if the access levels are different
            if (!$isNew && $this->old_access != $row->access) {
                // Process the change.
                $this->itemAccessChange($row);
            }

            // Reindex the item
            $this->reindex($row->id);
        }

        return true;
    }

    /**
     * Method to reindex the link information for an item that has been saved.
     * This event is fired before the data is actually saved so we are going
     * to queue the item to be indexed later.
     *
     * @param   string $context The context of the content passed to the plugin.
     * @param   JTable $row A JTable object
     * @param   boolean $isNew If the content is just about to be created
     *
     * @return  boolean  True on success.
     *
     * @since   2.5
     * @throws  Exception on database error.
     */
    public function onFinderBeforeSave($context, $row, $isNew)
    {
        // We only want to handle web links here
        if ($context == 'com_allevents.event') {
            // Query the database for the old access level if the item isn't new
            if (!$isNew) {
                $this->checkItemAccess($row);
            }
        }

        return true;
    }

    /**
     * Method to update the link information for items that have been changed
     * from outside the edit screen. This is fired when the item is published,
     * unpublished, archived, or unarchived from the list view.
     *
     * @param   string $context The context for the content passed to the plugin.
     * @param   array $pks A list of primary key ids of the content that has changed state.
     * @param   integer $value The value of the state that the content has been changed to.
     *
     * @return  void
     *
     * @since   2.5
     */
    public function onFinderChangeState($context, $pks, $value)
    {
        // We only want to handle web links here
        if ($context == 'com_allevents.event') {
            $this->itemStateChange($pks, $value);
        }
        // Handle when the plugin is disabled
        if ($context == 'com_plugins.plugin' && $value === 0) {
            $this->pluginDisable($pks);
        }
    }

    /**
     * Method to index an item. The item must be a FinderIndexerResult object.
     *
     * @param   FinderIndexerResult $item The item to index as an FinderIndexerResult object.
     * @param   string $format The item format
     *
     * @return  void
     *
     * @since   2.5
     * @throws  Exception on database error.
     */
    protected function index(FinderIndexerResult $item, $format = 'html')
    {
        // Check if the extension is enabled
        if (JComponentHelper::isEnabled($this->extension) == false) {
            return;
        }

        $item->setLanguage();

        $item->metadata = new Registry($item->metadata);

        // Build the necessary route and path information.
        $item->url = "index.php?option=com_allevents&task=event.edit&id=" . $item->id;
        $item->route = "index.php?option=com_allevents&task=event.edit&id=" . $item->id;
        $item->path = FinderIndexerHelper::getContentPath($item->route);

        /*
        * Add the meta-data processing instructions based on the newsfeeds
        * configuration parameters.
        */
        // Handle the link to the meta-data.
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'link');
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'metakey');
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'metadesc');
        $item->addInstruction(FinderIndexer::META_CONTEXT, 'metaauthor');

        // Add the type taxonomy data.
        $item->addTaxonomy('Type', 'Event');

        // Add the author taxonomy data.
        if (!empty($item->author)) {
            $item->addTaxonomy('Author', $item->author);
        }
        // Add the category taxonomy data.
        $item->addTaxonomy('Category', $item->category, $item->cat_state, $item->cat_access);

        // Add the language taxonomy data.
        // $item->addTaxonomy('Language', $item->language);

        // Get content extras.
        FinderIndexerHelper::getContentExtras($item);

        // Index the item.
        $this->indexer->index($item);

        return;
    }

    /**
     * Method to setup the adapter before indexing.
     *
     * @return  boolean  True on success, false on failure.
     *
     * @since   2.5
     * @throws  Exception on database error.
     */
    protected function setup()
    {
        include_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

        return true;
    }

    /**
     * Method to get the SQL query used to retrieve the list of content items.
     *
     * @param   mixed $query A JDatabaseQuery object. [optional]
     *
     * @return  JDatabaseQuery  A database object.
     *
     * @since   2.5
     */
    /**
     * @param mixed|null|null $query
     *
     * @return JDatabaseQuery|mixed|null
     */
    protected function getListQuery($query = null)
    {
        $db = JFactory::getDbo();
        // Check if we can use the supplied SQL query.
        $query = $query instanceof JDatabaseQuery ? $query : $db->getQuery(true);
        $query->select('a.id, a.titre title, a.alias, "" AS link');
        $query->select('a.description AS summary ,a.metakey, a.metadesc, a.metakey metadata');
        $query->select('"" as language, a.access, "" as ordering');
        $query->select('"" AS modified, "" AS modified_by ,date AS publish_start_date, enddate AS publish_end_date');
        $query->select('a.published AS state, date AS start_date, a.access');
        $query->select('c.titre AS category, c.alias as categoryalias, c.published AS cat_state, c.access AS cat_access');
        $query->select('u.name AS author');

        // Handle the alias CASE WHEN portion of the query
        $case_when_item_alias = ' CASE WHEN ';
        $case_when_item_alias .= $query->charLength('a.alias', '!=', '0');
        $case_when_item_alias .= ' THEN ';
        $a_id = $query->castAsChar('a.id');
        $case_when_item_alias .= $query->concatenate([$a_id, 'a.alias'], ':');
        $case_when_item_alias .= ' ELSE ';
        $case_when_item_alias .= $a_id . ' END as slug';
        $query->select($case_when_item_alias);

        $case_when_category_alias = ' CASE WHEN ';
        $case_when_category_alias .= $query->charLength('c.alias', '!=', '0');
        $case_when_category_alias .= ' THEN ';
        $c_id = $query->castAsChar('c.id');
        $case_when_category_alias .= $query->concatenate([$c_id, 'c.alias'], ':');
        $case_when_category_alias .= ' ELSE ';
        $case_when_category_alias .= $c_id . ' END as catslug';
        $query->select($case_when_category_alias);
        $query->from('#__allevents_events AS a');
        $query->join('LEFT', '#__allevents_categories AS c ON c.id = a.category_id');
        $query->join('LEFT', '#__users AS u ON u.id = a.created_by');

        return $query;
    }
}
