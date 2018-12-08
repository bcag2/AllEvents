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
 * Service definition for AppState (v1).
 *
 * <p>
 * The Google App State API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services/web/api/states" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AppState extends Google_Service
{
    /** View and manage your data for this application. */
    const APPSTATE =
        "https://www.googleapis.com/auth/appstate";

    public $states;


    /**
     * Constructs the internal representation of the AppState service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'appstate/v1/';
        $this->version = 'v1';
        $this->serviceName = 'appstate';

        $this->states = new Google_Service_AppState_States_Resource(
            $this,
            $this->serviceName,
            'states',
            [
                'methods' => [
                    'clear' => [
                        'path' => 'states/{stateKey}/clear',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'stateKey' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'currentDataVersion' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'states/{stateKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'stateKey' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'states/{stateKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'stateKey' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'states',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'includeData' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'states/{stateKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'stateKey' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'currentStateVersion' => [
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
 * The "states" collection of methods.
 * Typical usage is:
 *  <code>
 *   $appstateService = new Google_Service_AppState(...);
 *   $states = $appstateService->states;
 *  </code>
 */
class Google_Service_AppState_States_Resource extends Google_Service_Resource
{

    /**
     * Clears (sets to empty) the data for the passed key if and only if the passed
     * version matches the currently stored version. This method results in a
     * conflict error on version mismatch. (states.clear)
     *
     * @param int $stateKey The key for the data to be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string currentDataVersion The version of the data to be cleared.
     * Version strings are returned by the server.
     */
    public function clear($stateKey, $optParams = [])
    {
        $params = ['stateKey' => $stateKey];
        $params = array_merge($params, $optParams);

        return $this->call('clear', [$params], "Google_Service_AppState_WriteResult");
    }

    /**
     * Deletes a key and the data associated with it. The key is removed and no
     * longer counts against the key quota. Note that since this method is not safe
     * in the face of concurrent modifications, it should only be used for
     * development and testing purposes. Invoking this method in shipping code can
     * result in data loss and data corruption. (states.delete)
     *
     * @param int $stateKey The key for the data to be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($stateKey, $optParams = [])
    {
        $params = ['stateKey' => $stateKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the data corresponding to the passed key. If the key does not exist
     * on the server, an HTTP 404 will be returned. (states.get)
     *
     * @param int $stateKey The key for the data to be retrieved.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($stateKey, $optParams = [])
    {
        $params = ['stateKey' => $stateKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AppState_GetResponse");
    }

    /**
     * Lists all the states keys, and optionally the state data. (states.listStates)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeData Whether to include the full data in addition to
     * the version number
     */
    public function listStates($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AppState_ListResponse");
    }

    /**
     * Update the data associated with the input key if and only if the passed
     * version matches the currently stored version. This method is safe in the face
     * of concurrent writes. Maximum per-key size is 128KB. (states.update)
     *
     * @param int $stateKey The key for the data to be retrieved.
     * @param Google_Service_AppState_UpdateRequest|Google_UpdateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string currentStateVersion The version of the app state your
     * application is attempting to update. If this does not match the current
     * version, this method will return a conflict error. If there is no data stored
     * on the server for this key, the update will succeed irrespective of the value
     * of this parameter.
     */
    public function update($stateKey, Google_Service_AppState_UpdateRequest $postBody, $optParams = [])
    {
        $params = ['stateKey' => $stateKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AppState_WriteResult");
    }
}


/**
 * Class Google_Service_AppState_GetResponse
 */
class Google_Service_AppState_GetResponse extends Google_Model
{
    public $currentStateVersion;
    public $data;
    public $kind;
    public $stateKey;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentStateVersion()
    {
        return $this->currentStateVersion;
    }

    /**
     * @param $currentStateVersion
     */
    public function setCurrentStateVersion($currentStateVersion)
    {
        $this->currentStateVersion = $currentStateVersion;
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
    public function getStateKey()
    {
        return $this->stateKey;
    }

    /**
     * @param $stateKey
     */
    public function setStateKey($stateKey)
    {
        $this->stateKey = $stateKey;
    }
}

/**
 * Class Google_Service_AppState_ListResponse
 */
class Google_Service_AppState_ListResponse extends Google_Collection
{
    public $kind;
    public $maximumKeyCount;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AppState_GetResponse';
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
    public function getMaximumKeyCount()
    {
        return $this->maximumKeyCount;
    }

    /**
     * @param $maximumKeyCount
     */
    public function setMaximumKeyCount($maximumKeyCount)
    {
        $this->maximumKeyCount = $maximumKeyCount;
    }
}

/**
 * Class Google_Service_AppState_UpdateRequest
 */
class Google_Service_AppState_UpdateRequest extends Google_Model
{
    public $data;
    public $kind;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_AppState_WriteResult
 */
class Google_Service_AppState_WriteResult extends Google_Model
{
    public $currentStateVersion;
    public $kind;
    public $stateKey;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentStateVersion()
    {
        return $this->currentStateVersion;
    }

    /**
     * @param $currentStateVersion
     */
    public function setCurrentStateVersion($currentStateVersion)
    {
        $this->currentStateVersion = $currentStateVersion;
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
    public function getStateKey()
    {
        return $this->stateKey;
    }

    /**
     * @param $stateKey
     */
    public function setStateKey($stateKey)
    {
        $this->stateKey = $stateKey;
    }
}
