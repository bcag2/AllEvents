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
 * Service definition for Fusiontables (v2).
 *
 * <p>
 * API for working with Fusion Tables data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fusiontables" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Fusiontables extends Google_Service
{
    /** Manage your Fusion Tables. */
    const FUSIONTABLES =
        "https://www.googleapis.com/auth/fusiontables";
    /** View your Fusion Tables. */
    const FUSIONTABLES_READONLY =
        "https://www.googleapis.com/auth/fusiontables.readonly";

    public $column;
    public $query;
    public $style;
    public $table;
    public $task;
    public $template;


    /**
     * Constructs the internal representation of the Fusiontables service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'fusiontables/v2/';
        $this->version = 'v2';
        $this->serviceName = 'fusiontables';

        $this->column = new Google_Service_Fusiontables_Column_Resource(
            $this,
            $this->serviceName,
            'column',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'tables/{tableId}/columns/{columnId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'columnId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}/columns/{columnId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'columnId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'tables/{tableId}/columns',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{tableId}/columns',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
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
                        'path' => 'tables/{tableId}/columns/{columnId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'columnId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'tables/{tableId}/columns/{columnId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'columnId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->query = new Google_Service_Fusiontables_Query_Resource(
            $this,
            $this->serviceName,
            'query',
            [
                'methods' => [
                    'sql' => [
                        'path' => 'query',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'sql' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'typed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'hdrs' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'sqlGet' => [
                        'path' => 'query',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'sql' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'typed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'hdrs' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->style = new Google_Service_Fusiontables_Style_Resource(
            $this,
            $this->serviceName,
            'style',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'tables/{tableId}/styles/{styleId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'styleId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}/styles/{styleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'styleId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'tables/{tableId}/styles',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{tableId}/styles',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
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
                        'path' => 'tables/{tableId}/styles/{styleId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'styleId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'tables/{tableId}/styles/{styleId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'styleId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->table = new Google_Service_Fusiontables_Table_Resource(
            $this,
            $this->serviceName,
            'table',
            [
                'methods' => [
                    'copy' => [
                        'path' => 'tables/{tableId}/copy',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'copyPresentation' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'tables/{tableId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'importRows' => [
                        'path' => 'tables/{tableId}/import',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startLine' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'isStrict' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'encoding' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'delimiter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endLine' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'importTable' => [
                        'path' => 'tables/import',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'delimiter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'encoding' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'tables',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'tables',
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
                    ], 'patch' => [
                        'path' => 'tables/{tableId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replaceViewDefinition' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'replaceRows' => [
                        'path' => 'tables/{tableId}/replace',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startLine' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'isStrict' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'encoding' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'delimiter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endLine' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'tables/{tableId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replaceViewDefinition' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->task = new Google_Service_Fusiontables_Task_Resource(
            $this,
            $this->serviceName,
            'task',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'tables/{tableId}/tasks/{taskId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}/tasks/{taskId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{tableId}/tasks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
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
                        ],
                    ],
                ]
            ]
        );
        $this->template = new Google_Service_Fusiontables_Template_Resource(
            $this,
            $this->serviceName,
            'template',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'tables/{tableId}/templates/{templateId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'tables/{tableId}/templates/{templateId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'tables/{tableId}/templates',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'tables/{tableId}/templates',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tableId' => [
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
                        'path' => 'tables/{tableId}/templates/{templateId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'tables/{tableId}/templates/{templateId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'templateId' => [
                                'location' => 'path',
                                'type' => 'integer',
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
 * The "column" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $column = $fusiontablesService->column;
 *  </code>
 */
class Google_Service_Fusiontables_Column_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified column. (column.delete)
     *
     * @param string $tableId Table from which the column is being deleted.
     * @param string $columnId Name or identifier for the column being deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tableId, $columnId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'columnId' => $columnId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a specific column by its ID. (column.get)
     *
     * @param string $tableId Table to which the column belongs.
     * @param string $columnId Name or identifier for the column that is being
     *                          requested.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tableId, $columnId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'columnId' => $columnId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fusiontables_Column");
    }

    /**
     * Adds a new column to the table. (column.insert)
     *
     * @param string $tableId Table for which a new column is being added.
     * @param Google_Column|Google_Service_Fusiontables_Column $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($tableId, Google_Service_Fusiontables_Column $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Fusiontables_Column");
    }

    /**
     * Retrieves a list of columns. (column.listColumn)
     *
     * @param string $tableId Table whose columns are being listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token specifying which result page
     * to return.
     * @opt_param string maxResults Maximum number of columns to return. Default is
     * 5.
     */
    public function listColumn($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fusiontables_ColumnList");
    }

    /**
     * Updates the name or type of an existing column. This method supports patch
     * semantics. (column.patch)
     *
     * @param string $tableId Table for which the column is being updated.
     * @param string $columnId Name or identifier for the column that is being
     *                                                                    updated.
     * @param Google_Column|Google_Service_Fusiontables_Column $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($tableId, $columnId, Google_Service_Fusiontables_Column $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'columnId' => $columnId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fusiontables_Column");
    }

    /**
     * Updates the name or type of an existing column. (column.update)
     *
     * @param string $tableId Table for which the column is being updated.
     * @param string $columnId Name or identifier for the column that is being
     *                                                                    updated.
     * @param Google_Column|Google_Service_Fusiontables_Column $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($tableId, $columnId, Google_Service_Fusiontables_Column $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'columnId' => $columnId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fusiontables_Column");
    }
}

/**
 * The "query" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $query = $fusiontablesService->query;
 *  </code>
 */
