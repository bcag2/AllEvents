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
 * Service definition for ShoppingContent (v2).
 *
 * <p>
 * Manage product items, inventory, and Merchant Center accounts for Google
 * Shopping.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/shopping-content/v2/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ShoppingContent extends Google_Service
{
    /** Manage your product listings and accounts for Google Shopping. */
    const CONTENT =
        "https://www.googleapis.com/auth/content";

    public $accounts;
    public $accountshipping;
    public $accountstatuses;
    public $accounttax;
    public $datafeeds;
    public $datafeedstatuses;
    public $inventory;
    public $products;
    public $productstatuses;


    /**
     * Constructs the internal representation of the ShoppingContent service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'content/v2/';
        $this->version = 'v2';
        $this->serviceName = 'content';

        $this->accounts = new Google_Service_ShoppingContent_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'authinfo' => [
                        'path' => 'accounts/authinfo',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'custombatch' => [
                        'path' => 'accounts/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => '{merchantId}/accounts/{accountId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{merchantId}/accounts/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{merchantId}/accounts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/accounts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
                        'path' => '{merchantId}/accounts/{accountId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{merchantId}/accounts/{accountId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->accountshipping = new Google_Service_ShoppingContent_Accountshipping_Resource(
            $this,
            $this->serviceName,
            'accountshipping',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'accountshipping/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{merchantId}/accountshipping/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/accountshipping',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
                        'path' => '{merchantId}/accountshipping/{accountId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{merchantId}/accountshipping/{accountId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accountstatuses = new Google_Service_ShoppingContent_Accountstatuses_Resource(
            $this,
            $this->serviceName,
            'accountstatuses',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'accountstatuses/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => '{merchantId}/accountstatuses/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/accountstatuses',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
        $this->accounttax = new Google_Service_ShoppingContent_Accounttax_Resource(
            $this,
            $this->serviceName,
            'accounttax',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'accounttax/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{merchantId}/accounttax/{accountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/accounttax',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
                        'path' => '{merchantId}/accounttax/{accountId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{merchantId}/accounttax/{accountId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->datafeeds = new Google_Service_ShoppingContent_Datafeeds_Resource(
            $this,
            $this->serviceName,
            'datafeeds',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'datafeeds/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'delete' => [
                        'path' => '{merchantId}/datafeeds/{datafeedId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datafeedId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{merchantId}/datafeeds/{datafeedId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datafeedId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{merchantId}/datafeeds',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/datafeeds',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
                        'path' => '{merchantId}/datafeeds/{datafeedId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datafeedId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{merchantId}/datafeeds/{datafeedId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datafeedId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->datafeedstatuses = new Google_Service_ShoppingContent_Datafeedstatuses_Resource(
            $this,
            $this->serviceName,
            'datafeedstatuses',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'datafeedstatuses/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => '{merchantId}/datafeedstatuses/{datafeedId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'datafeedId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/datafeedstatuses',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
        $this->inventory = new Google_Service_ShoppingContent_Inventory_Resource(
            $this,
            $this->serviceName,
            'inventory',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'inventory/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'set' => [
                        'path' => '{merchantId}/inventory/{storeCode}/products/{productId}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'storeCode' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'productId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->products = new Google_Service_ShoppingContent_Products_Resource(
            $this,
            $this->serviceName,
            'products',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'products/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{merchantId}/products/{productId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'productId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{merchantId}/products/{productId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'productId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{merchantId}/products',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dryRun' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/products',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
        $this->productstatuses = new Google_Service_ShoppingContent_Productstatuses_Resource(
            $this,
            $this->serviceName,
            'productstatuses',
            [
                'methods' => [
                    'custombatch' => [
                        'path' => 'productstatuses/batch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => '{merchantId}/productstatuses/{productId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'productId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{merchantId}/productstatuses',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'merchantId' => [
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
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accounts = $contentService->accounts;
 *  </code>
 */
class Google_Service_ShoppingContent_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Returns information about the authenticated user. (accounts.authinfo)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function authinfo($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('authinfo', [$params], "Google_Service_ShoppingContent_AccountsAuthInfoResponse");
    }

    /**
     * Retrieves, inserts, updates, and deletes multiple Merchant Center
     * (sub-)accounts in a single request. (accounts.custombatch)
     *
     * @param Google_AccountsCustomBatchRequest|Google_Service_ShoppingContent_AccountsCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_AccountsCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_AccountsCustomBatchResponse");
    }

    /**
     * Deletes a Merchant Center sub-account. (accounts.delete)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($merchantId, $accountId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a Merchant Center account. (accounts.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $accountId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_Account");
    }

    /**
     * Creates a Merchant Center sub-account. (accounts.insert)
     *
     * @param string $merchantId The ID of the managing account.
     * @param Google_Account|Google_Service_ShoppingContent_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($merchantId, Google_Service_ShoppingContent_Account $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_ShoppingContent_Account");
    }

    /**
     * Lists the sub-accounts in your Merchant Center account.
     * (accounts.listAccounts)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of accounts to return in the
     * response, used for paging.
     */
    public function listAccounts($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_AccountsListResponse");
    }

    /**
     * Updates a Merchant Center account. This method supports patch semantics.
     * (accounts.patch)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account.
     * @param Google_Account|Google_Service_ShoppingContent_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($merchantId, $accountId, Google_Service_ShoppingContent_Account $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_ShoppingContent_Account");
    }

    /**
     * Updates a Merchant Center account. (accounts.update)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account.
     * @param Google_Account|Google_Service_ShoppingContent_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($merchantId, $accountId, Google_Service_ShoppingContent_Account $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_ShoppingContent_Account");
    }
}

/**
 * The "accountshipping" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accountshipping = $contentService->accountshipping;
 *  </code>
 */
class Google_Service_ShoppingContent_Accountshipping_Resource extends Google_Service_Resource
{

    /**
     * Retrieves and updates the shipping settings of multiple accounts in a single
     * request. (accountshipping.custombatch)
     *
     * @param Google_AccountshippingCustomBatchRequest|Google_Service_ShoppingContent_AccountshippingCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function custombatch(Google_Service_ShoppingContent_AccountshippingCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_AccountshippingCustomBatchResponse");
    }

    /**
     * Retrieves the shipping settings of the account. (accountshipping.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                           account shipping settings.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($merchantId, $accountId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_AccountShipping");
    }

    /**
     * Lists the shipping settings of the sub-accounts in your Merchant Center
     * account. (accountshipping.listAccountshipping)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of shipping settings to
     * return in the response, used for paging.
     */
    public function listAccountshipping($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_AccountshippingListResponse");
    }

    /**
     * Updates the shipping settings of the account. This method supports patch
     * semantics. (accountshipping.patch)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                                                                                          account shipping settings.
     * @param Google_AccountShipping|Google_Service_ShoppingContent_AccountShipping $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function patch($merchantId, $accountId, Google_Service_ShoppingContent_AccountShipping $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_ShoppingContent_AccountShipping");
    }

    /**
     * Updates the shipping settings of the account. (accountshipping.update)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                                                                                          account shipping settings.
     * @param Google_AccountShipping|Google_Service_ShoppingContent_AccountShipping $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function update($merchantId, $accountId, Google_Service_ShoppingContent_AccountShipping $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_ShoppingContent_AccountShipping");
    }
}

/**
 * The "accountstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accountstatuses = $contentService->accountstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Accountstatuses_Resource extends Google_Service_Resource
{

    /**
     * (accountstatuses.custombatch)
     *
     * @param Google_AccountstatusesCustomBatchRequest|Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_AccountstatusesCustomBatchResponse");
    }

    /**
     * Retrieves the status of a Merchant Center account. (accountstatuses.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $accountId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_AccountStatus");
    }

    /**
     * Lists the statuses of the sub-accounts in your Merchant Center account.
     * (accountstatuses.listAccountstatuses)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of account statuses to return
     * in the response, used for paging.
     */
    public function listAccountstatuses($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_AccountstatusesListResponse");
    }
}

/**
 * The "accounttax" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accounttax = $contentService->accounttax;
 *  </code>
 */
class Google_Service_ShoppingContent_Accounttax_Resource extends Google_Service_Resource
{

    /**
     * Retrieves and updates tax settings of multiple accounts in a single request.
     * (accounttax.custombatch)
     *
     * @param Google_AccounttaxCustomBatchRequest|Google_Service_ShoppingContent_AccounttaxCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function custombatch(Google_Service_ShoppingContent_AccounttaxCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_AccounttaxCustomBatchResponse");
    }

    /**
     * Retrieves the tax settings of the account. (accounttax.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                           account tax settings.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($merchantId, $accountId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_AccountTax");
    }

    /**
     * Lists the tax settings of the sub-accounts in your Merchant Center account.
     * (accounttax.listAccounttax)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of tax settings to return in
     * the response, used for paging.
     */
    public function listAccounttax($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_AccounttaxListResponse");
    }

    /**
     * Updates the tax settings of the account. This method supports patch
     * semantics. (accounttax.patch)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                                                                                account tax settings.
     * @param Google_AccountTax|Google_Service_ShoppingContent_AccountTax $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function patch($merchantId, $accountId, Google_Service_ShoppingContent_AccountTax $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_ShoppingContent_AccountTax");
    }

    /**
     * Updates the tax settings of the account. (accounttax.update)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $accountId The ID of the account for which to get/update
     *                                                                                account tax settings.
     * @param Google_AccountTax|Google_Service_ShoppingContent_AccountTax $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function update($merchantId, $accountId, Google_Service_ShoppingContent_AccountTax $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_ShoppingContent_AccountTax");
    }
}

/**
 * The "datafeeds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $datafeeds = $contentService->datafeeds;
 *  </code>
 */
class Google_Service_ShoppingContent_Datafeeds_Resource extends Google_Service_Resource
{

    /**
     * (datafeeds.custombatch)
     *
     * @param Google_DatafeedsCustomBatchRequest|Google_Service_ShoppingContent_DatafeedsCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_DatafeedsCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_DatafeedsCustomBatchResponse");
    }

    /**
     * Deletes a datafeed from your Merchant Center account. (datafeeds.delete)
     *
     * @param string $merchantId
     * @param string $datafeedId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($merchantId, $datafeedId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a datafeed from your Merchant Center account. (datafeeds.get)
     *
     * @param string $merchantId
     * @param string $datafeedId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $datafeedId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_Datafeed");
    }

    /**
     * Registers a datafeed with your Merchant Center account. (datafeeds.insert)
     *
     * @param string $merchantId
     * @param Google_Datafeed|Google_Service_ShoppingContent_Datafeed $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($merchantId, Google_Service_ShoppingContent_Datafeed $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_ShoppingContent_Datafeed");
    }

    /**
     * Lists the datafeeds in your Merchant Center account.
     * (datafeeds.listDatafeeds)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of products to return in the
     * response, used for paging.
     */
    public function listDatafeeds($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_DatafeedsListResponse");
    }

    /**
     * Updates a datafeed of your Merchant Center account. This method supports
     * patch semantics. (datafeeds.patch)
     *
     * @param string $merchantId
     * @param string $datafeedId
     * @param Google_Datafeed|Google_Service_ShoppingContent_Datafeed $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($merchantId, $datafeedId, Google_Service_ShoppingContent_Datafeed $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_ShoppingContent_Datafeed");
    }

    /**
     * Updates a datafeed of your Merchant Center account. (datafeeds.update)
     *
     * @param string $merchantId
     * @param string $datafeedId
     * @param Google_Datafeed|Google_Service_ShoppingContent_Datafeed $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($merchantId, $datafeedId, Google_Service_ShoppingContent_Datafeed $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_ShoppingContent_Datafeed");
    }
}

/**
 * The "datafeedstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $datafeedstatuses = $contentService->datafeedstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Datafeedstatuses_Resource extends Google_Service_Resource
{

    /**
     * (datafeedstatuses.custombatch)
     *
     * @param Google_DatafeedstatusesCustomBatchRequest|Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponse");
    }

    /**
     * Retrieves the status of a datafeed from your Merchant Center account.
     * (datafeedstatuses.get)
     *
     * @param string $merchantId
     * @param string $datafeedId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $datafeedId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_DatafeedStatus");
    }

    /**
     * Lists the statuses of the datafeeds in your Merchant Center account.
     * (datafeedstatuses.listDatafeedstatuses)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of products to return in the
     * response, used for paging.
     */
    public function listDatafeedstatuses($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_DatafeedstatusesListResponse");
    }
}

/**
 * The "inventory" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $inventory = $contentService->inventory;
 *  </code>
 */
class Google_Service_ShoppingContent_Inventory_Resource extends Google_Service_Resource
{

    /**
     * Updates price and availability for multiple products or stores in a single
     * request. (inventory.custombatch)
     *
     * @param Google_InventoryCustomBatchRequest|Google_Service_ShoppingContent_InventoryCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_InventoryCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_InventoryCustomBatchResponse");
    }

    /**
     * Updates price and availability of a product in your Merchant Center account.
     * (inventory.set)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $storeCode The code of the store for which to update price and
     *                                                                                                  availability. Use online to update price and availability of an online
     *                                                                                                  product.
     * @param string $productId The ID of the product for which to update price and
     *                                                                                                  availability.
     * @param Google_InventorySetRequest|Google_Service_ShoppingContent_InventorySetRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function set($merchantId, $storeCode, $productId, Google_Service_ShoppingContent_InventorySetRequest $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'storeCode' => $storeCode, 'productId' => $productId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('set', [$params], "Google_Service_ShoppingContent_InventorySetResponse");
    }
}

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $products = $contentService->products;
 *  </code>
 */
class Google_Service_ShoppingContent_Products_Resource extends Google_Service_Resource
{

    /**
     * Retrieves, inserts, and deletes multiple products in a single request.
     * (products.custombatch)
     *
     * @param Google_ProductsCustomBatchRequest|Google_Service_ShoppingContent_ProductsCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function custombatch(Google_Service_ShoppingContent_ProductsCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_ProductsCustomBatchResponse");
    }

    /**
     * Deletes a product from your Merchant Center account. (products.delete)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $productId The ID of the product.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     * @return expected_class|Google_Http_Request
     */
    public function delete($merchantId, $productId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'productId' => $productId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a product from your Merchant Center account. (products.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $productId The ID of the product.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $productId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'productId' => $productId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_Product");
    }

    /**
     * Uploads a product to your Merchant Center account. (products.insert)
     *
     * @param string $merchantId The ID of the managing account.
     * @param Google_Product|Google_Service_ShoppingContent_Product $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool dryRun Flag to run the request in dry-run mode.
     */
    public function insert($merchantId, Google_Service_ShoppingContent_Product $postBody, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_ShoppingContent_Product");
    }

    /**
     * Lists the products in your Merchant Center account. (products.listProducts)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of products to return in the
     * response, used for paging.
     */
    public function listProducts($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_ProductsListResponse");
    }
}

/**
 * The "productstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $productstatuses = $contentService->productstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Productstatuses_Resource extends Google_Service_Resource
{

    /**
     * Gets the statuses of multiple products in a single request.
     * (productstatuses.custombatch)
     *
     * @param Google_ProductstatusesCustomBatchRequest|Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function custombatch(Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('custombatch', [$params], "Google_Service_ShoppingContent_ProductstatusesCustomBatchResponse");
    }

    /**
     * Gets the status of a product from your Merchant Center account.
     * (productstatuses.get)
     *
     * @param string $merchantId The ID of the managing account.
     * @param string $productId The ID of the product.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($merchantId, $productId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId, 'productId' => $productId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_ShoppingContent_ProductStatus");
    }

    /**
     * Lists the statuses of the products in your Merchant Center account.
     * (productstatuses.listProductstatuses)
     *
     * @param string $merchantId The ID of the managing account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string maxResults The maximum number of product statuses to return
     * in the response, used for paging.
     */
    public function listProductstatuses($merchantId, $optParams = [])
    {
        $params = ['merchantId' => $merchantId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_ShoppingContent_ProductstatusesListResponse");
    }
}


/**
 * Class Google_Service_ShoppingContent_Account
 */
class Google_Service_ShoppingContent_Account extends Google_Collection
{
    public $adultContent;
    public $id;
    public $kind;
    public $name;
    public $reviewsUrl;
    public $sellerId;
    public $websiteUrl;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];
    protected $adwordsLinksType = 'Google_Service_ShoppingContent_AccountAdwordsLink';
    protected $adwordsLinksDataType = 'array';
    protected $usersType = 'Google_Service_ShoppingContent_AccountUser';
    protected $usersDataType = 'array';

    /**
     * @return mixed
     */
    public function getAdultContent()
    {
        return $this->adultContent;
    }

    /**
     * @param $adultContent
     */
    public function setAdultContent($adultContent)
    {
        $this->adultContent = $adultContent;
    }

    /**
     * @param $adwordsLinks
     */
    public function setAdwordsLinks($adwordsLinks)
    {
        $this->adwordsLinks = $adwordsLinks;
    }

    /**
     * @return mixed
     */
    public function getAdwordsLinks()
    {
        return $this->adwordsLinks;
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
    public function getReviewsUrl()
    {
        return $this->reviewsUrl;
    }

    /**
     * @param $reviewsUrl
     */
    public function setReviewsUrl($reviewsUrl)
    {
        $this->reviewsUrl = $reviewsUrl;
    }

    /**
     * @return mixed
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param $sellerId
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
    }

    /**
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
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
 * Class Google_Service_ShoppingContent_AccountAdwordsLink
 */
class Google_Service_ShoppingContent_AccountAdwordsLink extends Google_Model
{
    public $adwordsId;
    public $status;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdwordsId()
    {
        return $this->adwordsId;
    }

    /**
     * @param $adwordsId
     */
    public function setAdwordsId($adwordsId)
    {
        $this->adwordsId = $adwordsId;
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
 * Class Google_Service_ShoppingContent_AccountIdentifier
 */
class Google_Service_ShoppingContent_AccountIdentifier extends Google_Model
{
    public $aggregatorId;
    public $merchantId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAggregatorId()
    {
        return $this->aggregatorId;
    }

    /**
     * @param $aggregatorId
     */
    public function setAggregatorId($aggregatorId)
    {
        $this->aggregatorId = $aggregatorId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShipping
 */
class Google_Service_ShoppingContent_AccountShipping extends Google_Collection
{
    public $accountId;
    public $kind;
    protected $collection_key = 'services';
    protected $internal_gapi_mappings = [];
    protected $carrierRatesType = 'Google_Service_ShoppingContent_AccountShippingCarrierRate';
    protected $carrierRatesDataType = 'array';
    protected $locationGroupsType = 'Google_Service_ShoppingContent_AccountShippingLocationGroup';
    protected $locationGroupsDataType = 'array';
    protected $rateTablesType = 'Google_Service_ShoppingContent_AccountShippingRateTable';
    protected $rateTablesDataType = 'array';
    protected $servicesType = 'Google_Service_ShoppingContent_AccountShippingShippingService';
    protected $servicesDataType = 'array';

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
     * @param $carrierRates
     */
    public function setCarrierRates($carrierRates)
    {
        $this->carrierRates = $carrierRates;
    }

    /**
     * @return mixed
     */
    public function getCarrierRates()
    {
        return $this->carrierRates;
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
     * @param $locationGroups
     */
    public function setLocationGroups($locationGroups)
    {
        $this->locationGroups = $locationGroups;
    }

    /**
     * @return mixed
     */
    public function getLocationGroups()
    {
        return $this->locationGroups;
    }

    /**
     * @param $rateTables
     */
    public function setRateTables($rateTables)
    {
        $this->rateTables = $rateTables;
    }

    /**
     * @return mixed
     */
    public function getRateTables()
    {
        return $this->rateTables;
    }

    /**
     * @param $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingCarrierRate
 */
class Google_Service_ShoppingContent_AccountShippingCarrierRate extends Google_Model
{
    public $carrier;
    public $carrierService;
    public $modifierPercent;
    public $name;
    public $saleCountry;
    public $shippingOrigin;
    protected $internal_gapi_mappings = [];
    protected $modifierFlatRateType = 'Google_Service_ShoppingContent_Price';
    protected $modifierFlatRateDataType = '';

    /**
     * @return mixed
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return mixed
     */
    public function getCarrierService()
    {
        return $this->carrierService;
    }

    /**
     * @param $carrierService
     */
    public function setCarrierService($carrierService)
    {
        $this->carrierService = $carrierService;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $modifierFlatRate
     */
    public function setModifierFlatRate(Google_Service_ShoppingContent_Price $modifierFlatRate)
    {
        $this->modifierFlatRate = $modifierFlatRate;
    }

    /**
     * @return mixed
     */
    public function getModifierFlatRate()
    {
        return $this->modifierFlatRate;
    }

    /**
     * @return mixed
     */
    public function getModifierPercent()
    {
        return $this->modifierPercent;
    }

    /**
     * @param $modifierPercent
     */
    public function setModifierPercent($modifierPercent)
    {
        $this->modifierPercent = $modifierPercent;
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
    public function getSaleCountry()
    {
        return $this->saleCountry;
    }

    /**
     * @param $saleCountry
     */
    public function setSaleCountry($saleCountry)
    {
        $this->saleCountry = $saleCountry;
    }

    /**
     * @return mixed
     */
    public function getShippingOrigin()
    {
        return $this->shippingOrigin;
    }

    /**
     * @param $shippingOrigin
     */
    public function setShippingOrigin($shippingOrigin)
    {
        $this->shippingOrigin = $shippingOrigin;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingCondition
 */
class Google_Service_ShoppingContent_AccountShippingCondition extends Google_Model
{
    public $deliveryLocationGroup;
    public $deliveryLocationId;
    public $deliveryPostalCode;
    public $shippingLabel;
    protected $internal_gapi_mappings = [];
    protected $deliveryPostalCodeRangeType = 'Google_Service_ShoppingContent_AccountShippingPostalCodeRange';
    protected $deliveryPostalCodeRangeDataType = '';
    protected $priceMaxType = 'Google_Service_ShoppingContent_Price';
    protected $priceMaxDataType = '';
    protected $weightMaxType = 'Google_Service_ShoppingContent_Weight';
    protected $weightMaxDataType = '';

    /**
     * @return mixed
     */
    public function getDeliveryLocationGroup()
    {
        return $this->deliveryLocationGroup;
    }

    /**
     * @param $deliveryLocationGroup
     */
    public function setDeliveryLocationGroup($deliveryLocationGroup)
    {
        $this->deliveryLocationGroup = $deliveryLocationGroup;
    }

    /**
     * @return mixed
     */
    public function getDeliveryLocationId()
    {
        return $this->deliveryLocationId;
    }

    /**
     * @param $deliveryLocationId
     */
    public function setDeliveryLocationId($deliveryLocationId)
    {
        $this->deliveryLocationId = $deliveryLocationId;
    }

    /**
     * @return mixed
     */
    public function getDeliveryPostalCode()
    {
        return $this->deliveryPostalCode;
    }

    /**
     * @param $deliveryPostalCode
     */
    public function setDeliveryPostalCode($deliveryPostalCode)
    {
        $this->deliveryPostalCode = $deliveryPostalCode;
    }

    /**
     * @param Google_Service_ShoppingContent_AccountShippingPostalCodeRange $deliveryPostalCodeRange
     */
    public function setDeliveryPostalCodeRange(Google_Service_ShoppingContent_AccountShippingPostalCodeRange $deliveryPostalCodeRange)
    {
        $this->deliveryPostalCodeRange = $deliveryPostalCodeRange;
    }

    /**
     * @return mixed
     */
    public function getDeliveryPostalCodeRange()
    {
        return $this->deliveryPostalCodeRange;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $priceMax
     */
    public function setPriceMax(Google_Service_ShoppingContent_Price $priceMax)
    {
        $this->priceMax = $priceMax;
    }

    /**
     * @return mixed
     */
    public function getPriceMax()
    {
        return $this->priceMax;
    }

    /**
     * @return mixed
     */
    public function getShippingLabel()
    {
        return $this->shippingLabel;
    }

    /**
     * @param $shippingLabel
     */
    public function setShippingLabel($shippingLabel)
    {
        $this->shippingLabel = $shippingLabel;
    }

    /**
     * @param Google_Service_ShoppingContent_Weight $weightMax
     */
    public function setWeightMax(Google_Service_ShoppingContent_Weight $weightMax)
    {
        $this->weightMax = $weightMax;
    }

    /**
     * @return mixed
     */
    public function getWeightMax()
    {
        return $this->weightMax;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingLocationGroup
 */
class Google_Service_ShoppingContent_AccountShippingLocationGroup extends Google_Collection
{
    public $country;
    public $locationIds;
    public $name;
    public $postalCodes;
    protected $collection_key = 'postalCodes';
    protected $internal_gapi_mappings = [];
    protected $postalCodeRangesType = 'Google_Service_ShoppingContent_AccountShippingPostalCodeRange';
    protected $postalCodeRangesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLocationIds()
    {
        return $this->locationIds;
    }

    /**
     * @param $locationIds
     */
    public function setLocationIds($locationIds)
    {
        $this->locationIds = $locationIds;
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
     * @param $postalCodeRanges
     */
    public function setPostalCodeRanges($postalCodeRanges)
    {
        $this->postalCodeRanges = $postalCodeRanges;
    }

    /**
     * @return mixed
     */
    public function getPostalCodeRanges()
    {
        return $this->postalCodeRanges;
    }

    /**
     * @return mixed
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }

    /**
     * @param $postalCodes
     */
    public function setPostalCodes($postalCodes)
    {
        $this->postalCodes = $postalCodes;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingPostalCodeRange
 */
class Google_Service_ShoppingContent_AccountShippingPostalCodeRange extends Google_Model
{
    public $end;
    public $start;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingRateTable
 */
class Google_Service_ShoppingContent_AccountShippingRateTable extends Google_Collection
{
    public $name;
    public $saleCountry;
    protected $collection_key = 'content';
    protected $internal_gapi_mappings = [];
    protected $contentType = 'Google_Service_ShoppingContent_AccountShippingRateTableCell';
    protected $contentDataType = 'array';

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
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
    public function getSaleCountry()
    {
        return $this->saleCountry;
    }

    /**
     * @param $saleCountry
     */
    public function setSaleCountry($saleCountry)
    {
        $this->saleCountry = $saleCountry;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingRateTableCell
 */
class Google_Service_ShoppingContent_AccountShippingRateTableCell extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $conditionType = 'Google_Service_ShoppingContent_AccountShippingCondition';
    protected $conditionDataType = '';
    protected $rateType = 'Google_Service_ShoppingContent_Price';
    protected $rateDataType = '';


    /**
     * @param Google_Service_ShoppingContent_AccountShippingCondition $condition
     */
    public function setCondition(Google_Service_ShoppingContent_AccountShippingCondition $condition)
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
     * @param Google_Service_ShoppingContent_Price $rate
     */
    public function setRate(Google_Service_ShoppingContent_Price $rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingShippingService
 */
class Google_Service_ShoppingContent_AccountShippingShippingService extends Google_Model
{
    public $active;
    public $name;
    public $saleCountry;
    protected $internal_gapi_mappings = [];
    protected $calculationMethodType = 'Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod';
    protected $calculationMethodDataType = '';
    protected $costRuleTreeType = 'Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule';
    protected $costRuleTreeDataType = '';

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
     * @param Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod $calculationMethod
     */
    public function setCalculationMethod(Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod $calculationMethod)
    {
        $this->calculationMethod = $calculationMethod;
    }

    /**
     * @return mixed
     */
    public function getCalculationMethod()
    {
        return $this->calculationMethod;
    }

    /**
     * @param Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule $costRuleTree
     */
    public function setCostRuleTree(Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule $costRuleTree)
    {
        $this->costRuleTree = $costRuleTree;
    }

    /**
     * @return mixed
     */
    public function getCostRuleTree()
    {
        return $this->costRuleTree;
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
    public function getSaleCountry()
    {
        return $this->saleCountry;
    }

    /**
     * @param $saleCountry
     */
    public function setSaleCountry($saleCountry)
    {
        $this->saleCountry = $saleCountry;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod
 */
class Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod extends Google_Model
{
    public $carrierRate;
    public $excluded;
    public $percentageRate;
    public $rateTable;
    protected $internal_gapi_mappings = [];
    protected $flatRateType = 'Google_Service_ShoppingContent_Price';
    protected $flatRateDataType = '';

    /**
     * @return mixed
     */
    public function getCarrierRate()
    {
        return $this->carrierRate;
    }

    /**
     * @param $carrierRate
     */
    public function setCarrierRate($carrierRate)
    {
        $this->carrierRate = $carrierRate;
    }

    /**
     * @return mixed
     */
    public function getExcluded()
    {
        return $this->excluded;
    }

    /**
     * @param $excluded
     */
    public function setExcluded($excluded)
    {
        $this->excluded = $excluded;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $flatRate
     */
    public function setFlatRate(Google_Service_ShoppingContent_Price $flatRate)
    {
        $this->flatRate = $flatRate;
    }

    /**
     * @return mixed
     */
    public function getFlatRate()
    {
        return $this->flatRate;
    }

    /**
     * @return mixed
     */
    public function getPercentageRate()
    {
        return $this->percentageRate;
    }

    /**
     * @param $percentageRate
     */
    public function setPercentageRate($percentageRate)
    {
        $this->percentageRate = $percentageRate;
    }

    /**
     * @return mixed
     */
    public function getRateTable()
    {
        return $this->rateTable;
    }

    /**
     * @param $rateTable
     */
    public function setRateTable($rateTable)
    {
        $this->rateTable = $rateTable;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule
 */
class Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule extends Google_Collection
{
    protected $collection_key = 'children';
    protected $internal_gapi_mappings = [];
    protected $calculationMethodType = 'Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod';
    protected $calculationMethodDataType = '';
    protected $childrenType = 'Google_Service_ShoppingContent_AccountShippingShippingServiceCostRule';
    protected $childrenDataType = 'array';
    protected $conditionType = 'Google_Service_ShoppingContent_AccountShippingCondition';
    protected $conditionDataType = '';


    /**
     * @param Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod $calculationMethod
     */
    public function setCalculationMethod(Google_Service_ShoppingContent_AccountShippingShippingServiceCalculationMethod $calculationMethod)
    {
        $this->calculationMethod = $calculationMethod;
    }

    /**
     * @return mixed
     */
    public function getCalculationMethod()
    {
        return $this->calculationMethod;
    }

    /**
     * @param $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Google_Service_ShoppingContent_AccountShippingCondition $condition
     */
    public function setCondition(Google_Service_ShoppingContent_AccountShippingCondition $condition)
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
}

/**
 * Class Google_Service_ShoppingContent_AccountStatus
 */
class Google_Service_ShoppingContent_AccountStatus extends Google_Collection
{
    public $accountId;
    public $kind;
    protected $collection_key = 'dataQualityIssues';
    protected $internal_gapi_mappings = [];
    protected $dataQualityIssuesType = 'Google_Service_ShoppingContent_AccountStatusDataQualityIssue';
    protected $dataQualityIssuesDataType = 'array';

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
     * @param $dataQualityIssues
     */
    public function setDataQualityIssues($dataQualityIssues)
    {
        $this->dataQualityIssues = $dataQualityIssues;
    }

    /**
     * @return mixed
     */
    public function getDataQualityIssues()
    {
        return $this->dataQualityIssues;
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
 * Class Google_Service_ShoppingContent_AccountStatusDataQualityIssue
 */
class Google_Service_ShoppingContent_AccountStatusDataQualityIssue extends Google_Collection
{
    public $country;
    public $displayedValue;
    public $id;
    public $lastChecked;
    public $numItems;
    public $severity;
    public $submittedValue;
    protected $collection_key = 'exampleItems';
    protected $internal_gapi_mappings = [];
    protected $exampleItemsType = 'Google_Service_ShoppingContent_AccountStatusExampleItem';
    protected $exampleItemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getDisplayedValue()
    {
        return $this->displayedValue;
    }

    /**
     * @param $displayedValue
     */
    public function setDisplayedValue($displayedValue)
    {
        $this->displayedValue = $displayedValue;
    }

    /**
     * @param $exampleItems
     */
    public function setExampleItems($exampleItems)
    {
        $this->exampleItems = $exampleItems;
    }

    /**
     * @return mixed
     */
    public function getExampleItems()
    {
        return $this->exampleItems;
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
    public function getLastChecked()
    {
        return $this->lastChecked;
    }

    /**
     * @param $lastChecked
     */
    public function setLastChecked($lastChecked)
    {
        $this->lastChecked = $lastChecked;
    }

    /**
     * @return mixed
     */
    public function getNumItems()
    {
        return $this->numItems;
    }

    /**
     * @param $numItems
     */
    public function setNumItems($numItems)
    {
        $this->numItems = $numItems;
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
    public function getSubmittedValue()
    {
        return $this->submittedValue;
    }

    /**
     * @param $submittedValue
     */
    public function setSubmittedValue($submittedValue)
    {
        $this->submittedValue = $submittedValue;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountStatusExampleItem
 */
class Google_Service_ShoppingContent_AccountStatusExampleItem extends Google_Model
{
    public $itemId;
    public $link;
    public $submittedValue;
    public $title;
    public $valueOnLandingPage;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getSubmittedValue()
    {
        return $this->submittedValue;
    }

    /**
     * @param $submittedValue
     */
    public function setSubmittedValue($submittedValue)
    {
        $this->submittedValue = $submittedValue;
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
    public function getValueOnLandingPage()
    {
        return $this->valueOnLandingPage;
    }

    /**
     * @param $valueOnLandingPage
     */
    public function setValueOnLandingPage($valueOnLandingPage)
    {
        $this->valueOnLandingPage = $valueOnLandingPage;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountTax
 */
class Google_Service_ShoppingContent_AccountTax extends Google_Collection
{
    public $accountId;
    public $kind;
    protected $collection_key = 'rules';
    protected $internal_gapi_mappings = [];
    protected $rulesType = 'Google_Service_ShoppingContent_AccountTaxTaxRule';
    protected $rulesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_AccountTaxTaxRule
 */
class Google_Service_ShoppingContent_AccountTaxTaxRule extends Google_Model
{
    public $country;
    public $locationId;
    public $ratePercent;
    public $shippingTaxed;
    public $useGlobalRate;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return mixed
     */
    public function getRatePercent()
    {
        return $this->ratePercent;
    }

    /**
     * @param $ratePercent
     */
    public function setRatePercent($ratePercent)
    {
        $this->ratePercent = $ratePercent;
    }

    /**
     * @return mixed
     */
    public function getShippingTaxed()
    {
        return $this->shippingTaxed;
    }

    /**
     * @param $shippingTaxed
     */
    public function setShippingTaxed($shippingTaxed)
    {
        $this->shippingTaxed = $shippingTaxed;
    }

    /**
     * @return mixed
     */
    public function getUseGlobalRate()
    {
        return $this->useGlobalRate;
    }

    /**
     * @param $useGlobalRate
     */
    public function setUseGlobalRate($useGlobalRate)
    {
        $this->useGlobalRate = $useGlobalRate;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountUser
 */
class Google_Service_ShoppingContent_AccountUser extends Google_Model
{
    public $admin;
    public $emailAddress;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
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
}

/**
 * Class Google_Service_ShoppingContent_AccountsAuthInfoResponse
 */
class Google_Service_ShoppingContent_AccountsAuthInfoResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'accountIdentifiers';
    protected $internal_gapi_mappings = [];
    protected $accountIdentifiersType = 'Google_Service_ShoppingContent_AccountIdentifier';
    protected $accountIdentifiersDataType = 'array';

    /**
     * @param $accountIdentifiers
     */
    public function setAccountIdentifiers($accountIdentifiers)
    {
        $this->accountIdentifiers = $accountIdentifiers;
    }

    /**
     * @return mixed
     */
    public function getAccountIdentifiers()
    {
        return $this->accountIdentifiers;
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
 * Class Google_Service_ShoppingContent_AccountsCustomBatchRequest
 */
class Google_Service_ShoppingContent_AccountsCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountsCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_AccountsCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_AccountsCustomBatchRequestEntry extends Google_Model
{
    public $accountId;
    public $batchId;
    public $merchantId;
    public $method;
    protected $internal_gapi_mappings = [];
    protected $accountType = 'Google_Service_ShoppingContent_Account';
    protected $accountDataType = '';

    /**
     * @param Google_Service_ShoppingContent_Account $account
     */
    public function setAccount(Google_Service_ShoppingContent_Account $account)
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
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountsCustomBatchResponse
 */
class Google_Service_ShoppingContent_AccountsCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountsCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_AccountsCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_AccountsCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $accountType = 'Google_Service_ShoppingContent_Account';
    protected $accountDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @param Google_Service_ShoppingContent_Account $account
     */
    public function setAccount(Google_Service_ShoppingContent_Account $account)
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
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
 * Class Google_Service_ShoppingContent_AccountsListResponse
 */
class Google_Service_ShoppingContent_AccountsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_Account';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountshippingCustomBatchRequest
 */
class Google_Service_ShoppingContent_AccountshippingCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountshippingCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_AccountshippingCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_AccountshippingCustomBatchRequestEntry extends Google_Model
{
    public $accountId;
    public $batchId;
    public $merchantId;
    public $method;
    protected $internal_gapi_mappings = [];
    protected $accountShippingType = 'Google_Service_ShoppingContent_AccountShipping';
    protected $accountShippingDataType = '';

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
     * @param Google_Service_ShoppingContent_AccountShipping $accountShipping
     */
    public function setAccountShipping(Google_Service_ShoppingContent_AccountShipping $accountShipping)
    {
        $this->accountShipping = $accountShipping;
    }

    /**
     * @return mixed
     */
    public function getAccountShipping()
    {
        return $this->accountShipping;
    }

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountshippingCustomBatchResponse
 */
class Google_Service_ShoppingContent_AccountshippingCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountshippingCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_AccountshippingCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_AccountshippingCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $accountShippingType = 'Google_Service_ShoppingContent_AccountShipping';
    protected $accountShippingDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @param Google_Service_ShoppingContent_AccountShipping $accountShipping
     */
    public function setAccountShipping(Google_Service_ShoppingContent_AccountShipping $accountShipping)
    {
        $this->accountShipping = $accountShipping;
    }

    /**
     * @return mixed
     */
    public function getAccountShipping()
    {
        return $this->accountShipping;
    }

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
 * Class Google_Service_ShoppingContent_AccountshippingListResponse
 */
class Google_Service_ShoppingContent_AccountshippingListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_AccountShipping';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest
 */
class Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountstatusesCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_AccountstatusesCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_AccountstatusesCustomBatchRequestEntry extends Google_Model
{
    public $accountId;
    public $batchId;
    public $merchantId;
    public $method;
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
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccountstatusesCustomBatchResponse
 */
class Google_Service_ShoppingContent_AccountstatusesCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccountstatusesCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_AccountstatusesCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_AccountstatusesCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    protected $internal_gapi_mappings = [];
    protected $accountStatusType = 'Google_Service_ShoppingContent_AccountStatus';
    protected $accountStatusDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';


    /**
     * @param Google_Service_ShoppingContent_AccountStatus $accountStatus
     */
    public function setAccountStatus(Google_Service_ShoppingContent_AccountStatus $accountStatus)
    {
        $this->accountStatus = $accountStatus;
    }

    /**
     * @return mixed
     */
    public function getAccountStatus()
    {
        return $this->accountStatus;
    }

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
}

/**
 * Class Google_Service_ShoppingContent_AccountstatusesListResponse
 */
class Google_Service_ShoppingContent_AccountstatusesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_AccountStatus';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccounttaxCustomBatchRequest
 */
class Google_Service_ShoppingContent_AccounttaxCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccounttaxCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_AccounttaxCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_AccounttaxCustomBatchRequestEntry extends Google_Model
{
    public $accountId;
    public $batchId;
    public $merchantId;
    public $method;
    protected $internal_gapi_mappings = [];
    protected $accountTaxType = 'Google_Service_ShoppingContent_AccountTax';
    protected $accountTaxDataType = '';

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
     * @param Google_Service_ShoppingContent_AccountTax $accountTax
     */
    public function setAccountTax(Google_Service_ShoppingContent_AccountTax $accountTax)
    {
        $this->accountTax = $accountTax;
    }

    /**
     * @return mixed
     */
    public function getAccountTax()
    {
        return $this->accountTax;
    }

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_AccounttaxCustomBatchResponse
 */
class Google_Service_ShoppingContent_AccounttaxCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_AccounttaxCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_AccounttaxCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_AccounttaxCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $accountTaxType = 'Google_Service_ShoppingContent_AccountTax';
    protected $accountTaxDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @param Google_Service_ShoppingContent_AccountTax $accountTax
     */
    public function setAccountTax(Google_Service_ShoppingContent_AccountTax $accountTax)
    {
        $this->accountTax = $accountTax;
    }

    /**
     * @return mixed
     */
    public function getAccountTax()
    {
        return $this->accountTax;
    }

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
 * Class Google_Service_ShoppingContent_AccounttaxListResponse
 */
class Google_Service_ShoppingContent_AccounttaxListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_AccountTax';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_Datafeed
 */
class Google_Service_ShoppingContent_Datafeed extends Google_Collection
{
    public $attributeLanguage;
    public $contentLanguage;
    public $contentType;
    public $fileName;
    public $id;
    public $intendedDestinations;
    public $kind;
    public $name;
    public $targetCountry;
    protected $collection_key = 'intendedDestinations';
    protected $internal_gapi_mappings = [];
    protected $fetchScheduleType = 'Google_Service_ShoppingContent_DatafeedFetchSchedule';
    protected $fetchScheduleDataType = '';
    protected $formatType = 'Google_Service_ShoppingContent_DatafeedFormat';
    protected $formatDataType = '';

    /**
     * @return mixed
     */
    public function getAttributeLanguage()
    {
        return $this->attributeLanguage;
    }

    /**
     * @param $attributeLanguage
     */
    public function setAttributeLanguage($attributeLanguage)
    {
        $this->attributeLanguage = $attributeLanguage;
    }

    /**
     * @return mixed
     */
    public function getContentLanguage()
    {
        return $this->contentLanguage;
    }

    /**
     * @param $contentLanguage
     */
    public function setContentLanguage($contentLanguage)
    {
        $this->contentLanguage = $contentLanguage;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @param Google_Service_ShoppingContent_DatafeedFetchSchedule $fetchSchedule
     */
    public function setFetchSchedule(Google_Service_ShoppingContent_DatafeedFetchSchedule $fetchSchedule)
    {
        $this->fetchSchedule = $fetchSchedule;
    }

    /**
     * @return mixed
     */
    public function getFetchSchedule()
    {
        return $this->fetchSchedule;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param Google_Service_ShoppingContent_DatafeedFormat $format
     */
    public function setFormat(Google_Service_ShoppingContent_DatafeedFormat $format)
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
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
    public function getIntendedDestinations()
    {
        return $this->intendedDestinations;
    }

    /**
     * @param $intendedDestinations
     */
    public function setIntendedDestinations($intendedDestinations)
    {
        $this->intendedDestinations = $intendedDestinations;
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
    public function getTargetCountry()
    {
        return $this->targetCountry;
    }

    /**
     * @param $targetCountry
     */
    public function setTargetCountry($targetCountry)
    {
        $this->targetCountry = $targetCountry;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedFetchSchedule
 */
class Google_Service_ShoppingContent_DatafeedFetchSchedule extends Google_Model
{
    public $dayOfMonth;
    public $fetchUrl;
    public $hour;
    public $password;
    public $timeZone;
    public $username;
    public $weekday;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDayOfMonth()
    {
        return $this->dayOfMonth;
    }

    /**
     * @param $dayOfMonth
     */
    public function setDayOfMonth($dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;
    }

    /**
     * @return mixed
     */
    public function getFetchUrl()
    {
        return $this->fetchUrl;
    }

    /**
     * @param $fetchUrl
     */
    public function setFetchUrl($fetchUrl)
    {
        $this->fetchUrl = $fetchUrl;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
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
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
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
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedFormat
 */
class Google_Service_ShoppingContent_DatafeedFormat extends Google_Model
{
    public $columnDelimiter;
    public $fileEncoding;
    public $quotingMode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnDelimiter()
    {
        return $this->columnDelimiter;
    }

    /**
     * @param $columnDelimiter
     */
    public function setColumnDelimiter($columnDelimiter)
    {
        $this->columnDelimiter = $columnDelimiter;
    }

    /**
     * @return mixed
     */
    public function getFileEncoding()
    {
        return $this->fileEncoding;
    }

    /**
     * @param $fileEncoding
     */
    public function setFileEncoding($fileEncoding)
    {
        $this->fileEncoding = $fileEncoding;
    }

    /**
     * @return mixed
     */
    public function getQuotingMode()
    {
        return $this->quotingMode;
    }

    /**
     * @param $quotingMode
     */
    public function setQuotingMode($quotingMode)
    {
        $this->quotingMode = $quotingMode;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedStatus
 */
class Google_Service_ShoppingContent_DatafeedStatus extends Google_Collection
{
    public $datafeedId;
    public $itemsTotal;
    public $itemsValid;
    public $kind;
    public $lastUploadDate;
    public $processingStatus;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_ShoppingContent_DatafeedStatusError';
    protected $errorsDataType = 'array';
    protected $warningsType = 'Google_Service_ShoppingContent_DatafeedStatusError';
    protected $warningsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDatafeedId()
    {
        return $this->datafeedId;
    }

    /**
     * @param $datafeedId
     */
    public function setDatafeedId($datafeedId)
    {
        $this->datafeedId = $datafeedId;
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
    public function getItemsTotal()
    {
        return $this->itemsTotal;
    }

    /**
     * @param $itemsTotal
     */
    public function setItemsTotal($itemsTotal)
    {
        $this->itemsTotal = $itemsTotal;
    }

    /**
     * @return mixed
     */
    public function getItemsValid()
    {
        return $this->itemsValid;
    }

    /**
     * @param $itemsValid
     */
    public function setItemsValid($itemsValid)
    {
        $this->itemsValid = $itemsValid;
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
    public function getLastUploadDate()
    {
        return $this->lastUploadDate;
    }

    /**
     * @param $lastUploadDate
     */
    public function setLastUploadDate($lastUploadDate)
    {
        $this->lastUploadDate = $lastUploadDate;
    }

    /**
     * @return mixed
     */
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @param $warnings
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }

    /**
     * @return mixed
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedStatusError
 */
class Google_Service_ShoppingContent_DatafeedStatusError extends Google_Collection
{
    public $code;
    public $count;
    public $message;
    protected $collection_key = 'examples';
    protected $internal_gapi_mappings = [];
    protected $examplesType = 'Google_Service_ShoppingContent_DatafeedStatusExample';
    protected $examplesDataType = 'array';

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
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @param $examples
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
    }

    /**
     * @return mixed
     */
    public function getExamples()
    {
        return $this->examples;
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
 * Class Google_Service_ShoppingContent_DatafeedStatusExample
 */
class Google_Service_ShoppingContent_DatafeedStatusExample extends Google_Model
{
    public $itemId;
    public $lineNumber;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return mixed
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @param $lineNumber
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
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
 * Class Google_Service_ShoppingContent_DatafeedsCustomBatchRequest
 */
class Google_Service_ShoppingContent_DatafeedsCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_DatafeedsCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_DatafeedsCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_DatafeedsCustomBatchRequestEntry extends Google_Model
{
    public $batchId;
    public $datafeedId;
    public $merchantId;
    public $method;
    protected $internal_gapi_mappings = [];
    protected $datafeedType = 'Google_Service_ShoppingContent_Datafeed';
    protected $datafeedDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Datafeed $datafeed
     */
    public function setDatafeed(Google_Service_ShoppingContent_Datafeed $datafeed)
    {
        $this->datafeed = $datafeed;
    }

    /**
     * @return mixed
     */
    public function getDatafeed()
    {
        return $this->datafeed;
    }

    /**
     * @return mixed
     */
    public function getDatafeedId()
    {
        return $this->datafeedId;
    }

    /**
     * @param $datafeedId
     */
    public function setDatafeedId($datafeedId)
    {
        $this->datafeedId = $datafeedId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedsCustomBatchResponse
 */
class Google_Service_ShoppingContent_DatafeedsCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_DatafeedsCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_DatafeedsCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_DatafeedsCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    protected $internal_gapi_mappings = [];
    protected $datafeedType = 'Google_Service_ShoppingContent_Datafeed';
    protected $datafeedDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Datafeed $datafeed
     */
    public function setDatafeed(Google_Service_ShoppingContent_Datafeed $datafeed)
    {
        $this->datafeed = $datafeed;
    }

    /**
     * @return mixed
     */
    public function getDatafeed()
    {
        return $this->datafeed;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
}

/**
 * Class Google_Service_ShoppingContent_DatafeedsListResponse
 */
class Google_Service_ShoppingContent_DatafeedsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_Datafeed';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest
 */
class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchRequestEntry extends Google_Model
{
    public $batchId;
    public $datafeedId;
    public $merchantId;
    public $method;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getDatafeedId()
    {
        return $this->datafeedId;
    }

    /**
     * @param $datafeedId
     */
    public function setDatafeedId($datafeedId)
    {
        $this->datafeedId = $datafeedId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}

/**
 * Class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponse
 */
class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_DatafeedstatusesCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    protected $internal_gapi_mappings = [];
    protected $datafeedStatusType = 'Google_Service_ShoppingContent_DatafeedStatus';
    protected $datafeedStatusDataType = '';
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_DatafeedStatus $datafeedStatus
     */
    public function setDatafeedStatus(Google_Service_ShoppingContent_DatafeedStatus $datafeedStatus)
    {
        $this->datafeedStatus = $datafeedStatus;
    }

    /**
     * @return mixed
     */
    public function getDatafeedStatus()
    {
        return $this->datafeedStatus;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
}

/**
 * Class Google_Service_ShoppingContent_DatafeedstatusesListResponse
 */
class Google_Service_ShoppingContent_DatafeedstatusesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_DatafeedStatus';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_Error
 */
class Google_Service_ShoppingContent_Error extends Google_Model
{
    public $domain;
    public $message;
    public $reason;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
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
 * Class Google_Service_ShoppingContent_Errors
 */
class Google_Service_ShoppingContent_Errors extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_ShoppingContent_Error';
    protected $errorsDataType = 'array';

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
 * Class Google_Service_ShoppingContent_Inventory
 */
class Google_Service_ShoppingContent_Inventory extends Google_Model
{
    public $availability;
    public $kind;
    public $quantity;
    public $salePriceEffectiveDate;
    protected $internal_gapi_mappings = [];
    protected $priceType = 'Google_Service_ShoppingContent_Price';
    protected $priceDataType = '';
    protected $salePriceType = 'Google_Service_ShoppingContent_Price';
    protected $salePriceDataType = '';

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
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
     * @param Google_Service_ShoppingContent_Price $price
     */
    public function setPrice(Google_Service_ShoppingContent_Price $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $salePrice
     */
    public function setSalePrice(Google_Service_ShoppingContent_Price $salePrice)
    {
        $this->salePrice = $salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePriceEffectiveDate()
    {
        return $this->salePriceEffectiveDate;
    }

    /**
     * @param $salePriceEffectiveDate
     */
    public function setSalePriceEffectiveDate($salePriceEffectiveDate)
    {
        $this->salePriceEffectiveDate = $salePriceEffectiveDate;
    }
}

/**
 * Class Google_Service_ShoppingContent_InventoryCustomBatchRequest
 */
class Google_Service_ShoppingContent_InventoryCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_InventoryCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_InventoryCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_InventoryCustomBatchRequestEntry extends Google_Model
{
    public $batchId;
    public $merchantId;
    public $productId;
    public $storeCode;
    protected $internal_gapi_mappings = [];
    protected $inventoryType = 'Google_Service_ShoppingContent_Inventory';
    protected $inventoryDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Inventory $inventory
     */
    public function setInventory(Google_Service_ShoppingContent_Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * @param $storeCode
     */
    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
    }
}

/**
 * Class Google_Service_ShoppingContent_InventoryCustomBatchResponse
 */
class Google_Service_ShoppingContent_InventoryCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_InventoryCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_InventoryCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_InventoryCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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
 * Class Google_Service_ShoppingContent_InventorySetRequest
 */
class Google_Service_ShoppingContent_InventorySetRequest extends Google_Model
{
    public $availability;
    public $quantity;
    public $salePriceEffectiveDate;
    protected $internal_gapi_mappings = [];
    protected $priceType = 'Google_Service_ShoppingContent_Price';
    protected $priceDataType = '';
    protected $salePriceType = 'Google_Service_ShoppingContent_Price';
    protected $salePriceDataType = '';

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $price
     */
    public function setPrice(Google_Service_ShoppingContent_Price $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $salePrice
     */
    public function setSalePrice(Google_Service_ShoppingContent_Price $salePrice)
    {
        $this->salePrice = $salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePriceEffectiveDate()
    {
        return $this->salePriceEffectiveDate;
    }

    /**
     * @param $salePriceEffectiveDate
     */
    public function setSalePriceEffectiveDate($salePriceEffectiveDate)
    {
        $this->salePriceEffectiveDate = $salePriceEffectiveDate;
    }
}

/**
 * Class Google_Service_ShoppingContent_InventorySetResponse
 */
class Google_Service_ShoppingContent_InventorySetResponse extends Google_Model
{
    public $kind;
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
}

/**
 * Class Google_Service_ShoppingContent_LoyaltyPoints
 */
class Google_Service_ShoppingContent_LoyaltyPoints extends Google_Model
{
    public $name;
    public $pointsValue;
    public $ratio;
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
    public function getPointsValue()
    {
        return $this->pointsValue;
    }

    /**
     * @param $pointsValue
     */
    public function setPointsValue($pointsValue)
    {
        $this->pointsValue = $pointsValue;
    }

    /**
     * @return mixed
     */
    public function getRatio()
    {
        return $this->ratio;
    }

    /**
     * @param $ratio
     */
    public function setRatio($ratio)
    {
        $this->ratio = $ratio;
    }
}

/**
 * Class Google_Service_ShoppingContent_Price
 */
class Google_Service_ShoppingContent_Price extends Google_Model
{
    public $currency;
    public $value;
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
 * Class Google_Service_ShoppingContent_Product
 */
class Google_Service_ShoppingContent_Product extends Google_Collection
{
    public $additionalImageLinks;
    public $adult;
    public $adwordsGrouping;
    public $adwordsLabels;
    public $adwordsRedirect;
    public $ageGroup;
    public $availability;
    public $availabilityDate;
    public $brand;
    public $channel;
    public $color;
    public $condition;
    public $contentLanguage;
    public $customLabel0;
    public $customLabel1;
    public $customLabel2;
    public $customLabel3;
    public $customLabel4;
    public $description;
    public $displayAdsId;
    public $displayAdsLink;
    public $displayAdsSimilarIds;
    public $displayAdsTitle;
    public $displayAdsValue;
    public $energyEfficiencyClass;
    public $expirationDate;
    public $gender;
    public $googleProductCategory;
    public $gtin;
    public $id;
    public $identifierExists;
    public $imageLink;
    public $isBundle;
    public $itemGroupId;
    public $kind;
    public $link;
    public $material;
    public $mobileLink;
    public $mpn;
    public $multipack;
    public $offerId;
    public $onlineOnly;
    public $pattern;
    public $productType;
    public $salePriceEffectiveDate;
    public $shippingLabel;
    public $sizeSystem;
    public $sizeType;
    public $sizes;
    public $targetCountry;
    public $title;
    public $validatedDestinations;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $aspectsType = 'Google_Service_ShoppingContent_ProductAspect';
    protected $aspectsDataType = 'array';
    protected $customAttributesType = 'Google_Service_ShoppingContent_ProductCustomAttribute';
    protected $customAttributesDataType = 'array';
    protected $customGroupsType = 'Google_Service_ShoppingContent_ProductCustomGroup';
    protected $customGroupsDataType = 'array';
    protected $destinationsType = 'Google_Service_ShoppingContent_ProductDestination';
    protected $destinationsDataType = 'array';
    protected $installmentType = 'Google_Service_ShoppingContent_ProductInstallment';
    protected $installmentDataType = '';
    protected $loyaltyPointsType = 'Google_Service_ShoppingContent_LoyaltyPoints';
    protected $loyaltyPointsDataType = '';
    protected $priceType = 'Google_Service_ShoppingContent_Price';
    protected $priceDataType = '';
    protected $salePriceType = 'Google_Service_ShoppingContent_Price';
    protected $salePriceDataType = '';
    protected $shippingType = 'Google_Service_ShoppingContent_ProductShipping';
    protected $shippingDataType = 'array';
    protected $shippingHeightType = 'Google_Service_ShoppingContent_ProductShippingDimension';
    protected $shippingHeightDataType = '';
    protected $shippingLengthType = 'Google_Service_ShoppingContent_ProductShippingDimension';
    protected $shippingLengthDataType = '';
    protected $shippingWeightType = 'Google_Service_ShoppingContent_ProductShippingWeight';
    protected $shippingWeightDataType = '';
    protected $shippingWidthType = 'Google_Service_ShoppingContent_ProductShippingDimension';
    protected $shippingWidthDataType = '';
    protected $taxesType = 'Google_Service_ShoppingContent_ProductTax';
    protected $taxesDataType = 'array';
    protected $unitPricingBaseMeasureType = 'Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure';
    protected $unitPricingBaseMeasureDataType = '';
    protected $unitPricingMeasureType = 'Google_Service_ShoppingContent_ProductUnitPricingMeasure';
    protected $unitPricingMeasureDataType = '';
    protected $warningsType = 'Google_Service_ShoppingContent_Error';
    protected $warningsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAdditionalImageLinks()
    {
        return $this->additionalImageLinks;
    }

    /**
     * @param $additionalImageLinks
     */
    public function setAdditionalImageLinks($additionalImageLinks)
    {
        $this->additionalImageLinks = $additionalImageLinks;
    }

    /**
     * @return mixed
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
    }

    /**
     * @return mixed
     */
    public function getAdwordsGrouping()
    {
        return $this->adwordsGrouping;
    }

    /**
     * @param $adwordsGrouping
     */
    public function setAdwordsGrouping($adwordsGrouping)
    {
        $this->adwordsGrouping = $adwordsGrouping;
    }

    /**
     * @return mixed
     */
    public function getAdwordsLabels()
    {
        return $this->adwordsLabels;
    }

    /**
     * @param $adwordsLabels
     */
    public function setAdwordsLabels($adwordsLabels)
    {
        $this->adwordsLabels = $adwordsLabels;
    }

    /**
     * @return mixed
     */
    public function getAdwordsRedirect()
    {
        return $this->adwordsRedirect;
    }

    /**
     * @param $adwordsRedirect
     */
    public function setAdwordsRedirect($adwordsRedirect)
    {
        $this->adwordsRedirect = $adwordsRedirect;
    }

    /**
     * @return mixed
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * @param $ageGroup
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;
    }

    /**
     * @param $aspects
     */
    public function setAspects($aspects)
    {
        $this->aspects = $aspects;
    }

    /**
     * @return mixed
     */
    public function getAspects()
    {
        return $this->aspects;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    /**
     * @return mixed
     */
    public function getAvailabilityDate()
    {
        return $this->availabilityDate;
    }

    /**
     * @param $availabilityDate
     */
    public function setAvailabilityDate($availabilityDate)
    {
        $this->availabilityDate = $availabilityDate;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

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
    public function getCondition()
    {
        return $this->condition;
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
    public function getContentLanguage()
    {
        return $this->contentLanguage;
    }

    /**
     * @param $contentLanguage
     */
    public function setContentLanguage($contentLanguage)
    {
        $this->contentLanguage = $contentLanguage;
    }

    /**
     * @param $customAttributes
     */
    public function setCustomAttributes($customAttributes)
    {
        $this->customAttributes = $customAttributes;
    }

    /**
     * @return mixed
     */
    public function getCustomAttributes()
    {
        return $this->customAttributes;
    }

    /**
     * @param $customGroups
     */
    public function setCustomGroups($customGroups)
    {
        $this->customGroups = $customGroups;
    }

    /**
     * @return mixed
     */
    public function getCustomGroups()
    {
        return $this->customGroups;
    }

    /**
     * @return mixed
     */
    public function getCustomLabel0()
    {
        return $this->customLabel0;
    }

    /**
     * @param $customLabel0
     */
    public function setCustomLabel0($customLabel0)
    {
        $this->customLabel0 = $customLabel0;
    }

    /**
     * @return mixed
     */
    public function getCustomLabel1()
    {
        return $this->customLabel1;
    }

    /**
     * @param $customLabel1
     */
    public function setCustomLabel1($customLabel1)
    {
        $this->customLabel1 = $customLabel1;
    }

    /**
     * @return mixed
     */
    public function getCustomLabel2()
    {
        return $this->customLabel2;
    }

    /**
     * @param $customLabel2
     */
    public function setCustomLabel2($customLabel2)
    {
        $this->customLabel2 = $customLabel2;
    }

    /**
     * @return mixed
     */
    public function getCustomLabel3()
    {
        return $this->customLabel3;
    }

    /**
     * @param $customLabel3
     */
    public function setCustomLabel3($customLabel3)
    {
        $this->customLabel3 = $customLabel3;
    }

    /**
     * @return mixed
     */
    public function getCustomLabel4()
    {
        return $this->customLabel4;
    }

    /**
     * @param $customLabel4
     */
    public function setCustomLabel4($customLabel4)
    {
        $this->customLabel4 = $customLabel4;
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
     * @param $destinations
     */
    public function setDestinations($destinations)
    {
        $this->destinations = $destinations;
    }

    /**
     * @return mixed
     */
    public function getDestinations()
    {
        return $this->destinations;
    }

    /**
     * @return mixed
     */
    public function getDisplayAdsId()
    {
        return $this->displayAdsId;
    }

    /**
     * @param $displayAdsId
     */
    public function setDisplayAdsId($displayAdsId)
    {
        $this->displayAdsId = $displayAdsId;
    }

    /**
     * @return mixed
     */
    public function getDisplayAdsLink()
    {
        return $this->displayAdsLink;
    }

    /**
     * @param $displayAdsLink
     */
    public function setDisplayAdsLink($displayAdsLink)
    {
        $this->displayAdsLink = $displayAdsLink;
    }

    /**
     * @return mixed
     */
    public function getDisplayAdsSimilarIds()
    {
        return $this->displayAdsSimilarIds;
    }

    /**
     * @param $displayAdsSimilarIds
     */
    public function setDisplayAdsSimilarIds($displayAdsSimilarIds)
    {
        $this->displayAdsSimilarIds = $displayAdsSimilarIds;
    }

    /**
     * @return mixed
     */
    public function getDisplayAdsTitle()
    {
        return $this->displayAdsTitle;
    }

    /**
     * @param $displayAdsTitle
     */
    public function setDisplayAdsTitle($displayAdsTitle)
    {
        $this->displayAdsTitle = $displayAdsTitle;
    }

    /**
     * @return mixed
     */
    public function getDisplayAdsValue()
    {
        return $this->displayAdsValue;
    }

    /**
     * @param $displayAdsValue
     */
    public function setDisplayAdsValue($displayAdsValue)
    {
        $this->displayAdsValue = $displayAdsValue;
    }

    /**
     * @return mixed
     */
    public function getEnergyEfficiencyClass()
    {
        return $this->energyEfficiencyClass;
    }

    /**
     * @param $energyEfficiencyClass
     */
    public function setEnergyEfficiencyClass($energyEfficiencyClass)
    {
        $this->energyEfficiencyClass = $energyEfficiencyClass;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGoogleProductCategory()
    {
        return $this->googleProductCategory;
    }

    /**
     * @param $googleProductCategory
     */
    public function setGoogleProductCategory($googleProductCategory)
    {
        $this->googleProductCategory = $googleProductCategory;
    }

    /**
     * @return mixed
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * @param $gtin
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;
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
    public function getIdentifierExists()
    {
        return $this->identifierExists;
    }

    /**
     * @param $identifierExists
     */
    public function setIdentifierExists($identifierExists)
    {
        $this->identifierExists = $identifierExists;
    }

    /**
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * @param $imageLink
     */
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductInstallment $installment
     */
    public function setInstallment(Google_Service_ShoppingContent_ProductInstallment $installment)
    {
        $this->installment = $installment;
    }

    /**
     * @return mixed
     */
    public function getInstallment()
    {
        return $this->installment;
    }

    /**
     * @return mixed
     */
    public function getIsBundle()
    {
        return $this->isBundle;
    }

    /**
     * @param $isBundle
     */
    public function setIsBundle($isBundle)
    {
        $this->isBundle = $isBundle;
    }

    /**
     * @return mixed
     */
    public function getItemGroupId()
    {
        return $this->itemGroupId;
    }

    /**
     * @param $itemGroupId
     */
    public function setItemGroupId($itemGroupId)
    {
        $this->itemGroupId = $itemGroupId;
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
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param Google_Service_ShoppingContent_LoyaltyPoints $loyaltyPoints
     */
    public function setLoyaltyPoints(Google_Service_ShoppingContent_LoyaltyPoints $loyaltyPoints)
    {
        $this->loyaltyPoints = $loyaltyPoints;
    }

    /**
     * @return mixed
     */
    public function getLoyaltyPoints()
    {
        return $this->loyaltyPoints;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getMobileLink()
    {
        return $this->mobileLink;
    }

    /**
     * @param $mobileLink
     */
    public function setMobileLink($mobileLink)
    {
        $this->mobileLink = $mobileLink;
    }

    /**
     * @return mixed
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * @param $mpn
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;
    }

    /**
     * @return mixed
     */
    public function getMultipack()
    {
        return $this->multipack;
    }

    /**
     * @param $multipack
     */
    public function setMultipack($multipack)
    {
        $this->multipack = $multipack;
    }

    /**
     * @return mixed
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @param $offerId
     */
    public function setOfferId($offerId)
    {
        $this->offerId = $offerId;
    }

    /**
     * @return mixed
     */
    public function getOnlineOnly()
    {
        return $this->onlineOnly;
    }

    /**
     * @param $onlineOnly
     */
    public function setOnlineOnly($onlineOnly)
    {
        $this->onlineOnly = $onlineOnly;
    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $price
     */
    public function setPrice(Google_Service_ShoppingContent_Price $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $salePrice
     */
    public function setSalePrice(Google_Service_ShoppingContent_Price $salePrice)
    {
        $this->salePrice = $salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @return mixed
     */
    public function getSalePriceEffectiveDate()
    {
        return $this->salePriceEffectiveDate;
    }

    /**
     * @param $salePriceEffectiveDate
     */
    public function setSalePriceEffectiveDate($salePriceEffectiveDate)
    {
        $this->salePriceEffectiveDate = $salePriceEffectiveDate;
    }

    /**
     * @param $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductShippingDimension $shippingHeight
     */
    public function setShippingHeight(Google_Service_ShoppingContent_ProductShippingDimension $shippingHeight)
    {
        $this->shippingHeight = $shippingHeight;
    }

    /**
     * @return mixed
     */
    public function getShippingHeight()
    {
        return $this->shippingHeight;
    }

    /**
     * @return mixed
     */
    public function getShippingLabel()
    {
        return $this->shippingLabel;
    }

    /**
     * @param $shippingLabel
     */
    public function setShippingLabel($shippingLabel)
    {
        $this->shippingLabel = $shippingLabel;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductShippingDimension $shippingLength
     */
    public function setShippingLength(Google_Service_ShoppingContent_ProductShippingDimension $shippingLength)
    {
        $this->shippingLength = $shippingLength;
    }

    /**
     * @return mixed
     */
    public function getShippingLength()
    {
        return $this->shippingLength;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductShippingWeight $shippingWeight
     */
    public function setShippingWeight(Google_Service_ShoppingContent_ProductShippingWeight $shippingWeight)
    {
        $this->shippingWeight = $shippingWeight;
    }

    /**
     * @return mixed
     */
    public function getShippingWeight()
    {
        return $this->shippingWeight;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductShippingDimension $shippingWidth
     */
    public function setShippingWidth(Google_Service_ShoppingContent_ProductShippingDimension $shippingWidth)
    {
        $this->shippingWidth = $shippingWidth;
    }

    /**
     * @return mixed
     */
    public function getShippingWidth()
    {
        return $this->shippingWidth;
    }

    /**
     * @return mixed
     */
    public function getSizeSystem()
    {
        return $this->sizeSystem;
    }

    /**
     * @param $sizeSystem
     */
    public function setSizeSystem($sizeSystem)
    {
        $this->sizeSystem = $sizeSystem;
    }

    /**
     * @return mixed
     */
    public function getSizeType()
    {
        return $this->sizeType;
    }

    /**
     * @param $sizeType
     */
    public function setSizeType($sizeType)
    {
        $this->sizeType = $sizeType;
    }

    /**
     * @return mixed
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * @param $sizes
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;
    }

    /**
     * @return mixed
     */
    public function getTargetCountry()
    {
        return $this->targetCountry;
    }

    /**
     * @param $targetCountry
     */
    public function setTargetCountry($targetCountry)
    {
        $this->targetCountry = $targetCountry;
    }

    /**
     * @param $taxes
     */
    public function setTaxes($taxes)
    {
        $this->taxes = $taxes;
    }

    /**
     * @return mixed
     */
    public function getTaxes()
    {
        return $this->taxes;
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
     * @param Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure $unitPricingBaseMeasure
     */
    public function setUnitPricingBaseMeasure(Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure $unitPricingBaseMeasure)
    {
        $this->unitPricingBaseMeasure = $unitPricingBaseMeasure;
    }

    /**
     * @return mixed
     */
    public function getUnitPricingBaseMeasure()
    {
        return $this->unitPricingBaseMeasure;
    }

    /**
     * @param Google_Service_ShoppingContent_ProductUnitPricingMeasure $unitPricingMeasure
     */
    public function setUnitPricingMeasure(Google_Service_ShoppingContent_ProductUnitPricingMeasure $unitPricingMeasure)
    {
        $this->unitPricingMeasure = $unitPricingMeasure;
    }

    /**
     * @return mixed
     */
    public function getUnitPricingMeasure()
    {
        return $this->unitPricingMeasure;
    }

    /**
     * @return mixed
     */
    public function getValidatedDestinations()
    {
        return $this->validatedDestinations;
    }

    /**
     * @param $validatedDestinations
     */
    public function setValidatedDestinations($validatedDestinations)
    {
        $this->validatedDestinations = $validatedDestinations;
    }

    /**
     * @param $warnings
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }

    /**
     * @return mixed
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductAspect
 */
class Google_Service_ShoppingContent_ProductAspect extends Google_Model
{
    public $aspectName;
    public $destinationName;
    public $intention;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAspectName()
    {
        return $this->aspectName;
    }

    /**
     * @param $aspectName
     */
    public function setAspectName($aspectName)
    {
        $this->aspectName = $aspectName;
    }

    /**
     * @return mixed
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * @param $destinationName
     */
    public function setDestinationName($destinationName)
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return mixed
     */
    public function getIntention()
    {
        return $this->intention;
    }

    /**
     * @param $intention
     */
    public function setIntention($intention)
    {
        $this->intention = $intention;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductCustomAttribute
 */
class Google_Service_ShoppingContent_ProductCustomAttribute extends Google_Model
{
    public $name;
    public $type;
    public $unit;
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
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
 * Class Google_Service_ShoppingContent_ProductCustomGroup
 */
class Google_Service_ShoppingContent_ProductCustomGroup extends Google_Collection
{
    public $name;
    protected $collection_key = 'attributes';
    protected $internal_gapi_mappings = [];
    protected $attributesType = 'Google_Service_ShoppingContent_ProductCustomAttribute';
    protected $attributesDataType = 'array';

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
    public function getAttributes()
    {
        return $this->attributes;
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
 * Class Google_Service_ShoppingContent_ProductDestination
 */
class Google_Service_ShoppingContent_ProductDestination extends Google_Model
{
    public $destinationName;
    public $intention;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * @param $destinationName
     */
    public function setDestinationName($destinationName)
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return mixed
     */
    public function getIntention()
    {
        return $this->intention;
    }

    /**
     * @param $intention
     */
    public function setIntention($intention)
    {
        $this->intention = $intention;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductInstallment
 */
class Google_Service_ShoppingContent_ProductInstallment extends Google_Model
{
    public $months;
    protected $internal_gapi_mappings = [];
    protected $amountType = 'Google_Service_ShoppingContent_Price';
    protected $amountDataType = '';

    /**
     * @param Google_Service_ShoppingContent_Price $amount
     */
    public function setAmount(Google_Service_ShoppingContent_Price $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * @param $months
     */
    public function setMonths($months)
    {
        $this->months = $months;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductShipping
 */
class Google_Service_ShoppingContent_ProductShipping extends Google_Model
{
    public $country;
    public $locationGroupName;
    public $locationId;
    public $postalCode;
    public $region;
    public $service;
    protected $internal_gapi_mappings = [];
    protected $priceType = 'Google_Service_ShoppingContent_Price';
    protected $priceDataType = '';

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLocationGroupName()
    {
        return $this->locationGroupName;
    }

    /**
     * @param $locationGroupName
     */
    public function setLocationGroupName($locationGroupName)
    {
        $this->locationGroupName = $locationGroupName;
    }

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @param Google_Service_ShoppingContent_Price $price
     */
    public function setPrice(Google_Service_ShoppingContent_Price $price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
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
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductShippingDimension
 */
class Google_Service_ShoppingContent_ProductShippingDimension extends Google_Model
{
    public $unit;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
 * Class Google_Service_ShoppingContent_ProductShippingWeight
 */
class Google_Service_ShoppingContent_ProductShippingWeight extends Google_Model
{
    public $unit;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
 * Class Google_Service_ShoppingContent_ProductStatus
 */
class Google_Service_ShoppingContent_ProductStatus extends Google_Collection
{
    public $creationDate;
    public $googleExpirationDate;
    public $kind;
    public $lastUpdateDate;
    public $link;
    public $productId;
    public $title;
    protected $collection_key = 'destinationStatuses';
    protected $internal_gapi_mappings = [];
    protected $dataQualityIssuesType = 'Google_Service_ShoppingContent_ProductStatusDataQualityIssue';
    protected $dataQualityIssuesDataType = 'array';
    protected $destinationStatusesType = 'Google_Service_ShoppingContent_ProductStatusDestinationStatus';
    protected $destinationStatusesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param $dataQualityIssues
     */
    public function setDataQualityIssues($dataQualityIssues)
    {
        $this->dataQualityIssues = $dataQualityIssues;
    }

    /**
     * @return mixed
     */
    public function getDataQualityIssues()
    {
        return $this->dataQualityIssues;
    }

    /**
     * @param $destinationStatuses
     */
    public function setDestinationStatuses($destinationStatuses)
    {
        $this->destinationStatuses = $destinationStatuses;
    }

    /**
     * @return mixed
     */
    public function getDestinationStatuses()
    {
        return $this->destinationStatuses;
    }

    /**
     * @return mixed
     */
    public function getGoogleExpirationDate()
    {
        return $this->googleExpirationDate;
    }

    /**
     * @param $googleExpirationDate
     */
    public function setGoogleExpirationDate($googleExpirationDate)
    {
        $this->googleExpirationDate = $googleExpirationDate;
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
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * @param $lastUpdateDate
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
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
}

/**
 * Class Google_Service_ShoppingContent_ProductStatusDataQualityIssue
 */
class Google_Service_ShoppingContent_ProductStatusDataQualityIssue extends Google_Model
{
    public $detail;
    public $fetchStatus;
    public $id;
    public $location;
    public $severity;
    public $timestamp;
    public $valueOnLandingPage;
    public $valueProvided;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * @return mixed
     */
    public function getFetchStatus()
    {
        return $this->fetchStatus;
    }

    /**
     * @param $fetchStatus
     */
    public function setFetchStatus($fetchStatus)
    {
        $this->fetchStatus = $fetchStatus;
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
    public function getValueOnLandingPage()
    {
        return $this->valueOnLandingPage;
    }

    /**
     * @param $valueOnLandingPage
     */
    public function setValueOnLandingPage($valueOnLandingPage)
    {
        $this->valueOnLandingPage = $valueOnLandingPage;
    }

    /**
     * @return mixed
     */
    public function getValueProvided()
    {
        return $this->valueProvided;
    }

    /**
     * @param $valueProvided
     */
    public function setValueProvided($valueProvided)
    {
        $this->valueProvided = $valueProvided;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductStatusDestinationStatus
 */
class Google_Service_ShoppingContent_ProductStatusDestinationStatus extends Google_Model
{
    public $approvalStatus;
    public $destination;
    public $intention;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApprovalStatus()
    {
        return $this->approvalStatus;
    }

    /**
     * @param $approvalStatus
     */
    public function setApprovalStatus($approvalStatus)
    {
        $this->approvalStatus = $approvalStatus;
    }

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
     * @return mixed
     */
    public function getIntention()
    {
        return $this->intention;
    }

    /**
     * @param $intention
     */
    public function setIntention($intention)
    {
        $this->intention = $intention;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductTax
 */
class Google_Service_ShoppingContent_ProductTax extends Google_Model
{
    public $country;
    public $locationId;
    public $postalCode;
    public $rate;
    public $region;
    public $taxShip;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
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
    public function getTaxShip()
    {
        return $this->taxShip;
    }

    /**
     * @param $taxShip
     */
    public function setTaxShip($taxShip)
    {
        $this->taxShip = $taxShip;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure
 */
class Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure extends Google_Model
{
    public $unit;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
 * Class Google_Service_ShoppingContent_ProductUnitPricingMeasure
 */
class Google_Service_ShoppingContent_ProductUnitPricingMeasure extends Google_Model
{
    public $unit;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
 * Class Google_Service_ShoppingContent_ProductsCustomBatchRequest
 */
class Google_Service_ShoppingContent_ProductsCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_ProductsCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_ProductsCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_ProductsCustomBatchRequestEntry extends Google_Model
{
    public $batchId;
    public $merchantId;
    public $method;
    public $productId;
    protected $internal_gapi_mappings = [];
    protected $productType = 'Google_Service_ShoppingContent_Product';
    protected $productDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @param Google_Service_ShoppingContent_Product $product
     */
    public function setProduct(Google_Service_ShoppingContent_Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductsCustomBatchResponse
 */
class Google_Service_ShoppingContent_ProductsCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_ProductsCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_ProductsCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_ProductsCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';
    protected $productType = 'Google_Service_ShoppingContent_Product';
    protected $productDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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

    /**
     * @param Google_Service_ShoppingContent_Product $product
     */
    public function setProduct(Google_Service_ShoppingContent_Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductsListResponse
 */
class Google_Service_ShoppingContent_ProductsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_Product';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest
 */
class Google_Service_ShoppingContent_ProductstatusesCustomBatchRequest extends Google_Collection
{
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_ProductstatusesCustomBatchRequestEntry';
    protected $entriesDataType = 'array';


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
 * Class Google_Service_ShoppingContent_ProductstatusesCustomBatchRequestEntry
 */
class Google_Service_ShoppingContent_ProductstatusesCustomBatchRequestEntry extends Google_Model
{
    public $batchId;
    public $merchantId;
    public $method;
    public $productId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductstatusesCustomBatchResponse
 */
class Google_Service_ShoppingContent_ProductstatusesCustomBatchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_ShoppingContent_ProductstatusesCustomBatchResponseEntry';
    protected $entriesDataType = 'array';

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
 * Class Google_Service_ShoppingContent_ProductstatusesCustomBatchResponseEntry
 */
class Google_Service_ShoppingContent_ProductstatusesCustomBatchResponseEntry extends Google_Model
{
    public $batchId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_ShoppingContent_Errors';
    protected $errorsDataType = '';
    protected $productStatusType = 'Google_Service_ShoppingContent_ProductStatus';
    protected $productStatusDataType = '';

    /**
     * @return mixed
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * @param $batchId
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
    }

    /**
     * @param Google_Service_ShoppingContent_Errors $errors
     */
    public function setErrors(Google_Service_ShoppingContent_Errors $errors)
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

    /**
     * @param Google_Service_ShoppingContent_ProductStatus $productStatus
     */
    public function setProductStatus(Google_Service_ShoppingContent_ProductStatus $productStatus)
    {
        $this->productStatus = $productStatus;
    }

    /**
     * @return mixed
     */
    public function getProductStatus()
    {
        return $this->productStatus;
    }
}

/**
 * Class Google_Service_ShoppingContent_ProductstatusesListResponse
 */
class Google_Service_ShoppingContent_ProductstatusesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'resources';
    protected $internal_gapi_mappings = [];
    protected $resourcesType = 'Google_Service_ShoppingContent_ProductStatus';
    protected $resourcesDataType = 'array';

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
     * @param $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    /**
     * @return mixed
     */
    public function getResources()
    {
        return $this->resources;
    }
}

/**
 * Class Google_Service_ShoppingContent_Weight
 */
class Google_Service_ShoppingContent_Weight extends Google_Model
{
    public $unit;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
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
