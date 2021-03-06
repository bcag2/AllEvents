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
 * Service definition for Logging (v1beta3).
 *
 * <p>
 * Google Cloud Logging API lets you create logs, ingest log entries, and manage
 * log sinks.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Logging extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";

    public $projects_logServices;
    public $projects_logServices_indexes;
    public $projects_logServices_sinks;
    public $projects_logs;
    public $projects_logs_entries;
    public $projects_logs_sinks;


    /**
     * Constructs the internal representation of the Logging service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = '';
        $this->version = 'v1beta3';
        $this->serviceName = 'logging';

        $this->projects_logServices = new Google_Service_Logging_ProjectsLogServices_Resource(
            $this,
            $this->serviceName,
            'logServices',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'log' => [
                                'location' => 'query',
                                'type' => 'string',
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
        $this->projects_logServices_indexes = new Google_Service_Logging_ProjectsLogServicesIndexes_Resource(
            $this,
            $this->serviceName,
            'indexes',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/indexes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'log' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'depth' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'indexPrefix' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_logServices_sinks = new Google_Service_Logging_ProjectsLogServicesSinks_Resource(
            $this,
            $this->serviceName,
            'sinks',
            [
                'methods' => [
                    'create' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'v1beta3/projects/{projectsId}/logServices/{logServicesId}/sinks/{sinksId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logServicesId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_logs = new Google_Service_Logging_ProjectsLogs_Resource(
            $this,
            $this->serviceName,
            'logs',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'serviceName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'serviceIndexPrefix' => [
                                'location' => 'query',
                                'type' => 'string',
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
        $this->projects_logs_entries = new Google_Service_Logging_ProjectsLogsEntries_Resource(
            $this,
            $this->serviceName,
            'entries',
            [
                'methods' => [
                    'write' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/entries:write',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_logs_sinks = new Google_Service_Logging_ProjectsLogsSinks_Resource(
            $this,
            $this->serviceName,
            'sinks',
            [
                'methods' => [
                    'create' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'v1beta3/projects/{projectsId}/logs/{logsId}/sinks/{sinksId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'projectsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'logsId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sinksId' => [
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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $projects = $loggingService->projects;
 *  </code>
 */
class Google_Service_Logging_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "logServices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logServices = $loggingService->logServices;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServices_Resource extends Google_Service_Resource
{

    /**
     * Lists log services associated with log entries ingested for a project.
     * (logServices.listProjectsLogServices)
     *
     * @param string $projectsId Part of `projectName`. The project resource whose
     *                           services are to be listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
     * prior `ListLogServices` operation. If `pageToken` is supplied, then the other
     * fields of this request are ignored, and instead the previous
     * `ListLogServices` operation is continued.
     * @opt_param string log The name of the log resource whose services are to be
     * listed. log for which to list services. When empty, all services are listed.
     * @opt_param int pageSize The maximum number of `LogService` objects to return
     * in one operation.
     */
    public function listProjectsLogServices($projectsId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Logging_ListLogServicesResponse");
    }
}

