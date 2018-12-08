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
 * Service definition for AdSenseHost (v4.1).
 *
 * <p>
 * Gives AdSense Hosts access to report generation, ad code generation, and
 * publisher management capabilities.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/adsense/host/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdSenseHost extends Google_Service
{
    /** View and manage your AdSense host data and associated accounts. */
    const ADSENSEHOST =
        "https://www.googleapis.com/auth/adsensehost";

    public $accounts;
    public $accounts_adclients;
    public $accounts_adunits;
    public $accounts_reports;
    public $adclients;
    public $associationsessions;
    public $customchannels;
    public $reports;
    public $urlchannels;


    /**
     * Constructs the internal representation of the AdSenseHost service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'adsensehost/v4.1/';
        $this->version = 'v4.1';
        $this->serviceName = 'adsensehost';

        $this->accounts = new Google_Service_AdSenseHost_Accounts_Resource(
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
                            'filterAdClientId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_adclients = new Google_Service_AdSenseHost_AccountsAdclients_Resource(
            $this,
            $this->serviceName,
            'adclients',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}',
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
                        ],
                    ], 'list' => [
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
        $this->accounts_adunits = new Google_Service_AdSenseHost_AccountsAdunits_Resource(
            $this,
            $this->serviceName,
            'adunits',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits/{adUnitId}',
                        'httpMethod' => 'DELETE',
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
                    ], 'get' => [
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
                            'hostCustomChannelId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
                        'httpMethod' => 'POST',
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
                    ], 'patch' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
                        'httpMethod' => 'PATCH',
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
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{accountId}/adclients/{adClientId}/adunits',
                        'httpMethod' => 'PUT',
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
                        ],
                    ],
                ]
            ]
        );
        $this->accounts_reports = new Google_Service_AdSenseHost_AccountsReports_Resource(
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
        $this->adclients = new Google_Service_AdSenseHost_Adclients_Resource(
            $this,
            $this->serviceName,
            'adclients',
            [
                'methods' => [
                    'get' => [
                        'path' => 'adclients/{adClientId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
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
        $this->associationsessions = new Google_Service_AdSenseHost_Associationsessions_Resource(
            $this,
            $this->serviceName,
            'associationsessions',
            [
                'methods' => [
                    'start' => [
                        'path' => 'associationsessions/start',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'productCode' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                            'websiteUrl' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'websiteLocale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'userLocale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'verify' => [
                        'path' => 'associationsessions/verify',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'token' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->customchannels = new Google_Service_AdSenseHost_Customchannels_Resource(
            $this,
            $this->serviceName,
            'customchannels',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'adclients/{adClientId}/customchannels/{customChannelId}',
                        'httpMethod' => 'DELETE',
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
                    ], 'get' => [
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
                    ], 'insert' => [
                        'path' => 'adclients/{adClientId}/customchannels',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'adClientId' => [
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
                    ], 'patch' => [
                        'path' => 'adclients/{adClientId}/customchannels',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customChannelId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'adclients/{adClientId}/customchannels',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports = new Google_Service_AdSenseHost_Reports_Resource(
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
        $this->urlchannels = new Google_Service_AdSenseHost_Urlchannels_Resource(
            $this,
            $this->serviceName,
            'urlchannels',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'adclients/{adClientId}/urlchannels/{urlChannelId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'urlChannelId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'adclients/{adClientId}/urlchannels',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'adClientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
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
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $accounts = $adsensehostService->accounts;
 *  </code>
 */
class Google_Service_AdSenseHost_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Get information about the selected associated AdSense account. (accounts.get)
     *
     * @param string $accountId Account to get information about.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSenseHost_Account");
    }

    /**
     * List hosted accounts associated with this AdSense account by ad client id.
     * (accounts.listAccounts)
     *
     * @param string $filterAdClientId Ad clients to list accounts for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccounts($filterAdClientId, $optParams = [])
    {
        $params = ['filterAdClientId' => $filterAdClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSenseHost_Accounts");
    }
}

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $adclients = $adsensehostService->adclients;
 *  </code>
 */
