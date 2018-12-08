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
 * Service definition for Audit (v1).
 *
 * <p>
 * Lets you access user activities in your enterprise made through various
 * applications.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/admin-audit/get_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Audit extends Google_Service
{


    public $activities;


    /**
     * Constructs the internal representation of the Audit service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'apps/reporting/audit/v1/';
        $this->version = 'v1';
        $this->serviceName = 'audit';

        $this->activities = new Google_Service_Audit_Activities_Resource(
            $this,
            $this->serviceName,
            'activities',
            [
                'methods' => [
                    'list' => [
                        'path' => '{customerId}/{applicationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'actorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'actorApplicationId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'actorIpAddress' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'caller' => [
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
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'continuationToken' => [
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
 *   $auditService = new Google_Service_Audit(...);
 *   $activities = $auditService->activities;
 *  </code>
 */
class Google_Service_Audit_Activities_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of activities for a specific customer and application.
     * (activities.listActivities)
     *
     * @param string $customerId Represents the customer who is the owner of target
     *                              object on which action was performed.
     * @param string $applicationId Application ID of the application on which the
     *                              event was performed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string actorEmail Email address of the user who performed the
     * action.
     * @opt_param string actorApplicationId Application ID of the application which
     * interacted on behalf of the user while performing the event.
     * @opt_param string actorIpAddress IP Address of host where the event was
     * performed. Supports both IPv4 and IPv6 addresses.
     * @opt_param string caller Type of the caller.
     * @opt_param int maxResults Number of activity records to be shown in each
     * page.
     * @opt_param string eventName Name of the event being queried.
     * @opt_param string startTime Return events which occured at or after this
     * time.
     * @opt_param string endTime Return events which occured at or before this time.
     * @opt_param string continuationToken Next page URL.
     */
    public function listActivities($customerId, $applicationId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'applicationId' => $applicationId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Audit_Activities");
    }
}


/**
 * Class Google_Service_Audit_Activities
 */
class Google_Service_Audit_Activities extends Google_Collection
{
    public $kind;
    public $next;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Audit_Activity';
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
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }
}

/**
 * Class Google_Service_Audit_Activity
 */
class Google_Service_Audit_Activity extends Google_Collection
{
    public $ipAddress;
    public $kind;
    public $ownerDomain;
    protected $collection_key = 'events';
    protected $internal_gapi_mappings = [];
    protected $actorType = 'Google_Service_Audit_ActivityActor';
    protected $actorDataType = '';
    protected $eventsType = 'Google_Service_Audit_ActivityEvents';
    protected $eventsDataType = 'array';
    protected $idType = 'Google_Service_Audit_ActivityId';
    protected $idDataType = '';

    /**
     * @param Google_Service_Audit_ActivityActor $actor
     */
    public function setActor(Google_Service_Audit_ActivityActor $actor)
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
     * @param Google_Service_Audit_ActivityId $id
     */
    public function setId(Google_Service_Audit_ActivityId $id)
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
 * Class Google_Service_Audit_ActivityActor
 */
class Google_Service_Audit_ActivityActor extends Google_Model
{
    public $applicationId;
    public $callerType;
    public $email;
    public $key;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

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
}

/**
 * Class Google_Service_Audit_ActivityEvents
 */
class Google_Service_Audit_ActivityEvents extends Google_Collection
{
    public $eventType;
    public $name;
    protected $collection_key = 'parameters';
    protected $internal_gapi_mappings = [];
    protected $parametersType = 'Google_Service_Audit_ActivityEventsParameters';
    protected $parametersDataType = 'array';

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
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
 * Class Google_Service_Audit_ActivityEventsParameters
 */
class Google_Service_Audit_ActivityEventsParameters extends Google_Model
{
    public $name;
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Audit_ActivityId
 */
class Google_Service_Audit_ActivityId extends Google_Model
{
    public $applicationId;
    public $customerId;
    public $time;
    public $uniqQualifier;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
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
    public function getUniqQualifier()
    {
        return $this->uniqQualifier;
    }

    /**
     * @param $uniqQualifier
     */
    public function setUniqQualifier($uniqQualifier)
    {
        $this->uniqQualifier = $uniqQualifier;
    }
}
