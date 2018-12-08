<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAELayoutEventForm
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class JFormFieldAELayoutEventForm extends JFormFieldList
{
    protected $type = 'JFormFieldAELayoutEventForm';

    /**
     * JFormFieldAELayoutEventForm::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        $options = [];

        // Add default layouts
        $options[] = ["value" => "default", "text" => JText::_('COM_ALLEVENTS_DEFAULT')];
        $options[] = ["value" => "wizard", "text" => JText::_('COM_ALLEVENTS_WIZARD')];
        $options[] = ["value" => "uikit", "text" => JText::_('COM_ALLEVENTS_UIKIT')];
        $options[] = ["value" => "sdn_ac", "text" => JText::_('COM_ALLEVENTS_SDN_AC')];

        // Add specific layouts
        JPluginHelper::importPlugin('allevents');
        $dispatcher = JEventDispatcher::getInstance();
        $layouts = $dispatcher->trigger('onAlleventsgetLayoutsEventForm');

        if (!empty($layouts)) {
            if (is_array($layouts)) {
                $layouts = json_decode($layouts[0], true);
            } else {
                $layouts = [];
            }
            $manu = array_merge($options, $layouts);
        } else {
            $manu = $options;
        }

        return $manu;
    }
}