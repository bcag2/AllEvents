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
 * Service definition for AdExchangeSeller (v2.0).
 *
 * <p>
 * Gives Ad Exchange seller users access to their inventory and the ability to
 * generate reports</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/seller-rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeSeller extends Google_Service
{
    /** View and manage your Ad Exchange data. */
    const ADEXCHANGE_SELLER =
        "https://www.googleapis.com/auth/adexchange.seller";
    /** View your Ad Exchange data. */
    const ADEXCHANGE_SELLER_READONLY =
        "https://www.googleapis.com/auth/adexchange.seller.readonly";

    public $accounts;
    public $accounts_adclients;
    public $accounts_alerts;
    public $accounts_customchannels;
    public $accounts_metadata_dimensions;
    public $accounts_metadata_metrics;
    public $accounts_preferreddeals;
    public $accounts_reports;
    public $accounts_reports_saved;
    public $accounts_urlchannels;


    /**
     * Constructs the internal representation of the AdExchangeSeller service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'adexchangeseller/v2.0/';
        $this->version = 'v2.0';
        $this->serviceName = 'adexchangeseller';

        $this->accounts = new Google_Service_AdExchangeSeller_Accounts_Resource(
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
        $this->accounts_adclients = new Google_Service_AdExchangeSeller_AccountsAdclients_Resource(
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
        $this->accounts_alerts = new Google_Service_AdExchangeSeller_AccountsAlerts_Resource(
            $this,
            $this->serviceName,
            'alerts',
            [
                'methods' => [
                    'list' => [
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
        $this->accounts_customchannels = new Google_Service_AdExchangeSeller_AccountsCustomchannels_Resource(
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
        $this->accounts_metadata_dimensions = new Google_Service_AdExchangeSeller_AccountsMetadataDimensions_Resource(
            $this,
            $this->serviceName,
            'dimensions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/metadata/dimensions',
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
        $this->accounts_metadata_metrics = new Google_Service_AdExchangeSeller_AccountsMetadataMetrics_Resource(
            $this,
            $this->serviceName,
            'metrics',
            [
                'methods' => [
                    'list' => [
                        'path' => 'accounts/{accountId}/metadata/metrics',
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
        $this->accounts_preferreddeals = new Google_Service_AdExchangeSeller_AccountsPreferreddeals_Resource(
            $this,
            $this->serviceName,
            'preferreddeals',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}/preferreddeals/{dealId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dealId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts/{accountId}/preferreddeals',
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
        $this->accounts_reports = new Google_Service_AdExchangeSeller_AccountsReports_Resource(
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
                            'startIndex' => [
                                'location' => 'query',
                                'type' => 'integer',
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
        $this->accounts_reports_saved = new Google_Service_AdExchangeSeller_AccountsReportsSaved_Resource(
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
        $this->accounts_urlchannels = new Google_Service_AdExchangeSeller_AccountsUrlchannels_Resource(
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
    }
}


/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $accounts = $adexchangesellerService->accounts;
 *  </code>
 */
class Google_Service_AdExchangeSeller_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Get information about the selected Ad Exchange account. (accounts.get)
     *
     * @param string $accountId Account to get information about. Tip: 'myaccount'
     *                          is a valid ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeSeller_Account");
    }

    /**
     * List all accounts available to this Ad Exchange account.
     * (accounts.listAccounts)
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

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_Accounts");
    }
}

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $adclients = $adexchangesellerService->adclients;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsAdclients_Resource extends Google_Service_Resource
{

    /**
     * List all ad clients in this Ad Exchange account.
     * (adclients.listAccountsAdclients)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through ad
     * clients. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of ad clients to include in
     * the response, used for paging.
     */
    public function listAccountsAdclients($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_AdClients");
    }
}

/**
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $alerts = $adexchangesellerService->alerts;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsAlerts_Resource extends Google_Service_Resource
{

    /**
     * List the alerts for this Ad Exchange account. (alerts.listAccountsAlerts)
     *
     * @param string $accountId Account owning the alerts.
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

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_Alerts");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $customchannels = $adexchangesellerService->customchannels;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsCustomchannels_Resource extends Google_Service_Resource
{

    /**
     * Get the specified custom channel from the specified ad client.
     * (customchannels.get)
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

        return $this->call('get', [$params], "Google_Service_AdExchangeSeller_CustomChannel");
    }

    /**
     * List all custom channels in the specified ad client for this Ad Exchange
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
     * @opt_param string maxResults The maximum number of custom channels to include
     * in the response, used for paging.
     */
    public function listAccountsCustomchannels($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_CustomChannels");
    }
}

