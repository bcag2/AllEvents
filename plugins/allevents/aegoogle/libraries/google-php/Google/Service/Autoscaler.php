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
 * Service definition for Autoscaler (v1beta2).
 *
 * <p>
 * The Google Compute Engine Autoscaler API provides autoscaling for groups of
 * Cloud VMs.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/compute/docs/autoscaler" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Autoscaler extends Google_Service
{
    /** View and manage your Google Compute Engine resources. */
    const COMPUTE =
        "https://www.googleapis.com/auth/compute";
    /** View your Google Compute Engine resources. */
    const COMPUTE_READONLY =
        "https://www.googleapis.com/auth/compute.readonly";

    public $autoscalers;
    public $zoneOperations;
    public $zones;


    /**
     * Constructs the internal representation of the Autoscaler service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'autoscaler/v1beta2/';
        $this->version = 'v1beta2';
        $this->serviceName = 'autoscaler';

        $this->autoscalers = new Google_Service_Autoscaler_Autoscalers_Resource(
            $this,
            $this->serviceName,
            'autoscalers',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
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
                            'autoscaler' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
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
                            'autoscaler' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{project}/zones/{zone}/autoscalers',
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
                        'path' => 'projects/{project}/zones/{zone}/autoscalers',
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
                    ], 'patch' => [
                        'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
                        'httpMethod' => 'PATCH',
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
                            'autoscaler' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
                        'httpMethod' => 'PUT',
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
                            'autoscaler' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->zoneOperations = new Google_Service_Autoscaler_ZoneOperations_Resource(
            $this,
            $this->serviceName,
            'zoneOperations',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/zones/{zone}/operations/{operation}',
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
                            'operation' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
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
        $this->zones = new Google_Service_Autoscaler_Zones_Resource(
            $this,
            $this->serviceName,
            'zones',
            [
                'methods' => [
                    'list' => [
                        'path' => '{project}/zones',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
    }
}


/**
 * The "autoscalers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new Google_Service_Autoscaler(...);
 *   $autoscalers = $autoscalerService->autoscalers;
 *  </code>
 */
class Google_Service_Autoscaler_Autoscalers_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified Autoscaler resource. (autoscalers.delete)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param string $autoscaler Name of the Autoscaler resource.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $autoscaler, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Autoscaler_Operation");
    }

    /**
     * Gets the specified Autoscaler resource. (autoscalers.get)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param string $autoscaler Name of the Autoscaler resource.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $autoscaler, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Autoscaler_Autoscaler");
    }

    /**
     * Adds new Autoscaler resource. (autoscalers.insert)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param Google_Autoscaler|Google_Service_Autoscaler_Autoscaler $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $zone, Google_Service_Autoscaler_Autoscaler $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Autoscaler_Operation");
    }

    /**
     * Lists all Autoscaler resources in this zone. (autoscalers.listAutoscalers)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string filter
     * @opt_param string pageToken
     * @opt_param string maxResults
     */
    public function listAutoscalers($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Autoscaler_AutoscalerListResponse");
    }

    /**
     * Update the entire content of the Autoscaler resource. This method supports
     * patch semantics. (autoscalers.patch)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param string $autoscaler Name of the Autoscaler resource.
     * @param Google_Autoscaler|Google_Service_Autoscaler_Autoscaler $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $zone, $autoscaler, Google_Service_Autoscaler_Autoscaler $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Autoscaler_Operation");
    }

    /**
     * Update the entire content of the Autoscaler resource. (autoscalers.update)
     *
     * @param string $project Project ID of Autoscaler resource.
     * @param string $zone Zone name of Autoscaler resource.
     * @param string $autoscaler Name of the Autoscaler resource.
     * @param Google_Autoscaler|Google_Service_Autoscaler_Autoscaler $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $zone, $autoscaler, Google_Service_Autoscaler_Autoscaler $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Autoscaler_Operation");
    }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new Google_Service_Autoscaler(...);
 *   $zoneOperations = $autoscalerService->zoneOperations;
 *  </code>
 */
class Google_Service_Autoscaler_ZoneOperations_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified zone-specific operation resource.
     * (zoneOperations.delete)
     *
     * @param string $project
     * @param string $zone
     * @param string $operation
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the specified zone-specific operation resource.
     * (zoneOperations.get)
     *
     * @param string $project
     * @param string $zone
     * @param string $operation
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Autoscaler_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * zone. (zoneOperations.listZoneOperations)
     *
     * @param string $project
     * @param string $zone
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string filter
     * @opt_param string pageToken
     * @opt_param string maxResults
     */
    public function listZoneOperations($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Autoscaler_OperationList");
    }
}

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new Google_Service_Autoscaler(...);
 *   $zones = $autoscalerService->zones;
 *  </code>
 */
class Google_Service_Autoscaler_Zones_Resource extends Google_Service_Resource
{

