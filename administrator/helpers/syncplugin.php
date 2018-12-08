<?php
defined('_JEXEC') or die();

JLoader::import('components.com_allevents.helpers.plugin', JPATH_ADMINISTRATOR);
if (!class_exists('AllEventsPlugin')) {
    return;
}

/**
 * AllEventsSyncPlugin
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class AllEventsSyncPlugin extends AllEventsPlugin
{

    /**
     * Getting the sync token to determine if a full sync needs to be done.
     *
     * @param AllEventsTableExtcalendar $calendar
     *
     * @return boolean
     */
    /**
     * AllEventsSyncPlugin::onEventsFetch()
     *
     * @param mixed $calendarId
     * @param mixed $startDate
     * @param mixed $endDate
     * @param mixed $options
     *
     * @return array|void
     */
    public function onEventsFetch($calendarId, JDate $startDate = null, JDate $endDate = null, JRegistry $options = null)
    {
        if ($this->params->get('cache', 1) == 2) {
            return [];
        }

        return parent::onEventsFetch($calendarId, $startDate, $endDate, $options);
    }

    /**
     * Syncs the events of the given calendar.
     * If the force flag is set, then the caching will be ignored.
     *
     * @param AllEventsTableExtcalendar $calendar
     * @param boolean $force
     */

    /**
     * AllEventsSyncPlugin::onEventsSync()
     *
     * @param mixed $plugin
     */
    public function onEventsSync($plugin = null)
    {
        // Only do a sync when enabled in the plugin
        if ($this->params->get('cache', 1) != 2) {
            return;
        }

        // If only a specific plugins needs to be synced return
        if ($plugin && str_replace('allevents_', '', $this->_name) != $plugin) {
            return;
        }

        // Loop trough the calendars to sync
        foreach ($this->fetchCalendars() as $calendar) {
            $this->sync($calendar, true);
        }
    }

    /**
     * AllEventsSyncPlugin::fetchCalendars()
     *
     * @param mixed $calendarIds
     *
     * @return array
     */
    protected function fetchCalendars($calendarIds = null)
    {
        $calendars = parent::fetchCalendars($calendarIds);
        if ($this->params->get('cache', 1) == 2) {
            foreach ($calendars as $calendar) {
                $this->sync($calendar);
            }
        }

        return $calendars;
    }

    /**
     * AllEventsSyncPlugin::sync()
     *
     * @param mixed $calendar
     * @param bool $force
     */
    private function sync($calendar, $force = false)
    {
        $calendarId = str_replace($this->identifier . '-', '', $calendar->id);
        $db = JFactory::getDbo();

        // Defining the last sync date
        $syncDate = $calendar->sync_date;
        if ($syncDate) {
            $syncDate = AllEventsHelper::getDate($syncDate);
        }

        // If the last sync is younger than the maximum cache time, return
        if (!$force && $syncDate && ($syncDate->format('U') + $this->params->get('cache_time', 900) >= AllEventsHelper::getDate()->format('U'))) {
            return;
        }

        // Remove the script time limit.
        @set_time_limit(0);

        // Update the extcalendar table with the new sync information
        $extCalendarTable = JTable::getInstance('Extcalendar', 'AllEventsTable');
        $extCalendarTable->load(
            [
                'plugin' => str_replace('allevents_', '', $this->_name),
                'id' => str_replace($this->identifier . '-', '', $calendar->id)
            ]);

        if ($extCalendarTable->id) {
            $extCalendarTable->sync_date = AllEventsHelper::getDate()->toSql();
            $extCalendarTable->store();

            $this->extCalendarsCache = null;
        } else {
            return;
        }

        $syncToken = 1;
        if ($calendar->sync_token !== null) {
            $syncToken = $this->getSyncToken($calendar);
            if ($syncToken == $calendar->sync_token) {
                return;
            }
        }

        // Fetching the events to sync
        $syncDateStart = AllEventsHelper::getDate();
        $syncDateStart->modify($this->params->get('sync_start', '-3 year'));

        // Defining the parameters
        $options = new JRegistry();
        $options->set('expand', false);

        $events = [];
        $syncEnd = AllEventsHelper::getDate();
        $syncEnd->modify($this->params->get('sync_end', '+3 year'));
        while (true) {
            // Fetching in steps to safe memory
            $syncDateEnd = clone $syncDateStart;
            $syncDateEnd->modify('+' . $this->params->get('sync_steps', '1 year'));
            $tmp = $this->fetchEvents($calendarId, $syncDateStart, $syncDateEnd, $options);
            $syncDateStart->modify('+' . $this->params->get('sync_steps', '1 year'));
            if (!$tmp) {
                continue;
            }
            $events = array_merge($events, $tmp);

            if ($syncDateEnd->format('U') > $syncEnd->format('U')) {
                break;
            }
        }

        // Fetching events failed, we return
        if (!$events) {
            return;
        }
        JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_allevents/models', 'AllEventsModel');

        // If there are deleted events in the external calendar system we
        // will detect them when publish down is set
        $db->setQuery('UPDATE #__allevents_events SET publish_down = now() WHERE catid = ' . $db->q($calendar->id));
        $db->query();

        $foundEvents = [];
        foreach ($events as $index => $event) {
            // Saving the id as reference
            $event->id = null;
            $event->alias = null;

            // Find an existing event with the same keys
            $table = JTable::getInstance('Event', 'AllEventsTable');

            $keys = [
                'catid' => $calendar->id,
                'uid' => $event->uid
            ];
            if ($event->recurrence_id) {
                // Search the parent
                $table->load($keys);
                $event->original_id = $table->id;
                $table->reset();

                $keys['recurrence_id'] = $event->recurrence_id;
            }
            if ($event->original_id < 1) {
                $keys['original_id'] = $event->original_id;
            }
            $table->load($keys);

            // Check if the event was edited since last sync
            if ($syncDate && $event->modified && $syncDate->format('U') >= AllEventsHelper::getDate($event->modified)->format('U')) {
                if ($table->id) {
                    $foundEvents[$table->id] = $table->id;
                }
                continue;
            }

            $event->id = $table->id;
            $event->publish_down = $db->getNullDate();

            $event->location_ids = [];
            foreach ($event->locations as $location) {
                $event->location_ids[$location->id] = $location->id;
            }

            // Save the event
            $model = JModelLegacy::getInstance('AdminEvent', 'AllEventsModel');
            $model->getState();
            if (!$model->save((array)$event)) {
                $this->log($model->getError());
            }
            $model->detach();
        }

        if ($foundEvents) {
            $db->setQuery(
                'UPDATE #__allevents_events SET publish_down = ' . $db->q($db->getNullDate()) . ' WHERE id IN (' . implode(',', $foundEvents) .
                ')');
            $db->query();
        }

        // Delete the events which are externally deleted
        $db->setQuery('DELETE FROM #__allevents_events WHERE catid = ' . $db->q($calendar->id) . ' AND publish_down != ' . $db->q($db->getNullDate()));
        $db->query();

        if ($extCalendarTable->id) {
            $extCalendarTable->sync_date = AllEventsHelper::getDate()->toSql();
            $extCalendarTable->sync_token = $syncToken;
            $extCalendarTable->store();
        }
    }

    /**
     * Function to force a sync.
     */

    /**
     * AllEventsSyncPlugin::getSyncToken()
     *
     * @param mixed $calendar
     *
     * @return int
     */
    protected function getSyncToken($calendar)
    {
        $uri = str_replace('webcal://', 'https://', $calendar->params->get('uri'));

        if (!$uri) {
            return rand();
        }

        $internal = !filter_var($uri, FILTER_VALIDATE_URL);
        if ($internal && strpos($uri, '/') !== 0) {
            $uri = JPATH_ROOT . '/' . $uri;
        }

        $syncToken = rand();
        if ($internal) {
            $timestamp = filemtime($uri);
            if ($timestamp) {
                $syncToken = $timestamp;
            }
        } else {
            $http = JHttpFactory::getHttp();
            $response = $http->head($uri);

            if (key_exists('ETag', $response->headers)) {
                $syncToken = $response->headers['ETag'];
            } else if (key_exists('Last-Modified', $response->headers)) {
                $syncToken = $response->headers['Last-Modified'];
            }
        }

        return $syncToken;
    }

    /**
     * AllEventsSyncPlugin::onCalendarAfterDelete()
     *
     * @param mixed $calendar
     *
     * @return bool|void
     */
    public function onCalendarAfterDelete($calendar)
    {
        if ('allevents_' . $calendar->plugin != $this->_name) {
            return;
        }

        // Clean the Joomla cache
        $cache = JFactory::getCache('plg_allevents_' . $calendar->plugin);
        if (!$cache->clean()) {
            return false;
        }

        $db = JFactory::getDbo();
        $db->setQuery('DELETE FROM #__allevents_events WHERE agenda_id = ' . $db->q($this->identifier . '-' . $calendar->id));
        $db->query();
    }
}
