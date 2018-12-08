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
 * Service definition for Manager (v1beta2).
 *
 * <p>
 * The Deployment Manager API allows users to declaratively configure, deploy
 * and run complex solutions on the Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/deployment-manager/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Manager extends Google_Service
{
    /** View and manage your applications deployed on Google App Engine. */
    const APPENGINE_ADMIN =
        "https://www.googleapis.com/auth/appengine.admin";
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage your Google Compute Engine resources. */
    const COMPUTE =
        "https://www.googleapis.com/auth/compute";
    /** Manage your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_WRITE =
        "https://www.googleapis.com/auth/devstorage.read_write";
    /** View and manage your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN =
        "https://www.googleapis.com/auth/ndev.cloudman";
    /** View your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN_READONLY =
        "https://www.googleapis.com/auth/ndev.cloudman.readonly";

    public $deployments;
    public $templates;


    /**
     * Constructs the internal representation of the Manager service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'manager/v1beta2/projects/';
        $this->version = 'v1beta2';
        $this->serviceName = 'manager';

        $this->deployments = new Google_Service_Manager_Deployments_Resource(
            $this,
            $this->serviceName,
            'deployments',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{projectId}/regions/{region}/deployments/{deploymentName}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deploymentName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{projectId}/regions/{region}/deployments/{deploymentName}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deploymentName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{projectId}/regions/{region}/deployments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{projectId}/regions/{region}/deployments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
                    ],
                ]
            ]
        );
        $this->templates = new Google_Service_Manager_Templates_Resource(
            $this,
            $this->serviceName,
            'templates',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{projectId}/templates/{templateName}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{projectId}/templates/{templateName}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{projectId}/templates',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{projectId}/templates',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
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
                    ],
                ]
            ]
        );
    }
}


/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managerService = new Google_Service_Manager(...);
 *   $deployments = $managerService->deployments;
 *  </code>
 */
class Google_Service_Manager_Deployments_Resource extends Google_Service_Resource
{

    /**
     * (deployments.delete)
     *
     * @param string $projectId
     * @param string $region
     * @param string $deploymentName
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($projectId, $region, $deploymentName, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'region' => $region, 'deploymentName' => $deploymentName];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * (deployments.get)
     *
     * @param string $projectId
     * @param string $region
     * @param string $deploymentName
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $region, $deploymentName, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'region' => $region, 'deploymentName' => $deploymentName];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Manager_Deployment");
    }

    /**
     * (deployments.insert)
     *
     * @param string $projectId
     * @param string $region
     * @param Google_Deployment|Google_Service_Manager_Deployment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($projectId, $region, Google_Service_Manager_Deployment $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Manager_Deployment");
    }

    /**
     * (deployments.listDeployments)
     *
     * @param string $projectId
     * @param string $region
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Specifies a nextPageToken returned by a previous
     * list request. This token can be used to request the next page of results from
     * a previous list request.
     * @opt_param int maxResults Maximum count of results to be returned. Acceptable
     * values are 0 to 100, inclusive. (Default: 50)
     */
    public function listDeployments($projectId, $region, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Manager_DeploymentsListResponse");
    }
}

/**
 * The "templates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managerService = new Google_Service_Manager(...);
 *   $templates = $managerService->templates;
 *  </code>
 */
class Google_Service_Manager_Templates_Resource extends Google_Service_Resource
{

    /**
     * (templates.delete)
     *
     * @param string $projectId
     * @param string $templateName
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($projectId, $templateName, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'templateName' => $templateName];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * (templates.get)
     *
     * @param string $projectId
     * @param string $templateName
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $templateName, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'templateName' => $templateName];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Manager_Template");
    }

    /**
     * (templates.insert)
     *
     * @param string $projectId
     * @param Google_Service_Manager_Template|Google_Template $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($projectId, Google_Service_Manager_Template $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Manager_Template");
    }

    /**
     * (templates.listTemplates)
     *
     * @param string $projectId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Specifies a nextPageToken returned by a previous
     * list request. This token can be used to request the next page of results from
     * a previous list request.
     * @opt_param int maxResults Maximum count of results to be returned. Acceptable
     * values are 0 to 100, inclusive. (Default: 50)
     */
    public function listTemplates($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Manager_TemplatesListResponse");
    }
}


/**
 * Class Google_Service_Manager_AccessConfig
 */
class Google_Service_Manager_AccessConfig extends Google_Model
{
    public $name;
    public $natIp;
    public $type;
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
    public function getNatIp()
    {
        return $this->natIp;
    }

    /**
     * @param $natIp
     */
    public function setNatIp($natIp)
    {
        $this->natIp = $natIp;
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
 * Class Google_Service_Manager_Action
 */
class Google_Service_Manager_Action extends Google_Collection
{
    public $commands;
    public $timeoutMs;
    protected $collection_key = 'commands';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @param $commands
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;
    }

    /**
     * @return mixed
     */
    public function getTimeoutMs()
    {
        return $this->timeoutMs;
    }

    /**
     * @param $timeoutMs
     */
    public function setTimeoutMs($timeoutMs)
    {
        $this->timeoutMs = $timeoutMs;
    }
}

/**
 * Class Google_Service_Manager_AllowedRule
 */
class Google_Service_Manager_AllowedRule extends Google_Collection
{
    public $iPProtocol;
    public $ports;
    protected $collection_key = 'ports';
    protected $internal_gapi_mappings = [
        "iPProtocol" => "IPProtocol",
    ];

    /**
     * @return mixed
     */
    public function getIPProtocol()
    {
        return $this->iPProtocol;
    }

    /**
     * @param $iPProtocol
     */
    public function setIPProtocol($iPProtocol)
    {
        $this->iPProtocol = $iPProtocol;
    }

    /**
     * @return mixed
     */
    public function getPorts()
    {
        return $this->ports;
    }

    /**
     * @param $ports
     */
    public function setPorts($ports)
    {
        $this->ports = $ports;
    }
}

/**
 * Class Google_Service_Manager_AutoscalingModule
 */
class Google_Service_Manager_AutoscalingModule extends Google_Model
{
    public $coolDownPeriodSec;
    public $description;
    public $maxNumReplicas;
    public $minNumReplicas;
    public $signalType;
    public $targetModule;
    public $targetUtilization;
    protected $internal_gapi_mappings = [];

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

    /**
     * @return mixed
     */
    public function getSignalType()
    {
        return $this->signalType;
    }

    /**
     * @param $signalType
     */
    public function setSignalType($signalType)
    {
        $this->signalType = $signalType;
    }

    /**
     * @return mixed
     */
    public function getTargetModule()
    {
        return $this->targetModule;
    }

    /**
     * @param $targetModule
     */
    public function setTargetModule($targetModule)
    {
        $this->targetModule = $targetModule;
    }

    /**
     * @return mixed
     */
    public function getTargetUtilization()
    {
        return $this->targetUtilization;
    }

    /**
     * @param $targetUtilization
     */
    public function setTargetUtilization($targetUtilization)
    {
        $this->targetUtilization = $targetUtilization;
    }
}

/**
 * Class Google_Service_Manager_AutoscalingModuleStatus
 */
class Google_Service_Manager_AutoscalingModuleStatus extends Google_Model
{
    public $autoscalingConfigUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutoscalingConfigUrl()
    {
        return $this->autoscalingConfigUrl;
    }

    /**
     * @param $autoscalingConfigUrl
     */
    public function setAutoscalingConfigUrl($autoscalingConfigUrl)
    {
        $this->autoscalingConfigUrl = $autoscalingConfigUrl;
    }
}

/**
 * Class Google_Service_Manager_DeployState
 */
class Google_Service_Manager_DeployState extends Google_Model
{
    public $details;
    public $status;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
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
 * Class Google_Service_Manager_Deployment
 */
class Google_Service_Manager_Deployment extends Google_Collection
{
    public $creationDate;
    public $description;
    public $name;
    public $templateName;
    protected $collection_key = 'overrides';
    protected $internal_gapi_mappings = [];
    protected $modulesType = 'Google_Service_Manager_ModuleStatus';
    protected $modulesDataType = 'map';
    protected $overridesType = 'Google_Service_Manager_ParamOverride';
    protected $overridesDataType = 'array';
    protected $stateType = 'Google_Service_Manager_DeployState';
    protected $stateDataType = '';

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
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
     * @param $modules
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
    }

    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->modules;
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
     * @param Google_Service_Manager_DeployState $state
     */
    public function setState(Google_Service_Manager_DeployState $state)
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
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * @param $templateName
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }
}

/**
 * Class Google_Service_Manager_DeploymentModules
 */
class Google_Service_Manager_DeploymentModules extends Google_Model
{
}

/**
 * Class Google_Service_Manager_DeploymentsListResponse
 */
class Google_Service_Manager_DeploymentsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_Manager_Deployment';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_Manager_DiskAttachment
 */
class Google_Service_Manager_DiskAttachment extends Google_Model
{
    public $deviceName;
    public $index;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * @param $deviceName
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }
}

