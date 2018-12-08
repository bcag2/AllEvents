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
 * Service definition for Reseller (v1).
 *
 * <p>
 * Lets you create and manage your customers and their subscriptions.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/reseller/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Reseller extends Google_Service
{
    /** Manage users on your domain. */
    const APPS_ORDER =
        "https://www.googleapis.com/auth/apps.order";
    /** Manage users on your domain. */
    const APPS_ORDER_READONLY =
        "https://www.googleapis.com/auth/apps.order.readonly";

    public $customers;
    public $subscriptions;


    /**
     * Constructs the internal representation of the Reseller service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'apps/reseller/v1/';
        $this->version = 'v1';
        $this->serviceName = 'reseller';

        $this->customers = new Google_Service_Reseller_Customers_Resource(
            $this,
            $this->serviceName,
            'customers',
            [
                'methods' => [
                    'get' => [
                        'path' => 'customers/{customerId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'customers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerAuthToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'customers/{customerId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'customers/{customerId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->subscriptions = new Google_Service_Reseller_Subscriptions_Resource(
            $this,
            $this->serviceName,
            'subscriptions',
            [
                'methods' => [
                    'activate' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/activate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'changePlan' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/changePlan',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'changeRenewalSettings' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/changeRenewalSettings',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'changeSeats' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/changeSeats',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deletionType' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'customers/{customerId}/subscriptions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'customerAuthToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerAuthToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customerId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'customerNamePrefix' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'startPaidService' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/startPaidService',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'suspend' => [
                        'path' => 'customers/{customerId}/subscriptions/{subscriptionId}/suspend',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'subscriptionId' => [
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
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $customers = $resellerService->customers;
 *  </code>
 */
class Google_Service_Reseller_Customers_Resource extends Google_Service_Resource
{

    /**
     * Gets a customer resource if one exists and is owned by the reseller.
     * (customers.get)
     *
     * @param string $customerId Id of the Customer
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($customerId, $optParams = [])
    {
        $params = ['customerId' => $customerId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Reseller_Customer");
    }

    /**
     * Creates a customer resource if one does not already exist. (customers.insert)
     *
     * @param Google_Customer|Google_Service_Reseller_Customer $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerAuthToken An auth token needed for inserting a
     * customer for which domain already exists. Can be generated at
     * https://www.google.com/a/cpanel//TransferToken. Optional.
     */
    public function insert(Google_Service_Reseller_Customer $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Reseller_Customer");
    }

    /**
     * Update a customer resource if one it exists and is owned by the reseller.
     * This method supports patch semantics. (customers.patch)
     *
     * @param string $customerId Id of the Customer
     * @param Google_Customer|Google_Service_Reseller_Customer $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($customerId, Google_Service_Reseller_Customer $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Reseller_Customer");
    }

    /**
     * Update a customer resource if one it exists and is owned by the reseller.
     * (customers.update)
     *
     * @param string $customerId Id of the Customer
     * @param Google_Customer|Google_Service_Reseller_Customer $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($customerId, Google_Service_Reseller_Customer $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Reseller_Customer");
    }
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $subscriptions = $resellerService->subscriptions;
 *  </code>
 */
class Google_Service_Reseller_Subscriptions_Resource extends Google_Service_Resource
{

    /**
     * Activates a subscription previously suspended by the reseller
     * (subscriptions.activate)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                               customer
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function activate($customerId, $subscriptionId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
        $params = array_merge($params, $optParams);

        return $this->call('activate', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Changes the plan of a subscription (subscriptions.changePlan)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                                                                                           customer
     * @param Google_ChangePlanRequest|Google_Service_Reseller_ChangePlanRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function changePlan($customerId, $subscriptionId, Google_Service_Reseller_ChangePlanRequest $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('changePlan', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Changes the renewal settings of a subscription
     * (subscriptions.changeRenewalSettings)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                                                                                       customer
     * @param Google_RenewalSettings|Google_Service_Reseller_RenewalSettings $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function changeRenewalSettings($customerId, $subscriptionId, Google_Service_Reseller_RenewalSettings $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('changeRenewalSettings', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Changes the seats configuration of a subscription (subscriptions.changeSeats)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                                                                   customer
     * @param Google_Seats|Google_Service_Reseller_Seats $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function changeSeats($customerId, $subscriptionId, Google_Service_Reseller_Seats $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('changeSeats', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Cancels/Downgrades a subscription. (subscriptions.delete)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                               customer
     * @param string $deletionType Whether the subscription is to be fully cancelled
     *                               or downgraded
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($customerId, $subscriptionId, $deletionType, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'deletionType' => $deletionType];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a subscription of the customer. (subscriptions.get)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                               customer
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($customerId, $subscriptionId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Creates/Transfers a subscription for the customer. (subscriptions.insert)
     *
     * @param string $customerId Id of the Customer
     * @param Google_Service_Reseller_Subscription|Google_Subscription $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerAuthToken An auth token needed for transferring a
     * subscription. Can be generated at https://www.google.com/a/cpanel/customer-
     * domain/TransferToken. Optional.
     */
    public function insert($customerId, Google_Service_Reseller_Subscription $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Lists subscriptions of a reseller, optionally filtered by a customer name
     * prefix. (subscriptions.listSubscriptions)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customerAuthToken An auth token needed if the customer is
     * not a resold customer of this reseller. Can be generated at
     * https://www.google.com/a/cpanel/customer-domain/TransferToken.Optional.
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string customerId Id of the Customer
     * @opt_param string maxResults Maximum number of results to return
     * @opt_param string customerNamePrefix Prefix of the customer's domain name by
     * which the subscriptions should be filtered. Optional
     */
    public function listSubscriptions($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Reseller_Subscriptions");
    }

    /**
     * Starts paid service of a trial subscription (subscriptions.startPaidService)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                               customer
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function startPaidService($customerId, $subscriptionId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
        $params = array_merge($params, $optParams);

        return $this->call('startPaidService', [$params], "Google_Service_Reseller_Subscription");
    }

    /**
     * Suspends an active subscription (subscriptions.suspend)
     *
     * @param string $customerId Id of the Customer
     * @param string $subscriptionId Id of the subscription, which is unique for a
     *                               customer
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function suspend($customerId, $subscriptionId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
        $params = array_merge($params, $optParams);

        return $this->call('suspend', [$params], "Google_Service_Reseller_Subscription");
    }
}


/**
 * Class Google_Service_Reseller_Address
 */
class Google_Service_Reseller_Address extends Google_Model
{
    public $addressLine1;
    public $addressLine2;
    public $addressLine3;
    public $contactName;
    public $countryCode;
    public $kind;
    public $locality;
    public $organizationName;
    public $postalCode;
    public $region;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param $addressLine1
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param $addressLine2
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @return mixed
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param $addressLine3
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param $contactName
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
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
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return mixed
     */
    public function getOrganizationName()
    {
        return $this->organizationName;
    }

    /**
     * @param $organizationName
     */
    public function setOrganizationName($organizationName)
    {
        $this->organizationName = $organizationName;
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
}

/**
 * Class Google_Service_Reseller_ChangePlanRequest
 */
class Google_Service_Reseller_ChangePlanRequest extends Google_Model
{
    public $kind;
    public $planName;
    public $purchaseOrderId;
    protected $internal_gapi_mappings = [];
    protected $seatsType = 'Google_Service_Reseller_Seats';
    protected $seatsDataType = '';

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
    public function getPlanName()
    {
        return $this->planName;
    }

    /**
     * @param $planName
     */
    public function setPlanName($planName)
    {
        $this->planName = $planName;
    }

    /**
     * @return mixed
     */
    public function getPurchaseOrderId()
    {
        return $this->purchaseOrderId;
    }

    /**
     * @param $purchaseOrderId
     */
    public function setPurchaseOrderId($purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;
    }

    /**
     * @param Google_Service_Reseller_Seats $seats
     */
    public function setSeats(Google_Service_Reseller_Seats $seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }
}

/**
 * Class Google_Service_Reseller_Customer
 */
class Google_Service_Reseller_Customer extends Google_Model
{
    public $alternateEmail;
    public $customerDomain;
    public $customerId;
    public $kind;
    public $phoneNumber;
    public $resourceUiUrl;
    protected $internal_gapi_mappings = [];
    protected $postalAddressType = 'Google_Service_Reseller_Address';
    protected $postalAddressDataType = '';

    /**
     * @return mixed
     */
    public function getAlternateEmail()
    {
        return $this->alternateEmail;
    }

    /**
     * @param $alternateEmail
     */
    public function setAlternateEmail($alternateEmail)
    {
        $this->alternateEmail = $alternateEmail;
    }

    /**
     * @return mixed
     */
    public function getCustomerDomain()
    {
        return $this->customerDomain;
    }

    /**
     * @param $customerDomain
     */
    public function setCustomerDomain($customerDomain)
    {
        $this->customerDomain = $customerDomain;
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

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param Google_Service_Reseller_Address $postalAddress
     */
    public function setPostalAddress(Google_Service_Reseller_Address $postalAddress)
    {
        $this->postalAddress = $postalAddress;
    }

    /**
     * @return mixed
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * @return mixed
     */
    public function getResourceUiUrl()
    {
        return $this->resourceUiUrl;
    }

    /**
     * @param $resourceUiUrl
     */
    public function setResourceUiUrl($resourceUiUrl)
    {
        $this->resourceUiUrl = $resourceUiUrl;
    }
}

/**
 * Class Google_Service_Reseller_RenewalSettings
 */
class Google_Service_Reseller_RenewalSettings extends Google_Model
{
    public $kind;
    public $renewalType;
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
    public function getRenewalType()
    {
        return $this->renewalType;
    }

    /**
     * @param $renewalType
     */
    public function setRenewalType($renewalType)
    {
        $this->renewalType = $renewalType;
    }
}

/**
 * Class Google_Service_Reseller_Seats
 */
class Google_Service_Reseller_Seats extends Google_Model
{
    public $kind;
    public $licensedNumberOfSeats;
    public $maximumNumberOfSeats;
    public $numberOfSeats;
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
    public function getLicensedNumberOfSeats()
    {
        return $this->licensedNumberOfSeats;
    }

    /**
     * @param $licensedNumberOfSeats
     */
    public function setLicensedNumberOfSeats($licensedNumberOfSeats)
    {
        $this->licensedNumberOfSeats = $licensedNumberOfSeats;
    }

    /**
     * @return mixed
     */
    public function getMaximumNumberOfSeats()
    {
        return $this->maximumNumberOfSeats;
    }

    /**
     * @param $maximumNumberOfSeats
     */
    public function setMaximumNumberOfSeats($maximumNumberOfSeats)
    {
        $this->maximumNumberOfSeats = $maximumNumberOfSeats;
    }

    /**
     * @return mixed
     */
    public function getNumberOfSeats()
    {
        return $this->numberOfSeats;
    }

    /**
     * @param $numberOfSeats
     */
    public function setNumberOfSeats($numberOfSeats)
    {
        $this->numberOfSeats = $numberOfSeats;
    }
}

/**
 * Class Google_Service_Reseller_Subscription
 */
class Google_Service_Reseller_Subscription extends Google_Model
{
    public $billingMethod;
    public $creationTime;
    public $customerId;
    public $kind;
    public $purchaseOrderId;
    public $resourceUiUrl;
    public $skuId;
    public $status;
    public $subscriptionId;
    protected $internal_gapi_mappings = [];
    protected $planType = 'Google_Service_Reseller_SubscriptionPlan';
    protected $planDataType = '';
    protected $renewalSettingsType = 'Google_Service_Reseller_RenewalSettings';
    protected $renewalSettingsDataType = '';
    protected $seatsType = 'Google_Service_Reseller_Seats';
    protected $seatsDataType = '';
    protected $transferInfoType = 'Google_Service_Reseller_SubscriptionTransferInfo';
    protected $transferInfoDataType = '';
    protected $trialSettingsType = 'Google_Service_Reseller_SubscriptionTrialSettings';
    protected $trialSettingsDataType = '';

    /**
     * @return mixed
     */
    public function getBillingMethod()
    {
        return $this->billingMethod;
    }

    /**
     * @param $billingMethod
     */
    public function setBillingMethod($billingMethod)
    {
        $this->billingMethod = $billingMethod;
    }

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
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

    /**
     * @param Google_Service_Reseller_SubscriptionPlan $plan
     */
    public function setPlan(Google_Service_Reseller_SubscriptionPlan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * @return mixed
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @return mixed
     */
    public function getPurchaseOrderId()
    {
        return $this->purchaseOrderId;
    }

    /**
     * @param $purchaseOrderId
     */
    public function setPurchaseOrderId($purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;
    }

    /**
     * @param Google_Service_Reseller_RenewalSettings $renewalSettings
     */
    public function setRenewalSettings(Google_Service_Reseller_RenewalSettings $renewalSettings)
    {
        $this->renewalSettings = $renewalSettings;
    }

    /**
     * @return mixed
     */
    public function getRenewalSettings()
    {
        return $this->renewalSettings;
    }

    /**
     * @return mixed
     */
    public function getResourceUiUrl()
    {
        return $this->resourceUiUrl;
    }

    /**
     * @param $resourceUiUrl
     */
    public function setResourceUiUrl($resourceUiUrl)
    {
        $this->resourceUiUrl = $resourceUiUrl;
    }

    /**
     * @param Google_Service_Reseller_Seats $seats
     */
    public function setSeats(Google_Service_Reseller_Seats $seats)
    {
        $this->seats = $seats;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * @return mixed
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * @param $skuId
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;
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
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param $subscriptionId
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @param Google_Service_Reseller_SubscriptionTransferInfo $transferInfo
     */
    public function setTransferInfo(Google_Service_Reseller_SubscriptionTransferInfo $transferInfo)
    {
        $this->transferInfo = $transferInfo;
    }

    /**
     * @return mixed
     */
    public function getTransferInfo()
    {
        return $this->transferInfo;
    }

    /**
     * @param Google_Service_Reseller_SubscriptionTrialSettings $trialSettings
     */
    public function setTrialSettings(Google_Service_Reseller_SubscriptionTrialSettings $trialSettings)
    {
        $this->trialSettings = $trialSettings;
    }

    /**
     * @return mixed
     */
    public function getTrialSettings()
    {
        return $this->trialSettings;
    }
}

/**
 * Class Google_Service_Reseller_SubscriptionPlan
 */
class Google_Service_Reseller_SubscriptionPlan extends Google_Model
{
    public $isCommitmentPlan;
    public $planName;
    protected $internal_gapi_mappings = [];
    protected $commitmentIntervalType = 'Google_Service_Reseller_SubscriptionPlanCommitmentInterval';
    protected $commitmentIntervalDataType = '';

    /**
     * @param Google_Service_Reseller_SubscriptionPlanCommitmentInterval $commitmentInterval
     */
    public function setCommitmentInterval(Google_Service_Reseller_SubscriptionPlanCommitmentInterval $commitmentInterval)
    {
        $this->commitmentInterval = $commitmentInterval;
    }

    /**
     * @return mixed
     */
    public function getCommitmentInterval()
    {
        return $this->commitmentInterval;
    }

    /**
     * @return mixed
     */
    public function getIsCommitmentPlan()
    {
        return $this->isCommitmentPlan;
    }

    /**
     * @param $isCommitmentPlan
     */
    public function setIsCommitmentPlan($isCommitmentPlan)
    {
        $this->isCommitmentPlan = $isCommitmentPlan;
    }

    /**
     * @return mixed
     */
    public function getPlanName()
    {
        return $this->planName;
    }

    /**
     * @param $planName
     */
    public function setPlanName($planName)
    {
        $this->planName = $planName;
    }
}

/**
 * Class Google_Service_Reseller_SubscriptionPlanCommitmentInterval
 */
class Google_Service_Reseller_SubscriptionPlanCommitmentInterval extends Google_Model
{
    public $endTime;
    public $startTime;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Reseller_SubscriptionTransferInfo
 */
class Google_Service_Reseller_SubscriptionTransferInfo extends Google_Model
{
    public $minimumTransferableSeats;
    public $transferabilityExpirationTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMinimumTransferableSeats()
    {
        return $this->minimumTransferableSeats;
    }

    /**
     * @param $minimumTransferableSeats
     */
    public function setMinimumTransferableSeats($minimumTransferableSeats)
    {
        $this->minimumTransferableSeats = $minimumTransferableSeats;
    }

    /**
     * @return mixed
     */
    public function getTransferabilityExpirationTime()
    {
        return $this->transferabilityExpirationTime;
    }

    /**
     * @param $transferabilityExpirationTime
     */
    public function setTransferabilityExpirationTime($transferabilityExpirationTime)
    {
        $this->transferabilityExpirationTime = $transferabilityExpirationTime;
    }
}

/**
 * Class Google_Service_Reseller_SubscriptionTrialSettings
 */
class Google_Service_Reseller_SubscriptionTrialSettings extends Google_Model
{
    public $isInTrial;
    public $trialEndTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsInTrial()
    {
        return $this->isInTrial;
    }

    /**
     * @param $isInTrial
     */
    public function setIsInTrial($isInTrial)
    {
        $this->isInTrial = $isInTrial;
    }

    /**
     * @return mixed
     */
    public function getTrialEndTime()
    {
        return $this->trialEndTime;
    }

    /**
     * @param $trialEndTime
     */
    public function setTrialEndTime($trialEndTime)
    {
        $this->trialEndTime = $trialEndTime;
    }
}

/**
 * Class Google_Service_Reseller_Subscriptions
 */
class Google_Service_Reseller_Subscriptions extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'subscriptions';
    protected $internal_gapi_mappings = [];
    protected $subscriptionsType = 'Google_Service_Reseller_Subscription';
    protected $subscriptionsDataType = 'array';

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
     * @param $subscriptions
     */
    public function setSubscriptions($subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @return mixed
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }
}
