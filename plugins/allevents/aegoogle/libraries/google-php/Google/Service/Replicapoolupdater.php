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
 * Service definition for Replicapoolupdater (v1beta1).
 *
 * <p>
 * The Google Compute Engine Instance Group Updater API provides services for
 * updating groups of Compute Engine Instances.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/compute/docs/instance-groups/manager/#applying_rolling_updates_using_the_updater_service" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Replicapoolupdater extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage replica pools. */
    const REPLICAPOOL =
        "https://www.googleapis.com/auth/replicapool";
    /** View replica pools. */
    const REPLICAPOOL_READONLY =
        "https://www.googleapis.com/auth/replicapool.readonly";

    public $rollingUpdates;
    public $zoneOperations;


    /**
     * Constructs the internal representation of the Replicapoolupdater service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'replicapoolupdater/v1beta1/projects/';
        $this->version = 'v1beta1';
        $this->serviceName = 'replicapoolupdater';

        $this->rollingUpdates = new Google_Service_Replicapoolupdater_RollingUpdates_Resource(
            $this,
            $this->serviceName,
            'rollingUpdates',
            [
                'methods' => [
                    'cancel' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/cancel',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'instanceGroupManager' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listInstanceUpdates' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/instanceUpdates',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'pause' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/pause',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resume' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/resume',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'rollback' => [
                        'path' => '{project}/zones/{zone}/rollingUpdates/{rollingUpdate}/rollback',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rollingUpdate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->zoneOperations = new Google_Service_Replicapoolupdater_ZoneOperations_Resource(
            $this,
            $this->serviceName,
            'zoneOperations',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/zones/{zone}/operations/{operation}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'operation' => [
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
 * The "rollingUpdates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolupdaterService = new Google_Service_Replicapoolupdater(...);
 *   $rollingUpdates = $replicapoolupdaterService->rollingUpdates;
 *  </code>
 */
class Google_Service_Replicapoolupdater_RollingUpdates_Resource extends Google_Service_Resource
{

    /**
     * Cancels an update. The update must be PAUSED before it can be cancelled. This
     * has no effect if the update is already CANCELLED. (rollingUpdates.cancel)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function cancel($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('cancel', [$params], "Google_Service_Replicapoolupdater_Operation");
    }

    /**
     * Returns information about an update. (rollingUpdates.get)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Replicapoolupdater_RollingUpdate");
    }

    /**
     * Inserts and starts a new update. (rollingUpdates.insert)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                                                                                        resides.
     * @param Google_RollingUpdate|Google_Service_Replicapoolupdater_RollingUpdate $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $zone, Google_Service_Replicapoolupdater_RollingUpdate $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Replicapoolupdater_Operation");
    }

    /**
     * Lists recent updates for a given managed instance group, in reverse
     * chronological order and paginated format. (rollingUpdates.listRollingUpdates)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                          resides.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string instanceGroupManager The name of the instance group
     * manager. Use this parameter to return only updates to instances that are part
     * of a specific instance group.
     */
    public function listRollingUpdates($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Replicapoolupdater_RollingUpdateList");
    }

    /**
     * Lists the current status for each instance within a given update.
     * (rollingUpdates.listInstanceUpdates)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     */
    public function listInstanceUpdates($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('listInstanceUpdates', [$params], "Google_Service_Replicapoolupdater_InstanceUpdateList");
    }

    /**
     * Pauses the update in state from ROLLING_FORWARD or ROLLING_BACK. Has no
     * effect if invoked when the state of the update is PAUSED.
     * (rollingUpdates.pause)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function pause($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('pause', [$params], "Google_Service_Replicapoolupdater_Operation");
    }

    /**
     * Continues an update in PAUSED state. Has no effect if invoked when the state
     * of the update is ROLLED_OUT. (rollingUpdates.resume)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function resume($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('resume', [$params], "Google_Service_Replicapoolupdater_Operation");
    }

    /**
     * Rolls back the update in state from ROLLING_FORWARD or PAUSED. Has no effect
     * if invoked when the state of the update is ROLLED_BACK.
     * (rollingUpdates.rollback)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the update's target
     *                              resides.
     * @param string $rollingUpdate The name of the update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function rollback($project, $zone, $rollingUpdate, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'rollingUpdate' => $rollingUpdate];
        $params = array_merge($params, $optParams);

        return $this->call('rollback', [$params], "Google_Service_Replicapoolupdater_Operation");
    }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolupdaterService = new Google_Service_Replicapoolupdater(...);
 *   $zoneOperations = $replicapoolupdaterService->zoneOperations;
 *  </code>
 */
class Google_Service_Replicapoolupdater_ZoneOperations_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the specified zone-specific operation resource.
     * (zoneOperations.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $zone Name of the zone scoping this request.
     * @param string $operation Name of the operation resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $zone, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Replicapoolupdater_Operation");
    }
}