/**
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $indexes = $loggingService->indexes;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServicesIndexes_Resource extends Google_Service_Resource
{

    /**
     * Lists log service indexes associated with a log service.
     * (indexes.listProjectsLogServicesIndexes)
     *
     * @param string $projectsId Part of `serviceName`. A log service resource of
     *                              the form `/projects/logServices`. The service indexes of the log service are
     *                              returned. Example: `"/projects/myProj/logServices/appengine.googleapis.com"`.
     * @param string $logServicesId Part of `serviceName`. See documentation of
     *                              `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string log A log resource like
     * `/projects/project_id/logs/log_name`, identifying the log for which to list
     * service indexes.
     * @opt_param int pageSize The maximum number of log service index resources to
     * return in one operation.
     * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
     * prior `ListLogServiceIndexes` operation. If `pageToken` is supplied, then the
     * other fields of this request are ignored, and instead the previous
     * `ListLogServiceIndexes` operation is continued.
     * @opt_param int depth A limit to the number of levels of the index hierarchy
     * that are expanded. If `depth` is 0, it defaults to the level specified by the
     * prefix field (the number of slash separators). The default empty prefix
     * implies a `depth` of 1. It is an error for `depth` to be any non-zero value
     * less than the number of components in `indexPrefix`.
     * @opt_param string indexPrefix Restricts the indexes returned to be those with
     * a specified prefix. The prefix has the form `"/label_value/label_value/..."`,
     * in order corresponding to the [`LogService
     * indexKeys`][google.logging.v1.LogService.index_keys]. Non-empty prefixes must
     * begin with `/` . Example prefixes: + `"/myModule/"` retrieves App Engine
     * versions associated with `myModule`. The trailing slash terminates the value.
     * + `"/myModule"` retrieves App Engine modules with names beginning with
     * `myModule`. + `""` retrieves all indexes.
     */
    public function listProjectsLogServicesIndexes($projectsId, $logServicesId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Logging_ListLogServiceIndexesResponse");
    }
}

/**
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogServicesSinks_Resource extends Google_Service_Resource
{

    /**
     * Creates the specified log service sink resource. (sinks.create)
     *
     * @param string $projectsId Part of `serviceName`. The name of the service in
     *                                                                     which to create a sink.
     * @param string $logServicesId Part of `serviceName`. See documentation of
     *                                                                     `projectsId`.
     * @param Google_LogSink|Google_Service_Logging_LogSink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($projectsId, $logServicesId, Google_Service_Logging_LogSink $postBody, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Logging_LogSink");
    }

    /**
     * Deletes the specified log service sink. (sinks.delete)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink to delete.
     * @param string $logServicesId Part of `sinkName`. See documentation of
     *                              `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($projectsId, $logServicesId, $sinksId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Logging_Empty");
    }

    /**
     * Gets the specified log service sink resource. (sinks.get)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink to return.
     * @param string $logServicesId Part of `sinkName`. See documentation of
     *                              `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($projectsId, $logServicesId, $sinksId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Logging_LogSink");
    }

    /**
     * Lists log service sinks associated with the specified service.
     * (sinks.listProjectsLogServicesSinks)
     *
     * @param string $projectsId Part of `serviceName`. The name of the service for
     *                              which to list sinks.
     * @param string $logServicesId Part of `serviceName`. See documentation of
     *                              `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsLogServicesSinks($projectsId, $logServicesId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Logging_ListLogServiceSinksResponse");
    }

    /**
     * Creates or update the specified log service sink resource. (sinks.update)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink to update.
     * @param string $logServicesId Part of `sinkName`. See documentation of
     *                                                                     `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param Google_LogSink|Google_Service_Logging_LogSink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($projectsId, $logServicesId, $sinksId, Google_Service_Logging_LogSink $postBody, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logServicesId' => $logServicesId, 'sinksId' => $sinksId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Logging_LogSink");
    }
}

/**
 * The "logs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $logs = $loggingService->logs;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogs_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified log resource and all log entries contained in it.
     * (logs.delete)
     *
     * @param string $projectsId Part of `logName`. The log resource to delete.
     * @param string $logsId Part of `logName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($projectsId, $logsId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Logging_Empty");
    }

    /**
     * Lists log resources belonging to the specified project.
     * (logs.listProjectsLogs)
     *
     * @param string $projectsId Part of `projectName`. The project name for which
     *                           to list the log resources.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken An opaque token, returned as `nextPageToken` by a
     * prior `ListLogs` operation. If `pageToken` is supplied, then the other fields
     * of this request are ignored, and instead the previous `ListLogs` operation is
     * continued.
     * @opt_param string serviceName A service name for which to list logs. Only
     * logs containing entries whose metadata includes this service name are
     * returned. If `serviceName` and `serviceIndexPrefix` are both empty, then all
     * log names are returned. To list all log names, regardless of service, leave
     * both the `serviceName` and `serviceIndexPrefix` empty. To list log names
     * containing entries with a particular service name (or explicitly empty
     * service name) set `serviceName` to the desired value and `serviceIndexPrefix`
     * to `"/"`.
     * @opt_param string serviceIndexPrefix A log service index prefix for which to
     * list logs. Only logs containing entries whose metadata that includes these
     * label values (associated with index keys) are returned. The prefix is a slash
     * separated list of values, and need not specify all index labels. An empty
     * index (or a single slash) matches all log service indexes.
     * @opt_param int pageSize The maximum number of results to return.
     */
    public function listProjectsLogs($projectsId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Logging_ListLogsResponse");
    }
}

