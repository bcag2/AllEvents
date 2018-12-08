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
 * Service definition for SQLAdmin (v1beta4).
 *
 * <p>
 * API for Cloud SQL database instance management.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-sql/docs/admin-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_SQLAdmin extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** Manage your Google SQL Service instances. */
    const SQLSERVICE_ADMIN =
        "https://www.googleapis.com/auth/sqlservice.admin";

    public $backupRuns;
    public $databases;
    public $flags;
    public $instances;
    public $operations;
    public $sslCerts;
    public $tiers;
    public $users;


    /**
     * Constructs the internal representation of the SQLAdmin service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'sql/v1beta4/';
        $this->version = 'v1beta4';
        $this->serviceName = 'sqladmin';

        $this->backupRuns = new Google_Service_SQLAdmin_BackupRuns_Resource(
            $this,
            $this->serviceName,
            'backupRuns',
            [
                'methods' => [
                    'get' => [
                        'path' => 'projects/{project}/instances/{instance}/backupRuns/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
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
                        'path' => 'projects/{project}/instances/{instance}/backupRuns',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
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
                        ],
                    ],
                ]
            ]
        );
        $this->databases = new Google_Service_SQLAdmin_Databases_Resource(
            $this,
            $this->serviceName,
            'databases',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{project}/instances/{instance}/databases/{database}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'database' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{project}/instances/{instance}/databases/{database}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'database' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{project}/instances/{instance}/databases',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'list' => [
                        'path' => 'projects/{project}/instances/{instance}/databases',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
                    ], 'patch' => [
                        'path' => 'projects/{project}/instances/{instance}/databases/{database}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'database' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'projects/{project}/instances/{instance}/databases/{database}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'database' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->flags = new Google_Service_SQLAdmin_Flags_Resource(
            $this,
            $this->serviceName,
            'flags',
            [
                'methods' => [
                    'list' => [
                        'path' => 'flags',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->instances = new Google_Service_SQLAdmin_Instances_Resource(
            $this,
            $this->serviceName,
            'instances',
            [
                'methods' => [
                    'clone' => [
                        'path' => 'projects/{project}/instances/{instance}/clone',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                        'path' => 'projects/{project}/instances/{instance}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
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
                    ], 'export' => [
                        'path' => 'projects/{project}/instances/{instance}/export',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'get' => [
                        'path' => 'projects/{project}/instances/{instance}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
                    ], 'import' => [
                        'path' => 'projects/{project}/instances/{instance}/import',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'insert' => [
                        'path' => 'projects/{project}/instances',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'projects/{project}/instances',
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
                    ], 'patch' => [
                        'path' => 'projects/{project}/instances/{instance}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
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
                    ], 'promoteReplica' => [
                        'path' => 'projects/{project}/instances/{instance}/promoteReplica',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'resetSslConfig' => [
                        'path' => 'projects/{project}/instances/{instance}/resetSslConfig',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'restart' => [
                        'path' => 'projects/{project}/instances/{instance}/restart',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'restoreBackup' => [
                        'path' => 'projects/{project}/instances/{instance}/restoreBackup',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'startReplica' => [
                        'path' => 'projects/{project}/instances/{instance}/startReplica',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'stopReplica' => [
                        'path' => 'projects/{project}/instances/{instance}/stopReplica',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'update' => [
                        'path' => 'projects/{project}/instances/{instance}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
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
        $this->operations = new Google_Service_SQLAdmin_Operations_Resource(
            $this,
            $this->serviceName,
            'operations',
            [
                'methods' => [
                    'get' => [
                        'path' => 'projects/{project}/operations/{operation}',
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
                        'path' => 'projects/{project}/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'query',
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
                        ],
                    ],
                ]
            ]
        );
        $this->sslCerts = new Google_Service_SQLAdmin_SslCerts_Resource(
            $this,
            $this->serviceName,
            'sslCerts',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sha1Fingerprint' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sha1Fingerprint' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{project}/instances/{instance}/sslCerts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'list' => [
                        'path' => 'projects/{project}/instances/{instance}/sslCerts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
        $this->tiers = new Google_Service_SQLAdmin_Tiers_Resource(
            $this,
            $this->serviceName,
            'tiers',
            [
                'methods' => [
                    'list' => [
                        'path' => 'projects/{project}/tiers',
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
        $this->users = new Google_Service_SQLAdmin_Users_Resource(
            $this,
            $this->serviceName,
            'users',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'projects/{project}/instances/{instance}/users',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'host' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'projects/{project}/instances/{instance}/users',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
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
                    ], 'list' => [
                        'path' => 'projects/{project}/instances/{instance}/users',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
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
                    ], 'update' => [
                        'path' => 'projects/{project}/instances/{instance}/users',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'host' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'name' => [
                                'location' => 'query',
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
 * The "backupRuns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $backupRuns = $sqladminService->backupRuns;
 *  </code>
 */
class Google_Service_SQLAdmin_BackupRuns_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a resource containing information about a backup run.
     * (backupRuns.get)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param string $id The ID of this Backup Run.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $instance, $id, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SQLAdmin_BackupRun");
    }

    /**
     * Lists all backup runs associated with a given instance and configuration in
     * the reverse chronological order of the enqueued time.
     * (backupRuns.listBackupRuns)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int maxResults Maximum number of backup runs per response.
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     */
    public function listBackupRuns($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_BackupRunsListResponse");
    }
}

/**
 * The "databases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $databases = $sqladminService->databases;
 *  </code>
 */
class Google_Service_SQLAdmin_Databases_Resource extends Google_Service_Resource
{

    /**
     * Deletes a resource containing information about a database inside a Cloud SQL
     * instance. (databases.delete)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                          project ID.
     * @param string $database Name of the database to be deleted in the instance.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $instance, $database, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'database' => $database];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Retrieves a resource containing information about a database inside a Cloud
     * SQL instance. (databases.get)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                          project ID.
     * @param string $database Name of the database in the instance.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $instance, $database, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'database' => $database];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SQLAdmin_Database");
    }

    /**
     * Inserts a resource containing information about a database inside a Cloud SQL
     * instance. (databases.insert)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                                                                    project ID.
     * @param Google_Database|Google_Service_SQLAdmin_Database $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $instance, Google_Service_SQLAdmin_Database $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Lists databases in the specified Cloud SQL instance.
     * (databases.listDatabases)
     *
     * @param string $project Project ID of the project for which to list Cloud SQL
     *                          instances.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listDatabases($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_DatabasesListResponse");
    }

    /**
     * Updates a resource containing information about a database inside a Cloud SQL
     * instance. This method supports patch semantics. (databases.patch)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                                                                    project ID.
     * @param string $database Name of the database to be updated in the instance.
     * @param Google_Database|Google_Service_SQLAdmin_Database $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($project, $instance, $database, Google_Service_SQLAdmin_Database $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'database' => $database, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Updates a resource containing information about a database inside a Cloud SQL
     * instance. (databases.update)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                                                                    project ID.
     * @param string $database Name of the database to be updated in the instance.
     * @param Google_Database|Google_Service_SQLAdmin_Database $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($project, $instance, $database, Google_Service_SQLAdmin_Database $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'database' => $database, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_SQLAdmin_Operation");
    }
}

/**
 * The "flags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $flags = $sqladminService->flags;
 *  </code>
 */
class Google_Service_SQLAdmin_Flags_Resource extends Google_Service_Resource
{