class Google_Service_AdSenseHost_AccountsAdclients_Resource extends Google_Service_Resource
{

    /**
     * Get information about one of the ad clients in the specified publisher's
     * AdSense account. (adclients.get)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSenseHost_AdClient");
    }

    /**
     * List all hosted ad clients in the specified hosted account.
     * (adclients.listAccountsAdclients)
     *
     * @param string $accountId Account for which to list ad clients.
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

        return $this->call('list', [$params], "Google_Service_AdSenseHost_AdClients");
    }
}

/**
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $adunits = $adsensehostService->adunits;
 *  </code>
 */
class Google_Service_AdSenseHost_AccountsAdunits_Resource extends Google_Service_Resource
{

    /**
     * Delete the specified ad unit from the specified publisher AdSense account.
     * (adunits.delete)
     *
     * @param string $accountId Account which contains the ad unit.
     * @param string $adClientId Ad client for which to get ad unit.
     * @param string $adUnitId Ad unit to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_AdSenseHost_AdUnit");
    }

    /**
     * Get the specified host ad unit in this AdSense account. (adunits.get)
     *
     * @param string $accountId Account which contains the ad unit.
     * @param string $adClientId Ad client for which to get ad unit.
     * @param string $adUnitId Ad unit to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSenseHost_AdUnit");
    }

    /**
     * Get ad code for the specified ad unit, attaching the specified host custom
     * channels. (adunits.getAdCode)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client with contains the ad unit.
     * @param string $adUnitId Ad unit to get the code for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string hostCustomChannelId Host custom channel to attach to the ad
     * code.
     */
    public function getAdCode($accountId, $adClientId, $adUnitId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId];
        $params = array_merge($params, $optParams);

        return $this->call('getAdCode', [$params], "Google_Service_AdSenseHost_AdCode");
    }

    /**
     * Insert the supplied ad unit into the specified publisher AdSense account.
     * (adunits.insert)
     *
     * @param string $accountId Account which will contain the ad unit.
     * @param string $adClientId Ad client into which to insert the ad unit.
     * @param Google_AdUnit|Google_Service_AdSenseHost_AdUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, $adClientId, Google_Service_AdSenseHost_AdUnit $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_AdSenseHost_AdUnit");
    }

    /**
     * List all ad units in the specified publisher's AdSense account.
     * (adunits.listAccountsAdunits)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client for which to list ad units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeInactive Whether to include inactive ad units.
     * Default: true.
     * @opt_param string pageToken A continuation token, used to page through ad
     * units. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of ad units to include in the
     * response, used for paging.
     */
    public function listAccountsAdunits($accountId, $adClientId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSenseHost_AdUnits");
    }

    /**
     * Update the supplied ad unit in the specified publisher AdSense account. This
     * method supports patch semantics. (adunits.patch)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client which contains the ad unit.
     * @param string $adUnitId Ad unit to get.
     * @param Google_AdUnit|Google_Service_AdSenseHost_AdUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $adClientId, $adUnitId, Google_Service_AdSenseHost_AdUnit $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_AdSenseHost_AdUnit");
    }

    /**
     * Update the supplied ad unit in the specified publisher AdSense account.
     * (adunits.update)
     *
     * @param string $accountId Account which contains the ad client.
     * @param string $adClientId Ad client which contains the ad unit.
     * @param Google_AdUnit|Google_Service_AdSenseHost_AdUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $adClientId, Google_Service_AdSenseHost_AdUnit $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'adClientId' => $adClientId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AdSenseHost_AdUnit");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $reports = $adsensehostService->reports;
 *  </code>
 */
class Google_Service_AdSenseHost_AccountsReports_Resource extends Google_Service_Resource
{

