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
 * Service definition for Compute (v1).
 *
 * <p>
 * API for the Google Compute Engine service.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/docs/reference/latest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Compute extends Google_Service
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
    /** Manage your data and permissions in Google Cloud Storage. */
    const DEVSTORAGE_FULL_CONTROL =
        "https://www.googleapis.com/auth/devstorage.full_control";
    /** View your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_ONLY =
        "https://www.googleapis.com/auth/devstorage.read_only";
    /** Manage your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_WRITE =
        "https://www.googleapis.com/auth/devstorage.read_write";

    public $addresses;
    public $backendServices;
    public $diskTypes;
    public $disks;
    public $firewalls;
    public $forwardingRules;
    public $globalAddresses;
    public $globalForwardingRules;
    public $globalOperations;
    public $httpHealthChecks;
    public $images;
    public $instanceTemplates;
    public $instances;
    public $licenses;
    public $machineTypes;
    public $networks;
    public $projects;
    public $regionOperations;
    public $regions;
    public $routes;
    public $snapshots;
    public $targetHttpProxies;
    public $targetInstances;
    public $targetPools;
    public $targetVpnGateways;
    public $urlMaps;
    public $vpnTunnels;
    public $zoneOperations;
    public $zones;


    /**
     * Constructs the internal representation of the Compute service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'compute/v1/projects/';
        $this->version = 'v1';
        $this->serviceName = 'compute';

        $this->addresses = new Google_Service_Compute_Addresses_Resource(
            $this,
            $this->serviceName,
            'addresses',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/addresses',
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
                    ], 'delete' => [
                        'path' => '{project}/regions/{region}/addresses/{address}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'address' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/regions/{region}/addresses/{address}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'address' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/regions/{region}/addresses',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions/{region}/addresses',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
        $this->backendServices = new Google_Service_Compute_BackendServices_Resource(
            $this,
            $this->serviceName,
            'backendServices',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/backendServices/{backendService}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'backendService' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/backendServices/{backendService}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'backendService' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getHealth' => [
                        'path' => '{project}/global/backendServices/{backendService}/getHealth',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'backendService' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/backendServices',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/backendServices',
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
                    ], 'patch' => [
                        'path' => '{project}/global/backendServices/{backendService}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'backendService' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/global/backendServices/{backendService}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'backendService' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->diskTypes = new Google_Service_Compute_DiskTypes_Resource(
            $this,
            $this->serviceName,
            'diskTypes',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/diskTypes',
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
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/diskTypes/{diskType}',
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
                            'diskType' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/diskTypes',
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
        $this->disks = new Google_Service_Compute_Disks_Resource(
            $this,
            $this->serviceName,
            'disks',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/disks',
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
                    ], 'createSnapshot' => [
                        'path' => '{project}/zones/{zone}/disks/{disk}/createSnapshot',
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
                            'disk' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/zones/{zone}/disks/{disk}',
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
                            'disk' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/disks/{disk}',
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
                            'disk' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/disks',
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
                            'sourceImage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/disks',
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
        $this->firewalls = new Google_Service_Compute_Firewalls_Resource(
            $this,
            $this->serviceName,
            'firewalls',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/firewalls/{firewall}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'firewall' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/firewalls/{firewall}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'firewall' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/firewalls',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/firewalls',
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
                    ], 'patch' => [
                        'path' => '{project}/global/firewalls/{firewall}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'firewall' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/global/firewalls/{firewall}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'firewall' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->forwardingRules = new Google_Service_Compute_ForwardingRules_Resource(
            $this,
            $this->serviceName,
            'forwardingRules',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/forwardingRules',
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
                    ], 'delete' => [
                        'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/regions/{region}/forwardingRules',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions/{region}/forwardingRules',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
                    ], 'setTarget' => [
                        'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}/setTarget',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->globalAddresses = new Google_Service_Compute_GlobalAddresses_Resource(
            $this,
            $this->serviceName,
            'globalAddresses',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/addresses/{address}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'address' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/addresses/{address}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'address' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/addresses',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/addresses',
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
        $this->globalForwardingRules = new Google_Service_Compute_GlobalForwardingRules_Resource(
            $this,
            $this->serviceName,
            'globalForwardingRules',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/forwardingRules/{forwardingRule}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/forwardingRules/{forwardingRule}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/forwardingRules',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/forwardingRules',
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
                    ], 'setTarget' => [
                        'path' => '{project}/global/forwardingRules/{forwardingRule}/setTarget',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'forwardingRule' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->globalOperations = new Google_Service_Compute_GlobalOperations_Resource(
            $this,
            $this->serviceName,
            'globalOperations',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/operations',
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
                    ], 'delete' => [
                        'path' => '{project}/global/operations/{operation}',
                        'httpMethod' => 'DELETE',
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
                    ], 'get' => [
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
        $this->httpHealthChecks = new Google_Service_Compute_HttpHealthChecks_Resource(
            $this,
            $this->serviceName,
            'httpHealthChecks',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'httpHealthCheck' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'httpHealthCheck' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/httpHealthChecks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/httpHealthChecks',
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
                    ], 'patch' => [
                        'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'httpHealthCheck' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'httpHealthCheck' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->images = new Google_Service_Compute_Images_Resource(
            $this,
            $this->serviceName,
            'images',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/images/{image}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'image' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'deprecate' => [
                        'path' => '{project}/global/images/{image}/deprecate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'image' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/images/{image}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'image' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/images',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/images',
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
        $this->instanceTemplates = new Google_Service_Compute_InstanceTemplates_Resource(
            $this,
            $this->serviceName,
            'instanceTemplates',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/instanceTemplates/{instanceTemplate}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instanceTemplate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/instanceTemplates/{instanceTemplate}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instanceTemplate' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/instanceTemplates',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/instanceTemplates',
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
        $this->instances = new Google_Service_Compute_Instances_Resource(
            $this,
            $this->serviceName,
            'instances',
            [
                'methods' => [
                    'addAccessConfig' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/addAccessConfig',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'networkInterface' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'aggregatedList' => [
                        'path' => '{project}/aggregated/instances',
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
                    ], 'attachDisk' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/attachDisk',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'deleteAccessConfig' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/deleteAccessConfig',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accessConfig' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'networkInterface' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'detachDisk' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/detachDisk',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deviceName' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getSerialPortOutput' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/serialPort',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'port' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/instances',
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
                        'path' => '{project}/zones/{zone}/instances',
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
                    ], 'reset' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/reset',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setDiskAutoDelete' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/setDiskAutoDelete',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'autoDelete' => [
                                'location' => 'query',
                                'type' => 'boolean',
                                'required' => true,
                            ],
                            'deviceName' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setMetadata' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/setMetadata',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setScheduling' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/setScheduling',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setTags' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/setTags',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'start' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/start',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'stop' => [
                        'path' => '{project}/zones/{zone}/instances/{instance}/stop',
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
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->licenses = new Google_Service_Compute_Licenses_Resource(
            $this,
            $this->serviceName,
            'licenses',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/global/licenses/{license}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'license' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->machineTypes = new Google_Service_Compute_MachineTypes_Resource(
            $this,
            $this->serviceName,
            'machineTypes',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/machineTypes',
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
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/machineTypes/{machineType}',
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
                            'machineType' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/zones/{zone}/machineTypes',
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
        $this->networks = new Google_Service_Compute_Networks_Resource(
            $this,
            $this->serviceName,
            'networks',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/networks/{network}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'network' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/networks/{network}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'network' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/networks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/networks',
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
        $this->projects = new Google_Service_Compute_Projects_Resource(
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
                    ], 'moveDisk' => [
                        'path' => '{project}/moveDisk',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'moveInstance' => [
                        'path' => '{project}/moveInstance',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setCommonInstanceMetadata' => [
                        'path' => '{project}/setCommonInstanceMetadata',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setUsageExportBucket' => [
                        'path' => '{project}/setUsageExportBucket',
                        'httpMethod' => 'POST',
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
        $this->regionOperations = new Google_Service_Compute_RegionOperations_Resource(
            $this,
            $this->serviceName,
            'regionOperations',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/regions/{region}/operations/{operation}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
                        'path' => '{project}/regions/{region}/operations/{operation}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
                        'path' => '{project}/regions/{region}/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
        $this->regions = new Google_Service_Compute_Regions_Resource(
            $this,
            $this->serviceName,
            'regions',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/regions/{region}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions',
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
        $this->routes = new Google_Service_Compute_Routes_Resource(
            $this,
            $this->serviceName,
            'routes',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/routes/{route}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'route' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/routes/{route}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'route' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/routes',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/routes',
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
        $this->snapshots = new Google_Service_Compute_Snapshots_Resource(
            $this,
            $this->serviceName,
            'snapshots',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/snapshots/{snapshot}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'snapshot' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/snapshots/{snapshot}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'snapshot' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/snapshots',
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
        $this->targetHttpProxies = new Google_Service_Compute_TargetHttpProxies_Resource(
            $this,
            $this->serviceName,
            'targetHttpProxies',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/targetHttpProxies/{targetHttpProxy}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetHttpProxy' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/targetHttpProxies/{targetHttpProxy}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetHttpProxy' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/targetHttpProxies',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/targetHttpProxies',
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
                    ], 'setUrlMap' => [
                        'path' => '{project}/targetHttpProxies/{targetHttpProxy}/setUrlMap',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetHttpProxy' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->targetInstances = new Google_Service_Compute_TargetInstances_Resource(
            $this,
            $this->serviceName,
            'targetInstances',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/targetInstances',
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
                    ], 'delete' => [
                        'path' => '{project}/zones/{zone}/targetInstances/{targetInstance}',
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
                            'targetInstance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/zones/{zone}/targetInstances/{targetInstance}',
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
                            'targetInstance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/zones/{zone}/targetInstances',
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
                        'path' => '{project}/zones/{zone}/targetInstances',
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
        $this->targetPools = new Google_Service_Compute_TargetPools_Resource(
            $this,
            $this->serviceName,
            'targetPools',
            [
                'methods' => [
                    'addHealthCheck' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/addHealthCheck',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'addInstance' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/addInstance',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'aggregatedList' => [
                        'path' => '{project}/aggregated/targetPools',
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
                    ], 'delete' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getHealth' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/getHealth',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/regions/{region}/targetPools',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions/{region}/targetPools',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
                    ], 'removeHealthCheck' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/removeHealthCheck',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'removeInstance' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/removeInstance',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setBackup' => [
                        'path' => '{project}/regions/{region}/targetPools/{targetPool}/setBackup',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetPool' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'failoverRatio' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->targetVpnGateways = new Google_Service_Compute_TargetVpnGateways_Resource(
            $this,
            $this->serviceName,
            'targetVpnGateways',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/targetVpnGateways',
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
                    ], 'delete' => [
                        'path' => '{project}/regions/{region}/targetVpnGateways/{targetVpnGateway}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetVpnGateway' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/regions/{region}/targetVpnGateways/{targetVpnGateway}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'targetVpnGateway' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/regions/{region}/targetVpnGateways',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions/{region}/targetVpnGateways',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
        $this->urlMaps = new Google_Service_Compute_UrlMaps_Resource(
            $this,
            $this->serviceName,
            'urlMaps',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/urlMaps/{urlMap}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlMap' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/urlMaps/{urlMap}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlMap' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/urlMaps',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/urlMaps',
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
                    ], 'patch' => [
                        'path' => '{project}/global/urlMaps/{urlMap}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlMap' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/global/urlMaps/{urlMap}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlMap' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'validate' => [
                        'path' => '{project}/global/urlMaps/{urlMap}/validate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlMap' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->vpnTunnels = new Google_Service_Compute_VpnTunnels_Resource(
            $this,
            $this->serviceName,
            'vpnTunnels',
            [
                'methods' => [
                    'aggregatedList' => [
                        'path' => '{project}/aggregated/vpnTunnels',
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
                    ], 'delete' => [
                        'path' => '{project}/regions/{region}/vpnTunnels/{vpnTunnel}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'vpnTunnel' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/regions/{region}/vpnTunnels/{vpnTunnel}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'vpnTunnel' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/regions/{region}/vpnTunnels',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => '{project}/regions/{region}/vpnTunnels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'region' => [
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
        $this->zoneOperations = new Google_Service_Compute_ZoneOperations_Resource(
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
        $this->zones = new Google_Service_Compute_Zones_Resource(
            $this,
            $this->serviceName,
            'zones',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/zones/{zone}',
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
                        ],
                    ], 'list' => [
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
 * The "addresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $addresses = $computeService->addresses;
 *  </code>
 */
class Google_Service_Compute_Addresses_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of addresses grouped by scope. (addresses.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_AddressAggregatedList");
    }

    /**
     * Deletes the specified address resource. (addresses.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $address Name of the address resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $region, $address, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'address' => $address];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified address resource. (addresses.get)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $address Name of the address resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $region, $address, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'address' => $address];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Address");
    }

    /**
     * Creates an address resource in the specified project using the data included
     * in the request. (addresses.insert)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param Google_Address|Google_Service_Compute_Address $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $region, Google_Service_Compute_Address $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of address resources contained within the specified
     * region. (addresses.listAddresses)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
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
    public function listAddresses($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_AddressList");
    }
}

/**
 * The "backendServices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $backendServices = $computeService->backendServices;
 *  </code>
 */
