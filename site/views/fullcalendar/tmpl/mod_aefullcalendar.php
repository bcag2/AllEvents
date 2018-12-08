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
            $rowArray['id'] = $item->id;
            $rowArray['title'] = $item->titre;
            $rowArray['start'] = $item->startISO;
            $rowArray['end'] = $item->endISO;
            $rowArray['url'] = $item->link;
            $rowArray['borderColor'] = $item->borderColor;
            $rowArray['textColor'] = $item->textColor;
            $rowArray['backgroundColor'] = $item->backgroundColor;

            array_push($aEvents, $rowArray);
        }
    }
}
echo json_encode($aEvents);