    /**
     * List all available database flags for Google Cloud SQL instances.
     * (flags.listFlags)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listFlags($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_FlagsListResponse");
    }
}

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $instances = $sqladminService->instances;
 *  </code>
 */
class Google_Service_SQLAdmin_Instances_Resource extends Google_Service_Resource
{

    /**
     * Creates a Cloud SQL instance as a clone of the source instance.
     * (instances.cloneInstances)
     *
     * @param string $project Project ID of the source as well as the clone Cloud
     *                                                                                              SQL instance.
     * @param string $instance The ID of the Cloud SQL instance to be cloned
     *                                                                                              (source). This does not include the project ID.
     * @param Google_InstancesCloneRequest|Google_Service_SQLAdmin_InstancesCloneRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function cloneInstances($project, $instance, Google_Service_SQLAdmin_InstancesCloneRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('clone', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Deletes a Cloud SQL instance. (instances.delete)
     *
     * @param string $project Project ID of the project that contains the instance
     *                          to be deleted.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Exports data from a Cloud SQL instance to a Google Cloud Storage bucket as a
     * MySQL dump file. (instances.export)
     *
     * @param string $project Project ID of the project that contains the instance
     *                                                                                                to be exported.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                                project ID.
     * @param Google_InstancesExportRequest|Google_Service_SQLAdmin_InstancesExportRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function export($project, $instance, Google_Service_SQLAdmin_InstancesExportRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('export', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Retrieves a resource containing information about a Cloud SQL instance.
     * (instances.get)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SQLAdmin_DatabaseInstance");
    }

    /**
     * Imports data into a Cloud SQL instance from a MySQL dump file in Google Cloud
     * Storage. (instances.import)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                                project ID.
     * @param Google_InstancesImportRequest|Google_Service_SQLAdmin_InstancesImportRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function import($project, $instance, Google_Service_SQLAdmin_InstancesImportRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('import', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Creates a new Cloud SQL instance. (instances.insert)
     *
     * @param string $project Project ID of the project to which the newly created
     *                                                                                    Cloud SQL instances should belong.
     * @param Google_DatabaseInstance|Google_Service_SQLAdmin_DatabaseInstance $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Lists instances under a given project in the alphabetical order of the
     * instance name. (instances.listInstances)
     *
     * @param string $project Project ID of the project for which to list Cloud SQL
     *                          instances.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     * @opt_param string maxResults The maximum number of results to return per
     * response.
     */
    public function listInstances($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_InstancesListResponse");
    }

    /**
     * Updates settings of a Cloud SQL instance. Caution: This is not a partial
     * update, so you must include values for all the settings that you want to
     * retain. For partial updates, use patch.. This method supports patch
     * semantics. (instances.patch)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                    project ID.
     * @param Google_DatabaseInstance|Google_Service_SQLAdmin_DatabaseInstance $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Promotes the read replica instance to be a stand-alone Cloud SQL instance.
     * (instances.promoteReplica)
     *
     * @param string $project ID of the project that contains the read replica.
     * @param string $instance Cloud SQL read replica instance name.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function promoteReplica($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('promoteReplica', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Deletes all client certificates and generates a new server SSL certificate
     * for the instance. The changes will not take effect until the instance is
     * restarted. Existing instances without a server certificate will need to call
     * this once to set a server certificate. (instances.resetSslConfig)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetSslConfig($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('resetSslConfig', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Restarts a Cloud SQL instance. (instances.restart)
     *
     * @param string $project Project ID of the project that contains the instance
     *                          to be restarted.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function restart($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('restart', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Restores a backup of a Cloud SQL instance. (instances.restoreBackup)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                                              project ID.
     * @param Google_InstancesRestoreBackupRequest|Google_Service_SQLAdmin_InstancesRestoreBackupRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function restoreBackup($project, $instance, Google_Service_SQLAdmin_InstancesRestoreBackupRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('restoreBackup', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Starts the replication in the read replica instance. (instances.startReplica)
     *
     * @param string $project ID of the project that contains the read replica.
     * @param string $instance Cloud SQL read replica instance name.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function startReplica($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('startReplica', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Stops the replication in the read replica instance. (instances.stopReplica)
     *
     * @param string $project ID of the project that contains the read replica.
     * @param string $instance Cloud SQL read replica instance name.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stopReplica($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('stopReplica', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Updates settings of a Cloud SQL instance. Caution: This is not a partial
     * update, so you must include values for all the settings that you want to
     * retain. For partial updates, use patch. (instances.update)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                    project ID.
     * @param Google_DatabaseInstance|Google_Service_SQLAdmin_DatabaseInstance $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $instance, Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_SQLAdmin_Operation");
    }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $operations = $sqladminService->operations;
 *  </code>
 */
class Google_Service_SQLAdmin_Operations_Resource extends Google_Service_Resource
{

    /**
     * Retrieves an instance operation that has been performed on an instance.
     * (operations.get)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $operation Instance operation ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Lists all instance operations that have been performed on the given Cloud SQL
     * instance in the reverse chronological order of the start time.
     * (operations.listOperations)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxResults Maximum number of operations per response.
     * @opt_param string pageToken A previously-returned page token representing
     * part of the larger set of results to view.
     */
    public function listOperations($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_OperationsListResponse");
    }
}

/**
 * The "sslCerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $sslCerts = $sqladminService->sslCerts;
 *  </code>
 */
class Google_Service_SQLAdmin_SslCerts_Resource extends Google_Service_Resource
{

