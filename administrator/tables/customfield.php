<?php
defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * Custom Field Table class
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsTableCustomfield extends JTable
{

    /**
     * Constructor
     *
     * @param JDatabaseDriver $_db
     *
     * @internal param A $JDatabase database connector object
     * @since    3.4.0
     */
    public function __construct(&$_db)
    {
        parent::__construct('#__allevents_customfields', 'id', $_db);
    }

    /**
     * Overloaded bind function.
     *
     * @param Named $array
     * @param string $ignore
     *
     * @return null|string null is operation was satisfactory, otherwise returns an error
     * @internal   param Named $array array
     * @see        JTable:bind
     * @since      3.4.0
     */
    public function bind($array, $ignore = '')
    {
        // Set Creator infos
        $user = JFactory::getUser();
        $userId = $user->get('id');

        if ($array['created_by'] == '0') {
            $array['created_by'] = (int)$userId;
        }

        // Set Params
        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string )$registry;
        }

        return parent::bind($array, $ignore);
    }

    /**
     * Overloaded check function
     *
     * @since    3.4.0
     */
    public function check()
    {
        $app = JFactory::getApplication();
        // If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder();
        }

        // URL alias
        if (empty($this->alias)) {
            $this->alias = $this->titre;
        }

        $this->alias = JFilterOutput::stringURLSafe($this->alias);

        // Alias is not generated if non-latin characters, so we fix it by using created date, or title if unicode is activated, as alias
        if ($this->alias == null || empty($this->alias)) {
            if (JFactory::getConfig()->get('unicodeslugs') == 1) {
                $this->alias = JFilterOutput::stringUrlUnicodeSlug($this->titre);
            } else {
                $this->alias = JFilterOutput::stringURLSafe($this->created_date);
            }
        }

        // Slug auto-create
        $slug_empty = empty($this->slug) ? true : false;

        if ($slug_empty) {
            $this->slug = $this->titre;
        }
        $this->slug = self::stringToSlug($this->slug);

        // Slug is not generated if non-latin characters, so we fix it by using created date as a slug
        if ($this->slug == null) {
            $this->slug = self::stringToSlug($this->created_date);
        }

        // Check if Slug already exists
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('slug')->from($db->qn('#__allevents_customfields'))->where($db->qn('slug') . ' = ' . $db->q($this->slug));

        if (!empty($this->id)) {
            $query->where('id <> ' . (int)$this->id);
        }

        $db->setQuery($query);
        $slug_exists = $db->loadResult();

        if ($slug_exists) {
            $error_slug = $slug_empty ? JText::sprintf('COM_ALLEVENTS_CUSTOMFIELD_DATABASE_ERROR_AUTO_SLUG', '<strong>' . $this->titre . '</strong>', '<strong>' . $this->slug . '</strong>') : '<strong>' . JText::_('COM_ALLEVENTS_CUSTOMFIELD_DATABASE_ERROR_UNIQUE_SLUG') . '</strong>';
            $app->enqueueMessage($error_slug . '<br /><br /><i>' . JTEXT::_('COM_ALLEVENTS_CUSTOMFIELD_SLUG_DESC') . '</i>', 'error');

            return false;
        }

        return parent::check();
    }

    /**
     * @param $string
     *
     * @return mixed|string
     */
    protected static function stringToSlug($string)
    {
        // Remove any '_' from the string since they will be used as concatenaters
        $replace = ['-', '_'];
        $str = str_replace($replace, ' ', $string);

        //replaces all accented UTF-8 characters by unaccented ASCII-7 "equivalents"
        $lang = JFactory::getLanguage();
        $str = $lang->transliterate($str);

        // Trim white spaces at beginning and end of translation string and make uppercase
        $str = trim(strtolower($str));

        // Remove any duplicate whitespace, and ensure all characters are alphanumeric
        $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '_', $str);

        // Trim underscores at beginning and end of translation string
        $str = trim($str, '_');

        return $str;
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkIn rows that it can after adjustments are made.
     *
     * @param null $pks
     * @param int $state
     * @param int $userId
     * @return    boolean        True on success.
     * @throws Exception
     * @since    3.4.0
     */
    public function publish($pks = null, $state = 1, $userId = 0)
    {
        $app = JFactory::getApplication();
        // Initialise variables.
        $k = $this->_tbl_key;

        // Sanitize input.
        ArrayHelper::toInteger($pks);
        $userId = (int)$userId;
        $state = (int)$state;

        // If there are no primary keys set check to see if the instance key is set.
        if (empty($pks)) {
            if ($this->$k) {
                $pks = [$this->$k];
            } // Nothing to set publishing state on, return false.
            else {
                $app->enqueueMessage(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'), 'error');

                return false;
            }
        }

        // Build the WHERE clause for the primary keys.
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);

        // Determine if there is checkIn support for the table.
        if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
            $checkIn = '';
        } else {
            $checkIn = ' AND (checked_out = 0 OR checked_out = ' . (int)$userId . ')';
        }
        try {
            // Update the publishing state for rows with the given primary keys.
            $this->_db->setQuery('UPDATE `' . $this->_tbl . '`' . ' SET `published` = ' . (int)$state . ' WHERE (' . $where . ')' . $checkIn);
            $this->_db->execute();
        } catch (Exception $e) {
            $app->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        // If checkIn is supported and all rows were adjusted, check them in.
        if ($checkIn && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin the rows.
            foreach ($pks as $pk) {
                $this->checkIn($pk);
            }
        }

        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }

        return true;
    }

    /**
     * Define a namespaced asset name for inclusion in the #__assets table
     *
     * @return string The asset name
     * @see JTable::_getAssetName
     */
    protected function _getAssetName()
    {
        $k = $this->_tbl_key;

        return 'com_allevents.customfield.' . (int)$this->$k;
    }

    /**
     * Returns the parent asset's id. If you have a tree structure, retrieve the parent's id using the external key field
     *
     * @see JTable::_getAssetParentId
     *
     * @param JTable $table
     * @param null $id
     *
     * @return int
     */
    protected function _getAssetParentId(JTable $table = null, $id = null)
    {
        // We will retrieve the parent-asset from the Asset-table
        $assetParent = JTable::getInstance('Asset');
        // Default: if no asset-parent can be found we take the global asset
        $assetParentId = $assetParent->getRootId();
        // The item has the component as asset-parent
        $assetParent->loadByName('com_allevents');
        // Return the found asset-parent-id
        if ($assetParent->id) {
            $assetParentId = $assetParent->id;
        }

        return $assetParentId;
    }
}
