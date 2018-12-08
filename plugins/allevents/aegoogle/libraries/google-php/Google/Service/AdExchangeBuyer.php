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
 * Service definition for AdExchangeBuyer (v1.3).
 *
 * <p>
 * Accesses your bidding-account information, submits creatives for validation,
 * finds available direct deals, and retrieves performance reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AdExchangeBuyer extends Google_Service
{
    /** Manage your Ad Exchange buyer account configuration. */
    const ADEXCHANGE_BUYER =
        "https://www.googleapis.com/auth/adexchange.buyer";

    public $accounts;
    public $billingInfo;
    public $budget;
    public $creatives;
    public $directDeals;
    public $performanceReport;
    public $pretargetingConfig;


    /**
     * Constructs the internal representation of the AdExchangeBuyer service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'adexchangebuyer/v1.3/';
        $this->version = 'v1.3';
        $this->serviceName = 'adexchangebuyer';

        $this->accounts = new Google_Service_AdExchangeBuyer_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'get' => [
                        'path' => 'accounts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'accounts',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'accounts/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'accounts/{id}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->billingInfo = new Google_Service_AdExchangeBuyer_BillingInfo_Resource(
            $this,
            $this->serviceName,
            'billingInfo',
            [
                'methods' => [
                    'get' => [
                        'path' => 'billinginfo/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'billinginfo',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->budget = new Google_Service_AdExchangeBuyer_Budget_Resource(
            $this,
            $this->serviceName,
            'budget',
            [
                'methods' => [
                    'get' => [
                        'path' => 'billinginfo/{accountId}/{billingId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'billingId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'billinginfo/{accountId}/{billingId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'billingId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'billinginfo/{accountId}/{billingId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'billingId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creatives = new Google_Service_AdExchangeBuyer_Creatives_Resource(
            $this,
            $this->serviceName,
            'creatives',
            [
                'methods' => [
                    'get' => [
                        'path' => 'creatives/{accountId}/{buyerCreativeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'buyerCreativeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'creatives',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'creatives',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'statusFilter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'buyerCreativeId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'accountId' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->directDeals = new Google_Service_AdExchangeBuyer_DirectDeals_Resource(
            $this,
            $this->serviceName,
            'directDeals',
            [
                'methods' => [
                    'get' => [
                        'path' => 'directdeals/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'directdeals',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->performanceReport = new Google_Service_AdExchangeBuyer_PerformanceReport_Resource(
            $this,
            $this->serviceName,
            'performanceReport',
            [
                'methods' => [
                    'list' => [
                        'path' => 'performancereport',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'endDateTime' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startDateTime' => [
                                'location' => 'query',
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
        $this->pretargetingConfig = new Google_Service_AdExchangeBuyer_PretargetingConfig_Resource(
            $this,
            $this->serviceName,
            'pretargetingConfig',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'pretargetingconfigs/{accountId}/{configId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'configId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'pretargetingconfigs/{accountId}/{configId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'configId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'pretargetingconfigs/{accountId}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'pretargetingconfigs/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'pretargetingconfigs/{accountId}/{configId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'configId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'pretargetingconfigs/{accountId}/{configId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'configId' => [
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
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $accounts = $adexchangebuyerService->accounts;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Gets one account by ID. (accounts.get)
     *
     * @param int $id The account id
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_Account");
    }

    /**
     * Retrieves the authenticated user's list of accounts. (accounts.listAccounts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAccounts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_AccountsList");
    }

    /**
     * Updates an existing account. This method supports patch semantics.
     * (accounts.patch)
     *
     * @param int $id The account id
     * @param Google_Account|Google_Service_AdExchangeBuyer_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_AdExchangeBuyer_Account");
    }

    /**
     * Updates an existing account. (accounts.update)
     *
     * @param int $id The account id
     * @param Google_Account|Google_Service_AdExchangeBuyer_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($id, Google_Service_AdExchangeBuyer_Account $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AdExchangeBuyer_Account");
    }
}

/**
 * The "billingInfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $billingInfo = $adexchangebuyerService->billingInfo;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_BillingInfo_Resource extends Google_Service_Resource
{

    /**
     * Returns the billing information for one account specified by account ID.
     * (billingInfo.get)
     *
     * @param int $accountId The account id.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_BillingInfo");
    }

    /**
     * Retrieves a list of billing information for all accounts of the authenticated
     * user. (billingInfo.listBillingInfo)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listBillingInfo($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_BillingInfoList");
    }
}

/**
 * The "budget" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $budget = $adexchangebuyerService->budget;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Budget_Resource extends Google_Service_Resource
{

    /**
     * Returns the budget information for the adgroup specified by the accountId and
     * billingId. (budget.get)
     *
     * @param string $accountId The account id to get the budget information for.
     * @param string $billingId The billing id to get the budget information for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($accountId, $billingId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'billingId' => $billingId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_Budget");
    }

    /**
     * Updates the budget amount for the budget of the adgroup specified by the
     * accountId and billingId, with the budget amount in the request. This method
     * supports patch semantics. (budget.patch)
     *
     * @param string $accountId The account id associated with the budget being
     *                                                                       updated.
     * @param string $billingId The billing id associated with the budget being
     *                                                                       updated.
     * @param Google_Budget|Google_Service_AdExchangeBuyer_Budget $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($accountId, $billingId, Google_Service_AdExchangeBuyer_Budget $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'billingId' => $billingId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_AdExchangeBuyer_Budget");
    }

    /**
     * Updates the budget amount for the budget of the adgroup specified by the
     * accountId and billingId, with the budget amount in the request.
     * (budget.update)
     *
     * @param string $accountId The account id associated with the budget being
     *                                                                       updated.
     * @param string $billingId The billing id associated with the budget being
     *                                                                       updated.
     * @param Google_Budget|Google_Service_AdExchangeBuyer_Budget $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($accountId, $billingId, Google_Service_AdExchangeBuyer_Budget $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'billingId' => $billingId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AdExchangeBuyer_Budget");
    }
}

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $creatives = $adexchangebuyerService->creatives;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Creatives_Resource extends Google_Service_Resource
{

    /**
     * Gets the status for a single creative. A creative will be available 30-40
     * minutes after submission. (creatives.get)
     *
     * @param int $accountId The id for the account that will serve this creative.
     * @param string $buyerCreativeId The buyer-specific id for this creative.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $buyerCreativeId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'buyerCreativeId' => $buyerCreativeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_Creative");
    }

    /**
     * Submit a new creative. (creatives.insert)
     *
     * @param Google_Creative|Google_Service_AdExchangeBuyer_Creative $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_AdExchangeBuyer_Creative $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_AdExchangeBuyer_Creative");
    }

    /**
     * Retrieves a list of the authenticated user's active creatives. A creative
     * will be available 30-40 minutes after submission. (creatives.listCreatives)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string statusFilter When specified, only creatives having the
     * given status are returned.
     * @opt_param string pageToken A continuation token, used to page through ad
     * clients. To retrieve the next page, set this parameter to the value of
     * "nextPageToken" from the previous response. Optional.
     * @opt_param string maxResults Maximum number of entries returned on one result
     * page. If not set, the default is 100. Optional.
     * @opt_param string buyerCreativeId When specified, only creatives for the
     * given buyer creative ids are returned.
     * @opt_param int accountId When specified, only creatives for the given account
     * ids are returned.
     */
    public function listCreatives($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_CreativesList");
    }
}

