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
 * Service definition for TagManager (v1).
 *
 * <p>
 * API for accessing Tag Manager accounts and containers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/tag-manager/api/v1/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_TagManager extends Google_Service
{
    /** Delete your Google Tag Manager containers. */
    const TAGMANAGER_DELETE_CONTAINERS =
        "https://www.googleapis.com/auth/tagmanager.delete.containers";
    /** Manage your Google Tag Manager containers. */
    const TAGMANAGER_EDIT_CONTAINERS =
        "https://www.googleapis.com/auth/tagmanager.edit.containers";
    /** Manage your Google Tag Manager container versions. */
    const TAGMANAGER_EDIT_CONTAINERVERSIONS =
        "https://www.googleapis.com/auth/tagmanager.edit.containerversions";
    /** Manage your Google Tag Manager accounts. */
    const TAGMANAGER_MANAGE_ACCOUNTS =
        "https://www.googleapis.com/auth/tagmanager.manage.accounts";
    /** Manage user permissions of your Google Tag Manager data. */
    const TAGMANAGER_MANAGE_USERS =
        "https://www.googleapis.com/auth/tagmanager.manage.users";
    /** Publish your Google Tag Manager containers. */
    const TAGMANAGER_PUBLISH =
        "https://www.googleapis.com/auth/tagmanager.publish";
    /** View your Google Tag Manager containers. */
    const TAGMANAGER_READONLY =
        "https://www.googleapis.com/auth/tagmanager.readonly";

    public $accounts;
    public $accounts_containers;
    public $accounts_containers_macros;
    public $accounts_containers_rules;
    public $accounts_containers_tags;
    public $accounts_containers_triggers;
    public $accounts_containers_variables;
    public $accounts_containers_versions;
    public $accounts_permissions;


    /**
     * Constructs the internal representation of the TagManager service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'tagmanager/v1/';
        $this->version = 'v1';
        $this->serviceName = 'tagmanager';

        $this->accounts = new Google_Service_TagManager_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers = new Google_Service_TagManager_AccountsContainers_Resource(
            $this,
            $this->serviceName,
            'containers',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_macros = new Google_Service_TagManager_AccountsContainersMacros_Resource(
            $this,
            $this->serviceName,
            'macros',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/macros',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/macros/{macroId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'macroId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/macros/{macroId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'macroId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/macros',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/macros/{macroId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'macroId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_rules = new Google_Service_TagManager_AccountsContainersRules_Resource(
            $this,
            $this->serviceName,
            'rules',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/rules',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/rules/{ruleId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/rules/{ruleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/rules',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/rules/{ruleId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ruleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_tags = new Google_Service_TagManager_AccountsContainersTags_Resource(
            $this,
            $this->serviceName,
            'tags',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/tags',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/tags/{tagId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tagId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/tags/{tagId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tagId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/tags',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/tags/{tagId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tagId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_triggers = new Google_Service_TagManager_AccountsContainersTriggers_Resource(
            $this,
            $this->serviceName,
            'triggers',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/triggers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/triggers/{triggerId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'triggerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/triggers/{triggerId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'triggerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/triggers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/triggers/{triggerId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'triggerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_variables = new Google_Service_TagManager_AccountsContainersVariables_Resource(
            $this,
            $this->serviceName,
            'variables',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/variables',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/variables/{variableId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'variableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/variables/{variableId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'variableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/variables',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/variables/{variableId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'variableId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_containers_versions = new Google_Service_TagManager_AccountsContainersVersions_Resource(
            $this,
            $this->serviceName,
            'versions',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'headers' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'publish' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}/publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'restore' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}/restore',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'undelete' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}/undelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/containers/{containerId}/versions/{containerVersionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'containerVersionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_permissions = new Google_Service_TagManager_AccountsPermissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'create' => [
                        'path' => 'accounts/{accountId}/permissions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'accounts/{accountId}/permissions/{permissionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'accounts/{accountId}/permissions/{permissionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/permissions/{permissionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
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
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $accounts = $tagmanagerService->accounts;
 *  </code>
 */
class Google_Service_TagManager_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Gets a GTM Account. (accounts.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Account");
    }

    /**
     * Lists all GTM Accounts that a user has access to. (accounts.listAccounts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccounts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListAccountsResponse");
    }

    /**
     * Updates a GTM Account. (accounts.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param Google_Account|Google_Service_TagManager_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the account in storage.
     */
    public function update($accountId, Google_Service_TagManager_Account $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Account");
    }
}

/**
 * The "containers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $containers = $tagmanagerService->containers;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainers_Resource extends Google_Service_Resource
{

    /**
     * Creates a Container. (containers.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param Google_Container|Google_Service_TagManager_Container $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, Google_Service_TagManager_Container $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Container");
    }

    /**
     * Deletes a Container. (containers.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a Container. (containers.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Container");
    }

    /**
     * Lists all Containers that belongs to a GTM Account.
     * (containers.listAccountsContainers)
     *
     * @param string $accountId The GTM Account ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainers($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListContainersResponse");
    }

    /**
     * Updates a Container. (containers.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Container|Google_Service_TagManager_Container $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the container in storage.
     */
    public function update($accountId, $containerId, Google_Service_TagManager_Container $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Container");
    }
}

