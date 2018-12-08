<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAELayoutEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class JFormFieldAELayoutEvents extends JFormFieldList
{
    protected $type = 'AELayoutEvents';

    /**
     * JFormFieldAELayoutEvents::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        $options = [];

        // Add default layouts
        $options[] = ["value" => "default", "text" => JText::_('COM_ALLEVENTS_DEFAULT')];
        $options[] = ["value" => "simple", "text" => JText::_('EVENTS_LAYOUT_SIMPLE')];
        // €#€
        $options[] = ["value" => "table", "text" => JText::_('LAYOUT_TABLE')];
        $options[] = ["value" => "table2", "text" => JText::_('EVENTS_LAYOUT_TABLE2')];
        $options[] = ["value" => "bootstrap3", "text" => JText::_('EVENTS_LAYOUT_BOOTSTRAP3')];
        $options[] = ["value" => "jlm", "text" => JText::_('EVENTS_LAYOUT_JLM')];
        $options[] = ["value" => "professional", "text" => JText::_('EVENTS_LAYOUT_PROFESSIONAL')];
        $options[] = ["value" => "condense", "text" => JText::_('EVENTS_LAYOUT_CONDENSE')];
        $options[] = ["value" => "tableregister", "text" => JText::_('EVENTS_LAYOUT_TABLEREGISTER')];
        $options[] = ["value" => "games", "text" => JText::_('EVENTS_LAYOUT_GAMES')];
        $options[] = ["value" => "timeline", "text" => JText::_('EVENTS_LAYOUT_TIMELINE')];
        $options[] = ["value" => "masonry", "text" => JText::_('EVENTS_LAYOUT_MASONRY')];
        $options[] = ["value" => "eventlist", "text" => JText::_('EVENTS_LAYOUT_EVENTLIST')];
        $options[] = ["value" => "design", "text" => JText::_('EVENTS_LAYOUT_DESIGN')];
        $options[] = ["value" => "t2area", "text" => JText::_('EVENTS_LAYOUT_T2AREA')];
        $options[] = ["value" => "map", "text" => JText::_('EVENTS_LAYOUT_MAP_EVENTS')];
        $options[] = ["value" => "uikitsimplegrid", "text" => JText::_('EVENTS_LAYOUT_UIKITSIMPLEGRID')];
        $options[] = ["value" => "uikitdynamicgrid", "text" => JText::_('EVENTS_LAYOUT_UIKITDYNAMICGRID')];
        $options[] = ["value" => "uikitportfoliogrid", "text" => JText::_('EVENTS_LAYOUT_UIKITPORTFOLIOGRID')];
        $options[] = ["value" => "uikitupcomingevents", "text" => JText::_('EVENTS_LAYOUT_UIKITUPCOMINGEVENTS')];
        $options[] = ["value" => "uikitposts", "text" => JText::_('EVENTS_LAYOUT_UIKITPOSTS')];
        $options[] = ["value" => "uikitwebikeo", "text" => JText::_('EVENTS_LAYOUT_UIKITWEBIKEO')];
        $options[] = ["value" => "marcq", "text" => JText::_('EVENTS_LAYOUT_MARCQ')];
        $options[] = ["value" => "search", "text" => JText::_('EVENTS_LAYOUT_SEARCH')];
        // €#€

        // Add specific layouts
        JPluginHelper::importPlugin('allevents');
        $dispatcher = JEventDispatcher::getInstance();
        $layouts = $dispatcher->trigger('onAlleventsgetLayoutsEvents');

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