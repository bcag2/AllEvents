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
                $rowArray['title'] = $item->titre;
                $rowArray['date'] = $item->startaecal;
                $rowArray['url'] = $item->link;
                $rowArray['textColor'] = $item->backgroundColor;
                $rowArray['type'] = 'meeting';
                $rowArray['description'] = '';
                array_push($aEvents, $rowArray);
            }
        }
    }
}
echo json_encode($aEvents);
