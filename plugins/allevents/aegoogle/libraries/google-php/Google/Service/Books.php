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
 * Service definition for Books (v1).
 *
 * <p>
 * Lets you search for books and manage your Google Books library.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/books/docs/v1/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Books extends Google_Service
{
    /** Manage your books. */
    const BOOKS =
        "https://www.googleapis.com/auth/books";

    public $bookshelves;
    public $bookshelves_volumes;
    public $cloudloading;
    public $dictionary;
    public $layers;
    public $layers_annotationData;
    public $layers_volumeAnnotations;
    public $myconfig;
    public $mylibrary_annotations;
    public $mylibrary_bookshelves;
    public $mylibrary_bookshelves_volumes;
    public $mylibrary_readingpositions;
    public $onboarding;
    public $promooffer;
    public $volumes;
    public $volumes_associated;
    public $volumes_mybooks;
    public $volumes_recommended;
    public $volumes_useruploaded;


    /**
     * Constructs the internal representation of the Books service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'books/v1/';
        $this->version = 'v1';
        $this->serviceName = 'books';

        $this->bookshelves = new Google_Service_Books_Bookshelves_Resource(
            $this,
            $this->serviceName,
            'bookshelves',
            [
                'methods' => [
                    'get' => [
                        'path' => 'users/{userId}/bookshelves/{shelf}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userId}/bookshelves',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->bookshelves_volumes = new Google_Service_Books_BookshelvesVolumes_Resource(
            $this,
            $this->serviceName,
            'volumes',
            [
                'methods' => [
                    'list' => [
                        'path' => 'users/{userId}/bookshelves/{shelf}/volumes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'showPreorders' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->cloudloading = new Google_Service_Books_Cloudloading_Resource(
            $this,
            $this->serviceName,
            'cloudloading',
            [
                'methods' => [
                    'addBook' => [
                        'path' => 'cloudloading/addBook',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'upload_client_token' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'drive_document_id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mime_type' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'deleteBook' => [
                        'path' => 'cloudloading/deleteBook',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'updateBook' => [
                        'path' => 'cloudloading/updateBook',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->dictionary = new Google_Service_Books_Dictionary_Resource(
            $this,
            $this->serviceName,
            'dictionary',
            [
                'methods' => [
                    'listOfflineMetadata' => [
                        'path' => 'dictionary/listOfflineMetadata',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'cpksver' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->layers = new Google_Service_Books_Layers_Resource(
            $this,
            $this->serviceName,
            'layers',
            [
                'methods' => [
                    'get' => [
                        'path' => 'volumes/{volumeId}/layersummary/{summaryId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'summaryId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'volumes/{volumeId}/layersummary',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->layers_annotationData = new Google_Service_Books_LayersAnnotationData_Resource(
            $this,
            $this->serviceName,
            'annotationData',
            [
                'methods' => [
                    'get' => [
                        'path' => 'volumes/{volumeId}/layers/{layerId}/data/{annotationDataId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'layerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'annotationDataId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'scale' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'allowWebDefinitions' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'h' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'w' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'volumes/{volumeId}/layers/{layerId}/data',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'layerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'scale' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'h' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'updatedMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'annotationDataId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'w' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->layers_volumeAnnotations = new Google_Service_Books_LayersVolumeAnnotations_Resource(
            $this,
            $this->serviceName,
            'volumeAnnotations',
            [
                'methods' => [
                    'get' => [
                        'path' => 'volumes/{volumeId}/layers/{layerId}/annotations/{annotationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'layerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'volumes/{volumeId}/layers/{layerId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'layerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'volumeAnnotationsVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endPosition' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endOffset' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updatedMax' => [
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
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startOffset' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startPosition' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->myconfig = new Google_Service_Books_Myconfig_Resource(
            $this,
            $this->serviceName,
            'myconfig',
            [
                'methods' => [
                    'getUserSettings' => [
                        'path' => 'myconfig/getUserSettings',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'releaseDownloadAccess' => [
                        'path' => 'myconfig/releaseDownloadAccess',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'volumeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                            'cpksver' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'requestAccess' => [
                        'path' => 'myconfig/requestAccess',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'nonce' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'cpksver' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'licenseTypes' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'syncVolumeLicenses' => [
                        'path' => 'myconfig/syncVolumeLicenses',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'nonce' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'cpksver' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'features' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showPreorders' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'volumeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'updateUserSettings' => [
                        'path' => 'myconfig/updateUserSettings',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->mylibrary_annotations = new Google_Service_Books_MylibraryAnnotations_Resource(
            $this,
            $this->serviceName,
            'annotations',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'mylibrary/annotations/{annotationId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'mylibrary/annotations',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'country' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showOnlySummaryInResponse' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'mylibrary/annotations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'layerIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'volumeId' => [
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
                            'updatedMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'layerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'summary' => [
                        'path' => 'mylibrary/annotations/summary',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'layerIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'mylibrary/annotations/{annotationId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->mylibrary_bookshelves = new Google_Service_Books_MylibraryBookshelves_Resource(
            $this,
            $this->serviceName,
            'bookshelves',
            [
                'methods' => [
                    'addVolume' => [
                        'path' => 'mylibrary/bookshelves/{shelf}/addVolume',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reason' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'clearVolumes' => [
                        'path' => 'mylibrary/bookshelves/{shelf}/clearVolumes',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'mylibrary/bookshelves/{shelf}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'mylibrary/bookshelves',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'moveVolume' => [
                        'path' => 'mylibrary/bookshelves/{shelf}/moveVolume',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumePosition' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'removeVolume' => [
                        'path' => 'mylibrary/bookshelves/{shelf}/removeVolume',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reason' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->mylibrary_bookshelves_volumes = new Google_Service_Books_MylibraryBookshelvesVolumes_Resource(
            $this,
            $this->serviceName,
            'volumes',
            [
                'methods' => [
                    'list' => [
                        'path' => 'mylibrary/bookshelves/{shelf}/volumes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'shelf' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'country' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showPreorders' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->mylibrary_readingpositions = new Google_Service_Books_MylibraryReadingpositions_Resource(
            $this,
            $this->serviceName,
            'readingpositions',
            [
                'methods' => [
                    'get' => [
                        'path' => 'mylibrary/readingpositions/{volumeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'setPosition' => [
                        'path' => 'mylibrary/readingpositions/{volumeId}/setPosition',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timestamp' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'position' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deviceCookie' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'action' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->onboarding = new Google_Service_Books_Onboarding_Resource(
            $this,
            $this->serviceName,
            'onboarding',
            [
                'methods' => [
                    'listCategories' => [
                        'path' => 'onboarding/listCategories',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listCategoryVolumes' => [
                        'path' => 'onboarding/listCategoryVolumes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'categoryId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->promooffer = new Google_Service_Books_Promooffer_Resource(
            $this,
            $this->serviceName,
            'promooffer',
            [
                'methods' => [
                    'accept' => [
                        'path' => 'promooffer/accept',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'product' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'offerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'androidId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'device' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'model' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'serial' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'manufacturer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'dismiss' => [
                        'path' => 'promooffer/dismiss',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'product' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'offerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'androidId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'device' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'model' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'serial' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'manufacturer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'promooffer/get',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'product' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'androidId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'device' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'model' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'serial' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'manufacturer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->volumes = new Google_Service_Books_Volumes_Resource(
            $this,
            $this->serviceName,
            'volumes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'volumes/{volumeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user_library_consistent_read' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'country' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'partner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'volumes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'libraryRestrict' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'langRestrict' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showPreorders' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'printType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'download' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'partner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->volumes_associated = new Google_Service_Books_VolumesAssociated_Resource(
            $this,
            $this->serviceName,
            'associated',
            [
                'methods' => [
                    'list' => [
                        'path' => 'volumes/{volumeId}/associated',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'volumeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'association' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->volumes_mybooks = new Google_Service_Books_VolumesMybooks_Resource(
            $this,
            $this->serviceName,
            'mybooks',
            [
                'methods' => [
                    'list' => [
                        'path' => 'volumes/mybooks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'acquireMethod' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'processingState' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->volumes_recommended = new Google_Service_Books_VolumesRecommended_Resource(
            $this,
            $this->serviceName,
            'recommended',
            [
                'methods' => [
                    'list' => [
                        'path' => 'volumes/recommended',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'rate' => [
                        'path' => 'volumes/recommended/rate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'rating' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->volumes_useruploaded = new Google_Service_Books_VolumesUseruploaded_Resource(
            $this,
            $this->serviceName,
            'useruploaded',
            [
                'methods' => [
                    'list' => [
                        'path' => 'volumes/useruploaded',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'volumeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'processingState' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "bookshelves" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $bookshelves = $booksService->bookshelves;
 *  </code>
 */
class Google_Service_Books_Bookshelves_Resource extends Google_Service_Resource
{

    /**
     * Retrieves metadata for a specific bookshelf for the specified user.
     * (bookshelves.get)
     *
     * @param string $userId ID of user for whom to retrieve bookshelves.
     * @param string $shelf ID of bookshelf to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     */
    public function get($userId, $shelf, $optParams = [])
    {
        $params = ['userId' => $userId, 'shelf' => $shelf];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Bookshelf");
    }

    /**
     * Retrieves a list of public bookshelves for the specified user.
     * (bookshelves.listBookshelves)
     *
     * @param string $userId ID of user for whom to retrieve bookshelves.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     */
    public function listBookshelves($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Bookshelves");
    }
}

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumes = $booksService->volumes;
 *  </code>
 */
class Google_Service_Books_BookshelvesVolumes_Resource extends Google_Service_Resource
{

    /**
     * Retrieves volumes in a specific bookshelf for the specified user.
     * (volumes.listBookshelvesVolumes)
     *
     * @param string $userId ID of user for whom to retrieve bookshelf volumes.
     * @param string $shelf ID of bookshelf to retrieve volumes.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool showPreorders Set to true to show pre-ordered books. Defaults
     * to false.
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string startIndex Index of the first element to return (starts at
     * 0)
     */
    public function listBookshelvesVolumes($userId, $shelf, $optParams = [])
    {
        $params = ['userId' => $userId, 'shelf' => $shelf];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}

/**
 * The "cloudloading" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $cloudloading = $booksService->cloudloading;
 *  </code>
 */
class Google_Service_Books_Cloudloading_Resource extends Google_Service_Resource
{

    /**
     * (cloudloading.addBook)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string upload_client_token
     * @opt_param string drive_document_id A drive document id. The
     * upload_client_token must not be set.
     * @opt_param string mime_type The document MIME type. It can be set only if the
     * drive_document_id is set.
     * @opt_param string name The document name. It can be set only if the
     * drive_document_id is set.
     */
    public function addBook($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('addBook', [$params], "Google_Service_Books_BooksCloudloadingResource");
    }

    /**
     * Remove the book and its contents (cloudloading.deleteBook)
     *
     * @param string $volumeId The id of the book to be removed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deleteBook($volumeId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('deleteBook', [$params]);
    }

    /**
     * (cloudloading.updateBook)
     *
     * @param Google_BooksCloudloadingResource|Google_Service_Books_BooksCloudloadingResource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function updateBook(Google_Service_Books_BooksCloudloadingResource $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('updateBook', [$params], "Google_Service_Books_BooksCloudloadingResource");
    }
}

/**
 * The "dictionary" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $dictionary = $booksService->dictionary;
 *  </code>
 */
class Google_Service_Books_Dictionary_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of offline dictionary meatadata available
     * (dictionary.listOfflineMetadata)
     *
     * @param string $cpksver The device/version ID from which to request the data.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listOfflineMetadata($cpksver, $optParams = [])
    {
        $params = ['cpksver' => $cpksver];
        $params = array_merge($params, $optParams);

        return $this->call('listOfflineMetadata', [$params], "Google_Service_Books_Metadata");
    }
}

/**
 * The "layers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $layers = $booksService->layers;
 *  </code>
 */
class Google_Service_Books_Layers_Resource extends Google_Service_Resource
{

    /**
     * Gets the layer summary for a volume. (layers.get)
     *
     * @param string $volumeId The volume to retrieve layers for.
     * @param string $summaryId The ID for the layer to get the summary for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string contentVersion The content version for the requested
     * volume.
     */
    public function get($volumeId, $summaryId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'summaryId' => $summaryId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Layersummary");
    }

    /**
     * List the layer summaries for a volume. (layers.listLayers)
     *
     * @param string $volumeId The volume to retrieve layers for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The value of the nextToken from the previous
     * page.
     * @opt_param string contentVersion The content version for the requested
     * volume.
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string source String to identify the originator of this request.
     */
    public function listLayers($volumeId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Layersummaries");
    }
}

/**
 * The "annotationData" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $annotationData = $booksService->annotationData;
 *  </code>
 */
class Google_Service_Books_LayersAnnotationData_Resource extends Google_Service_Resource
{

    /**
     * Gets the annotation data. (annotationData.get)
     *
     * @param string $volumeId The volume to retrieve annotations for.
     * @param string $layerId The ID for the layer to get the annotations.
     * @param string $annotationDataId The ID of the annotation data to retrieve.
     * @param string $contentVersion The content version for the volume you are
     *                                 trying to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int scale The requested scale for the image.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param bool allowWebDefinitions For the dictionary layer. Whether or not
     * to allow web definitions.
     * @opt_param int h The requested pixel height for any images. If height is
     * provided width must also be provided.
     * @opt_param string locale The locale information for the data. ISO-639-1
     * language and ISO-3166-1 country code. Ex: 'en_US'.
     * @opt_param int w The requested pixel width for any images. If width is
     * provided height must also be provided.
     */
    public function get($volumeId, $layerId, $annotationDataId, $contentVersion, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'layerId' => $layerId, 'annotationDataId' => $annotationDataId, 'contentVersion' => $contentVersion];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Annotationdata");
    }

    /**
     * Gets the annotation data for a volume and layer.
     * (annotationData.listLayersAnnotationData)
     *
     * @param string $volumeId The volume to retrieve annotation data for.
     * @param string $layerId The ID for the layer to get the annotation data.
     * @param string $contentVersion The content version for the requested volume.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int scale The requested scale for the image.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string locale The locale information for the data. ISO-639-1
     * language and ISO-3166-1 country code. Ex: 'en_US'.
     * @opt_param int h The requested pixel height for any images. If height is
     * provided width must also be provided.
     * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
     * prior to this timestamp (exclusive).
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string annotationDataId The list of Annotation Data Ids to
     * retrieve. Pagination is ignored if this is set.
     * @opt_param string pageToken The value of the nextToken from the previous
     * page.
     * @opt_param int w The requested pixel width for any images. If width is
     * provided height must also be provided.
     * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
     * since this timestamp (inclusive).
     */
    public function listLayersAnnotationData($volumeId, $layerId, $contentVersion, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'layerId' => $layerId, 'contentVersion' => $contentVersion];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Annotationsdata");
    }
}

