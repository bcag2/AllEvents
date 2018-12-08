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

$document = JFactory::getDocument();
AllEventsHelperOverride::bootstrap();
AllEventsHelperOverride::jquery();
$document->addScript(AllEventsHelperOverride::GetScript('bic_calendar.min.js'));
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/bic_calendar.css');

// ici c'est l'inverse des autres composants...
if ($startWeekDay == 1) {
    $startWeekDay = 0;
    $dayNames = "'" . JText::_('MON', true) . "','" . JText::_('TUE', true) . "','" . JText::_('WED', true) . "','" . JText::_('THU', true) . "','" . JText::_('FRI', true) . "','" . JText::_('SAT', true) . "','" . JText::_('SUN', true) . "'";
} else {
    $startWeekDay = 1;
    $dayNames = "'" . JText::_('SUN', true) . "','" . JText::_('MON', true) . "','" . JText::_('TUE', true) . "','" . JText::_('WED', true) . "','" . JText::_('THU', true) . "','" . JText::_('FRI', true) . "','" . JText::_('SAT', true) . "'";
}

$document->addScriptDeclaration("
    jQuery(document).ready(function() {
        var monthNames = [" . $smonthNames . "];
        var dayNames = [" . $dayNames . "];
    
        jQuery('#mod_aecalendar2').bic_calendar({
           enableSelect: false,
            dayNames: dayNames,
            monthNames: monthNames,
            showDays: true,
            displayMonthController: true,
            displayYearController: true,
            startWeekDay: " . $startWeekDay . ",
            popoverOptions : {placement: 'left', html: true, trigger: 'hover'},
            tooltipOptions : {placement: 'bottom', trigger: 'hover'},
            reqAjax: {
                type: 'get',                
                url : 'index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aebiccalendar&format=json&at=" . json_encode($at) . "&pt=" . json_encode($pt) . "&et=" . json_encode($et) . "&dt=" . json_encode($dt) . "&st=" . json_encode($st) . "&ct=" . json_encode($ct) . "&lt=" . json_encode($lt) . "&Itemid=" . $Itemid . "&h=" . $h . "',
            }
        });
    });
");

?>

<div id="mod_aecalendar2" class="<?php echo $moduleclass_sfx; ?>"></div>