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
 * Service definition for SiteVerification (v1).
 *
 * <p>
 * Lets you programatically verify ownership of websites or domains with Google.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/site-verification/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_SiteVerification extends Google_Service
{
    /** Manage the list of sites and domains you control. */
    const SITEVERIFICATION =
        "https://www.googleapis.com/auth/siteverification";
    /** Manage your new site verifications with Google. */
    const SITEVERIFICATION_VERIFY_ONLY =
        "https://www.googleapis.com/auth/siteverification.verify_only";

    public $webResource;


    /**
     * Constructs the internal representation of the SiteVerification service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'siteVerification/v1/';
        $this->version = 'v1';
        $this->serviceName = 'siteVerification';

        $this->webResource = new Google_Service_SiteVerification_WebResource_Resource(
            $this,
            $this->serviceName,
            'webResource',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'webResource/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'webResource/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getToken' => [
                        'path' => 'token',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'insert' => [
                        'path' => 'webResource',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'verificationMethod' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'webResource',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'webResource/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'webResource/{id}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'id' => [
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
 * The "webResource" collection of methods.
 * Typical usage is:
 *  <code>
 *   $siteVerificationService = new Google_Service_SiteVerification(...);
 *   $webResource = $siteVerificationService->webResource;
 *  </code>
 */
class Google_Service_SiteVerification_WebResource_Resource extends Google_Service_Resource
{

    /**
     * Relinquish ownership of a website or domain. (webResource.delete)
     *
     * @param string $id The id of a verified site or domain.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Get the most current data for a website or domain. (webResource.get)
     *
     * @param string $id The id of a verified site or domain.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
    }

    /**
     * Get a verification token for placing on a website or domain.
     * (webResource.getToken)
     *
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest|Google_SiteVerificationWebResourceGettokenRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getToken(Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getToken', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceGettokenResponse");
    }

    /**
     * Attempt verification of a website or domain. (webResource.insert)
     *
     * @param string $verificationMethod The method to use for verifying a site or
     *                                                                                                                                           domain.
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource|Google_SiteVerificationWebResourceResource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($verificationMethod, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = [])
    {
        $params = ['verificationMethod' => $verificationMethod, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
    }

    /**
     * Get the list of your verified websites and domains.
     * (webResource.listWebResource)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listWebResource($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceListResponse");
    }

    /**
     * Modify the list of owners for your website or domain. This method supports
     * patch semantics. (webResource.patch)
     *
     * @param string $id The id of a verified site or domain.
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource|Google_SiteVerificationWebResourceResource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
    }

    /**
     * Modify the list of owners for your website or domain. (webResource.update)
     *
     * @param string $id The id of a verified site or domain.
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceResource|Google_SiteVerificationWebResourceResource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($id, Google_Service_SiteVerification_SiteVerificationWebResourceResource $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_SiteVerification_SiteVerificationWebResourceResource");
    }
}


/**
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequest extends Google_Model
{
    public $verificationMethod;
    protected $internal_gapi_mappings = [];
    protected $siteType = 'Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequestSite';
    protected $siteDataType = '';

    /**
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequestSite $site
     */
    public function setSite(Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequestSite $site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return mixed
     */
    public function getVerificationMethod()
    {
        return $this->verificationMethod;
    }

    /**
     * @param $verificationMethod
     */
    public function setVerificationMethod($verificationMethod)
    {
        $this->verificationMethod = $verificationMethod;
    }
}

/**
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequestSite
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenRequestSite extends Google_Model
{
    public $identifier;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
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
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenResponse
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceGettokenResponse extends Google_Model
{
    public $method;
    public $token;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceListResponse
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceListResponse extends Google_Collection
{
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_SiteVerification_SiteVerificationWebResourceResource';
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
}

/**
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceResource
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceResource extends Google_Collection
{
    public $id;
    public $owners;
    protected $collection_key = 'owners';
    protected $internal_gapi_mappings = [];
    protected $siteType = 'Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite';
    protected $siteDataType = '';

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
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @param $owners
     */
    public function setOwners($owners)
    {
        $this->owners = $owners;
    }

    /**
     * @param Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite $site
     */
    public function setSite(Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite $site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }
}

/**
 * Class Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite
 */
class Google_Service_SiteVerification_SiteVerificationWebResourceResourceSite extends Google_Model
{
    public $identifier;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
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