class Google_Service_Fusiontables_Query_Resource extends Google_Service_Resource
{

    /**
     * Executes a Fusion Tables SQL statement, which can be any of - SELECT - INSERT
     * - UPDATE - DELETE - SHOW - DESCRIBE - CREATE statement. (query.sql)
     *
     * @param string $sql A Fusion Tables SQL statement, which can be any of -
     *                          SELECT - INSERT - UPDATE - DELETE - SHOW - DESCRIBE - CREATE
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool typed Whether typed values are returned in the (JSON)
     * response: numbers for numeric values and parsed geometries for KML values.
     * Default is true.
     * @opt_param bool hdrs Whether column names are included in the first row.
     * Default is true.
     */
    public function sql($sql, $optParams = [])
    {
        $params = ['sql' => $sql];
        $params = array_merge($params, $optParams);

        return $this->call('sql', [$params], "Google_Service_Fusiontables_Sqlresponse");
    }

    /**
     * Executes a SQL statement which can be any of - SELECT - SHOW - DESCRIBE
     * (query.sqlGet)
     *
     * @param string $sql A SQL statement which can be any of - SELECT - SHOW -
     *                          DESCRIBE
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool typed Whether typed values are returned in the (JSON)
     * response: numbers for numeric values and parsed geometries for KML values.
     * Default is true.
     * @opt_param bool hdrs Whether column names are included (in the first row).
     * Default is true.
     */
    public function sqlGet($sql, $optParams = [])
    {
        $params = ['sql' => $sql];
        $params = array_merge($params, $optParams);

        return $this->call('sqlGet', [$params], "Google_Service_Fusiontables_Sqlresponse");
    }
}

/**
 * The "style" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $style = $fusiontablesService->style;
 *  </code>
 */
class Google_Service_Fusiontables_Style_Resource extends Google_Service_Resource
{

    /**
     * Deletes a style. (style.delete)
     *
     * @param string $tableId Table from which the style is being deleted
     * @param int $styleId Identifier (within a table) for the style being deleted
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tableId, $styleId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'styleId' => $styleId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a specific style. (style.get)
     *
     * @param string $tableId Table to which the requested style belongs
     * @param int $styleId Identifier (integer) for a specific style in a table
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tableId, $styleId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'styleId' => $styleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fusiontables_StyleSetting");
    }

    /**
     * Adds a new style for the table. (style.insert)
     *
     * @param string $tableId Table for which a new style is being added
     * @param Google_Service_Fusiontables_StyleSetting|Google_StyleSetting $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($tableId, Google_Service_Fusiontables_StyleSetting $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Fusiontables_StyleSetting");
    }

    /**
     * Retrieves a list of styles. (style.listStyle)
     *
     * @param string $tableId Table whose styles are being listed
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token specifying which result page
     * to return. Optional.
     * @opt_param string maxResults Maximum number of styles to return. Optional.
     * Default is 5.
     */
    public function listStyle($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fusiontables_StyleSettingList");
    }

