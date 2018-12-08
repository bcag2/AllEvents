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
 * Génération du code HTML qui sera affiché lorsque l'utilisateur va cliquer sur le bouton "Ajouter une localisation"
 */

jimport('joomla.html.html.select');

global $HTML_placeToAdd;

$HTML_placeToAdd = '';
$HTML_placeToAdd .= '<div id="placeToAdd" style="display: none; width:400px; font-size: 12px;">';
$HTML_placeToAdd .= '   <fieldset><legend>' . JText::_('GENERAL_INFORMATION') . ' </legend>';
$HTML_placeToAdd .= '      <div class="frm_title">' . JText::_('TITLE') . '*</div>';
$HTML_placeToAdd .= '      <div class="frm_value"><input class="inputbox" name="title_place" id="AEFC-placeToAdd-title" maxlength="60" size="60" value="" onchange="" type="text"></div>';
$HTML_placeToAdd .= '   </fieldset>';
$HTML_placeToAdd .= '   <fieldset>';
$HTML_placeToAdd .= '      <legend>' . JText::_('PLACES_RUE_INFO') . ' </legend>';
$HTML_placeToAdd .= '         <div>';
$HTML_placeToAdd .= '            <div class="frm_title">' . JText::_('PLACES_RUE') . '</div>';
$HTML_placeToAdd .= '            <div class="frm_value"><input class="inputbox" name="address_place" id="AEFC-placeToAdd-address" size="60" type="text"></div>';
$HTML_placeToAdd .= '         </div>';
$HTML_placeToAdd .= '         <div>';
$HTML_placeToAdd .= '            <div class="frm_title">' . JText::_('PLACES_CODEPOSTAL') . '</div>';
$HTML_placeToAdd .= '            <div class="frm_value"><input class="inputbox" name="zipcode_place" id="AEFC-placeToAdd-zipcode" size="10" type="text"></div>';
$HTML_placeToAdd .= '         </div>';
$HTML_placeToAdd .= '         <div>';
$HTML_placeToAdd .= '            <div class="frm_title">' . JText::_('PLACES_VILLE') . '</div>';
$HTML_placeToAdd .= '            <div class="frm_value"><input class="inputbox" name="city_place" id="AEFC-placeToAdd-city" size="60" type="text"></div>';
$HTML_placeToAdd .= '         </div>';
$HTML_placeToAdd .= '   </fieldset>';
$HTML_placeToAdd .= '</div>';

