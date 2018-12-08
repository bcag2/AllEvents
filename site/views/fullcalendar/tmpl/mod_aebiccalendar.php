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
// $oldid = - 1 ;
if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                $rowArray['date'] = $item->startaebic;
                $rowArray['title'] = $item->titre;
                $rowArray['link'] = $item->link;
                $rowArray['color'] = $item->textColor;
                $rowArray['content'] = ''; //$item->descriptionbic;
                array_push($aEvents, $rowArray);
            }
        }
    }
}
echo json_encode($aEvents);

