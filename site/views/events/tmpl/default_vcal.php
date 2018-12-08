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
$v = new vCalendar();
$config = ["unique_id" => "allevents3.com", "filename" => "allevents3.ics"];
$v->setConfig($config);
$v->setProperty("x-wr-calname", "Calendar Allevents");
$v->setProperty("X-WR-CALDESC", "Events extraction");
$v->setProperty("X-WR-TIMEZONE", "UTC");
$v->setProperty('method', 'PUBLISH');

$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select('a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level');
$query->from($db->quoteName('#__usergroups') . ' AS a');
$query->join('LEFT', $db->quoteName('#__usergroups') . ' AS b ON a.lft > b.lft AND a.rgt < b.rgt');
$query->group('a.id, a.title, a.lft, a.rgt');
$query->order('a.lft ASC');
$db->setQuery($query);
$options = $db->loadObjectList();

for ($i = 0, $n = count($options); $i < $n; $i++) {
    $usergroups[$options[$i]->value] = $options[$i]->text;
}

foreach ($this->items as $item) {
    $vevent = new vevent();
    $vevent->setProperty('summary', $item->titre);
    $vevent->setProperty('dtstart', JHtml::date($item->date, 'Ymd', 'UTC') . 'T' . JHtml::date($item->date, 'Hi', 'UTC') . '00Z');
    $vevent->setProperty('dtend', JHtml::date($item->enddate, 'Ymd', 'UTC') . 'T' . JHtml::date($item->enddate, 'Hi', 'UTC') . '00Z');
    $vevent->setProperty('description', strip_tags($item->description));
    if (!empty($item->activity_titre)) {
        $vevent->setProperty('categories', $item->activity_titre);
    }
    if (!empty($item->agenda_titre)) {
        $vevent->setProperty('categories', $item->agenda_titre);
    }
    if (!empty($item->category_titre)) {
        $vevent->setProperty('categories', $item->category_titre);
    }
    if (!empty($item->public_titre)) {
        $vevent->setProperty('categories', $item->public_titre);
    }
    if (!empty($item->ressource_titre)) {
        $vevent->setProperty('resources', $item->ressource_titre);
    }
    if (!empty($item->section_titre)) {
        $vevent->setProperty('categories', $item->section_titre);
    }
    $vevent->setProperty('location', $item->place_titre . ' - ' . $item->place_adress);
    $vevent->setProperty('status', ($item->proposal) ? JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_PROPOSAL') : '');
    $vevent->setProperty('class', $usergroups[$item->access]);
    $vevent->setProperty('priority', ($item->hot) ? JText::_('JYES') : JText::_('JNO'));
    $vevent->setProperty('url', $item->link);
    $vevent->setUid($item->id);
    if ($item->contact_name != '') {
        $vevent->setOrganizer($item->contact_name, $item->contact_email);
    }

    $v->setComponent($vevent);
}
$v->returnCalendar();
// le exit est obligatoire !
exit;

