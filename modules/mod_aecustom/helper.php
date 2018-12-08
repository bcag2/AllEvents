<?php

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelper'))
    require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

/**
 * modAECustomHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class modAECustomHelper
{
    /**
     * modAECustomHelper::getRecords()
     *
     * @param       $params
     * @param int $type
     * @param int $mcount
     * @param array $at
     * @param array $lt
     * @param array $pt
     * @param array $dt
     * @param array $st
     * @param array $ct
     * @param array $et
     * @param int $h
     * @param int $r
     *
     * @return mixed
     * @internal param mixed $params
     */
    function getRecords($params, $type = 0, $mcount = 0, $at = [], $lt = [], $pt = [], $dt = [], $st = [], $ct = [], $et = [], $h = 0, $r = 0)
    {
        //$database = JFactory::getDbo();
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);

        $query->select('a.*, a.id event_id, a.titre event_titre, pl.titre place_titre, pl.ville place_ville, ca.titre category_titre, ag.titre agenda_titre');
        $query->from('`#__allevents_events` AS a');
        $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt = date(a.date)');
        $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = a.agenda_id and ag.published = 1');
        $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = a.activity_id and ac.published = 1');
        $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = a.category_id and ca.published = 1');
        $query->leftJoin('`#__allevents_places` AS pl ON pl.id = a.place_id and pl.published = 1');
        $query->where('(ifnull(a.publishingdate,now()) <= now())');
        $query->where('(a.cancelled = 0)');
        $query->where('(a.proposal  = 0)');

        if ($type == 0) {
            $query->where('(a.published = 1)');
            $query->where("((DATE_FORMAT(a.date,'%Y%m%d') >= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
            $query->order('cal.dt ASC, weight DESC');
        } else {
            $query->where('(a.published != 0)');
            $query->where("((DATE_FORMAT(a.enddate,'%Y%m%d') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
            $query->order('cal.dt ASC, weight ASC');
        }

        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
        }

        $at = implode(",", $at);
        $lt = implode(",", $lt);
        $pt = implode(",", $pt);
        $dt = implode(",", $dt);
        $st = implode(",", $st);
        $ct = implode(",", $ct);
        $et = implode(",", $et);

        if (!empty($at)) {
            $query->where('(a.agenda_id IN (' . $at . '))');
        }

        if (!empty($pt)) {
            $query->where('(a.activity_id IN (' . $pt . '))');
        }

        if (!empty($dt)) {
            $query->where('(a.public_id IN (' . $dt . '))');
        }

        if (!empty($st)) {
            $query->where('(a.section_id IN (' . $st . '))');
        }

        if (!empty($ct)) {
            $query->where('(a.category_id IN (' . $ct . '))');
        }

        if (!empty($lt)) {
            $query->where('(a.place_id IN (' . $lt . '))');
        }

        if (!empty($et)) {
            $query->where('(a.ressource_id IN (' . $et . '))');
        }

        if (isset($h) && ((int)$h > 0)) {
            $query->where('(a.hot = 1)');
        }

        if (isset($r) && ((int)$r > 0)) {
            $query->where('(a.enrolment_enabled = 1)');
        }

        $query->setLimit($mcount);
        $db->setQuery($query, 0);
        $items = $db->loadObjectList();

        $langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
        $curlang = JFactory::getLanguage()->getTag();

        if (count($items)) {
            foreach ($items as $item) {
                $item->event = new stdClass;
                $item->date_format = $params->get("gdate_format");
                $item->time_format = $params->get("gtime_format");

                foreach ($langs as $lg) {
                    if ($lg->lang_code == $curlang) {
                        $montitre = 'titre' . $lg->postfix;
                        $mondate_format = 'date_format' . $lg->postfix;
                        $montime_format = 'time_format' . $lg->postfix;
                        $mondescription = 'description' . $lg->postfix;
                        $item->titre = empty($item->$montitre) ? $item->titre : $item->$montitre;
                        $item->date_format = empty($item->$mondate_format) ? $item->date_format : $item->$mondate_format;
                        $item->time_format = empty($item->$montime_format) ? $item->time_format : $item->$montime_format;
                        $item->description = empty($item->$mondescription) ? $item->description : $item->$mondescription;
                    }
                }
            }
        }

        return $items;
    }

    /**
     * modAECustomHelper::getItemId()
     *
     * @return mixed
     */
    function getItemId()
    {
        // get database object
        $database = JFactory::getDbo();
        $database->setQuery("SELECT id FROM `#__menu` AS a WHERE link LIKE ('%index.php?option=com_allevents%')");
        $Itemid = $database->loadResult();

        return $Itemid;
    }
}
