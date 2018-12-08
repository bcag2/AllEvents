<?php

/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
$document->addScript(AllEventsHelperOverride::GetScript('mod_aecalendar.min.js'));
$document->addStyleSheet('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/cupertino/jquery-ui.css');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aecalendar.css'));

$showDescription = "false";
$startWeekOnMonday = ($startWeekDay == 1) ? "true" : "false";

$document->addScriptDeclaration("(function($){
    $(document).ready(function () {
        $('#mod_aecalendar1').eventCalendar({
            eventsjson : 'index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aecalendar&format=json&dcb=" . $dcb . "&dc=" . $dc . "&at=" . json_encode($at) . "&et=" . json_encode($et) . "&pt=" . json_encode($pt) . "&dt=" . json_encode($dt) . "&st=" . json_encode($st) . "&ct=" . json_encode($ct) . "&Itemid=" . $Itemid . "&lt=" . json_encode($lt) . "&h=" . $h . "'," . "monthNames: [" . $smonthNames . "],
            dayNames: [" . $dayNames . "],
            height:" . $height . ",
            dayNamesShort: [ " . $dayNames . "],
            txt_noEvents: '" . JText::_('MOD_AECALENDAR_NO_EVENT', true) . "',
            txt_SpecificEvents_prev: '',
            txt_SpecificEvents_after: '',
            txt_next: '" . JText::_('MOD_AECALENDAR_NEXT', true) . "',
            txt_prev: '" . JText::_('MOD_AECALENDAR_PREV', true) . "',
            txt_NextEvents: '" . JText::_('MOD_AECALENDAR_NEXT_EVENTS', true) . "',
            txt_GoToEventUrl: '" . JText::_('MOD_AECALENDAR_VISUALISATION', true) . "',
            eventsScrollable: true,
            eventsLimit: " . $nbevt . ",
            cacheJson: false,
            showDayNameInCalendar: true,
            startWeekOnMonday: " . $startWeekOnMonday . ",
            showDescription: true
        });
    }) ;
})(jQuery);");

?>

<div id="mod_aecalendar1" class="<?php echo $moduleclass_sfx; ?>"></div>