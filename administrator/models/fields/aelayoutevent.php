<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAELayoutEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class JFormFieldAELayoutEvent extends JFormFieldList
{
    protected $type = 'AELayoutEvent';

    /**
     * JFormFieldAELayoutEvent::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        $options = [];

        // Add default layouts
        $options[] = ["value" => "default", "text" => JText::_('COM_ALLEVENTS_DEFAULT')];
        $options[] = ["value" => "display1", "text" => JText::_('EVENT_LAYOUT_1')];
        $options[] = ["value" => "display3", "text" => JText::_('EVENT_LAYOUT_3')];
        $options[] = ["value" => "uikit", "text" => JText::_('COM_ALLEVENTS_UIKIT')];
        $options[] = ["value" => "display4", "text" => JText::_('EVENT_LAYOUT_4')];
        $options[] = ["value" => "t2area", "text" => JText::_('T2Area')];

        // Add specific layouts
        JPluginHelper::importPlugin('allevents');
        $dispatcher = JEventDispatcher::getInstance();
        $layouts = $dispatcher->trigger('onAlleventsgetLayoutsEvent');

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