/**
 * The "metadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $metadata = $adexchangesellerService->metadata;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsMetadata_Resource extends Google_Service_Resource
{
}

/**
 * The "dimensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $dimensions = $adexchangesellerService->dimensions;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsMetadataDimensions_Resource extends Google_Service_Resource
{

    /**
     * List the metadata for the dimensions available to this AdExchange account.
     * (dimensions.listAccountsMetadataDimensions)
     *
     * @param string $accountId Account with visibility to the dimensions.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccountsMetadataDimensions($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_Metadata");
    }
}

/**
 * The "metrics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $metrics = $adexchangesellerService->metrics;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsMetadataMetrics_Resource extends Google_Service_Resource
{

    /**
     * List the metadata for the metrics available to this AdExchange account.
     * (metrics.listAccountsMetadataMetrics)
     *
     * @param string $accountId Account with visibility to the metrics.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccountsMetadataMetrics($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_Metadata");
    }
}

/**
 * The "preferreddeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $preferreddeals = $adexchangesellerService->preferreddeals;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsPreferreddeals_Resource extends Google_Service_Resource
{

    /**
     * Get information about the selected Ad Exchange Preferred Deal.
     * (preferreddeals.get)
     *
     * @param string $accountId Account owning the deal.
     * @param string $dealId Preferred deal to get information about.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $dealId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'dealId' => $dealId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeSeller_PreferredDeal");
    }

    /**
     * List the preferred deals for this Ad Exchange account.
     * (preferreddeals.listAccountsPreferreddeals)
     *
     * @param string $accountId Account owning the deals.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccountsPreferreddeals($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_PreferredDeals");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $reports = $adexchangesellerService->reports;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsReports_Resource extends Google_Service_Resource
{

    /**
     * Generate an Ad Exchange report based on the report request sent in the query
     * parameters. Returns the result as JSON; to retrieve output in CSV format
     * specify "alt=csv" as a query parameter. (reports.generate)
     *
     * @param string $accountId Account which owns the generated report.
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
     * @opt_param string maxResults The maximum number of rows of report data to
     * return.
     * @opt_param string filter Filters to be run on the report.
     * @opt_param string startIndex Index of the first row of report data to return.
     * @opt_param string dimension Dimensions to base the report on.
     */
    public function generate($accountId, $startDate, $endDate, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'startDate' => $startDate, 'endDate' => $endDate];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdExchangeSeller_Report");
    }
}

/**
 * The "saved" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $saved = $adexchangesellerService->saved;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsReportsSaved_Resource extends Google_Service_Resource
{

    /**
     * Generate an Ad Exchange report based on the saved report ID sent in the query
     * parameters. (saved.generate)
     *
     * @param string $accountId Account owning the saved report.
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

        return $this->call('generate', [$params], "Google_Service_AdExchangeSeller_Report");
    }

    /**
     * List all saved reports in this Ad Exchange account.
     * (saved.listAccountsReportsSaved)
     *
     * @param string $accountId Account owning the saved reports.
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

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_SavedReports");
    }
}

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangesellerService = new Google_Service_AdExchangeSeller(...);
 *   $urlchannels = $adexchangesellerService->urlchannels;
 *  </code>
 */
class Google_Service_AdExchangeSeller_AccountsUrlchannels_Resource extends Google_Service_Resource
{

    /**
     * List all URL channels in the specified ad client for this Ad Exchange
     * account. (urlchannels.listAccountsUrlchannels)
     *
     * @param string $accountId Account to which the ad client belongs.
     * @param string $adClientId Ad client for which to list URL channels.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through URL
     * channels. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of URL channels to include in
     * the response, used for paging.
     */
    public function listAccountsUrlchannels($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeSeller_UrlChannels");
    }
}


/**
 * Class Google_Service_AdExchangeSeller_Account
 */
class Google_Service_AdExchangeSeller_Account extends Google_Model
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
 * Class Google_Service_AdExchangeSeller_Accounts
 */
class Google_Service_AdExchangeSeller_Accounts extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_Account';
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
 * Class Google_Service_AdExchangeSeller_AdClient
 */