/**
 * The "volumeAnnotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumeAnnotations = $booksService->volumeAnnotations;
 *  </code>
 */
class Google_Service_Books_LayersVolumeAnnotations_Resource extends Google_Service_Resource
{

    /**
     * Gets the volume annotation. (volumeAnnotations.get)
     *
     * @param string $volumeId The volume to retrieve annotations for.
     * @param string $layerId The ID for the layer to get the annotations.
     * @param string $annotationId The ID of the volume annotation to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale The locale information for the data. ISO-639-1
     * language and ISO-3166-1 country code. Ex: 'en_US'.
     * @opt_param string source String to identify the originator of this request.
     */
    public function get($volumeId, $layerId, $annotationId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'layerId' => $layerId, 'annotationId' => $annotationId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Volumeannotation");
    }

    /**
     * Gets the volume annotations for a volume and layer.
     * (volumeAnnotations.listLayersVolumeAnnotations)
     *
     * @param string $volumeId The volume to retrieve annotations for.
     * @param string $layerId The ID for the layer to get the annotations.
     * @param string $contentVersion The content version for the requested volume.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool showDeleted Set to true to return deleted annotations.
     * updatedMin must be in the request to use this. Defaults to false.
     * @opt_param string volumeAnnotationsVersion The version of the volume
     * annotations that you are requesting.
     * @opt_param string endPosition The end position to end retrieving data from.
     * @opt_param string endOffset The end offset to end retrieving data from.
     * @opt_param string locale The locale information for the data. ISO-639-1
     * language and ISO-3166-1 country code. Ex: 'en_US'.
     * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
     * since this timestamp (inclusive).
     * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
     * prior to this timestamp (exclusive).
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string pageToken The value of the nextToken from the previous
     * page.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string startOffset The start offset to start retrieving data from.
     * @opt_param string startPosition The start position to start retrieving data
     * from.
     */
    public function listLayersVolumeAnnotations($volumeId, $layerId, $contentVersion, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'layerId' => $layerId, 'contentVersion' => $contentVersion];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumeannotations");
    }
}

/**
 * The "myconfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $myconfig = $booksService->myconfig;
 *  </code>
 */
class Google_Service_Books_Myconfig_Resource extends Google_Service_Resource
{

    /**
     * Gets the current settings for the user. (myconfig.getUserSettings)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getUserSettings($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('getUserSettings', [$params], "Google_Service_Books_Usersettings");
    }

    /**
     * Release downloaded content access restriction.
     * (myconfig.releaseDownloadAccess)
     *
     * @param string $volumeIds The volume(s) to release restrictions for.
     * @param string $cpksver The device/version ID from which to release the
     *                          restriction.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
     * localization, i.e. en_US.
     * @opt_param string source String to identify the originator of this request.
     */
    public function releaseDownloadAccess($volumeIds, $cpksver, $optParams = [])
    {
        $params = ['volumeIds' => $volumeIds, 'cpksver' => $cpksver];
        $params = array_merge($params, $optParams);

        return $this->call('releaseDownloadAccess', [$params], "Google_Service_Books_DownloadAccesses");
    }

    /**
     * Request concurrent and download access restrictions. (myconfig.requestAccess)
     *
     * @param string $source String to identify the originator of this request.
     * @param string $volumeId The volume to request concurrent/download
     *                          restrictions for.
     * @param string $nonce The client nonce value.
     * @param string $cpksver The device/version ID from which to request the
     *                          restrictions.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string licenseTypes The type of access license to request. If not
     * specified, the default is BOTH.
     * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
     * localization, i.e. en_US.
     */
    public function requestAccess($source, $volumeId, $nonce, $cpksver, $optParams = [])
    {
        $params = ['source' => $source, 'volumeId' => $volumeId, 'nonce' => $nonce, 'cpksver' => $cpksver];
        $params = array_merge($params, $optParams);

        return $this->call('requestAccess', [$params], "Google_Service_Books_RequestAccess");
    }

    /**
     * Request downloaded content access for specified volumes on the My eBooks
     * shelf. (myconfig.syncVolumeLicenses)
     *
     * @param string $source String to identify the originator of this request.
     * @param string $nonce The client nonce value.
     * @param string $cpksver The device/version ID from which to release the
     *                          restriction.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string features List of features supported by the client, i.e.,
     * 'RENTALS'
     * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
     * localization, i.e. en_US.
     * @opt_param bool showPreorders Set to true to show pre-ordered books. Defaults
     * to false.
     * @opt_param string volumeIds The volume(s) to request download restrictions
     * for.
     */
    public function syncVolumeLicenses($source, $nonce, $cpksver, $optParams = [])
    {
        $params = ['source' => $source, 'nonce' => $nonce, 'cpksver' => $cpksver];
        $params = array_merge($params, $optParams);

        return $this->call('syncVolumeLicenses', [$params], "Google_Service_Books_Volumes");
    }

    /**
     * Sets the settings for the user. If a sub-object is specified, it will
     * overwrite the existing sub-object stored in the server. Unspecified sub-
     * objects will retain the existing value. (myconfig.updateUserSettings)
     *
     * @param Google_Service_Books_Usersettings|Google_Usersettings $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function updateUserSettings(Google_Service_Books_Usersettings $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('updateUserSettings', [$params], "Google_Service_Books_Usersettings");
    }
}

/**
 * The "mylibrary" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $mylibrary = $booksService->mylibrary;
 *  </code>
 */
class Google_Service_Books_Mylibrary_Resource extends Google_Service_Resource
{
}

/**
 * The "annotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $annotations = $booksService->annotations;
 *  </code>
 */
class Google_Service_Books_MylibraryAnnotations_Resource extends Google_Service_Resource
{

