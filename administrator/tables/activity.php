<?php
defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsTableactivity
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsTableactivity extends JTable
{
    /**
     * Constructor
     *
     * @internal param $JDatabase $ A database connector object
     *
     * @param JDatabaseDriver $db
     */
    public function __construct(&$db)
    {
        parent::__construct('#__allevents_activities', 'id', $db);
    }

    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param mixed $array
     * @param string $ignore
     *
     * @return null|string null is operation was satisfactory, otherwise returns an error
     * @throws Exception
     * @internal param $array $ Named array
     * @see      JTable:bind
     * @since    1.5
     */
    public function bind($array, $ignore = '')
    {
        $app = JFactory::getApplication();
        // Support for multiple or not foreign key field: agenda_id
        if (isset($array['agenda_id'])) {
            if (is_array($array['agenda_id'])) {
                $array['agenda_id'] = implode(',', $array['agenda_id']);
            } else
                if (strrpos($array['agenda_id'], ',') != false) {
                    $array['agenda_id'] = explode(',', $array['agenda_id']);
                } else
                    if (empty($array['agenda_id'])) {
                        $array['agenda_id'] = '';
                    }
        }
        $input = $app->input;
        $task = $input->getString('task', '');
        if (($task == 'save' || $task == 'apply') && (!JFactory::getUser()->authorise('core.satellites', 'com_allevents') && $array['state'] == 1)) {
            $array['published'] = 0;
        }

        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string )$registry;
        }

        if (isset($array['metadata']) && is_array($array['metadata'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['metadata']);
            $array['metadata'] = (string )$registry;
        }
        if (!JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
            $actions = JAccess::getActionsFromFile(JPATH_SITE . '/administrator/components/com_allevents/access.xml', "/access/section[@name='activity']/");
            $default_actions = JAccess::getAssetRules('com_allevents.activity.' . $array['id'])->getData();
            $array_jaccess = [];
            foreach ($actions as $action) {
                if (isset($default_actions[$action->name]))
                    $array_jaccess[$action->name] = $default_actions[$action->name];
            }
            $array['rules'] = $this->JAccessRulestoArray($array_jaccess);
        }
        // Bind the rules for ACL where supported.
        if (isset($array['rules']) && is_array($array['rules'])) {
            $this->setRules($array['rules']);
        }

        return parent::bind($array, $ignore);
    }

    /**
     * This function convert an array of JAccessRule objects into an rules array.
     *
     * @param type $jaccessrules an arrao of JAccessRule objects.
     *
     * @return array
     */
    private function JAccessRulestoArray($jaccessrules)
    {
        $rules = [];
        foreach ($jaccessrules as $action => $jaccess) {
            $actions = [];
            foreach ($jaccess->getData() as $group => $allow) {
                $actions[$group] = ((bool)$allow);
            }
            $rules[$action] = $actions;
        }

        return $rules;
    }

    /**
     * Overloaded check function
     */
    public function check()
    {
        // If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder();
        }

        return parent::check();
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkIn rows that it can after adjustments are made.
     *
     * @param null $pks
     * @param int $published
     * @param int $userId
     *
     * @return bool True on success.
     * @throws Exception
     * @internal param $mixed $ An optional array of primary key values to update.  If not
     *                      set the instance property value is used.
     * @internal param $integer $ The publishing state. eg. [0 = unpublished, 1 = published]
     * @internal param $integer $ The user id of the user performing the operation.
     * @since    1.0.4
     */
    public function publish($pks = null, $published = 1, $userId = 0)
    {
        $app = JFactory::getApplication();
        // Initialise variables.
        $k = $this->_tbl_key;
        // Sanitize input.
        ArrayHelper::toInteger($pks);
        $userId = (int)$userId;
        $published = (int)$published;
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
            $this->_db->setQuery('UPDATE `' . $this->_tbl . '`' . ' SET `published` = ' . (int)$published . ' WHERE (' . $where . ')' . $checkIn);
            $this->_db->execute();
        } catch (Exception $e) {
            $app->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        // If checkIn is supported and all rows were adjusted, check them in.
        if ($checkIn && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin each row.
            foreach ($pks as $pk) {
                $this->checkIn($pk);
            }
        }
        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->published = $published;
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

        return 'com_allevents.activity.' . (int)$this->$k;
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
