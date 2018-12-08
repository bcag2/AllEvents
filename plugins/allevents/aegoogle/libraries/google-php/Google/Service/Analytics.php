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
 * Service definition for Analytics (v3).
 *
 * <p>
 * View and manage your Google Analytics data</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/analytics/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Analytics extends Google_Service
{
    /** View and manage your Google Analytics data. */
    const ANALYTICS =
        "https://www.googleapis.com/auth/analytics";
    /** Edit Google Analytics management entities. */
    const ANALYTICS_EDIT =
        "https://www.googleapis.com/auth/analytics.edit";
    /** Manage Google Analytics Account users by email address. */
    const ANALYTICS_MANAGE_USERS =
        "https://www.googleapis.com/auth/analytics.manage.users";
    /** View Google Analytics user permissions. */
    const ANALYTICS_MANAGE_USERS_READONLY =
        "https://www.googleapis.com/auth/analytics.manage.users.readonly";
    /** Create a new Google Analytics account along with its default property and view. */
    const ANALYTICS_PROVISION =
        "https://www.googleapis.com/auth/analytics.provision";
    /** View your Google Analytics data. */
    const ANALYTICS_READONLY =
        "https://www.googleapis.com/auth/analytics.readonly";

    public $data_ga;
    public $data_mcf;
    public $data_realtime;
    public $management_accountSummaries;
    public $management_accountUserLinks;
    public $management_accounts;
    public $management_customDataSources;
    public $management_customDimensions;
    public $management_customMetrics;
    public $management_experiments;
    public $management_filters;
    public $management_goals;
    public $management_profileFilterLinks;
    public $management_profileUserLinks;
    public $management_profiles;
    public $management_segments;
    public $management_unsampledReports;
    public $management_uploads;
    public $management_webPropertyAdWordsLinks;
    public $management_webproperties;
    public $management_webpropertyUserLinks;
    public $metadata_columns;
    public $provisioning;


    /**
     * Constructs the internal representation of the Analytics service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'analytics/v3/';
        $this->version = 'v3';
        $this->serviceName = 'analytics';

        $this->data_ga = new Google_Service_Analytics_DataGa_Resource(
            $this,
            $this->serviceName,
            'ga',
            [
                'methods' => [
                    'get' => [
                        'path' => 'data/ga',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'start-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'end-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metrics' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'dimensions' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'segment' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'samplingLevel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'output' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->data_mcf = new Google_Service_Analytics_DataMcf_Resource(
            $this,
            $this->serviceName,
            'mcf',
            [
                'methods' => [
                    'get' => [
                        'path' => 'data/mcf',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'start-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'end-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metrics' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'dimensions' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'samplingLevel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->data_realtime = new Google_Service_Analytics_DataRealtime_Resource(
            $this,
            $this->serviceName,
            'realtime',
            [
                'methods' => [
                    'get' => [
                        'path' => 'data/realtime',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metrics' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'dimensions' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_accountSummaries = new Google_Service_Analytics_ManagementAccountSummaries_Resource(
            $this,
            $this->serviceName,
            'accountSummaries',
            [
                'methods' => [
                    'list' => [
                        'path' => 'management/accountSummaries',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_accountUserLinks = new Google_Service_Analytics_ManagementAccountUserLinks_Resource(
            $this,
            $this->serviceName,
            'accountUserLinks',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/entityUserLinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/entityUserLinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_accounts = new Google_Service_Analytics_ManagementAccounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'list' => [
                        'path' => 'management/accounts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_customDataSources = new Google_Service_Analytics_ManagementCustomDataSources_Resource(
            $this,
            $this->serviceName,
            'customDataSources',
            [
                'methods' => [
                    'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_customDimensions = new Google_Service_Analytics_ManagementCustomDimensions_Resource(
            $this,
            $this->serviceName,
            'customDimensions',
            [
                'methods' => [
                    'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDimensionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDimensionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ignoreCustomDataSourceLinks' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDimensionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ignoreCustomDataSourceLinks' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_customMetrics = new Google_Service_Analytics_ManagementCustomMetrics_Resource(
            $this,
            $this->serviceName,
            'customMetrics',
            [
                'methods' => [
                    'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customMetricId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customMetricId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ignoreCustomDataSourceLinks' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customMetricId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ignoreCustomDataSourceLinks' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_experiments = new Google_Service_Analytics_ManagementExperiments_Resource(
            $this,
            $this->serviceName,
            'experiments',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'experimentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'experimentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'experimentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'experimentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_filters = new Google_Service_Analytics_ManagementFilters_Resource(
            $this,
            $this->serviceName,
            'filters',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/filters/{filterId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/filters/{filterId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/filters',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/filters',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/filters/{filterId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/filters/{filterId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filterId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_goals = new Google_Service_Analytics_ManagementGoals_Resource(
            $this,
            $this->serviceName,
            'goals',
            [
                'methods' => [
                    'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'goalId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'goalId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'goalId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_profileFilterLinks = new Google_Service_Analytics_ManagementProfileFilterLinks_Resource(
            $this,
            $this->serviceName,
            'profileFilterLinks',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_profileUserLinks = new Google_Service_Analytics_ManagementProfileUserLinks_Resource(
            $this,
            $this->serviceName,
            'profileUserLinks',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_profiles = new Google_Service_Analytics_ManagementProfiles_Resource(
            $this,
            $this->serviceName,
            'profiles',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_segments = new Google_Service_Analytics_ManagementSegments_Resource(
            $this,
            $this->serviceName,
            'segments',
            [
                'methods' => [
                    'list' => [
                        'path' => 'management/segments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_unsampledReports = new Google_Service_Analytics_ManagementUnsampledReports_Resource(
            $this,
            $this->serviceName,
            'unsampledReports',
            [
                'methods' => [
                    'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports/{unsampledReportId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'unsampledReportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_uploads = new Google_Service_Analytics_ManagementUploads_Resource(
            $this,
            $this->serviceName,
            'uploads',
            [
                'methods' => [
                    'deleteUploadData' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/deleteUploadData',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads/{uploadId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'uploadId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'uploadData' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customDataSourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_webPropertyAdWordsLinks = new Google_Service_Analytics_ManagementWebPropertyAdWordsLinks_Resource(
            $this,
            $this->serviceName,
            'webPropertyAdWordsLinks',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyAdWordsLinkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyAdWordsLinkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyAdWordsLinkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyAdWordsLinkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_webproperties = new Google_Service_Analytics_ManagementWebproperties_Resource(
            $this,
            $this->serviceName,
            'webproperties',
            [
                'methods' => [
                    'get' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->management_webpropertyUserLinks = new Google_Service_Analytics_ManagementWebpropertyUserLinks_Resource(
            $this,
            $this->serviceName,
            'webpropertyUserLinks',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks/{linkId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'webPropertyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'linkId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->metadata_columns = new Google_Service_Analytics_MetadataColumns_Resource(
            $this,
            $this->serviceName,
            'columns',
            [
                'methods' => [
                    'list' => [
                        'path' => 'metadata/{reportType}/columns',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'reportType' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->provisioning = new Google_Service_Analytics_Provisioning_Resource(
            $this,
            $this->serviceName,
            'provisioning',
            [
                'methods' => [
                    'createAccountTicket' => [
                        'path' => 'provisioning/createAccountTicket',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "data" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $data = $analyticsService->data;
 *  </code>
 */
class Google_Service_Analytics_Data_Resource extends Google_Service_Resource
{
}

/**
 * The "ga" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $ga = $analyticsService->ga;
 *  </code>
 */
class Google_Service_Analytics_DataGa_Resource extends Google_Service_Resource
{

    /**
     * Returns Analytics data for a view (profile). (ga.get)
     *
     * @param string $ids Unique table ID for retrieving Analytics data. Table ID is
     *                          of the form ga:XXXX, where XXXX is the Analytics view (profile) ID.
     * @param string $startDate Start date for fetching Analytics data. Requests can
     *                          specify a start date formatted as YYYY-MM-DD, or as a relative date (e.g.,
     *                          today, yesterday, or 7daysAgo). The default value is 7daysAgo.
     * @param string $endDate End date for fetching Analytics data. Request can
     *                          should specify an end date formatted as YYYY-MM-DD, or as a relative date
     *                          (e.g., today, yesterday, or 7daysAgo). The default value is yesterday.
     * @param string $metrics A comma-separated list of Analytics metrics. E.g.,
     *                          'ga:sessions,ga:pageviews'. At least one metric must be specified.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of entries to include in this
     * feed.
     * @opt_param string sort A comma-separated list of dimensions or metrics that
     * determine the sort order for Analytics data.
     * @opt_param string dimensions A comma-separated list of Analytics dimensions.
     * E.g., 'ga:browser,ga:city'.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     * @opt_param string segment An Analytics segment to be applied to data.
     * @opt_param string samplingLevel The desired sampling level.
     * @opt_param string filters A comma-separated list of dimension or metric
     * filters to be applied to Analytics data.
     * @opt_param string output The selected format for the response. Default format
     * is JSON.
     */
    public function get($ids, $startDate, $endDate, $metrics, $optParams = [])
    {
        $params = ['ids' => $ids, 'start-date' => $startDate, 'end-date' => $endDate, 'metrics' => $metrics];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_GaData");
    }
}

/**
 * The "mcf" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $mcf = $analyticsService->mcf;
 *  </code>
 */
class Google_Service_Analytics_DataMcf_Resource extends Google_Service_Resource
{

    /**
     * Returns Analytics Multi-Channel Funnels data for a view (profile). (mcf.get)
     *
     * @param string $ids Unique table ID for retrieving Analytics data. Table ID is
     *                          of the form ga:XXXX, where XXXX is the Analytics view (profile) ID.
     * @param string $startDate Start date for fetching Analytics data. Requests can
     *                          specify a start date formatted as YYYY-MM-DD, or as a relative date (e.g.,
     *                          today, yesterday, or 7daysAgo). The default value is 7daysAgo.
     * @param string $endDate End date for fetching Analytics data. Requests can
     *                          specify a start date formatted as YYYY-MM-DD, or as a relative date (e.g.,
     *                          today, yesterday, or 7daysAgo). The default value is 7daysAgo.
     * @param string $metrics A comma-separated list of Multi-Channel Funnels
     *                          metrics. E.g., 'mcf:totalConversions,mcf:totalConversionValue'. At least one
     *                          metric must be specified.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of entries to include in this
     * feed.
     * @opt_param string sort A comma-separated list of dimensions or metrics that
     * determine the sort order for the Analytics data.
     * @opt_param string dimensions A comma-separated list of Multi-Channel Funnels
     * dimensions. E.g., 'mcf:source,mcf:medium'.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     * @opt_param string samplingLevel The desired sampling level.
     * @opt_param string filters A comma-separated list of dimension or metric
     * filters to be applied to the Analytics data.
     */
    public function get($ids, $startDate, $endDate, $metrics, $optParams = [])
    {
        $params = ['ids' => $ids, 'start-date' => $startDate, 'end-date' => $endDate, 'metrics' => $metrics];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_McfData");
    }
}

/**
 * The "realtime" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $realtime = $analyticsService->realtime;
 *  </code>
 */
class Google_Service_Analytics_DataRealtime_Resource extends Google_Service_Resource
{

    /**
     * Returns real time data for a view (profile). (realtime.get)
     *
     * @param string $ids Unique table ID for retrieving real time data. Table ID is
     *                          of the form ga:XXXX, where XXXX is the Analytics view (profile) ID.
     * @param string $metrics A comma-separated list of real time metrics. E.g.,
     *                          'rt:activeUsers'. At least one metric must be specified.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of entries to include in this
     * feed.
     * @opt_param string sort A comma-separated list of dimensions or metrics that
     * determine the sort order for real time data.
     * @opt_param string dimensions A comma-separated list of real time dimensions.
     * E.g., 'rt:medium,rt:city'.
     * @opt_param string filters A comma-separated list of dimension or metric
     * filters to be applied to real time data.
     */
    public function get($ids, $metrics, $optParams = [])
    {
        $params = ['ids' => $ids, 'metrics' => $metrics];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_RealtimeData");
    }
}

/**
 * The "management" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $management = $analyticsService->management;
 *  </code>
 */
class Google_Service_Analytics_Management_Resource extends Google_Service_Resource
{
}

/**
 * The "accountSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $accountSummaries = $analyticsService->accountSummaries;
 *  </code>
 */
class Google_Service_Analytics_ManagementAccountSummaries_Resource extends Google_Service_Resource
{

    /**
     * Lists account summaries (lightweight tree comprised of
     * accounts/properties/profiles) to which the user has access.
     * (accountSummaries.listManagementAccountSummaries)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of account summaries to include
     * in this response, where the largest acceptable value is 1000.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementAccountSummaries($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_AccountSummaries");
    }
}

/**
 * The "accountUserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $accountUserLinks = $analyticsService->accountUserLinks;
 *  </code>
 */
class Google_Service_Analytics_ManagementAccountUserLinks_Resource extends Google_Service_Resource
{

    /**
     * Removes a user from the given account. (accountUserLinks.delete)
     *
     * @param string $accountId Account ID to delete the user link for.
     * @param string $linkId Link ID to delete the user link for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $linkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'linkId' => $linkId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Adds a new user to the given account. (accountUserLinks.insert)
     *
     * @param string $accountId Account ID to create the user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_EntityUserLink");
    }

    /**
     * Lists account-user links for a given account.
     * (accountUserLinks.listManagementAccountUserLinks)
     *
     * @param string $accountId Account ID to retrieve the user links for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of account-user links to
     * include in this response.
     * @opt_param int start-index An index of the first account-user link to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementAccountUserLinks($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_EntityUserLinks");
    }

    /**
     * Updates permissions for an existing user on the given account.
     * (accountUserLinks.update)
     *
     * @param string $accountId Account ID to update the account-user link for.
     * @param string $linkId Link ID to update the account-user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $linkId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'linkId' => $linkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_EntityUserLink");
    }
}

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $accounts = $analyticsService->accounts;
 *  </code>
 */
class Google_Service_Analytics_ManagementAccounts_Resource extends Google_Service_Resource
{

    /**
     * Lists all accounts to which the user has access.
     * (accounts.listManagementAccounts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of accounts to include in this
     * response.
     * @opt_param int start-index An index of the first account to retrieve. Use
     * this parameter as a pagination mechanism along with the max-results
     * parameter.
     */
    public function listManagementAccounts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Accounts");
    }
}

/**
 * The "customDataSources" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $customDataSources = $analyticsService->customDataSources;
 *  </code>
 */
class Google_Service_Analytics_ManagementCustomDataSources_Resource extends Google_Service_Resource
{

    /**
     * List custom data sources to which the user has access.
     * (customDataSources.listManagementCustomDataSources)
     *
     * @param string $accountId Account Id for the custom data sources to retrieve.
     * @param string $webPropertyId Web property Id for the custom data sources to
     *                              retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of custom data sources to
     * include in this response.
     * @opt_param int start-index A 1-based index of the first custom data source to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementCustomDataSources($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_CustomDataSources");
    }
}

/**
 * The "customDimensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $customDimensions = $analyticsService->customDimensions;
 *  </code>
 */
class Google_Service_Analytics_ManagementCustomDimensions_Resource extends Google_Service_Resource
{

    /**
     * Get a custom dimension to which the user has access. (customDimensions.get)
     *
     * @param string $accountId Account ID for the custom dimension to retrieve.
     * @param string $webPropertyId Web property ID for the custom dimension to
     *                                  retrieve.
     * @param string $customDimensionId The ID of the custom dimension to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $webPropertyId, $customDimensionId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDimensionId' => $customDimensionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_CustomDimension");
    }

    /**
     * Create a new custom dimension. (customDimensions.insert)
     *
     * @param string $accountId Account ID for the custom dimension to create.
     * @param string $webPropertyId Web property ID for the custom dimension to
     *                                                                                       create.
     * @param Google_CustomDimension|Google_Service_Analytics_CustomDimension $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($accountId, $webPropertyId, Google_Service_Analytics_CustomDimension $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_CustomDimension");
    }

    /**
     * Lists custom dimensions to which the user has access.
     * (customDimensions.listManagementCustomDimensions)
     *
     * @param string $accountId Account ID for the custom dimensions to retrieve.
     * @param string $webPropertyId Web property ID for the custom dimensions to
     *                              retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param int max-results The maximum number of custom dimensions to include
     * in this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementCustomDimensions($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_CustomDimensions");
    }

    /**
     * Updates an existing custom dimension. This method supports patch semantics.
     * (customDimensions.patch)
     *
     * @param string $accountId Account ID for the custom dimension to update.
     * @param string $webPropertyId Web property ID for the custom dimension to
     *                                                                                           update.
     * @param string $customDimensionId Custom dimension ID for the custom dimension
     *                                                                                           to update.
     * @param Google_CustomDimension|Google_Service_Analytics_CustomDimension $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool ignoreCustomDataSourceLinks Force the update and ignore any
     * warnings related to the custom dimension being linked to a custom data source
     * / data set.
     */
    public function patch($accountId, $webPropertyId, $customDimensionId, Google_Service_Analytics_CustomDimension $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDimensionId' => $customDimensionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_CustomDimension");
    }

    /**
     * Updates an existing custom dimension. (customDimensions.update)
     *
     * @param string $accountId Account ID for the custom dimension to update.
     * @param string $webPropertyId Web property ID for the custom dimension to
     *                                                                                           update.
     * @param string $customDimensionId Custom dimension ID for the custom dimension
     *                                                                                           to update.
     * @param Google_CustomDimension|Google_Service_Analytics_CustomDimension $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool ignoreCustomDataSourceLinks Force the update and ignore any
     * warnings related to the custom dimension being linked to a custom data source
     * / data set.
     */
    public function update($accountId, $webPropertyId, $customDimensionId, Google_Service_Analytics_CustomDimension $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDimensionId' => $customDimensionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_CustomDimension");
    }
}

/**
 * The "customMetrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $customMetrics = $analyticsService->customMetrics;
 *  </code>
 */
class Google_Service_Analytics_ManagementCustomMetrics_Resource extends Google_Service_Resource
{

    /**
     * Get a custom metric to which the user has access. (customMetrics.get)
     *
     * @param string $accountId Account ID for the custom metric to retrieve.
     * @param string $webPropertyId Web property ID for the custom metric to
     *                               retrieve.
     * @param string $customMetricId The ID of the custom metric to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $webPropertyId, $customMetricId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customMetricId' => $customMetricId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_CustomMetric");
    }

    /**
     * Create a new custom metric. (customMetrics.insert)
     *
     * @param string $accountId Account ID for the custom metric to create.
     * @param string $webPropertyId Web property ID for the custom dimension to
     *                                                                                 create.
     * @param Google_CustomMetric|Google_Service_Analytics_CustomMetric $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($accountId, $webPropertyId, Google_Service_Analytics_CustomMetric $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_CustomMetric");
    }

    /**
     * Lists custom metrics to which the user has access.
     * (customMetrics.listManagementCustomMetrics)
     *
     * @param string $accountId Account ID for the custom metrics to retrieve.
     * @param string $webPropertyId Web property ID for the custom metrics to
     *                              retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param int max-results The maximum number of custom metrics to include in
     * this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementCustomMetrics($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_CustomMetrics");
    }

    /**
     * Updates an existing custom metric. This method supports patch semantics.
     * (customMetrics.patch)
     *
     * @param string $accountId Account ID for the custom metric to update.
     * @param string $webPropertyId Web property ID for the custom metric to update.
     * @param string $customMetricId Custom metric ID for the custom metric to
     *                                                                                  update.
     * @param Google_CustomMetric|Google_Service_Analytics_CustomMetric $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool ignoreCustomDataSourceLinks Force the update and ignore any
     * warnings related to the custom metric being linked to a custom data source /
     * data set.
     */
    public function patch($accountId, $webPropertyId, $customMetricId, Google_Service_Analytics_CustomMetric $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customMetricId' => $customMetricId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_CustomMetric");
    }

    /**
     * Updates an existing custom metric. (customMetrics.update)
     *
     * @param string $accountId Account ID for the custom metric to update.
     * @param string $webPropertyId Web property ID for the custom metric to update.
     * @param string $customMetricId Custom metric ID for the custom metric to
     *                                                                                  update.
     * @param Google_CustomMetric|Google_Service_Analytics_CustomMetric $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool ignoreCustomDataSourceLinks Force the update and ignore any
     * warnings related to the custom metric being linked to a custom data source /
     * data set.
     */
    public function update($accountId, $webPropertyId, $customMetricId, Google_Service_Analytics_CustomMetric $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customMetricId' => $customMetricId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_CustomMetric");
    }
}

/**
 * The "experiments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $experiments = $analyticsService->experiments;
 *  </code>
 */
class Google_Service_Analytics_ManagementExperiments_Resource extends Google_Service_Resource
{

    /**
     * Delete an experiment. (experiments.delete)
     *
     * @param string $accountId Account ID to which the experiment belongs
     * @param string $webPropertyId Web property ID to which the experiment belongs
     * @param string $profileId View (Profile) ID to which the experiment belongs
     * @param string $experimentId ID of the experiment to delete
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $profileId, $experimentId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns an experiment to which the user has access. (experiments.get)
     *
     * @param string $accountId Account ID to retrieve the experiment for.
     * @param string $webPropertyId Web property ID to retrieve the experiment for.
     * @param string $profileId View (Profile) ID to retrieve the experiment for.
     * @param string $experimentId Experiment ID to retrieve the experiment for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $profileId, $experimentId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Experiment");
    }

    /**
     * Create a new experiment. (experiments.insert)
     *
     * @param string $accountId Account ID to create the experiment for.
     * @param string $webPropertyId Web property ID to create the experiment for.
     * @param string $profileId View (Profile) ID to create the experiment for.
     * @param Google_Experiment|Google_Service_Analytics_Experiment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_Experiment $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_Experiment");
    }

    /**
     * Lists experiments to which the user has access.
     * (experiments.listManagementExperiments)
     *
     * @param string $accountId Account ID to retrieve experiments for.
     * @param string $webPropertyId Web property ID to retrieve experiments for.
     * @param string $profileId View (Profile) ID to retrieve experiments for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of experiments to include in
     * this response.
     * @opt_param int start-index An index of the first experiment to retrieve. Use
     * this parameter as a pagination mechanism along with the max-results
     * parameter.
     */
    public function listManagementExperiments($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Experiments");
    }

    /**
     * Update an existing experiment. This method supports patch semantics.
     * (experiments.patch)
     *
     * @param string $accountId Account ID of the experiment to update.
     * @param string $webPropertyId Web property ID of the experiment to update.
     * @param string $profileId View (Profile) ID of the experiment to update.
     * @param string $experimentId Experiment ID of the experiment to update.
     * @param Google_Experiment|Google_Service_Analytics_Experiment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, $profileId, $experimentId, Google_Service_Analytics_Experiment $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_Experiment");
    }

    /**
     * Update an existing experiment. (experiments.update)
     *
     * @param string $accountId Account ID of the experiment to update.
     * @param string $webPropertyId Web property ID of the experiment to update.
     * @param string $profileId View (Profile) ID of the experiment to update.
     * @param string $experimentId Experiment ID of the experiment to update.
     * @param Google_Experiment|Google_Service_Analytics_Experiment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $profileId, $experimentId, Google_Service_Analytics_Experiment $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'experimentId' => $experimentId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_Experiment");
    }
}

/**
 * The "filters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $filters = $analyticsService->filters;
 *  </code>
 */
class Google_Service_Analytics_ManagementFilters_Resource extends Google_Service_Resource
{

    /**
     * Delete a filter. (filters.delete)
     *
     * @param string $accountId Account ID to delete the filter for.
     * @param string $filterId ID of the filter to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $filterId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'filterId' => $filterId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Analytics_Filter");
    }

    /**
     * Returns a filters to which the user has access. (filters.get)
     *
     * @param string $accountId Account ID to retrieve filters for.
     * @param string $filterId Filter ID to retrieve filters for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $filterId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'filterId' => $filterId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Filter");
    }

    /**
     * Create a new filter. (filters.insert)
     *
     * @param string $accountId Account ID to create filter for.
     * @param Google_Filter|Google_Service_Analytics_Filter $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, Google_Service_Analytics_Filter $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_Filter");
    }

    /**
     * Lists all filters for an account (filters.listManagementFilters)
     *
     * @param string $accountId Account ID to retrieve filters for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of filters to include in this
     * response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementFilters($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Filters");
    }

    /**
     * Updates an existing filter. This method supports patch semantics.
     * (filters.patch)
     *
     * @param string $accountId Account ID to which the filter belongs.
     * @param string $filterId ID of the filter to be updated.
     * @param Google_Filter|Google_Service_Analytics_Filter $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $filterId, Google_Service_Analytics_Filter $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'filterId' => $filterId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_Filter");
    }

    /**
     * Updates an existing filter. (filters.update)
     *
     * @param string $accountId Account ID to which the filter belongs.
     * @param string $filterId ID of the filter to be updated.
     * @param Google_Filter|Google_Service_Analytics_Filter $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $filterId, Google_Service_Analytics_Filter $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'filterId' => $filterId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_Filter");
    }
}

/**
 * The "goals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $goals = $analyticsService->goals;
 *  </code>
 */
class Google_Service_Analytics_ManagementGoals_Resource extends Google_Service_Resource
{

    /**
     * Gets a goal to which the user has access. (goals.get)
     *
     * @param string $accountId Account ID to retrieve the goal for.
     * @param string $webPropertyId Web property ID to retrieve the goal for.
     * @param string $profileId View (Profile) ID to retrieve the goal for.
     * @param string $goalId Goal ID to retrieve the goal for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $profileId, $goalId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Goal");
    }

    /**
     * Create a new goal. (goals.insert)
     *
     * @param string $accountId Account ID to create the goal for.
     * @param string $webPropertyId Web property ID to create the goal for.
     * @param string $profileId View (Profile) ID to create the goal for.
     * @param Google_Goal|Google_Service_Analytics_Goal $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_Goal $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_Goal");
    }

    /**
     * Lists goals to which the user has access. (goals.listManagementGoals)
     *
     * @param string $accountId Account ID to retrieve goals for. Can either be a
     *                              specific account ID or '~all', which refers to all the accounts that user has
     *                              access to.
     * @param string $webPropertyId Web property ID to retrieve goals for. Can
     *                              either be a specific web property ID or '~all', which refers to all the web
     *                              properties that user has access to.
     * @param string $profileId View (Profile) ID to retrieve goals for. Can either
     *                              be a specific view (profile) ID or '~all', which refers to all the views
     *                              (profiles) that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of goals to include in this
     * response.
     * @opt_param int start-index An index of the first goal to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementGoals($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Goals");
    }

    /**
     * Updates an existing view (profile). This method supports patch semantics.
     * (goals.patch)
     *
     * @param string $accountId Account ID to update the goal.
     * @param string $webPropertyId Web property ID to update the goal.
     * @param string $profileId View (Profile) ID to update the goal.
     * @param string $goalId Index of the goal to be updated.
     * @param Google_Goal|Google_Service_Analytics_Goal $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, $profileId, $goalId, Google_Service_Analytics_Goal $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_Goal");
    }

    /**
     * Updates an existing view (profile). (goals.update)
     *
     * @param string $accountId Account ID to update the goal.
     * @param string $webPropertyId Web property ID to update the goal.
     * @param string $profileId View (Profile) ID to update the goal.
     * @param string $goalId Index of the goal to be updated.
     * @param Google_Goal|Google_Service_Analytics_Goal $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $profileId, $goalId, Google_Service_Analytics_Goal $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'goalId' => $goalId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_Goal");
    }
}

/**
 * The "profileFilterLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $profileFilterLinks = $analyticsService->profileFilterLinks;
 *  </code>
 */
class Google_Service_Analytics_ManagementProfileFilterLinks_Resource extends Google_Service_Resource
{

    /**
     * Delete a profile filter link. (profileFilterLinks.delete)
     *
     * @param string $accountId Account ID to which the profile filter link belongs.
     * @param string $webPropertyId Web property Id to which the profile filter link
     *                              belongs.
     * @param string $profileId Profile ID to which the filter link belongs.
     * @param string $linkId ID of the profile filter link to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $profileId, $linkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns a single profile filter link. (profileFilterLinks.get)
     *
     * @param string $accountId Account ID to retrieve profile filter link for.
     * @param string $webPropertyId Web property Id to retrieve profile filter link
     *                              for.
     * @param string $profileId Profile ID to retrieve filter link for.
     * @param string $linkId ID of the profile filter link.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $profileId, $linkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_ProfileFilterLink");
    }

    /**
     * Create a new profile filter link. (profileFilterLinks.insert)
     *
     * @param string $accountId Account ID to create profile filter link for.
     * @param string $webPropertyId Web property Id to create profile filter link
     *                                                                                           for.
     * @param string $profileId Profile ID to create filter link for.
     * @param Google_ProfileFilterLink|Google_Service_Analytics_ProfileFilterLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_ProfileFilterLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_ProfileFilterLink");
    }

    /**
     * Lists all profile filter links for a profile.
     * (profileFilterLinks.listManagementProfileFilterLinks)
     *
     * @param string $accountId Account ID to retrieve profile filter links for.
     * @param string $webPropertyId Web property Id for profile filter links for.
     *                              Can either be a specific web property ID or '~all', which refers to all the
     *                              web properties that user has access to.
     * @param string $profileId Profile ID to retrieve filter links for. Can either
     *                              be a specific profile ID or '~all', which refers to all the profiles that
     *                              user has access to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of profile filter links to
     * include in this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementProfileFilterLinks($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_ProfileFilterLinks");
    }

    /**
     * Update an existing profile filter link. This method supports patch semantics.
     * (profileFilterLinks.patch)
     *
     * @param string $accountId Account ID to which profile filter link belongs.
     * @param string $webPropertyId Web property Id to which profile filter link
     *                                                                                           belongs
     * @param string $profileId Profile ID to which filter link belongs
     * @param string $linkId ID of the profile filter link to be updated.
     * @param Google_ProfileFilterLink|Google_Service_Analytics_ProfileFilterLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, $profileId, $linkId, Google_Service_Analytics_ProfileFilterLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_ProfileFilterLink");
    }

    /**
     * Update an existing profile filter link. (profileFilterLinks.update)
     *
     * @param string $accountId Account ID to which profile filter link belongs.
     * @param string $webPropertyId Web property Id to which profile filter link
     *                                                                                           belongs
     * @param string $profileId Profile ID to which filter link belongs
     * @param string $linkId ID of the profile filter link to be updated.
     * @param Google_ProfileFilterLink|Google_Service_Analytics_ProfileFilterLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $profileId, $linkId, Google_Service_Analytics_ProfileFilterLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_ProfileFilterLink");
    }
}

/**
 * The "profileUserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $profileUserLinks = $analyticsService->profileUserLinks;
 *  </code>
 */
class Google_Service_Analytics_ManagementProfileUserLinks_Resource extends Google_Service_Resource
{

    /**
     * Removes a user from the given view (profile). (profileUserLinks.delete)
     *
     * @param string $accountId Account ID to delete the user link for.
     * @param string $webPropertyId Web Property ID to delete the user link for.
     * @param string $profileId View (Profile) ID to delete the user link for.
     * @param string $linkId Link ID to delete the user link for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $profileId, $linkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Adds a new user to the given view (profile). (profileUserLinks.insert)
     *
     * @param string $accountId Account ID to create the user link for.
     * @param string $webPropertyId Web Property ID to create the user link for.
     * @param string $profileId View (Profile) ID to create the user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_EntityUserLink");
    }

    /**
     * Lists profile-user links for a given view (profile).
     * (profileUserLinks.listManagementProfileUserLinks)
     *
     * @param string $accountId Account ID which the given view (profile) belongs
     *                              to.
     * @param string $webPropertyId Web Property ID which the given view (profile)
     *                              belongs to. Can either be a specific web property ID or '~all', which refers
     *                              to all the web properties that user has access to.
     * @param string $profileId View (Profile) ID to retrieve the profile-user links
     *                              for. Can either be a specific profile ID or '~all', which refers to all the
     *                              profiles that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of profile-user links to
     * include in this response.
     * @opt_param int start-index An index of the first profile-user link to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementProfileUserLinks($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_EntityUserLinks");
    }

    /**
     * Updates permissions for an existing user on the given view (profile).
     * (profileUserLinks.update)
     *
     * @param string $accountId Account ID to update the user link for.
     * @param string $webPropertyId Web Property ID to update the user link for.
     * @param string $profileId View (Profile ID) to update the user link for.
     * @param string $linkId Link ID to update the user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $profileId, $linkId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_EntityUserLink");
    }
}

/**
 * The "profiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $profiles = $analyticsService->profiles;
 *  </code>
 */
class Google_Service_Analytics_ManagementProfiles_Resource extends Google_Service_Resource
{

    /**
     * Deletes a view (profile). (profiles.delete)
     *
     * @param string $accountId Account ID to delete the view (profile) for.
     * @param string $webPropertyId Web property ID to delete the view (profile)
     *                              for.
     * @param string $profileId ID of the view (profile) to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a view (profile) to which the user has access. (profiles.get)
     *
     * @param string $accountId Account ID to retrieve the goal for.
     * @param string $webPropertyId Web property ID to retrieve the goal for.
     * @param string $profileId View (Profile) ID to retrieve the goal for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Profile");
    }

    /**
     * Create a new view (profile). (profiles.insert)
     *
     * @param string $accountId Account ID to create the view (profile) for.
     * @param string $webPropertyId Web property ID to create the view (profile)
     *                                                                       for.
     * @param Google_Profile|Google_Service_Analytics_Profile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, Google_Service_Analytics_Profile $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_Profile");
    }

    /**
     * Lists views (profiles) to which the user has access.
     * (profiles.listManagementProfiles)
     *
     * @param string $accountId Account ID for the view (profiles) to retrieve. Can
     *                              either be a specific account ID or '~all', which refers to all the accounts
     *                              to which the user has access.
     * @param string $webPropertyId Web property ID for the views (profiles) to
     *                              retrieve. Can either be a specific web property ID or '~all', which refers to
     *                              all the web properties to which the user has access.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of views (profiles) to include
     * in this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementProfiles($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Profiles");
    }

    /**
     * Updates an existing view (profile). This method supports patch semantics.
     * (profiles.patch)
     *
     * @param string $accountId Account ID to which the view (profile) belongs
     * @param string $webPropertyId Web property ID to which the view (profile)
     *                                                                       belongs
     * @param string $profileId ID of the view (profile) to be updated.
     * @param Google_Profile|Google_Service_Analytics_Profile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, $profileId, Google_Service_Analytics_Profile $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_Profile");
    }

    /**
     * Updates an existing view (profile). (profiles.update)
     *
     * @param string $accountId Account ID to which the view (profile) belongs
     * @param string $webPropertyId Web property ID to which the view (profile)
     *                                                                       belongs
     * @param string $profileId ID of the view (profile) to be updated.
     * @param Google_Profile|Google_Service_Analytics_Profile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $profileId, Google_Service_Analytics_Profile $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_Profile");
    }
}

/**
 * The "segments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $segments = $analyticsService->segments;
 *  </code>
 */
class Google_Service_Analytics_ManagementSegments_Resource extends Google_Service_Resource
{

    /**
     * Lists segments to which the user has access.
     * (segments.listManagementSegments)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of segments to include in this
     * response.
     * @opt_param int start-index An index of the first segment to retrieve. Use
     * this parameter as a pagination mechanism along with the max-results
     * parameter.
     */
    public function listManagementSegments($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Segments");
    }
}

/**
 * The "unsampledReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $unsampledReports = $analyticsService->unsampledReports;
 *  </code>
 */
class Google_Service_Analytics_ManagementUnsampledReports_Resource extends Google_Service_Resource
{

    /**
     * Returns a single unsampled report. (unsampledReports.get)
     *
     * @param string $accountId Account ID to retrieve unsampled report for.
     * @param string $webPropertyId Web property ID to retrieve unsampled reports
     *                                  for.
     * @param string $profileId View (Profile) ID to retrieve unsampled report for.
     * @param string $unsampledReportId ID of the unsampled report to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $profileId, $unsampledReportId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'unsampledReportId' => $unsampledReportId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_UnsampledReport");
    }

    /**
     * Create a new unsampled report. (unsampledReports.insert)
     *
     * @param string $accountId Account ID to create the unsampled report for.
     * @param string $webPropertyId Web property ID to create the unsampled report
     *                                                                                       for.
     * @param string $profileId View (Profile) ID to create the unsampled report
     *                                                                                       for.
     * @param Google_Service_Analytics_UnsampledReport|Google_UnsampledReport $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, $profileId, Google_Service_Analytics_UnsampledReport $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_UnsampledReport");
    }

    /**
     * Lists unsampled reports to which the user has access.
     * (unsampledReports.listManagementUnsampledReports)
     *
     * @param string $accountId Account ID to retrieve unsampled reports for. Must
     *                              be a specific account ID, ~all is not supported.
     * @param string $webPropertyId Web property ID to retrieve unsampled reports
     *                              for. Must be a specific web property ID, ~all is not supported.
     * @param string $profileId View (Profile) ID to retrieve unsampled reports for.
     *                              Must be a specific view (profile) ID, ~all is not supported.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of unsampled reports to include
     * in this response.
     * @opt_param int start-index An index of the first unsampled report to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementUnsampledReports($accountId, $webPropertyId, $profileId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_UnsampledReports");
    }
}

/**
 * The "uploads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $uploads = $analyticsService->uploads;
 *  </code>
 */
class Google_Service_Analytics_ManagementUploads_Resource extends Google_Service_Resource
{

    /**
     * Delete data associated with a previous upload. (uploads.deleteUploadData)
     *
     * @param string $accountId Account Id for the uploads to be deleted.
     * @param string $webPropertyId Web property Id for the uploads to be deleted.
     * @param string $customDataSourceId Custom data source Id for the uploads to be
     *                                                                                                                                                  deleted.
     * @param Google_AnalyticsDataimportDeleteUploadDataRequest|Google_Service_Analytics_AnalyticsDataimportDeleteUploadDataRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deleteUploadData($accountId, $webPropertyId, $customDataSourceId, Google_Service_Analytics_AnalyticsDataimportDeleteUploadDataRequest $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('deleteUploadData', [$params]);
    }

    /**
     * List uploads to which the user has access. (uploads.get)
     *
     * @param string $accountId Account Id for the upload to retrieve.
     * @param string $webPropertyId Web property Id for the upload to retrieve.
     * @param string $customDataSourceId Custom data source Id for upload to
     *                                   retrieve.
     * @param string $uploadId Upload Id to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $customDataSourceId, $uploadId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId, 'uploadId' => $uploadId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Upload");
    }

    /**
     * List uploads to which the user has access. (uploads.listManagementUploads)
     *
     * @param string $accountId Account Id for the uploads to retrieve.
     * @param string $webPropertyId Web property Id for the uploads to retrieve.
     * @param string $customDataSourceId Custom data source Id for uploads to
     *                                   retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of uploads to include in this
     * response.
     * @opt_param int start-index A 1-based index of the first upload to retrieve.
     * Use this parameter as a pagination mechanism along with the max-results
     * parameter.
     */
    public function listManagementUploads($accountId, $webPropertyId, $customDataSourceId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Uploads");
    }

    /**
     * Upload data for a custom data source. (uploads.uploadData)
     *
     * @param string $accountId Account Id associated with the upload.
     * @param string $webPropertyId Web property UA-string associated with the
     *                                   upload.
     * @param string $customDataSourceId Custom data source Id to which the data
     *                                   being uploaded belongs.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function uploadData($accountId, $webPropertyId, $customDataSourceId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'customDataSourceId' => $customDataSourceId];
        $params = array_merge($params, $optParams);

        return $this->call('uploadData', [$params], "Google_Service_Analytics_Upload");
    }
}

/**
 * The "webPropertyAdWordsLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $webPropertyAdWordsLinks = $analyticsService->webPropertyAdWordsLinks;
 *  </code>
 */
class Google_Service_Analytics_ManagementWebPropertyAdWordsLinks_Resource extends Google_Service_Resource
{

    /**
     * Deletes a web property-AdWords link. (webPropertyAdWordsLinks.delete)
     *
     * @param string $accountId ID of the account which the given web property
     *                                         belongs to.
     * @param string $webPropertyId Web property ID to delete the AdWords link for.
     * @param string $webPropertyAdWordsLinkId Web property AdWords link ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns a web property-AdWords link to which the user has access.
     * (webPropertyAdWordsLinks.get)
     *
     * @param string $accountId ID of the account which the given web property
     *                                         belongs to.
     * @param string $webPropertyId Web property ID to retrieve the AdWords link
     *                                         for.
     * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $webPropertyAdWordsLinkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_EntityAdWordsLink");
    }

    /**
     * Creates a webProperty-AdWords link. (webPropertyAdWordsLinks.insert)
     *
     * @param string $accountId ID of the Google Analytics account to create the
     *                                                                                           link for.
     * @param string $webPropertyId Web property ID to create the link for.
     * @param Google_EntityAdWordsLink|Google_Service_Analytics_EntityAdWordsLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_EntityAdWordsLink");
    }

    /**
     * Lists webProperty-AdWords links for a given web property.
     * (webPropertyAdWordsLinks.listManagementWebPropertyAdWordsLinks)
     *
     * @param string $accountId ID of the account which the given web property
     *                              belongs to.
     * @param string $webPropertyId Web property ID to retrieve the AdWords links
     *                              for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of webProperty-AdWords links to
     * include in this response.
     * @opt_param int start-index An index of the first webProperty-AdWords link to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementWebPropertyAdWordsLinks($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_EntityAdWordsLinks");
    }

    /**
     * Updates an existing webProperty-AdWords link. This method supports patch
     * semantics. (webPropertyAdWordsLinks.patch)
     *
     * @param string $accountId ID of the account which the given web property
     *                                                                                                      belongs to.
     * @param string $webPropertyId Web property ID to retrieve the AdWords link
     *                                                                                                      for.
     * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
     * @param Google_EntityAdWordsLink|Google_Service_Analytics_EntityAdWordsLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, $webPropertyAdWordsLinkId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_EntityAdWordsLink");
    }

    /**
     * Updates an existing webProperty-AdWords link.
     * (webPropertyAdWordsLinks.update)
     *
     * @param string $accountId ID of the account which the given web property
     *                                                                                                      belongs to.
     * @param string $webPropertyId Web property ID to retrieve the AdWords link
     *                                                                                                      for.
     * @param string $webPropertyAdWordsLinkId Web property-AdWords link ID.
     * @param Google_EntityAdWordsLink|Google_Service_Analytics_EntityAdWordsLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $webPropertyAdWordsLinkId, Google_Service_Analytics_EntityAdWordsLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'webPropertyAdWordsLinkId' => $webPropertyAdWordsLinkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_EntityAdWordsLink");
    }
}

/**
 * The "webproperties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $webproperties = $analyticsService->webproperties;
 *  </code>
 */
class Google_Service_Analytics_ManagementWebproperties_Resource extends Google_Service_Resource
{

    /**
     * Gets a web property to which the user has access. (webproperties.get)
     *
     * @param string $accountId Account ID to retrieve the web property for.
     * @param string $webPropertyId ID to retrieve the web property for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Analytics_Webproperty");
    }

    /**
     * Create a new property if the account has fewer than 20 properties. Web
     * properties are visible in the Google Analytics interface only if they have at
     * least one profile. (webproperties.insert)
     *
     * @param string $accountId Account ID to create the web property for.
     * @param Google_Service_Analytics_Webproperty|Google_Webproperty $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, Google_Service_Analytics_Webproperty $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_Webproperty");
    }

    /**
     * Lists web properties to which the user has access.
     * (webproperties.listManagementWebproperties)
     *
     * @param string $accountId Account ID to retrieve web properties for. Can
     *                          either be a specific account ID or '~all', which refers to all the accounts
     *                          that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of web properties to include in
     * this response.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter.
     */
    public function listManagementWebproperties($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Webproperties");
    }

    /**
     * Updates an existing web property. This method supports patch semantics.
     * (webproperties.patch)
     *
     * @param string $accountId Account ID to which the web property belongs
     * @param string $webPropertyId Web property ID
     * @param Google_Service_Analytics_Webproperty|Google_Webproperty $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $webPropertyId, Google_Service_Analytics_Webproperty $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Analytics_Webproperty");
    }

    /**
     * Updates an existing web property. (webproperties.update)
     *
     * @param string $accountId Account ID to which the web property belongs
     * @param string $webPropertyId Web property ID
     * @param Google_Service_Analytics_Webproperty|Google_Webproperty $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, Google_Service_Analytics_Webproperty $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_Webproperty");
    }
}

/**
 * The "webpropertyUserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $webpropertyUserLinks = $analyticsService->webpropertyUserLinks;
 *  </code>
 */
class Google_Service_Analytics_ManagementWebpropertyUserLinks_Resource extends Google_Service_Resource
{

    /**
     * Removes a user from the given web property. (webpropertyUserLinks.delete)
     *
     * @param string $accountId Account ID to delete the user link for.
     * @param string $webPropertyId Web Property ID to delete the user link for.
     * @param string $linkId Link ID to delete the user link for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $webPropertyId, $linkId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'linkId' => $linkId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Adds a new user to the given web property. (webpropertyUserLinks.insert)
     *
     * @param string $accountId Account ID to create the user link for.
     * @param string $webPropertyId Web Property ID to create the user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $webPropertyId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Analytics_EntityUserLink");
    }

    /**
     * Lists webProperty-user links for a given web property.
     * (webpropertyUserLinks.listManagementWebpropertyUserLinks)
     *
     * @param string $accountId Account ID which the given web property belongs to.
     * @param string $webPropertyId Web Property ID for the webProperty-user links
     *                              to retrieve. Can either be a specific web property ID or '~all', which refers
     *                              to all the web properties that user has access to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of webProperty-user Links to
     * include in this response.
     * @opt_param int start-index An index of the first webProperty-user link to
     * retrieve. Use this parameter as a pagination mechanism along with the max-
     * results parameter.
     */
    public function listManagementWebpropertyUserLinks($accountId, $webPropertyId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_EntityUserLinks");
    }

    /**
     * Updates permissions for an existing user on the given web property.
     * (webpropertyUserLinks.update)
     *
     * @param string $accountId Account ID to update the account-user link for.
     * @param string $webPropertyId Web property ID to update the account-user link
     *                                                                                     for.
     * @param string $linkId Link ID to update the account-user link for.
     * @param Google_EntityUserLink|Google_Service_Analytics_EntityUserLink $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $webPropertyId, $linkId, Google_Service_Analytics_EntityUserLink $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'linkId' => $linkId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Analytics_EntityUserLink");
    }
}

/**
 * The "metadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $metadata = $analyticsService->metadata;
 *  </code>
 */
class Google_Service_Analytics_Metadata_Resource extends Google_Service_Resource
{
}

/**
 * The "columns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $columns = $analyticsService->columns;
 *  </code>
 */
class Google_Service_Analytics_MetadataColumns_Resource extends Google_Service_Resource
{

    /**
     * Lists all columns for a report type (columns.listMetadataColumns)
     *
     * @param string $reportType Report type. Allowed Values: 'ga'. Where 'ga'
     *                           corresponds to the Core Reporting API
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listMetadataColumns($reportType, $optParams = [])
    {
        $params = ['reportType' => $reportType];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Analytics_Columns");
    }
}

/**
 * The "provisioning" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $provisioning = $analyticsService->provisioning;
 *  </code>
 */
class Google_Service_Analytics_Provisioning_Resource extends Google_Service_Resource
{

    /**
     * Creates an account ticket. (provisioning.createAccountTicket)
     *
     * @param Google_AccountTicket|Google_Service_Analytics_AccountTicket $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function createAccountTicket(Google_Service_Analytics_AccountTicket $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('createAccountTicket', [$params], "Google_Service_Analytics_AccountTicket");
    }
}


/**
 * Class Google_Service_Analytics_Account
 */
class Google_Service_Analytics_Account extends Google_Model
{
    public $created;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $updated;
    protected $internal_gapi_mappings = [];
    protected $childLinkType = 'Google_Service_Analytics_AccountChildLink';
    protected $childLinkDataType = '';
    protected $permissionsType = 'Google_Service_Analytics_AccountPermissions';
    protected $permissionsDataType = '';

    /**
     * @param Google_Service_Analytics_AccountChildLink $childLink
     */
    public function setChildLink(Google_Service_Analytics_AccountChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    /**
     * @return mixed
     */
    public function getChildLink()
    {
        return $this->childLink;
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
     * @param Google_Service_Analytics_AccountPermissions $permissions
     */
    public function setPermissions(Google_Service_Analytics_AccountPermissions $permissions)
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
}

/**
 * Class Google_Service_Analytics_AccountChildLink
 */
class Google_Service_Analytics_AccountChildLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_AccountPermissions
 */
class Google_Service_Analytics_AccountPermissions extends Google_Collection
{
    public $effective;
    protected $collection_key = 'effective';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEffective()
    {
        return $this->effective;
    }

    /**
     * @param $effective
     */
    public function setEffective($effective)
    {
        $this->effective = $effective;
    }
}

/**
 * Class Google_Service_Analytics_AccountRef
 */
class Google_Service_Analytics_AccountRef extends Google_Model
{
    public $href;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_AccountSummaries
 */
class Google_Service_Analytics_AccountSummaries extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_AccountSummary';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_AccountSummary
 */
class Google_Service_Analytics_AccountSummary extends Google_Collection
{
    public $id;
    public $kind;
    public $name;
    protected $collection_key = 'webProperties';
    protected $internal_gapi_mappings = [];
    protected $webPropertiesType = 'Google_Service_Analytics_WebPropertySummary';
    protected $webPropertiesDataType = 'array';

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
     * @param $webProperties
     */
    public function setWebProperties($webProperties)
    {
        $this->webProperties = $webProperties;
    }

    /**
     * @return mixed
     */
    public function getWebProperties()
    {
        return $this->webProperties;
    }
}

/**
 * Class Google_Service_Analytics_AccountTicket
 */
class Google_Service_Analytics_AccountTicket extends Google_Model
{
    public $id;
    public $kind;
    public $redirectUri;
    protected $internal_gapi_mappings = [];
    protected $accountType = 'Google_Service_Analytics_Account';
    protected $accountDataType = '';
    protected $profileType = 'Google_Service_Analytics_Profile';
    protected $profileDataType = '';
    protected $webpropertyType = 'Google_Service_Analytics_Webproperty';
    protected $webpropertyDataType = '';


    /**
     * @param Google_Service_Analytics_Account $account
     */
    public function setAccount(Google_Service_Analytics_Account $account)
    {
        $this->account = $account;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
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
     * @param Google_Service_Analytics_Profile $profile
     */
    public function setProfile(Google_Service_Analytics_Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return mixed
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param $redirectUri
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @param Google_Service_Analytics_Webproperty $webproperty
     */
    public function setWebproperty(Google_Service_Analytics_Webproperty $webproperty)
    {
        $this->webproperty = $webproperty;
    }

    /**
     * @return mixed
     */
    public function getWebproperty()
    {
        return $this->webproperty;
    }
}

/**
 * Class Google_Service_Analytics_Accounts
 */
class Google_Service_Analytics_Accounts extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Account';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_AdWordsAccount
 */
class Google_Service_Analytics_AdWordsAccount extends Google_Model
{
    public $autoTaggingEnabled;
    public $customerId;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutoTaggingEnabled()
    {
        return $this->autoTaggingEnabled;
    }

    /**
     * @param $autoTaggingEnabled
     */
    public function setAutoTaggingEnabled($autoTaggingEnabled)
    {
        $this->autoTaggingEnabled = $autoTaggingEnabled;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
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
 * Class Google_Service_Analytics_AnalyticsDataimportDeleteUploadDataRequest
 */
class Google_Service_Analytics_AnalyticsDataimportDeleteUploadDataRequest extends Google_Collection
{
    public $customDataImportUids;
    protected $collection_key = 'customDataImportUids';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomDataImportUids()
    {
        return $this->customDataImportUids;
    }

    /**
     * @param $customDataImportUids
     */
    public function setCustomDataImportUids($customDataImportUids)
    {
        $this->customDataImportUids = $customDataImportUids;
    }
}

/**
 * Class Google_Service_Analytics_Column
 */
class Google_Service_Analytics_Column extends Google_Model
{
    public $attributes;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
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
 * Class Google_Service_Analytics_ColumnAttributes
 */
class Google_Service_Analytics_ColumnAttributes extends Google_Model
{
}

/**
 * Class Google_Service_Analytics_Columns
 */
class Google_Service_Analytics_Columns extends Google_Collection
{
    public $attributeNames;
    public $etag;
    public $kind;
    public $totalResults;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Column';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAttributeNames()
    {
        return $this->attributeNames;
    }

    /**
     * @param $attributeNames
     */
    public function setAttributeNames($attributeNames)
    {
        $this->attributeNames = $attributeNames;
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
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Analytics_CustomDataSource
 */
class Google_Service_Analytics_CustomDataSource extends Google_Collection
{
    public $accountId;
    public $created;
    public $description;
    public $id;
    public $importBehavior;
    public $kind;
    public $name;
    public $profilesLinked;
    public $selfLink;
    public $type;
    public $updated;
    public $uploadType;
    public $webPropertyId;
    protected $collection_key = 'profilesLinked';
    protected $internal_gapi_mappings = [];
    protected $childLinkType = 'Google_Service_Analytics_CustomDataSourceChildLink';
    protected $childLinkDataType = '';
    protected $parentLinkType = 'Google_Service_Analytics_CustomDataSourceParentLink';
    protected $parentLinkDataType = '';

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
     * @param Google_Service_Analytics_CustomDataSourceChildLink $childLink
     */
    public function setChildLink(Google_Service_Analytics_CustomDataSourceChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    /**
     * @return mixed
     */
    public function getChildLink()
    {
        return $this->childLink;
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
    public function getImportBehavior()
    {
        return $this->importBehavior;
    }

    /**
     * @param $importBehavior
     */
    public function setImportBehavior($importBehavior)
    {
        $this->importBehavior = $importBehavior;
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
     * @param Google_Service_Analytics_CustomDataSourceParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_CustomDataSourceParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @return mixed
     */
    public function getProfilesLinked()
    {
        return $this->profilesLinked;
    }

    /**
     * @param $profilesLinked
     */
    public function setProfilesLinked($profilesLinked)
    {
        $this->profilesLinked = $profilesLinked;
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
    public function getUploadType()
    {
        return $this->uploadType;
    }

    /**
     * @param $uploadType
     */
    public function setUploadType($uploadType)
    {
        $this->uploadType = $uploadType;
    }

    /**
     * @return mixed
     */
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_CustomDataSourceChildLink
 */
class Google_Service_Analytics_CustomDataSourceChildLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_CustomDataSourceParentLink
 */
class Google_Service_Analytics_CustomDataSourceParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_CustomDataSources
 */
class Google_Service_Analytics_CustomDataSources extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_CustomDataSource';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_CustomDimension
 */
class Google_Service_Analytics_CustomDimension extends Google_Model
{
    public $accountId;
    public $active;
    public $created;
    public $id;
    public $index;
    public $kind;
    public $name;
    public $scope;
    public $selfLink;
    public $updated;
    public $webPropertyId;
    protected $internal_gapi_mappings = [];
    protected $parentLinkType = 'Google_Service_Analytics_CustomDimensionParentLink';
    protected $parentLinkDataType = '';

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
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * @param Google_Service_Analytics_CustomDimensionParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_CustomDimensionParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_CustomDimensionParentLink
 */
class Google_Service_Analytics_CustomDimensionParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_CustomDimensions
 */
class Google_Service_Analytics_CustomDimensions extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_CustomDimension';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_CustomMetric
 */
class Google_Service_Analytics_CustomMetric extends Google_Model
{
    public $accountId;
    public $active;
    public $created;
    public $id;
    public $index;
    public $kind;
    public $maxValue;
    public $minValue;
    public $name;
    public $scope;
    public $selfLink;
    public $type;
    public $updated;
    public $webPropertyId;
    protected $internal_gapi_mappings = [
        "maxValue" => "max_value",
        "minValue" => "min_value",
    ];
    protected $parentLinkType = 'Google_Service_Analytics_CustomMetricParentLink';
    protected $parentLinkDataType = '';

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
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * @param Google_Service_Analytics_CustomMetricParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_CustomMetricParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_CustomMetricParentLink
 */
class Google_Service_Analytics_CustomMetricParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_CustomMetrics
 */
class Google_Service_Analytics_CustomMetrics extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_CustomMetric';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_EntityAdWordsLink
 */
class Google_Service_Analytics_EntityAdWordsLink extends Google_Collection
{
    public $id;
    public $kind;
    public $name;
    public $profileIds;
    public $selfLink;
    protected $collection_key = 'profileIds';
    protected $internal_gapi_mappings = [];
    protected $adWordsAccountsType = 'Google_Service_Analytics_AdWordsAccount';
    protected $adWordsAccountsDataType = 'array';
    protected $entityType = 'Google_Service_Analytics_EntityAdWordsLinkEntity';
    protected $entityDataType = '';

    /**
     * @param $adWordsAccounts
     */
    public function setAdWordsAccounts($adWordsAccounts)
    {
        $this->adWordsAccounts = $adWordsAccounts;
    }

    /**
     * @return mixed
     */
    public function getAdWordsAccounts()
    {
        return $this->adWordsAccounts;
    }

    /**
     * @param Google_Service_Analytics_EntityAdWordsLinkEntity $entity
     */
    public function setEntity(Google_Service_Analytics_EntityAdWordsLinkEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
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
    public function getProfileIds()
    {
        return $this->profileIds;
    }

    /**
     * @param $profileIds
     */
    public function setProfileIds($profileIds)
    {
        $this->profileIds = $profileIds;
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
 * Class Google_Service_Analytics_EntityAdWordsLinkEntity
 */
class Google_Service_Analytics_EntityAdWordsLinkEntity extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $webPropertyRefType = 'Google_Service_Analytics_WebPropertyRef';
    protected $webPropertyRefDataType = '';


    /**
     * @param Google_Service_Analytics_WebPropertyRef $webPropertyRef
     */
    public function setWebPropertyRef(Google_Service_Analytics_WebPropertyRef $webPropertyRef)
    {
        $this->webPropertyRef = $webPropertyRef;
    }

    /**
     * @return mixed
     */
    public function getWebPropertyRef()
    {
        return $this->webPropertyRef;
    }
}

/**
 * Class Google_Service_Analytics_EntityAdWordsLinks
 */
class Google_Service_Analytics_EntityAdWordsLinks extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_EntityAdWordsLink';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Analytics_EntityUserLink
 */
class Google_Service_Analytics_EntityUserLink extends Google_Model
{
    public $id;
    public $kind;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $entityType = 'Google_Service_Analytics_EntityUserLinkEntity';
    protected $entityDataType = '';
    protected $permissionsType = 'Google_Service_Analytics_EntityUserLinkPermissions';
    protected $permissionsDataType = '';
    protected $userRefType = 'Google_Service_Analytics_UserRef';
    protected $userRefDataType = '';


    /**
     * @param Google_Service_Analytics_EntityUserLinkEntity $entity
     */
    public function setEntity(Google_Service_Analytics_EntityUserLinkEntity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
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
     * @param Google_Service_Analytics_EntityUserLinkPermissions $permissions
     */
    public function setPermissions(Google_Service_Analytics_EntityUserLinkPermissions $permissions)
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
     * @param Google_Service_Analytics_UserRef $userRef
     */
    public function setUserRef(Google_Service_Analytics_UserRef $userRef)
    {
        $this->userRef = $userRef;
    }

    /**
     * @return mixed
     */
    public function getUserRef()
    {
        return $this->userRef;
    }
}

/**
 * Class Google_Service_Analytics_EntityUserLinkEntity
 */
class Google_Service_Analytics_EntityUserLinkEntity extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $accountRefType = 'Google_Service_Analytics_AccountRef';
    protected $accountRefDataType = '';
    protected $profileRefType = 'Google_Service_Analytics_ProfileRef';
    protected $profileRefDataType = '';
    protected $webPropertyRefType = 'Google_Service_Analytics_WebPropertyRef';
    protected $webPropertyRefDataType = '';


    /**
     * @param Google_Service_Analytics_AccountRef $accountRef
     */
    public function setAccountRef(Google_Service_Analytics_AccountRef $accountRef)
    {
        $this->accountRef = $accountRef;
    }

    /**
     * @return mixed
     */
    public function getAccountRef()
    {
        return $this->accountRef;
    }

    /**
     * @param Google_Service_Analytics_ProfileRef $profileRef
     */
    public function setProfileRef(Google_Service_Analytics_ProfileRef $profileRef)
    {
        $this->profileRef = $profileRef;
    }

    /**
     * @return mixed
     */
    public function getProfileRef()
    {
        return $this->profileRef;
    }

    /**
     * @param Google_Service_Analytics_WebPropertyRef $webPropertyRef
     */
    public function setWebPropertyRef(Google_Service_Analytics_WebPropertyRef $webPropertyRef)
    {
        $this->webPropertyRef = $webPropertyRef;
    }

    /**
     * @return mixed
     */
    public function getWebPropertyRef()
    {
        return $this->webPropertyRef;
    }
}

/**
 * Class Google_Service_Analytics_EntityUserLinkPermissions
 */
class Google_Service_Analytics_EntityUserLinkPermissions extends Google_Collection
{
    public $effective;
    public $local;
    protected $collection_key = 'local';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEffective()
    {
        return $this->effective;
    }

    /**
     * @param $effective
     */
    public function setEffective($effective)
    {
        $this->effective = $effective;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }
}

/**
 * Class Google_Service_Analytics_EntityUserLinks
 */
class Google_Service_Analytics_EntityUserLinks extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_EntityUserLink';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Analytics_Experiment
 */
class Google_Service_Analytics_Experiment extends Google_Collection
{
    public $accountId;
    public $created;
    public $description;
    public $editableInGaUi;
    public $endTime;
    public $equalWeighting;
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $minimumExperimentLengthInDays;
    public $name;
    public $objectiveMetric;
    public $optimizationType;
    public $profileId;
    public $reasonExperimentEnded;
    public $rewriteVariationUrlsAsOriginal;
    public $selfLink;
    public $servingFramework;
    public $snippet;
    public $startTime;
    public $status;
    public $trafficCoverage;
    public $updated;
    public $webPropertyId;
    public $winnerConfidenceLevel;
    public $winnerFound;
    protected $collection_key = 'variations';
    protected $internal_gapi_mappings = [];
    protected $parentLinkType = 'Google_Service_Analytics_ExperimentParentLink';
    protected $parentLinkDataType = '';
    protected $variationsType = 'Google_Service_Analytics_ExperimentVariations';
    protected $variationsDataType = 'array';

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
    public function getEditableInGaUi()
    {
        return $this->editableInGaUi;
    }

    /**
     * @param $editableInGaUi
     */
    public function setEditableInGaUi($editableInGaUi)
    {
        $this->editableInGaUi = $editableInGaUi;
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
     * @return mixed
     */
    public function getEqualWeighting()
    {
        return $this->equalWeighting;
    }

    /**
     * @param $equalWeighting
     */
    public function setEqualWeighting($equalWeighting)
    {
        $this->equalWeighting = $equalWeighting;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
    public function getMinimumExperimentLengthInDays()
    {
        return $this->minimumExperimentLengthInDays;
    }

    /**
     * @param $minimumExperimentLengthInDays
     */
    public function setMinimumExperimentLengthInDays($minimumExperimentLengthInDays)
    {
        $this->minimumExperimentLengthInDays = $minimumExperimentLengthInDays;
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
    public function getObjectiveMetric()
    {
        return $this->objectiveMetric;
    }

    /**
     * @param $objectiveMetric
     */
    public function setObjectiveMetric($objectiveMetric)
    {
        $this->objectiveMetric = $objectiveMetric;
    }

    /**
     * @return mixed
     */
    public function getOptimizationType()
    {
        return $this->optimizationType;
    }

    /**
     * @param $optimizationType
     */
    public function setOptimizationType($optimizationType)
    {
        $this->optimizationType = $optimizationType;
    }

    /**
     * @param Google_Service_Analytics_ExperimentParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_ExperimentParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getReasonExperimentEnded()
    {
        return $this->reasonExperimentEnded;
    }

    /**
     * @param $reasonExperimentEnded
     */
    public function setReasonExperimentEnded($reasonExperimentEnded)
    {
        $this->reasonExperimentEnded = $reasonExperimentEnded;
    }

    /**
     * @return mixed
     */
    public function getRewriteVariationUrlsAsOriginal()
    {
        return $this->rewriteVariationUrlsAsOriginal;
    }

    /**
     * @param $rewriteVariationUrlsAsOriginal
     */
    public function setRewriteVariationUrlsAsOriginal($rewriteVariationUrlsAsOriginal)
    {
        $this->rewriteVariationUrlsAsOriginal = $rewriteVariationUrlsAsOriginal;
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
    public function getServingFramework()
    {
        return $this->servingFramework;
    }

    /**
     * @param $servingFramework
     */
    public function setServingFramework($servingFramework)
    {
        $this->servingFramework = $servingFramework;
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
    public function getTrafficCoverage()
    {
        return $this->trafficCoverage;
    }

    /**
     * @param $trafficCoverage
     */
    public function setTrafficCoverage($trafficCoverage)
    {
        $this->trafficCoverage = $trafficCoverage;
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
     * @param $variations
     */
    public function setVariations($variations)
    {
        $this->variations = $variations;
    }

    /**
     * @return mixed
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @return mixed
     */
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    /**
     * @return mixed
     */
    public function getWinnerConfidenceLevel()
    {
        return $this->winnerConfidenceLevel;
    }

    /**
     * @param $winnerConfidenceLevel
     */
    public function setWinnerConfidenceLevel($winnerConfidenceLevel)
    {
        $this->winnerConfidenceLevel = $winnerConfidenceLevel;
    }

    /**
     * @return mixed
     */
    public function getWinnerFound()
    {
        return $this->winnerFound;
    }

    /**
     * @param $winnerFound
     */
    public function setWinnerFound($winnerFound)
    {
        $this->winnerFound = $winnerFound;
    }
}

/**
 * Class Google_Service_Analytics_ExperimentParentLink
 */
class Google_Service_Analytics_ExperimentParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_ExperimentVariations
 */
class Google_Service_Analytics_ExperimentVariations extends Google_Model
{
    public $name;
    public $status;
    public $url;
    public $weight;
    public $won;
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

    /**
     * @return mixed
     */
    public function getWon()
    {
        return $this->won;
    }

    /**
     * @param $won
     */
    public function setWon($won)
    {
        $this->won = $won;
    }
}

/**
 * Class Google_Service_Analytics_Experiments
 */
class Google_Service_Analytics_Experiments extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Experiment';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_Filter
 */
class Google_Service_Analytics_Filter extends Google_Model
{
    public $accountId;
    public $created;
    public $id;
    public $kind;
    public $name;
    public $selfLink;
    public $type;
    public $updated;
    protected $internal_gapi_mappings = [];
    protected $advancedDetailsType = 'Google_Service_Analytics_FilterAdvancedDetails';
    protected $advancedDetailsDataType = '';
    protected $excludeDetailsType = 'Google_Service_Analytics_FilterExpression';
    protected $excludeDetailsDataType = '';
    protected $includeDetailsType = 'Google_Service_Analytics_FilterExpression';
    protected $includeDetailsDataType = '';
    protected $lowercaseDetailsType = 'Google_Service_Analytics_FilterLowercaseDetails';
    protected $lowercaseDetailsDataType = '';
    protected $parentLinkType = 'Google_Service_Analytics_FilterParentLink';
    protected $parentLinkDataType = '';
    protected $searchAndReplaceDetailsType = 'Google_Service_Analytics_FilterSearchAndReplaceDetails';
    protected $searchAndReplaceDetailsDataType = '';
    protected $uppercaseDetailsType = 'Google_Service_Analytics_FilterUppercaseDetails';
    protected $uppercaseDetailsDataType = '';

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
     * @param Google_Service_Analytics_FilterAdvancedDetails $advancedDetails
     */
    public function setAdvancedDetails(Google_Service_Analytics_FilterAdvancedDetails $advancedDetails)
    {
        $this->advancedDetails = $advancedDetails;
    }

    /**
     * @return mixed
     */
    public function getAdvancedDetails()
    {
        return $this->advancedDetails;
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
     * @param Google_Service_Analytics_FilterExpression $excludeDetails
     */
    public function setExcludeDetails(Google_Service_Analytics_FilterExpression $excludeDetails)
    {
        $this->excludeDetails = $excludeDetails;
    }

    /**
     * @return mixed
     */
    public function getExcludeDetails()
    {
        return $this->excludeDetails;
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
     * @param Google_Service_Analytics_FilterExpression $includeDetails
     */
    public function setIncludeDetails(Google_Service_Analytics_FilterExpression $includeDetails)
    {
        $this->includeDetails = $includeDetails;
    }

    /**
     * @return mixed
     */
    public function getIncludeDetails()
    {
        return $this->includeDetails;
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
     * @param Google_Service_Analytics_FilterLowercaseDetails $lowercaseDetails
     */
    public function setLowercaseDetails(Google_Service_Analytics_FilterLowercaseDetails $lowercaseDetails)
    {
        $this->lowercaseDetails = $lowercaseDetails;
    }

    /**
     * @return mixed
     */
    public function getLowercaseDetails()
    {
        return $this->lowercaseDetails;
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
     * @param Google_Service_Analytics_FilterParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_FilterParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @param Google_Service_Analytics_FilterSearchAndReplaceDetails $searchAndReplaceDetails
     */
    public function setSearchAndReplaceDetails(Google_Service_Analytics_FilterSearchAndReplaceDetails $searchAndReplaceDetails)
    {
        $this->searchAndReplaceDetails = $searchAndReplaceDetails;
    }

    /**
     * @return mixed
     */
    public function getSearchAndReplaceDetails()
    {
        return $this->searchAndReplaceDetails;
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
     * @param Google_Service_Analytics_FilterUppercaseDetails $uppercaseDetails
     */
    public function setUppercaseDetails(Google_Service_Analytics_FilterUppercaseDetails $uppercaseDetails)
    {
        $this->uppercaseDetails = $uppercaseDetails;
    }

    /**
     * @return mixed
     */
    public function getUppercaseDetails()
    {
        return $this->uppercaseDetails;
    }
}

/**
 * Class Google_Service_Analytics_FilterAdvancedDetails
 */
class Google_Service_Analytics_FilterAdvancedDetails extends Google_Model
{
    public $caseSensitive;
    public $extractA;
    public $extractB;
    public $fieldA;
    public $fieldARequired;
    public $fieldB;
    public $fieldBRequired;
    public $outputConstructor;
    public $outputToField;
    public $overrideOutputField;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param $caseSensitive
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
    }

    /**
     * @return mixed
     */
    public function getExtractA()
    {
        return $this->extractA;
    }

    /**
     * @param $extractA
     */
    public function setExtractA($extractA)
    {
        $this->extractA = $extractA;
    }

    /**
     * @return mixed
     */
    public function getExtractB()
    {
        return $this->extractB;
    }

    /**
     * @param $extractB
     */
    public function setExtractB($extractB)
    {
        $this->extractB = $extractB;
    }

    /**
     * @return mixed
     */
    public function getFieldA()
    {
        return $this->fieldA;
    }

    /**
     * @param $fieldA
     */
    public function setFieldA($fieldA)
    {
        $this->fieldA = $fieldA;
    }

    /**
     * @return mixed
     */
    public function getFieldARequired()
    {
        return $this->fieldARequired;
    }

    /**
     * @param $fieldARequired
     */
    public function setFieldARequired($fieldARequired)
    {
        $this->fieldARequired = $fieldARequired;
    }

    /**
     * @return mixed
     */
    public function getFieldB()
    {
        return $this->fieldB;
    }

    /**
     * @param $fieldB
     */
    public function setFieldB($fieldB)
    {
        $this->fieldB = $fieldB;
    }

    /**
     * @return mixed
     */
    public function getFieldBRequired()
    {
        return $this->fieldBRequired;
    }

    /**
     * @param $fieldBRequired
     */
    public function setFieldBRequired($fieldBRequired)
    {
        $this->fieldBRequired = $fieldBRequired;
    }

    /**
     * @return mixed
     */
    public function getOutputConstructor()
    {
        return $this->outputConstructor;
    }

    /**
     * @param $outputConstructor
     */
    public function setOutputConstructor($outputConstructor)
    {
        $this->outputConstructor = $outputConstructor;
    }

    /**
     * @return mixed
     */
    public function getOutputToField()
    {
        return $this->outputToField;
    }

    /**
     * @param $outputToField
     */
    public function setOutputToField($outputToField)
    {
        $this->outputToField = $outputToField;
    }

    /**
     * @return mixed
     */
    public function getOverrideOutputField()
    {
        return $this->overrideOutputField;
    }

    /**
     * @param $overrideOutputField
     */
    public function setOverrideOutputField($overrideOutputField)
    {
        $this->overrideOutputField = $overrideOutputField;
    }
}

/**
 * Class Google_Service_Analytics_FilterExpression
 */
class Google_Service_Analytics_FilterExpression extends Google_Model
{
    public $caseSensitive;
    public $expressionValue;
    public $field;
    public $kind;
    public $matchType;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param $caseSensitive
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
    }

    /**
     * @return mixed
     */
    public function getExpressionValue()
    {
        return $this->expressionValue;
    }

    /**
     * @param $expressionValue
     */
    public function setExpressionValue($expressionValue)
    {
        $this->expressionValue = $expressionValue;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

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
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * @param $matchType
     */
    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
    }
}

/**
 * Class Google_Service_Analytics_FilterLowercaseDetails
 */
class Google_Service_Analytics_FilterLowercaseDetails extends Google_Model
{
    public $field;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }
}

/**
 * Class Google_Service_Analytics_FilterParentLink
 */
class Google_Service_Analytics_FilterParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_FilterRef
 */
class Google_Service_Analytics_FilterRef extends Google_Model
{
    public $accountId;
    public $href;
    public $id;
    public $kind;
    public $name;
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
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_FilterSearchAndReplaceDetails
 */
class Google_Service_Analytics_FilterSearchAndReplaceDetails extends Google_Model
{
    public $caseSensitive;
    public $field;
    public $replaceString;
    public $searchString;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param $caseSensitive
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

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
    public function getReplaceString()
    {
        return $this->replaceString;
    }

    /**
     * @param $replaceString
     */
    public function setReplaceString($replaceString)
    {
        $this->replaceString = $replaceString;
    }

    /**
     * @return mixed
     */
    public function getSearchString()
    {
        return $this->searchString;
    }

    /**
     * @param $searchString
     */
    public function setSearchString($searchString)
    {
        $this->searchString = $searchString;
    }
}

/**
 * Class Google_Service_Analytics_FilterUppercaseDetails
 */
class Google_Service_Analytics_FilterUppercaseDetails extends Google_Model
{
    public $field;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }
}

/**
 * Class Google_Service_Analytics_Filters
 */
class Google_Service_Analytics_Filters extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Filter';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_GaData
 */
class Google_Service_Analytics_GaData extends Google_Collection
{
    public $containsSampledData;
    public $id;
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $rows;
    public $sampleSize;
    public $sampleSpace;
    public $selfLink;
    public $totalResults;
    public $totalsForAllResults;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $columnHeadersType = 'Google_Service_Analytics_GaDataColumnHeaders';
    protected $columnHeadersDataType = 'array';
    protected $dataTableType = 'Google_Service_Analytics_GaDataDataTable';
    protected $dataTableDataType = '';
    protected $profileInfoType = 'Google_Service_Analytics_GaDataProfileInfo';
    protected $profileInfoDataType = '';
    protected $queryType = 'Google_Service_Analytics_GaDataQuery';
    protected $queryDataType = '';

    /**
     * @param $columnHeaders
     */
    public function setColumnHeaders($columnHeaders)
    {
        $this->columnHeaders = $columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getColumnHeaders()
    {
        return $this->columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getContainsSampledData()
    {
        return $this->containsSampledData;
    }

    /**
     * @param $containsSampledData
     */
    public function setContainsSampledData($containsSampledData)
    {
        $this->containsSampledData = $containsSampledData;
    }

    /**
     * @param Google_Service_Analytics_GaDataDataTable $dataTable
     */
    public function setDataTable(Google_Service_Analytics_GaDataDataTable $dataTable)
    {
        $this->dataTable = $dataTable;
    }

    /**
     * @return mixed
     */
    public function getDataTable()
    {
        return $this->dataTable;
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @param Google_Service_Analytics_GaDataProfileInfo $profileInfo
     */
    public function setProfileInfo(Google_Service_Analytics_GaDataProfileInfo $profileInfo)
    {
        $this->profileInfo = $profileInfo;
    }

    /**
     * @return mixed
     */
    public function getProfileInfo()
    {
        return $this->profileInfo;
    }

    /**
     * @param Google_Service_Analytics_GaDataQuery $query
     */
    public function setQuery(Google_Service_Analytics_GaDataQuery $query)
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

    /**
     * @return mixed
     */
    public function getSampleSize()
    {
        return $this->sampleSize;
    }

    /**
     * @param $sampleSize
     */
    public function setSampleSize($sampleSize)
    {
        $this->sampleSize = $sampleSize;
    }

    /**
     * @return mixed
     */
    public function getSampleSpace()
    {
        return $this->sampleSpace;
    }

    /**
     * @param $sampleSpace
     */
    public function setSampleSpace($sampleSpace)
    {
        $this->sampleSpace = $sampleSpace;
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
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * @return mixed
     */
    public function getTotalsForAllResults()
    {
        return $this->totalsForAllResults;
    }

    /**
     * @param $totalsForAllResults
     */
    public function setTotalsForAllResults($totalsForAllResults)
    {
        $this->totalsForAllResults = $totalsForAllResults;
    }
}

/**
 * Class Google_Service_Analytics_GaDataColumnHeaders
 */
class Google_Service_Analytics_GaDataColumnHeaders extends Google_Model
{
    public $columnType;
    public $dataType;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    /**
     * @param $columnType
     */
    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

    /**
     * @return mixed
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
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
 * Class Google_Service_Analytics_GaDataDataTable
 */
class Google_Service_Analytics_GaDataDataTable extends Google_Collection
{
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $colsType = 'Google_Service_Analytics_GaDataDataTableCols';
    protected $colsDataType = 'array';
    protected $rowsType = 'Google_Service_Analytics_GaDataDataTableRows';
    protected $rowsDataType = 'array';


    /**
     * @param $cols
     */
    public function setCols($cols)
    {
        $this->cols = $cols;
    }

    /**
     * @return mixed
     */
    public function getCols()
    {
        return $this->cols;
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
}

/**
 * Class Google_Service_Analytics_GaDataDataTableCols
 */
class Google_Service_Analytics_GaDataDataTableCols extends Google_Model
{
    public $id;
    public $label;
    public $type;
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
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
 * Class Google_Service_Analytics_GaDataDataTableRows
 */
class Google_Service_Analytics_GaDataDataTableRows extends Google_Collection
{
    protected $collection_key = 'c';
    protected $internal_gapi_mappings = [];
    protected $cType = 'Google_Service_Analytics_GaDataDataTableRowsC';
    protected $cDataType = 'array';


    /**
     * @param $c
     */
    public function setC($c)
    {
        $this->c = $c;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->c;
    }
}

/**
 * Class Google_Service_Analytics_GaDataDataTableRowsC
 */
class Google_Service_Analytics_GaDataDataTableRowsC extends Google_Model
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
 * Class Google_Service_Analytics_GaDataProfileInfo
 */
class Google_Service_Analytics_GaDataProfileInfo extends Google_Model
{
    public $accountId;
    public $internalWebPropertyId;
    public $profileId;
    public $profileName;
    public $tableId;
    public $webPropertyId;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getProfileName()
    {
        return $this->profileName;
    }

    /**
     * @param $profileName
     */
    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_GaDataQuery
 */
class Google_Service_Analytics_GaDataQuery extends Google_Collection
{
    public $dimensions;
    public $endDate;
    public $filters;
    public $ids;
    public $maxResults;
    public $metrics;
    public $samplingLevel;
    public $segment;
    public $sort;
    public $startDate;
    public $startIndex;
    protected $collection_key = 'sort';
    protected $internal_gapi_mappings = [
        "endDate" => "end-date",
        "maxResults" => "max-results",
        "startDate" => "start-date",
        "startIndex" => "start-index",
    ];

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

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
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getSamplingLevel()
    {
        return $this->samplingLevel;
    }

    /**
     * @param $samplingLevel
     */
    public function setSamplingLevel($samplingLevel)
    {
        $this->samplingLevel = $samplingLevel;
    }

    /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }
}

/**
 * Class Google_Service_Analytics_GaDataTotalsForAllResults
 */
class Google_Service_Analytics_GaDataTotalsForAllResults extends Google_Model
{
}

/**
 * Class Google_Service_Analytics_Goal
 */
class Google_Service_Analytics_Goal extends Google_Model
{
    public $accountId;
    public $active;
    public $created;
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $name;
    public $profileId;
    public $selfLink;
    public $type;
    public $updated;
    public $value;
    public $webPropertyId;
    protected $internal_gapi_mappings = [];
    protected $eventDetailsType = 'Google_Service_Analytics_GoalEventDetails';
    protected $eventDetailsDataType = '';
    protected $parentLinkType = 'Google_Service_Analytics_GoalParentLink';
    protected $parentLinkDataType = '';
    protected $urlDestinationDetailsType = 'Google_Service_Analytics_GoalUrlDestinationDetails';
    protected $urlDestinationDetailsDataType = '';
    protected $visitNumPagesDetailsType = 'Google_Service_Analytics_GoalVisitNumPagesDetails';
    protected $visitNumPagesDetailsDataType = '';
    protected $visitTimeOnSiteDetailsType = 'Google_Service_Analytics_GoalVisitTimeOnSiteDetails';
    protected $visitTimeOnSiteDetailsDataType = '';

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
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * @param Google_Service_Analytics_GoalEventDetails $eventDetails
     */
    public function setEventDetails(Google_Service_Analytics_GoalEventDetails $eventDetails)
    {
        $this->eventDetails = $eventDetails;
    }

    /**
     * @return mixed
     */
    public function getEventDetails()
    {
        return $this->eventDetails;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
     * @param Google_Service_Analytics_GoalParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_GoalParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
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
     * @param Google_Service_Analytics_GoalUrlDestinationDetails $urlDestinationDetails
     */
    public function setUrlDestinationDetails(Google_Service_Analytics_GoalUrlDestinationDetails $urlDestinationDetails)
    {
        $this->urlDestinationDetails = $urlDestinationDetails;
    }

    /**
     * @return mixed
     */
    public function getUrlDestinationDetails()
    {
        return $this->urlDestinationDetails;
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

    /**
     * @param Google_Service_Analytics_GoalVisitNumPagesDetails $visitNumPagesDetails
     */
    public function setVisitNumPagesDetails(Google_Service_Analytics_GoalVisitNumPagesDetails $visitNumPagesDetails)
    {
        $this->visitNumPagesDetails = $visitNumPagesDetails;
    }

    /**
     * @return mixed
     */
    public function getVisitNumPagesDetails()
    {
        return $this->visitNumPagesDetails;
    }

    /**
     * @param Google_Service_Analytics_GoalVisitTimeOnSiteDetails $visitTimeOnSiteDetails
     */
    public function setVisitTimeOnSiteDetails(Google_Service_Analytics_GoalVisitTimeOnSiteDetails $visitTimeOnSiteDetails)
    {
        $this->visitTimeOnSiteDetails = $visitTimeOnSiteDetails;
    }

    /**
     * @return mixed
     */
    public function getVisitTimeOnSiteDetails()
    {
        return $this->visitTimeOnSiteDetails;
    }

    /**
     * @return mixed
     */
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_GoalEventDetails
 */
class Google_Service_Analytics_GoalEventDetails extends Google_Collection
{
    public $useEventValue;
    protected $collection_key = 'eventConditions';
    protected $internal_gapi_mappings = [];
    protected $eventConditionsType = 'Google_Service_Analytics_GoalEventDetailsEventConditions';
    protected $eventConditionsDataType = 'array';

    /**
     * @param $eventConditions
     */
    public function setEventConditions($eventConditions)
    {
        $this->eventConditions = $eventConditions;
    }

    /**
     * @return mixed
     */
    public function getEventConditions()
    {
        return $this->eventConditions;
    }

    /**
     * @return mixed
     */
    public function getUseEventValue()
    {
        return $this->useEventValue;
    }

    /**
     * @param $useEventValue
     */
    public function setUseEventValue($useEventValue)
    {
        $this->useEventValue = $useEventValue;
    }
}

/**
 * Class Google_Service_Analytics_GoalEventDetailsEventConditions
 */
class Google_Service_Analytics_GoalEventDetailsEventConditions extends Google_Model
{
    public $comparisonType;
    public $comparisonValue;
    public $expression;
    public $matchType;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    /**
     * @param $comparisonType
     */
    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    /**
     * @return mixed
     */
    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    /**
     * @param $comparisonValue
     */
    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }

    /**
     * @return mixed
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @param $expression
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return mixed
     */
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * @param $matchType
     */
    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
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
 * Class Google_Service_Analytics_GoalParentLink
 */
class Google_Service_Analytics_GoalParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_GoalUrlDestinationDetails
 */
class Google_Service_Analytics_GoalUrlDestinationDetails extends Google_Collection
{
    public $caseSensitive;
    public $firstStepRequired;
    public $matchType;
    public $url;
    protected $collection_key = 'steps';
    protected $internal_gapi_mappings = [];
    protected $stepsType = 'Google_Service_Analytics_GoalUrlDestinationDetailsSteps';
    protected $stepsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param $caseSensitive
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
    }

    /**
     * @return mixed
     */
    public function getFirstStepRequired()
    {
        return $this->firstStepRequired;
    }

    /**
     * @param $firstStepRequired
     */
    public function setFirstStepRequired($firstStepRequired)
    {
        $this->firstStepRequired = $firstStepRequired;
    }

    /**
     * @return mixed
     */
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * @param $matchType
     */
    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
    }

    /**
     * @param $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
    }

    /**
     * @return mixed
     */
    public function getSteps()
    {
        return $this->steps;
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
 * Class Google_Service_Analytics_GoalUrlDestinationDetailsSteps
 */
class Google_Service_Analytics_GoalUrlDestinationDetailsSteps extends Google_Model
{
    public $name;
    public $number;
    public $url;
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
 * Class Google_Service_Analytics_GoalVisitNumPagesDetails
 */
class Google_Service_Analytics_GoalVisitNumPagesDetails extends Google_Model
{
    public $comparisonType;
    public $comparisonValue;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    /**
     * @param $comparisonType
     */
    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    /**
     * @return mixed
     */
    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    /**
     * @param $comparisonValue
     */
    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }
}

/**
 * Class Google_Service_Analytics_GoalVisitTimeOnSiteDetails
 */
class Google_Service_Analytics_GoalVisitTimeOnSiteDetails extends Google_Model
{
    public $comparisonType;
    public $comparisonValue;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getComparisonType()
    {
        return $this->comparisonType;
    }

    /**
     * @param $comparisonType
     */
    public function setComparisonType($comparisonType)
    {
        $this->comparisonType = $comparisonType;
    }

    /**
     * @return mixed
     */
    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }

    /**
     * @param $comparisonValue
     */
    public function setComparisonValue($comparisonValue)
    {
        $this->comparisonValue = $comparisonValue;
    }
}

/**
 * Class Google_Service_Analytics_Goals
 */
class Google_Service_Analytics_Goals extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Goal';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_McfData
 */
class Google_Service_Analytics_McfData extends Google_Collection
{
    public $containsSampledData;
    public $id;
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $sampleSize;
    public $sampleSpace;
    public $selfLink;
    public $totalResults;
    public $totalsForAllResults;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $columnHeadersType = 'Google_Service_Analytics_McfDataColumnHeaders';
    protected $columnHeadersDataType = 'array';
    protected $profileInfoType = 'Google_Service_Analytics_McfDataProfileInfo';
    protected $profileInfoDataType = '';
    protected $queryType = 'Google_Service_Analytics_McfDataQuery';
    protected $queryDataType = '';
    protected $rowsType = 'Google_Service_Analytics_McfDataRows';
    protected $rowsDataType = 'array';

    /**
     * @param $columnHeaders
     */
    public function setColumnHeaders($columnHeaders)
    {
        $this->columnHeaders = $columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getColumnHeaders()
    {
        return $this->columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getContainsSampledData()
    {
        return $this->containsSampledData;
    }

    /**
     * @param $containsSampledData
     */
    public function setContainsSampledData($containsSampledData)
    {
        $this->containsSampledData = $containsSampledData;
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @param Google_Service_Analytics_McfDataProfileInfo $profileInfo
     */
    public function setProfileInfo(Google_Service_Analytics_McfDataProfileInfo $profileInfo)
    {
        $this->profileInfo = $profileInfo;
    }

    /**
     * @return mixed
     */
    public function getProfileInfo()
    {
        return $this->profileInfo;
    }

    /**
     * @param Google_Service_Analytics_McfDataQuery $query
     */
    public function setQuery(Google_Service_Analytics_McfDataQuery $query)
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
    public function getSampleSize()
    {
        return $this->sampleSize;
    }

    /**
     * @param $sampleSize
     */
    public function setSampleSize($sampleSize)
    {
        $this->sampleSize = $sampleSize;
    }

    /**
     * @return mixed
     */
    public function getSampleSpace()
    {
        return $this->sampleSpace;
    }

    /**
     * @param $sampleSpace
     */
    public function setSampleSpace($sampleSpace)
    {
        $this->sampleSpace = $sampleSpace;
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
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * @return mixed
     */
    public function getTotalsForAllResults()
    {
        return $this->totalsForAllResults;
    }

    /**
     * @param $totalsForAllResults
     */
    public function setTotalsForAllResults($totalsForAllResults)
    {
        $this->totalsForAllResults = $totalsForAllResults;
    }
}

/**
 * Class Google_Service_Analytics_McfDataColumnHeaders
 */
class Google_Service_Analytics_McfDataColumnHeaders extends Google_Model
{
    public $columnType;
    public $dataType;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    /**
     * @param $columnType
     */
    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

    /**
     * @return mixed
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
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
 * Class Google_Service_Analytics_McfDataProfileInfo
 */
class Google_Service_Analytics_McfDataProfileInfo extends Google_Model
{
    public $accountId;
    public $internalWebPropertyId;
    public $profileId;
    public $profileName;
    public $tableId;
    public $webPropertyId;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getProfileName()
    {
        return $this->profileName;
    }

    /**
     * @param $profileName
     */
    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_McfDataQuery
 */
class Google_Service_Analytics_McfDataQuery extends Google_Collection
{
    public $dimensions;
    public $endDate;
    public $filters;
    public $ids;
    public $maxResults;
    public $metrics;
    public $samplingLevel;
    public $segment;
    public $sort;
    public $startDate;
    public $startIndex;
    protected $collection_key = 'sort';
    protected $internal_gapi_mappings = [
        "endDate" => "end-date",
        "maxResults" => "max-results",
        "startDate" => "start-date",
        "startIndex" => "start-index",
    ];

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

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
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getSamplingLevel()
    {
        return $this->samplingLevel;
    }

    /**
     * @param $samplingLevel
     */
    public function setSamplingLevel($samplingLevel)
    {
        $this->samplingLevel = $samplingLevel;
    }

    /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }
}

/**
 * Class Google_Service_Analytics_McfDataRows
 */
class Google_Service_Analytics_McfDataRows extends Google_Collection
{
    public $primitiveValue;
    protected $collection_key = 'conversionPathValue';
    protected $internal_gapi_mappings = [];
    protected $conversionPathValueType = 'Google_Service_Analytics_McfDataRowsConversionPathValue';
    protected $conversionPathValueDataType = 'array';

    /**
     * @param $conversionPathValue
     */
    public function setConversionPathValue($conversionPathValue)
    {
        $this->conversionPathValue = $conversionPathValue;
    }

    /**
     * @return mixed
     */
    public function getConversionPathValue()
    {
        return $this->conversionPathValue;
    }

    /**
     * @return mixed
     */
    public function getPrimitiveValue()
    {
        return $this->primitiveValue;
    }

    /**
     * @param $primitiveValue
     */
    public function setPrimitiveValue($primitiveValue)
    {
        $this->primitiveValue = $primitiveValue;
    }
}

/**
 * Class Google_Service_Analytics_McfDataRowsConversionPathValue
 */
class Google_Service_Analytics_McfDataRowsConversionPathValue extends Google_Model
{
    public $interactionType;
    public $nodeValue;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getInteractionType()
    {
        return $this->interactionType;
    }

    /**
     * @param $interactionType
     */
    public function setInteractionType($interactionType)
    {
        $this->interactionType = $interactionType;
    }

    /**
     * @return mixed
     */
    public function getNodeValue()
    {
        return $this->nodeValue;
    }

    /**
     * @param $nodeValue
     */
    public function setNodeValue($nodeValue)
    {
        $this->nodeValue = $nodeValue;
    }
}

/**
 * Class Google_Service_Analytics_McfDataTotalsForAllResults
 */
class Google_Service_Analytics_McfDataTotalsForAllResults extends Google_Model
{
}

/**
 * Class Google_Service_Analytics_Profile
 */
class Google_Service_Analytics_Profile extends Google_Model
{
    public $accountId;
    public $created;
    public $currency;
    public $defaultPage;
    public $eCommerceTracking;
    public $enhancedECommerceTracking;
    public $excludeQueryParameters;
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $name;
    public $selfLink;
    public $siteSearchCategoryParameters;
    public $siteSearchQueryParameters;
    public $stripSiteSearchCategoryParameters;
    public $stripSiteSearchQueryParameters;
    public $timezone;
    public $type;
    public $updated;
    public $webPropertyId;
    public $websiteUrl;
    protected $internal_gapi_mappings = [];
    protected $childLinkType = 'Google_Service_Analytics_ProfileChildLink';
    protected $childLinkDataType = '';
    protected $parentLinkType = 'Google_Service_Analytics_ProfileParentLink';
    protected $parentLinkDataType = '';
    protected $permissionsType = 'Google_Service_Analytics_ProfilePermissions';
    protected $permissionsDataType = '';

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
     * @param Google_Service_Analytics_ProfileChildLink $childLink
     */
    public function setChildLink(Google_Service_Analytics_ProfileChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    /**
     * @return mixed
     */
    public function getChildLink()
    {
        return $this->childLink;
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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDefaultPage()
    {
        return $this->defaultPage;
    }

    /**
     * @param $defaultPage
     */
    public function setDefaultPage($defaultPage)
    {
        $this->defaultPage = $defaultPage;
    }

    /**
     * @return mixed
     */
    public function getECommerceTracking()
    {
        return $this->eCommerceTracking;
    }

    /**
     * @param $eCommerceTracking
     */
    public function setECommerceTracking($eCommerceTracking)
    {
        $this->eCommerceTracking = $eCommerceTracking;
    }

    /**
     * @return mixed
     */
    public function getEnhancedECommerceTracking()
    {
        return $this->enhancedECommerceTracking;
    }

    /**
     * @param $enhancedECommerceTracking
     */
    public function setEnhancedECommerceTracking($enhancedECommerceTracking)
    {
        $this->enhancedECommerceTracking = $enhancedECommerceTracking;
    }

    /**
     * @return mixed
     */
    public function getExcludeQueryParameters()
    {
        return $this->excludeQueryParameters;
    }

    /**
     * @param $excludeQueryParameters
     */
    public function setExcludeQueryParameters($excludeQueryParameters)
    {
        $this->excludeQueryParameters = $excludeQueryParameters;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
     * @param Google_Service_Analytics_ProfileParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_ProfileParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @param Google_Service_Analytics_ProfilePermissions $permissions
     */
    public function setPermissions(Google_Service_Analytics_ProfilePermissions $permissions)
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
    public function getSiteSearchCategoryParameters()
    {
        return $this->siteSearchCategoryParameters;
    }

    /**
     * @param $siteSearchCategoryParameters
     */
    public function setSiteSearchCategoryParameters($siteSearchCategoryParameters)
    {
        $this->siteSearchCategoryParameters = $siteSearchCategoryParameters;
    }

    /**
     * @return mixed
     */
    public function getSiteSearchQueryParameters()
    {
        return $this->siteSearchQueryParameters;
    }

    /**
     * @param $siteSearchQueryParameters
     */
    public function setSiteSearchQueryParameters($siteSearchQueryParameters)
    {
        $this->siteSearchQueryParameters = $siteSearchQueryParameters;
    }

    /**
     * @return mixed
     */
    public function getStripSiteSearchCategoryParameters()
    {
        return $this->stripSiteSearchCategoryParameters;
    }

    /**
     * @param $stripSiteSearchCategoryParameters
     */
    public function setStripSiteSearchCategoryParameters($stripSiteSearchCategoryParameters)
    {
        $this->stripSiteSearchCategoryParameters = $stripSiteSearchCategoryParameters;
    }

    /**
     * @return mixed
     */
    public function getStripSiteSearchQueryParameters()
    {
        return $this->stripSiteSearchQueryParameters;
    }

    /**
     * @param $stripSiteSearchQueryParameters
     */
    public function setStripSiteSearchQueryParameters($stripSiteSearchQueryParameters)
    {
        $this->stripSiteSearchQueryParameters = $stripSiteSearchQueryParameters;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }

    /**
     * @return mixed
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }
}

/**
 * Class Google_Service_Analytics_ProfileChildLink
 */
class Google_Service_Analytics_ProfileChildLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_ProfileFilterLink
 */
class Google_Service_Analytics_ProfileFilterLink extends Google_Model
{
    public $id;
    public $kind;
    public $rank;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $filterRefType = 'Google_Service_Analytics_FilterRef';
    protected $filterRefDataType = '';
    protected $profileRefType = 'Google_Service_Analytics_ProfileRef';
    protected $profileRefDataType = '';

    /**
     * @param Google_Service_Analytics_FilterRef $filterRef
     */
    public function setFilterRef(Google_Service_Analytics_FilterRef $filterRef)
    {
        $this->filterRef = $filterRef;
    }

    /**
     * @return mixed
     */
    public function getFilterRef()
    {
        return $this->filterRef;
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
     * @param Google_Service_Analytics_ProfileRef $profileRef
     */
    public function setProfileRef(Google_Service_Analytics_ProfileRef $profileRef)
    {
        $this->profileRef = $profileRef;
    }

    /**
     * @return mixed
     */
    public function getProfileRef()
    {
        return $this->profileRef;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
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
 * Class Google_Service_Analytics_ProfileFilterLinks
 */
class Google_Service_Analytics_ProfileFilterLinks extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_ProfileFilterLink';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_ProfileParentLink
 */
class Google_Service_Analytics_ProfileParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_ProfilePermissions
 */
class Google_Service_Analytics_ProfilePermissions extends Google_Collection
{
    public $effective;
    protected $collection_key = 'effective';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEffective()
    {
        return $this->effective;
    }

    /**
     * @param $effective
     */
    public function setEffective($effective)
    {
        $this->effective = $effective;
    }
}

/**
 * Class Google_Service_Analytics_ProfileRef
 */
class Google_Service_Analytics_ProfileRef extends Google_Model
{
    public $accountId;
    public $href;
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $name;
    public $webPropertyId;
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
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_ProfileSummary
 */
class Google_Service_Analytics_ProfileSummary extends Google_Model
{
    public $id;
    public $kind;
    public $name;
    public $type;
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
}

/**
 * Class Google_Service_Analytics_Profiles
 */
class Google_Service_Analytics_Profiles extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Profile';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_RealtimeData
 */
class Google_Service_Analytics_RealtimeData extends Google_Collection
{
    public $id;
    public $kind;
    public $rows;
    public $selfLink;
    public $totalResults;
    public $totalsForAllResults;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $columnHeadersType = 'Google_Service_Analytics_RealtimeDataColumnHeaders';
    protected $columnHeadersDataType = 'array';
    protected $profileInfoType = 'Google_Service_Analytics_RealtimeDataProfileInfo';
    protected $profileInfoDataType = '';
    protected $queryType = 'Google_Service_Analytics_RealtimeDataQuery';
    protected $queryDataType = '';

    /**
     * @param $columnHeaders
     */
    public function setColumnHeaders($columnHeaders)
    {
        $this->columnHeaders = $columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getColumnHeaders()
    {
        return $this->columnHeaders;
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
     * @param Google_Service_Analytics_RealtimeDataProfileInfo $profileInfo
     */
    public function setProfileInfo(Google_Service_Analytics_RealtimeDataProfileInfo $profileInfo)
    {
        $this->profileInfo = $profileInfo;
    }

    /**
     * @return mixed
     */
    public function getProfileInfo()
    {
        return $this->profileInfo;
    }

    /**
     * @param Google_Service_Analytics_RealtimeDataQuery $query
     */
    public function setQuery(Google_Service_Analytics_RealtimeDataQuery $query)
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
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }

    /**
     * @return mixed
     */
    public function getTotalsForAllResults()
    {
        return $this->totalsForAllResults;
    }

    /**
     * @param $totalsForAllResults
     */
    public function setTotalsForAllResults($totalsForAllResults)
    {
        $this->totalsForAllResults = $totalsForAllResults;
    }
}

/**
 * Class Google_Service_Analytics_RealtimeDataColumnHeaders
 */
class Google_Service_Analytics_RealtimeDataColumnHeaders extends Google_Model
{
    public $columnType;
    public $dataType;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    /**
     * @param $columnType
     */
    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

    /**
     * @return mixed
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
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
 * Class Google_Service_Analytics_RealtimeDataProfileInfo
 */
class Google_Service_Analytics_RealtimeDataProfileInfo extends Google_Model
{
    public $accountId;
    public $internalWebPropertyId;
    public $profileId;
    public $profileName;
    public $tableId;
    public $webPropertyId;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getProfileName()
    {
        return $this->profileName;
    }

    /**
     * @param $profileName
     */
    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_RealtimeDataQuery
 */
class Google_Service_Analytics_RealtimeDataQuery extends Google_Collection
{
    public $dimensions;
    public $filters;
    public $ids;
    public $maxResults;
    public $metrics;
    public $sort;
    protected $collection_key = 'sort';
    protected $internal_gapi_mappings = [
        "maxResults" => "max-results",
    ];

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

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
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }
}

/**
 * Class Google_Service_Analytics_RealtimeDataTotalsForAllResults
 */
class Google_Service_Analytics_RealtimeDataTotalsForAllResults extends Google_Model
{
}

/**
 * Class Google_Service_Analytics_Segment
 */
class Google_Service_Analytics_Segment extends Google_Model
{
    public $created;
    public $definition;
    public $id;
    public $kind;
    public $name;
    public $segmentId;
    public $selfLink;
    public $type;
    public $updated;
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
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @param $segmentId
     */
    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;
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
 * Class Google_Service_Analytics_Segments
 */
class Google_Service_Analytics_Segments extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Segment';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_UnsampledReport
 */
class Google_Service_Analytics_UnsampledReport extends Google_Model
{
    public $accountId;
    public $created;
    public $dimensions;
    public $downloadType;
    public $endDate;
    public $filters;
    public $id;
    public $kind;
    public $metrics;
    public $profileId;
    public $segment;
    public $selfLink;
    public $startDate;
    public $status;
    public $title;
    public $updated;
    public $webPropertyId;
    protected $internal_gapi_mappings = [
        "endDate" => "end-date",
        "startDate" => "start-date",
    ];
    protected $cloudStorageDownloadDetailsType = 'Google_Service_Analytics_UnsampledReportCloudStorageDownloadDetails';
    protected $cloudStorageDownloadDetailsDataType = '';
    protected $driveDownloadDetailsType = 'Google_Service_Analytics_UnsampledReportDriveDownloadDetails';
    protected $driveDownloadDetailsDataType = '';

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
     * @param Google_Service_Analytics_UnsampledReportCloudStorageDownloadDetails $cloudStorageDownloadDetails
     */
    public function setCloudStorageDownloadDetails(Google_Service_Analytics_UnsampledReportCloudStorageDownloadDetails $cloudStorageDownloadDetails)
    {
        $this->cloudStorageDownloadDetails = $cloudStorageDownloadDetails;
    }

    /**
     * @return mixed
     */
    public function getCloudStorageDownloadDetails()
    {
        return $this->cloudStorageDownloadDetails;
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
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDownloadType()
    {
        return $this->downloadType;
    }

    /**
     * @param $downloadType
     */
    public function setDownloadType($downloadType)
    {
        $this->downloadType = $downloadType;
    }

    /**
     * @param Google_Service_Analytics_UnsampledReportDriveDownloadDetails $driveDownloadDetails
     */
    public function setDriveDownloadDetails(Google_Service_Analytics_UnsampledReportDriveDownloadDetails $driveDownloadDetails)
    {
        $this->driveDownloadDetails = $driveDownloadDetails;
    }

    /**
     * @return mixed
     */
    public function getDriveDownloadDetails()
    {
        return $this->driveDownloadDetails;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

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
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @param $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
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
    public function getWebPropertyId()
    {
        return $this->webPropertyId;
    }

    /**
     * @param $webPropertyId
     */
    public function setWebPropertyId($webPropertyId)
    {
        $this->webPropertyId = $webPropertyId;
    }
}

/**
 * Class Google_Service_Analytics_UnsampledReportCloudStorageDownloadDetails
 */
class Google_Service_Analytics_UnsampledReportCloudStorageDownloadDetails extends Google_Model
{
    public $bucketId;
    public $objectId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBucketId()
    {
        return $this->bucketId;
    }

    /**
     * @param $bucketId
     */
    public function setBucketId($bucketId)
    {
        $this->bucketId = $bucketId;
    }

    /**
     * @return mixed
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }
}

/**
 * Class Google_Service_Analytics_UnsampledReportDriveDownloadDetails
 */
class Google_Service_Analytics_UnsampledReportDriveDownloadDetails extends Google_Model
{
    public $documentId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @param $documentId
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
    }
}

/**
 * Class Google_Service_Analytics_UnsampledReports
 */
class Google_Service_Analytics_UnsampledReports extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_UnsampledReport';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_Upload
 */
class Google_Service_Analytics_Upload extends Google_Collection
{
    public $accountId;
    public $customDataSourceId;
    public $errors;
    public $id;
    public $kind;
    public $status;
    protected $collection_key = 'errors';
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
    public function getCustomDataSourceId()
    {
        return $this->customDataSourceId;
    }

    /**
     * @param $customDataSourceId
     */
    public function setCustomDataSourceId($customDataSourceId)
    {
        $this->customDataSourceId = $customDataSourceId;
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
 * Class Google_Service_Analytics_Uploads
 */
class Google_Service_Analytics_Uploads extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Upload';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Analytics_UserRef
 */
class Google_Service_Analytics_UserRef extends Google_Model
{
    public $email;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
 * Class Google_Service_Analytics_WebPropertyRef
 */
class Google_Service_Analytics_WebPropertyRef extends Google_Model
{
    public $accountId;
    public $href;
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $name;
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
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
}

/**
 * Class Google_Service_Analytics_WebPropertySummary
 */
class Google_Service_Analytics_WebPropertySummary extends Google_Collection
{
    public $id;
    public $internalWebPropertyId;
    public $kind;
    public $level;
    public $name;
    public $websiteUrl;
    protected $collection_key = 'profiles';
    protected $internal_gapi_mappings = [];
    protected $profilesType = 'Google_Service_Analytics_ProfileSummary';
    protected $profilesDataType = 'array';

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
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
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
     * @param $profiles
     */
    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * @return mixed
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @return mixed
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }
}

/**
 * Class Google_Service_Analytics_Webproperties
 */
class Google_Service_Analytics_Webproperties extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextLink;
    public $previousLink;
    public $startIndex;
    public $totalResults;
    public $username;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Analytics_Webproperty';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return mixed
     */
    public function getPreviousLink()
    {
        return $this->previousLink;
    }

    /**
     * @param $previousLink
     */
    public function setPreviousLink($previousLink)
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
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
}

/**
 * Class Google_Service_Analytics_Webproperty
 */
class Google_Service_Analytics_Webproperty extends Google_Model
{
    public $accountId;
    public $created;
    public $defaultProfileId;
    public $id;
    public $industryVertical;
    public $internalWebPropertyId;
    public $kind;
    public $level;
    public $name;
    public $profileCount;
    public $selfLink;
    public $updated;
    public $websiteUrl;
    protected $internal_gapi_mappings = [];
    protected $childLinkType = 'Google_Service_Analytics_WebpropertyChildLink';
    protected $childLinkDataType = '';
    protected $parentLinkType = 'Google_Service_Analytics_WebpropertyParentLink';
    protected $parentLinkDataType = '';
    protected $permissionsType = 'Google_Service_Analytics_WebpropertyPermissions';
    protected $permissionsDataType = '';

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
     * @param Google_Service_Analytics_WebpropertyChildLink $childLink
     */
    public function setChildLink(Google_Service_Analytics_WebpropertyChildLink $childLink)
    {
        $this->childLink = $childLink;
    }

    /**
     * @return mixed
     */
    public function getChildLink()
    {
        return $this->childLink;
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
    public function getDefaultProfileId()
    {
        return $this->defaultProfileId;
    }

    /**
     * @param $defaultProfileId
     */
    public function setDefaultProfileId($defaultProfileId)
    {
        $this->defaultProfileId = $defaultProfileId;
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
    public function getIndustryVertical()
    {
        return $this->industryVertical;
    }

    /**
     * @param $industryVertical
     */
    public function setIndustryVertical($industryVertical)
    {
        $this->industryVertical = $industryVertical;
    }

    /**
     * @return mixed
     */
    public function getInternalWebPropertyId()
    {
        return $this->internalWebPropertyId;
    }

    /**
     * @param $internalWebPropertyId
     */
    public function setInternalWebPropertyId($internalWebPropertyId)
    {
        $this->internalWebPropertyId = $internalWebPropertyId;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
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
     * @param Google_Service_Analytics_WebpropertyParentLink $parentLink
     */
    public function setParentLink(Google_Service_Analytics_WebpropertyParentLink $parentLink)
    {
        $this->parentLink = $parentLink;
    }

    /**
     * @return mixed
     */
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @param Google_Service_Analytics_WebpropertyPermissions $permissions
     */
    public function setPermissions(Google_Service_Analytics_WebpropertyPermissions $permissions)
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

    /**
     * @return mixed
     */
    public function getProfileCount()
    {
        return $this->profileCount;
    }

    /**
     * @param $profileCount
     */
    public function setProfileCount($profileCount)
    {
        $this->profileCount = $profileCount;
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
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }
}

/**
 * Class Google_Service_Analytics_WebpropertyChildLink
 */
class Google_Service_Analytics_WebpropertyChildLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_WebpropertyParentLink
 */
class Google_Service_Analytics_WebpropertyParentLink extends Google_Model
{
    public $href;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param $href
     */
    public function setHref($href)
    {
        $this->href = $href;
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
 * Class Google_Service_Analytics_WebpropertyPermissions
 */
class Google_Service_Analytics_WebpropertyPermissions extends Google_Collection
{
    public $effective;
    protected $collection_key = 'effective';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEffective()
    {
        return $this->effective;
    }

    /**
     * @param $effective
     */
    public function setEffective($effective)
    {
        $this->effective = $effective;
    }
}
