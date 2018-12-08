<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;
/**
 * Génération du code HTML qui sera affiché lorsque l'utilisateur va cliquer sur le bouton "Ajouter un évènement"
 */

jimport('joomla.html.html.select');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

global $HTML_eventToUpdate;
global $cbxAgendas;
global $cbxActivities;
global $cbxPlaces;

/**
 * @param $id
 * @param $cbxAgendas
 * @param $cbxActivities
 * @param $cbxPlaces
 *
 * @return string
 */
function tabGeneral($id, $cbxAgendas, $cbxActivities, $cbxPlaces)
{
    $params = AllEventsHelperParam::getGlobalParam();

    $HTML_NewEvent = '';
    $HTML_NewEvent .= '<div id="dtBox"></div>';
    $HTML_NewEvent .= '<div id="AEFC-eventToUpdate-tabs' . $id . '">';
    $HTML_NewEvent .= '   <table cellspacing="0" cellpadding="0" class="cb-table">';
    $HTML_NewEvent .= '         <tr style="display: none;">';
    $HTML_NewEvent .= '            <th class="cb-key">ID :</th>';
    $HTML_NewEvent .= '            <td class="cb-value">';
    $HTML_NewEvent .= '               <div class="textbox-fill-wrapper">';
    $HTML_NewEvent .= '                  <div class="textbox-fill-mid">';
    $HTML_NewEvent .= '                     <input type="text" class="textbox-fill-input cb-event-title-input" maxlength="60" id="AEFC-eventToUpdate-eventID">';
    $HTML_NewEvent .= '                  </div>';
    $HTML_NewEvent .= '               </div>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '         </tr>';

    $HTML_NewEvent .= '         <tr>';
    $HTML_NewEvent .= '            <th class="cb-key">' . JText::_('EVENT_TITLE') . '&nbsp;:</th>';
    $HTML_NewEvent .= '            <td class="cb-value">';
    $HTML_NewEvent .= '               <div class="textbox-fill-wrapper">';
    $HTML_NewEvent .= '                  <div class="textbox-fill-mid">';
    $HTML_NewEvent .= '                     <input type="text" class="textbox-fill-input cb-event-title-input" id="AEFC-eventToUpdate-eventName">';
    $HTML_NewEvent .= '                  </div>';
    $HTML_NewEvent .= '               </div>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '         </tr>';

    $HTML_NewEvent .= '         <tr>';
    $HTML_NewEvent .= '            <th class="cb-key">' . JText::_('EVENT_DATE') . '&nbsp;:</th>';
    $HTML_NewEvent .= '            <td class="cb-value">';

    $HTML_NewEvent .= '               <div class="textbox-fill-wrapper">';
    $HTML_NewEvent .= '                  <div id="AEFC-eventToUpdate-Pair" class="textbox-fill-mid">';
    $HTML_NewEvent .= '                     <input id="AEFC-eventToUpdate-Start" class="date-input date start" type="text" placeholder="' . strtoupper($params['gdate_formatAE']) . '" />';
    $HTML_NewEvent .= '                     <input id="AEFC-eventToUpdate-Start-Time" class="time-input time start" type="text" placeholder="' . strtoupper($params['gtime_formatAE']) . '"/>';
    $HTML_NewEvent .= '                     &nbsp;' . JText::_('COM_ALLEVENTS_DATETIMES_TO') . '&nbsp;';
    $HTML_NewEvent .= '                     <input id="AEFC-eventToUpdate-End-Time" class="time-input time end" type="text" placeholder="' . strtoupper($params['gtime_formatAE']) . '"/>';
    $HTML_NewEvent .= '                     <input id="AEFC-eventToUpdate-End" class="date-input date end" type="text" placeholder="' . strtoupper($params['gdate_formatAE']) . '"/>';
    $HTML_NewEvent .= '                  </div>';
    $HTML_NewEvent .= '               </div>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '         </tr>';
    $HTML_NewEvent .= '    </table>';

    $HTML_NewEvent .= '   <select id="AEFC-eventToUpdate-agendas">' . $cbxAgendas . '</select>';
    $HTML_NewEvent .= '   <select id="AEFC-eventToUpdate-activities">' . $cbxActivities . '</select>';
    $HTML_NewEvent .= '   <select id="AEFC-eventToUpdate-places">' . $cbxPlaces . '</select>';

    $HTML_NewEvent .= '   <input id="AEFC-eventToUpdate-hot" type="checkbox" class="checkbox-star" data-label="hot"/>';
    $HTML_NewEvent .= '   <input id="AEFC-eventToUpdate-enrolment_max_participant" class="textbox-fill-input cb-event-title-input" type="text"/>';
    $HTML_NewEvent .= '</div>';

    return $HTML_NewEvent;
}