class Google_Service_AdExchangeSeller_AdClient extends Google_Model
{
    public $arcOptIn;
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
 * Class Google_Service_AdExchangeSeller_AdClients
 */
class Google_Service_AdExchangeSeller_AdClients extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_AdClient';
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
 * Class Google_Service_AdExchangeSeller_Alert
 */
class Google_Service_AdExchangeSeller_Alert extends Google_Model
{
    public $id;
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
 * Class Google_Service_AdExchangeSeller_Alerts
 */
class Google_Service_AdExchangeSeller_Alerts extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_Alert';
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
 * Class Google_Service_AdExchangeSeller_CustomChannel
 */
class Google_Service_AdExchangeSeller_CustomChannel extends Google_Model
{
    public $code;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $targetingInfoType = 'Google_Service_AdExchangeSeller_CustomChannelTargetingInfo';
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
     * @param Google_Service_AdExchangeSeller_CustomChannelTargetingInfo $targetingInfo
     */
    public function setTargetingInfo(Google_Service_AdExchangeSeller_CustomChannelTargetingInfo $targetingInfo)
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
 * Class Google_Service_AdExchangeSeller_CustomChannelTargetingInfo
 */
class Google_Service_AdExchangeSeller_CustomChannelTargetingInfo extends Google_Model
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
 * Class Google_Service_AdExchangeSeller_CustomChannels
 */
class Google_Service_AdExchangeSeller_CustomChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_CustomChannel';
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
 * Class Google_Service_AdExchangeSeller_Metadata
 */
class Google_Service_AdExchangeSeller_Metadata extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_ReportingMetadataEntry';
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
 * Class Google_Service_AdExchangeSeller_PreferredDeal
 */
class Google_Service_AdExchangeSeller_PreferredDeal extends Google_Model
{
    public $advertiserName;
    public $buyerNetworkName;
    public $currencyCode;
    public $endTime;
    public $fixedCpm;
    public $id;
    public $kind;
    public $startTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdvertiserName()
    {
        return $this->advertiserName;
    }

    /**
     * @param $advertiserName
     */
    public function setAdvertiserName($advertiserName)
    {
        $this->advertiserName = $advertiserName;
    }

    /**
     * @return mixed
     */
    public function getBuyerNetworkName()
    {
        return $this->buyerNetworkName;
    }

    /**
     * @param $buyerNetworkName
     */
    public function setBuyerNetworkName($buyerNetworkName)
    {
        $this->buyerNetworkName = $buyerNetworkName;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
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
    public function getFixedCpm()
    {
        return $this->fixedCpm;
    }

    /**
     * @param $fixedCpm
     */
    public function setFixedCpm($fixedCpm)
    {
        $this->fixedCpm = $fixedCpm;
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
 * Class Google_Service_AdExchangeSeller_PreferredDeals
 */
class Google_Service_AdExchangeSeller_PreferredDeals extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_PreferredDeal';
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
 * Class Google_Service_AdExchangeSeller_Report
 */
class Google_Service_AdExchangeSeller_Report extends Google_Collection
{
    public $averages;
    public $kind;
    public $rows;
    public $totalMatchedRows;
    public $totals;
    public $warnings;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $headersType = 'Google_Service_AdExchangeSeller_ReportHeaders';
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
 * Class Google_Service_AdExchangeSeller_ReportHeaders
 */
class Google_Service_AdExchangeSeller_ReportHeaders extends Google_Model
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
 * Class Google_Service_AdExchangeSeller_ReportingMetadataEntry
 */
class Google_Service_AdExchangeSeller_ReportingMetadataEntry extends Google_Collection
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
 * Class Google_Service_AdExchangeSeller_SavedReport
 */
class Google_Service_AdExchangeSeller_SavedReport extends Google_Model
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
 * Class Google_Service_AdExchangeSeller_SavedReports
 */
class Google_Service_AdExchangeSeller_SavedReports extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_SavedReport';
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
 * Class Google_Service_AdExchangeSeller_UrlChannel
 */
class Google_Service_AdExchangeSeller_UrlChannel extends Google_Model
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
 * Class Google_Service_AdExchangeSeller_UrlChannels
 */
class Google_Service_AdExchangeSeller_UrlChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeSeller_UrlChannel';
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
