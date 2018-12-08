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
 * Service definition for Coordinate (v1).
 *
 * <p>
 * Lets you view and manage jobs in a Coordinate team.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/coordinate/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Coordinate extends Google_Service
{
    /** View and manage your Google Maps Coordinate jobs. */
    const COORDINATE =
        "https://www.googleapis.com/auth/coordinate";
    /** View your Google Coordinate jobs. */
    const COORDINATE_READONLY =
        "https://www.googleapis.com/auth/coordinate.readonly";

    public $customFieldDef;
    public $jobs;
    public $location;
    public $schedule;
    public $team;
    public $worker;


    /**
     * Constructs the internal representation of the Coordinate service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'coordinate/v1/';
        $this->version = 'v1';
        $this->serviceName = 'coordinate';

        $this->customFieldDef = new Google_Service_Coordinate_CustomFieldDef_Resource(
            $this,
            $this->serviceName,
            'customFieldDef',
            [
                'methods' => [
                    'list' => [
                        'path' => 'teams/{teamId}/custom_fields',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->jobs = new Google_Service_Coordinate_Jobs_Resource(
            $this,
            $this->serviceName,
            'jobs',
            [
                'methods' => [
                    'get' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'teams/{teamId}/jobs',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'address' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'lat' => [
                                'location' => 'query',
                                'type' => 'number',
                                'required' => true,
                            ],
                            'lng' => [
                                'location' => 'query',
                                'type' => 'number',
                                'required' => true,
                            ],
                            'title' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customerName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'note' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'assignee' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerPhoneNumber' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customField' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'teams/{teamId}/jobs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'minModifiedTimestampMs' => [
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
                        ],
                    ], 'patch' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customerName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'title' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'note' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'assignee' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerPhoneNumber' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'address' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lat' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                            'progress' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lng' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                            'customField' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customerName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'title' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'note' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'assignee' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerPhoneNumber' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'address' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lat' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                            'progress' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lng' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                            'customField' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->location = new Google_Service_Coordinate_Location_Resource(
            $this,
            $this->serviceName,
            'location',
            [
                'methods' => [
                    'list' => [
                        'path' => 'teams/{teamId}/workers/{workerEmail}/locations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'workerEmail' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startTimestampMs' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->schedule = new Google_Service_Coordinate_Schedule_Resource(
            $this,
            $this->serviceName,
            'schedule',
            [
                'methods' => [
                    'get' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}/schedule',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}/schedule',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'allDay' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'duration' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'teams/{teamId}/jobs/{jobId}/schedule',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'allDay' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'duration' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->team = new Google_Service_Coordinate_Team_Resource(
            $this,
            $this->serviceName,
            'team',
            [
                'methods' => [
                    'list' => [
                        'path' => 'teams',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'admin' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'worker' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'dispatcher' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->worker = new Google_Service_Coordinate_Worker_Resource(
            $this,
            $this->serviceName,
            'worker',
            [
                'methods' => [
                    'list' => [
                        'path' => 'teams/{teamId}/workers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'teamId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "customFieldDef" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $customFieldDef = $coordinateService->customFieldDef;
 *  </code>
 */
class Google_Service_Coordinate_CustomFieldDef_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of custom field definitions for a team.
     * (customFieldDef.listCustomFieldDef)
     *
     * @param string $teamId Team ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listCustomFieldDef($teamId, $optParams = [])
    {
        $params = ['teamId' => $teamId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Coordinate_CustomFieldDefListResponse");
    }
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $jobs = $coordinateService->jobs;
 *  </code>
 */
class Google_Service_Coordinate_Jobs_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a job, including all the changes made to the job. (jobs.get)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($teamId, $jobId, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Coordinate_Job");
    }

    /**
     * Inserts a new job. Only the state field of the job should be set.
     * (jobs.insert)
     *
     * @param string $teamId Team ID
     * @param string $address Job address as newline (Unix) separated string
     * @param double $lat The latitude coordinate of this job's location.
     * @param double $lng The longitude coordinate of this job's location.
     * @param string $title Job title
     * @param Google_Job|Google_Service_Coordinate_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerName Customer name
     * @opt_param string note Job note as newline (Unix) separated string
     * @opt_param string assignee Assignee email address, or empty string to
     * unassign.
     * @opt_param string customerPhoneNumber Customer phone number
     * @opt_param string customField Sets the value of custom fields. To set a
     * custom field, pass the field id (from /team/teamId/custom_fields), a URL
     * escaped '=' character, and the desired value as a parameter. For example,
     * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
     * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
     * enum field will result in an error 500.
     */
    public function insert($teamId, $address, $lat, $lng, $title, Google_Service_Coordinate_Job $postBody, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'address' => $address, 'lat' => $lat, 'lng' => $lng, 'title' => $title, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Coordinate_Job");
    }

    /**
     * Retrieves jobs created or modified since the given timestamp. (jobs.listJobs)
     *
     * @param string $teamId Team ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string minModifiedTimestampMs Minimum time a job was modified in
     * milliseconds since epoch.
     * @opt_param string maxResults Maximum number of results to return in one page.
     * @opt_param string pageToken Continuation token
     */
    public function listJobs($teamId, $optParams = [])
    {
        $params = ['teamId' => $teamId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Coordinate_JobListResponse");
    }

    /**
     * Updates a job. Fields that are set in the job state will be updated. This
     * method supports patch semantics. (jobs.patch)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param Google_Job|Google_Service_Coordinate_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerName Customer name
     * @opt_param string title Job title
     * @opt_param string note Job note as newline (Unix) separated string
     * @opt_param string assignee Assignee email address, or empty string to
     * unassign.
     * @opt_param string customerPhoneNumber Customer phone number
     * @opt_param string address Job address as newline (Unix) separated string
     * @opt_param double lat The latitude coordinate of this job's location.
     * @opt_param string progress Job progress
     * @opt_param double lng The longitude coordinate of this job's location.
     * @opt_param string customField Sets the value of custom fields. To set a
     * custom field, pass the field id (from /team/teamId/custom_fields), a URL
     * escaped '=' character, and the desired value as a parameter. For example,
     * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
     * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
     * enum field will result in an error 500.
     */
    public function patch($teamId, $jobId, Google_Service_Coordinate_Job $postBody, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Coordinate_Job");
    }

    /**
     * Updates a job. Fields that are set in the job state will be updated.
     * (jobs.update)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param Google_Job|Google_Service_Coordinate_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerName Customer name
     * @opt_param string title Job title
     * @opt_param string note Job note as newline (Unix) separated string
     * @opt_param string assignee Assignee email address, or empty string to
     * unassign.
     * @opt_param string customerPhoneNumber Customer phone number
     * @opt_param string address Job address as newline (Unix) separated string
     * @opt_param double lat The latitude coordinate of this job's location.
     * @opt_param string progress Job progress
     * @opt_param double lng The longitude coordinate of this job's location.
     * @opt_param string customField Sets the value of custom fields. To set a
     * custom field, pass the field id (from /team/teamId/custom_fields), a URL
     * escaped '=' character, and the desired value as a parameter. For example,
     * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
     * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
     * enum field will result in an error 500.
     */
    public function update($teamId, $jobId, Google_Service_Coordinate_Job $postBody, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Coordinate_Job");
    }
}

/**
 * The "location" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $location = $coordinateService->location;
 *  </code>
 */
class Google_Service_Coordinate_Location_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of locations for a worker. (location.listLocation)
     *
     * @param string $teamId Team ID
     * @param string $workerEmail Worker email address.
     * @param string $startTimestampMs Start timestamp in milliseconds since the
     *                                 epoch.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token
     * @opt_param string maxResults Maximum number of results to return in one page.
     */
    public function listLocation($teamId, $workerEmail, $startTimestampMs, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'workerEmail' => $workerEmail, 'startTimestampMs' => $startTimestampMs];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Coordinate_LocationListResponse");
    }
}

