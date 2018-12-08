<?php
defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html') {
    return;
}

/**
 * plgAlleventsRichSnippets
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsRichSnippets extends JPlugin
{
    /**
     * plgAlleventsRichSnippets::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_richsnippets', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsRichSnippets::onAlleventsRichSnippetsEvent()
     *
     * @param mixed $item
     * @param mixed $params
     *
     * @return string
     * @throws Exception
     * @internal param mixed $enrolments
     */
    public function onAlleventsRichSnippetsEvent(&$item, &$params)
    {
        $app = JFactory::getApplication();
        if ($app->getName() != 'site') {
            return "";
        }

        $sContent = '<script type="application/ld+json">';
        $sContent .= '{';
        $sContent .= '"@context": "http://schema.org",';
        $sContent .= '"@type": "Event",';

        \JPluginHelper::importPlugin('allevents');
        $aggregateRating = \JFactory::getApplication()->triggerEvent('onAlleventsGetEventRating', [&$item, &$params]);
        foreach ($aggregateRating as $line) {
            if (!empty($line)) {
                $sContent .= $line;
            }
        }

        if (!empty($item->place_id) && ($item->place_id > 0)) {
            $sContent .= '"location" : {';
            $sContent .= '"@type" : "Place",';
            $sContent .= '"sameAs" : "' . substr(JUri::root(), 0, -1) . $item->place_link . '",';
            $sContent .= '"name" : "' . ($item->place_title) . '",';
            if (!empty($item->place_latitude) && !empty($item->place_longitude)) {
                $sContent .= '"geo": {';
                $sContent .= '"@type": "GeoCoordinates",';
                $sContent .= '"latitude": "' . $item->place_latitude . '",';
                $sContent .= '"longitude": "' . $item->place_longitude . '"';
                $sContent .= '},';
            }
            $sContent .= '"address" : "' . ($item->place_adress) . '"';
            $sContent .= '},';
        } else {
            $sContent .= '"location" : {';
            $sContent .= '"@type" : "Place",';
            $sContent .= '"sameAs" : "",';
            $sContent .= '"name" : "",';
            $sContent .= '"address" : ""';
            $sContent .= '},';
        }
        if (!empty($item->banniere)) {
            $sContent .= '"image": "' . JUri::root() . $item->banniere . '",';
        } elseif (!empty($item->affiche)) {
            $sContent .= '"image": "' . JUri::root() . $item->affiche . '",';
        } elseif (!empty($item->vignette)) {
            $sContent .= '"image": "' . JUri::root() . $item->vignette . '",';
        }

        $introtext = AllEventsHelperString::cleanText($item->description, 200);

        $sContent .= '"description": "' . (trim($introtext)) . '",';
        $sContent .= '"name": "' . ($item->titre) . '",';
        if ($item->allday) {
            $sContent .= '"startDate" : "' . JHtml::date($item->date, 'Y-m-d') . '",';
            $sContent .= '"endDate" : "' . JHtml::date($item->enddate, 'Y-m-d') . '",';
        } else {
            $sContent .= '"startDate" : "' . JHtml::date($item->date, 'Y-m-d') . 'T' . JHtml::date($item->date, 'H:i') . '",';
            $sContent .= '"endDate" : "' . JHtml::date($item->enddate, 'Y-m-d') . 'T' . JHtml::date($item->enddate, 'H:i') . '",';
        }
        $sContent .= '"url" : "' . JUri::root() . AllEventsHelperRoute::getEventRoute($item->id, $item->alias) . '",';
        $sContent .= '"eventStatus" : "EventScheduled",';
        $sContent .= '"offers": {';
        $sContent .= '"@type": "Offer",';
        if (($item->enrolment_enabled == 1) && ($item->closingdate == 0) && (!$item->eventfull)) {
            $sContent .= '"availability": "http://schema.org/InStock",';
        } else {
            $sContent .= '"availability": "http://schema.org/SoldOut",';
        }
        $sContent .= '"name" : "General Admission",';
        $sContent .= '"price": "' . $item->price . '",';
        $sContent .= '"priceCurrency": "EUR",';
        $sContent .= '"url": "' . JUri::root() . AllEventsHelperRoute::getEventRoute($item->id, $item->alias) . '"';
        $sContent .= '}';
        $sContent .= '}';
        $sContent .= '</script>';

        return $sContent;
    }

    /**
     * plgAlleventsRichSnippets::onAlleventsRichSnippetsEvents()
     *
     * @param mixed $items
     * @param mixed $params
     *
     * @return string
     * @throws Exception
     */
    public function onAlleventsRichSnippetsEvents(&$items, &$params)
    {
        $app = JFactory::getApplication();
        if ($app->getName() != 'site') {
            return "";
        }
        $first = true;
        $sContent = '<script type="application/ld+json">';
        $sContent .= '[';
        foreach ($items as $item) {
            if ($first) {
                $sContent .= '{';
                $first = false;
            } else {
                $sContent .= ',{';
            }
            $sContent .= '"@context": "http://schema.org",';
            $sContent .= '"@type": "Event",';
            if (!empty($item->place_id) && ($item->place_id > 0)) {
                $sContent .= '"location" : {';
                $sContent .= '"@type" : "Place",';
                $sContent .= '"sameAs" : "' . substr(JUri::root(), 0, -1) . $item->place_link . '",';
                $sContent .= '"name" : "' . ($item->place_title) . '",';
                if (!empty($item->place_latitude) && !empty($item->place_longitude)) {
                    $sContent .= '"geo": {';
                    $sContent .= '"@type": "GeoCoordinates",';
                    $sContent .= '"latitude": "' . $item->place_latitude . '",';
                    $sContent .= '"longitude": "' . $item->place_longitude . '"';
                    $sContent .= '},';
                }
                $sContent .= '"address" : "' . ($item->place_adress) . '"';
                $sContent .= '},';
            } else {
                $sContent .= '"location" : {';
                $sContent .= '"@type" : "Place",';
                $sContent .= '"sameAs" : "",';
                $sContent .= '"name" : "",';
                $sContent .= '"address" : ""';
                $sContent .= '},';
            }
            if (!empty($item->affiche)) {
                $sContent .= '"image": "' . JUri::root() . $item->affiche . '",';
            } elseif (!empty($item->vignette)) {
                $sContent .= '"image": "' . JUri::root() . $item->vignette . '",';
            }

            $introtext = AllEventsHelperString::cleanText($item->description, 200);

            $sContent .= '"description": "' . (trim($introtext)) . '",';
            $sContent .= '"name": "' . ($item->titre) . '",';
            if ($item->allday) {
                $sContent .= '"startDate" : "' . JHtml::date($item->date, 'Y-m-d') . '",';
                $sContent .= '"endDate" : "' . JHtml::date($item->enddate, 'Y-m-d') . '",';
            } else {
                $sContent .= '"startDate" : "' . JHtml::date($item->date, 'Y-m-d') . 'T' . JHtml::date($item->date, 'H:i') . '",';
                $sContent .= '"endDate" : "' . JHtml::date($item->enddate, 'Y-m-d') . 'T' . JHtml::date($item->enddate, 'H:i') . '",';
            }
            $sContent .= '"url" : "' . JUri::root() . AllEventsHelperRoute::getEventRoute($item->id, $item->alias) . '",';
            $sContent .= '"eventStatus" : "EventScheduled",';
            $sContent .= '"offers": {';
            $sContent .= '"@type": "Offer",';
            if (($item->enrolment_enabled == 1) && ($item->closingdate == 0) && (!$item->eventfull)) {
                $sContent .= '"availability": "http://schema.org/InStock",';
            } else {
                $sContent .= '"availability": "http://schema.org/SoldOut",';
            }
            $sContent .= '"name" : "General Admission",';
            $sContent .= '"price": "00.00",';
            $sContent .= '"priceCurrency": "EUR",';
            $sContent .= '"url": "' . JUri::root() . AllEventsHelperRoute::getEventRoute($item->id, $item->alias) . '"';
            $sContent .= '}';
            $sContent .= '}';
        }
        $sContent .= ']';
        $sContent .= '</script>';

        return $sContent;
    }

    /**
     * plgAlleventsRichSnippets::onAlleventsRichSnippetsPlace()
     *
     * @param mixed $item
     * @param mixed $params
     *
     * @return string
     * @throws Exception
     */
    public function onAlleventsRichSnippetsPlace(&$item, &$params)
    {
        $app = JFactory::getApplication();
        if ($app->getName() != 'site') {
            return "";
        }
        $sContent = '<script type="application/ld+json">';
        $sContent .= '{';
        $sContent .= '"@context": "http://schema.org",';
        $sContent .= '"@type" : "Place",';
        if (!empty($item->id) && ($item->id > 0)) {
            $sContent .= '"sameAs" : "' . substr(JUri::root(), 0, -1) . $item->place_link . '",';
            $sContent .= '"name" : "' . $item->titre . '",';
            if (!empty($item->latitude) && !empty($item->longitude)) {
                $sContent .= '"geo": {';
                $sContent .= '"@type": "GeoCoordinates",';
                $sContent .= '"latitude": "' . $item->latitude . '",';
                $sContent .= '"longitude": "' . $item->longitude . '"';
                $sContent .= '},';
            }
            $sContent .= '"address" : "' . urlencode($item->place_adress) . '"';
        } else {
            $sContent .= '"sameAs" : "",';
            $sContent .= '"name" : "",';
            $sContent .= '"address" : ""';
        }
        $sContent .= '}';
        $sContent .= '</script>';

        return $sContent;
    }
}
