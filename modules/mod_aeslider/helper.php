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
 * modAESliderHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 *
 * inspired by JoomShaper http://www.joomshaper.com slider
 */
class modAESliderHelper
{
    /**
     * modAESliderHelper::getItems()
     *
     * @param mixed $params
     *
     * @return array|null
     */
    public static function getItems(&$params)
    {
        jimport('joomla.filesystem.file');
        //$mainframe = JFactory::getApplication();
        $limit = $params->get('itemCount', 5);
        //$componentParams = AllEventsHelperParam::getGlobalParam();

        $user = JFactory::getUser();
        $db = JFactory::getDbo();

        $jnow = JFactory::getDate();
        $now = $jnow->toSql();
        //$nullDate = $db->getNullDate();

        $query = " SELECT i.*, i.titre as title, i.created_date created,";
        $query .= " c.titre AS categoryname, c.id AS agenda_id, c.alias AS categoryalias, '' AS categoryparams";
        $query .= " FROM #__allevents_events as i ";
        $query .= " JOIN #__allevents_agenda c ON c.id = i.agenda_id";
        $query .= " WHERE i.published = 1 ";
        $query .= " AND c.published = 1 ";
        if (!$user->authorise('core.admin')) {
            $query .= " AND i.access IN(" . implode(',', $user->getAuthorisedViewLevels()) . ") ";
            $query .= " AND c.access IN(" . implode(',', $user->getAuthorisedViewLevels()) . ")";
        }
        $query .= " AND ( i.date > " . $db->quote($now) . " )";

        if ($params->get('catfilter')) {
            $cid = $params->get('category_id', null);
            ArrayHelper::toInteger($cid);
            $implode = implode(",", $cid);
            if (!empty($implode)) {
                $query .= " AND (i.agenda_id IN (" . $implode . "))";
            }
        }

        if ($params->get('h')) {
            $query .= " AND i.hot = 1";
        }

        if ($params->get('r')) {
            $query .= " AND i.enrolment_enabled = 1";
        }

        $query .= " ORDER BY i.date ASC";

        $db->setQuery($query, 0, $limit);
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
                //Clean title
                $item->title = JFilterOutput::ampReplace($item->titre);

                //Images
                $item->imageSmall = $item->vignette;
                $item->imageXLarge = $item->affiche;

                $image = 'image' . $params->get('itemImgSize', 'XLarge');
                if (isset($item->$image)) {
                    if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $image)) {
                        $item->image = $item->$image;
                    } else {
                        $item->image = JUri::base(true) . '/' . $item->$image;
                    }
                } else {
                    $item->image = JUri::base(true) . '/modules/mod_aeslider/assets/images/no-image.png';
                }
                //Read more link
                $item->link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);

                //Category link
                if ($params->get('itemCategory')) {
                    $item->categoryLink = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $item->agenda_id, false);
                }

                // Introtext
                $item->text = '';
                if ($params->get('itemIntroText')) {
                    $maxLength = ((int)$params->get('itemIntroTextWordLimit') > 0) ? (int)$params->get('itemIntroTextWordLimit') : 100;
                    $item->introtext = AllEventsHelperString::cleanText($item->description, $maxLength);
                }
                $rows[] = $item;
            }

            return $rows;
        }

        return null;
    }
}
