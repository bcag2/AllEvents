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

foreach ($this->events as $event) {
    if (isset($event)) {
        foreach ($event as $item) {
            // données Fullcalendar
            $rowArray['id'] = $item->event_id;
            $rowArray['title'] = $item->titre;
            $rowArray['allDay'] = $item->allDay;
            $rowArray['start'] = $item->startISO;
            $rowArray['end'] = $item->endISO;
            $rowArray['start'] = $item->startaefc;
            $rowArray['end'] = $item->endaefc;

            // $rowArray['start'] = $item->startdateISO.'T'.$item->starttimeISO.':00';
            // $rowArray['end'] = $item->enddateISO.'T'.$item->endtimeISO.':00';
            $rowArray['url'] = $item->link;
            $rowArray['className'] = $item->className;
            $rowArray['editable'] = true;
            $rowArray['backgroundColor'] = $item->backgroundColor;
            $rowArray['borderColor'] = $item->borderColor;
            $rowArray['textColor'] = $item->textColor;
            $rowArray['startEditable'] = true;
            $rowArray['durationEditable'] = true;

            // données Fullcalendar facultatives
            // rendering : Allows alternate rendering of the event Can be empty, "background", or "inverse-background"
            // overlap : Determines if events on the calendar, when dragged and resized, are allowed to overlap each other.
            // constraint : Limits event dragging and resizing to certain windows of time.
            // source : An "event source" is anything that provides FullCalendar with data about events.
            // color : définition de backgroundColor, borderColor, textColor en une seule fois (pas utilisé)

            // données non fullcalendar
            $rowArray['description'] = $item->description;
            $rowArray['link'] = '';
            $rowArray['type_action'] = $item->type_action;
            $rowArray['activity_id'] = $item->activity_id;
            $rowArray['agenda_id'] = $item->agenda_id;
            $rowArray['place_id'] = $item->place_id;
            $rowArray['activity_titre'] = $item->activity_titre;
            $rowArray['agenda_titre'] = $item->agenda_titre;
            $rowArray['place_titre'] = $item->place_titre;
            $rowArray['enrolment_max_participant'] = $item->enrolment_max_participant;
            $rowArray['hot'] = $item->hot;
            $rowArray['canenrol'] = $item->canenrol;
            $rowArray['affiche'] = $item->affiche;
            $rowArray['banniere'] = $item->banniere;
            array_push($aEvents, $rowArray);
        }
    }
}
echo json_encode($aEvents);
