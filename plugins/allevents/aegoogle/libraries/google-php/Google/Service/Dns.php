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
 * Service definition for Dns (v1).
 *
 * <p>
 * The Google Cloud DNS API provides services for configuring and serving
 * authoritative DNS records.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-dns" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dns extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View your DNS records hosted by Google Cloud DNS. */
    const NDEV_CLOUDDNS_READONLY =
        "https://www.googleapis.com/auth/ndev.clouddns.readonly";
    /** View and manage your DNS records hosted by Google Cloud DNS. */
    const NDEV_CLOUDDNS_READWRITE =
        "https://www.googleapis.com/auth/ndev.clouddns.readwrite";

    public $changes;
    public $managedZones;
    public $projects;
    public $resourceRecordSets;


    /**
     * Constructs the internal representation of the Dns service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'dns/v1/projects/';
        $this->version = 'v1';
        $this->serviceName = 'dns';

        $this->changes = new Google_Service_Dns_Changes_Resource(
            $this,
            $this->serviceName,
            'changes',
            [
                'methods' => [
                    'create' => [
                        'path' => '{project}/managedZones/{managedZone}/changes',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/managedZones/{managedZone}/changes/{changeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'changeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/managedZones/{managedZone}/changes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->managedZones = new Google_Service_Dns_ManagedZones_Resource(
            $this,
            $this->serviceName,
            'managedZones',
            [
                'methods' => [
                    'create' => [
                        'path' => '{project}/managedZones',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/managedZones/{managedZone}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/managedZones/{managedZone}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/managedZones',
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
        $this->projects = new Google_Service_Dns_Projects_Resource(
            $this,
            $this->serviceName,
            'projects',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->resourceRecordSets = new Google_Service_Dns_ResourceRecordSets_Resource(
            $this,
            $this->serviceName,
            'resourceRecordSets',
            [
                'methods' => [
                    'list' => [
                        'path' => '{project}/managedZones/{managedZone}/rrsets',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedZone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'name' => [
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
                            'type' => [
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
 * The "changes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $changes = $dnsService->changes;
 *  </code>
 */
class Google_Service_Dns_Changes_Resource extends Google_Service_Resource
{

    /**
     * Atomically update the ResourceRecordSet collection. (changes.create)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                                                             request. Can be the managed zone name or id.
     * @param Google_Change|Google_Service_Dns_Change $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create($project, $managedZone, Google_Service_Dns_Change $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Dns_Change");
    }

    /**
     * Fetch the representation of an existing Change. (changes.get)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                            request. Can be the managed zone name or id.
     * @param string $changeId The identifier of the requested change, from a
     *                            previous ResourceRecordSetsChangeResponse.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $managedZone, $changeId, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone, 'changeId' => $changeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dns_Change");
    }

    /**
     * Enumerate Changes to a ResourceRecordSet collection. (changes.listChanges)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                            request. Can be the managed zone name or id.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int maxResults Optional. Maximum number of results to be returned.
     * If unspecified, the server will decide how many results to return.
     * @opt_param string pageToken Optional. A tag returned by a previous list
     * request that was truncated. Use this parameter to continue a previous list
     * request.
     * @opt_param string sortBy Sorting criterion. The only supported value is
     * change sequence.
     * @opt_param string sortOrder Sorting order direction: 'ascending' or
     * 'descending'.
     */
    public function listChanges($project, $managedZone, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dns_ChangesListResponse");
    }
}

/**
 * The "managedZones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $managedZones = $dnsService->managedZones;
 *  </code>
 */
class Google_Service_Dns_ManagedZones_Resource extends Google_Service_Resource
{

    /**
     * Create a new ManagedZone. (managedZones.create)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param Google_ManagedZone|Google_Service_Dns_ManagedZone $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create($project, Google_Service_Dns_ManagedZone $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Dns_ManagedZone");
    }

    /**
     * Delete a previously created ManagedZone. (managedZones.delete)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                            request. Can be the managed zone name or id.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $managedZone, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Fetch the representation of an existing ManagedZone. (managedZones.get)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                            request. Can be the managed zone name or id.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $managedZone, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dns_ManagedZone");
    }

    /**
     * Enumerate ManagedZones that have been created but not yet deleted.
     * (managedZones.listManagedZones)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Optional. A tag returned by a previous list
     * request that was truncated. Use this parameter to continue a previous list
     * request.
     * @opt_param int maxResults Optional. Maximum number of results to be returned.
     * If unspecified, the server will decide how many results to return.
     */
    public function listManagedZones($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dns_ManagedZonesListResponse");
    }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $projects = $dnsService->projects;
 *  </code>
 */
class Google_Service_Dns_Projects_Resource extends Google_Service_Resource
{