/**
 * The "directDeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $directDeals = $adexchangebuyerService->directDeals;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_DirectDeals_Resource extends Google_Service_Resource
{

    /**
     * Gets one direct deal by ID. (directDeals.get)
     *
     * @param string $id The direct deal id
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_DirectDeal");
    }

    /**
     * Retrieves the authenticated user's list of direct deals.
     * (directDeals.listDirectDeals)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listDirectDeals($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_DirectDealsList");
    }
}

/**
 * The "performanceReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $performanceReport = $adexchangebuyerService->performanceReport;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_PerformanceReport_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the authenticated user's list of performance metrics.
     * (performanceReport.listPerformanceReport)
     *
     * @param string $accountId The account id to get the reports.
     * @param string $endDateTime The end time of the report in ISO 8601 timestamp
     *                              format using UTC.
     * @param string $startDateTime The start time of the report in ISO 8601
     *                              timestamp format using UTC.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken A continuation token, used to page through
     * performance reports. To retrieve the next page, set this parameter to the
     * value of "nextPageToken" from the previous response. Optional.
     * @opt_param string maxResults Maximum number of entries returned on one result
     * page. If not set, the default is 100. Optional.
     */
    public function listPerformanceReport($accountId, $endDateTime, $startDateTime, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'endDateTime' => $endDateTime, 'startDateTime' => $startDateTime];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_PerformanceReportList");
    }
}