/**
 * The "schedule" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $schedule = $coordinateService->schedule;
 *  </code>
 */
class Google_Service_Coordinate_Schedule_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the schedule for a job. (schedule.get)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($teamId, $jobId, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Coordinate_Schedule");
    }

    /**
     * Replaces the schedule of a job with the provided schedule. This method
     * supports patch semantics. (schedule.patch)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param Google_Schedule|Google_Service_Coordinate_Schedule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool allDay Whether the job is scheduled for the whole day. Time
     * of day in start/end times is ignored if this is true.
     * @opt_param string startTime Scheduled start time in milliseconds since epoch.
     * @opt_param string duration Job duration in milliseconds.
     * @opt_param string endTime Scheduled end time in milliseconds since epoch.
     */
    public function patch($teamId, $jobId, Google_Service_Coordinate_Schedule $postBody, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Coordinate_Schedule");
    }

    /**
     * Replaces the schedule of a job with the provided schedule. (schedule.update)
     *
     * @param string $teamId Team ID
     * @param string $jobId Job number
     * @param Google_Schedule|Google_Service_Coordinate_Schedule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool allDay Whether the job is scheduled for the whole day. Time
     * of day in start/end times is ignored if this is true.
     * @opt_param string startTime Scheduled start time in milliseconds since epoch.
     * @opt_param string duration Job duration in milliseconds.
     * @opt_param string endTime Scheduled end time in milliseconds since epoch.
     */
    public function update($teamId, $jobId, Google_Service_Coordinate_Schedule $postBody, $optParams = [])
    {
        $params = ['teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Coordinate_Schedule");
    }
}

