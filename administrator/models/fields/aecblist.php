<?php
defined('_JEXEC') or die;

use CBLib\Application\Application;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAECBList
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAECBList extends JFormFieldList
{
    public $type = 'AECBList';

    /**
     * JFormFieldAECBList::getOptions() provides the options for the select
     *
     * @return array
     */
    protected function getOptions()
    {
        $params = JComponentHelper::getParams('com_allevents');

        if (!$params['controlpanel_showcbusers']) {
            return [];
        }

        // Initialize CB framework
        global $_CB_framework, $_CB_database;
        include_once JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';
        cbimport('cb.plugins');
        if ($_CB_framework->getUi() == 1) {
            cbimport('language.front');
        } else {
            cbimport('language.all');
        }

        $query = 'SELECT listid, title FROM #__comprofiler_lists WHERE published = 1 AND viewaccesslevel IN ' .
            $_CB_database->safeArrayOfIntegers(Application::MyUser()->getAuthorisedViewLevels()) .
            ' ORDER BY ordering';
        $db = JFactory::getDbo();
        $db->setQuery($query);
        $items = $db->loadObjectList();

        //$params = JComponentHelper::getParams('com_allevents');

        $options = parent::getOptions();

        foreach ($items as $item) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = $item->title;
            $option->value = $item->listid;
            $options[] = $option;
        }

        return $options;
    }
}
