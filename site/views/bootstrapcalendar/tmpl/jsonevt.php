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
$aReturn = [];
$aEvents = [];
$rowArray = [];
if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                $rowArray['id'] = $item->id;
                $rowArray['title'] = $item->titre;
                $rowArray['start'] = strtotime(JHtml::date($item->date, 'Y-m-d H:i:00')) . "000";
                $rowArray['end'] = strtotime(JHtml::date($item->enddate, 'Y-m-d H:i:00')) . "000";
                $rowArray['class'] = $item->classNameBS . "_" . $this->params['gaebs_bullet'];
                $rowArray['url'] = $item->link;
                array_push($aEvents, $rowArray);
            }
        }
    }
}
$aReturn['success'] = 1;
$aReturn['result'] = $aEvents;

echo json_encode($aReturn);

