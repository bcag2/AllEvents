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
 * Service definition for Reports (reports_v1).
 *
 * <p>
 * Allows the administrators of Google Apps customers to fetch reports about the
 * usage, collaboration, security and risk for their users.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/reports/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Reports extends Google_Service
{
    /** View audit reports of Google Apps for your domain. */
    const ADMIN_REPORTS_AUDIT_READONLY =
        "https://www.googleapis.com/auth/admin.reports.audit.readonly";
    /** View usage reports of Google Apps for your domain. */
    const ADMIN_REPORTS_USAGE_READONLY =
        "https://www.googleapis.com/auth/admin.reports.usage.readonly";

    public $activities;
    public $channels;
    public $customerUsageReports;
    public $userUsageReport;


    /**
     * Constructs the internal representation of the Reports service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'admin/reports/v1/';
        $this->version = 'reports_v1';
        $this->serviceName = 'admin';

        $this->activities = new Google_Service_Reports_Activities_Resource(
            $this,
            $this->serviceName,
            'activities',
            [
                'methods' => [
                    'list' => [
                        'path' => 'activity/users/{userKey}/applications/{applicationName}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'applicationName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'actorIpAddress' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'eventName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'activity/users/{userKey}/applications/{applicationName}/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'applicationName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'actorIpAddress' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'eventName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_Reports_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'stop' => [
                        'path' => '/admin/reports_v1/channels/stop',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->customerUsageReports = new Google_Service_Reports_CustomerUsageReports_Resource(
            $this,
            $this->serviceName,
            'customerUsageReports',
            [
                'methods' => [
                    'get' => [
                        'path' => 'usage/dates/{date}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'date' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'parameters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->userUsageReport = new Google_Service_Reports_UserUsageReport_Resource(
            $this,
            $this->serviceName,
            'userUsageReport',
            [
                'methods' => [
                    'get' => [
                        'path' => 'usage/users/{userKey}/dates/{date}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'date' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'parameters' => [
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
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerId' => [
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
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $activities = $adminService->activities;
 *  </code>
 */
class Google_Service_Reports_Activities_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of activities for a specific customer and application.
     * (activities.listActivities)
     *
     * @param string $userKey Represents the profile id or the user email for which
     *                                the data should be filtered. When 'all' is specified as the userKey, it
     *                                returns usageReports for all users.
     * @param string $applicationName Application name for which the events are to
     *                                be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string startTime Return events which occured at or after this
     * time.
     * @opt_param string actorIpAddress IP Address of host where the event was
     * performed. Supports both IPv4 and IPv6 addresses.
     * @opt_param int maxResults Number of activity records to be shown in each
     * page.
     * @opt_param string eventName Name of the event being queried.
     * @opt_param string pageToken Token to specify next page.
     * @opt_param string filters Event parameters in the form [parameter1
     * name][operator][parameter1 value],[parameter2 name][operator][parameter2
     * value],...
     * @opt_param string endTime Return events which occured at or before this time.
     * @opt_param string customerId Represents the customer for which the data is to
     * be fetched.
     */
    public function listActivities($userKey, $applicationName, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'applicationName' => $applicationName];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Reports_Activities");
    }

    /**
     * Push changes to activities (activities.watch)
     *
     * @param string $userKey Represents the profile id or the user email for which
     *                                                                       the data should be filtered. When 'all' is specified as the userKey, it
     *                                                                       returns usageReports for all users.
     * @param string $applicationName Application name for which the events are to
     *                                                                       be retrieved.
     * @param Google_Channel|Google_Service_Reports_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string startTime Return events which occured at or after this
     * time.
     * @opt_param string actorIpAddress IP Address of host where the event was
     * performed. Supports both IPv4 and IPv6 addresses.
     * @opt_param int maxResults Number of activity records to be shown in each
     * page.
     * @opt_param string eventName Name of the event being queried.
     * @opt_param string pageToken Token to specify next page.
     * @opt_param string filters Event parameters in the form [parameter1
     * name][operator][parameter1 value],[parameter2 name][operator][parameter2
     * value],...
     * @opt_param string endTime Return events which occured at or before this time.
     * @opt_param string customerId Represents the customer for which the data is to
     * be fetched.
     */
    public function watch($userKey, $applicationName, Google_Service_Reports_Channel $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'applicationName' => $applicationName, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Reports_Channel");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $channels = $adminService->channels;
 *  </code>
 */
class Google_Service_Reports_Channels_Resource extends Google_Service_Resource
{

    /**
     * Stop watching resources through this channel (channels.stop)
     *
     * @param Google_Channel|Google_Service_Reports_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop(Google_Service_Reports_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params]);
    }
}

/**
 * The "customerUsageReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $customerUsageReports = $adminService->customerUsageReports;
 *  </code>
 */
class Google_Service_Reports_CustomerUsageReports_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a report which is a collection of properties / statistics for a
     * specific customer. (customerUsageReports.get)
     *
     * @param string $date Represents the date in yyyy-mm-dd format for which the
     *                          data is to be fetched.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token to specify next page.
     * @opt_param string customerId Represents the customer for which the data is to
     * be fetched.
     * @opt_param string parameters Represents the application name, parameter name
     * pairs to fetch in csv as app_name1:param_name1, app_name2:param_name2.
     */
    public function get($date, $optParams = [])
    {
        $params = ['date' => $date];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Reports_UsageReports");
    }
}

/**
 * The "userUsageReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $userUsageReport = $adminService->userUsageReport;
 *  </code>
 */
class Google_Service_Reports_UserUsageReport_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a report which is a collection of properties / statistics for a set
     * of users. (userUsageReport.get)
     *
     * @param string $userKey Represents the profile id or the user email for which
     *                          the data should be filtered.
     * @param string $date Represents the date in yyyy-mm-dd format for which the
     *                          data is to be fetched.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string parameters Represents the application name, parameter name
     * pairs to fetch in csv as app_name1:param_name1, app_name2:param_name2.
     * @opt_param string maxResults Maximum number of results to return. Maximum
     * allowed is 1000
     * @opt_param string pageToken Token to specify next page.
     * @opt_param string filters Represents the set of filters including parameter
     * operator value.
     * @opt_param string customerId Represents the customer for which the data is to
     * be fetched.
     */
    public function get($userKey, $date, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'date' => $date];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Reports_UsageReports");
    }
}