/**
 * @param $id
 *
 * @return string
 */
function tabRecurrence($id)
{
    $HTML_NewEvent = '<div id="AEFC-eventToUpdate-tabs' . $id . '">';
    $HTML_NewEvent .= '  <table width="100%" cellspacing="0" cellpadding="4">';
    $HTML_NewEvent .= '     <tbody>';
    $HTML_NewEvent .= '        <tr>';
    $HTML_NewEvent .= '            <td>' . JText::_('COM_ALLEVENTS_REPEAT') . '</td>';
    $HTML_NewEvent .= '            <td>';
    $HTML_NewEvent .= '                <select class="AErrule" id="repeat-event-dialog-repeat-type">';
    $HTML_NewEvent .= '                    <option value="none">' . JText::_('JNONE') . '</option>';
    $HTML_NewEvent .= '                    <option value="daily">' . JText::_('COM_ALLEVENTS_DAILY') . '</option>';
    $HTML_NewEvent .= '                    <option value="weekly">' . JText::_('COM_ALLEVENTS_WEEKLY') . '</option>';
    $HTML_NewEvent .= '                    <option value="monthly">' . JText::_('COM_ALLEVENTS_MONTHLY') . '</option>';
    $HTML_NewEvent .= '                    <option value="yearly">' . JText::_('COM_ALLEVENTS_YEARLY') . '</option>';
    $HTML_NewEvent .= '                </select>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';
    $HTML_NewEvent .= '        <tr class="AErrule" id="repeat-event-dialog-interval" style="display: none;">';
    $HTML_NewEvent .= '            <td>' . JText::_('COM_ALLEVENTS_REPEATS_EVERY') . '</td>';
    $HTML_NewEvent .= '            <td>';
    // Liste de jours
    $HTML_NewEvent .= JHtml::_('select.integerlist', 1, 31, 1, 'repeat-event-dialog-interval', 'id="repeat-event-dialog-interval" class="AErrule"', 1);

    $HTML_NewEvent .= '                <span id="repeat-event-dialog-interval-time-unit">' . JText::_('DAYS') . '</span>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';
    $HTML_NewEvent .= '        <tr class="AErrule" id="repeat-event-dialog-weekly-repeat-days-row" style="display: none;">';
    $HTML_NewEvent .= '            <td>' . JText::_('COM_ALLEVENTS_REPEATS_EVERY') . '</td>';
    $HTML_NewEvent .= '            <td>';

    $HTML_NewEvent .= '                <div class="AErrule" id="repeat-event-dialog-weekly-repeat-days">';
    $HTML_NewEvent .= '                   <input type="checkbox" value="0" id="repeat-event-dialog-weekly-repeat-day-0" /><label for="repeat-event-dialog-weekly-repeat-day-0">' . JText::_('MON') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="1" id="repeat-event-dialog-weekly-repeat-day-1" /><label for="repeat-event-dialog-weekly-repeat-day-1">' . JText::_('TUE') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="2" id="repeat-event-dialog-weekly-repeat-day-2" /><label for="repeat-event-dialog-weekly-repeat-day-2">' . JText::_('WED') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="3" id="repeat-event-dialog-weekly-repeat-day-3" /><label for="repeat-event-dialog-weekly-repeat-day-3">' . JText::_('THU') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="4" id="repeat-event-dialog-weekly-repeat-day-4" /><label for="repeat-event-dialog-weekly-repeat-day-4">' . JText::_('FRI') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="5" id="repeat-event-dialog-weekly-repeat-day-5" /><label for="repeat-event-dialog-weekly-repeat-day-5">' . JText::_('SAT') . '</label>';
    $HTML_NewEvent .= '                   <input type="checkbox" value="6" id="repeat-event-dialog-weekly-repeat-day-6" /><label for="repeat-event-dialog-weekly-repeat-day-6">' . JText::_('SUN') . '</label>';
    $HTML_NewEvent .= '                </div>';

    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';
    $HTML_NewEvent .= '        <tr class="AErrule" id="repeat-event-dialog-monthly-repeat-options-row" style="display: none;">';
    $HTML_NewEvent .= '            <td>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '            <td>';
    $HTML_NewEvent .= '                <div class="AErrule" id="repeat-event-dialog-monthly-repeat-options">';
    $HTML_NewEvent .= '                    <div class="group">';
    $HTML_NewEvent .= '                        <input type="radio" checked="checked" name="repeat-event-dialog-monthly-repeat-options" id="repeat-event-dialog-monthly-repeat-options-day-of-the-month-radio">';
    $HTML_NewEvent .= '                        <label id="repeat-event-dialog-monthly-repeat-options-day-of-the-month-radio" for="repeat-event-dialog-monthly-repeat-options-day-of-the-month-radio">' . JText::_('DAY') . '</label>';
    $HTML_NewEvent .= '                        <input type="text" class="number-input-s" id="repeat-event-dialog-monthly-repeat-options-day-of-the-month">';
    $HTML_NewEvent .= '                    </div>';
    $HTML_NewEvent .= '                    <div class="group">';
    $HTML_NewEvent .= '                        <input type="radio" name="repeat-event-dialog-monthly-repeat-options" id="repeat-event-dialog-monthly-repeat-options-day-of-the-week-radio">';
    $HTML_NewEvent .= '                        <select id="repeat-event-dialog-monthly-repeat-options-day-of-the-week-weekindex">';
    $HTML_NewEvent .= '                            <option value="1">' . JText::_('COM_ALLEVENTS_FIRST') . '</option>';
    $HTML_NewEvent .= '                            <option value="2">' . JText::_('COM_ALLEVENTS_SECOND') . '</option>';
    $HTML_NewEvent .= '                            <option value="3">' . JText::_('COM_ALLEVENTS_THIRD') . '</option>';
    $HTML_NewEvent .= '                            <option value="4">' . JText::_('COM_ALLEVENTS_FOURTH') . '</option>';
    $HTML_NewEvent .= '                            <option value="5">' . JText::_('COM_ALLEVENTS_LAST') . '</option>';
    $HTML_NewEvent .= '                        </select>';
    $HTML_NewEvent .= '                        <select id="repeat-event-dialog-monthly-repeat-options-day-of-the-week-dayindex">';
    $HTML_NewEvent .= '                            <option value="1">' . JText::_('MONDAY') . '</option><option value="2">' . JText::_('TUESDAY') . '</option><option value="3">' . JText::_('WEDNESDAY') . '</option><option value="4">' . JText::_('THURSDAY') . '</option><option value="5">' . JText::_('FRIDAY') . '</option><option value="6">' . JText::_('SATURDAY') . '</option><option value="0">' . JText::_('SUNDAY') . '</option></select>';
    $HTML_NewEvent .= '                    </div>';
    $HTML_NewEvent .= '                </div>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';
    $HTML_NewEvent .= '        <tr class="AErrule" id="repeat-event-dialog-end-date-row" style="display: none;">';
    $HTML_NewEvent .= '            <td class="v-a-top">' . JText::_('COM_ALLEVENTS_ENDS') . '</td>';
    $HTML_NewEvent .= '            <td>';
    $HTML_NewEvent .= '                <div class="group">';
    // $HTML_NewEvent .= '                    <input type="radio" name="repeat-event-dialog-end" id="repeat-event-dialog-after-radio">' ;
    $HTML_NewEvent .= '                    <label id="repeat-event-dialog-after-radio" for="repeat-event-dialog-after-radio">' . JText::_('COM_ALLEVENTS_AFTER') . '</label>';
    $HTML_NewEvent .= '                    <input type="text" id="repeat-event-dialog-count">' . JText::_('COM_ALLEVENTS_REPEAT') . '</div>';
    // $HTML_NewEvent .= '                <div class="group">' ;
    // $HTML_NewEvent .= '                    <input type="radio" name="repeat-event-dialog-end" id="repeat-event-dialog-end-date-radio">' ;
    // $HTML_NewEvent .= '                    <label for="repeat-event-dialog-end-date-radio">' ;
    // $HTML_NewEvent .= '                        On                            </label>' ;
    // $HTML_NewEvent .= '                    <input type="text" disabled="disabled" class="date-input hasDatepicker" id="repeat-event-dialog-end-date">' ;
    // $HTML_NewEvent .= '                </div>' ;
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';

    $HTML_NewEvent .= '        <tr>';
    $HTML_NewEvent .= '            <td>';
    $HTML_NewEvent .= '               <em id="repeat-event-dialog-text-output">' . JText::_('COM_ALLEVENTS_NO_RECURRENCE') . '</em>';
    $HTML_NewEvent .= '            </td>';
    $HTML_NewEvent .= '        </tr>';
    $HTML_NewEvent .= '      </tbody>';
    $HTML_NewEvent .= '   </table>';
    $HTML_NewEvent .= '</div>';

    return $HTML_NewEvent;
} // function tabRecurrence()
/**
 * @param $id
 *
 * @return string
 */
