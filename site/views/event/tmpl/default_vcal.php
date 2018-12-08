<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

require_once JPATH_SITE . '/components/com_allevents/helpers/iCalcreator.php';
require_once JPATH_SITE . '/components/com_allevents/helpers/lib/iCalBase.class.php';
require_once JPATH_SITE . '/components/com_allevents/helpers/lib/vcalendar.class.php';

$v = new vCalendar();
$config = ["unique_id" => "allevents3.com", "filename" => "allevents3.ics"];
$v->setConfig($config);
$v->setProperty("x-wr-calname", "Calendar Allevents");
$v->setProperty("X-WR-CALDESC", "Calendar Allevents");
$v->setProperty("X-WR-TIMEZONE", "UTC");
$v->setProperty('method', 'PUBLISH');

$vevent = new vevent();
$vevent->setProperty('summary', $this->item->titre);
$vevent->setProperty('dtstart', JHtml::date($this->item->date, 'Ymd', 'UTC') . 'T' . JHtml::date($this->item->date, 'Hi', 'UTC') . '00Z');
$vevent->setProperty('dtend', JHtml::date($this->item->enddate, 'Ymd', 'UTC') . 'T' . JHtml::date($this->item->enddate, 'Hi', 'UTC') . '00Z');
$vevent->setProperty('description', strip_tags($this->item->description));
$vevent->setProperty('location', $this->item->place_adress);
if (!empty($this->item->activity_title)) {
    $vevent->setProperty('categories', $this->item->activity_title);
}
if (!empty($this->item->agenda_title)) {
    $vevent->setProperty('categories', $this->item->agenda_title);
}
if (!empty($this->item->category_title)) {
    $vevent->setProperty('categories', $this->item->category_title);
}
if (!empty($this->item->public_title)) {
    $vevent->setProperty('categories', $this->item->public_title);
}
if (!empty($this->item->ressource_title)) {
    $vevent->setProperty('resources', $this->item->ressource_title);
}
if (!empty($this->item->section_title)) {
    $vevent->setProperty('categories', $this->item->section_title);
}

$vevent->setProperty('url', $this->item->event_link);
$vevent->setUid($this->item->id);
if (!empty($this->item->contact_name)) {
    $vevent->setOrganizer($this->item->contact_name, $this->item->contact_email);
}

$v->setComponent($vevent);
$v->returnCalendar();
// le exit est obligatoire !
exit;