/**
 * Class Google_Service_Manager_EnvVariable
 */
class Google_Service_Manager_EnvVariable extends Google_Model
{
    public $hidden;
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Manager_ExistingDisk
 */
class Google_Service_Manager_ExistingDisk extends Google_Model
{
    public $source;
    protected $internal_gapi_mappings = [];
    protected $attachmentType = 'Google_Service_Manager_DiskAttachment';
    protected $attachmentDataType = '';

    /**
     * @param Google_Service_Manager_DiskAttachment $attachment
     */
    public function setAttachment(Google_Service_Manager_DiskAttachment $attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }
}

/**
 * Class Google_Service_Manager_FirewallModule
 */
class Google_Service_Manager_FirewallModule extends Google_Collection
{
    public $description;
    public $network;
    public $sourceRanges;
    public $sourceTags;
    public $targetTags;
    protected $collection_key = 'targetTags';
    protected $internal_gapi_mappings = [];
    protected $allowedType = 'Google_Service_Manager_AllowedRule';
    protected $allowedDataType = 'array';

    /**
     * @param $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
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
    public function getSourceRanges()
    {
        return $this->sourceRanges;
    }

    /**
     * @param $sourceRanges
     */
    public function setSourceRanges($sourceRanges)
    {
        $this->sourceRanges = $sourceRanges;
    }

