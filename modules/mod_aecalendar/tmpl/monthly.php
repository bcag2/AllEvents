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
$document->addScript(AllEventsHelperOverride::GetScript('premium/monthly.js'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aecalendar8.css'));
$startWeekDay = ($startWeekDay == 1) ? 'Mon' : 'Sun';
$ampm = ($ampm == "g:i A") ? "true" : "false";

$document->addScriptDeclaration("(function($){ 
    $(document).ready(function () {
        var monthNames = [" . $smonthNames . "];
        var dayNames = [" . $dayNames . "];
    
        $('#mod_aecalendar8').monthly({
            weekStart : '" . $startWeekDay . "',
            mode : 'event',
            target : '',
            eventList : true,
            maxWidth : false,
            setWidth : false,
            startHidden : false,
            showTrigger : '',
            stylePast : false,
            disablePast : false,
            dayNames: dayNames,
            monthNames: monthNames,
            ampm: " . $ampm . ",
            // xmlUrl: 'index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aemonthly&format=xml&mod=1&at=" . json_encode($at) . "&pt=" . json_encode($pt) . "&et=" . json_encode($et) . "&dt=" . json_encode($dt) . "&st=" . json_encode($st) . "&ct=" . json_encode($ct) . "&lt=" . json_encode($lt) . "&Itemid=" . $Itemid . "&h=" . $h . "'
            xmlUrl: 'index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aemonthly&format=json&mod=1&at=" . json_encode($at) . "&pt=" . json_encode($pt) . "&et=" . json_encode($et) . "&dt=" . json_encode($dt) . "&st=" . json_encode($st) . "&ct=" . json_encode($ct) . "&lt=" . json_encode($lt) . "&h=" . $h . "'
        });
    }) ;
})(jQuery);");
?>

<div style="width:100%; max-width:600px; display:inline-block;" class="<?php echo $moduleclass_sfx; ?>">
    <div id="mod_aecalendar8" class="monthly  <?php echo $moduleclass_sfx; ?>"></div>
</div>