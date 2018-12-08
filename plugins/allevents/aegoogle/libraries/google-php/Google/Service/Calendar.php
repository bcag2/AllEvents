<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Calendar (v3).
 *
 * <p>
 * Lets you manipulate events and other calendar data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/calendar/firstapp" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Calendar extends Google_Service
{
    /** Manage your calendars. */
    const CALENDAR =
        "https://www.googleapis.com/auth/calendar";
    /** View your calendars. */
    const CALENDAR_READONLY =
        "https://www.googleapis.com/auth/calendar.readonly";

    public $acl;
    public $calendarList;
    public $calendars;
    public $channels;
    public $colors;
    public $events;
    public $freebusy;
    public $settings;


    /**
     * Constructs the internal representation of the Calendar service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'calendar/v3/';
        $this->version = 'v3';
        $this->serviceName = 'calendar';

        $this->acl = new Google_Service_Calendar_Acl_Resource(
            $this,
            $this->serviceName,
            'acl',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'calendars/{calendarId}/acl/{ruleId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'calendars/{calendarId}/acl/{ruleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'calendars/{calendarId}/acl',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'calendars/{calendarId}/acl',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'calendars/{calendarId}/acl/{ruleId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'calendars/{calendarId}/acl/{ruleId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'calendars/{calendarId}/acl/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->calendarList = new Google_Service_Calendar_CalendarList_Resource(
            $this,
            $this->serviceName,
            'calendarList',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/me/calendarList/{calendarId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/me/calendarList/{calendarId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'users/me/calendarList',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'colorRgbFormat' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/me/calendarList',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'minAccessRole' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showHidden' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'users/me/calendarList/{calendarId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'colorRgbFormat' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'users/me/calendarList/{calendarId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'colorRgbFormat' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'users/me/calendarList/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'minAccessRole' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showHidden' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->calendars = new Google_Service_Calendar_Calendars_Resource(
            $this,
            $this->serviceName,
            'calendars',
            [
                'methods' => [
                    'clear' => [
                        'path' => 'calendars/{calendarId}/clear',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'calendars/{calendarId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'calendars/{calendarId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'calendars',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'calendars/{calendarId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'calendars/{calendarId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_Calendar_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'stop' => [
                        'path' => 'channels/stop',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->colors = new Google_Service_Calendar_Colors_Resource(
            $this,
            $this->serviceName,
            'colors',
            [
                'methods' => [
                    'get' => [
                        'path' => 'colors',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->events = new Google_Service_Calendar_Events_Resource(
            $this,
            $this->serviceName,
            'events',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timeZone' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'import' => [
                        'path' => 'calendars/{calendarId}/events/import',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'calendars/{calendarId}/events',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'instances' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}/instances',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timeMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeZone' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'originalStart' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'calendars/{calendarId}/events',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showHiddenInvitations' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'iCalUID' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'singleEvents' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timeMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeZone' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'privateExtendedProperty' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sharedExtendedProperty' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'move' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}/move',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destination' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'quickAdd' => [
                        'path' => 'calendars/{calendarId}/events/quickAdd',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'text' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'calendars/{calendarId}/events/{eventId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sendNotifications' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'calendars/{calendarId}/events/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'calendarId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showHiddenInvitations' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'iCalUID' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'singleEvents' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timeMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'alwaysIncludeEmail' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timeZone' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'privateExtendedProperty' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sharedExtendedProperty' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxAttendees' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->freebusy = new Google_Service_Calendar_Freebusy_Resource(
            $this,
            $this->serviceName,
            'freebusy',
            [
                'methods' => [
                    'query' => [
                        'path' => 'freeBusy',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->settings = new Google_Service_Calendar_Settings_Resource(
            $this,
            $this->serviceName,
            'settings',
            [
                'methods' => [
                    'get' => [
                        'path' => 'users/me/settings/{setting}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'setting' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/me/settings',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'users/me/settings/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'syncToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "acl" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $acl = $calendarService->acl;
 *  </code>
 */
class Google_Service_Calendar_Acl_Resource extends Google_Service_Resource
{

    /**
     * Deletes an access control rule. (acl.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($calendarId, $ruleId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'ruleId' => $ruleId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns an access control rule. (acl.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($calendarId, $ruleId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'ruleId' => $ruleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_AclRule");
    }

    /**
     * Creates an access control rule. (acl.insert)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_AclRule|Google_Service_Calendar_AclRule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($calendarId, Google_Service_Calendar_AclRule $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Calendar_AclRule");
    }

    /**
     * Returns the rules in the access control list for the calendar. (acl.listAcl)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. All entries deleted since the previous list request will always be in
     * the result set and it is not allowed to set showDeleted to False. If the
     * syncToken expires, the server will respond with a 410 GONE response code and
     * the client should clear its storage and perform a full synchronization
     * without any syncToken. Learn more about incremental synchronization.
     * Optional. The default is to return all entries.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param bool showDeleted Whether to include deleted ACLs in the result.
     * Deleted ACLs are represented by role equal to "none". Deleted ACLs will
     * always be included if syncToken is provided. Optional. The default is False.
     */
    public function listAcl($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Calendar_Acl");
    }

    /**
     * Updates an access control rule. This method supports patch semantics.
     * (acl.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param Google_AclRule|Google_Service_Calendar_AclRule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Calendar_AclRule");
    }

    /**
     * Updates an access control rule. (acl.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param Google_AclRule|Google_Service_Calendar_AclRule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Calendar_AclRule");
    }

    /**
     * Watch for changes to ACL resources. (acl.watch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Channel|Google_Service_Calendar_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. All entries deleted since the previous list request will always be in
     * the result set and it is not allowed to set showDeleted to False. If the
     * syncToken expires, the server will respond with a 410 GONE response code and
     * the client should clear its storage and perform a full synchronization
     * without any syncToken. Learn more about incremental synchronization.
     * Optional. The default is to return all entries.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param bool showDeleted Whether to include deleted ACLs in the result.
     * Deleted ACLs are represented by role equal to "none". Deleted ACLs will
     * always be included if syncToken is provided. Optional. The default is False.
     */
    public function watch($calendarId, Google_Service_Calendar_Channel $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Calendar_Channel");
    }
}

/**
 * The "calendarList" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $calendarList = $calendarService->calendarList;
 *  </code>
 */
class Google_Service_Calendar_CalendarList_Resource extends Google_Service_Resource
{

    /**
     * Deletes an entry on the user's calendar list. (calendarList.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns an entry on the user's calendar list. (calendarList.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_CalendarListEntry");
    }

    /**
     * Adds an entry to the user's calendar list. (calendarList.insert)
     *
     * @param Google_CalendarListEntry|Google_Service_Calendar_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool colorRgbFormat Whether to use the foregroundColor and
     * backgroundColor fields to write the calendar colors (RGB). If this feature is
     * used, the index-based colorId field will be set to the best matching option
     * automatically. Optional. The default is False.
     */
    public function insert(Google_Service_Calendar_CalendarListEntry $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Calendar_CalendarListEntry");
    }

    /**
     * Returns entries on the user's calendar list. (calendarList.listCalendarList)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. If only read-only fields such as calendar properties or ACLs have
     * changed, the entry won't be returned. All entries deleted and hidden since
     * the previous list request will always be in the result set and it is not
     * allowed to set showDeleted neither showHidden to False. To ensure client
     * state consistency minAccessRole query parameter cannot be specified together
     * with nextSyncToken. If the syncToken expires, the server will respond with a
     * 410 GONE response code and the client should clear its storage and perform a
     * full synchronization without any syncToken. Learn more about incremental
     * synchronization. Optional. The default is to return all entries.
     * @opt_param bool showDeleted Whether to include deleted calendar list entries
     * in the result. Optional. The default is False.
     * @opt_param string minAccessRole The minimum access role for the user in the
     * returned entires. Optional. The default is no restriction.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param bool showHidden Whether to show hidden entries. Optional. The
     * default is False.
     */
    public function listCalendarList($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Calendar_CalendarList");
    }

    /**
     * Updates an entry on the user's calendar list. This method supports patch
     * semantics. (calendarList.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_CalendarListEntry|Google_Service_Calendar_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool colorRgbFormat Whether to use the foregroundColor and
     * backgroundColor fields to write the calendar colors (RGB). If this feature is
     * used, the index-based colorId field will be set to the best matching option
     * automatically. Optional. The default is False.
     */
    public function patch($calendarId, Google_Service_Calendar_CalendarListEntry $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Calendar_CalendarListEntry");
    }

    /**
     * Updates an entry on the user's calendar list. (calendarList.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_CalendarListEntry|Google_Service_Calendar_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool colorRgbFormat Whether to use the foregroundColor and
     * backgroundColor fields to write the calendar colors (RGB). If this feature is
     * used, the index-based colorId field will be set to the best matching option
     * automatically. Optional. The default is False.
     */
    public function update($calendarId, Google_Service_Calendar_CalendarListEntry $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Calendar_CalendarListEntry");
    }

    /**
     * Watch for changes to CalendarList resources. (calendarList.watch)
     *
     * @param Google_Channel|Google_Service_Calendar_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. If only read-only fields such as calendar properties or ACLs have
     * changed, the entry won't be returned. All entries deleted and hidden since
     * the previous list request will always be in the result set and it is not
     * allowed to set showDeleted neither showHidden to False. To ensure client
     * state consistency minAccessRole query parameter cannot be specified together
     * with nextSyncToken. If the syncToken expires, the server will respond with a
     * 410 GONE response code and the client should clear its storage and perform a
     * full synchronization without any syncToken. Learn more about incremental
     * synchronization. Optional. The default is to return all entries.
     * @opt_param bool showDeleted Whether to include deleted calendar list entries
     * in the result. Optional. The default is False.
     * @opt_param string minAccessRole The minimum access role for the user in the
     * returned entires. Optional. The default is no restriction.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param bool showHidden Whether to show hidden entries. Optional. The
     * default is False.
     */
    public function watch(Google_Service_Calendar_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Calendar_Channel");
    }
}

/**
 * The "calendars" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $calendars = $calendarService->calendars;
 *  </code>
 */
class Google_Service_Calendar_Calendars_Resource extends Google_Service_Resource
{

    /**
     * Clears a primary calendar. This operation deletes all events associated with
     * the primary calendar of an account. (calendars.clear)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function clear($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('clear', [$params]);
    }

    /**
     * Deletes a secondary calendar. Use calendars.clear for clearing all events on
     * primary calendars. (calendars.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns metadata for a calendar. (calendars.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_Calendar");
    }

    /**
     * Creates a secondary calendar. (calendars.insert)
     *
     * @param Google_Calendar|Google_Service_Calendar_Calendar $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Calendar_Calendar $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Calendar_Calendar");
    }

    /**
     * Updates metadata for a calendar. This method supports patch semantics.
     * (calendars.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Calendar|Google_Service_Calendar_Calendar $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($calendarId, Google_Service_Calendar_Calendar $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Calendar_Calendar");
    }

    /**
     * Updates metadata for a calendar. (calendars.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Calendar|Google_Service_Calendar_Calendar $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($calendarId, Google_Service_Calendar_Calendar $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Calendar_Calendar");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $channels = $calendarService->channels;
 *  </code>
 */
class Google_Service_Calendar_Channels_Resource extends Google_Service_Resource
{

    /**
     * Stop watching resources through this channel (channels.stop)
     *
     * @param Google_Channel|Google_Service_Calendar_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop(Google_Service_Calendar_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params]);
    }
}

/**
 * The "colors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $colors = $calendarService->colors;
 *  </code>
 */
class Google_Service_Calendar_Colors_Resource extends Google_Service_Resource
{

    /**
     * Returns the color definitions for calendars and events. (colors.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_Colors");
    }
}

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $events = $calendarService->events;
 *  </code>
 */
class Google_Service_Calendar_Events_Resource extends Google_Service_Resource
{

    /**
     * Deletes an event. (events.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool sendNotifications Whether to send notifications about the
     * deletion of the event. Optional. The default is False.
     * @return expected_class|Google_Http_Request
     */
    public function delete($calendarId, $eventId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns an event. (events.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string timeZone Time zone used in the response. Optional. The
     * default is the time zone of the calendar.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function get($calendarId, $eventId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Imports an event. This operation is used to add a private copy of an existing
     * event to a calendar. (events.import)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Event|Google_Service_Calendar_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function import($calendarId, Google_Service_Calendar_Event $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('import', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Creates an event. (events.insert)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Event|Google_Service_Calendar_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool sendNotifications Whether to send notifications about the
     * creation of the new event. Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function insert($calendarId, Google_Service_Calendar_Event $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Returns instances of the specified recurring event. (events.instances)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Recurring event identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool showDeleted Whether to include deleted events (with status
     * equals "cancelled") in the result. Cancelled instances of recurring events
     * will still be included if singleEvents is False. Optional. The default is
     * False.
     * @opt_param string timeMax Upper bound (exclusive) for an event's start time
     * to filter by. Optional. The default is not to filter by start time.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxResults Maximum number of events returned on one result
     * page. By default the value is 250 events. The page size can never be larger
     * than 2500 events. Optional.
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
     * filter by. Optional. The default is not to filter by end time.
     * @opt_param string timeZone Time zone used in the response. Optional. The
     * default is the time zone of the calendar.
     * @opt_param string originalStart The original start time of the instance in
     * the result. Optional.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function instances($calendarId, $eventId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
        $params = array_merge($params, $optParams);

        return $this->call('instances', [$params], "Google_Service_Calendar_Events");
    }

    /**
     * Returns events on the specified calendar. (events.listEvents)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy The order of the events returned in the result.
     * Optional. The default is an unspecified, stable order.
     * @opt_param bool showHiddenInvitations Whether to include hidden invitations
     * in the result. Optional. The default is False.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. All events deleted since the previous list request will always be in
     * the result set and it is not allowed to set showDeleted to False. There are
     * several query parameters that cannot be specified together with nextSyncToken
     * to ensure consistency of the client state.
     *
     * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
     * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
     * expires, the server will respond with a 410 GONE response code and the client
     * should clear its storage and perform a full synchronization without any
     * syncToken. Learn more about incremental synchronization. Optional. The
     * default is to return all entries.
     * @opt_param bool showDeleted Whether to include deleted events (with status
     * equals "cancelled") in the result. Cancelled instances of recurring events
     * (but not the underlying recurring event) will still be included if
     * showDeleted and singleEvents are both False. If showDeleted and singleEvents
     * are both True, only single instances of deleted events (but not the
     * underlying recurring events) are returned. Optional. The default is False.
     * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
     * included in the response. Optional.
     * @opt_param string updatedMin Lower bound for an event's last modification
     * time (as a RFC 3339 timestamp) to filter by. When specified, entries deleted
     * since this time will always be included regardless of showDeleted. Optional.
     * The default is not to filter by last modification time.
     * @opt_param bool singleEvents Whether to expand recurring events into
     * instances and only return single one-off events and instances of recurring
     * events, but not the underlying recurring events themselves. Optional. The
     * default is False.
     * @opt_param string timeMax Upper bound (exclusive) for an event's start time
     * to filter by. Optional. The default is not to filter by start time.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxResults Maximum number of events returned on one result
     * page. By default the value is 250 events. The page size can never be larger
     * than 2500 events. Optional.
     * @opt_param string q Free text search terms to find events that match these
     * terms in any field, except for extended properties. Optional.
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
     * filter by. Optional. The default is not to filter by end time.
     * @opt_param string timeZone Time zone used in the response. Optional. The
     * default is the time zone of the calendar.
     * @opt_param string privateExtendedProperty Extended properties constraint
     * specified as propertyName=value. Matches only private properties. This
     * parameter might be repeated multiple times to return events that match all
     * given constraints.
     * @opt_param string sharedExtendedProperty Extended properties constraint
     * specified as propertyName=value. Matches only shared properties. This
     * parameter might be repeated multiple times to return events that match all
     * given constraints.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function listEvents($calendarId, $optParams = [])
    {
        $params = ['calendarId' => $calendarId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Calendar_Events");
    }

    /**
     * Moves an event to another calendar, i.e. changes an event's organizer.
     * (events.move)
     *
     * @param string $calendarId Calendar identifier of the source calendar where
     *                            the event currently is on.
     * @param string $eventId Event identifier.
     * @param string $destination Calendar identifier of the target calendar where
     *                            the event is to be moved to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool sendNotifications Whether to send notifications about the
     * change of the event's organizer. Optional. The default is False.
     */
    public function move($calendarId, $eventId, $destination, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'destination' => $destination];
        $params = array_merge($params, $optParams);

        return $this->call('move', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Updates an event. This method supports patch semantics. (events.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param Google_Event|Google_Service_Calendar_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool sendNotifications Whether to send notifications about the
     * event update (e.g. attendee's responses, title changes, etc.). Optional. The
     * default is False.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function patch($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Creates an event based on a simple text string. (events.quickAdd)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $text The text describing the event to be created.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool sendNotifications Whether to send notifications about the
     * creation of the event. Optional. The default is False.
     */
    public function quickAdd($calendarId, $text, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'text' => $text];
        $params = array_merge($params, $optParams);

        return $this->call('quickAdd', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Updates an event. (events.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param Google_Event|Google_Service_Calendar_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool sendNotifications Whether to send notifications about the
     * event update (e.g. attendee's responses, title changes, etc.). Optional. The
     * default is False.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function update($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Calendar_Event");
    }

    /**
     * Watch for changes to Events resources. (events.watch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Channel|Google_Service_Calendar_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy The order of the events returned in the result.
     * Optional. The default is an unspecified, stable order.
     * @opt_param bool showHiddenInvitations Whether to include hidden invitations
     * in the result. Optional. The default is False.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. All events deleted since the previous list request will always be in
     * the result set and it is not allowed to set showDeleted to False. There are
     * several query parameters that cannot be specified together with nextSyncToken
     * to ensure consistency of the client state.
     *
     * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
     * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
     * expires, the server will respond with a 410 GONE response code and the client
     * should clear its storage and perform a full synchronization without any
     * syncToken. Learn more about incremental synchronization. Optional. The
     * default is to return all entries.
     * @opt_param bool showDeleted Whether to include deleted events (with status
     * equals "cancelled") in the result. Cancelled instances of recurring events
     * (but not the underlying recurring event) will still be included if
     * showDeleted and singleEvents are both False. If showDeleted and singleEvents
     * are both True, only single instances of deleted events (but not the
     * underlying recurring events) are returned. Optional. The default is False.
     * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
     * included in the response. Optional.
     * @opt_param string updatedMin Lower bound for an event's last modification
     * time (as a RFC 3339 timestamp) to filter by. When specified, entries deleted
     * since this time will always be included regardless of showDeleted. Optional.
     * The default is not to filter by last modification time.
     * @opt_param bool singleEvents Whether to expand recurring events into
     * instances and only return single one-off events and instances of recurring
     * events, but not the underlying recurring events themselves. Optional. The
     * default is False.
     * @opt_param string timeMax Upper bound (exclusive) for an event's start time
     * to filter by. Optional. The default is not to filter by start time.
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the
     * email field for the organizer, creator and attendees, even if no real email
     * is available (i.e. a generated, non-working value will be provided). The use
     * of this option is discouraged and should only be used by clients which cannot
     * handle the absence of an email address value in the mentioned places.
     * Optional. The default is False.
     * @opt_param int maxResults Maximum number of events returned on one result
     * page. By default the value is 250 events. The page size can never be larger
     * than 2500 events. Optional.
     * @opt_param string q Free text search terms to find events that match these
     * terms in any field, except for extended properties. Optional.
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
     * filter by. Optional. The default is not to filter by end time.
     * @opt_param string timeZone Time zone used in the response. Optional. The
     * default is the time zone of the calendar.
     * @opt_param string privateExtendedProperty Extended properties constraint
     * specified as propertyName=value. Matches only private properties. This
     * parameter might be repeated multiple times to return events that match all
     * given constraints.
     * @opt_param string sharedExtendedProperty Extended properties constraint
     * specified as propertyName=value. Matches only shared properties. This
     * parameter might be repeated multiple times to return events that match all
     * given constraints.
     * @opt_param int maxAttendees The maximum number of attendees to include in the
     * response. If there are more than the specified number of attendees, only the
     * participant is returned. Optional.
     */
    public function watch($calendarId, Google_Service_Calendar_Channel $postBody, $optParams = [])
    {
        $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Calendar_Channel");
    }
}

/**
 * The "freebusy" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $freebusy = $calendarService->freebusy;
 *  </code>
 */
class Google_Service_Calendar_Freebusy_Resource extends Google_Service_Resource
{

    /**
     * Returns free/busy information for a set of calendars. (freebusy.query)
     *
     * @param Google_FreeBusyRequest|Google_Service_Calendar_FreeBusyRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function query(Google_Service_Calendar_FreeBusyRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_Calendar_FreeBusyResponse");
    }
}

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $settings = $calendarService->settings;
 *  </code>
 */
class Google_Service_Calendar_Settings_Resource extends Google_Service_Resource
{

    /**
     * Returns a single user setting. (settings.get)
     *
     * @param string $setting The id of the user setting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($setting, $optParams = [])
    {
        $params = ['setting' => $setting];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Calendar_Setting");
    }

    /**
     * Returns all user settings for the authenticated user. (settings.listSettings)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. If the syncToken expires, the server will respond with a 410 GONE
     * response code and the client should clear its storage and perform a full
     * synchronization without any syncToken. Learn more about incremental
     * synchronization. Optional. The default is to return all entries.
     */
    public function listSettings($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Calendar_Settings");
    }

    /**
     * Watch for changes to Settings resources. (settings.watch)
     *
     * @param Google_Channel|Google_Service_Calendar_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token specifying which result page to return.
     * Optional.
     * @opt_param int maxResults Maximum number of entries returned on one result
     * page. By default the value is 100 entries. The page size can never be larger
     * than 250 entries. Optional.
     * @opt_param string syncToken Token obtained from the nextSyncToken field
     * returned on the last page of results from the previous list request. It makes
     * the result of this list request contain only entries that have changed since
     * then. If the syncToken expires, the server will respond with a 410 GONE
     * response code and the client should clear its storage and perform a full
     * synchronization without any syncToken. Learn more about incremental
     * synchronization. Optional. The default is to return all entries.
     */
    public function watch(Google_Service_Calendar_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Calendar_Channel");
    }
}


/**
 * Class Google_Service_Calendar_Acl
 */
class Google_Service_Calendar_Acl extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $nextSyncToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Calendar_AclRule';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return mixed
     */
    public function getNextSyncToken()
    {
        return $this->nextSyncToken;
    }

    /**
     * @param $nextSyncToken
     */
    public function setNextSyncToken($nextSyncToken)
    {
        $this->nextSyncToken = $nextSyncToken;
    }
}

/**
 * Class Google_Service_Calendar_AclRule
 */
class Google_Service_Calendar_AclRule extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    public $role;
    protected $internal_gapi_mappings = [];
    protected $scopeType = 'Google_Service_Calendar_AclRuleScope';
    protected $scopeDataType = '';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param Google_Service_Calendar_AclRuleScope $scope
     */
    public function setScope(Google_Service_Calendar_AclRuleScope $scope)
    {
        $this->scope = $scope;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }
}

/**
 * Class Google_Service_Calendar_AclRuleScope
 */
class Google_Service_Calendar_AclRuleScope extends Google_Model
{
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

/**
 * Class Google_Service_Calendar_Calendar
 */
class Google_Service_Calendar_Calendar extends Google_Model
{
    public $description;
    public $etag;
    public $id;
    public $kind;
    public $location;
    public $summary;
    public $timeZone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }
}

/**
 * Class Google_Service_Calendar_CalendarList
 */
class Google_Service_Calendar_CalendarList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $nextSyncToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Calendar_CalendarListEntry';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return mixed
     */
    public function getNextSyncToken()
    {
        return $this->nextSyncToken;
    }

    /**
     * @param $nextSyncToken
     */
    public function setNextSyncToken($nextSyncToken)
    {
        $this->nextSyncToken = $nextSyncToken;
    }
}

/**
 * Class Google_Service_Calendar_CalendarListEntry
 */
class Google_Service_Calendar_CalendarListEntry extends Google_Collection
{
    public $accessRole;
    public $backgroundColor;
    public $colorId;
    public $deleted;
    public $description;
    public $etag;
    public $foregroundColor;
    public $hidden;
    public $id;
    public $kind;
    public $location;
    public $primary;
    public $selected;
    public $summary;
    public $summaryOverride;
    public $timeZone;
    protected $collection_key = 'defaultReminders';
    protected $internal_gapi_mappings = [];
    protected $defaultRemindersType = 'Google_Service_Calendar_EventReminder';
    protected $defaultRemindersDataType = 'array';
    protected $notificationSettingsType = 'Google_Service_Calendar_CalendarListEntryNotificationSettings';
    protected $notificationSettingsDataType = '';

    /**
     * @return mixed
     */
    public function getAccessRole()
    {
        return $this->accessRole;
    }

    /**
     * @param $accessRole
     */
    public function setAccessRole($accessRole)
    {
        $this->accessRole = $accessRole;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return mixed
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * @param $colorId
     */
    public function setColorId($colorId)
    {
        $this->colorId = $colorId;
    }

    /**
     * @param $defaultReminders
     */
    public function setDefaultReminders($defaultReminders)
    {
        $this->defaultReminders = $defaultReminders;
    }

    /**
     * @return mixed
     */
    public function getDefaultReminders()
    {
        return $this->defaultReminders;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getForegroundColor()
    {
        return $this->foregroundColor;
    }

    /**
     * @param $foregroundColor
     */
    public function setForegroundColor($foregroundColor)
    {
        $this->foregroundColor = $foregroundColor;
    }

    /**
     * @return mixed
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @param Google_Service_Calendar_CalendarListEntryNotificationSettings $notificationSettings
     */
    public function setNotificationSettings(Google_Service_Calendar_CalendarListEntryNotificationSettings $notificationSettings)
    {
        $this->notificationSettings = $notificationSettings;
    }

    /**
     * @return mixed
     */
    public function getNotificationSettings()
    {
        return $this->notificationSettings;
    }

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param $primary
     */
    public function setPrimary($primary)
    {
        $this->primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getSelected()
    {
        return $this->selected;
    }

    /**
     * @param $selected
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getSummaryOverride()
    {
        return $this->summaryOverride;
    }

    /**
     * @param $summaryOverride
     */
    public function setSummaryOverride($summaryOverride)
    {
        $this->summaryOverride = $summaryOverride;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }
}

/**
 * Class Google_Service_Calendar_CalendarListEntryNotificationSettings
 */
class Google_Service_Calendar_CalendarListEntryNotificationSettings extends Google_Collection
{
    protected $collection_key = 'notifications';
    protected $internal_gapi_mappings = [];
    protected $notificationsType = 'Google_Service_Calendar_CalendarNotification';
    protected $notificationsDataType = 'array';


    /**
     * @param $notifications
     */
    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * @return mixed
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}

/**
 * Class Google_Service_Calendar_CalendarNotification
 */
class Google_Service_Calendar_CalendarNotification extends Google_Model
{
    public $method;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

/**
 * Class Google_Service_Calendar_Channel
 */
class Google_Service_Calendar_Channel extends Google_Model
{
    public $address;
    public $expiration;
    public $id;
    public $kind;
    public $params;
    public $payload;
    public $resourceId;
    public $resourceUri;
    public $token;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    /**
     * @param $resourceUri
     */
    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

/**
 * Class Google_Service_Calendar_ChannelParams
 */
class Google_Service_Calendar_ChannelParams extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_ColorDefinition
 */
class Google_Service_Calendar_ColorDefinition extends Google_Model
{
    public $background;
    public $foreground;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * @return mixed
     */
    public function getForeground()
    {
        return $this->foreground;
    }

    /**
     * @param $foreground
     */
    public function setForeground($foreground)
    {
        $this->foreground = $foreground;
    }
}

/**
 * Class Google_Service_Calendar_Colors
 */
class Google_Service_Calendar_Colors extends Google_Model
{
    public $kind;
    public $updated;
    protected $internal_gapi_mappings = [];
    protected $calendarType = 'Google_Service_Calendar_ColorDefinition';
    protected $calendarDataType = 'map';
    protected $eventType = 'Google_Service_Calendar_ColorDefinition';
    protected $eventDataType = 'map';

    /**
     * @param $calendar
     */
    public function setCalendar($calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * @return mixed
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Calendar_ColorsCalendar
 */
class Google_Service_Calendar_ColorsCalendar extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_ColorsEvent
 */
class Google_Service_Calendar_ColorsEvent extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_Error
 */
class Google_Service_Calendar_Error extends Google_Model
{
    public $domain;
    public $reason;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}

/**
 * Class Google_Service_Calendar_Event
 */
class Google_Service_Calendar_Event extends Google_Collection
{
    public $anyoneCanAddSelf;
    public $attendeesOmitted;
    public $colorId;
    public $created;
    public $description;
    public $endTimeUnspecified;
    public $etag;
    public $guestsCanInviteOthers;
    public $guestsCanModify;
    public $guestsCanSeeOtherGuests;
    public $hangoutLink;
    public $htmlLink;
    public $iCalUID;
    public $id;
    public $kind;
    public $location;
    public $locked;
    public $privateCopy;
    public $recurrence;
    public $recurringEventId;
    public $sequence;
    public $status;
    public $summary;
    public $transparency;
    public $updated;
    public $visibility;
    protected $collection_key = 'recurrence';
    protected $internal_gapi_mappings = [];
    protected $attendeesType = 'Google_Service_Calendar_EventAttendee';
    protected $attendeesDataType = 'array';
    protected $creatorType = 'Google_Service_Calendar_EventCreator';
    protected $creatorDataType = '';
    protected $endType = 'Google_Service_Calendar_EventDateTime';
    protected $endDataType = '';
    protected $extendedPropertiesType = 'Google_Service_Calendar_EventExtendedProperties';
    protected $extendedPropertiesDataType = '';
    protected $gadgetType = 'Google_Service_Calendar_EventGadget';
    protected $gadgetDataType = '';
    protected $organizerType = 'Google_Service_Calendar_EventOrganizer';
    protected $organizerDataType = '';
    protected $originalStartTimeType = 'Google_Service_Calendar_EventDateTime';
    protected $originalStartTimeDataType = '';
    protected $remindersType = 'Google_Service_Calendar_EventReminders';
    protected $remindersDataType = '';
    protected $sourceType = 'Google_Service_Calendar_EventSource';
    protected $sourceDataType = '';
    protected $startType = 'Google_Service_Calendar_EventDateTime';
    protected $startDataType = '';

    /**
     * @return mixed
     */
    public function getAnyoneCanAddSelf()
    {
        return $this->anyoneCanAddSelf;
    }

    /**
     * @param $anyoneCanAddSelf
     */
    public function setAnyoneCanAddSelf($anyoneCanAddSelf)
    {
        $this->anyoneCanAddSelf = $anyoneCanAddSelf;
    }

    /**
     * @param $attendees
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;
    }

    /**
     * @return mixed
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * @return mixed
     */
    public function getAttendeesOmitted()
    {
        return $this->attendeesOmitted;
    }

    /**
     * @param $attendeesOmitted
     */
    public function setAttendeesOmitted($attendeesOmitted)
    {
        $this->attendeesOmitted = $attendeesOmitted;
    }

    /**
     * @return mixed
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * @param $colorId
     */
    public function setColorId($colorId)
    {
        $this->colorId = $colorId;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @param Google_Service_Calendar_EventCreator $creator
     */
    public function setCreator(Google_Service_Calendar_EventCreator $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param Google_Service_Calendar_EventDateTime $end
     */
    public function setEnd(Google_Service_Calendar_EventDateTime $end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return mixed
     */
    public function getEndTimeUnspecified()
    {
        return $this->endTimeUnspecified;
    }

    /**
     * @param $endTimeUnspecified
     */
    public function setEndTimeUnspecified($endTimeUnspecified)
    {
        $this->endTimeUnspecified = $endTimeUnspecified;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @param Google_Service_Calendar_EventExtendedProperties $extendedProperties
     */
    public function setExtendedProperties(Google_Service_Calendar_EventExtendedProperties $extendedProperties)
    {
        $this->extendedProperties = $extendedProperties;
    }

    /**
     * @return mixed
     */
    public function getExtendedProperties()
    {
        return $this->extendedProperties;
    }

    /**
     * @param Google_Service_Calendar_EventGadget $gadget
     */
    public function setGadget(Google_Service_Calendar_EventGadget $gadget)
    {
        $this->gadget = $gadget;
    }

    /**
     * @return mixed
     */
    public function getGadget()
    {
        return $this->gadget;
    }

    /**
     * @return mixed
     */
    public function getGuestsCanInviteOthers()
    {
        return $this->guestsCanInviteOthers;
    }

    /**
     * @param $guestsCanInviteOthers
     */
    public function setGuestsCanInviteOthers($guestsCanInviteOthers)
    {
        $this->guestsCanInviteOthers = $guestsCanInviteOthers;
    }

    /**
     * @return mixed
     */
    public function getGuestsCanModify()
    {
        return $this->guestsCanModify;
    }

    /**
     * @param $guestsCanModify
     */
    public function setGuestsCanModify($guestsCanModify)
    {
        $this->guestsCanModify = $guestsCanModify;
    }

    /**
     * @return mixed
     */
    public function getGuestsCanSeeOtherGuests()
    {
        return $this->guestsCanSeeOtherGuests;
    }

    /**
     * @param $guestsCanSeeOtherGuests
     */
    public function setGuestsCanSeeOtherGuests($guestsCanSeeOtherGuests)
    {
        $this->guestsCanSeeOtherGuests = $guestsCanSeeOtherGuests;
    }

    /**
     * @return mixed
     */
    public function getHangoutLink()
    {
        return $this->hangoutLink;
    }

    /**
     * @param $hangoutLink
     */
    public function setHangoutLink($hangoutLink)
    {
        $this->hangoutLink = $hangoutLink;
    }

    /**
     * @return mixed
     */
    public function getHtmlLink()
    {
        return $this->htmlLink;
    }

    /**
     * @param $htmlLink
     */
    public function setHtmlLink($htmlLink)
    {
        $this->htmlLink = $htmlLink;
    }

    /**
     * @return mixed
     */
    public function getICalUID()
    {
        return $this->iCalUID;
    }

    /**
     * @param $iCalUID
     */
    public function setICalUID($iCalUID)
    {
        $this->iCalUID = $iCalUID;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @param $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @param Google_Service_Calendar_EventOrganizer $organizer
     */
    public function setOrganizer(Google_Service_Calendar_EventOrganizer $organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * @return mixed
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param Google_Service_Calendar_EventDateTime $originalStartTime
     */
    public function setOriginalStartTime(Google_Service_Calendar_EventDateTime $originalStartTime)
    {
        $this->originalStartTime = $originalStartTime;
    }

    /**
     * @return mixed
     */
    public function getOriginalStartTime()
    {
        return $this->originalStartTime;
    }

    /**
     * @return mixed
     */
    public function getPrivateCopy()
    {
        return $this->privateCopy;
    }

    /**
     * @param $privateCopy
     */
    public function setPrivateCopy($privateCopy)
    {
        $this->privateCopy = $privateCopy;
    }

    /**
     * @return mixed
     */
    public function getRecurrence()
    {
        return $this->recurrence;
    }

    /**
     * @param $recurrence
     */
    public function setRecurrence($recurrence)
    {
        $this->recurrence = $recurrence;
    }

    /**
     * @return mixed
     */
    public function getRecurringEventId()
    {
        return $this->recurringEventId;
    }

    /**
     * @param $recurringEventId
     */
    public function setRecurringEventId($recurringEventId)
    {
        $this->recurringEventId = $recurringEventId;
    }

    /**
     * @param Google_Service_Calendar_EventReminders $reminders
     */
    public function setReminders(Google_Service_Calendar_EventReminders $reminders)
    {
        $this->reminders = $reminders;
    }

    /**
     * @return mixed
     */
    public function getReminders()
    {
        return $this->reminders;
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @param Google_Service_Calendar_EventSource $source
     */
    public function setSource(Google_Service_Calendar_EventSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Google_Service_Calendar_EventDateTime $start
     */
    public function setStart(Google_Service_Calendar_EventDateTime $start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getTransparency()
    {
        return $this->transparency;
    }

    /**
     * @param $transparency
     */
    public function setTransparency($transparency)
    {
        $this->transparency = $transparency;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
}

/**
 * Class Google_Service_Calendar_EventAttachment
 */
class Google_Service_Calendar_EventAttachment extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_EventAttendee
 */
class Google_Service_Calendar_EventAttendee extends Google_Model
{
    public $additionalGuests;
    public $comment;
    public $displayName;
    public $email;
    public $id;
    public $optional;
    public $organizer;
    public $resource;
    public $responseStatus;
    public $self;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdditionalGuests()
    {
        return $this->additionalGuests;
    }

    /**
     * @param $additionalGuests
     */
    public function setAdditionalGuests($additionalGuests)
    {
        $this->additionalGuests = $additionalGuests;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOptional()
    {
        return $this->optional;
    }

    /**
     * @param $optional
     */
    public function setOptional($optional)
    {
        $this->optional = $optional;
    }

    /**
     * @return mixed
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param $organizer
     */
    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResponseStatus()
    {
        return $this->responseStatus;
    }

    /**
     * @param $responseStatus
     */
    public function setResponseStatus($responseStatus)
    {
        $this->responseStatus = $responseStatus;
    }

    /**
     * @return mixed
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param $self
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }
}

/**
 * Class Google_Service_Calendar_EventCreator
 */
class Google_Service_Calendar_EventCreator extends Google_Model
{
    public $displayName;
    public $email;
    public $id;
    public $self;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param $self
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }
}

/**
 * Class Google_Service_Calendar_EventDateTime
 */
class Google_Service_Calendar_EventDateTime extends Google_Model
{
    public $date;
    public $dateTime;
    public $timeZone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }
}

/**
 * Class Google_Service_Calendar_EventExtendedProperties
 */
class Google_Service_Calendar_EventExtendedProperties extends Google_Model
{
    public $private;
    public $shared;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return mixed
     */
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * @param $shared
     */
    public function setShared($shared)
    {
        $this->shared = $shared;
    }
}

/**
 * Class Google_Service_Calendar_EventExtendedPropertiesPrivate
 */
class Google_Service_Calendar_EventExtendedPropertiesPrivate extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_EventExtendedPropertiesShared
 */
class Google_Service_Calendar_EventExtendedPropertiesShared extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_EventGadget
 */
class Google_Service_Calendar_EventGadget extends Google_Model
{
    public $display;
    public $height;
    public $iconLink;
    public $link;
    public $preferences;
    public $title;
    public $type;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param $display
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getIconLink()
    {
        return $this->iconLink;
    }

    /**
     * @param $iconLink
     */
    public function setIconLink($iconLink)
    {
        $this->iconLink = $iconLink;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * @param $preferences
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

/**
 * Class Google_Service_Calendar_EventGadgetPreferences
 */
class Google_Service_Calendar_EventGadgetPreferences extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_EventOrganizer
 */
class Google_Service_Calendar_EventOrganizer extends Google_Model
{
    public $displayName;
    public $email;
    public $id;
    public $self;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param $self
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }
}

/**
 * Class Google_Service_Calendar_EventReminder
 */
class Google_Service_Calendar_EventReminder extends Google_Model
{
    public $method;
    public $minutes;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param $minutes
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    }
}

/**
 * Class Google_Service_Calendar_EventReminders
 */
class Google_Service_Calendar_EventReminders extends Google_Collection
{
    public $useDefault;
    protected $collection_key = 'overrides';
    protected $internal_gapi_mappings = [];
    protected $overridesType = 'Google_Service_Calendar_EventReminder';
    protected $overridesDataType = 'array';

    /**
     * @param $overrides
     */
    public function setOverrides($overrides)
    {
        $this->overrides = $overrides;
    }

    /**
     * @return mixed
     */
    public function getOverrides()
    {
        return $this->overrides;
    }

    /**
     * @return mixed
     */
    public function getUseDefault()
    {
        return $this->useDefault;
    }

    /**
     * @param $useDefault
     */
    public function setUseDefault($useDefault)
    {
        $this->useDefault = $useDefault;
    }
}

/**
 * Class Google_Service_Calendar_EventSource
 */
class Google_Service_Calendar_EventSource extends Google_Model
{
    public $title;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}

/**
 * Class Google_Service_Calendar_Events
 */
class Google_Service_Calendar_Events extends Google_Collection
{
    public $accessRole;
    public $description;
    public $etag;
    public $kind;
    public $nextPageToken;
    public $nextSyncToken;
    public $summary;
    public $timeZone;
    public $updated;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $defaultRemindersType = 'Google_Service_Calendar_EventReminder';
    protected $defaultRemindersDataType = 'array';
    protected $itemsType = 'Google_Service_Calendar_Event';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccessRole()
    {
        return $this->accessRole;
    }

    /**
     * @param $accessRole
     */
    public function setAccessRole($accessRole)
    {
        $this->accessRole = $accessRole;
    }

    /**
     * @param $defaultReminders
     */
    public function setDefaultReminders($defaultReminders)
    {
        $this->defaultReminders = $defaultReminders;
    }

    /**
     * @return mixed
     */
    public function getDefaultReminders()
    {
        return $this->defaultReminders;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return mixed
     */
    public function getNextSyncToken()
    {
        return $this->nextSyncToken;
    }

    /**
     * @param $nextSyncToken
     */
    public function setNextSyncToken($nextSyncToken)
    {
        $this->nextSyncToken = $nextSyncToken;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyCalendar
 */
class Google_Service_Calendar_FreeBusyCalendar extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $busyType = 'Google_Service_Calendar_TimePeriod';
    protected $busyDataType = 'array';
    protected $errorsType = 'Google_Service_Calendar_Error';
    protected $errorsDataType = 'array';


    /**
     * @param $busy
     */
    public function setBusy($busy)
    {
        $this->busy = $busy;
    }

    /**
     * @return mixed
     */
    public function getBusy()
    {
        return $this->busy;
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyGroup
 */
class Google_Service_Calendar_FreeBusyGroup extends Google_Collection
{
    public $calendars;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Calendar_Error';
    protected $errorsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCalendars()
    {
        return $this->calendars;
    }

    /**
     * @param $calendars
     */
    public function setCalendars($calendars)
    {
        $this->calendars = $calendars;
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyRequest
 */
class Google_Service_Calendar_FreeBusyRequest extends Google_Collection
{
    public $calendarExpansionMax;
    public $groupExpansionMax;
    public $timeMax;
    public $timeMin;
    public $timeZone;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Calendar_FreeBusyRequestItem';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCalendarExpansionMax()
    {
        return $this->calendarExpansionMax;
    }

    /**
     * @param $calendarExpansionMax
     */
    public function setCalendarExpansionMax($calendarExpansionMax)
    {
        $this->calendarExpansionMax = $calendarExpansionMax;
    }

    /**
     * @return mixed
     */
    public function getGroupExpansionMax()
    {
        return $this->groupExpansionMax;
    }

    /**
     * @param $groupExpansionMax
     */
    public function setGroupExpansionMax($groupExpansionMax)
    {
        $this->groupExpansionMax = $groupExpansionMax;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getTimeMax()
    {
        return $this->timeMax;
    }

    /**
     * @param $timeMax
     */
    public function setTimeMax($timeMax)
    {
        $this->timeMax = $timeMax;
    }

    /**
     * @return mixed
     */
    public function getTimeMin()
    {
        return $this->timeMin;
    }

    /**
     * @param $timeMin
     */
    public function setTimeMin($timeMin)
    {
        $this->timeMin = $timeMin;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyRequestItem
 */
class Google_Service_Calendar_FreeBusyRequestItem extends Google_Model
{
    public $id;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyResponse
 */
class Google_Service_Calendar_FreeBusyResponse extends Google_Model
{
    public $kind;
    public $timeMax;
    public $timeMin;
    protected $internal_gapi_mappings = [];
    protected $calendarsType = 'Google_Service_Calendar_FreeBusyCalendar';
    protected $calendarsDataType = 'map';
    protected $groupsType = 'Google_Service_Calendar_FreeBusyGroup';
    protected $groupsDataType = 'map';

    /**
     * @param $calendars
     */
    public function setCalendars($calendars)
    {
        $this->calendars = $calendars;
    }

    /**
     * @return mixed
     */
    public function getCalendars()
    {
        return $this->calendars;
    }

    /**
     * @param $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getTimeMax()
    {
        return $this->timeMax;
    }

    /**
     * @param $timeMax
     */
    public function setTimeMax($timeMax)
    {
        $this->timeMax = $timeMax;
    }

    /**
     * @return mixed
     */
    public function getTimeMin()
    {
        return $this->timeMin;
    }

    /**
     * @param $timeMin
     */
    public function setTimeMin($timeMin)
    {
        $this->timeMin = $timeMin;
    }
}

/**
 * Class Google_Service_Calendar_FreeBusyResponseCalendars
 */
class Google_Service_Calendar_FreeBusyResponseCalendars extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_FreeBusyResponseGroups
 */
class Google_Service_Calendar_FreeBusyResponseGroups extends Google_Model
{
}

/**
 * Class Google_Service_Calendar_Setting
 */
class Google_Service_Calendar_Setting extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

/**
 * Class Google_Service_Calendar_Settings
 */
class Google_Service_Calendar_Settings extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $nextSyncToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Calendar_Setting';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return mixed
     */
    public function getNextSyncToken()
    {
        return $this->nextSyncToken;
    }

    /**
     * @param $nextSyncToken
     */
    public function setNextSyncToken($nextSyncToken)
    {
        $this->nextSyncToken = $nextSyncToken;
    }
}

/**
 * Class Google_Service_Calendar_TimePeriod
 */
class Google_Service_Calendar_TimePeriod extends Google_Model
{
    public $end;
    public $start;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
}
