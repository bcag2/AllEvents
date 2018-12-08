<?php

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

//###
if (!class_exists('multiLanguages'))
    require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/multiLanguages.php';
//###

/**
 * AllEventsHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelper
{
    /**
     * AllEventsHelper::addSubmenu()
     *
     * @param string $vName
     */
    public static function addSubmenu($vName = '')
    {
        $params = AllEventsHelperParam::getGlobalParam();

        $extension = JTable::getInstance('extension');
        $id = (int)$extension->find(['element' => 'com_allevents', 'type' => 'component']);
        $extension->load($id);
        $componentInfo = json_decode($extension->manifest_cache, true);
        $component_version = $componentInfo['version'];
        $component_name = $componentInfo['name'];

        JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_MAIN'), 'index.php?option=com_allevents&view=main', $vName == 'main');

        JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_EVENTS'), 'index.php?option=com_allevents&view=events', $vName == 'events');

        JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_EVENTSTOAPPROVE'), 'index.php?option=com_allevents&view=eventstoapprove', $vName == 'eventstoapprove');

        JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_ENROLMENTS'), 'index.php?option=com_allevents&view=enrolments', $vName == 'enrolments');

        if (JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
            $arrsatellites = [
                [
                    'activity',
                    'activities',
                    'COM_ALLEVENTS_TITLE_ACTIVITIES',
                    'COM_ALLEVENTS_INFO_ACTIVITIES',
                    'controlpanel_showactivities'],
                [
                    'agenda',
                    'agendas',
                    'COM_ALLEVENTS_TITLE_AGENDAS',
                    'COM_ALLEVENTS_INFO_AGENDAS',
                    'controlpanel_showagendas'],
                [
                    'category',
                    'categories',
                    'COM_ALLEVENTS_TITLE_CATEGORIES',
                    'COM_ALLEVENTS_INFO_CATEGORIES',
                    'controlpanel_showcategories'],
                [
                    'map',
                    'places',
                    'PLACES',
                    'COM_ALLEVENTS_INFO_PLACES',
                    'controlpanel_showplaces'],
                [
                    'public',
                    'publics',
                    'COM_ALLEVENTS_TITLE_PUBLICS',
                    'COM_ALLEVENTS_INFO_PUBLICS',
                    'controlpanel_showpublics'],
                [
                    'ressource',
                    'ressources',
                    'COM_ALLEVENTS_TITLE_RESSOURCES',
                    'COM_ALLEVENTS_INFO_RESSOURCES',
                    'controlpanel_showressources'],
                [
                    'section',
                    'sections',
                    'COM_ALLEVENTS_TITLE_SECTIONS',
                    'COM_ALLEVENTS_INFO_SECTIONS',
                    'controlpanel_showsections'],
                // ##€
                [
                    'gcalendar',
                    'gcalendars',
                    'COM_ALLEVENTS_TITLE_GCALENDARS',
                    'COM_ALLEVENTS_INFO_GCALENDARS',
                    'controlpanel_showgcalendars'],
                [
                    'ribbon',
                    'ribbons',
                    'COM_ALLEVENTS_TITLE_RIBBONS',
                    'COM_ALLEVENTS_INFO_RIBBONS',
                    'controlpanel_showribbons'],
                // €##
            ];

            foreach ($arrsatellites as $value) {
                if ($params[$value[4]] == "1") {
                    JHtmlSidebar::addEntry(JText::_($value[2]), 'index.php?option=com_allevents&view=' . $value[1], $vName == $value[1]);
                }
            }
        }

        // €€€
        if (JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
            JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_IMPORT'), 'index.php?option=com_allevents&view=import', $vName == 'import');
            JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_EXPORT'), 'index.php?option=com_allevents&view=export', $vName == 'export');
            $db = JFactory::getDbo();
            $db->setQuery("SELECT enabled FROM #__extensions WHERE name = 'com_name'");
            $is_enabled = $db->loadResult();

            if ($is_enabled && JComponentHelper::isEnabled('com_fields') && ($params['controlpanel_showcustomfields'] == "1")) {
                JHtmlSidebar::addEntry(
                    JText::_('JGLOBAL_FIELDS'),
                    'index.php?option=com_fields&context=com_allevents.event',
                    $vName == 'fields.fields'
                );
                JHtmlSidebar::addEntry(
                    JText::_('JGLOBAL_FIELD_GROUPS'),
                    'index.php?option=com_fields&view=groups&context=com_allevents.event',
                    $vName == 'fields.groups'
                );
            }
            if ($params['controlpanel_showpayments'] == "1") {
                JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_PAYMENTS'), 'index.php?option=com_allevents&view=orders', $vName == 'orders');
            }
        }
        // €€€

        if (JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
            JHtmlSidebar::addEntry(JText::_('COM_ALLEVENTS_TITLE_INFO'), 'index.php?option=com_allevents&view=info', $vName == 'info');
        }
        JHtmlSidebar::addEntry("<br/>"); // blank line
        JHtmlSidebar::addEntry("<span class='icon-info-circle'></span> <span class='small'>" . JText::_("AE_YOU_ARE_USING") . " " . $component_name . " " . $component_version . "</span>");
    }

    /**
     * AllEventsHelper::getActions()
     *
     * @return JObject
     */
    public static function getActions()
    {
        $user = JFactory::getUser();
        $result = new JObject();

        $assetName = 'com_allevents';

        $actions = [
            'core.admin',
            'core.manage',
            'core.satellites',
            'core.create',
            'core.edit',
            'core.edit.own',
            'core.approve',
            'core.delete',
            'core.enrolment',
            'core.orders',
            'core.enrolhimself'];

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }

    /**
     * AllEventsHelper::generateRandomString()
     *
     * @param int $length
     *
     * @return string
     */
    public static function generateRandomString($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    /**
     * AllEventsHelper::getMultilangTables()
     * renvoie la liste des données multilangues dans AllEvents
     *
     * @return array
     */
    public static function getMultilangTables()
    {
        $tables = [];
        $tables['events'] = [
            'titre',
            'date_format',
            'time_format',
            'description'
        ];

        return $tables;
    }

    /**
     * AllEventsHelper::getInstalledLanguages()
     *
     * @return array
     */
    public static function getInstalledLanguages()
    {
        $db = JFactory::getDbo();

        $sql = "SELECT *, LOWER(REPLACE(lang_code,'-','')) AS lang_tag  FROM #__languages WHERE published = 1";
        $db->setQuery($sql);
        $languages = $db->loadObjectList();

        foreach ($languages as &$lang) {
            $lang->postfix = $lang->lang_tag;
            if ($lang->lang_tag != '') {
                $lang->postfix = '_' . $lang->lang_tag;
            }

            $lang->img_url = '';
            if ($lang->lang_code != '') {
                $lang->img_url = JUri::root() . 'media/mod_languages/images/' . $lang->image . '.gif';
            }
        }

        return $languages;
    }

    /**
     * AllEventsHelper::UpdateEnrolmentsFromOrders()
     *
     * @return void
     * @throws Exception
     */
    public static function UpdateEnrolmentsFromOrders()
    {
        $db = JFactory::getDbo();

        try {
            $db->setQuery('UPDATE #__allevents_enrolments a SET pending = 0, enroltype=0  WHERE a.enroltype <> 0 AND order_id IN (SELECT id FROM #__allevents_orders b WHERE b.status = "C")');
            $db->execute();
            $db->setQuery('UPDATE #__allevents_enrolments a SET pending = 1, enroltype=3  WHERE a.enroltype NOT IN (1,2) AND order_id IN (SELECT id FROM #__allevents_orders b WHERE b.status = "P")');
            $db->execute();
            $db->setQuery('UPDATE #__allevents_enrolments a SET pending = 0, enroltype=1  WHERE a.enroltype <> 1 AND order_id IN (SELECT id FROM #__allevents_orders b WHERE b.status NOT IN ("C","P"))');
            $db->execute();
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage('Error ' . $e->getMessage());
        }
    }

    /**
     * AllEventsHelper::getFrLanguage()
     *
     * @return mixed
     * @throws Exception
     */
    public static function getFrLanguage()
    {
        $language = JFactory::getApplication()->get('language');

        $user = JFactory::getUser();
        if ($user->get('id')) {
            $userLanguage = $user->getParam('language');
            if (!empty($userLanguage)) {
                $language = $userLanguage;
            }
        }

        return $language;
    }

    /**
     * AllEventsHelper::dayToString()
     *
     * @param mixed $day
     * @param bool $abbr
     *
     * @return string
     */
    public static function dayToString($day, $abbr = false)
    {
        $date = new JDate();

        return addslashes($date->dayToString($day, $abbr));
    }

    /**
     * AllEventsHelper::monthToString()
     *
     * @param mixed $month
     * @param bool $abbr
     *
     * @return string
     */
    public static function monthToString($month, $abbr = false)
    {
        $date = new JDate();

        return addslashes($date->monthToString($month, $abbr));
    }

    /**
     * AllEventsHelper::getDateFromString()
     *
     * @param mixed $date
     * @param mixed $time
     * @param mixed $allDay
     * @param mixed $dateFormat
     * @param mixed $timeFormat
     *
     * @return DateTime|JDate|mixed
     * @throws Exception
     */
    public static function getDateFromString($date, $time, $allDay, $dateFormat = null, $timeFormat = null)
    {
        $string = $date;
        if (!empty($time)) {
            $string = $date . ($allDay ? '' : ' ' . $time);
        }

        $replaces = [
            'JANUARY',
            'FEBRUARY',
            'MARCH',
            'APRIL',
            'MAY',
            'JUNE',
            'JULY',
            'AUGUST',
            'SEPTEMBER',
            'OCTOBER',
            'NOVEMBER',
            'DECEMBER',
            'JANUARY_SHORT',
            'FEBRUARY_SHORT',
            'MARCH_SHORT',
            'APRIL_SHORT',
            'MAY_SHORT',
            'JUNE_SHORT',
            'JULY_SHORT',
            'AUGUST_SHORT',
            'SEPTEMBER_SHORT',
            'OCTOBER_SHORT',
            'NOVEMBER_SHORT',
            'DECEMBER_SHORT',
            'SATURDAY',
            'SUNDAY',
            'MONDAY',
            'TUESDAY',
            'WEDNESDAY',
            'THURSDAY',
            'FRIDAY',
            'SAT',
            'SUN',
            'MON',
            'TUE',
            'WED',
            'THU',
            'FRI'
        ];
        $lang = JLanguage::getInstance('en-GB');
        foreach ($replaces as $key) {
            $string = str_replace(JText::_($key), $lang->_($key), $string);
        }

        if (empty($dateFormat)) {
            $dateFormat = self::getComponentParameter('event_form_date_format', 'm.d.Y');
        }
        if (empty($timeFormat)) {
            $timeFormat = self::getComponentParameter('event_form_time_format', 'g:i a');
        }

        $date = self::getDate(null, $allDay);
        $date = DateTime::createFromFormat($dateFormat . ($allDay ? '' : ' ' . $timeFormat), $string, $date->getTimezone());
        if ($date == null) {
            throw new Exception('Could not inteprete format: ' . ($dateFormat . ($allDay ? '' : ' ' . $timeFormat)) . ' for date string : ' . $string);
        }

        $date = self::getDate($date->format('U'), $allDay);

        return $date;
    }

    /**
     * AllEventsHelper::getDate()
     *
     * @param mixed $date
     * @param mixed $allDay
     * @param mixed $tz
     *
     * @return JDate
     * @throws Exception
     */
    public static function getDate($date = null, $allDay = null, $tz = null)
    {
        $dateObj = JFactory::getDate($date, $tz);

        $timezone = JFactory::getApplication()->getCfg('offset');
        $user = JFactory::getUser();
        if ($user->get('id')) {
            $userTimezone = $user->getParam('timezone');
            if (!empty($userTimezone)) {
                $timezone = $userTimezone;
            }
        }

        $timezone = JFactory::getSession()->get('user-timezone', $timezone, 'AllEvents');

        if (!$allDay) {
            $dateObj->setTimezone(new DateTimeZone($timezone));
        }

        return $dateObj;
    }

    /**
     * AllEventsHelper::getDateStringFromEvent()
     *
     * @param mixed $event
     * @param mixed $dateFormat
     * @param mixed $timeFormat
     *
     * @return string
     */
    public static function getDateStringFromEvent($event, $dateFormat = null, $timeFormat = null)
    {
        return JLayoutHelper::render('event.datestring',
            [
                'event' => $event,
                'dateFormat' => $dateFormat,
                'timeFormat' => $timeFormat
            ], null, [
                'component' => 'com_allevents',
                'client' => 0
            ]);
    }

    /**
     * AllEventsHelper::increaseMemoryLimit()
     *
     * @param mixed $limit
     *
     * @return bool
     */
    public static function increaseMemoryLimit($limit)
    {
        $memMax = trim(@ini_get('memory_limit'));
        if ($memMax) {
            $last = strtolower($memMax{strlen($memMax) - 1});
            switch ($last) {
                /** @noinspection PhpMissingBreakStatementInspection */
                case 'g':
                    $memMax *= 1024;
                /** @noinspection PhpMissingBreakStatementInspection */
                case 'm':
                    $memMax *= 1024;
                case 'k':
                    $memMax *= 1024;
            }

            if ($memMax > $limit) {
                return true;
            }

            @ini_set('memory_limit', $limit);
        }

        return trim(@ini_get('memory_limit')) == $limit;
    }

    /**
     * AllEventsHelper::matches()
     *
     * @param mixed $text
     * @param mixed $query
     *
     * @return bool
     */
    public static function matches($text, $query)
    {
        $query = str_replace('+', '', $query);
        $tmp = str_getcsv($query, ' ');

        // str_getcsv creates from '-"foo bar"' > ['-"foo', 'bar"'] it needs to
        // be combined back
        $criteria = [];
        $appending = null;
        foreach ($tmp as $key => $value) {
            if (self::startsWith($value, '-"')) {
                $criteria[$key] = str_replace('-"', '-', $value);
                $appending = $key;
                continue;
            }

            if ($appending) {
                $criteria[$appending] .= ' ' . str_replace('"', '', $value);
                if (self::endsWith($value, '"')) {
                    $appending = null;
                }
                continue;
            }

            $criteria[$key] = $value;
        }

        $criteria = array_values($criteria);

        foreach ($criteria as $q) {
            if (empty($q)) {
                continue;
            }
            if (self::startsWith($q, '-')) {
                if (strpos($text, substr($q, 1)) !== false) {
                    return false;
                }
            } else if (self::startsWith($q, '+')) {
                if (strpos($text, substr($q, 1)) === false) {
                    return false;
                }
            } else if (strpos($text, $q) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if the haystack starts with the needle.
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return boolean
     */
    public static function startsWith($haystack, $needle)
    {
        return (substr($haystack, 0, strlen($needle)) === $needle);
    }

    /**
     * Checks if the haystack ends with the needle.
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return boolean
     */
    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    /**
     * AllEventsHelper::fetchContent()
     *
     * @param mixed $uri
     *
     * @return Exception|mixed|string
     */
    public static function fetchContent($uri)
    {
        if (empty($uri)) {
            return '';
        }

        $content = '';
        try {
            $internal = !filter_var($uri, FILTER_VALIDATE_URL);

            if ($internal && strpos($uri, '/') !== 0) {
                $uri = JPATH_ROOT . '/' . $uri;
            }

            if ($internal) {
                JLoader::import('joomla.filesystem.folder');
                if (JFolder::exists($uri)) {
                    foreach (JFolder::files($uri, '\.ics', true, true) as $file) {
                        $content .= JFile::read($file);
                    }
                } else {
                    $content = JFile::read($uri);
                }
            } else {
                $options = new JRegistry();
                foreach ([
                             'curl',
                             'socket',
                             'stream'
                         ] as $adapter) {
                    $class = 'JHttpTransport' . ucfirst($adapter);
                    $http = new JHttp($options, new $class($options));

                    $u = JUri::getInstance($uri);
                    $uri = $u->toString([
                        'scheme',
                        'user',
                        'pass',
                        'host',
                        'port',
                        'path'
                    ]);
                    $uri .= $u->toString([
                        'query',
                        'fragment'
                    ]);

                    $language = JFactory::getUser()->getParam('language', JFactory::getLanguage()->getTag());
                    $headers = [
                        'Accept-Language' => $language
                    ];
                    $response = $http->get($uri, $headers);
                    $content = $response->body;

                    if (isset($response->headers['Content-Encoding']) && $response->headers['Content-Encoding'] == 'gzip') {
                        $content = gzinflate(substr($content, 10, -8));
                    }

                    break;
                }
            }
        } catch (Exception $e) {
            return $e;
        }
        if (!empty($content)) {
            return $content;
        }

        return '';
    }
}
