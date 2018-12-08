<?php

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (!class_exists('AllEventsHelper'))
    require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

use Joomla\Utilities\ArrayHelper;

/**
 * modAEDeckHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 */
abstract class modAEDeckHelper
{
    /**
     * modAEDeckHelper::getItems()
     *
     * @param $params
     *
     * @return array|null
     */
    public static function getItems($params)
    {
        jimport('joomla.filesystem.file');

        $nb = $params->get('itemCount');
        $at = (array)$params->get('at');
        $itemImgSize = $params->get('itemImgSize', 'XLarge');
        $itemCategory = $params->get('itemCategory', 'XLarge');
        $itemIntroText = $params->get('itemIntroText', 'XLarge');
        $itemIntroTextWordLimit = $params->get('itemIntroTextWordLimit', 'XLarge');
        $h = $params->get('h', 0);
        $r = $params->get('r', 0);

        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('"" as introtext, a.*, a.titre as title, DATE_FORMAT(a.date, "%Y-%m-%d %H:%i") mydatetime, DATE_FORMAT(a.enddate, "%Y-%m-%d %H:%i") myenddatetime');
        $query->select('ag.vignette as agenda_vignette, ag.couleur, ag.couleur_texte, a.agenda_id, ag.titre as agenda_titre');
        $query->select('ac.vignette as activity_vignette, ac.couleur as activity_couleur, ac.couleur_texte as activity_couleur_texte, a.activity_id, ac.titre as activity_titre');
        $query->select('ca.vignette as category_vignette, ca.couleur as category_couleur, ca.couleur_texte as category_couleur_texte, a.category_id, ca.titre as category_titre');
        $query->select('a.place_id, pl.titre as place_titre');
        $query->select('a.public_id, pu.titre as public_titre');
        $query->select('a.ressource_id, re.titre as ressource_titre');
        $query->select('a.section_id, se.titre as section_titre');
        $query->select('a.description');
        $query->from('`#__allevents_events` AS a');
        $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = a.agenda_id and ag.published = 1');
        $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = a.activity_id and ac.published = 1');
        $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = a.category_id and ca.published = 1');
        $query->leftJoin('`#__allevents_places` AS pl ON pl.id = a.place_id and pl.published = 1');
        $query->leftJoin('`#__allevents_public` AS pu ON pu.id = a.public_id and pu.published = 1');
        $query->leftJoin('`#__allevents_ressources` AS re ON re.id = a.ressource_id and re.published = 1');
        $query->leftJoin('`#__allevents_sections` AS se ON se.id = a.section_id and se.published = 1');
        $query->where('(a.published = 1)');
        $query->where('(a.cancelled = 0)');
        $query->where('(a.proposal  = 0)');
        $query->where('(ifnull(a.publishingdate,now()) <= now())');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
            $query->where('(ifnull(pu.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pu.access=0))');
            $query->where('(ifnull(re.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (re.access=0))');
            $query->where('(ifnull(se.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (se.access=0))');
        }

        ArrayHelper::toInteger($at);
        $implode = implode(",", $at);
        if (!empty($implode)) {
            $query->where('a.agenda_id IN (' . $implode . ')');
        }

        // ArrayHelper::toInteger($pt);
        // $implode = implode(",", $pt);
        // if (!empty($implode)) {
        // $query->where('a.activity_id IN (' . $implode . ')');
        // }

        // ArrayHelper::toInteger($dt);
        // $implode = implode(",", $dt);
        // if (!empty($implode)) {
        // $query->where('a.public_id IN (' . $implode . ')');
        // }

        // ArrayHelper::toInteger($st);
        // $implode = implode(",", $st);
        // if (!empty($implode)) {
        // $query->where('a.section_id IN (' . $implode . ')');
        // }

        // ArrayHelper::toInteger($ct);
        // $implode = implode(",", $ct);
        // if (!empty($implode)) {
        // $query->where('a.category_id IN (' . $implode . ')');
        // }

        // ArrayHelper::toInteger($lt);
        // $implode = implode(",", $lt);
        // if (!empty($implode)) {
        // $query->where('a.place_id IN (' . $implode . ')');
        // }

        // ArrayHelper::toInteger($et);
        // $implode = implode(",", $et);
        // if (!empty($implode)) {
        // $query->where('a.ressource_id IN (' . $implode . ')');
        // }

        if ($h > 0) {
            $query->where('(a.hot = 1)');
        }

        if ($r > 0) {
            $query->where('(a.enrolment_enabled = 1)');
        }

        // a supprimer si un jour on passer avec les paramètres
        if (empty($specific_days)) $specific_days = 10;
        if (empty($specific_date)) $specific_date = '2010-01-01';

