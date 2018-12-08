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
 * Service definition for Storage (v1).
 *
 * <p>
 * Lets you store and retrieve potentially-large, immutable data objects.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/storage/docs/json_api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Storage extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** Manage your data and permissions in Google Cloud Storage. */
    const DEVSTORAGE_FULL_CONTROL =
        "https://www.googleapis.com/auth/devstorage.full_control";
    /** View your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_ONLY =
        "https://www.googleapis.com/auth/devstorage.read_only";
    /** Manage your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_WRITE =
        "https://www.googleapis.com/auth/devstorage.read_write";

    public $bucketAccessControls;
    public $buckets;
    public $channels;
    public $defaultObjectAccessControls;
    public $objectAccessControls;
    public $objects;


    /**
     * Constructs the internal representation of the Storage service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'storage/v1/';
        $this->version = 'v1';
        $this->serviceName = 'storage';

        $this->bucketAccessControls = new Google_Service_Storage_BucketAccessControls_Resource(
            $this,
            $this->serviceName,
            'bucketAccessControls',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'b/{bucket}/acl/{entity}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'b/{bucket}/acl/{entity}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'b/{bucket}/acl',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'b/{bucket}/acl',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'b/{bucket}/acl/{entity}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'b/{bucket}/acl/{entity}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->buckets = new Google_Service_Storage_Buckets_Resource(
            $this,
            $this->serviceName,
            'buckets',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'b/{bucket}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'b/{bucket}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'b',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'predefinedDefaultObjectAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'b',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'prefix' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'b/{bucket}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'predefinedDefaultObjectAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'b/{bucket}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'predefinedDefaultObjectAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_Storage_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'stop' => [
                        'path' => 'channels/stop',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->defaultObjectAccessControls = new Google_Service_Storage_DefaultObjectAccessControls_Resource(
            $this,
            $this->serviceName,
            'defaultObjectAccessControls',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'b/{bucket}/defaultObjectAcl',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'b/{bucket}/defaultObjectAcl',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'b/{bucket}/defaultObjectAcl/{entity}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->objectAccessControls = new Google_Service_Storage_ObjectAccessControls_Resource(
            $this,
            $this->serviceName,
            'objectAccessControls',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'b/{bucket}/o/{object}/acl/{entity}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'b/{bucket}/o/{object}/acl/{entity}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'b/{bucket}/o/{object}/acl',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'b/{bucket}/o/{object}/acl',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'b/{bucket}/o/{object}/acl/{entity}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'b/{bucket}/o/{object}/acl/{entity}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'entity' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->objects = new Google_Service_Storage_Objects_Resource(
            $this,
            $this->serviceName,
            'objects',
            [
                'methods' => [
                    'compose' => [
                        'path' => 'b/{destinationBucket}/o/{destinationObject}/compose',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'destinationBucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destinationObject' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'destinationPredefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'copy' => [
                        'path' => 'b/{sourceBucket}/o/{sourceObject}/copyTo/b/{destinationBucket}/o/{destinationObject}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'sourceBucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sourceObject' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destinationBucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destinationObject' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifSourceGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sourceGeneration' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'destinationPredefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'b/{bucket}/o/{object}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'b/{bucket}/o/{object}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'b/{bucket}/o',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentEncoding' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'b/{bucket}/o',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'versions' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'prefix' => [
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
                            'delimiter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'b/{bucket}/o/{object}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'rewrite' => [
                        'path' => 'b/{sourceBucket}/o/{sourceObject}/rewriteTo/b/{destinationBucket}/o/{destinationObject}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'sourceBucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sourceObject' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destinationBucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'destinationObject' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ifSourceGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'rewriteToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sourceGeneration' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'destinationPredefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxBytesRewrittenPerCall' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifSourceMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'b/{bucket}/o/{object}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'object' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'predefinedAcl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'generation' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifGenerationMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ifMetagenerationNotMatch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'watchAll' => [
                        'path' => 'b/{bucket}/o/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'bucket' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'versions' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'prefix' => [
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
                            'delimiter' => [
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
 * The "bucketAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $bucketAccessControls = $storageService->bucketAccessControls;
 *  </code>
 */
class Google_Service_Storage_BucketAccessControls_Resource extends Google_Service_Resource
{

    /**
     * Permanently deletes the ACL entry for the specified entity on the specified
     * bucket. (bucketAccessControls.delete)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($bucket, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the ACL entry for the specified entity on the specified bucket.
     * (bucketAccessControls.get)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($bucket, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Storage_BucketAccessControl");
    }

    /**
     * Creates a new ACL entry on the specified bucket.
     * (bucketAccessControls.insert)
     *
     * @param string $bucket Name of a bucket.
     * @param Google_BucketAccessControl|Google_Service_Storage_BucketAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($bucket, Google_Service_Storage_BucketAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Storage_BucketAccessControl");
    }

    /**
     * Retrieves ACL entries on the specified bucket.
     * (bucketAccessControls.listBucketAccessControls)
     *
     * @param string $bucket Name of a bucket.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listBucketAccessControls($bucket, $optParams = [])
    {
        $params = ['bucket' => $bucket];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Storage_BucketAccessControls");
    }

    /**
     * Updates an ACL entry on the specified bucket. This method supports patch
     * semantics. (bucketAccessControls.patch)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_BucketAccessControl|Google_Service_Storage_BucketAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($bucket, $entity, Google_Service_Storage_BucketAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Storage_BucketAccessControl");
    }

    /**
     * Updates an ACL entry on the specified bucket. (bucketAccessControls.update)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_BucketAccessControl|Google_Service_Storage_BucketAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($bucket, $entity, Google_Service_Storage_BucketAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Storage_BucketAccessControl");
    }
}

/**
 * The "buckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $buckets = $storageService->buckets;
 *  </code>
 */
class Google_Service_Storage_Buckets_Resource extends Google_Service_Resource
{

