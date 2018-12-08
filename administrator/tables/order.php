<?php

defined('_JEXEC') or die;

/**
 * AlleventsTablepayment
 *
 * payment Table class
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsTablepayment extends JTable
{
    /**
     * AlleventsTablepayment::__construct()
     *
     * @param mixed $db JDatabase $ A database connector object
     */
    public function __construct(&$db)
    {
        parent::__construct('#__allevents_orders', 'id', $db);
    }

    /**
     * AlleventsTablepayment::bind()
     *
     * @param mixed $array array $ Named array
     * @param string $ignore
     *
     * @return null|string null is operation was satisfactory, otherwise returns an error
     */
    public function bind($array, $ignore = '')
    {
        if ($array['id'] == 0) {
            $array['created_by'] = JFactory::getUser()->id;
        }

        // Bind the rules for ACL where supported.
        if (isset($array['rules']) && is_array($array['rules'])) {
            $this->setRules($array['rules']);
        }

        return parent::bind($array, $ignore);
    }

    /**
     * AlleventsTablepayment::check()
     *
     * Overloaded check function
     *
     * @return bool
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
     * AlleventsTablepayment::delete()
     *
     * @param mixed $pk
     *
     * @return bool
     */
    public function delete($pk = null)
    {
        $this->load($pk);
        $result = parent::delete($pk);
        if ($result) {
        }

        return $result;
    }

    /**
     * AlleventsTablepayment::_getAssetName()
     *
     * Define a namespaced asset name for inclusion in the #__assets table
     *
     * @return string The asset name
     * @see JTable::_getAssetName
     */
    protected function _getAssetName()
    {
        $k = $this->_tbl_key;

        return 'com_allevents.payment.' . (int)$this->$k;
    }

    /**
     * AlleventsTablepayment::_getAssetParentId()
     *
     * Returns the parent asset's id. If you have a tree structure, retrieve the parent's id using the external key field
     *
     * @param mixed $table
     * @param mixed $id
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

    /**
     * AlleventsTablepayment::JAccessRulestoArray()
     *
     * This function convert an array of JAccessRule objects into an rules array.
     *
     * @param mixed $jaccessrules an arrao of JAccessRule objects.
     *
     * @return
     */
    /*   private function JAccessRulestoArray($jaccessrules)
       {
           $rules = array();
           foreach ($jaccessrules as $action => $jaccess) {
               $actions = array();
               foreach ($jaccess->getData() as $group => $allow) {
                   $actions[$group] = ((bool)$allow);
               }
               $rules[$action] = $actions;
           }
           return $rules;
       }*/
}