        if (isset($from_days)) {
            if ($from_days == -3600) {
                //nothing
            } elseif ($from_days == -30) {
                $query->where('(a.created_date >= DATE_ADD(NOW(),INTERVAL -1 MONTH))');
            } elseif ($from_days == -7) {
                $query->where('(a.created_date >= DATE_ADD(NOW(),INTERVAL -7 DAY))');
            } elseif ($from_days == 1) {
                // $specific_days
                $query->where('(a.created_date >= DATE_ADD(NOW(),INTERVAL -' . $specific_days . ' DAY))');
            } elseif ($from_days == 2) {
                // $specific_date
                $query->where('(DATE_FORMAT(a.created_date,"%Y-%m-%d") >= "' . $specific_date . '")');
            }
        }

        if (isset($tableperiod)) {
            switch ($tableperiod) {
                case 0: // ALL
                    break;
                case 1: // NEXTANDCURRENT
                    $query->where("((DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
                    break;
                case 2: // PASTANDCURRENT
                    $query->where("((DATE_FORMAT(a.enddate,'%Y%m%d') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
                    break;
                case 3: // TODAY
                    $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d'))");
                    break;
                default:
                    $query->where("((DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
            }
        } else {
            $query->where("((DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
        }

        if (isset($tablesort_by)) {
            switch ($tablesort_by) {
                case 0: // EVENTS_SORT_BY_DATE_ASC
                    $query->order('case a.allday when 0 then a.date when 1 then date(a.date) end ASC, weight DESC');
                    break;
                case 1: // EVENTS_SORT_BY_DATE_DESC
                    $query->order('case a.allday when 0 then a.date when 1 then date(a.date) end DESC, weight DESC');
                    break;
                case 2: // EVENTS_SORT_BY_ENDDATE_ASC
                    $query->order('case a.allday when 0 then a.enddate when 1 then date(a.enddate) end ASC, weight DESC');
                    break;
                case 3: // EVENTS_SORT_BY_ENDDATE_DESC
                    $query->order('case a.allday when 0 then a.enddate when 1 then date(a.enddate) end DESC, weight DESC');
                    break;
                case 4: // EVENTS_SORT_BY_MOST_VIEWED
                    $query->order('a.hits DESC, weight DESC');
                    break;
                default:
                    $query->order('case a.allday when 0 then a.date when 1 then date(a.date) end ASC, weight DESC');
            }
        } else {
            $query->order('case a.allday when 0 then a.date when 1 then date(a.date) end ASC, weight DESC');
        }

        $db->setQuery($query);
        $db->execute();
        $nbrows = $db->getNumRows();

        // if NumRows <= limit there is no interest to display list
        if ($nbrows <= $nb) {
            //$showurl = 0;
        }
        $db->setQuery($query, 0, $nb);
        $items = $db->loadObjectList();
        $rows = [];
        if (count($items)) {
            $langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
            $curlang = JFactory::getLanguage()->getTag();
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
                //Clean title
                $item->title = JFilterOutput::ampReplace($item->titre);

                //Images
                $item->imageSmall = JUri::base(true) . '/' . $item->vignette;
                $item->imageXLarge = JUri::base(true) . '/' . $item->affiche;

                $image = 'image' . $itemImgSize;
                if (isset($item->$image)) {
                    $item->image = $item->$image;
                } else {
                    $item->image = JUri::base(true) . '/modules/mod_aeslider/assets/images/no-image.png';
                }
                //Read more link
                $item->link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);

                //Calendar link
                if ($itemCategory) {
                    $item->categoryLink = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $item->agenda_id, false);
                }

                // Introtext
                $item->introtext = '';
                if ($itemIntroText) {
                    $maxLength = ((int)$itemIntroTextWordLimit > 0) ? (int)$itemIntroTextWordLimit : 70;
                    $item->introtext = AllEventsHelperString::cleanText($item->description, $maxLength);
                }
                $rows[] = $item;
            }

            return $rows;
        }

        return null;
    }

    /**
     * modAEListHelper::getLink()
     *
     * @param mixed $obj
     * @param mixed $Itemid
     *
     * @return string
     * @since 3.4.5.1
     */
    public static function getLink($obj, $Itemid)
    {
        return AllEventsHelperRoute::getEventRoute($obj->id, $obj->alias);
    }

    /**
     * modAEDeckHelper::getVignette()
     *
     * @param mixed $obj
     * @param mixed $dc
     *
     * @return string
     * @since 3.3.4.6
     */
    public static function getVignette($obj, $dc)
    {
        $vignette_defaut = "";
        if (empty($dc)) {
            $vignette_defaut = $obj->agenda_vignette;
        } elseif ($dc == 1) {
            $vignette_defaut = $obj->activity_vignette;
        } elseif ($dc == 2) {
            $vignette_defaut = $obj->category_vignette;
        }

        if (!empty($obj->vignette)) {
            $Image = $obj->vignette;
        } elseif (!empty($vignette_defaut)) {
            $Image = $vignette_defaut;
        }

        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $Image)) {
            // URL : do nothing
        } else {
            if (empty($Image) || (!file_exists($Image))) {
                $Image = JUri::root(true) . '/media/com_allevents/css/images/no_photo.png';
            }
        }

        return ($Image);
    }
}