/**
 * The "macros" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $macros = $tagmanagerService->macros;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersMacros_Resource extends Google_Service_Resource
{

    /**
     * Creates a GTM Macro. (macros.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Macro|Google_Service_TagManager_Macro $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_Macro $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Macro");
    }

    /**
     * Deletes a GTM Macro. (macros.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $macroId The GTM Macro ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $macroId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'macroId' => $macroId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a GTM Macro. (macros.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $macroId The GTM Macro ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $macroId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'macroId' => $macroId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Macro");
    }

    /**
     * Lists all GTM Macros of a Container. (macros.listAccountsContainersMacros)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainersMacros($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListMacrosResponse");
    }

    /**
     * Updates a GTM Macro. (macros.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $macroId The GTM Macro ID.
     * @param Google_Macro|Google_Service_TagManager_Macro $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the macro in storage.
     */
    public function update($accountId, $containerId, $macroId, Google_Service_TagManager_Macro $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'macroId' => $macroId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Macro");
    }
}

/**
 * The "rules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $rules = $tagmanagerService->rules;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersRules_Resource extends Google_Service_Resource
{

    /**
     * Creates a GTM Rule. (rules.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Rule|Google_Service_TagManager_Rule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_Rule $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Rule");
    }

    /**
     * Deletes a GTM Rule. (rules.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $ruleId The GTM Rule ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $ruleId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'ruleId' => $ruleId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a GTM Rule. (rules.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $ruleId The GTM Rule ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $ruleId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'ruleId' => $ruleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Rule");
    }

    /**
     * Lists all GTM Rules of a Container. (rules.listAccountsContainersRules)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainersRules($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListRulesResponse");
    }

    /**
     * Updates a GTM Rule. (rules.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $ruleId The GTM Rule ID.
     * @param Google_Rule|Google_Service_TagManager_Rule $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the rule in storage.
     */
    public function update($accountId, $containerId, $ruleId, Google_Service_TagManager_Rule $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'ruleId' => $ruleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Rule");
    }
}

/**
 * The "tags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $tags = $tagmanagerService->tags;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersTags_Resource extends Google_Service_Resource
{

    /**
     * Creates a GTM Tag. (tags.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Service_TagManager_Tag|Google_Tag $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_Tag $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Tag");
    }

    /**
     * Deletes a GTM Tag. (tags.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $tagId The GTM Tag ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $tagId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'tagId' => $tagId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a GTM Tag. (tags.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $tagId The GTM Tag ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $tagId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'tagId' => $tagId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Tag");
    }

    /**
     * Lists all GTM Tags of a Container. (tags.listAccountsContainersTags)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainersTags($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListTagsResponse");
    }

    /**
     * Updates a GTM Tag. (tags.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $tagId The GTM Tag ID.
     * @param Google_Service_TagManager_Tag|Google_Tag $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the tag in storage.
     */
    public function update($accountId, $containerId, $tagId, Google_Service_TagManager_Tag $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'tagId' => $tagId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Tag");
    }
}

/**
 * The "triggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $triggers = $tagmanagerService->triggers;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersTriggers_Resource extends Google_Service_Resource
{

    /**
     * Creates a GTM Trigger. (triggers.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Service_TagManager_Trigger|Google_Trigger $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_Trigger $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Trigger");
    }

    /**
     * Deletes a GTM Trigger. (triggers.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $triggerId The GTM Trigger ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $triggerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'triggerId' => $triggerId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a GTM Trigger. (triggers.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $triggerId The GTM Trigger ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $triggerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'triggerId' => $triggerId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Trigger");
    }

    /**
     * Lists all GTM Triggers of a Container.
     * (triggers.listAccountsContainersTriggers)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainersTriggers($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListTriggersResponse");
    }

    /**
     * Updates a GTM Trigger. (triggers.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $triggerId The GTM Trigger ID.
     * @param Google_Service_TagManager_Trigger|Google_Trigger $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the trigger in storage.
     */
    public function update($accountId, $containerId, $triggerId, Google_Service_TagManager_Trigger $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'triggerId' => $triggerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Trigger");
    }
}

/**
 * The "variables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $variables = $tagmanagerService->variables;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersVariables_Resource extends Google_Service_Resource
{

    /**
     * Creates a GTM Variable. (variables.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_Service_TagManager_Variable|Google_Variable $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_Variable $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_Variable");
    }

    /**
     * Deletes a GTM Variable. (variables.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $variableId The GTM Variable ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $variableId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'variableId' => $variableId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a GTM Variable. (variables.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $variableId The GTM Variable ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $variableId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'variableId' => $variableId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_Variable");
    }

    /**
     * Lists all GTM Variables of a Container.
     * (variables.listAccountsContainersVariables)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsContainersVariables($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListVariablesResponse");
    }

    /**
     * Updates a GTM Variable. (variables.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $variableId The GTM Variable ID.
     * @param Google_Service_TagManager_Variable|Google_Variable $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the variable in storage.
     */
    public function update($accountId, $containerId, $variableId, Google_Service_TagManager_Variable $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'variableId' => $variableId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_Variable");
    }
}

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $versions = $tagmanagerService->versions;
 *  </code>
 */
class Google_Service_TagManager_AccountsContainersVersions_Resource extends Google_Service_Resource
{