    /**
     * Fetch the representation of an existing Project. (projects.get)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dns_Project");
    }
}

/**
 * The "resourceRecordSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $resourceRecordSets = $dnsService->resourceRecordSets;
 *  </code>
 */
class Google_Service_Dns_ResourceRecordSets_Resource extends Google_Service_Resource
{

    /**
     * Enumerate ResourceRecordSets that have been created but not yet deleted.
     * (resourceRecordSets.listResourceRecordSets)
     *
     * @param string $project Identifies the project addressed by this request.
     * @param string $managedZone Identifies the managed zone addressed by this
     *                            request. Can be the managed zone name or id.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string name Restricts the list to return only records with this
     * fully qualified domain name.
     * @opt_param int maxResults Optional. Maximum number of results to be returned.
     * If unspecified, the server will decide how many results to return.
     * @opt_param string pageToken Optional. A tag returned by a previous list
     * request that was truncated. Use this parameter to continue a previous list
     * request.
     * @opt_param string type Restricts the list to return only records of this
     * type. If present, the "name" parameter must also be present.
     */
    public function listResourceRecordSets($project, $managedZone, $optParams = [])
    {
        $params = ['project' => $project, 'managedZone' => $managedZone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dns_ResourceRecordSetsListResponse");
    }
}


/**
 * Class Google_Service_Dns_Change
 */
class Google_Service_Dns_Change extends Google_Collection
{
    public $id;
    public $kind;
    public $startTime;
    public $status;
    protected $collection_key = 'deletions';
    protected $internal_gapi_mappings = [];
    protected $additionsType = 'Google_Service_Dns_ResourceRecordSet';
    protected $additionsDataType = 'array';
    protected $deletionsType = 'Google_Service_Dns_ResourceRecordSet';
    protected $deletionsDataType = 'array';

    /**
     * @param $additions
     */
    public function setAdditions($additions)
    {
        $this->additions = $additions;
    }

    /**
     * @return mixed
     */
    public function getAdditions()
    {
        return $this->additions;
    }

    /**
     * @param $deletions
     */
    public function setDeletions($deletions)
    {
        $this->deletions = $deletions;
    }

    /**
     * @return mixed
     */
    public function getDeletions()
    {
        return $this->deletions;
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
}

/**
 * Class Google_Service_Dns_ChangesListResponse
 */
class Google_Service_Dns_ChangesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'changes';
    protected $internal_gapi_mappings = [];
    protected $changesType = 'Google_Service_Dns_Change';
    protected $changesDataType = 'array';

    /**
     * @param $changes
     */
    public function setChanges($changes)
    {
        $this->changes = $changes;
    }

