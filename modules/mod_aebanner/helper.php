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
 * modAEBannerHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.4
 */
abstract class modAEBannerHelper
{
    /**
     * modAEBannerHelper::getItems()
     *
     * @param mixed $params
     *
     * @return array|null
     * @internal param int $nb
     * @internal param int $itemIntroTextWordLimit
     * @internal param int $myevents
     * @internal param int $myenrolments
     */
    public static function getItems(&$params)
    {
        jimport('joomla.filesystem.file');
        $user = JFactory::getUser();
        $db = JFactory::getDbo();

        $jnow = JFactory::getDate();
        $now = $jnow->toSql();

        $nb = (int)$params->get('nb', 5);
        $itemIntroTextWordLimit = (int)$params->get('itemIntroTextWordLimit', 100);
        $myevents = (int)$params->get('myevents', 0);
        $myenrolments = (int)$params->get('myenrolments', -1);

        $query = " SELECT i.*, i.titre as title, i.created_date created,";
        $query .= " c.titre AS categoryname, c.id AS agenda_id, c.alias AS categoryalias, '' AS categoryparams,";
        $query .= " c.titre AS agenda_titre, c.vignette agenda_vignette,";
        $query .= " activity.vignette activity_vignette,";
        $query .= " category.vignette category_vignette,";
        $query .= " place.titre place_titre";
        $query .= " FROM #__allevents_events as i ";
        $query .= " LEFT JOIN #__allevents_agenda c ON c.id = i.agenda_id AND c.published = 1 ";
        if (!$user->authorise('core.admin')) {
            $query .= " AND c.access IN(" . implode(',', $user->getAuthorisedViewLevels()) . ")";
        }
        $query .= " LEFT JOIN #__allevents_activities activity ON activity.id = i.activity_id";
        $query .= " LEFT JOIN #__allevents_categories category ON category.id = i.category_id";
        $query .= " LEFT JOIN #__allevents_places place ON place.id = i.place_id";
        $query .= " WHERE i.published = 1 ";
        if (!$user->authorise('core.admin')) {
            $query .= " AND i.access IN(" . implode(',', $user->getAuthorisedViewLevels()) . ") ";
        }
        $query .= " AND ((DATE_FORMAT(i.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(i.date,'%Y%m%d') and DATE_FORMAT(i.enddate,'%Y%m%d')))";

        if ($params->get('pt')) {
            $cid = $params->get('pt', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.activity_id IN (" . $implode . "))";
            }
        }

        if ($params->get('at')) {
            $cid = $params->get('at', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.agenda_id IN (" . $implode . "))";
            }
        }

        if ($params->get('ct')) {
            $cid = $params->get('ct', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.category_id IN (" . $implode . "))";
            }
        }

        if ($params->get('lt')) {
            $cid = $params->get('lt', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.place_id IN (" . $implode . "))";
            }
        }

        if ($params->get('dt')) {
            $cid = $params->get('dt', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.public_id IN (" . $implode . "))";
            }
        }

        if ($params->get('st')) {
            $cid = $params->get('st', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.section_id IN (" . $implode . "))";
            }
        }

        if ($params->get('et')) {
            $cid = $params->get('et', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.ressource_id IN (" . $implode . "))";
            }
        }

        if ($params->get('h', 0)) {
            $query .= " AND i.hot = 1";
        }

        if ($params->get('r', 0)) {
            $query .= " AND i.enrolment_enabled = 1";
        }

        if ($myevents > 0) {
            $query .= " AND i.proposed_by = " . $user->get('id');
        }

        if ($myenrolments > -1) {
            $query .= " inner join #__allevents_enrolments` AS e ON e.event_id = i.id and e.enroltype = " . (int)$myenrolments . " and user_id =" . $user->get('id');
        }

        $query .= " ORDER BY i.date ASC, i.weight";
        $db->setQuery($query, 0, $nb);
        $items = $db->loadObjectList();

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

                $image = 'imageSmall';
                if (isset($item->$image)) {
                    $item->image = $item->$image;
                } else {
                    $item->image = JUri::base(true) . '/modules/mod_aebanner/assets/images/no-image.png';
                }
                //Read more link
                $item->link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);

                //Category link
                if ($params->get('itemCategory')) {
                    $item->categoryLink = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $item->agenda_id, false);
                }

                // Introtext
                $item->introtext = AllEventsHelperString::cleanText($item->description, $itemIntroTextWordLimit);

                $rows[] = $item;
            }

            return $rows;
        }

        return null;
    }

    /**
     * modAEListHelper::getVignette()
     *
     * @param mixed $obj
     * @param mixed $dc
     * @param boolean $default
     *
     * @return string
     * @since 3.3.4.6
     */
    public static function getVignette($obj, $dc, $default = true)
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
            if ((empty($Image) || (!file_exists($Image))) && $default) {
                $Image = JUri::root(true) . '/media/com_allevents/css/images/no_photo.png';
            }
        }

        return ($Image);
    }
}
