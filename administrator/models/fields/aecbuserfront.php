<?php
defined('_JEXEC') or die;

use CBLib\Application\Application;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAECBUserFront
 *
 * Build from cbUsersList::drawUsersList()
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAECBUserFront extends JFormFieldList
{
    /**
     * $type
     *
     * @var string Field type
     */
    public $type = 'AECBUserFront';

    /**
     * $contact_comprofiler_list
     *
     * @var CB list
     */
    protected $contact_comprofiler_list = null;

    /**
     * JFormFieldAECBUserFront::setup()
     *
     * Field setup
     *
     * {@inheritDoc}
     *
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        if (isset($element['contact_comprofiler_list'])) {
            //$contact_comprofiler_list = $element['contact_comprofiler_list'];
        }

        return parent::setup($element, $value, $group);
    }

    /**
     * JFormFieldAEContactDetailsFront::getOptions()
     *
     * Generate options
     *
     * @return array
     * @throws Exception
     */
    public function getOptions()
    {
        $options = parent::getOptions();

        // Initialize CB framework
        global $_CB_framework, $_CB_database, $ueConfig;
        include_once JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';
        cbimport('cb.plugins');
        if ($_CB_framework->getUi() == 1) {
            cbimport('language.front');
        } else {
            cbimport('language.all');
        }

        // Get user datas
        $cb_user_id = Application::MyUser()->getUserId();
        $cb_current_user = &CBuser::getInstance((int)$cb_user_id, false);
        //$cb_current_user_data = & $cb_current_user->getUserData();

        // Get users list parameters
        $cb_list = cbUsersList::getInstance((int)$this->contact_comprofiler_list);

        // Check access
        if (!$cb_current_user->authoriseView('userslist', $cb_list->listid)) {
            $message = JText::sprintf('COM_ALLEVENTS_CB_LIST_NOT_ALLOWED', $cb_list->get('title'));
            JFactory::getApplication()->enqueueMessage($message, 'warning');

            return $options;
        }

        // Prepare query variables
        $userGroupIds = explode('|*|', $cb_list->usergroupids);
        $orderBy = cbUsersList::getSorting($this->contact_comprofiler_list, $cb_user_id, $random);
        $filterBy = cbUsersList::getFiltering($this->contact_comprofiler_list, $cb_user_id);

        // Build the field SQL
        $tableReferences = ['#__comprofiler' => 'ue', '#__users' => 'u'];
        $tablesWhereSQL = ['block' => 'u.block = 0', 'approved' => 'ue.approved = 1',
            'confirmed' => 'ue.confirmed = 1', 'banned' => 'ue.banned = 0'];
        $joinsSQL[] = 'JOIN #__user_usergroup_map g ON g.`user_id` = u.`id`';
        if ($userGroupIds) {
            $tablesWhereSQL['gid'] = 'g.group_id IN ' . $_CB_database->safeArrayOfIntegers($userGroupIds);
        }
        foreach ($tableReferences as $table => $name) {
            if ($name == 'u') {
                $tablesSQL[] = $table . ' ' . $name;
            } else {
                $joinsSQL[] = 'JOIN ' . $table . ' ' . $name . ' ON ' . $name . '.`id` = u.`id`';
            }
        }

        // Construct the FROM and WHERE for the userlist query
        $queryFrom = "FROM " . implode(', ', $tablesSQL) . (count($joinsSQL) ? "\n " . implode("\n ", $joinsSQL) : '') .
            "\n WHERE " . implode("\n AND ", $tablesWhereSQL) . " " . $filterBy;

        // Prepare the actual userlist query to build a list of users
        $query = 'SELECT DISTINCT ue.id, u.name, u.username ' . $queryFrom . " " . $orderBy;

        // Execute query
        $db = JFactory::getDbo();
        $db->setQuery($query);
        $items = $db->loadObjectList();

        // Set options
        foreach ($items as $item) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = getNameFormat($item->name, $item->username, $ueConfig['name_format']);
            $option->value = $item->id;
            $options[] = $option;
        }

        return $options;
    }
}
