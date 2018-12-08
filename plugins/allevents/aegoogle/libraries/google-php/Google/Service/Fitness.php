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
 * Service definition for Fitness (v1).
 *
 * <p>
 * Google Fit API</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fit/rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Fitness extends Google_Service
{
    /** View your activity information in Google Fit. */
    const FITNESS_ACTIVITY_READ =
        "https://www.googleapis.com/auth/fitness.activity.read";
    /** View and store your activity information in Google Fit. */
    const FITNESS_ACTIVITY_WRITE =
        "https://www.googleapis.com/auth/fitness.activity.write";
    /** View body sensor information in Google Fit. */
    const FITNESS_BODY_READ =
        "https://www.googleapis.com/auth/fitness.body.read";
    /** View and store body sensor data in Google Fit. */
    const FITNESS_BODY_WRITE =
        "https://www.googleapis.com/auth/fitness.body.write";
    /** View your stored location data in Google Fit. */
    const FITNESS_LOCATION_READ =
        "https://www.googleapis.com/auth/fitness.location.read";
    /** View and store your location data in Google Fit. */
    const FITNESS_LOCATION_WRITE =
        "https://www.googleapis.com/auth/fitness.location.write";

    public $users_dataSources;
    public $users_dataSources_datasets;
    public $users_sessions;


    /**
     * Constructs the internal representation of the Fitness service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'fitness/v1/users/';
        $this->version = 'v1';
        $this->serviceName = 'fitness';

        $this->users_dataSources = new Google_Service_Fitness_UsersDataSources_Resource(
            $this,
            $this->serviceName,
            'dataSources',
            [
                'methods' => [
                    'create' => [
                        'path' => '{userId}/dataSources',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{userId}/dataSources/{dataSourceId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/dataSources/{dataSourceId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/dataSources',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataTypeName' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{userId}/dataSources/{dataSourceId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{userId}/dataSources/{dataSourceId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_dataSources_datasets = new Google_Service_Fitness_UsersDataSourcesDatasets_Resource(
            $this,
            $this->serviceName,
            'datasets',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'modifiedTimeMillis' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'currentTimeMillis' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'limit' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'currentTimeMillis' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_sessions = new Google_Service_Fitness_UsersSessions_Resource(
            $this,
            $this->serviceName,
            'sessions',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{userId}/sessions/{sessionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sessionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'currentTimeMillis' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/sessions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{userId}/sessions/{sessionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sessionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'currentTimeMillis' => [
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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $users = $fitnessService->users;
 *  </code>
 */
class Google_Service_Fitness_Users_Resource extends Google_Service_Resource
{
}

/**
 * The "dataSources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $dataSources = $fitnessService->dataSources;
 *  </code>
 */
class Google_Service_Fitness_UsersDataSources_Resource extends Google_Service_Resource
{

    /**
     * Creates a new data source that is unique across all data sources belonging to
     * this user. The data stream ID field can be omitted and will be generated by
     * the server with the correct format. The data stream ID is an ordered
     * combination of some fields from the data source. In addition to the data
     * source fields reflected into the data source ID, the developer project number
     * that is authenticated when creating the data source is included. This
     * developer project number is obfuscated when read by any other developer
     * reading public data types. (dataSources.create)
     *
     * @param string $userId Create the data source for the person identified. Use
     *                                                                       me to indicate the authenticated user. Only me is supported at this time.
     * @param Google_DataSource|Google_Service_Fitness_DataSource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($userId, Google_Service_Fitness_DataSource $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Fitness_DataSource");
    }

    /**
     * Delete the data source if there are no datapoints associated with it
     * (dataSources.delete)
     *
     * @param string $userId Retrieve a data source for the person identified. Use
     *                             me to indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($userId, $dataSourceId, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Fitness_DataSource");
    }

    /**
     * Returns a data source identified by a data stream ID. (dataSources.get)
     *
     * @param string $userId Retrieve a data source for the person identified. Use
     *                             me to indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source to
     *                             retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($userId, $dataSourceId, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fitness_DataSource");
    }

    /**
     * Lists all data sources that are visible to the developer, using the OAuth
     * scopes provided. The list is not exhaustive: the user may have private data
     * sources that are only visible to other developers or calls using other
     * scopes. (dataSources.listUsersDataSources)
     *
     * @param string $userId List data sources for the person identified. Use me to
     *                          indicate the authenticated user. Only me is supported at this time.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string dataTypeName The names of data types to include in the
     * list. If not specified, all data sources will be returned.
     */
    public function listUsersDataSources($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fitness_ListDataSourcesResponse");
    }

    /**
     * Updates a given data source. It is an error to modify the data source's data
     * stream ID, data type, type, stream name or device information apart from the
     * device version. Changing these fields would require a new unique data stream
     * ID and separate data source.
     *
     * Data sources are identified by their data stream ID. This method supports
     * patch semantics. (dataSources.patch)
     *
     * @param string $userId Update the data source for the person identified. Use
     *                                                                          me to indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source to update.
     * @param Google_DataSource|Google_Service_Fitness_DataSource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($userId, $dataSourceId, Google_Service_Fitness_DataSource $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fitness_DataSource");
    }

    /**
     * Updates a given data source. It is an error to modify the data source's data
     * stream ID, data type, type, stream name or device information apart from the
     * device version. Changing these fields would require a new unique data stream
     * ID and separate data source.
     *
     * Data sources are identified by their data stream ID. (dataSources.update)
     *
     * @param string $userId Update the data source for the person identified. Use
     *                                                                          me to indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source to update.
     * @param Google_DataSource|Google_Service_Fitness_DataSource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($userId, $dataSourceId, Google_Service_Fitness_DataSource $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fitness_DataSource");
    }
}

/**
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $datasets = $fitnessService->datasets;
 *  </code>
 */
class Google_Service_Fitness_UsersDataSourcesDatasets_Resource extends Google_Service_Resource
{

    /**
     * Performs an inclusive delete of all data points whose start and end times
     * have any overlap with the time range specified by the dataset ID. For most
     * data types, the entire data point will be deleted. For data types where the
     * time span represents a consistent value (such as
     * com.google.activity.segment), and a data point straddles either end point of
     * the dataset, only the overlapping portion of the data point will be deleted.
     * (datasets.delete)
     *
     * @param string $userId Delete a dataset for the person identified. Use me to
     *                             indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source that
     *                             created the dataset.
     * @param string $datasetId Dataset identifier that is a composite of the
     *                             minimum data point start time and maximum data point end time represented as
     *                             nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
     *                             where startTime and endTime are 64 bit integers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string modifiedTimeMillis When the operation was performed on the
     * client.
     * @opt_param string currentTimeMillis The client's current time in milliseconds
     * since epoch.
     */
    public function delete($userId, $dataSourceId, $datasetId, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns a dataset containing all data points whose start and end times
     * overlap with the specified range of the dataset minimum start time and
     * maximum end time. Specifically, any data point whose start time is less than
     * or equal to the dataset end time and whose end time is greater than or equal
     * to the dataset start time. (datasets.get)
     *
     * @param string $userId Retrieve a dataset for the person identified. Use me to
     *                             indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source that
     *                             created the dataset.
     * @param string $datasetId Dataset identifier that is a composite of the
     *                             minimum data point start time and maximum data point end time represented as
     *                             nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
     *                             where startTime and endTime are 64 bit integers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param int limit If specified, no more than this many data points will be
     * included in the dataset. If the there are more data points in the dataset,
     * nextPageToken will be set in the dataset response.
     * @opt_param string pageToken The continuation token, which is used to page
     * through large datasets. To get the next page of a dataset, set this parameter
     * to the value of nextPageToken from the previous response. Each subsequent
     * call will yield a partial dataset with data point end timestamps that are
     * strictly smaller than those in the previous partial response.
     */
    public function get($userId, $dataSourceId, $datasetId, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fitness_Dataset");
    }

    /**
     * Adds data points to a dataset. The dataset need not be previously created.
     * All points within the given dataset will be returned with subsquent calls to
     * retrieve this dataset. Data points can belong to more than one dataset. This
     * method does not use patch semantics. (datasets.patch)
     *
     * @param string $userId Patch a dataset for the person identified. Use me to
     *                                                                    indicate the authenticated user. Only me is supported at this time.
     * @param string $dataSourceId The data stream ID of the data source that
     *                                                                    created the dataset.
     * @param string $datasetId Dataset identifier that is a composite of the
     *                                                                    minimum data point start time and maximum data point end time represented as
     *                                                                    nanoseconds from the epoch. The ID is formatted like: "startTime-endTime"
     *                                                                    where startTime and endTime are 64 bit integers.
     * @param Google_Dataset|Google_Service_Fitness_Dataset $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string currentTimeMillis The client's current time in milliseconds
     * since epoch. Note that the minStartTimeNs and maxEndTimeNs properties in the
     * request body are in nanoseconds instead of milliseconds.
     */
    public function patch($userId, $dataSourceId, $datasetId, Google_Service_Fitness_Dataset $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'dataSourceId' => $dataSourceId, 'datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fitness_Dataset");
    }
}

/**
 * The "sessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $sessions = $fitnessService->sessions;
 *  </code>
 */
class Google_Service_Fitness_UsersSessions_Resource extends Google_Service_Resource
{

    /**
     * Deletes a session specified by the given session ID. (sessions.delete)
     *
     * @param string $userId Delete a session for the person identified. Use me to
     *                          indicate the authenticated user. Only me is supported at this time.
     * @param string $sessionId The ID of the session to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string currentTimeMillis The client's current time in milliseconds
     * since epoch.
     */
    public function delete($userId, $sessionId, $optParams = [])
    {
        $params = ['userId' => $userId, 'sessionId' => $sessionId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Lists sessions previously created. (sessions.listUsersSessions)
     *
     * @param string $userId List sessions for the person identified. Use me to
     *                          indicate the authenticated user. Only me is supported at this time.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of nextPageToken from the previous response.
     * @opt_param string endTime An RFC3339 timestamp. Only sessions ending between
     * the start and end times will be included in the response.
     * @opt_param bool includeDeleted If true, deleted sessions will be returned.
     * When set to true, sessions returned in this response will only have an ID and
     * will not have any other fields.
     * @opt_param string startTime An RFC3339 timestamp. Only sessions ending
     * between the start and end times will be included in the response.
     */
    public function listUsersSessions($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fitness_ListSessionsResponse");
    }

    /**
     * Updates or insert a given session. (sessions.update)
     *
     * @param string $userId Create sessions for the person identified. Use me to
     *                                                                 indicate the authenticated user. Only me is supported at this time.
     * @param string $sessionId The ID of the session to be created.
     * @param Google_Service_Fitness_Session|Google_Session $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string currentTimeMillis The client's current time in milliseconds
     * since epoch.
     */
    public function update($userId, $sessionId, Google_Service_Fitness_Session $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'sessionId' => $sessionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fitness_Session");
    }
}


/**
 * Class Google_Service_Fitness_Application
 */
class Google_Service_Fitness_Application extends Google_Model
{
    public $detailsUrl;
    public $name;
    public $packageName;
    public $version;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDetailsUrl()
    {
        return $this->detailsUrl;
    }

    /**
     * @param $detailsUrl
     */
    public function setDetailsUrl($detailsUrl)
    {
        $this->detailsUrl = $detailsUrl;
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
    public function getPackageName()
    {
        return $this->packageName;
    }

    /**
     * @param $packageName
     */
    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;
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
 * Class Google_Service_Fitness_DataPoint
 */
class Google_Service_Fitness_DataPoint extends Google_Collection
{
    public $computationTimeMillis;
    public $dataTypeName;
    public $endTimeNanos;
    public $modifiedTimeMillis;
    public $originDataSourceId;
    public $rawTimestampNanos;
    public $startTimeNanos;
    protected $collection_key = 'value';
    protected $internal_gapi_mappings = [];
    protected $valueType = 'Google_Service_Fitness_Value';
    protected $valueDataType = 'array';

    /**
     * @return mixed
     */
    public function getComputationTimeMillis()
    {
        return $this->computationTimeMillis;
    }

    /**
     * @param $computationTimeMillis
     */
    public function setComputationTimeMillis($computationTimeMillis)
    {
        $this->computationTimeMillis = $computationTimeMillis;
    }

    /**
     * @return mixed
     */
    public function getDataTypeName()
    {
        return $this->dataTypeName;
    }

    /**
     * @param $dataTypeName
     */
    public function setDataTypeName($dataTypeName)
    {
        $this->dataTypeName = $dataTypeName;
    }

    /**
     * @return mixed
     */
    public function getEndTimeNanos()
    {
        return $this->endTimeNanos;
    }

    /**
     * @param $endTimeNanos
     */
    public function setEndTimeNanos($endTimeNanos)
    {
        $this->endTimeNanos = $endTimeNanos;
    }

    /**
     * @return mixed
     */
    public function getModifiedTimeMillis()
    {
        return $this->modifiedTimeMillis;
    }

    /**
     * @param $modifiedTimeMillis
     */
    public function setModifiedTimeMillis($modifiedTimeMillis)
    {
        $this->modifiedTimeMillis = $modifiedTimeMillis;
    }

    /**
     * @return mixed
     */
    public function getOriginDataSourceId()
    {
        return $this->originDataSourceId;
    }

    /**
     * @param $originDataSourceId
     */
    public function setOriginDataSourceId($originDataSourceId)
    {
        $this->originDataSourceId = $originDataSourceId;
    }

    /**
     * @return mixed
     */
    public function getRawTimestampNanos()
    {
        return $this->rawTimestampNanos;
    }

    /**
     * @param $rawTimestampNanos
     */
    public function setRawTimestampNanos($rawTimestampNanos)
    {
        $this->rawTimestampNanos = $rawTimestampNanos;
    }

    /**
     * @return mixed
     */
    public function getStartTimeNanos()
    {
        return $this->startTimeNanos;
    }

    /**
     * @param $startTimeNanos
     */
    public function setStartTimeNanos($startTimeNanos)
    {
        $this->startTimeNanos = $startTimeNanos;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

/**
 * Class Google_Service_Fitness_DataSource
 */
class Google_Service_Fitness_DataSource extends Google_Model
{
    public $dataStreamId;
    public $dataStreamName;
    public $name;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $applicationType = 'Google_Service_Fitness_Application';
    protected $applicationDataType = '';
    protected $dataTypeType = 'Google_Service_Fitness_DataType';
    protected $dataTypeDataType = '';
    protected $deviceType = 'Google_Service_Fitness_Device';
    protected $deviceDataType = '';

    /**
     * @param Google_Service_Fitness_Application $application
     */
    public function setApplication(Google_Service_Fitness_Application $application)
    {
        $this->application = $application;
    }

    /**
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @return mixed
     */
    public function getDataStreamId()
    {
        return $this->dataStreamId;
    }

    /**
     * @param $dataStreamId
     */
    public function setDataStreamId($dataStreamId)
    {
        $this->dataStreamId = $dataStreamId;
    }

    /**
     * @return mixed
     */
    public function getDataStreamName()
    {
        return $this->dataStreamName;
    }

    /**
     * @param $dataStreamName
     */
    public function setDataStreamName($dataStreamName)
    {
        $this->dataStreamName = $dataStreamName;
    }

    /**
     * @param Google_Service_Fitness_DataType $dataType
     */
    public function setDataType(Google_Service_Fitness_DataType $dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @return mixed
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param Google_Service_Fitness_Device $device
     */
    public function setDevice(Google_Service_Fitness_Device $device)
    {
        $this->device = $device;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
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
 * Class Google_Service_Fitness_DataType
 */
class Google_Service_Fitness_DataType extends Google_Collection
{
    public $name;
    protected $collection_key = 'field';
    protected $internal_gapi_mappings = [];
    protected $fieldType = 'Google_Service_Fitness_DataTypeField';
    protected $fieldDataType = 'array';

    /**
     * @param $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
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
 * Class Google_Service_Fitness_DataTypeField
 */
class Google_Service_Fitness_DataTypeField extends Google_Model
{
    public $format;
    public $name;
    public $optional;
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
    public function getOptional()
    {
        return $this->optional;
    }

    /**
     * @param $optional
     */
    public function setOptional($optional)
    {
        $this->optional = $optional;
    }
}

/**
 * Class Google_Service_Fitness_Dataset
 */
class Google_Service_Fitness_Dataset extends Google_Collection
{
    public $dataSourceId;
    public $maxEndTimeNs;
    public $minStartTimeNs;
    public $nextPageToken;
    protected $collection_key = 'point';
    protected $internal_gapi_mappings = [];
    protected $pointType = 'Google_Service_Fitness_DataPoint';
    protected $pointDataType = 'array';

    /**
     * @return mixed
     */
    public function getDataSourceId()
    {
        return $this->dataSourceId;
    }

    /**
     * @param $dataSourceId
     */
    public function setDataSourceId($dataSourceId)
    {
        $this->dataSourceId = $dataSourceId;
    }

    /**
     * @return mixed
     */
    public function getMaxEndTimeNs()
    {
        return $this->maxEndTimeNs;
    }

    /**
     * @param $maxEndTimeNs
     */
    public function setMaxEndTimeNs($maxEndTimeNs)
    {
        $this->maxEndTimeNs = $maxEndTimeNs;
    }

    /**
     * @return mixed
     */
    public function getMinStartTimeNs()
    {
        return $this->minStartTimeNs;
    }

    /**
     * @param $minStartTimeNs
     */
    public function setMinStartTimeNs($minStartTimeNs)
    {
        $this->minStartTimeNs = $minStartTimeNs;
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
     * @param $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }
}

/**
 * Class Google_Service_Fitness_Device
 */
class Google_Service_Fitness_Device extends Google_Model
{
    public $manufacturer;
    public $model;
    public $type;
    public $uid;
    public $version;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
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
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
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
 * Class Google_Service_Fitness_ListDataSourcesResponse
 */
class Google_Service_Fitness_ListDataSourcesResponse extends Google_Collection
{
    protected $collection_key = 'dataSource';
    protected $internal_gapi_mappings = [];
    protected $dataSourceType = 'Google_Service_Fitness_DataSource';
    protected $dataSourceDataType = 'array';


    /**
     * @param $dataSource
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return mixed
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }
}

/**
 * Class Google_Service_Fitness_ListSessionsResponse
 */
class Google_Service_Fitness_ListSessionsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'session';
    protected $internal_gapi_mappings = [];
    protected $deletedSessionType = 'Google_Service_Fitness_Session';
    protected $deletedSessionDataType = 'array';
    protected $sessionType = 'Google_Service_Fitness_Session';
    protected $sessionDataType = 'array';


    /**
     * @param $deletedSession
     */
    public function setDeletedSession($deletedSession)
    {
        $this->deletedSession = $deletedSession;
    }

    /**
     * @return mixed
     */
    public function getDeletedSession()
    {
        return $this->deletedSession;
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
     * @param $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }
}

/**
 * Class Google_Service_Fitness_Session
 */
class Google_Service_Fitness_Session extends Google_Model
{
    public $activeTimeMillis;
    public $activityType;
    public $description;
    public $endTimeMillis;
    public $id;
    public $modifiedTimeMillis;
    public $name;
    public $startTimeMillis;
    protected $internal_gapi_mappings = [];
    protected $applicationType = 'Google_Service_Fitness_Application';
    protected $applicationDataType = '';

    /**
     * @return mixed
     */
    public function getActiveTimeMillis()
    {
        return $this->activeTimeMillis;
    }

    /**
     * @param $activeTimeMillis
     */
    public function setActiveTimeMillis($activeTimeMillis)
    {
        $this->activeTimeMillis = $activeTimeMillis;
    }

    /**
     * @return mixed
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * @param $activityType
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @param Google_Service_Fitness_Application $application
     */
    public function setApplication(Google_Service_Fitness_Application $application)
    {
        $this->application = $application;
    }

    /**
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
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
    public function getEndTimeMillis()
    {
        return $this->endTimeMillis;
    }

    /**
     * @param $endTimeMillis
     */
    public function setEndTimeMillis($endTimeMillis)
    {
        $this->endTimeMillis = $endTimeMillis;
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
    public function getModifiedTimeMillis()
    {
        return $this->modifiedTimeMillis;
    }

    /**
     * @param $modifiedTimeMillis
     */
    public function setModifiedTimeMillis($modifiedTimeMillis)
    {
        $this->modifiedTimeMillis = $modifiedTimeMillis;
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
    public function getStartTimeMillis()
    {
        return $this->startTimeMillis;
    }

    /**
     * @param $startTimeMillis
     */
    public function setStartTimeMillis($startTimeMillis)
    {
        $this->startTimeMillis = $startTimeMillis;
    }
}

/**
 * Class Google_Service_Fitness_Value
 */
class Google_Service_Fitness_Value extends Google_Model
{
    public $fpVal;
    public $intVal;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFpVal()
    {
        return $this->fpVal;
    }

    /**
     * @param $fpVal
     */
    public function setFpVal($fpVal)
    {
        $this->fpVal = $fpVal;
    }

    /**
     * @return mixed
     */
    public function getIntVal()
    {
        return $this->intVal;
    }

    /**
     * @param $intVal
     */
    public function setIntVal($intVal)
    {
        $this->intVal = $intVal;
    }
}
