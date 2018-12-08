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
 * Service definition for Deploymentmanager (v2beta1).
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
class Google_Service_Deploymentmanager extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN =
        "https://www.googleapis.com/auth/ndev.cloudman";
    /** View your Google Cloud Platform management resources and deployment status information. */
    const NDEV_CLOUDMAN_READONLY =
        "https://www.googleapis.com/auth/ndev.cloudman.readonly";

    public $deployments;
    public $manifests;
    public $operations;
    public $resources;
    public $types;


    /**
     * Constructs the internal representation of the Deploymentmanager service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'deploymentmanager/v2beta1/projects/';
        $this->version = 'v2beta1';
        $this->serviceName = 'deploymentmanager';

        $this->deployments = new Google_Service_Deploymentmanager_Deployments_Resource(
            $this,
            $this->serviceName,
            'deployments',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/deployments/{deployment}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/deployments/{deployment}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/deployments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/deployments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
        $this->manifests = new Google_Service_Deploymentmanager_Manifests_Resource(
            $this,
            $this->serviceName,
            'manifests',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/global/deployments/{deployment}/manifests/{manifest}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'manifest' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/deployments/{deployment}/manifests',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
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
        $this->operations = new Google_Service_Deploymentmanager_Operations_Resource(
            $this,
            $this->serviceName,
            'operations',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/global/operations/{operation}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/global/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
        $this->resources = new Google_Service_Deploymentmanager_Resources_Resource(
            $this,
            $this->serviceName,
            'resources',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/global/deployments/{deployment}/resources/{resource}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'resource' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/deployments/{deployment}/resources',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deployment' => [
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
        $this->types = new Google_Service_Deploymentmanager_Types_Resource(
            $this,
            $this->serviceName,
            'types',
            [
                'methods' => [
                    'list' => [
                        'path' => '{project}/global/types',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
 *   $deploymentmanagerService = new Google_Service_Deploymentmanager(...);
 *   $deployments = $deploymentmanagerService->deployments;
 *  </code>
 */
class Google_Service_Deploymentmanager_Deployments_Resource extends Google_Service_Resource
{

    /**
     * ! Deletes a deployment and all of the resources in the deployment.
     * (deployments.delete)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $deployment, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Deploymentmanager_Operation");
    }

    /**
     * ! Gets information about a specific deployment. (deployments.get)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $deployment, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Deploymentmanager_Deployment");
    }

    /**
     * ! Creates a deployment and all of the resources described by the ! deployment
     * manifest. (deployments.insert)
     *
     * @param string $project ! The project ID for this request.
     * @param Google_Deployment|Google_Service_Deploymentmanager_Deployment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, Google_Service_Deploymentmanager_Deployment $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Deploymentmanager_Operation");
    }

    /**
     * ! Lists all deployments for a given project. (deployments.listDeployments)
     *
     * @param string $project ! The project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken ! Specifies a nextPageToken returned by a
     * previous list request. This ! token can be used to request the next page of
     * results from a previous ! list request.
     * @opt_param int maxResults ! Maximum count of results to be returned. !
     * Acceptable values are 0 to 100, inclusive. (Default: 50)
     */
    public function listDeployments($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Deploymentmanager_DeploymentsListResponse");
    }
}

/**
 * The "manifests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google_Service_Deploymentmanager(...);
 *   $manifests = $deploymentmanagerService->manifests;
 *  </code>
 */
class Google_Service_Deploymentmanager_Manifests_Resource extends Google_Service_Resource
{

    /**
     * ! Gets information about a specific manifest. (manifests.get)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param string $manifest ! The name of the manifest for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $deployment, $manifest, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment, 'manifest' => $manifest];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Deploymentmanager_Manifest");
    }

    /**
     * ! Lists all manifests for a given deployment. (manifests.listManifests)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken ! Specifies a nextPageToken returned by a
     * previous list request. This ! token can be used to request the next page of
     * results from a previous ! list request.
     * @opt_param int maxResults ! Maximum count of results to be returned. !
     * Acceptable values are 0 to 100, inclusive. (Default: 50)
     */
    public function listManifests($project, $deployment, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Deploymentmanager_ManifestsListResponse");
    }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google_Service_Deploymentmanager(...);
 *   $operations = $deploymentmanagerService->operations;
 *  </code>
 */
class Google_Service_Deploymentmanager_Operations_Resource extends Google_Service_Resource
{