    /**
     * Updates an existing style. This method supports patch semantics.
     * (style.patch)
     *
     * @param string $tableId Table whose style is being updated.
     * @param int $styleId Identifier (within a table) for the style being updated.
     * @param Google_Service_Fusiontables_StyleSetting|Google_StyleSetting $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($tableId, $styleId, Google_Service_Fusiontables_StyleSetting $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'styleId' => $styleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fusiontables_StyleSetting");
    }

    /**
     * Updates an existing style. (style.update)
     *
     * @param string $tableId Table whose style is being updated.
     * @param int $styleId Identifier (within a table) for the style being updated.
     * @param Google_Service_Fusiontables_StyleSetting|Google_StyleSetting $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($tableId, $styleId, Google_Service_Fusiontables_StyleSetting $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'styleId' => $styleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fusiontables_StyleSetting");
    }
}

/**
 * The "table" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $table = $fusiontablesService->table;
 *  </code>
 */
class Google_Service_Fusiontables_Table_Resource extends Google_Service_Resource
{

    /**
     * Copies a table. (table.copy)
     *
     * @param string $tableId ID of the table that is being copied.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool copyPresentation Whether to also copy tabs, styles, and
     * templates. Default is false.
     */
    public function copy($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('copy', [$params], "Google_Service_Fusiontables_Table");
    }

    /**
     * Deletes a table. (table.delete)
     *
     * @param string $tableId ID of the table to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a specific table by its ID. (table.get)
     *
     * @param string $tableId Identifier for the table being requested.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fusiontables_Table");
    }

    /**
     * Imports more rows into a table. (table.importRows)
     *
     * @param string $tableId The table into which new rows are being imported.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int startLine The index of the first line from which to start
     * importing, inclusive. Default is 0.
     * @opt_param bool isStrict Whether the imported CSV must have the same number
     * of values for each row. If false, rows with fewer values will be padded with
     * empty values. Default is true.
     * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
     * auto-detect if you are unsure of the encoding.
     * @opt_param string delimiter The delimiter used to separate cell values. This
     * can only consist of a single character. Default is ,.
     * @opt_param int endLine The index of the line up to which data will be
     * imported. Default is to import the entire file. If endLine is negative, it is
     * an offset from the end of the file; the imported content will exclude the
     * last endLine lines.
     */
    public function importRows($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('importRows', [$params], "Google_Service_Fusiontables_Import");
    }

    /**
     * Imports a new table. (table.importTable)
     *
     * @param string $name The name to be assigned to the new table.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string delimiter The delimiter used to separate cell values. This
     * can only consist of a single character. Default is ,.
     * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
     * auto-detect if you are unsure of the encoding.
     */
    public function importTable($name, $optParams = [])
    {
        $params = ['name' => $name];
        $params = array_merge($params, $optParams);

        return $this->call('importTable', [$params], "Google_Service_Fusiontables_Table");
    }

    /**
     * Creates a new table. (table.insert)
     *
     * @param Google_Service_Fusiontables_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Fusiontables_Table $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Fusiontables_Table");
    }

    /**
     * Retrieves a list of tables a user owns. (table.listTable)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token specifying which result page
     * to return.
     * @opt_param string maxResults Maximum number of tables to return. Default is
     * 5.
     */
    public function listTable($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fusiontables_TableList");
    }

    /**
     * Updates an existing table. Unless explicitly requested, only the name,
     * description, and attribution will be updated. This method supports patch
     * semantics. (table.patch)
     *
     * @param string $tableId ID of the table that is being updated.
     * @param Google_Service_Fusiontables_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool replaceViewDefinition Whether the view definition is also
     * updated. The specified view definition replaces the existing one. Only a view
     * can be updated with a new definition.
     */
    public function patch($tableId, Google_Service_Fusiontables_Table $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fusiontables_Table");
    }

    /**
     * Replaces rows of an existing table. Current rows remain visible until all
     * replacement rows are ready. (table.replaceRows)
     *
     * @param string $tableId Table whose rows will be replaced.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int startLine The index of the first line from which to start
     * importing, inclusive. Default is 0.
     * @opt_param bool isStrict Whether the imported CSV must have the same number
     * of column values for each row. If true, throws an exception if the CSV does
     * not have the same number of columns. If false, rows with fewer column values
     * will be padded with empty values. Default is true.
     * @opt_param string encoding The encoding of the content. Default is UTF-8. Use
     * 'auto-detect' if you are unsure of the encoding.
     * @opt_param string delimiter The delimiter used to separate cell values. This
     * can only consist of a single character. Default is ,.
     * @opt_param int endLine The index of the line up to which data will be
     * imported. Default is to import the entire file. If endLine is negative, it is
     * an offset from the end of the file; the imported content will exclude the
     * last endLine lines.
     */
    public function replaceRows($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('replaceRows', [$params], "Google_Service_Fusiontables_Task");
    }

