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
                $rowArray['link'] = $item->link;
                $rowArray['titre'] = $item->titre;
                $rowArray['date'] = $item->start;
                $rowArray['enddate'] = $item->end;
                $rowArray['activity'] = $item->activity_titre;
                $rowArray['agenda'] = $item->agenda_titre;
                $rowArray['place'] = $item->place_titre;
                $rowArray['hot'] = $item->hot;
                array_push($aEvents, $rowArray);
            }
        }
    }
}

echo json_encode($aEvents);
