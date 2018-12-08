<?php
/**
 * Cette page est appelée par le code AJAX de la vue FullCalendar et elle construit les listes déroulantes pour la proposition des filtres (agenda, activité, lieux)
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
$media = 'images/com_allevents/bullets/';
$params = AllEventsHelperParam::getGlobalParam();

$sReturn = '<div id="conteneur">';

// Liste des agendas
if ($params['controlpanel_showagendas']) {
    $sReturn .= '<select name="AEFC-search-agendas" id="AEFC-search-agendas">';
    $agendas = $this->item->agendas;
    $sReturn .= '<option value="0" class="avatar" title="' . $media . 'agenda.png">' . JText::_('AGENDA') . '</option>';

    if (isset($agendas)) {
        foreach ($agendas as $obj) {
            if (isset($obj->image_bullet)) {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
            } else {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="">' . $obj->titre . '</option>';
            }
        }
    }

    $sReturn .= '</select>';
}

// Liste des activités
if ($params['controlpanel_showactivities']) {
    $sReturn .= '<select name="AEFC-search-activities" id="AEFC-search-activities">';
    $activities = $this->item->activities;
    $sReturn .= '<option value="0" class="avatar" title="' . $media . 'activity.png">' . JText::_('ACTIVITY') . '</option>';
    if (isset($activities)) {
        foreach ($activities as $obj) {
            if (isset($obj->image_bullet)) {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
            } else {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="">' . $obj->titre . '</option>';
            }
        }
    }
    $sReturn .= '</select>';
}

// Liste des lieux
if ($params['controlpanel_showplaces']) {
    $sReturn .= '<select name="AEFC-search-places" id="AEFC-search-places">';
    $places = $this->item->places;
    $sReturn .= '<option value="0" class="avatar" title="' . $media . 'map.png">' . JText::_('PLACE') . '</option>';
    if (isset($places)) {
        foreach ($places as $obj) {
            if (isset($obj->image_bullet)) {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
            } else {
                $sReturn .= '<option value="' . $obj->id . '" class="avatar" title="">' . $obj->titre . '</option>';
            }
        }
    }
    $sReturn .= '</select>';
}

$sReturn .= '</div>'; //conteneur

echo $sReturn;

