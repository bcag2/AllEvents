<?php
defined('_JEXEC') or die;

/**
 * serie Table class
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsTableserie extends JTable
{
    /**
     * Constructor
     *
     * @param JDatabaseDriver $db
     *
     * @internal param A $JDatabase database connector object
     */
    public function __construct(&$db)
    {
        parent::__construct('#__allevents_series', 'id', $db);
    }

    /**
     * Method to delete a row from the database table by primary key value.
     *
     * @param   mixed $pk An optional primary key value to delete.  If not set the instance property value is used.
     *
     * @return  boolean  True on success.
     *
     * @link    https://docs.joomla.org/JTable/delete
     * @since   11.1
     * @throws  UnexpectedValueException
     */
    /**
     * @param mixed|null|null $pk
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
     * Define a namespaced asset name for inclusion in the #__assets table
     *
     * @return string The asset name
     *
     * @see JTable::_getAssetName
     */
    protected function _getAssetName()
    {
        $k = $this->_tbl_key;

        return 'com_allevents.serie.' . (int)$this->$k;
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

    /**
     * This function convert an array of JAccessRule objects into an rules array.
     *
     * @param type $jaccessrules an arrao of JAccessRule objects.
     */
    /* private function JAccessRulestoArray($jaccessrules)
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
