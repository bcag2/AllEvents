<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelCategories
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelCategories extends JModelList
{
    /**
     * AllEventsModelCategories::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id',
                'a.id',
                'titre',
                'a.titre',
                'section_id',
                'a.section_id',
                'alias',
                'a.alias',
                'couleur',
                'a.couleur',
                'couleur_texte',
                'a.couleur_texte',
                'ordering',
                'a.ordering',
                'access',
                'a.access',
                'description',
                'a.description',
                'intro',
                'a.intro',
                'published',
                'a.published',
                'created_date',
                'a.created_date',
                'proposed_by',
                'a.proposed_by',
                'lastmod',
                'a.lastmod',
                'lastmod_by',
                'a.lastmod_by',
                'vignette',
                'a.vignette',
                'image_bullet',
                'a.image_bullet',
                'version',
                'a.version',
                'hits',
                'a.hits',
                'created_by',
                'a.created_by',
                'default',
                'a.default',

            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelCategories::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }

    /**
     * AllEventsModelCategories::getNbCategories()
     *
     * @return integer
     */
    function getNbCategories()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $db->setQuery("SELECT count(*) AS nb FROM `#__allevents_categories` WHERE published = 1");
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
    }

    /**
     * AllEventsModelCategories::GetCategoriesFromSection()
     *
     * @param mixed $section_id
     *
     * @return array
     */
    public function GetCategoriesFromSection($section_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_categories` WHERE `published`=1 AND (`section_id`=0 OR `section_id`=" . $section_id . ") ORDER BY 2");
        $loaddb = $db->loadObjectList();

        return ((array)$loaddb);
    }

    /**
     * AllEventsModelCategories::getCategoriesMostViewed()
     *
     * @return ObjectList
     */
    public function getCategoriesMostViewed()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `#__allevents_categories`.titre, count(`#__allevents_events`.id) AS hits, `#__allevents_categories`.couleur FROM `#__allevents_events` INNER JOIN `#__allevents_categories` ON `#__allevents_categories`.id=`#__allevents_events`.category_id WHERE (`#__allevents_events`.published=1) AND (`#__allevents_events`.titre <> '') GROUP BY `#__allevents_categories`.titre, `#__allevents_categories`.couleur");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelCategories::GetDefaultCategoryIdForSection()
     *
     * @param mixed $section_id
     *
     * @return mixed
     */
    public function GetDefaultCategoryIdForSection($section_id)
    {
        $db = $this->getDbo();
        $section_id = (empty($section_id)) ? 0 : $section_id;
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_categories` WHERE published=1 AND `default`=1 AND (`section_id`=0 OR `section_id`=" . $section_id . ")");
        $loaddb = $db->loadResult();

        return $loaddb;
    }

    /**
     * AllEventsModelCategories::populateState()
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);
        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);
        // List state information.
        parent::populateState('a.titre', 'asc');
    }

    /**
     * AllEventsModelCategories::getStoreId()
     *
     * @param string $id
     *
     * @return string
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * AllEventsModelCategories::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        $query->select('(select count(*) from `#__allevents_events` b where b.category_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_categories` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the foreign key 'section_id'
        $query->select('#__allevents_sections_1119344.titre AS titre_section');
        $query->join('LEFT', '#__allevents_sections AS #__allevents_sections_1119344 ON #__allevents_sections_1119344.id = a.section_id');
        // Join over the user field 'proposed_by'
        $query->select('proposed_by.name AS proposed_by');
        $query->join('LEFT', '#__users AS proposed_by ON proposed_by.id = a.proposed_by');
        // Join over the user field 'lastmod_by'
        $query->select('lastmod_by.name AS lastmod_by');
        $query->join('LEFT', '#__users AS lastmod_by ON lastmod_by.id = a.lastmod_by');
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        // Filter by published state
        $published = $this->getState('filter.state');
        if (is_numeric($published)) {
            $query->where('a.published = ' . (int)$published);
        } else
            if ($published === '') {
                $query->where('(a.published IN (0, 1))');
            }
        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.titre LIKE ' . $search . ' )');
            }
        }
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}