    /**
     * Deletes an annotation. (annotations.delete)
     *
     * @param string $annotationId The ID for the annotation to delete.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string source String to identify the originator of this request.
     * @return expected_class|Google_Http_Request
     */
    public function delete($annotationId, $optParams = [])
    {
        $params = ['annotationId' => $annotationId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Inserts a new annotation. (annotations.insert)
     *
     * @param Google_Annotation|Google_Service_Books_Annotation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string country ISO-3166-1 code to override the IP-based location.
     * @opt_param bool showOnlySummaryInResponse Requests that only the summary of
     * the specified layer be provided in the response.
     * @opt_param string source String to identify the originator of this request.
     */
    public function insert(Google_Service_Books_Annotation $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Books_Annotation");
    }

    /**
     * Retrieves a list of annotations, possibly filtered.
     * (annotations.listMylibraryAnnotations)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool showDeleted Set to true to return deleted annotations.
     * updatedMin must be in the request to use this. Defaults to false.
     * @opt_param string updatedMin RFC 3339 timestamp to restrict to items updated
     * since this timestamp (inclusive).
     * @opt_param string layerIds The layer ID(s) to limit annotation by.
     * @opt_param string volumeId The volume to restrict annotations to.
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string pageToken The value of the nextToken from the previous
     * page.
     * @opt_param string updatedMax RFC 3339 timestamp to restrict to items updated
     * prior to this timestamp (exclusive).
     * @opt_param string contentVersion The content version for the requested
     * volume.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string layerId The layer ID to limit annotation by.
     */
    public function listMylibraryAnnotations($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Annotations");
    }

    /**
     * Gets the summary of specified layers. (annotations.summary)
     *
     * @param string $layerIds Array of layer IDs to get the summary for.
     * @param string $volumeId Volume id to get the summary for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function summary($layerIds, $volumeId, $optParams = [])
    {
        $params = ['layerIds' => $layerIds, 'volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('summary', [$params], "Google_Service_Books_AnnotationsSummary");
    }

    /**
     * Updates an existing annotation. (annotations.update)
     *
     * @param string $annotationId The ID for the annotation to update.
     * @param Google_Annotation|Google_Service_Books_Annotation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     */
    public function update($annotationId, Google_Service_Books_Annotation $postBody, $optParams = [])
    {
        $params = ['annotationId' => $annotationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Books_Annotation");
    }
}

/**
 * The "bookshelves" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $bookshelves = $booksService->bookshelves;
 *  </code>
 */
class Google_Service_Books_MylibraryBookshelves_Resource extends Google_Service_Resource
{

    /**
     * Adds a volume to a bookshelf. (bookshelves.addVolume)
     *
     * @param string $shelf ID of bookshelf to which to add a volume.
     * @param string $volumeId ID of volume to add.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string reason The reason for which the book is added to the
     * library.
     * @opt_param string source String to identify the originator of this request.
     * @return expected_class|Google_Http_Request
     */
    public function addVolume($shelf, $volumeId, $optParams = [])
    {
        $params = ['shelf' => $shelf, 'volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('addVolume', [$params]);
    }

    /**
     * Clears all volumes from a bookshelf. (bookshelves.clearVolumes)
     *
     * @param string $shelf ID of bookshelf from which to remove a volume.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string source String to identify the originator of this request.
     * @return expected_class|Google_Http_Request
     */
    public function clearVolumes($shelf, $optParams = [])
    {
        $params = ['shelf' => $shelf];
        $params = array_merge($params, $optParams);

        return $this->call('clearVolumes', [$params]);
    }

    /**
     * Retrieves metadata for a specific bookshelf belonging to the authenticated
     * user. (bookshelves.get)
     *
     * @param string $shelf ID of bookshelf to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     */
    public function get($shelf, $optParams = [])
    {
        $params = ['shelf' => $shelf];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Bookshelf");
    }

    /**
     * Retrieves a list of bookshelves belonging to the authenticated user.
     * (bookshelves.listMylibraryBookshelves)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     */
    public function listMylibraryBookshelves($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Bookshelves");
    }

    /**
     * Moves a volume within a bookshelf. (bookshelves.moveVolume)
     *
     * @param string $shelf ID of bookshelf with the volume.
     * @param string $volumeId ID of volume to move.
     * @param int $volumePosition Position on shelf to move the item (0 puts the
     *                               item before the current first item, 1 puts it between the first and the
     *                               second and so on.)
     * @param array $optParams Optional parameters.
     *
     * @opt_param string source String to identify the originator of this request.
     * @return expected_class|Google_Http_Request
     */
    public function moveVolume($shelf, $volumeId, $volumePosition, $optParams = [])
    {
        $params = ['shelf' => $shelf, 'volumeId' => $volumeId, 'volumePosition' => $volumePosition];
        $params = array_merge($params, $optParams);

        return $this->call('moveVolume', [$params]);
    }

    /**
     * Removes a volume from a bookshelf. (bookshelves.removeVolume)
     *
     * @param string $shelf ID of bookshelf from which to remove a volume.
     * @param string $volumeId ID of volume to remove.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string reason The reason for which the book is removed from the
     * library.
     * @opt_param string source String to identify the originator of this request.
     * @return expected_class|Google_Http_Request
     */
    public function removeVolume($shelf, $volumeId, $optParams = [])
    {
        $params = ['shelf' => $shelf, 'volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('removeVolume', [$params]);
    }
}

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumes = $booksService->volumes;
 *  </code>
 */
class Google_Service_Books_MylibraryBookshelvesVolumes_Resource extends Google_Service_Resource
{

    /**
     * Gets volume information for volumes on a bookshelf.
     * (volumes.listMylibraryBookshelvesVolumes)
     *
     * @param string $shelf The bookshelf ID or name retrieve volumes for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     * @opt_param string country ISO-3166-1 code to override the IP-based location.
     * @opt_param bool showPreorders Set to true to show pre-ordered books. Defaults
     * to false.
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string q Full-text search query string in this bookshelf.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string startIndex Index of the first element to return (starts at
     * 0)
     */
    public function listMylibraryBookshelvesVolumes($shelf, $optParams = [])
    {
        $params = ['shelf' => $shelf];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}

/**
 * The "readingpositions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $readingpositions = $booksService->readingpositions;
 *  </code>
 */
class Google_Service_Books_MylibraryReadingpositions_Resource extends Google_Service_Resource
{

    /**
     * Retrieves my reading position information for a volume.
     * (readingpositions.get)
     *
     * @param string $volumeId ID of volume for which to retrieve a reading
     *                          position.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string contentVersion Volume content version for which this
     * reading position is requested.
     */
    public function get($volumeId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_ReadingPosition");
    }

    /**
     * Sets my reading position information for a volume.
     * (readingpositions.setPosition)
     *
     * @param string $volumeId ID of volume for which to update the reading
     *                          position.
     * @param string $timestamp RFC 3339 UTC format timestamp associated with this
     *                          reading position.
     * @param string $position Position string for the new volume reading position.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string deviceCookie Random persistent device cookie optional on
     * set position.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string contentVersion Volume content version for which this
     * reading position applies.
     * @opt_param string action Action that caused this reading position to be set.
     * @return expected_class|Google_Http_Request
     */
    public function setPosition($volumeId, $timestamp, $position, $optParams = [])
    {
        $params = ['volumeId' => $volumeId, 'timestamp' => $timestamp, 'position' => $position];
        $params = array_merge($params, $optParams);

        return $this->call('setPosition', [$params]);
    }
}

/**
 * The "onboarding" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $onboarding = $booksService->onboarding;
 *  </code>
 */
class Google_Service_Books_Onboarding_Resource extends Google_Service_Resource
{

    /**
     * List categories for onboarding experience. (onboarding.listCategories)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
     * Default is en-US if unset.
     */
    public function listCategories($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listCategories', [$params], "Google_Service_Books_Category");
    }

    /**
     * List available volumes under categories for onboarding experience.
     * (onboarding.listCategoryVolumes)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
     * Default is en-US if unset.
     * @opt_param string pageToken The value of the nextToken from the previous
     * page.
     * @opt_param string categoryId List of category ids requested.
     * @opt_param string pageSize Number of maximum results per page to be included
     * in the response.
     */
    public function listCategoryVolumes($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listCategoryVolumes', [$params], "Google_Service_Books_Volume2");
    }
}

/**
 * The "promooffer" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $promooffer = $booksService->promooffer;
 *  </code>
 */
class Google_Service_Books_Promooffer_Resource extends Google_Service_Resource
{

    /**
     * (promooffer.accept)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string product device product
     * @opt_param string volumeId Volume id to exercise the offer
     * @opt_param string offerId
     * @opt_param string androidId device android_id
     * @opt_param string device device device
     * @opt_param string model device model
     * @opt_param string serial device serial
     * @opt_param string manufacturer device manufacturer
     * @return expected_class|Google_Http_Request
     */
    public function accept($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('accept', [$params]);
    }

    /**
     * (promooffer.dismiss)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string product device product
     * @opt_param string offerId Offer to dimiss
     * @opt_param string androidId device android_id
     * @opt_param string device device device
     * @opt_param string model device model
     * @opt_param string serial device serial
     * @opt_param string manufacturer device manufacturer
     * @return expected_class|Google_Http_Request
     */
    public function dismiss($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('dismiss', [$params]);
    }

    /**
     * Returns a list of promo offers available to the user (promooffer.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string product device product
     * @opt_param string androidId device android_id
     * @opt_param string device device device
     * @opt_param string model device model
     * @opt_param string serial device serial
     * @opt_param string manufacturer device manufacturer
     */
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Offers");
    }
}

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumes = $booksService->volumes;
 *  </code>
 */
class Google_Service_Books_Volumes_Resource extends Google_Service_Resource
{

    /**
     * Gets volume information for a single volume. (volumes.get)
     *
     * @param string $volumeId ID of volume to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool user_library_consistent_read
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     * @opt_param string country ISO-3166-1 code to override the IP-based location.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string partner Brand results for partner ID.
     */
    public function get($volumeId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Books_Volume");
    }

    /**
     * Performs a book search. (volumes.listVolumes)
     *
     * @param string $q Full-text search query string.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Sort search results.
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     * @opt_param string libraryRestrict Restrict search to this user's library.
     * @opt_param string langRestrict Restrict results to books with this language
     * code.
     * @opt_param bool showPreorders Set to true to show books available for
     * preorder. Defaults to false.
     * @opt_param string printType Restrict to books or magazines.
     * @opt_param string maxResults Maximum number of results to return.
     * @opt_param string filter Filter search results.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string startIndex Index of the first result to return (starts at
     * 0)
     * @opt_param string download Restrict to volumes by download availability.
     * @opt_param string partner Restrict and brand results for partner ID.
     */
    public function listVolumes($q, $optParams = [])
    {
        $params = ['q' => $q];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}

/**
 * The "associated" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $associated = $booksService->associated;
 *  </code>
 */
class Google_Service_Books_VolumesAssociated_Resource extends Google_Service_Resource
{

    /**
     * Return a list of associated books. (associated.listVolumesAssociated)
     *
     * @param string $volumeId ID of the source volume.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
     * 'en_US'. Used for generating recommendations.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string association Association type.
     */
    public function listVolumesAssociated($volumeId, $optParams = [])
    {
        $params = ['volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}

/**
 * The "mybooks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $mybooks = $booksService->mybooks;
 *  </code>
 */
class Google_Service_Books_VolumesMybooks_Resource extends Google_Service_Resource
{

    /**
     * Return a list of books in My Library. (mybooks.listVolumesMybooks)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code.
     * Ex:'en_US'. Used for generating recommendations.
     * @opt_param string startIndex Index of the first result to return (starts at
     * 0)
     * @opt_param string maxResults Maximum number of results to return.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string acquireMethod How the book was aquired
     * @opt_param string processingState The processing state of the user uploaded
     * volumes to be returned. Applicable only if the UPLOADED is specified in the
     * acquireMethod.
     */
    public function listVolumesMybooks($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}

/**
 * The "recommended" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $recommended = $booksService->recommended;
 *  </code>
 */
class Google_Service_Books_VolumesRecommended_Resource extends Google_Service_Resource
{

    /**
     * Return a list of recommended books for the current user.
     * (recommended.listVolumesRecommended)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
     * 'en_US'. Used for generating recommendations.
     * @opt_param string source String to identify the originator of this request.
     */
    public function listVolumesRecommended($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }

    /**
     * Rate a recommended book for the current user. (recommended.rate)
     *
     * @param string $rating Rating to be given to the volume.
     * @param string $volumeId ID of the source volume.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
     * 'en_US'. Used for generating recommendations.
     * @opt_param string source String to identify the originator of this request.
     */
    public function rate($rating, $volumeId, $optParams = [])
    {
        $params = ['rating' => $rating, 'volumeId' => $volumeId];
        $params = array_merge($params, $optParams);

        return $this->call('rate', [$params], "Google_Service_Books_BooksVolumesRecommendedRateResponse");
    }
}

/**
 * The "useruploaded" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $useruploaded = $booksService->useruploaded;
 *  </code>
 */
class Google_Service_Books_VolumesUseruploaded_Resource extends Google_Service_Resource
{

    /**
     * Return a list of books uploaded by the current user.
     * (useruploaded.listVolumesUseruploaded)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale ISO-639-1 language and ISO-3166-1 country code. Ex:
     * 'en_US'. Used for generating recommendations.
     * @opt_param string volumeId The ids of the volumes to be returned. If not
     * specified all that match the processingState are returned.
     * @opt_param string maxResults Maximum number of results to return.
     * @opt_param string source String to identify the originator of this request.
     * @opt_param string startIndex Index of the first result to return (starts at
     * 0)
     * @opt_param string processingState The processing state of the user uploaded
     * volumes to be returned.
     */
    public function listVolumesUseruploaded($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Books_Volumes");
    }
}


/**
 * Class Google_Service_Books_Annotation
 */
class Google_Service_Books_Annotation extends Google_Collection
{
    public $afterSelectedText;
    public $beforeSelectedText;
    public $created;
    public $data;
    public $deleted;
    public $highlightStyle;
    public $id;
    public $kind;
    public $layerId;
    public $pageIds;
    public $selectedText;
    public $selfLink;
    public $updated;
    public $volumeId;
    protected $collection_key = 'pageIds';
    protected $internal_gapi_mappings = [];
    protected $clientVersionRangesType = 'Google_Service_Books_AnnotationClientVersionRanges';
    protected $clientVersionRangesDataType = '';
    protected $currentVersionRangesType = 'Google_Service_Books_AnnotationCurrentVersionRanges';
    protected $currentVersionRangesDataType = '';
    protected $layerSummaryType = 'Google_Service_Books_AnnotationLayerSummary';
    protected $layerSummaryDataType = '';

    /**
     * @return mixed
     */
    public function getAfterSelectedText()
    {
        return $this->afterSelectedText;
    }

    /**
     * @param $afterSelectedText
     */
    public function setAfterSelectedText($afterSelectedText)
    {
        $this->afterSelectedText = $afterSelectedText;
    }

    /**
     * @return mixed
     */
    public function getBeforeSelectedText()
    {
        return $this->beforeSelectedText;
    }

    /**
     * @param $beforeSelectedText
     */
    public function setBeforeSelectedText($beforeSelectedText)
    {
        $this->beforeSelectedText = $beforeSelectedText;
    }

    /**
     * @param Google_Service_Books_AnnotationClientVersionRanges $clientVersionRanges
     */
    public function setClientVersionRanges(Google_Service_Books_AnnotationClientVersionRanges $clientVersionRanges)
    {
        $this->clientVersionRanges = $clientVersionRanges;
    }

    /**
     * @return mixed
     */
    public function getClientVersionRanges()
    {
        return $this->clientVersionRanges;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @param Google_Service_Books_AnnotationCurrentVersionRanges $currentVersionRanges
     */
    public function setCurrentVersionRanges(Google_Service_Books_AnnotationCurrentVersionRanges $currentVersionRanges)
    {
        $this->currentVersionRanges = $currentVersionRanges;
    }

    /**
     * @return mixed
     */
    public function getCurrentVersionRanges()
    {
        return $this->currentVersionRanges;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
    public function getHighlightStyle()
    {
        return $this->highlightStyle;
    }

    /**
     * @param $highlightStyle
     */
    public function setHighlightStyle($highlightStyle)
    {
        $this->highlightStyle = $highlightStyle;
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
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
    }

    /**
     * @param Google_Service_Books_AnnotationLayerSummary $layerSummary
     */
    public function setLayerSummary(Google_Service_Books_AnnotationLayerSummary $layerSummary)
    {
        $this->layerSummary = $layerSummary;
    }

    /**
     * @return mixed
     */
    public function getLayerSummary()
    {
        return $this->layerSummary;
    }

    /**
     * @return mixed
     */
    public function getPageIds()
    {
        return $this->pageIds;
    }

    /**
     * @param $pageIds
     */
    public function setPageIds($pageIds)
    {
        $this->pageIds = $pageIds;
    }

    /**
     * @return mixed
     */
    public function getSelectedText()
    {
        return $this->selectedText;
    }

    /**
     * @param $selectedText
     */
    public function setSelectedText($selectedText)
    {
        $this->selectedText = $selectedText;
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

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_AnnotationClientVersionRanges
 */
class Google_Service_Books_AnnotationClientVersionRanges extends Google_Model
{
    public $contentVersion;
    protected $internal_gapi_mappings = [];
    protected $cfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $cfiRangeDataType = '';
    protected $gbImageRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbImageRangeDataType = '';
    protected $gbTextRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbTextRangeDataType = '';
    protected $imageCfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $imageCfiRangeDataType = '';


    /**
     * @param Google_Service_Books_BooksAnnotationsRange $cfiRange
     */
    public function setCfiRange(Google_Service_Books_BooksAnnotationsRange $cfiRange)
    {
        $this->cfiRange = $cfiRange;
    }

    /**
     * @return mixed
     */
    public function getCfiRange()
    {
        return $this->cfiRange;
    }

    /**
     * @return mixed
     */
    public function getContentVersion()
    {
        return $this->contentVersion;
    }

    /**
     * @param $contentVersion
     */
    public function setContentVersion($contentVersion)
    {
        $this->contentVersion = $contentVersion;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbImageRange
     */
    public function setGbImageRange(Google_Service_Books_BooksAnnotationsRange $gbImageRange)
    {
        $this->gbImageRange = $gbImageRange;
    }

    /**
     * @return mixed
     */
    public function getGbImageRange()
    {
        return $this->gbImageRange;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbTextRange
     */
    public function setGbTextRange(Google_Service_Books_BooksAnnotationsRange $gbTextRange)
    {
        $this->gbTextRange = $gbTextRange;
    }

    /**
     * @return mixed
     */
    public function getGbTextRange()
    {
        return $this->gbTextRange;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $imageCfiRange
     */
    public function setImageCfiRange(Google_Service_Books_BooksAnnotationsRange $imageCfiRange)
    {
        $this->imageCfiRange = $imageCfiRange;
    }

    /**
     * @return mixed
     */
    public function getImageCfiRange()
    {
        return $this->imageCfiRange;
    }
}

/**
 * Class Google_Service_Books_AnnotationCurrentVersionRanges
 */
class Google_Service_Books_AnnotationCurrentVersionRanges extends Google_Model
{
    public $contentVersion;
    protected $internal_gapi_mappings = [];
    protected $cfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $cfiRangeDataType = '';
    protected $gbImageRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbImageRangeDataType = '';
    protected $gbTextRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbTextRangeDataType = '';
    protected $imageCfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $imageCfiRangeDataType = '';


    /**
     * @param Google_Service_Books_BooksAnnotationsRange $cfiRange
     */
    public function setCfiRange(Google_Service_Books_BooksAnnotationsRange $cfiRange)
    {
        $this->cfiRange = $cfiRange;
    }

    /**
     * @return mixed
     */
    public function getCfiRange()
    {
        return $this->cfiRange;
    }

    /**
     * @return mixed
     */
    public function getContentVersion()
    {
        return $this->contentVersion;
    }

    /**
     * @param $contentVersion
     */
    public function setContentVersion($contentVersion)
    {
        $this->contentVersion = $contentVersion;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbImageRange
     */
    public function setGbImageRange(Google_Service_Books_BooksAnnotationsRange $gbImageRange)
    {
        $this->gbImageRange = $gbImageRange;
    }

    /**
     * @return mixed
     */
    public function getGbImageRange()
    {
        return $this->gbImageRange;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbTextRange
     */
    public function setGbTextRange(Google_Service_Books_BooksAnnotationsRange $gbTextRange)
    {
        $this->gbTextRange = $gbTextRange;
    }

    /**
     * @return mixed
     */
    public function getGbTextRange()
    {
        return $this->gbTextRange;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $imageCfiRange
     */
    public function setImageCfiRange(Google_Service_Books_BooksAnnotationsRange $imageCfiRange)
    {
        $this->imageCfiRange = $imageCfiRange;
    }

    /**
     * @return mixed
     */
    public function getImageCfiRange()
    {
        return $this->imageCfiRange;
    }
}

/**
 * Class Google_Service_Books_AnnotationLayerSummary
 */
class Google_Service_Books_AnnotationLayerSummary extends Google_Model
{
    public $allowedCharacterCount;
    public $limitType;
    public $remainingCharacterCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowedCharacterCount()
    {
        return $this->allowedCharacterCount;
    }

    /**
     * @param $allowedCharacterCount
     */
    public function setAllowedCharacterCount($allowedCharacterCount)
    {
        $this->allowedCharacterCount = $allowedCharacterCount;
    }

    /**
     * @return mixed
     */
    public function getLimitType()
    {
        return $this->limitType;
    }

    /**
     * @param $limitType
     */
    public function setLimitType($limitType)
    {
        $this->limitType = $limitType;
    }

    /**
     * @return mixed
     */
    public function getRemainingCharacterCount()
    {
        return $this->remainingCharacterCount;
    }

    /**
     * @param $remainingCharacterCount
     */
    public function setRemainingCharacterCount($remainingCharacterCount)
    {
        $this->remainingCharacterCount = $remainingCharacterCount;
    }
}

/**
 * Class Google_Service_Books_Annotationdata
 */
class Google_Service_Books_Annotationdata extends Google_Model
{
    public $annotationType;
    public $data;
    public $encodedData;
    public $id;
    public $kind;
    public $layerId;
    public $selfLink;
    public $updated;
    public $volumeId;
    protected $internal_gapi_mappings = [
        "encodedData" => "encoded_data",
    ];

    /**
     * @return mixed
     */
    public function getAnnotationType()
    {
        return $this->annotationType;
    }

    /**
     * @param $annotationType
     */
    public function setAnnotationType($annotationType)
    {
        $this->annotationType = $annotationType;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
    public function getEncodedData()
    {
        return $this->encodedData;
    }

    /**
     * @param $encodedData
     */
    public function setEncodedData($encodedData)
    {
        $this->encodedData = $encodedData;
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
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
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

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_Annotations
 */
class Google_Service_Books_Annotations extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Annotation';
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_Books_AnnotationsSummary
 */
class Google_Service_Books_AnnotationsSummary extends Google_Collection
{
    public $kind;
    protected $collection_key = 'layers';
    protected $internal_gapi_mappings = [];
    protected $layersType = 'Google_Service_Books_AnnotationsSummaryLayers';
    protected $layersDataType = 'array';

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
}

/**
 * Class Google_Service_Books_AnnotationsSummaryLayers
 */
class Google_Service_Books_AnnotationsSummaryLayers extends Google_Model
{
    public $allowedCharacterCount;
    public $layerId;
    public $limitType;
    public $remainingCharacterCount;
    public $updated;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowedCharacterCount()
    {
        return $this->allowedCharacterCount;
    }

    /**
     * @param $allowedCharacterCount
     */
    public function setAllowedCharacterCount($allowedCharacterCount)
    {
        $this->allowedCharacterCount = $allowedCharacterCount;
    }

    /**
     * @return mixed
     */
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
    }

    /**
     * @return mixed
     */
    public function getLimitType()
    {
        return $this->limitType;
    }

    /**
     * @param $limitType
     */
    public function setLimitType($limitType)
    {
        $this->limitType = $limitType;
    }

    /**
     * @return mixed
     */
    public function getRemainingCharacterCount()
    {
        return $this->remainingCharacterCount;
    }

    /**
     * @param $remainingCharacterCount
     */
    public function setRemainingCharacterCount($remainingCharacterCount)
    {
        $this->remainingCharacterCount = $remainingCharacterCount;
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
 * Class Google_Service_Books_Annotationsdata
 */
class Google_Service_Books_Annotationsdata extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Annotationdata';
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_Books_BooksAnnotationsRange
 */
class Google_Service_Books_BooksAnnotationsRange extends Google_Model
{
    public $endOffset;
    public $endPosition;
    public $startOffset;
    public $startPosition;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEndOffset()
    {
        return $this->endOffset;
    }

    /**
     * @param $endOffset
     */
    public function setEndOffset($endOffset)
    {
        $this->endOffset = $endOffset;
    }

    /**
     * @return mixed
     */
    public function getEndPosition()
    {
        return $this->endPosition;
    }

    /**
     * @param $endPosition
     */
    public function setEndPosition($endPosition)
    {
        $this->endPosition = $endPosition;
    }

    /**
     * @return mixed
     */
    public function getStartOffset()
    {
        return $this->startOffset;
    }

    /**
     * @param $startOffset
     */
    public function setStartOffset($startOffset)
    {
        $this->startOffset = $startOffset;
    }

    /**
     * @return mixed
     */
    public function getStartPosition()
    {
        return $this->startPosition;
    }

    /**
     * @param $startPosition
     */
    public function setStartPosition($startPosition)
    {
        $this->startPosition = $startPosition;
    }
}

/**
 * Class Google_Service_Books_BooksCloudloadingResource
 */
class Google_Service_Books_BooksCloudloadingResource extends Google_Model
{
    public $author;
    public $processingState;
    public $title;
    public $volumeId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getProcessingState()
    {
        return $this->processingState;
    }

    /**
     * @param $processingState
     */
    public function setProcessingState($processingState)
    {
        $this->processingState = $processingState;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_BooksVolumesRecommendedRateResponse
 */
class Google_Service_Books_BooksVolumesRecommendedRateResponse extends Google_Model
{
    public $consistencyToken;
    protected $internal_gapi_mappings = [
        "consistencyToken" => "consistency_token",
    ];

    /**
     * @return mixed
     */
    public function getConsistencyToken()
    {
        return $this->consistencyToken;
    }

    /**
     * @param $consistencyToken
     */
    public function setConsistencyToken($consistencyToken)
    {
        $this->consistencyToken = $consistencyToken;
    }
}

/**
 * Class Google_Service_Books_Bookshelf
 */
class Google_Service_Books_Bookshelf extends Google_Model
{
    public $access;
    public $created;
    public $description;
    public $id;
    public $kind;
    public $selfLink;
    public $title;
    public $updated;
    public $volumeCount;
    public $volumesLastUpdated;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * @return mixed
     */
    public function getVolumeCount()
    {
        return $this->volumeCount;
    }

    /**
     * @param $volumeCount
     */
    public function setVolumeCount($volumeCount)
    {
        $this->volumeCount = $volumeCount;
    }

    /**
     * @return mixed
     */
    public function getVolumesLastUpdated()
    {
        return $this->volumesLastUpdated;
    }

    /**
     * @param $volumesLastUpdated
     */
    public function setVolumesLastUpdated($volumesLastUpdated)
    {
        $this->volumesLastUpdated = $volumesLastUpdated;
    }
}

/**
 * Class Google_Service_Books_Bookshelves
 */
class Google_Service_Books_Bookshelves extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Bookshelf';
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
 * Class Google_Service_Books_Category
 */
class Google_Service_Books_Category extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_CategoryItems';
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
 * Class Google_Service_Books_CategoryItems
 */
class Google_Service_Books_CategoryItems extends Google_Model
{
    public $badgeUrl;
    public $categoryId;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBadgeUrl()
    {
        return $this->badgeUrl;
    }

    /**
     * @param $badgeUrl
     */
    public function setBadgeUrl($badgeUrl)
    {
        $this->badgeUrl = $badgeUrl;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
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
 * Class Google_Service_Books_ConcurrentAccessRestriction
 */
class Google_Service_Books_ConcurrentAccessRestriction extends Google_Model
{
    public $deviceAllowed;
    public $kind;
    public $maxConcurrentDevices;
    public $message;
    public $nonce;
    public $reasonCode;
    public $restricted;
    public $signature;
    public $source;
    public $timeWindowSeconds;
    public $volumeId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDeviceAllowed()
    {
        return $this->deviceAllowed;
    }

    /**
     * @param $deviceAllowed
     */
    public function setDeviceAllowed($deviceAllowed)
    {
        $this->deviceAllowed = $deviceAllowed;
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
    public function getMaxConcurrentDevices()
    {
        return $this->maxConcurrentDevices;
    }

    /**
     * @param $maxConcurrentDevices
     */
    public function setMaxConcurrentDevices($maxConcurrentDevices)
    {
        $this->maxConcurrentDevices = $maxConcurrentDevices;
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

    /**
     * @return mixed
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param $nonce
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param $reasonCode
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
    }

    /**
     * @return mixed
     */
    public function getRestricted()
    {
        return $this->restricted;
    }

    /**
     * @param $restricted
     */
    public function setRestricted($restricted)
    {
        $this->restricted = $restricted;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
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
    public function getTimeWindowSeconds()
    {
        return $this->timeWindowSeconds;
    }

    /**
     * @param $timeWindowSeconds
     */
    public function setTimeWindowSeconds($timeWindowSeconds)
    {
        $this->timeWindowSeconds = $timeWindowSeconds;
    }

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_Dictlayerdata
 */
class Google_Service_Books_Dictlayerdata extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $commonType = 'Google_Service_Books_DictlayerdataCommon';
    protected $commonDataType = '';
    protected $dictType = 'Google_Service_Books_DictlayerdataDict';
    protected $dictDataType = '';

    /**
     * @param Google_Service_Books_DictlayerdataCommon $common
     */
    public function setCommon(Google_Service_Books_DictlayerdataCommon $common)
    {
        $this->common = $common;
    }

    /**
     * @return mixed
     */
    public function getCommon()
    {
        return $this->common;
    }

    /**
     * @param Google_Service_Books_DictlayerdataDict $dict
     */
    public function setDict(Google_Service_Books_DictlayerdataDict $dict)
    {
        $this->dict = $dict;
    }

    /**
     * @return mixed
     */
    public function getDict()
    {
        return $this->dict;
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
 * Class Google_Service_Books_DictlayerdataCommon
 */
class Google_Service_Books_DictlayerdataCommon extends Google_Model
{
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDict
 */
class Google_Service_Books_DictlayerdataDict extends Google_Collection
{
    protected $collection_key = 'words';
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictSource';
    protected $sourceDataType = '';
    protected $wordsType = 'Google_Service_Books_DictlayerdataDictWords';
    protected $wordsDataType = 'array';


    /**
     * @param Google_Service_Books_DictlayerdataDictSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param $words
     */
    public function setWords($words)
    {
        $this->words = $words;
    }

    /**
     * @return mixed
     */
    public function getWords()
    {
        return $this->words;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictSource
 */
class Google_Service_Books_DictlayerdataDictSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWords
 */
class Google_Service_Books_DictlayerdataDictWords extends Google_Collection
{
    protected $collection_key = 'senses';
    protected $internal_gapi_mappings = [];
    protected $derivativesType = 'Google_Service_Books_DictlayerdataDictWordsDerivatives';
    protected $derivativesDataType = 'array';
    protected $examplesType = 'Google_Service_Books_DictlayerdataDictWordsExamples';
    protected $examplesDataType = 'array';
    protected $sensesType = 'Google_Service_Books_DictlayerdataDictWordsSenses';
    protected $sensesDataType = 'array';
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSource';
    protected $sourceDataType = '';


    /**
     * @param $derivatives
     */
    public function setDerivatives($derivatives)
    {
        $this->derivatives = $derivatives;
    }

    /**
     * @return mixed
     */
    public function getDerivatives()
    {
        return $this->derivatives;
    }

    /**
     * @param $examples
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
    }

    /**
     * @return mixed
     */
    public function getExamples()
    {
        return $this->examples;
    }

    /**
     * @param $senses
     */
    public function setSenses($senses)
    {
        $this->senses = $senses;
    }

    /**
     * @return mixed
     */
    public function getSenses()
    {
        return $this->senses;
    }

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsDerivatives
 */
class Google_Service_Books_DictlayerdataDictWordsDerivatives extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsDerivativesSource';
    protected $sourceDataType = '';

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsDerivativesSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsDerivativesSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsDerivativesSource
 */
class Google_Service_Books_DictlayerdataDictWordsDerivativesSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWordsExamples
 */
class Google_Service_Books_DictlayerdataDictWordsExamples extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsExamplesSource';
    protected $sourceDataType = '';

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsExamplesSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsExamplesSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsExamplesSource
 */
class Google_Service_Books_DictlayerdataDictWordsExamplesSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWordsSenses
 */
class Google_Service_Books_DictlayerdataDictWordsSenses extends Google_Collection
{
    public $partOfSpeech;
    public $pronunciation;
    public $pronunciationUrl;
    public $syllabification;
    protected $collection_key = 'synonyms';
    protected $internal_gapi_mappings = [];
    protected $conjugationsType = 'Google_Service_Books_DictlayerdataDictWordsSensesConjugations';
    protected $conjugationsDataType = 'array';
    protected $definitionsType = 'Google_Service_Books_DictlayerdataDictWordsSensesDefinitions';
    protected $definitionsDataType = 'array';
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSensesSource';
    protected $sourceDataType = '';
    protected $synonymsType = 'Google_Service_Books_DictlayerdataDictWordsSensesSynonyms';
    protected $synonymsDataType = 'array';


    /**
     * @param $conjugations
     */
    public function setConjugations($conjugations)
    {
        $this->conjugations = $conjugations;
    }

    /**
     * @return mixed
     */
    public function getConjugations()
    {
        return $this->conjugations;
    }

    /**
     * @param $definitions
     */
    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @return mixed
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @return mixed
     */
    public function getPartOfSpeech()
    {
        return $this->partOfSpeech;
    }

    /**
     * @param $partOfSpeech
     */
    public function setPartOfSpeech($partOfSpeech)
    {
        $this->partOfSpeech = $partOfSpeech;
    }

    /**
     * @return mixed
     */
    public function getPronunciation()
    {
        return $this->pronunciation;
    }

    /**
     * @param $pronunciation
     */
    public function setPronunciation($pronunciation)
    {
        $this->pronunciation = $pronunciation;
    }

    /**
     * @return mixed
     */
    public function getPronunciationUrl()
    {
        return $this->pronunciationUrl;
    }

    /**
     * @param $pronunciationUrl
     */
    public function setPronunciationUrl($pronunciationUrl)
    {
        $this->pronunciationUrl = $pronunciationUrl;
    }

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsSensesSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsSensesSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getSyllabification()
    {
        return $this->syllabification;
    }

    /**
     * @param $syllabification
     */
    public function setSyllabification($syllabification)
    {
        $this->syllabification = $syllabification;
    }

    /**
     * @param $synonyms
     */
    public function setSynonyms($synonyms)
    {
        $this->synonyms = $synonyms;
    }

    /**
     * @return mixed
     */
    public function getSynonyms()
    {
        return $this->synonyms;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsSensesConjugations
 */
class Google_Service_Books_DictlayerdataDictWordsSensesConjugations extends Google_Model
{
    public $type;
    public $value;
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
 * Class Google_Service_Books_DictlayerdataDictWordsSensesDefinitions
 */
class Google_Service_Books_DictlayerdataDictWordsSensesDefinitions extends Google_Collection
{
    public $definition;
    protected $collection_key = 'examples';
    protected $internal_gapi_mappings = [];
    protected $examplesType = 'Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamples';
    protected $examplesDataType = 'array';

    /**
     * @return mixed
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @param $definition
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    /**
     * @param $examples
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
    }

    /**
     * @return mixed
     */
    public function getExamples()
    {
        return $this->examples;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamples
 */
class Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamples extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamplesSource';
    protected $sourceDataType = '';

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamplesSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamplesSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamplesSource
 */
class Google_Service_Books_DictlayerdataDictWordsSensesDefinitionsExamplesSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWordsSensesSource
 */
class Google_Service_Books_DictlayerdataDictWordsSensesSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWordsSensesSynonyms
 */
class Google_Service_Books_DictlayerdataDictWordsSensesSynonyms extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Books_DictlayerdataDictWordsSensesSynonymsSource';
    protected $sourceDataType = '';

    /**
     * @param Google_Service_Books_DictlayerdataDictWordsSensesSynonymsSource $source
     */
    public function setSource(Google_Service_Books_DictlayerdataDictWordsSensesSynonymsSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}

/**
 * Class Google_Service_Books_DictlayerdataDictWordsSensesSynonymsSource
 */
class Google_Service_Books_DictlayerdataDictWordsSensesSynonymsSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DictlayerdataDictWordsSource
 */
class Google_Service_Books_DictlayerdataDictWordsSource extends Google_Model
{
    public $attribution;
    public $url;
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
 * Class Google_Service_Books_DownloadAccessRestriction
 */
class Google_Service_Books_DownloadAccessRestriction extends Google_Model
{
    public $deviceAllowed;
    public $downloadsAcquired;
    public $justAcquired;
    public $kind;
    public $maxDownloadDevices;
    public $message;
    public $nonce;
    public $reasonCode;
    public $restricted;
    public $signature;
    public $source;
    public $volumeId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDeviceAllowed()
    {
        return $this->deviceAllowed;
    }

    /**
     * @param $deviceAllowed
     */
    public function setDeviceAllowed($deviceAllowed)
    {
        $this->deviceAllowed = $deviceAllowed;
    }

    /**
     * @return mixed
     */
    public function getDownloadsAcquired()
    {
        return $this->downloadsAcquired;
    }

    /**
     * @param $downloadsAcquired
     */
    public function setDownloadsAcquired($downloadsAcquired)
    {
        $this->downloadsAcquired = $downloadsAcquired;
    }

    /**
     * @return mixed
     */
    public function getJustAcquired()
    {
        return $this->justAcquired;
    }

    /**
     * @param $justAcquired
     */
    public function setJustAcquired($justAcquired)
    {
        $this->justAcquired = $justAcquired;
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
    public function getMaxDownloadDevices()
    {
        return $this->maxDownloadDevices;
    }

    /**
     * @param $maxDownloadDevices
     */
    public function setMaxDownloadDevices($maxDownloadDevices)
    {
        $this->maxDownloadDevices = $maxDownloadDevices;
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

    /**
     * @return mixed
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param $nonce
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param $reasonCode
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
    }

    /**
     * @return mixed
     */
    public function getRestricted()
    {
        return $this->restricted;
    }

    /**
     * @param $restricted
     */
    public function setRestricted($restricted)
    {
        $this->restricted = $restricted;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
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
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_DownloadAccesses
 */
class Google_Service_Books_DownloadAccesses extends Google_Collection
{
    public $kind;
    protected $collection_key = 'downloadAccessList';
    protected $internal_gapi_mappings = [];
    protected $downloadAccessListType = 'Google_Service_Books_DownloadAccessRestriction';
    protected $downloadAccessListDataType = 'array';

    /**
     * @param $downloadAccessList
     */
    public function setDownloadAccessList($downloadAccessList)
    {
        $this->downloadAccessList = $downloadAccessList;
    }

    /**
     * @return mixed
     */
    public function getDownloadAccessList()
    {
        return $this->downloadAccessList;
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
 * Class Google_Service_Books_Geolayerdata
 */
class Google_Service_Books_Geolayerdata extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $commonType = 'Google_Service_Books_GeolayerdataCommon';
    protected $commonDataType = '';
    protected $geoType = 'Google_Service_Books_GeolayerdataGeo';
    protected $geoDataType = '';

    /**
     * @param Google_Service_Books_GeolayerdataCommon $common
     */
    public function setCommon(Google_Service_Books_GeolayerdataCommon $common)
    {
        $this->common = $common;
    }

    /**
     * @return mixed
     */
    public function getCommon()
    {
        return $this->common;
    }

    /**
     * @param Google_Service_Books_GeolayerdataGeo $geo
     */
    public function setGeo(Google_Service_Books_GeolayerdataGeo $geo)
    {
        $this->geo = $geo;
    }

    /**
     * @return mixed
     */
    public function getGeo()
    {
        return $this->geo;
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
 * Class Google_Service_Books_GeolayerdataCommon
 */
class Google_Service_Books_GeolayerdataCommon extends Google_Model
{
    public $lang;
    public $previewImageUrl;
    public $snippet;
    public $snippetUrl;
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getPreviewImageUrl()
    {
        return $this->previewImageUrl;
    }

    /**
     * @param $previewImageUrl
     */
    public function setPreviewImageUrl($previewImageUrl)
    {
        $this->previewImageUrl = $previewImageUrl;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippetUrl()
    {
        return $this->snippetUrl;
    }

    /**
     * @param $snippetUrl
     */
    public function setSnippetUrl($snippetUrl)
    {
        $this->snippetUrl = $snippetUrl;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

/**
 * Class Google_Service_Books_GeolayerdataGeo
 */
class Google_Service_Books_GeolayerdataGeo extends Google_Collection
{
    public $cachePolicy;
    public $countryCode;
    public $latitude;
    public $longitude;
    public $mapType;
    public $zoom;
    protected $collection_key = 'boundary';
    protected $internal_gapi_mappings = [];
    protected $boundaryType = 'Google_Service_Books_GeolayerdataGeoBoundary';
    protected $boundaryDataType = 'array';
    protected $viewportType = 'Google_Service_Books_GeolayerdataGeoViewport';
    protected $viewportDataType = '';

    /**
     * @param $boundary
     */
    public function setBoundary($boundary)
    {
        $this->boundary = $boundary;
    }

    /**
     * @return mixed
     */
    public function getBoundary()
    {
        return $this->boundary;
    }

    /**
     * @return mixed
     */
    public function getCachePolicy()
    {
        return $this->cachePolicy;
    }

    /**
     * @param $cachePolicy
     */
    public function setCachePolicy($cachePolicy)
    {
        $this->cachePolicy = $cachePolicy;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getMapType()
    {
        return $this->mapType;
    }

    /**
     * @param $mapType
     */
    public function setMapType($mapType)
    {
        $this->mapType = $mapType;
    }

    /**
     * @param Google_Service_Books_GeolayerdataGeoViewport $viewport
     */
    public function setViewport(Google_Service_Books_GeolayerdataGeoViewport $viewport)
    {
        $this->viewport = $viewport;
    }

    /**
     * @return mixed
     */
    public function getViewport()
    {
        return $this->viewport;
    }

    /**
     * @return mixed
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * @param $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }
}

/**
 * Class Google_Service_Books_GeolayerdataGeoBoundary
 */
class Google_Service_Books_GeolayerdataGeoBoundary extends Google_Model
{
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}

/**
 * Class Google_Service_Books_GeolayerdataGeoViewport
 */
class Google_Service_Books_GeolayerdataGeoViewport extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $hiType = 'Google_Service_Books_GeolayerdataGeoViewportHi';
    protected $hiDataType = '';
    protected $loType = 'Google_Service_Books_GeolayerdataGeoViewportLo';
    protected $loDataType = '';


    /**
     * @param Google_Service_Books_GeolayerdataGeoViewportHi $hi
     */
    public function setHi(Google_Service_Books_GeolayerdataGeoViewportHi $hi)
    {
        $this->hi = $hi;
    }

    /**
     * @return mixed
     */
    public function getHi()
    {
        return $this->hi;
    }

    /**
     * @param Google_Service_Books_GeolayerdataGeoViewportLo $lo
     */
    public function setLo(Google_Service_Books_GeolayerdataGeoViewportLo $lo)
    {
        $this->lo = $lo;
    }

    /**
     * @return mixed
     */
    public function getLo()
    {
        return $this->lo;
    }
}

/**
 * Class Google_Service_Books_GeolayerdataGeoViewportHi
 */
class Google_Service_Books_GeolayerdataGeoViewportHi extends Google_Model
{
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}

/**
 * Class Google_Service_Books_GeolayerdataGeoViewportLo
 */
class Google_Service_Books_GeolayerdataGeoViewportLo extends Google_Model
{
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}

/**
 * Class Google_Service_Books_Layersummaries
 */
class Google_Service_Books_Layersummaries extends Google_Collection
{
    public $kind;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Layersummary';
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_Books_Layersummary
 */
class Google_Service_Books_Layersummary extends Google_Collection
{
    public $annotationCount;
    public $annotationTypes;
    public $annotationsDataLink;
    public $annotationsLink;
    public $contentVersion;
    public $dataCount;
    public $id;
    public $kind;
    public $layerId;
    public $selfLink;
    public $updated;
    public $volumeAnnotationsVersion;
    public $volumeId;
    protected $collection_key = 'annotationTypes';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAnnotationCount()
    {
        return $this->annotationCount;
    }

    /**
     * @param $annotationCount
     */
    public function setAnnotationCount($annotationCount)
    {
        $this->annotationCount = $annotationCount;
    }

    /**
     * @return mixed
     */
    public function getAnnotationTypes()
    {
        return $this->annotationTypes;
    }

    /**
     * @param $annotationTypes
     */
    public function setAnnotationTypes($annotationTypes)
    {
        $this->annotationTypes = $annotationTypes;
    }

    /**
     * @return mixed
     */
    public function getAnnotationsDataLink()
    {
        return $this->annotationsDataLink;
    }

    /**
     * @param $annotationsDataLink
     */
    public function setAnnotationsDataLink($annotationsDataLink)
    {
        $this->annotationsDataLink = $annotationsDataLink;
    }

    /**
     * @return mixed
     */
    public function getAnnotationsLink()
    {
        return $this->annotationsLink;
    }

    /**
     * @param $annotationsLink
     */
    public function setAnnotationsLink($annotationsLink)
    {
        $this->annotationsLink = $annotationsLink;
    }

    /**
     * @return mixed
     */
    public function getContentVersion()
    {
        return $this->contentVersion;
    }

    /**
     * @param $contentVersion
     */
    public function setContentVersion($contentVersion)
    {
        $this->contentVersion = $contentVersion;
    }

    /**
     * @return mixed
     */
    public function getDataCount()
    {
        return $this->dataCount;
    }

    /**
     * @param $dataCount
     */
    public function setDataCount($dataCount)
    {
        $this->dataCount = $dataCount;
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
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
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

    /**
     * @return mixed
     */
    public function getVolumeAnnotationsVersion()
    {
        return $this->volumeAnnotationsVersion;
    }

    /**
     * @param $volumeAnnotationsVersion
     */
    public function setVolumeAnnotationsVersion($volumeAnnotationsVersion)
    {
        $this->volumeAnnotationsVersion = $volumeAnnotationsVersion;
    }

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_Metadata
 */
class Google_Service_Books_Metadata extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_MetadataItems';
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
 * Class Google_Service_Books_MetadataItems
 */
class Google_Service_Books_MetadataItems extends Google_Model
{
    public $downloadUrl;
    public $encryptedKey;
    public $language;
    public $size;
    public $version;
    protected $internal_gapi_mappings = [
        "downloadUrl" => "download_url",
        "encryptedKey" => "encrypted_key",
    ];

    /**
     * @return mixed
     */
    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

    /**
     * @param $downloadUrl
     */
    public function setDownloadUrl($downloadUrl)
    {
        $this->downloadUrl = $downloadUrl;
    }

    /**
     * @return mixed
     */
    public function getEncryptedKey()
    {
        return $this->encryptedKey;
    }

    /**
     * @param $encryptedKey
     */
    public function setEncryptedKey($encryptedKey)
    {
        $this->encryptedKey = $encryptedKey;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }
}

/**
 * Class Google_Service_Books_Offers
 */
class Google_Service_Books_Offers extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_OffersItems';
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
 * Class Google_Service_Books_OffersItems
 */
class Google_Service_Books_OffersItems extends Google_Collection
{
    public $artUrl;
    public $gservicesKey;
    public $id;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_OffersItemsItems';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getArtUrl()
    {
        return $this->artUrl;
    }

    /**
     * @param $artUrl
     */
    public function setArtUrl($artUrl)
    {
        $this->artUrl = $artUrl;
    }

    /**
     * @return mixed
     */
    public function getGservicesKey()
    {
        return $this->gservicesKey;
    }

    /**
     * @param $gservicesKey
     */
    public function setGservicesKey($gservicesKey)
    {
        $this->gservicesKey = $gservicesKey;
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
 * Class Google_Service_Books_OffersItemsItems
 */
class Google_Service_Books_OffersItemsItems extends Google_Model
{
    public $author;
    public $canonicalVolumeLink;
    public $coverUrl;
    public $description;
    public $title;
    public $volumeId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getCanonicalVolumeLink()
    {
        return $this->canonicalVolumeLink;
    }

    /**
     * @param $canonicalVolumeLink
     */
    public function setCanonicalVolumeLink($canonicalVolumeLink)
    {
        $this->canonicalVolumeLink = $canonicalVolumeLink;
    }

    /**
     * @return mixed
     */
    public function getCoverUrl()
    {
        return $this->coverUrl;
    }

    /**
     * @param $coverUrl
     */
    public function setCoverUrl($coverUrl)
    {
        $this->coverUrl = $coverUrl;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_ReadingPosition
 */
class Google_Service_Books_ReadingPosition extends Google_Model
{
    public $epubCfiPosition;
    public $gbImagePosition;
    public $gbTextPosition;
    public $kind;
    public $pdfPosition;
    public $updated;
    public $volumeId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEpubCfiPosition()
    {
        return $this->epubCfiPosition;
    }

    /**
     * @param $epubCfiPosition
     */
    public function setEpubCfiPosition($epubCfiPosition)
    {
        $this->epubCfiPosition = $epubCfiPosition;
    }

    /**
     * @return mixed
     */
    public function getGbImagePosition()
    {
        return $this->gbImagePosition;
    }

    /**
     * @param $gbImagePosition
     */
    public function setGbImagePosition($gbImagePosition)
    {
        $this->gbImagePosition = $gbImagePosition;
    }

    /**
     * @return mixed
     */
    public function getGbTextPosition()
    {
        return $this->gbTextPosition;
    }

    /**
     * @param $gbTextPosition
     */
    public function setGbTextPosition($gbTextPosition)
    {
        $this->gbTextPosition = $gbTextPosition;
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
    public function getPdfPosition()
    {
        return $this->pdfPosition;
    }

    /**
     * @param $pdfPosition
     */
    public function setPdfPosition($pdfPosition)
    {
        $this->pdfPosition = $pdfPosition;
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

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_RequestAccess
 */
class Google_Service_Books_RequestAccess extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $concurrentAccessType = 'Google_Service_Books_ConcurrentAccessRestriction';
    protected $concurrentAccessDataType = '';
    protected $downloadAccessType = 'Google_Service_Books_DownloadAccessRestriction';
    protected $downloadAccessDataType = '';

    /**
     * @param Google_Service_Books_ConcurrentAccessRestriction $concurrentAccess
     */
    public function setConcurrentAccess(Google_Service_Books_ConcurrentAccessRestriction $concurrentAccess)
    {
        $this->concurrentAccess = $concurrentAccess;
    }

    /**
     * @return mixed
     */
    public function getConcurrentAccess()
    {
        return $this->concurrentAccess;
    }

    /**
     * @param Google_Service_Books_DownloadAccessRestriction $downloadAccess
     */
    public function setDownloadAccess(Google_Service_Books_DownloadAccessRestriction $downloadAccess)
    {
        $this->downloadAccess = $downloadAccess;
    }

    /**
     * @return mixed
     */
    public function getDownloadAccess()
    {
        return $this->downloadAccess;
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
 * Class Google_Service_Books_Review
 */
class Google_Service_Books_Review extends Google_Model
{
    public $content;
    public $date;
    public $fullTextUrl;
    public $kind;
    public $rating;
    public $title;
    public $type;
    public $volumeId;
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Books_ReviewAuthor';
    protected $authorDataType = '';
    protected $sourceType = 'Google_Service_Books_ReviewSource';
    protected $sourceDataType = '';

    /**
     * @param Google_Service_Books_ReviewAuthor $author
     */
    public function setAuthor(Google_Service_Books_ReviewAuthor $author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

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

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getFullTextUrl()
    {
        return $this->fullTextUrl;
    }

    /**
     * @param $fullTextUrl
     */
    public function setFullTextUrl($fullTextUrl)
    {
        $this->fullTextUrl = $fullTextUrl;
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
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @param Google_Service_Books_ReviewSource $source
     */
    public function setSource(Google_Service_Books_ReviewSource $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_ReviewAuthor
 */
class Google_Service_Books_ReviewAuthor extends Google_Model
{
    public $displayName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }
}

/**
 * Class Google_Service_Books_ReviewSource
 */
class Google_Service_Books_ReviewSource extends Google_Model
{
    public $description;
    public $extraDescription;
    public $url;
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
    public function getExtraDescription()
    {
        return $this->extraDescription;
    }

    /**
     * @param $extraDescription
     */
    public function setExtraDescription($extraDescription)
    {
        $this->extraDescription = $extraDescription;
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
 * Class Google_Service_Books_Usersettings
 */
class Google_Service_Books_Usersettings extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $notesExportType = 'Google_Service_Books_UsersettingsNotesExport';
    protected $notesExportDataType = '';

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
     * @param Google_Service_Books_UsersettingsNotesExport $notesExport
     */
    public function setNotesExport(Google_Service_Books_UsersettingsNotesExport $notesExport)
    {
        $this->notesExport = $notesExport;
    }

    /**
     * @return mixed
     */
    public function getNotesExport()
    {
        return $this->notesExport;
    }
}

/**
 * Class Google_Service_Books_UsersettingsNotesExport
 */
class Google_Service_Books_UsersettingsNotesExport extends Google_Model
{
    public $folderName;
    public $isEnabled;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFolderName()
    {
        return $this->folderName;
    }

    /**
     * @param $folderName
     */
    public function setFolderName($folderName)
    {
        $this->folderName = $folderName;
    }

    /**
     * @return mixed
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }
}

/**
 * Class Google_Service_Books_Volume
 */
class Google_Service_Books_Volume extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $accessInfoType = 'Google_Service_Books_VolumeAccessInfo';
    protected $accessInfoDataType = '';
    protected $layerInfoType = 'Google_Service_Books_VolumeLayerInfo';
    protected $layerInfoDataType = '';
    protected $recommendedInfoType = 'Google_Service_Books_VolumeRecommendedInfo';
    protected $recommendedInfoDataType = '';
    protected $saleInfoType = 'Google_Service_Books_VolumeSaleInfo';
    protected $saleInfoDataType = '';
    protected $searchInfoType = 'Google_Service_Books_VolumeSearchInfo';
    protected $searchInfoDataType = '';
    protected $userInfoType = 'Google_Service_Books_VolumeUserInfo';
    protected $userInfoDataType = '';
    protected $volumeInfoType = 'Google_Service_Books_VolumeVolumeInfo';
    protected $volumeInfoDataType = '';


    /**
     * @param Google_Service_Books_VolumeAccessInfo $accessInfo
     */
    public function setAccessInfo(Google_Service_Books_VolumeAccessInfo $accessInfo)
    {
        $this->accessInfo = $accessInfo;
    }

    /**
     * @return mixed
     */
    public function getAccessInfo()
    {
        return $this->accessInfo;
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
     * @param Google_Service_Books_VolumeLayerInfo $layerInfo
     */
    public function setLayerInfo(Google_Service_Books_VolumeLayerInfo $layerInfo)
    {
        $this->layerInfo = $layerInfo;
    }

    /**
     * @return mixed
     */
    public function getLayerInfo()
    {
        return $this->layerInfo;
    }

    /**
     * @param Google_Service_Books_VolumeRecommendedInfo $recommendedInfo
     */
    public function setRecommendedInfo(Google_Service_Books_VolumeRecommendedInfo $recommendedInfo)
    {
        $this->recommendedInfo = $recommendedInfo;
    }

    /**
     * @return mixed
     */
    public function getRecommendedInfo()
    {
        return $this->recommendedInfo;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfo $saleInfo
     */
    public function setSaleInfo(Google_Service_Books_VolumeSaleInfo $saleInfo)
    {
        $this->saleInfo = $saleInfo;
    }

    /**
     * @return mixed
     */
    public function getSaleInfo()
    {
        return $this->saleInfo;
    }

    /**
     * @param Google_Service_Books_VolumeSearchInfo $searchInfo
     */
    public function setSearchInfo(Google_Service_Books_VolumeSearchInfo $searchInfo)
    {
        $this->searchInfo = $searchInfo;
    }

    /**
     * @return mixed
     */
    public function getSearchInfo()
    {
        return $this->searchInfo;
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
     * @param Google_Service_Books_VolumeUserInfo $userInfo
     */
    public function setUserInfo(Google_Service_Books_VolumeUserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * @return mixed
     */
    public function getUserInfo()
    {
        return $this->userInfo;
    }

    /**
     * @param Google_Service_Books_VolumeVolumeInfo $volumeInfo
     */
    public function setVolumeInfo(Google_Service_Books_VolumeVolumeInfo $volumeInfo)
    {
        $this->volumeInfo = $volumeInfo;
    }

    /**
     * @return mixed
     */
    public function getVolumeInfo()
    {
        return $this->volumeInfo;
    }
}

/**
 * Class Google_Service_Books_Volume2
 */
class Google_Service_Books_Volume2 extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Volume';
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
 * Class Google_Service_Books_VolumeAccessInfo
 */
class Google_Service_Books_VolumeAccessInfo extends Google_Model
{
    public $accessViewStatus;
    public $country;
    public $driveImportedContentLink;
    public $embeddable;
    public $explicitOfflineLicenseManagement;
    public $publicDomain;
    public $quoteSharingAllowed;
    public $textToSpeechPermission;
    public $viewOrderUrl;
    public $viewability;
    public $webReaderLink;
    protected $internal_gapi_mappings = [];
    protected $downloadAccessType = 'Google_Service_Books_DownloadAccessRestriction';
    protected $downloadAccessDataType = '';
    protected $epubType = 'Google_Service_Books_VolumeAccessInfoEpub';
    protected $epubDataType = '';
    protected $pdfType = 'Google_Service_Books_VolumeAccessInfoPdf';
    protected $pdfDataType = '';

    /**
     * @return mixed
     */
    public function getAccessViewStatus()
    {
        return $this->accessViewStatus;
    }

    /**
     * @param $accessViewStatus
     */
    public function setAccessViewStatus($accessViewStatus)
    {
        $this->accessViewStatus = $accessViewStatus;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param Google_Service_Books_DownloadAccessRestriction $downloadAccess
     */
    public function setDownloadAccess(Google_Service_Books_DownloadAccessRestriction $downloadAccess)
    {
        $this->downloadAccess = $downloadAccess;
    }

    /**
     * @return mixed
     */
    public function getDownloadAccess()
    {
        return $this->downloadAccess;
    }

    /**
     * @return mixed
     */
    public function getDriveImportedContentLink()
    {
        return $this->driveImportedContentLink;
    }

    /**
     * @param $driveImportedContentLink
     */
    public function setDriveImportedContentLink($driveImportedContentLink)
    {
        $this->driveImportedContentLink = $driveImportedContentLink;
    }

    /**
     * @return mixed
     */
    public function getEmbeddable()
    {
        return $this->embeddable;
    }

    /**
     * @param $embeddable
     */
    public function setEmbeddable($embeddable)
    {
        $this->embeddable = $embeddable;
    }

    /**
     * @param Google_Service_Books_VolumeAccessInfoEpub $epub
     */
    public function setEpub(Google_Service_Books_VolumeAccessInfoEpub $epub)
    {
        $this->epub = $epub;
    }

    /**
     * @return mixed
     */
    public function getEpub()
    {
        return $this->epub;
    }

    /**
     * @return mixed
     */
    public function getExplicitOfflineLicenseManagement()
    {
        return $this->explicitOfflineLicenseManagement;
    }

    /**
     * @param $explicitOfflineLicenseManagement
     */
    public function setExplicitOfflineLicenseManagement($explicitOfflineLicenseManagement)
    {
        $this->explicitOfflineLicenseManagement = $explicitOfflineLicenseManagement;
    }

    /**
     * @param Google_Service_Books_VolumeAccessInfoPdf $pdf
     */
    public function setPdf(Google_Service_Books_VolumeAccessInfoPdf $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * @return mixed
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * @return mixed
     */
    public function getPublicDomain()
    {
        return $this->publicDomain;
    }

    /**
     * @param $publicDomain
     */
    public function setPublicDomain($publicDomain)
    {
        $this->publicDomain = $publicDomain;
    }

    /**
     * @return mixed
     */
    public function getQuoteSharingAllowed()
    {
        return $this->quoteSharingAllowed;
    }

    /**
     * @param $quoteSharingAllowed
     */
    public function setQuoteSharingAllowed($quoteSharingAllowed)
    {
        $this->quoteSharingAllowed = $quoteSharingAllowed;
    }

    /**
     * @return mixed
     */
    public function getTextToSpeechPermission()
    {
        return $this->textToSpeechPermission;
    }

    /**
     * @param $textToSpeechPermission
     */
    public function setTextToSpeechPermission($textToSpeechPermission)
    {
        $this->textToSpeechPermission = $textToSpeechPermission;
    }

    /**
     * @return mixed
     */
    public function getViewOrderUrl()
    {
        return $this->viewOrderUrl;
    }

    /**
     * @param $viewOrderUrl
     */
    public function setViewOrderUrl($viewOrderUrl)
    {
        $this->viewOrderUrl = $viewOrderUrl;
    }

    /**
     * @return mixed
     */
    public function getViewability()
    {
        return $this->viewability;
    }

    /**
     * @param $viewability
     */
    public function setViewability($viewability)
    {
        $this->viewability = $viewability;
    }

    /**
     * @return mixed
     */
    public function getWebReaderLink()
    {
        return $this->webReaderLink;
    }

    /**
     * @param $webReaderLink
     */
    public function setWebReaderLink($webReaderLink)
    {
        $this->webReaderLink = $webReaderLink;
    }
}

/**
 * Class Google_Service_Books_VolumeAccessInfoEpub
 */
class Google_Service_Books_VolumeAccessInfoEpub extends Google_Model
{
    public $acsTokenLink;
    public $downloadLink;
    public $isAvailable;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAcsTokenLink()
    {
        return $this->acsTokenLink;
    }

    /**
     * @param $acsTokenLink
     */
    public function setAcsTokenLink($acsTokenLink)
    {
        $this->acsTokenLink = $acsTokenLink;
    }

    /**
     * @return mixed
     */
    public function getDownloadLink()
    {
        return $this->downloadLink;
    }

    /**
     * @param $downloadLink
     */
    public function setDownloadLink($downloadLink)
    {
        $this->downloadLink = $downloadLink;
    }

    /**
     * @return mixed
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @param $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }
}

/**
 * Class Google_Service_Books_VolumeAccessInfoPdf
 */
class Google_Service_Books_VolumeAccessInfoPdf extends Google_Model
{
    public $acsTokenLink;
    public $downloadLink;
    public $isAvailable;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAcsTokenLink()
    {
        return $this->acsTokenLink;
    }

    /**
     * @param $acsTokenLink
     */
    public function setAcsTokenLink($acsTokenLink)
    {
        $this->acsTokenLink = $acsTokenLink;
    }

    /**
     * @return mixed
     */
    public function getDownloadLink()
    {
        return $this->downloadLink;
    }

    /**
     * @param $downloadLink
     */
    public function setDownloadLink($downloadLink)
    {
        $this->downloadLink = $downloadLink;
    }

    /**
     * @return mixed
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @param $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }
}

/**
 * Class Google_Service_Books_VolumeLayerInfo
 */
class Google_Service_Books_VolumeLayerInfo extends Google_Collection
{
    protected $collection_key = 'layers';
    protected $internal_gapi_mappings = [];
    protected $layersType = 'Google_Service_Books_VolumeLayerInfoLayers';
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
}

/**
 * Class Google_Service_Books_VolumeLayerInfoLayers
 */
class Google_Service_Books_VolumeLayerInfoLayers extends Google_Model
{
    public $layerId;
    public $volumeAnnotationsVersion;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
    }

    /**
     * @return mixed
     */
    public function getVolumeAnnotationsVersion()
    {
        return $this->volumeAnnotationsVersion;
    }

    /**
     * @param $volumeAnnotationsVersion
     */
    public function setVolumeAnnotationsVersion($volumeAnnotationsVersion)
    {
        $this->volumeAnnotationsVersion = $volumeAnnotationsVersion;
    }
}

/**
 * Class Google_Service_Books_VolumeRecommendedInfo
 */
class Google_Service_Books_VolumeRecommendedInfo extends Google_Model
{
    public $explanation;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * @param $explanation
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfo
 */
class Google_Service_Books_VolumeSaleInfo extends Google_Collection
{
    public $buyLink;
    public $country;
    public $isEbook;
    public $onSaleDate;
    public $saleability;
    protected $collection_key = 'offers';
    protected $internal_gapi_mappings = [];
    protected $listPriceType = 'Google_Service_Books_VolumeSaleInfoListPrice';
    protected $listPriceDataType = '';
    protected $offersType = 'Google_Service_Books_VolumeSaleInfoOffers';
    protected $offersDataType = 'array';
    protected $retailPriceType = 'Google_Service_Books_VolumeSaleInfoRetailPrice';
    protected $retailPriceDataType = '';

    /**
     * @return mixed
     */
    public function getBuyLink()
    {
        return $this->buyLink;
    }

    /**
     * @param $buyLink
     */
    public function setBuyLink($buyLink)
    {
        $this->buyLink = $buyLink;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getIsEbook()
    {
        return $this->isEbook;
    }

    /**
     * @param $isEbook
     */
    public function setIsEbook($isEbook)
    {
        $this->isEbook = $isEbook;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfoListPrice $listPrice
     */
    public function setListPrice(Google_Service_Books_VolumeSaleInfoListPrice $listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * @return mixed
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * @param $offers
     */
    public function setOffers($offers)
    {
        $this->offers = $offers;
    }

    /**
     * @return mixed
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @return mixed
     */
    public function getOnSaleDate()
    {
        return $this->onSaleDate;
    }

    /**
     * @param $onSaleDate
     */
    public function setOnSaleDate($onSaleDate)
    {
        $this->onSaleDate = $onSaleDate;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfoRetailPrice $retailPrice
     */
    public function setRetailPrice(Google_Service_Books_VolumeSaleInfoRetailPrice $retailPrice)
    {
        $this->retailPrice = $retailPrice;
    }

    /**
     * @return mixed
     */
    public function getRetailPrice()
    {
        return $this->retailPrice;
    }

    /**
     * @return mixed
     */
    public function getSaleability()
    {
        return $this->saleability;
    }

    /**
     * @param $saleability
     */
    public function setSaleability($saleability)
    {
        $this->saleability = $saleability;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoListPrice
 */
class Google_Service_Books_VolumeSaleInfoListPrice extends Google_Model
{
    public $amount;
    public $currencyCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoOffers
 */
class Google_Service_Books_VolumeSaleInfoOffers extends Google_Model
{
    public $finskyOfferType;
    protected $internal_gapi_mappings = [];
    protected $listPriceType = 'Google_Service_Books_VolumeSaleInfoOffersListPrice';
    protected $listPriceDataType = '';
    protected $rentalDurationType = 'Google_Service_Books_VolumeSaleInfoOffersRentalDuration';
    protected $rentalDurationDataType = '';
    protected $retailPriceType = 'Google_Service_Books_VolumeSaleInfoOffersRetailPrice';
    protected $retailPriceDataType = '';

    /**
     * @return mixed
     */
    public function getFinskyOfferType()
    {
        return $this->finskyOfferType;
    }

    /**
     * @param $finskyOfferType
     */
    public function setFinskyOfferType($finskyOfferType)
    {
        $this->finskyOfferType = $finskyOfferType;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfoOffersListPrice $listPrice
     */
    public function setListPrice(Google_Service_Books_VolumeSaleInfoOffersListPrice $listPrice)
    {
        $this->listPrice = $listPrice;
    }

    /**
     * @return mixed
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfoOffersRentalDuration $rentalDuration
     */
    public function setRentalDuration(Google_Service_Books_VolumeSaleInfoOffersRentalDuration $rentalDuration)
    {
        $this->rentalDuration = $rentalDuration;
    }

    /**
     * @return mixed
     */
    public function getRentalDuration()
    {
        return $this->rentalDuration;
    }

    /**
     * @param Google_Service_Books_VolumeSaleInfoOffersRetailPrice $retailPrice
     */
    public function setRetailPrice(Google_Service_Books_VolumeSaleInfoOffersRetailPrice $retailPrice)
    {
        $this->retailPrice = $retailPrice;
    }

    /**
     * @return mixed
     */
    public function getRetailPrice()
    {
        return $this->retailPrice;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoOffersListPrice
 */
class Google_Service_Books_VolumeSaleInfoOffersListPrice extends Google_Model
{
    public $amountInMicros;
    public $currencyCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAmountInMicros()
    {
        return $this->amountInMicros;
    }

    /**
     * @param $amountInMicros
     */
    public function setAmountInMicros($amountInMicros)
    {
        $this->amountInMicros = $amountInMicros;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoOffersRentalDuration
 */
class Google_Service_Books_VolumeSaleInfoOffersRentalDuration extends Google_Model
{
    public $count;
    public $unit;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoOffersRetailPrice
 */
class Google_Service_Books_VolumeSaleInfoOffersRetailPrice extends Google_Model
{
    public $amountInMicros;
    public $currencyCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAmountInMicros()
    {
        return $this->amountInMicros;
    }

    /**
     * @param $amountInMicros
     */
    public function setAmountInMicros($amountInMicros)
    {
        $this->amountInMicros = $amountInMicros;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}

/**
 * Class Google_Service_Books_VolumeSaleInfoRetailPrice
 */
class Google_Service_Books_VolumeSaleInfoRetailPrice extends Google_Model
{
    public $amount;
    public $currencyCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }
}

/**
 * Class Google_Service_Books_VolumeSearchInfo
 */
class Google_Service_Books_VolumeSearchInfo extends Google_Model
{
    public $textSnippet;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTextSnippet()
    {
        return $this->textSnippet;
    }

    /**
     * @param $textSnippet
     */
    public function setTextSnippet($textSnippet)
    {
        $this->textSnippet = $textSnippet;
    }
}

/**
 * Class Google_Service_Books_VolumeUserInfo
 */
class Google_Service_Books_VolumeUserInfo extends Google_Model
{
    public $isInMyBooks;
    public $isPreordered;
    public $isPurchased;
    public $isUploaded;
    public $rentalState;
    public $updated;
    protected $internal_gapi_mappings = [];
    protected $copyType = 'Google_Service_Books_VolumeUserInfoCopy';
    protected $copyDataType = '';
    protected $readingPositionType = 'Google_Service_Books_ReadingPosition';
    protected $readingPositionDataType = '';
    protected $rentalPeriodType = 'Google_Service_Books_VolumeUserInfoRentalPeriod';
    protected $rentalPeriodDataType = '';
    protected $reviewType = 'Google_Service_Books_Review';
    protected $reviewDataType = '';
    protected $userUploadedVolumeInfoType = 'Google_Service_Books_VolumeUserInfoUserUploadedVolumeInfo';
    protected $userUploadedVolumeInfoDataType = '';


    /**
     * @param Google_Service_Books_VolumeUserInfoCopy $copy
     */
    public function setCopy(Google_Service_Books_VolumeUserInfoCopy $copy)
    {
        $this->copy = $copy;
    }

    /**
     * @return mixed
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * @return mixed
     */
    public function getIsInMyBooks()
    {
        return $this->isInMyBooks;
    }

    /**
     * @param $isInMyBooks
     */
    public function setIsInMyBooks($isInMyBooks)
    {
        $this->isInMyBooks = $isInMyBooks;
    }

    /**
     * @return mixed
     */
    public function getIsPreordered()
    {
        return $this->isPreordered;
    }

    /**
     * @param $isPreordered
     */
    public function setIsPreordered($isPreordered)
    {
        $this->isPreordered = $isPreordered;
    }

    /**
     * @return mixed
     */
    public function getIsPurchased()
    {
        return $this->isPurchased;
    }

    /**
     * @param $isPurchased
     */
    public function setIsPurchased($isPurchased)
    {
        $this->isPurchased = $isPurchased;
    }

    /**
     * @return mixed
     */
    public function getIsUploaded()
    {
        return $this->isUploaded;
    }

    /**
     * @param $isUploaded
     */
    public function setIsUploaded($isUploaded)
    {
        $this->isUploaded = $isUploaded;
    }

    /**
     * @param Google_Service_Books_ReadingPosition $readingPosition
     */
    public function setReadingPosition(Google_Service_Books_ReadingPosition $readingPosition)
    {
        $this->readingPosition = $readingPosition;
    }

    /**
     * @return mixed
     */
    public function getReadingPosition()
    {
        return $this->readingPosition;
    }

    /**
     * @param Google_Service_Books_VolumeUserInfoRentalPeriod $rentalPeriod
     */
    public function setRentalPeriod(Google_Service_Books_VolumeUserInfoRentalPeriod $rentalPeriod)
    {
        $this->rentalPeriod = $rentalPeriod;
    }

    /**
     * @return mixed
     */
    public function getRentalPeriod()
    {
        return $this->rentalPeriod;
    }

    /**
     * @return mixed
     */
    public function getRentalState()
    {
        return $this->rentalState;
    }

    /**
     * @param $rentalState
     */
    public function setRentalState($rentalState)
    {
        $this->rentalState = $rentalState;
    }

    /**
     * @param Google_Service_Books_Review $review
     */
    public function setReview(Google_Service_Books_Review $review)
    {
        $this->review = $review;
    }

    /**
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
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

    /**
     * @param Google_Service_Books_VolumeUserInfoUserUploadedVolumeInfo $userUploadedVolumeInfo
     */
    public function setUserUploadedVolumeInfo(Google_Service_Books_VolumeUserInfoUserUploadedVolumeInfo $userUploadedVolumeInfo)
    {
        $this->userUploadedVolumeInfo = $userUploadedVolumeInfo;
    }

    /**
     * @return mixed
     */
    public function getUserUploadedVolumeInfo()
    {
        return $this->userUploadedVolumeInfo;
    }
}

/**
 * Class Google_Service_Books_VolumeUserInfoCopy
 */
class Google_Service_Books_VolumeUserInfoCopy extends Google_Model
{
    public $allowedCharacterCount;
    public $limitType;
    public $remainingCharacterCount;
    public $updated;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowedCharacterCount()
    {
        return $this->allowedCharacterCount;
    }

    /**
     * @param $allowedCharacterCount
     */
    public function setAllowedCharacterCount($allowedCharacterCount)
    {
        $this->allowedCharacterCount = $allowedCharacterCount;
    }

    /**
     * @return mixed
     */
    public function getLimitType()
    {
        return $this->limitType;
    }

    /**
     * @param $limitType
     */
    public function setLimitType($limitType)
    {
        $this->limitType = $limitType;
    }

    /**
     * @return mixed
     */
    public function getRemainingCharacterCount()
    {
        return $this->remainingCharacterCount;
    }

    /**
     * @param $remainingCharacterCount
     */
    public function setRemainingCharacterCount($remainingCharacterCount)
    {
        $this->remainingCharacterCount = $remainingCharacterCount;
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
 * Class Google_Service_Books_VolumeUserInfoRentalPeriod
 */
class Google_Service_Books_VolumeUserInfoRentalPeriod extends Google_Model
{
    public $endUtcSec;
    public $startUtcSec;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEndUtcSec()
    {
        return $this->endUtcSec;
    }

    /**
     * @param $endUtcSec
     */
    public function setEndUtcSec($endUtcSec)
    {
        $this->endUtcSec = $endUtcSec;
    }

    /**
     * @return mixed
     */
    public function getStartUtcSec()
    {
        return $this->startUtcSec;
    }

    /**
     * @param $startUtcSec
     */
    public function setStartUtcSec($startUtcSec)
    {
        $this->startUtcSec = $startUtcSec;
    }
}

/**
 * Class Google_Service_Books_VolumeUserInfoUserUploadedVolumeInfo
 */
class Google_Service_Books_VolumeUserInfoUserUploadedVolumeInfo extends Google_Model
{
    public $processingState;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getProcessingState()
    {
        return $this->processingState;
    }

    /**
     * @param $processingState
     */
    public function setProcessingState($processingState)
    {
        $this->processingState = $processingState;
    }
}

/**
 * Class Google_Service_Books_VolumeVolumeInfo
 */
class Google_Service_Books_VolumeVolumeInfo extends Google_Collection
{
    public $authors;
    public $averageRating;
    public $canonicalVolumeLink;
    public $categories;
    public $contentVersion;
    public $description;
    public $infoLink;
    public $language;
    public $mainCategory;
    public $maturityRating;
    public $pageCount;
    public $previewLink;
    public $printType;
    public $printedPageCount;
    public $publishedDate;
    public $publisher;
    public $ratingsCount;
    public $readingModes;
    public $samplePageCount;
    public $subtitle;
    public $title;
    protected $collection_key = 'industryIdentifiers';
    protected $internal_gapi_mappings = [];
    protected $dimensionsType = 'Google_Service_Books_VolumeVolumeInfoDimensions';
    protected $dimensionsDataType = '';
    protected $imageLinksType = 'Google_Service_Books_VolumeVolumeInfoImageLinks';
    protected $imageLinksDataType = '';
    protected $industryIdentifiersType = 'Google_Service_Books_VolumeVolumeInfoIndustryIdentifiers';
    protected $industryIdentifiersDataType = 'array';

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }

    /**
     * @return mixed
     */
    public function getAverageRating()
    {
        return $this->averageRating;
    }

    /**
     * @param $averageRating
     */
    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;
    }

    /**
     * @return mixed
     */
    public function getCanonicalVolumeLink()
    {
        return $this->canonicalVolumeLink;
    }

    /**
     * @param $canonicalVolumeLink
     */
    public function setCanonicalVolumeLink($canonicalVolumeLink)
    {
        $this->canonicalVolumeLink = $canonicalVolumeLink;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return mixed
     */
    public function getContentVersion()
    {
        return $this->contentVersion;
    }

    /**
     * @param $contentVersion
     */
    public function setContentVersion($contentVersion)
    {
        $this->contentVersion = $contentVersion;
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
     * @param Google_Service_Books_VolumeVolumeInfoDimensions $dimensions
     */
    public function setDimensions(Google_Service_Books_VolumeVolumeInfoDimensions $dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param Google_Service_Books_VolumeVolumeInfoImageLinks $imageLinks
     */
    public function setImageLinks(Google_Service_Books_VolumeVolumeInfoImageLinks $imageLinks)
    {
        $this->imageLinks = $imageLinks;
    }

    /**
     * @return mixed
     */
    public function getImageLinks()
    {
        return $this->imageLinks;
    }

    /**
     * @param $industryIdentifiers
     */
    public function setIndustryIdentifiers($industryIdentifiers)
    {
        $this->industryIdentifiers = $industryIdentifiers;
    }

    /**
     * @return mixed
     */
    public function getIndustryIdentifiers()
    {
        return $this->industryIdentifiers;
    }

    /**
     * @return mixed
     */
    public function getInfoLink()
    {
        return $this->infoLink;
    }

    /**
     * @param $infoLink
     */
    public function setInfoLink($infoLink)
    {
        $this->infoLink = $infoLink;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getMainCategory()
    {
        return $this->mainCategory;
    }

    /**
     * @param $mainCategory
     */
    public function setMainCategory($mainCategory)
    {
        $this->mainCategory = $mainCategory;
    }

    /**
     * @return mixed
     */
    public function getMaturityRating()
    {
        return $this->maturityRating;
    }

    /**
     * @param $maturityRating
     */
    public function setMaturityRating($maturityRating)
    {
        $this->maturityRating = $maturityRating;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    /**
     * @return mixed
     */
    public function getPreviewLink()
    {
        return $this->previewLink;
    }

    /**
     * @param $previewLink
     */
    public function setPreviewLink($previewLink)
    {
        $this->previewLink = $previewLink;
    }

    /**
     * @return mixed
     */
    public function getPrintType()
    {
        return $this->printType;
    }

    /**
     * @param $printType
     */
    public function setPrintType($printType)
    {
        $this->printType = $printType;
    }

    /**
     * @return mixed
     */
    public function getPrintedPageCount()
    {
        return $this->printedPageCount;
    }

    /**
     * @param $printedPageCount
     */
    public function setPrintedPageCount($printedPageCount)
    {
        $this->printedPageCount = $printedPageCount;
    }

    /**
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * @param $publishedDate
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getRatingsCount()
    {
        return $this->ratingsCount;
    }

    /**
     * @param $ratingsCount
     */
    public function setRatingsCount($ratingsCount)
    {
        $this->ratingsCount = $ratingsCount;
    }

    /**
     * @return mixed
     */
    public function getReadingModes()
    {
        return $this->readingModes;
    }

    /**
     * @param $readingModes
     */
    public function setReadingModes($readingModes)
    {
        $this->readingModes = $readingModes;
    }

    /**
     * @return mixed
     */
    public function getSamplePageCount()
    {
        return $this->samplePageCount;
    }

    /**
     * @param $samplePageCount
     */
    public function setSamplePageCount($samplePageCount)
    {
        $this->samplePageCount = $samplePageCount;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

/**
 * Class Google_Service_Books_VolumeVolumeInfoDimensions
 */
class Google_Service_Books_VolumeVolumeInfoDimensions extends Google_Model
{
    public $height;
    public $thickness;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getThickness()
    {
        return $this->thickness;
    }

    /**
     * @param $thickness
     */
    public function setThickness($thickness)
    {
        $this->thickness = $thickness;
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
 * Class Google_Service_Books_VolumeVolumeInfoImageLinks
 */
class Google_Service_Books_VolumeVolumeInfoImageLinks extends Google_Model
{
    public $extraLarge;
    public $large;
    public $medium;
    public $small;
    public $smallThumbnail;
    public $thumbnail;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExtraLarge()
    {
        return $this->extraLarge;
    }

    /**
     * @param $extraLarge
     */
    public function setExtraLarge($extraLarge)
    {
        $this->extraLarge = $extraLarge;
    }

    /**
     * @return mixed
     */
    public function getLarge()
    {
        return $this->large;
    }

    /**
     * @param $large
     */
    public function setLarge($large)
    {
        $this->large = $large;
    }

    /**
     * @return mixed
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * @param $medium
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;
    }

    /**
     * @return mixed
     */
    public function getSmall()
    {
        return $this->small;
    }

    /**
     * @param $small
     */
    public function setSmall($small)
    {
        $this->small = $small;
    }

    /**
     * @return mixed
     */
    public function getSmallThumbnail()
    {
        return $this->smallThumbnail;
    }

    /**
     * @param $smallThumbnail
     */
    public function setSmallThumbnail($smallThumbnail)
    {
        $this->smallThumbnail = $smallThumbnail;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
}

/**
 * Class Google_Service_Books_VolumeVolumeInfoIndustryIdentifiers
 */
class Google_Service_Books_VolumeVolumeInfoIndustryIdentifiers extends Google_Model
{
    public $identifier;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
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
 * Class Google_Service_Books_Volumeannotation
 */
class Google_Service_Books_Volumeannotation extends Google_Collection
{
    public $annotationDataId;
    public $annotationDataLink;
    public $annotationType;
    public $data;
    public $deleted;
    public $id;
    public $kind;
    public $layerId;
    public $pageIds;
    public $selectedText;
    public $selfLink;
    public $updated;
    public $volumeId;
    protected $collection_key = 'pageIds';
    protected $internal_gapi_mappings = [];
    protected $contentRangesType = 'Google_Service_Books_VolumeannotationContentRanges';
    protected $contentRangesDataType = '';

    /**
     * @return mixed
     */
    public function getAnnotationDataId()
    {
        return $this->annotationDataId;
    }

    /**
     * @param $annotationDataId
     */
    public function setAnnotationDataId($annotationDataId)
    {
        $this->annotationDataId = $annotationDataId;
    }

    /**
     * @return mixed
     */
    public function getAnnotationDataLink()
    {
        return $this->annotationDataLink;
    }

    /**
     * @param $annotationDataLink
     */
    public function setAnnotationDataLink($annotationDataLink)
    {
        $this->annotationDataLink = $annotationDataLink;
    }

    /**
     * @return mixed
     */
    public function getAnnotationType()
    {
        return $this->annotationType;
    }

    /**
     * @param $annotationType
     */
    public function setAnnotationType($annotationType)
    {
        $this->annotationType = $annotationType;
    }

    /**
     * @param Google_Service_Books_VolumeannotationContentRanges $contentRanges
     */
    public function setContentRanges(Google_Service_Books_VolumeannotationContentRanges $contentRanges)
    {
        $this->contentRanges = $contentRanges;
    }

    /**
     * @return mixed
     */
    public function getContentRanges()
    {
        return $this->contentRanges;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
    public function getLayerId()
    {
        return $this->layerId;
    }

    /**
     * @param $layerId
     */
    public function setLayerId($layerId)
    {
        $this->layerId = $layerId;
    }

    /**
     * @return mixed
     */
    public function getPageIds()
    {
        return $this->pageIds;
    }

    /**
     * @param $pageIds
     */
    public function setPageIds($pageIds)
    {
        $this->pageIds = $pageIds;
    }

    /**
     * @return mixed
     */
    public function getSelectedText()
    {
        return $this->selectedText;
    }

    /**
     * @param $selectedText
     */
    public function setSelectedText($selectedText)
    {
        $this->selectedText = $selectedText;
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

    /**
     * @return mixed
     */
    public function getVolumeId()
    {
        return $this->volumeId;
    }

    /**
     * @param $volumeId
     */
    public function setVolumeId($volumeId)
    {
        $this->volumeId = $volumeId;
    }
}

/**
 * Class Google_Service_Books_VolumeannotationContentRanges
 */
class Google_Service_Books_VolumeannotationContentRanges extends Google_Model
{
    public $contentVersion;
    protected $internal_gapi_mappings = [];
    protected $cfiRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $cfiRangeDataType = '';
    protected $gbImageRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbImageRangeDataType = '';
    protected $gbTextRangeType = 'Google_Service_Books_BooksAnnotationsRange';
    protected $gbTextRangeDataType = '';


    /**
     * @param Google_Service_Books_BooksAnnotationsRange $cfiRange
     */
    public function setCfiRange(Google_Service_Books_BooksAnnotationsRange $cfiRange)
    {
        $this->cfiRange = $cfiRange;
    }

    /**
     * @return mixed
     */
    public function getCfiRange()
    {
        return $this->cfiRange;
    }

    /**
     * @return mixed
     */
    public function getContentVersion()
    {
        return $this->contentVersion;
    }

    /**
     * @param $contentVersion
     */
    public function setContentVersion($contentVersion)
    {
        $this->contentVersion = $contentVersion;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbImageRange
     */
    public function setGbImageRange(Google_Service_Books_BooksAnnotationsRange $gbImageRange)
    {
        $this->gbImageRange = $gbImageRange;
    }

    /**
     * @return mixed
     */
    public function getGbImageRange()
    {
        return $this->gbImageRange;
    }

    /**
     * @param Google_Service_Books_BooksAnnotationsRange $gbTextRange
     */
    public function setGbTextRange(Google_Service_Books_BooksAnnotationsRange $gbTextRange)
    {
        $this->gbTextRange = $gbTextRange;
    }

    /**
     * @return mixed
     */
    public function getGbTextRange()
    {
        return $this->gbTextRange;
    }
}

/**
 * Class Google_Service_Books_Volumeannotations
 */
class Google_Service_Books_Volumeannotations extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    public $version;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Volumeannotation';
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }
}

/**
 * Class Google_Service_Books_Volumes
 */
class Google_Service_Books_Volumes extends Google_Collection
{
    public $kind;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Books_Volume';
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}