    /**
     * (zones.listZones)
     *
     * @param string $project
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string filter
     * @opt_param string pageToken
     * @opt_param string maxResults
     */
    public function listZones($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Autoscaler_ZoneList");
    }
}


/**
 * Class Google_Service_Autoscaler_Autoscaler
 */
class Google_Service_Autoscaler_Autoscaler extends Google_Model
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $target;
    protected $internal_gapi_mappings = [];
    protected $autoscalingPolicyType = 'Google_Service_Autoscaler_AutoscalingPolicy';
    protected $autoscalingPolicyDataType = '';

    /**
     * @param Google_Service_Autoscaler_AutoscalingPolicy $autoscalingPolicy
     */
    public function setAutoscalingPolicy(Google_Service_Autoscaler_AutoscalingPolicy $autoscalingPolicy)
    {
        $this->autoscalingPolicy = $autoscalingPolicy;
    }

    /**
     * @return mixed
     */
    public function getAutoscalingPolicy()
    {
        return $this->autoscalingPolicy;
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
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }
}

/**
 * Class Google_Service_Autoscaler_AutoscalerListResponse
 */
class Google_Service_Autoscaler_AutoscalerListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Autoscaler_Autoscaler';
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
 * Class Google_Service_Autoscaler_AutoscalingPolicy
 */
class Google_Service_Autoscaler_AutoscalingPolicy extends Google_Collection
{
    public $coolDownPeriodSec;
    public $maxNumReplicas;
    public $minNumReplicas;
    protected $collection_key = 'customMetricUtilizations';
    protected $internal_gapi_mappings = [];
    protected $cpuUtilizationType = 'Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization';
    protected $cpuUtilizationDataType = '';
    protected $customMetricUtilizationsType = 'Google_Service_Autoscaler_AutoscalingPolicyCustomMetricUtilization';
    protected $customMetricUtilizationsDataType = 'array';
    protected $loadBalancingUtilizationType = 'Google_Service_Autoscaler_AutoscalingPolicyLoadBalancingUtilization';
    protected $loadBalancingUtilizationDataType = '';

    /**
     * @return mixed
     */
    public function getCoolDownPeriodSec()
    {
        return $this->coolDownPeriodSec;
    }

    /**
     * @param $coolDownPeriodSec
     */
    public function setCoolDownPeriodSec($coolDownPeriodSec)
    {
        $this->coolDownPeriodSec = $coolDownPeriodSec;
    }

    /**
     * @param Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization $cpuUtilization
     */
    public function setCpuUtilization(Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization $cpuUtilization)
    {
        $this->cpuUtilization = $cpuUtilization;
    }

    /**
     * @return mixed
     */
    public function getCpuUtilization()
    {
        return $this->cpuUtilization;
    }

    /**
     * @param $customMetricUtilizations
     */
    public function setCustomMetricUtilizations($customMetricUtilizations)
    {
        $this->customMetricUtilizations = $customMetricUtilizations;
    }

    /**
     * @return mixed
     */
    public function getCustomMetricUtilizations()
    {
        return $this->customMetricUtilizations;
    }

    /**
     * @param Google_Service_Autoscaler_AutoscalingPolicyLoadBalancingUtilization $loadBalancingUtilization
     */
    public function setLoadBalancingUtilization(Google_Service_Autoscaler_AutoscalingPolicyLoadBalancingUtilization $loadBalancingUtilization)
    {
        $this->loadBalancingUtilization = $loadBalancingUtilization;
    }

    /**
     * @return mixed
     */
    public function getLoadBalancingUtilization()
    {
        return $this->loadBalancingUtilization;
    }

    /**
     * @return mixed
     */
    public function getMaxNumReplicas()
    {
        return $this->maxNumReplicas;
    }

    /**
     * @param $maxNumReplicas
     */
    public function setMaxNumReplicas($maxNumReplicas)
    {
        $this->maxNumReplicas = $maxNumReplicas;
    }

    /**
     * @return mixed
     */
    public function getMinNumReplicas()
    {
        return $this->minNumReplicas;
    }

    /**
     * @param $minNumReplicas
     */
    public function setMinNumReplicas($minNumReplicas)
    {
        $this->minNumReplicas = $minNumReplicas;
    }
}

/**
 * Class Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization
 */
class Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization extends Google_Model
{
    public $utilizationTarget;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUtilizationTarget()
    {
        return $this->utilizationTarget;
    }

    /**
     * @param $utilizationTarget
     */
    public function setUtilizationTarget($utilizationTarget)
    {
        $this->utilizationTarget = $utilizationTarget;
    }
}

/**
 * Class Google_Service_Autoscaler_AutoscalingPolicyCustomMetricUtilization
 */
