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
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addScript(AllEventsHelperOverride::GetScript('jquery-ui-1.10.4.custom.js'));
$document->addScript(AllEventsHelperOverride::GetScript('premium/mod_aedrag.js'));

$formatDate = 'Y-m-d';
$formatTime = 'H:i';
/**
 * @param $hex
 *
 * @return string
 */
function hex2rgb($hex)
{
    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = [$r, $g, $b];

    return implode(",", $rgb); // returns the rgb values separated by commas
}

// TODO : ajouter la notion de tri / priorités pour l'affichage des événements

echo "<div id='mod_aedrag' class = 'fc-rtl'>";
foreach ($Events as $event) {
    if (isset($event)) {
        $return = "<div data-id_agenda       = '" . $event->agenda_id . "'" .
            " data-id                        = '" . $event->id . "'" .
            " data-id_activity               = '" . $event->activity_id . "'" .
            " data-id_place                  = '" . $event->place_id . "'" .
            " data-hot                       = '" . $event->hot . "'" .
            " data-title                     = '" . $event->titre . "'" .
            " data-dstart                    = '" . JHtml::_('date', $event->date, AllEventsHelperDate::jVersionFormat($formatDate)) . "'" .
            " data-dend                      = '" . JHtml::_('date', $event->enddate, AllEventsHelperDate::jVersionFormat($formatDate)) . "'" .
            " data-hstart                    = '" . JHtml::_('date', $event->date, AllEventsHelperDate::jVersionFormat($formatTime)) . "'" .
            " data-hend                      = '" . JHtml::_('date', $event->enddate, AllEventsHelperDate::jVersionFormat($formatTime)) . "'" .
            " data-description               = '" . '' . "'" .
            " data-enrolment_max_participant = '" . '' . "'" .
            " style = 'background-color: rgb(" . hex2rgb($event->couleur) . "); " .
            "          border-color: rgb(" . hex2rgb($event->couleur_texte) . "); " .
            "          color: rgb(" . hex2rgb($event->couleur_texte) . "); " .
            "          text-align:left;'" .
            " class='external-event ui-draggable qtipOnLoad fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end se_agenda_" . $event->agenda_id . "_bullet ui-draggable'>" . $event->titre . "&nbsp;" . JHtml::_('date', $event->date, AllEventsHelperDate::jVersionFormat($formatTime)) .
            "</div>";
        echo $return;
    }
}
echo "</div>";   // id='external-events'

