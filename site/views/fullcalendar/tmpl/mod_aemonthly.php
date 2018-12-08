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
echo '<?xml version="1.0"?>';
echo '<monthly>';

if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                echo '<event>';
                echo '    <id>' . $item->event_id . '</id>';
                echo '    <name>' . htmlspecialchars(addslashes($item->titre)) . '</name>';
                echo '    <startdate>' . $item->startdateISO . '</startdate>';
                echo '    <enddate>' . $item->enddateISO . '</enddate>';
                echo (!empty($item->starttimeISO) || $item->allDay) ? '<starttime>' . $item->starttimeISO . '</starttime>' : '';
                echo (!empty($item->endtimeISO) || $item->allDay) ? '<endtime>' . $item->endtimeISO . '</endtime>' : '';
                echo '    <color>' . $item->backgroundColor . '</color>';
                echo '    <url>' . $item->link . '</url>';
                echo '</event>';
            }
        }
    }
}

echo '</monthly>';