    /**
     * ! Gets information about a specific Operation. (operations.get)
     *
     * @param string $project ! The project ID for this request.
     * @param string $operation ! The name of the operation for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Deploymentmanager_Operation");
    }

    /**
     * ! Lists all Operations for a project. (operations.listOperations)
     *
     * @param string $project ! The project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken ! Specifies a nextPageToken returned by a
     * previous list request. This ! token can be used to request the next page of
     * results from a previous ! list request.
     * @opt_param int maxResults ! Maximum count of results to be returned. !
     * Acceptable values are 0 to 100, inclusive. (Default: 50)
     */
    public function listOperations($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Deploymentmanager_OperationsListResponse");
    }
}

/**
 * The "resources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google_Service_Deploymentmanager(...);
 *   $resources = $deploymentmanagerService->resources;
 *  </code>
 */
class Google_Service_Deploymentmanager_Resources_Resource extends Google_Service_Resource
{

    /**
     * ! Gets information about a single resource. (resources.get)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param string $resource ! The name of the resource for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $deployment, $resource, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment, 'resource' => $resource];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Deploymentmanager_DeploymentmanagerResource");
    }

    /**
     * ! Lists all resources in a given deployment. (resources.listResources)
     *
     * @param string $project ! The project ID for this request.
     * @param string $deployment ! The name of the deployment for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken ! Specifies a nextPageToken returned by a
     * previous list request. This ! token can be used to request the next page of
     * results from a previous ! list request.
     * @opt_param int maxResults ! Maximum count of results to be returned. !
     * Acceptable values are 0 to 100, inclusive. (Default: 50)
     */
    public function listResources($project, $deployment, $optParams = [])
    {
        $params = ['project' => $project, 'deployment' => $deployment];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Deploymentmanager_ResourcesListResponse");
    }
}

/**
 * The "types" collection of methods.
 * Typical usage is:
 *  <code>
 *   $deploymentmanagerService = new Google_Service_Deploymentmanager(...);
 *   $types = $deploymentmanagerService->types;
 *  </code>
 */
class Google_Service_Deploymentmanager_Types_Resource extends Google_Service_Resource
{

    /**
     * ! Lists all Types for Deployment Manager. (types.listTypes)
     *
     * @param string $project ! The project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken ! Specifies a nextPageToken returned by a
     * previous list request. This ! token can be used to request the next page of
     * results from a previous ! list request.
     * @opt_param int maxResults ! Maximum count of results to be returned. !
     * Acceptable values are 0 to 100, inclusive. (Default: 50)
     */
    public function listTypes($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Deploymentmanager_TypesListResponse");
    }
}


/**
 * Class Google_Service_Deploymentmanager_Deployment
 */
class Google_Service_Deploymentmanager_Deployment extends Google_Model
{
    public $description;
    public $id;
    public $manifest;
    public $name;
    public $targetConfig;
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
    public function getManifest()
    {
        return $this->manifest;
    }

    /**
     * @param $manifest
     */
    public function setManifest($manifest)
    {
        $this->manifest = $manifest;
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
    public function getTargetConfig()
    {
        return $this->targetConfig;
    }

    /**
     * @param $targetConfig
     */
    public function setTargetConfig($targetConfig)
    {
        $this->targetConfig = $targetConfig;
    }
}

/**
 * Class Google_Service_Deploymentmanager_DeploymentmanagerResource
 */
class Google_Service_Deploymentmanager_DeploymentmanagerResource extends Google_Collection
{
    public $errors;
    public $id;
    public $intent;
    public $manifest;
    public $name;
    public $state;
    public $type;
    public $url;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
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
    public function getIntent()
    {
        return $this->intent;
    }

    /**
     * @param $intent
     */
    public function setIntent($intent)
    {
        $this->intent = $intent;
    }

    /**
     * @return mixed
     */
    public function getManifest()
    {
        return $this->manifest;
    }