function tabDescription($id)
{
    $HTML_NewEvent = '    <div id="AEFC-eventToUpdate-tabs' . $id . '">';
    $HTML_NewEvent .= '       <table cellspacing       ="0" cellpadding="0" class="cb-table">';
    $HTML_NewEvent .= '             <tr>';
    $HTML_NewEvent .= '                <th class       ="cb-key">' . JText::_('EVENT_DESC') . '&nbsp;:</th>';
    $HTML_NewEvent .= '                <td class       ="cb-value">';
    $HTML_NewEvent .= '                   <textarea id ="AEFC-eventToUpdate-description" style="min-height:250px;">';
    $HTML_NewEvent .= '                      Description';
    $HTML_NewEvent .= '                   </textarea>';
    $HTML_NewEvent .= '                </td>';
    $HTML_NewEvent .= '             </tr>';
    $HTML_NewEvent .= '       </table>';
    $HTML_NewEvent .= '    </div>';

    return $HTML_NewEvent;
} // function tabDescription()
$HTML_eventToUpdate = '';
// Liste des onglets de l'écran de création
$HTML_eventToUpdate .= '<div id="eventToUpdate" style="display: none; width:400px; font-size: 12px;">';

$arr = [
    ['id' => 1, 'caption' => JText::_('COM_ALLEVENTS_GENERAL')],
    ['id' => 2, 'caption' => JText::_('COM_ALLEVENTS_DETAILS')],
    ['id' => 4, 'caption' => JText::_('COM_ALLEVENTS_RECURRENCE')]
];

$HTML_eventToUpdate .= '<div id="AEFC-eventToUpdate-tabs">';
$HTML_eventToUpdate .= tabGeneral($arr[0]['id'], $cbxAgendas, $cbxActivities, $cbxPlaces);
$HTML_eventToUpdate .= tabDescription($arr[1]['id']);
$HTML_eventToUpdate .= tabRecurrence($arr[2]['id']);

$HTML_eventToUpdate .= '</div>'; // AEFC-eventToUpdate-tabs

$HTML_eventToUpdate .= '</div>'; // eventToAdd