/**
 * Class Google_Service_Replicapoolupdater_InstanceUpdate
 */
class Google_Service_Replicapoolupdater_InstanceUpdate extends Google_Model
{
    public $instance;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_Replicapoolupdater_InstanceUpdateError';
    protected $errorDataType = '';

    /**
     * @param Google_Service_Replicapoolupdater_InstanceUpdateError $error
     */
    public function setError(Google_Service_Replicapoolupdater_InstanceUpdateError $error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @param $instance
     */
    public function setInstance($instance)
    {
        $this->instance = $instance;
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
}

/**
 * Class Google_Service_Replicapoolupdater_InstanceUpdateError
 */
class Google_Service_Replicapoolupdater_InstanceUpdateError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Replicapoolupdater_InstanceUpdateErrorErrors';
    protected $errorsDataType = 'array';


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
 * Class Google_Service_Replicapoolupdater_InstanceUpdateErrorErrors
 */
class Google_Service_Replicapoolupdater_InstanceUpdateErrorErrors extends Google_Model
{
    public $code;
    public $location;
    public $message;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Replicapoolupdater_InstanceUpdateList
 */
class Google_Service_Replicapoolupdater_InstanceUpdateList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Replicapoolupdater_InstanceUpdate';
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

    /**
     * @return mixed
     */
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }
}

/**
 * Class Google_Service_Replicapoolupdater_Operation
 */
class Google_Service_Replicapoolupdater_Operation extends Google_Collection
{
    public $clientOperationId;
    public $creationTimestamp;
    public $endTime;
    public $httpErrorMessage;
    public $httpErrorStatusCode;
    public $id;
    public $insertTime;
    public $kind;
    public $name;
    public $operationType;
    public $progress;
    public $region;
    public $selfLink;
    public $startTime;
    public $status;
    public $statusMessage;
    public $targetId;
    public $targetLink;
    public $user;
    public $zone;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_Replicapoolupdater_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Replicapoolupdater_OperationWarnings';
    protected $warningsDataType = 'array';

    /**
     * @return mixed
     */
    public function getClientOperationId()
    {
        return $this->clientOperationId;
    }