    /**
     * @param $manifest
     */
    public function setManifest($manifest)
    {
        $this->manifest = $manifest;
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
 * Class Google_Service_Deploymentmanager_DeploymentsListResponse
 */
class Google_Service_Deploymentmanager_DeploymentsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'deployments';
    protected $internal_gapi_mappings = [];
    protected $deploymentsType = 'Google_Service_Deploymentmanager_Deployment';
    protected $deploymentsDataType = 'array';

    /**
     * @param $deployments
     */
    public function setDeployments($deployments)
    {
        $this->deployments = $deployments;
    }

    /**
     * @return mixed
     */
    public function getDeployments()
    {
        return $this->deployments;
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
 * Class Google_Service_Deploymentmanager_Manifest
 */
class Google_Service_Deploymentmanager_Manifest extends Google_Model
{
    public $config;
    public $evaluatedConfig;
    public $id;
    public $name;
    public $selfLink;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getEvaluatedConfig()
    {
        return $this->evaluatedConfig;
    }

    /**
     * @param $evaluatedConfig
     */
    public function setEvaluatedConfig($evaluatedConfig)
    {
        $this->evaluatedConfig = $evaluatedConfig;
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
}

/**
 * Class Google_Service_Deploymentmanager_ManifestsListResponse
 */
class Google_Service_Deploymentmanager_ManifestsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'manifests';
    protected $internal_gapi_mappings = [];
    protected $manifestsType = 'Google_Service_Deploymentmanager_Manifest';
    protected $manifestsDataType = 'array';

    /**
     * @param $manifests
     */
    public function setManifests($manifests)
    {
        $this->manifests = $manifests;
    }

    /**
     * @return mixed
     */
    public function getManifests()
    {
        return $this->manifests;
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
 * Class Google_Service_Deploymentmanager_Operation
 */
class Google_Service_Deploymentmanager_Operation extends Google_Collection
{
    public $creationTimestamp;
    public $endTime;
    public $httpErrorMessage;
    public $httpErrorStatusCode;
    public $id;
    public $insertTime;
    public $name;
    public $operationType;
    public $progress;
    public $selfLink;
    public $startTime;
    public $status;
    public $statusMessage;
    public $targetId;
    public $targetLink;
    public $user;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_Deploymentmanager_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Deploymentmanager_OperationWarnings';
    protected $warningsDataType = 'array';

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
     * @param Google_Service_Deploymentmanager_OperationError $error
     */
    public function setError(Google_Service_Deploymentmanager_OperationError $error)
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
}

/**
 * Class Google_Service_Deploymentmanager_OperationError
 */
class Google_Service_Deploymentmanager_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Deploymentmanager_OperationErrorErrors';
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
 * Class Google_Service_Deploymentmanager_OperationErrorErrors
 */
class Google_Service_Deploymentmanager_OperationErrorErrors extends Google_Model
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
 * Class Google_Service_Deploymentmanager_OperationWarnings
 */
class Google_Service_Deploymentmanager_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Deploymentmanager_OperationWarningsData';
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
 * Class Google_Service_Deploymentmanager_OperationWarningsData
 */
class Google_Service_Deploymentmanager_OperationWarningsData extends Google_Model
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
 * Class Google_Service_Deploymentmanager_OperationsListResponse
 */
class Google_Service_Deploymentmanager_OperationsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'operations';
    protected $internal_gapi_mappings = [];
    protected $operationsType = 'Google_Service_Deploymentmanager_Operation';
    protected $operationsDataType = 'array';

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
     * @param $operations
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;
    }

    /**
     * @return mixed
     */
    public function getOperations()
    {
        return $this->operations;
    }
}

/**
 * Class Google_Service_Deploymentmanager_ResourcesListResponse
 */
class Google_Service_Deploymentmanager_ResourcesListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_Deploymentmanager_DeploymentmanagerResource';
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
 * Class Google_Service_Deploymentmanager_Type
 */
class Google_Service_Deploymentmanager_Type extends Google_Model
{
    public $name;
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
}

/**
 * Class Google_Service_Deploymentmanager_TypesListResponse
 */
class Google_Service_Deploymentmanager_TypesListResponse extends Google_Collection
{
    protected $collection_key = 'types';
    protected $internal_gapi_mappings = [];
    protected $typesType = 'Google_Service_Deploymentmanager_Type';
    protected $typesDataType = 'array';


    /**
     * @param $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }
}
