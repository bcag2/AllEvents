<?php
defined('_JEXEC') or die();

JLoader::import('components.com_allevents.helpers.syncplugin', JPATH_ADMINISTRATOR);
if (!class_exists('AllEventsSyncPlugin')) {
    return;
}

/**
 * plgAllEventsAEGoogle
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAllEventsAEGoogle extends AllEventsSyncPlugin
{

    protected $identifier = 'g';

    /**
     * plgAllEventsAEGoogle::fetchEvent()
     *
     * @param mixed $eventId
     * @param mixed $calendarId
     *
     * @return bool|Google_Service_Calendar_Event|JTable|mixed|null|\Sabre\VObject\Element
     */
    public function fetchEvent($eventId, $calendarId)
    {
        return $this->fetchEventFromGoogle(false, $eventId, $calendarId);
    }

    /**
     * plgAllEventsAEGoogle::fetchEventFromGoogle()
     *
     * @param mixed $returnGoogleEvent
     * @param mixed $eventId
     * @param mixed $calendarId
     *
     * @return bool|Google_Service_Calendar_Event|JTable|null
     */
    private function fetchEventFromGoogle($returnGoogleEvent, $eventId, $calendarId)
    {
        $calendar = $this->getDbCal($calendarId);
        if (empty($calendar)) {
            return null;
        }

        $params = [];

        try {
            $client = $this->getClient($calendar->params->get('client-id'), $calendar->params->get('client-secret'));
            $client->refreshToken($calendar->params->get('refreshToken'));

            $cal = new Google_Service_Calendar($client);

            $eventId = urldecode($eventId);
            $pos = strrpos($eventId, '_');
            if ($pos === false) {
                return null;
            }

            $googleEvent = $cal->events->get($calendar->params->get('calendarId'), substr($eventId, 0, $pos), $params);
            if (!$googleEvent) {
                return null;
            }
            $obj = $googleEvent;

            // Check if we need an instance
            $s = substr($eventId, $pos + 1);
            if ($s != '0' && $googleEvent->recurrence) {
                $startDate = null;
                if (strlen($s) == 8) {
                    $startDate = JFactory::getDate(substr($s, 0, 4) . '-' . substr($s, 4, 2) . '-' . substr($s, 6, 2) . ' 00:00');
                } else {
                    $startDate = JFactory::getDate(
                        substr($s, 0, 4) . '-' . substr($s, 4, 2) . '-' . substr($s, 6, 2) . ' ' . substr($s, 8, 2) . ':' . substr($s, 10, 2));
                }

                // Exact date google has problems on recurring events
                $startDate->modify('-1 second');
                $params['timeMin'] = $startDate->format('c');
                $startDate->modify('+1 ' . (strlen($s) == 8 ? 'day' : 'hour'));
                $params['timeMax'] = $startDate->format('c');
                $params['maxResults'] = 1;

                $obj = $cal->events->instances($calendar->params->get('calendarId'), substr($eventId, 0, $pos), $params);
                if (count($obj->items) > 0) {
                    $googleEvent = $obj->items[0];
                } else {
                    $googleEvent = null;
                }
            }

            if (!$googleEvent) {
                return null;
            }

            if ($returnGoogleEvent) {
                return $googleEvent;
            }

            return $this->createEventFromGoogle($googleEvent, $calendar, $obj, $cal->colors->get()->event);
        } catch (Exception $e) {
            $this->log($e);
        }

        return null;
    }

    /**
     * plgAllEventsAEGoogle::getClient()
     *
     * @param mixed $clientId
     * @param mixed $clientSecret
     *
     * @return Google_Client
     */
    private function getClient($clientId, $clientSecret)
    {
        JLoader::import('allevents.alleventsaegoogle.libraries.google-php.Google.autoload', JPATH_PLUGINS);

        $client = new Google_Client(
            [
                'ioFileCache_directory' => JFactory::getConfig()->get('tmp_path') . '/plg_aegoogle/Google_Client'
            ]);
        $client->setClassConfig('Google_IO_Curl', 'options', [
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);
        $client->setApplicationName("AllEvents");
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setScopes([
            'https://www.googleapis.com/auth/calendar'
        ]);
        $client->setAccessType('offline');

        $uri = !isset($_SERVER['HTTP_HOST']) ? JUri::getInstance('http://localhost') : JUri::getInstance();
        if (filter_var($uri->getHost(), FILTER_VALIDATE_IP)) {
            $uri->setHost('localhost');
        }
        $client->setRedirectUri(
            $uri->toString([
                'scheme',
                'host',
                'port',
                'path'
            ]) . '?option=com_allevents&task=plugin.action&plugin=aegoogle&action=import');

        return $client;
    }

    /**
     * plgAllEventsAEGoogle::createEventFromGoogle()
     *
     * @param mixed $googleEvent
     * @param mixed $calendar
     * @param mixed $obj
     * @param mixed $colors
     *
     * @return bool|JTable
     */
    private function createEventFromGoogle($googleEvent, $calendar, $obj, $colors)
    {
        if (!$googleEvent->start) {
            return null;
        }

        $allDay = empty($googleEvent->start->dateTime);

        $startDate = $this->getDate($googleEvent->start, $allDay, $obj);
        $endDate = $this->getDate($googleEvent->end, $allDay, $obj);
        if ($allDay) {
            $endDate->modify('-1 day');
        }

        $calendarId = $calendar->params->get('calendarId');
        $id = $googleEvent->id;
        if (strpos($id, '_R') === false && strpos($calendarId, '#sports@group.v.calendar.google.com') === false &&
            strpos($calendarId, '#holiday@group.v.calendar.google.com') === false
        ) {
            $pos = strrpos($id, '_');
            if ($pos !== false && $pos !== 0) {
                $id = substr($id, 0, $pos);
            }
        }
        if ($googleEvent->recurringEventId) {
            $id = $googleEvent->recurringEventId;
        }

        if (!empty($googleEvent->recurrence)) {
            $id .= '_0';
        } else {
            $id .= '_' . ($allDay ? $startDate->format('Ymd') : $startDate->format('YmdHi'));
        }

        $at = strpos($id, '@');
        $delimiter = strrpos($id, '_');
        if ($at !== false && $delimiter !== false) {
            $id = substr_replace($id, '', $at, $delimiter - $at);
        }

        $event = $this->createEvent($id, str_replace('g-', '', $calendar->id));
        $event->uid = $googleEvent->iCalUID;
        $event->start_date = $startDate->toSql();
        $event->end_date = $endDate->toSql();
        $event->all_day = $allDay ? 1 : 0;
        $event->access_content = $calendar->access_content;
        $event->created = AllEventsHelper::getDate($googleEvent->created)->toSql();
        $event->modified = AllEventsHelper::getDate($googleEvent->updated)->toSql();

        $event->title = $googleEvent->summary;
        if ($calendar->params->get('format-description', '1') == '1') {
            $description = str_replace('\n', '<br/>', $googleEvent->description);
            $event->description = AllEventsHelper::parseHtml($description);
        } else {
            $event->description = $googleEvent->description;
        }

        // This is the original event
        if (!empty($googleEvent->recurrence)) {
            foreach ($googleEvent->recurrence as $recValue) {
                if (strpos($recValue, 'RRULE') === false) {
                    continue;
                }
                $event->rrule = str_replace('RRULE:', '', $recValue);
            }
            $event->original_id = -1;
        } else if ($googleEvent->recurringEventId) {
            $originalAllDay = empty($googleEvent->originalStartTime->dateTime);
            $recDate = $this->getDate($googleEvent->originalStartTime, $originalAllDay, $obj);
            $event->recurrence_id = $originalAllDay ? $recDate->format('Ymd') : $recDate->format('Ymd\THis\Z');
            $event->original_id = substr($event->id, 0, strrpos($event->id, '_')) . '_0';
        }
        if ($googleEvent->location) {
            $event->locations = [
                com_allevents::get($googleEvent->location)
            ];
        }

        $event->created_by_alias = str_replace('MAILTO:', '', $googleEvent->creator->displayName);

        $event->url = $googleEvent->htmlLink;
        if ($googleEvent->colorId > 0 && !$calendar->color_force) {
            $event->color = str_replace('#', '', $colors[$googleEvent->colorId]->getBackground());
        }

        return $event;
    }

    /**
     * plgAllEventsAEGoogle::getDate()
     *
     * @param mixed $date
     * @param mixed $allDay
     * @param mixed $obj
     *
     * @return JDate|null
     */
    private function getDate($date, $allDay, $obj)
    {
        if (!$date) {
            return null;
        }
        $time = $date->date;
        if (!$allDay) {
            $time .= ' ' . $date->dateTime;
        }

        $tz = $date->timeZone;
        if (!$tz && isset($obj->timeZone)) {
            $tz = $obj->timeZone;
        }

        $newDate = AllEventsHelper::getDate($time, $allDay, $allDay ? null : $tz);

        if (!$allDay && $tz) {
            $newDate->setTimezone(new DateTimeZone($tz));
        }

        return $newDate;
    }

    /**
     * plgAllEventsAEGoogle::fetchEvents()
     *
     * @param mixed $calendarId
     * @param mixed $startDate
     * @param mixed $endDate
     * @param mixed $options
     *
     * @return array
     */
    public function fetchEvents($calendarId, JDate $startDate = null, JDate $endDate = null, JRegistry $options)
    {
        $calendar = $this->getDbCal($calendarId);
        if (empty($calendar)) {
            return [];
        }

        if ($startDate == null) {
            $startDate = AllEventsHelper::getDate();
        }

        $params = [];
        if ($startDate != null) {
            // Exact date google has problems on recurring events
            $startDate->modify('-1 second');
            $params['timeMin'] = $startDate->format('c');
        }
        if ($endDate != null) {
            $params['timeMax'] = $endDate->format('c');
        }
        if ($options->get('filter')) {
            $params['q'] = $options->get('filter');
        }
        $params['maxResults'] = $options->get('limit', 1000);

        if ($options->get('expand', true)) {
            $params['singleEvents'] = 'true';
            $params['orderBy'] = 'startTime';
        }
        try {
            $client = $this->getClient($calendar->params->get('client-id'), $calendar->params->get('client-secret'));
            $client->refreshToken($calendar->params->get('refreshToken'));

            $cal = new Google_Service_Calendar($client);

            $obj = $cal->events->listEvents($calendar->params->get('calendarId'), $params);
            $googleEvents = $obj->items;

            $order = strtolower($options->get('order', 'asc'));
            usort($googleEvents,
                function ($event1, $event2) use ($order) {
                    if (!$event1->start || !$event2->start) {
                        return 0;
                    }

                    $first = $event1;
                    $second = $event2;
                    if (strtolower($order) == 'desc') {
                        $first = $event2;
                        $second = $event1;
                    }

                    return strcmp($first->start->date . ' ' . $first->start->dateTime, $second->start->date . ' ' . $second->start->dateTime);
                });

            $colors = $cal->colors->get()->event;
            $events = [];
            foreach ($googleEvents as $googleEvent) {
                $event = $this->createEventFromGoogle($googleEvent, $calendar, $obj, $colors);
                if (!$event || !$this->matchLocationFilterEvent($event, $options)) {
                    continue;
                }

                $events[] = $event;
            }

            return $events;
        } catch (Exception $e) {
            $this->log($e);
        }

        return [];
    }

    /**
     * plgAllEventsAEGoogle::saveEvent()
     *
     * @param mixed $eventId
     * @param mixed $calendarId
     * @param mixed $data
     *
     * @return bool
     */
    public function saveEvent($eventId = null, $calendarId, array $data)
    {
        $calendar = $this->getDbCal($calendarId);
        if (empty($calendar)) {
            return '';
        }

        try {
            $client = $this->getClient($calendar->params->get('client-id'), $calendar->params->get('client-secret'));
            $client->refreshToken($calendar->params->get('refreshToken'));

            $cal = new Google_Service_Calendar($client);

            $event = new Google_Service_Calendar_Event();
            if (!empty($eventId)) {
                $event = $this->fetchEventFromGoogle(true, $eventId, $calendarId);
            }

            $event->setSummary($data['title']);
            $event->setDescription($data['description']);
            if (isset($data['location'])) {
                $event->setLocation($data['location']);
            }
            if (isset($data['location_ids']) && is_array($data['location_ids'])) {
                $event->setLocation(com_allevents::format(com_allevents::getLocations($data['location_ids'])));
            }

            $allDay = $data['all_day'] == '1';
            $start = new Google_Service_Calendar_EventDateTime();
            $startDate = AllEventsHelper::getDate($data['start_date'], $allDay);
            $timezone = $startDate->getTimezone()->getName();
            if ($allDay) {
                $start->setDate($startDate->format('Y-m-d'));
                $start->setTimeZone($timezone);
            } else {
                $start->setDateTime($startDate->format('c'));
                $start->setTimeZone($timezone);
            }
            $event->setStart($start);

            $end = new Google_Service_Calendar_EventDateTime();
            $endDate = AllEventsHelper::getDate($data['end_date'], $allDay);
            if ($allDay) {
                $endDate->modify('+1 day');
                $end->setDate($endDate->format('Y-m-d'));
                $end->setTimeZone($timezone);
            } else {
                $end->setDateTime($endDate->format('c'));
                $end->setTimeZone($timezone);
            }
            $event->setEnd($end);

            if (isset($data['rrule']) && $data['rrule']) {
                $event->setRecurrence([
                    'RRULE:' . $data['rrule']
                ]);
            }

            if (empty($eventId)) {
                $event = $cal->events->insert($calendar->params->get('calendarId'), $event);
            } else {
                $event = $cal->events->update($calendar->params->get('calendarId'), $event->getId(), $event);
            }

            $id = $event->getId() . '_' . ($allDay ? $startDate->format('Ymd') : $startDate->format('YmdHi'));
            if (!empty($data['rrule'])) {
                $id = $event->getId() . '_0';
            }

            return $this->createEvent($id, $calendarId)->id;
        } catch (Exception $e) {
            $this->log($e->getMessage());

            return false;
        }
    }

    /**
     * plgAllEventsAEGoogle::deleteEvent()
     *
     * @param mixed $eventId
     * @param mixed $calendarId
     *
     * @return bool|string
     */
    public function deleteEvent($eventId = null, $calendarId)
    {
        $calendar = $this->getDbCal($calendarId);
        if (empty($calendar)) {
            return '';
        }

        try {
            $client = $this->getClient($calendar->params->get('client-id'), $calendar->params->get('client-secret'));
            $client->refreshToken($calendar->params->get('refreshToken'));

            $cal = new Google_Service_Calendar($client);

            $event = $this->fetchEventFromGoogle(true, $eventId, $calendarId);
            $cal->events->delete($calendar->params->get('calendarId'), $event->getId());

            return true;
        } catch (Exception $e) {
            $this->log($e);

            return false;
        }
    }

    /**
     * plgAllEventsAEGoogle::prepareForm()
     *
     * @param mixed $eventId
     * @param mixed $calendarId
     * @param mixed $form
     * @param mixed $data
     *
     * @return bool|void
     */
    public function prepareForm($eventId, $calendarId, $form, $data)
    {
        $form->removeField('color');
        $form->removeField('url');
        $form->removeField('publish_up');
        $form->removeField('publish_down');
        $form->removeField('access');
        $form->removeField('featured');
        $form->removeField('access_content');
        $form->removeField('language');
        $form->removeField('location_ids');
        $form->removeField('metadesc');
        $form->removeField('metakey');

        return true;
    }

    /**
     * plgAllEventsAEGoogle::import()
     *
     */
    public function import()
    {
        $app = JFactory::getApplication();

        $session = JFactory::getSession([
            'expire' => 30
        ]);

        // If we are on the callback from google don't save
        if (!$app->input->get('code')) {
            $params = $app->input->get('params', [
                'client-id' => null,
                'client-secret' => null
            ], 'array');
            $session->set('client-id', $params['client-id'], $this->_name);
            $session->set('client-secret', $params['client-secret'], $this->_name);
        }
        $clientId = $session->get('client-id', null, $this->_name);
        $clientSecret = $session->get('client-secret', null, $this->_name);

        if ($app->input->get('code')) {
            $session->set('client-id', null, $this->_name);
            $session->set('client-secret', null, $this->_name);
        }

        try {
            $client = $this->getClient($clientId, $clientSecret);
            $client->setApprovalPrompt('force');
            if (empty($client)) {
                return;
            }

            if (!$app->input->get('code')) {
                $app->redirect($client->createAuthUrl());
                $app->close();
            }

            $cal = new Google_Service_Calendar($client);
            $token = $client->authenticate($app->input->get('code', null, null));
            if ($token === true) {
                die();
            }

            if ($token) {
                $client->setAccessToken($token);

                $calendars = $cal->calendarList->listCalendarList();

                $tok = json_decode($token, true);
                foreach ($calendars['items'] as $cal) {
                    $model = JModelLegacy::getInstance('Extcalendar', 'AllEventsModel');
                    $params = new JRegistry();
                    $params->set('refreshToken', $tok['refresh_token']);
                    $params->set('client-id', $clientId);
                    $params->set('client-secret', $clientSecret);
                    $params->set('calendarId', $cal['id']);
                    $params->set('action-create', true);
                    $params->set('action-edit', true);
                    $params->set('action-delete', true);

                    $data = [];
                    $data['title'] = $cal['summary'];
                    $data['color'] = $cal['backgroundColor'];
                    $data['params'] = $params->toString();
                    $data['plugin'] = 'google';

                    if (!$model->save($data)) {
                        $app->enqueueMessage($model->getError(), 'warning');
                    }
                }
            }
        } catch (Exception $e) {
            $this->log($e->getMessage());
        }
        $app->redirect(
            JFactory::getSession()->get('extcalendarOrigin',
                'index.php?option=com_allevents&view=extcalendars&aeplugin=google&tmpl=' . $app->input->get('tmpl'), 'AllEvents'));
        $app->close();
    }

    /**
     * plgAllEventsAEGoogle::getSyncToken()
     *
     * @param mixed $calendar
     *
     * @return int
     */
    protected function getSyncToken($calendar)
    {
        $client = $this->getClient($calendar->params->get('client-id'), $calendar->params->get('client-secret'));
        $client->refreshToken($calendar->params->get('refreshToken'));

        $cal = new Google_Service_Calendar($client);

        $params = [];
        $params['updatedMin'] = AllEventsHelper::getDate($calendar->sync_date)->format('c');
        $params['maxResults'] = 1;
        $obj = $cal->events->listEvents($calendar->params->get('calendarId'), $params);

        return $obj->etag;
    }
}
