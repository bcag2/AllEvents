<?php

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelper'))
    require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';
use Joomla\Utilities\ArrayHelper;

/**
 * modAECalendarHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class modAECalendarHelper
{
    /**
     * modAECalendarHelper::getItems()
     *
     * @param $params
     *
     * @return mixed
     */
    public static function getItems($params)
    {
        $gparams = AllEventsHelperParam::getGlobalParam();
        $show_eventallday = $gparams['gshow_eventallday'];

        $at = (array)$params->get('at', []);
        $pt = (array)$params->get('pt', []);
        $dt = (array)$params->get('dt', []);
        $st = (array)$params->get('st', []);
        $ct = (array)$params->get('ct', []);
        $lt = (array)$params->get('lt', []);
        $et = (array)$params->get('et', []);
        ArrayHelper::toInteger($at);
        ArrayHelper::toInteger($lt);
        ArrayHelper::toInteger($pt);
        ArrayHelper::toInteger($dt);
        ArrayHelper::toInteger($st);
        ArrayHelper::toInteger($ct);
        ArrayHelper::toInteger($et);
        $at = implode(",", $at);
        $lt = implode(",", $lt);
        $pt = implode(",", $pt);
        $dt = implode(",", $dt);
        $st = implode(",", $st);
        $ct = implode(",", $ct);
        $et = implode(",", $et);

        $h = $params->get('h', 0);
        $r = $params->get('r', 0);

        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('a.*, DATE_FORMAT(cal.dt,"%Y") start_year,DATE_FORMAT(cal.dt,"%m") start_month,DATE_FORMAT(cal.dt,"%d") start_day,  DATE_FORMAT(a.date, "%Y-%m-%d %H:%i") mydatetime,DATE_FORMAT(a.enddate, "%Y-%m-%d %H:%i") myenddatetime');
        $query->select('a.id event_id, a.alias event_alias');
        $query->select('ag.couleur, ag.couleur_texte, ag.titre as agenda_titre');
        $query->select('ac.couleur as activity_couleur, ac.couleur_texte as activity_couleur_texte, ac.titre as activity_titre');
        $query->select('ca.couleur as category_couleur, ca.couleur_texte as category_couleur_texte, ca.titre as category_titre');
        $query->select('pl.titre as place_titre');
        $query->from('`#__allevents_events` AS a');
        $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = a.agenda_id and ag.published = 1');
        $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = a.activity_id and ac.published = 1');
        $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = a.category_id and ca.published = 1');
        $query->leftJoin('`#__allevents_places` AS pl ON pl.id = a.place_id and pl.published = 1');
        if ($show_eventallday) {
            $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt between date(a.date) and date(a.enddate)');
        } else {
            $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt = date(a.date)');
        }
        $query->where('(a.published = 1)');
        $query->where('(ifnull(a.publishingdate,now()) <= now())');
        $query->where('(a.cancelled = 0)');
        $query->where('(a.proposal  = 0)');
        // Implement View Level Access
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
            $query->where('(ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))');
        }

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

        $query->order('cal.dt ASC, weight DESC');
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
}