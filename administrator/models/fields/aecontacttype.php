<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAEContactType
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEContactType extends JFormFieldList
{
    public $type = 'AEContactType';

    /**
     * JFormFieldAEContactType::getOptions() provides the options for the select
     *
     * @return array
     */
    protected function getOptions()
    {
        $params = JComponentHelper::getParams('com_allevents');
        $options = parent::getOptions();

        $option = new stdClass();
        $option->checked = false;
        $option->class = '';
        $option->disable = false;
        $option->selected = false;
        $option->text = JText::_('COM_ALLEVENTS_CONTACT_TYPE_NONE');
        $option->value = 0;
        $options[] = $option;

        if ($params['controlpanel_showjusers']) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = JText::_('COM_ALLEVENTS_CONTACT_TYPE_JUSER');
            $option->value = 1;
            $options[] = $option;
        }

        if ($params['controlpanel_showjcontacts']) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = JText::_('COM_ALLEVENTS_CONTACT_TYPE_JCONTACT');
            $option->value = 2;
            $options[] = $option;
        }

        // #€#
        if ($params['controlpanel_showcbusers']) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = JText::_('COM_ALLEVENTS_CONTACT_TYPE_CBUSER');
            $option->value = 3;
            $options[] = $option;
        }

        // #€#

        return $options;
    }
}