/**
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $entries = $loggingService->entries;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogsEntries_Resource extends Google_Service_Resource
{

    /**
     * Creates one or more log entries in a log. You must supply a list of
     * `LogEntry` objects, named `entries`. Each `LogEntry` object must contain a
     * payload object and a `LogEntryMetadata` object that describes the entry. You
     * must fill in all the fields of the entry, metadata, and payload. You can also
     * supply a map, `commonLabels`, that supplies default (key, value) data for the
     * `entries[].metadata.labels` maps, saving you the trouble of creating
     * identical copies for each entry. (entries.write)
     *
     * @param string $projectsId Part of `logName`. The name of the log resource
     *                                                                                                into which to insert the log entries.
     * @param string $logsId Part of `logName`. See documentation of `projectsId`.
     * @param Google_Service_Logging_WriteLogEntriesRequest|Google_WriteLogEntriesRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function write($projectsId, $logsId, Google_Service_Logging_WriteLogEntriesRequest $postBody, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('write', [$params], "Google_Service_Logging_WriteLogEntriesResponse");
    }
}

/**
 * The "sinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $sinks = $loggingService->sinks;
 *  </code>
 */
class Google_Service_Logging_ProjectsLogsSinks_Resource extends Google_Service_Resource
{

    /**
     * Creates the specified log sink resource. (sinks.create)
     *
     * @param string $projectsId Part of `logName`. The log in which to create a
     *                                                                  sink resource.
     * @param string $logsId Part of `logName`. See documentation of `projectsId`.
     * @param Google_LogSink|Google_Service_Logging_LogSink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($projectsId, $logsId, Google_Service_Logging_LogSink $postBody, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Logging_LogSink");
    }

    /**
     * Deletes the specified log sink resource. (sinks.delete)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink to delete.
     * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($projectsId, $logsId, $sinksId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Logging_Empty");
    }

    /**
     * Gets the specified log sink resource. (sinks.get)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink resource
     *                           to return.
     * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($projectsId, $logsId, $sinksId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Logging_LogSink");
    }

    /**
     * Lists log sinks associated with the specified log.
     * (sinks.listProjectsLogsSinks)
     *
     * @param string $projectsId Part of `logName`. The log for which to list sinks.
     * @param string $logsId Part of `logName`. See documentation of `projectsId`.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listProjectsLogsSinks($projectsId, $logsId, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Logging_ListLogSinksResponse");
    }

    /**
     * Creates or updates the specified log sink resource. (sinks.update)
     *
     * @param string $projectsId Part of `sinkName`. The name of the sink to update.
     * @param string $logsId Part of `sinkName`. See documentation of `projectsId`.
     * @param string $sinksId Part of `sinkName`. See documentation of `projectsId`.
     * @param Google_LogSink|Google_Service_Logging_LogSink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($projectsId, $logsId, $sinksId, Google_Service_Logging_LogSink $postBody, $optParams = [])
    {
        $params = ['projectsId' => $projectsId, 'logsId' => $logsId, 'sinksId' => $sinksId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Logging_LogSink");
    }
}


/**
 * Class Google_Service_Logging_Empty
 */
class Google_Service_Logging_Empty extends Google_Model
{
}

/**
 * Class Google_Service_Logging_ListLogServiceIndexesResponse
 */
class Google_Service_Logging_ListLogServiceIndexesResponse extends Google_Collection
{
    public $nextPageToken;
    public $serviceIndexPrefixes;
    protected $collection_key = 'serviceIndexPrefixes';
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
    public function getServiceIndexPrefixes()
    {
        return $this->serviceIndexPrefixes;
    }