    /**
     * Deletes the SSL certificate. The change will not take effect until the
     * instance is restarted. (sslCerts.delete)
     *
     * @param string $project Project ID of the project that contains the instance
     *                                to be deleted.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                project ID.
     * @param string $sha1Fingerprint Sha1 FingerPrint.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $instance, $sha1Fingerprint, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Retrieves a particular SSL certificate. Does not include the private key
     * (required for usage). The private key must be saved from the response to
     * initial creation. (sslCerts.get)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                project ID.
     * @param string $sha1Fingerprint Sha1 FingerPrint.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $instance, $sha1Fingerprint, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SQLAdmin_SslCert");
    }

    /**
     * Creates an SSL certificate and returns it along with the private key and
     * server certificate authority. The new certificate will not be usable until
     * the instance is restarted. (sslCerts.insert)
     *
     * @param string $project Project ID of the project to which the newly created
     *                                                                                              Cloud SQL instances should belong.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                                                                                              project ID.
     * @param Google_Service_SQLAdmin_SslCertsInsertRequest|Google_SslCertsInsertRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $instance, Google_Service_SQLAdmin_SslCertsInsertRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_SQLAdmin_SslCertsInsertResponse");
    }

    /**
     * Lists all of the current SSL certificates for the instance.
     * (sslCerts.listSslCerts)
     *
     * @param string $project Project ID of the project for which to list Cloud SQL
     *                          instances.
     * @param string $instance Cloud SQL instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listSslCerts($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_SslCertsListResponse");
    }
}

/**
 * The "tiers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $tiers = $sqladminService->tiers;
 *  </code>
 */
class Google_Service_SQLAdmin_Tiers_Resource extends Google_Service_Resource
{

    /**
     * Lists all available service tiers for Google Cloud SQL, for example D1, D2.
     * For related information, see Pricing. (tiers.listTiers)
     *
     * @param string $project Project ID of the project for which to list tiers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listTiers($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_TiersListResponse");
    }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google_Service_SQLAdmin(...);
 *   $users = $sqladminService->users;
 *  </code>
 */
class Google_Service_SQLAdmin_Users_Resource extends Google_Service_Resource
{

    /**
     * Deletes a user from a Cloud SQL instance. (users.delete)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                          project ID.
     * @param string $host Host of the user in the instance.
     * @param string $name Name of the user in the instance.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $instance, $host, $name, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'host' => $host, 'name' => $name];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Creates a new user in a Cloud SQL instance. (users.insert)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                                                            project ID.
     * @param Google_Service_SQLAdmin_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, $instance, Google_Service_SQLAdmin_User $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_SQLAdmin_Operation");
    }

    /**
     * Lists users in the specified Cloud SQL instance. (users.listUsers)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                          project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listUsers($project, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SQLAdmin_UsersListResponse");
    }

    /**
     * Updates an existing user in a Cloud SQL instance. (users.update)
     *
     * @param string $project Project ID of the project that contains the instance.
     * @param string $instance Database instance ID. This does not include the
     *                                                            project ID.
     * @param string $host Host of the user in the instance.
     * @param string $name Name of the user in the instance.
     * @param Google_Service_SQLAdmin_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($project, $instance, $host, $name, Google_Service_SQLAdmin_User $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'instance' => $instance, 'host' => $host, 'name' => $name, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_SQLAdmin_Operation");
    }
}


/**
 * Class Google_Service_SQLAdmin_AclEntry
 */
class Google_Service_SQLAdmin_AclEntry extends Google_Model
{
    public $expirationTime;
    public $kind;
    public $name;
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_SQLAdmin_BackupConfiguration
 */
class Google_Service_SQLAdmin_BackupConfiguration extends Google_Model
{
    public $binaryLogEnabled;
    public $enabled;
    public $kind;
    public $startTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBinaryLogEnabled()
    {
        return $this->binaryLogEnabled;
    }

    /**
     * @param $binaryLogEnabled
     */
    public function setBinaryLogEnabled($binaryLogEnabled)
    {
        $this->binaryLogEnabled = $binaryLogEnabled;
    }

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
}

/**
 * Class Google_Service_SQLAdmin_BackupRun
 */
class Google_Service_SQLAdmin_BackupRun extends Google_Model
{
    public $endTime;
    public $enqueuedTime;
    public $id;
    public $instance;
    public $kind;
    public $selfLink;
    public $startTime;
    public $status;
    public $windowStartTime;
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_SQLAdmin_OperationError';
    protected $errorDataType = '';

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
    public function getEnqueuedTime()
    {
        return $this->enqueuedTime;
    }

    /**
     * @param $enqueuedTime
     */
    public function setEnqueuedTime($enqueuedTime)
    {
        $this->enqueuedTime = $enqueuedTime;
    }

    /**
     * @param Google_Service_SQLAdmin_OperationError $error
     */
    public function setError(Google_Service_SQLAdmin_OperationError $error)
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
    public function getWindowStartTime()
    {
        return $this->windowStartTime;
    }

    /**
     * @param $windowStartTime
     */
    public function setWindowStartTime($windowStartTime)
    {
        $this->windowStartTime = $windowStartTime;
    }
}

/**
 * Class Google_Service_SQLAdmin_BackupRunsListResponse
 */
class Google_Service_SQLAdmin_BackupRunsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_BackupRun';
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
 * Class Google_Service_SQLAdmin_BinLogCoordinates
 */
class Google_Service_SQLAdmin_BinLogCoordinates extends Google_Model
{
    public $binLogFileName;
    public $binLogPosition;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBinLogFileName()
    {
        return $this->binLogFileName;
    }

    /**
     * @param $binLogFileName
     */
    public function setBinLogFileName($binLogFileName)
    {
        $this->binLogFileName = $binLogFileName;
    }

    /**
     * @return mixed
     */
    public function getBinLogPosition()
    {
        return $this->binLogPosition;
    }