    /**
     * Updates an existing table. Unless explicitly requested, only the name,
     * description, and attribution will be updated. (table.update)
     *
     * @param string $tableId ID of the table that is being updated.
     * @param Google_Service_Fusiontables_Table|Google_Table $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool replaceViewDefinition Whether the view definition is also
     * updated. The specified view definition replaces the existing one. Only a view
     * can be updated with a new definition.
     */
    public function update($tableId, Google_Service_Fusiontables_Table $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fusiontables_Table");
    }
}

/**
 * The "task" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $task = $fusiontablesService->task;
 *  </code>
 */
class Google_Service_Fusiontables_Task_Resource extends Google_Service_Resource
{

    /**
     * Deletes a specific task by its ID, unless that task has already started
     * running. (task.delete)
     *
     * @param string $tableId Table from which the task is being deleted.
     * @param string $taskId The identifier of the task to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tableId, $taskId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'taskId' => $taskId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a specific task by its ID. (task.get)
     *
     * @param string $tableId Table to which the task belongs.
     * @param string $taskId The identifier of the task to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tableId, $taskId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'taskId' => $taskId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fusiontables_Task");
    }

    /**
     * Retrieves a list of tasks. (task.listTask)
     *
     * @param string $tableId Table whose tasks are being listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token specifying which result page
     * to return.
     * @opt_param string startIndex Index of the first result returned in the
     * current page.
     * @opt_param string maxResults Maximum number of tasks to return. Default is 5.
     */
    public function listTask($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fusiontables_TaskList");
    }
}

/**
 * The "template" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fusiontablesService = new Google_Service_Fusiontables(...);
 *   $template = $fusiontablesService->template;
 *  </code>
 */
class Google_Service_Fusiontables_Template_Resource extends Google_Service_Resource
{

