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
 * Service definition for Oauth2 (v2).
 *
 * <p>
 * Lets you access OAuth2 protocol related APIs.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/accounts/docs/OAuth2" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Oauth2 extends Google_Service
{
    /** Know your basic profile info and list of people in your circles.. */
    const PLUS_LOGIN =
        "https://www.googleapis.com/auth/plus.login";
    /** Know who you are on Google. */
    const PLUS_ME =
        "https://www.googleapis.com/auth/plus.me";
    /** View your email address. */
    const USERINFO_EMAIL =
        "https://www.googleapis.com/auth/userinfo.email";
    /** View your basic profile info. */
    const USERINFO_PROFILE =
        "https://www.googleapis.com/auth/userinfo.profile";

    public $userinfo;
    public $userinfo_v2_me;
    private $base_methods;

    /**
     * Constructs the internal representation of the Oauth2 service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = '';
        $this->version = 'v2';
        $this->serviceName = 'oauth2';

        $this->userinfo = new Google_Service_Oauth2_Userinfo_Resource(
            $this,
            $this->serviceName,
            'userinfo',
            [
                'methods' => [
                    'get' => [
                        'path' => 'oauth2/v2/userinfo',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->userinfo_v2_me = new Google_Service_Oauth2_UserinfoV2Me_Resource(
            $this,
            $this->serviceName,
            'me',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userinfo/v2/me',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->base_methods = new Google_Service_Resource(
            $this,
            $this->serviceName,
            '',
            [
                'methods' => [
                    'getCertForOpenIdConnect' => [
                        'path' => 'oauth2/v2/certs',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'tokeninfo' => [
                        'path' => 'oauth2/v2/tokeninfo',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'access_token' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id_token' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'token_handle' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
    }

    /**
     * (getCertForOpenIdConnect)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getCertForOpenIdConnect($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->base_methods->call('getCertForOpenIdConnect', [$params], "Google_Service_Oauth2_Jwk");
    }

    /**
     * (tokeninfo)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string access_token
     * @opt_param string id_token
     * @opt_param string token_handle
     */
    public function tokeninfo($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->base_methods->call('tokeninfo', [$params], "Google_Service_Oauth2_Tokeninfo");
    }
}


/**
 * The "userinfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $userinfo = $oauth2Service->userinfo;
 *  </code>
 */
class Google_Service_Oauth2_Userinfo_Resource extends Google_Service_Resource
{

    /**
     * (userinfo.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Oauth2_Userinfoplus");
    }
}

/**
 * The "v2" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $v2 = $oauth2Service->v2;
 *  </code>
 */
class Google_Service_Oauth2_UserinfoV2_Resource extends Google_Service_Resource
{
}

/**
 * The "me" collection of methods.
 * Typical usage is:
 *  <code>
 *   $oauth2Service = new Google_Service_Oauth2(...);
 *   $me = $oauth2Service->me;
 *  </code>
 */
class Google_Service_Oauth2_UserinfoV2Me_Resource extends Google_Service_Resource
{

    /**
     * (me.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Oauth2_Userinfoplus");
    }
}


/**
 * Class Google_Service_Oauth2_Jwk
 */
class Google_Service_Oauth2_Jwk extends Google_Collection
{
    protected $collection_key = 'keys';
    protected $internal_gapi_mappings = [];
    protected $keysType = 'Google_Service_Oauth2_JwkKeys';
    protected $keysDataType = 'array';


    /**
     * @param $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }
}

/**
 * Class Google_Service_Oauth2_JwkKeys
 */
class Google_Service_Oauth2_JwkKeys extends Google_Model
{
    public $alg;
    public $e;
    public $kid;
    public $kty;
    public $n;
    public $use;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlg()
    {
        return $this->alg;
    }

    /**
     * @param $alg
     */
    public function setAlg($alg)
    {
        $this->alg = $alg;
    }

    /**
     * @return mixed
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * @param $e
     */
    public function setE($e)
    {
        $this->e = $e;
    }

    /**
     * @return mixed
     */
    public function getKid()
    {
        return $this->kid;
    }

    /**
     * @param $kid
     */
    public function setKid($kid)
    {
        $this->kid = $kid;
    }

    /**
     * @return mixed
     */
    public function getKty()
    {
        return $this->kty;
    }

    /**
     * @param $kty
     */
    public function setKty($kty)
    {
        $this->kty = $kty;
    }

    /**
     * @return mixed
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * @param $n
     */
    public function setN($n)
    {
        $this->n = $n;
    }

    /**
     * @return mixed
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * @param $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }
}

/**
 * Class Google_Service_Oauth2_Tokeninfo
 */
class Google_Service_Oauth2_Tokeninfo extends Google_Model
{
    public $accessType;
    public $audience;
    public $email;
    public $expiresIn;
    public $issuedTo;
    public $scope;
    public $tokenHandle;
    public $userId;
    public $verifiedEmail;
    protected $internal_gapi_mappings = [
        "accessType" => "access_type",
        "expiresIn" => "expires_in",
        "issuedTo" => "issued_to",
        "tokenHandle" => "token_handle",
        "userId" => "user_id",
        "verifiedEmail" => "verified_email",
    ];

    /**
     * @return mixed
     */
    public function getAccessType()
    {
        return $this->accessType;
    }

    /**
     * @param $accessType
     */
    public function setAccessType($accessType)
    {
        $this->accessType = $accessType;
    }

    /**
     * @return mixed
     */
    public function getAudience()
    {
        return $this->audience;
    }

    /**
     * @param $audience
     */
    public function setAudience($audience)
    {
        $this->audience = $audience;
    }

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
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * @param $expiresIn
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return mixed
     */
    public function getIssuedTo()
    {
        return $this->issuedTo;
    }

    /**
     * @param $issuedTo
     */
    public function setIssuedTo($issuedTo)
    {
        $this->issuedTo = $issuedTo;
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
    public function getTokenHandle()
    {
        return $this->tokenHandle;
    }

    /**
     * @param $tokenHandle
     */
    public function setTokenHandle($tokenHandle)
    {
        $this->tokenHandle = $tokenHandle;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getVerifiedEmail()
    {
        return $this->verifiedEmail;
    }

    /**
     * @param $verifiedEmail
     */
    public function setVerifiedEmail($verifiedEmail)
    {
        $this->verifiedEmail = $verifiedEmail;
    }
}

/**
 * Class Google_Service_Oauth2_Userinfoplus
 */
class Google_Service_Oauth2_Userinfoplus extends Google_Model
{
    public $email;
    public $familyName;
    public $gender;
    public $givenName;
    public $hd;
    public $id;
    public $link;
    public $locale;
    public $name;
    public $picture;
    public $verifiedEmail;
    protected $internal_gapi_mappings = [
        "familyName" => "family_name",
        "givenName" => "given_name",
        "verifiedEmail" => "verified_email",
    ];

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
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @param $familyName
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;
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
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param $givenName
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
    }

    /**
     * @return mixed
     */
    public function getHd()
    {
        return $this->hd;
    }

    /**
     * @param $hd
     */
    public function setHd($hd)
    {
        $this->hd = $hd;
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
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
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
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getVerifiedEmail()
    {
        return $this->verifiedEmail;
    }

    /**
     * @param $verifiedEmail
     */
    public function setVerifiedEmail($verifiedEmail)
    {
        $this->verifiedEmail = $verifiedEmail;
    }
}