/**
 * The "pretargetingConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $pretargetingConfig = $adexchangebuyerService->pretargetingConfig;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_PretargetingConfig_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing pretargeting config. (pretargetingConfig.delete)
     *
     * @param string $accountId The account id to delete the pretargeting config
     *                          for.
     * @param string $configId The specific id of the configuration to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($accountId, $configId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'configId' => $configId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a specific pretargeting configuration (pretargetingConfig.get)
     *
     * @param string $accountId The account id to get the pretargeting config for.
     * @param string $configId The specific id of the configuration to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($accountId, $configId, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'configId' => $configId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_AdExchangeBuyer_PretargetingConfig");
    }

    /**
     * Inserts a new pretargeting configuration. (pretargetingConfig.insert)
     *
     * @param string $accountId The account id to insert the pretargeting config
     *                                                                                               for.
     * @param Google_PretargetingConfig|Google_Service_AdExchangeBuyer_PretargetingConfig $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($accountId, Google_Service_AdExchangeBuyer_PretargetingConfig $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_AdExchangeBuyer_PretargetingConfig");
    }

    /**
     * Retrieves a list of the authenticated user's pretargeting configurations.
     * (pretargetingConfig.listPretargetingConfig)
     *
     * @param string $accountId The account id to get the pretargeting configs for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listPretargetingConfig($accountId, $optParams = [])
    {
        $params = ['accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_AdExchangeBuyer_PretargetingConfigList");
    }

    /**
     * Updates an existing pretargeting config. This method supports patch
     * semantics. (pretargetingConfig.patch)
     *
     * @param string $accountId The account id to update the pretargeting config
     *                                                                                               for.
     * @param string $configId The specific id of the configuration to update.
     * @param Google_PretargetingConfig|Google_Service_AdExchangeBuyer_PretargetingConfig $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($accountId, $configId, Google_Service_AdExchangeBuyer_PretargetingConfig $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'configId' => $configId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_AdExchangeBuyer_PretargetingConfig");
    }

    /**
     * Updates an existing pretargeting config. (pretargetingConfig.update)
     *
     * @param string $accountId The account id to update the pretargeting config
     *                                                                                               for.
     * @param string $configId The specific id of the configuration to update.
     * @param Google_PretargetingConfig|Google_Service_AdExchangeBuyer_PretargetingConfig $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($accountId, $configId, Google_Service_AdExchangeBuyer_PretargetingConfig $postBody, $optParams = [])
    {
        $params = ['accountId' => $accountId, 'configId' => $configId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_AdExchangeBuyer_PretargetingConfig");
    }
}


/**
 * Class Google_Service_AdExchangeBuyer_Account
 */
class Google_Service_AdExchangeBuyer_Account extends Google_Collection
{
    public $cookieMatchingNid;
    public $cookieMatchingUrl;
    public $id;
    public $kind;
    public $maximumActiveCreatives;
    public $maximumTotalQps;
    public $numberActiveCreatives;
    protected $collection_key = 'bidderLocation';
    protected $internal_gapi_mappings = [];
    protected $bidderLocationType = 'Google_Service_AdExchangeBuyer_AccountBidderLocation';
    protected $bidderLocationDataType = 'array';

    /**
     * @param $bidderLocation
     */
    public function setBidderLocation($bidderLocation)
    {
        $this->bidderLocation = $bidderLocation;
    }

    /**
     * @return mixed
     */
    public function getBidderLocation()
    {
        return $this->bidderLocation;
    }

    /**
     * @return mixed
     */
    public function getCookieMatchingNid()
    {
        return $this->cookieMatchingNid;
    }

    /**
     * @param $cookieMatchingNid
     */
    public function setCookieMatchingNid($cookieMatchingNid)
    {
        $this->cookieMatchingNid = $cookieMatchingNid;
    }

    /**
     * @return mixed
     */
    public function getCookieMatchingUrl()
    {
        return $this->cookieMatchingUrl;
    }