    /**
     * Deletes a template (template.delete)
     *
     * @param string $tableId Table from which the template is being deleted
     * @param int $templateId Identifier for the template which is being deleted
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tableId, $templateId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'templateId' => $templateId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a specific template by its id (template.get)
     *
     * @param string $tableId Table to which the template belongs
     * @param int $templateId Identifier for the template that is being requested
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tableId, $templateId, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'templateId' => $templateId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Fusiontables_Template");
    }

    /**
     * Creates a new template for the table. (template.insert)
     *
     * @param string $tableId Table for which a new template is being created
     * @param Google_Service_Fusiontables_Template|Google_Template $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($tableId, Google_Service_Fusiontables_Template $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Fusiontables_Template");
    }

    /**
     * Retrieves a list of templates. (template.listTemplate)
     *
     * @param string $tableId Identifier for the table whose templates are being
     *                          requested
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Continuation token specifying which results page
     * to return. Optional.
     * @opt_param string maxResults Maximum number of templates to return. Optional.
     * Default is 5.
     */
    public function listTemplate($tableId, $optParams = [])
    {
        $params = ['tableId' => $tableId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Fusiontables_TemplateList");
    }

    /**
     * Updates an existing template. This method supports patch semantics.
     * (template.patch)
     *
     * @param string $tableId Table to which the updated template belongs
     * @param int $templateId Identifier for the template that is being updated
     * @param Google_Service_Fusiontables_Template|Google_Template $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($tableId, $templateId, Google_Service_Fusiontables_Template $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'templateId' => $templateId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Fusiontables_Template");
    }

    /**
     * Updates an existing template (template.update)
     *
     * @param string $tableId Table to which the updated template belongs
     * @param int $templateId Identifier for the template that is being updated
     * @param Google_Service_Fusiontables_Template|Google_Template $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($tableId, $templateId, Google_Service_Fusiontables_Template $postBody, $optParams = [])
    {
        $params = ['tableId' => $tableId, 'templateId' => $templateId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Fusiontables_Template");
    }
}


/**
 * Class Google_Service_Fusiontables_Bucket
 */
class Google_Service_Fusiontables_Bucket extends Google_Model
{
    public $color;
    public $icon;
    public $max;
    public $min;
    public $opacity;
    public $weight;
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
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

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
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

/**
 * Class Google_Service_Fusiontables_Column
 */
class Google_Service_Fusiontables_Column extends Google_Collection
{
    public $columnId;
    public $columnJsonSchema;
    public $columnPropertiesJson;
    public $description;
    public $formatPattern;
    public $graphPredicate;
    public $kind;
    public $name;
    public $type;
    public $validValues;
    public $validateData;
    protected $collection_key = 'validValues';
    protected $internal_gapi_mappings = [];
    protected $baseColumnType = 'Google_Service_Fusiontables_ColumnBaseColumn';
    protected $baseColumnDataType = '';

    /**
     * @param Google_Service_Fusiontables_ColumnBaseColumn $baseColumn
     */
    public function setBaseColumn(Google_Service_Fusiontables_ColumnBaseColumn $baseColumn)
    {
        $this->baseColumn = $baseColumn;
    }

    /**
     * @return mixed
     */
    public function getBaseColumn()
    {
        return $this->baseColumn;
    }

    /**
     * @return mixed
     */
    public function getColumnId()
    {
        return $this->columnId;
    }

    /**
     * @param $columnId
     */
    public function setColumnId($columnId)
    {
        $this->columnId = $columnId;
    }

    /**
     * @return mixed
     */
    public function getColumnJsonSchema()
    {
        return $this->columnJsonSchema;
    }

    /**
     * @param $columnJsonSchema
     */
    public function setColumnJsonSchema($columnJsonSchema)
    {
        $this->columnJsonSchema = $columnJsonSchema;
    }

    /**
     * @return mixed
     */
    public function getColumnPropertiesJson()
    {
        return $this->columnPropertiesJson;
    }

    /**
     * @param $columnPropertiesJson
     */
    public function setColumnPropertiesJson($columnPropertiesJson)
    {
        $this->columnPropertiesJson = $columnPropertiesJson;
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
    public function getFormatPattern()
    {
        return $this->formatPattern;
    }

    /**
     * @param $formatPattern
     */
    public function setFormatPattern($formatPattern)
    {
        $this->formatPattern = $formatPattern;
    }

    /**
     * @return mixed
     */
    public function getGraphPredicate()
    {
        return $this->graphPredicate;
    }

    /**
     * @param $graphPredicate
     */
    public function setGraphPredicate($graphPredicate)
    {
        $this->graphPredicate = $graphPredicate;
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
    public function getValidValues()
    {
        return $this->validValues;
    }

    /**
     * @param $validValues
     */
    public function setValidValues($validValues)
    {
        $this->validValues = $validValues;
    }

    /**
     * @return mixed
     */
    public function getValidateData()
    {
        return $this->validateData;
    }

    /**
     * @param $validateData
     */
    public function setValidateData($validateData)
    {
        $this->validateData = $validateData;
    }
}

/**
 * Class Google_Service_Fusiontables_ColumnBaseColumn
 */
class Google_Service_Fusiontables_ColumnBaseColumn extends Google_Model
{
    public $columnId;
    public $tableIndex;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnId()
    {
        return $this->columnId;
    }

    /**
     * @param $columnId
     */
    public function setColumnId($columnId)
    {
        $this->columnId = $columnId;
    }

    /**
     * @return mixed
     */
    public function getTableIndex()
    {
        return $this->tableIndex;
    }

    /**
     * @param $tableIndex
     */
    public function setTableIndex($tableIndex)
    {
        $this->tableIndex = $tableIndex;
    }
}

/**
 * Class Google_Service_Fusiontables_ColumnList
 */
class Google_Service_Fusiontables_ColumnList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Fusiontables_Column';
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
 * Class Google_Service_Fusiontables_Geometry
 */
class Google_Service_Fusiontables_Geometry extends Google_Collection
{
    public $geometries;
    public $geometry;
    public $type;
    protected $collection_key = 'geometries';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getGeometries()
    {
        return $this->geometries;
    }

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
    public function getGeometry()
    {
        return $this->geometry;
    }

    /**
     * @param $geometry
     */
    public function setGeometry($geometry)
    {
        $this->geometry = $geometry;
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
 * Class Google_Service_Fusiontables_Import
 */
class Google_Service_Fusiontables_Import extends Google_Model
{
    public $kind;
    public $numRowsReceived;
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
    public function getNumRowsReceived()
    {
        return $this->numRowsReceived;
    }

    /**
     * @param $numRowsReceived
     */
    public function setNumRowsReceived($numRowsReceived)
    {
        $this->numRowsReceived = $numRowsReceived;
    }
}

/**
 * Class Google_Service_Fusiontables_Line
 */
class Google_Service_Fusiontables_Line extends Google_Collection
{
    public $coordinates;
    public $type;
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
 * Class Google_Service_Fusiontables_LineStyle
 */
class Google_Service_Fusiontables_LineStyle extends Google_Model
{
    public $strokeColor;
    public $strokeOpacity;
    public $strokeWeight;
    protected $internal_gapi_mappings = [];
    protected $strokeColorStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $strokeColorStylerDataType = '';
    protected $strokeWeightStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $strokeWeightStylerDataType = '';

    /**
     * @return mixed
     */
    public function getStrokeColor()
    {
        return $this->strokeColor;
    }

    /**
     * @param $strokeColor
     */
    public function setStrokeColor($strokeColor)
    {
        $this->strokeColor = $strokeColor;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $strokeColorStyler
     */
    public function setStrokeColorStyler(Google_Service_Fusiontables_StyleFunction $strokeColorStyler)
    {
        $this->strokeColorStyler = $strokeColorStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeColorStyler()
    {
        return $this->strokeColorStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeOpacity()
    {
        return $this->strokeOpacity;
    }

    /**
     * @param $strokeOpacity
     */
    public function setStrokeOpacity($strokeOpacity)
    {
        $this->strokeOpacity = $strokeOpacity;
    }

    /**
     * @return mixed
     */
    public function getStrokeWeight()
    {
        return $this->strokeWeight;
    }

    /**
     * @param $strokeWeight
     */
    public function setStrokeWeight($strokeWeight)
    {
        $this->strokeWeight = $strokeWeight;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $strokeWeightStyler
     */
    public function setStrokeWeightStyler(Google_Service_Fusiontables_StyleFunction $strokeWeightStyler)
    {
        $this->strokeWeightStyler = $strokeWeightStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeWeightStyler()
    {
        return $this->strokeWeightStyler;
    }
}

/**
 * Class Google_Service_Fusiontables_Point
 */
class Google_Service_Fusiontables_Point extends Google_Collection
{
    public $coordinates;
    public $type;
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
 * Class Google_Service_Fusiontables_PointStyle
 */
class Google_Service_Fusiontables_PointStyle extends Google_Model
{
    public $iconName;
    protected $internal_gapi_mappings = [];
    protected $iconStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $iconStylerDataType = '';

    /**
     * @return mixed
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * @param $iconName
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $iconStyler
     */
    public function setIconStyler(Google_Service_Fusiontables_StyleFunction $iconStyler)
    {
        $this->iconStyler = $iconStyler;
    }

    /**
     * @return mixed
     */
    public function getIconStyler()
    {
        return $this->iconStyler;
    }
}

/**
 * Class Google_Service_Fusiontables_Polygon
 */
class Google_Service_Fusiontables_Polygon extends Google_Collection
{
    public $coordinates;
    public $type;
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
 * Class Google_Service_Fusiontables_PolygonStyle
 */
class Google_Service_Fusiontables_PolygonStyle extends Google_Model
{
    public $fillColor;
    public $fillOpacity;
    public $strokeColor;
    public $strokeOpacity;
    public $strokeWeight;
    protected $internal_gapi_mappings = [];
    protected $fillColorStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $fillColorStylerDataType = '';
    protected $strokeColorStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $strokeColorStylerDataType = '';
    protected $strokeWeightStylerType = 'Google_Service_Fusiontables_StyleFunction';
    protected $strokeWeightStylerDataType = '';

    /**
     * @return mixed
     */
    public function getFillColor()
    {
        return $this->fillColor;
    }

    /**
     * @param $fillColor
     */
    public function setFillColor($fillColor)
    {
        $this->fillColor = $fillColor;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $fillColorStyler
     */
    public function setFillColorStyler(Google_Service_Fusiontables_StyleFunction $fillColorStyler)
    {
        $this->fillColorStyler = $fillColorStyler;
    }

    /**
     * @return mixed
     */
    public function getFillColorStyler()
    {
        return $this->fillColorStyler;
    }

    /**
     * @return mixed
     */
    public function getFillOpacity()
    {
        return $this->fillOpacity;
    }

    /**
     * @param $fillOpacity
     */
    public function setFillOpacity($fillOpacity)
    {
        $this->fillOpacity = $fillOpacity;
    }

    /**
     * @return mixed
     */
    public function getStrokeColor()
    {
        return $this->strokeColor;
    }

    /**
     * @param $strokeColor
     */
    public function setStrokeColor($strokeColor)
    {
        $this->strokeColor = $strokeColor;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $strokeColorStyler
     */
    public function setStrokeColorStyler(Google_Service_Fusiontables_StyleFunction $strokeColorStyler)
    {
        $this->strokeColorStyler = $strokeColorStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeColorStyler()
    {
        return $this->strokeColorStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeOpacity()
    {
        return $this->strokeOpacity;
    }

    /**
     * @param $strokeOpacity
     */
    public function setStrokeOpacity($strokeOpacity)
    {
        $this->strokeOpacity = $strokeOpacity;
    }

    /**
     * @return mixed
     */
    public function getStrokeWeight()
    {
        return $this->strokeWeight;
    }

    /**
     * @param $strokeWeight
     */
    public function setStrokeWeight($strokeWeight)
    {
        $this->strokeWeight = $strokeWeight;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunction $strokeWeightStyler
     */
    public function setStrokeWeightStyler(Google_Service_Fusiontables_StyleFunction $strokeWeightStyler)
    {
        $this->strokeWeightStyler = $strokeWeightStyler;
    }

    /**
     * @return mixed
     */
    public function getStrokeWeightStyler()
    {
        return $this->strokeWeightStyler;
    }
}

/**
 * Class Google_Service_Fusiontables_Sqlresponse
 */
class Google_Service_Fusiontables_Sqlresponse extends Google_Collection
{
    public $columns;
    public $kind;
    public $rows;
    protected $collection_key = 'rows';
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
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }
}

/**
 * Class Google_Service_Fusiontables_StyleFunction
 */
class Google_Service_Fusiontables_StyleFunction extends Google_Collection
{
    public $columnName;
    public $kind;
    protected $collection_key = 'buckets';
    protected $internal_gapi_mappings = [];
    protected $bucketsType = 'Google_Service_Fusiontables_Bucket';
    protected $bucketsDataType = 'array';
    protected $gradientType = 'Google_Service_Fusiontables_StyleFunctionGradient';
    protected $gradientDataType = '';

    /**
     * @param $buckets
     */
    public function setBuckets($buckets)
    {
        $this->buckets = $buckets;
    }

    /**
     * @return mixed
     */
    public function getBuckets()
    {
        return $this->buckets;
    }

    /**
     * @return mixed
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * @param $columnName
     */
    public function setColumnName($columnName)
    {
        $this->columnName = $columnName;
    }

    /**
     * @param Google_Service_Fusiontables_StyleFunctionGradient $gradient
     */
    public function setGradient(Google_Service_Fusiontables_StyleFunctionGradient $gradient)
    {
        $this->gradient = $gradient;
    }

    /**
     * @return mixed
     */
    public function getGradient()
    {
        return $this->gradient;
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
 * Class Google_Service_Fusiontables_StyleFunctionGradient
 */
class Google_Service_Fusiontables_StyleFunctionGradient extends Google_Collection
{
    public $max;
    public $min;
    protected $collection_key = 'colors';
    protected $internal_gapi_mappings = [];
    protected $colorsType = 'Google_Service_Fusiontables_StyleFunctionGradientColors';
    protected $colorsDataType = 'array';

    /**
     * @param $colors
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
    }

    /**
     * @return mixed
     */
    public function getColors()
    {
        return $this->colors;
    }

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
 * Class Google_Service_Fusiontables_StyleFunctionGradientColors
 */
class Google_Service_Fusiontables_StyleFunctionGradientColors extends Google_Model
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
 * Class Google_Service_Fusiontables_StyleSetting
 */
class Google_Service_Fusiontables_StyleSetting extends Google_Model
{
    public $kind;
    public $name;
    public $styleId;
    public $tableId;
    protected $internal_gapi_mappings = [];
    protected $markerOptionsType = 'Google_Service_Fusiontables_PointStyle';
    protected $markerOptionsDataType = '';
    protected $polygonOptionsType = 'Google_Service_Fusiontables_PolygonStyle';
    protected $polygonOptionsDataType = '';
    protected $polylineOptionsType = 'Google_Service_Fusiontables_LineStyle';
    protected $polylineOptionsDataType = '';

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
     * @param Google_Service_Fusiontables_PointStyle $markerOptions
     */
    public function setMarkerOptions(Google_Service_Fusiontables_PointStyle $markerOptions)
    {
        $this->markerOptions = $markerOptions;
    }

    /**
     * @return mixed
     */
    public function getMarkerOptions()
    {
        return $this->markerOptions;
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
     * @param Google_Service_Fusiontables_PolygonStyle $polygonOptions
     */
    public function setPolygonOptions(Google_Service_Fusiontables_PolygonStyle $polygonOptions)
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
     * @param Google_Service_Fusiontables_LineStyle $polylineOptions
     */
    public function setPolylineOptions(Google_Service_Fusiontables_LineStyle $polylineOptions)
    {
        $this->polylineOptions = $polylineOptions;
    }

    /**
     * @return mixed
     */
    public function getPolylineOptions()
    {
        return $this->polylineOptions;
    }

    /**
     * @return mixed
     */
    public function getStyleId()
    {
        return $this->styleId;
    }

    /**
     * @param $styleId
     */
    public function setStyleId($styleId)
    {
        $this->styleId = $styleId;
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
 * Class Google_Service_Fusiontables_StyleSettingList
 */
class Google_Service_Fusiontables_StyleSettingList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Fusiontables_StyleSetting';
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
 * Class Google_Service_Fusiontables_Table
 */
class Google_Service_Fusiontables_Table extends Google_Collection
{
    public $attribution;
    public $attributionLink;
    public $baseTableIds;
    public $columnPropertiesJsonSchema;
    public $description;
    public $isExportable;
    public $kind;
    public $name;
    public $sql;
    public $tableId;
    public $tablePropertiesJson;
    public $tablePropertiesJsonSchema;
    protected $collection_key = 'columns';
    protected $internal_gapi_mappings = [];
    protected $columnsType = 'Google_Service_Fusiontables_Column';
    protected $columnsDataType = 'array';

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
    public function getAttributionLink()
    {
        return $this->attributionLink;
    }

    /**
     * @param $attributionLink
     */
    public function setAttributionLink($attributionLink)
    {
        $this->attributionLink = $attributionLink;
    }

    /**
     * @return mixed
     */
    public function getBaseTableIds()
    {
        return $this->baseTableIds;
    }

    /**
     * @param $baseTableIds
     */
    public function setBaseTableIds($baseTableIds)
    {
        $this->baseTableIds = $baseTableIds;
    }

    /**
     * @return mixed
     */
    public function getColumnPropertiesJsonSchema()
    {
        return $this->columnPropertiesJsonSchema;
    }

    /**
     * @param $columnPropertiesJsonSchema
     */
    public function setColumnPropertiesJsonSchema($columnPropertiesJsonSchema)
    {
        $this->columnPropertiesJsonSchema = $columnPropertiesJsonSchema;
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
    public function getColumns()
    {
        return $this->columns;
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
    public function getIsExportable()
    {
        return $this->isExportable;
    }

    /**
     * @param $isExportable
     */
    public function setIsExportable($isExportable)
    {
        $this->isExportable = $isExportable;
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
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param $sql
     */
    public function setSql($sql)
    {
        $this->sql = $sql;
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

    /**
     * @return mixed
     */
    public function getTablePropertiesJson()
    {
        return $this->tablePropertiesJson;
    }

    /**
     * @param $tablePropertiesJson
     */
    public function setTablePropertiesJson($tablePropertiesJson)
    {
        $this->tablePropertiesJson = $tablePropertiesJson;
    }

    /**
     * @return mixed
     */
    public function getTablePropertiesJsonSchema()
    {
        return $this->tablePropertiesJsonSchema;
    }

    /**
     * @param $tablePropertiesJsonSchema
     */
    public function setTablePropertiesJsonSchema($tablePropertiesJsonSchema)
    {
        $this->tablePropertiesJsonSchema = $tablePropertiesJsonSchema;
    }
}

/**
 * Class Google_Service_Fusiontables_TableList
 */
class Google_Service_Fusiontables_TableList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Fusiontables_Table';
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
 * Class Google_Service_Fusiontables_Task
 */
class Google_Service_Fusiontables_Task extends Google_Model
{
    public $kind;
    public $progress;
    public $started;
    public $taskId;
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
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * @param $started
     */
    public function setStarted($started)
    {
        $this->started = $started;
    }

    /**
     * @return mixed
     */
    public function getTaskId()
    {
        return $this->taskId;
    }

    /**
     * @param $taskId
     */
    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
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
 * Class Google_Service_Fusiontables_TaskList
 */
class Google_Service_Fusiontables_TaskList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Fusiontables_Task';
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
 * Class Google_Service_Fusiontables_Template
 */
class Google_Service_Fusiontables_Template extends Google_Collection
{
    public $automaticColumnNames;
    public $body;
    public $kind;
    public $name;
    public $tableId;
    public $templateId;
    protected $collection_key = 'automaticColumnNames';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutomaticColumnNames()
    {
        return $this->automaticColumnNames;
    }

    /**
     * @param $automaticColumnNames
     */
    public function setAutomaticColumnNames($automaticColumnNames)
    {
        $this->automaticColumnNames = $automaticColumnNames;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $body
     */
    public function setBody($body)
    {
        $this->body = $body;
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

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }
}

/**
 * Class Google_Service_Fusiontables_TemplateList
 */
class Google_Service_Fusiontables_TemplateList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Fusiontables_Template';
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
