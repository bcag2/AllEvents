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
 * Service definition for Container (v1beta1).
 *
 * <p>
 * The Google Container Engine API is used for building and managing container
 * based applications, powered by the open source Kubernetes technology.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/container-engine/docs/v1beta1/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Container extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";

    public $projects_clusters;
    public $projects_operations;
    public $projects_zones_clusters;
    public $projects_zones_operations;
    public $projects_zones_tokens;


    /**
     * Constructs the internal representation of the Container service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'container/v1beta1/projects/';
        $this->version = 'v1beta1';
        $this->serviceName = 'container';

        $this->projects_clusters = new Google_Service_Container_ProjectsClusters_Resource(
            $this,
            $this->serviceName,
            'clusters',
            [
                'methods' => [
                    'list' => [
                        'path' => '{projectId}/clusters',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_operations = new Google_Service_Container_ProjectsOperations_Resource(
            $this,
            $this->serviceName,
            'operations',
            [
                'methods' => [
                    'list' => [
                        'path' => '{projectId}/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_zones_clusters = new Google_Service_Container_ProjectsZonesClusters_Resource(
            $this,
            $this->serviceName,
            'clusters',
            [
                'methods' => [
                    'create' => [
                        'path' => '{projectId}/zones/{zoneId}/clusters',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{projectId}/zones/{zoneId}/clusters/{clusterId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'clusterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{projectId}/zones/{zoneId}/clusters/{clusterId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'clusterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{projectId}/zones/{zoneId}/clusters',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_zones_operations = new Google_Service_Container_ProjectsZonesOperations_Resource(
            $this,
            $this->serviceName,
            'operations',
            [
                'methods' => [
                    'get' => [
                        'path' => '{projectId}/zones/{zoneId}/operations/{operationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'operationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{projectId}/zones/{zoneId}/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_zones_tokens = new Google_Service_Container_ProjectsZonesTokens_Resource(
            $this,
            $this->serviceName,
            'tokens',
            [
                'methods' => [
                    'get' => [
                        'path' => '{masterProjectId}/zones/{zoneId}/tokens/{projectNumber}/{clusterName}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'masterProjectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectNumber' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'clusterName' => [
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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $projects = $containerService->projects;
 *  </code>
 */
class Google_Service_Container_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_ProjectsClusters_Resource extends Google_Service_Resource
{