/**
 * The "team" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $team = $coordinateService->team;
 *  </code>
 */
class Google_Service_Coordinate_Team_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of teams for a user. (team.listTeam)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool admin Whether to include teams for which the user has the
     * Admin role.
     * @opt_param bool worker Whether to include teams for which the user has the
     * Worker role.
     * @opt_param bool dispatcher Whether to include teams for which the user has
     * the Dispatcher role.
     */
    public function listTeam($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Coordinate_TeamListResponse");
    }
}

/**
 * The "worker" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $worker = $coordinateService->worker;
 *  </code>
 */
class Google_Service_Coordinate_Worker_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of workers in a team. (worker.listWorker)
     *
     * @param string $teamId Team ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listWorker($teamId, $optParams = [])
    {
        $params = ['teamId' => $teamId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Coordinate_WorkerListResponse");
    }
}


/**
 * Class Google_Service_Coordinate_CustomField
 */
class Google_Service_Coordinate_CustomField extends Google_Model
{
    public $customFieldId;
    public $kind;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomFieldId()
    {
        return $this->customFieldId;
    }

    /**
     * @param $customFieldId
     */
    public function setCustomFieldId($customFieldId)
    {
        $this->customFieldId = $customFieldId;
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
 * Class Google_Service_Coordinate_CustomFieldDef
 */
class Google_Service_Coordinate_CustomFieldDef extends Google_Collection
{
    public $enabled;
    public $id;
    public $kind;
    public $name;
    public $requiredForCheckout;
    public $type;
    protected $collection_key = 'enumitems';
    protected $internal_gapi_mappings = [];
    protected $enumitemsType = 'Google_Service_Coordinate_EnumItemDef';
    protected $enumitemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @param $enumitems
     */
    public function setEnumitems($enumitems)
    {
        $this->enumitems = $enumitems;
    }

    /**
     * @return mixed
     */
    public function getEnumitems()
    {
        return $this->enumitems;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRequiredForCheckout()
    {
        return $this->requiredForCheckout;
    }

    /**
     * @param $requiredForCheckout
     */
    public function setRequiredForCheckout($requiredForCheckout)
    {
        $this->requiredForCheckout = $requiredForCheckout;
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
 * Class Google_Service_Coordinate_CustomFieldDefListResponse
 */
class Google_Service_Coordinate_CustomFieldDefListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Coordinate_CustomFieldDef';
    protected $itemsDataType = 'array';

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
}

/**
 * Class Google_Service_Coordinate_CustomFields
 */
class Google_Service_Coordinate_CustomFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'customField';
    protected $internal_gapi_mappings = [];
    protected $customFieldType = 'Google_Service_Coordinate_CustomField';
    protected $customFieldDataType = 'array';

    /**
     * @param $customField
     */
    public function setCustomField($customField)
    {
        $this->customField = $customField;
    }

    /**
     * @return mixed
     */
    public function getCustomField()
    {
        return $this->customField;
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
}

/**
 * Class Google_Service_Coordinate_EnumItemDef
 */
class Google_Service_Coordinate_EnumItemDef extends Google_Model
{
    public $active;
    public $kind;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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
 * Class Google_Service_Coordinate_Job
 */
class Google_Service_Coordinate_Job extends Google_Collection
{
    public $id;
    public $kind;
    protected $collection_key = 'jobChange';
    protected $internal_gapi_mappings = [];
    protected $jobChangeType = 'Google_Service_Coordinate_JobChange';
    protected $jobChangeDataType = 'array';
    protected $stateType = 'Google_Service_Coordinate_JobState';
    protected $stateDataType = '';

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
     * @param $jobChange
     */
    public function setJobChange($jobChange)
    {
        $this->jobChange = $jobChange;
    }

    /**
     * @return mixed
     */
    public function getJobChange()
    {
        return $this->jobChange;
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
     * @param Google_Service_Coordinate_JobState $state
     */
    public function setState(Google_Service_Coordinate_JobState $state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }
}

/**
 * Class Google_Service_Coordinate_JobChange
 */
class Google_Service_Coordinate_JobChange extends Google_Model
{
    public $kind;
    public $timestamp;
    protected $internal_gapi_mappings = [];
    protected $stateType = 'Google_Service_Coordinate_JobState';
    protected $stateDataType = '';

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
     * @param Google_Service_Coordinate_JobState $state
     */
    public function setState(Google_Service_Coordinate_JobState $state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
}

/**
 * Class Google_Service_Coordinate_JobListResponse
 */
class Google_Service_Coordinate_JobListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Coordinate_Job';
    protected $itemsDataType = 'array';

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
}

/**
 * Class Google_Service_Coordinate_JobState
 */
class Google_Service_Coordinate_JobState extends Google_Collection
{
    public $assignee;
    public $customerName;
    public $customerPhoneNumber;
    public $kind;
    public $note;
    public $progress;
    public $title;
    protected $collection_key = 'note';
    protected $internal_gapi_mappings = [];
    protected $customFieldsType = 'Google_Service_Coordinate_CustomFields';
    protected $customFieldsDataType = '';
    protected $locationType = 'Google_Service_Coordinate_Location';
    protected $locationDataType = '';

    /**
     * @return mixed
     */
    public function getAssignee()
    {
        return $this->assignee;
    }

    /**
     * @param $assignee
     */
    public function setAssignee($assignee)
    {
        $this->assignee = $assignee;
    }

    /**
     * @param Google_Service_Coordinate_CustomFields $customFields
     */
    public function setCustomFields(Google_Service_Coordinate_CustomFields $customFields)
    {
        $this->customFields = $customFields;
    }

    /**
     * @return mixed
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getCustomerPhoneNumber()
    {
        return $this->customerPhoneNumber;
    }

    /**
     * @param $customerPhoneNumber
     */
    public function setCustomerPhoneNumber($customerPhoneNumber)
    {
        $this->customerPhoneNumber = $customerPhoneNumber;
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
     * @param Google_Service_Coordinate_Location $location
     */
    public function setLocation(Google_Service_Coordinate_Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @param $progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
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
}

/**
 * Class Google_Service_Coordinate_Location
 */
class Google_Service_Coordinate_Location extends Google_Collection
{
    public $addressLine;
    public $kind;
    public $lat;
    public $lng;
    protected $collection_key = 'addressLine';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * @param $addressLine
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
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
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }
}

/**
 * Class Google_Service_Coordinate_LocationListResponse
 */
class Google_Service_Coordinate_LocationListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Coordinate_LocationRecord';
    protected $itemsDataType = 'array';
    protected $tokenPaginationType = 'Google_Service_Coordinate_TokenPagination';
    protected $tokenPaginationDataType = '';


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
     * @param Google_Service_Coordinate_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_Coordinate_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }
}

/**
 * Class Google_Service_Coordinate_LocationRecord
 */
class Google_Service_Coordinate_LocationRecord extends Google_Model
{
    public $collectionTime;
    public $confidenceRadius;
    public $kind;
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCollectionTime()
    {
        return $this->collectionTime;
    }

    /**
     * @param $collectionTime
     */
    public function setCollectionTime($collectionTime)
    {
        $this->collectionTime = $collectionTime;
    }

    /**
     * @return mixed
     */
    public function getConfidenceRadius()
    {
        return $this->confidenceRadius;
    }

    /**
     * @param $confidenceRadius
     */
    public function setConfidenceRadius($confidenceRadius)
    {
        $this->confidenceRadius = $confidenceRadius;
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
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}

/**
 * Class Google_Service_Coordinate_Schedule
 */
class Google_Service_Coordinate_Schedule extends Google_Model
{
    public $allDay;
    public $duration;
    public $endTime;
    public $kind;
    public $startTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param $allDay
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
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
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }
}

/**
 * Class Google_Service_Coordinate_Team
 */
class Google_Service_Coordinate_Team extends Google_Model
{
    public $id;
    public $kind;
    public $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

/**
 * Class Google_Service_Coordinate_TeamListResponse
 */
class Google_Service_Coordinate_TeamListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Coordinate_Team';
    protected $itemsDataType = 'array';

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
}

/**
 * Class Google_Service_Coordinate_TokenPagination
 */
class Google_Service_Coordinate_TokenPagination extends Google_Model
{
    public $kind;
    public $nextPageToken;
    public $previousPageToken;
    protected $internal_gapi_mappings = [];

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
    public function getPreviousPageToken()
    {
        return $this->previousPageToken;
    }

    /**
     * @param $previousPageToken
     */
    public function setPreviousPageToken($previousPageToken)
    {
        $this->previousPageToken = $previousPageToken;
    }
}

/**
 * Class Google_Service_Coordinate_Worker
 */
class Google_Service_Coordinate_Worker extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Coordinate_WorkerListResponse
 */
class Google_Service_Coordinate_WorkerListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Coordinate_Worker';
    protected $itemsDataType = 'array';

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
}
