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
 * Service definition for Genomics (v1beta2).
 *
 * <p>
 * Provides access to Genomics data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/genomics/v1beta2/reference" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Genomics extends Google_Service
{
    /** View and manage your data in Google BigQuery. */
    const BIGQUERY =
        "https://www.googleapis.com/auth/bigquery";
    /** Manage your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_WRITE =
        "https://www.googleapis.com/auth/devstorage.read_write";
    /** View and manage Genomics data. */
    const GENOMICS =
        "https://www.googleapis.com/auth/genomics";
    /** View Genomics data. */
    const GENOMICS_READONLY =
        "https://www.googleapis.com/auth/genomics.readonly";

    public $annotationSets;
    public $annotations;
    public $callsets;
    public $datasets;
    public $experimental_jobs;
    public $jobs;
    public $readgroupsets;
    public $readgroupsets_coveragebuckets;
    public $reads;
    public $references;
    public $references_bases;
    public $referencesets;
    public $streamingReadstore;
    public $variants;
    public $variantsets;


    /**
     * Constructs the internal representation of the Genomics service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'genomics/v1beta2/';
        $this->version = 'v1beta2';
        $this->serviceName = 'genomics';

        $this->annotationSets = new Google_Service_Genomics_AnnotationSets_Resource(
            $this,
            $this->serviceName,
            'annotationSets',
            [
                'methods' => [
                    'create' => [
                        'path' => 'annotationSets',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'annotationSets/{annotationSetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'annotationSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'annotationSets/{annotationSetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'annotationSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'annotationSets/{annotationSetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'annotationSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'annotationSets/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'annotationSets/{annotationSetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'annotationSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->annotations = new Google_Service_Genomics_Annotations_Resource(
            $this,
            $this->serviceName,
            'annotations',
            [
                'methods' => [
                    'batchCreate' => [
                        'path' => 'annotations:batchCreate',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'create' => [
                        'path' => 'annotations',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'annotations/{annotationId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'annotations/{annotationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'annotations/{annotationId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'annotations/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'annotations/{annotationId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'annotationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->callsets = new Google_Service_Genomics_Callsets_Resource(
            $this,
            $this->serviceName,
            'callsets',
            [
                'methods' => [
                    'create' => [
                        'path' => 'callsets',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'callsets/{callSetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'callSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'callsets/{callSetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'callSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'callsets/{callSetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'callSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'callsets/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'callsets/{callSetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'callSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->datasets = new Google_Service_Genomics_Datasets_Resource(
            $this,
            $this->serviceName,
            'datasets',
            [
                'methods' => [
                    'create' => [
                        'path' => 'datasets',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'datasets/{datasetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'datasets/{datasetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'datasets',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projectNumber' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'datasets/{datasetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'undelete' => [
                        'path' => 'datasets/{datasetId}/undelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'datasets/{datasetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->experimental_jobs = new Google_Service_Genomics_ExperimentalJobs_Resource(
            $this,
            $this->serviceName,
            'jobs',
            [
                'methods' => [
                    'create' => [
                        'path' => 'experimental/jobs/create',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->jobs = new Google_Service_Genomics_Jobs_Resource(
            $this,
            $this->serviceName,
            'jobs',
            [
                'methods' => [
                    'cancel' => [
                        'path' => 'jobs/{jobId}/cancel',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'jobs/{jobId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'jobs/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->readgroupsets = new Google_Service_Genomics_Readgroupsets_Resource(
            $this,
            $this->serviceName,
            'readgroupsets',
            [
                'methods' => [
                    'align' => [
                        'path' => 'readgroupsets/align',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'call' => [
                        'path' => 'readgroupsets/call',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'readgroupsets/{readGroupSetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'readGroupSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'export' => [
                        'path' => 'readgroupsets/export',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => 'readgroupsets/{readGroupSetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'readGroupSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'import' => [
                        'path' => 'readgroupsets/import',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'readgroupsets/{readGroupSetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'readGroupSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'readgroupsets/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'readgroupsets/{readGroupSetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'readGroupSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->readgroupsets_coveragebuckets = new Google_Service_Genomics_ReadgroupsetsCoveragebuckets_Resource(
            $this,
            $this->serviceName,
            'coveragebuckets',
            [
                'methods' => [
                    'list' => [
                        'path' => 'readgroupsets/{readGroupSetId}/coveragebuckets',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'readGroupSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'range.start' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'range.end' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'range.referenceName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'targetBucketWidth' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reads = new Google_Service_Genomics_Reads_Resource(
            $this,
            $this->serviceName,
            'reads',
            [
                'methods' => [
                    'search' => [
                        'path' => 'reads/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->references = new Google_Service_Genomics_References_Resource(
            $this,
            $this->serviceName,
            'references',
            [
                'methods' => [
                    'get' => [
                        'path' => 'references/{referenceId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'referenceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'references/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->references_bases = new Google_Service_Genomics_ReferencesBases_Resource(
            $this,
            $this->serviceName,
            'bases',
            [
                'methods' => [
                    'list' => [
                        'path' => 'references/{referenceId}/bases',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'referenceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'end' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->referencesets = new Google_Service_Genomics_Referencesets_Resource(
            $this,
            $this->serviceName,
            'referencesets',
            [
                'methods' => [
                    'get' => [
                        'path' => 'referencesets/{referenceSetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'referenceSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'referencesets/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->streamingReadstore = new Google_Service_Genomics_StreamingReadstore_Resource(
            $this,
            $this->serviceName,
            'streamingReadstore',
            [
                'methods' => [
                    'streamreads' => [
                        'path' => 'streamingReadstore/streamreads',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->variants = new Google_Service_Genomics_Variants_Resource(
            $this,
            $this->serviceName,
            'variants',
            [
                'methods' => [
                    'create' => [
                        'path' => 'variants',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => 'variants/{variantId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'variantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'variants/{variantId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'variantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'variants/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'variants/{variantId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'variantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->variantsets = new Google_Service_Genomics_Variantsets_Resource(
            $this,
            $this->serviceName,
            'variantsets',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'variantsets/{variantSetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'export' => [
                        'path' => 'variantsets/{variantSetId}/export',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'variantsets/{variantSetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'importVariants' => [
                        'path' => 'variantsets/{variantSetId}/importVariants',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'mergeVariants' => [
                        'path' => 'variantsets/{variantSetId}/mergeVariants',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'variantsets/{variantSetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'variantSetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'variantsets/search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'variantsets/{variantSetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'variantSetId' => [
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
 * The "annotationSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotationSets = $genomicsService->annotationSets;
 *  </code>
 */
class Google_Service_Genomics_AnnotationSets_Resource extends Google_Service_Resource
{

    /**
     * Creates a new annotation set. Caller must have WRITE permission for the
     * associated dataset. (annotationSets.create)
     *
     * @param Google_AnnotationSet|Google_Service_Genomics_AnnotationSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create(Google_Service_Genomics_AnnotationSet $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_AnnotationSet");
    }

    /**
     * Deletes an annotation set. Caller must have WRITE permission for the
     * associated annotation set. (annotationSets.delete)
     *
     * @param string $annotationSetId The ID of the annotation set to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($annotationSetId, $optParams = [])
    {
        $params = ['annotationSetId' => $annotationSetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets an annotation set. Caller must have READ permission for the associated
     * dataset. (annotationSets.get)
     *
     * @param string $annotationSetId The ID of the annotation set to be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($annotationSetId, $optParams = [])
    {
        $params = ['annotationSetId' => $annotationSetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_AnnotationSet");
    }

    /**
     * Updates an annotation set. The update must respect all mutability
     * restrictions and other invariants described on the annotation set resource.
     * Caller must have WRITE permission for the associated dataset. This method
     * supports patch semantics. (annotationSets.patch)
     *
     * @param string $annotationSetId The ID of the annotation set to be updated.
     * @param Google_AnnotationSet|Google_Service_Genomics_AnnotationSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($annotationSetId, Google_Service_Genomics_AnnotationSet $postBody, $optParams = [])
    {
        $params = ['annotationSetId' => $annotationSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_AnnotationSet");
    }

    /**
     * Searches for annotation sets that match the given criteria. Results are
     * returned in a deterministic order. Caller must have READ permission for the
     * queried datasets. (annotationSets.search)
     *
     * @param Google_SearchAnnotationSetsRequest|Google_Service_Genomics_SearchAnnotationSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function search(Google_Service_Genomics_SearchAnnotationSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchAnnotationSetsResponse");
    }

    /**
     * Updates an annotation set. The update must respect all mutability
     * restrictions and other invariants described on the annotation set resource.
     * Caller must have WRITE permission for the associated dataset.
     * (annotationSets.update)
     *
     * @param string $annotationSetId The ID of the annotation set to be updated.
     * @param Google_AnnotationSet|Google_Service_Genomics_AnnotationSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($annotationSetId, Google_Service_Genomics_AnnotationSet $postBody, $optParams = [])
    {
        $params = ['annotationSetId' => $annotationSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_AnnotationSet");
    }
}

/**
 * The "annotations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $annotations = $genomicsService->annotations;
 *  </code>
 */
class Google_Service_Genomics_Annotations_Resource extends Google_Service_Resource
{

    /**
     * Creates one or more new annotations atomically. All annotations must belong
     * to the same annotation set. Caller must have WRITE permission for this
     * annotation set. For optimal performance, batch positionally adjacent
     * annotations together.
     *
     * If the request has a systemic issue, such as an attempt to write to an
     * inaccessible annotation set, the entire RPC will fail accordingly. For lesser
     * data issues, when possible an error will be isolated to the corresponding
     * batch entry in the response; the remaining well formed annotations will be
     * created normally. (annotations.batchCreate)
     *
     * @param Google_BatchCreateAnnotationsRequest|Google_Service_Genomics_BatchCreateAnnotationsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function batchCreate(Google_Service_Genomics_BatchCreateAnnotationsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('batchCreate', [$params], "Google_Service_Genomics_BatchAnnotationsResponse");
    }

    /**
     * Creates a new annotation. Caller must have WRITE permission for the
     * associated annotation set. (annotations.create)
     *
     * @param Google_Annotation|Google_Service_Genomics_Annotation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create(Google_Service_Genomics_Annotation $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_Annotation");
    }

    /**
     * Deletes an annotation. Caller must have WRITE permission for the associated
     * annotation set. (annotations.delete)
     *
     * @param string $annotationId The ID of the annotation set to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($annotationId, $optParams = [])
    {
        $params = ['annotationId' => $annotationId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets an annotation. Caller must have READ permission for the associated
     * annotation set. (annotations.get)
     *
     * @param string $annotationId The ID of the annotation set to be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($annotationId, $optParams = [])
    {
        $params = ['annotationId' => $annotationId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_Annotation");
    }

    /**
     * Updates an annotation. The update must respect all mutability restrictions
     * and other invariants described on the annotation resource. Caller must have
     * WRITE permission for the associated dataset. This method supports patch
     * semantics. (annotations.patch)
     *
     * @param string $annotationId The ID of the annotation set to be updated.
     * @param Google_Annotation|Google_Service_Genomics_Annotation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($annotationId, Google_Service_Genomics_Annotation $postBody, $optParams = [])
    {
        $params = ['annotationId' => $annotationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_Annotation");
    }

    /**
     * Searches for annotations that match the given criteria. Results are returned
     * ordered by start position. Annotations that have matching start positions are
     * ordered deterministically. Caller must have READ permission for the queried
     * annotation sets. (annotations.search)
     *
     * @param Google_SearchAnnotationsRequest|Google_Service_Genomics_SearchAnnotationsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function search(Google_Service_Genomics_SearchAnnotationsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchAnnotationsResponse");
    }

    /**
     * Updates an annotation. The update must respect all mutability restrictions
     * and other invariants described on the annotation resource. Caller must have
     * WRITE permission for the associated dataset. (annotations.update)
     *
     * @param string $annotationId The ID of the annotation set to be updated.
     * @param Google_Annotation|Google_Service_Genomics_Annotation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($annotationId, Google_Service_Genomics_Annotation $postBody, $optParams = [])
    {
        $params = ['annotationId' => $annotationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_Annotation");
    }
}

/**
 * The "callsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $callsets = $genomicsService->callsets;
 *  </code>
 */
class Google_Service_Genomics_Callsets_Resource extends Google_Service_Resource
{

    /**
     * Creates a new call set. (callsets.create)
     *
     * @param Google_CallSet|Google_Service_Genomics_CallSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_Genomics_CallSet $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_CallSet");
    }

    /**
     * Deletes a call set. (callsets.delete)
     *
     * @param string $callSetId The ID of the call set to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($callSetId, $optParams = [])
    {
        $params = ['callSetId' => $callSetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a call set by ID. (callsets.get)
     *
     * @param string $callSetId The ID of the call set.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($callSetId, $optParams = [])
    {
        $params = ['callSetId' => $callSetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_CallSet");
    }

    /**
     * Updates a call set. This method supports patch semantics. (callsets.patch)
     *
     * @param string $callSetId The ID of the call set to be updated.
     * @param Google_CallSet|Google_Service_Genomics_CallSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($callSetId, Google_Service_Genomics_CallSet $postBody, $optParams = [])
    {
        $params = ['callSetId' => $callSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_CallSet");
    }

    /**
     * Gets a list of call sets matching the criteria.
     *
     * Implements GlobalAllianceApi.searchCallSets. (callsets.search)
     *
     * @param Google_SearchCallSetsRequest|Google_Service_Genomics_SearchCallSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_Genomics_SearchCallSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchCallSetsResponse");
    }

    /**
     * Updates a call set. (callsets.update)
     *
     * @param string $callSetId The ID of the call set to be updated.
     * @param Google_CallSet|Google_Service_Genomics_CallSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($callSetId, Google_Service_Genomics_CallSet $postBody, $optParams = [])
    {
        $params = ['callSetId' => $callSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_CallSet");
    }
}

/**
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $datasets = $genomicsService->datasets;
 *  </code>
 */
class Google_Service_Genomics_Datasets_Resource extends Google_Service_Resource
{

    /**
     * Creates a new dataset. (datasets.create)
     *
     * @param Google_Dataset|Google_Service_Genomics_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_Genomics_Dataset $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_Dataset");
    }

    /**
     * Deletes a dataset. (datasets.delete)
     *
     * @param string $datasetId The ID of the dataset to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($datasetId, $optParams = [])
    {
        $params = ['datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a dataset by ID. (datasets.get)
     *
     * @param string $datasetId The ID of the dataset.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($datasetId, $optParams = [])
    {
        $params = ['datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_Dataset");
    }

    /**
     * Lists datasets within a project. (datasets.listDatasets)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of nextPageToken from the previous response.
     * @opt_param string projectNumber The project to list datasets for.
     * @opt_param int pageSize The maximum number of results returned by this
     * request. If unspecified, defaults to 50.
     */
    public function listDatasets($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Genomics_ListDatasetsResponse");
    }

    /**
     * Updates a dataset. This method supports patch semantics. (datasets.patch)
     *
     * @param string $datasetId The ID of the dataset to be updated.
     * @param Google_Dataset|Google_Service_Genomics_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($datasetId, Google_Service_Genomics_Dataset $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_Dataset");
    }

    /**
     * Undeletes a dataset by restoring a dataset which was deleted via this API.
     * This operation is only possible for a week after the deletion occurred.
     * (datasets.undelete)
     *
     * @param string $datasetId The ID of the dataset to be undeleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function undelete($datasetId, $optParams = [])
    {
        $params = ['datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('undelete', [$params], "Google_Service_Genomics_Dataset");
    }

    /**
     * Updates a dataset. (datasets.update)
     *
     * @param string $datasetId The ID of the dataset to be updated.
     * @param Google_Dataset|Google_Service_Genomics_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($datasetId, Google_Service_Genomics_Dataset $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_Dataset");
    }
}

/**
 * The "experimental" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $experimental = $genomicsService->experimental;
 *  </code>
 */
class Google_Service_Genomics_Experimental_Resource extends Google_Service_Resource
{
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $jobs = $genomicsService->jobs;
 *  </code>
 */
class Google_Service_Genomics_ExperimentalJobs_Resource extends Google_Service_Resource
{

    /**
     * Creates and asynchronously runs an ad-hoc job. This is an experimental call
     * and may be removed or changed at any time. (jobs.create)
     *
     * @param Google_ExperimentalCreateJobRequest|Google_Service_Genomics_ExperimentalCreateJobRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_Genomics_ExperimentalCreateJobRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_ExperimentalCreateJobResponse");
    }
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $jobs = $genomicsService->jobs;
 *  </code>
 */
class Google_Service_Genomics_Jobs_Resource extends Google_Service_Resource
{

    /**
     * Cancels a job by ID. Note that it is possible for partial results to be
     * generated and stored for cancelled jobs. (jobs.cancel)
     *
     * @param string $jobId Required. The ID of the job.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function cancel($jobId, $optParams = [])
    {
        $params = ['jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('cancel', [$params]);
    }

    /**
     * Gets a job by ID. (jobs.get)
     *
     * @param string $jobId Required. The ID of the job.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($jobId, $optParams = [])
    {
        $params = ['jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_Job");
    }

    /**
     * Gets a list of jobs matching the criteria. (jobs.search)
     *
     * @param Google_SearchJobsRequest|Google_Service_Genomics_SearchJobsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_Genomics_SearchJobsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchJobsResponse");
    }
}

/**
 * The "readgroupsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $readgroupsets = $genomicsService->readgroupsets;
 *  </code>
 */
class Google_Service_Genomics_Readgroupsets_Resource extends Google_Service_Resource
{

    /**
     * Aligns read data from existing read group sets or files from Google Cloud
     * Storage. See the  alignment and variant calling documentation for more
     * details. (readgroupsets.align)
     *
     * @param Google_AlignReadGroupSetsRequest|Google_Service_Genomics_AlignReadGroupSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function align(Google_Service_Genomics_AlignReadGroupSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('align', [$params], "Google_Service_Genomics_AlignReadGroupSetsResponse");
    }

    /**
     * Calls variants on read data from existing read group sets or files from
     * Google Cloud Storage. See the  alignment and variant calling documentation
     * for more details. (readgroupsets.callReadgroupsets)
     *
     * @param Google_CallReadGroupSetsRequest|Google_Service_Genomics_CallReadGroupSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function callReadgroupsets(Google_Service_Genomics_CallReadGroupSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('call', [$params], "Google_Service_Genomics_CallReadGroupSetsResponse");
    }

    /**
     * Deletes a read group set. (readgroupsets.delete)
     *
     * @param string $readGroupSetId The ID of the read group set to be deleted. The
     *                               caller must have WRITE permissions to the dataset associated with this read
     *                               group set.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($readGroupSetId, $optParams = [])
    {
        $params = ['readGroupSetId' => $readGroupSetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Exports read group sets to a BAM file in Google Cloud Storage.
     *
     * Note that currently there may be some differences between exported BAM files
     * and the original BAM file at the time of import. In particular, comments in
     * the input file header will not be preserved, some custom tags will be
     * converted to strings, and original reference sequence order is not
     * necessarily preserved. (readgroupsets.export)
     *
     * @param Google_ExportReadGroupSetsRequest|Google_Service_Genomics_ExportReadGroupSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function export(Google_Service_Genomics_ExportReadGroupSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('export', [$params], "Google_Service_Genomics_ExportReadGroupSetsResponse");
    }

    /**
     * Gets a read group set by ID. (readgroupsets.get)
     *
     * @param string $readGroupSetId The ID of the read group set.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($readGroupSetId, $optParams = [])
    {
        $params = ['readGroupSetId' => $readGroupSetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_ReadGroupSet");
    }

    /**
     * Creates read group sets by asynchronously importing the provided information.
     *
     * Note that currently comments in the input file header are not imported and
     * some custom tags will be converted to strings, rather than preserving tag
     * types. The caller must have WRITE permissions to the dataset.
     * (readgroupsets.import)
     *
     * @param Google_ImportReadGroupSetsRequest|Google_Service_Genomics_ImportReadGroupSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function import(Google_Service_Genomics_ImportReadGroupSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('import', [$params], "Google_Service_Genomics_ImportReadGroupSetsResponse");
    }

    /**
     * Updates a read group set. This method supports patch semantics.
     * (readgroupsets.patch)
     *
     * @param string $readGroupSetId The ID of the read group set to be updated. The
     *                                                                                 caller must have WRITE permissions to the dataset associated with this read
     *                                                                                 group set.
     * @param Google_ReadGroupSet|Google_Service_Genomics_ReadGroupSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($readGroupSetId, Google_Service_Genomics_ReadGroupSet $postBody, $optParams = [])
    {
        $params = ['readGroupSetId' => $readGroupSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_ReadGroupSet");
    }

    /**
     * Searches for read group sets matching the criteria.
     *
     * Implements GlobalAllianceApi.searchReadGroupSets. (readgroupsets.search)
     *
     * @param Google_SearchReadGroupSetsRequest|Google_Service_Genomics_SearchReadGroupSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function search(Google_Service_Genomics_SearchReadGroupSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchReadGroupSetsResponse");
    }

    /**
     * Updates a read group set. (readgroupsets.update)
     *
     * @param string $readGroupSetId The ID of the read group set to be updated. The
     *                                                                                 caller must have WRITE permissions to the dataset associated with this read
     *                                                                                 group set.
     * @param Google_ReadGroupSet|Google_Service_Genomics_ReadGroupSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($readGroupSetId, Google_Service_Genomics_ReadGroupSet $postBody, $optParams = [])
    {
        $params = ['readGroupSetId' => $readGroupSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_ReadGroupSet");
    }
}

/**
 * The "coveragebuckets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $coveragebuckets = $genomicsService->coveragebuckets;
 *  </code>
 */
class Google_Service_Genomics_ReadgroupsetsCoveragebuckets_Resource extends Google_Service_Resource
{

    /**
     * Lists fixed width coverage buckets for a read group set, each of which
     * correspond to a range of a reference sequence. Each bucket summarizes
     * coverage information across its corresponding genomic range.
     *
     * Coverage is defined as the number of reads which are aligned to a given base
     * in the reference sequence. Coverage buckets are available at several
     * precomputed bucket widths, enabling retrieval of various coverage 'zoom
     * levels'. The caller must have READ permissions for the target read group set.
     * (coveragebuckets.listReadgroupsetsCoveragebuckets)
     *
     * @param string $readGroupSetId Required. The ID of the read group set over
     *                               which coverage is requested.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param int pageSize The maximum number of results to return in a single
     * page. If unspecified, defaults to 1024. The maximum value is 2048.
     * @opt_param string range.start The start position of the range on the
     * reference, 0-based inclusive. If specified, referenceName must also be
     * specified.
     * @opt_param string range.end The end position of the range on the reference,
     * 0-based exclusive. If specified, referenceName must also be specified.
     * @opt_param string range.referenceName The reference sequence name, for
     * example chr1, 1, or chrX.
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of nextPageToken from the previous response.
     * @opt_param string targetBucketWidth The desired width of each reported
     * coverage bucket in base pairs. This will be rounded down to the nearest
     * precomputed bucket width; the value of which is returned as bucketWidth in
     * the response. Defaults to infinity (each bucket spans an entire reference
     * sequence) or the length of the target range, if specified. The smallest
     * precomputed bucketWidth is currently 2048 base pairs; this is subject to
     * change.
     */
    public function listReadgroupsetsCoveragebuckets($readGroupSetId, $optParams = [])
    {
        $params = ['readGroupSetId' => $readGroupSetId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Genomics_ListCoverageBucketsResponse");
    }
}

/**
 * The "reads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $reads = $genomicsService->reads;
 *  </code>
 */
class Google_Service_Genomics_Reads_Resource extends Google_Service_Resource
{

    /**
     * Gets a list of reads for one or more read group sets. Reads search operates
     * over a genomic coordinate space of reference sequence & position defined over
     * the reference sequences to which the requested read group sets are aligned.
     *
     * If a target positional range is specified, search returns all reads whose
     * alignment to the reference genome overlap the range. A query which specifies
     * only read group set IDs yields all reads in those read group sets, including
     * unmapped reads.
     *
     * All reads returned (including reads on subsequent pages) are ordered by
     * genomic coordinate (reference sequence & position). Reads with equivalent
     * genomic coordinates are returned in a deterministic order.
     *
     * Implements GlobalAllianceApi.searchReads. (reads.search)
     *
     * @param Google_SearchReadsRequest|Google_Service_Genomics_SearchReadsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_Genomics_SearchReadsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchReadsResponse");
    }
}

/**
 * The "references" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $references = $genomicsService->references;
 *  </code>
 */
class Google_Service_Genomics_References_Resource extends Google_Service_Resource
{

    /**
     * Gets a reference.
     *
     * Implements GlobalAllianceApi.getReference. (references.get)
     *
     * @param string $referenceId The ID of the reference.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($referenceId, $optParams = [])
    {
        $params = ['referenceId' => $referenceId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_Reference");
    }

    /**
     * Searches for references which match the given criteria.
     *
     * Implements GlobalAllianceApi.searchReferences. (references.search)
     *
     * @param Google_SearchReferencesRequest|Google_Service_Genomics_SearchReferencesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function search(Google_Service_Genomics_SearchReferencesRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchReferencesResponse");
    }
}

/**
 * The "bases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $bases = $genomicsService->bases;
 *  </code>
 */
class Google_Service_Genomics_ReferencesBases_Resource extends Google_Service_Resource
{

    /**
     * Lists the bases in a reference, optionally restricted to a range.
     *
     * Implements GlobalAllianceApi.getReferenceBases. (bases.listReferencesBases)
     *
     * @param string $referenceId The ID of the reference.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of nextPageToken from the previous response.
     * @opt_param string end The end position (0-based, exclusive) of this query.
     * Defaults to the length of this reference.
     * @opt_param int pageSize Specifies the maximum number of bases to return in a
     * single page.
     * @opt_param string start The start position (0-based) of this query. Defaults
     * to 0.
     */
    public function listReferencesBases($referenceId, $optParams = [])
    {
        $params = ['referenceId' => $referenceId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Genomics_ListBasesResponse");
    }
}

/**
 * The "referencesets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $referencesets = $genomicsService->referencesets;
 *  </code>
 */
class Google_Service_Genomics_Referencesets_Resource extends Google_Service_Resource
{

    /**
     * Gets a reference set.
     *
     * Implements GlobalAllianceApi.getReferenceSet. (referencesets.get)
     *
     * @param string $referenceSetId The ID of the reference set.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($referenceSetId, $optParams = [])
    {
        $params = ['referenceSetId' => $referenceSetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_ReferenceSet");
    }

    /**
     * Searches for reference sets which match the given criteria.
     *
     * Implements GlobalAllianceApi.searchReferenceSets. (referencesets.search)
     *
     * @param Google_SearchReferenceSetsRequest|Google_Service_Genomics_SearchReferenceSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function search(Google_Service_Genomics_SearchReferenceSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchReferenceSetsResponse");
    }
}

/**
 * The "streamingReadstore" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $streamingReadstore = $genomicsService->streamingReadstore;
 *  </code>
 */
class Google_Service_Genomics_StreamingReadstore_Resource extends Google_Service_Resource
{

    /**
     * Gets a stream of reads for one or more read group sets. Reads search operates
     * over a genomic coordinate space of reference sequence & position defined over
     * the reference sequences to which the requested read group sets are aligned.
     *
     * If a target positional range is specified, all reads whose alignment to the
     * reference genome overlap the range are returned.
     *
     * All reads returned are ordered by genomic coordinate (reference sequence &
     * position). Reads with equivalent genomic coordinates are returned in a
     * deterministic order. (streamingReadstore.streamreads)
     *
     * @param Google_Service_Genomics_StreamReadsRequest|Google_StreamReadsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function streamreads(Google_Service_Genomics_StreamReadsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('streamreads', [$params], "Google_Service_Genomics_StreamReadsResponse");
    }
}

/**
 * The "variants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variants = $genomicsService->variants;
 *  </code>
 */
class Google_Service_Genomics_Variants_Resource extends Google_Service_Resource
{

    /**
     * Creates a new variant. (variants.create)
     *
     * @param Google_Service_Genomics_Variant|Google_Variant $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create(Google_Service_Genomics_Variant $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Genomics_Variant");
    }

    /**
     * Deletes a variant. (variants.delete)
     *
     * @param string $variantId The ID of the variant to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($variantId, $optParams = [])
    {
        $params = ['variantId' => $variantId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a variant by ID. (variants.get)
     *
     * @param string $variantId The ID of the variant.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($variantId, $optParams = [])
    {
        $params = ['variantId' => $variantId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_Variant");
    }

    /**
     * Gets a list of variants matching the criteria.
     *
     * Implements GlobalAllianceApi.searchVariants. (variants.search)
     *
     * @param Google_SearchVariantsRequest|Google_Service_Genomics_SearchVariantsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_Genomics_SearchVariantsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchVariantsResponse");
    }

    /**
     * Updates a variant's names and info fields. All other modifications are
     * silently ignored. Returns the modified variant without its calls.
     * (variants.update)
     *
     * @param string $variantId The ID of the variant to be updated.
     * @param Google_Service_Genomics_Variant|Google_Variant $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($variantId, Google_Service_Genomics_Variant $postBody, $optParams = [])
    {
        $params = ['variantId' => $variantId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_Variant");
    }
}

/**
 * The "variantsets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $variantsets = $genomicsService->variantsets;
 *  </code>
 */
class Google_Service_Genomics_Variantsets_Resource extends Google_Service_Resource
{

    /**
     * Deletes the contents of a variant set. The variant set object is not deleted.
     * (variantsets.delete)
     *
     * @param string $variantSetId The ID of the variant set to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($variantSetId, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Exports variant set data to an external destination. (variantsets.export)
     *
     * @param string $variantSetId Required. The ID of the variant set that contains
     *                                                                                                     variant data which should be exported. The caller must have READ access to
     *                                                                                                     this variant set.
     * @param Google_ExportVariantSetRequest|Google_Service_Genomics_ExportVariantSetRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function export($variantSetId, Google_Service_Genomics_ExportVariantSetRequest $postBody, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('export', [$params], "Google_Service_Genomics_ExportVariantSetResponse");
    }

    /**
     * Gets a variant set by ID. (variantsets.get)
     *
     * @param string $variantSetId Required. The ID of the variant set.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($variantSetId, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Genomics_VariantSet");
    }

    /**
     * Creates variant data by asynchronously importing the provided information.
     *
     * The variants for import will be merged with any existing data and each other
     * according to the behavior of mergeVariants. In particular, this means for
     * merged VCF variants that have conflicting INFO fields, some data will be
     * arbitrarily discarded. As a special case, for single-sample VCF files, QUAL
     * and FILTER fields will be moved to the call level; these are sometimes
     * interpreted in a call-specific context. Imported VCF headers are appended to
     * the metadata already in a variant set. (variantsets.importVariants)
     *
     * @param string $variantSetId Required. The variant set to which variant data
     *                                                                                                 should be imported.
     * @param Google_ImportVariantsRequest|Google_Service_Genomics_ImportVariantsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function importVariants($variantSetId, Google_Service_Genomics_ImportVariantsRequest $postBody, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('importVariants', [$params], "Google_Service_Genomics_ImportVariantsResponse");
    }

    /**
     * Merges the given variants with existing variants. Each variant will be merged
     * with an existing variant that matches its reference sequence, start, end,
     * reference bases, and alternative bases. If no such variant exists, a new one
     * will be created.
     *
     * When variants are merged, the call information from the new variant is added
     * to the existing variant, and other fields (such as key/value pairs) are
     * discarded. (variantsets.mergeVariants)
     *
     * @param string $variantSetId The destination variant set.
     * @param Google_MergeVariantsRequest|Google_Service_Genomics_MergeVariantsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function mergeVariants($variantSetId, Google_Service_Genomics_MergeVariantsRequest $postBody, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('mergeVariants', [$params]);
    }

    /**
     * Updates a variant set's metadata. All other modifications are silently
     * ignored. This method supports patch semantics. (variantsets.patch)
     *
     * @param string $variantSetId The ID of the variant to be updated.
     * @param Google_Service_Genomics_VariantSet|Google_VariantSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($variantSetId, Google_Service_Genomics_VariantSet $postBody, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Genomics_VariantSet");
    }

    /**
     * Returns a list of all variant sets matching search criteria.
     *
     * Implements GlobalAllianceApi.searchVariantSets. (variantsets.search)
     *
     * @param Google_SearchVariantSetsRequest|Google_Service_Genomics_SearchVariantSetsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_Genomics_SearchVariantSetsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Genomics_SearchVariantSetsResponse");
    }

    /**
     * Updates a variant set's metadata. All other modifications are silently
     * ignored. (variantsets.update)
     *
     * @param string $variantSetId The ID of the variant to be updated.
     * @param Google_Service_Genomics_VariantSet|Google_VariantSet $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($variantSetId, Google_Service_Genomics_VariantSet $postBody, $optParams = [])
    {
        $params = ['variantSetId' => $variantSetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Genomics_VariantSet");
    }
}


/**
 * Class Google_Service_Genomics_AlignReadGroupSetsRequest
 */
class Google_Service_Genomics_AlignReadGroupSetsRequest extends Google_Collection
{
    public $bamSourceUris;
    public $datasetId;
    public $readGroupSetId;
    protected $collection_key = 'bamSourceUris';
    protected $internal_gapi_mappings = [];
    protected $interleavedFastqSourceType = 'Google_Service_Genomics_InterleavedFastqSource';
    protected $interleavedFastqSourceDataType = '';
    protected $pairedFastqSourceType = 'Google_Service_Genomics_PairedFastqSource';
    protected $pairedFastqSourceDataType = '';

    /**
     * @return mixed
     */
    public function getBamSourceUris()
    {
        return $this->bamSourceUris;
    }

    /**
     * @param $bamSourceUris
     */
    public function setBamSourceUris($bamSourceUris)
    {
        $this->bamSourceUris = $bamSourceUris;
    }

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

    /**
     * @param Google_Service_Genomics_InterleavedFastqSource $interleavedFastqSource
     */
    public function setInterleavedFastqSource(Google_Service_Genomics_InterleavedFastqSource $interleavedFastqSource)
    {
        $this->interleavedFastqSource = $interleavedFastqSource;
    }

    /**
     * @return mixed
     */
    public function getInterleavedFastqSource()
    {
        return $this->interleavedFastqSource;
    }

    /**
     * @param Google_Service_Genomics_PairedFastqSource $pairedFastqSource
     */
    public function setPairedFastqSource(Google_Service_Genomics_PairedFastqSource $pairedFastqSource)
    {
        $this->pairedFastqSource = $pairedFastqSource;
    }

    /**
     * @return mixed
     */
    public function getPairedFastqSource()
    {
        return $this->pairedFastqSource;
    }

    /**
     * @return mixed
     */
    public function getReadGroupSetId()
    {
        return $this->readGroupSetId;
    }

    /**
     * @param $readGroupSetId
     */
    public function setReadGroupSetId($readGroupSetId)
    {
        $this->readGroupSetId = $readGroupSetId;
    }
}

/**
 * Class Google_Service_Genomics_AlignReadGroupSetsResponse
 */
class Google_Service_Genomics_AlignReadGroupSetsResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_Annotation
 */
class Google_Service_Genomics_Annotation extends Google_Model
{
    public $annotationSetId;
    public $id;
    public $info;
    public $name;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $positionType = 'Google_Service_Genomics_RangePosition';
    protected $positionDataType = '';
    protected $transcriptType = 'Google_Service_Genomics_Transcript';
    protected $transcriptDataType = '';
    protected $variantType = 'Google_Service_Genomics_VariantAnnotation';
    protected $variantDataType = '';

    /**
     * @return mixed
     */
    public function getAnnotationSetId()
    {
        return $this->annotationSetId;
    }

    /**
     * @param $annotationSetId
     */
    public function setAnnotationSetId($annotationSetId)
    {
        $this->annotationSetId = $annotationSetId;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
     * @param Google_Service_Genomics_RangePosition $position
     */
    public function setPosition(Google_Service_Genomics_RangePosition $position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Google_Service_Genomics_Transcript $transcript
     */
    public function setTranscript(Google_Service_Genomics_Transcript $transcript)
    {
        $this->transcript = $transcript;
    }

    /**
     * @return mixed
     */
    public function getTranscript()
    {
        return $this->transcript;
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
     * @param Google_Service_Genomics_VariantAnnotation $variant
     */
    public function setVariant(Google_Service_Genomics_VariantAnnotation $variant)
    {
        $this->variant = $variant;
    }

    /**
     * @return mixed
     */
    public function getVariant()
    {
        return $this->variant;
    }
}

/**
 * Class Google_Service_Genomics_AnnotationInfo
 */
class Google_Service_Genomics_AnnotationInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_AnnotationSet
 */
class Google_Service_Genomics_AnnotationSet extends Google_Model
{
    public $datasetId;
    public $id;
    public $info;
    public $name;
    public $referenceSetId;
    public $sourceUri;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }

    /**
     * @return mixed
     */
    public function getSourceUri()
    {
        return $this->sourceUri;
    }

    /**
     * @param $sourceUri
     */
    public function setSourceUri($sourceUri)
    {
        $this->sourceUri = $sourceUri;
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
 * Class Google_Service_Genomics_AnnotationSetInfo
 */
class Google_Service_Genomics_AnnotationSetInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_BatchAnnotationsResponse
 */
class Google_Service_Genomics_BatchAnnotationsResponse extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_Genomics_BatchAnnotationsResponseEntry';
    protected $entriesDataType = 'array';


    /**
     * @param $entries
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return mixed
     */
    public function getEntries()
    {
        return $this->entries;
    }
}

/**
 * Class Google_Service_Genomics_BatchAnnotationsResponseEntry
 */
class Google_Service_Genomics_BatchAnnotationsResponseEntry extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $annotationType = 'Google_Service_Genomics_Annotation';
    protected $annotationDataType = '';
    protected $statusType = 'Google_Service_Genomics_BatchAnnotationsResponseEntryStatus';
    protected $statusDataType = '';


    /**
     * @param Google_Service_Genomics_Annotation $annotation
     */
    public function setAnnotation(Google_Service_Genomics_Annotation $annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     * @return mixed
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param Google_Service_Genomics_BatchAnnotationsResponseEntryStatus $status
     */
    public function setStatus(Google_Service_Genomics_BatchAnnotationsResponseEntryStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}

/**
 * Class Google_Service_Genomics_BatchAnnotationsResponseEntryStatus
 */
class Google_Service_Genomics_BatchAnnotationsResponseEntryStatus extends Google_Model
{
    public $code;
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
 * Class Google_Service_Genomics_BatchCreateAnnotationsRequest
 */
class Google_Service_Genomics_BatchCreateAnnotationsRequest extends Google_Collection
{
    protected $collection_key = 'annotations';
    protected $internal_gapi_mappings = [];
    protected $annotationsType = 'Google_Service_Genomics_Annotation';
    protected $annotationsDataType = 'array';


    /**
     * @param $annotations
     */
    public function setAnnotations($annotations)
    {
        $this->annotations = $annotations;
    }

    /**
     * @return mixed
     */
    public function getAnnotations()
    {
        return $this->annotations;
    }
}

/**
 * Class Google_Service_Genomics_CallReadGroupSetsRequest
 */
class Google_Service_Genomics_CallReadGroupSetsRequest extends Google_Collection
{
    public $datasetId;
    public $readGroupSetId;
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

    /**
     * @return mixed
     */
    public function getReadGroupSetId()
    {
        return $this->readGroupSetId;
    }

    /**
     * @param $readGroupSetId
     */
    public function setReadGroupSetId($readGroupSetId)
    {
        $this->readGroupSetId = $readGroupSetId;
    }

    /**
     * @return mixed
     */
    public function getSourceUris()
    {
        return $this->sourceUris;
    }

    /**
     * @param $sourceUris
     */
    public function setSourceUris($sourceUris)
    {
        $this->sourceUris = $sourceUris;
    }
}

/**
 * Class Google_Service_Genomics_CallReadGroupSetsResponse
 */
class Google_Service_Genomics_CallReadGroupSetsResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_CallSet
 */
class Google_Service_Genomics_CallSet extends Google_Collection
{
    public $created;
    public $id;
    public $info;
    public $name;
    public $sampleId;
    public $variantSetIds;
    protected $collection_key = 'variantSetIds';
    protected $internal_gapi_mappings = [];

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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
    public function getSampleId()
    {
        return $this->sampleId;
    }

    /**
     * @param $sampleId
     */
    public function setSampleId($sampleId)
    {
        $this->sampleId = $sampleId;
    }

    /**
     * @return mixed
     */
    public function getVariantSetIds()
    {
        return $this->variantSetIds;
    }

    /**
     * @param $variantSetIds
     */
    public function setVariantSetIds($variantSetIds)
    {
        $this->variantSetIds = $variantSetIds;
    }
}

/**
 * Class Google_Service_Genomics_CallSetInfo
 */
class Google_Service_Genomics_CallSetInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_CigarUnit
 */
class Google_Service_Genomics_CigarUnit extends Google_Model
{
    public $operation;
    public $operationLength;
    public $referenceSequence;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return mixed
     */
    public function getOperationLength()
    {
        return $this->operationLength;
    }

    /**
     * @param $operationLength
     */
    public function setOperationLength($operationLength)
    {
        $this->operationLength = $operationLength;
    }

    /**
     * @return mixed
     */
    public function getReferenceSequence()
    {
        return $this->referenceSequence;
    }

    /**
     * @param $referenceSequence
     */
    public function setReferenceSequence($referenceSequence)
    {
        $this->referenceSequence = $referenceSequence;
    }
}

/**
 * Class Google_Service_Genomics_CoverageBucket
 */
class Google_Service_Genomics_CoverageBucket extends Google_Model
{
    public $meanCoverage;
    protected $internal_gapi_mappings = [];
    protected $rangeType = 'Google_Service_Genomics_Range';
    protected $rangeDataType = '';

    /**
     * @return mixed
     */
    public function getMeanCoverage()
    {
        return $this->meanCoverage;
    }

    /**
     * @param $meanCoverage
     */
    public function setMeanCoverage($meanCoverage)
    {
        $this->meanCoverage = $meanCoverage;
    }

    /**
     * @param Google_Service_Genomics_Range $range
     */
    public function setRange(Google_Service_Genomics_Range $range)
    {
        $this->range = $range;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }
}

/**
 * Class Google_Service_Genomics_Dataset
 */
class Google_Service_Genomics_Dataset extends Google_Model
{
    public $id;
    public $isPublic;
    public $name;
    public $projectNumber;
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
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
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
}

/**
 * Class Google_Service_Genomics_ExperimentalCreateJobRequest
 */
class Google_Service_Genomics_ExperimentalCreateJobRequest extends Google_Collection
{
    public $align;
    public $callVariants;
    public $gcsOutputPath;
    public $pairedSourceUris;
    public $projectNumber;
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * @param $align
     */
    public function setAlign($align)
    {
        $this->align = $align;
    }

    /**
     * @return mixed
     */
    public function getCallVariants()
    {
        return $this->callVariants;
    }

    /**
     * @param $callVariants
     */
    public function setCallVariants($callVariants)
    {
        $this->callVariants = $callVariants;
    }

    /**
     * @return mixed
     */
    public function getGcsOutputPath()
    {
        return $this->gcsOutputPath;
    }

    /**
     * @param $gcsOutputPath
     */
    public function setGcsOutputPath($gcsOutputPath)
    {
        $this->gcsOutputPath = $gcsOutputPath;
    }

    /**
     * @return mixed
     */
    public function getPairedSourceUris()
    {
        return $this->pairedSourceUris;
    }

    /**
     * @param $pairedSourceUris
     */
    public function setPairedSourceUris($pairedSourceUris)
    {
        $this->pairedSourceUris = $pairedSourceUris;
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
    public function getSourceUris()
    {
        return $this->sourceUris;
    }

    /**
     * @param $sourceUris
     */
    public function setSourceUris($sourceUris)
    {
        $this->sourceUris = $sourceUris;
    }
}

/**
 * Class Google_Service_Genomics_ExperimentalCreateJobResponse
 */
class Google_Service_Genomics_ExperimentalCreateJobResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_ExportReadGroupSetsRequest
 */
class Google_Service_Genomics_ExportReadGroupSetsRequest extends Google_Collection
{
    public $exportUri;
    public $projectNumber;
    public $readGroupSetIds;
    public $referenceNames;
    protected $collection_key = 'referenceNames';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExportUri()
    {
        return $this->exportUri;
    }

    /**
     * @param $exportUri
     */
    public function setExportUri($exportUri)
    {
        $this->exportUri = $exportUri;
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
    public function getReadGroupSetIds()
    {
        return $this->readGroupSetIds;
    }

    /**
     * @param $readGroupSetIds
     */
    public function setReadGroupSetIds($readGroupSetIds)
    {
        $this->readGroupSetIds = $readGroupSetIds;
    }

    /**
     * @return mixed
     */
    public function getReferenceNames()
    {
        return $this->referenceNames;
    }

    /**
     * @param $referenceNames
     */
    public function setReferenceNames($referenceNames)
    {
        $this->referenceNames = $referenceNames;
    }
}

/**
 * Class Google_Service_Genomics_ExportReadGroupSetsResponse
 */
class Google_Service_Genomics_ExportReadGroupSetsResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_ExportVariantSetRequest
 */
class Google_Service_Genomics_ExportVariantSetRequest extends Google_Collection
{
    public $bigqueryDataset;
    public $bigqueryTable;
    public $callSetIds;
    public $format;
    public $projectNumber;
    protected $collection_key = 'callSetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBigqueryDataset()
    {
        return $this->bigqueryDataset;
    }

    /**
     * @param $bigqueryDataset
     */
    public function setBigqueryDataset($bigqueryDataset)
    {
        $this->bigqueryDataset = $bigqueryDataset;
    }

    /**
     * @return mixed
     */
    public function getBigqueryTable()
    {
        return $this->bigqueryTable;
    }

    /**
     * @param $bigqueryTable
     */
    public function setBigqueryTable($bigqueryTable)
    {
        $this->bigqueryTable = $bigqueryTable;
    }

    /**
     * @return mixed
     */
    public function getCallSetIds()
    {
        return $this->callSetIds;
    }

    /**
     * @param $callSetIds
     */
    public function setCallSetIds($callSetIds)
    {
        $this->callSetIds = $callSetIds;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
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
}

/**
 * Class Google_Service_Genomics_ExportVariantSetResponse
 */
class Google_Service_Genomics_ExportVariantSetResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_ExternalId
 */
class Google_Service_Genomics_ExternalId extends Google_Model
{
    public $id;
    public $sourceName;
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
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param $sourceName
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = $sourceName;
    }
}

/**
 * Class Google_Service_Genomics_FastqMetadata
 */
class Google_Service_Genomics_FastqMetadata extends Google_Model
{
    public $libraryName;
    public $platformName;
    public $platformUnit;
    public $readGroupName;
    public $sampleName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLibraryName()
    {
        return $this->libraryName;
    }

    /**
     * @param $libraryName
     */
    public function setLibraryName($libraryName)
    {
        $this->libraryName = $libraryName;
    }

    /**
     * @return mixed
     */
    public function getPlatformName()
    {
        return $this->platformName;
    }

    /**
     * @param $platformName
     */
    public function setPlatformName($platformName)
    {
        $this->platformName = $platformName;
    }

    /**
     * @return mixed
     */
    public function getPlatformUnit()
    {
        return $this->platformUnit;
    }

    /**
     * @param $platformUnit
     */
    public function setPlatformUnit($platformUnit)
    {
        $this->platformUnit = $platformUnit;
    }

    /**
     * @return mixed
     */
    public function getReadGroupName()
    {
        return $this->readGroupName;
    }

    /**
     * @param $readGroupName
     */
    public function setReadGroupName($readGroupName)
    {
        $this->readGroupName = $readGroupName;
    }

    /**
     * @return mixed
     */
    public function getSampleName()
    {
        return $this->sampleName;
    }

    /**
     * @param $sampleName
     */
    public function setSampleName($sampleName)
    {
        $this->sampleName = $sampleName;
    }
}

/**
 * Class Google_Service_Genomics_GenomicsCall
 */
class Google_Service_Genomics_GenomicsCall extends Google_Collection
{
    public $callSetId;
    public $callSetName;
    public $genotype;
    public $genotypeLikelihood;
    public $info;
    public $phaseset;
    protected $collection_key = 'genotypeLikelihood';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCallSetId()
    {
        return $this->callSetId;
    }

    /**
     * @param $callSetId
     */
    public function setCallSetId($callSetId)
    {
        $this->callSetId = $callSetId;
    }

    /**
     * @return mixed
     */
    public function getCallSetName()
    {
        return $this->callSetName;
    }

    /**
     * @param $callSetName
     */
    public function setCallSetName($callSetName)
    {
        $this->callSetName = $callSetName;
    }

    /**
     * @return mixed
     */
    public function getGenotype()
    {
        return $this->genotype;
    }

    /**
     * @param $genotype
     */
    public function setGenotype($genotype)
    {
        $this->genotype = $genotype;
    }

    /**
     * @return mixed
     */
    public function getGenotypeLikelihood()
    {
        return $this->genotypeLikelihood;
    }

    /**
     * @param $genotypeLikelihood
     */
    public function setGenotypeLikelihood($genotypeLikelihood)
    {
        $this->genotypeLikelihood = $genotypeLikelihood;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getPhaseset()
    {
        return $this->phaseset;
    }

    /**
     * @param $phaseset
     */
    public function setPhaseset($phaseset)
    {
        $this->phaseset = $phaseset;
    }
}

/**
 * Class Google_Service_Genomics_GenomicsCallInfo
 */
class Google_Service_Genomics_GenomicsCallInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_ImportReadGroupSetsRequest
 */
class Google_Service_Genomics_ImportReadGroupSetsRequest extends Google_Collection
{
    public $datasetId;
    public $partitionStrategy;
    public $referenceSetId;
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

    /**
     * @return mixed
     */
    public function getPartitionStrategy()
    {
        return $this->partitionStrategy;
    }

    /**
     * @param $partitionStrategy
     */
    public function setPartitionStrategy($partitionStrategy)
    {
        $this->partitionStrategy = $partitionStrategy;
    }

    /**
     * @return mixed
     */
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }

    /**
     * @return mixed
     */
    public function getSourceUris()
    {
        return $this->sourceUris;
    }

    /**
     * @param $sourceUris
     */
    public function setSourceUris($sourceUris)
    {
        $this->sourceUris = $sourceUris;
    }
}

/**
 * Class Google_Service_Genomics_ImportReadGroupSetsResponse
 */
class Google_Service_Genomics_ImportReadGroupSetsResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_ImportVariantsRequest
 */
class Google_Service_Genomics_ImportVariantsRequest extends Google_Collection
{
    public $format;
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getSourceUris()
    {
        return $this->sourceUris;
    }

    /**
     * @param $sourceUris
     */
    public function setSourceUris($sourceUris)
    {
        $this->sourceUris = $sourceUris;
    }
}

/**
 * Class Google_Service_Genomics_ImportVariantsResponse
 */
class Google_Service_Genomics_ImportVariantsResponse extends Google_Model
{
    public $jobId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }
}

/**
 * Class Google_Service_Genomics_Int32Value
 */
class Google_Service_Genomics_Int32Value extends Google_Model
{
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Genomics_InterleavedFastqSource
 */
class Google_Service_Genomics_InterleavedFastqSource extends Google_Collection
{
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Genomics_FastqMetadata';
    protected $metadataDataType = '';

    /**
     * @param Google_Service_Genomics_FastqMetadata $metadata
     */
    public function setMetadata(Google_Service_Genomics_FastqMetadata $metadata)
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
    public function getSourceUris()
    {
        return $this->sourceUris;
    }

    /**
     * @param $sourceUris
     */
    public function setSourceUris($sourceUris)
    {
        $this->sourceUris = $sourceUris;
    }
}

/**
 * Class Google_Service_Genomics_Job
 */
class Google_Service_Genomics_Job extends Google_Collection
{
    public $created;
    public $detailedStatus;
    public $errors;
    public $id;
    public $importedIds;
    public $projectNumber;
    public $status;
    public $warnings;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $requestType = 'Google_Service_Genomics_JobRequest';
    protected $requestDataType = '';

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
    public function getImportedIds()
    {
        return $this->importedIds;
    }

    /**
     * @param $importedIds
     */
    public function setImportedIds($importedIds)
    {
        $this->importedIds = $importedIds;
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
     * @param Google_Service_Genomics_JobRequest $request
     */
    public function setRequest(Google_Service_Genomics_JobRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
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
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * @param $warnings
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }
}

/**
 * Class Google_Service_Genomics_JobRequest
 */
class Google_Service_Genomics_JobRequest extends Google_Collection
{
    public $destination;
    public $source;
    public $type;
    protected $collection_key = 'source';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
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
 * Class Google_Service_Genomics_LinearAlignment
 */
class Google_Service_Genomics_LinearAlignment extends Google_Collection
{
    public $mappingQuality;
    protected $collection_key = 'cigar';
    protected $internal_gapi_mappings = [];
    protected $cigarType = 'Google_Service_Genomics_CigarUnit';
    protected $cigarDataType = 'array';
    protected $positionType = 'Google_Service_Genomics_Position';
    protected $positionDataType = '';


    /**
     * @param $cigar
     */
    public function setCigar($cigar)
    {
        $this->cigar = $cigar;
    }

    /**
     * @return mixed
     */
    public function getCigar()
    {
        return $this->cigar;
    }

    /**
     * @return mixed
     */
    public function getMappingQuality()
    {
        return $this->mappingQuality;
    }

    /**
     * @param $mappingQuality
     */
    public function setMappingQuality($mappingQuality)
    {
        $this->mappingQuality = $mappingQuality;
    }

    /**
     * @param Google_Service_Genomics_Position $position
     */
    public function setPosition(Google_Service_Genomics_Position $position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }
}

/**
 * Class Google_Service_Genomics_ListBasesResponse
 */
class Google_Service_Genomics_ListBasesResponse extends Google_Model
{
    public $nextPageToken;
    public $offset;
    public $sequence;
    protected $internal_gapi_mappings = [];

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
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }
}

/**
 * Class Google_Service_Genomics_ListCoverageBucketsResponse
 */
class Google_Service_Genomics_ListCoverageBucketsResponse extends Google_Collection
{
    public $bucketWidth;
    public $nextPageToken;
    protected $collection_key = 'coverageBuckets';
    protected $internal_gapi_mappings = [];
    protected $coverageBucketsType = 'Google_Service_Genomics_CoverageBucket';
    protected $coverageBucketsDataType = 'array';

    /**
     * @return mixed
     */
    public function getBucketWidth()
    {
        return $this->bucketWidth;
    }

    /**
     * @param $bucketWidth
     */
    public function setBucketWidth($bucketWidth)
    {
        $this->bucketWidth = $bucketWidth;
    }

    /**
     * @param $coverageBuckets
     */
    public function setCoverageBuckets($coverageBuckets)
    {
        $this->coverageBuckets = $coverageBuckets;
    }

    /**
     * @return mixed
     */
    public function getCoverageBuckets()
    {
        return $this->coverageBuckets;
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
 * Class Google_Service_Genomics_ListDatasetsResponse
 */
class Google_Service_Genomics_ListDatasetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'datasets';
    protected $internal_gapi_mappings = [];
    protected $datasetsType = 'Google_Service_Genomics_Dataset';
    protected $datasetsDataType = 'array';

    /**
     * @param $datasets
     */
    public function setDatasets($datasets)
    {
        $this->datasets = $datasets;
    }

    /**
     * @return mixed
     */
    public function getDatasets()
    {
        return $this->datasets;
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
 * Class Google_Service_Genomics_MergeVariantsRequest
 */
class Google_Service_Genomics_MergeVariantsRequest extends Google_Collection
{
    protected $collection_key = 'variants';
    protected $internal_gapi_mappings = [];
    protected $variantsType = 'Google_Service_Genomics_Variant';
    protected $variantsDataType = 'array';


    /**
     * @param $variants
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
    }

    /**
     * @return mixed
     */
    public function getVariants()
    {
        return $this->variants;
    }
}

/**
 * Class Google_Service_Genomics_Metadata
 */
class Google_Service_Genomics_Metadata extends Google_Model
{
    public $description;
    public $id;
    public $info;
    public $key;
    public $number;
    public $type;
    public $value;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
 * Class Google_Service_Genomics_MetadataInfo
 */
class Google_Service_Genomics_MetadataInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_PairedFastqSource
 */
class Google_Service_Genomics_PairedFastqSource extends Google_Collection
{
    public $firstSourceUris;
    public $secondSourceUris;
    protected $collection_key = 'secondSourceUris';
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Genomics_FastqMetadata';
    protected $metadataDataType = '';

    /**
     * @return mixed
     */
    public function getFirstSourceUris()
    {
        return $this->firstSourceUris;
    }

    /**
     * @param $firstSourceUris
     */
    public function setFirstSourceUris($firstSourceUris)
    {
        $this->firstSourceUris = $firstSourceUris;
    }

    /**
     * @param Google_Service_Genomics_FastqMetadata $metadata
     */
    public function setMetadata(Google_Service_Genomics_FastqMetadata $metadata)
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
    public function getSecondSourceUris()
    {
        return $this->secondSourceUris;
    }

    /**
     * @param $secondSourceUris
     */
    public function setSecondSourceUris($secondSourceUris)
    {
        $this->secondSourceUris = $secondSourceUris;
    }
}

/**
 * Class Google_Service_Genomics_Position
 */
class Google_Service_Genomics_Position extends Google_Model
{
    public $position;
    public $referenceName;
    public $reverseStrand;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
    }

    /**
     * @return mixed
     */
    public function getReverseStrand()
    {
        return $this->reverseStrand;
    }

    /**
     * @param $reverseStrand
     */
    public function setReverseStrand($reverseStrand)
    {
        $this->reverseStrand = $reverseStrand;
    }
}

/**
 * Class Google_Service_Genomics_QueryRange
 */
class Google_Service_Genomics_QueryRange extends Google_Model
{
    public $end;
    public $referenceId;
    public $referenceName;
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
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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
 * Class Google_Service_Genomics_Range
 */
class Google_Service_Genomics_Range extends Google_Model
{
    public $end;
    public $referenceName;
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
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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
 * Class Google_Service_Genomics_RangePosition
 */
class Google_Service_Genomics_RangePosition extends Google_Model
{
    public $end;
    public $referenceId;
    public $referenceName;
    public $reverseStrand;
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
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param $referenceId
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
    }

    /**
     * @return mixed
     */
    public function getReverseStrand()
    {
        return $this->reverseStrand;
    }

    /**
     * @param $reverseStrand
     */
    public function setReverseStrand($reverseStrand)
    {
        $this->reverseStrand = $reverseStrand;
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
 * Class Google_Service_Genomics_Read
 */
class Google_Service_Genomics_Read extends Google_Collection
{
    public $alignedQuality;
    public $alignedSequence;
    public $duplicateFragment;
    public $failedVendorQualityChecks;
    public $fragmentLength;
    public $fragmentName;
    public $id;
    public $info;
    public $numberReads;
    public $properPlacement;
    public $readGroupId;
    public $readGroupSetId;
    public $readNumber;
    public $secondaryAlignment;
    public $supplementaryAlignment;
    protected $collection_key = 'alignedQuality';
    protected $internal_gapi_mappings = [];
    protected $alignmentType = 'Google_Service_Genomics_LinearAlignment';
    protected $alignmentDataType = '';
    protected $nextMatePositionType = 'Google_Service_Genomics_Position';
    protected $nextMatePositionDataType = '';

    /**
     * @return mixed
     */
    public function getAlignedQuality()
    {
        return $this->alignedQuality;
    }

    /**
     * @param $alignedQuality
     */
    public function setAlignedQuality($alignedQuality)
    {
        $this->alignedQuality = $alignedQuality;
    }

    /**
     * @return mixed
     */
    public function getAlignedSequence()
    {
        return $this->alignedSequence;
    }

    /**
     * @param $alignedSequence
     */
    public function setAlignedSequence($alignedSequence)
    {
        $this->alignedSequence = $alignedSequence;
    }

    /**
     * @param Google_Service_Genomics_LinearAlignment $alignment
     */
    public function setAlignment(Google_Service_Genomics_LinearAlignment $alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * @return mixed
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * @return mixed
     */
    public function getDuplicateFragment()
    {
        return $this->duplicateFragment;
    }

    /**
     * @param $duplicateFragment
     */
    public function setDuplicateFragment($duplicateFragment)
    {
        $this->duplicateFragment = $duplicateFragment;
    }

    /**
     * @return mixed
     */
    public function getFailedVendorQualityChecks()
    {
        return $this->failedVendorQualityChecks;
    }

    /**
     * @param $failedVendorQualityChecks
     */
    public function setFailedVendorQualityChecks($failedVendorQualityChecks)
    {
        $this->failedVendorQualityChecks = $failedVendorQualityChecks;
    }

    /**
     * @return mixed
     */
    public function getFragmentLength()
    {
        return $this->fragmentLength;
    }

    /**
     * @param $fragmentLength
     */
    public function setFragmentLength($fragmentLength)
    {
        $this->fragmentLength = $fragmentLength;
    }

    /**
     * @return mixed
     */
    public function getFragmentName()
    {
        return $this->fragmentName;
    }

    /**
     * @param $fragmentName
     */
    public function setFragmentName($fragmentName)
    {
        $this->fragmentName = $fragmentName;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @param Google_Service_Genomics_Position $nextMatePosition
     */
    public function setNextMatePosition(Google_Service_Genomics_Position $nextMatePosition)
    {
        $this->nextMatePosition = $nextMatePosition;
    }

    /**
     * @return mixed
     */
    public function getNextMatePosition()
    {
        return $this->nextMatePosition;
    }

    /**
     * @return mixed
     */
    public function getNumberReads()
    {
        return $this->numberReads;
    }

    /**
     * @param $numberReads
     */
    public function setNumberReads($numberReads)
    {
        $this->numberReads = $numberReads;
    }

    /**
     * @return mixed
     */
    public function getProperPlacement()
    {
        return $this->properPlacement;
    }

    /**
     * @param $properPlacement
     */
    public function setProperPlacement($properPlacement)
    {
        $this->properPlacement = $properPlacement;
    }

    /**
     * @return mixed
     */
    public function getReadGroupId()
    {
        return $this->readGroupId;
    }

    /**
     * @param $readGroupId
     */
    public function setReadGroupId($readGroupId)
    {
        $this->readGroupId = $readGroupId;
    }

    /**
     * @return mixed
     */
    public function getReadGroupSetId()
    {
        return $this->readGroupSetId;
    }

    /**
     * @param $readGroupSetId
     */
    public function setReadGroupSetId($readGroupSetId)
    {
        $this->readGroupSetId = $readGroupSetId;
    }

    /**
     * @return mixed
     */
    public function getReadNumber()
    {
        return $this->readNumber;
    }

    /**
     * @param $readNumber
     */
    public function setReadNumber($readNumber)
    {
        $this->readNumber = $readNumber;
    }

    /**
     * @return mixed
     */
    public function getSecondaryAlignment()
    {
        return $this->secondaryAlignment;
    }

    /**
     * @param $secondaryAlignment
     */
    public function setSecondaryAlignment($secondaryAlignment)
    {
        $this->secondaryAlignment = $secondaryAlignment;
    }

    /**
     * @return mixed
     */
    public function getSupplementaryAlignment()
    {
        return $this->supplementaryAlignment;
    }

    /**
     * @param $supplementaryAlignment
     */
    public function setSupplementaryAlignment($supplementaryAlignment)
    {
        $this->supplementaryAlignment = $supplementaryAlignment;
    }
}

/**
 * Class Google_Service_Genomics_ReadGroup
 */
class Google_Service_Genomics_ReadGroup extends Google_Collection
{
    public $datasetId;
    public $description;
    public $id;
    public $info;
    public $name;
    public $predictedInsertSize;
    public $referenceSetId;
    public $sampleId;
    protected $collection_key = 'programs';
    protected $internal_gapi_mappings = [];
    protected $experimentType = 'Google_Service_Genomics_ReadGroupExperiment';
    protected $experimentDataType = '';
    protected $programsType = 'Google_Service_Genomics_ReadGroupProgram';
    protected $programsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
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
     * @param Google_Service_Genomics_ReadGroupExperiment $experiment
     */
    public function setExperiment(Google_Service_Genomics_ReadGroupExperiment $experiment)
    {
        $this->experiment = $experiment;
    }

    /**
     * @return mixed
     */
    public function getExperiment()
    {
        return $this->experiment;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
    public function getPredictedInsertSize()
    {
        return $this->predictedInsertSize;
    }

    /**
     * @param $predictedInsertSize
     */
    public function setPredictedInsertSize($predictedInsertSize)
    {
        $this->predictedInsertSize = $predictedInsertSize;
    }

    /**
     * @param $programs
     */
    public function setPrograms($programs)
    {
        $this->programs = $programs;
    }

    /**
     * @return mixed
     */
    public function getPrograms()
    {
        return $this->programs;
    }

    /**
     * @return mixed
     */
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }

    /**
     * @return mixed
     */
    public function getSampleId()
    {
        return $this->sampleId;
    }

    /**
     * @param $sampleId
     */
    public function setSampleId($sampleId)
    {
        $this->sampleId = $sampleId;
    }
}

/**
 * Class Google_Service_Genomics_ReadGroupExperiment
 */
class Google_Service_Genomics_ReadGroupExperiment extends Google_Model
{
    public $instrumentModel;
    public $libraryId;
    public $platformUnit;
    public $sequencingCenter;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInstrumentModel()
    {
        return $this->instrumentModel;
    }

    /**
     * @param $instrumentModel
     */
    public function setInstrumentModel($instrumentModel)
    {
        $this->instrumentModel = $instrumentModel;
    }

    /**
     * @return mixed
     */
    public function getLibraryId()
    {
        return $this->libraryId;
    }

    /**
     * @param $libraryId
     */
    public function setLibraryId($libraryId)
    {
        $this->libraryId = $libraryId;
    }

    /**
     * @return mixed
     */
    public function getPlatformUnit()
    {
        return $this->platformUnit;
    }

    /**
     * @param $platformUnit
     */
    public function setPlatformUnit($platformUnit)
    {
        $this->platformUnit = $platformUnit;
    }

    /**
     * @return mixed
     */
    public function getSequencingCenter()
    {
        return $this->sequencingCenter;
    }

    /**
     * @param $sequencingCenter
     */
    public function setSequencingCenter($sequencingCenter)
    {
        $this->sequencingCenter = $sequencingCenter;
    }
}

/**
 * Class Google_Service_Genomics_ReadGroupInfo
 */
class Google_Service_Genomics_ReadGroupInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_ReadGroupProgram
 */
class Google_Service_Genomics_ReadGroupProgram extends Google_Model
{
    public $commandLine;
    public $id;
    public $name;
    public $prevProgramId;
    public $version;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommandLine()
    {
        return $this->commandLine;
    }

    /**
     * @param $commandLine
     */
    public function setCommandLine($commandLine)
    {
        $this->commandLine = $commandLine;
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
    public function getPrevProgramId()
    {
        return $this->prevProgramId;
    }

    /**
     * @param $prevProgramId
     */
    public function setPrevProgramId($prevProgramId)
    {
        $this->prevProgramId = $prevProgramId;
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
 * Class Google_Service_Genomics_ReadGroupSet
 */
class Google_Service_Genomics_ReadGroupSet extends Google_Collection
{
    public $datasetId;
    public $filename;
    public $id;
    public $info;
    public $name;
    public $referenceSetId;
    protected $collection_key = 'readGroups';
    protected $internal_gapi_mappings = [];
    protected $readGroupsType = 'Google_Service_Genomics_ReadGroup';
    protected $readGroupsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
     * @param $readGroups
     */
    public function setReadGroups($readGroups)
    {
        $this->readGroups = $readGroups;
    }

    /**
     * @return mixed
     */
    public function getReadGroups()
    {
        return $this->readGroups;
    }

    /**
     * @return mixed
     */
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }
}

/**
 * Class Google_Service_Genomics_ReadGroupSetInfo
 */
class Google_Service_Genomics_ReadGroupSetInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_ReadInfo
 */
class Google_Service_Genomics_ReadInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_Reference
 */
class Google_Service_Genomics_Reference extends Google_Collection
{
    public $id;
    public $length;
    public $md5checksum;
    public $name;
    public $ncbiTaxonId;
    public $sourceAccessions;
    public $sourceURI;
    protected $collection_key = 'sourceAccessions';
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
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getMd5checksum()
    {
        return $this->md5checksum;
    }

    /**
     * @param $md5checksum
     */
    public function setMd5checksum($md5checksum)
    {
        $this->md5checksum = $md5checksum;
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
    public function getNcbiTaxonId()
    {
        return $this->ncbiTaxonId;
    }

    /**
     * @param $ncbiTaxonId
     */
    public function setNcbiTaxonId($ncbiTaxonId)
    {
        $this->ncbiTaxonId = $ncbiTaxonId;
    }

    /**
     * @return mixed
     */
    public function getSourceAccessions()
    {
        return $this->sourceAccessions;
    }

    /**
     * @param $sourceAccessions
     */
    public function setSourceAccessions($sourceAccessions)
    {
        $this->sourceAccessions = $sourceAccessions;
    }

    /**
     * @return mixed
     */
    public function getSourceURI()
    {
        return $this->sourceURI;
    }

    /**
     * @param $sourceURI
     */
    public function setSourceURI($sourceURI)
    {
        $this->sourceURI = $sourceURI;
    }
}

/**
 * Class Google_Service_Genomics_ReferenceBound
 */
class Google_Service_Genomics_ReferenceBound extends Google_Model
{
    public $referenceName;
    public $upperBound;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
    }

    /**
     * @return mixed
     */
    public function getUpperBound()
    {
        return $this->upperBound;
    }

    /**
     * @param $upperBound
     */
    public function setUpperBound($upperBound)
    {
        $this->upperBound = $upperBound;
    }
}

/**
 * Class Google_Service_Genomics_ReferenceSet
 */
class Google_Service_Genomics_ReferenceSet extends Google_Collection
{
    public $assemblyId;
    public $description;
    public $id;
    public $md5checksum;
    public $ncbiTaxonId;
    public $referenceIds;
    public $sourceAccessions;
    public $sourceURI;
    protected $collection_key = 'sourceAccessions';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAssemblyId()
    {
        return $this->assemblyId;
    }

    /**
     * @param $assemblyId
     */
    public function setAssemblyId($assemblyId)
    {
        $this->assemblyId = $assemblyId;
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
    public function getMd5checksum()
    {
        return $this->md5checksum;
    }

    /**
     * @param $md5checksum
     */
    public function setMd5checksum($md5checksum)
    {
        $this->md5checksum = $md5checksum;
    }

    /**
     * @return mixed
     */
    public function getNcbiTaxonId()
    {
        return $this->ncbiTaxonId;
    }

    /**
     * @param $ncbiTaxonId
     */
    public function setNcbiTaxonId($ncbiTaxonId)
    {
        $this->ncbiTaxonId = $ncbiTaxonId;
    }

    /**
     * @return mixed
     */
    public function getReferenceIds()
    {
        return $this->referenceIds;
    }

    /**
     * @param $referenceIds
     */
    public function setReferenceIds($referenceIds)
    {
        $this->referenceIds = $referenceIds;
    }

    /**
     * @return mixed
     */
    public function getSourceAccessions()
    {
        return $this->sourceAccessions;
    }

    /**
     * @param $sourceAccessions
     */
    public function setSourceAccessions($sourceAccessions)
    {
        $this->sourceAccessions = $sourceAccessions;
    }

    /**
     * @return mixed
     */
    public function getSourceURI()
    {
        return $this->sourceURI;
    }

    /**
     * @param $sourceURI
     */
    public function setSourceURI($sourceURI)
    {
        $this->sourceURI = $sourceURI;
    }
}

/**
 * Class Google_Service_Genomics_SearchAnnotationSetsRequest
 */
class Google_Service_Genomics_SearchAnnotationSetsRequest extends Google_Collection
{
    public $datasetIds;
    public $name;
    public $pageSize;
    public $pageToken;
    public $referenceSetId;
    public $types;
    protected $collection_key = 'types';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetIds()
    {
        return $this->datasetIds;
    }

    /**
     * @param $datasetIds
     */
    public function setDatasetIds($datasetIds)
    {
        $this->datasetIds = $datasetIds;
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
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @return mixed
     */
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }
}

/**
 * Class Google_Service_Genomics_SearchAnnotationSetsResponse
 */
class Google_Service_Genomics_SearchAnnotationSetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'annotationSets';
    protected $internal_gapi_mappings = [];
    protected $annotationSetsType = 'Google_Service_Genomics_AnnotationSet';
    protected $annotationSetsDataType = 'array';

    /**
     * @param $annotationSets
     */
    public function setAnnotationSets($annotationSets)
    {
        $this->annotationSets = $annotationSets;
    }

    /**
     * @return mixed
     */
    public function getAnnotationSets()
    {
        return $this->annotationSets;
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
 * Class Google_Service_Genomics_SearchAnnotationsRequest
 */
class Google_Service_Genomics_SearchAnnotationsRequest extends Google_Collection
{
    public $annotationSetIds;
    public $pageSize;
    public $pageToken;
    protected $collection_key = 'annotationSetIds';
    protected $internal_gapi_mappings = [];
    protected $rangeType = 'Google_Service_Genomics_QueryRange';
    protected $rangeDataType = '';

    /**
     * @return mixed
     */
    public function getAnnotationSetIds()
    {
        return $this->annotationSetIds;
    }

    /**
     * @param $annotationSetIds
     */
    public function setAnnotationSetIds($annotationSetIds)
    {
        $this->annotationSetIds = $annotationSetIds;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @param Google_Service_Genomics_QueryRange $range
     */
    public function setRange(Google_Service_Genomics_QueryRange $range)
    {
        $this->range = $range;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }
}

/**
 * Class Google_Service_Genomics_SearchAnnotationsResponse
 */
class Google_Service_Genomics_SearchAnnotationsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'annotations';
    protected $internal_gapi_mappings = [];
    protected $annotationsType = 'Google_Service_Genomics_Annotation';
    protected $annotationsDataType = 'array';

    /**
     * @param $annotations
     */
    public function setAnnotations($annotations)
    {
        $this->annotations = $annotations;
    }

    /**
     * @return mixed
     */
    public function getAnnotations()
    {
        return $this->annotations;
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
 * Class Google_Service_Genomics_SearchCallSetsRequest
 */
class Google_Service_Genomics_SearchCallSetsRequest extends Google_Collection
{
    public $name;
    public $pageSize;
    public $pageToken;
    public $variantSetIds;
    protected $collection_key = 'variantSetIds';
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
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @return mixed
     */
    public function getVariantSetIds()
    {
        return $this->variantSetIds;
    }

    /**
     * @param $variantSetIds
     */
    public function setVariantSetIds($variantSetIds)
    {
        $this->variantSetIds = $variantSetIds;
    }
}

/**
 * Class Google_Service_Genomics_SearchCallSetsResponse
 */
class Google_Service_Genomics_SearchCallSetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'callSets';
    protected $internal_gapi_mappings = [];
    protected $callSetsType = 'Google_Service_Genomics_CallSet';
    protected $callSetsDataType = 'array';

    /**
     * @param $callSets
     */
    public function setCallSets($callSets)
    {
        $this->callSets = $callSets;
    }

    /**
     * @return mixed
     */
    public function getCallSets()
    {
        return $this->callSets;
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
 * Class Google_Service_Genomics_SearchJobsRequest
 */
class Google_Service_Genomics_SearchJobsRequest extends Google_Collection
{
    public $createdAfter;
    public $createdBefore;
    public $pageSize;
    public $pageToken;
    public $projectNumber;
    public $status;
    protected $collection_key = 'status';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreatedAfter()
    {
        return $this->createdAfter;
    }

    /**
     * @param $createdAfter
     */
    public function setCreatedAfter($createdAfter)
    {
        $this->createdAfter = $createdAfter;
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
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
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
 * Class Google_Service_Genomics_SearchJobsResponse
 */
class Google_Service_Genomics_SearchJobsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'jobs';
    protected $internal_gapi_mappings = [];
    protected $jobsType = 'Google_Service_Genomics_Job';
    protected $jobsDataType = 'array';

    /**
     * @param $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return mixed
     */
    public function getJobs()
    {
        return $this->jobs;
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
 * Class Google_Service_Genomics_SearchReadGroupSetsRequest
 */
class Google_Service_Genomics_SearchReadGroupSetsRequest extends Google_Collection
{
    public $datasetIds;
    public $name;
    public $pageSize;
    public $pageToken;
    protected $collection_key = 'datasetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetIds()
    {
        return $this->datasetIds;
    }

    /**
     * @param $datasetIds
     */
    public function setDatasetIds($datasetIds)
    {
        $this->datasetIds = $datasetIds;
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
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }
}

/**
 * Class Google_Service_Genomics_SearchReadGroupSetsResponse
 */
class Google_Service_Genomics_SearchReadGroupSetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'readGroupSets';
    protected $internal_gapi_mappings = [];
    protected $readGroupSetsType = 'Google_Service_Genomics_ReadGroupSet';
    protected $readGroupSetsDataType = 'array';

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
     * @param $readGroupSets
     */
    public function setReadGroupSets($readGroupSets)
    {
        $this->readGroupSets = $readGroupSets;
    }

    /**
     * @return mixed
     */
    public function getReadGroupSets()
    {
        return $this->readGroupSets;
    }
}

/**
 * Class Google_Service_Genomics_SearchReadsRequest
 */
class Google_Service_Genomics_SearchReadsRequest extends Google_Collection
{
    public $end;
    public $pageSize;
    public $pageToken;
    public $readGroupIds;
    public $readGroupSetIds;
    public $referenceName;
    public $start;
    protected $collection_key = 'readGroupSetIds';
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
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @return mixed
     */
    public function getReadGroupIds()
    {
        return $this->readGroupIds;
    }

    /**
     * @param $readGroupIds
     */
    public function setReadGroupIds($readGroupIds)
    {
        $this->readGroupIds = $readGroupIds;
    }

    /**
     * @return mixed
     */
    public function getReadGroupSetIds()
    {
        return $this->readGroupSetIds;
    }

    /**
     * @param $readGroupSetIds
     */
    public function setReadGroupSetIds($readGroupSetIds)
    {
        $this->readGroupSetIds = $readGroupSetIds;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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
 * Class Google_Service_Genomics_SearchReadsResponse
 */
class Google_Service_Genomics_SearchReadsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'alignments';
    protected $internal_gapi_mappings = [];
    protected $alignmentsType = 'Google_Service_Genomics_Read';
    protected $alignmentsDataType = 'array';

    /**
     * @param $alignments
     */
    public function setAlignments($alignments)
    {
        $this->alignments = $alignments;
    }

    /**
     * @return mixed
     */
    public function getAlignments()
    {
        return $this->alignments;
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
 * Class Google_Service_Genomics_SearchReferenceSetsRequest
 */
class Google_Service_Genomics_SearchReferenceSetsRequest extends Google_Collection
{
    public $accessions;
    public $assemblyId;
    public $md5checksums;
    public $pageSize;
    public $pageToken;
    protected $collection_key = 'md5checksums';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccessions()
    {
        return $this->accessions;
    }

    /**
     * @param $accessions
     */
    public function setAccessions($accessions)
    {
        $this->accessions = $accessions;
    }

    /**
     * @return mixed
     */
    public function getAssemblyId()
    {
        return $this->assemblyId;
    }

    /**
     * @param $assemblyId
     */
    public function setAssemblyId($assemblyId)
    {
        $this->assemblyId = $assemblyId;
    }

    /**
     * @return mixed
     */
    public function getMd5checksums()
    {
        return $this->md5checksums;
    }

    /**
     * @param $md5checksums
     */
    public function setMd5checksums($md5checksums)
    {
        $this->md5checksums = $md5checksums;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }
}

/**
 * Class Google_Service_Genomics_SearchReferenceSetsResponse
 */
class Google_Service_Genomics_SearchReferenceSetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'referenceSets';
    protected $internal_gapi_mappings = [];
    protected $referenceSetsType = 'Google_Service_Genomics_ReferenceSet';
    protected $referenceSetsDataType = 'array';

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
     * @param $referenceSets
     */
    public function setReferenceSets($referenceSets)
    {
        $this->referenceSets = $referenceSets;
    }

    /**
     * @return mixed
     */
    public function getReferenceSets()
    {
        return $this->referenceSets;
    }
}

/**
 * Class Google_Service_Genomics_SearchReferencesRequest
 */
class Google_Service_Genomics_SearchReferencesRequest extends Google_Collection
{
    public $accessions;
    public $md5checksums;
    public $pageSize;
    public $pageToken;
    public $referenceSetId;
    protected $collection_key = 'md5checksums';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccessions()
    {
        return $this->accessions;
    }

    /**
     * @param $accessions
     */
    public function setAccessions($accessions)
    {
        $this->accessions = $accessions;
    }

    /**
     * @return mixed
     */
    public function getMd5checksums()
    {
        return $this->md5checksums;
    }

    /**
     * @param $md5checksums
     */
    public function setMd5checksums($md5checksums)
    {
        $this->md5checksums = $md5checksums;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @return mixed
     */
    public function getReferenceSetId()
    {
        return $this->referenceSetId;
    }

    /**
     * @param $referenceSetId
     */
    public function setReferenceSetId($referenceSetId)
    {
        $this->referenceSetId = $referenceSetId;
    }
}

/**
 * Class Google_Service_Genomics_SearchReferencesResponse
 */
class Google_Service_Genomics_SearchReferencesResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'references';
    protected $internal_gapi_mappings = [];
    protected $referencesType = 'Google_Service_Genomics_Reference';
    protected $referencesDataType = 'array';

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
     * @param $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
    }

    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }
}

/**
 * Class Google_Service_Genomics_SearchVariantSetsRequest
 */
class Google_Service_Genomics_SearchVariantSetsRequest extends Google_Collection
{
    public $datasetIds;
    public $pageSize;
    public $pageToken;
    protected $collection_key = 'datasetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetIds()
    {
        return $this->datasetIds;
    }

    /**
     * @param $datasetIds
     */
    public function setDatasetIds($datasetIds)
    {
        $this->datasetIds = $datasetIds;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }
}

/**
 * Class Google_Service_Genomics_SearchVariantSetsResponse
 */
class Google_Service_Genomics_SearchVariantSetsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'variantSets';
    protected $internal_gapi_mappings = [];
    protected $variantSetsType = 'Google_Service_Genomics_VariantSet';
    protected $variantSetsDataType = 'array';

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
     * @param $variantSets
     */
    public function setVariantSets($variantSets)
    {
        $this->variantSets = $variantSets;
    }

    /**
     * @return mixed
     */
    public function getVariantSets()
    {
        return $this->variantSets;
    }
}

/**
 * Class Google_Service_Genomics_SearchVariantsRequest
 */
class Google_Service_Genomics_SearchVariantsRequest extends Google_Collection
{
    public $callSetIds;
    public $end;
    public $maxCalls;
    public $pageSize;
    public $pageToken;
    public $referenceName;
    public $start;
    public $variantName;
    public $variantSetIds;
    protected $collection_key = 'variantSetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCallSetIds()
    {
        return $this->callSetIds;
    }

    /**
     * @param $callSetIds
     */
    public function setCallSetIds($callSetIds)
    {
        $this->callSetIds = $callSetIds;
    }

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
    public function getMaxCalls()
    {
        return $this->maxCalls;
    }

    /**
     * @param $maxCalls
     */
    public function setMaxCalls($maxCalls)
    {
        $this->maxCalls = $maxCalls;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageToken()
    {
        return $this->pageToken;
    }

    /**
     * @param $pageToken
     */
    public function setPageToken($pageToken)
    {
        $this->pageToken = $pageToken;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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

    /**
     * @return mixed
     */
    public function getVariantName()
    {
        return $this->variantName;
    }

    /**
     * @param $variantName
     */
    public function setVariantName($variantName)
    {
        $this->variantName = $variantName;
    }

    /**
     * @return mixed
     */
    public function getVariantSetIds()
    {
        return $this->variantSetIds;
    }

    /**
     * @param $variantSetIds
     */
    public function setVariantSetIds($variantSetIds)
    {
        $this->variantSetIds = $variantSetIds;
    }
}

/**
 * Class Google_Service_Genomics_SearchVariantsResponse
 */
class Google_Service_Genomics_SearchVariantsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'variants';
    protected $internal_gapi_mappings = [];
    protected $variantsType = 'Google_Service_Genomics_Variant';
    protected $variantsDataType = 'array';

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
     * @param $variants
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
    }

    /**
     * @return mixed
     */
    public function getVariants()
    {
        return $this->variants;
    }
}

/**
 * Class Google_Service_Genomics_StreamReadsRequest
 */
class Google_Service_Genomics_StreamReadsRequest extends Google_Collection
{
    public $end;
    public $readGroupSetIds;
    public $referenceName;
    public $start;
    protected $collection_key = 'readGroupSetIds';
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
    public function getReadGroupSetIds()
    {
        return $this->readGroupSetIds;
    }

    /**
     * @param $readGroupSetIds
     */
    public function setReadGroupSetIds($readGroupSetIds)
    {
        $this->readGroupSetIds = $readGroupSetIds;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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
 * Class Google_Service_Genomics_StreamReadsResponse
 */
class Google_Service_Genomics_StreamReadsResponse extends Google_Collection
{
    protected $collection_key = 'alignments';
    protected $internal_gapi_mappings = [];
    protected $alignmentsType = 'Google_Service_Genomics_Read';
    protected $alignmentsDataType = 'array';


    /**
     * @param $alignments
     */
    public function setAlignments($alignments)
    {
        $this->alignments = $alignments;
    }

    /**
     * @return mixed
     */
    public function getAlignments()
    {
        return $this->alignments;
    }
}

/**
 * Class Google_Service_Genomics_Transcript
 */
class Google_Service_Genomics_Transcript extends Google_Collection
{
    public $geneId;
    protected $collection_key = 'exons';
    protected $internal_gapi_mappings = [];
    protected $codingSequenceType = 'Google_Service_Genomics_TranscriptCodingSequence';
    protected $codingSequenceDataType = '';
    protected $exonsType = 'Google_Service_Genomics_TranscriptExon';
    protected $exonsDataType = 'array';

    /**
     * @param Google_Service_Genomics_TranscriptCodingSequence $codingSequence
     */
    public function setCodingSequence(Google_Service_Genomics_TranscriptCodingSequence $codingSequence)
    {
        $this->codingSequence = $codingSequence;
    }

    /**
     * @return mixed
     */
    public function getCodingSequence()
    {
        return $this->codingSequence;
    }

    /**
     * @param $exons
     */
    public function setExons($exons)
    {
        $this->exons = $exons;
    }

    /**
     * @return mixed
     */
    public function getExons()
    {
        return $this->exons;
    }

    /**
     * @return mixed
     */
    public function getGeneId()
    {
        return $this->geneId;
    }

    /**
     * @param $geneId
     */
    public function setGeneId($geneId)
    {
        $this->geneId = $geneId;
    }
}

/**
 * Class Google_Service_Genomics_TranscriptCodingSequence
 */
class Google_Service_Genomics_TranscriptCodingSequence extends Google_Model
{
    public $end;
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
 * Class Google_Service_Genomics_TranscriptExon
 */
class Google_Service_Genomics_TranscriptExon extends Google_Model
{
    public $end;
    public $start;
    protected $internal_gapi_mappings = [];
    protected $frameType = 'Google_Service_Genomics_Int32Value';
    protected $frameDataType = '';

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
     * @param Google_Service_Genomics_Int32Value $frame
     */
    public function setFrame(Google_Service_Genomics_Int32Value $frame)
    {
        $this->frame = $frame;
    }

    /**
     * @return mixed
     */
    public function getFrame()
    {
        return $this->frame;
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
 * Class Google_Service_Genomics_Variant
 */
class Google_Service_Genomics_Variant extends Google_Collection
{
    public $alternateBases;
    public $created;
    public $end;
    public $filter;
    public $id;
    public $info;
    public $names;
    public $quality;
    public $referenceBases;
    public $referenceName;
    public $start;
    public $variantSetId;
    protected $collection_key = 'names';
    protected $internal_gapi_mappings = [];
    protected $callsType = 'Google_Service_Genomics_GenomicsCall';
    protected $callsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAlternateBases()
    {
        return $this->alternateBases;
    }

    /**
     * @param $alternateBases
     */
    public function setAlternateBases($alternateBases)
    {
        $this->alternateBases = $alternateBases;
    }

    /**
     * @param $calls
     */
    public function setCalls($calls)
    {
        $this->calls = $calls;
    }

    /**
     * @return mixed
     */
    public function getCalls()
    {
        return $this->calls;
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
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
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
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    /**
     * @return mixed
     */
    public function getReferenceBases()
    {
        return $this->referenceBases;
    }

    /**
     * @param $referenceBases
     */
    public function setReferenceBases($referenceBases)
    {
        $this->referenceBases = $referenceBases;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @param $referenceName
     */
    public function setReferenceName($referenceName)
    {
        $this->referenceName = $referenceName;
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

    /**
     * @return mixed
     */
    public function getVariantSetId()
    {
        return $this->variantSetId;
    }

    /**
     * @param $variantSetId
     */
    public function setVariantSetId($variantSetId)
    {
        $this->variantSetId = $variantSetId;
    }
}

/**
 * Class Google_Service_Genomics_VariantAnnotation
 */
class Google_Service_Genomics_VariantAnnotation extends Google_Collection
{
    public $alternateBases;
    public $clinicalSignificance;
    public $effect;
    public $geneId;
    public $transcriptIds;
    public $type;
    protected $collection_key = 'transcriptIds';
    protected $internal_gapi_mappings = [];
    protected $conditionsType = 'Google_Service_Genomics_VariantAnnotationCondition';
    protected $conditionsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAlternateBases()
    {
        return $this->alternateBases;
    }

    /**
     * @param $alternateBases
     */
    public function setAlternateBases($alternateBases)
    {
        $this->alternateBases = $alternateBases;
    }

    /**
     * @return mixed
     */
    public function getClinicalSignificance()
    {
        return $this->clinicalSignificance;
    }

    /**
     * @param $clinicalSignificance
     */
    public function setClinicalSignificance($clinicalSignificance)
    {
        $this->clinicalSignificance = $clinicalSignificance;
    }

    /**
     * @param $conditions
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;
    }

    /**
     * @return mixed
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * @return mixed
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param $effect
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
    }

    /**
     * @return mixed
     */
    public function getGeneId()
    {
        return $this->geneId;
    }

    /**
     * @param $geneId
     */
    public function setGeneId($geneId)
    {
        $this->geneId = $geneId;
    }

    /**
     * @return mixed
     */
    public function getTranscriptIds()
    {
        return $this->transcriptIds;
    }

    /**
     * @param $transcriptIds
     */
    public function setTranscriptIds($transcriptIds)
    {
        $this->transcriptIds = $transcriptIds;
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
 * Class Google_Service_Genomics_VariantAnnotationCondition
 */
class Google_Service_Genomics_VariantAnnotationCondition extends Google_Collection
{
    public $conceptId;
    public $names;
    public $omimId;
    protected $collection_key = 'names';
    protected $internal_gapi_mappings = [];
    protected $externalIdsType = 'Google_Service_Genomics_ExternalId';
    protected $externalIdsDataType = 'array';

    /**
     * @return mixed
     */
    public function getConceptId()
    {
        return $this->conceptId;
    }

    /**
     * @param $conceptId
     */
    public function setConceptId($conceptId)
    {
        $this->conceptId = $conceptId;
    }

    /**
     * @param $externalIds
     */
    public function setExternalIds($externalIds)
    {
        $this->externalIds = $externalIds;
    }

    /**
     * @return mixed
     */
    public function getExternalIds()
    {
        return $this->externalIds;
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    /**
     * @return mixed
     */
    public function getOmimId()
    {
        return $this->omimId;
    }

    /**
     * @param $omimId
     */
    public function setOmimId($omimId)
    {
        $this->omimId = $omimId;
    }
}

/**
 * Class Google_Service_Genomics_VariantInfo
 */
class Google_Service_Genomics_VariantInfo extends Google_Model
{
}

/**
 * Class Google_Service_Genomics_VariantSet
 */
class Google_Service_Genomics_VariantSet extends Google_Collection
{
    public $datasetId;
    public $id;
    protected $collection_key = 'referenceBounds';
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Genomics_Metadata';
    protected $metadataDataType = 'array';
    protected $referenceBoundsType = 'Google_Service_Genomics_ReferenceBound';
    protected $referenceBoundsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
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
     * @param $metadata
     */
    public function setMetadata($metadata)
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
     * @param $referenceBounds
     */
    public function setReferenceBounds($referenceBounds)
    {
        $this->referenceBounds = $referenceBounds;
    }

    /**
     * @return mixed
     */
    public function getReferenceBounds()
    {
        return $this->referenceBounds;
    }
}
