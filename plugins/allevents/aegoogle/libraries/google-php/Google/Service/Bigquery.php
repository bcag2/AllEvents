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
 * Service definition for Bigquery (v2).
 *
 * <p>
 * A data platform for customers to create, manage, share and query data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/bigquery/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Bigquery extends Google_Service
{
    /** View and manage your data in Google BigQuery. */
    const BIGQUERY =
        "https://www.googleapis.com/auth/bigquery";
    /** Insert data into Google BigQuery. */
    const BIGQUERY_INSERTDATA =
        "https://www.googleapis.com/auth/bigquery.insertdata";
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

    public $datasets;
    public $jobs;
    public $projects;
    public $tabledata;
    public $tables;


    /**
     * Constructs the internal representation of the Bigquery service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'bigquery/v2/';
        $this->version = 'v2';
        $this->serviceName = 'bigquery';

        $this->datasets = new Google_Service_Bigquery_Datasets_Resource(
            $this,
            $this->serviceName,
            'datasets',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deleteContents' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{projectId}/datasets',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{projectId}/datasets',
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
                            'all' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->jobs = new Google_Service_Bigquery_Jobs_Resource(
            $this,
            $this->serviceName,
            'jobs',
            [
                'methods' => [
                    'get' => [
                        'path' => 'projects/{projectId}/jobs/{jobId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getQueryResults' => [
                        'path' => 'projects/{projectId}/queries/{jobId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timeoutMs' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{projectId}/jobs',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{projectId}/jobs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'stateFilter' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'allUsers' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'query' => [
                        'path' => 'projects/{projectId}/queries',
                        'httpMethod' => 'POST',
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
        $this->projects = new Google_Service_Bigquery_Projects_Resource(
            $this,
            $this->serviceName,
            'projects',
            [
                'methods' => [
                    'list' => [
                        'path' => 'projects',
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
                        ],
                    ],
                ]
            ]
        );
        $this->tabledata = new Google_Service_Bigquery_Tabledata_Resource(
            $this,
            $this->serviceName,
            'tabledata',
            [
                'methods' => [
                    'insertAll' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}/insertAll',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}/data',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
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
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tables = new Google_Service_Bigquery_Tables_Resource(
            $this,
            $this->serviceName,
            'tables',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
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
                    ], 'patch' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'projects/{projectId}/datasets/{datasetId}/tables/{tableId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tableId' => [
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
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $datasets = $bigqueryService->datasets;
 *  </code>
 */
class Google_Service_Bigquery_Datasets_Resource extends Google_Service_Resource
{

    /**
     * Deletes the dataset specified by the datasetId value. Before you can delete a
     * dataset, you must delete all its tables, either manually or by specifying
     * deleteContents. Immediately after deletion, you can create another dataset
     * with the same name. (datasets.delete)
     *
     * @param string $projectId Project ID of the dataset being deleted
     * @param string $datasetId Dataset ID of dataset being deleted
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool deleteContents If True, delete all the tables in the dataset.
     * If False and the dataset contains tables, the request will fail. Default is
     * False
     * @return expected_class|Google_Http_Request
     */
    public function delete($projectId, $datasetId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the dataset specified by datasetID. (datasets.get)
     *
     * @param string $projectId Project ID of the requested dataset
     * @param string $datasetId Dataset ID of the requested dataset
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $datasetId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Bigquery_Dataset");
    }

    /**
     * Creates a new empty dataset. (datasets.insert)
     *
     * @param string $projectId Project ID of the new dataset
     * @param Google_Dataset|Google_Service_Bigquery_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($projectId, Google_Service_Bigquery_Dataset $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Bigquery_Dataset");
    }

    /**
     * Lists all datasets in the specified project to which you have been granted
     * the READER dataset role. (datasets.listDatasets)
     *
     * @param string $projectId Project ID of the datasets to be listed
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Page token, returned by a previous call, to
     * request the next page of results
     * @opt_param bool all Whether to list all datasets, including hidden ones
     * @opt_param string maxResults The maximum number of results to return
     */
    public function listDatasets($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Bigquery_DatasetList");
    }

    /**
     * Updates information in an existing dataset. The update method replaces the
     * entire dataset resource, whereas the patch method only replaces fields that
     * are provided in the submitted dataset resource. This method supports patch
     * semantics. (datasets.patch)
     *
     * @param string $projectId Project ID of the dataset being updated
     * @param string $datasetId Dataset ID of the dataset being updated
     * @param Google_Dataset|Google_Service_Bigquery_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($projectId, $datasetId, Google_Service_Bigquery_Dataset $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Bigquery_Dataset");
    }

    /**
     * Updates information in an existing dataset. The update method replaces the
     * entire dataset resource, whereas the patch method only replaces fields that
     * are provided in the submitted dataset resource. (datasets.update)
     *
     * @param string $projectId Project ID of the dataset being updated
     * @param string $datasetId Dataset ID of the dataset being updated
     * @param Google_Dataset|Google_Service_Bigquery_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($projectId, $datasetId, Google_Service_Bigquery_Dataset $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Bigquery_Dataset");
    }
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $jobs = $bigqueryService->jobs;
 *  </code>
 */
class Google_Service_Bigquery_Jobs_Resource extends Google_Service_Resource
{

    /**
     * Returns information about a specific job. Job information is available for a
     * six month period after creation. Requires that you're the person who ran the
     * job, or have the Is Owner project role. (jobs.get)
     *
     * @param string $projectId Project ID of the requested job
     * @param string $jobId Job ID of the requested job
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $jobId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Bigquery_Job");
    }

    /**
     * Retrieves the results of a query job. (jobs.getQueryResults)
     *
     * @param string $projectId Project ID of the query job
     * @param string $jobId Job ID of the query job
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string timeoutMs How long to wait for the query to complete, in
     * milliseconds, before returning. Default is to return immediately. If the
     * timeout passes before the job completes, the request will fail with a TIMEOUT
     * error
     * @opt_param string maxResults Maximum number of results to read
     * @opt_param string pageToken Page token, returned by a previous call, to
     * request the next page of results
     * @opt_param string startIndex Zero-based index of the starting row
     */
    public function getQueryResults($projectId, $jobId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('getQueryResults', [$params], "Google_Service_Bigquery_GetQueryResultsResponse");
    }

    /**
     * Starts a new asynchronous job. Requires the Can View project role.
     * (jobs.insert)
     *
     * @param string $projectId Project ID of the project that will be billed for
     *                                                          the job
     * @param Google_Job|Google_Service_Bigquery_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($projectId, Google_Service_Bigquery_Job $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Bigquery_Job");
    }

    /**
     * Lists all jobs that you started in the specified project. The job list
     * returns in reverse chronological order of when the jobs were created,
     * starting with the most recent job created. Requires the Can View project
     * role, or the Is Owner project role if you set the allUsers property.
     * (jobs.listJobs)
     *
     * @param string $projectId Project ID of the jobs to list
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields
     * @opt_param string stateFilter Filter for job state
     * @opt_param bool allUsers Whether to display jobs owned by all users in the
     * project. Default false
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string pageToken Page token, returned by a previous call, to
     * request the next page of results
     */
    public function listJobs($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Bigquery_JobList");
    }

    /**
     * Runs a BigQuery SQL query synchronously and returns query results if the
     * query completes within a specified timeout. (jobs.query)
     *
     * @param string $projectId Project ID of the project billed for the query
     * @param Google_QueryRequest|Google_Service_Bigquery_QueryRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function query($projectId, Google_Service_Bigquery_QueryRequest $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_Bigquery_QueryResponse");
    }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $projects = $bigqueryService->projects;
 *  </code>
 */
class Google_Service_Bigquery_Projects_Resource extends Google_Service_Resource
{

    /**
     * Lists all projects to which you have been granted any project role.
     * (projects.listProjects)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Page token, returned by a previous call, to
     * request the next page of results
     * @opt_param string maxResults Maximum number of results to return
     */
    public function listProjects($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Bigquery_ProjectList");
    }
}

/**
 * The "tabledata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $tabledata = $bigqueryService->tabledata;
 *  </code>
 */
class Google_Service_Bigquery_Tabledata_Resource extends Google_Service_Resource
{

    /**
     * Streams data into BigQuery one record at a time without needing to run a load
     * job. Requires the WRITER dataset role. (tabledata.insertAll)
     *
     * @param string $projectId Project ID of the destination table.
     * @param string $datasetId Dataset ID of the destination table.
     * @param string $tableId Table ID of the destination table.
     * @param Google_Service_Bigquery_TableDataInsertAllRequest|Google_TableDataInsertAllRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insertAll($projectId, $datasetId, $tableId, Google_Service_Bigquery_TableDataInsertAllRequest $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insertAll', [$params], "Google_Service_Bigquery_TableDataInsertAllResponse");
    }

    /**
     * Retrieves table data from a specified set of rows. Requires the READER
     * dataset role. (tabledata.listTabledata)
     *
     * @param string $projectId Project ID of the table to read
     * @param string $datasetId Dataset ID of the table to read
     * @param string $tableId Table ID of the table to read
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string pageToken Page token, returned by a previous call,
     * identifying the result set
     * @opt_param string startIndex Zero-based index of the starting row to read
     */
    public function listTabledata($projectId, $datasetId, $tableId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Bigquery_TableDataList");
    }
}

/**
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $tables = $bigqueryService->tables;
 *  </code>
 */
class Google_Service_Bigquery_Tables_Resource extends Google_Service_Resource
{

    /**
     * Deletes the table specified by tableId from the dataset. If the table
     * contains data, all the data will be deleted. (tables.delete)
     *
     * @param string $projectId Project ID of the table to delete
     * @param string $datasetId Dataset ID of the table to delete
     * @param string $tableId Table ID of the table to delete
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($projectId, $datasetId, $tableId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets the specified table resource by table ID. This method does not return
     * the data in the table, it only returns the table resource, which describes
     * the structure of this table. (tables.get)
     *
     * @param string $projectId Project ID of the requested table
     * @param string $datasetId Dataset ID of the requested table
     * @param string $tableId Table ID of the requested table
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($projectId, $datasetId, $tableId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Bigquery_Table");
    }

    /**
     * Creates a new, empty table in the dataset. (tables.insert)
     *
     * @param string $projectId Project ID of the new table
     * @param string $datasetId Dataset ID of the new table
     * @param Google_Service_Bigquery_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($projectId, $datasetId, Google_Service_Bigquery_Table $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Bigquery_Table");
    }

    /**
     * Lists all tables in the specified dataset. Requires the READER dataset role.
     * (tables.listTables)
     *
     * @param string $projectId Project ID of the tables to list
     * @param string $datasetId Dataset ID of the tables to list
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Page token, returned by a previous call, to
     * request the next page of results
     * @opt_param string maxResults Maximum number of results to return
     */
    public function listTables($projectId, $datasetId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Bigquery_TableList");
    }

    /**
     * Updates information in an existing table. The update method replaces the
     * entire table resource, whereas the patch method only replaces fields that are
     * provided in the submitted table resource. This method supports patch
     * semantics. (tables.patch)
     *
     * @param string $projectId Project ID of the table to update
     * @param string $datasetId Dataset ID of the table to update
     * @param string $tableId Table ID of the table to update
     * @param Google_Service_Bigquery_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($projectId, $datasetId, $tableId, Google_Service_Bigquery_Table $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Bigquery_Table");
    }

    /**
     * Updates information in an existing table. The update method replaces the
     * entire table resource, whereas the patch method only replaces fields that are
     * provided in the submitted table resource. (tables.update)
     *
     * @param string $projectId Project ID of the table to update
     * @param string $datasetId Dataset ID of the table to update
     * @param string $tableId Table ID of the table to update
     * @param Google_Service_Bigquery_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($projectId, $datasetId, $tableId, Google_Service_Bigquery_Table $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Bigquery_Table");
    }
}


/**
 * Class Google_Service_Bigquery_CsvOptions
 */
class Google_Service_Bigquery_CsvOptions extends Google_Model
{
    public $allowJaggedRows;
    public $allowQuotedNewlines;
    public $encoding;
    public $fieldDelimiter;
    public $quote;
    public $skipLeadingRows;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowJaggedRows()
    {
        return $this->allowJaggedRows;
    }

    /**
     * @param $allowJaggedRows
     */
    public function setAllowJaggedRows($allowJaggedRows)
    {
        $this->allowJaggedRows = $allowJaggedRows;
    }

    /**
     * @return mixed
     */
    public function getAllowQuotedNewlines()
    {
        return $this->allowQuotedNewlines;
    }

    /**
     * @param $allowQuotedNewlines
     */
    public function setAllowQuotedNewlines($allowQuotedNewlines)
    {
        $this->allowQuotedNewlines = $allowQuotedNewlines;
    }

    /**
     * @return mixed
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * @return mixed
     */
    public function getFieldDelimiter()
    {
        return $this->fieldDelimiter;
    }

    /**
     * @param $fieldDelimiter
     */
    public function setFieldDelimiter($fieldDelimiter)
    {
        $this->fieldDelimiter = $fieldDelimiter;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return mixed
     */
    public function getSkipLeadingRows()
    {
        return $this->skipLeadingRows;
    }

    /**
     * @param $skipLeadingRows
     */
    public function setSkipLeadingRows($skipLeadingRows)
    {
        $this->skipLeadingRows = $skipLeadingRows;
    }
}

/**
 * Class Google_Service_Bigquery_Dataset
 */
class Google_Service_Bigquery_Dataset extends Google_Collection
{
    public $creationTime;
    public $defaultTableExpirationMs;
    public $description;
    public $etag;
    public $friendlyName;
    public $id;
    public $kind;
    public $lastModifiedTime;
    public $selfLink;
    protected $collection_key = 'access';
    protected $internal_gapi_mappings = [];
    protected $accessType = 'Google_Service_Bigquery_DatasetAccess';
    protected $accessDataType = 'array';
    protected $datasetReferenceType = 'Google_Service_Bigquery_DatasetReference';
    protected $datasetReferenceDataType = '';

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
    public function getAccess()
    {
        return $this->access;
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
     * @param Google_Service_Bigquery_DatasetReference $datasetReference
     */
    public function setDatasetReference(Google_Service_Bigquery_DatasetReference $datasetReference)
    {
        $this->datasetReference = $datasetReference;
    }

    /**
     * @return mixed
     */
    public function getDatasetReference()
    {
        return $this->datasetReference;
    }

    /**
     * @return mixed
     */
    public function getDefaultTableExpirationMs()
    {
        return $this->defaultTableExpirationMs;
    }

    /**
     * @param $defaultTableExpirationMs
     */
    public function setDefaultTableExpirationMs($defaultTableExpirationMs)
    {
        $this->defaultTableExpirationMs = $defaultTableExpirationMs;
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
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
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
 * Class Google_Service_Bigquery_DatasetAccess
 */
class Google_Service_Bigquery_DatasetAccess extends Google_Model
{
    public $domain;
    public $groupByEmail;
    public $role;
    public $specialGroup;
    public $userByEmail;
    protected $internal_gapi_mappings = [];
    protected $viewType = 'Google_Service_Bigquery_TableReference';
    protected $viewDataType = '';

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
    public function getGroupByEmail()
    {
        return $this->groupByEmail;
    }

    /**
     * @param $groupByEmail
     */
    public function setGroupByEmail($groupByEmail)
    {
        $this->groupByEmail = $groupByEmail;
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
    public function getSpecialGroup()
    {
        return $this->specialGroup;
    }

    /**
     * @param $specialGroup
     */
    public function setSpecialGroup($specialGroup)
    {
        $this->specialGroup = $specialGroup;
    }

    /**
     * @return mixed
     */
    public function getUserByEmail()
    {
        return $this->userByEmail;
    }

    /**
     * @param $userByEmail
     */
    public function setUserByEmail($userByEmail)
    {
        $this->userByEmail = $userByEmail;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $view
     */
    public function setView(Google_Service_Bigquery_TableReference $view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }
}

/**
 * Class Google_Service_Bigquery_DatasetList
 */
class Google_Service_Bigquery_DatasetList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'datasets';
    protected $internal_gapi_mappings = [];
    protected $datasetsType = 'Google_Service_Bigquery_DatasetListDatasets';
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
 * Class Google_Service_Bigquery_DatasetListDatasets
 */
class Google_Service_Bigquery_DatasetListDatasets extends Google_Model
{
    public $friendlyName;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $datasetReferenceType = 'Google_Service_Bigquery_DatasetReference';
    protected $datasetReferenceDataType = '';

    /**
     * @param Google_Service_Bigquery_DatasetReference $datasetReference
     */
    public function setDatasetReference(Google_Service_Bigquery_DatasetReference $datasetReference)
    {
        $this->datasetReference = $datasetReference;
    }

    /**
     * @return mixed
     */
    public function getDatasetReference()
    {
        return $this->datasetReference;
    }

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
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
}

/**
 * Class Google_Service_Bigquery_DatasetReference
 */
class Google_Service_Bigquery_DatasetReference extends Google_Model
{
    public $datasetId;
    public $projectId;
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
 * Class Google_Service_Bigquery_ErrorProto
 */
class Google_Service_Bigquery_ErrorProto extends Google_Model
{
    public $debugInfo;
    public $location;
    public $message;
    public $reason;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDebugInfo()
    {
        return $this->debugInfo;
    }

    /**
     * @param $debugInfo
     */
    public function setDebugInfo($debugInfo)
    {
        $this->debugInfo = $debugInfo;
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

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}

/**
 * Class Google_Service_Bigquery_ExternalDataConfiguration
 */
class Google_Service_Bigquery_ExternalDataConfiguration extends Google_Collection
{
    public $compression;
    public $ignoreUnknownValues;
    public $maxBadRecords;
    public $sourceFormat;
    public $sourceUris;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];
    protected $csvOptionsType = 'Google_Service_Bigquery_CsvOptions';
    protected $csvOptionsDataType = '';
    protected $schemaType = 'Google_Service_Bigquery_TableSchema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getCompression()
    {
        return $this->compression;
    }

    /**
     * @param $compression
     */
    public function setCompression($compression)
    {
        $this->compression = $compression;
    }

    /**
     * @param Google_Service_Bigquery_CsvOptions $csvOptions
     */
    public function setCsvOptions(Google_Service_Bigquery_CsvOptions $csvOptions)
    {
        $this->csvOptions = $csvOptions;
    }

    /**
     * @return mixed
     */
    public function getCsvOptions()
    {
        return $this->csvOptions;
    }

    /**
     * @return mixed
     */
    public function getIgnoreUnknownValues()
    {
        return $this->ignoreUnknownValues;
    }

    /**
     * @param $ignoreUnknownValues
     */
    public function setIgnoreUnknownValues($ignoreUnknownValues)
    {
        $this->ignoreUnknownValues = $ignoreUnknownValues;
    }

    /**
     * @return mixed
     */
    public function getMaxBadRecords()
    {
        return $this->maxBadRecords;
    }

    /**
     * @param $maxBadRecords
     */
    public function setMaxBadRecords($maxBadRecords)
    {
        $this->maxBadRecords = $maxBadRecords;
    }

    /**
     * @param Google_Service_Bigquery_TableSchema $schema
     */
    public function setSchema(Google_Service_Bigquery_TableSchema $schema)
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
    public function getSourceFormat()
    {
        return $this->sourceFormat;
    }

    /**
     * @param $sourceFormat
     */
    public function setSourceFormat($sourceFormat)
    {
        $this->sourceFormat = $sourceFormat;
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
 * Class Google_Service_Bigquery_GetQueryResultsResponse
 */
class Google_Service_Bigquery_GetQueryResultsResponse extends Google_Collection
{
    public $cacheHit;
    public $etag;
    public $jobComplete;
    public $kind;
    public $pageToken;
    public $totalBytesProcessed;
    public $totalRows;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $jobReferenceType = 'Google_Service_Bigquery_JobReference';
    protected $jobReferenceDataType = '';
    protected $rowsType = 'Google_Service_Bigquery_TableRow';
    protected $rowsDataType = 'array';
    protected $schemaType = 'Google_Service_Bigquery_TableSchema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getCacheHit()
    {
        return $this->cacheHit;
    }

    /**
     * @param $cacheHit
     */
    public function setCacheHit($cacheHit)
    {
        $this->cacheHit = $cacheHit;
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
    public function getJobComplete()
    {
        return $this->jobComplete;
    }

    /**
     * @param $jobComplete
     */
    public function setJobComplete($jobComplete)
    {
        $this->jobComplete = $jobComplete;
    }

    /**
     * @param Google_Service_Bigquery_JobReference $jobReference
     */
    public function setJobReference(Google_Service_Bigquery_JobReference $jobReference)
    {
        $this->jobReference = $jobReference;
    }

    /**
     * @return mixed
     */
    public function getJobReference()
    {
        return $this->jobReference;
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
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param Google_Service_Bigquery_TableSchema $schema
     */
    public function setSchema(Google_Service_Bigquery_TableSchema $schema)
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
    public function getTotalBytesProcessed()
    {
        return $this->totalBytesProcessed;
    }

    /**
     * @param $totalBytesProcessed
     */
    public function setTotalBytesProcessed($totalBytesProcessed)
    {
        $this->totalBytesProcessed = $totalBytesProcessed;
    }

    /**
     * @return mixed
     */
    public function getTotalRows()
    {
        return $this->totalRows;
    }

    /**
     * @param $totalRows
     */
    public function setTotalRows($totalRows)
    {
        $this->totalRows = $totalRows;
    }
}

/**
 * Class Google_Service_Bigquery_Job
 */
class Google_Service_Bigquery_Job extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    public $selfLink;
    public $userEmail;
    protected $internal_gapi_mappings = [
        "userEmail" => "user_email",
    ];
    protected $configurationType = 'Google_Service_Bigquery_JobConfiguration';
    protected $configurationDataType = '';
    protected $jobReferenceType = 'Google_Service_Bigquery_JobReference';
    protected $jobReferenceDataType = '';
    protected $statisticsType = 'Google_Service_Bigquery_JobStatistics';
    protected $statisticsDataType = '';
    protected $statusType = 'Google_Service_Bigquery_JobStatus';
    protected $statusDataType = '';

    /**
     * @param Google_Service_Bigquery_JobConfiguration $configuration
     */
    public function setConfiguration(Google_Service_Bigquery_JobConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
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
     * @param Google_Service_Bigquery_JobReference $jobReference
     */
    public function setJobReference(Google_Service_Bigquery_JobReference $jobReference)
    {
        $this->jobReference = $jobReference;
    }

    /**
     * @return mixed
     */
    public function getJobReference()
    {
        return $this->jobReference;
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
     * @param Google_Service_Bigquery_JobStatistics $statistics
     */
    public function setStatistics(Google_Service_Bigquery_JobStatistics $statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param Google_Service_Bigquery_JobStatus $status
     */
    public function setStatus(Google_Service_Bigquery_JobStatus $status)
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

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfiguration
 */
class Google_Service_Bigquery_JobConfiguration extends Google_Model
{
    public $dryRun;
    protected $internal_gapi_mappings = [];
    protected $copyType = 'Google_Service_Bigquery_JobConfigurationTableCopy';
    protected $copyDataType = '';
    protected $extractType = 'Google_Service_Bigquery_JobConfigurationExtract';
    protected $extractDataType = '';
    protected $linkType = 'Google_Service_Bigquery_JobConfigurationLink';
    protected $linkDataType = '';
    protected $loadType = 'Google_Service_Bigquery_JobConfigurationLoad';
    protected $loadDataType = '';
    protected $queryType = 'Google_Service_Bigquery_JobConfigurationQuery';
    protected $queryDataType = '';


    /**
     * @param Google_Service_Bigquery_JobConfigurationTableCopy $copy
     */
    public function setCopy(Google_Service_Bigquery_JobConfigurationTableCopy $copy)
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
    public function getDryRun()
    {
        return $this->dryRun;
    }

    /**
     * @param $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
    }

    /**
     * @param Google_Service_Bigquery_JobConfigurationExtract $extract
     */
    public function setExtract(Google_Service_Bigquery_JobConfigurationExtract $extract)
    {
        $this->extract = $extract;
    }

    /**
     * @return mixed
     */
    public function getExtract()
    {
        return $this->extract;
    }

    /**
     * @param Google_Service_Bigquery_JobConfigurationLink $link
     */
    public function setLink(Google_Service_Bigquery_JobConfigurationLink $link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param Google_Service_Bigquery_JobConfigurationLoad $load
     */
    public function setLoad(Google_Service_Bigquery_JobConfigurationLoad $load)
    {
        $this->load = $load;
    }

    /**
     * @return mixed
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param Google_Service_Bigquery_JobConfigurationQuery $query
     */
    public function setQuery(Google_Service_Bigquery_JobConfigurationQuery $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfigurationExtract
 */
class Google_Service_Bigquery_JobConfigurationExtract extends Google_Collection
{
    public $compression;
    public $destinationFormat;
    public $destinationUri;
    public $destinationUris;
    public $fieldDelimiter;
    public $printHeader;
    protected $collection_key = 'destinationUris';
    protected $internal_gapi_mappings = [];
    protected $sourceTableType = 'Google_Service_Bigquery_TableReference';
    protected $sourceTableDataType = '';

    /**
     * @return mixed
     */
    public function getCompression()
    {
        return $this->compression;
    }

    /**
     * @param $compression
     */
    public function setCompression($compression)
    {
        $this->compression = $compression;
    }

    /**
     * @return mixed
     */
    public function getDestinationFormat()
    {
        return $this->destinationFormat;
    }

    /**
     * @param $destinationFormat
     */
    public function setDestinationFormat($destinationFormat)
    {
        $this->destinationFormat = $destinationFormat;
    }

    /**
     * @return mixed
     */
    public function getDestinationUri()
    {
        return $this->destinationUri;
    }

    /**
     * @param $destinationUri
     */
    public function setDestinationUri($destinationUri)
    {
        $this->destinationUri = $destinationUri;
    }

    /**
     * @return mixed
     */
    public function getDestinationUris()
    {
        return $this->destinationUris;
    }

    /**
     * @param $destinationUris
     */
    public function setDestinationUris($destinationUris)
    {
        $this->destinationUris = $destinationUris;
    }

    /**
     * @return mixed
     */
    public function getFieldDelimiter()
    {
        return $this->fieldDelimiter;
    }

    /**
     * @param $fieldDelimiter
     */
    public function setFieldDelimiter($fieldDelimiter)
    {
        $this->fieldDelimiter = $fieldDelimiter;
    }

    /**
     * @return mixed
     */
    public function getPrintHeader()
    {
        return $this->printHeader;
    }

    /**
     * @param $printHeader
     */
    public function setPrintHeader($printHeader)
    {
        $this->printHeader = $printHeader;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $sourceTable
     */
    public function setSourceTable(Google_Service_Bigquery_TableReference $sourceTable)
    {
        $this->sourceTable = $sourceTable;
    }

    /**
     * @return mixed
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfigurationLink
 */
class Google_Service_Bigquery_JobConfigurationLink extends Google_Collection
{
    public $createDisposition;
    public $sourceUri;
    public $writeDisposition;
    protected $collection_key = 'sourceUri';
    protected $internal_gapi_mappings = [];
    protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
    protected $destinationTableDataType = '';

    /**
     * @return mixed
     */
    public function getCreateDisposition()
    {
        return $this->createDisposition;
    }

    /**
     * @param $createDisposition
     */
    public function setCreateDisposition($createDisposition)
    {
        $this->createDisposition = $createDisposition;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $destinationTable
     */
    public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
    {
        $this->destinationTable = $destinationTable;
    }

    /**
     * @return mixed
     */
    public function getDestinationTable()
    {
        return $this->destinationTable;
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
    public function getWriteDisposition()
    {
        return $this->writeDisposition;
    }

    /**
     * @param $writeDisposition
     */
    public function setWriteDisposition($writeDisposition)
    {
        $this->writeDisposition = $writeDisposition;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfigurationLoad
 */
class Google_Service_Bigquery_JobConfigurationLoad extends Google_Collection
{
    public $allowJaggedRows;
    public $allowQuotedNewlines;
    public $createDisposition;
    public $encoding;
    public $fieldDelimiter;
    public $ignoreUnknownValues;
    public $maxBadRecords;
    public $projectionFields;
    public $quote;
    public $schemaInline;
    public $schemaInlineFormat;
    public $skipLeadingRows;
    public $sourceFormat;
    public $sourceUris;
    public $writeDisposition;
    protected $collection_key = 'sourceUris';
    protected $internal_gapi_mappings = [];
    protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
    protected $destinationTableDataType = '';
    protected $schemaType = 'Google_Service_Bigquery_TableSchema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getAllowJaggedRows()
    {
        return $this->allowJaggedRows;
    }

    /**
     * @param $allowJaggedRows
     */
    public function setAllowJaggedRows($allowJaggedRows)
    {
        $this->allowJaggedRows = $allowJaggedRows;
    }

    /**
     * @return mixed
     */
    public function getAllowQuotedNewlines()
    {
        return $this->allowQuotedNewlines;
    }

    /**
     * @param $allowQuotedNewlines
     */
    public function setAllowQuotedNewlines($allowQuotedNewlines)
    {
        $this->allowQuotedNewlines = $allowQuotedNewlines;
    }

    /**
     * @return mixed
     */
    public function getCreateDisposition()
    {
        return $this->createDisposition;
    }

    /**
     * @param $createDisposition
     */
    public function setCreateDisposition($createDisposition)
    {
        $this->createDisposition = $createDisposition;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $destinationTable
     */
    public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
    {
        $this->destinationTable = $destinationTable;
    }

    /**
     * @return mixed
     */
    public function getDestinationTable()
    {
        return $this->destinationTable;
    }

    /**
     * @return mixed
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * @return mixed
     */
    public function getFieldDelimiter()
    {
        return $this->fieldDelimiter;
    }

    /**
     * @param $fieldDelimiter
     */
    public function setFieldDelimiter($fieldDelimiter)
    {
        $this->fieldDelimiter = $fieldDelimiter;
    }

    /**
     * @return mixed
     */
    public function getIgnoreUnknownValues()
    {
        return $this->ignoreUnknownValues;
    }

    /**
     * @param $ignoreUnknownValues
     */
    public function setIgnoreUnknownValues($ignoreUnknownValues)
    {
        $this->ignoreUnknownValues = $ignoreUnknownValues;
    }

    /**
     * @return mixed
     */
    public function getMaxBadRecords()
    {
        return $this->maxBadRecords;
    }

    /**
     * @param $maxBadRecords
     */
    public function setMaxBadRecords($maxBadRecords)
    {
        $this->maxBadRecords = $maxBadRecords;
    }

    /**
     * @return mixed
     */
    public function getProjectionFields()
    {
        return $this->projectionFields;
    }

    /**
     * @param $projectionFields
     */
    public function setProjectionFields($projectionFields)
    {
        $this->projectionFields = $projectionFields;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }

    /**
     * @param Google_Service_Bigquery_TableSchema $schema
     */
    public function setSchema(Google_Service_Bigquery_TableSchema $schema)
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
    public function getSchemaInline()
    {
        return $this->schemaInline;
    }

    /**
     * @param $schemaInline
     */
    public function setSchemaInline($schemaInline)
    {
        $this->schemaInline = $schemaInline;
    }

    /**
     * @return mixed
     */
    public function getSchemaInlineFormat()
    {
        return $this->schemaInlineFormat;
    }

    /**
     * @param $schemaInlineFormat
     */
    public function setSchemaInlineFormat($schemaInlineFormat)
    {
        $this->schemaInlineFormat = $schemaInlineFormat;
    }

    /**
     * @return mixed
     */
    public function getSkipLeadingRows()
    {
        return $this->skipLeadingRows;
    }

    /**
     * @param $skipLeadingRows
     */
    public function setSkipLeadingRows($skipLeadingRows)
    {
        $this->skipLeadingRows = $skipLeadingRows;
    }

    /**
     * @return mixed
     */
    public function getSourceFormat()
    {
        return $this->sourceFormat;
    }

    /**
     * @param $sourceFormat
     */
    public function setSourceFormat($sourceFormat)
    {
        $this->sourceFormat = $sourceFormat;
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

    /**
     * @return mixed
     */
    public function getWriteDisposition()
    {
        return $this->writeDisposition;
    }

    /**
     * @param $writeDisposition
     */
    public function setWriteDisposition($writeDisposition)
    {
        $this->writeDisposition = $writeDisposition;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfigurationQuery
 */
class Google_Service_Bigquery_JobConfigurationQuery extends Google_Model
{
    public $allowLargeResults;
    public $createDisposition;
    public $flattenResults;
    public $preserveNulls;
    public $priority;
    public $query;
    public $useQueryCache;
    public $writeDisposition;
    protected $internal_gapi_mappings = [];
    protected $defaultDatasetType = 'Google_Service_Bigquery_DatasetReference';
    protected $defaultDatasetDataType = '';
    protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
    protected $destinationTableDataType = '';
    protected $tableDefinitionsType = 'Google_Service_Bigquery_ExternalDataConfiguration';
    protected $tableDefinitionsDataType = 'map';

    /**
     * @return mixed
     */
    public function getAllowLargeResults()
    {
        return $this->allowLargeResults;
    }

    /**
     * @param $allowLargeResults
     */
    public function setAllowLargeResults($allowLargeResults)
    {
        $this->allowLargeResults = $allowLargeResults;
    }

    /**
     * @return mixed
     */
    public function getCreateDisposition()
    {
        return $this->createDisposition;
    }

    /**
     * @param $createDisposition
     */
    public function setCreateDisposition($createDisposition)
    {
        $this->createDisposition = $createDisposition;
    }

    /**
     * @param Google_Service_Bigquery_DatasetReference $defaultDataset
     */
    public function setDefaultDataset(Google_Service_Bigquery_DatasetReference $defaultDataset)
    {
        $this->defaultDataset = $defaultDataset;
    }

    /**
     * @return mixed
     */
    public function getDefaultDataset()
    {
        return $this->defaultDataset;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $destinationTable
     */
    public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
    {
        $this->destinationTable = $destinationTable;
    }

    /**
     * @return mixed
     */
    public function getDestinationTable()
    {
        return $this->destinationTable;
    }

    /**
     * @return mixed
     */
    public function getFlattenResults()
    {
        return $this->flattenResults;
    }

    /**
     * @param $flattenResults
     */
    public function setFlattenResults($flattenResults)
    {
        $this->flattenResults = $flattenResults;
    }

    /**
     * @return mixed
     */
    public function getPreserveNulls()
    {
        return $this->preserveNulls;
    }

    /**
     * @param $preserveNulls
     */
    public function setPreserveNulls($preserveNulls)
    {
        $this->preserveNulls = $preserveNulls;
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
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @param $tableDefinitions
     */
    public function setTableDefinitions($tableDefinitions)
    {
        $this->tableDefinitions = $tableDefinitions;
    }

    /**
     * @return mixed
     */
    public function getTableDefinitions()
    {
        return $this->tableDefinitions;
    }

    /**
     * @return mixed
     */
    public function getUseQueryCache()
    {
        return $this->useQueryCache;
    }

    /**
     * @param $useQueryCache
     */
    public function setUseQueryCache($useQueryCache)
    {
        $this->useQueryCache = $useQueryCache;
    }

    /**
     * @return mixed
     */
    public function getWriteDisposition()
    {
        return $this->writeDisposition;
    }

    /**
     * @param $writeDisposition
     */
    public function setWriteDisposition($writeDisposition)
    {
        $this->writeDisposition = $writeDisposition;
    }
}

/**
 * Class Google_Service_Bigquery_JobConfigurationQueryTableDefinitions
 */
class Google_Service_Bigquery_JobConfigurationQueryTableDefinitions extends Google_Model
{
}

/**
 * Class Google_Service_Bigquery_JobConfigurationTableCopy
 */
class Google_Service_Bigquery_JobConfigurationTableCopy extends Google_Collection
{
    public $createDisposition;
    public $writeDisposition;
    protected $collection_key = 'sourceTables';
    protected $internal_gapi_mappings = [];
    protected $destinationTableType = 'Google_Service_Bigquery_TableReference';
    protected $destinationTableDataType = '';
    protected $sourceTableType = 'Google_Service_Bigquery_TableReference';
    protected $sourceTableDataType = '';
    protected $sourceTablesType = 'Google_Service_Bigquery_TableReference';
    protected $sourceTablesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCreateDisposition()
    {
        return $this->createDisposition;
    }

    /**
     * @param $createDisposition
     */
    public function setCreateDisposition($createDisposition)
    {
        $this->createDisposition = $createDisposition;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $destinationTable
     */
    public function setDestinationTable(Google_Service_Bigquery_TableReference $destinationTable)
    {
        $this->destinationTable = $destinationTable;
    }

    /**
     * @return mixed
     */
    public function getDestinationTable()
    {
        return $this->destinationTable;
    }

    /**
     * @param Google_Service_Bigquery_TableReference $sourceTable
     */
    public function setSourceTable(Google_Service_Bigquery_TableReference $sourceTable)
    {
        $this->sourceTable = $sourceTable;
    }

    /**
     * @return mixed
     */
    public function getSourceTable()
    {
        return $this->sourceTable;
    }

    /**
     * @param $sourceTables
     */
    public function setSourceTables($sourceTables)
    {
        $this->sourceTables = $sourceTables;
    }

    /**
     * @return mixed
     */
    public function getSourceTables()
    {
        return $this->sourceTables;
    }

    /**
     * @return mixed
     */
    public function getWriteDisposition()
    {
        return $this->writeDisposition;
    }

    /**
     * @param $writeDisposition
     */
    public function setWriteDisposition($writeDisposition)
    {
        $this->writeDisposition = $writeDisposition;
    }
}

/**
 * Class Google_Service_Bigquery_JobList
 */
class Google_Service_Bigquery_JobList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'jobs';
    protected $internal_gapi_mappings = [];
    protected $jobsType = 'Google_Service_Bigquery_JobListJobs';
    protected $jobsDataType = 'array';

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
 * Class Google_Service_Bigquery_JobListJobs
 */
class Google_Service_Bigquery_JobListJobs extends Google_Model
{
    public $id;
    public $kind;
    public $state;
    public $userEmail;
    protected $internal_gapi_mappings = [
        "userEmail" => "user_email",
    ];
    protected $configurationType = 'Google_Service_Bigquery_JobConfiguration';
    protected $configurationDataType = '';
    protected $errorResultType = 'Google_Service_Bigquery_ErrorProto';
    protected $errorResultDataType = '';
    protected $jobReferenceType = 'Google_Service_Bigquery_JobReference';
    protected $jobReferenceDataType = '';
    protected $statisticsType = 'Google_Service_Bigquery_JobStatistics';
    protected $statisticsDataType = '';
    protected $statusType = 'Google_Service_Bigquery_JobStatus';
    protected $statusDataType = '';

    /**
     * @param Google_Service_Bigquery_JobConfiguration $configuration
     */
    public function setConfiguration(Google_Service_Bigquery_JobConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param Google_Service_Bigquery_ErrorProto $errorResult
     */
    public function setErrorResult(Google_Service_Bigquery_ErrorProto $errorResult)
    {
        $this->errorResult = $errorResult;
    }

    /**
     * @return mixed
     */
    public function getErrorResult()
    {
        return $this->errorResult;
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
     * @param Google_Service_Bigquery_JobReference $jobReference
     */
    public function setJobReference(Google_Service_Bigquery_JobReference $jobReference)
    {
        $this->jobReference = $jobReference;
    }

    /**
     * @return mixed
     */
    public function getJobReference()
    {
        return $this->jobReference;
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
     * @param Google_Service_Bigquery_JobStatistics $statistics
     */
    public function setStatistics(Google_Service_Bigquery_JobStatistics $statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param Google_Service_Bigquery_JobStatus $status
     */
    public function setStatus(Google_Service_Bigquery_JobStatus $status)
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

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
}

/**
 * Class Google_Service_Bigquery_JobReference
 */
class Google_Service_Bigquery_JobReference extends Google_Model
{
    public $jobId;
    public $projectId;
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
 * Class Google_Service_Bigquery_JobStatistics
 */
class Google_Service_Bigquery_JobStatistics extends Google_Model
{
    public $creationTime;
    public $endTime;
    public $startTime;
    public $totalBytesProcessed;
    protected $internal_gapi_mappings = [];
    protected $extractType = 'Google_Service_Bigquery_JobStatistics4';
    protected $extractDataType = '';
    protected $loadType = 'Google_Service_Bigquery_JobStatistics3';
    protected $loadDataType = '';
    protected $queryType = 'Google_Service_Bigquery_JobStatistics2';
    protected $queryDataType = '';

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
     * @param Google_Service_Bigquery_JobStatistics4 $extract
     */
    public function setExtract(Google_Service_Bigquery_JobStatistics4 $extract)
    {
        $this->extract = $extract;
    }

    /**
     * @return mixed
     */
    public function getExtract()
    {
        return $this->extract;
    }

    /**
     * @param Google_Service_Bigquery_JobStatistics3 $load
     */
    public function setLoad(Google_Service_Bigquery_JobStatistics3 $load)
    {
        $this->load = $load;
    }

    /**
     * @return mixed
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * @param Google_Service_Bigquery_JobStatistics2 $query
     */
    public function setQuery(Google_Service_Bigquery_JobStatistics2 $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
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
    public function getTotalBytesProcessed()
    {
        return $this->totalBytesProcessed;
    }

    /**
     * @param $totalBytesProcessed
     */
    public function setTotalBytesProcessed($totalBytesProcessed)
    {
        $this->totalBytesProcessed = $totalBytesProcessed;
    }
}

/**
 * Class Google_Service_Bigquery_JobStatistics2
 */
class Google_Service_Bigquery_JobStatistics2 extends Google_Model
{
    public $cacheHit;
    public $totalBytesProcessed;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCacheHit()
    {
        return $this->cacheHit;
    }

    /**
     * @param $cacheHit
     */
    public function setCacheHit($cacheHit)
    {
        $this->cacheHit = $cacheHit;
    }

    /**
     * @return mixed
     */
    public function getTotalBytesProcessed()
    {
        return $this->totalBytesProcessed;
    }

    /**
     * @param $totalBytesProcessed
     */
    public function setTotalBytesProcessed($totalBytesProcessed)
    {
        $this->totalBytesProcessed = $totalBytesProcessed;
    }
}

/**
 * Class Google_Service_Bigquery_JobStatistics3
 */
class Google_Service_Bigquery_JobStatistics3 extends Google_Model
{
    public $inputFileBytes;
    public $inputFiles;
    public $outputBytes;
    public $outputRows;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInputFileBytes()
    {
        return $this->inputFileBytes;
    }

    /**
     * @param $inputFileBytes
     */
    public function setInputFileBytes($inputFileBytes)
    {
        $this->inputFileBytes = $inputFileBytes;
    }

    /**
     * @return mixed
     */
    public function getInputFiles()
    {
        return $this->inputFiles;
    }

    /**
     * @param $inputFiles
     */
    public function setInputFiles($inputFiles)
    {
        $this->inputFiles = $inputFiles;
    }

    /**
     * @return mixed
     */
    public function getOutputBytes()
    {
        return $this->outputBytes;
    }

    /**
     * @param $outputBytes
     */
    public function setOutputBytes($outputBytes)
    {
        $this->outputBytes = $outputBytes;
    }

    /**
     * @return mixed
     */
    public function getOutputRows()
    {
        return $this->outputRows;
    }

    /**
     * @param $outputRows
     */
    public function setOutputRows($outputRows)
    {
        $this->outputRows = $outputRows;
    }
}

/**
 * Class Google_Service_Bigquery_JobStatistics4
 */
class Google_Service_Bigquery_JobStatistics4 extends Google_Collection
{
    public $destinationUriFileCounts;
    protected $collection_key = 'destinationUriFileCounts';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDestinationUriFileCounts()
    {
        return $this->destinationUriFileCounts;
    }

    /**
     * @param $destinationUriFileCounts
     */
    public function setDestinationUriFileCounts($destinationUriFileCounts)
    {
        $this->destinationUriFileCounts = $destinationUriFileCounts;
    }
}

/**
 * Class Google_Service_Bigquery_JobStatus
 */
class Google_Service_Bigquery_JobStatus extends Google_Collection
{
    public $state;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorResultType = 'Google_Service_Bigquery_ErrorProto';
    protected $errorResultDataType = '';
    protected $errorsType = 'Google_Service_Bigquery_ErrorProto';
    protected $errorsDataType = 'array';

    /**
     * @param Google_Service_Bigquery_ErrorProto $errorResult
     */
    public function setErrorResult(Google_Service_Bigquery_ErrorProto $errorResult)
    {
        $this->errorResult = $errorResult;
    }

    /**
     * @return mixed
     */
    public function getErrorResult()
    {
        return $this->errorResult;
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
    public function getErrors()
    {
        return $this->errors;
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
 * Class Google_Service_Bigquery_JsonObject
 */
class Google_Service_Bigquery_JsonObject extends Google_Model
{
}

/**
 * Class Google_Service_Bigquery_ProjectList
 */
class Google_Service_Bigquery_ProjectList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'projects';
    protected $internal_gapi_mappings = [];
    protected $projectsType = 'Google_Service_Bigquery_ProjectListProjects';
    protected $projectsDataType = 'array';

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
 * Class Google_Service_Bigquery_ProjectListProjects
 */
class Google_Service_Bigquery_ProjectListProjects extends Google_Model
{
    public $friendlyName;
    public $id;
    public $kind;
    public $numericId;
    protected $internal_gapi_mappings = [];
    protected $projectReferenceType = 'Google_Service_Bigquery_ProjectReference';
    protected $projectReferenceDataType = '';

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
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
    public function getNumericId()
    {
        return $this->numericId;
    }

    /**
     * @param $numericId
     */
    public function setNumericId($numericId)
    {
        $this->numericId = $numericId;
    }

    /**
     * @param Google_Service_Bigquery_ProjectReference $projectReference
     */
    public function setProjectReference(Google_Service_Bigquery_ProjectReference $projectReference)
    {
        $this->projectReference = $projectReference;
    }

    /**
     * @return mixed
     */
    public function getProjectReference()
    {
        return $this->projectReference;
    }
}

/**
 * Class Google_Service_Bigquery_ProjectReference
 */
class Google_Service_Bigquery_ProjectReference extends Google_Model
{
    public $projectId;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Bigquery_QueryRequest
 */
class Google_Service_Bigquery_QueryRequest extends Google_Model
{
    public $dryRun;
    public $kind;
    public $maxResults;
    public $preserveNulls;
    public $query;
    public $timeoutMs;
    public $useQueryCache;
    protected $internal_gapi_mappings = [];
    protected $defaultDatasetType = 'Google_Service_Bigquery_DatasetReference';
    protected $defaultDatasetDataType = '';

    /**
     * @param Google_Service_Bigquery_DatasetReference $defaultDataset
     */
    public function setDefaultDataset(Google_Service_Bigquery_DatasetReference $defaultDataset)
    {
        $this->defaultDataset = $defaultDataset;
    }

    /**
     * @return mixed
     */
    public function getDefaultDataset()
    {
        return $this->defaultDataset;
    }

    /**
     * @return mixed
     */
    public function getDryRun()
    {
        return $this->dryRun;
    }

    /**
     * @param $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
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
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param $maxResults
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return mixed
     */
    public function getPreserveNulls()
    {
        return $this->preserveNulls;
    }

    /**
     * @param $preserveNulls
     */
    public function setPreserveNulls($preserveNulls)
    {
        $this->preserveNulls = $preserveNulls;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
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

    /**
     * @return mixed
     */
    public function getUseQueryCache()
    {
        return $this->useQueryCache;
    }

    /**
     * @param $useQueryCache
     */
    public function setUseQueryCache($useQueryCache)
    {
        $this->useQueryCache = $useQueryCache;
    }
}

/**
 * Class Google_Service_Bigquery_QueryResponse
 */
class Google_Service_Bigquery_QueryResponse extends Google_Collection
{
    public $cacheHit;
    public $jobComplete;
    public $kind;
    public $pageToken;
    public $totalBytesProcessed;
    public $totalRows;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $jobReferenceType = 'Google_Service_Bigquery_JobReference';
    protected $jobReferenceDataType = '';
    protected $rowsType = 'Google_Service_Bigquery_TableRow';
    protected $rowsDataType = 'array';
    protected $schemaType = 'Google_Service_Bigquery_TableSchema';
    protected $schemaDataType = '';

    /**
     * @return mixed
     */
    public function getCacheHit()
    {
        return $this->cacheHit;
    }

    /**
     * @param $cacheHit
     */
    public function setCacheHit($cacheHit)
    {
        $this->cacheHit = $cacheHit;
    }

    /**
     * @return mixed
     */
    public function getJobComplete()
    {
        return $this->jobComplete;
    }

    /**
     * @param $jobComplete
     */
    public function setJobComplete($jobComplete)
    {
        $this->jobComplete = $jobComplete;
    }

    /**
     * @param Google_Service_Bigquery_JobReference $jobReference
     */
    public function setJobReference(Google_Service_Bigquery_JobReference $jobReference)
    {
        $this->jobReference = $jobReference;
    }

    /**
     * @return mixed
     */
    public function getJobReference()
    {
        return $this->jobReference;
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
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param Google_Service_Bigquery_TableSchema $schema
     */
    public function setSchema(Google_Service_Bigquery_TableSchema $schema)
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
    public function getTotalBytesProcessed()
    {
        return $this->totalBytesProcessed;
    }

    /**
     * @param $totalBytesProcessed
     */
    public function setTotalBytesProcessed($totalBytesProcessed)
    {
        $this->totalBytesProcessed = $totalBytesProcessed;
    }

    /**
     * @return mixed
     */
    public function getTotalRows()
    {
        return $this->totalRows;
    }

    /**
     * @param $totalRows
     */
    public function setTotalRows($totalRows)
    {
        $this->totalRows = $totalRows;
    }
}

/**
 * Class Google_Service_Bigquery_Table
 */
class Google_Service_Bigquery_Table extends Google_Model
{
    public $creationTime;
    public $description;
    public $etag;
    public $expirationTime;
    public $friendlyName;
    public $id;
    public $kind;
    public $lastModifiedTime;
    public $numBytes;
    public $numRows;
    public $selfLink;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $schemaType = 'Google_Service_Bigquery_TableSchema';
    protected $schemaDataType = '';
    protected $tableReferenceType = 'Google_Service_Bigquery_TableReference';
    protected $tableReferenceDataType = '';
    protected $viewType = 'Google_Service_Bigquery_ViewDefinition';
    protected $viewDataType = '';

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
    public function getExpirationTime()
    {
        return $this->expirationTime;
    }

    /**
     * @param $expirationTime
     */
    public function setExpirationTime($expirationTime)
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
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
    public function getNumBytes()
    {
        return $this->numBytes;
    }

    /**
     * @param $numBytes
     */
    public function setNumBytes($numBytes)
    {
        $this->numBytes = $numBytes;
    }

    /**
     * @return mixed
     */
    public function getNumRows()
    {
        return $this->numRows;
    }

    /**
     * @param $numRows
     */
    public function setNumRows($numRows)
    {
        $this->numRows = $numRows;
    }

    /**
     * @param Google_Service_Bigquery_TableSchema $schema
     */
    public function setSchema(Google_Service_Bigquery_TableSchema $schema)
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
     * @param Google_Service_Bigquery_TableReference $tableReference
     */
    public function setTableReference(Google_Service_Bigquery_TableReference $tableReference)
    {
        $this->tableReference = $tableReference;
    }

    /**
     * @return mixed
     */
    public function getTableReference()
    {
        return $this->tableReference;
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
     * @param Google_Service_Bigquery_ViewDefinition $view
     */
    public function setView(Google_Service_Bigquery_ViewDefinition $view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }
}

/**
 * Class Google_Service_Bigquery_TableCell
 */
class Google_Service_Bigquery_TableCell extends Google_Model
{
    public $v;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * @param $v
     */
    public function setV($v)
    {
        $this->v = $v;
    }
}

/**
 * Class Google_Service_Bigquery_TableDataInsertAllRequest
 */
class Google_Service_Bigquery_TableDataInsertAllRequest extends Google_Collection
{
    public $ignoreUnknownValues;
    public $kind;
    public $skipInvalidRows;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $rowsType = 'Google_Service_Bigquery_TableDataInsertAllRequestRows';
    protected $rowsDataType = 'array';

    /**
     * @return mixed
     */
    public function getIgnoreUnknownValues()
    {
        return $this->ignoreUnknownValues;
    }

    /**
     * @param $ignoreUnknownValues
     */
    public function setIgnoreUnknownValues($ignoreUnknownValues)
    {
        $this->ignoreUnknownValues = $ignoreUnknownValues;
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
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return mixed
     */
    public function getSkipInvalidRows()
    {
        return $this->skipInvalidRows;
    }

    /**
     * @param $skipInvalidRows
     */
    public function setSkipInvalidRows($skipInvalidRows)
    {
        $this->skipInvalidRows = $skipInvalidRows;
    }
}

/**
 * Class Google_Service_Bigquery_TableDataInsertAllRequestRows
 */
class Google_Service_Bigquery_TableDataInsertAllRequestRows extends Google_Model
{
    public $insertId;
    public $json;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInsertId()
    {
        return $this->insertId;
    }

    /**
     * @param $insertId
     */
    public function setInsertId($insertId)
    {
        $this->insertId = $insertId;
    }

    /**
     * @return mixed
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param $json
     */
    public function setJson($json)
    {
        $this->json = $json;
    }
}

/**
 * Class Google_Service_Bigquery_TableDataInsertAllResponse
 */
class Google_Service_Bigquery_TableDataInsertAllResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'insertErrors';
    protected $internal_gapi_mappings = [];
    protected $insertErrorsType = 'Google_Service_Bigquery_TableDataInsertAllResponseInsertErrors';
    protected $insertErrorsDataType = 'array';

    /**
     * @param $insertErrors
     */
    public function setInsertErrors($insertErrors)
    {
        $this->insertErrors = $insertErrors;
    }

    /**
     * @return mixed
     */
    public function getInsertErrors()
    {
        return $this->insertErrors;
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
 * Class Google_Service_Bigquery_TableDataInsertAllResponseInsertErrors
 */
class Google_Service_Bigquery_TableDataInsertAllResponseInsertErrors extends Google_Collection
{
    public $index;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Bigquery_ErrorProto';
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
 * Class Google_Service_Bigquery_TableDataList
 */
class Google_Service_Bigquery_TableDataList extends Google_Collection
{
    public $etag;
    public $kind;
    public $pageToken;
    public $totalRows;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $rowsType = 'Google_Service_Bigquery_TableRow';
    protected $rowsDataType = 'array';

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
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return mixed
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return mixed
     */
    public function getTotalRows()
    {
        return $this->totalRows;
    }

    /**
     * @param $totalRows
     */
    public function setTotalRows($totalRows)
    {
        $this->totalRows = $totalRows;
    }
}

/**
 * Class Google_Service_Bigquery_TableFieldSchema
 */
class Google_Service_Bigquery_TableFieldSchema extends Google_Collection
{
    public $description;
    public $mode;
    public $name;
    public $type;
    protected $collection_key = 'fields';
    protected $internal_gapi_mappings = [];
    protected $fieldsType = 'Google_Service_Bigquery_TableFieldSchema';
    protected $fieldsDataType = 'array';

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
     * @param $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
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
 * Class Google_Service_Bigquery_TableList
 */
class Google_Service_Bigquery_TableList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'tables';
    protected $internal_gapi_mappings = [];
    protected $tablesType = 'Google_Service_Bigquery_TableListTables';
    protected $tablesDataType = 'array';

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
 * Class Google_Service_Bigquery_TableListTables
 */
class Google_Service_Bigquery_TableListTables extends Google_Model
{
    public $friendlyName;
    public $id;
    public $kind;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $tableReferenceType = 'Google_Service_Bigquery_TableReference';
    protected $tableReferenceDataType = '';

    /**
     * @return mixed
     */
    public function getFriendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @param $friendlyName
     */
    public function setFriendlyName($friendlyName)
    {
        $this->friendlyName = $friendlyName;
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
     * @param Google_Service_Bigquery_TableReference $tableReference
     */
    public function setTableReference(Google_Service_Bigquery_TableReference $tableReference)
    {
        $this->tableReference = $tableReference;
    }

    /**
     * @return mixed
     */
    public function getTableReference()
    {
        return $this->tableReference;
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
 * Class Google_Service_Bigquery_TableReference
 */
class Google_Service_Bigquery_TableReference extends Google_Model
{
    public $datasetId;
    public $projectId;
    public $tableId;
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
    public function getTableId()
    {
        return $this->tableId;
    }

    /**
     * @param $tableId
     */
    public function setTableId($tableId)
    {
        $this->tableId = $tableId;
    }
}

/**
 * Class Google_Service_Bigquery_TableRow
 */
class Google_Service_Bigquery_TableRow extends Google_Collection
{
    protected $collection_key = 'f';
    protected $internal_gapi_mappings = [];
    protected $fType = 'Google_Service_Bigquery_TableCell';
    protected $fDataType = 'array';


    /**
     * @param $f
     */
    public function setF($f)
    {
        $this->f = $f;
    }

    /**
     * @return mixed
     */
    public function getF()
    {
        return $this->f;
    }
}

/**
 * Class Google_Service_Bigquery_TableSchema
 */
class Google_Service_Bigquery_TableSchema extends Google_Collection
{
    protected $collection_key = 'fields';
    protected $internal_gapi_mappings = [];
    protected $fieldsType = 'Google_Service_Bigquery_TableFieldSchema';
    protected $fieldsDataType = 'array';


    /**
     * @param $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }
}

/**
 * Class Google_Service_Bigquery_ViewDefinition
 */
class Google_Service_Bigquery_ViewDefinition extends Google_Model
{
    public $query;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }
}
