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
 * Service definition for MapsEngine (v1).
 *
 * <p>
 * The Google Maps Engine API allows developers to store and query geospatial
 * vector and raster data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/maps-engine/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_MapsEngine extends Google_Service
{
    /** View and manage your Google My Maps data. */
    const MAPSENGINE =
        "https://www.googleapis.com/auth/mapsengine";
    /** View your Google My Maps data. */
    const MAPSENGINE_READONLY =
        "https://www.googleapis.com/auth/mapsengine.readonly";

    public $assets;
    public $assets_parents;
    public $assets_permissions;
    public $layers;
    public $layers_parents;
    public $layers_permissions;
    public $maps;
    public $maps_permissions;
    public $projects;
    public $projects_icons;
    public $rasterCollections;
    public $rasterCollections_parents;
    public $rasterCollections_permissions;
    public $rasterCollections_rasters;
    public $rasters;
    public $rasters_files;
    public $rasters_parents;
    public $rasters_permissions;
    public $tables;
    public $tables_features;
    public $tables_files;
    public $tables_parents;
    public $tables_permissions;


    /**
     * Constructs the internal representation of the MapsEngine service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'mapsengine/v1/';
        $this->version = 'v1';
        $this->serviceName = 'mapsengine';

        $this->assets = new Google_Service_MapsEngine_Assets_Resource(
            $this,
            $this->serviceName,
            'assets',
            [
                'methods' => [
                    'get' => [
                        'path' => 'assets/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'assets',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
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
        $this->assets_parents = new Google_Service_MapsEngine_AssetsParents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'list' => [
                        'path' => 'assets/{id}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
        $this->assets_permissions = new Google_Service_MapsEngine_AssetsPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'assets/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->layers = new Google_Service_MapsEngine_Layers_Resource(
            $this,
            $this->serviceName,
            'layers',
            [
                'methods' => [
                    'cancelProcessing' => [
                        'path' => 'layers/{id}/cancelProcessing',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'create' => [
                        'path' => 'layers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'process' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'layers/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'layers/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'version' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getPublished' => [
                        'path' => 'layers/{id}/published',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'layers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'processingStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listPublished' => [
                        'path' => 'layers/published',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'layers/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'process' => [
                        'path' => 'layers/{id}/process',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'publish' => [
                        'path' => 'layers/{id}/publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'force' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'unpublish' => [
                        'path' => 'layers/{id}/unpublish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->layers_parents = new Google_Service_MapsEngine_LayersParents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'list' => [
                        'path' => 'layers/{id}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
        $this->layers_permissions = new Google_Service_MapsEngine_LayersPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'layers/{id}/permissions/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchUpdate' => [
                        'path' => 'layers/{id}/permissions/batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'layers/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->maps = new Google_Service_MapsEngine_Maps_Resource(
            $this,
            $this->serviceName,
            'maps',
            [
                'methods' => [
                    'create' => [
                        'path' => 'maps',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'maps/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'maps/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'version' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getPublished' => [
                        'path' => 'maps/{id}/published',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'maps',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'processingStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listPublished' => [
                        'path' => 'maps/published',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'maps/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'publish' => [
                        'path' => 'maps/{id}/publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'force' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'unpublish' => [
                        'path' => 'maps/{id}/unpublish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->maps_permissions = new Google_Service_MapsEngine_MapsPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'maps/{id}/permissions/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchUpdate' => [
                        'path' => 'maps/{id}/permissions/batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'maps/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects = new Google_Service_MapsEngine_Projects_Resource(
            $this,
            $this->serviceName,
            'projects',
            [
                'methods' => [
                    'list' => [
                        'path' => 'projects',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->projects_icons = new Google_Service_MapsEngine_ProjectsIcons_Resource(
            $this,
            $this->serviceName,
            'icons',
            [
                'methods' => [
                    'create' => [
                        'path' => 'projects/{projectId}/icons',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{projectId}/icons/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{projectId}/icons',
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
        $this->rasterCollections = new Google_Service_MapsEngine_RasterCollections_Resource(
            $this,
            $this->serviceName,
            'rasterCollections',
            [
                'methods' => [
                    'cancelProcessing' => [
                        'path' => 'rasterCollections/{id}/cancelProcessing',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'create' => [
                        'path' => 'rasterCollections',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'rasterCollections/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'rasterCollections/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rasterCollections',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'processingStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'rasterCollections/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'process' => [
                        'path' => 'rasterCollections/{id}/process',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->rasterCollections_parents = new Google_Service_MapsEngine_RasterCollectionsParents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'list' => [
                        'path' => 'rasterCollections/{id}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
        $this->rasterCollections_permissions = new Google_Service_MapsEngine_RasterCollectionsPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'rasterCollections/{id}/permissions/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchUpdate' => [
                        'path' => 'rasterCollections/{id}/permissions/batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rasterCollections/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->rasterCollections_rasters = new Google_Service_MapsEngine_RasterCollectionsRasters_Resource(
            $this,
            $this->serviceName,
            'rasters',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'rasterCollections/{id}/rasters/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchInsert' => [
                        'path' => 'rasterCollections/{id}/rasters/batchInsert',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rasterCollections/{id}/rasters',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->rasters = new Google_Service_MapsEngine_Rasters_Resource(
            $this,
            $this->serviceName,
            'rasters',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'rasters/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'rasters/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rasters',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'processingStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'rasters/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'process' => [
                        'path' => 'rasters/{id}/process',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'upload' => [
                        'path' => 'rasters/upload',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->rasters_files = new Google_Service_MapsEngine_RastersFiles_Resource(
            $this,
            $this->serviceName,
            'files',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'rasters/{id}/files',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filename' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->rasters_parents = new Google_Service_MapsEngine_RastersParents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'list' => [
                        'path' => 'rasters/{id}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
        $this->rasters_permissions = new Google_Service_MapsEngine_RastersPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'rasters/{id}/permissions/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchUpdate' => [
                        'path' => 'rasters/{id}/permissions/batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rasters/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tables = new Google_Service_MapsEngine_Tables_Resource(
            $this,
            $this->serviceName,
            'tables',
            [
                'methods' => [
                    'create' => [
                        'path' => 'tables',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'tables/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'version' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'modifiedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'processingStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tags' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'search' => [
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
                            'creatorEmail' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'bbox' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'modifiedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'createdBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'tables/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'process' => [
                        'path' => 'tables/{id}/process',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'upload' => [
                        'path' => 'tables/upload',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->tables_features = new Google_Service_MapsEngine_TablesFeatures_Resource(
            $this,
            $this->serviceName,
            'features',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'tables/{id}/features/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchInsert' => [
                        'path' => 'tables/{id}/features/batchInsert',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchPatch' => [
                        'path' => 'tables/{id}/features/batchPatch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}/features/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'version' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'select' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{id}/features',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'intersects' => [
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
                            'version' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'limit' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'include' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'where' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'select' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tables_files = new Google_Service_MapsEngine_TablesFiles_Resource(
            $this,
            $this->serviceName,
            'files',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'tables/{id}/files',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filename' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tables_parents = new Google_Service_MapsEngine_TablesParents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'list' => [
                        'path' => 'tables/{id}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
        $this->tables_permissions = new Google_Service_MapsEngine_TablesPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'batchDelete' => [
                        'path' => 'tables/{id}/permissions/batchDelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'batchUpdate' => [
                        'path' => 'tables/{id}/permissions/batchUpdate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{id}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
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
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $assets = $mapsengineService->assets;
 *  </code>
 */
class Google_Service_MapsEngine_Assets_Resource extends Google_Service_Resource
{

    /**
     * Return metadata for a particular asset. (assets.get)
     *
     * @param string $id The ID of the asset.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Asset");
    }

    /**
     * Return all assets readable by the current user. (assets.listAssets)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     * @opt_param string type A comma separated list of asset types. Returned assets
     * will have one of the types from the provided list. Supported values are
     * 'map', 'layer', 'rasterCollection' and 'table'.
     */
    public function listAssets($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_AssetsListResponse");
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_MapsEngine_AssetsParents_Resource extends Google_Service_Resource
{

    /**
     * Return all parent ids of the specified asset. (parents.listAssetsParents)
     *
     * @param string $id The ID of the asset whose parents will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listAssetsParents($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ParentsListResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_AssetsPermissions_Resource extends Google_Service_Resource
{

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listAssetsPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAssetsPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}

/**
 * The "layers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $layers = $mapsengineService->layers;
 *  </code>
 */
class Google_Service_MapsEngine_Layers_Resource extends Google_Service_Resource
{

    /**
     * Cancel processing on a layer asset. (layers.cancelProcessing)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function cancelProcessing($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('cancelProcessing', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }

    /**
     * Create a layer asset. (layers.create)
     *
     * @param Google_Layer|Google_Service_MapsEngine_Layer $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool process Whether to queue the created layer for processing.
     */
    public function create(Google_Service_MapsEngine_Layer $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_MapsEngine_Layer");
    }

    /**
     * Delete a layer. (layers.delete)
     *
     * @param string $id The ID of the layer. Only the layer creator or project
     *                          owner are permitted to delete. If the layer is published, or included in a
     *                          map, the request will fail. Unpublish the layer, and remove it from all maps
     *                          prior to deleting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Return metadata for a particular layer. (layers.get)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string version Deprecated: The version parameter indicates which
     * version of the layer should be returned. When version is set to published,
     * the published version of the layer will be returned. Please use the
     * layers.getPublished endpoint instead.
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Layer");
    }

    /**
     * Return the published metadata for a particular layer. (layers.getPublished)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getPublished($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('getPublished', [$params], "Google_Service_MapsEngine_PublishedLayer");
    }

    /**
     * Return all layers readable by the current user. (layers.listLayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string processingStatus
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listLayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_LayersListResponse");
    }

    /**
     * Return all published layers readable by the current user.
     * (layers.listPublished)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     */
    public function listPublished($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listPublished', [$params], "Google_Service_MapsEngine_PublishedLayersListResponse");
    }

    /**
     * Mutate a layer asset. (layers.patch)
     *
     * @param string $id The ID of the layer.
     * @param Google_Layer|Google_Service_MapsEngine_Layer $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_MapsEngine_Layer $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params]);
    }

    /**
     * Process a layer asset. (layers.process)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function process($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('process', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }

    /**
     * Publish a layer asset. (layers.publish)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool force If set to true, the API will allow publication of the
     * layer even if it's out of date. If not true, you'll need to reprocess any
     * out-of-date layer before publishing.
     */
    public function publish($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_MapsEngine_PublishResponse");
    }

    /**
     * Unpublish a layer asset. (layers.unpublish)
     *
     * @param string $id The ID of the layer.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function unpublish($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('unpublish', [$params], "Google_Service_MapsEngine_PublishResponse");
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_MapsEngine_LayersParents_Resource extends Google_Service_Resource
{

    /**
     * Return all parent ids of the specified layer. (parents.listLayersParents)
     *
     * @param string $id The ID of the layer whose parents will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listLayersParents($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ParentsListResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_LayersPermissions_Resource extends Google_Service_Resource
{

    /**
     * Remove permission entries from an already existing asset.
     * (permissions.batchDelete)
     *
     * @param string $id The ID of the asset from which permissions will be removed.
     * @param Google_PermissionsBatchDeleteRequest|Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_PermissionsBatchDeleteResponse");
    }

    /**
     * Add or update permission entries to an already existing asset.
     *
     * An asset can hold up to 20 different permission entries. Each batchInsert
     * request is atomic. (permissions.batchUpdate)
     *
     * @param string $id The ID of the asset to which permissions will be added.
     * @param Google_PermissionsBatchUpdateRequest|Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchUpdate($id, Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchUpdate', [$params], "Google_Service_MapsEngine_PermissionsBatchUpdateResponse");
    }

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listLayersPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listLayersPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}

/**
 * The "maps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $maps = $mapsengineService->maps;
 *  </code>
 */
class Google_Service_MapsEngine_Maps_Resource extends Google_Service_Resource
{

    /**
     * Create a map asset. (maps.create)
     *
     * @param Google_Map|Google_Service_MapsEngine_Map $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_MapsEngine_Map $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_MapsEngine_Map");
    }

    /**
     * Delete a map. (maps.delete)
     *
     * @param string $id The ID of the map. Only the map creator or project owner
     *                          are permitted to delete. If the map is published the request will fail.
     *                          Unpublish the map prior to deleting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Return metadata for a particular map. (maps.get)
     *
     * @param string $id The ID of the map.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string version Deprecated: The version parameter indicates which
     * version of the map should be returned. When version is set to published, the
     * published version of the map will be returned. Please use the
     * maps.getPublished endpoint instead.
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Map");
    }

    /**
     * Return the published metadata for a particular map. (maps.getPublished)
     *
     * @param string $id The ID of the map.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getPublished($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('getPublished', [$params], "Google_Service_MapsEngine_PublishedMap");
    }

    /**
     * Return all maps readable by the current user. (maps.listMaps)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string processingStatus
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listMaps($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_MapsListResponse");
    }

    /**
     * Return all published maps readable by the current user. (maps.listPublished)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     */
    public function listPublished($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listPublished', [$params], "Google_Service_MapsEngine_PublishedMapsListResponse");
    }

    /**
     * Mutate a map asset. (maps.patch)
     *
     * @param string $id The ID of the map.
     * @param Google_Map|Google_Service_MapsEngine_Map $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_MapsEngine_Map $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params]);
    }

    /**
     * Publish a map asset. (maps.publish)
     *
     * @param string $id The ID of the map.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool force If set to true, the API will allow publication of the
     * map even if it's out of date. If false, the map must have a processingStatus
     * of complete before publishing.
     */
    public function publish($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_MapsEngine_PublishResponse");
    }

    /**
     * Unpublish a map asset. (maps.unpublish)
     *
     * @param string $id The ID of the map.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function unpublish($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('unpublish', [$params], "Google_Service_MapsEngine_PublishResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_MapsPermissions_Resource extends Google_Service_Resource
{

    /**
     * Remove permission entries from an already existing asset.
     * (permissions.batchDelete)
     *
     * @param string $id The ID of the asset from which permissions will be removed.
     * @param Google_PermissionsBatchDeleteRequest|Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_PermissionsBatchDeleteResponse");
    }

    /**
     * Add or update permission entries to an already existing asset.
     *
     * An asset can hold up to 20 different permission entries. Each batchInsert
     * request is atomic. (permissions.batchUpdate)
     *
     * @param string $id The ID of the asset to which permissions will be added.
     * @param Google_PermissionsBatchUpdateRequest|Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchUpdate($id, Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchUpdate', [$params], "Google_Service_MapsEngine_PermissionsBatchUpdateResponse");
    }

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listMapsPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listMapsPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $projects = $mapsengineService->projects;
 *  </code>
 */
class Google_Service_MapsEngine_Projects_Resource extends Google_Service_Resource
{

    /**
     * Return all projects readable by the current user. (projects.listProjects)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listProjects($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ProjectsListResponse");
    }
}

/**
 * The "icons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $icons = $mapsengineService->icons;
 *  </code>
 */
class Google_Service_MapsEngine_ProjectsIcons_Resource extends Google_Service_Resource
{

    /**
     * Create an icon. (icons.create)
     *
     * @param string $projectId The ID of the project.
     * @param Google_Icon|Google_Service_MapsEngine_Icon $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create($projectId, Google_Service_MapsEngine_Icon $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_MapsEngine_Icon");
    }

    /**
     * Return an icon or its associated metadata (icons.get)
     *
     * @param string $projectId The ID of the project.
     * @param string $id The ID of the icon.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $id, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Icon");
    }

    /**
     * Return all icons in the current project (icons.listProjectsIcons)
     *
     * @param string $projectId The ID of the project.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listProjectsIcons($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_IconsListResponse");
    }
}

/**
 * The "rasterCollections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $rasterCollections = $mapsengineService->rasterCollections;
 *  </code>
 */
class Google_Service_MapsEngine_RasterCollections_Resource extends Google_Service_Resource
{

    /**
     * Cancel processing on a raster collection asset.
     * (rasterCollections.cancelProcessing)
     *
     * @param string $id The ID of the raster collection.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function cancelProcessing($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('cancelProcessing', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }

    /**
     * Create a raster collection asset. (rasterCollections.create)
     *
     * @param Google_RasterCollection|Google_Service_MapsEngine_RasterCollection $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_MapsEngine_RasterCollection $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_MapsEngine_RasterCollection");
    }

    /**
     * Delete a raster collection. (rasterCollections.delete)
     *
     * @param string $id The ID of the raster collection. Only the raster collection
     *                          creator or project owner are permitted to delete. If the rastor collection is
     *                          included in a layer, the request will fail. Remove the raster collection from
     *                          all layers prior to deleting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Return metadata for a particular raster collection. (rasterCollections.get)
     *
     * @param string $id The ID of the raster collection.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_RasterCollection");
    }

    /**
     * Return all raster collections readable by the current user.
     * (rasterCollections.listRasterCollections)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string processingStatus
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listRasterCollections($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_RasterCollectionsListResponse");
    }

    /**
     * Mutate a raster collection asset. (rasterCollections.patch)
     *
     * @param string $id The ID of the raster collection.
     * @param Google_RasterCollection|Google_Service_MapsEngine_RasterCollection $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_MapsEngine_RasterCollection $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params]);
    }

    /**
     * Process a raster collection asset. (rasterCollections.process)
     *
     * @param string $id The ID of the raster collection.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function process($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('process', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_MapsEngine_RasterCollectionsParents_Resource extends Google_Service_Resource
{

    /**
     * Return all parent ids of the specified raster collection.
     * (parents.listRasterCollectionsParents)
     *
     * @param string $id The ID of the raster collection whose parents will be
     *                          listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listRasterCollectionsParents($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ParentsListResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_RasterCollectionsPermissions_Resource extends Google_Service_Resource
{

    /**
     * Remove permission entries from an already existing asset.
     * (permissions.batchDelete)
     *
     * @param string $id The ID of the asset from which permissions will be removed.
     * @param Google_PermissionsBatchDeleteRequest|Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_PermissionsBatchDeleteResponse");
    }

    /**
     * Add or update permission entries to an already existing asset.
     *
     * An asset can hold up to 20 different permission entries. Each batchInsert
     * request is atomic. (permissions.batchUpdate)
     *
     * @param string $id The ID of the asset to which permissions will be added.
     * @param Google_PermissionsBatchUpdateRequest|Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchUpdate($id, Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchUpdate', [$params], "Google_Service_MapsEngine_PermissionsBatchUpdateResponse");
    }

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listRasterCollectionsPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listRasterCollectionsPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}

/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class Google_Service_MapsEngine_RasterCollectionsRasters_Resource extends Google_Service_Resource
{

    /**
     * Remove rasters from an existing raster collection.
     *
     * Up to 50 rasters can be included in a single batchDelete request. Each
     * batchDelete request is atomic. (rasters.batchDelete)
     *
     * @param string $id The ID of the raster collection to which these rasters
     *                                                                                                                                        belong.
     * @param Google_RasterCollectionsRasterBatchDeleteRequest|Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse");
    }

    /**
     * Add rasters to an existing raster collection. Rasters must be successfully
     * processed in order to be added to a raster collection.
     *
     * Up to 50 rasters can be included in a single batchInsert request. Each
     * batchInsert request is atomic. (rasters.batchInsert)
     *
     * @param string $id The ID of the raster collection to which these rasters
     *                                                                                                                                          belong.
     * @param Google_RasterCollectionsRastersBatchInsertRequest|Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchInsert($id, Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchInsert', [$params], "Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse");
    }

    /**
     * Return all rasters within a raster collection.
     * (rasters.listRasterCollectionsRasters)
     *
     * @param string $id The ID of the raster collection to which these rasters
     *                          belong.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listRasterCollectionsRasters($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_RasterCollectionsRastersListResponse");
    }
}

/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class Google_Service_MapsEngine_Rasters_Resource extends Google_Service_Resource
{

    /**
     * Delete a raster. (rasters.delete)
     *
     * @param string $id The ID of the raster. Only the raster creator or project
     *                          owner are permitted to delete. If the raster is included in a layer or
     *                          mosaic, the request will fail. Remove it from all parents prior to deleting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Return metadata for a single raster. (rasters.get)
     *
     * @param string $id The ID of the raster.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Raster");
    }

    /**
     * Return all rasters readable by the current user. (rasters.listRasters)
     *
     * @param string $projectId The ID of a Maps Engine project, used to filter the
     *                          response. To list all available projects with their IDs, send a Projects:
     *                          list request. You can also find your project ID as the value of the
     *                          DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string processingStatus
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listRasters($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_RastersListResponse");
    }

    /**
     * Mutate a raster asset. (rasters.patch)
     *
     * @param string $id The ID of the raster.
     * @param Google_Raster|Google_Service_MapsEngine_Raster $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_MapsEngine_Raster $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params]);
    }

    /**
     * Process a raster asset. (rasters.process)
     *
     * @param string $id The ID of the raster.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function process($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('process', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }

    /**
     * Create a skeleton raster asset for upload. (rasters.upload)
     *
     * @param Google_Raster|Google_Service_MapsEngine_Raster $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function upload(Google_Service_MapsEngine_Raster $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('upload', [$params], "Google_Service_MapsEngine_Raster");
    }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class Google_Service_MapsEngine_RastersFiles_Resource extends Google_Service_Resource
{

    /**
     * Upload a file to a raster asset. (files.insert)
     *
     * @param string $id The ID of the raster asset.
     * @param string $filename The file name of this uploaded file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($id, $filename, $optParams = [])
    {
        $params = ['id' => $id, 'filename' => $filename];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params]);
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_MapsEngine_RastersParents_Resource extends Google_Service_Resource
{

    /**
     * Return all parent ids of the specified rasters. (parents.listRastersParents)
     *
     * @param string $id The ID of the rasters whose parents will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listRastersParents($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ParentsListResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_RastersPermissions_Resource extends Google_Service_Resource
{

    /**
     * Remove permission entries from an already existing asset.
     * (permissions.batchDelete)
     *
     * @param string $id The ID of the asset from which permissions will be removed.
     * @param Google_PermissionsBatchDeleteRequest|Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_PermissionsBatchDeleteResponse");
    }

    /**
     * Add or update permission entries to an already existing asset.
     *
     * An asset can hold up to 20 different permission entries. Each batchInsert
     * request is atomic. (permissions.batchUpdate)
     *
     * @param string $id The ID of the asset to which permissions will be added.
     * @param Google_PermissionsBatchUpdateRequest|Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchUpdate($id, Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchUpdate', [$params], "Google_Service_MapsEngine_PermissionsBatchUpdateResponse");
    }

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listRastersPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listRastersPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}

/**
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $tables = $mapsengineService->tables;
 *  </code>
 */
class Google_Service_MapsEngine_Tables_Resource extends Google_Service_Resource
{

    /**
     * Create a table asset. (tables.create)
     *
     * @param Google_Service_MapsEngine_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_MapsEngine_Table $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_MapsEngine_Table");
    }

    /**
     * Delete a table. (tables.delete)
     *
     * @param string $id The ID of the table. Only the table creator or project
     *                          owner are permitted to delete. If the table is included in a layer, the
     *                          request will fail. Remove it from all layers prior to deleting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Return metadata for a particular table, including the schema. (tables.get)
     *
     * @param string $id The ID of the table.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string version
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Table");
    }

    /**
     * Return all tables readable by the current user. (tables.listTables)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string modifiedAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or after
     * this time.
     * @opt_param string createdAfter An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or after
     * this time.
     * @opt_param string processingStatus
     * @opt_param string projectId The ID of a Maps Engine project, used to filter
     * the response. To list all available projects with their IDs, send a Projects:
     * list request. You can also find your project ID as the value of the
     * DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
     * @opt_param string tags A comma separated list of tags. Returned assets will
     * contain all the tags from the list.
     * @opt_param string search An unstructured search string used to filter the set
     * of results based on asset metadata.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 100.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string creatorEmail An email address representing a user. Returned
     * assets that have been created by the user associated with the provided email
     * address.
     * @opt_param string bbox A bounding box, expressed as "west,south,east,north".
     * If set, only assets which intersect this bounding box will be returned.
     * @opt_param string modifiedBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been modified at or before
     * this time.
     * @opt_param string createdBefore An RFC 3339 formatted date-time value (e.g.
     * 1970-01-01T00:00:00Z). Returned assets will have been created at or before
     * this time.
     * @opt_param string role The role parameter indicates that the response should
     * only contain assets where the current user has the specified level of access.
     */
    public function listTables($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_TablesListResponse");
    }

    /**
     * Mutate a table asset. (tables.patch)
     *
     * @param string $id The ID of the table.
     * @param Google_Service_MapsEngine_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_MapsEngine_Table $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params]);
    }

    /**
     * Process a table asset. (tables.process)
     *
     * @param string $id The ID of the table.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function process($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('process', [$params], "Google_Service_MapsEngine_ProcessResponse");
    }

    /**
     * Create a placeholder table asset to which table files can be uploaded. Once
     * the placeholder has been created, files are uploaded to the
     * https://www.googleapis.com/upload/mapsengine/v1/tables/table_id/files
     * endpoint. See Table Upload in the Developer's Guide or Table.files: insert in
     * the reference documentation for more information. (tables.upload)
     *
     * @param Google_Service_MapsEngine_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function upload(Google_Service_MapsEngine_Table $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('upload', [$params], "Google_Service_MapsEngine_Table");
    }
}

/**
 * The "features" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $features = $mapsengineService->features;
 *  </code>
 */
class Google_Service_MapsEngine_TablesFeatures_Resource extends Google_Service_Resource
{

    /**
     * Delete all features matching the given IDs. (features.batchDelete)
     *
     * @param string $id The ID of the table that contains the features to be
     *                                                                                                          deleted.
     * @param Google_FeaturesBatchDeleteRequest|Google_Service_MapsEngine_FeaturesBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_FeaturesBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params]);
    }

    /**
     * Append features to an existing table.
     *
     * A single batchInsert request can create:
     *
     * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
     * are documented in the Supported data formats and limits article of the Google
     * Maps Engine help center. Note that free and paid accounts have different
     * limits.
     *
     * For more information about inserting features, read Creating features in the
     * Google Maps Engine developer's guide. (features.batchInsert)
     *
     * @param string $id The ID of the table to append the features to.
     * @param Google_FeaturesBatchInsertRequest|Google_Service_MapsEngine_FeaturesBatchInsertRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchInsert($id, Google_Service_MapsEngine_FeaturesBatchInsertRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchInsert', [$params]);
    }

    /**
     * Update the supplied features.
     *
     * A single batchPatch request can update:
     *
     * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
     * are documented in the Supported data formats and limits article of the Google
     * Maps Engine help center. Note that free and paid accounts have different
     * limits.
     *
     * Feature updates use HTTP PATCH semantics:
     *
     * - A supplied value replaces an existing value (if any) in that field. -
     * Omitted fields remain unchanged. - Complex values in geometries and
     * properties must be replaced as atomic units. For example, providing just the
     * coordinates of a geometry is not allowed; the complete geometry, including
     * type, must be supplied. - Setting a property's value to null deletes that
     * property. For more information about updating features, read Updating
     * features in the Google Maps Engine developer's guide. (features.batchPatch)
     *
     * @param string $id The ID of the table containing the features to be patched.
     * @param Google_FeaturesBatchPatchRequest|Google_Service_MapsEngine_FeaturesBatchPatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchPatch($id, Google_Service_MapsEngine_FeaturesBatchPatchRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchPatch', [$params]);
    }

    /**
     * Return a single feature, given its ID. (features.get)
     *
     * @param string $tableId The ID of the table.
     * @param string $id The ID of the feature to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string version The table version to access. See Accessing Public
     * Data for information.
     * @opt_param string select A SQL-like projection clause used to specify
     * returned properties. If this parameter is not included, all properties are
     * returned.
     */
    public function get($tableId, $id, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_MapsEngine_Feature");
    }

    /**
     * Return all features readable by the current user.
     * (features.listTablesFeatures)
     *
     * @param string $id The ID of the table to which these features belong.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy An SQL-like order by clause used to sort results.
     * If this parameter is not included, the order of features is undefined.
     * @opt_param string intersects A geometry literal that specifies the spatial
     * restriction of the query.
     * @opt_param string maxResults The maximum number of items to include in the
     * response, used for paging. The maximum supported value is 1000.
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string version The table version to access. See Accessing Public
     * Data for information.
     * @opt_param string limit The total number of features to return from the
     * query, irrespective of the number of pages.
     * @opt_param string include A comma separated list of optional data to include.
     * Optional data available: schema.
     * @opt_param string where An SQL-like predicate used to filter results.
     * @opt_param string select A SQL-like projection clause used to specify
     * returned properties. If this parameter is not included, all properties are
     * returned.
     */
    public function listTablesFeatures($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_FeaturesListResponse");
    }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class Google_Service_MapsEngine_TablesFiles_Resource extends Google_Service_Resource
{

    /**
     * Upload a file to a placeholder table asset. See Table Upload in the
     * Developer's Guide for more information. Supported file types are listed in
     * the Supported data formats and limits article of the Google Maps Engine help
     * center. (files.insert)
     *
     * @param string $id The ID of the table asset.
     * @param string $filename The file name of this uploaded file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($id, $filename, $optParams = [])
    {
        $params = ['id' => $id, 'filename' => $filename];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params]);
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class Google_Service_MapsEngine_TablesParents_Resource extends Google_Service_Resource
{

    /**
     * Return all parent ids of the specified table. (parents.listTablesParents)
     *
     * @param string $id The ID of the table whose parents will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of nextPageToken from the previous response.
     * @opt_param string maxResults The maximum number of items to include in a
     * single response page. The maximum supported value is 50.
     */
    public function listTablesParents($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_ParentsListResponse");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new Google_Service_MapsEngine(...);
 *   $permissions = $mapsengineService->permissions;
 *  </code>
 */
class Google_Service_MapsEngine_TablesPermissions_Resource extends Google_Service_Resource
{

    /**
     * Remove permission entries from an already existing asset.
     * (permissions.batchDelete)
     *
     * @param string $id The ID of the asset from which permissions will be removed.
     * @param Google_PermissionsBatchDeleteRequest|Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchDelete($id, Google_Service_MapsEngine_PermissionsBatchDeleteRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchDelete', [$params], "Google_Service_MapsEngine_PermissionsBatchDeleteResponse");
    }

    /**
     * Add or update permission entries to an already existing asset.
     *
     * An asset can hold up to 20 different permission entries. Each batchInsert
     * request is atomic. (permissions.batchUpdate)
     *
     * @param string $id The ID of the asset to which permissions will be added.
     * @param Google_PermissionsBatchUpdateRequest|Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function batchUpdate($id, Google_Service_MapsEngine_PermissionsBatchUpdateRequest $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchUpdate', [$params], "Google_Service_MapsEngine_PermissionsBatchUpdateResponse");
    }

    /**
     * Return all of the permissions for the specified asset.
     * (permissions.listTablesPermissions)
     *
     * @param string $id The ID of the asset whose permissions will be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listTablesPermissions($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_MapsEngine_PermissionsListResponse");
    }
}


/**
 * Class Google_Service_MapsEngine_AcquisitionTime
 */
class Google_Service_MapsEngine_AcquisitionTime extends Google_Model
{
    public $end;
    public $precision;
    public $start;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
}

/**
 * Class Google_Service_MapsEngine_Asset
 */
class Google_Service_MapsEngine_Asset extends Google_Collection
{
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $description;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $name;
    public $projectId;
    public $resource;
    public $tags;
    public $type;
    public $writersCanEditPermissions;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
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
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_AssetsListResponse
 */
class Google_Service_MapsEngine_AssetsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'assets';
    protected $internal_gapi_mappings = [];
    protected $assetsType = 'Google_Service_MapsEngine_Asset';
    protected $assetsDataType = 'array';

    /**
     * @param $assets
     */
    public function setAssets($assets)
    {
        $this->assets = $assets;
    }

    /**
     * @return mixed
     */
    public function getAssets()
    {
        return $this->assets;
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
 * Class Google_Service_MapsEngine_Border
 */
class Google_Service_MapsEngine_Border extends Google_Model
{
    public $color;
    public $opacity;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * @param $opacity
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

/**
 * Class Google_Service_MapsEngine_Color
 */
class Google_Service_MapsEngine_Color extends Google_Model
{
    public $color;
    public $opacity;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * @param $opacity
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }
}

/**
 * Class Google_Service_MapsEngine_Datasource
 */
class Google_Service_MapsEngine_Datasource extends Google_Model
{
    public $id;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_MapsEngine_DisplayRule
 */
class Google_Service_MapsEngine_DisplayRule extends Google_Collection
{
    public $name;
    protected $collection_key = 'filters';
    protected $internal_gapi_mappings = [];
    protected $filtersType = 'Google_Service_MapsEngine_Filter';
    protected $filtersDataType = 'array';
    protected $lineOptionsType = 'Google_Service_MapsEngine_LineStyle';
    protected $lineOptionsDataType = '';
    protected $pointOptionsType = 'Google_Service_MapsEngine_PointStyle';
    protected $pointOptionsDataType = '';
    protected $polygonOptionsType = 'Google_Service_MapsEngine_PolygonStyle';
    protected $polygonOptionsDataType = '';
    protected $zoomLevelsType = 'Google_Service_MapsEngine_ZoomLevels';
    protected $zoomLevelsDataType = '';


    /**
     * @param $filters
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param Google_Service_MapsEngine_LineStyle $lineOptions
     */
    public function setLineOptions(Google_Service_MapsEngine_LineStyle $lineOptions)
    {
        $this->lineOptions = $lineOptions;
    }

    /**
     * @return mixed
     */
    public function getLineOptions()
    {
        return $this->lineOptions;
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
     * @param Google_Service_MapsEngine_PointStyle $pointOptions
     */
    public function setPointOptions(Google_Service_MapsEngine_PointStyle $pointOptions)
    {
        $this->pointOptions = $pointOptions;
    }

    /**
     * @return mixed
     */
    public function getPointOptions()
    {
        return $this->pointOptions;
    }

    /**
     * @param Google_Service_MapsEngine_PolygonStyle $polygonOptions
     */
    public function setPolygonOptions(Google_Service_MapsEngine_PolygonStyle $polygonOptions)
    {
        $this->polygonOptions = $polygonOptions;
    }

    /**
     * @return mixed
     */
    public function getPolygonOptions()
    {
        return $this->polygonOptions;
    }

    /**
     * @param Google_Service_MapsEngine_ZoomLevels $zoomLevels
     */
    public function setZoomLevels(Google_Service_MapsEngine_ZoomLevels $zoomLevels)
    {
        $this->zoomLevels = $zoomLevels;
    }

    /**
     * @return mixed
     */
    public function getZoomLevels()
    {
        return $this->zoomLevels;
    }
}

/**
 * Class Google_Service_MapsEngine_Feature
 */
class Google_Service_MapsEngine_Feature extends Google_Model
{
    public $properties;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $geometryType = 'Google_Service_MapsEngine_GeoJsonGeometry';
    protected $geometryDataType = '';

    /**
     * @param Google_Service_MapsEngine_GeoJsonGeometry $geometry
     */
    public function setGeometry(Google_Service_MapsEngine_GeoJsonGeometry $geometry)
    {
        $this->geometry = $geometry;
    }

    /**
     * @return mixed
     */
    public function getGeometry()
    {
        return $this->geometry;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
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
 * Class Google_Service_MapsEngine_FeatureInfo
 */
class Google_Service_MapsEngine_FeatureInfo extends Google_Model
{
    public $content;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}

/**
 * Class Google_Service_MapsEngine_FeaturesBatchDeleteRequest
 */
class Google_Service_MapsEngine_FeaturesBatchDeleteRequest extends Google_Collection
{
    public $gxIds;
    public $primaryKeys;
    protected $collection_key = 'primaryKeys';
    protected $internal_gapi_mappings = [
        "gxIds" => "gx_ids",
    ];

    /**
     * @return mixed
     */
    public function getGxIds()
    {
        return $this->gxIds;
    }

    /**
     * @param $gxIds
     */
    public function setGxIds($gxIds)
    {
        $this->gxIds = $gxIds;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKeys()
    {
        return $this->primaryKeys;
    }

    /**
     * @param $primaryKeys
     */
    public function setPrimaryKeys($primaryKeys)
    {
        $this->primaryKeys = $primaryKeys;
    }
}

/**
 * Class Google_Service_MapsEngine_FeaturesBatchInsertRequest
 */
class Google_Service_MapsEngine_FeaturesBatchInsertRequest extends Google_Collection
{
    public $normalizeGeometries;
    protected $collection_key = 'features';
    protected $internal_gapi_mappings = [];
    protected $featuresType = 'Google_Service_MapsEngine_Feature';
    protected $featuresDataType = 'array';

    /**
     * @param $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @return mixed
     */
    public function getNormalizeGeometries()
    {
        return $this->normalizeGeometries;
    }

    /**
     * @param $normalizeGeometries
     */
    public function setNormalizeGeometries($normalizeGeometries)
    {
        $this->normalizeGeometries = $normalizeGeometries;
    }
}

/**
 * Class Google_Service_MapsEngine_FeaturesBatchPatchRequest
 */
class Google_Service_MapsEngine_FeaturesBatchPatchRequest extends Google_Collection
{
    public $normalizeGeometries;
    protected $collection_key = 'features';
    protected $internal_gapi_mappings = [];
    protected $featuresType = 'Google_Service_MapsEngine_Feature';
    protected $featuresDataType = 'array';

    /**
     * @param $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @return mixed
     */
    public function getNormalizeGeometries()
    {
        return $this->normalizeGeometries;
    }

    /**
     * @param $normalizeGeometries
     */
    public function setNormalizeGeometries($normalizeGeometries)
    {
        $this->normalizeGeometries = $normalizeGeometries;
    }
}

/**
 * Class Google_Service_MapsEngine_FeaturesListResponse
 */
class Google_Service_MapsEngine_FeaturesListResponse extends Google_Collection
{
    public $allowedQueriesPerSecond;
    public $nextPageToken;
    public $type;
    protected $collection_key = 'features';
    protected $internal_gapi_mappings = [];
    protected $featuresType = 'Google_Service_MapsEngine_Feature';
    protected $featuresDataType = 'array';
    protected $schemaType = 'Google_Service_MapsEngine_Schema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getAllowedQueriesPerSecond()
    {
        return $this->allowedQueriesPerSecond;
    }

    /**
     * @param $allowedQueriesPerSecond
     */
    public function setAllowedQueriesPerSecond($allowedQueriesPerSecond)
    {
        $this->allowedQueriesPerSecond = $allowedQueriesPerSecond;
    }

    /**
     * @param $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
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
     * @param Google_Service_MapsEngine_Schema $schema
     */
    public function setSchema(Google_Service_MapsEngine_Schema $schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
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
 * Class Google_Service_MapsEngine_Filter
 */
class Google_Service_MapsEngine_Filter extends Google_Model
{
    public $column;
    public $operator;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
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
 * Class Google_Service_MapsEngine_GeoJsonGeometry
 */
class Google_Service_MapsEngine_GeoJsonGeometry extends Google_Model
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
 * Class Google_Service_MapsEngine_GeoJsonGeometryCollection
 */
class Google_Service_MapsEngine_GeoJsonGeometryCollection extends Google_Service_MapsEngine_GeoJsonGeometry
{
    protected $collection_key = 'geometries';
    protected $internal_gapi_mappings = [];
    protected $geometriesType = 'Google_Service_MapsEngine_GeoJsonGeometry';
    protected $geometriesDataType = 'array';

    /**
     * @param $geometries
     */
    public function setGeometries($geometries)
    {
        $this->geometries = $geometries;
    }

    /**
     * @return mixed
     */
    public function getGeometries()
    {
        return $this->geometries;
    }

    protected function gapiInit()
    {
        $this->type = 'GeometryCollection';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonLineString
 */
class Google_Service_MapsEngine_GeoJsonLineString extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'LineString';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonMultiLineString
 */
class Google_Service_MapsEngine_GeoJsonMultiLineString extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'MultiLineString';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonMultiPoint
 */
class Google_Service_MapsEngine_GeoJsonMultiPoint extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'MultiPoint';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonMultiPolygon
 */
class Google_Service_MapsEngine_GeoJsonMultiPolygon extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'MultiPolygon';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonPoint
 */
class Google_Service_MapsEngine_GeoJsonPoint extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'Point';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonPolygon
 */
class Google_Service_MapsEngine_GeoJsonPolygon extends Google_Service_MapsEngine_GeoJsonGeometry
{
    public $coordinates;
    protected $collection_key = 'coordinates';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    protected function gapiInit()
    {
        $this->type = 'Polygon';
    }
}

/**
 * Class Google_Service_MapsEngine_GeoJsonProperties
 */
class Google_Service_MapsEngine_GeoJsonProperties extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_Icon
 */
class Google_Service_MapsEngine_Icon extends Google_Model
{
    public $description;
    public $id;
    public $name;
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
 * Class Google_Service_MapsEngine_IconStyle
 */
class Google_Service_MapsEngine_IconStyle extends Google_Model
{
    public $id;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $scaledShapeType = 'Google_Service_MapsEngine_ScaledShape';
    protected $scaledShapeDataType = '';
    protected $scalingFunctionType = 'Google_Service_MapsEngine_ScalingFunction';
    protected $scalingFunctionDataType = '';

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
     * @param Google_Service_MapsEngine_ScaledShape $scaledShape
     */
    public function setScaledShape(Google_Service_MapsEngine_ScaledShape $scaledShape)
    {
        $this->scaledShape = $scaledShape;
    }

    /**
     * @return mixed
     */
    public function getScaledShape()
    {
        return $this->scaledShape;
    }

    /**
     * @param Google_Service_MapsEngine_ScalingFunction $scalingFunction
     */
    public function setScalingFunction(Google_Service_MapsEngine_ScalingFunction $scalingFunction)
    {
        $this->scalingFunction = $scalingFunction;
    }

    /**
     * @return mixed
     */
    public function getScalingFunction()
    {
        return $this->scalingFunction;
    }
}

/**
 * Class Google_Service_MapsEngine_IconsListResponse
 */
class Google_Service_MapsEngine_IconsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'icons';
    protected $internal_gapi_mappings = [];
    protected $iconsType = 'Google_Service_MapsEngine_Icon';
    protected $iconsDataType = 'array';

    /**
     * @param $icons
     */
    public function setIcons($icons)
    {
        $this->icons = $icons;
    }

    /**
     * @return mixed
     */
    public function getIcons()
    {
        return $this->icons;
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
 * Class Google_Service_MapsEngine_LabelStyle
 */
class Google_Service_MapsEngine_LabelStyle extends Google_Model
{
    public $color;
    public $column;
    public $fontStyle;
    public $fontWeight;
    public $opacity;
    public $size;
    protected $internal_gapi_mappings = [];
    protected $outlineType = 'Google_Service_MapsEngine_Color';
    protected $outlineDataType = '';

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getFontStyle()
    {
        return $this->fontStyle;
    }

    /**
     * @param $fontStyle
     */
    public function setFontStyle($fontStyle)
    {
        $this->fontStyle = $fontStyle;
    }

    /**
     * @return mixed
     */
    public function getFontWeight()
    {
        return $this->fontWeight;
    }

    /**
     * @param $fontWeight
     */
    public function setFontWeight($fontWeight)
    {
        $this->fontWeight = $fontWeight;
    }

    /**
     * @return mixed
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * @param $opacity
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }

    /**
     * @param Google_Service_MapsEngine_Color $outline
     */
    public function setOutline(Google_Service_MapsEngine_Color $outline)
    {
        $this->outline = $outline;
    }

    /**
     * @return mixed
     */
    public function getOutline()
    {
        return $this->outline;
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
 * Class Google_Service_MapsEngine_Layer
 */
class Google_Service_MapsEngine_Layer extends Google_Collection
{
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $datasourceType;
    public $description;
    public $draftAccessList;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $layerType;
    public $name;
    public $processingStatus;
    public $projectId;
    public $publishedAccessList;
    public $publishingStatus;
    public $tags;
    public $writersCanEditPermissions;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];
    protected $datasourcesType = 'Google_Service_MapsEngine_Datasource';
    protected $datasourcesDataType = 'array';
    protected $styleType = 'Google_Service_MapsEngine_VectorStyle';
    protected $styleDataType = '';

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
    }

    /**
     * @return mixed
     */
    public function getDatasourceType()
    {
        return $this->datasourceType;
    }

    /**
     * @param $datasourceType
     */
    public function setDatasourceType($datasourceType)
    {
        $this->datasourceType = $datasourceType;
    }

    /**
     * @param Google_Service_MapsEngine_Datasource $datasources
     */
    public function setDatasources(Google_Service_MapsEngine_Datasource $datasources)
    {
        $this->datasources = $datasources;
    }

    /**
     * @return mixed
     */
    public function getDatasources()
    {
        return $this->datasources;
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
    public function getDraftAccessList()
    {
        return $this->draftAccessList;
    }

    /**
     * @param $draftAccessList
     */
    public function setDraftAccessList($draftAccessList)
    {
        $this->draftAccessList = $draftAccessList;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
    }

    /**
     * @return mixed
     */
    public function getLayerType()
    {
        return $this->layerType;
    }

    /**
     * @param $layerType
     */
    public function setLayerType($layerType)
    {
        $this->layerType = $layerType;
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
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getPublishedAccessList()
    {
        return $this->publishedAccessList;
    }

    /**
     * @param $publishedAccessList
     */
    public function setPublishedAccessList($publishedAccessList)
    {
        $this->publishedAccessList = $publishedAccessList;
    }

    /**
     * @return mixed
     */
    public function getPublishingStatus()
    {
        return $this->publishingStatus;
    }

    /**
     * @param $publishingStatus
     */
    public function setPublishingStatus($publishingStatus)
    {
        $this->publishingStatus = $publishingStatus;
    }

    /**
     * @param Google_Service_MapsEngine_VectorStyle $style
     */
    public function setStyle(Google_Service_MapsEngine_VectorStyle $style)
    {
        $this->style = $style;
    }

    /**
     * @return mixed
     */
    public function getStyle()
    {
        return $this->style;
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
     * @return mixed
     */
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_LayersListResponse
 */
class Google_Service_MapsEngine_LayersListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'layers';
    protected $internal_gapi_mappings = [];
    protected $layersType = 'Google_Service_MapsEngine_Layer';
    protected $layersDataType = 'array';

    /**
     * @param $layers
     */
    public function setLayers($layers)
    {
        $this->layers = $layers;
    }

    /**
     * @return mixed
     */
    public function getLayers()
    {
        return $this->layers;
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
 * Class Google_Service_MapsEngine_LineStyle
 */
class Google_Service_MapsEngine_LineStyle extends Google_Collection
{
    public $dash;
    protected $collection_key = 'dash';
    protected $internal_gapi_mappings = [];
    protected $borderType = 'Google_Service_MapsEngine_Border';
    protected $borderDataType = '';
    protected $labelType = 'Google_Service_MapsEngine_LabelStyle';
    protected $labelDataType = '';
    protected $strokeType = 'Google_Service_MapsEngine_LineStyleStroke';
    protected $strokeDataType = '';


    /**
     * @param Google_Service_MapsEngine_Border $border
     */
    public function setBorder(Google_Service_MapsEngine_Border $border)
    {
        $this->border = $border;
    }

    /**
     * @return mixed
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @return mixed
     */
    public function getDash()
    {
        return $this->dash;
    }

    /**
     * @param $dash
     */
    public function setDash($dash)
    {
        $this->dash = $dash;
    }

    /**
     * @param Google_Service_MapsEngine_LabelStyle $label
     */
    public function setLabel(Google_Service_MapsEngine_LabelStyle $label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param Google_Service_MapsEngine_LineStyleStroke $stroke
     */
    public function setStroke(Google_Service_MapsEngine_LineStyleStroke $stroke)
    {
        $this->stroke = $stroke;
    }

    /**
     * @return mixed
     */
    public function getStroke()
    {
        return $this->stroke;
    }
}

/**
 * Class Google_Service_MapsEngine_LineStyleStroke
 */
class Google_Service_MapsEngine_LineStyleStroke extends Google_Model
{
    public $color;
    public $opacity;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getOpacity()
    {
        return $this->opacity;
    }

    /**
     * @param $opacity
     */
    public function setOpacity($opacity)
    {
        $this->opacity = $opacity;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

/**
 * Class Google_Service_MapsEngine_Map
 */
class Google_Service_MapsEngine_Map extends Google_Collection
{
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $defaultViewport;
    public $description;
    public $draftAccessList;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $name;
    public $processingStatus;
    public $projectId;
    public $publishedAccessList;
    public $publishingStatus;
    public $tags;
    public $versions;
    public $writersCanEditPermissions;
    protected $collection_key = 'versions';
    protected $internal_gapi_mappings = [];
    protected $contentsType = 'Google_Service_MapsEngine_MapItem';
    protected $contentsDataType = '';

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

    /**
     * @param Google_Service_MapsEngine_MapItem $contents
     */
    public function setContents(Google_Service_MapsEngine_MapItem $contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
    }

    /**
     * @return mixed
     */
    public function getDefaultViewport()
    {
        return $this->defaultViewport;
    }

    /**
     * @param $defaultViewport
     */
    public function setDefaultViewport($defaultViewport)
    {
        $this->defaultViewport = $defaultViewport;
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
    public function getDraftAccessList()
    {
        return $this->draftAccessList;
    }

    /**
     * @param $draftAccessList
     */
    public function setDraftAccessList($draftAccessList)
    {
        $this->draftAccessList = $draftAccessList;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
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
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getPublishedAccessList()
    {
        return $this->publishedAccessList;
    }

    /**
     * @param $publishedAccessList
     */
    public function setPublishedAccessList($publishedAccessList)
    {
        $this->publishedAccessList = $publishedAccessList;
    }

    /**
     * @return mixed
     */
    public function getPublishingStatus()
    {
        return $this->publishingStatus;
    }

    /**
     * @param $publishingStatus
     */
    public function setPublishingStatus($publishingStatus)
    {
        $this->publishingStatus = $publishingStatus;
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
     * @return mixed
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * @param $versions
     */
    public function setVersions($versions)
    {
        $this->versions = $versions;
    }

    /**
     * @return mixed
     */
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_MapFolder
 */
class Google_Service_MapsEngine_MapFolder extends Google_Service_MapsEngine_MapItem
{
    public $defaultViewport;
    public $expandable;
    public $key;
    public $name;
    public $visibility;
    protected $collection_key = 'defaultViewport';
    protected $internal_gapi_mappings = [];
    protected $contentsType = 'Google_Service_MapsEngine_MapItem';
    protected $contentsDataType = 'array';

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
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return mixed
     */
    public function getDefaultViewport()
    {
        return $this->defaultViewport;
    }

    /**
     * @param $defaultViewport
     */
    public function setDefaultViewport($defaultViewport)
    {
        $this->defaultViewport = $defaultViewport;
    }

    /**
     * @return mixed
     */
    public function getExpandable()
    {
        return $this->expandable;
    }

    /**
     * @param $expandable
     */
    public function setExpandable($expandable)
    {
        $this->expandable = $expandable;
    }

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
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    protected function gapiInit()
    {
        $this->type = 'folder';
    }
}

/**
 * Class Google_Service_MapsEngine_MapItem
 */
class Google_Service_MapsEngine_MapItem extends Google_Model
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
 * Class Google_Service_MapsEngine_MapKmlLink
 */
class Google_Service_MapsEngine_MapKmlLink extends Google_Service_MapsEngine_MapItem
{
    public $defaultViewport;
    public $kmlUrl;
    public $name;
    public $visibility;
    protected $collection_key = 'defaultViewport';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDefaultViewport()
    {
        return $this->defaultViewport;
    }

    /**
     * @param $defaultViewport
     */
    public function setDefaultViewport($defaultViewport)
    {
        $this->defaultViewport = $defaultViewport;
    }

    /**
     * @return mixed
     */
    public function getKmlUrl()
    {
        return $this->kmlUrl;
    }

    /**
     * @param $kmlUrl
     */
    public function setKmlUrl($kmlUrl)
    {
        $this->kmlUrl = $kmlUrl;
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
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    protected function gapiInit()
    {
        $this->type = 'kmlLink';
    }
}

/**
 * Class Google_Service_MapsEngine_MapLayer
 */
class Google_Service_MapsEngine_MapLayer extends Google_Service_MapsEngine_MapItem
{
    public $defaultViewport;
    public $id;
    public $key;
    public $name;
    public $visibility;
    protected $collection_key = 'defaultViewport';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDefaultViewport()
    {
        return $this->defaultViewport;
    }

    /**
     * @param $defaultViewport
     */
    public function setDefaultViewport($defaultViewport)
    {
        $this->defaultViewport = $defaultViewport;
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
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    protected function gapiInit()
    {
        $this->type = 'layer';
    }
}

/**
 * Class Google_Service_MapsEngine_MapsListResponse
 */
class Google_Service_MapsEngine_MapsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'maps';
    protected $internal_gapi_mappings = [];
    protected $mapsType = 'Google_Service_MapsEngine_Map';
    protected $mapsDataType = 'array';

    /**
     * @param $maps
     */
    public function setMaps($maps)
    {
        $this->maps = $maps;
    }

    /**
     * @return mixed
     */
    public function getMaps()
    {
        return $this->maps;
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
 * Class Google_Service_MapsEngine_MapsengineFile
 */
class Google_Service_MapsEngine_MapsengineFile extends Google_Model
{
    public $filename;
    public $size;
    public $uploadStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
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
    public function getUploadStatus()
    {
        return $this->uploadStatus;
    }

    /**
     * @param $uploadStatus
     */
    public function setUploadStatus($uploadStatus)
    {
        $this->uploadStatus = $uploadStatus;
    }
}

/**
 * Class Google_Service_MapsEngine_Parent
 */
class Google_Service_MapsEngine_Parent extends Google_Model
{
    public $id;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_MapsEngine_ParentsListResponse
 */
class Google_Service_MapsEngine_ParentsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'parents';
    protected $internal_gapi_mappings = [];
    protected $parentsType = 'Google_Service_MapsEngine_Parent';
    protected $parentsDataType = 'array';

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
     * @param $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
    }

    /**
     * @return mixed
     */
    public function getParents()
    {
        return $this->parents;
    }
}

/**
 * Class Google_Service_MapsEngine_Permission
 */
class Google_Service_MapsEngine_Permission extends Google_Model
{
    public $discoverable;
    public $id;
    public $role;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDiscoverable()
    {
        return $this->discoverable;
    }

    /**
     * @param $discoverable
     */
    public function setDiscoverable($discoverable)
    {
        $this->discoverable = $discoverable;
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
 * Class Google_Service_MapsEngine_PermissionsBatchDeleteRequest
 */
class Google_Service_MapsEngine_PermissionsBatchDeleteRequest extends Google_Collection
{
    public $ids;
    protected $collection_key = 'ids';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }
}

/**
 * Class Google_Service_MapsEngine_PermissionsBatchDeleteResponse
 */
class Google_Service_MapsEngine_PermissionsBatchDeleteResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_PermissionsBatchUpdateRequest
 */
class Google_Service_MapsEngine_PermissionsBatchUpdateRequest extends Google_Collection
{
    protected $collection_key = 'permissions';
    protected $internal_gapi_mappings = [];
    protected $permissionsType = 'Google_Service_MapsEngine_Permission';
    protected $permissionsDataType = 'array';


    /**
     * @param $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}

/**
 * Class Google_Service_MapsEngine_PermissionsBatchUpdateResponse
 */
class Google_Service_MapsEngine_PermissionsBatchUpdateResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_PermissionsListResponse
 */
class Google_Service_MapsEngine_PermissionsListResponse extends Google_Collection
{
    protected $collection_key = 'permissions';
    protected $internal_gapi_mappings = [];
    protected $permissionsType = 'Google_Service_MapsEngine_Permission';
    protected $permissionsDataType = 'array';


    /**
     * @param $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}

/**
 * Class Google_Service_MapsEngine_PointStyle
 */
class Google_Service_MapsEngine_PointStyle extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $iconType = 'Google_Service_MapsEngine_IconStyle';
    protected $iconDataType = '';
    protected $labelType = 'Google_Service_MapsEngine_LabelStyle';
    protected $labelDataType = '';


    /**
     * @param Google_Service_MapsEngine_IconStyle $icon
     */
    public function setIcon(Google_Service_MapsEngine_IconStyle $icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param Google_Service_MapsEngine_LabelStyle $label
     */
    public function setLabel(Google_Service_MapsEngine_LabelStyle $label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }
}

/**
 * Class Google_Service_MapsEngine_PolygonStyle
 */
class Google_Service_MapsEngine_PolygonStyle extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $fillType = 'Google_Service_MapsEngine_Color';
    protected $fillDataType = '';
    protected $labelType = 'Google_Service_MapsEngine_LabelStyle';
    protected $labelDataType = '';
    protected $strokeType = 'Google_Service_MapsEngine_Border';
    protected $strokeDataType = '';


    /**
     * @param Google_Service_MapsEngine_Color $fill
     */
    public function setFill(Google_Service_MapsEngine_Color $fill)
    {
        $this->fill = $fill;
    }

    /**
     * @return mixed
     */
    public function getFill()
    {
        return $this->fill;
    }

    /**
     * @param Google_Service_MapsEngine_LabelStyle $label
     */
    public function setLabel(Google_Service_MapsEngine_LabelStyle $label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param Google_Service_MapsEngine_Border $stroke
     */
    public function setStroke(Google_Service_MapsEngine_Border $stroke)
    {
        $this->stroke = $stroke;
    }

    /**
     * @return mixed
     */
    public function getStroke()
    {
        return $this->stroke;
    }
}

/**
 * Class Google_Service_MapsEngine_ProcessResponse
 */
class Google_Service_MapsEngine_ProcessResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_Project
 */
class Google_Service_MapsEngine_Project extends Google_Model
{
    public $id;
    public $name;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_MapsEngine_ProjectsListResponse
 */
class Google_Service_MapsEngine_ProjectsListResponse extends Google_Collection
{
    protected $collection_key = 'projects';
    protected $internal_gapi_mappings = [];
    protected $projectsType = 'Google_Service_MapsEngine_Project';
    protected $projectsDataType = 'array';


    /**
     * @param $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }
}

/**
 * Class Google_Service_MapsEngine_PublishResponse
 */
class Google_Service_MapsEngine_PublishResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_PublishedLayer
 */
class Google_Service_MapsEngine_PublishedLayer extends Google_Model
{
    public $description;
    public $id;
    public $layerType;
    public $name;
    public $projectId;
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
    public function getLayerType()
    {
        return $this->layerType;
    }

    /**
     * @param $layerType
     */
    public function setLayerType($layerType)
    {
        $this->layerType = $layerType;
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }
}

/**
 * Class Google_Service_MapsEngine_PublishedLayersListResponse
 */
class Google_Service_MapsEngine_PublishedLayersListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'layers';
    protected $internal_gapi_mappings = [];
    protected $layersType = 'Google_Service_MapsEngine_PublishedLayer';
    protected $layersDataType = 'array';

    /**
     * @param $layers
     */
    public function setLayers($layers)
    {
        $this->layers = $layers;
    }

    /**
     * @return mixed
     */
    public function getLayers()
    {
        return $this->layers;
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
 * Class Google_Service_MapsEngine_PublishedMap
 */
class Google_Service_MapsEngine_PublishedMap extends Google_Model
{
    public $defaultViewport;
    public $description;
    public $id;
    public $name;
    public $projectId;
    protected $internal_gapi_mappings = [];
    protected $contentsType = 'Google_Service_MapsEngine_MapItem';
    protected $contentsDataType = '';

    /**
     * @param Google_Service_MapsEngine_MapItem $contents
     */
    public function setContents(Google_Service_MapsEngine_MapItem $contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return mixed
     */
    public function getDefaultViewport()
    {
        return $this->defaultViewport;
    }

    /**
     * @param $defaultViewport
     */
    public function setDefaultViewport($defaultViewport)
    {
        $this->defaultViewport = $defaultViewport;
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }
}

/**
 * Class Google_Service_MapsEngine_PublishedMapsListResponse
 */
class Google_Service_MapsEngine_PublishedMapsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'maps';
    protected $internal_gapi_mappings = [];
    protected $mapsType = 'Google_Service_MapsEngine_PublishedMap';
    protected $mapsDataType = 'array';

    /**
     * @param $maps
     */
    public function setMaps($maps)
    {
        $this->maps = $maps;
    }

    /**
     * @return mixed
     */
    public function getMaps()
    {
        return $this->maps;
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
 * Class Google_Service_MapsEngine_Raster
 */
class Google_Service_MapsEngine_Raster extends Google_Collection
{
    public $attribution;
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $description;
    public $draftAccessList;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $maskType;
    public $name;
    public $processingStatus;
    public $projectId;
    public $rasterType;
    public $tags;
    public $writersCanEditPermissions;
    protected $collection_key = 'files';
    protected $internal_gapi_mappings = [];
    protected $acquisitionTimeType = 'Google_Service_MapsEngine_AcquisitionTime';
    protected $acquisitionTimeDataType = '';
    protected $filesType = 'Google_Service_MapsEngine_MapsengineFile';
    protected $filesDataType = 'array';

    /**
     * @param Google_Service_MapsEngine_AcquisitionTime $acquisitionTime
     */
    public function setAcquisitionTime(Google_Service_MapsEngine_AcquisitionTime $acquisitionTime)
    {
        $this->acquisitionTime = $acquisitionTime;
    }

    /**
     * @return mixed
     */
    public function getAcquisitionTime()
    {
        return $this->acquisitionTime;
    }

    /**
     * @return mixed
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * @param $attribution
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;
    }

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
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
    public function getDraftAccessList()
    {
        return $this->draftAccessList;
    }

    /**
     * @param $draftAccessList
     */
    public function setDraftAccessList($draftAccessList)
    {
        $this->draftAccessList = $draftAccessList;
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
     * @param $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
    }

    /**
     * @return mixed
     */
    public function getMaskType()
    {
        return $this->maskType;
    }

    /**
     * @param $maskType
     */
    public function setMaskType($maskType)
    {
        $this->maskType = $maskType;
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
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getRasterType()
    {
        return $this->rasterType;
    }

    /**
     * @param $rasterType
     */
    public function setRasterType($rasterType)
    {
        $this->rasterType = $rasterType;
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
     * @return mixed
     */
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_RasterCollection
 */
class Google_Service_MapsEngine_RasterCollection extends Google_Collection
{
    public $attribution;
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $description;
    public $draftAccessList;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $mosaic;
    public $name;
    public $processingStatus;
    public $projectId;
    public $rasterType;
    public $tags;
    public $writersCanEditPermissions;
    protected $collection_key = 'bbox';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * @param $attribution
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;
    }

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
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
    public function getDraftAccessList()
    {
        return $this->draftAccessList;
    }

    /**
     * @param $draftAccessList
     */
    public function setDraftAccessList($draftAccessList)
    {
        $this->draftAccessList = $draftAccessList;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
    }

    /**
     * @return mixed
     */
    public function getMosaic()
    {
        return $this->mosaic;
    }

    /**
     * @param $mosaic
     */
    public function setMosaic($mosaic)
    {
        $this->mosaic = $mosaic;
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
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getRasterType()
    {
        return $this->rasterType;
    }

    /**
     * @param $rasterType
     */
    public function setRasterType($rasterType)
    {
        $this->rasterType = $rasterType;
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
     * @return mixed
     */
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsListResponse
 */
class Google_Service_MapsEngine_RasterCollectionsListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'rasterCollections';
    protected $internal_gapi_mappings = [];
    protected $rasterCollectionsType = 'Google_Service_MapsEngine_RasterCollection';
    protected $rasterCollectionsDataType = 'array';

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
     * @param $rasterCollections
     */
    public function setRasterCollections($rasterCollections)
    {
        $this->rasterCollections = $rasterCollections;
    }

    /**
     * @return mixed
     */
    public function getRasterCollections()
    {
        return $this->rasterCollections;
    }
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRaster
 */
class Google_Service_MapsEngine_RasterCollectionsRaster extends Google_Collection
{
    public $bbox;
    public $creationTime;
    public $description;
    public $id;
    public $lastModifiedTime;
    public $name;
    public $projectId;
    public $rasterType;
    public $tags;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getRasterType()
    {
        return $this->rasterType;
    }

    /**
     * @param $rasterType
     */
    public function setRasterType($rasterType)
    {
        $this->rasterType = $rasterType;
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
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest
 */
class Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest extends Google_Collection
{
    public $ids;
    protected $collection_key = 'ids';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse
 */
class Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest
 */
class Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest extends Google_Collection
{
    public $ids;
    protected $collection_key = 'ids';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse
 */
class Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse extends Google_Model
{
}

/**
 * Class Google_Service_MapsEngine_RasterCollectionsRastersListResponse
 */
class Google_Service_MapsEngine_RasterCollectionsRastersListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'rasters';
    protected $internal_gapi_mappings = [];
    protected $rastersType = 'Google_Service_MapsEngine_RasterCollectionsRaster';
    protected $rastersDataType = 'array';

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
     * @param $rasters
     */
    public function setRasters($rasters)
    {
        $this->rasters = $rasters;
    }

    /**
     * @return mixed
     */
    public function getRasters()
    {
        return $this->rasters;
    }
}

/**
 * Class Google_Service_MapsEngine_RastersListResponse
 */
class Google_Service_MapsEngine_RastersListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'rasters';
    protected $internal_gapi_mappings = [];
    protected $rastersType = 'Google_Service_MapsEngine_Raster';
    protected $rastersDataType = 'array';

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
     * @param $rasters
     */
    public function setRasters($rasters)
    {
        $this->rasters = $rasters;
    }

    /**
     * @return mixed
     */
    public function getRasters()
    {
        return $this->rasters;
    }
}

/**
 * Class Google_Service_MapsEngine_ScaledShape
 */
class Google_Service_MapsEngine_ScaledShape extends Google_Model
{
    public $shape;
    protected $internal_gapi_mappings = [];
    protected $borderType = 'Google_Service_MapsEngine_Border';
    protected $borderDataType = '';
    protected $fillType = 'Google_Service_MapsEngine_Color';
    protected $fillDataType = '';

    /**
     * @param Google_Service_MapsEngine_Border $border
     */
    public function setBorder(Google_Service_MapsEngine_Border $border)
    {
        $this->border = $border;
    }

    /**
     * @return mixed
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @param Google_Service_MapsEngine_Color $fill
     */
    public function setFill(Google_Service_MapsEngine_Color $fill)
    {
        $this->fill = $fill;
    }

    /**
     * @return mixed
     */
    public function getFill()
    {
        return $this->fill;
    }

    /**
     * @return mixed
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param $shape
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
    }
}

/**
 * Class Google_Service_MapsEngine_ScalingFunction
 */
class Google_Service_MapsEngine_ScalingFunction extends Google_Model
{
    public $column;
    public $scalingType;
    protected $internal_gapi_mappings = [];
    protected $sizeRangeType = 'Google_Service_MapsEngine_SizeRange';
    protected $sizeRangeDataType = '';
    protected $valueRangeType = 'Google_Service_MapsEngine_ValueRange';
    protected $valueRangeDataType = '';

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getScalingType()
    {
        return $this->scalingType;
    }

    /**
     * @param $scalingType
     */
    public function setScalingType($scalingType)
    {
        $this->scalingType = $scalingType;
    }

    /**
     * @param Google_Service_MapsEngine_SizeRange $sizeRange
     */
    public function setSizeRange(Google_Service_MapsEngine_SizeRange $sizeRange)
    {
        $this->sizeRange = $sizeRange;
    }

    /**
     * @return mixed
     */
    public function getSizeRange()
    {
        return $this->sizeRange;
    }

    /**
     * @param Google_Service_MapsEngine_ValueRange $valueRange
     */
    public function setValueRange(Google_Service_MapsEngine_ValueRange $valueRange)
    {
        $this->valueRange = $valueRange;
    }

    /**
     * @return mixed
     */
    public function getValueRange()
    {
        return $this->valueRange;
    }
}

/**
 * Class Google_Service_MapsEngine_Schema
 */
class Google_Service_MapsEngine_Schema extends Google_Collection
{
    public $primaryGeometry;
    public $primaryKey;
    protected $collection_key = 'columns';
    protected $internal_gapi_mappings = [];
    protected $columnsType = 'Google_Service_MapsEngine_TableColumn';
    protected $columnsDataType = 'array';

    /**
     * @param $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return mixed
     */
    public function getPrimaryGeometry()
    {
        return $this->primaryGeometry;
    }

    /**
     * @param $primaryGeometry
     */
    public function setPrimaryGeometry($primaryGeometry)
    {
        $this->primaryGeometry = $primaryGeometry;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @param $primaryKey
     */
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }
}

/**
 * Class Google_Service_MapsEngine_SizeRange
 */
class Google_Service_MapsEngine_SizeRange extends Google_Model
{
    public $max;
    public $min;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }
}

/**
 * Class Google_Service_MapsEngine_Table
 */
class Google_Service_MapsEngine_Table extends Google_Collection
{
    public $bbox;
    public $creationTime;
    public $creatorEmail;
    public $description;
    public $draftAccessList;
    public $etag;
    public $id;
    public $lastModifiedTime;
    public $lastModifierEmail;
    public $name;
    public $processingStatus;
    public $projectId;
    public $publishedAccessList;
    public $sourceEncoding;
    public $tags;
    public $writersCanEditPermissions;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];
    protected $filesType = 'Google_Service_MapsEngine_MapsengineFile';
    protected $filesDataType = 'array';
    protected $schemaType = 'Google_Service_MapsEngine_Schema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getBbox()
    {
        return $this->bbox;
    }

    /**
     * @param $bbox
     */
    public function setBbox($bbox)
    {
        $this->bbox = $bbox;
    }

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
    public function getCreatorEmail()
    {
        return $this->creatorEmail;
    }

    /**
     * @param $creatorEmail
     */
    public function setCreatorEmail($creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;
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
    public function getDraftAccessList()
    {
        return $this->draftAccessList;
    }

    /**
     * @param $draftAccessList
     */
    public function setDraftAccessList($draftAccessList)
    {
        $this->draftAccessList = $draftAccessList;
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
     * @param $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getLastModifierEmail()
    {
        return $this->lastModifierEmail;
    }

    /**
     * @param $lastModifierEmail
     */
    public function setLastModifierEmail($lastModifierEmail)
    {
        $this->lastModifierEmail = $lastModifierEmail;
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
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getPublishedAccessList()
    {
        return $this->publishedAccessList;
    }

    /**
     * @param $publishedAccessList
     */
    public function setPublishedAccessList($publishedAccessList)
    {
        $this->publishedAccessList = $publishedAccessList;
    }

    /**
     * @param Google_Service_MapsEngine_Schema $schema
     */
    public function setSchema(Google_Service_MapsEngine_Schema $schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @return mixed
     */
    public function getSourceEncoding()
    {
        return $this->sourceEncoding;
    }

    /**
     * @param $sourceEncoding
     */
    public function setSourceEncoding($sourceEncoding)
    {
        $this->sourceEncoding = $sourceEncoding;
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
     * @return mixed
     */
    public function getWritersCanEditPermissions()
    {
        return $this->writersCanEditPermissions;
    }

    /**
     * @param $writersCanEditPermissions
     */
    public function setWritersCanEditPermissions($writersCanEditPermissions)
    {
        $this->writersCanEditPermissions = $writersCanEditPermissions;
    }
}

/**
 * Class Google_Service_MapsEngine_TableColumn
 */
class Google_Service_MapsEngine_TableColumn extends Google_Model
{
    public $name;
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
 * Class Google_Service_MapsEngine_TablesListResponse
 */
class Google_Service_MapsEngine_TablesListResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'tables';
    protected $internal_gapi_mappings = [];
    protected $tablesType = 'Google_Service_MapsEngine_Table';
    protected $tablesDataType = 'array';

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
     * @param $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }

    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }
}

/**
 * Class Google_Service_MapsEngine_ValueRange
 */
class Google_Service_MapsEngine_ValueRange extends Google_Model
{
    public $max;
    public $min;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }
}

/**
 * Class Google_Service_MapsEngine_VectorStyle
 */
class Google_Service_MapsEngine_VectorStyle extends Google_Collection
{
    public $type;
    protected $collection_key = 'displayRules';
    protected $internal_gapi_mappings = [];
    protected $displayRulesType = 'Google_Service_MapsEngine_DisplayRule';
    protected $displayRulesDataType = 'array';
    protected $featureInfoType = 'Google_Service_MapsEngine_FeatureInfo';
    protected $featureInfoDataType = '';

    /**
     * @param $displayRules
     */
    public function setDisplayRules($displayRules)
    {
        $this->displayRules = $displayRules;
    }

    /**
     * @return mixed
     */
    public function getDisplayRules()
    {
        return $this->displayRules;
    }

    /**
     * @param Google_Service_MapsEngine_FeatureInfo $featureInfo
     */
    public function setFeatureInfo(Google_Service_MapsEngine_FeatureInfo $featureInfo)
    {
        $this->featureInfo = $featureInfo;
    }

    /**
     * @return mixed
     */
    public function getFeatureInfo()
    {
        return $this->featureInfo;
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
 * Class Google_Service_MapsEngine_ZoomLevels
 */
class Google_Service_MapsEngine_ZoomLevels extends Google_Model
{
    public $max;
    public $min;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }
}