    /**
     * @param $serviceIndexPrefixes
     */
    public function setServiceIndexPrefixes($serviceIndexPrefixes)
    {
        $this->serviceIndexPrefixes = $serviceIndexPrefixes;
    }
}

/**
 * Class Google_Service_Logging_ListLogServiceSinksResponse
 */
class Google_Service_Logging_ListLogServiceSinksResponse extends Google_Collection
{
    protected $collection_key = 'sinks';
    protected $internal_gapi_mappings = [];
    protected $sinksType = 'Google_Service_Logging_LogSink';
    protected $sinksDataType = 'array';


    /**
     * @param $sinks
     */
    public function setSinks($sinks)
    {
        $this->sinks = $sinks;
    }

    /**
     * @return mixed
     */
    public function getSinks()
    {
        return $this->sinks;
    }
}

/**
 * Class Google_Service_Logging_ListLogServicesResponse
 */
class Google_Service_Logging_ListLogServicesResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'logServices';
    protected $internal_gapi_mappings = [];
    protected $logServicesType = 'Google_Service_Logging_LogService';
    protected $logServicesDataType = 'array';

    /**
     * @param $logServices
     */
    public function setLogServices($logServices)
    {
        $this->logServices = $logServices;
    }

    /**
     * @return mixed
     */
    public function getLogServices()
    {
        return $this->logServices;
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
 * Class Google_Service_Logging_ListLogSinksResponse
 */
class Google_Service_Logging_ListLogSinksResponse extends Google_Collection
{
    protected $collection_key = 'sinks';
    protected $internal_gapi_mappings = [];
    protected $sinksType = 'Google_Service_Logging_LogSink';
    protected $sinksDataType = 'array';


    /**
     * @param $sinks
     */
    public function setSinks($sinks)
    {
        $this->sinks = $sinks;
    }

    /**
     * @return mixed
     */
    public function getSinks()
    {
        return $this->sinks;
    }
}

/**
 * Class Google_Service_Logging_ListLogsResponse
 */
class Google_Service_Logging_ListLogsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'logs';
    protected $internal_gapi_mappings = [];
    protected $logsType = 'Google_Service_Logging_Log';
    protected $logsDataType = 'array';

    /**
     * @param $logs
     */
    public function setLogs($logs)
    {
        $this->logs = $logs;
    }

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logs;
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
 * Class Google_Service_Logging_Log
 */
class Google_Service_Logging_Log extends Google_Model
{
    public $displayName;
    public $name;
    public $payloadType;
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
    public function getPayloadType()
    {
        return $this->payloadType;
    }

    /**
     * @param $payloadType
     */
    public function setPayloadType($payloadType)
    {
        $this->payloadType = $payloadType;
    }
}

/**
 * Class Google_Service_Logging_LogEntry
 */
class Google_Service_Logging_LogEntry extends Google_Model
{
    public $insertId;
    public $log;
    public $protoPayload;
    public $structPayload;
    public $textPayload;
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Logging_LogEntryMetadata';
    protected $metadataDataType = '';

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
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param $log
     */
    public function setLog($log)
    {
        $this->log = $log;
    }

    /**
     * @param Google_Service_Logging_LogEntryMetadata $metadata
     */
    public function setMetadata(Google_Service_Logging_LogEntryMetadata $metadata)
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
    public function getProtoPayload()
    {
        return $this->protoPayload;
    }

    /**
     * @param $protoPayload
     */
    public function setProtoPayload($protoPayload)
    {
        $this->protoPayload = $protoPayload;
    }

    /**
     * @return mixed
     */
    public function getStructPayload()
    {
        return $this->structPayload;
    }

    /**
     * @param $structPayload
     */
    public function setStructPayload($structPayload)
    {
        $this->structPayload = $structPayload;
    }

    /**
     * @return mixed
     */
    public function getTextPayload()
    {
        return $this->textPayload;
    }

    /**
     * @param $textPayload
     */
    public function setTextPayload($textPayload)
    {
        $this->textPayload = $textPayload;
    }
}

/**
 * Class Google_Service_Logging_LogEntryMetadata
 */
class Google_Service_Logging_LogEntryMetadata extends Google_Model
{
    public $labels;
    public $projectId;
    public $region;
    public $serviceName;
    public $severity;
    public $timestamp;
    public $userId;
    public $zone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
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
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * @return mixed
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * @param $severity
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
 * Class Google_Service_Logging_LogEntryMetadataLabels
 */
class Google_Service_Logging_LogEntryMetadataLabels extends Google_Model
{
}

/**
 * Class Google_Service_Logging_LogEntryProtoPayload
 */
class Google_Service_Logging_LogEntryProtoPayload extends Google_Model
{
}

/**
 * Class Google_Service_Logging_LogEntryStructPayload
 */
class Google_Service_Logging_LogEntryStructPayload extends Google_Model
{
}

/**
 * Class Google_Service_Logging_LogError
 */
class Google_Service_Logging_LogError extends Google_Model
{
    public $resource;
    public $timeNanos;
    protected $internal_gapi_mappings = [];
    protected $statusType = 'Google_Service_Logging_Status';
    protected $statusDataType = '';

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
     * @param Google_Service_Logging_Status $status
     */
    public function setStatus(Google_Service_Logging_Status $status)
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
    public function getTimeNanos()
    {
        return $this->timeNanos;
    }

    /**
     * @param $timeNanos
     */
    public function setTimeNanos($timeNanos)
    {
        $this->timeNanos = $timeNanos;
    }
}

/**
 * Class Google_Service_Logging_LogService
 */
class Google_Service_Logging_LogService extends Google_Collection
{
    public $indexKeys;
    public $name;
    protected $collection_key = 'indexKeys';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIndexKeys()
    {
        return $this->indexKeys;
    }

    /**
     * @param $indexKeys
     */
    public function setIndexKeys($indexKeys)
    {
        $this->indexKeys = $indexKeys;
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
 * Class Google_Service_Logging_LogSink
 */
class Google_Service_Logging_LogSink extends Google_Collection
{
    public $destination;
    public $name;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Logging_LogError';
    protected $errorsDataType = 'array';

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
 * Class Google_Service_Logging_Status
 */
class Google_Service_Logging_Status extends Google_Collection
{
    public $code;
    public $details;
    public $message;
    protected $collection_key = 'details';
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
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
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
 * Class Google_Service_Logging_StatusDetails
 */
class Google_Service_Logging_StatusDetails extends Google_Model
{
}

/**
 * Class Google_Service_Logging_WriteLogEntriesRequest
 */
class Google_Service_Logging_WriteLogEntriesRequest extends Google_Collection
{
    public $commonLabels;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_Logging_LogEntry';
    protected $entriesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCommonLabels()
    {
        return $this->commonLabels;
    }

    /**
     * @param $commonLabels
     */
    public function setCommonLabels($commonLabels)
    {
        $this->commonLabels = $commonLabels;
    }

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
 * Class Google_Service_Logging_WriteLogEntriesRequestCommonLabels
 */
class Google_Service_Logging_WriteLogEntriesRequestCommonLabels extends Google_Model
{
}

/**
 * Class Google_Service_Logging_WriteLogEntriesResponse
 */
class Google_Service_Logging_WriteLogEntriesResponse extends Google_Model
{
}
