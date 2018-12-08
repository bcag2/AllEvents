<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

$dates = [];
$app = JFactory::getApplication();

$dc = $app->input->getInt('dc');
$dcb = $app->input->getInt('dcb');

if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                if (empty($dc)) {
                    $class = ($dcb == 0) ? 'se_agenda_' . $item->agenda_id . '_color' : 'se_agenda_' . $item->agenda_id . '_forecolor';
                } elseif ($dc == 1) {
                    $class = ($dcb == 0) ? 'se_activity_' . $item->activity_id . '_color' : 'se_activity_' . $item->activity_id . '_forecolor';
                } elseif ($dc == 2) {
                    $class = ($dcb == 0) ? 'se_category_' . $item->category_id . '_color' : 'se_category_' . $item->category_id . '_forecolor';
                }

                $dates[$item->id] = [
                    'event_id' => $item->event_id,
                    'date' => $item->startaezabuto,
                    'badge' => false,
                    'title' => $item->titre . ' - ' . $item->start,
                    'body' => $item->description,
                    'classname' => $class,
                    'link' => $item->link,
                    'footer' => ''];
            }
        }
    }
}
echo json_encode($dates);