    /**
     * @param $cookieMatchingUrl
     */
    public function setCookieMatchingUrl($cookieMatchingUrl)
    {
        $this->cookieMatchingUrl = $cookieMatchingUrl;
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
    public function getMaximumActiveCreatives()
    {
        return $this->maximumActiveCreatives;
    }

    /**
     * @param $maximumActiveCreatives
     */
    public function setMaximumActiveCreatives($maximumActiveCreatives)
    {
        $this->maximumActiveCreatives = $maximumActiveCreatives;
    }

    /**
     * @return mixed
     */
    public function getMaximumTotalQps()
    {
        return $this->maximumTotalQps;
    }

    /**
     * @param $maximumTotalQps
     */
    public function setMaximumTotalQps($maximumTotalQps)
    {
        $this->maximumTotalQps = $maximumTotalQps;
    }

    /**
     * @return mixed
     */
    public function getNumberActiveCreatives()
    {
        return $this->numberActiveCreatives;
    }

    /**
     * @param $numberActiveCreatives
     */
    public function setNumberActiveCreatives($numberActiveCreatives)
    {
        $this->numberActiveCreatives = $numberActiveCreatives;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_AccountBidderLocation
 */
class Google_Service_AdExchangeBuyer_AccountBidderLocation extends Google_Model
{
    public $maximumQps;
    public $region;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMaximumQps()
    {
        return $this->maximumQps;
    }

    /**
     * @param $maximumQps
     */
    public function setMaximumQps($maximumQps)
    {
        $this->maximumQps = $maximumQps;
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
 * Class Google_Service_AdExchangeBuyer_AccountsList
 */
class Google_Service_AdExchangeBuyer_AccountsList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeBuyer_Account';
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
 * Class Google_Service_AdExchangeBuyer_BillingInfo
 */
class Google_Service_AdExchangeBuyer_BillingInfo extends Google_Collection
{
    public $accountId;
    public $accountName;
    public $billingId;
    public $kind;
    protected $collection_key = 'billingId';
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
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

    /**
     * @return mixed
     */
    public function getBillingId()
    {
        return $this->billingId;
    }

    /**
     * @param $billingId
     */
    public function setBillingId($billingId)
    {
        $this->billingId = $billingId;
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
 * Class Google_Service_AdExchangeBuyer_BillingInfoList
 */
class Google_Service_AdExchangeBuyer_BillingInfoList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeBuyer_BillingInfo';
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
 * Class Google_Service_AdExchangeBuyer_Budget
 */
class Google_Service_AdExchangeBuyer_Budget extends Google_Model
{
    public $accountId;
    public $billingId;
    public $budgetAmount;
    public $currencyCode;
    public $id;
    public $kind;
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
    public function getBillingId()
    {
        return $this->billingId;
    }

    /**
     * @param $billingId
     */
    public function setBillingId($billingId)
    {
        $this->billingId = $billingId;
    }

    /**
     * @return mixed
     */
    public function getBudgetAmount()
    {
        return $this->budgetAmount;
    }

    /**
     * @param $budgetAmount
     */
    public function setBudgetAmount($budgetAmount)
    {
        $this->budgetAmount = $budgetAmount;
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
 * Class Google_Service_AdExchangeBuyer_Creative
 */
class Google_Service_AdExchangeBuyer_Creative extends Google_Collection
{
    public $hTMLSnippet;
    public $accountId;
    public $advertiserId;
    public $advertiserName;
    public $agencyId;
    public $attribute;
    public $buyerCreativeId;
    public $clickThroughUrl;
    public $height;
    public $kind;
    public $productCategories;
    public $restrictedCategories;
    public $sensitiveCategories;
    public $status;
    public $vendorType;
    public $videoURL;
    public $width;
    protected $collection_key = 'vendorType';
    protected $internal_gapi_mappings = [
        "hTMLSnippet" => "HTMLSnippet",
    ];
    protected $correctionsType = 'Google_Service_AdExchangeBuyer_CreativeCorrections';
    protected $correctionsDataType = 'array';
    protected $disapprovalReasonsType = 'Google_Service_AdExchangeBuyer_CreativeDisapprovalReasons';
    protected $disapprovalReasonsDataType = 'array';
    protected $filteringReasonsType = 'Google_Service_AdExchangeBuyer_CreativeFilteringReasons';
    protected $filteringReasonsDataType = '';

    /**
     * @return mixed
     */
    public function getHTMLSnippet()
    {
        return $this->hTMLSnippet;
    }

    /**
     * @param $hTMLSnippet
     */
    public function setHTMLSnippet($hTMLSnippet)
    {
        $this->hTMLSnippet = $hTMLSnippet;
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
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

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
    public function getAgencyId()
    {
        return $this->agencyId;
    }

    /**
     * @param $agencyId
     */
    public function setAgencyId($agencyId)
    {
        $this->agencyId = $agencyId;
    }

    /**
     * @return mixed
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return mixed
     */
    public function getBuyerCreativeId()
    {
        return $this->buyerCreativeId;
    }

    /**
     * @param $buyerCreativeId
     */
    public function setBuyerCreativeId($buyerCreativeId)
    {
        $this->buyerCreativeId = $buyerCreativeId;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrl()
    {
        return $this->clickThroughUrl;
    }

    /**
     * @param $clickThroughUrl
     */
    public function setClickThroughUrl($clickThroughUrl)
    {
        $this->clickThroughUrl = $clickThroughUrl;
    }

    /**
     * @param $corrections
     */
    public function setCorrections($corrections)
    {
        $this->corrections = $corrections;
    }

    /**
     * @return mixed
     */
    public function getCorrections()
    {
        return $this->corrections;
    }

    /**
     * @param $disapprovalReasons
     */
    public function setDisapprovalReasons($disapprovalReasons)
    {
        $this->disapprovalReasons = $disapprovalReasons;
    }

    /**
     * @return mixed
     */
    public function getDisapprovalReasons()
    {
        return $this->disapprovalReasons;
    }

    /**
     * @param Google_Service_AdExchangeBuyer_CreativeFilteringReasons $filteringReasons
     */
    public function setFilteringReasons(Google_Service_AdExchangeBuyer_CreativeFilteringReasons $filteringReasons)
    {
        $this->filteringReasons = $filteringReasons;
    }

    /**
     * @return mixed
     */
    public function getFilteringReasons()
    {
        return $this->filteringReasons;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
    public function getProductCategories()
    {
        return $this->productCategories;
    }

    /**
     * @param $productCategories
     */
    public function setProductCategories($productCategories)
    {
        $this->productCategories = $productCategories;
    }

    /**
     * @return mixed
     */
    public function getRestrictedCategories()
    {
        return $this->restrictedCategories;
    }

    /**
     * @param $restrictedCategories
     */
    public function setRestrictedCategories($restrictedCategories)
    {
        $this->restrictedCategories = $restrictedCategories;
    }

    /**
     * @return mixed
     */
    public function getSensitiveCategories()
    {
        return $this->sensitiveCategories;
    }

    /**
     * @param $sensitiveCategories
     */
    public function setSensitiveCategories($sensitiveCategories)
    {
        $this->sensitiveCategories = $sensitiveCategories;
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
    public function getVendorType()
    {
        return $this->vendorType;
    }

    /**
     * @param $vendorType
     */
    public function setVendorType($vendorType)
    {
        $this->vendorType = $vendorType;
    }

    /**
     * @return mixed
     */
    public function getVideoURL()
    {
        return $this->videoURL;
    }

    /**
     * @param $videoURL
     */
    public function setVideoURL($videoURL)
    {
        $this->videoURL = $videoURL;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_CreativeCorrections
 */
class Google_Service_AdExchangeBuyer_CreativeCorrections extends Google_Collection
{
    public $details;
    public $reason;
    protected $collection_key = 'details';
    protected $internal_gapi_mappings = [];

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
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_CreativeDisapprovalReasons
 */
class Google_Service_AdExchangeBuyer_CreativeDisapprovalReasons extends Google_Collection
{
    public $details;
    public $reason;
    protected $collection_key = 'details';
    protected $internal_gapi_mappings = [];

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
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_CreativeFilteringReasons
 */
class Google_Service_AdExchangeBuyer_CreativeFilteringReasons extends Google_Collection
{
    public $date;
    protected $collection_key = 'reasons';
    protected $internal_gapi_mappings = [];
    protected $reasonsType = 'Google_Service_AdExchangeBuyer_CreativeFilteringReasonsReasons';
    protected $reasonsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param $reasons
     */
    public function setReasons($reasons)
    {
        $this->reasons = $reasons;
    }

    /**
     * @return mixed
     */
    public function getReasons()
    {
        return $this->reasons;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_CreativeFilteringReasonsReasons
 */
class Google_Service_AdExchangeBuyer_CreativeFilteringReasonsReasons extends Google_Model
{
    public $filteringCount;
    public $filteringStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFilteringCount()
    {
        return $this->filteringCount;
    }

    /**
     * @param $filteringCount
     */
    public function setFilteringCount($filteringCount)
    {
        $this->filteringCount = $filteringCount;
    }

    /**
     * @return mixed
     */
    public function getFilteringStatus()
    {
        return $this->filteringStatus;
    }

    /**
     * @param $filteringStatus
     */
    public function setFilteringStatus($filteringStatus)
    {
        $this->filteringStatus = $filteringStatus;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_CreativesList
 */
class Google_Service_AdExchangeBuyer_CreativesList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeBuyer_Creative';
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
 * Class Google_Service_AdExchangeBuyer_DirectDeal
 */
class Google_Service_AdExchangeBuyer_DirectDeal extends Google_Model
{
    public $accountId;
    public $advertiser;
    public $currencyCode;
    public $endTime;
    public $fixedCpm;
    public $id;
    public $kind;
    public $name;
    public $privateExchangeMinCpm;
    public $publisherBlocksOverriden;
    public $sellerNetwork;
    public $startTime;
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
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * @param $advertiser
     */
    public function setAdvertiser($advertiser)
    {
        $this->advertiser = $advertiser;
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
    public function getPrivateExchangeMinCpm()
    {
        return $this->privateExchangeMinCpm;
    }

    /**
     * @param $privateExchangeMinCpm
     */
    public function setPrivateExchangeMinCpm($privateExchangeMinCpm)
    {
        $this->privateExchangeMinCpm = $privateExchangeMinCpm;
    }

    /**
     * @return mixed
     */
    public function getPublisherBlocksOverriden()
    {
        return $this->publisherBlocksOverriden;
    }

    /**
     * @param $publisherBlocksOverriden
     */
    public function setPublisherBlocksOverriden($publisherBlocksOverriden)
    {
        $this->publisherBlocksOverriden = $publisherBlocksOverriden;
    }

    /**
     * @return mixed
     */
    public function getSellerNetwork()
    {
        return $this->sellerNetwork;
    }

    /**
     * @param $sellerNetwork
     */
    public function setSellerNetwork($sellerNetwork)
    {
        $this->sellerNetwork = $sellerNetwork;
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
 * Class Google_Service_AdExchangeBuyer_DirectDealsList
 */
class Google_Service_AdExchangeBuyer_DirectDealsList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'directDeals';
    protected $internal_gapi_mappings = [];
    protected $directDealsType = 'Google_Service_AdExchangeBuyer_DirectDeal';
    protected $directDealsDataType = 'array';

    /**
     * @param $directDeals
     */
    public function setDirectDeals($directDeals)
    {
        $this->directDeals = $directDeals;
    }

    /**
     * @return mixed
     */
    public function getDirectDeals()
    {
        return $this->directDeals;
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
 * Class Google_Service_AdExchangeBuyer_PerformanceReport
 */
class Google_Service_AdExchangeBuyer_PerformanceReport extends Google_Collection
{
    public $calloutStatusRate;
    public $cookieMatcherStatusRate;
    public $creativeStatusRate;
    public $hostedMatchStatusRate;
    public $kind;
    public $latency50thPercentile;
    public $latency85thPercentile;
    public $latency95thPercentile;
    public $noQuotaInRegion;
    public $outOfQuota;
    public $pixelMatchRequests;
    public $pixelMatchResponses;
    public $quotaConfiguredLimit;
    public $quotaThrottledLimit;
    public $region;
    public $timestamp;
    protected $collection_key = 'hostedMatchStatusRate';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCalloutStatusRate()
    {
        return $this->calloutStatusRate;
    }

    /**
     * @param $calloutStatusRate
     */
    public function setCalloutStatusRate($calloutStatusRate)
    {
        $this->calloutStatusRate = $calloutStatusRate;
    }

    /**
     * @return mixed
     */
    public function getCookieMatcherStatusRate()
    {
        return $this->cookieMatcherStatusRate;
    }

    /**
     * @param $cookieMatcherStatusRate
     */
    public function setCookieMatcherStatusRate($cookieMatcherStatusRate)
    {
        $this->cookieMatcherStatusRate = $cookieMatcherStatusRate;
    }

    /**
     * @return mixed
     */
    public function getCreativeStatusRate()
    {
        return $this->creativeStatusRate;
    }

    /**
     * @param $creativeStatusRate
     */
    public function setCreativeStatusRate($creativeStatusRate)
    {
        $this->creativeStatusRate = $creativeStatusRate;
    }

    /**
     * @return mixed
     */
    public function getHostedMatchStatusRate()
    {
        return $this->hostedMatchStatusRate;
    }

    /**
     * @param $hostedMatchStatusRate
     */
    public function setHostedMatchStatusRate($hostedMatchStatusRate)
    {
        $this->hostedMatchStatusRate = $hostedMatchStatusRate;
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
    public function getLatency50thPercentile()
    {
        return $this->latency50thPercentile;
    }

    /**
     * @param $latency50thPercentile
     */
    public function setLatency50thPercentile($latency50thPercentile)
    {
        $this->latency50thPercentile = $latency50thPercentile;
    }

    /**
     * @return mixed
     */
    public function getLatency85thPercentile()
    {
        return $this->latency85thPercentile;
    }

    /**
     * @param $latency85thPercentile
     */
    public function setLatency85thPercentile($latency85thPercentile)
    {
        $this->latency85thPercentile = $latency85thPercentile;
    }

    /**
     * @return mixed
     */
    public function getLatency95thPercentile()
    {
        return $this->latency95thPercentile;
    }

    /**
     * @param $latency95thPercentile
     */
    public function setLatency95thPercentile($latency95thPercentile)
    {
        $this->latency95thPercentile = $latency95thPercentile;
    }

    /**
     * @return mixed
     */
    public function getNoQuotaInRegion()
    {
        return $this->noQuotaInRegion;
    }

    /**
     * @param $noQuotaInRegion
     */
    public function setNoQuotaInRegion($noQuotaInRegion)
    {
        $this->noQuotaInRegion = $noQuotaInRegion;
    }

    /**
     * @return mixed
     */
    public function getOutOfQuota()
    {
        return $this->outOfQuota;
    }

    /**
     * @param $outOfQuota
     */
    public function setOutOfQuota($outOfQuota)
    {
        $this->outOfQuota = $outOfQuota;
    }

    /**
     * @return mixed
     */
    public function getPixelMatchRequests()
    {
        return $this->pixelMatchRequests;
    }

    /**
     * @param $pixelMatchRequests
     */
    public function setPixelMatchRequests($pixelMatchRequests)
    {
        $this->pixelMatchRequests = $pixelMatchRequests;
    }

    /**
     * @return mixed
     */
    public function getPixelMatchResponses()
    {
        return $this->pixelMatchResponses;
    }

    /**
     * @param $pixelMatchResponses
     */
    public function setPixelMatchResponses($pixelMatchResponses)
    {
        $this->pixelMatchResponses = $pixelMatchResponses;
    }

    /**
     * @return mixed
     */
    public function getQuotaConfiguredLimit()
    {
        return $this->quotaConfiguredLimit;
    }

    /**
     * @param $quotaConfiguredLimit
     */
    public function setQuotaConfiguredLimit($quotaConfiguredLimit)
    {
        $this->quotaConfiguredLimit = $quotaConfiguredLimit;
    }

    /**
     * @return mixed
     */
    public function getQuotaThrottledLimit()
    {
        return $this->quotaThrottledLimit;
    }

    /**
     * @param $quotaThrottledLimit
     */
    public function setQuotaThrottledLimit($quotaThrottledLimit)
    {
        $this->quotaThrottledLimit = $quotaThrottledLimit;
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
}

/**
 * Class Google_Service_AdExchangeBuyer_PerformanceReportList
 */
class Google_Service_AdExchangeBuyer_PerformanceReportList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'performanceReport';
    protected $internal_gapi_mappings = [];
    protected $performanceReportType = 'Google_Service_AdExchangeBuyer_PerformanceReport';
    protected $performanceReportDataType = 'array';

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
     * @param $performanceReport
     */
    public function setPerformanceReport($performanceReport)
    {
        $this->performanceReport = $performanceReport;
    }

    /**
     * @return mixed
     */
    public function getPerformanceReport()
    {
        return $this->performanceReport;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_PretargetingConfig
 */
class Google_Service_AdExchangeBuyer_PretargetingConfig extends Google_Collection
{
    public $billingId;
    public $configId;
    public $configName;
    public $creativeType;
    public $excludedContentLabels;
    public $excludedGeoCriteriaIds;
    public $excludedUserLists;
    public $excludedVerticals;
    public $geoCriteriaIds;
    public $isActive;
    public $kind;
    public $languages;
    public $mobileCarriers;
    public $mobileDevices;
    public $mobileOperatingSystemVersions;
    public $platforms;
    public $supportedCreativeAttributes;
    public $userLists;
    public $vendorTypes;
    public $verticals;
    protected $collection_key = 'verticals';
    protected $internal_gapi_mappings = [];
    protected $dimensionsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigDimensions';
    protected $dimensionsDataType = 'array';
    protected $excludedPlacementsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements';
    protected $excludedPlacementsDataType = 'array';
    protected $placementsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigPlacements';
    protected $placementsDataType = 'array';

    /**
     * @return mixed
     */
    public function getBillingId()
    {
        return $this->billingId;
    }

    /**
     * @param $billingId
     */
    public function setBillingId($billingId)
    {
        $this->billingId = $billingId;
    }

    /**
     * @return mixed
     */
    public function getConfigId()
    {
        return $this->configId;
    }

    /**
     * @param $configId
     */
    public function setConfigId($configId)
    {
        $this->configId = $configId;
    }

    /**
     * @return mixed
     */
    public function getConfigName()
    {
        return $this->configName;
    }

    /**
     * @param $configName
     */
    public function setConfigName($configName)
    {
        $this->configName = $configName;
    }

    /**
     * @return mixed
     */
    public function getCreativeType()
    {
        return $this->creativeType;
    }

    /**
     * @param $creativeType
     */
    public function setCreativeType($creativeType)
    {
        $this->creativeType = $creativeType;
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
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @return mixed
     */
    public function getExcludedContentLabels()
    {
        return $this->excludedContentLabels;
    }

    /**
     * @param $excludedContentLabels
     */
    public function setExcludedContentLabels($excludedContentLabels)
    {
        $this->excludedContentLabels = $excludedContentLabels;
    }

    /**
     * @return mixed
     */
    public function getExcludedGeoCriteriaIds()
    {
        return $this->excludedGeoCriteriaIds;
    }

    /**
     * @param $excludedGeoCriteriaIds
     */
    public function setExcludedGeoCriteriaIds($excludedGeoCriteriaIds)
    {
        $this->excludedGeoCriteriaIds = $excludedGeoCriteriaIds;
    }

    /**
     * @param $excludedPlacements
     */
    public function setExcludedPlacements($excludedPlacements)
    {
        $this->excludedPlacements = $excludedPlacements;
    }

    /**
     * @return mixed
     */
    public function getExcludedPlacements()
    {
        return $this->excludedPlacements;
    }

    /**
     * @return mixed
     */
    public function getExcludedUserLists()
    {
        return $this->excludedUserLists;
    }

    /**
     * @param $excludedUserLists
     */
    public function setExcludedUserLists($excludedUserLists)
    {
        $this->excludedUserLists = $excludedUserLists;
    }

    /**
     * @return mixed
     */
    public function getExcludedVerticals()
    {
        return $this->excludedVerticals;
    }

    /**
     * @param $excludedVerticals
     */
    public function setExcludedVerticals($excludedVerticals)
    {
        $this->excludedVerticals = $excludedVerticals;
    }

    /**
     * @return mixed
     */
    public function getGeoCriteriaIds()
    {
        return $this->geoCriteriaIds;
    }

    /**
     * @param $geoCriteriaIds
     */
    public function setGeoCriteriaIds($geoCriteriaIds)
    {
        $this->geoCriteriaIds = $geoCriteriaIds;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
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
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getMobileCarriers()
    {
        return $this->mobileCarriers;
    }

    /**
     * @param $mobileCarriers
     */
    public function setMobileCarriers($mobileCarriers)
    {
        $this->mobileCarriers = $mobileCarriers;
    }

    /**
     * @return mixed
     */
    public function getMobileDevices()
    {
        return $this->mobileDevices;
    }

    /**
     * @param $mobileDevices
     */
    public function setMobileDevices($mobileDevices)
    {
        $this->mobileDevices = $mobileDevices;
    }

    /**
     * @return mixed
     */
    public function getMobileOperatingSystemVersions()
    {
        return $this->mobileOperatingSystemVersions;
    }

    /**
     * @param $mobileOperatingSystemVersions
     */
    public function setMobileOperatingSystemVersions($mobileOperatingSystemVersions)
    {
        $this->mobileOperatingSystemVersions = $mobileOperatingSystemVersions;
    }

    /**
     * @param $placements
     */
    public function setPlacements($placements)
    {
        $this->placements = $placements;
    }

    /**
     * @return mixed
     */
    public function getPlacements()
    {
        return $this->placements;
    }

    /**
     * @return mixed
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param $platforms
     */
    public function setPlatforms($platforms)
    {
        $this->platforms = $platforms;
    }

    /**
     * @return mixed
     */
    public function getSupportedCreativeAttributes()
    {
        return $this->supportedCreativeAttributes;
    }

    /**
     * @param $supportedCreativeAttributes
     */
    public function setSupportedCreativeAttributes($supportedCreativeAttributes)
    {
        $this->supportedCreativeAttributes = $supportedCreativeAttributes;
    }

    /**
     * @return mixed
     */
    public function getUserLists()
    {
        return $this->userLists;
    }

    /**
     * @param $userLists
     */
    public function setUserLists($userLists)
    {
        $this->userLists = $userLists;
    }

    /**
     * @return mixed
     */
    public function getVendorTypes()
    {
        return $this->vendorTypes;
    }

    /**
     * @param $vendorTypes
     */
    public function setVendorTypes($vendorTypes)
    {
        $this->vendorTypes = $vendorTypes;
    }

    /**
     * @return mixed
     */
    public function getVerticals()
    {
        return $this->verticals;
    }

    /**
     * @param $verticals
     */
    public function setVerticals($verticals)
    {
        $this->verticals = $verticals;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_PretargetingConfigDimensions
 */
class Google_Service_AdExchangeBuyer_PretargetingConfigDimensions extends Google_Model
{
    public $height;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

/**
 * Class Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements
 */
class Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements extends Google_Model
{
    public $token;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
 * Class Google_Service_AdExchangeBuyer_PretargetingConfigList
 */
class Google_Service_AdExchangeBuyer_PretargetingConfigList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_AdExchangeBuyer_PretargetingConfig';
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
 * Class Google_Service_AdExchangeBuyer_PretargetingConfigPlacements
 */
class Google_Service_AdExchangeBuyer_PretargetingConfigPlacements extends Google_Model
{
    public $token;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