    /**
     * Creates a Container Version. (versions.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param Google_CreateContainerVersionRequestVersionOptions|Google_Service_TagManager_CreateContainerVersionRequestVersionOptions $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, $containerId, Google_Service_TagManager_CreateContainerVersionRequestVersionOptions $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_CreateContainerVersionResponse");
    }

    /**
     * Deletes a Container Version. (versions.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $containerId, $containerVersionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a Container Version. (versions.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID. Specify
     *                                   published to retrieve the currently published version.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $containerId, $containerVersionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_ContainerVersion");
    }

    /**
     * Lists all Container Versions of a GTM Container.
     * (versions.listAccountsContainersVersions)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool headers Retrieve headers only when true.
     */
    public function listAccountsContainersVersions($accountId, $containerId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListContainerVersionsResponse");
    }

    /**
     * Publishes a Container Version. (versions.publish)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the container version in storage.
     */
    public function publish($accountId, $containerId, $containerVersionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_TagManager_PublishContainerVersionResponse");
    }

    /**
     * Restores a Container Version. This will overwrite the container's current
     * configuration (including its macros, rules and tags). The operation will not
     * have any effect on the version that is being served (i.e. the published
     * version). (versions.restore)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function restore($accountId, $containerId, $containerVersionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId];
        $params = array_merge($params, $optParams);

        return $this->call('restore', [$params], "Google_Service_TagManager_ContainerVersion");
    }

    /**
     * Undeletes a Container Version. (versions.undelete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function undelete($accountId, $containerId, $containerVersionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId];
        $params = array_merge($params, $optParams);

        return $this->call('undelete', [$params], "Google_Service_TagManager_ContainerVersion");
    }

    /**
     * Updates a Container Version. (versions.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $containerId The GTM Container ID.
     * @param string $containerVersionId The GTM Container Version ID.
     * @param Google_ContainerVersion|Google_Service_TagManager_ContainerVersion $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string fingerprint When provided, this fingerprint must match the
     * fingerprint of the container version in storage.
     */
    public function update($accountId, $containerId, $containerVersionId, Google_Service_TagManager_ContainerVersion $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'containerId' => $containerId, 'containerVersionId' => $containerVersionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_ContainerVersion");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google_Service_TagManager(...);
 *   $permissions = $tagmanagerService->permissions;
 *  </code>
 */
class Google_Service_TagManager_AccountsPermissions_Resource extends Google_Service_Resource
{

    /**
     * Creates a user's Account & Container Permissions. (permissions.create)
     *
     * @param string $accountId The GTM Account ID.
     * @param Google_Service_TagManager_UserAccess|Google_UserAccess $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($accountId, Google_Service_TagManager_UserAccess $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_TagManager_UserAccess");
    }

    /**
     * Removes a user from the account, revoking access to it and all of its
     * containers. (permissions.delete)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $permissionId The GTM User ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($accountId, $permissionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'permissionId' => $permissionId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a user's Account & Container Permissions. (permissions.get)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $permissionId The GTM User ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $permissionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'permissionId' => $permissionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_TagManager_UserAccess");
    }

    /**
     * List all users that have access to the account along with Account and
     * Container Permissions granted to each of them.
     * (permissions.listAccountsPermissions)
     *
     * @param string $accountId The GTM Account ID. @required
     *                          tagmanager.accounts.permissions.list
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountsPermissions($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_TagManager_ListAccountUsersResponse");
    }

    /**
     * Updates a user's Account & Container Permissions. (permissions.update)
     *
     * @param string $accountId The GTM Account ID.
     * @param string $permissionId The GTM User ID.
     * @param Google_Service_TagManager_UserAccess|Google_UserAccess $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($accountId, $permissionId, Google_Service_TagManager_UserAccess $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'permissionId' => $permissionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_TagManager_UserAccess");
    }
}


/**
 * Class Google_Service_TagManager_Account
 */
class Google_Service_TagManager_Account extends Google_Model
{
    public $accountId;
    public $fingerprint;
    public $name;
    public $shareData;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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
    public function getShareData()
    {
        return $this->shareData;
    }

    /**
     * @param $shareData
     */
    public function setShareData($shareData)
    {
        $this->shareData = $shareData;
    }
}

/**
 * Class Google_Service_TagManager_AccountAccess
 */
class Google_Service_TagManager_AccountAccess extends Google_Collection
{
    public $permission;
    protected $collection_key = 'permission';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }
}

/**
 * Class Google_Service_TagManager_Condition
 */
class Google_Service_TagManager_Condition extends Google_Collection
{
    public $type;
    protected $collection_key = 'parameter';
    protected $internal_gapi_mappings = [];
    protected $parameterType = 'Google_Service_TagManager_Parameter';
    protected $parameterDataType = 'array';

    /**
     * @param $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
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
 * Class Google_Service_TagManager_Container
 */
class Google_Service_TagManager_Container extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $domainName;
    public $enabledBuiltInVariable;
    public $fingerprint;
    public $name;
    public $notes;
    public $publicId;
    public $timeZoneCountryId;
    public $timeZoneId;
    public $usageContext;
    protected $collection_key = 'usageContext';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * @param $domainName
     */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
    }

    /**
     * @return mixed
     */
    public function getEnabledBuiltInVariable()
    {
        return $this->enabledBuiltInVariable;
    }

    /**
     * @param $enabledBuiltInVariable
     */
    public function setEnabledBuiltInVariable($enabledBuiltInVariable)
    {
        $this->enabledBuiltInVariable = $enabledBuiltInVariable;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getPublicId()
    {
        return $this->publicId;
    }

    /**
     * @param $publicId
     */
    public function setPublicId($publicId)
    {
        $this->publicId = $publicId;
    }

    /**
     * @return mixed
     */
    public function getTimeZoneCountryId()
    {
        return $this->timeZoneCountryId;
    }

    /**
     * @param $timeZoneCountryId
     */
    public function setTimeZoneCountryId($timeZoneCountryId)
    {
        $this->timeZoneCountryId = $timeZoneCountryId;
    }

    /**
     * @return mixed
     */
    public function getTimeZoneId()
    {
        return $this->timeZoneId;
    }

    /**
     * @param $timeZoneId
     */
    public function setTimeZoneId($timeZoneId)
    {
        $this->timeZoneId = $timeZoneId;
    }

    /**
     * @return mixed
     */
    public function getUsageContext()
    {
        return $this->usageContext;
    }

    /**
     * @param $usageContext
     */
    public function setUsageContext($usageContext)
    {
        $this->usageContext = $usageContext;
    }
}

/**
 * Class Google_Service_TagManager_ContainerAccess
 */
class Google_Service_TagManager_ContainerAccess extends Google_Collection
{
    public $containerId;
    public $permission;
    protected $collection_key = 'permission';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }
}

/**
 * Class Google_Service_TagManager_ContainerVersion
 */
class Google_Service_TagManager_ContainerVersion extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $containerVersionId;
    public $deleted;
    public $fingerprint;
    public $name;
    public $notes;
    protected $collection_key = 'variable';
    protected $internal_gapi_mappings = [];
    protected $containerType = 'Google_Service_TagManager_Container';
    protected $containerDataType = '';
    protected $macroType = 'Google_Service_TagManager_Macro';
    protected $macroDataType = 'array';
    protected $ruleType = 'Google_Service_TagManager_Rule';
    protected $ruleDataType = 'array';
    protected $tagType = 'Google_Service_TagManager_Tag';
    protected $tagDataType = 'array';
    protected $triggerType = 'Google_Service_TagManager_Trigger';
    protected $triggerDataType = 'array';
    protected $variableType = 'Google_Service_TagManager_Variable';
    protected $variableDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param Google_Service_TagManager_Container $container
     */
    public function setContainer(Google_Service_TagManager_Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getContainerVersionId()
    {
        return $this->containerVersionId;
    }

    /**
     * @param $containerVersionId
     */
    public function setContainerVersionId($containerVersionId)
    {
        $this->containerVersionId = $containerVersionId;
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
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @param $macro
     */
    public function setMacro($macro)
    {
        $this->macro = $macro;
    }

    /**
     * @return mixed
     */
    public function getMacro()
    {
        return $this->macro;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

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

    /**
     * @param $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param $trigger
     */
    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
    }

    /**
     * @return mixed
     */
    public function getTrigger()
    {
        return $this->trigger;
    }

    /**
     * @param $variable
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
    }

    /**
     * @return mixed
     */
    public function getVariable()
    {
        return $this->variable;
    }
}

/**
 * Class Google_Service_TagManager_ContainerVersionHeader
 */
class Google_Service_TagManager_ContainerVersionHeader extends Google_Model
{
    public $accountId;
    public $containerId;
    public $containerVersionId;
    public $deleted;
    public $name;
    public $numMacros;
    public $numRules;
    public $numTags;
    public $numTriggers;
    public $numVariables;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getContainerVersionId()
    {
        return $this->containerVersionId;
    }

    /**
     * @param $containerVersionId
     */
    public function setContainerVersionId($containerVersionId)
    {
        $this->containerVersionId = $containerVersionId;
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
    public function getNumMacros()
    {
        return $this->numMacros;
    }

    /**
     * @param $numMacros
     */
    public function setNumMacros($numMacros)
    {
        $this->numMacros = $numMacros;
    }

    /**
     * @return mixed
     */
    public function getNumRules()
    {
        return $this->numRules;
    }

    /**
     * @param $numRules
     */
    public function setNumRules($numRules)
    {
        $this->numRules = $numRules;
    }

    /**
     * @return mixed
     */
    public function getNumTags()
    {
        return $this->numTags;
    }

    /**
     * @param $numTags
     */
    public function setNumTags($numTags)
    {
        $this->numTags = $numTags;
    }

    /**
     * @return mixed
     */
    public function getNumTriggers()
    {
        return $this->numTriggers;
    }

    /**
     * @param $numTriggers
     */
    public function setNumTriggers($numTriggers)
    {
        $this->numTriggers = $numTriggers;
    }

    /**
     * @return mixed
     */
    public function getNumVariables()
    {
        return $this->numVariables;
    }

    /**
     * @param $numVariables
     */
    public function setNumVariables($numVariables)
    {
        $this->numVariables = $numVariables;
    }
}

/**
 * Class Google_Service_TagManager_CreateContainerVersionRequestVersionOptions
 */
class Google_Service_TagManager_CreateContainerVersionRequestVersionOptions extends Google_Model
{
    public $name;
    public $notes;
    public $quickPreview;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getQuickPreview()
    {
        return $this->quickPreview;
    }

    /**
     * @param $quickPreview
     */
    public function setQuickPreview($quickPreview)
    {
        $this->quickPreview = $quickPreview;
    }
}

/**
 * Class Google_Service_TagManager_CreateContainerVersionResponse
 */
class Google_Service_TagManager_CreateContainerVersionResponse extends Google_Model
{
    public $compilerError;
    protected $internal_gapi_mappings = [];
    protected $containerVersionType = 'Google_Service_TagManager_ContainerVersion';
    protected $containerVersionDataType = '';

    /**
     * @return mixed
     */
    public function getCompilerError()
    {
        return $this->compilerError;
    }

    /**
     * @param $compilerError
     */
    public function setCompilerError($compilerError)
    {
        $this->compilerError = $compilerError;
    }

    /**
     * @param Google_Service_TagManager_ContainerVersion $containerVersion
     */
    public function setContainerVersion(Google_Service_TagManager_ContainerVersion $containerVersion)
    {
        $this->containerVersion = $containerVersion;
    }

    /**
     * @return mixed
     */
    public function getContainerVersion()
    {
        return $this->containerVersion;
    }
}

/**
 * Class Google_Service_TagManager_ListAccountUsersResponse
 */
class Google_Service_TagManager_ListAccountUsersResponse extends Google_Collection
{
    protected $collection_key = 'userAccess';
    protected $internal_gapi_mappings = [];
    protected $userAccessType = 'Google_Service_TagManager_UserAccess';
    protected $userAccessDataType = 'array';


    /**
     * @param $userAccess
     */
    public function setUserAccess($userAccess)
    {
        $this->userAccess = $userAccess;
    }

    /**
     * @return mixed
     */
    public function getUserAccess()
    {
        return $this->userAccess;
    }
}

/**
 * Class Google_Service_TagManager_ListAccountsResponse
 */
class Google_Service_TagManager_ListAccountsResponse extends Google_Collection
{
    protected $collection_key = 'accounts';
    protected $internal_gapi_mappings = [];
    protected $accountsType = 'Google_Service_TagManager_Account';
    protected $accountsDataType = 'array';


    /**
     * @param $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
    }
}

/**
 * Class Google_Service_TagManager_ListContainerVersionsResponse
 */
class Google_Service_TagManager_ListContainerVersionsResponse extends Google_Collection
{
    protected $collection_key = 'containerVersionHeader';
    protected $internal_gapi_mappings = [];
    protected $containerVersionType = 'Google_Service_TagManager_ContainerVersion';
    protected $containerVersionDataType = 'array';
    protected $containerVersionHeaderType = 'Google_Service_TagManager_ContainerVersionHeader';
    protected $containerVersionHeaderDataType = 'array';


    /**
     * @param $containerVersion
     */
    public function setContainerVersion($containerVersion)
    {
        $this->containerVersion = $containerVersion;
    }

    /**
     * @return mixed
     */
    public function getContainerVersion()
    {
        return $this->containerVersion;
    }

    /**
     * @param $containerVersionHeader
     */
    public function setContainerVersionHeader($containerVersionHeader)
    {
        $this->containerVersionHeader = $containerVersionHeader;
    }

    /**
     * @return mixed
     */
    public function getContainerVersionHeader()
    {
        return $this->containerVersionHeader;
    }
}

/**
 * Class Google_Service_TagManager_ListContainersResponse
 */
class Google_Service_TagManager_ListContainersResponse extends Google_Collection
{
    protected $collection_key = 'containers';
    protected $internal_gapi_mappings = [];
    protected $containersType = 'Google_Service_TagManager_Container';
    protected $containersDataType = 'array';


    /**
     * @param $containers
     */
    public function setContainers($containers)
    {
        $this->containers = $containers;
    }

    /**
     * @return mixed
     */
    public function getContainers()
    {
        return $this->containers;
    }
}

/**
 * Class Google_Service_TagManager_ListMacrosResponse
 */
class Google_Service_TagManager_ListMacrosResponse extends Google_Collection
{
    protected $collection_key = 'macros';
    protected $internal_gapi_mappings = [];
    protected $macrosType = 'Google_Service_TagManager_Macro';
    protected $macrosDataType = 'array';


    /**
     * @param $macros
     */
    public function setMacros($macros)
    {
        $this->macros = $macros;
    }

    /**
     * @return mixed
     */
    public function getMacros()
    {
        return $this->macros;
    }
}

/**
 * Class Google_Service_TagManager_ListRulesResponse
 */
class Google_Service_TagManager_ListRulesResponse extends Google_Collection
{
    protected $collection_key = 'rules';
    protected $internal_gapi_mappings = [];
    protected $rulesType = 'Google_Service_TagManager_Rule';
    protected $rulesDataType = 'array';


    /**
     * @param $rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }
}

/**
 * Class Google_Service_TagManager_ListTagsResponse
 */
class Google_Service_TagManager_ListTagsResponse extends Google_Collection
{
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];
    protected $tagsType = 'Google_Service_TagManager_Tag';
    protected $tagsDataType = 'array';


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
    public function getTags()
    {
        return $this->tags;
    }
}

/**
 * Class Google_Service_TagManager_ListTriggersResponse
 */
class Google_Service_TagManager_ListTriggersResponse extends Google_Collection
{
    protected $collection_key = 'triggers';
    protected $internal_gapi_mappings = [];
    protected $triggersType = 'Google_Service_TagManager_Trigger';
    protected $triggersDataType = 'array';


    /**
     * @param $triggers
     */
    public function setTriggers($triggers)
    {
        $this->triggers = $triggers;
    }

    /**
     * @return mixed
     */
    public function getTriggers()
    {
        return $this->triggers;
    }
}

/**
 * Class Google_Service_TagManager_ListVariablesResponse
 */
class Google_Service_TagManager_ListVariablesResponse extends Google_Collection
{
    protected $collection_key = 'variables';
    protected $internal_gapi_mappings = [];
    protected $variablesType = 'Google_Service_TagManager_Variable';
    protected $variablesDataType = 'array';


    /**
     * @param $variables
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
    }

    /**
     * @return mixed
     */
    public function getVariables()
    {
        return $this->variables;
    }
}

/**
 * Class Google_Service_TagManager_Macro
 */
class Google_Service_TagManager_Macro extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $disablingRuleId;
    public $enablingRuleId;
    public $fingerprint;
    public $macroId;
    public $name;
    public $notes;
    public $scheduleEndMs;
    public $scheduleStartMs;
    public $type;
    protected $collection_key = 'parameter';
    protected $internal_gapi_mappings = [];
    protected $parameterType = 'Google_Service_TagManager_Parameter';
    protected $parameterDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getDisablingRuleId()
    {
        return $this->disablingRuleId;
    }

    /**
     * @param $disablingRuleId
     */
    public function setDisablingRuleId($disablingRuleId)
    {
        $this->disablingRuleId = $disablingRuleId;
    }

    /**
     * @return mixed
     */
    public function getEnablingRuleId()
    {
        return $this->enablingRuleId;
    }

    /**
     * @param $enablingRuleId
     */
    public function setEnablingRuleId($enablingRuleId)
    {
        $this->enablingRuleId = $enablingRuleId;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return mixed
     */
    public function getMacroId()
    {
        return $this->macroId;
    }

    /**
     * @param $macroId
     */
    public function setMacroId($macroId)
    {
        $this->macroId = $macroId;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @return mixed
     */
    public function getScheduleEndMs()
    {
        return $this->scheduleEndMs;
    }

    /**
     * @param $scheduleEndMs
     */
    public function setScheduleEndMs($scheduleEndMs)
    {
        $this->scheduleEndMs = $scheduleEndMs;
    }

    /**
     * @return mixed
     */
    public function getScheduleStartMs()
    {
        return $this->scheduleStartMs;
    }

    /**
     * @param $scheduleStartMs
     */
    public function setScheduleStartMs($scheduleStartMs)
    {
        $this->scheduleStartMs = $scheduleStartMs;
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
 * Class Google_Service_TagManager_Parameter
 */
class Google_Service_TagManager_Parameter extends Google_Collection
{
    public $key;
    public $type;
    public $value;
    protected $collection_key = 'map';
    protected $internal_gapi_mappings = [];
    protected $listType = 'Google_Service_TagManager_Parameter';
    protected $listDataType = 'array';
    protected $mapType = 'Google_Service_TagManager_Parameter';
    protected $mapDataType = 'array';

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
     * @param $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

    /**
     * @return mixed
     */
    public function getMap()
    {
        return $this->map;
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
 * Class Google_Service_TagManager_PublishContainerVersionResponse
 */
class Google_Service_TagManager_PublishContainerVersionResponse extends Google_Model
{
    public $compilerError;
    protected $internal_gapi_mappings = [];
    protected $containerVersionType = 'Google_Service_TagManager_ContainerVersion';
    protected $containerVersionDataType = '';

    /**
     * @return mixed
     */
    public function getCompilerError()
    {
        return $this->compilerError;
    }

    /**
     * @param $compilerError
     */
    public function setCompilerError($compilerError)
    {
        $this->compilerError = $compilerError;
    }

    /**
     * @param Google_Service_TagManager_ContainerVersion $containerVersion
     */
    public function setContainerVersion(Google_Service_TagManager_ContainerVersion $containerVersion)
    {
        $this->containerVersion = $containerVersion;
    }

    /**
     * @return mixed
     */
    public function getContainerVersion()
    {
        return $this->containerVersion;
    }
}

/**
 * Class Google_Service_TagManager_Rule
 */
class Google_Service_TagManager_Rule extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $fingerprint;
    public $name;
    public $notes;
    public $ruleId;
    protected $collection_key = 'condition';
    protected $internal_gapi_mappings = [];
    protected $conditionType = 'Google_Service_TagManager_Condition';
    protected $conditionDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param $condition
     */
    public function setCondition($condition)
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

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * @param $ruleId
     */
    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;
    }
}

/**
 * Class Google_Service_TagManager_Tag
 */
class Google_Service_TagManager_Tag extends Google_Collection
{
    public $accountId;
    public $blockingRuleId;
    public $blockingTriggerId;
    public $containerId;
    public $fingerprint;
    public $firingRuleId;
    public $firingTriggerId;
    public $liveOnly;
    public $name;
    public $notes;
    public $scheduleEndMs;
    public $scheduleStartMs;
    public $tagId;
    public $type;
    protected $collection_key = 'parameter';
    protected $internal_gapi_mappings = [];
    protected $parameterType = 'Google_Service_TagManager_Parameter';
    protected $parameterDataType = 'array';
    protected $priorityType = 'Google_Service_TagManager_Parameter';
    protected $priorityDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getBlockingRuleId()
    {
        return $this->blockingRuleId;
    }

    /**
     * @param $blockingRuleId
     */
    public function setBlockingRuleId($blockingRuleId)
    {
        $this->blockingRuleId = $blockingRuleId;
    }

    /**
     * @return mixed
     */
    public function getBlockingTriggerId()
    {
        return $this->blockingTriggerId;
    }

    /**
     * @param $blockingTriggerId
     */
    public function setBlockingTriggerId($blockingTriggerId)
    {
        $this->blockingTriggerId = $blockingTriggerId;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return mixed
     */
    public function getFiringRuleId()
    {
        return $this->firingRuleId;
    }

    /**
     * @param $firingRuleId
     */
    public function setFiringRuleId($firingRuleId)
    {
        $this->firingRuleId = $firingRuleId;
    }

    /**
     * @return mixed
     */
    public function getFiringTriggerId()
    {
        return $this->firingTriggerId;
    }

    /**
     * @param $firingTriggerId
     */
    public function setFiringTriggerId($firingTriggerId)
    {
        $this->firingTriggerId = $firingTriggerId;
    }

    /**
     * @return mixed
     */
    public function getLiveOnly()
    {
        return $this->liveOnly;
    }

    /**
     * @param $liveOnly
     */
    public function setLiveOnly($liveOnly)
    {
        $this->liveOnly = $liveOnly;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param Google_Service_TagManager_Parameter $priority
     */
    public function setPriority(Google_Service_TagManager_Parameter $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return mixed
     */
    public function getScheduleEndMs()
    {
        return $this->scheduleEndMs;
    }

    /**
     * @param $scheduleEndMs
     */
    public function setScheduleEndMs($scheduleEndMs)
    {
        $this->scheduleEndMs = $scheduleEndMs;
    }

    /**
     * @return mixed
     */
    public function getScheduleStartMs()
    {
        return $this->scheduleStartMs;
    }

    /**
     * @param $scheduleStartMs
     */
    public function setScheduleStartMs($scheduleStartMs)
    {
        $this->scheduleStartMs = $scheduleStartMs;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * @param $tagId
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;
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
 * Class Google_Service_TagManager_Trigger
 */
class Google_Service_TagManager_Trigger extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $fingerprint;
    public $name;
    public $triggerId;
    public $type;
    protected $collection_key = 'filter';
    protected $internal_gapi_mappings = [];
    protected $autoEventFilterType = 'Google_Service_TagManager_Condition';
    protected $autoEventFilterDataType = 'array';
    protected $checkValidationType = 'Google_Service_TagManager_Parameter';
    protected $checkValidationDataType = '';
    protected $customEventFilterType = 'Google_Service_TagManager_Condition';
    protected $customEventFilterDataType = 'array';
    protected $enableAllVideosType = 'Google_Service_TagManager_Parameter';
    protected $enableAllVideosDataType = '';
    protected $eventNameType = 'Google_Service_TagManager_Parameter';
    protected $eventNameDataType = '';
    protected $filterType = 'Google_Service_TagManager_Condition';
    protected $filterDataType = 'array';
    protected $intervalType = 'Google_Service_TagManager_Parameter';
    protected $intervalDataType = '';
    protected $limitType = 'Google_Service_TagManager_Parameter';
    protected $limitDataType = '';
    protected $uniqueTriggerIdType = 'Google_Service_TagManager_Parameter';
    protected $uniqueTriggerIdDataType = '';
    protected $videoPercentageListType = 'Google_Service_TagManager_Parameter';
    protected $videoPercentageListDataType = '';
    protected $waitForTagsType = 'Google_Service_TagManager_Parameter';
    protected $waitForTagsDataType = '';
    protected $waitForTagsTimeoutType = 'Google_Service_TagManager_Parameter';
    protected $waitForTagsTimeoutDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param $autoEventFilter
     */
    public function setAutoEventFilter($autoEventFilter)
    {
        $this->autoEventFilter = $autoEventFilter;
    }

    /**
     * @return mixed
     */
    public function getAutoEventFilter()
    {
        return $this->autoEventFilter;
    }

    /**
     * @param Google_Service_TagManager_Parameter $checkValidation
     */
    public function setCheckValidation(Google_Service_TagManager_Parameter $checkValidation)
    {
        $this->checkValidation = $checkValidation;
    }

    /**
     * @return mixed
     */
    public function getCheckValidation()
    {
        return $this->checkValidation;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @param $customEventFilter
     */
    public function setCustomEventFilter($customEventFilter)
    {
        $this->customEventFilter = $customEventFilter;
    }

    /**
     * @return mixed
     */
    public function getCustomEventFilter()
    {
        return $this->customEventFilter;
    }

    /**
     * @param Google_Service_TagManager_Parameter $enableAllVideos
     */
    public function setEnableAllVideos(Google_Service_TagManager_Parameter $enableAllVideos)
    {
        $this->enableAllVideos = $enableAllVideos;
    }

    /**
     * @return mixed
     */
    public function getEnableAllVideos()
    {
        return $this->enableAllVideos;
    }

    /**
     * @param Google_Service_TagManager_Parameter $eventName
     */
    public function setEventName(Google_Service_TagManager_Parameter $eventName)
    {
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
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
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @param Google_Service_TagManager_Parameter $interval
     */
    public function setInterval(Google_Service_TagManager_Parameter $interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param Google_Service_TagManager_Parameter $limit
     */
    public function setLimit(Google_Service_TagManager_Parameter $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
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
    public function getTriggerId()
    {
        return $this->triggerId;
    }

    /**
     * @param $triggerId
     */
    public function setTriggerId($triggerId)
    {
        $this->triggerId = $triggerId;
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
     * @param Google_Service_TagManager_Parameter $uniqueTriggerId
     */
    public function setUniqueTriggerId(Google_Service_TagManager_Parameter $uniqueTriggerId)
    {
        $this->uniqueTriggerId = $uniqueTriggerId;
    }

    /**
     * @return mixed
     */
    public function getUniqueTriggerId()
    {
        return $this->uniqueTriggerId;
    }

    /**
     * @param Google_Service_TagManager_Parameter $videoPercentageList
     */
    public function setVideoPercentageList(Google_Service_TagManager_Parameter $videoPercentageList)
    {
        $this->videoPercentageList = $videoPercentageList;
    }

    /**
     * @return mixed
     */
    public function getVideoPercentageList()
    {
        return $this->videoPercentageList;
    }

    /**
     * @param Google_Service_TagManager_Parameter $waitForTags
     */
    public function setWaitForTags(Google_Service_TagManager_Parameter $waitForTags)
    {
        $this->waitForTags = $waitForTags;
    }

    /**
     * @return mixed
     */
    public function getWaitForTags()
    {
        return $this->waitForTags;
    }

    /**
     * @param Google_Service_TagManager_Parameter $waitForTagsTimeout
     */
    public function setWaitForTagsTimeout(Google_Service_TagManager_Parameter $waitForTagsTimeout)
    {
        $this->waitForTagsTimeout = $waitForTagsTimeout;
    }

    /**
     * @return mixed
     */
    public function getWaitForTagsTimeout()
    {
        return $this->waitForTagsTimeout;
    }
}

/**
 * Class Google_Service_TagManager_UserAccess
 */
class Google_Service_TagManager_UserAccess extends Google_Collection
{
    public $accountId;
    public $emailAddress;
    public $permissionId;
    protected $collection_key = 'containerAccess';
    protected $internal_gapi_mappings = [];
    protected $accountAccessType = 'Google_Service_TagManager_AccountAccess';
    protected $accountAccessDataType = '';
    protected $containerAccessType = 'Google_Service_TagManager_ContainerAccess';
    protected $containerAccessDataType = 'array';

    /**
     * @param Google_Service_TagManager_AccountAccess $accountAccess
     */
    public function setAccountAccess(Google_Service_TagManager_AccountAccess $accountAccess)
    {
        $this->accountAccess = $accountAccess;
    }

    /**
     * @return mixed
     */
    public function getAccountAccess()
    {
        return $this->accountAccess;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param $containerAccess
     */
    public function setContainerAccess($containerAccess)
    {
        $this->containerAccess = $containerAccess;
    }

    /**
     * @return mixed
     */
    public function getContainerAccess()
    {
        return $this->containerAccess;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getPermissionId()
    {
        return $this->permissionId;
    }

    /**
     * @param $permissionId
     */
    public function setPermissionId($permissionId)
    {
        $this->permissionId = $permissionId;
    }
}

/**
 * Class Google_Service_TagManager_Variable
 */
class Google_Service_TagManager_Variable extends Google_Collection
{
    public $accountId;
    public $containerId;
    public $disablingTriggerId;
    public $enablingTriggerId;
    public $fingerprint;
    public $name;
    public $notes;
    public $scheduleEndMs;
    public $scheduleStartMs;
    public $type;
    public $variableId;
    protected $collection_key = 'parameter';
    protected $internal_gapi_mappings = [];
    protected $parameterType = 'Google_Service_TagManager_Parameter';
    protected $parameterDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param $containerId
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
    }

    /**
     * @return mixed
     */
    public function getDisablingTriggerId()
    {
        return $this->disablingTriggerId;
    }

    /**
     * @param $disablingTriggerId
     */
    public function setDisablingTriggerId($disablingTriggerId)
    {
        $this->disablingTriggerId = $disablingTriggerId;
    }

    /**
     * @return mixed
     */
    public function getEnablingTriggerId()
    {
        return $this->enablingTriggerId;
    }

    /**
     * @param $enablingTriggerId
     */
    public function setEnablingTriggerId($enablingTriggerId)
    {
        $this->enablingTriggerId = $enablingTriggerId;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @return mixed
     */
    public function getScheduleEndMs()
    {
        return $this->scheduleEndMs;
    }

    /**
     * @param $scheduleEndMs
     */
    public function setScheduleEndMs($scheduleEndMs)
    {
        $this->scheduleEndMs = $scheduleEndMs;
    }

    /**
     * @return mixed
     */
    public function getScheduleStartMs()
    {
        return $this->scheduleStartMs;
    }

    /**
     * @param $scheduleStartMs
     */
    public function setScheduleStartMs($scheduleStartMs)
    {
        $this->scheduleStartMs = $scheduleStartMs;
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
    public function getVariableId()
    {
        return $this->variableId;
    }

    /**
     * @param $variableId
     */
    public function setVariableId($variableId)
    {
        $this->variableId = $variableId;
    }
}