    /**
     * Generate an AdSense report based on the report request sent in the query
     * parameters. Returns the result as JSON; to retrieve output in CSV format
     * specify "alt=csv" as a query parameter. (reports.generate)
     *
     * @param string $accountId Hosted account upon which to report.
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

        return $this->call('generate', [$params], "Google_Service_AdSenseHost_Report");
    }
}

/**
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $adclients = $adsensehostService->adclients;
 *  </code>
 */
class Google_Service_AdSenseHost_Adclients_Resource extends Google_Service_Resource
{

    /**
     * Get information about one of the ad clients in the Host AdSense account.
     * (adclients.get)
     *
     * @param string $adClientId Ad client to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSenseHost_AdClient");
    }

    /**
     * List all host ad clients in this AdSense account. (adclients.listAdclients)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through ad
     * clients. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of ad clients to include in
     * the response, used for paging.
     */
    public function listAdclients($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSenseHost_AdClients");
    }
}

/**
 * The "associationsessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $associationsessions = $adsensehostService->associationsessions;
 *  </code>
 */
class Google_Service_AdSenseHost_Associationsessions_Resource extends Google_Service_Resource
{

    /**
     * Create an association session for initiating an association with an AdSense
     * user. (associationsessions.start)
     *
     * @param string $productCode Products to associate with the user.
     * @param string $websiteUrl The URL of the user's hosted website.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string websiteLocale The locale of the user's hosted website.
     * @opt_param string userLocale The preferred locale of the user.
     */
    public function start($productCode, $websiteUrl, $optParams = [])
    {
        $params = ['productCode' => $productCode, 'websiteUrl' => $websiteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('start', [$params], "Google_Service_AdSenseHost_AssociationSession");
    }

    /**
     * Verify an association session after the association callback returns from
     * AdSense signup. (associationsessions.verify)
     *
     * @param string $token The token returned to the association callback URL.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function verify($token, $optParams = [])
    {
        $params = ['token' => $token];
        $params = array_merge($params, $optParams);

        return $this->call('verify', [$params], "Google_Service_AdSenseHost_AssociationSession");
    }
}

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $customchannels = $adsensehostService->customchannels;
 *  </code>
 */
class Google_Service_AdSenseHost_Customchannels_Resource extends Google_Service_Resource
{

    /**
     * Delete a specific custom channel from the host AdSense account.
     * (customchannels.delete)
     *
     * @param string $adClientId Ad client from which to delete the custom channel.
     * @param string $customChannelId Custom channel to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($adClientId, $customChannelId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_AdSenseHost_CustomChannel");
    }

    /**
     * Get a specific custom channel from the host AdSense account.
     * (customchannels.get)
     *
     * @param string $adClientId Ad client from which to get the custom channel.
     * @param string $customChannelId Custom channel to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($adClientId, $customChannelId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdSenseHost_CustomChannel");
    }

    /**
     * Add a new custom channel to the host AdSense account. (customchannels.insert)
     *
     * @param string $adClientId Ad client to which the new custom channel will be
     *                                                                                  added.
     * @param Google_CustomChannel|Google_Service_AdSenseHost_CustomChannel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($adClientId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_AdSenseHost_CustomChannel");
    }

    /**
     * List all host custom channels in this AdSense account.
     * (customchannels.listCustomchannels)
     *
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
    public function listCustomchannels($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSenseHost_CustomChannels");
    }

    /**
     * Update a custom channel in the host AdSense account. This method supports
     * patch semantics. (customchannels.patch)
     *
     * @param string $adClientId Ad client in which the custom channel will be
     *                                                                                       updated.
     * @param string $customChannelId Custom channel to get.
     * @param Google_CustomChannel|Google_Service_AdSenseHost_CustomChannel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($adClientId, $customChannelId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_AdSenseHost_CustomChannel");
    }

    /**
     * Update a custom channel in the host AdSense account. (customchannels.update)
     *
     * @param string $adClientId Ad client in which the custom channel will be
     *                                                                                  updated.
     * @param Google_CustomChannel|Google_Service_AdSenseHost_CustomChannel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($adClientId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AdSenseHost_CustomChannel");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $reports = $adsensehostService->reports;
 *  </code>
 */
class Google_Service_AdSenseHost_Reports_Resource extends Google_Service_Resource
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
     * @opt_param string maxResults The maximum number of rows of report data to
     * return.
     * @opt_param string filter Filters to be run on the report.
     * @opt_param string startIndex Index of the first row of report data to return.
     * @opt_param string dimension Dimensions to base the report on.
     */
    public function generate($startDate, $endDate, $optParams = [])
    {
        $params = ['startDate' => $startDate, 'endDate' => $endDate];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_AdSenseHost_Report");
    }
}

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $urlchannels = $adsensehostService->urlchannels;
 *  </code>
 */
class Google_Service_AdSenseHost_Urlchannels_Resource extends Google_Service_Resource
{

    /**
     * Delete a URL channel from the host AdSense account. (urlchannels.delete)
     *
     * @param string $adClientId Ad client from which to delete the URL channel.
     * @param string $urlChannelId URL channel to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($adClientId, $urlChannelId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'urlChannelId' => $urlChannelId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_AdSenseHost_UrlChannel");
    }

    /**
     * Add a new URL channel to the host AdSense account. (urlchannels.insert)
     *
     * @param string $adClientId Ad client to which the new URL channel will be
     *                                                                            added.
     * @param Google_Service_AdSenseHost_UrlChannel|Google_UrlChannel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($adClientId, Google_Service_AdSenseHost_UrlChannel $postBody, $optParams = [])
    {
        $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_AdSenseHost_UrlChannel");
    }

    /**
     * List all host URL channels in the host AdSense account.
     * (urlchannels.listUrlchannels)
     *
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
    public function listUrlchannels($adClientId, $optParams = [])
    {
        $params = ['adClientId' => $adClientId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdSenseHost_UrlChannels");
    }
}


/**
 * Class Google_Service_AdSenseHost_Account
 */
class Google_Service_AdSenseHost_Account extends Google_Model
{
    public $id;
    public $kind;
    public $name;
    public $status;
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
 * Class Google_Service_AdSenseHost_Accounts
 */
class Google_Service_AdSenseHost_Accounts extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSenseHost_Account';
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
}

/**
 * Class Google_Service_AdSenseHost_AdClient
 */
class Google_Service_AdSenseHost_AdClient extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdClients
 */
class Google_Service_AdSenseHost_AdClients extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSenseHost_AdClient';
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
 * Class Google_Service_AdSenseHost_AdCode
 */
class Google_Service_AdSenseHost_AdCode extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdStyle
 */
class Google_Service_AdSenseHost_AdStyle extends Google_Model
{
    public $corners;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $colorsType = 'Google_Service_AdSenseHost_AdStyleColors';
    protected $colorsDataType = '';
    protected $fontType = 'Google_Service_AdSenseHost_AdStyleFont';
    protected $fontDataType = '';

    /**
     * @param Google_Service_AdSenseHost_AdStyleColors $colors
     */
    public function setColors(Google_Service_AdSenseHost_AdStyleColors $colors)
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
     * @param Google_Service_AdSenseHost_AdStyleFont $font
     */
    public function setFont(Google_Service_AdSenseHost_AdStyleFont $font)
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
 * Class Google_Service_AdSenseHost_AdStyleColors
 */
class Google_Service_AdSenseHost_AdStyleColors extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdStyleFont
 */
class Google_Service_AdSenseHost_AdStyleFont extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdUnit
 */
class Google_Service_AdSenseHost_AdUnit extends Google_Model
{
    public $code;
    public $id;
    public $kind;
    public $name;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $contentAdsSettingsType = 'Google_Service_AdSenseHost_AdUnitContentAdsSettings';
    protected $contentAdsSettingsDataType = '';
    protected $customStyleType = 'Google_Service_AdSenseHost_AdStyle';
    protected $customStyleDataType = '';
    protected $mobileContentAdsSettingsType = 'Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings';
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
     * @param Google_Service_AdSenseHost_AdUnitContentAdsSettings $contentAdsSettings
     */
    public function setContentAdsSettings(Google_Service_AdSenseHost_AdUnitContentAdsSettings $contentAdsSettings)
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
     * @param Google_Service_AdSenseHost_AdStyle $customStyle
     */
    public function setCustomStyle(Google_Service_AdSenseHost_AdStyle $customStyle)
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
     * @param Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings $mobileContentAdsSettings
     */
    public function setMobileContentAdsSettings(Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings $mobileContentAdsSettings)
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
 * Class Google_Service_AdSenseHost_AdUnitContentAdsSettings
 */
class Google_Service_AdSenseHost_AdUnitContentAdsSettings extends Google_Model
{
    public $size;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $backupOptionType = 'Google_Service_AdSenseHost_AdUnitContentAdsSettingsBackupOption';
    protected $backupOptionDataType = '';

    /**
     * @param Google_Service_AdSenseHost_AdUnitContentAdsSettingsBackupOption $backupOption
     */
    public function setBackupOption(Google_Service_AdSenseHost_AdUnitContentAdsSettingsBackupOption $backupOption)
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
 * Class Google_Service_AdSenseHost_AdUnitContentAdsSettingsBackupOption
 */
class Google_Service_AdSenseHost_AdUnitContentAdsSettingsBackupOption extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings
 */
class Google_Service_AdSenseHost_AdUnitMobileContentAdsSettings extends Google_Model
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
 * Class Google_Service_AdSenseHost_AdUnits
 */
class Google_Service_AdSenseHost_AdUnits extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSenseHost_AdUnit';
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
 * Class Google_Service_AdSenseHost_AssociationSession
 */
class Google_Service_AdSenseHost_AssociationSession extends Google_Collection
{
    public $accountId;
    public $id;
    public $kind;
    public $productCodes;
    public $redirectUrl;
    public $status;
    public $userLocale;
    public $websiteLocale;
    public $websiteUrl;
    protected $collection_key = 'productCodes';
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
    public function getProductCodes()
    {
        return $this->productCodes;
    }

    /**
     * @param $productCodes
     */
    public function setProductCodes($productCodes)
    {
        $this->productCodes = $productCodes;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
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
    public function getUserLocale()
    {
        return $this->userLocale;
    }

    /**
     * @param $userLocale
     */
    public function setUserLocale($userLocale)
    {
        $this->userLocale = $userLocale;
    }

    /**
     * @return mixed
     */
    public function getWebsiteLocale()
    {
        return $this->websiteLocale;
    }

    /**
     * @param $websiteLocale
     */
    public function setWebsiteLocale($websiteLocale)
    {
        $this->websiteLocale = $websiteLocale;
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
 * Class Google_Service_AdSenseHost_CustomChannel
 */
class Google_Service_AdSenseHost_CustomChannel extends Google_Model
{
    public $code;
    public $id;
    public $kind;
    public $name;
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
 * Class Google_Service_AdSenseHost_CustomChannels
 */
class Google_Service_AdSenseHost_CustomChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSenseHost_CustomChannel';
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
 * Class Google_Service_AdSenseHost_Report
 */
class Google_Service_AdSenseHost_Report extends Google_Collection
{
    public $averages;
    public $kind;
    public $rows;
    public $totalMatchedRows;
    public $totals;
    public $warnings;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $headersType = 'Google_Service_AdSenseHost_ReportHeaders';
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
 * Class Google_Service_AdSenseHost_ReportHeaders
 */
class Google_Service_AdSenseHost_ReportHeaders extends Google_Model
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
 * Class Google_Service_AdSenseHost_UrlChannel
 */
class Google_Service_AdSenseHost_UrlChannel extends Google_Model
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
 * Class Google_Service_AdSenseHost_UrlChannels
 */
class Google_Service_AdSenseHost_UrlChannels extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdSenseHost_UrlChannel';
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