    /**
     * Permanently deletes an empty bucket. (buckets.delete)
     *
     * @param string $bucket Name of a bucket.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string ifMetagenerationMatch If set, only deletes the bucket if
     * its metageneration matches this value.
     * @opt_param string ifMetagenerationNotMatch If set, only deletes the bucket if
     * its metageneration does not match this value.
     * @return expected_class|Google_Http_Request
     */
    public function delete($bucket, $optParams = [])
    {
        $params = ['bucket' => $bucket];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns metadata for the specified bucket. (buckets.get)
     *
     * @param string $bucket Name of a bucket.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifMetagenerationMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration matches
     * the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration does not
     * match the given value.
     * @opt_param string projection Set of properties to return. Defaults to noAcl.
     */
    public function get($bucket, $optParams = [])
    {
        $params = ['bucket' => $bucket];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Storage_Bucket");
    }

    /**
     * Creates a new bucket. (buckets.insert)
     *
     * @param string $project A valid API project identifier.
     * @param Google_Bucket|Google_Service_Storage_Bucket $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this bucket.
     * @opt_param string projection Set of properties to return. Defaults to noAcl,
     * unless the bucket resource specifies acl or defaultObjectAcl properties, when
     * it defaults to full.
     * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
     * default object access controls to this bucket.
     */
    public function insert($project, Google_Service_Storage_Bucket $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Storage_Bucket");
    }

    /**
     * Retrieves a list of buckets for a given project. (buckets.listBuckets)
     *
     * @param string $project A valid API project identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     * @opt_param string prefix Filter results to buckets whose names begin with
     * this prefix.
     * @opt_param string projection Set of properties to return. Defaults to noAcl.
     * @opt_param string maxResults Maximum number of buckets to return.
     */
    public function listBuckets($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Storage_Buckets");
    }

    /**
     * Updates a bucket. This method supports patch semantics. (buckets.patch)
     *
     * @param string $bucket Name of a bucket.
     * @param Google_Bucket|Google_Service_Storage_Bucket $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Set of properties to return. Defaults to full.
     * @opt_param string ifMetagenerationMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration matches
     * the given value.
     * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
     * default object access controls to this bucket.
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this bucket.
     * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration does not
     * match the given value.
     */
    public function patch($bucket, Google_Service_Storage_Bucket $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Storage_Bucket");
    }

    /**
     * Updates a bucket. (buckets.update)
     *
     * @param string $bucket Name of a bucket.
     * @param Google_Bucket|Google_Service_Storage_Bucket $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Set of properties to return. Defaults to full.
     * @opt_param string ifMetagenerationMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration matches
     * the given value.
     * @opt_param string predefinedDefaultObjectAcl Apply a predefined set of
     * default object access controls to this bucket.
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this bucket.
     * @opt_param string ifMetagenerationNotMatch Makes the return of the bucket
     * metadata conditional on whether the bucket's current metageneration does not
     * match the given value.
     */
    public function update($bucket, Google_Service_Storage_Bucket $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Storage_Bucket");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $channels = $storageService->channels;
 *  </code>
 */
class Google_Service_Storage_Channels_Resource extends Google_Service_Resource
{

    /**
     * Stop watching resources through this channel (channels.stop)
     *
     * @param Google_Channel|Google_Service_Storage_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop(Google_Service_Storage_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params]);
    }
}

/**
 * The "defaultObjectAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $defaultObjectAccessControls = $storageService->defaultObjectAccessControls;
 *  </code>
 */
class Google_Service_Storage_DefaultObjectAccessControls_Resource extends Google_Service_Resource
{

    /**
     * Permanently deletes the default object ACL entry for the specified entity on
     * the specified bucket. (defaultObjectAccessControls.delete)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($bucket, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the default object ACL entry for the specified entity on the
     * specified bucket. (defaultObjectAccessControls.get)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($bucket, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Creates a new default object ACL entry on the specified bucket.
     * (defaultObjectAccessControls.insert)
     *
     * @param string $bucket Name of a bucket.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($bucket, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Retrieves default object ACL entries on the specified bucket.
     * (defaultObjectAccessControls.listDefaultObjectAccessControls)
     *
     * @param string $bucket Name of a bucket.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifMetagenerationMatch If present, only return default ACL
     * listing if the bucket's current metageneration matches this value.
     * @opt_param string ifMetagenerationNotMatch If present, only return default
     * ACL listing if the bucket's current metageneration does not match the given
     * value.
     */
    public function listDefaultObjectAccessControls($bucket, $optParams = [])
    {
        $params = ['bucket' => $bucket];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Storage_ObjectAccessControls");
    }

    /**
     * Updates a default object ACL entry on the specified bucket. This method
     * supports patch semantics. (defaultObjectAccessControls.patch)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($bucket, $entity, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Updates a default object ACL entry on the specified bucket.
     * (defaultObjectAccessControls.update)
     *
     * @param string $bucket Name of a bucket.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($bucket, $entity, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Storage_ObjectAccessControl");
    }
}

/**
 * The "objectAccessControls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $objectAccessControls = $storageService->objectAccessControls;
 *  </code>
 */
class Google_Service_Storage_ObjectAccessControls_Resource extends Google_Service_Resource
{

    /**
     * Permanently deletes the ACL entry for the specified entity on the specified
     * object. (objectAccessControls.delete)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     * @return expected_class|Google_Http_Request
     */
    public function delete($bucket, $object, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the ACL entry for the specified entity on the specified object.
     * (objectAccessControls.get)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                          user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                          allAuthenticatedUsers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     */
    public function get($bucket, $object, $entity, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Creates a new ACL entry on the specified object.
     * (objectAccessControls.insert)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     */
    public function insert($bucket, $object, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Retrieves ACL entries on the specified object.
     * (objectAccessControls.listObjectAccessControls)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     */
    public function listObjectAccessControls($bucket, $object, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Storage_ObjectAccessControls");
    }

    /**
     * Updates an ACL entry on the specified object. This method supports patch
     * semantics. (objectAccessControls.patch)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     */
    public function patch($bucket, $object, $entity, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Storage_ObjectAccessControl");
    }

    /**
     * Updates an ACL entry on the specified object. (objectAccessControls.update)
     *
     * @param string $bucket Name of a bucket.
     * @param string $object Name of the object.
     * @param string $entity The entity holding the permission. Can be user-userId,
     *                                                                                         user-emailAddress, group-groupId, group-emailAddress, allUsers, or
     *                                                                                         allAuthenticatedUsers.
     * @param Google_ObjectAccessControl|Google_Service_Storage_ObjectAccessControl $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     */
    public function update($bucket, $object, $entity, Google_Service_Storage_ObjectAccessControl $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'entity' => $entity, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Storage_ObjectAccessControl");
    }
}

/**
 * The "objects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google_Service_Storage(...);
 *   $objects = $storageService->objects;
 *  </code>
 */
class Google_Service_Storage_Objects_Resource extends Google_Service_Resource
{

    /**
     * Concatenates a list of existing objects into a new object in the same bucket.
     * (objects.compose)
     *
     * @param string $destinationBucket Name of the bucket in which to store the new
     *                                                                                       object.
     * @param string $destinationObject Name of the new object.
     * @param Google_ComposeRequest|Google_Service_Storage_ComposeRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's current generation matches the given value.
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string destinationPredefinedAcl Apply a predefined set of access
     * controls to the destination object.
     */
    public function compose($destinationBucket, $destinationObject, Google_Service_Storage_ComposeRequest $postBody, $optParams = [])
    {
        $params = ['destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('compose', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Copies an object to a specified location. Optionally overrides metadata.
     * (objects.copy)
     *
     * @param string $sourceBucket Name of the bucket in which to find the source
     *                                                                                     object.
     * @param string $sourceObject Name of the source object.
     * @param string $destinationBucket Name of the bucket in which to store the new
     *                                                                                     object. Overrides the provided object metadata's bucket value, if any.
     * @param string $destinationObject Name of the new object. Required when the
     *                                                                                     object metadata is not otherwise provided. Overrides the object metadata's
     *                                                                                     name value, if any.
     * @param Google_Service_Storage_StorageObject|Google_StorageObject $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifSourceGenerationNotMatch Makes the operation conditional
     * on whether the source object's generation does not match the given value.
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the destination object's current generation does not match the given
     * value.
     * @opt_param string ifSourceMetagenerationNotMatch Makes the operation
     * conditional on whether the source object's current metageneration does not
     * match the given value.
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the destination object's current metageneration matches the given
     * value.
     * @opt_param string sourceGeneration If present, selects a specific revision of
     * the source object (as opposed to the latest version, the default).
     * @opt_param string destinationPredefinedAcl Apply a predefined set of access
     * controls to the destination object.
     * @opt_param string ifSourceGenerationMatch Makes the operation conditional on
     * whether the source object's generation matches the given value.
     * @opt_param string ifSourceMetagenerationMatch Makes the operation conditional
     * on whether the source object's current metageneration matches the given
     * value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the destination object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the destination object's current metageneration does not match the
     * given value.
     * @opt_param string projection Set of properties to return. Defaults to noAcl,
     * unless the object resource specifies the acl property, when it defaults to
     * full.
     */
    public function copy($sourceBucket, $sourceObject, $destinationBucket, $destinationObject, Google_Service_Storage_StorageObject $postBody, $optParams = [])
    {
        $params = ['sourceBucket' => $sourceBucket, 'sourceObject' => $sourceObject, 'destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('copy', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Deletes an object and its metadata. Deletions are permanent if versioning is
     * not enabled for the bucket, or if the generation parameter is used.
     * (objects.delete)
     *
     * @param string $bucket Name of the bucket in which the object resides.
     * @param string $object Name of the object.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the object's current generation does not match the given value.
     * @opt_param string generation If present, permanently deletes a specific
     * revision of this object (as opposed to the latest version, the default).
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the object's current metageneration does not match the given value.
     * @return expected_class|Google_Http_Request
     */
    public function delete($bucket, $object, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves an object or its metadata. (objects.get)
     *
     * @param string $bucket Name of the bucket in which the object resides.
     * @param string $object Name of the object.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the object's generation does not match the given value.
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the object's current metageneration does not match the given value.
     * @opt_param string projection Set of properties to return. Defaults to noAcl.
     */
    public function get($bucket, $object, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Stores a new object and metadata. (objects.insert)
     *
     * @param string $bucket Name of the bucket in which to store the new object.
     *                                                                             Overrides the provided object metadata's bucket value, if any.
     * @param Google_Service_Storage_StorageObject|Google_StorageObject $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this object.
     * @opt_param string projection Set of properties to return. Defaults to noAcl,
     * unless the object resource specifies the acl property, when it defaults to
     * full.
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the object's current generation does not match the given value.
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string contentEncoding If set, sets the contentEncoding property
     * of the final object to this value. Setting this parameter is equivalent to
     * setting the contentEncoding metadata property. This can be useful when
     * uploading an object with uploadType=media to indicate the encoding of the
     * content being uploaded.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the object's current metageneration does not match the given value.
     * @opt_param string name Name of the object. Required when the object metadata
     * is not otherwise provided. Overrides the object metadata's name value, if
     * any.
     */
    public function insert($bucket, Google_Service_Storage_StorageObject $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Retrieves a list of objects matching the criteria. (objects.listObjects)
     *
     * @param string $bucket Name of the bucket in which to look for objects.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Set of properties to return. Defaults to noAcl.
     * @opt_param bool versions If true, lists all versions of an object as distinct
     * results. The default is false. For more information, see Object Versioning.
     * @opt_param string prefix Filter results to objects whose names begin with
     * this prefix.
     * @opt_param string maxResults Maximum number of items plus prefixes to return.
     * As duplicate prefixes are omitted, fewer total results may be returned than
     * requested. The default value of this parameter is 1,000 items.
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     * @opt_param string delimiter Returns results in a directory-like mode. items
     * will contain only objects whose names, aside from the prefix, do not contain
     * delimiter. Objects whose names, aside from the prefix, contain delimiter will
     * have their name, truncated after the delimiter, returned in prefixes.
     * Duplicate prefixes are omitted.
     */
    public function listObjects($bucket, $optParams = [])
    {
        $params = ['bucket' => $bucket];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Storage_Objects");
    }

    /**
     * Updates an object's metadata. This method supports patch semantics.
     * (objects.patch)
     *
     * @param string $bucket Name of the bucket in which the object resides.
     * @param string $object Name of the object.
     * @param Google_Service_Storage_StorageObject|Google_StorageObject $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this object.
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the object's current generation does not match the given value.
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the object's current metageneration does not match the given value.
     * @opt_param string projection Set of properties to return. Defaults to full.
     */
    public function patch($bucket, $object, Google_Service_Storage_StorageObject $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Rewrites a source object to a destination object. Optionally overrides
     * metadata. (objects.rewrite)
     *
     * @param string $sourceBucket Name of the bucket in which to find the source
     *                                                                                     object.
     * @param string $sourceObject Name of the source object.
     * @param string $destinationBucket Name of the bucket in which to store the new
     *                                                                                     object. Overrides the provided object metadata's bucket value, if any.
     * @param string $destinationObject Name of the new object. Required when the
     *                                                                                     object metadata is not otherwise provided. Overrides the object metadata's
     *                                                                                     name value, if any.
     * @param Google_Service_Storage_StorageObject|Google_StorageObject $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string ifSourceGenerationNotMatch Makes the operation conditional
     * on whether the source object's generation does not match the given value.
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the destination object's current generation does not match the given
     * value.
     * @opt_param string rewriteToken Include this field (from the previous Rewrite
     * response) on each Rewrite request after the first one, until the Rewrite
     * response 'done' flag is true. Calls that provide a rewriteToken can omit all
     * other request fields, but if included those fields must match the values
     * provided in the first rewrite request.
     * @opt_param string ifSourceMetagenerationNotMatch Makes the operation
     * conditional on whether the source object's current metageneration does not
     * match the given value.
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the destination object's current metageneration matches the given
     * value.
     * @opt_param string sourceGeneration If present, selects a specific revision of
     * the source object (as opposed to the latest version, the default).
     * @opt_param string destinationPredefinedAcl Apply a predefined set of access
     * controls to the destination object.
     * @opt_param string ifSourceGenerationMatch Makes the operation conditional on
     * whether the source object's generation matches the given value.
     * @opt_param string maxBytesRewrittenPerCall The maximum number of bytes that
     * will be rewritten per Rewrite request. Most callers shouldn't need to specify
     * this parameter - it is primarily in place to support testing. If specified
     * the value must be an integral multiple of 1 MiB (1048576). Also, this only
     * applies to requests where the source and destination span locations and/or
     * storage classes. Finally, this value must not change across Rewrite calls
     * else you'll get an error that the rewrite token is invalid.
     * @opt_param string ifSourceMetagenerationMatch Makes the operation conditional
     * on whether the source object's current metageneration matches the given
     * value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the destination object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the destination object's current metageneration does not match the
     * given value.
     * @opt_param string projection Set of properties to return. Defaults to noAcl,
     * unless the object resource specifies the acl property, when it defaults to
     * full.
     */
    public function rewrite($sourceBucket, $sourceObject, $destinationBucket, $destinationObject, Google_Service_Storage_StorageObject $postBody, $optParams = [])
    {
        $params = ['sourceBucket' => $sourceBucket, 'sourceObject' => $sourceObject, 'destinationBucket' => $destinationBucket, 'destinationObject' => $destinationObject, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('rewrite', [$params], "Google_Service_Storage_RewriteResponse");
    }

    /**
     * Updates an object's metadata. (objects.update)
     *
     * @param string $bucket Name of the bucket in which the object resides.
     * @param string $object Name of the object.
     * @param Google_Service_Storage_StorageObject|Google_StorageObject $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string predefinedAcl Apply a predefined set of access controls to
     * this object.
     * @opt_param string ifGenerationNotMatch Makes the operation conditional on
     * whether the object's current generation does not match the given value.
     * @opt_param string generation If present, selects a specific revision of this
     * object (as opposed to the latest version, the default).
     * @opt_param string ifMetagenerationMatch Makes the operation conditional on
     * whether the object's current metageneration matches the given value.
     * @opt_param string ifGenerationMatch Makes the operation conditional on
     * whether the object's current generation matches the given value.
     * @opt_param string ifMetagenerationNotMatch Makes the operation conditional on
     * whether the object's current metageneration does not match the given value.
     * @opt_param string projection Set of properties to return. Defaults to full.
     */
    public function update($bucket, $object, Google_Service_Storage_StorageObject $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'object' => $object, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Storage_StorageObject");
    }

    /**
     * Watch for changes on all objects in a bucket. (objects.watchAll)
     *
     * @param string $bucket Name of the bucket in which to look for objects.
     * @param Google_Channel|Google_Service_Storage_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Set of properties to return. Defaults to noAcl.
     * @opt_param bool versions If true, lists all versions of an object as distinct
     * results. The default is false. For more information, see Object Versioning.
     * @opt_param string prefix Filter results to objects whose names begin with
     * this prefix.
     * @opt_param string maxResults Maximum number of items plus prefixes to return.
     * As duplicate prefixes are omitted, fewer total results may be returned than
     * requested. The default value of this parameter is 1,000 items.
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     * @opt_param string delimiter Returns results in a directory-like mode. items
     * will contain only objects whose names, aside from the prefix, do not contain
     * delimiter. Objects whose names, aside from the prefix, contain delimiter will
     * have their name, truncated after the delimiter, returned in prefixes.
     * Duplicate prefixes are omitted.
     */
    public function watchAll($bucket, Google_Service_Storage_Channel $postBody, $optParams = [])
    {
        $params = ['bucket' => $bucket, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watchAll', [$params], "Google_Service_Storage_Channel");
    }
}


/**
 * Class Google_Service_Storage_Bucket
 */
class Google_Service_Storage_Bucket extends Google_Collection
{
    public $etag;
    public $id;
    public $kind;
    public $location;
    public $metageneration;
    public $name;
    public $projectNumber;
    public $selfLink;
    public $storageClass;
    public $timeCreated;
    protected $collection_key = 'defaultObjectAcl';
    protected $internal_gapi_mappings = [];
    protected $aclType = 'Google_Service_Storage_BucketAccessControl';
    protected $aclDataType = 'array';
    protected $corsType = 'Google_Service_Storage_BucketCors';
    protected $corsDataType = 'array';
    protected $defaultObjectAclType = 'Google_Service_Storage_ObjectAccessControl';
    protected $defaultObjectAclDataType = 'array';
    protected $lifecycleType = 'Google_Service_Storage_BucketLifecycle';
    protected $lifecycleDataType = '';
    protected $loggingType = 'Google_Service_Storage_BucketLogging';
    protected $loggingDataType = '';
    protected $ownerType = 'Google_Service_Storage_BucketOwner';
    protected $ownerDataType = '';
    protected $versioningType = 'Google_Service_Storage_BucketVersioning';
    protected $versioningDataType = '';
    protected $websiteType = 'Google_Service_Storage_BucketWebsite';
    protected $websiteDataType = '';


    /**
     * @param $acl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @param $cors
     */
    public function setCors($cors)
    {
        $this->cors = $cors;
    }

    /**
     * @return mixed
     */
    public function getCors()
    {
        return $this->cors;
    }

    /**
     * @param $defaultObjectAcl
     */
    public function setDefaultObjectAcl($defaultObjectAcl)
    {
        $this->defaultObjectAcl = $defaultObjectAcl;
    }

    /**
     * @return mixed
     */
    public function getDefaultObjectAcl()
    {
        return $this->defaultObjectAcl;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
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
     * @param Google_Service_Storage_BucketLifecycle $lifecycle
     */
    public function setLifecycle(Google_Service_Storage_BucketLifecycle $lifecycle)
    {
        $this->lifecycle = $lifecycle;
    }

    /**
     * @return mixed
     */
    public function getLifecycle()
    {
        return $this->lifecycle;
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
     * @param Google_Service_Storage_BucketLogging $logging
     */
    public function setLogging(Google_Service_Storage_BucketLogging $logging)
    {
        $this->logging = $logging;
    }

    /**
     * @return mixed
     */
    public function getLogging()
    {
        return $this->logging;
    }

    /**
     * @return mixed
     */
    public function getMetageneration()
    {
        return $this->metageneration;
    }

    /**
     * @param $metageneration
     */
    public function setMetageneration($metageneration)
    {
        $this->metageneration = $metageneration;
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
     * @param Google_Service_Storage_BucketOwner $owner
     */
    public function setOwner(Google_Service_Storage_BucketOwner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getProjectNumber()
    {
        return $this->projectNumber;
    }

    /**
     * @param $projectNumber
     */
    public function setProjectNumber($projectNumber)
    {
        $this->projectNumber = $projectNumber;
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
    public function getStorageClass()
    {
        return $this->storageClass;
    }

    /**
     * @param $storageClass
     */
    public function setStorageClass($storageClass)
    {
        $this->storageClass = $storageClass;
    }

    /**
     * @return mixed
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * @param $timeCreated
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;
    }

    /**
     * @param Google_Service_Storage_BucketVersioning $versioning
     */
    public function setVersioning(Google_Service_Storage_BucketVersioning $versioning)
    {
        $this->versioning = $versioning;
    }

    /**
     * @return mixed
     */
    public function getVersioning()
    {
        return $this->versioning;
    }

    /**
     * @param Google_Service_Storage_BucketWebsite $website
     */
    public function setWebsite(Google_Service_Storage_BucketWebsite $website)
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }
}

/**
 * Class Google_Service_Storage_BucketAccessControl
 */
class Google_Service_Storage_BucketAccessControl extends Google_Model
{
    public $bucket;
    public $domain;
    public $email;
    public $entity;
    public $entityId;
    public $etag;
    public $id;
    public $kind;
    public $role;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $projectTeamType = 'Google_Service_Storage_BucketAccessControlProjectTeam';
    protected $projectTeamDataType = '';

    /**
     * @return mixed
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * @param $bucket
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
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
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
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
     * @param Google_Service_Storage_BucketAccessControlProjectTeam $projectTeam
     */
    public function setProjectTeam(Google_Service_Storage_BucketAccessControlProjectTeam $projectTeam)
    {
        $this->projectTeam = $projectTeam;
    }

    /**
     * @return mixed
     */
    public function getProjectTeam()
    {
        return $this->projectTeam;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
 * Class Google_Service_Storage_BucketAccessControlProjectTeam
 */
class Google_Service_Storage_BucketAccessControlProjectTeam extends Google_Model
{
    public $projectNumber;
    public $team;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getProjectNumber()
    {
        return $this->projectNumber;
    }

    /**
     * @param $projectNumber
     */
    public function setProjectNumber($projectNumber)
    {
        $this->projectNumber = $projectNumber;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }
}

/**
 * Class Google_Service_Storage_BucketAccessControls
 */
class Google_Service_Storage_BucketAccessControls extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Storage_BucketAccessControl';
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
}

/**
 * Class Google_Service_Storage_BucketCors
 */
class Google_Service_Storage_BucketCors extends Google_Collection
{
    public $maxAgeSeconds;
    public $method;
    public $origin;
    public $responseHeader;
    protected $collection_key = 'responseHeader';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMaxAgeSeconds()
    {
        return $this->maxAgeSeconds;
    }

    /**
     * @param $maxAgeSeconds
     */
    public function setMaxAgeSeconds($maxAgeSeconds)
    {
        $this->maxAgeSeconds = $maxAgeSeconds;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getResponseHeader()
    {
        return $this->responseHeader;
    }

    /**
     * @param $responseHeader
     */
    public function setResponseHeader($responseHeader)
    {
        $this->responseHeader = $responseHeader;
    }
}

/**
 * Class Google_Service_Storage_BucketLifecycle
 */
class Google_Service_Storage_BucketLifecycle extends Google_Collection
{
    protected $collection_key = 'rule';
    protected $internal_gapi_mappings = [];
    protected $ruleType = 'Google_Service_Storage_BucketLifecycleRule';
    protected $ruleDataType = 'array';


    /**
     * @param $rule
     */
    public function setRule($rule)
    {
        $this->rule = $rule;
    }

    /**
     * @return mixed
     */
    public function getRule()
    {
        return $this->rule;
    }
}

/**
 * Class Google_Service_Storage_BucketLifecycleRule
 */
class Google_Service_Storage_BucketLifecycleRule extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $actionType = 'Google_Service_Storage_BucketLifecycleRuleAction';
    protected $actionDataType = '';
    protected $conditionType = 'Google_Service_Storage_BucketLifecycleRuleCondition';
    protected $conditionDataType = '';


    /**
     * @param Google_Service_Storage_BucketLifecycleRuleAction $action
     */
    public function setAction(Google_Service_Storage_BucketLifecycleRuleAction $action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param Google_Service_Storage_BucketLifecycleRuleCondition $condition
     */
    public function setCondition(Google_Service_Storage_BucketLifecycleRuleCondition $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }
}

/**
 * Class Google_Service_Storage_BucketLifecycleRuleAction
 */
class Google_Service_Storage_BucketLifecycleRuleAction extends Google_Model
{
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Storage_BucketLifecycleRuleCondition
 */
class Google_Service_Storage_BucketLifecycleRuleCondition extends Google_Model
{
    public $age;
    public $createdBefore;
    public $isLive;
    public $numNewerVersions;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getCreatedBefore()
    {
        return $this->createdBefore;
    }

    /**
     * @param $createdBefore
     */
    public function setCreatedBefore($createdBefore)
    {
        $this->createdBefore = $createdBefore;
    }

    /**
     * @return mixed
     */
    public function getIsLive()
    {
        return $this->isLive;
    }

    /**
     * @param $isLive
     */
    public function setIsLive($isLive)
    {
        $this->isLive = $isLive;
    }

    /**
     * @return mixed
     */
    public function getNumNewerVersions()
    {
        return $this->numNewerVersions;
    }

    /**
     * @param $numNewerVersions
     */
    public function setNumNewerVersions($numNewerVersions)
    {
        $this->numNewerVersions = $numNewerVersions;
    }
}

/**
 * Class Google_Service_Storage_BucketLogging
 */
class Google_Service_Storage_BucketLogging extends Google_Model
{
    public $logBucket;
    public $logObjectPrefix;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLogBucket()
    {
        return $this->logBucket;
    }

    /**
     * @param $logBucket
     */
    public function setLogBucket($logBucket)
    {
        $this->logBucket = $logBucket;
    }

    /**
     * @return mixed
     */
    public function getLogObjectPrefix()
    {
        return $this->logObjectPrefix;
    }

    /**
     * @param $logObjectPrefix
     */
    public function setLogObjectPrefix($logObjectPrefix)
    {
        $this->logObjectPrefix = $logObjectPrefix;
    }
}

/**
 * Class Google_Service_Storage_BucketOwner
 */
class Google_Service_Storage_BucketOwner extends Google_Model
{
    public $entity;
    public $entityId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }
}

/**
 * Class Google_Service_Storage_BucketVersioning
 */
class Google_Service_Storage_BucketVersioning extends Google_Model
{
    public $enabled;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
}

/**
 * Class Google_Service_Storage_BucketWebsite
 */
class Google_Service_Storage_BucketWebsite extends Google_Model
{
    public $mainPageSuffix;
    public $notFoundPage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMainPageSuffix()
    {
        return $this->mainPageSuffix;
    }

    /**
     * @param $mainPageSuffix
     */
    public function setMainPageSuffix($mainPageSuffix)
    {
        $this->mainPageSuffix = $mainPageSuffix;
    }

    /**
     * @return mixed
     */
    public function getNotFoundPage()
    {
        return $this->notFoundPage;
    }

    /**
     * @param $notFoundPage
     */
    public function setNotFoundPage($notFoundPage)
    {
        $this->notFoundPage = $notFoundPage;
    }
}

/**
 * Class Google_Service_Storage_Buckets
 */
class Google_Service_Storage_Buckets extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Storage_Bucket';
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
 * Class Google_Service_Storage_Channel
 */
class Google_Service_Storage_Channel extends Google_Model
{
    public $address;
    public $expiration;
    public $id;
    public $kind;
    public $params;
    public $payload;
    public $resourceId;
    public $resourceUri;
    public $token;
    public $type;
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
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
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
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    /**
     * @param $resourceUri
     */
    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
 * Class Google_Service_Storage_ChannelParams
 */
class Google_Service_Storage_ChannelParams extends Google_Model
{
}

/**
 * Class Google_Service_Storage_ComposeRequest
 */
class Google_Service_Storage_ComposeRequest extends Google_Collection
{
    public $kind;
    protected $collection_key = 'sourceObjects';
    protected $internal_gapi_mappings = [];
    protected $destinationType = 'Google_Service_Storage_StorageObject';
    protected $destinationDataType = '';
    protected $sourceObjectsType = 'Google_Service_Storage_ComposeRequestSourceObjects';
    protected $sourceObjectsDataType = 'array';


    /**
     * @param Google_Service_Storage_StorageObject $destination
     */
    public function setDestination(Google_Service_Storage_StorageObject $destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
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
     * @param $sourceObjects
     */
    public function setSourceObjects($sourceObjects)
    {
        $this->sourceObjects = $sourceObjects;
    }

    /**
     * @return mixed
     */
    public function getSourceObjects()
    {
        return $this->sourceObjects;
    }
}

/**
 * Class Google_Service_Storage_ComposeRequestSourceObjects
 */
class Google_Service_Storage_ComposeRequestSourceObjects extends Google_Model
{
    public $generation;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $objectPreconditionsType = 'Google_Service_Storage_ComposeRequestSourceObjectsObjectPreconditions';
    protected $objectPreconditionsDataType = '';

    /**
     * @return mixed
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * @param $generation
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;
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
     * @param Google_Service_Storage_ComposeRequestSourceObjectsObjectPreconditions $objectPreconditions
     */
    public function setObjectPreconditions(Google_Service_Storage_ComposeRequestSourceObjectsObjectPreconditions $objectPreconditions)
    {
        $this->objectPreconditions = $objectPreconditions;
    }

    /**
     * @return mixed
     */
    public function getObjectPreconditions()
    {
        return $this->objectPreconditions;
    }
}

/**
 * Class Google_Service_Storage_ComposeRequestSourceObjectsObjectPreconditions
 */
class Google_Service_Storage_ComposeRequestSourceObjectsObjectPreconditions extends Google_Model
{
    public $ifGenerationMatch;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIfGenerationMatch()
    {
        return $this->ifGenerationMatch;
    }

    /**
     * @param $ifGenerationMatch
     */
    public function setIfGenerationMatch($ifGenerationMatch)
    {
        $this->ifGenerationMatch = $ifGenerationMatch;
    }
}

/**
 * Class Google_Service_Storage_ObjectAccessControl
 */
class Google_Service_Storage_ObjectAccessControl extends Google_Model
{
    public $bucket;
    public $domain;
    public $email;
    public $entity;
    public $entityId;
    public $etag;
    public $generation;
    public $id;
    public $kind;
    public $object;
    public $role;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $projectTeamType = 'Google_Service_Storage_ObjectAccessControlProjectTeam';
    protected $projectTeamDataType = '';

    /**
     * @return mixed
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * @param $bucket
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
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
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * @param $generation
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;
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
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @param Google_Service_Storage_ObjectAccessControlProjectTeam $projectTeam
     */
    public function setProjectTeam(Google_Service_Storage_ObjectAccessControlProjectTeam $projectTeam)
    {
        $this->projectTeam = $projectTeam;
    }

    /**
     * @return mixed
     */
    public function getProjectTeam()
    {
        return $this->projectTeam;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
 * Class Google_Service_Storage_ObjectAccessControlProjectTeam
 */
class Google_Service_Storage_ObjectAccessControlProjectTeam extends Google_Model
{
    public $projectNumber;
    public $team;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getProjectNumber()
    {
        return $this->projectNumber;
    }

    /**
     * @param $projectNumber
     */
    public function setProjectNumber($projectNumber)
    {
        $this->projectNumber = $projectNumber;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }
}

/**
 * Class Google_Service_Storage_ObjectAccessControls
 */
class Google_Service_Storage_ObjectAccessControls extends Google_Collection
{
    public $items;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Storage_Objects
 */
class Google_Service_Storage_Objects extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $prefixes;
    protected $collection_key = 'prefixes';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Storage_StorageObject';
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
    public function getPrefixes()
    {
        return $this->prefixes;
    }

    /**
     * @param $prefixes
     */
    public function setPrefixes($prefixes)
    {
        $this->prefixes = $prefixes;
    }
}

/**
 * Class Google_Service_Storage_RewriteResponse
 */
class Google_Service_Storage_RewriteResponse extends Google_Model
{
    public $done;
    public $kind;
    public $objectSize;
    public $rewriteToken;
    public $totalBytesRewritten;
    protected $internal_gapi_mappings = [];
    protected $resourceType = 'Google_Service_Storage_StorageObject';
    protected $resourceDataType = '';

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * @param $done
     */
    public function setDone($done)
    {
        $this->done = $done;
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
    public function getObjectSize()
    {
        return $this->objectSize;
    }

    /**
     * @param $objectSize
     */
    public function setObjectSize($objectSize)
    {
        $this->objectSize = $objectSize;
    }

    /**
     * @param Google_Service_Storage_StorageObject $resource
     */
    public function setResource(Google_Service_Storage_StorageObject $resource)
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

    /**
     * @return mixed
     */
    public function getRewriteToken()
    {
        return $this->rewriteToken;
    }

    /**
     * @param $rewriteToken
     */
    public function setRewriteToken($rewriteToken)
    {
        $this->rewriteToken = $rewriteToken;
    }

    /**
     * @return mixed
     */
    public function getTotalBytesRewritten()
    {
        return $this->totalBytesRewritten;
    }

    /**
     * @param $totalBytesRewritten
     */
    public function setTotalBytesRewritten($totalBytesRewritten)
    {
        $this->totalBytesRewritten = $totalBytesRewritten;
    }
}

/**
 * Class Google_Service_Storage_StorageObject
 */
class Google_Service_Storage_StorageObject extends Google_Collection
{
    public $bucket;
    public $cacheControl;
    public $componentCount;
    public $contentDisposition;
    public $contentEncoding;
    public $contentLanguage;
    public $contentType;
    public $crc32c;
    public $etag;
    public $generation;
    public $id;
    public $kind;
    public $md5Hash;
    public $mediaLink;
    public $metadata;
    public $metageneration;
    public $name;
    public $selfLink;
    public $size;
    public $storageClass;
    public $timeDeleted;
    public $updated;
    protected $collection_key = 'acl';
    protected $internal_gapi_mappings = [];
    protected $aclType = 'Google_Service_Storage_ObjectAccessControl';
    protected $aclDataType = 'array';
    protected $ownerType = 'Google_Service_Storage_StorageObjectOwner';
    protected $ownerDataType = '';

    /**
     * @param $acl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @return mixed
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * @param $bucket
     */
    public function setBucket($bucket)
    {
        $this->bucket = $bucket;
    }

    /**
     * @return mixed
     */
    public function getCacheControl()
    {
        return $this->cacheControl;
    }

    /**
     * @param $cacheControl
     */
    public function setCacheControl($cacheControl)
    {
        $this->cacheControl = $cacheControl;
    }

    /**
     * @return mixed
     */
    public function getComponentCount()
    {
        return $this->componentCount;
    }

    /**
     * @param $componentCount
     */
    public function setComponentCount($componentCount)
    {
        $this->componentCount = $componentCount;
    }

    /**
     * @return mixed
     */
    public function getContentDisposition()
    {
        return $this->contentDisposition;
    }

    /**
     * @param $contentDisposition
     */
    public function setContentDisposition($contentDisposition)
    {
        $this->contentDisposition = $contentDisposition;
    }

    /**
     * @return mixed
     */
    public function getContentEncoding()
    {
        return $this->contentEncoding;
    }

    /**
     * @param $contentEncoding
     */
    public function setContentEncoding($contentEncoding)
    {
        $this->contentEncoding = $contentEncoding;
    }

    /**
     * @return mixed
     */
    public function getContentLanguage()
    {
        return $this->contentLanguage;
    }

    /**
     * @param $contentLanguage
     */
    public function setContentLanguage($contentLanguage)
    {
        $this->contentLanguage = $contentLanguage;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getCrc32c()
    {
        return $this->crc32c;
    }

    /**
     * @param $crc32c
     */
    public function setCrc32c($crc32c)
    {
        $this->crc32c = $crc32c;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * @param $generation
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;
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
    public function getMd5Hash()
    {
        return $this->md5Hash;
    }

    /**
     * @param $md5Hash
     */
    public function setMd5Hash($md5Hash)
    {
        $this->md5Hash = $md5Hash;
    }

    /**
     * @return mixed
     */
    public function getMediaLink()
    {
        return $this->mediaLink;
    }

    /**
     * @param $mediaLink
     */
    public function setMediaLink($mediaLink)
    {
        $this->mediaLink = $mediaLink;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetageneration()
    {
        return $this->metageneration;
    }

    /**
     * @param $metageneration
     */
    public function setMetageneration($metageneration)
    {
        $this->metageneration = $metageneration;
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
     * @param Google_Service_Storage_StorageObjectOwner $owner
     */
    public function setOwner(Google_Service_Storage_StorageObjectOwner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
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

    /**
     * @return mixed
     */
    public function getStorageClass()
    {
        return $this->storageClass;
    }

    /**
     * @param $storageClass
     */
    public function setStorageClass($storageClass)
    {
        $this->storageClass = $storageClass;
    }

    /**
     * @return mixed
     */
    public function getTimeDeleted()
    {
        return $this->timeDeleted;
    }

    /**
     * @param $timeDeleted
     */
    public function setTimeDeleted($timeDeleted)
    {
        $this->timeDeleted = $timeDeleted;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Storage_StorageObjectMetadata
 */
class Google_Service_Storage_StorageObjectMetadata extends Google_Model
{
}

/**
 * Class Google_Service_Storage_StorageObjectOwner
 */
class Google_Service_Storage_StorageObjectOwner extends Google_Model
{
    public $entity;
    public $entityId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }
}