class Google_Service_Autoscaler_AutoscalingPolicyCustomMetricUtilization extends Google_Model
{
    public $metric;
    public $utilizationTarget;
    public $utilizationTargetType;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * @param $metric
     */
    public function setMetric($metric)
    {
        $this->metric = $metric;
    }

    /**
     * @return mixed
     */
    public function getUtilizationTarget()
    {
        return $this->utilizationTarget;
    }

    /**
     * @param $utilizationTarget
     */
    public function setUtilizationTarget($utilizationTarget)
    {
        $this->utilizationTarget = $utilizationTarget;
    }

    /**
     * @return mixed
     */
    public function getUtilizationTargetType()
    {
        return $this->utilizationTargetType;
    }

    /**
     * @param $utilizationTargetType
     */
    public function setUtilizationTargetType($utilizationTargetType)
    {
        $this->utilizationTargetType = $utilizationTargetType;
    }
}

/**
 * Class Google_Service_Autoscaler_AutoscalingPolicyLoadBalancingUtilization
 */
class Google_Service_Autoscaler_AutoscalingPolicyLoadBalancingUtilization extends Google_Model
{
    public $utilizationTarget;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUtilizationTarget()
    {
        return $this->utilizationTarget;
    }

    /**
     * @param $utilizationTarget
     */
    public function setUtilizationTarget($utilizationTarget)
    {
        $this->utilizationTarget = $utilizationTarget;
    }
}

/**
 * Class Google_Service_Autoscaler_DeprecationStatus
 */
class Google_Service_Autoscaler_DeprecationStatus extends Google_Model
{
    public $deleted;
    public $deprecated;
    public $obsolete;
    public $replacement;
    public $state;
    protected $internal_gapi_mappings = [];

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
    public function getDeprecated()
    {
        return $this->deprecated;
    }

    /**
     * @param $deprecated
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @return mixed
     */
    public function getObsolete()
    {
        return $this->obsolete;
    }

    /**
     * @param $obsolete
     */
    public function setObsolete($obsolete)
    {
        $this->obsolete = $obsolete;
    }

    /**
     * @return mixed
     */
    public function getReplacement()
    {
        return $this->replacement;
    }

    /**
     * @param $replacement
     */
    public function setReplacement($replacement)
    {
        $this->replacement = $replacement;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}

/**
 * Class Google_Service_Autoscaler_Operation
 */
class Google_Service_Autoscaler_Operation extends Google_Collection
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
    protected $errorType = 'Google_Service_Autoscaler_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Autoscaler_OperationWarnings';
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
     * @param Google_Service_Autoscaler_OperationError $error
     */
    public function setError(Google_Service_Autoscaler_OperationError $error)
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
 * Class Google_Service_Autoscaler_OperationError
 */
class Google_Service_Autoscaler_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Autoscaler_OperationErrorErrors';
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
 * Class Google_Service_Autoscaler_OperationErrorErrors
 */
class Google_Service_Autoscaler_OperationErrorErrors extends Google_Model
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
 * Class Google_Service_Autoscaler_OperationList
 */
class Google_Service_Autoscaler_OperationList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Autoscaler_Operation';
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
 * Class Google_Service_Autoscaler_OperationWarnings
 */
class Google_Service_Autoscaler_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Autoscaler_OperationWarningsData';
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
 * Class Google_Service_Autoscaler_OperationWarningsData
 */
class Google_Service_Autoscaler_OperationWarningsData extends Google_Model
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
 * Class Google_Service_Autoscaler_Zone
 */
class Google_Service_Autoscaler_Zone extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $region;
    public $selfLink;
    public $status;
    protected $collection_key = 'maintenanceWindows';
    protected $internal_gapi_mappings = [];
    protected $deprecatedType = 'Google_Service_Autoscaler_DeprecationStatus';
    protected $deprecatedDataType = '';
    protected $maintenanceWindowsType = 'Google_Service_Autoscaler_ZoneMaintenanceWindows';
    protected $maintenanceWindowsDataType = 'array';

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
     * @param Google_Service_Autoscaler_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Autoscaler_DeprecationStatus $deprecated)
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @return mixed
     */
    public function getDeprecated()
    {
        return $this->deprecated;
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
     * @param $maintenanceWindows
     */
    public function setMaintenanceWindows($maintenanceWindows)
    {
        $this->maintenanceWindows = $maintenanceWindows;
    }

    /**
     * @return mixed
     */
    public function getMaintenanceWindows()
    {
        return $this->maintenanceWindows;
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
 * Class Google_Service_Autoscaler_ZoneList
 */
class Google_Service_Autoscaler_ZoneList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Autoscaler_Zone';
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
 * Class Google_Service_Autoscaler_ZoneMaintenanceWindows
 */
class Google_Service_Autoscaler_ZoneMaintenanceWindows extends Google_Model
{
    public $beginTime;
    public $description;
    public $endTime;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * @param $beginTime
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
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
