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
 * Service definition for Resourceviews (v1beta2).
 *
 * <p>
 * The Resource View API allows users to create and manage logical sets of
 * Google Compute Engine instances.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Resourceviews extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage your Google Compute Engine resources. */
    const COMPUTE =
        "https://www.googleapis.com/auth/compute";
    /** View your Google Compute Engine resources. */
    const COMPUTE_READONLY =
        "https://www.googleapis.com/auth/compute.readonly";
    /** View and manage your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN =
        "https://www.googleapis.com/auth/ndev.cloudman";
    /** View your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN_READONLY =
        "https://www.googleapis.com/auth/ndev.cloudman.readonly";

    public $zoneOperations;
    public $zoneViews;


    /**
     * Constructs the internal representation of the Resourceviews service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'resourceviews/v1beta2/projects/';
        $this->version = 'v1beta2';
        $this->serviceName = 'resourceviews';

        $this->zoneOperations = new Google_Service_Resourceviews_ZoneOperations_Resource(
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
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/operations',
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
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
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
        $this->zoneViews = new Google_Service_Resourceviews_ZoneViews_Resource(
            $this,
            $this->serviceName,
            'zoneViews',
            [
                'methods' => [
                    'addResources' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}/addResources',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}',
                        'httpMethod' => 'DELETE',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getService' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}/getService',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'resourceName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/resourceViews',
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
                        'path' => '{project}/zones/{zone}/resourceViews',
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
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'listResources' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}/resources',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'listState' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'format' => [
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
                            'serviceName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'removeResources' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}/removeResources',
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
                            'resourceView' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setService' => [
                        'path' => '{project}/zones/{zone}/resourceViews/{resourceView}/setService',
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
                            'resourceView' => [
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
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourceviewsService = new Google_Service_Resourceviews(...);
 *   $zoneOperations = $resourceviewsService->zoneOperations;
 *  </code>
 */
class Google_Service_Resourceviews_ZoneOperations_Resource extends Google_Service_Resource
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
     */
    public function get($project, $zone, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Resourceviews_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * zone. (zoneOperations.listZoneOperations)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $zone Name of the zone scoping this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     */
    public function listZoneOperations($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Resourceviews_OperationList");
    }
}

/**
 * The "zoneViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourceviewsService = new Google_Service_Resourceviews(...);
 *   $zoneViews = $resourceviewsService->zoneViews;
 *  </code>
 */
class Google_Service_Resourceviews_ZoneViews_Resource extends Google_Service_Resource
{

    /**
     * Add resources to the view. (zoneViews.addResources)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param Google_Service_Resourceviews_ZoneViewsAddResourcesRequest|Google_ZoneViewsAddResourcesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function addResources($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsAddResourcesRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addResources', [$params], "Google_Service_Resourceviews_Operation");
    }

    /**
     * Delete a resource view. (zoneViews.delete)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $resourceView, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Resourceviews_Operation");
    }

    /**
     * Get the information of a zonal resource view. (zoneViews.get)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $resourceView, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Resourceviews_ResourceView");
    }

    /**
     * Get the service information of a resource view or a resource.
     * (zoneViews.getService)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string resourceName The name of the resource if user wants to get
     * the service information of the resource.
     */
    public function getService($project, $zone, $resourceView, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView];
        $params = array_merge($params, $optParams);

        return $this->call('getService', [$params], "Google_Service_Resourceviews_ZoneViewsGetServiceResponse");
    }

    /**
     * Create a resource view. (zoneViews.insert)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param Google_ResourceView|Google_Service_Resourceviews_ResourceView $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $zone, Google_Service_Resourceviews_ResourceView $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Resourceviews_Operation");
    }

    /**
     * List resource views. (zoneViews.listZoneViews)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Specifies a nextPageToken returned by a previous
     * list request. This token can be used to request the next page of results from
     * a previous list request.
     * @opt_param int maxResults Maximum count of results to be returned. Acceptable
     * values are 0 to 5000, inclusive. (Default: 5000)
     */
    public function listZoneViews($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Resourceviews_ZoneViewsList");
    }

    /**
     * List the resources of the resource view. (zoneViews.listResources)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string listState The state of the instance to list. By default, it
     * lists all instances.
     * @opt_param string format The requested format of the return value. It can be
     * URL or URL_PORT. A JSON object will be included in the response based on the
     * format. The default format is NONE, which results in no JSON in the response.
     * @opt_param int maxResults Maximum count of results to be returned. Acceptable
     * values are 0 to 5000, inclusive. (Default: 5000)
     * @opt_param string pageToken Specifies a nextPageToken returned by a previous
     * list request. This token can be used to request the next page of results from
     * a previous list request.
     * @opt_param string serviceName The service name to return in the response. It
     * is optional and if it is not set, all the service end points will be
     * returned.
     */
    public function listResources($project, $zone, $resourceView, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView];
        $params = array_merge($params, $optParams);

        return $this->call('listResources', [$params], "Google_Service_Resourceviews_ZoneViewsListResourcesResponse");
    }

    /**
     * Remove resources from the view. (zoneViews.removeResources)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest|Google_ZoneViewsRemoveResourcesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function removeResources($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('removeResources', [$params], "Google_Service_Resourceviews_Operation");
    }

    /**
     * Update the service information of a resource view or a resource.
     * (zoneViews.setService)
     *
     * @param string $project The project name of the resource view.
     * @param string $zone The zone name of the resource view.
     * @param string $resourceView The name of the resource view.
     * @param Google_Service_Resourceviews_ZoneViewsSetServiceRequest|Google_ZoneViewsSetServiceRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setService($project, $zone, $resourceView, Google_Service_Resourceviews_ZoneViewsSetServiceRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'resourceView' => $resourceView, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setService', [$params], "Google_Service_Resourceviews_Operation");
    }
}


/**
 * Class Google_Service_Resourceviews_Label
 */