    /**
     * Lists all clusters owned by a project across all zones.
     * (clusters.listProjectsClusters)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsClusters($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Container_ListAggregatedClustersResponse");
    }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_ProjectsOperations_Resource extends Google_Service_Resource
{

    /**
     * Lists all operations in a project, across all zones.
     * (operations.listProjectsOperations)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsOperations($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Container_ListAggregatedOperationsResponse");
    }
}

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $zones = $containerService->zones;
 *  </code>
 */
class Google_Service_Container_ProjectsZones_Resource extends Google_Service_Resource
{
}

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_ProjectsZonesClusters_Resource extends Google_Service_Resource
{

    /**
     * Creates a cluster, consisting of the specified number and type of Google
     * Compute Engine instances, plus a Kubernetes master instance.
     *
     * The cluster is created in the project's default network.
     *
     * A firewall is added that allows traffic into port 443 on the master, which
     * enables HTTPS. A firewall and a route is added for each node to allow the
     * containers on that node to communicate with all other instances in the
     * cluster.
     *
     * Finally, a route named k8s-iproute-10-xx-0-0 is created to track that the
     * cluster's 10.xx.0.0/16 CIDR has been assigned. (clusters.create)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                                                                                             number.
     * @param string $zoneId The name of the Google Compute Engine zone in which the
     *                                                                                             cluster resides.
     * @param Google_CreateClusterRequest|Google_Service_Container_CreateClusterRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($projectId, $zoneId, Google_Service_Container_CreateClusterRequest $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Container_Operation");
    }

    /**
     * Deletes the cluster, including the Kubernetes master and all worker nodes.
     *
     * Firewalls and routes that were configured at cluster creation are also
     * deleted. (clusters.delete)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param string $zoneId The name of the Google Compute Engine zone in which the
     *                          cluster resides.
     * @param string $clusterId The name of the cluster to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($projectId, $zoneId, $clusterId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId, 'clusterId' => $clusterId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Container_Operation");
    }

    /**
     * Gets a specific cluster. (clusters.get)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param string $zoneId The name of the Google Compute Engine zone in which the
     *                          cluster resides.
     * @param string $clusterId The name of the cluster to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($projectId, $zoneId, $clusterId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId, 'clusterId' => $clusterId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Container_Cluster");
    }

    /**
     * Lists all clusters owned by a project in the specified zone.
     * (clusters.listProjectsZonesClusters)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param string $zoneId The name of the Google Compute Engine zone in which the
     *                          cluster resides.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsZonesClusters($projectId, $zoneId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Container_ListClustersResponse");
    }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_ProjectsZonesOperations_Resource extends Google_Service_Resource
{

    /**
     * Gets the specified operation. (operations.get)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                            number.
     * @param string $zoneId The name of the Google Compute Engine zone in which the
     *                            operation resides. This is always the same zone as the cluster with which the
     *                            operation is associated.
     * @param string $operationId The server-assigned name of the operation.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($projectId, $zoneId, $operationId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId, 'operationId' => $operationId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Container_Operation");
    }

    /**
     * Lists all operations in a project in a specific zone.
     * (operations.listProjectsZonesOperations)
     *
     * @param string $projectId The Google Developers Console project ID or  project
     *                          number.
     * @param string $zoneId The name of the Google Compute Engine zone to return
     *                          operations for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsZonesOperations($projectId, $zoneId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'zoneId' => $zoneId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Container_ListOperationsResponse");
    }
}

/**
 * The "tokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $tokens = $containerService->tokens;
 *  </code>
 */
class Google_Service_Container_ProjectsZonesTokens_Resource extends Google_Service_Resource
{

    /**
     * Gets a compute-rw scoped OAuth2 access token for . Authentication is
     * performed to ensure that the caller is a member of  and that the request is
     * coming from the expected master VM for the specified cluster. See go/gke-
     * cross-project-auth for more details. (tokens.get)
     *
     * @param string $masterProjectId The hosted master project from which this
     *                                request is coming.
     * @param string $zoneId The zone of the specified cluster.
     * @param string $projectNumber The project number for which the access token is
     *                                being requested.
     * @param string $clusterName The name of the specified cluster.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($masterProjectId, $zoneId, $projectNumber, $clusterName, $optParams = [])
    {
        $params = ['masterProjectId' => $masterProjectId, 'zoneId' => $zoneId, 'projectNumber' => $projectNumber, 'clusterName' => $clusterName];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Container_Token");
    }
}


/**
 * Class Google_Service_Container_Cluster
 */
class Google_Service_Container_Cluster extends Google_Model
{
    public $clusterApiVersion;
    public $containerIpv4Cidr;
    public $creationTimestamp;
    public $description;
    public $enableCloudLogging;
    public $endpoint;
    public $name;
    public $network;
    public $nodeRoutingPrefixSize;
    public $numNodes;
    public $selfLink;
    public $servicesIpv4Cidr;
    public $status;
    public $statusMessage;
    public $zone;
    protected $internal_gapi_mappings = [];
    protected $masterAuthType = 'Google_Service_Container_MasterAuth';
    protected $masterAuthDataType = '';
    protected $nodeConfigType = 'Google_Service_Container_NodeConfig';
    protected $nodeConfigDataType = '';

    /**
     * @return mixed
     */
    public function getClusterApiVersion()
    {
        return $this->clusterApiVersion;
    }

    /**
     * @param $clusterApiVersion
     */
    public function setClusterApiVersion($clusterApiVersion)
    {
        $this->clusterApiVersion = $clusterApiVersion;
    }

    /**
     * @return mixed
     */
    public function getContainerIpv4Cidr()
    {
        return $this->containerIpv4Cidr;
    }

    /**
     * @param $containerIpv4Cidr
     */
    public function setContainerIpv4Cidr($containerIpv4Cidr)
    {
        $this->containerIpv4Cidr = $containerIpv4Cidr;
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
    public function getEnableCloudLogging()
    {
        return $this->enableCloudLogging;
    }

    /**
     * @param $enableCloudLogging
     */
    public function setEnableCloudLogging($enableCloudLogging)
    {
        $this->enableCloudLogging = $enableCloudLogging;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param Google_Service_Container_MasterAuth $masterAuth
     */
    public function setMasterAuth(Google_Service_Container_MasterAuth $masterAuth)
    {
        $this->masterAuth = $masterAuth;
    }

    /**
     * @return mixed
     */
    public function getMasterAuth()
    {
        return $this->masterAuth;
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
     * @param Google_Service_Container_NodeConfig $nodeConfig
     */
    public function setNodeConfig(Google_Service_Container_NodeConfig $nodeConfig)
    {
        $this->nodeConfig = $nodeConfig;
    }

    /**
     * @return mixed
     */
    public function getNodeConfig()
    {
        return $this->nodeConfig;
    }

    /**
     * @return mixed
     */
    public function getNodeRoutingPrefixSize()
    {
        return $this->nodeRoutingPrefixSize;
    }

    /**
     * @param $nodeRoutingPrefixSize
     */
    public function setNodeRoutingPrefixSize($nodeRoutingPrefixSize)
    {
        $this->nodeRoutingPrefixSize = $nodeRoutingPrefixSize;
    }

    /**
     * @return mixed
     */
    public function getNumNodes()
    {
        return $this->numNodes;
    }

    /**
     * @param $numNodes
     */
    public function setNumNodes($numNodes)
    {
        $this->numNodes = $numNodes;
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
    public function getServicesIpv4Cidr()
    {
        return $this->servicesIpv4Cidr;
    }

    /**
     * @param $servicesIpv4Cidr
     */
    public function setServicesIpv4Cidr($servicesIpv4Cidr)
    {
        $this->servicesIpv4Cidr = $servicesIpv4Cidr;
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
 * Class Google_Service_Container_CreateClusterRequest
 */
class Google_Service_Container_CreateClusterRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $clusterType = 'Google_Service_Container_Cluster';
    protected $clusterDataType = '';


    /**
     * @param Google_Service_Container_Cluster $cluster
     */
    public function setCluster(Google_Service_Container_Cluster $cluster)
    {
        $this->cluster = $cluster;
    }

    /**
     * @return mixed
     */
    public function getCluster()
    {
        return $this->cluster;
    }
}

/**
 * Class Google_Service_Container_ListAggregatedClustersResponse
 */
class Google_Service_Container_ListAggregatedClustersResponse extends Google_Collection
{
    protected $collection_key = 'clusters';
    protected $internal_gapi_mappings = [];
    protected $clustersType = 'Google_Service_Container_Cluster';
    protected $clustersDataType = 'array';


    /**
     * @param $clusters
     */
    public function setClusters($clusters)
    {
        $this->clusters = $clusters;
    }

    /**
     * @return mixed
     */
    public function getClusters()
    {
        return $this->clusters;
    }
}

/**
 * Class Google_Service_Container_ListAggregatedOperationsResponse
 */
class Google_Service_Container_ListAggregatedOperationsResponse extends Google_Collection
{
    protected $collection_key = 'operations';
    protected $internal_gapi_mappings = [];
    protected $operationsType = 'Google_Service_Container_Operation';
    protected $operationsDataType = 'array';


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
 * Class Google_Service_Container_ListClustersResponse
 */
class Google_Service_Container_ListClustersResponse extends Google_Collection
{
    protected $collection_key = 'clusters';
    protected $internal_gapi_mappings = [];
    protected $clustersType = 'Google_Service_Container_Cluster';
    protected $clustersDataType = 'array';


    /**
     * @param $clusters
     */
    public function setClusters($clusters)
    {
        $this->clusters = $clusters;
    }

    /**
     * @return mixed
     */
    public function getClusters()
    {
        return $this->clusters;
    }
}

/**
 * Class Google_Service_Container_ListOperationsResponse
 */
class Google_Service_Container_ListOperationsResponse extends Google_Collection
{
    protected $collection_key = 'operations';
    protected $internal_gapi_mappings = [];
    protected $operationsType = 'Google_Service_Container_Operation';
    protected $operationsDataType = 'array';


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
 * Class Google_Service_Container_MasterAuth
 */
class Google_Service_Container_MasterAuth extends Google_Model
{
    public $bearerToken;
    public $password;
    public $user;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBearerToken()
    {
        return $this->bearerToken;
    }

    /**
     * @param $bearerToken
     */
    public function setBearerToken($bearerToken)
    {
        $this->bearerToken = $bearerToken;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
 * Class Google_Service_Container_NodeConfig
 */
class Google_Service_Container_NodeConfig extends Google_Collection
{
    public $machineType;
    public $sourceImage;
    protected $collection_key = 'serviceAccounts';
    protected $internal_gapi_mappings = [];
    protected $serviceAccountsType = 'Google_Service_Container_ServiceAccount';
    protected $serviceAccountsDataType = 'array';

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
 * Class Google_Service_Container_Operation
 */
class Google_Service_Container_Operation extends Google_Model
{
    public $errorMessage;
    public $name;
    public $operationType;
    public $selfLink;
    public $status;
    public $target;
    public $targetLink;
    public $zone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
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
 * Class Google_Service_Container_ServiceAccount
 */
class Google_Service_Container_ServiceAccount extends Google_Collection
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
 * Class Google_Service_Container_Token
 */
class Google_Service_Container_Token extends Google_Model
{
    public $accessToken;
    public $expiryTimeSeconds;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getExpiryTimeSeconds()
    {
        return $this->expiryTimeSeconds;
    }

    /**
     * @param $expiryTimeSeconds
     */
    public function setExpiryTimeSeconds($expiryTimeSeconds)
    {
        $this->expiryTimeSeconds = $expiryTimeSeconds;
    }
}