/**
 * Class Google_Service_Reports_Activities
 */
class Google_Service_Reports_Activities extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Reports_Activity';
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
}

/**
 * Class Google_Service_Reports_Activity
 */
class Google_Service_Reports_Activity extends Google_Collection
{
    public $etag;
    public $ipAddress;
    public $kind;
    public $ownerDomain;
    protected $collection_key = 'events';
    protected $internal_gapi_mappings = [];
    protected $actorType = 'Google_Service_Reports_ActivityActor';
    protected $actorDataType = '';
    protected $eventsType = 'Google_Service_Reports_ActivityEvents';
    protected $eventsDataType = 'array';
    protected $idType = 'Google_Service_Reports_ActivityId';
    protected $idDataType = '';

    /**
     * @param Google_Service_Reports_ActivityActor $actor
     */
    public function setActor(Google_Service_Reports_ActivityActor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
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
     * @param $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return mixed
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Google_Service_Reports_ActivityId $id
     */
    public function setId(Google_Service_Reports_ActivityId $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
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
    public function getOwnerDomain()
    {
        return $this->ownerDomain;
    }

    /**
     * @param $ownerDomain
     */
    public function setOwnerDomain($ownerDomain)
    {
        $this->ownerDomain = $ownerDomain;
    }
}

/**
 * Class Google_Service_Reports_ActivityActor
 */
class Google_Service_Reports_ActivityActor extends Google_Model
{
    public $callerType;
    public $email;
    public $key;
    public $profileId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCallerType()
    {
        return $this->callerType;
    }

    /**
     * @param $callerType
     */
    public function setCallerType($callerType)
    {
        $this->callerType = $callerType;
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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }
}

/**
 * Class Google_Service_Reports_ActivityEvents
 */
class Google_Service_Reports_ActivityEvents extends Google_Collection
{
    public $name;
    public $type;
    protected $collection_key = 'parameters';
    protected $internal_gapi_mappings = [];
    protected $parametersType = 'Google_Service_Reports_ActivityEventsParameters';
    protected $parametersDataType = 'array';

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
     * @param $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
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
 * Class Google_Service_Reports_ActivityEventsParameters
 */
class Google_Service_Reports_ActivityEventsParameters extends Google_Collection
{
    public $boolValue;
    public $intValue;
    public $multiIntValue;
    public $multiValue;
    public $name;
    public $value;
    protected $collection_key = 'multiValue';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBoolValue()
    {
        return $this->boolValue;
    }

    /**
     * @param $boolValue
     */
    public function setBoolValue($boolValue)
    {
        $this->boolValue = $boolValue;
    }

    /**
     * @return mixed
     */
    public function getIntValue()
    {
        return $this->intValue;
    }

    /**
     * @param $intValue
     */
    public function setIntValue($intValue)
    {
        $this->intValue = $intValue;
    }

    /**
     * @return mixed
     */
    public function getMultiIntValue()
    {
        return $this->multiIntValue;
    }

    /**
     * @param $multiIntValue
     */
    public function setMultiIntValue($multiIntValue)
    {
        $this->multiIntValue = $multiIntValue;
    }

    /**
     * @return mixed
     */
    public function getMultiValue()
    {
        return $this->multiValue;
    }

    /**
     * @param $multiValue
     */
    public function setMultiValue($multiValue)
    {
        $this->multiValue = $multiValue;
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
 * Class Google_Service_Reports_ActivityId
 */
class Google_Service_Reports_ActivityId extends Google_Model
{
    public $applicationName;
    public $customerId;
    public $time;
    public $uniqueQualifier;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param $applicationName
     */
    public function setApplicationName($applicationName)
    {
        $this->applicationName = $applicationName;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getUniqueQualifier()
    {
        return $this->uniqueQualifier;
    }

    /**
     * @param $uniqueQualifier
     */
    public function setUniqueQualifier($uniqueQualifier)
    {
        $this->uniqueQualifier = $uniqueQualifier;
    }
}

/**
 * Class Google_Service_Reports_Channel
 */
class Google_Service_Reports_Channel extends Google_Model
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
 * Class Google_Service_Reports_ChannelParams
 */
class Google_Service_Reports_ChannelParams extends Google_Model
{
}

/**
 * Class Google_Service_Reports_UsageReport
 */
class Google_Service_Reports_UsageReport extends Google_Collection
{
    public $date;
    public $etag;
    public $kind;
    protected $collection_key = 'parameters';
    protected $internal_gapi_mappings = [];
    protected $entityType = 'Google_Service_Reports_UsageReportEntity';
    protected $entityDataType = '';
    protected $parametersType = 'Google_Service_Reports_UsageReportParameters';
    protected $parametersDataType = 'array';

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
     * @param Google_Service_Reports_UsageReportEntity $entity
     */
    public function setEntity(Google_Service_Reports_UsageReportEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
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
     * @param $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}

/**
 * Class Google_Service_Reports_UsageReportEntity
 */
class Google_Service_Reports_UsageReportEntity extends Google_Model
{
    public $customerId;
    public $profileId;
    public $type;
    public $userEmail;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
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
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
}

/**
 * Class Google_Service_Reports_UsageReportParameters
 */
class Google_Service_Reports_UsageReportParameters extends Google_Collection
{
    public $boolValue;
    public $datetimeValue;
    public $intValue;
    public $msgValue;
    public $name;
    public $stringValue;
    protected $collection_key = 'msgValue';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBoolValue()
    {
        return $this->boolValue;
    }

    /**
     * @param $boolValue
     */
    public function setBoolValue($boolValue)
    {
        $this->boolValue = $boolValue;
    }

    /**
     * @return mixed
     */
    public function getDatetimeValue()
    {
        return $this->datetimeValue;
    }

    /**
     * @param $datetimeValue
     */
    public function setDatetimeValue($datetimeValue)
    {
        $this->datetimeValue = $datetimeValue;
    }

    /**
     * @return mixed
     */
    public function getIntValue()
    {
        return $this->intValue;
    }

    /**
     * @param $intValue
     */
    public function setIntValue($intValue)
    {
        $this->intValue = $intValue;
    }

    /**
     * @return mixed
     */
    public function getMsgValue()
    {
        return $this->msgValue;
    }

    /**
     * @param $msgValue
     */
    public function setMsgValue($msgValue)
    {
        $this->msgValue = $msgValue;
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
    public function getStringValue()
    {
        return $this->stringValue;
    }

    /**
     * @param $stringValue
     */
    public function setStringValue($stringValue)
    {
        $this->stringValue = $stringValue;
    }
}

/**
 * Class Google_Service_Reports_UsageReportParametersMsgValue
 */
class Google_Service_Reports_UsageReportParametersMsgValue extends Google_Model
{
}

/**
 * Class Google_Service_Reports_UsageReports
 */
class Google_Service_Reports_UsageReports extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $usageReportsType = 'Google_Service_Reports_UsageReport';
    protected $usageReportsDataType = 'array';
    protected $warningsType = 'Google_Service_Reports_UsageReportsWarnings';
    protected $warningsDataType = 'array';

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
     * @param $usageReports
     */
    public function setUsageReports($usageReports)
    {
        $this->usageReports = $usageReports;
    }

    /**
     * @return mixed
     */
    public function getUsageReports()
    {
        return $this->usageReports;
    }

    /**
     * @param $warnings
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }

    /**
     * @return mixed
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}

/**
 * Class Google_Service_Reports_UsageReportsWarnings
 */
class Google_Service_Reports_UsageReportsWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Reports_UsageReportsWarningsData';
    protected $dataDataType = 'array';

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}

/**
 * Class Google_Service_Reports_UsageReportsWarningsData
 */
class Google_Service_Reports_UsageReportsWarningsData extends Google_Model
{
    public $key;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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
