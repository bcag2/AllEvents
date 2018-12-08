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
 * Service definition for Replicapool (v1beta2).
 *
 * <p>
 * The Google Compute Engine Instance Group Manager API provides groups of
 * homogenous Compute Engine Instances.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/docs/instance-groups/manager/v1beta2" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Replicapool extends Google_Service
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

    public $instanceGroupManagers;
    public $zoneOperations;


    /**
     * Constructs the internal representation of the Replicapool service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'replicapool/v1beta2/projects/';
        $this->version = 'v1beta2';
        $this->serviceName = 'replicapool';

        $this->instanceGroupManagers = new Google_Service_Replicapool_InstanceGroupManagers_Resource(
            $this,
            $this->serviceName,
            'instanceGroupManagers',
            [
                'methods' => [
                    'abandonInstances' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/abandonInstances',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'deleteInstances' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/deleteInstances',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers',
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
                            'size' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers',
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
                    ], 'recreateInstances' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/recreateInstances',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resize' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/resize',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'size' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'setInstanceTemplate' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/setInstanceTemplate',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setTargetPools' => [
                        'path' => '{project}/zones/{zone}/instanceGroupManagers/{instanceGroupManager}/setTargetPools',
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
                            'instanceGroupManager' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->zoneOperations = new Google_Service_Replicapool_ZoneOperations_Resource(
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
    }
}


/**
 * The "instanceGroupManagers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $instanceGroupManagers = $replicapoolService->instanceGroupManagers;
 *  </code>
 */
class Google_Service_Replicapool_InstanceGroupManagers_Resource extends Google_Service_Resource
{

    /**
     * Removes the specified instances from the managed instance group, and from any
     * target pools of which they were members, without deleting the instances.
     * (instanceGroupManagers.abandonInstances)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                                                                                          resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param Google_InstanceGroupManagersAbandonInstancesRequest|Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function abandonInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('abandonInstances', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Deletes the instance group manager and all instances contained within. If
     * you'd like to delete the manager without deleting the instances, you must
     * first abandon the instances to remove them from the group.
     * (instanceGroupManagers.delete)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                     resides.
     * @param string $instanceGroupManager Name of the Instance Group Manager
     *                                     resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $zone, $instanceGroupManager, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Deletes the specified instances. The instances are deleted, then removed from
     * the instance group and any target pools of which they were a member. The
     * targetSize of the instance group manager is reduced by the number of
     * instances deleted. (instanceGroupManagers.deleteInstances)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                                                                                        resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param Google_InstanceGroupManagersDeleteInstancesRequest|Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function deleteInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('deleteInstances', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Returns the specified Instance Group Manager resource.
     * (instanceGroupManagers.get)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                     resides.
     * @param string $instanceGroupManager Name of the instance resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $zone, $instanceGroupManager, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Replicapool_InstanceGroupManager");
    }

    /**
     * Creates an instance group manager, as well as the instance group and the
     * specified number of instances. (instanceGroupManagers.insert)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                               resides.
     * @param int $size Number of instances that should exist.
     * @param Google_InstanceGroupManager|Google_Service_Replicapool_InstanceGroupManager $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $zone, $size, Google_Service_Replicapool_InstanceGroupManager $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'size' => $size, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Retrieves the list of Instance Group Manager resources contained within the
     * specified zone. (instanceGroupManagers.listInstanceGroupManagers)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                          resides.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     */
    public function listInstanceGroupManagers($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Replicapool_InstanceGroupManagerList");
    }

    /**
     * Recreates the specified instances. The instances are deleted, then recreated
     * using the instance group manager's current instance template.
     * (instanceGroupManagers.recreateInstances)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                                                                                            resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param Google_InstanceGroupManagersRecreateInstancesRequest|Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function recreateInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('recreateInstances', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Resizes the managed instance group up or down. If resized up, new instances
     * are created using the current instance template. If resized down, instances
     * are removed in the order outlined in Resizing a managed instance group.
     * (instanceGroupManagers.resize)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                     resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param int $size Number of instances that should exist in this Instance Group
     *                                     Manager.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function resize($project, $zone, $instanceGroupManager, $size, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'size' => $size];
        $params = array_merge($params, $optParams);

        return $this->call('resize', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Sets the instance template to use when creating new instances in this group.
     * Existing instances are not affected.
     * (instanceGroupManagers.setInstanceTemplate)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                                                                                                resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param Google_InstanceGroupManagersSetInstanceTemplateRequest|Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function setInstanceTemplate($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setInstanceTemplate', [$params], "Google_Service_Replicapool_Operation");
    }

    /**
     * Modifies the target pools to which all new instances in this group are
     * assigned. Existing instances in the group are not affected.
     * (instanceGroupManagers.setTargetPools)
     *
     * @param string $project The Google Developers Console project name.
     * @param string $zone The name of the zone in which the instance group manager
     *                                                                                                                                                      resides.
     * @param string $instanceGroupManager The name of the instance group manager.
     * @param Google_InstanceGroupManagersSetTargetPoolsRequest|Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function setTargetPools($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setTargetPools', [$params], "Google_Service_Replicapool_Operation");
    }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $zoneOperations = $replicapoolService->zoneOperations;
 *  </code>
 */
class Google_Service_Replicapool_ZoneOperations_Resource extends Google_Service_Resource
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

