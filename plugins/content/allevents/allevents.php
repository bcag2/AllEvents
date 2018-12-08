<?php

/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */
defined('_JEXEC') or die;
// Import Joomla! Plugin library file
jimport('joomla.plugin.plugin');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

JLoader::import('components.com_allevents.helpers.allevents', JPATH_ADMINISTRATOR);

/**
 * Class PlgContentAllEvents
 */
class PlgContentAllEvents extends JPlugin
{
    /**
     * Constructor
     *
     * @param   object &$subject The object to observe
     * @param   array $config An optional associative array of configuration settings.
     *                             Recognized key values include 'name', 'group', 'params', 'language'
     *                             (this list is not meant to be comprehensive).
     *
     * @since   1.5
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    /**
     * @param $context
     * @param $item
     * @param $articleParams
     *
     * @return bool
     */
    public function onContentPrepare($context, $item, $articleParams)
    {
        $gparams = AllEventsHelperParam::getGlobalParam();
        $document = JFactory::getDocument();
        $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
        $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aelist.css'));
        $arrMonthNames = $gparams['arrmonthNamesShort'];

        // Count how many times we need to process events
        $count = substr_count($item->text, '{{#aeevents');
        $id_event_fixed = false;
        for ($i = 0; $i < $count; $i++) {
            // Check for parameters
            preg_match('/{{#aeevents\s*.*?}}/i', $item->text, $starts, PREG_OFFSET_CAPTURE);
            preg_match('/{{\/aeevents}}/i', $item->text, $ends, PREG_OFFSET_CAPTURE);

            // Extract the parameters
            //$start = $starts[0][1] + strlen($starts[0][0]);
            $end = $ends[0][1];
            $params = explode(' ', str_replace(['{{#aeevents', '}}'], '', $starts[0][0]));

            // Load the module
            JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_allevents/models', 'AllEventsModel');
            $model = JModelLegacy::getInstance('Events', 'AllEventsModel', ['ignore_request' => true]);

            // Set some default variables
            $model->getState();
            $model->setState('list.limit', 5);
            $model->addParam('sort_by', 0);
            $model->addParam('period', 0);
            $model->addParam('pivot', 0);

            foreach ($params as $string) {
                $string = trim($string);
                if (!$string) {
                    continue;
                }

                $paramKey = null;
                $paramValue = null;
                $parts = explode('=', $string);
                if (count($parts) > 0) {
                    $paramKey = $parts[0];
                }
                if (count($parts) > 1) {
                    $paramValue = $parts[1];
                }
                // agenda_id
                if ($paramKey == 'aid') {
                    $model->addParam('a', $paramValue);
                } // event_id
                elseif ($paramKey == 'eid') {
                    $model->addParam('eid', $paramValue);
                    $id_event_fixed = true;
                } // activity_id
                elseif ($paramKey == 'pid') {
                    $model->addParam('p', $paramValue);
                } //public_id
                elseif ($paramKey == 'did') {
                    $model->addParam('d', $paramValue);
                } // section_id
                elseif ($paramKey == 'sid') {
                    $model->addParam('s', $paramValue);
                } // category_id
                elseif ($paramKey == 'cid') {
                    $model->addParam('c', $paramValue);
                } // place_id
                elseif ($paramKey == 'lid') {
                    $model->addParam('l', $paramValue);
                } // ressource_id
                elseif ($paramKey == 'rid') {
                    $model->addParam('e', $paramValue);
                } elseif ($paramKey == 'limit') {
                    $model->setState('list.limit', (int)$paramValue);
                } elseif ($paramKey == 'order') {
                    $model->setState('list.ordering', $paramValue);
                } elseif ($paramKey == 'orderdir') {
                    $model->setState('list.direction', $paramValue);
                } elseif ($paramKey == 'period') {
                    $model->addParam('period', $paramValue);
                } elseif ($paramKey == 'pivot') {
                    $model->addParam('pivot', $paramValue);
                } elseif ($paramKey == 'sort_by') {
                    $model->addParam('sort_by', $paramValue);
                }
            }

            if ($id_event_fixed) {
                $model->addParam('sort_by', 0);
                $model->addParam('period', 0);
                $model->addParam('pivot', 0);
            }
            // Get the events
            $events = $model->getItems();
            // $gparams = AllEventsHelperParam::getGlobalParam();

            $sReturn = '<div class="aelist">';

            if (!empty($events)) {
                foreach ($events as $obj) {
                    if (isset($obj->vignette) && ($obj->vignette <> "")) {
                        // $Image = $obj->vignette;
                    } else {
                        //  $Image = JUri::root(true) . '/media/com_allevents/css/images/no_photo.png';
                    }
                    // $sReturn .= '<a >' ; 
                    $sReturn .= '  <div class="addthisevent-drop" title="" href="' . $obj->event_link . '">';
                    $sReturn .= '    <div class="date">';
                    $sReturn .= '        <span class="mon">' . $arrMonthNames[$obj->start_month - 1] . '</span>';
                    $sReturn .= '        <span class="day">' . $obj->start_day . '</span>';
                    $sReturn .= '    </div>';
                    $sReturn .= '    <div class="desc">';
                    $sReturn .= '        <p>';
                    $sReturn .= '            <strong class="hed">' . $obj->titre . '</strong>';
                    if ($obj->allday == 0) {
                        $sReturn .= '<span class="des">';
                        $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($gparams['gtime_format'])) . ' &ndash; ' . JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($gparams['gtime_format']));
                        $sReturn .= '</span>';
                    }
                    $sReturn .= '        </p>';
                    $sReturn .= '    </div>';
                    $sReturn .= '  </div>';
                    // $sReturn .= '</a>';
                }
            }
            $sReturn .= '</div>';

            // Set the output on the item
            $item->text = substr_replace($item->text, $sReturn, $starts[0][1], $end + 13 - $starts[0][1]);
        }

        return true;
    }
}