    /**
     * @return mixed
     */
    public function getSourceTags()
    {
        return $this->sourceTags;
    }

    /**
     * @param $sourceTags
     */
    public function setSourceTags($sourceTags)
    {
        $this->sourceTags = $sourceTags;
    }

    /**
     * @return mixed
     */
    public function getTargetTags()
    {
        return $this->targetTags;
    }

    /**
     * @param $targetTags
     */
    public function setTargetTags($targetTags)
    {
        $this->targetTags = $targetTags;
    }
}

/**
 * Class Google_Service_Manager_FirewallModuleStatus
 */
class Google_Service_Manager_FirewallModuleStatus extends Google_Model
{
    public $firewallUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFirewallUrl()
    {
        return $this->firewallUrl;
    }

    /**
     * @param $firewallUrl
     */
    public function setFirewallUrl($firewallUrl)
    {
        $this->firewallUrl = $firewallUrl;
    }
}

/**
 * Class Google_Service_Manager_HealthCheckModule
 */
class Google_Service_Manager_HealthCheckModule extends Google_Model
{
    public $checkIntervalSec;
    public $description;
    public $healthyThreshold;
    public $host;
    public $path;
    public $port;
    public $timeoutSec;
    public $unhealthyThreshold;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCheckIntervalSec()
    {
        return $this->checkIntervalSec;
    }