        return $this->call('get', [$params], "Google_Service_Replicapool_Operation");
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
     * @throws Google_Exception
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

        return $this->call('list', [$params], "Google_Service_Replicapool_OperationList");
    }
}


/**
 * Class Google_Service_Replicapool_InstanceGroupManager
 */
class Google_Service_Replicapool_InstanceGroupManager extends Google_Collection
{
    public $baseInstanceName;
    public $creationTimestamp;
    public $currentSize;
    public $description;
    public $fingerprint;
    public $group;
    public $id;
    public $instanceTemplate;
    public $kind;
    public $name;
    public $selfLink;
    public $targetPools;
    public $targetSize;
    protected $collection_key = 'targetPools';
    protected $internal_gapi_mappings = [];

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
    public function getCurrentSize()
    {
        return $this->currentSize;
    }

    /**
     * @param $currentSize
     */
    public function setCurrentSize($currentSize)
    {
        $this->currentSize = $currentSize;
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
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
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
    public function getTargetPools()
    {
        return $this->targetPools;
    }

    /**
     * @param $targetPools
     */
    public function setTargetPools($targetPools)
    {
        $this->targetPools = $targetPools;
    }

    /**
     * @return mixed
     */
    public function getTargetSize()
    {
        return $this->targetSize;
    }

    /**
     * @param $targetSize
     */
    public function setTargetSize($targetSize)
    {
        $this->targetSize = $targetSize;
    }
}

/**
 * Class Google_Service_Replicapool_InstanceGroupManagerList
 */
class Google_Service_Replicapool_InstanceGroupManagerList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Replicapool_InstanceGroupManager';
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
 * Class Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest
 */
class Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest extends Google_Collection
{
    public $instances;
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }
}

/**
 * Class Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest
 */
class Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest extends Google_Collection
{
    public $instances;
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }
}

/**
 * Class Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest
 */
class Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest extends Google_Collection
{
    public $instances;
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }
}

/**
 * Class Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest
 */
class Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest extends Google_Model
{
    public $instanceTemplate;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest
 */
class Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest extends Google_Collection
{
    public $fingerprint;
    public $targetPools;
    protected $collection_key = 'targetPools';
    protected $internal_gapi_mappings = [];

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
    public function getTargetPools()
    {
        return $this->targetPools;
    }

    /**
     * @param $targetPools
     */
    public function setTargetPools($targetPools)
    {
        $this->targetPools = $targetPools;
    }
}

/**
 * Class Google_Service_Replicapool_Operation
 */
class Google_Service_Replicapool_Operation extends Google_Collection
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
    protected $errorType = 'Google_Service_Replicapool_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Replicapool_OperationWarnings';
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
     * @param Google_Service_Replicapool_OperationError $error
     */
    public function setError(Google_Service_Replicapool_OperationError $error)
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
 * Class Google_Service_Replicapool_OperationError
 */
class Google_Service_Replicapool_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Replicapool_OperationErrorErrors';
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
 * Class Google_Service_Replicapool_OperationErrorErrors
 */
class Google_Service_Replicapool_OperationErrorErrors extends Google_Model
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
 * Class Google_Service_Replicapool_OperationList
 */
class Google_Service_Replicapool_OperationList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Replicapool_Operation';
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
 * Class Google_Service_Replicapool_OperationWarnings
 */
class Google_Service_Replicapool_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Replicapool_OperationWarningsData';
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
 * Class Google_Service_Replicapool_OperationWarningsData
 */
class Google_Service_Replicapool_OperationWarningsData extends Google_Model
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