class Google_Service_Compute_BackendServices_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified BackendService resource. (backendServices.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $backendService Name of the BackendService resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $backendService, $optParams = [])
    {
        $params = ['project' => $project, 'backendService' => $backendService];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified BackendService resource. (backendServices.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $backendService Name of the BackendService resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $backendService, $optParams = [])
    {
        $params = ['project' => $project, 'backendService' => $backendService];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_BackendService");
    }

    /**
     * Gets the most recent health check results for this BackendService.
     * (backendServices.getHealth)
     *
     * @param string $project
     * @param string $backendService Name of the BackendService resource to which
     *                                                                                                    the queried instance belongs.
     * @param Google_ResourceGroupReference|Google_Service_Compute_ResourceGroupReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getHealth($project, $backendService, Google_Service_Compute_ResourceGroupReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getHealth', [$params], "Google_Service_Compute_BackendServiceGroupHealth");
    }

    /**
     * Creates a BackendService resource in the specified project using the data
     * included in the request. (backendServices.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_BackendService|Google_Service_Compute_BackendService $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_BackendService $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of BackendService resources available to the specified
     * project. (backendServices.listBackendServices)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listBackendServices($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_BackendServiceList");
    }

    /**
     * Update the entire content of the BackendService resource. This method
     * supports patch semantics. (backendServices.patch)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $backendService Name of the BackendService resource to update.
     * @param Google_BackendService|Google_Service_Compute_BackendService $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $backendService, Google_Service_Compute_BackendService $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Update the entire content of the BackendService resource.
     * (backendServices.update)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $backendService Name of the BackendService resource to update.
     * @param Google_BackendService|Google_Service_Compute_BackendService $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $backendService, Google_Service_Compute_BackendService $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'backendService' => $backendService, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "diskTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $diskTypes = $computeService->diskTypes;
 *  </code>
 */
class Google_Service_Compute_DiskTypes_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of disk type resources grouped by scope.
     * (diskTypes.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_DiskTypeAggregatedList");
    }

    /**
     * Returns the specified disk type resource. (diskTypes.get)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $diskType Name of the disk type resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $diskType, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'diskType' => $diskType];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_DiskType");
    }

    /**
     * Retrieves the list of disk type resources available to the specified project.
     * (diskTypes.listDiskTypes)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
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
    public function listDiskTypes($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_DiskTypeList");
    }
}

/**
 * The "disks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $disks = $computeService->disks;
 *  </code>
 */
class Google_Service_Compute_Disks_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of disks grouped by scope. (disks.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_DiskAggregatedList");
    }

    /**
     * Creates a snapshot of this disk. (disks.createSnapshot)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $disk Name of the persistent disk to snapshot.
     * @param Google_Service_Compute_Snapshot|Google_Snapshot $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function createSnapshot($project, $zone, $disk, Google_Service_Compute_Snapshot $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('createSnapshot', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Deletes the specified persistent disk. (disks.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $disk Name of the persistent disk to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $disk, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns a specified persistent disk. (disks.get)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $disk Name of the persistent disk to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $disk, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Disk");
    }

    /**
     * Creates a persistent disk in the specified project using the data included in
     * the request. (disks.insert)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param Google_Disk|Google_Service_Compute_Disk $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sourceImage Optional. Source image to restore onto a disk.
     */
    public function insert($project, $zone, Google_Service_Compute_Disk $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of persistent disks contained within the specified zone.
     * (disks.listDisks)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
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
    public function listDisks($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_DiskList");
    }
}

/**
 * The "firewalls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $firewalls = $computeService->firewalls;
 *  </code>
 */
class Google_Service_Compute_Firewalls_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified firewall resource. (firewalls.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $firewall Name of the firewall resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $firewall, $optParams = [])
    {
        $params = ['project' => $project, 'firewall' => $firewall];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified firewall resource. (firewalls.get)
     *
     * @param string $project Project ID for this request.
     * @param string $firewall Name of the firewall resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $firewall, $optParams = [])
    {
        $params = ['project' => $project, 'firewall' => $firewall];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Firewall");
    }

    /**
     * Creates a firewall resource in the specified project using the data included
     * in the request. (firewalls.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Firewall|Google_Service_Compute_Firewall $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_Firewall $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of firewall resources available to the specified project.
     * (firewalls.listFirewalls)
     *
     * @param string $project Project ID for this request.
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
    public function listFirewalls($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_FirewallList");
    }

    /**
     * Updates the specified firewall resource with the data included in the
     * request. This method supports patch semantics. (firewalls.patch)
     *
     * @param string $project Project ID for this request.
     * @param string $firewall Name of the firewall resource to update.
     * @param Google_Firewall|Google_Service_Compute_Firewall $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $firewall, Google_Service_Compute_Firewall $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'firewall' => $firewall, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Updates the specified firewall resource with the data included in the
     * request. (firewalls.update)
     *
     * @param string $project Project ID for this request.
     * @param string $firewall Name of the firewall resource to update.
     * @param Google_Firewall|Google_Service_Compute_Firewall $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $firewall, Google_Service_Compute_Firewall $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'firewall' => $firewall, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "forwardingRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $forwardingRules = $computeService->forwardingRules;
 *  </code>
 */
class Google_Service_Compute_ForwardingRules_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of forwarding rules grouped by scope.
     * (forwardingRules.aggregatedList)
     *
     * @param string $project Name of the project scoping this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_ForwardingRuleAggregatedList");
    }

    /**
     * Deletes the specified ForwardingRule resource. (forwardingRules.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $region, $forwardingRule, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified ForwardingRule resource. (forwardingRules.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $region, $forwardingRule, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_ForwardingRule");
    }

    /**
     * Creates a ForwardingRule resource in the specified project and region using
     * the data included in the request. (forwardingRules.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param Google_ForwardingRule|Google_Service_Compute_ForwardingRule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $region, Google_Service_Compute_ForwardingRule $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of ForwardingRule resources available to the specified
     * project and region. (forwardingRules.listForwardingRules)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
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
    public function listForwardingRules($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_ForwardingRuleList");
    }

    /**
     * Changes target url for forwarding rule. (forwardingRules.setTarget)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource in which
     *                                                                                      target is to be set.
     * @param Google_Service_Compute_TargetReference|Google_TargetReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setTarget($project, $region, $forwardingRule, Google_Service_Compute_TargetReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setTarget', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "globalAddresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $globalAddresses = $computeService->globalAddresses;
 *  </code>
 */
class Google_Service_Compute_GlobalAddresses_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified address resource. (globalAddresses.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $address Name of the address resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $address, $optParams = [])
    {
        $params = ['project' => $project, 'address' => $address];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified address resource. (globalAddresses.get)
     *
     * @param string $project Project ID for this request.
     * @param string $address Name of the address resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $address, $optParams = [])
    {
        $params = ['project' => $project, 'address' => $address];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Address");
    }

    /**
     * Creates an address resource in the specified project using the data included
     * in the request. (globalAddresses.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Address|Google_Service_Compute_Address $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_Address $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of global address resources.
     * (globalAddresses.listGlobalAddresses)
     *
     * @param string $project Project ID for this request.
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
    public function listGlobalAddresses($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_AddressList");
    }
}

/**
 * The "globalForwardingRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $globalForwardingRules = $computeService->globalForwardingRules;
 *  </code>
 */