    /**
     * @param $checkIntervalSec
     */
    public function setCheckIntervalSec($checkIntervalSec)
    {
        $this->checkIntervalSec = $checkIntervalSec;
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
    public function getHealthyThreshold()
    {
        return $this->healthyThreshold;
    }

    /**
     * @param $healthyThreshold
     */
    public function setHealthyThreshold($healthyThreshold)
    {
        $this->healthyThreshold = $healthyThreshold;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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

    /**
     * @return mixed
     */
    public function getTimeoutSec()
    {
        return $this->timeoutSec;
    }

    /**
     * @param $timeoutSec
     */
    public function setTimeoutSec($timeoutSec)
    {
        $this->timeoutSec = $timeoutSec;
    }

    /**
     * @return mixed
     */
    public function getUnhealthyThreshold()
    {
        return $this->unhealthyThreshold;
    }

    /**
     * @param $unhealthyThreshold
     */
    public function setUnhealthyThreshold($unhealthyThreshold)
    {
        $this->unhealthyThreshold = $unhealthyThreshold;
    }
}

/**
 * Class Google_Service_Manager_HealthCheckModuleStatus
 */
class Google_Service_Manager_HealthCheckModuleStatus extends Google_Model
{
    public $healthCheckUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHealthCheckUrl()
    {
        return $this->healthCheckUrl;
    }

    /**
     * @param $healthCheckUrl
     */
    public function setHealthCheckUrl($healthCheckUrl)
    {
        $this->healthCheckUrl = $healthCheckUrl;
    }
}

/**
 * Class Google_Service_Manager_LbModule
 */
class Google_Service_Manager_LbModule extends Google_Collection
{
    public $description;
    public $healthChecks;
    public $ipAddress;
    public $ipProtocol;
    public $portRange;
    public $sessionAffinity;
    public $targetModules;
    protected $collection_key = 'targetModules';
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
    public function getHealthChecks()
    {
        return $this->healthChecks;
    }

    /**
     * @param $healthChecks
     */
    public function setHealthChecks($healthChecks)
    {
        $this->healthChecks = $healthChecks;
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
    public function getIpProtocol()
    {
        return $this->ipProtocol;
    }

    /**
     * @param $ipProtocol
     */
    public function setIpProtocol($ipProtocol)
    {
        $this->ipProtocol = $ipProtocol;
    }

    /**
     * @return mixed
     */
    public function getPortRange()
    {
        return $this->portRange;
    }

    /**
     * @param $portRange
     */
    public function setPortRange($portRange)
    {
        $this->portRange = $portRange;
    }

    /**
     * @return mixed
     */
    public function getSessionAffinity()
    {
        return $this->sessionAffinity;
    }

    /**
     * @param $sessionAffinity
     */
    public function setSessionAffinity($sessionAffinity)
    {
        $this->sessionAffinity = $sessionAffinity;
    }

    /**
     * @return mixed
     */
    public function getTargetModules()
    {
        return $this->targetModules;
    }

    /**
     * @param $targetModules
     */
    public function setTargetModules($targetModules)
    {
        $this->targetModules = $targetModules;
    }
}

/**
 * Class Google_Service_Manager_LbModuleStatus
 */
class Google_Service_Manager_LbModuleStatus extends Google_Model
{
    public $forwardingRuleUrl;
    public $targetPoolUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getForwardingRuleUrl()
    {
        return $this->forwardingRuleUrl;
    }

    /**
     * @param $forwardingRuleUrl
     */
    public function setForwardingRuleUrl($forwardingRuleUrl)
    {
        $this->forwardingRuleUrl = $forwardingRuleUrl;
    }

    /**
     * @return mixed
     */
    public function getTargetPoolUrl()
    {
        return $this->targetPoolUrl;
    }

    /**
     * @param $targetPoolUrl
     */
    public function setTargetPoolUrl($targetPoolUrl)
    {
        $this->targetPoolUrl = $targetPoolUrl;
    }
}

/**
 * Class Google_Service_Manager_Metadata
 */
class Google_Service_Manager_Metadata extends Google_Collection
{
    public $fingerPrint;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Manager_MetadataItem';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getFingerPrint()
    {
        return $this->fingerPrint;
    }

    /**
     * @param $fingerPrint
     */
    public function setFingerPrint($fingerPrint)
    {
        $this->fingerPrint = $fingerPrint;
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
}

/**
 * Class Google_Service_Manager_MetadataItem
 */
class Google_Service_Manager_MetadataItem extends Google_Model
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
 * Class Google_Service_Manager_Module
 */
class Google_Service_Manager_Module extends Google_Model
{
    public $type;
    protected $internal_gapi_mappings = [];
    protected $autoscalingModuleType = 'Google_Service_Manager_AutoscalingModule';
    protected $autoscalingModuleDataType = '';
    protected $firewallModuleType = 'Google_Service_Manager_FirewallModule';
    protected $firewallModuleDataType = '';
    protected $healthCheckModuleType = 'Google_Service_Manager_HealthCheckModule';
    protected $healthCheckModuleDataType = '';
    protected $lbModuleType = 'Google_Service_Manager_LbModule';
    protected $lbModuleDataType = '';
    protected $networkModuleType = 'Google_Service_Manager_NetworkModule';
    protected $networkModuleDataType = '';
    protected $replicaPoolModuleType = 'Google_Service_Manager_ReplicaPoolModule';
    protected $replicaPoolModuleDataType = '';

    /**
     * @param Google_Service_Manager_AutoscalingModule $autoscalingModule
     */
    public function setAutoscalingModule(Google_Service_Manager_AutoscalingModule $autoscalingModule)
    {
        $this->autoscalingModule = $autoscalingModule;
    }

    /**
     * @return mixed
     */
    public function getAutoscalingModule()
    {
        return $this->autoscalingModule;
    }

    /**
     * @param Google_Service_Manager_FirewallModule $firewallModule
     */
    public function setFirewallModule(Google_Service_Manager_FirewallModule $firewallModule)
    {
        $this->firewallModule = $firewallModule;
    }

    /**
     * @return mixed
     */
    public function getFirewallModule()
    {
        return $this->firewallModule;
    }

    /**
     * @param Google_Service_Manager_HealthCheckModule $healthCheckModule
     */
    public function setHealthCheckModule(Google_Service_Manager_HealthCheckModule $healthCheckModule)
    {
        $this->healthCheckModule = $healthCheckModule;
    }

    /**
     * @return mixed
     */
    public function getHealthCheckModule()
    {
        return $this->healthCheckModule;
    }

    /**
     * @param Google_Service_Manager_LbModule $lbModule
     */
    public function setLbModule(Google_Service_Manager_LbModule $lbModule)
    {
        $this->lbModule = $lbModule;
    }

    /**
     * @return mixed
     */
    public function getLbModule()
    {
        return $this->lbModule;
    }

    /**
     * @param Google_Service_Manager_NetworkModule $networkModule
     */
    public function setNetworkModule(Google_Service_Manager_NetworkModule $networkModule)
    {
        $this->networkModule = $networkModule;
    }

    /**
     * @return mixed
     */
    public function getNetworkModule()
    {
        return $this->networkModule;
    }

    /**
     * @param Google_Service_Manager_ReplicaPoolModule $replicaPoolModule
     */
    public function setReplicaPoolModule(Google_Service_Manager_ReplicaPoolModule $replicaPoolModule)
    {
        $this->replicaPoolModule = $replicaPoolModule;
    }

    /**
     * @return mixed
     */
    public function getReplicaPoolModule()
    {
        return $this->replicaPoolModule;
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
 * Class Google_Service_Manager_ModuleStatus
 */
class Google_Service_Manager_ModuleStatus extends Google_Model
{
    public $type;
    protected $internal_gapi_mappings = [];
    protected $autoscalingModuleStatusType = 'Google_Service_Manager_AutoscalingModuleStatus';
    protected $autoscalingModuleStatusDataType = '';
    protected $firewallModuleStatusType = 'Google_Service_Manager_FirewallModuleStatus';
    protected $firewallModuleStatusDataType = '';
    protected $healthCheckModuleStatusType = 'Google_Service_Manager_HealthCheckModuleStatus';
    protected $healthCheckModuleStatusDataType = '';
    protected $lbModuleStatusType = 'Google_Service_Manager_LbModuleStatus';
    protected $lbModuleStatusDataType = '';
    protected $networkModuleStatusType = 'Google_Service_Manager_NetworkModuleStatus';
    protected $networkModuleStatusDataType = '';
    protected $replicaPoolModuleStatusType = 'Google_Service_Manager_ReplicaPoolModuleStatus';
    protected $replicaPoolModuleStatusDataType = '';
    protected $stateType = 'Google_Service_Manager_DeployState';
    protected $stateDataType = '';

    /**
     * @param Google_Service_Manager_AutoscalingModuleStatus $autoscalingModuleStatus
     */
    public function setAutoscalingModuleStatus(Google_Service_Manager_AutoscalingModuleStatus $autoscalingModuleStatus)
    {
        $this->autoscalingModuleStatus = $autoscalingModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getAutoscalingModuleStatus()
    {
        return $this->autoscalingModuleStatus;
    }

    /**
     * @param Google_Service_Manager_FirewallModuleStatus $firewallModuleStatus
     */
    public function setFirewallModuleStatus(Google_Service_Manager_FirewallModuleStatus $firewallModuleStatus)
    {
        $this->firewallModuleStatus = $firewallModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getFirewallModuleStatus()
    {
        return $this->firewallModuleStatus;
    }

    /**
     * @param Google_Service_Manager_HealthCheckModuleStatus $healthCheckModuleStatus
     */
    public function setHealthCheckModuleStatus(Google_Service_Manager_HealthCheckModuleStatus $healthCheckModuleStatus)
    {
        $this->healthCheckModuleStatus = $healthCheckModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getHealthCheckModuleStatus()
    {
        return $this->healthCheckModuleStatus;
    }

    /**
     * @param Google_Service_Manager_LbModuleStatus $lbModuleStatus
     */
    public function setLbModuleStatus(Google_Service_Manager_LbModuleStatus $lbModuleStatus)
    {
        $this->lbModuleStatus = $lbModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getLbModuleStatus()
    {
        return $this->lbModuleStatus;
    }

    /**
     * @param Google_Service_Manager_NetworkModuleStatus $networkModuleStatus
     */
    public function setNetworkModuleStatus(Google_Service_Manager_NetworkModuleStatus $networkModuleStatus)
    {
        $this->networkModuleStatus = $networkModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getNetworkModuleStatus()
    {
        return $this->networkModuleStatus;
    }

    /**
     * @param Google_Service_Manager_ReplicaPoolModuleStatus $replicaPoolModuleStatus
     */
    public function setReplicaPoolModuleStatus(Google_Service_Manager_ReplicaPoolModuleStatus $replicaPoolModuleStatus)
    {
        $this->replicaPoolModuleStatus = $replicaPoolModuleStatus;
    }

    /**
     * @return mixed
     */
    public function getReplicaPoolModuleStatus()
    {
        return $this->replicaPoolModuleStatus;
    }

    /**
     * @param Google_Service_Manager_DeployState $state
     */
    public function setState(Google_Service_Manager_DeployState $state)
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
 * Class Google_Service_Manager_NetworkInterface
 */
class Google_Service_Manager_NetworkInterface extends Google_Collection
{
    public $name;
    public $network;
    public $networkIp;
    protected $collection_key = 'accessConfigs';
    protected $internal_gapi_mappings = [];
    protected $accessConfigsType = 'Google_Service_Manager_AccessConfig';
    protected $accessConfigsDataType = 'array';

    /**
     * @param $accessConfigs
     */
    public function setAccessConfigs($accessConfigs)
    {
        $this->accessConfigs = $accessConfigs;
    }

    /**
     * @return mixed
     */
    public function getAccessConfigs()
    {
        return $this->accessConfigs;
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
    public function getNetworkIp()
    {
        return $this->networkIp;
    }

    /**
     * @param $networkIp
     */
    public function setNetworkIp($networkIp)
    {
        $this->networkIp = $networkIp;
    }
}

/**
 * Class Google_Service_Manager_NetworkModule
 */
class Google_Service_Manager_NetworkModule extends Google_Model
{
    public $iPv4Range;
    public $description;
    public $gatewayIPv4;
    protected $internal_gapi_mappings = [
        "iPv4Range" => "IPv4Range",
    ];

    /**
     * @return mixed
     */
    public function getIPv4Range()
    {
        return $this->iPv4Range;
    }

    /**
     * @param $iPv4Range
     */
    public function setIPv4Range($iPv4Range)
    {
        $this->iPv4Range = $iPv4Range;
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
    public function getGatewayIPv4()
    {
        return $this->gatewayIPv4;
    }

    /**
     * @param $gatewayIPv4
     */
    public function setGatewayIPv4($gatewayIPv4)
    {
        $this->gatewayIPv4 = $gatewayIPv4;
    }
}

/**
 * Class Google_Service_Manager_NetworkModuleStatus
 */
class Google_Service_Manager_NetworkModuleStatus extends Google_Model
{
    public $networkUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getNetworkUrl()
    {
        return $this->networkUrl;
    }

    /**
     * @param $networkUrl
     */
    public function setNetworkUrl($networkUrl)
    {
        $this->networkUrl = $networkUrl;
    }
}

/**
 * Class Google_Service_Manager_NewDisk
 */
class Google_Service_Manager_NewDisk extends Google_Model
{
    public $autoDelete;
    public $boot;
    protected $internal_gapi_mappings = [];
    protected $attachmentType = 'Google_Service_Manager_DiskAttachment';
    protected $attachmentDataType = '';
    protected $initializeParamsType = 'Google_Service_Manager_NewDiskInitializeParams';
    protected $initializeParamsDataType = '';


    /**
     * @param Google_Service_Manager_DiskAttachment $attachment
     */
    public function setAttachment(Google_Service_Manager_DiskAttachment $attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @return mixed
     */
    public function getAutoDelete()
    {
        return $this->autoDelete;
    }

    /**
     * @param $autoDelete
     */
    public function setAutoDelete($autoDelete)
    {
        $this->autoDelete = $autoDelete;
    }

    /**
     * @return mixed
     */
    public function getBoot()
    {
        return $this->boot;
    }

    /**
     * @param $boot
     */
    public function setBoot($boot)
    {
        $this->boot = $boot;
    }

    /**
     * @param Google_Service_Manager_NewDiskInitializeParams $initializeParams
     */
    public function setInitializeParams(Google_Service_Manager_NewDiskInitializeParams $initializeParams)
    {
        $this->initializeParams = $initializeParams;
    }

    /**
     * @return mixed
     */
    public function getInitializeParams()
    {
        return $this->initializeParams;
    }
}

/**
 * Class Google_Service_Manager_NewDiskInitializeParams
 */
class Google_Service_Manager_NewDiskInitializeParams extends Google_Model
{
    public $diskSizeGb;
    public $diskType;
    public $sourceImage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDiskSizeGb()
    {
        return $this->diskSizeGb;
    }

    /**
     * @param $diskSizeGb
     */
    public function setDiskSizeGb($diskSizeGb)
    {
        $this->diskSizeGb = $diskSizeGb;
    }

    /**
     * @return mixed
     */
    public function getDiskType()
    {
        return $this->diskType;
    }

    /**
     * @param $diskType
     */
    public function setDiskType($diskType)
    {
        $this->diskType = $diskType;
    }

    /**
     * @return mixed
     */
    public function getSourceImage()
    {
        return $this->sourceImage;
    }

    /**
     * @param $sourceImage
     */
    public function setSourceImage($sourceImage)
    {
        $this->sourceImage = $sourceImage;
    }
}

/**
 * Class Google_Service_Manager_ParamOverride
 */
class Google_Service_Manager_ParamOverride extends Google_Model
{
    public $path;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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
 * Class Google_Service_Manager_ReplicaPoolModule
 */
class Google_Service_Manager_ReplicaPoolModule extends Google_Collection
{
    public $healthChecks;
    public $numReplicas;
    public $resourceView;
    protected $collection_key = 'healthChecks';
    protected $internal_gapi_mappings = [];
    protected $envVariablesType = 'Google_Service_Manager_EnvVariable';
    protected $envVariablesDataType = 'map';
    protected $replicaPoolParamsType = 'Google_Service_Manager_ReplicaPoolParams';
    protected $replicaPoolParamsDataType = '';

    /**
     * @param $envVariables
     */
    public function setEnvVariables($envVariables)
    {
        $this->envVariables = $envVariables;
    }

    /**
     * @return mixed
     */
    public function getEnvVariables()
    {
        return $this->envVariables;
    }

    /**
     * @return mixed
     */
    public function getHealthChecks()
    {
        return $this->healthChecks;
    }

    /**
     * @param $healthChecks
     */
    public function setHealthChecks($healthChecks)
    {
        $this->healthChecks = $healthChecks;
    }

    /**
     * @return mixed
     */
    public function getNumReplicas()
    {
        return $this->numReplicas;
    }

    /**
     * @param $numReplicas
     */
    public function setNumReplicas($numReplicas)
    {
        $this->numReplicas = $numReplicas;
    }

    /**
     * @param Google_Service_Manager_ReplicaPoolParams $replicaPoolParams
     */
    public function setReplicaPoolParams(Google_Service_Manager_ReplicaPoolParams $replicaPoolParams)
    {
        $this->replicaPoolParams = $replicaPoolParams;
    }

    /**
     * @return mixed
     */
    public function getReplicaPoolParams()
    {
        return $this->replicaPoolParams;
    }

    /**
     * @return mixed
     */
    public function getResourceView()
    {
        return $this->resourceView;
    }

    /**
     * @param $resourceView
     */
    public function setResourceView($resourceView)
    {
        $this->resourceView = $resourceView;
    }
}

/**
 * Class Google_Service_Manager_ReplicaPoolModuleEnvVariables
 */
class Google_Service_Manager_ReplicaPoolModuleEnvVariables extends Google_Model
{
}

/**
 * Class Google_Service_Manager_ReplicaPoolModuleStatus
 */
class Google_Service_Manager_ReplicaPoolModuleStatus extends Google_Model
{
    public $replicaPoolUrl;
    public $resourceViewUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getReplicaPoolUrl()
    {
        return $this->replicaPoolUrl;
    }

    /**
     * @param $replicaPoolUrl
     */
    public function setReplicaPoolUrl($replicaPoolUrl)
    {
        $this->replicaPoolUrl = $replicaPoolUrl;
    }

    /**
     * @return mixed
     */
    public function getResourceViewUrl()
    {
        return $this->resourceViewUrl;
    }

    /**
     * @param $resourceViewUrl
     */
    public function setResourceViewUrl($resourceViewUrl)
    {
        $this->resourceViewUrl = $resourceViewUrl;
    }
}

/**
 * Class Google_Service_Manager_ReplicaPoolParams
 */
class Google_Service_Manager_ReplicaPoolParams extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $v1beta1Type = 'Google_Service_Manager_ReplicaPoolParamsV1Beta1';
    protected $v1beta1DataType = '';


    /**
     * @param Google_Service_Manager_ReplicaPoolParamsV1Beta1 $v1beta1
     */
    public function setV1beta1(Google_Service_Manager_ReplicaPoolParamsV1Beta1 $v1beta1)
    {
        $this->v1beta1 = $v1beta1;
    }

    /**
     * @return mixed
     */
    public function getV1beta1()
    {
        return $this->v1beta1;
    }
}

/**
 * Class Google_Service_Manager_ReplicaPoolParamsV1Beta1
 */
class Google_Service_Manager_ReplicaPoolParamsV1Beta1 extends Google_Collection
{
    public $autoRestart;
    public $baseInstanceName;
    public $canIpForward;
    public $description;
    public $initAction;
    public $machineType;
    public $onHostMaintenance;
    public $zone;
    protected $collection_key = 'serviceAccounts';
    protected $internal_gapi_mappings = [];
    protected $disksToAttachType = 'Google_Service_Manager_ExistingDisk';
    protected $disksToAttachDataType = 'array';
    protected $disksToCreateType = 'Google_Service_Manager_NewDisk';
    protected $disksToCreateDataType = 'array';
    protected $metadataType = 'Google_Service_Manager_Metadata';
    protected $metadataDataType = '';
    protected $networkInterfacesType = 'Google_Service_Manager_NetworkInterface';
    protected $networkInterfacesDataType = 'array';
    protected $serviceAccountsType = 'Google_Service_Manager_ServiceAccount';
    protected $serviceAccountsDataType = 'array';
    protected $tagsType = 'Google_Service_Manager_Tag';
    protected $tagsDataType = '';

    /**
     * @return mixed
     */
    public function getAutoRestart()
    {
        return $this->autoRestart;
    }

    /**
     * @param $autoRestart
     */
    public function setAutoRestart($autoRestart)
    {
        $this->autoRestart = $autoRestart;
    }

    /**
     * @return mixed
     */
    public function getBaseInstanceName()
    {
        return $this->baseInstanceName;
    }

    /**
     * @param $baseInstanceName
     */
    public function setBaseInstanceName($baseInstanceName)
    {
        $this->baseInstanceName = $baseInstanceName;
    }

    /**
     * @return mixed
     */
    public function getCanIpForward()
    {
        return $this->canIpForward;
    }

    /**
     * @param $canIpForward
     */
    public function setCanIpForward($canIpForward)
    {
        $this->canIpForward = $canIpForward;
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
     * @param $disksToAttach
     */
    public function setDisksToAttach($disksToAttach)
    {
        $this->disksToAttach = $disksToAttach;
    }

    /**
     * @return mixed
     */
    public function getDisksToAttach()
    {
        return $this->disksToAttach;
    }

    /**
     * @param $disksToCreate
     */
    public function setDisksToCreate($disksToCreate)
    {
        $this->disksToCreate = $disksToCreate;
    }

    /**
     * @return mixed
     */
    public function getDisksToCreate()
    {
        return $this->disksToCreate;
    }

    /**
     * @return mixed
     */
    public function getInitAction()
    {
        return $this->initAction;
    }

    /**
     * @param $initAction
     */
    public function setInitAction($initAction)
    {
        $this->initAction = $initAction;
    }

    /**
     * @return mixed
     */
    public function getMachineType()
    {
        return $this->machineType;
    }

    /**
     * @param $machineType
     */
    public function setMachineType($machineType)
    {
        $this->machineType = $machineType;
    }

    /**
     * @param Google_Service_Manager_Metadata $metadata
     */
    public function setMetadata(Google_Service_Manager_Metadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param $networkInterfaces
     */
    public function setNetworkInterfaces($networkInterfaces)
    {
        $this->networkInterfaces = $networkInterfaces;
    }

    /**
     * @return mixed
     */
    public function getNetworkInterfaces()
    {
        return $this->networkInterfaces;
    }

    /**
     * @return mixed
     */
    public function getOnHostMaintenance()
    {
        return $this->onHostMaintenance;
    }

    /**
     * @param $onHostMaintenance
     */
    public function setOnHostMaintenance($onHostMaintenance)
    {
        $this->onHostMaintenance = $onHostMaintenance;
    }

    /**
     * @param $serviceAccounts
     */
    public function setServiceAccounts($serviceAccounts)
    {
        $this->serviceAccounts = $serviceAccounts;
    }

    /**
     * @return mixed
     */
    public function getServiceAccounts()
    {
        return $this->serviceAccounts;
    }

    /**
     * @param Google_Service_Manager_Tag $tags
     */
    public function setTags(Google_Service_Manager_Tag $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
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
 * Class Google_Service_Manager_ServiceAccount
 */
class Google_Service_Manager_ServiceAccount extends Google_Collection
{
    public $email;
    public $scopes;
    protected $collection_key = 'scopes';
    protected $internal_gapi_mappings = [];

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
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param $scopes
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }
}

/**
 * Class Google_Service_Manager_Tag
 */
class Google_Service_Manager_Tag extends Google_Collection
{
    public $fingerPrint;
    public $items;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFingerPrint()
    {
        return $this->fingerPrint;
    }

    /**
     * @param $fingerPrint
     */
    public function setFingerPrint($fingerPrint)
    {
        $this->fingerPrint = $fingerPrint;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
}

/**
 * Class Google_Service_Manager_Template
 */
class Google_Service_Manager_Template extends Google_Model
{
    public $description;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $actionsType = 'Google_Service_Manager_Action';
    protected $actionsDataType = 'map';
    protected $modulesType = 'Google_Service_Manager_Module';
    protected $modulesDataType = 'map';

    /**
     * @param $actions
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    /**
     * @return mixed
     */
    public function getActions()
    {
        return $this->actions;
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
     * @param $modules
     */
    public function setModules($modules)
    {
        $this->modules = $modules;
    }

    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->modules;
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
 * Class Google_Service_Manager_TemplateActions
 */
class Google_Service_Manager_TemplateActions extends Google_Model
{
}

/**
 * Class Google_Service_Manager_TemplateModules
 */
class Google_Service_Manager_TemplateModules extends Google_Model
{
}

/**
 * Class Google_Service_Manager_TemplatesListResponse
 */
class Google_Service_Manager_TemplatesListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_Manager_Template';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}
