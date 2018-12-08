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
$aEvents = [];
$rowArray = [];
if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                $rowArray['DT_RowId'] = $item->event_id;
                $rowArray['id'] = $item->event_id;
                $rowArray['titre'] = $item->titre;
                $rowArray['date'] = $item->start;
                $rowArray['enddate'] = $item->end;
                $rowArray['link'] = $item->link;
                $rowArray['agenda_image_bullet'] = '<img alt="' . $item->agenda_titre . '" title="' . $item->agenda_titre . '" src="' . JUri::root(true) . '/' . $item->agenda_image_bullet . '"></img>';
                $rowArray['activity_image_bullet'] = '<img alt="' . $item->activity_titre . '" title="' . $item->activity_titre . '" src="' . JUri::root(true) . '/' . $item->activity_image_bullet . '"></img>';
                $rowArray['place_image_bullet'] = '<img alt="' . $item->place_titre . '" title="' . $item->place_titre . '" src="' . JUri::root(true) . '/' . $item->place_image_bullet . '"></img>';
                $rowArray['hot'] = $item->hot;
                $rowArray['enrolment_max_participant'] = $item->enrolment_max_participant;
                $rowArray['nb_enrolyes'] = $item->nb_enrolyes;
                $rowArray['allow_overbooking'] = $item->allow_overbooking;
                $rowArray['enrolment_enabled'] = $item->enrolment_enabled;
                $rowArray['enrolments'] = $item->enrolments;
                array_push($aEvents, $rowArray);
            }
        }
    }
}

echo json_encode($aEvents);