    /**
     * @param $binLogPosition
     */
    public function setBinLogPosition($binLogPosition)
    {
        $this->binLogPosition = $binLogPosition;
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
 * Class Google_Service_SQLAdmin_CloneContext
 */
class Google_Service_SQLAdmin_CloneContext extends Google_Model
{
    public $destinationInstanceName;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $binLogCoordinatesType = 'Google_Service_SQLAdmin_BinLogCoordinates';
    protected $binLogCoordinatesDataType = '';

    /**
     * @param Google_Service_SQLAdmin_BinLogCoordinates $binLogCoordinates
     */
    public function setBinLogCoordinates(Google_Service_SQLAdmin_BinLogCoordinates $binLogCoordinates)
    {
        $this->binLogCoordinates = $binLogCoordinates;
    }

    /**
     * @return mixed
     */
    public function getBinLogCoordinates()
    {
        return $this->binLogCoordinates;
    }

    /**
     * @return mixed
     */
    public function getDestinationInstanceName()
    {
        return $this->destinationInstanceName;
    }

    /**
     * @param $destinationInstanceName
     */
    public function setDestinationInstanceName($destinationInstanceName)
    {
        $this->destinationInstanceName = $destinationInstanceName;
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
 * Class Google_Service_SQLAdmin_Database
 */
class Google_Service_SQLAdmin_Database extends Google_Model
{
    public $charset;
    public $collation;
    public $etag;
    public $instance;
    public $kind;
    public $name;
    public $project;
    public $selfLink;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @param $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    /**
     * @return mixed
     */
    public function getCollation()
    {
        return $this->collation;
    }

    /**
     * @param $collation
     */
    public function setCollation($collation)
    {
        $this->collation = $collation;
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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param $project
     */
    public function setProject($project)
    {
        $this->project = $project;
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
 * Class Google_Service_SQLAdmin_DatabaseFlags
 */
class Google_Service_SQLAdmin_DatabaseFlags extends Google_Model
{
    public $name;
    public $value;
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
 * Class Google_Service_SQLAdmin_DatabaseInstance
 */
class Google_Service_SQLAdmin_DatabaseInstance extends Google_Collection
{
    public $currentDiskSize;
    public $databaseVersion;
    public $etag;
    public $instanceType;
    public $ipv6Address;
    public $kind;
    public $masterInstanceName;
    public $maxDiskSize;
    public $name;
    public $project;
    public $region;
    public $replicaNames;
    public $selfLink;
    public $serviceAccountEmailAddress;
    public $state;
    protected $collection_key = 'replicaNames';
    protected $internal_gapi_mappings = [];
    protected $ipAddressesType = 'Google_Service_SQLAdmin_IpMapping';
    protected $ipAddressesDataType = 'array';
    protected $onPremisesConfigurationType = 'Google_Service_SQLAdmin_OnPremisesConfiguration';
    protected $onPremisesConfigurationDataType = '';
    protected $replicaConfigurationType = 'Google_Service_SQLAdmin_ReplicaConfiguration';
    protected $replicaConfigurationDataType = '';
    protected $serverCaCertType = 'Google_Service_SQLAdmin_SslCert';
    protected $serverCaCertDataType = '';
    protected $settingsType = 'Google_Service_SQLAdmin_Settings';
    protected $settingsDataType = '';

    /**
     * @return mixed
     */
    public function getCurrentDiskSize()
    {
        return $this->currentDiskSize;
    }

    /**
     * @param $currentDiskSize
     */
    public function setCurrentDiskSize($currentDiskSize)
    {
        $this->currentDiskSize = $currentDiskSize;
    }

    /**
     * @return mixed
     */
    public function getDatabaseVersion()
    {
        return $this->databaseVersion;
    }

    /**
     * @param $databaseVersion
     */
    public function setDatabaseVersion($databaseVersion)
    {
        $this->databaseVersion = $databaseVersion;
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
    public function getInstanceType()
    {
        return $this->instanceType;
    }

    /**
     * @param $instanceType
     */
    public function setInstanceType($instanceType)
    {
        $this->instanceType = $instanceType;
    }

    /**
     * @param $ipAddresses
     */
    public function setIpAddresses($ipAddresses)
    {
        $this->ipAddresses = $ipAddresses;
    }

    /**
     * @return mixed
     */
    public function getIpAddresses()
    {
        return $this->ipAddresses;
    }

    /**
     * @return mixed
     */
    public function getIpv6Address()
    {
        return $this->ipv6Address;
    }

    /**
     * @param $ipv6Address
     */
    public function setIpv6Address($ipv6Address)
    {
        $this->ipv6Address = $ipv6Address;
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
    public function getMasterInstanceName()
    {
        return $this->masterInstanceName;
    }

    /**
     * @param $masterInstanceName
     */
    public function setMasterInstanceName($masterInstanceName)
    {
        $this->masterInstanceName = $masterInstanceName;
    }

    /**
     * @return mixed
     */
    public function getMaxDiskSize()
    {
        return $this->maxDiskSize;
    }

    /**
     * @param $maxDiskSize
     */
    public function setMaxDiskSize($maxDiskSize)
    {
        $this->maxDiskSize = $maxDiskSize;
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
     * @param Google_Service_SQLAdmin_OnPremisesConfiguration $onPremisesConfiguration
     */
    public function setOnPremisesConfiguration(Google_Service_SQLAdmin_OnPremisesConfiguration $onPremisesConfiguration)
    {
        $this->onPremisesConfiguration = $onPremisesConfiguration;
    }

    /**
     * @return mixed
     */
    public function getOnPremisesConfiguration()
    {
        return $this->onPremisesConfiguration;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param $project
     */
    public function setProject($project)
    {
        $this->project = $project;
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
     * @param Google_Service_SQLAdmin_ReplicaConfiguration $replicaConfiguration
     */
    public function setReplicaConfiguration(Google_Service_SQLAdmin_ReplicaConfiguration $replicaConfiguration)
    {
        $this->replicaConfiguration = $replicaConfiguration;
    }

    /**
     * @return mixed
     */
    public function getReplicaConfiguration()
    {
        return $this->replicaConfiguration;
    }

    /**
     * @return mixed
     */
    public function getReplicaNames()
    {
        return $this->replicaNames;
    }

    /**
     * @param $replicaNames
     */
    public function setReplicaNames($replicaNames)
    {
        $this->replicaNames = $replicaNames;
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
     * @param Google_Service_SQLAdmin_SslCert $serverCaCert
     */
    public function setServerCaCert(Google_Service_SQLAdmin_SslCert $serverCaCert)
    {
        $this->serverCaCert = $serverCaCert;
    }

    /**
     * @return mixed
     */
    public function getServerCaCert()
    {
        return $this->serverCaCert;
    }

    /**
     * @return mixed
     */
    public function getServiceAccountEmailAddress()
    {
        return $this->serviceAccountEmailAddress;
    }

    /**
     * @param $serviceAccountEmailAddress
     */
    public function setServiceAccountEmailAddress($serviceAccountEmailAddress)
    {
        $this->serviceAccountEmailAddress = $serviceAccountEmailAddress;
    }

    /**
     * @param Google_Service_SQLAdmin_Settings $settings
     */
    public function setSettings(Google_Service_SQLAdmin_Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
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
 * Class Google_Service_SQLAdmin_DatabasesListResponse
 */
class Google_Service_SQLAdmin_DatabasesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_Database';
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
 * Class Google_Service_SQLAdmin_ExportContext
 */
class Google_Service_SQLAdmin_ExportContext extends Google_Collection
{
    public $databases;
    public $fileType;
    public $kind;
    public $uri;
    protected $collection_key = 'databases';
    protected $internal_gapi_mappings = [];
    protected $csvExportOptionsType = 'Google_Service_SQLAdmin_ExportContextCsvExportOptions';
    protected $csvExportOptionsDataType = '';
    protected $sqlExportOptionsType = 'Google_Service_SQLAdmin_ExportContextSqlExportOptions';
    protected $sqlExportOptionsDataType = '';

    /**
     * @param Google_Service_SQLAdmin_ExportContextCsvExportOptions $csvExportOptions
     */
    public function setCsvExportOptions(Google_Service_SQLAdmin_ExportContextCsvExportOptions $csvExportOptions)
    {
        $this->csvExportOptions = $csvExportOptions;
    }

    /**
     * @return mixed
     */
    public function getCsvExportOptions()
    {
        return $this->csvExportOptions;
    }

    /**
     * @return mixed
     */
    public function getDatabases()
    {
        return $this->databases;
    }

    /**
     * @param $databases
     */
    public function setDatabases($databases)
    {
        $this->databases = $databases;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
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
     * @param Google_Service_SQLAdmin_ExportContextSqlExportOptions $sqlExportOptions
     */
    public function setSqlExportOptions(Google_Service_SQLAdmin_ExportContextSqlExportOptions $sqlExportOptions)
    {
        $this->sqlExportOptions = $sqlExportOptions;
    }

    /**
     * @return mixed
     */
    public function getSqlExportOptions()
    {
        return $this->sqlExportOptions;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}

/**
 * Class Google_Service_SQLAdmin_ExportContextCsvExportOptions
 */
class Google_Service_SQLAdmin_ExportContextCsvExportOptions extends Google_Model
{
    public $selectQuery;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getSelectQuery()
    {
        return $this->selectQuery;
    }

    /**
     * @param $selectQuery
     */
    public function setSelectQuery($selectQuery)
    {
        $this->selectQuery = $selectQuery;
    }
}

/**
 * Class Google_Service_SQLAdmin_ExportContextSqlExportOptions
 */
class Google_Service_SQLAdmin_ExportContextSqlExportOptions extends Google_Collection
{
    public $tables;
    protected $collection_key = 'tables';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @param $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }
}

/**
 * Class Google_Service_SQLAdmin_Flag
 */
class Google_Service_SQLAdmin_Flag extends Google_Collection
{
    public $allowedStringValues;
    public $appliesTo;
    public $kind;
    public $maxValue;
    public $minValue;
    public $name;
    public $type;
    protected $collection_key = 'appliesTo';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowedStringValues()
    {
        return $this->allowedStringValues;
    }

    /**
     * @param $allowedStringValues
     */
    public function setAllowedStringValues($allowedStringValues)
    {
        $this->allowedStringValues = $allowedStringValues;
    }

    /**
     * @return mixed
     */
    public function getAppliesTo()
    {
        return $this->appliesTo;
    }

    /**
     * @param $appliesTo
     */
    public function setAppliesTo($appliesTo)
    {
        $this->appliesTo = $appliesTo;
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
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param $maxValue
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return mixed
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
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
 * Class Google_Service_SQLAdmin_FlagsListResponse
 */
class Google_Service_SQLAdmin_FlagsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_Flag';
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
 * Class Google_Service_SQLAdmin_ImportContext
 */
class Google_Service_SQLAdmin_ImportContext extends Google_Model
{
    public $database;
    public $fileType;
    public $kind;
    public $uri;
    protected $internal_gapi_mappings = [];
    protected $csvImportOptionsType = 'Google_Service_SQLAdmin_ImportContextCsvImportOptions';
    protected $csvImportOptionsDataType = '';

    /**
     * @param Google_Service_SQLAdmin_ImportContextCsvImportOptions $csvImportOptions
     */
    public function setCsvImportOptions(Google_Service_SQLAdmin_ImportContextCsvImportOptions $csvImportOptions)
    {
        $this->csvImportOptions = $csvImportOptions;
    }

    /**
     * @return mixed
     */
    public function getCsvImportOptions()
    {
        return $this->csvImportOptions;
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
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
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}

/**
 * Class Google_Service_SQLAdmin_ImportContextCsvImportOptions
 */
class Google_Service_SQLAdmin_ImportContextCsvImportOptions extends Google_Collection
{
    public $columns;
    public $table;
    protected $collection_key = 'columns';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

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
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
}

/**
 * Class Google_Service_SQLAdmin_InstancesCloneRequest
 */
class Google_Service_SQLAdmin_InstancesCloneRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $cloneContextType = 'Google_Service_SQLAdmin_CloneContext';
    protected $cloneContextDataType = '';


    /**
     * @param Google_Service_SQLAdmin_CloneContext $cloneContext
     */
    public function setCloneContext(Google_Service_SQLAdmin_CloneContext $cloneContext)
    {
        $this->cloneContext = $cloneContext;
    }

    /**
     * @return mixed
     */
    public function getCloneContext()
    {
        return $this->cloneContext;
    }
}

/**
 * Class Google_Service_SQLAdmin_InstancesExportRequest
 */
class Google_Service_SQLAdmin_InstancesExportRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $exportContextType = 'Google_Service_SQLAdmin_ExportContext';
    protected $exportContextDataType = '';


    /**
     * @param Google_Service_SQLAdmin_ExportContext $exportContext
     */
    public function setExportContext(Google_Service_SQLAdmin_ExportContext $exportContext)
    {
        $this->exportContext = $exportContext;
    }

    /**
     * @return mixed
     */
    public function getExportContext()
    {
        return $this->exportContext;
    }
}

/**
 * Class Google_Service_SQLAdmin_InstancesImportRequest
 */
class Google_Service_SQLAdmin_InstancesImportRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $importContextType = 'Google_Service_SQLAdmin_ImportContext';
    protected $importContextDataType = '';


    /**
     * @param Google_Service_SQLAdmin_ImportContext $importContext
     */
    public function setImportContext(Google_Service_SQLAdmin_ImportContext $importContext)
    {
        $this->importContext = $importContext;
    }

    /**
     * @return mixed
     */
    public function getImportContext()
    {
        return $this->importContext;
    }
}

/**
 * Class Google_Service_SQLAdmin_InstancesListResponse
 */
class Google_Service_SQLAdmin_InstancesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_DatabaseInstance';
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
 * Class Google_Service_SQLAdmin_InstancesRestoreBackupRequest
 */
class Google_Service_SQLAdmin_InstancesRestoreBackupRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $restoreBackupContextType = 'Google_Service_SQLAdmin_RestoreBackupContext';
    protected $restoreBackupContextDataType = '';


    /**
     * @param Google_Service_SQLAdmin_RestoreBackupContext $restoreBackupContext
     */
    public function setRestoreBackupContext(Google_Service_SQLAdmin_RestoreBackupContext $restoreBackupContext)
    {
        $this->restoreBackupContext = $restoreBackupContext;
    }

    /**
     * @return mixed
     */
    public function getRestoreBackupContext()
    {
        return $this->restoreBackupContext;
    }
}

/**
 * Class Google_Service_SQLAdmin_IpConfiguration
 */
class Google_Service_SQLAdmin_IpConfiguration extends Google_Collection
{
    public $ipv4Enabled;
    public $requireSsl;
    protected $collection_key = 'authorizedNetworks';
    protected $internal_gapi_mappings = [];
    protected $authorizedNetworksType = 'Google_Service_SQLAdmin_AclEntry';
    protected $authorizedNetworksDataType = 'array';

    /**
     * @param $authorizedNetworks
     */
    public function setAuthorizedNetworks($authorizedNetworks)
    {
        $this->authorizedNetworks = $authorizedNetworks;
    }

    /**
     * @return mixed
     */
    public function getAuthorizedNetworks()
    {
        return $this->authorizedNetworks;
    }

    /**
     * @return mixed
     */
    public function getIpv4Enabled()
    {
        return $this->ipv4Enabled;
    }

    /**
     * @param $ipv4Enabled
     */
    public function setIpv4Enabled($ipv4Enabled)
    {
        $this->ipv4Enabled = $ipv4Enabled;
    }

    /**
     * @return mixed
     */
    public function getRequireSsl()
    {
        return $this->requireSsl;
    }

    /**
     * @param $requireSsl
     */
    public function setRequireSsl($requireSsl)
    {
        $this->requireSsl = $requireSsl;
    }
}

/**
 * Class Google_Service_SQLAdmin_IpMapping
 */
class Google_Service_SQLAdmin_IpMapping extends Google_Model
{
    public $ipAddress;
    public $timeToRetire;
    protected $internal_gapi_mappings = [];

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
    public function getTimeToRetire()
    {
        return $this->timeToRetire;
    }

    /**
     * @param $timeToRetire
     */
    public function setTimeToRetire($timeToRetire)
    {
        $this->timeToRetire = $timeToRetire;
    }
}

/**
 * Class Google_Service_SQLAdmin_LocationPreference
 */
class Google_Service_SQLAdmin_LocationPreference extends Google_Model
{
    public $followGaeApplication;
    public $kind;
    public $zone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFollowGaeApplication()
    {
        return $this->followGaeApplication;
    }

    /**
     * @param $followGaeApplication
     */
    public function setFollowGaeApplication($followGaeApplication)
    {
        $this->followGaeApplication = $followGaeApplication;
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
 * Class Google_Service_SQLAdmin_MySqlReplicaConfiguration
 */
class Google_Service_SQLAdmin_MySqlReplicaConfiguration extends Google_Model
{
    public $caCertificate;
    public $clientCertificate;
    public $clientKey;
    public $connectRetryInterval;
    public $dumpFilePath;
    public $kind;
    public $masterHeartbeatPeriod;
    public $password;
    public $sslCipher;
    public $username;
    public $verifyServerCertificate;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaCertificate()
    {
        return $this->caCertificate;
    }

    /**
     * @param $caCertificate
     */
    public function setCaCertificate($caCertificate)
    {
        $this->caCertificate = $caCertificate;
    }

    /**
     * @return mixed
     */
    public function getClientCertificate()
    {
        return $this->clientCertificate;
    }

    /**
     * @param $clientCertificate
     */
    public function setClientCertificate($clientCertificate)
    {
        $this->clientCertificate = $clientCertificate;
    }

    /**
     * @return mixed
     */
    public function getClientKey()
    {
        return $this->clientKey;
    }

    /**
     * @param $clientKey
     */
    public function setClientKey($clientKey)
    {
        $this->clientKey = $clientKey;
    }

    /**
     * @return mixed
     */
    public function getConnectRetryInterval()
    {
        return $this->connectRetryInterval;
    }

    /**
     * @param $connectRetryInterval
     */
    public function setConnectRetryInterval($connectRetryInterval)
    {
        $this->connectRetryInterval = $connectRetryInterval;
    }

    /**
     * @return mixed
     */
    public function getDumpFilePath()
    {
        return $this->dumpFilePath;
    }

    /**
     * @param $dumpFilePath
     */
    public function setDumpFilePath($dumpFilePath)
    {
        $this->dumpFilePath = $dumpFilePath;
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
    public function getMasterHeartbeatPeriod()
    {
        return $this->masterHeartbeatPeriod;
    }

    /**
     * @param $masterHeartbeatPeriod
     */
    public function setMasterHeartbeatPeriod($masterHeartbeatPeriod)
    {
        $this->masterHeartbeatPeriod = $masterHeartbeatPeriod;
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
    public function getSslCipher()
    {
        return $this->sslCipher;
    }

    /**
     * @param $sslCipher
     */
    public function setSslCipher($sslCipher)
    {
        $this->sslCipher = $sslCipher;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getVerifyServerCertificate()
    {
        return $this->verifyServerCertificate;
    }

    /**
     * @param $verifyServerCertificate
     */
    public function setVerifyServerCertificate($verifyServerCertificate)
    {
        $this->verifyServerCertificate = $verifyServerCertificate;
    }
}

/**
 * Class Google_Service_SQLAdmin_OnPremisesConfiguration
 */
class Google_Service_SQLAdmin_OnPremisesConfiguration extends Google_Model
{
    public $hostPort;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHostPort()
    {
        return $this->hostPort;
    }

    /**
     * @param $hostPort
     */
    public function setHostPort($hostPort)
    {
        $this->hostPort = $hostPort;
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
 * Class Google_Service_SQLAdmin_Operation
 */
class Google_Service_SQLAdmin_Operation extends Google_Model
{
    public $endTime;
    public $insertTime;
    public $kind;
    public $name;
    public $operationType;
    public $selfLink;
    public $startTime;
    public $status;
    public $targetId;
    public $targetLink;
    public $targetProject;
    public $user;
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_SQLAdmin_OperationErrors';
    protected $errorDataType = '';
    protected $exportContextType = 'Google_Service_SQLAdmin_ExportContext';
    protected $exportContextDataType = '';
    protected $importContextType = 'Google_Service_SQLAdmin_ImportContext';
    protected $importContextDataType = '';

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
     * @param Google_Service_SQLAdmin_OperationErrors $error
     */
    public function setError(Google_Service_SQLAdmin_OperationErrors $error)
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
     * @param Google_Service_SQLAdmin_ExportContext $exportContext
     */
    public function setExportContext(Google_Service_SQLAdmin_ExportContext $exportContext)
    {
        $this->exportContext = $exportContext;
    }

    /**
     * @return mixed
     */
    public function getExportContext()
    {
        return $this->exportContext;
    }

    /**
     * @param Google_Service_SQLAdmin_ImportContext $importContext
     */
    public function setImportContext(Google_Service_SQLAdmin_ImportContext $importContext)
    {
        $this->importContext = $importContext;
    }

    /**
     * @return mixed
     */
    public function getImportContext()
    {
        return $this->importContext;
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
    public function getTargetProject()
    {
        return $this->targetProject;
    }

    /**
     * @param $targetProject
     */
    public function setTargetProject($targetProject)
    {
        $this->targetProject = $targetProject;
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
 * Class Google_Service_SQLAdmin_OperationError
 */
class Google_Service_SQLAdmin_OperationError extends Google_Model
{
    public $code;
    public $kind;
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
 * Class Google_Service_SQLAdmin_OperationErrors
 */
class Google_Service_SQLAdmin_OperationErrors extends Google_Collection
{
    public $kind;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_SQLAdmin_OperationError';
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
 * Class Google_Service_SQLAdmin_OperationsListResponse
 */
class Google_Service_SQLAdmin_OperationsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_Operation';
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
 * Class Google_Service_SQLAdmin_ReplicaConfiguration
 */
class Google_Service_SQLAdmin_ReplicaConfiguration extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $mysqlReplicaConfigurationType = 'Google_Service_SQLAdmin_MySqlReplicaConfiguration';
    protected $mysqlReplicaConfigurationDataType = '';

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
     * @param Google_Service_SQLAdmin_MySqlReplicaConfiguration $mysqlReplicaConfiguration
     */
    public function setMysqlReplicaConfiguration(Google_Service_SQLAdmin_MySqlReplicaConfiguration $mysqlReplicaConfiguration)
    {
        $this->mysqlReplicaConfiguration = $mysqlReplicaConfiguration;
    }

    /**
     * @return mixed
     */
    public function getMysqlReplicaConfiguration()
    {
        return $this->mysqlReplicaConfiguration;
    }
}

/**
 * Class Google_Service_SQLAdmin_RestoreBackupContext
 */
class Google_Service_SQLAdmin_RestoreBackupContext extends Google_Model
{
    public $backupRunId;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackupRunId()
    {
        return $this->backupRunId;
    }

    /**
     * @param $backupRunId
     */
    public function setBackupRunId($backupRunId)
    {
        $this->backupRunId = $backupRunId;
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
 * Class Google_Service_SQLAdmin_Settings
 */
class Google_Service_SQLAdmin_Settings extends Google_Collection
{
    public $activationPolicy;
    public $authorizedGaeApplications;
    public $crashSafeReplicationEnabled;
    public $databaseReplicationEnabled;
    public $kind;
    public $pricingPlan;
    public $replicationType;
    public $settingsVersion;
    public $tier;
    protected $collection_key = 'databaseFlags';
    protected $internal_gapi_mappings = [];
    protected $backupConfigurationType = 'Google_Service_SQLAdmin_BackupConfiguration';
    protected $backupConfigurationDataType = '';
    protected $databaseFlagsType = 'Google_Service_SQLAdmin_DatabaseFlags';
    protected $databaseFlagsDataType = 'array';
    protected $ipConfigurationType = 'Google_Service_SQLAdmin_IpConfiguration';
    protected $ipConfigurationDataType = '';
    protected $locationPreferenceType = 'Google_Service_SQLAdmin_LocationPreference';
    protected $locationPreferenceDataType = '';

    /**
     * @return mixed
     */
    public function getActivationPolicy()
    {
        return $this->activationPolicy;
    }

    /**
     * @param $activationPolicy
     */
    public function setActivationPolicy($activationPolicy)
    {
        $this->activationPolicy = $activationPolicy;
    }

    /**
     * @return mixed
     */
    public function getAuthorizedGaeApplications()
    {
        return $this->authorizedGaeApplications;
    }

    /**
     * @param $authorizedGaeApplications
     */
    public function setAuthorizedGaeApplications($authorizedGaeApplications)
    {
        $this->authorizedGaeApplications = $authorizedGaeApplications;
    }

    /**
     * @param Google_Service_SQLAdmin_BackupConfiguration $backupConfiguration
     */
    public function setBackupConfiguration(Google_Service_SQLAdmin_BackupConfiguration $backupConfiguration)
    {
        $this->backupConfiguration = $backupConfiguration;
    }

    /**
     * @return mixed
     */
    public function getBackupConfiguration()
    {
        return $this->backupConfiguration;
    }

    /**
     * @return mixed
     */
    public function getCrashSafeReplicationEnabled()
    {
        return $this->crashSafeReplicationEnabled;
    }

    /**
     * @param $crashSafeReplicationEnabled
     */
    public function setCrashSafeReplicationEnabled($crashSafeReplicationEnabled)
    {
        $this->crashSafeReplicationEnabled = $crashSafeReplicationEnabled;
    }

    /**
     * @param $databaseFlags
     */
    public function setDatabaseFlags($databaseFlags)
    {
        $this->databaseFlags = $databaseFlags;
    }

    /**
     * @return mixed
     */
    public function getDatabaseFlags()
    {
        return $this->databaseFlags;
    }

    /**
     * @return mixed
     */
    public function getDatabaseReplicationEnabled()
    {
        return $this->databaseReplicationEnabled;
    }

    /**
     * @param $databaseReplicationEnabled
     */
    public function setDatabaseReplicationEnabled($databaseReplicationEnabled)
    {
        $this->databaseReplicationEnabled = $databaseReplicationEnabled;
    }

    /**
     * @param Google_Service_SQLAdmin_IpConfiguration $ipConfiguration
     */
    public function setIpConfiguration(Google_Service_SQLAdmin_IpConfiguration $ipConfiguration)
    {
        $this->ipConfiguration = $ipConfiguration;
    }

    /**
     * @return mixed
     */
    public function getIpConfiguration()
    {
        return $this->ipConfiguration;
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
     * @param Google_Service_SQLAdmin_LocationPreference $locationPreference
     */
    public function setLocationPreference(Google_Service_SQLAdmin_LocationPreference $locationPreference)
    {
        $this->locationPreference = $locationPreference;
    }

    /**
     * @return mixed
     */
    public function getLocationPreference()
    {
        return $this->locationPreference;
    }

    /**
     * @return mixed
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param $pricingPlan
     */
    public function setPricingPlan($pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;
    }

    /**
     * @return mixed
     */
    public function getReplicationType()
    {
        return $this->replicationType;
    }

    /**
     * @param $replicationType
     */
    public function setReplicationType($replicationType)
    {
        $this->replicationType = $replicationType;
    }

    /**
     * @return mixed
     */
    public function getSettingsVersion()
    {
        return $this->settingsVersion;
    }

    /**
     * @param $settingsVersion
     */
    public function setSettingsVersion($settingsVersion)
    {
        $this->settingsVersion = $settingsVersion;
    }

    /**
     * @return mixed
     */
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * @param $tier
     */
    public function setTier($tier)
    {
        $this->tier = $tier;
    }
}

/**
 * Class Google_Service_SQLAdmin_SslCert
 */
class Google_Service_SQLAdmin_SslCert extends Google_Model
{
    public $cert;
    public $certSerialNumber;
    public $commonName;
    public $createTime;
    public $expirationTime;
    public $instance;
    public $kind;
    public $selfLink;
    public $sha1Fingerprint;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCert()
    {
        return $this->cert;
    }

    /**
     * @param $cert
     */
    public function setCert($cert)
    {
        $this->cert = $cert;
    }

    /**
     * @return mixed
     */
    public function getCertSerialNumber()
    {
        return $this->certSerialNumber;
    }

    /**
     * @param $certSerialNumber
     */
    public function setCertSerialNumber($certSerialNumber)
    {
        $this->certSerialNumber = $certSerialNumber;
    }

    /**
     * @return mixed
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @param $commonName
     */
    public function setCommonName($commonName)
    {
        $this->commonName = $commonName;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
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
    public function getSha1Fingerprint()
    {
        return $this->sha1Fingerprint;
    }

    /**
     * @param $sha1Fingerprint
     */
    public function setSha1Fingerprint($sha1Fingerprint)
    {
        $this->sha1Fingerprint = $sha1Fingerprint;
    }
}

/**
 * Class Google_Service_SQLAdmin_SslCertDetail
 */
class Google_Service_SQLAdmin_SslCertDetail extends Google_Model
{
    public $certPrivateKey;
    protected $internal_gapi_mappings = [];
    protected $certInfoType = 'Google_Service_SQLAdmin_SslCert';
    protected $certInfoDataType = '';

    /**
     * @param Google_Service_SQLAdmin_SslCert $certInfo
     */
    public function setCertInfo(Google_Service_SQLAdmin_SslCert $certInfo)
    {
        $this->certInfo = $certInfo;
    }

    /**
     * @return mixed
     */
    public function getCertInfo()
    {
        return $this->certInfo;
    }

    /**
     * @return mixed
     */
    public function getCertPrivateKey()
    {
        return $this->certPrivateKey;
    }

    /**
     * @param $certPrivateKey
     */
    public function setCertPrivateKey($certPrivateKey)
    {
        $this->certPrivateKey = $certPrivateKey;
    }
}

/**
 * Class Google_Service_SQLAdmin_SslCertsInsertRequest
 */
class Google_Service_SQLAdmin_SslCertsInsertRequest extends Google_Model
{
    public $commonName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @param $commonName
     */
    public function setCommonName($commonName)
    {
        $this->commonName = $commonName;
    }
}

/**
 * Class Google_Service_SQLAdmin_SslCertsInsertResponse
 */
class Google_Service_SQLAdmin_SslCertsInsertResponse extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $clientCertType = 'Google_Service_SQLAdmin_SslCertDetail';
    protected $clientCertDataType = '';
    protected $serverCaCertType = 'Google_Service_SQLAdmin_SslCert';
    protected $serverCaCertDataType = '';


    /**
     * @param Google_Service_SQLAdmin_SslCertDetail $clientCert
     */
    public function setClientCert(Google_Service_SQLAdmin_SslCertDetail $clientCert)
    {
        $this->clientCert = $clientCert;
    }

    /**
     * @return mixed
     */
    public function getClientCert()
    {
        return $this->clientCert;
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
     * @param Google_Service_SQLAdmin_SslCert $serverCaCert
     */
    public function setServerCaCert(Google_Service_SQLAdmin_SslCert $serverCaCert)
    {
        $this->serverCaCert = $serverCaCert;
    }

    /**
     * @return mixed
     */
    public function getServerCaCert()
    {
        return $this->serverCaCert;
    }
}

/**
 * Class Google_Service_SQLAdmin_SslCertsListResponse
 */
class Google_Service_SQLAdmin_SslCertsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_SslCert';
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
 * Class Google_Service_SQLAdmin_Tier
 */
class Google_Service_SQLAdmin_Tier extends Google_Collection
{
    public $diskQuota;
    public $rAM;
    public $kind;
    public $region;
    public $tier;
    protected $collection_key = 'region';
    protected $internal_gapi_mappings = [
        "diskQuota" => "DiskQuota",
        "rAM" => "RAM",
    ];

    /**
     * @return mixed
     */
    public function getDiskQuota()
    {
        return $this->diskQuota;
    }

    /**
     * @param $diskQuota
     */
    public function setDiskQuota($diskQuota)
    {
        $this->diskQuota = $diskQuota;
    }

    /**
     * @return mixed
     */
    public function getRAM()
    {
        return $this->rAM;
    }

    /**
     * @param $rAM
     */
    public function setRAM($rAM)
    {
        $this->rAM = $rAM;
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
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * @param $tier
     */
    public function setTier($tier)
    {
        $this->tier = $tier;
    }
}

/**
 * Class Google_Service_SQLAdmin_TiersListResponse
 */
class Google_Service_SQLAdmin_TiersListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_Tier';
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
 * Class Google_Service_SQLAdmin_User
 */
class Google_Service_SQLAdmin_User extends Google_Model
{
    public $etag;
    public $host;
    public $instance;
    public $kind;
    public $name;
    public $password;
    public $project;
    protected $internal_gapi_mappings = [];

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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }
}

/**
 * Class Google_Service_SQLAdmin_UsersListResponse
 */
class Google_Service_SQLAdmin_UsersListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SQLAdmin_User';
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
