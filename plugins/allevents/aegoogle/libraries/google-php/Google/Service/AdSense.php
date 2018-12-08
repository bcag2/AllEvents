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
 * Service definition for AdSense (v1.4).
 *
 * <p>
 * Gives AdSense publishers access to their inventory and the ability to
 * generate reports</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/adsense/management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdSense extends Google_Service
{
    /** View and manage your AdSense data. */
    const ADSENSE =
        "https://www.googleapis.com/auth/adsense";
    /** View your AdSense data. */
    const ADSENSE_READONLY =
        "https://www.googleapis.com/auth/adsense.readonly";

    public $accounts;
    public $accounts_adclients;
    public $accounts_adunits;
    public $accounts_adunits_customchannels;
    public $accounts_alerts;
    public $accounts_customchannels;
    public $accounts_customchannels_adunits;
    public $accounts_payments;
    public $accounts_reports;
    public $accounts_reports_saved;
    public $accounts_savedadstyles;
    public $accounts_urlchannels;
    public $adclients;
    public $adunits;
    public $adunits_customchannels;
    public $alerts;
    public $customchannels;
    public $customchannels_adunits;
    public $metadata_dimensions;
    public $metadata_metrics;
    public $payments;
    public $reports;
    public $reports_saved;
    public $savedadstyles;
    public $urlchannels;


    /**
     * Constructs the internal representation of the AdSense service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'adsense/v1.4/';
        $this->version = 'v1.4';
        $this->serviceName = 'adsense';

        $this->accounts = new Google_Service_AdSense_Accounts_Resource(
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
                            'tree' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts',
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
        $this->accounts_adclients = new Google_Service_AdSense_AccountsAdclients_Resource(
            $this,
            $this->serviceName,
            'adclients',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/adclients',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_adunits = new Google_Service_AdSense_AccountsAdunits_Resource(
            $this,
            $this->serviceName,
            'adunits',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getAdCode' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}/adcode',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeInactive' => [
                                'location' => 'query',
                                'type' => 'boolean',
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
                    ],
                ]
            ]
        );
        $this->accounts_adunits_customchannels = new Google_Service_AdSense_AccountsAdunitsCustomchannels_Resource(
            $this,
            $this->serviceName,
            'customchannels',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}/customchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_alerts = new Google_Service_AdSense_AccountsAlerts_Resource(
            $this,
            $this->serviceName,
            'alerts',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'accounts/{accountId}/alerts/{alertId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'alertId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/alerts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_customchannels = new Google_Service_AdSense_AccountsCustomchannels_Resource(
            $this,
            $this->serviceName,
            'customchannels',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/customchannels/{customChannelId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customChannelId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/customchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_customchannels_adunits = new Google_Service_AdSense_AccountsCustomchannelsAdunits_Resource(
            $this,
            $this->serviceName,
            'adunits',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/customchannels/{customChannelId}/adunits',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customChannelId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeInactive' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_payments = new Google_Service_AdSense_AccountsPayments_Resource(
            $this,
            $this->serviceName,
            'payments',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/payments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_reports = new Google_Service_AdSense_AccountsReports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'accounts/{accountId}/reports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'metric' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'currency' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'useTimezoneReporting' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'dimension' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_reports_saved = new Google_Service_AdSense_AccountsReportsSaved_Resource(
            $this,
            $this->serviceName,
            'saved',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'accounts/{accountId}/reports/{savedReportId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'savedReportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/reports/saved',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_savedadstyles = new Google_Service_AdSense_AccountsSavedadstyles_Resource(
            $this,
            $this->serviceName,
            'savedadstyles',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}/savedadstyles/{savedAdStyleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'savedAdStyleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/savedadstyles',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
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
                    ],
                ]
            ]
        );
        $this->accounts_urlchannels = new Google_Service_AdSense_AccountsUrlchannels_Resource(
            $this,
            $this->serviceName,
            'urlchannels',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/urlchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adClientId' => [
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
                    ],
                ]
            ]
        );
        $this->adclients = new Google_Service_AdSense_Adclients_Resource(
            $this,
            $this->serviceName,
            'adclients',
            [
                'methods' => [
                    'list' => [
                        'path' => 'adclients',
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
        $this->adunits = new Google_Service_AdSense_Adunits_Resource(
            $this,
            $this->serviceName,
            'adunits',
            [
                'methods' => [
                    'get' => [
                        'path' => 'adclients/{adClientId}/adunits/{adUnitId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getAdCode' => [
                        'path' => 'adclients/{adClientId}/adunits/{adUnitId}/adcode',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'adclients/{adClientId}/adunits',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeInactive' => [
                                'location' => 'query',
                                'type' => 'boolean',
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
                    ],
                ]
            ]
        );
        $this->adunits_customchannels = new Google_Service_AdSense_AdunitsCustomchannels_Resource(
            $this,
            $this->serviceName,
            'customchannels',
            [
                'methods' => [
                    'list' => [
                        'path' => 'adclients/{adClientId}/adunits/{adUnitId}/customchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'adUnitId' => [
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
                    ],
                ]
            ]
        );
        $this->alerts = new Google_Service_AdSense_Alerts_Resource(
            $this,
            $this->serviceName,
            'alerts',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'alerts/{alertId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'alertId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'alerts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->customchannels = new Google_Service_AdSense_Customchannels_Resource(
            $this,
            $this->serviceName,
            'customchannels',
            [
                'methods' => [
                    'get' => [
                        'path' => 'adclients/{adClientId}/customchannels/{customChannelId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customChannelId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'adclients/{adClientId}/customchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
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
                    ],
                ]
            ]
        );
        $this->customchannels_adunits = new Google_Service_AdSense_CustomchannelsAdunits_Resource(
            $this,
            $this->serviceName,
            'adunits',
            [
                'methods' => [
                    'list' => [
                        'path' => 'adclients/{adClientId}/customchannels/{customChannelId}/adunits',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customChannelId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeInactive' => [
                                'location' => 'query',
                                'type' => 'boolean',
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
                    ],
                ]
            ]
        );
        $this->metadata_dimensions = new Google_Service_AdSense_MetadataDimensions_Resource(
            $this,
            $this->serviceName,
            'dimensions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'metadata/dimensions',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->metadata_metrics = new Google_Service_AdSense_MetadataMetrics_Resource(
            $this,
            $this->serviceName,
            'metrics',
            [
                'methods' => [
                    'list' => [
                        'path' => 'metadata/metrics',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->payments = new Google_Service_AdSense_Payments_Resource(
            $this,
            $this->serviceName,
            'payments',
            [
                'methods' => [
                    'list' => [
                        'path' => 'payments',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->reports = new Google_Service_AdSense_Reports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'reports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'metric' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'currency' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'useTimezoneReporting' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'dimension' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'accountId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports_saved = new Google_Service_AdSense_ReportsSaved_Resource(
            $this,
            $this->serviceName,
            'saved',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'reports/{savedReportId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'savedReportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
                        ],
                    ], 'list' => [
                        'path' => 'reports/saved',
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
        $this->savedadstyles = new Google_Service_AdSense_Savedadstyles_Resource(
            $this,
            $this->serviceName,
            'savedadstyles',
            [
                'methods' => [
                    'get' => [
                        'path' => 'savedadstyles/{savedAdStyleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'savedAdStyleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'savedadstyles',
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
        $this->urlchannels = new Google_Service_AdSense_Urlchannels_Resource(
            $this,
            $this->serviceName,
            'urlchannels',
            [
                'methods' => [
                    'list' => [
                        'path' => 'adclients/{adClientId}/urlchannels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
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
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $accounts = $adsenseService->accounts;
 *  </code>
 */
class Google_Service_AdSense_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Get information about the selected AdSense account. (accounts.get)
     *
     * @param string $accountId Account to get information about.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool tree Whether the tree of sub accounts should be returned.
     */
    public function get($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_Account");
    }

    /**
     * List all accounts available to this AdSense account. (accounts.listAccounts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through
     * accounts. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of accounts to include in the
     * response, used for paging.
     */
    public function listAccounts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Accounts");
    }
}

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adclients = $adsenseService->adclients;
 *  </code>
 */
