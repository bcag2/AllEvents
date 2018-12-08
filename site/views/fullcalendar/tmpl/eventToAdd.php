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

global $HTML_eventToAdd;
global $cbxAgendas;
global $cbxActivities;
global $cbxPlaces;

$HTML_eventToAdd = '';

$HTML_eventToAdd .= '<div id="eventToAdd" style="display: none; width:400px; font-size: 12px;">';
$HTML_eventToAdd .= '   <table cellspacing="0" cellpadding="0" class="cb-table">';
$HTML_eventToAdd .= '      <tbody>';
$HTML_eventToAdd .= '         <tr>';
$HTML_eventToAdd .= '            <th class="cb-key">' . JText::_('EVENT_DATE') . '&nbsp;:</th>';
$HTML_eventToAdd .= '            <td class="cb-value"><div id="AEFC-eventToAdd-eventDate"></div></td>';
$HTML_eventToAdd .= '         </tr>';
$HTML_eventToAdd .= '         <tr>';
$HTML_eventToAdd .= '            <th class="cb-key">' . JText::_('EVENT_TITLE') . '&nbsp;:</th>';
$HTML_eventToAdd .= '            <td class="cb-value">';
$HTML_eventToAdd .= '               <div class="textbox-fill-wrapper">';
$HTML_eventToAdd .= '                  <div class="textbox-fill-mid">';
$HTML_eventToAdd .= '                     <input type="text" class="textbox-fill-input cb-event-title-input" id="AEFC-eventToAdd-eventName">';
$HTML_eventToAdd .= '                  </div>';
$HTML_eventToAdd .= '               </div>';
$HTML_eventToAdd .= '               <div id="AEFC-eventToAdd-example" class="cb-example">' . JText::_('EVENT_EXAMPLE') . '</div>';
$HTML_eventToAdd .= '            </td>';
$HTML_eventToAdd .= '         </tr>';
$HTML_eventToAdd .= '      </tbody>';
$HTML_eventToAdd .= '   </table>';

$HTML_eventToAdd .= '   <select id="AEFC-eventToAdd-agendas">' . $cbxAgendas . '</select>';
$HTML_eventToAdd .= '   <select id="AEFC-eventToAdd-activities">' . $cbxActivities . '</select>';
$HTML_eventToAdd .= '   <select id="AEFC-eventToAdd-places">' . $cbxPlaces . '</select>';
$HTML_eventToAdd .= '   <input id="AEFC-eventToAdd-hot" type="checkbox" class="checkbox-star" data-label="hot"/>';
$HTML_eventToAdd .= '   <input id="AEFC-eventToAdd-enrolment_max_participant" class="textbox-fill-input cb-event-title-input" type="text"/>';

$HTML_eventToAdd .= '   <div style="display: none;">';
$HTML_eventToAdd .= '       <input id="AEFC-eventToAdd-eventStartDate" type="text"/><br/>';
$HTML_eventToAdd .= '       <input id="AEFC-eventToAdd-eventEndDate" type="text"/><br/>';
$HTML_eventToAdd .= '   </div>';
$HTML_eventToAdd .= '</div>';