    /**
     * @return mixed
     */
    public function getChanges()
    {
        return $this->changes;
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
 * Class Google_Service_Dns_ManagedZone
 */
class Google_Service_Dns_ManagedZone extends Google_Collection
{
    public $creationTime;
    public $description;
    public $dnsName;
    public $id;
    public $kind;
    public $name;
    public $nameServerSet;
    public $nameServers;
    protected $collection_key = 'nameServers';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
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
    public function getDnsName()
    {
        return $this->dnsName;
    }

    /**
     * @param $dnsName
     */
    public function setDnsName($dnsName)
    {
        $this->dnsName = $dnsName;
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
    public function getNameServerSet()
    {
        return $this->nameServerSet;
    }

    /**
     * @param $nameServerSet
     */
    public function setNameServerSet($nameServerSet)
    {
        $this->nameServerSet = $nameServerSet;
    }

    /**
     * @return mixed
     */
    public function getNameServers()
    {
        return $this->nameServers;
    }

    /**
     * @param $nameServers
     */
    public function setNameServers($nameServers)
    {
        $this->nameServers = $nameServers;
    }
}

/**
 * Class Google_Service_Dns_ManagedZonesListResponse
 */
class Google_Service_Dns_ManagedZonesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'managedZones';
    protected $internal_gapi_mappings = [];
    protected $managedZonesType = 'Google_Service_Dns_ManagedZone';
    protected $managedZonesDataType = 'array';

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
     * @param $managedZones
     */
    public function setManagedZones($managedZones)
    {
        $this->managedZones = $managedZones;
    }

    /**
     * @return mixed
     */
    public function getManagedZones()
    {
        return $this->managedZones;
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
 * Class Google_Service_Dns_Project
 */
class Google_Service_Dns_Project extends Google_Model
{
    public $id;
    public $kind;
    public $number;
    protected $internal_gapi_mappings = [];
    protected $quotaType = 'Google_Service_Dns_Quota';
    protected $quotaDataType = '';

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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @param Google_Service_Dns_Quota $quota
     */
    public function setQuota(Google_Service_Dns_Quota $quota)
    {
        $this->quota = $quota;
    }

    /**
     * @return mixed
     */
    public function getQuota()
    {
        return $this->quota;
    }
}

/**
 * Class Google_Service_Dns_Quota
 */
class Google_Service_Dns_Quota extends Google_Model
{
    public $kind;
    public $managedZones;
    public $resourceRecordsPerRrset;
    public $rrsetAdditionsPerChange;
    public $rrsetDeletionsPerChange;
    public $rrsetsPerManagedZone;
    public $totalRrdataSizePerChange;
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
    public function getManagedZones()
    {
        return $this->managedZones;
    }

    /**
     * @param $managedZones
     */
    public function setManagedZones($managedZones)
    {
        $this->managedZones = $managedZones;
    }

    /**
     * @return mixed
     */
    public function getResourceRecordsPerRrset()
    {
        return $this->resourceRecordsPerRrset;
    }

    /**
     * @param $resourceRecordsPerRrset
     */
    public function setResourceRecordsPerRrset($resourceRecordsPerRrset)
    {
        $this->resourceRecordsPerRrset = $resourceRecordsPerRrset;
    }

    /**
     * @return mixed
     */
    public function getRrsetAdditionsPerChange()
    {
        return $this->rrsetAdditionsPerChange;
    }

    /**
     * @param $rrsetAdditionsPerChange
     */
    public function setRrsetAdditionsPerChange($rrsetAdditionsPerChange)
    {
        $this->rrsetAdditionsPerChange = $rrsetAdditionsPerChange;
    }

    /**
     * @return mixed
     */
    public function getRrsetDeletionsPerChange()
    {
        return $this->rrsetDeletionsPerChange;
    }

    /**
     * @param $rrsetDeletionsPerChange
     */
    public function setRrsetDeletionsPerChange($rrsetDeletionsPerChange)
    {
        $this->rrsetDeletionsPerChange = $rrsetDeletionsPerChange;
    }

    /**
     * @return mixed
     */
    public function getRrsetsPerManagedZone()
    {
        return $this->rrsetsPerManagedZone;
    }

    /**
     * @param $rrsetsPerManagedZone
     */
    public function setRrsetsPerManagedZone($rrsetsPerManagedZone)
    {
        $this->rrsetsPerManagedZone = $rrsetsPerManagedZone;
    }

    /**
     * @return mixed
     */
    public function getTotalRrdataSizePerChange()
    {
        return $this->totalRrdataSizePerChange;
    }

    /**
     * @param $totalRrdataSizePerChange
     */
    public function setTotalRrdataSizePerChange($totalRrdataSizePerChange)
    {
        $this->totalRrdataSizePerChange = $totalRrdataSizePerChange;
    }
}

/**
 * Class Google_Service_Dns_ResourceRecordSet
 */
class Google_Service_Dns_ResourceRecordSet extends Google_Collection
{
    public $kind;
    public $name;
    public $rrdatas;
    public $ttl;
    public $type;
    protected $collection_key = 'rrdatas';
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
    public function getRrdatas()
    {
        return $this->rrdatas;
    }

    /**
     * @param $rrdatas
     */
    public function setRrdatas($rrdatas)
    {
        $this->rrdatas = $rrdatas;
    }

    /**
     * @return mixed
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @param $ttl
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
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
 * Class Google_Service_Dns_ResourceRecordSetsListResponse
 */
class Google_Service_Dns_ResourceRecordSetsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'rrsets';
    protected $internal_gapi_mappings = [];
    protected $rrsetsType = 'Google_Service_Dns_ResourceRecordSet';
    protected $rrsetsDataType = 'array';

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
     * @param $rrsets
     */
    public function setRrsets($rrsets)
    {
        $this->rrsets = $rrsets;
    }

    /**
     * @return mixed
     */
    public function getRrsets()
    {
        return $this->rrsets;
    }
}
