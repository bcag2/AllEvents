<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
$params = AllEventsHelperParam::getGlobalParam();
$document = JFactory::getDocument();
JHtml::_('jquery.framework');
JHtml::_('jquery.ui');

$module = JModuleHelper::getModule('mod_aecalendar');
$moduleParams = new JRegistry();
$moduleParams->loadString($module->params);
// parameters
$startWeekDay = $moduleParams->get('startWeekDay');
if (empty($startWeekDay))
    $startWeekDay = $params['gfirstday_week'];

$display_template = $moduleParams->get('display_template');

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/gcal.js');

$document->addStyleSheet('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/cupertino/jquery-ui.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.css');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aefullcalendar.css'));
$document->addStyleSheet('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/' . $display_template . '/jquery-ui.css');

$document->addScriptDeclaration("
(function($){
    $(document).ready(function () {
        $('#mod_aecalendarfc').fullCalendar({
            theme: true, // support des themes UI
            header: {
                left: 'prev,next',
                right: 'title'
            },
            // add event name to title attribute on mouseover
            eventMouseover: function(event, jsEvent, view) {
                if (view.name !== 'agendaDay') {
                    $(jsEvent.target).attr('title', event.title);
                }
            },
            loading: function (bool) {
                if (bool) {
                    var position = $('#mod_aecalendarfc').position();
                    $('.modaecfc_loading').css('left', position.left).css('top', position.top).css('width', $('#mod_aefullcalendar').width()).css('height', $('#mod_aefullcalendar').height()).show();
                } else {
                    $('.modaecfc_loading').hide();
                }
            }, // loading
            monthNames: [ " . $params['monthNames'] . "],
            dayNamesShort: [ " . $params['dayNamesShort'] . "],
            firstDay: " . $startWeekDay . ",
            events: {
                url: 'index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aefullcalendar&format=json',
                type: 'GET',
                data: {
                    at: '" . json_encode($at) . "',
                    pt: '" . json_encode($pt) . "',
                    dt: '" . json_encode($dt) . "',
                    st: '" . json_encode($st) . "',
                    ct: '" . json_encode($ct) . "',
                    lt: '" . json_encode($lt) . "',
                    h: '" . $h . "',
                    dc: '" . $dc . "',
                    dct: '" . $dct . "',
                    dcb: '" . $dcb . "',
                    mod:1
                }, // data
                error: function () {
                    alert('Loading_Error');
                } // error
            } // events
        });
    }); // document.ready(function ($)
})(jQuery);
");
?>
<div class='modaecfc_loading'></div>
<div id="mod_aecalendarfc"></div>