class Google_Service_Resourceviews_Label extends Google_Model
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
 * Class Google_Service_Resourceviews_ListResourceResponseItem
 */
class Google_Service_Resourceviews_ListResourceResponseItem extends Google_Model
{
    public $endpoints;
    public $resource;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * @param $endpoints
     */
    public function setEndpoints($endpoints)
    {
        $this->endpoints = $endpoints;
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
}

/**
 * Class Google_Service_Resourceviews_ListResourceResponseItemEndpoints
 */
class Google_Service_Resourceviews_ListResourceResponseItemEndpoints extends Google_Model
{
}

/**
 * Class Google_Service_Resourceviews_Operation
 */
class Google_Service_Resourceviews_Operation extends Google_Collection
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
    protected $errorType = 'Google_Service_Resourceviews_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Resourceviews_OperationWarnings';
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
     * @param Google_Service_Resourceviews_OperationError $error
     */
    public function setError(Google_Service_Resourceviews_OperationError $error)
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
 * Class Google_Service_Resourceviews_OperationError
 */
class Google_Service_Resourceviews_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Resourceviews_OperationErrorErrors';
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
 * Class Google_Service_Resourceviews_OperationErrorErrors
 */
class Google_Service_Resourceviews_OperationErrorErrors extends Google_Model
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
 * Class Google_Service_Resourceviews_OperationList
 */
class Google_Service_Resourceviews_OperationList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Resourceviews_Operation';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_Resourceviews_OperationWarnings
 */
class Google_Service_Resourceviews_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Resourceviews_OperationWarningsData';
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
 * Class Google_Service_Resourceviews_OperationWarningsData
 */
class Google_Service_Resourceviews_OperationWarningsData extends Google_Model
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
 * Class Google_Service_Resourceviews_ResourceView
 */
class Google_Service_Resourceviews_ResourceView extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $fingerprint;
    public $id;
    public $kind;
    public $name;
    public $network;
    public $resources;
    public $selfLink;
    public $size;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $endpointsType = 'Google_Service_Resourceviews_ServiceEndpoint';
    protected $endpointsDataType = 'array';
    protected $labelsType = 'Google_Service_Resourceviews_Label';
    protected $labelsDataType = 'array';

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
     * @param $endpoints
     */
    public function setEndpoints($endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * @return mixed
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
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
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
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
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }
}

/**
 * Class Google_Service_Resourceviews_ServiceEndpoint
 */
class Google_Service_Resourceviews_ServiceEndpoint extends Google_Model
{
    public $name;
    public $port;
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
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }
}

/**
 * Class Google_Service_Resourceviews_ZoneViewsAddResourcesRequest
 */
class Google_Service_Resourceviews_ZoneViewsAddResourcesRequest extends Google_Collection
{
    public $resources;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }
}

/**
 * Class Google_Service_Resourceviews_ZoneViewsGetServiceResponse
 */
class Google_Service_Resourceviews_ZoneViewsGetServiceResponse extends Google_Collection
{
    public $fingerprint;
    protected $collection_key = 'endpoints';
    protected $internal_gapi_mappings = [];
    protected $endpointsType = 'Google_Service_Resourceviews_ServiceEndpoint';
    protected $endpointsDataType = 'array';

    /**
     * @param $endpoints
     */
    public function setEndpoints($endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * @return mixed
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }
}

/**
 * Class Google_Service_Resourceviews_ZoneViewsList
 */
class Google_Service_Resourceviews_ZoneViewsList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Resourceviews_ResourceView';
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
 * Class Google_Service_Resourceviews_ZoneViewsListResourcesResponse
 */
class Google_Service_Resourceviews_ZoneViewsListResourcesResponse extends Google_Collection
{
    public $network;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Resourceviews_ListResourceResponseItem';
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
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
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
 * Class Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest
 */
class Google_Service_Resourceviews_ZoneViewsRemoveResourcesRequest extends Google_Collection
{
    public $resources;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }
}

/**
 * Class Google_Service_Resourceviews_ZoneViewsSetServiceRequest
 */
class Google_Service_Resourceviews_ZoneViewsSetServiceRequest extends Google_Collection
{
    public $fingerprint;
    public $resourceName;
    protected $collection_key = 'endpoints';
    protected $internal_gapi_mappings = [];
    protected $endpointsType = 'Google_Service_Resourceviews_ServiceEndpoint';
    protected $endpointsDataType = 'array';

    /**
     * @param $endpoints
     */
    public function setEndpoints($endpoints)
    {
        $this->endpoints = $endpoints;
    }

    /**
     * @return mixed
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return mixed
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @param $resourceName
     */
    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }
}