    /**
     * @param $clientOperationId
     */
    public function setClientOperationId($clientOperationId)
    {
        $this->clientOperationId = $clientOperationId;
    }

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
     * @param Google_Service_Replicapoolupdater_OperationError $error
     */
    public function setError(Google_Service_Replicapoolupdater_OperationError $error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getHttpErrorMessage()
    {
        return $this->httpErrorMessage;
    }

    /**
     * @param $httpErrorMessage
     */
    public function setHttpErrorMessage($httpErrorMessage)
    {
        $this->httpErrorMessage = $httpErrorMessage;
    }

    /**
     * @return mixed
     */
    public function getHttpErrorStatusCode()
    {
        return $this->httpErrorStatusCode;
    }

    /**
     * @param $httpErrorStatusCode
     */
    public function setHttpErrorStatusCode($httpErrorStatusCode)
    {
        $this->httpErrorStatusCode = $httpErrorStatusCode;
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
    public function getInsertTime()
    {
        return $this->insertTime;
    }

    /**
     * @param $insertTime
     */
    public function setInsertTime($insertTime)
    {
        $this->insertTime = $insertTime;
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
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param $operationType
     */
    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
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
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
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
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * @return mixed
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @param $targetId
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
    }

    /**
     * @return mixed
     */
    public function getTargetLink()
    {
        return $this->targetLink;
    }

    /**
     * @param $targetLink
     */
    public function setTargetLink($targetLink)
    {
        $this->targetLink = $targetLink;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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

    /**
     * @return mixed
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }
}

/**
 * Class Google_Service_Replicapoolupdater_OperationError
 */
class Google_Service_Replicapoolupdater_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Replicapoolupdater_OperationErrorErrors';
    protected $errorsDataType = 'array';


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
 * Class Google_Service_Replicapoolupdater_OperationErrorErrors
 */
class Google_Service_Replicapoolupdater_OperationErrorErrors extends Google_Model
{
    public $code;
    public $location;
    public $message;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Replicapoolupdater_OperationWarnings
 */
class Google_Service_Replicapoolupdater_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Replicapoolupdater_OperationWarningsData';
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
 * Class Google_Service_Replicapoolupdater_OperationWarningsData
 */
class Google_Service_Replicapoolupdater_OperationWarningsData extends Google_Model
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

/**
 * Class Google_Service_Replicapoolupdater_RollingUpdate
 */
class Google_Service_Replicapoolupdater_RollingUpdate extends Google_Model
{
    public $actionType;
    public $creationTimestamp;
    public $description;
    public $id;
    public $instanceGroup;
    public $instanceGroupManager;
    public $instanceTemplate;
    public $kind;
    public $progress;
    public $selfLink;
    public $status;
    public $statusMessage;
    public $user;
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_Replicapoolupdater_RollingUpdateError';
    protected $errorDataType = '';
    protected $policyType = 'Google_Service_Replicapoolupdater_RollingUpdatePolicy';
    protected $policyDataType = '';

    /**
     * @return mixed
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * @param $actionType
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;
    }

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
     * @param Google_Service_Replicapoolupdater_RollingUpdateError $error
     */
    public function setError(Google_Service_Replicapoolupdater_RollingUpdateError $error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
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
    public function getInstanceGroup()
    {
        return $this->instanceGroup;
    }

    /**
     * @param $instanceGroup
     */
    public function setInstanceGroup($instanceGroup)
    {
        $this->instanceGroup = $instanceGroup;
    }

    /**
     * @return mixed
     */
    public function getInstanceGroupManager()
    {
        return $this->instanceGroupManager;
    }

    /**
     * @param $instanceGroupManager
     */
    public function setInstanceGroupManager($instanceGroupManager)
    {
        $this->instanceGroupManager = $instanceGroupManager;
    }

    /**
     * @return mixed
     */
    public function getInstanceTemplate()
    {
        return $this->instanceTemplate;
    }

    /**
     * @param $instanceTemplate
     */
    public function setInstanceTemplate($instanceTemplate)
    {
        $this->instanceTemplate = $instanceTemplate;
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
     * @param Google_Service_Replicapoolupdater_RollingUpdatePolicy $policy
     */
    public function setPolicy(Google_Service_Replicapoolupdater_RollingUpdatePolicy $policy)
    {
        $this->policy = $policy;
    }

    /**
     * @return mixed
     */
    public function getPolicy()
    {
        return $this->policy;
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
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
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
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}

/**
 * Class Google_Service_Replicapoolupdater_RollingUpdateError
 */
class Google_Service_Replicapoolupdater_RollingUpdateError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Replicapoolupdater_RollingUpdateErrorErrors';
    protected $errorsDataType = 'array';


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
 * Class Google_Service_Replicapoolupdater_RollingUpdateErrorErrors
 */
class Google_Service_Replicapoolupdater_RollingUpdateErrorErrors extends Google_Model
{
    public $code;
    public $location;
    public $message;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Replicapoolupdater_RollingUpdateList
 */
class Google_Service_Replicapoolupdater_RollingUpdateList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Replicapoolupdater_RollingUpdate';
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

    /**
     * @return mixed
     */
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }
}

/**
 * Class Google_Service_Replicapoolupdater_RollingUpdatePolicy
 */
class Google_Service_Replicapoolupdater_RollingUpdatePolicy extends Google_Model
{
    public $autoPauseAfterInstances;
    public $instanceStartupTimeoutSec;
    public $maxNumConcurrentInstances;
    public $maxNumFailedInstances;
    public $minInstanceUpdateTimeSec;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutoPauseAfterInstances()
    {
        return $this->autoPauseAfterInstances;
    }

    /**
     * @param $autoPauseAfterInstances
     */
    public function setAutoPauseAfterInstances($autoPauseAfterInstances)
    {
        $this->autoPauseAfterInstances = $autoPauseAfterInstances;
    }

    /**
     * @return mixed
     */
    public function getInstanceStartupTimeoutSec()
    {
        return $this->instanceStartupTimeoutSec;
    }

    /**
     * @param $instanceStartupTimeoutSec
     */
    public function setInstanceStartupTimeoutSec($instanceStartupTimeoutSec)
    {
        $this->instanceStartupTimeoutSec = $instanceStartupTimeoutSec;
    }

    /**
     * @return mixed
     */
    public function getMaxNumConcurrentInstances()
    {
        return $this->maxNumConcurrentInstances;
    }

    /**
     * @param $maxNumConcurrentInstances
     */
    public function setMaxNumConcurrentInstances($maxNumConcurrentInstances)
    {
        $this->maxNumConcurrentInstances = $maxNumConcurrentInstances;
    }

    /**
     * @return mixed
     */
    public function getMaxNumFailedInstances()
    {
        return $this->maxNumFailedInstances;
    }

    /**
     * @param $maxNumFailedInstances
     */
    public function setMaxNumFailedInstances($maxNumFailedInstances)
    {
        $this->maxNumFailedInstances = $maxNumFailedInstances;
    }

    /**
     * @return mixed
     */
    public function getMinInstanceUpdateTimeSec()
    {
        return $this->minInstanceUpdateTimeSec;
    }

    /**
     * @param $minInstanceUpdateTimeSec
     */
    public function setMinInstanceUpdateTimeSec($minInstanceUpdateTimeSec)
    {
        $this->minInstanceUpdateTimeSec = $minInstanceUpdateTimeSec;
    }
}