class Google_Service_AdSense_AccountsAdclients_Resource extends Google_Service_Resource
{

    /**
     * List all ad clients in the specified account.
     * (adclients.listAccountsAdclients)
     *
     * @param string $accountId Account for which to list ad clients.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through ad
     * clients. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of ad clients to include in the
     * response, used for paging.
     */
    public function listAccountsAdclients($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdClients");
    }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adunits = $adsenseService->adunits;
 *  </code>
 */
class Google_Service_AdSense_AccountsAdunits_Resource extends Google_Service_Resource
{

    /**
     * Gets the specified ad unit in the specified ad client for the specified
     * account. (adunits.get)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client for which to get the ad unit.
     * @param string $adUnitId Ad unit to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_AdUnit");
    }

    /**
     * Get ad code for the specified ad unit. (adunits.getAdCode)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client with contains the ad unit.
     * @param string $adUnitId Ad unit to get the code for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getAdCode($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('getAdCode', [$params], "Google_Service_AdSense_AdCode");
    }

    /**
     * List all ad units in the specified ad client for the specified account.
     * (adunits.listAccountsAdunits)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client for which to list ad units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeInactive Whether to include inactive ad units.
     * Default: true.
     * @opt_param string pageToken A continuation token, used to page through ad
     * units. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of ad units to include in the
     * response, used for paging.
     */
    public function listAccountsAdunits($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdUnits");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_AdSense_AccountsAdunitsCustomchannels_Resource extends Google_Service_Resource
{

    /**
     * List all custom channels which the specified ad unit belongs to.
     * (customchannels.listAccountsAdunitsCustomchannels)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client which contains the ad unit.
     * @param string $adUnitId Ad unit for which to list custom channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through custom
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of custom channels to include in
     * the response, used for paging.
     */
    public function listAccountsAdunitsCustomchannels($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_CustomChannels");
    }
}

/**
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $alerts = $adsenseService->alerts;
 *  </code>
 */
class Google_Service_AdSense_AccountsAlerts_Resource extends Google_Service_Resource
{

    /**
     * Dismiss (delete) the specified alert from the specified publisher AdSense
     * account. (alerts.delete)
     *
     * @param string $accountId Account which contains the ad unit.
     * @param string $alertId Alert to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $alertId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'alertId' => $alertId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * List the alerts for the specified AdSense account.
     * (alerts.listAccountsAlerts)
     *
     * @param string $accountId Account for which to retrieve the alerts.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale The locale to use for translating alert messages.
     * The account locale will be used if this is not supplied. The AdSense default
     * (English) will be used if the supplied locale is invalid or unsupported.
     */
    public function listAccountsAlerts($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Alerts");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_AdSense_AccountsCustomchannels_Resource extends Google_Service_Resource
{

    /**
     * Get the specified custom channel from the specified ad client for the
     * specified account. (customchannels.get)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client which contains the custom channel.
     * @param string $customChannelId Custom channel to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $adClientId, $customChannelId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_CustomChannel");
    }

    /**
     * List all custom channels in the specified ad client for the specified
     * account. (customchannels.listAccountsCustomchannels)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client for which to list custom channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through custom
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of custom channels to include in
     * the response, used for paging.
     */
    public function listAccountsCustomchannels($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_CustomChannels");
    }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adunits = $adsenseService->adunits;
 *  </code>
 */
class Google_Service_AdSense_AccountsCustomchannelsAdunits_Resource extends Google_Service_Resource
{

    /**
     * List all ad units in the specified custom channel.
     * (adunits.listAccountsCustomchannelsAdunits)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client which contains the custom channel.
     * @param string $customChannelId Custom channel for which to list ad units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeInactive Whether to include inactive ad units.
     * Default: true.
     * @opt_param int maxResults The maximum number of ad units to include in the
     * response, used for paging.
     * @opt_param string pageToken A continuation token, used to page through ad
     * units. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     */
    public function listAccountsCustomchannelsAdunits($accountId, $adClientId, $customChannelId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdUnits");
    }
}

/**
 * The "payments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $payments = $adsenseService->payments;
 *  </code>
 */
class Google_Service_AdSense_AccountsPayments_Resource extends Google_Service_Resource
{

    /**
     * List the payments for the specified AdSense account.
     * (payments.listAccountsPayments)
     *
     * @param string $accountId Account for which to retrieve the payments.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccountsPayments($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Payments");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $reports = $adsenseService->reports;
 *  </code>
 */
class Google_Service_AdSense_AccountsReports_Resource extends Google_Service_Resource
{

    /**
     * Generate an AdSense report based on the report request sent in the query
     * parameters. Returns the result as JSON; to retrieve output in CSV format
     * specify "alt=csv" as a query parameter. (reports.generate)
     *
     * @param string $accountId Account upon which to report.
     * @param string $startDate Start of the date range to report on in "YYYY-MM-DD"
     *                          format, inclusive.
     * @param string $endDate End of the date range to report on in "YYYY-MM-DD"
     *                          format, inclusive.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sort The name of a dimension or metric to sort the
     * resulting report on, optionally prefixed with "+" to sort ascending or "-" to
     * sort descending. If no prefix is specified, the column is sorted ascending.
     * @opt_param string locale Optional locale to use for translating report output
     * to a local language. Defaults to "en_US" if not specified.
     * @opt_param string metric Numeric columns to include in the report.
     * @opt_param int maxResults The maximum number of rows of report data to
     * return.
     * @opt_param string filter Filters to be run on the report.
     * @opt_param string currency Optional currency to use when reporting on
     * monetary metrics. Defaults to the account's currency if not set.
     * @opt_param int startIndex Index of the first row of report data to return.
     * @opt_param bool useTimezoneReporting Whether the report should be generated
     * in the AdSense account's local timezone. If false default PST/PDT timezone
     * will be used.
     * @opt_param string dimension Dimensions to base the report on.
     */
    public function generate($accountId, $startDate, $endDate, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'startDate' => $startDate, 'endDate' => $endDate];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdSense_AdsenseReportsGenerateResponse");
    }
}

/**
 * The "saved" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $saved = $adsenseService->saved;
 *  </code>
 */
class Google_Service_AdSense_AccountsReportsSaved_Resource extends Google_Service_Resource
{

    /**
     * Generate an AdSense report based on the saved report ID sent in the query
     * parameters. (saved.generate)
     *
     * @param string $accountId Account to which the saved reports belong.
     * @param string $savedReportId The saved report to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale Optional locale to use for translating report output
     * to a local language. Defaults to "en_US" if not specified.
     * @opt_param int startIndex Index of the first row of report data to return.
     * @opt_param int maxResults The maximum number of rows of report data to
     * return.
     */
    public function generate($accountId, $savedReportId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'savedReportId' => $savedReportId];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdSense_AdsenseReportsGenerateResponse");
    }

    /**
     * List all saved reports in the specified AdSense account.
     * (saved.listAccountsReportsSaved)
     *
     * @param string $accountId Account to which the saved reports belong.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through saved
     * reports. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of saved reports to include in
     * the response, used for paging.
     */
    public function listAccountsReportsSaved($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_SavedReports");
    }
}

/**
 * The "savedadstyles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $savedadstyles = $adsenseService->savedadstyles;
 *  </code>
 */
class Google_Service_AdSense_AccountsSavedadstyles_Resource extends Google_Service_Resource
{

    /**
     * List a specific saved ad style for the specified account. (savedadstyles.get)
     *
     * @param string $accountId Account for which to get the saved ad style.
     * @param string $savedAdStyleId Saved ad style to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $savedAdStyleId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'savedAdStyleId' => $savedAdStyleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_SavedAdStyle");
    }

    /**
     * List all saved ad styles in the specified account.
     * (savedadstyles.listAccountsSavedadstyles)
     *
     * @param string $accountId Account for which to list saved ad styles.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through saved
     * ad styles. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of saved ad styles to include in
     * the response, used for paging.
     */
    public function listAccountsSavedadstyles($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_SavedAdStyles");
    }
}

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $urlchannels = $adsenseService->urlchannels;
 *  </code>
 */
class Google_Service_AdSense_AccountsUrlchannels_Resource extends Google_Service_Resource
{

    /**
     * List all URL channels in the specified ad client for the specified account.
     * (urlchannels.listAccountsUrlchannels)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client for which to list URL channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through URL
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of URL channels to include in
     * the response, used for paging.
     */
    public function listAccountsUrlchannels($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_UrlChannels");
    }
}

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adclients = $adsenseService->adclients;
 *  </code>
 */
class Google_Service_AdSense_Adclients_Resource extends Google_Service_Resource
{

    /**
     * List all ad clients in this AdSense account. (adclients.listAdclients)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through ad
     * clients. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of ad clients to include in the
     * response, used for paging.
     */
    public function listAdclients($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdClients");
    }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adunits = $adsenseService->adunits;
 *  </code>
 */
class Google_Service_AdSense_Adunits_Resource extends Google_Service_Resource
{

    /**
     * Gets the specified ad unit in the specified ad client. (adunits.get)
     *
     * @param string $adClientId Ad client for which to get the ad unit.
     * @param string $adUnitId Ad unit to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($adClientId, $adUnitId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_AdUnit");
    }

    /**
     * Get ad code for the specified ad unit. (adunits.getAdCode)
     *
     * @param string $adClientId Ad client with contains the ad unit.
     * @param string $adUnitId Ad unit to get the code for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getAdCode($adClientId, $adUnitId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('getAdCode', [$params], "Google_Service_AdSense_AdCode");
    }

    /**
     * List all ad units in the specified ad client for this AdSense account.
     * (adunits.listAdunits)
     *
     * @param string $adClientId Ad client for which to list ad units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeInactive Whether to include inactive ad units.
     * Default: true.
     * @opt_param string pageToken A continuation token, used to page through ad
     * units. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of ad units to include in the
     * response, used for paging.
     */
    public function listAdunits($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdUnits");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_AdSense_AdunitsCustomchannels_Resource extends Google_Service_Resource
{

    /**
     * List all custom channels which the specified ad unit belongs to.
     * (customchannels.listAdunitsCustomchannels)
     *
     * @param string $adClientId Ad client which contains the ad unit.
     * @param string $adUnitId Ad unit for which to list custom channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through custom
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of custom channels to include in
     * the response, used for paging.
     */
    public function listAdunitsCustomchannels($adClientId, $adUnitId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_CustomChannels");
    }
}

/**
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $alerts = $adsenseService->alerts;
 *  </code>
 */
class Google_Service_AdSense_Alerts_Resource extends Google_Service_Resource
{

    /**
     * Dismiss (delete) the specified alert from the publisher's AdSense account.
     * (alerts.delete)
     *
     * @param string $alertId Alert to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($alertId, $optParams = [])
    {
        $params = ['alertId' => $alertId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * List the alerts for this AdSense account. (alerts.listAlerts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale The locale to use for translating alert messages.
     * The account locale will be used if this is not supplied. The AdSense default
     * (English) will be used if the supplied locale is invalid or unsupported.
     */
    public function listAlerts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Alerts");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_AdSense_Customchannels_Resource extends Google_Service_Resource
{

    /**
     * Get the specified custom channel from the specified ad client.
     * (customchannels.get)
     *
     * @param string $adClientId Ad client which contains the custom channel.
     * @param string $customChannelId Custom channel to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($adClientId, $customChannelId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_CustomChannel");
    }

    /**
     * List all custom channels in the specified ad client for this AdSense account.
     * (customchannels.listCustomchannels)
     *
     * @param string $adClientId Ad client for which to list custom channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through custom
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of custom channels to include in
     * the response, used for paging.
     */
    public function listCustomchannels($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_CustomChannels");
    }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adunits = $adsenseService->adunits;
 *  </code>
 */
class Google_Service_AdSense_CustomchannelsAdunits_Resource extends Google_Service_Resource
{

    /**
     * List all ad units in the specified custom channel.
     * (adunits.listCustomchannelsAdunits)
     *
     * @param string $adClientId Ad client which contains the custom channel.
     * @param string $customChannelId Custom channel for which to list ad units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeInactive Whether to include inactive ad units.
     * Default: true.
     * @opt_param string pageToken A continuation token, used to page through ad
     * units. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of ad units to include in the
     * response, used for paging.
     */
    public function listCustomchannelsAdunits($adClientId, $customChannelId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_AdUnits");
    }
}

/**
 * The "metadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $metadata = $adsenseService->metadata;
 *  </code>
 */
class Google_Service_AdSense_Metadata_Resource extends Google_Service_Resource
{
}

/**
 * The "dimensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $dimensions = $adsenseService->dimensions;
 *  </code>
 */
class Google_Service_AdSense_MetadataDimensions_Resource extends Google_Service_Resource
{

    /**
     * List the metadata for the dimensions available to this AdSense account.
     * (dimensions.listMetadataDimensions)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listMetadataDimensions($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Metadata");
    }
}

/**
 * The "metrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $metrics = $adsenseService->metrics;
 *  </code>
 */
class Google_Service_AdSense_MetadataMetrics_Resource extends Google_Service_Resource
{

    /**
     * List the metadata for the metrics available to this AdSense account.
     * (metrics.listMetadataMetrics)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listMetadataMetrics($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Metadata");
    }
}

/**
 * The "payments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $payments = $adsenseService->payments;
 *  </code>
 */
class Google_Service_AdSense_Payments_Resource extends Google_Service_Resource
{

    /**
     * List the payments for this AdSense account. (payments.listPayments)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listPayments($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_Payments");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $reports = $adsenseService->reports;
 *  </code>
 */
class Google_Service_AdSense_Reports_Resource extends Google_Service_Resource
{

    /**
     * Generate an AdSense report based on the report request sent in the query
     * parameters. Returns the result as JSON; to retrieve output in CSV format
     * specify "alt=csv" as a query parameter. (reports.generate)
     *
     * @param string $startDate Start of the date range to report on in "YYYY-MM-DD"
     *                          format, inclusive.
     * @param string $endDate End of the date range to report on in "YYYY-MM-DD"
     *                          format, inclusive.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sort The name of a dimension or metric to sort the
     * resulting report on, optionally prefixed with "+" to sort ascending or "-" to
     * sort descending. If no prefix is specified, the column is sorted ascending.
     * @opt_param string locale Optional locale to use for translating report output
     * to a local language. Defaults to "en_US" if not specified.
     * @opt_param string metric Numeric columns to include in the report.
     * @opt_param int maxResults The maximum number of rows of report data to
     * return.
     * @opt_param string filter Filters to be run on the report.
     * @opt_param string currency Optional currency to use when reporting on
     * monetary metrics. Defaults to the account's currency if not set.
     * @opt_param int startIndex Index of the first row of report data to return.
     * @opt_param bool useTimezoneReporting Whether the report should be generated
     * in the AdSense account's local timezone. If false default PST/PDT timezone
     * will be used.
     * @opt_param string dimension Dimensions to base the report on.
     * @opt_param string accountId Accounts upon which to report.
     */
    public function generate($startDate, $endDate, $optParams = [])
    {
        $params = ['startDate' => $startDate, 'endDate' => $endDate];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdSense_AdsenseReportsGenerateResponse");
    }
}

/**
 * The "saved" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $saved = $adsenseService->saved;
 *  </code>
 */
class Google_Service_AdSense_ReportsSaved_Resource extends Google_Service_Resource
{

    /**
     * Generate an AdSense report based on the saved report ID sent in the query
     * parameters. (saved.generate)
     *
     * @param string $savedReportId The saved report to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string locale Optional locale to use for translating report output
     * to a local language. Defaults to "en_US" if not specified.
     * @opt_param int startIndex Index of the first row of report data to return.
     * @opt_param int maxResults The maximum number of rows of report data to
     * return.
     */
    public function generate($savedReportId, $optParams = [])
    {
        $params = ['savedReportId' => $savedReportId];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdSense_AdsenseReportsGenerateResponse");
    }

    /**
     * List all saved reports in this AdSense account. (saved.listReportsSaved)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through saved
     * reports. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of saved reports to include in
     * the response, used for paging.
     */
    public function listReportsSaved($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_SavedReports");
    }
}

/**
 * The "savedadstyles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $savedadstyles = $adsenseService->savedadstyles;
 *  </code>
 */
class Google_Service_AdSense_Savedadstyles_Resource extends Google_Service_Resource
{

    /**
     * Get a specific saved ad style from the user's account. (savedadstyles.get)
     *
     * @param string $savedAdStyleId Saved ad style to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($savedAdStyleId, $optParams = [])
    {
        $params = ['savedAdStyleId' => $savedAdStyleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSense_SavedAdStyle");
    }

    /**
     * List all saved ad styles in the user's account.
     * (savedadstyles.listSavedadstyles)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through saved
     * ad styles. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of saved ad styles to include in
     * the response, used for paging.
     */
    public function listSavedadstyles($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_SavedAdStyles");
    }
}

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $urlchannels = $adsenseService->urlchannels;
 *  </code>
 */
class Google_Service_AdSense_Urlchannels_Resource extends Google_Service_Resource
{

    /**
     * List all URL channels in the specified ad client for this AdSense account.
     * (urlchannels.listUrlchannels)
     *
     * @param string $adClientId Ad client for which to list URL channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through URL
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param int maxResults The maximum number of URL channels to include in
     * the response, used for paging.
     */
    public function listUrlchannels($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSense_UrlChannels");
    }
}


/**
 * Class Google_Service_AdSense_Account
 */
class Google_Service_AdSense_Account extends Google_Collection
{
    public $id;
    public $kind;
    public $name;
    public $premium;
    public $timezone;
    protected $collection_key = 'subAccounts';
    protected $internal_gapi_mappings = [];
    protected $subAccountsType = 'Google_Service_AdSense_Account';
    protected $subAccountsDataType = 'array';

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
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * @param $premium
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;
    }

    /**
     * @param $subAccounts
     */
    public function setSubAccounts($subAccounts)
    {
        $this->subAccounts = $subAccounts;
    }

    /**
     * @return mixed
     */
    public function getSubAccounts()
    {
        return $this->subAccounts;
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
}

/**
 * Class Google_Service_AdSense_Accounts
 */
class Google_Service_AdSense_Accounts extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_Account';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_AdClient
 */
class Google_Service_AdSense_AdClient extends Google_Model
{
    public $arcOptIn;
    public $arcReviewMode;
    public $id;
    public $kind;
    public $productCode;
    public $supportsReporting;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getArcOptIn()
    {
        return $this->arcOptIn;
    }

    /**
     * @param $arcOptIn
     */
    public function setArcOptIn($arcOptIn)
    {
        $this->arcOptIn = $arcOptIn;
    }

    /**
     * @return mixed
     */
    public function getArcReviewMode()
    {
        return $this->arcReviewMode;
    }

    /**
     * @param $arcReviewMode
     */
    public function setArcReviewMode($arcReviewMode)
    {
        $this->arcReviewMode = $arcReviewMode;
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
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return mixed
     */
    public function getSupportsReporting()
    {
        return $this->supportsReporting;
    }

    /**
     * @param $supportsReporting
     */
    public function setSupportsReporting($supportsReporting)
    {
        $this->supportsReporting = $supportsReporting;
    }
}

/**
 * Class Google_Service_AdSense_AdClients
 */
class Google_Service_AdSense_AdClients extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_AdClient';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_AdCode
 */
class Google_Service_AdSense_AdCode extends Google_Model
{
    public $adCode;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdCode()
    {
        return $this->adCode;
    }

    /**
     * @param $adCode
     */
    public function setAdCode($adCode)
    {
        $this->adCode = $adCode;
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
 * Class Google_Service_AdSense_AdStyle
 */
class Google_Service_AdSense_AdStyle extends Google_Model
{
    public $corners;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $colorsType = 'Google_Service_AdSense_AdStyleColors';
    protected $colorsDataType = '';
    protected $fontType = 'Google_Service_AdSense_AdStyleFont';
    protected $fontDataType = '';

    /**
     * @param Google_Service_AdSense_AdStyleColors $colors
     */
    public function setColors(Google_Service_AdSense_AdStyleColors $colors)
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
    public function getCorners()
    {
        return $this->corners;
    }

    /**
     * @param $corners
     */
    public function setCorners($corners)
    {
        $this->corners = $corners;
    }

    /**
     * @param Google_Service_AdSense_AdStyleFont $font
     */
    public function setFont(Google_Service_AdSense_AdStyleFont $font)
    {
        $this->font = $font;
    }

    /**
     * @return mixed
     */
    public function getFont()
    {
        return $this->font;
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
 * Class Google_Service_AdSense_AdStyleColors
 */
class Google_Service_AdSense_AdStyleColors extends Google_Model
{
    public $background;
    public $border;
    public $text;
    public $title;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * @return mixed
     */
    public function getBorder()
    {
        return $this->border;
    }

    /**
     * @param $border
     */
    public function setBorder($border)
    {
        $this->border = $border;
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
 * Class Google_Service_AdSense_AdStyleFont
 */
class Google_Service_AdSense_AdStyleFont extends Google_Model
{
    public $family;
    public $size;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
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
}

/**
 * Class Google_Service_AdSense_AdUnit
 */
class Google_Service_AdSense_AdUnit extends Google_Model
{
    public $code;
    public $id;
    public $kind;
    public $name;
    public $savedStyleId;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $contentAdsSettingsType = 'Google_Service_AdSense_AdUnitContentAdsSettings';
    protected $contentAdsSettingsDataType = '';
    protected $customStyleType = 'Google_Service_AdSense_AdStyle';
    protected $customStyleDataType = '';
    protected $feedAdsSettingsType = 'Google_Service_AdSense_AdUnitFeedAdsSettings';
    protected $feedAdsSettingsDataType = '';
    protected $mobileContentAdsSettingsType = 'Google_Service_AdSense_AdUnitMobileContentAdsSettings';
    protected $mobileContentAdsSettingsDataType = '';

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
     * @param Google_Service_AdSense_AdUnitContentAdsSettings $contentAdsSettings
     */
    public function setContentAdsSettings(Google_Service_AdSense_AdUnitContentAdsSettings $contentAdsSettings)
    {
        $this->contentAdsSettings = $contentAdsSettings;
    }

    /**
     * @return mixed
     */
    public function getContentAdsSettings()
    {
        return $this->contentAdsSettings;
    }

    /**
     * @param Google_Service_AdSense_AdStyle $customStyle
     */
    public function setCustomStyle(Google_Service_AdSense_AdStyle $customStyle)
    {
        $this->customStyle = $customStyle;
    }

    /**
     * @return mixed
     */
    public function getCustomStyle()
    {
        return $this->customStyle;
    }

    /**
     * @param Google_Service_AdSense_AdUnitFeedAdsSettings $feedAdsSettings
     */
    public function setFeedAdsSettings(Google_Service_AdSense_AdUnitFeedAdsSettings $feedAdsSettings)
    {
        $this->feedAdsSettings = $feedAdsSettings;
    }

    /**
     * @return mixed
     */
    public function getFeedAdsSettings()
    {
        return $this->feedAdsSettings;
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
     * @param Google_Service_AdSense_AdUnitMobileContentAdsSettings $mobileContentAdsSettings
     */
    public function setMobileContentAdsSettings(Google_Service_AdSense_AdUnitMobileContentAdsSettings $mobileContentAdsSettings)
    {
        $this->mobileContentAdsSettings = $mobileContentAdsSettings;
    }

    /**
     * @return mixed
     */
    public function getMobileContentAdsSettings()
    {
        return $this->mobileContentAdsSettings;
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
    public function getSavedStyleId()
    {
        return $this->savedStyleId;
    }

    /**
     * @param $savedStyleId
     */
    public function setSavedStyleId($savedStyleId)
    {
        $this->savedStyleId = $savedStyleId;
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
 * Class Google_Service_AdSense_AdUnitContentAdsSettings
 */
class Google_Service_AdSense_AdUnitContentAdsSettings extends Google_Model
{
    public $size;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $backupOptionType = 'Google_Service_AdSense_AdUnitContentAdsSettingsBackupOption';
    protected $backupOptionDataType = '';

    /**
     * @param Google_Service_AdSense_AdUnitContentAdsSettingsBackupOption $backupOption
     */
    public function setBackupOption(Google_Service_AdSense_AdUnitContentAdsSettingsBackupOption $backupOption)
    {
        $this->backupOption = $backupOption;
    }

    /**
     * @return mixed
     */
    public function getBackupOption()
    {
        return $this->backupOption;
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
 * Class Google_Service_AdSense_AdUnitContentAdsSettingsBackupOption
 */
class Google_Service_AdSense_AdUnitContentAdsSettingsBackupOption extends Google_Model
{
    public $color;
    public $type;
    public $url;
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
 * Class Google_Service_AdSense_AdUnitFeedAdsSettings
 */
class Google_Service_AdSense_AdUnitFeedAdsSettings extends Google_Model
{
    public $adPosition;
    public $frequency;
    public $minimumWordCount;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdPosition()
    {
        return $this->adPosition;
    }

    /**
     * @param $adPosition
     */
    public function setAdPosition($adPosition)
    {
        $this->adPosition = $adPosition;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @return mixed
     */
    public function getMinimumWordCount()
    {
        return $this->minimumWordCount;
    }

    /**
     * @param $minimumWordCount
     */
    public function setMinimumWordCount($minimumWordCount)
    {
        $this->minimumWordCount = $minimumWordCount;
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
 * Class Google_Service_AdSense_AdUnitMobileContentAdsSettings
 */
class Google_Service_AdSense_AdUnitMobileContentAdsSettings extends Google_Model
{
    public $markupLanguage;
    public $scriptingLanguage;
    public $size;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMarkupLanguage()
    {
        return $this->markupLanguage;
    }

    /**
     * @param $markupLanguage
     */
    public function setMarkupLanguage($markupLanguage)
    {
        $this->markupLanguage = $markupLanguage;
    }

    /**
     * @return mixed
     */
    public function getScriptingLanguage()
    {
        return $this->scriptingLanguage;
    }

    /**
     * @param $scriptingLanguage
     */
    public function setScriptingLanguage($scriptingLanguage)
    {
        $this->scriptingLanguage = $scriptingLanguage;
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
 * Class Google_Service_AdSense_AdUnits
 */
class Google_Service_AdSense_AdUnits extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_AdUnit';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_AdsenseReportsGenerateResponse
 */
class Google_Service_AdSense_AdsenseReportsGenerateResponse extends Google_Collection
{
    public $averages;
    public $endDate;
    public $kind;
    public $rows;
    public $startDate;
    public $totalMatchedRows;
    public $totals;
    public $warnings;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $headersType = 'Google_Service_AdSense_AdsenseReportsGenerateResponseHeaders';
    protected $headersDataType = 'array';

    /**
     * @return mixed
     */
    public function getAverages()
    {
        return $this->averages;
    }

    /**
     * @param $averages
     */
    public function setAverages($averages)
    {
        $this->averages = $averages;
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
     * @param $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
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
    public function getTotalMatchedRows()
    {
        return $this->totalMatchedRows;
    }

    /**
     * @param $totalMatchedRows
     */
    public function setTotalMatchedRows($totalMatchedRows)
    {
        $this->totalMatchedRows = $totalMatchedRows;
    }

    /**
     * @return mixed
     */
    public function getTotals()
    {
        return $this->totals;
    }

    /**
     * @param $totals
     */
    public function setTotals($totals)
    {
        $this->totals = $totals;
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
 * Class Google_Service_AdSense_AdsenseReportsGenerateResponseHeaders
 */
class Google_Service_AdSense_AdsenseReportsGenerateResponseHeaders extends Google_Model
{
    public $currency;
    public $name;
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_AdSense_Alert
 */
class Google_Service_AdSense_Alert extends Google_Model
{
    public $id;
    public $isDismissible;
    public $kind;
    public $message;
    public $severity;
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
    public function getIsDismissible()
    {
        return $this->isDismissible;
    }

    /**
     * @param $isDismissible
     */
    public function setIsDismissible($isDismissible)
    {
        $this->isDismissible = $isDismissible;
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
 * Class Google_Service_AdSense_Alerts
 */
class Google_Service_AdSense_Alerts extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_Alert';
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
 * Class Google_Service_AdSense_CustomChannel
 */
class Google_Service_AdSense_CustomChannel extends Google_Model
{
    public $code;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $targetingInfoType = 'Google_Service_AdSense_CustomChannelTargetingInfo';
    protected $targetingInfoDataType = '';

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
     * @param Google_Service_AdSense_CustomChannelTargetingInfo $targetingInfo
     */
    public function setTargetingInfo(Google_Service_AdSense_CustomChannelTargetingInfo $targetingInfo)
    {
        $this->targetingInfo = $targetingInfo;
    }

    /**
     * @return mixed
     */
    public function getTargetingInfo()
    {
        return $this->targetingInfo;
    }
}

/**
 * Class Google_Service_AdSense_CustomChannelTargetingInfo
 */
class Google_Service_AdSense_CustomChannelTargetingInfo extends Google_Model
{
    public $adsAppearOn;
    public $description;
    public $location;
    public $siteLanguage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdsAppearOn()
    {
        return $this->adsAppearOn;
    }

    /**
     * @param $adsAppearOn
     */
    public function setAdsAppearOn($adsAppearOn)
    {
        $this->adsAppearOn = $adsAppearOn;
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
    public function getSiteLanguage()
    {
        return $this->siteLanguage;
    }

    /**
     * @param $siteLanguage
     */
    public function setSiteLanguage($siteLanguage)
    {
        $this->siteLanguage = $siteLanguage;
    }
}

/**
 * Class Google_Service_AdSense_CustomChannels
 */
class Google_Service_AdSense_CustomChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_CustomChannel';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_Metadata
 */
class Google_Service_AdSense_Metadata extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_ReportingMetadataEntry';
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
 * Class Google_Service_AdSense_Payment
 */
class Google_Service_AdSense_Payment extends Google_Model
{
    public $id;
    public $kind;
    public $paymentAmount;
    public $paymentAmountCurrencyCode;
    public $paymentDate;
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
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmountCurrencyCode()
    {
        return $this->paymentAmountCurrencyCode;
    }

    /**
     * @param $paymentAmountCurrencyCode
     */
    public function setPaymentAmountCurrencyCode($paymentAmountCurrencyCode)
    {
        $this->paymentAmountCurrencyCode = $paymentAmountCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param $paymentDate
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }
}

/**
 * Class Google_Service_AdSense_Payments
 */
class Google_Service_AdSense_Payments extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_Payment';
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
 * Class Google_Service_AdSense_ReportingMetadataEntry
 */
class Google_Service_AdSense_ReportingMetadataEntry extends Google_Collection
{
    public $compatibleDimensions;
    public $compatibleMetrics;
    public $id;
    public $kind;
    public $requiredDimensions;
    public $requiredMetrics;
    public $supportedProducts;
    protected $collection_key = 'supportedProducts';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCompatibleDimensions()
    {
        return $this->compatibleDimensions;
    }

    /**
     * @param $compatibleDimensions
     */
    public function setCompatibleDimensions($compatibleDimensions)
    {
        $this->compatibleDimensions = $compatibleDimensions;
    }

    /**
     * @return mixed
     */
    public function getCompatibleMetrics()
    {
        return $this->compatibleMetrics;
    }

    /**
     * @param $compatibleMetrics
     */
    public function setCompatibleMetrics($compatibleMetrics)
    {
        $this->compatibleMetrics = $compatibleMetrics;
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
    public function getRequiredDimensions()
    {
        return $this->requiredDimensions;
    }

    /**
     * @param $requiredDimensions
     */
    public function setRequiredDimensions($requiredDimensions)
    {
        $this->requiredDimensions = $requiredDimensions;
    }

    /**
     * @return mixed
     */
    public function getRequiredMetrics()
    {
        return $this->requiredMetrics;
    }

    /**
     * @param $requiredMetrics
     */
    public function setRequiredMetrics($requiredMetrics)
    {
        $this->requiredMetrics = $requiredMetrics;
    }

    /**
     * @return mixed
     */
    public function getSupportedProducts()
    {
        return $this->supportedProducts;
    }

    /**
     * @param $supportedProducts
     */
    public function setSupportedProducts($supportedProducts)
    {
        $this->supportedProducts = $supportedProducts;
    }
}

/**
 * Class Google_Service_AdSense_SavedAdStyle
 */
class Google_Service_AdSense_SavedAdStyle extends Google_Model
{
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $adStyleType = 'Google_Service_AdSense_AdStyle';
    protected $adStyleDataType = '';

    /**
     * @param Google_Service_AdSense_AdStyle $adStyle
     */
    public function setAdStyle(Google_Service_AdSense_AdStyle $adStyle)
    {
        $this->adStyle = $adStyle;
    }

    /**
     * @return mixed
     */
    public function getAdStyle()
    {
        return $this->adStyle;
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
 * Class Google_Service_AdSense_SavedAdStyles
 */
class Google_Service_AdSense_SavedAdStyles extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_SavedAdStyle';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_SavedReport
 */
class Google_Service_AdSense_SavedReport extends Google_Model
{
    public $id;
    public $kind;
    public $name;
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
}

/**
 * Class Google_Service_AdSense_SavedReports
 */
class Google_Service_AdSense_SavedReports extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_SavedReport';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_AdSense_UrlChannel
 */
class Google_Service_AdSense_UrlChannel extends Google_Model
{
    public $id;
    public $kind;
    public $urlPattern;
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
    public function getUrlPattern()
    {
        return $this->urlPattern;
    }

    /**
     * @param $urlPattern
     */
    public function setUrlPattern($urlPattern)
    {
        $this->urlPattern = $urlPattern;
    }
}

/**
 * Class Google_Service_AdSense_UrlChannels
 */
class Google_Service_AdSense_UrlChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSense_UrlChannel';
    protected $itemsDataType = 'array';

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