class Google_Service_Compute_GlobalForwardingRules_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified ForwardingRule resource. (globalForwardingRules.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $forwardingRule, $optParams = [])
    {
        $params = ['project' => $project, 'forwardingRule' => $forwardingRule];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified ForwardingRule resource. (globalForwardingRules.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $forwardingRule, $optParams = [])
    {
        $params = ['project' => $project, 'forwardingRule' => $forwardingRule];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_ForwardingRule");
    }

    /**
     * Creates a ForwardingRule resource in the specified project and region using
     * the data included in the request. (globalForwardingRules.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_ForwardingRule|Google_Service_Compute_ForwardingRule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_ForwardingRule $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of ForwardingRule resources available to the specified
     * project. (globalForwardingRules.listGlobalForwardingRules)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listGlobalForwardingRules($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_ForwardingRuleList");
    }

    /**
     * Changes target url for forwarding rule. (globalForwardingRules.setTarget)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $forwardingRule Name of the ForwardingRule resource in which
     *                                                                                      target is to be set.
     * @param Google_Service_Compute_TargetReference|Google_TargetReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setTarget($project, $forwardingRule, Google_Service_Compute_TargetReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setTarget', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "globalOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $globalOperations = $computeService->globalOperations;
 *  </code>
 */
class Google_Service_Compute_GlobalOperations_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of all operations grouped by scope.
     * (globalOperations.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_OperationAggregatedList");
    }

    /**
     * Deletes the specified operation resource. (globalOperations.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $operation Name of the operation resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the specified operation resource. (globalOperations.get)
     *
     * @param string $project Project ID for this request.
     * @param string $operation Name of the operation resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * project. (globalOperations.listGlobalOperations)
     *
     * @param string $project Project ID for this request.
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
    public function listGlobalOperations($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_OperationList");
    }
}

/**
 * The "httpHealthChecks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $httpHealthChecks = $computeService->httpHealthChecks;
 *  </code>
 */
class Google_Service_Compute_HttpHealthChecks_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified HttpHealthCheck resource. (httpHealthChecks.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $httpHealthCheck Name of the HttpHealthCheck resource to
     *                                delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $httpHealthCheck, $optParams = [])
    {
        $params = ['project' => $project, 'httpHealthCheck' => $httpHealthCheck];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified HttpHealthCheck resource. (httpHealthChecks.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $httpHealthCheck Name of the HttpHealthCheck resource to
     *                                return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $httpHealthCheck, $optParams = [])
    {
        $params = ['project' => $project, 'httpHealthCheck' => $httpHealthCheck];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_HttpHealthCheck");
    }

    /**
     * Creates a HttpHealthCheck resource in the specified project using the data
     * included in the request. (httpHealthChecks.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_HttpHealthCheck|Google_Service_Compute_HttpHealthCheck $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_HttpHealthCheck $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of HttpHealthCheck resources available to the specified
     * project. (httpHealthChecks.listHttpHealthChecks)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listHttpHealthChecks($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_HttpHealthCheckList");
    }

    /**
     * Updates a HttpHealthCheck resource in the specified project using the data
     * included in the request. This method supports patch semantics.
     * (httpHealthChecks.patch)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $httpHealthCheck Name of the HttpHealthCheck resource to
     *                                                                                       update.
     * @param Google_HttpHealthCheck|Google_Service_Compute_HttpHealthCheck $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $httpHealthCheck, Google_Service_Compute_HttpHealthCheck $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'httpHealthCheck' => $httpHealthCheck, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Updates a HttpHealthCheck resource in the specified project using the data
     * included in the request. (httpHealthChecks.update)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $httpHealthCheck Name of the HttpHealthCheck resource to
     *                                                                                       update.
     * @param Google_HttpHealthCheck|Google_Service_Compute_HttpHealthCheck $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $httpHealthCheck, Google_Service_Compute_HttpHealthCheck $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'httpHealthCheck' => $httpHealthCheck, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $images = $computeService->images;
 *  </code>
 */
class Google_Service_Compute_Images_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified image resource. (images.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $image Name of the image resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $image, $optParams = [])
    {
        $params = ['project' => $project, 'image' => $image];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets the deprecation status of an image.
     *
     * If an empty request body is given, clears the deprecation status instead.
     * (images.deprecate)
     *
     * @param string $project Project ID for this request.
     * @param string $image Image name.
     * @param Google_DeprecationStatus|Google_Service_Compute_DeprecationStatus $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deprecate($project, $image, Google_Service_Compute_DeprecationStatus $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'image' => $image, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('deprecate', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified image resource. (images.get)
     *
     * @param string $project Project ID for this request.
     * @param string $image Name of the image resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $image, $optParams = [])
    {
        $params = ['project' => $project, 'image' => $image];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Image");
    }

    /**
     * Creates an image resource in the specified project using the data included in
     * the request. (images.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Image|Google_Service_Compute_Image $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_Image $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of image resources available to the specified project.
     * (images.listImages)
     *
     * @param string $project Project ID for this request.
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
    public function listImages($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_ImageList");
    }
}

/**
 * The "instanceTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $instanceTemplates = $computeService->instanceTemplates;
 *  </code>
 */
class Google_Service_Compute_InstanceTemplates_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified instance template resource. (instanceTemplates.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $instanceTemplate Name of the instance template resource to
     *                                 delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $instanceTemplate, $optParams = [])
    {
        $params = ['project' => $project, 'instanceTemplate' => $instanceTemplate];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified instance template resource. (instanceTemplates.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $instanceTemplate Name of the instance template resource to
     *                                 return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $instanceTemplate, $optParams = [])
    {
        $params = ['project' => $project, 'instanceTemplate' => $instanceTemplate];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_InstanceTemplate");
    }

    /**
     * Creates an instance template resource in the specified project using the data
     * included in the request. (instanceTemplates.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_InstanceTemplate|Google_Service_Compute_InstanceTemplate $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, Google_Service_Compute_InstanceTemplate $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of instance template resources contained within the
     * specified project. (instanceTemplates.listInstanceTemplates)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listInstanceTemplates($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_InstanceTemplateList");
    }
}

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $instances = $computeService->instances;
 *  </code>
 */
class Google_Service_Compute_Instances_Resource extends Google_Service_Resource
{

    /**
     * Adds an access config to an instance's network interface.
     * (instances.addAccessConfig)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance The instance name for this request.
     * @param string $networkInterface The name of the network interface to add to
     *                                                                                  this instance.
     * @param Google_AccessConfig|Google_Service_Compute_AccessConfig $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function addAccessConfig($project, $zone, $instance, $networkInterface, Google_Service_Compute_AccessConfig $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addAccessConfig', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * (instances.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_InstanceAggregatedList");
    }

    /**
     * Attaches a Disk resource to an instance. (instances.attachDisk)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Instance name.
     * @param Google_AttachedDisk|Google_Service_Compute_AttachedDisk $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function attachDisk($project, $zone, $instance, Google_Service_Compute_AttachedDisk $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('attachDisk', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Deletes the specified Instance resource. For more information, see Shutting
     * down an instance. (instances.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Deletes an access config from an instance's network interface.
     * (instances.deleteAccessConfig)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance The instance name for this request.
     * @param string $accessConfig The name of the access config to delete.
     * @param string $networkInterface The name of the network interface.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deleteAccessConfig($project, $zone, $instance, $accessConfig, $networkInterface, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'accessConfig' => $accessConfig, 'networkInterface' => $networkInterface];
        $params = array_merge($params, $optParams);

        return $this->call('deleteAccessConfig', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Detaches a disk from an instance. (instances.detachDisk)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Instance name.
     * @param string $deviceName Disk device name to detach.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function detachDisk($project, $zone, $instance, $deviceName, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'deviceName' => $deviceName];
        $params = array_merge($params, $optParams);

        return $this->call('detachDisk', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified instance resource. (instances.get)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the The name of the zone for this request..
     * @param string $instance Name of the instance resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Instance");
    }

    /**
     * Returns the specified instance's serial port output.
     * (instances.getSerialPortOutput)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance scoping this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int port Which COM port to retrieve data from.
     */
    public function getSerialPortOutput($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('getSerialPortOutput', [$params], "Google_Service_Compute_SerialPortOutput");
    }

    /**
     * Creates an instance resource in the specified project using the data included
     * in the request. (instances.insert)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param Google_Instance|Google_Service_Compute_Instance $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $zone, Google_Service_Compute_Instance $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of instance resources contained within the specified zone.
     * (instances.listInstances)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
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
    public function listInstances($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_InstanceList");
    }

    /**
     * Performs a hard reset on the instance. (instances.reset)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance scoping this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets the auto-delete flag for a disk attached to an instance.
     * (instances.setDiskAutoDelete)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance The instance name.
     * @param bool $autoDelete Whether to auto-delete the disk when the instance is
     *                           deleted.
     * @param string $deviceName The device name of the disk to modify.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setDiskAutoDelete($project, $zone, $instance, $autoDelete, $deviceName, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'autoDelete' => $autoDelete, 'deviceName' => $deviceName];
        $params = array_merge($params, $optParams);

        return $this->call('setDiskAutoDelete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets metadata for the specified instance to the data included in the request.
     * (instances.setMetadata)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance scoping this request.
     * @param Google_Metadata|Google_Service_Compute_Metadata $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setMetadata($project, $zone, $instance, Google_Service_Compute_Metadata $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setMetadata', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets an instance's scheduling options. (instances.setScheduling)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Instance name.
     * @param Google_Scheduling|Google_Service_Compute_Scheduling $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setScheduling($project, $zone, $instance, Google_Service_Compute_Scheduling $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setScheduling', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets tags for the specified instance to the data included in the request.
     * (instances.setTags)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance scoping this request.
     * @param Google_Service_Compute_Tags|Google_Tags $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setTags($project, $zone, $instance, Google_Service_Compute_Tags $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setTags', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * This method starts an instance that was stopped using the using the
     * instances().stop method. For more information, see Restart an instance.
     * (instances.start)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance resource to start.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function start($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('start', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * This method stops a running instance, shutting it down cleanly, and allows
     * you to restart the instance at a later time. Stopped instances do not incur
     * per-minute, virtual machine usage charges while they are stopped, but any
     * resources that the virtual machine is using, such as persistent disks and
     * static IP addresses,will continue to be charged until they are deleted. For
     * more information, see Stopping an instance. (instances.stop)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $instance Name of the instance resource to start.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "licenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $licenses = $computeService->licenses;
 *  </code>
 */
class Google_Service_Compute_Licenses_Resource extends Google_Service_Resource
{

    /**
     * Returns the specified license resource. (licenses.get)
     *
     * @param string $project Project ID for this request.
     * @param string $license Name of the license resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $license, $optParams = [])
    {
        $params = ['project' => $project, 'license' => $license];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_License");
    }
}

/**
 * The "machineTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $machineTypes = $computeService->machineTypes;
 *  </code>
 */
class Google_Service_Compute_MachineTypes_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of machine type resources grouped by scope.
     * (machineTypes.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_MachineTypeAggregatedList");
    }

    /**
     * Returns the specified machine type resource. (machineTypes.get)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
     * @param string $machineType Name of the machine type resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $machineType, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'machineType' => $machineType];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_MachineType");
    }

    /**
     * Retrieves the list of machine type resources available to the specified
     * project. (machineTypes.listMachineTypes)
     *
     * @param string $project Project ID for this request.
     * @param string $zone The name of the zone for this request.
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
    public function listMachineTypes($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_MachineTypeList");
    }
}

/**
 * The "networks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $networks = $computeService->networks;
 *  </code>
 */
class Google_Service_Compute_Networks_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified network resource. (networks.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $network Name of the network resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $network, $optParams = [])
    {
        $params = ['project' => $project, 'network' => $network];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified network resource. (networks.get)
     *
     * @param string $project Project ID for this request.
     * @param string $network Name of the network resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $network, $optParams = [])
    {
        $params = ['project' => $project, 'network' => $network];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Network");
    }

    /**
     * Creates a network resource in the specified project using the data included
     * in the request. (networks.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Network|Google_Service_Compute_Network $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_Network $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of network resources available to the specified project.
     * (networks.listNetworks)
     *
     * @param string $project Project ID for this request.
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
    public function listNetworks($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_NetworkList");
    }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $projects = $computeService->projects;
 *  </code>
 */
class Google_Service_Compute_Projects_Resource extends Google_Service_Resource
{

    /**
     * Returns the specified project resource. (projects.get)
     *
     * @param string $project Project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Project");
    }

    /**
     * Moves a persistent disk from one zone to another. (projects.moveDisk)
     *
     * @param string $project Project ID for this request.
     * @param Google_DiskMoveRequest|Google_Service_Compute_DiskMoveRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function moveDisk($project, Google_Service_Compute_DiskMoveRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('moveDisk', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Moves an instance and its attached persistent disks from one zone to another.
     * (projects.moveInstance)
     *
     * @param string $project Project ID for this request.
     * @param Google_InstanceMoveRequest|Google_Service_Compute_InstanceMoveRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function moveInstance($project, Google_Service_Compute_InstanceMoveRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('moveInstance', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Sets metadata common to all instances within the specified project using the
     * data included in the request. (projects.setCommonInstanceMetadata)
     *
     * @param string $project Project ID for this request.
     * @param Google_Metadata|Google_Service_Compute_Metadata $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setCommonInstanceMetadata($project, Google_Service_Compute_Metadata $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setCommonInstanceMetadata', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Enables the usage export feature and sets the usage export bucket where
     * reports are stored. If you provide an empty request body using this method,
     * the usage export feature will be disabled. (projects.setUsageExportBucket)
     *
     * @param string $project Project ID for this request.
     * @param Google_Service_Compute_UsageExportLocation|Google_UsageExportLocation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setUsageExportBucket($project, Google_Service_Compute_UsageExportLocation $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setUsageExportBucket', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "regionOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $regionOperations = $computeService->regionOperations;
 *  </code>
 */
class Google_Service_Compute_RegionOperations_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified region-specific operation resource.
     * (regionOperations.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $region Name of the region scoping this request.
     * @param string $operation Name of the operation resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $region, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the specified region-specific operation resource.
     * (regionOperations.get)
     *
     * @param string $project Project ID for this request.
     * @param string $region Name of the zone scoping this request.
     * @param string $operation Name of the operation resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $region, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * region. (regionOperations.listRegionOperations)
     *
     * @param string $project Project ID for this request.
     * @param string $region Name of the region scoping this request.
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
    public function listRegionOperations($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_OperationList");
    }
}

/**
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $regions = $computeService->regions;
 *  </code>
 */
class Google_Service_Compute_Regions_Resource extends Google_Service_Resource
{

    /**
     * Returns the specified region resource. (regions.get)
     *
     * @param string $project Project ID for this request.
     * @param string $region Name of the region resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Region");
    }

    /**
     * Retrieves the list of region resources available to the specified project.
     * (regions.listRegions)
     *
     * @param string $project Project ID for this request.
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
    public function listRegions($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_RegionList");
    }
}

/**
 * The "routes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $routes = $computeService->routes;
 *  </code>
 */
class Google_Service_Compute_Routes_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified route resource. (routes.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $route Name of the route resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $route, $optParams = [])
    {
        $params = ['project' => $project, 'route' => $route];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified route resource. (routes.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $route Name of the route resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $route, $optParams = [])
    {
        $params = ['project' => $project, 'route' => $route];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Route");
    }

    /**
     * Creates a route resource in the specified project using the data included in
     * the request. (routes.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_Route|Google_Service_Compute_Route $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_Route $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of route resources available to the specified project.
     * (routes.listRoutes)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listRoutes($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_RouteList");
    }
}

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $snapshots = $computeService->snapshots;
 *  </code>
 */
class Google_Service_Compute_Snapshots_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified persistent disk snapshot resource. (snapshots.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $snapshot Name of the persistent disk snapshot resource to
     *                          delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $snapshot, $optParams = [])
    {
        $params = ['project' => $project, 'snapshot' => $snapshot];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified persistent disk snapshot resource. (snapshots.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $snapshot Name of the persistent disk snapshot resource to
     *                          return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $snapshot, $optParams = [])
    {
        $params = ['project' => $project, 'snapshot' => $snapshot];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Snapshot");
    }

    /**
     * Retrieves the list of persistent disk snapshot resources contained within the
     * specified project. (snapshots.listSnapshots)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listSnapshots($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_SnapshotList");
    }
}

/**
 * The "targetHttpProxies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $targetHttpProxies = $computeService->targetHttpProxies;
 *  </code>
 */
class Google_Service_Compute_TargetHttpProxies_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified TargetHttpProxy resource. (targetHttpProxies.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $targetHttpProxy Name of the TargetHttpProxy resource to
     *                                delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $targetHttpProxy, $optParams = [])
    {
        $params = ['project' => $project, 'targetHttpProxy' => $targetHttpProxy];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified TargetHttpProxy resource. (targetHttpProxies.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $targetHttpProxy Name of the TargetHttpProxy resource to
     *                                return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $targetHttpProxy, $optParams = [])
    {
        $params = ['project' => $project, 'targetHttpProxy' => $targetHttpProxy];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_TargetHttpProxy");
    }

    /**
     * Creates a TargetHttpProxy resource in the specified project using the data
     * included in the request. (targetHttpProxies.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_Service_Compute_TargetHttpProxy|Google_TargetHttpProxy $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_TargetHttpProxy $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of TargetHttpProxy resources available to the specified
     * project. (targetHttpProxies.listTargetHttpProxies)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listTargetHttpProxies($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_TargetHttpProxyList");
    }

    /**
     * Changes the URL map for TargetHttpProxy. (targetHttpProxies.setUrlMap)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $targetHttpProxy Name of the TargetHttpProxy resource whose URL
     *                                                                                       map is to be set.
     * @param Google_Service_Compute_UrlMapReference|Google_UrlMapReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setUrlMap($project, $targetHttpProxy, Google_Service_Compute_UrlMapReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'targetHttpProxy' => $targetHttpProxy, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setUrlMap', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "targetInstances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $targetInstances = $computeService->targetInstances;
 *  </code>
 */
class Google_Service_Compute_TargetInstances_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of target instances grouped by scope.
     * (targetInstances.aggregatedList)
     *
     * @param string $project Name of the project scoping this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_TargetInstanceAggregatedList");
    }

    /**
     * Deletes the specified TargetInstance resource. (targetInstances.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $zone Name of the zone scoping this request.
     * @param string $targetInstance Name of the TargetInstance resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $zone, $targetInstance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'targetInstance' => $targetInstance];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified TargetInstance resource. (targetInstances.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $zone Name of the zone scoping this request.
     * @param string $targetInstance Name of the TargetInstance resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $targetInstance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'targetInstance' => $targetInstance];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_TargetInstance");
    }

    /**
     * Creates a TargetInstance resource in the specified project and zone using the
     * data included in the request. (targetInstances.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $zone Name of the zone scoping this request.
     * @param Google_Service_Compute_TargetInstance|Google_TargetInstance $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $zone, Google_Service_Compute_TargetInstance $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of TargetInstance resources available to the specified
     * project and zone. (targetInstances.listTargetInstances)
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
    public function listTargetInstances($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_TargetInstanceList");
    }
}

/**
 * The "targetPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $targetPools = $computeService->targetPools;
 *  </code>
 */
class Google_Service_Compute_TargetPools_Resource extends Google_Service_Resource
{

    /**
     * Adds health check URL to targetPool. (targetPools.addHealthCheck)
     *
     * @param string $project
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to which
     *                                                                                                                    health_check_url is to be added.
     * @param Google_Service_Compute_TargetPoolsAddHealthCheckRequest|Google_TargetPoolsAddHealthCheckRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function addHealthCheck($project, $region, $targetPool, Google_Service_Compute_TargetPoolsAddHealthCheckRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addHealthCheck', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Adds instance url to targetPool. (targetPools.addInstance)
     *
     * @param string $project
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to which
     *                                                                                                              instance_url is to be added.
     * @param Google_Service_Compute_TargetPoolsAddInstanceRequest|Google_TargetPoolsAddInstanceRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function addInstance($project, $region, $targetPool, Google_Service_Compute_TargetPoolsAddInstanceRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addInstance', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of target pools grouped by scope.
     * (targetPools.aggregatedList)
     *
     * @param string $project Name of the project scoping this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_TargetPoolAggregatedList");
    }

    /**
     * Deletes the specified TargetPool resource. (targetPools.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $region, $targetPool, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified TargetPool resource. (targetPools.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $region, $targetPool, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_TargetPool");
    }

    /**
     * Gets the most recent health check results for each IP for the given instance
     * that is referenced by given TargetPool. (targetPools.getHealth)
     *
     * @param string $project
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to which the
     *                                                                                      queried instance belongs.
     * @param Google_InstanceReference|Google_Service_Compute_InstanceReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getHealth($project, $region, $targetPool, Google_Service_Compute_InstanceReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getHealth', [$params], "Google_Service_Compute_TargetPoolInstanceHealth");
    }

    /**
     * Creates a TargetPool resource in the specified project and region using the
     * data included in the request. (targetPools.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param Google_Service_Compute_TargetPool|Google_TargetPool $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $region, Google_Service_Compute_TargetPool $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of TargetPool resources available to the specified project
     * and region. (targetPools.listTargetPools)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
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
    public function listTargetPools($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_TargetPoolList");
    }

    /**
     * Removes health check URL from targetPool. (targetPools.removeHealthCheck)
     *
     * @param string $project
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to which
     *                                                                                                                          health_check_url is to be removed.
     * @param Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest|Google_TargetPoolsRemoveHealthCheckRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function removeHealthCheck($project, $region, $targetPool, Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('removeHealthCheck', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Removes instance URL from targetPool. (targetPools.removeInstance)
     *
     * @param string $project
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource to which
     *                                                                                                                    instance_url is to be removed.
     * @param Google_Service_Compute_TargetPoolsRemoveInstanceRequest|Google_TargetPoolsRemoveInstanceRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function removeInstance($project, $region, $targetPool, Google_Service_Compute_TargetPoolsRemoveInstanceRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('removeInstance', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Changes backup pool configurations. (targetPools.setBackup)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $region Name of the region scoping this request.
     * @param string $targetPool Name of the TargetPool resource for which the
     *                                                                                  backup is to be set.
     * @param Google_Service_Compute_TargetReference|Google_TargetReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param float failoverRatio New failoverRatio value for the containing
     * target pool.
     */
    public function setBackup($project, $region, $targetPool, Google_Service_Compute_TargetReference $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setBackup', [$params], "Google_Service_Compute_Operation");
    }
}

/**
 * The "targetVpnGateways" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $targetVpnGateways = $computeService->targetVpnGateways;
 *  </code>
 */
class Google_Service_Compute_TargetVpnGateways_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of target VPN gateways grouped by scope.
     * (targetVpnGateways.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_TargetVpnGatewayAggregatedList");
    }

    /**
     * Deletes the specified TargetVpnGateway resource. (targetVpnGateways.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $targetVpnGateway Name of the TargetVpnGateway resource to
     *                                 delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $region, $targetVpnGateway, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetVpnGateway' => $targetVpnGateway];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified TargetVpnGateway resource. (targetVpnGateways.get)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $targetVpnGateway Name of the TargetVpnGateway resource to
     *                                 return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $region, $targetVpnGateway, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'targetVpnGateway' => $targetVpnGateway];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_TargetVpnGateway");
    }

    /**
     * Creates a TargetVpnGateway resource in the specified project and region using
     * the data included in the request. (targetVpnGateways.insert)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param Google_Service_Compute_TargetVpnGateway|Google_TargetVpnGateway $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $region, Google_Service_Compute_TargetVpnGateway $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of TargetVpnGateway resources available to the specified
     * project and region. (targetVpnGateways.listTargetVpnGateways)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
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
    public function listTargetVpnGateways($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_TargetVpnGatewayList");
    }
}

/**
 * The "urlMaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $urlMaps = $computeService->urlMaps;
 *  </code>
 */
class Google_Service_Compute_UrlMaps_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified UrlMap resource. (urlMaps.delete)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $urlMap Name of the UrlMap resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $urlMap, $optParams = [])
    {
        $params = ['project' => $project, 'urlMap' => $urlMap];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified UrlMap resource. (urlMaps.get)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $urlMap Name of the UrlMap resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $urlMap, $optParams = [])
    {
        $params = ['project' => $project, 'urlMap' => $urlMap];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_UrlMap");
    }

    /**
     * Creates a UrlMap resource in the specified project using the data included in
     * the request. (urlMaps.insert)
     *
     * @param string $project Name of the project scoping this request.
     * @param Google_Service_Compute_UrlMap|Google_UrlMap $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Compute_UrlMap $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of UrlMap resources available to the specified project.
     * (urlMaps.listUrlMaps)
     *
     * @param string $project Name of the project scoping this request.
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
    public function listUrlMaps($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_UrlMapList");
    }

    /**
     * Update the entire content of the UrlMap resource. This method supports patch
     * semantics. (urlMaps.patch)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $urlMap Name of the UrlMap resource to update.
     * @param Google_Service_Compute_UrlMap|Google_UrlMap $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $urlMap, Google_Service_Compute_UrlMap $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Update the entire content of the UrlMap resource. (urlMaps.update)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $urlMap Name of the UrlMap resource to update.
     * @param Google_Service_Compute_UrlMap|Google_UrlMap $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $urlMap, Google_Service_Compute_UrlMap $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Run static validation for the UrlMap. In particular, the tests of the
     * provided UrlMap will be run. Calling this method does NOT create the UrlMap.
     * (urlMaps.validate)
     *
     * @param string $project Name of the project scoping this request.
     * @param string $urlMap Name of the UrlMap resource to be validated as.
     * @param Google_Service_Compute_UrlMapsValidateRequest|Google_UrlMapsValidateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function validate($project, $urlMap, Google_Service_Compute_UrlMapsValidateRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('validate', [$params], "Google_Service_Compute_UrlMapsValidateResponse");
    }
}

/**
 * The "vpnTunnels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $vpnTunnels = $computeService->vpnTunnels;
 *  </code>
 */
class Google_Service_Compute_VpnTunnels_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of VPN tunnels grouped by scope.
     * (vpnTunnels.aggregatedList)
     *
     * @param string $project Project ID for this request.
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
    public function aggregatedList($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('aggregatedList', [$params], "Google_Service_Compute_VpnTunnelAggregatedList");
    }

    /**
     * Deletes the specified VpnTunnel resource. (vpnTunnels.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $vpnTunnel Name of the VpnTunnel resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $region, $vpnTunnel, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'vpnTunnel' => $vpnTunnel];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Returns the specified VpnTunnel resource. (vpnTunnels.get)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param string $vpnTunnel Name of the VpnTunnel resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $region, $vpnTunnel, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'vpnTunnel' => $vpnTunnel];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_VpnTunnel");
    }

    /**
     * Creates a VpnTunnel resource in the specified project and region using the
     * data included in the request. (vpnTunnels.insert)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
     * @param Google_Service_Compute_VpnTunnel|Google_VpnTunnel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $region, Google_Service_Compute_VpnTunnel $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of VpnTunnel resources contained in the specified project
     * and region. (vpnTunnels.listVpnTunnels)
     *
     * @param string $project Project ID for this request.
     * @param string $region The name of the region for this request.
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
    public function listVpnTunnels($project, $region, $optParams = [])
    {
        $params = ['project' => $project, 'region' => $region];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_VpnTunnelList");
    }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $zoneOperations = $computeService->zoneOperations;
 *  </code>
 */
class Google_Service_Compute_ZoneOperations_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified zone-specific operation resource.
     * (zoneOperations.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $zone Name of the zone scoping this request.
     * @param string $operation Name of the operation resource to delete.
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
     * @param string $project Project ID for this request.
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

        return $this->call('get', [$params], "Google_Service_Compute_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * zone. (zoneOperations.listZoneOperations)
     *
     * @param string $project Project ID for this request.
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

        return $this->call('list', [$params], "Google_Service_Compute_OperationList");
    }
}

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $zones = $computeService->zones;
 *  </code>
 */
class Google_Service_Compute_Zones_Resource extends Google_Service_Resource
{

    /**
     * Returns the specified zone resource. (zones.get)
     *
     * @param string $project Project ID for this request.
     * @param string $zone Name of the zone resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $zone, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Compute_Zone");
    }

    /**
     * Retrieves the list of zone resources available to the specified project.
     * (zones.listZones)
     *
     * @param string $project Project ID for this request.
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
    public function listZones($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Compute_ZoneList");
    }
}


/**
 * Class Google_Service_Compute_AccessConfig
 */
class Google_Service_Compute_AccessConfig extends Google_Model
{
    public $kind;
    public $name;
    public $natIP;
    public $type;
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
    public function getNatIP()
    {
        return $this->natIP;
    }

    /**
     * @param $natIP
     */
    public function setNatIP($natIP)
    {
        $this->natIP = $natIP;
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
 * Class Google_Service_Compute_Address
 */
class Google_Service_Compute_Address extends Google_Collection
{
    public $address;
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $region;
    public $selfLink;
    public $status;
    public $users;
    protected $collection_key = 'users';
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

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}

/**
 * Class Google_Service_Compute_AddressAggregatedList
 */
class Google_Service_Compute_AddressAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_AddressesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_AddressAggregatedListItems
 */
class Google_Service_Compute_AddressAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_AddressList
 */
class Google_Service_Compute_AddressList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Address';
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
 * Class Google_Service_Compute_AddressesScopedList
 */
class Google_Service_Compute_AddressesScopedList extends Google_Collection
{
    protected $collection_key = 'addresses';
    protected $internal_gapi_mappings = [];
    protected $addressesType = 'Google_Service_Compute_Address';
    protected $addressesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_AddressesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Google_Service_Compute_AddressesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_AddressesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_AddressesScopedListWarning
 */
class Google_Service_Compute_AddressesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_AddressesScopedListWarningData';
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
 * Class Google_Service_Compute_AddressesScopedListWarningData
 */
class Google_Service_Compute_AddressesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_AttachedDisk
 */
class Google_Service_Compute_AttachedDisk extends Google_Collection
{
    public $autoDelete;
    public $boot;
    public $deviceName;
    public $index;
    public $interface;
    public $kind;
    public $licenses;
    public $mode;
    public $source;
    public $type;
    protected $collection_key = 'licenses';
    protected $internal_gapi_mappings = [];
    protected $initializeParamsType = 'Google_Service_Compute_AttachedDiskInitializeParams';
    protected $initializeParamsDataType = '';

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

    /**
     * @param Google_Service_Compute_AttachedDiskInitializeParams $initializeParams
     */
    public function setInitializeParams(Google_Service_Compute_AttachedDiskInitializeParams $initializeParams)
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

    /**
     * @return mixed
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param $interface
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
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
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * @param $licenses
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
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
 * Class Google_Service_Compute_AttachedDiskInitializeParams
 */
class Google_Service_Compute_AttachedDiskInitializeParams extends Google_Model
{
    public $diskName;
    public $diskSizeGb;
    public $diskType;
    public $sourceImage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDiskName()
    {
        return $this->diskName;
    }

    /**
     * @param $diskName
     */
    public function setDiskName($diskName)
    {
        $this->diskName = $diskName;
    }

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
 * Class Google_Service_Compute_Backend
 */
class Google_Service_Compute_Backend extends Google_Model
{
    public $balancingMode;
    public $capacityScaler;
    public $description;
    public $group;
    public $maxRate;
    public $maxRatePerInstance;
    public $maxUtilization;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBalancingMode()
    {
        return $this->balancingMode;
    }

    /**
     * @param $balancingMode
     */
    public function setBalancingMode($balancingMode)
    {
        $this->balancingMode = $balancingMode;
    }

    /**
     * @return mixed
     */
    public function getCapacityScaler()
    {
        return $this->capacityScaler;
    }

    /**
     * @param $capacityScaler
     */
    public function setCapacityScaler($capacityScaler)
    {
        $this->capacityScaler = $capacityScaler;
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
    public function getMaxRate()
    {
        return $this->maxRate;
    }

    /**
     * @param $maxRate
     */
    public function setMaxRate($maxRate)
    {
        $this->maxRate = $maxRate;
    }

    /**
     * @return mixed
     */
    public function getMaxRatePerInstance()
    {
        return $this->maxRatePerInstance;
    }

    /**
     * @param $maxRatePerInstance
     */
    public function setMaxRatePerInstance($maxRatePerInstance)
    {
        $this->maxRatePerInstance = $maxRatePerInstance;
    }

    /**
     * @return mixed
     */
    public function getMaxUtilization()
    {
        return $this->maxUtilization;
    }

    /**
     * @param $maxUtilization
     */
    public function setMaxUtilization($maxUtilization)
    {
        $this->maxUtilization = $maxUtilization;
    }
}

/**
 * Class Google_Service_Compute_BackendService
 */
class Google_Service_Compute_BackendService extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $fingerprint;
    public $healthChecks;
    public $id;
    public $kind;
    public $name;
    public $port;
    public $portName;
    public $protocol;
    public $selfLink;
    public $timeoutSec;
    protected $collection_key = 'healthChecks';
    protected $internal_gapi_mappings = [];
    protected $backendsType = 'Google_Service_Compute_Backend';
    protected $backendsDataType = 'array';

    /**
     * @param $backends
     */
    public function setBackends($backends)
    {
        $this->backends = $backends;
    }

    /**
     * @return mixed
     */
    public function getBackends()
    {
        return $this->backends;
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
    public function getPortName()
    {
        return $this->portName;
    }

    /**
     * @param $portName
     */
    public function setPortName($portName)
    {
        $this->portName = $portName;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
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
}

/**
 * Class Google_Service_Compute_BackendServiceGroupHealth
 */
class Google_Service_Compute_BackendServiceGroupHealth extends Google_Collection
{
    public $kind;
    protected $collection_key = 'healthStatus';
    protected $internal_gapi_mappings = [];
    protected $healthStatusType = 'Google_Service_Compute_HealthStatus';
    protected $healthStatusDataType = 'array';

    /**
     * @param $healthStatus
     */
    public function setHealthStatus($healthStatus)
    {
        $this->healthStatus = $healthStatus;
    }

    /**
     * @return mixed
     */
    public function getHealthStatus()
    {
        return $this->healthStatus;
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
}

/**
 * Class Google_Service_Compute_BackendServiceList
 */
class Google_Service_Compute_BackendServiceList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_BackendService';
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
 * Class Google_Service_Compute_DeprecationStatus
 */
class Google_Service_Compute_DeprecationStatus extends Google_Model
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
 * Class Google_Service_Compute_Disk
 */
class Google_Service_Compute_Disk extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $licenses;
    public $name;
    public $options;
    public $selfLink;
    public $sizeGb;
    public $sourceImage;
    public $sourceImageId;
    public $sourceSnapshot;
    public $sourceSnapshotId;
    public $status;
    public $type;
    public $zone;
    protected $collection_key = 'licenses';
    protected $internal_gapi_mappings = [];

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
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * @param $licenses
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
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
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
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
    public function getSizeGb()
    {
        return $this->sizeGb;
    }

    /**
     * @param $sizeGb
     */
    public function setSizeGb($sizeGb)
    {
        $this->sizeGb = $sizeGb;
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

    /**
     * @return mixed
     */
    public function getSourceImageId()
    {
        return $this->sourceImageId;
    }

    /**
     * @param $sourceImageId
     */
    public function setSourceImageId($sourceImageId)
    {
        $this->sourceImageId = $sourceImageId;
    }

    /**
     * @return mixed
     */
    public function getSourceSnapshot()
    {
        return $this->sourceSnapshot;
    }

    /**
     * @param $sourceSnapshot
     */
    public function setSourceSnapshot($sourceSnapshot)
    {
        $this->sourceSnapshot = $sourceSnapshot;
    }

    /**
     * @return mixed
     */
    public function getSourceSnapshotId()
    {
        return $this->sourceSnapshotId;
    }

    /**
     * @param $sourceSnapshotId
     */
    public function setSourceSnapshotId($sourceSnapshotId)
    {
        $this->sourceSnapshotId = $sourceSnapshotId;
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
 * Class Google_Service_Compute_DiskAggregatedList
 */
class Google_Service_Compute_DiskAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_DisksScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_DiskAggregatedListItems
 */
class Google_Service_Compute_DiskAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_DiskList
 */
class Google_Service_Compute_DiskList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Disk';
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
 * Class Google_Service_Compute_DiskMoveRequest
 */
class Google_Service_Compute_DiskMoveRequest extends Google_Model
{
    public $destinationZone;
    public $targetDisk;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDestinationZone()
    {
        return $this->destinationZone;
    }

    /**
     * @param $destinationZone
     */
    public function setDestinationZone($destinationZone)
    {
        $this->destinationZone = $destinationZone;
    }

    /**
     * @return mixed
     */
    public function getTargetDisk()
    {
        return $this->targetDisk;
    }

    /**
     * @param $targetDisk
     */
    public function setTargetDisk($targetDisk)
    {
        $this->targetDisk = $targetDisk;
    }
}

/**
 * Class Google_Service_Compute_DiskType
 */
class Google_Service_Compute_DiskType extends Google_Model
{
    public $creationTimestamp;
    public $defaultDiskSizeGb;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $validDiskSize;
    public $zone;
    protected $internal_gapi_mappings = [];
    protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
    protected $deprecatedDataType = '';

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
    public function getDefaultDiskSizeGb()
    {
        return $this->defaultDiskSizeGb;
    }

    /**
     * @param $defaultDiskSizeGb
     */
    public function setDefaultDiskSizeGb($defaultDiskSizeGb)
    {
        $this->defaultDiskSizeGb = $defaultDiskSizeGb;
    }

    /**
     * @param Google_Service_Compute_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
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
    public function getValidDiskSize()
    {
        return $this->validDiskSize;
    }

    /**
     * @param $validDiskSize
     */
    public function setValidDiskSize($validDiskSize)
    {
        $this->validDiskSize = $validDiskSize;
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
 * Class Google_Service_Compute_DiskTypeAggregatedList
 */
class Google_Service_Compute_DiskTypeAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_DiskTypesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_DiskTypeAggregatedListItems
 */
class Google_Service_Compute_DiskTypeAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_DiskTypeList
 */
class Google_Service_Compute_DiskTypeList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_DiskType';
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
 * Class Google_Service_Compute_DiskTypesScopedList
 */
class Google_Service_Compute_DiskTypesScopedList extends Google_Collection
{
    protected $collection_key = 'diskTypes';
    protected $internal_gapi_mappings = [];
    protected $diskTypesType = 'Google_Service_Compute_DiskType';
    protected $diskTypesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_DiskTypesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $diskTypes
     */
    public function setDiskTypes($diskTypes)
    {
        $this->diskTypes = $diskTypes;
    }

    /**
     * @return mixed
     */
    public function getDiskTypes()
    {
        return $this->diskTypes;
    }

    /**
     * @param Google_Service_Compute_DiskTypesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_DiskTypesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_DiskTypesScopedListWarning
 */
class Google_Service_Compute_DiskTypesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_DiskTypesScopedListWarningData';
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
 * Class Google_Service_Compute_DiskTypesScopedListWarningData
 */
class Google_Service_Compute_DiskTypesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_DisksScopedList
 */
class Google_Service_Compute_DisksScopedList extends Google_Collection
{
    protected $collection_key = 'disks';
    protected $internal_gapi_mappings = [];
    protected $disksType = 'Google_Service_Compute_Disk';
    protected $disksDataType = 'array';
    protected $warningType = 'Google_Service_Compute_DisksScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $disks
     */
    public function setDisks($disks)
    {
        $this->disks = $disks;
    }

    /**
     * @return mixed
     */
    public function getDisks()
    {
        return $this->disks;
    }

    /**
     * @param Google_Service_Compute_DisksScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_DisksScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_DisksScopedListWarning
 */
class Google_Service_Compute_DisksScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_DisksScopedListWarningData';
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
 * Class Google_Service_Compute_DisksScopedListWarningData
 */
class Google_Service_Compute_DisksScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_Firewall
 */
class Google_Service_Compute_Firewall extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $network;
    public $selfLink;
    public $sourceRanges;
    public $sourceTags;
    public $targetTags;
    protected $collection_key = 'targetTags';
    protected $internal_gapi_mappings = [];
    protected $allowedType = 'Google_Service_Compute_FirewallAllowed';
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
 * Class Google_Service_Compute_FirewallAllowed
 */
class Google_Service_Compute_FirewallAllowed extends Google_Collection
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
 * Class Google_Service_Compute_FirewallList
 */
class Google_Service_Compute_FirewallList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Firewall';
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
 * Class Google_Service_Compute_ForwardingRule
 */
class Google_Service_Compute_ForwardingRule extends Google_Model
{
    public $iPAddress;
    public $iPProtocol;
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $portRange;
    public $region;
    public $selfLink;
    public $target;
    protected $internal_gapi_mappings = [
        "iPAddress" => "IPAddress",
        "iPProtocol" => "IPProtocol",
    ];

    /**
     * @return mixed
     */
    public function getIPAddress()
    {
        return $this->iPAddress;
    }

    /**
     * @param $iPAddress
     */
    public function setIPAddress($iPAddress)
    {
        $this->iPAddress = $iPAddress;
    }

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
 * Class Google_Service_Compute_ForwardingRuleAggregatedList
 */
class Google_Service_Compute_ForwardingRuleAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_ForwardingRulesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_ForwardingRuleAggregatedListItems
 */
class Google_Service_Compute_ForwardingRuleAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_ForwardingRuleList
 */
class Google_Service_Compute_ForwardingRuleList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_ForwardingRule';
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
 * Class Google_Service_Compute_ForwardingRulesScopedList
 */
class Google_Service_Compute_ForwardingRulesScopedList extends Google_Collection
{
    protected $collection_key = 'forwardingRules';
    protected $internal_gapi_mappings = [];
    protected $forwardingRulesType = 'Google_Service_Compute_ForwardingRule';
    protected $forwardingRulesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_ForwardingRulesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $forwardingRules
     */
    public function setForwardingRules($forwardingRules)
    {
        $this->forwardingRules = $forwardingRules;
    }

    /**
     * @return mixed
     */
    public function getForwardingRules()
    {
        return $this->forwardingRules;
    }

    /**
     * @param Google_Service_Compute_ForwardingRulesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_ForwardingRulesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_ForwardingRulesScopedListWarning
 */
class Google_Service_Compute_ForwardingRulesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_ForwardingRulesScopedListWarningData';
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
 * Class Google_Service_Compute_ForwardingRulesScopedListWarningData
 */
class Google_Service_Compute_ForwardingRulesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_HealthCheckReference
 */
class Google_Service_Compute_HealthCheckReference extends Google_Model
{
    public $healthCheck;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHealthCheck()
    {
        return $this->healthCheck;
    }

    /**
     * @param $healthCheck
     */
    public function setHealthCheck($healthCheck)
    {
        $this->healthCheck = $healthCheck;
    }
}

/**
 * Class Google_Service_Compute_HealthStatus
 */
class Google_Service_Compute_HealthStatus extends Google_Model
{
    public $healthState;
    public $instance;
    public $ipAddress;
    public $port;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHealthState()
    {
        return $this->healthState;
    }

    /**
     * @param $healthState
     */
    public function setHealthState($healthState)
    {
        $this->healthState = $healthState;
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
 * Class Google_Service_Compute_HostRule
 */
class Google_Service_Compute_HostRule extends Google_Collection
{
    public $description;
    public $hosts;
    public $pathMatcher;
    protected $collection_key = 'hosts';
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
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @param $hosts
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;
    }

    /**
     * @return mixed
     */
    public function getPathMatcher()
    {
        return $this->pathMatcher;
    }

    /**
     * @param $pathMatcher
     */
    public function setPathMatcher($pathMatcher)
    {
        $this->pathMatcher = $pathMatcher;
    }
}

/**
 * Class Google_Service_Compute_HttpHealthCheck
 */
class Google_Service_Compute_HttpHealthCheck extends Google_Model
{
    public $checkIntervalSec;
    public $creationTimestamp;
    public $description;
    public $healthyThreshold;
    public $host;
    public $id;
    public $kind;
    public $name;
    public $port;
    public $requestPath;
    public $selfLink;
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
    public function getRequestPath()
    {
        return $this->requestPath;
    }

    /**
     * @param $requestPath
     */
    public function setRequestPath($requestPath)
    {
        $this->requestPath = $requestPath;
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
 * Class Google_Service_Compute_HttpHealthCheckList
 */
class Google_Service_Compute_HttpHealthCheckList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_HttpHealthCheck';
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
 * Class Google_Service_Compute_Image
 */
class Google_Service_Compute_Image extends Google_Collection
{
    public $archiveSizeBytes;
    public $creationTimestamp;
    public $description;
    public $diskSizeGb;
    public $id;
    public $kind;
    public $licenses;
    public $name;
    public $selfLink;
    public $sourceDisk;
    public $sourceDiskId;
    public $sourceType;
    public $status;
    protected $collection_key = 'licenses';
    protected $internal_gapi_mappings = [];
    protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
    protected $deprecatedDataType = '';
    protected $rawDiskType = 'Google_Service_Compute_ImageRawDisk';
    protected $rawDiskDataType = '';

    /**
     * @return mixed
     */
    public function getArchiveSizeBytes()
    {
        return $this->archiveSizeBytes;
    }

    /**
     * @param $archiveSizeBytes
     */
    public function setArchiveSizeBytes($archiveSizeBytes)
    {
        $this->archiveSizeBytes = $archiveSizeBytes;
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
     * @param Google_Service_Compute_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
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
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * @param $licenses
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
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
     * @param Google_Service_Compute_ImageRawDisk $rawDisk
     */
    public function setRawDisk(Google_Service_Compute_ImageRawDisk $rawDisk)
    {
        $this->rawDisk = $rawDisk;
    }

    /**
     * @return mixed
     */
    public function getRawDisk()
    {
        return $this->rawDisk;
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
    public function getSourceDisk()
    {
        return $this->sourceDisk;
    }

    /**
     * @param $sourceDisk
     */
    public function setSourceDisk($sourceDisk)
    {
        $this->sourceDisk = $sourceDisk;
    }

    /**
     * @return mixed
     */
    public function getSourceDiskId()
    {
        return $this->sourceDiskId;
    }

    /**
     * @param $sourceDiskId
     */
    public function setSourceDiskId($sourceDiskId)
    {
        $this->sourceDiskId = $sourceDiskId;
    }

    /**
     * @return mixed
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param $sourceType
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
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
 * Class Google_Service_Compute_ImageList
 */
class Google_Service_Compute_ImageList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Image';
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
 * Class Google_Service_Compute_ImageRawDisk
 */
class Google_Service_Compute_ImageRawDisk extends Google_Model
{
    public $containerType;
    public $sha1Checksum;
    public $source;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContainerType()
    {
        return $this->containerType;
    }

    /**
     * @param $containerType
     */
    public function setContainerType($containerType)
    {
        $this->containerType = $containerType;
    }

    /**
     * @return mixed
     */
    public function getSha1Checksum()
    {
        return $this->sha1Checksum;
    }

    /**
     * @param $sha1Checksum
     */
    public function setSha1Checksum($sha1Checksum)
    {
        $this->sha1Checksum = $sha1Checksum;
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
 * Class Google_Service_Compute_Instance
 */
class Google_Service_Compute_Instance extends Google_Collection
{
    public $canIpForward;
    public $cpuPlatform;
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $machineType;
    public $name;
    public $selfLink;
    public $status;
    public $statusMessage;
    public $zone;
    protected $collection_key = 'serviceAccounts';
    protected $internal_gapi_mappings = [];
    protected $disksType = 'Google_Service_Compute_AttachedDisk';
    protected $disksDataType = 'array';
    protected $metadataType = 'Google_Service_Compute_Metadata';
    protected $metadataDataType = '';
    protected $networkInterfacesType = 'Google_Service_Compute_NetworkInterface';
    protected $networkInterfacesDataType = 'array';
    protected $schedulingType = 'Google_Service_Compute_Scheduling';
    protected $schedulingDataType = '';
    protected $serviceAccountsType = 'Google_Service_Compute_ServiceAccount';
    protected $serviceAccountsDataType = 'array';
    protected $tagsType = 'Google_Service_Compute_Tags';
    protected $tagsDataType = '';

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
    public function getCpuPlatform()
    {
        return $this->cpuPlatform;
    }

    /**
     * @param $cpuPlatform
     */
    public function setCpuPlatform($cpuPlatform)
    {
        $this->cpuPlatform = $cpuPlatform;
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
     * @param $disks
     */
    public function setDisks($disks)
    {
        $this->disks = $disks;
    }

    /**
     * @return mixed
     */
    public function getDisks()
    {
        return $this->disks;
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
     * @param Google_Service_Compute_Metadata $metadata
     */
    public function setMetadata(Google_Service_Compute_Metadata $metadata)
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
     * @param Google_Service_Compute_Scheduling $scheduling
     */
    public function setScheduling(Google_Service_Compute_Scheduling $scheduling)
    {
        $this->scheduling = $scheduling;
    }

    /**
     * @return mixed
     */
    public function getScheduling()
    {
        return $this->scheduling;
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
     * @param Google_Service_Compute_Tags $tags
     */
    public function setTags(Google_Service_Compute_Tags $tags)
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
 * Class Google_Service_Compute_InstanceAggregatedList
 */
class Google_Service_Compute_InstanceAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_InstancesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_InstanceAggregatedListItems
 */
class Google_Service_Compute_InstanceAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_InstanceList
 */
class Google_Service_Compute_InstanceList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Instance';
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
 * Class Google_Service_Compute_InstanceMoveRequest
 */
class Google_Service_Compute_InstanceMoveRequest extends Google_Model
{
    public $destinationZone;
    public $targetInstance;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDestinationZone()
    {
        return $this->destinationZone;
    }

    /**
     * @param $destinationZone
     */
    public function setDestinationZone($destinationZone)
    {
        $this->destinationZone = $destinationZone;
    }

    /**
     * @return mixed
     */
    public function getTargetInstance()
    {
        return $this->targetInstance;
    }

    /**
     * @param $targetInstance
     */
    public function setTargetInstance($targetInstance)
    {
        $this->targetInstance = $targetInstance;
    }
}

/**
 * Class Google_Service_Compute_InstanceProperties
 */
class Google_Service_Compute_InstanceProperties extends Google_Collection
{
    public $canIpForward;
    public $description;
    public $machineType;
    protected $collection_key = 'serviceAccounts';
    protected $internal_gapi_mappings = [];
    protected $disksType = 'Google_Service_Compute_AttachedDisk';
    protected $disksDataType = 'array';
    protected $metadataType = 'Google_Service_Compute_Metadata';
    protected $metadataDataType = '';
    protected $networkInterfacesType = 'Google_Service_Compute_NetworkInterface';
    protected $networkInterfacesDataType = 'array';
    protected $schedulingType = 'Google_Service_Compute_Scheduling';
    protected $schedulingDataType = '';
    protected $serviceAccountsType = 'Google_Service_Compute_ServiceAccount';
    protected $serviceAccountsDataType = 'array';
    protected $tagsType = 'Google_Service_Compute_Tags';
    protected $tagsDataType = '';

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
     * @param $disks
     */
    public function setDisks($disks)
    {
        $this->disks = $disks;
    }

    /**
     * @return mixed
     */
    public function getDisks()
    {
        return $this->disks;
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
     * @param Google_Service_Compute_Metadata $metadata
     */
    public function setMetadata(Google_Service_Compute_Metadata $metadata)
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
     * @param Google_Service_Compute_Scheduling $scheduling
     */
    public function setScheduling(Google_Service_Compute_Scheduling $scheduling)
    {
        $this->scheduling = $scheduling;
    }

    /**
     * @return mixed
     */
    public function getScheduling()
    {
        return $this->scheduling;
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
     * @param Google_Service_Compute_Tags $tags
     */
    public function setTags(Google_Service_Compute_Tags $tags)
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
}

/**
 * Class Google_Service_Compute_InstanceReference
 */
class Google_Service_Compute_InstanceReference extends Google_Model
{
    public $instance;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_Compute_InstanceTemplate
 */
class Google_Service_Compute_InstanceTemplate extends Google_Model
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $propertiesType = 'Google_Service_Compute_InstanceProperties';
    protected $propertiesDataType = '';

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
     * @param Google_Service_Compute_InstanceProperties $properties
     */
    public function setProperties(Google_Service_Compute_InstanceProperties $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
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
 * Class Google_Service_Compute_InstanceTemplateList
 */
class Google_Service_Compute_InstanceTemplateList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_InstanceTemplate';
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
 * Class Google_Service_Compute_InstancesScopedList
 */
class Google_Service_Compute_InstancesScopedList extends Google_Collection
{
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];
    protected $instancesType = 'Google_Service_Compute_Instance';
    protected $instancesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_InstancesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * @param Google_Service_Compute_InstancesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_InstancesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_InstancesScopedListWarning
 */
class Google_Service_Compute_InstancesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_InstancesScopedListWarningData';
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
 * Class Google_Service_Compute_InstancesScopedListWarningData
 */
class Google_Service_Compute_InstancesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_License
 */
class Google_Service_Compute_License extends Google_Model
{
    public $chargesUseFee;
    public $kind;
    public $name;
    public $selfLink;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChargesUseFee()
    {
        return $this->chargesUseFee;
    }

    /**
     * @param $chargesUseFee
     */
    public function setChargesUseFee($chargesUseFee)
    {
        $this->chargesUseFee = $chargesUseFee;
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
}

/**
 * Class Google_Service_Compute_MachineType
 */
class Google_Service_Compute_MachineType extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $guestCpus;
    public $id;
    public $imageSpaceGb;
    public $kind;
    public $maximumPersistentDisks;
    public $maximumPersistentDisksSizeGb;
    public $memoryMb;
    public $name;
    public $selfLink;
    public $zone;
    protected $collection_key = 'scratchDisks';
    protected $internal_gapi_mappings = [];
    protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
    protected $deprecatedDataType = '';
    protected $scratchDisksType = 'Google_Service_Compute_MachineTypeScratchDisks';
    protected $scratchDisksDataType = 'array';

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
     * @param Google_Service_Compute_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
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
    public function getGuestCpus()
    {
        return $this->guestCpus;
    }

    /**
     * @param $guestCpus
     */
    public function setGuestCpus($guestCpus)
    {
        $this->guestCpus = $guestCpus;
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
    public function getImageSpaceGb()
    {
        return $this->imageSpaceGb;
    }

    /**
     * @param $imageSpaceGb
     */
    public function setImageSpaceGb($imageSpaceGb)
    {
        $this->imageSpaceGb = $imageSpaceGb;
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
    public function getMaximumPersistentDisks()
    {
        return $this->maximumPersistentDisks;
    }

    /**
     * @param $maximumPersistentDisks
     */
    public function setMaximumPersistentDisks($maximumPersistentDisks)
    {
        $this->maximumPersistentDisks = $maximumPersistentDisks;
    }

    /**
     * @return mixed
     */
    public function getMaximumPersistentDisksSizeGb()
    {
        return $this->maximumPersistentDisksSizeGb;
    }

    /**
     * @param $maximumPersistentDisksSizeGb
     */
    public function setMaximumPersistentDisksSizeGb($maximumPersistentDisksSizeGb)
    {
        $this->maximumPersistentDisksSizeGb = $maximumPersistentDisksSizeGb;
    }

    /**
     * @return mixed
     */
    public function getMemoryMb()
    {
        return $this->memoryMb;
    }

    /**
     * @param $memoryMb
     */
    public function setMemoryMb($memoryMb)
    {
        $this->memoryMb = $memoryMb;
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
     * @param $scratchDisks
     */
    public function setScratchDisks($scratchDisks)
    {
        $this->scratchDisks = $scratchDisks;
    }

    /**
     * @return mixed
     */
    public function getScratchDisks()
    {
        return $this->scratchDisks;
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
 * Class Google_Service_Compute_MachineTypeAggregatedList
 */
class Google_Service_Compute_MachineTypeAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_MachineTypesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_MachineTypeAggregatedListItems
 */
class Google_Service_Compute_MachineTypeAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_MachineTypeList
 */
class Google_Service_Compute_MachineTypeList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_MachineType';
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
 * Class Google_Service_Compute_MachineTypeScratchDisks
 */
class Google_Service_Compute_MachineTypeScratchDisks extends Google_Model
{
    public $diskGb;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDiskGb()
    {
        return $this->diskGb;
    }

    /**
     * @param $diskGb
     */
    public function setDiskGb($diskGb)
    {
        $this->diskGb = $diskGb;
    }
}

/**
 * Class Google_Service_Compute_MachineTypesScopedList
 */
class Google_Service_Compute_MachineTypesScopedList extends Google_Collection
{
    protected $collection_key = 'machineTypes';
    protected $internal_gapi_mappings = [];
    protected $machineTypesType = 'Google_Service_Compute_MachineType';
    protected $machineTypesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_MachineTypesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $machineTypes
     */
    public function setMachineTypes($machineTypes)
    {
        $this->machineTypes = $machineTypes;
    }

    /**
     * @return mixed
     */
    public function getMachineTypes()
    {
        return $this->machineTypes;
    }

    /**
     * @param Google_Service_Compute_MachineTypesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_MachineTypesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_MachineTypesScopedListWarning
 */
class Google_Service_Compute_MachineTypesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_MachineTypesScopedListWarningData';
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
 * Class Google_Service_Compute_MachineTypesScopedListWarningData
 */
class Google_Service_Compute_MachineTypesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_Metadata
 */
class Google_Service_Compute_Metadata extends Google_Collection
{
    public $fingerprint;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_MetadataItems';
    protected $itemsDataType = 'array';

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
}

/**
 * Class Google_Service_Compute_MetadataItems
 */
class Google_Service_Compute_MetadataItems extends Google_Model
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
 * Class Google_Service_Compute_Network
 */
class Google_Service_Compute_Network extends Google_Model
{
    public $iPv4Range;
    public $creationTimestamp;
    public $description;
    public $gatewayIPv4;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
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
}

/**
 * Class Google_Service_Compute_NetworkInterface
 */
class Google_Service_Compute_NetworkInterface extends Google_Collection
{
    public $name;
    public $network;
    public $networkIP;
    protected $collection_key = 'accessConfigs';
    protected $internal_gapi_mappings = [];
    protected $accessConfigsType = 'Google_Service_Compute_AccessConfig';
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
    public function getNetworkIP()
    {
        return $this->networkIP;
    }

    /**
     * @param $networkIP
     */
    public function setNetworkIP($networkIP)
    {
        $this->networkIP = $networkIP;
    }
}

/**
 * Class Google_Service_Compute_NetworkList
 */
class Google_Service_Compute_NetworkList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Network';
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
 * Class Google_Service_Compute_Operation
 */
class Google_Service_Compute_Operation extends Google_Collection
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
    protected $errorType = 'Google_Service_Compute_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Compute_OperationWarnings';
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
     * @param Google_Service_Compute_OperationError $error
     */
    public function setError(Google_Service_Compute_OperationError $error)
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
 * Class Google_Service_Compute_OperationAggregatedList
 */
class Google_Service_Compute_OperationAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_OperationsScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_OperationAggregatedListItems
 */
class Google_Service_Compute_OperationAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_OperationError
 */
class Google_Service_Compute_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Compute_OperationErrorErrors';
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
 * Class Google_Service_Compute_OperationErrorErrors
 */
class Google_Service_Compute_OperationErrorErrors extends Google_Model
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
 * Class Google_Service_Compute_OperationList
 */
class Google_Service_Compute_OperationList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Operation';
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
 * Class Google_Service_Compute_OperationWarnings
 */
class Google_Service_Compute_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_OperationWarningsData';
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
 * Class Google_Service_Compute_OperationWarningsData
 */
class Google_Service_Compute_OperationWarningsData extends Google_Model
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
 * Class Google_Service_Compute_OperationsScopedList
 */
class Google_Service_Compute_OperationsScopedList extends Google_Collection
{
    protected $collection_key = 'operations';
    protected $internal_gapi_mappings = [];
    protected $operationsType = 'Google_Service_Compute_Operation';
    protected $operationsDataType = 'array';
    protected $warningType = 'Google_Service_Compute_OperationsScopedListWarning';
    protected $warningDataType = '';


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

    /**
     * @param Google_Service_Compute_OperationsScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_OperationsScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_OperationsScopedListWarning
 */
class Google_Service_Compute_OperationsScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_OperationsScopedListWarningData';
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
 * Class Google_Service_Compute_OperationsScopedListWarningData
 */
class Google_Service_Compute_OperationsScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_PathMatcher
 */
class Google_Service_Compute_PathMatcher extends Google_Collection
{
    public $defaultService;
    public $description;
    public $name;
    protected $collection_key = 'pathRules';
    protected $internal_gapi_mappings = [];
    protected $pathRulesType = 'Google_Service_Compute_PathRule';
    protected $pathRulesDataType = 'array';

    /**
     * @return mixed
     */
    public function getDefaultService()
    {
        return $this->defaultService;
    }

    /**
     * @param $defaultService
     */
    public function setDefaultService($defaultService)
    {
        $this->defaultService = $defaultService;
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
     * @param $pathRules
     */
    public function setPathRules($pathRules)
    {
        $this->pathRules = $pathRules;
    }

    /**
     * @return mixed
     */
    public function getPathRules()
    {
        return $this->pathRules;
    }
}

/**
 * Class Google_Service_Compute_PathRule
 */
class Google_Service_Compute_PathRule extends Google_Collection
{
    public $paths;
    public $service;
    protected $collection_key = 'paths';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param $paths
     */
    public function setPaths($paths)
    {
        $this->paths = $paths;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }
}

/**
 * Class Google_Service_Compute_Project
 */
class Google_Service_Compute_Project extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    protected $collection_key = 'quotas';
    protected $internal_gapi_mappings = [];
    protected $commonInstanceMetadataType = 'Google_Service_Compute_Metadata';
    protected $commonInstanceMetadataDataType = '';
    protected $quotasType = 'Google_Service_Compute_Quota';
    protected $quotasDataType = 'array';
    protected $usageExportLocationType = 'Google_Service_Compute_UsageExportLocation';
    protected $usageExportLocationDataType = '';


    /**
     * @param Google_Service_Compute_Metadata $commonInstanceMetadata
     */
    public function setCommonInstanceMetadata(Google_Service_Compute_Metadata $commonInstanceMetadata)
    {
        $this->commonInstanceMetadata = $commonInstanceMetadata;
    }

    /**
     * @return mixed
     */
    public function getCommonInstanceMetadata()
    {
        return $this->commonInstanceMetadata;
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
     * @param $quotas
     */
    public function setQuotas($quotas)
    {
        $this->quotas = $quotas;
    }

    /**
     * @return mixed
     */
    public function getQuotas()
    {
        return $this->quotas;
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
     * @param Google_Service_Compute_UsageExportLocation $usageExportLocation
     */
    public function setUsageExportLocation(Google_Service_Compute_UsageExportLocation $usageExportLocation)
    {
        $this->usageExportLocation = $usageExportLocation;
    }

    /**
     * @return mixed
     */
    public function getUsageExportLocation()
    {
        return $this->usageExportLocation;
    }
}

/**
 * Class Google_Service_Compute_Quota
 */
class Google_Service_Compute_Quota extends Google_Model
{
    public $limit;
    public $metric;
    public $usage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

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
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }
}

/**
 * Class Google_Service_Compute_Region
 */
class Google_Service_Compute_Region extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $status;
    public $zones;
    protected $collection_key = 'zones';
    protected $internal_gapi_mappings = [];
    protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
    protected $deprecatedDataType = '';
    protected $quotasType = 'Google_Service_Compute_Quota';
    protected $quotasDataType = 'array';

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
     * @param Google_Service_Compute_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
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
     * @param $quotas
     */
    public function setQuotas($quotas)
    {
        $this->quotas = $quotas;
    }

    /**
     * @return mixed
     */
    public function getQuotas()
    {
        return $this->quotas;
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
    public function getZones()
    {
        return $this->zones;
    }

    /**
     * @param $zones
     */
    public function setZones($zones)
    {
        $this->zones = $zones;
    }
}

/**
 * Class Google_Service_Compute_RegionList
 */
class Google_Service_Compute_RegionList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Region';
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
 * Class Google_Service_Compute_ResourceGroupReference
 */
class Google_Service_Compute_ResourceGroupReference extends Google_Model
{
    public $group;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_Compute_Route
 */
class Google_Service_Compute_Route extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $destRange;
    public $id;
    public $kind;
    public $name;
    public $network;
    public $nextHopGateway;
    public $nextHopInstance;
    public $nextHopIp;
    public $nextHopNetwork;
    public $nextHopVpnTunnel;
    public $priority;
    public $selfLink;
    public $tags;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $warningsType = 'Google_Service_Compute_RouteWarnings';
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
    public function getDestRange()
    {
        return $this->destRange;
    }

    /**
     * @param $destRange
     */
    public function setDestRange($destRange)
    {
        $this->destRange = $destRange;
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
    public function getNextHopGateway()
    {
        return $this->nextHopGateway;
    }

    /**
     * @param $nextHopGateway
     */
    public function setNextHopGateway($nextHopGateway)
    {
        $this->nextHopGateway = $nextHopGateway;
    }

    /**
     * @return mixed
     */
    public function getNextHopInstance()
    {
        return $this->nextHopInstance;
    }

    /**
     * @param $nextHopInstance
     */
    public function setNextHopInstance($nextHopInstance)
    {
        $this->nextHopInstance = $nextHopInstance;
    }

    /**
     * @return mixed
     */
    public function getNextHopIp()
    {
        return $this->nextHopIp;
    }

    /**
     * @param $nextHopIp
     */
    public function setNextHopIp($nextHopIp)
    {
        $this->nextHopIp = $nextHopIp;
    }

    /**
     * @return mixed
     */
    public function getNextHopNetwork()
    {
        return $this->nextHopNetwork;
    }

    /**
     * @param $nextHopNetwork
     */
    public function setNextHopNetwork($nextHopNetwork)
    {
        $this->nextHopNetwork = $nextHopNetwork;
    }

    /**
     * @return mixed
     */
    public function getNextHopVpnTunnel()
    {
        return $this->nextHopVpnTunnel;
    }

    /**
     * @param $nextHopVpnTunnel
     */
    public function setNextHopVpnTunnel($nextHopVpnTunnel)
    {
        $this->nextHopVpnTunnel = $nextHopVpnTunnel;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
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
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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
 * Class Google_Service_Compute_RouteList
 */
class Google_Service_Compute_RouteList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Route';
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
 * Class Google_Service_Compute_RouteWarnings
 */
class Google_Service_Compute_RouteWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_RouteWarningsData';
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
 * Class Google_Service_Compute_RouteWarningsData
 */
class Google_Service_Compute_RouteWarningsData extends Google_Model
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
 * Class Google_Service_Compute_Scheduling
 */
class Google_Service_Compute_Scheduling extends Google_Model
{
    public $automaticRestart;
    public $onHostMaintenance;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutomaticRestart()
    {
        return $this->automaticRestart;
    }

    /**
     * @param $automaticRestart
     */
    public function setAutomaticRestart($automaticRestart)
    {
        $this->automaticRestart = $automaticRestart;
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
}

/**
 * Class Google_Service_Compute_SerialPortOutput
 */
class Google_Service_Compute_SerialPortOutput extends Google_Model
{
    public $contents;
    public $kind;
    public $selfLink;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
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
 * Class Google_Service_Compute_ServiceAccount
 */
class Google_Service_Compute_ServiceAccount extends Google_Collection
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
 * Class Google_Service_Compute_Snapshot
 */
class Google_Service_Compute_Snapshot extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $diskSizeGb;
    public $id;
    public $kind;
    public $licenses;
    public $name;
    public $selfLink;
    public $sourceDisk;
    public $sourceDiskId;
    public $status;
    public $storageBytes;
    public $storageBytesStatus;
    protected $collection_key = 'licenses';
    protected $internal_gapi_mappings = [];

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
    public function getLicenses()
    {
        return $this->licenses;
    }

    /**
     * @param $licenses
     */
    public function setLicenses($licenses)
    {
        $this->licenses = $licenses;
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
    public function getSourceDisk()
    {
        return $this->sourceDisk;
    }

    /**
     * @param $sourceDisk
     */
    public function setSourceDisk($sourceDisk)
    {
        $this->sourceDisk = $sourceDisk;
    }

    /**
     * @return mixed
     */
    public function getSourceDiskId()
    {
        return $this->sourceDiskId;
    }

    /**
     * @param $sourceDiskId
     */
    public function setSourceDiskId($sourceDiskId)
    {
        $this->sourceDiskId = $sourceDiskId;
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
    public function getStorageBytes()
    {
        return $this->storageBytes;
    }

    /**
     * @param $storageBytes
     */
    public function setStorageBytes($storageBytes)
    {
        $this->storageBytes = $storageBytes;
    }

    /**
     * @return mixed
     */
    public function getStorageBytesStatus()
    {
        return $this->storageBytesStatus;
    }

    /**
     * @param $storageBytesStatus
     */
    public function setStorageBytesStatus($storageBytesStatus)
    {
        $this->storageBytesStatus = $storageBytesStatus;
    }
}

/**
 * Class Google_Service_Compute_SnapshotList
 */
class Google_Service_Compute_SnapshotList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Snapshot';
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
 * Class Google_Service_Compute_Tags
 */
class Google_Service_Compute_Tags extends Google_Collection
{
    public $fingerprint;
    public $items;
    protected $collection_key = 'items';
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
 * Class Google_Service_Compute_TargetHttpProxy
 */
class Google_Service_Compute_TargetHttpProxy extends Google_Model
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $urlMap;
    protected $internal_gapi_mappings = [];

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
    public function getUrlMap()
    {
        return $this->urlMap;
    }

    /**
     * @param $urlMap
     */
    public function setUrlMap($urlMap)
    {
        $this->urlMap = $urlMap;
    }
}

/**
 * Class Google_Service_Compute_TargetHttpProxyList
 */
class Google_Service_Compute_TargetHttpProxyList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetHttpProxy';
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
 * Class Google_Service_Compute_TargetInstance
 */
class Google_Service_Compute_TargetInstance extends Google_Model
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $instance;
    public $kind;
    public $name;
    public $natPolicy;
    public $selfLink;
    public $zone;
    protected $internal_gapi_mappings = [];

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
    public function getNatPolicy()
    {
        return $this->natPolicy;
    }

    /**
     * @param $natPolicy
     */
    public function setNatPolicy($natPolicy)
    {
        $this->natPolicy = $natPolicy;
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
 * Class Google_Service_Compute_TargetInstanceAggregatedList
 */
class Google_Service_Compute_TargetInstanceAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetInstancesScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_TargetInstanceAggregatedListItems
 */
class Google_Service_Compute_TargetInstanceAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_TargetInstanceList
 */
class Google_Service_Compute_TargetInstanceList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetInstance';
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
 * Class Google_Service_Compute_TargetInstancesScopedList
 */
class Google_Service_Compute_TargetInstancesScopedList extends Google_Collection
{
    protected $collection_key = 'targetInstances';
    protected $internal_gapi_mappings = [];
    protected $targetInstancesType = 'Google_Service_Compute_TargetInstance';
    protected $targetInstancesDataType = 'array';
    protected $warningType = 'Google_Service_Compute_TargetInstancesScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $targetInstances
     */
    public function setTargetInstances($targetInstances)
    {
        $this->targetInstances = $targetInstances;
    }

    /**
     * @return mixed
     */
    public function getTargetInstances()
    {
        return $this->targetInstances;
    }

    /**
     * @param Google_Service_Compute_TargetInstancesScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_TargetInstancesScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_TargetInstancesScopedListWarning
 */
class Google_Service_Compute_TargetInstancesScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_TargetInstancesScopedListWarningData';
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
 * Class Google_Service_Compute_TargetInstancesScopedListWarningData
 */
class Google_Service_Compute_TargetInstancesScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_TargetPool
 */
class Google_Service_Compute_TargetPool extends Google_Collection
{
    public $backupPool;
    public $creationTimestamp;
    public $description;
    public $failoverRatio;
    public $healthChecks;
    public $id;
    public $instances;
    public $kind;
    public $name;
    public $region;
    public $selfLink;
    public $sessionAffinity;
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackupPool()
    {
        return $this->backupPool;
    }

    /**
     * @param $backupPool
     */
    public function setBackupPool($backupPool)
    {
        $this->backupPool = $backupPool;
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
    public function getFailoverRatio()
    {
        return $this->failoverRatio;
    }

    /**
     * @param $failoverRatio
     */
    public function setFailoverRatio($failoverRatio)
    {
        $this->failoverRatio = $failoverRatio;
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
}

/**
 * Class Google_Service_Compute_TargetPoolAggregatedList
 */
class Google_Service_Compute_TargetPoolAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetPoolsScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_TargetPoolAggregatedListItems
 */
class Google_Service_Compute_TargetPoolAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_TargetPoolInstanceHealth
 */
class Google_Service_Compute_TargetPoolInstanceHealth extends Google_Collection
{
    public $kind;
    protected $collection_key = 'healthStatus';
    protected $internal_gapi_mappings = [];
    protected $healthStatusType = 'Google_Service_Compute_HealthStatus';
    protected $healthStatusDataType = 'array';

    /**
     * @param $healthStatus
     */
    public function setHealthStatus($healthStatus)
    {
        $this->healthStatus = $healthStatus;
    }

    /**
     * @return mixed
     */
    public function getHealthStatus()
    {
        return $this->healthStatus;
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
}

/**
 * Class Google_Service_Compute_TargetPoolList
 */
class Google_Service_Compute_TargetPoolList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetPool';
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
 * Class Google_Service_Compute_TargetPoolsAddHealthCheckRequest
 */
class Google_Service_Compute_TargetPoolsAddHealthCheckRequest extends Google_Collection
{
    protected $collection_key = 'healthChecks';
    protected $internal_gapi_mappings = [];
    protected $healthChecksType = 'Google_Service_Compute_HealthCheckReference';
    protected $healthChecksDataType = 'array';


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
    public function getHealthChecks()
    {
        return $this->healthChecks;
    }
}

/**
 * Class Google_Service_Compute_TargetPoolsAddInstanceRequest
 */
class Google_Service_Compute_TargetPoolsAddInstanceRequest extends Google_Collection
{
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];
    protected $instancesType = 'Google_Service_Compute_InstanceReference';
    protected $instancesDataType = 'array';


    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }
}

/**
 * Class Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest
 */
class Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest extends Google_Collection
{
    protected $collection_key = 'healthChecks';
    protected $internal_gapi_mappings = [];
    protected $healthChecksType = 'Google_Service_Compute_HealthCheckReference';
    protected $healthChecksDataType = 'array';


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
    public function getHealthChecks()
    {
        return $this->healthChecks;
    }
}

/**
 * Class Google_Service_Compute_TargetPoolsRemoveInstanceRequest
 */
class Google_Service_Compute_TargetPoolsRemoveInstanceRequest extends Google_Collection
{
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [];
    protected $instancesType = 'Google_Service_Compute_InstanceReference';
    protected $instancesDataType = 'array';


    /**
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
    }
}

/**
 * Class Google_Service_Compute_TargetPoolsScopedList
 */
class Google_Service_Compute_TargetPoolsScopedList extends Google_Collection
{
    protected $collection_key = 'targetPools';
    protected $internal_gapi_mappings = [];
    protected $targetPoolsType = 'Google_Service_Compute_TargetPool';
    protected $targetPoolsDataType = 'array';
    protected $warningType = 'Google_Service_Compute_TargetPoolsScopedListWarning';
    protected $warningDataType = '';


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
    public function getTargetPools()
    {
        return $this->targetPools;
    }

    /**
     * @param Google_Service_Compute_TargetPoolsScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_TargetPoolsScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_TargetPoolsScopedListWarning
 */
class Google_Service_Compute_TargetPoolsScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_TargetPoolsScopedListWarningData';
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
 * Class Google_Service_Compute_TargetPoolsScopedListWarningData
 */
class Google_Service_Compute_TargetPoolsScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_TargetReference
 */
class Google_Service_Compute_TargetReference extends Google_Model
{
    public $target;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Compute_TargetVpnGateway
 */
class Google_Service_Compute_TargetVpnGateway extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $forwardingRules;
    public $id;
    public $kind;
    public $name;
    public $network;
    public $region;
    public $selfLink;
    public $status;
    public $tunnels;
    protected $collection_key = 'tunnels';
    protected $internal_gapi_mappings = [];

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
    public function getForwardingRules()
    {
        return $this->forwardingRules;
    }

    /**
     * @param $forwardingRules
     */
    public function setForwardingRules($forwardingRules)
    {
        $this->forwardingRules = $forwardingRules;
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

    /**
     * @return mixed
     */
    public function getTunnels()
    {
        return $this->tunnels;
    }

    /**
     * @param $tunnels
     */
    public function setTunnels($tunnels)
    {
        $this->tunnels = $tunnels;
    }
}

/**
 * Class Google_Service_Compute_TargetVpnGatewayAggregatedList
 */
class Google_Service_Compute_TargetVpnGatewayAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetVpnGatewaysScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_TargetVpnGatewayAggregatedListItems
 */
class Google_Service_Compute_TargetVpnGatewayAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_TargetVpnGatewayList
 */
class Google_Service_Compute_TargetVpnGatewayList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_TargetVpnGateway';
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
 * Class Google_Service_Compute_TargetVpnGatewaysScopedList
 */
class Google_Service_Compute_TargetVpnGatewaysScopedList extends Google_Collection
{
    protected $collection_key = 'targetVpnGateways';
    protected $internal_gapi_mappings = [];
    protected $targetVpnGatewaysType = 'Google_Service_Compute_TargetVpnGateway';
    protected $targetVpnGatewaysDataType = 'array';
    protected $warningType = 'Google_Service_Compute_TargetVpnGatewaysScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $targetVpnGateways
     */
    public function setTargetVpnGateways($targetVpnGateways)
    {
        $this->targetVpnGateways = $targetVpnGateways;
    }

    /**
     * @return mixed
     */
    public function getTargetVpnGateways()
    {
        return $this->targetVpnGateways;
    }

    /**
     * @param Google_Service_Compute_TargetVpnGatewaysScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_TargetVpnGatewaysScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_TargetVpnGatewaysScopedListWarning
 */
class Google_Service_Compute_TargetVpnGatewaysScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_TargetVpnGatewaysScopedListWarningData';
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
 * Class Google_Service_Compute_TargetVpnGatewaysScopedListWarningData
 */
class Google_Service_Compute_TargetVpnGatewaysScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_TestFailure
 */
class Google_Service_Compute_TestFailure extends Google_Model
{
    public $actualService;
    public $expectedService;
    public $host;
    public $path;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActualService()
    {
        return $this->actualService;
    }

    /**
     * @param $actualService
     */
    public function setActualService($actualService)
    {
        $this->actualService = $actualService;
    }

    /**
     * @return mixed
     */
    public function getExpectedService()
    {
        return $this->expectedService;
    }

    /**
     * @param $expectedService
     */
    public function setExpectedService($expectedService)
    {
        $this->expectedService = $expectedService;
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
}

/**
 * Class Google_Service_Compute_UrlMap
 */
class Google_Service_Compute_UrlMap extends Google_Collection
{
    public $creationTimestamp;
    public $defaultService;
    public $description;
    public $fingerprint;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    protected $collection_key = 'tests';
    protected $internal_gapi_mappings = [];
    protected $hostRulesType = 'Google_Service_Compute_HostRule';
    protected $hostRulesDataType = 'array';
    protected $pathMatchersType = 'Google_Service_Compute_PathMatcher';
    protected $pathMatchersDataType = 'array';
    protected $testsType = 'Google_Service_Compute_UrlMapTest';
    protected $testsDataType = 'array';

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
    public function getDefaultService()
    {
        return $this->defaultService;
    }

    /**
     * @param $defaultService
     */
    public function setDefaultService($defaultService)
    {
        $this->defaultService = $defaultService;
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
     * @param $hostRules
     */
    public function setHostRules($hostRules)
    {
        $this->hostRules = $hostRules;
    }

    /**
     * @return mixed
     */
    public function getHostRules()
    {
        return $this->hostRules;
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
     * @param $pathMatchers
     */
    public function setPathMatchers($pathMatchers)
    {
        $this->pathMatchers = $pathMatchers;
    }

    /**
     * @return mixed
     */
    public function getPathMatchers()
    {
        return $this->pathMatchers;
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
     * @param $tests
     */
    public function setTests($tests)
    {
        $this->tests = $tests;
    }

    /**
     * @return mixed
     */
    public function getTests()
    {
        return $this->tests;
    }
}

/**
 * Class Google_Service_Compute_UrlMapList
 */
class Google_Service_Compute_UrlMapList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_UrlMap';
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
 * Class Google_Service_Compute_UrlMapReference
 */
class Google_Service_Compute_UrlMapReference extends Google_Model
{
    public $urlMap;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUrlMap()
    {
        return $this->urlMap;
    }

    /**
     * @param $urlMap
     */
    public function setUrlMap($urlMap)
    {
        $this->urlMap = $urlMap;
    }
}

/**
 * Class Google_Service_Compute_UrlMapTest
 */
class Google_Service_Compute_UrlMapTest extends Google_Model
{
    public $description;
    public $host;
    public $path;
    public $service;
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
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }
}

/**
 * Class Google_Service_Compute_UrlMapValidationResult
 */
class Google_Service_Compute_UrlMapValidationResult extends Google_Collection
{
    public $loadErrors;
    public $loadSucceeded;
    public $testPassed;
    protected $collection_key = 'testFailures';
    protected $internal_gapi_mappings = [];
    protected $testFailuresType = 'Google_Service_Compute_TestFailure';
    protected $testFailuresDataType = 'array';

    /**
     * @return mixed
     */
    public function getLoadErrors()
    {
        return $this->loadErrors;
    }

    /**
     * @param $loadErrors
     */
    public function setLoadErrors($loadErrors)
    {
        $this->loadErrors = $loadErrors;
    }

    /**
     * @return mixed
     */
    public function getLoadSucceeded()
    {
        return $this->loadSucceeded;
    }

    /**
     * @param $loadSucceeded
     */
    public function setLoadSucceeded($loadSucceeded)
    {
        $this->loadSucceeded = $loadSucceeded;
    }

    /**
     * @param $testFailures
     */
    public function setTestFailures($testFailures)
    {
        $this->testFailures = $testFailures;
    }

    /**
     * @return mixed
     */
    public function getTestFailures()
    {
        return $this->testFailures;
    }

    /**
     * @return mixed
     */
    public function getTestPassed()
    {
        return $this->testPassed;
    }

    /**
     * @param $testPassed
     */
    public function setTestPassed($testPassed)
    {
        $this->testPassed = $testPassed;
    }
}

/**
 * Class Google_Service_Compute_UrlMapsValidateRequest
 */
class Google_Service_Compute_UrlMapsValidateRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceType = 'Google_Service_Compute_UrlMap';
    protected $resourceDataType = '';


    /**
     * @param Google_Service_Compute_UrlMap $resource
     */
    public function setResource(Google_Service_Compute_UrlMap $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }
}

/**
 * Class Google_Service_Compute_UrlMapsValidateResponse
 */
class Google_Service_Compute_UrlMapsValidateResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resultType = 'Google_Service_Compute_UrlMapValidationResult';
    protected $resultDataType = '';


    /**
     * @param Google_Service_Compute_UrlMapValidationResult $result
     */
    public function setResult(Google_Service_Compute_UrlMapValidationResult $result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}

/**
 * Class Google_Service_Compute_UsageExportLocation
 */
class Google_Service_Compute_UsageExportLocation extends Google_Model
{
    public $bucketName;
    public $reportNamePrefix;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBucketName()
    {
        return $this->bucketName;
    }

    /**
     * @param $bucketName
     */
    public function setBucketName($bucketName)
    {
        $this->bucketName = $bucketName;
    }

    /**
     * @return mixed
     */
    public function getReportNamePrefix()
    {
        return $this->reportNamePrefix;
    }

    /**
     * @param $reportNamePrefix
     */
    public function setReportNamePrefix($reportNamePrefix)
    {
        $this->reportNamePrefix = $reportNamePrefix;
    }
}

/**
 * Class Google_Service_Compute_VpnTunnel
 */
class Google_Service_Compute_VpnTunnel extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $detailedStatus;
    public $id;
    public $ikeNetworks;
    public $ikeVersion;
    public $kind;
    public $name;
    public $peerIp;
    public $region;
    public $selfLink;
    public $sharedSecret;
    public $sharedSecretHash;
    public $status;
    public $targetVpnGateway;
    protected $collection_key = 'ikeNetworks';
    protected $internal_gapi_mappings = [];

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
    public function getDetailedStatus()
    {
        return $this->detailedStatus;
    }

    /**
     * @param $detailedStatus
     */
    public function setDetailedStatus($detailedStatus)
    {
        $this->detailedStatus = $detailedStatus;
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
    public function getIkeNetworks()
    {
        return $this->ikeNetworks;
    }

    /**
     * @param $ikeNetworks
     */
    public function setIkeNetworks($ikeNetworks)
    {
        $this->ikeNetworks = $ikeNetworks;
    }

    /**
     * @return mixed
     */
    public function getIkeVersion()
    {
        return $this->ikeVersion;
    }

    /**
     * @param $ikeVersion
     */
    public function setIkeVersion($ikeVersion)
    {
        $this->ikeVersion = $ikeVersion;
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
    public function getPeerIp()
    {
        return $this->peerIp;
    }

    /**
     * @param $peerIp
     */
    public function setPeerIp($peerIp)
    {
        $this->peerIp = $peerIp;
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
    public function getSharedSecret()
    {
        return $this->sharedSecret;
    }

    /**
     * @param $sharedSecret
     */
    public function setSharedSecret($sharedSecret)
    {
        $this->sharedSecret = $sharedSecret;
    }

    /**
     * @return mixed
     */
    public function getSharedSecretHash()
    {
        return $this->sharedSecretHash;
    }

    /**
     * @param $sharedSecretHash
     */
    public function setSharedSecretHash($sharedSecretHash)
    {
        $this->sharedSecretHash = $sharedSecretHash;
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
    public function getTargetVpnGateway()
    {
        return $this->targetVpnGateway;
    }

    /**
     * @param $targetVpnGateway
     */
    public function setTargetVpnGateway($targetVpnGateway)
    {
        $this->targetVpnGateway = $targetVpnGateway;
    }
}

/**
 * Class Google_Service_Compute_VpnTunnelAggregatedList
 */
class Google_Service_Compute_VpnTunnelAggregatedList extends Google_Model
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_VpnTunnelsScopedList';
    protected $itemsDataType = 'map';

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
 * Class Google_Service_Compute_VpnTunnelAggregatedListItems
 */
class Google_Service_Compute_VpnTunnelAggregatedListItems extends Google_Model
{
}

/**
 * Class Google_Service_Compute_VpnTunnelList
 */
class Google_Service_Compute_VpnTunnelList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_VpnTunnel';
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
 * Class Google_Service_Compute_VpnTunnelsScopedList
 */
class Google_Service_Compute_VpnTunnelsScopedList extends Google_Collection
{
    protected $collection_key = 'vpnTunnels';
    protected $internal_gapi_mappings = [];
    protected $vpnTunnelsType = 'Google_Service_Compute_VpnTunnel';
    protected $vpnTunnelsDataType = 'array';
    protected $warningType = 'Google_Service_Compute_VpnTunnelsScopedListWarning';
    protected $warningDataType = '';


    /**
     * @param $vpnTunnels
     */
    public function setVpnTunnels($vpnTunnels)
    {
        $this->vpnTunnels = $vpnTunnels;
    }

    /**
     * @return mixed
     */
    public function getVpnTunnels()
    {
        return $this->vpnTunnels;
    }

    /**
     * @param Google_Service_Compute_VpnTunnelsScopedListWarning $warning
     */
    public function setWarning(Google_Service_Compute_VpnTunnelsScopedListWarning $warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Compute_VpnTunnelsScopedListWarning
 */
class Google_Service_Compute_VpnTunnelsScopedListWarning extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Compute_VpnTunnelsScopedListWarningData';
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
 * Class Google_Service_Compute_VpnTunnelsScopedListWarningData
 */
class Google_Service_Compute_VpnTunnelsScopedListWarningData extends Google_Model
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
 * Class Google_Service_Compute_Zone
 */
class Google_Service_Compute_Zone extends Google_Collection
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
    protected $deprecatedType = 'Google_Service_Compute_DeprecationStatus';
    protected $deprecatedDataType = '';
    protected $maintenanceWindowsType = 'Google_Service_Compute_ZoneMaintenanceWindows';
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
     * @param Google_Service_Compute_DeprecationStatus $deprecated
     */
    public function setDeprecated(Google_Service_Compute_DeprecationStatus $deprecated)
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
 * Class Google_Service_Compute_ZoneList
 */
class Google_Service_Compute_ZoneList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Compute_Zone';
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
 * Class Google_Service_Compute_ZoneMaintenanceWindows
 */
class Google_Service_Compute_ZoneMaintenanceWindows extends Google_Model
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
