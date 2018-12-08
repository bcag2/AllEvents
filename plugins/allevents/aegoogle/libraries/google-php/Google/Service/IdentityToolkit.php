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
 * Service definition for IdentityToolkit (v3).
 *
 * <p>
 * Help the third party sites to implement federated login.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/identity-toolkit/v3/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_IdentityToolkit extends Google_Service
{


    public $relyingparty;


    /**
     * Constructs the internal representation of the IdentityToolkit service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'identitytoolkit/v3/relyingparty/';
        $this->version = 'v3';
        $this->serviceName = 'identitytoolkit';

        $this->relyingparty = new Google_Service_IdentityToolkit_Relyingparty_Resource(
            $this,
            $this->serviceName,
            'relyingparty',
            [
                'methods' => [
                    'createAuthUri' => [
                        'path' => 'createAuthUri',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'deleteAccount' => [
                        'path' => 'deleteAccount',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'downloadAccount' => [
                        'path' => 'downloadAccount',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'getAccountInfo' => [
                        'path' => 'getAccountInfo',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'getOobConfirmationCode' => [
                        'path' => 'getOobConfirmationCode',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'getPublicKeys' => [
                        'path' => 'publicKeys',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'getRecaptchaParam' => [
                        'path' => 'getRecaptchaParam',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'resetPassword' => [
                        'path' => 'resetPassword',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'setAccountInfo' => [
                        'path' => 'setAccountInfo',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'uploadAccount' => [
                        'path' => 'uploadAccount',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'verifyAssertion' => [
                        'path' => 'verifyAssertion',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'verifyPassword' => [
                        'path' => 'verifyPassword',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "relyingparty" collection of methods.
 * Typical usage is:
 *  <code>
 *   $identitytoolkitService = new Google_Service_IdentityToolkit(...);
 *   $relyingparty = $identitytoolkitService->relyingparty;
 *  </code>
 */
class Google_Service_IdentityToolkit_Relyingparty_Resource extends Google_Service_Resource
{

    /**
     * Creates the URI used by the IdP to authenticate the user.
     * (relyingparty.createAuthUri)
     *
     * @param Google_IdentitytoolkitRelyingpartyCreateAuthUriRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function createAuthUri(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('createAuthUri', [$params], "Google_Service_IdentityToolkit_CreateAuthUriResponse");
    }

    /**
     * Delete user account. (relyingparty.deleteAccount)
     *
     * @param Google_IdentitytoolkitRelyingpartyDeleteAccountRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deleteAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('deleteAccount', [$params], "Google_Service_IdentityToolkit_DeleteAccountResponse");
    }

    /**
     * Batch download user accounts. (relyingparty.downloadAccount)
     *
     * @param Google_IdentitytoolkitRelyingpartyDownloadAccountRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function downloadAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('downloadAccount', [$params], "Google_Service_IdentityToolkit_DownloadAccountResponse");
    }

    /**
     * Returns the account info. (relyingparty.getAccountInfo)
     *
     * @param Google_IdentitytoolkitRelyingpartyGetAccountInfoRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getAccountInfo(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getAccountInfo', [$params], "Google_Service_IdentityToolkit_GetAccountInfoResponse");
    }

    /**
     * Get a code for user action confirmation.
     * (relyingparty.getOobConfirmationCode)
     *
     * @param Google_Relyingparty|Google_Service_IdentityToolkit_Relyingparty $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getOobConfirmationCode(Google_Service_IdentityToolkit_Relyingparty $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getOobConfirmationCode', [$params], "Google_Service_IdentityToolkit_GetOobConfirmationCodeResponse");
    }

    /**
     * Get token signing public key. (relyingparty.getPublicKeys)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getPublicKeys($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('getPublicKeys', [$params], "Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetPublicKeysResponse");
    }

    /**
     * Get recaptcha secure param. (relyingparty.getRecaptchaParam)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getRecaptchaParam($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('getRecaptchaParam', [$params], "Google_Service_IdentityToolkit_GetRecaptchaParamResponse");
    }

    /**
     * Reset password for a user. (relyingparty.resetPassword)
     *
     * @param Google_IdentitytoolkitRelyingpartyResetPasswordRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetPassword(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('resetPassword', [$params], "Google_Service_IdentityToolkit_ResetPasswordResponse");
    }

    /**
     * Set account info for a user. (relyingparty.setAccountInfo)
     *
     * @param Google_IdentitytoolkitRelyingpartySetAccountInfoRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setAccountInfo(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('setAccountInfo', [$params], "Google_Service_IdentityToolkit_SetAccountInfoResponse");
    }

    /**
     * Batch upload existing user accounts. (relyingparty.uploadAccount)
     *
     * @param Google_IdentitytoolkitRelyingpartyUploadAccountRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function uploadAccount(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('uploadAccount', [$params], "Google_Service_IdentityToolkit_UploadAccountResponse");
    }

    /**
     * Verifies the assertion returned by the IdP. (relyingparty.verifyAssertion)
     *
     * @param Google_IdentitytoolkitRelyingpartyVerifyAssertionRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function verifyAssertion(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('verifyAssertion', [$params], "Google_Service_IdentityToolkit_VerifyAssertionResponse");
    }

    /**
     * Verifies the user entered password. (relyingparty.verifyPassword)
     *
     * @param Google_IdentitytoolkitRelyingpartyVerifyPasswordRequest|Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function verifyPassword(Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('verifyPassword', [$params], "Google_Service_IdentityToolkit_VerifyPasswordResponse");
    }
}


/**
 * Class Google_Service_IdentityToolkit_CreateAuthUriResponse
 */
class Google_Service_IdentityToolkit_CreateAuthUriResponse extends Google_Model
{
    public $authUri;
    public $captchaRequired;
    public $forExistingProvider;
    public $kind;
    public $providerId;
    public $registered;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAuthUri()
    {
        return $this->authUri;
    }

    /**
     * @param $authUri
     */
    public function setAuthUri($authUri)
    {
        $this->authUri = $authUri;
    }

    /**
     * @return mixed
     */
    public function getCaptchaRequired()
    {
        return $this->captchaRequired;
    }

    /**
     * @param $captchaRequired
     */
    public function setCaptchaRequired($captchaRequired)
    {
        $this->captchaRequired = $captchaRequired;
    }

    /**
     * @return mixed
     */
    public function getForExistingProvider()
    {
        return $this->forExistingProvider;
    }

    /**
     * @param $forExistingProvider
     */
    public function setForExistingProvider($forExistingProvider)
    {
        $this->forExistingProvider = $forExistingProvider;
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
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }

    /**
     * @return mixed
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }
}

/**
 * Class Google_Service_IdentityToolkit_DeleteAccountResponse
 */
class Google_Service_IdentityToolkit_DeleteAccountResponse extends Google_Model
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
 * Class Google_Service_IdentityToolkit_DownloadAccountResponse
 */
class Google_Service_IdentityToolkit_DownloadAccountResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];
    protected $usersType = 'Google_Service_IdentityToolkit_UserInfo';
    protected $usersDataType = 'array';

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
}

/**
 * Class Google_Service_IdentityToolkit_GetAccountInfoResponse
 */
class Google_Service_IdentityToolkit_GetAccountInfoResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];
    protected $usersType = 'Google_Service_IdentityToolkit_UserInfo';
    protected $usersDataType = 'array';

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
}

/**
 * Class Google_Service_IdentityToolkit_GetOobConfirmationCodeResponse
 */
class Google_Service_IdentityToolkit_GetOobConfirmationCodeResponse extends Google_Model
{
    public $kind;
    public $oobCode;
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
    public function getOobCode()
    {
        return $this->oobCode;
    }

    /**
     * @param $oobCode
     */
    public function setOobCode($oobCode)
    {
        $this->oobCode = $oobCode;
    }
}

/**
 * Class Google_Service_IdentityToolkit_GetRecaptchaParamResponse
 */
class Google_Service_IdentityToolkit_GetRecaptchaParamResponse extends Google_Model
{
    public $kind;
    public $recaptchaSiteKey;
    public $recaptchaStoken;
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
    public function getRecaptchaSiteKey()
    {
        return $this->recaptchaSiteKey;
    }

    /**
     * @param $recaptchaSiteKey
     */
    public function setRecaptchaSiteKey($recaptchaSiteKey)
    {
        $this->recaptchaSiteKey = $recaptchaSiteKey;
    }

    /**
     * @return mixed
     */
    public function getRecaptchaStoken()
    {
        return $this->recaptchaStoken;
    }

    /**
     * @param $recaptchaStoken
     */
    public function setRecaptchaStoken($recaptchaStoken)
    {
        $this->recaptchaStoken = $recaptchaStoken;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyCreateAuthUriRequest extends Google_Model
{
    public $appId;
    public $clientId;
    public $context;
    public $continueUri;
    public $identifier;
    public $oauthConsumerKey;
    public $oauthScope;
    public $openidRealm;
    public $otaApp;
    public $providerId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getContinueUri()
    {
        return $this->continueUri;
    }

    /**
     * @param $continueUri
     */
    public function setContinueUri($continueUri)
    {
        $this->continueUri = $continueUri;
    }

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
    public function getOauthConsumerKey()
    {
        return $this->oauthConsumerKey;
    }

    /**
     * @param $oauthConsumerKey
     */
    public function setOauthConsumerKey($oauthConsumerKey)
    {
        $this->oauthConsumerKey = $oauthConsumerKey;
    }

    /**
     * @return mixed
     */
    public function getOauthScope()
    {
        return $this->oauthScope;
    }

    /**
     * @param $oauthScope
     */
    public function setOauthScope($oauthScope)
    {
        $this->oauthScope = $oauthScope;
    }

    /**
     * @return mixed
     */
    public function getOpenidRealm()
    {
        return $this->openidRealm;
    }

    /**
     * @param $openidRealm
     */
    public function setOpenidRealm($openidRealm)
    {
        $this->openidRealm = $openidRealm;
    }

    /**
     * @return mixed
     */
    public function getOtaApp()
    {
        return $this->otaApp;
    }

    /**
     * @param $otaApp
     */
    public function setOtaApp($otaApp)
    {
        $this->otaApp = $otaApp;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDeleteAccountRequest extends Google_Model
{
    public $localId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyDownloadAccountRequest extends Google_Model
{
    public $maxResults;
    public $nextPageToken;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetAccountInfoRequest extends Google_Collection
{
    public $email;
    public $idToken;
    public $localId;
    protected $collection_key = 'localId';
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
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
    }

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetPublicKeysResponse
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyGetPublicKeysResponse extends Google_Model
{
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyResetPasswordRequest extends Google_Model
{
    public $email;
    public $newPassword;
    public $oldPassword;
    public $oobCode;
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
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param $newPassword
     */
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    /**
     * @return mixed
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @param $oldPassword
     */
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return mixed
     */
    public function getOobCode()
    {
        return $this->oobCode;
    }

    /**
     * @param $oobCode
     */
    public function setOobCode($oobCode)
    {
        $this->oobCode = $oobCode;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest extends Google_Collection
{
    public $captchaChallenge;
    public $captchaResponse;
    public $displayName;
    public $email;
    public $emailVerified;
    public $idToken;
    public $localId;
    public $oobCode;
    public $password;
    public $provider;
    public $upgradeToFederatedLogin;
    protected $collection_key = 'provider';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaptchaChallenge()
    {
        return $this->captchaChallenge;
    }

    /**
     * @param $captchaChallenge
     */
    public function setCaptchaChallenge($captchaChallenge)
    {
        $this->captchaChallenge = $captchaChallenge;
    }

    /**
     * @return mixed
     */
    public function getCaptchaResponse()
    {
        return $this->captchaResponse;
    }

    /**
     * @param $captchaResponse
     */
    public function setCaptchaResponse($captchaResponse)
    {
        $this->captchaResponse = $captchaResponse;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @param $emailVerified
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
    }

    /**
     * @return mixed
     */
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
    }

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }

    /**
     * @return mixed
     */
    public function getOobCode()
    {
        return $this->oobCode;
    }

    /**
     * @param $oobCode
     */
    public function setOobCode($oobCode)
    {
        $this->oobCode = $oobCode;
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
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getUpgradeToFederatedLogin()
    {
        return $this->upgradeToFederatedLogin;
    }

    /**
     * @param $upgradeToFederatedLogin
     */
    public function setUpgradeToFederatedLogin($upgradeToFederatedLogin)
    {
        $this->upgradeToFederatedLogin = $upgradeToFederatedLogin;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyUploadAccountRequest extends Google_Collection
{
    public $hashAlgorithm;
    public $memoryCost;
    public $rounds;
    public $saltSeparator;
    public $signerKey;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];
    protected $usersType = 'Google_Service_IdentityToolkit_UserInfo';
    protected $usersDataType = 'array';

    /**
     * @return mixed
     */
    public function getHashAlgorithm()
    {
        return $this->hashAlgorithm;
    }

    /**
     * @param $hashAlgorithm
     */
    public function setHashAlgorithm($hashAlgorithm)
    {
        $this->hashAlgorithm = $hashAlgorithm;
    }

    /**
     * @return mixed
     */
    public function getMemoryCost()
    {
        return $this->memoryCost;
    }

    /**
     * @param $memoryCost
     */
    public function setMemoryCost($memoryCost)
    {
        $this->memoryCost = $memoryCost;
    }

    /**
     * @return mixed
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * @param $rounds
     */
    public function setRounds($rounds)
    {
        $this->rounds = $rounds;
    }

    /**
     * @return mixed
     */
    public function getSaltSeparator()
    {
        return $this->saltSeparator;
    }

    /**
     * @param $saltSeparator
     */
    public function setSaltSeparator($saltSeparator)
    {
        $this->saltSeparator = $saltSeparator;
    }

    /**
     * @return mixed
     */
    public function getSignerKey()
    {
        return $this->signerKey;
    }

    /**
     * @param $signerKey
     */
    public function setSignerKey($signerKey)
    {
        $this->signerKey = $signerKey;
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
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyAssertionRequest extends Google_Model
{
    public $pendingIdToken;
    public $postBody;
    public $requestUri;
    public $returnRefreshToken;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPendingIdToken()
    {
        return $this->pendingIdToken;
    }

    /**
     * @param $pendingIdToken
     */
    public function setPendingIdToken($pendingIdToken)
    {
        $this->pendingIdToken = $pendingIdToken;
    }

    /**
     * @return mixed
     */
    public function getPostBody()
    {
        return $this->postBody;
    }

    /**
     * @param $postBody
     */
    public function setPostBody($postBody)
    {
        $this->postBody = $postBody;
    }

    /**
     * @return mixed
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param $requestUri
     */
    public function setRequestUri($requestUri)
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return mixed
     */
    public function getReturnRefreshToken()
    {
        return $this->returnRefreshToken;
    }

    /**
     * @param $returnRefreshToken
     */
    public function setReturnRefreshToken($returnRefreshToken)
    {
        $this->returnRefreshToken = $returnRefreshToken;
    }
}

/**
 * Class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest
 */
class Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest extends Google_Model
{
    public $captchaChallenge;
    public $captchaResponse;
    public $email;
    public $password;
    public $pendingIdToken;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaptchaChallenge()
    {
        return $this->captchaChallenge;
    }

    /**
     * @param $captchaChallenge
     */
    public function setCaptchaChallenge($captchaChallenge)
    {
        $this->captchaChallenge = $captchaChallenge;
    }

    /**
     * @return mixed
     */
    public function getCaptchaResponse()
    {
        return $this->captchaResponse;
    }

    /**
     * @param $captchaResponse
     */
    public function setCaptchaResponse($captchaResponse)
    {
        $this->captchaResponse = $captchaResponse;
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
    public function getPendingIdToken()
    {
        return $this->pendingIdToken;
    }

    /**
     * @param $pendingIdToken
     */
    public function setPendingIdToken($pendingIdToken)
    {
        $this->pendingIdToken = $pendingIdToken;
    }
}

/**
 * Class Google_Service_IdentityToolkit_Relyingparty
 */
class Google_Service_IdentityToolkit_Relyingparty extends Google_Model
{
    public $captchaResp;
    public $challenge;
    public $email;
    public $idToken;
    public $kind;
    public $newEmail;
    public $requestType;
    public $userIp;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCaptchaResp()
    {
        return $this->captchaResp;
    }

    /**
     * @param $captchaResp
     */
    public function setCaptchaResp($captchaResp)
    {
        $this->captchaResp = $captchaResp;
    }

    /**
     * @return mixed
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * @param $challenge
     */
    public function setChallenge($challenge)
    {
        $this->challenge = $challenge;
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
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
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
    public function getNewEmail()
    {
        return $this->newEmail;
    }

    /**
     * @param $newEmail
     */
    public function setNewEmail($newEmail)
    {
        $this->newEmail = $newEmail;
    }

    /**
     * @return mixed
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * @param $requestType
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;
    }

    /**
     * @return mixed
     */
    public function getUserIp()
    {
        return $this->userIp;
    }

    /**
     * @param $userIp
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;
    }
}

/**
 * Class Google_Service_IdentityToolkit_ResetPasswordResponse
 */
class Google_Service_IdentityToolkit_ResetPasswordResponse extends Google_Model
{
    public $email;
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
 * Class Google_Service_IdentityToolkit_SetAccountInfoResponse
 */
class Google_Service_IdentityToolkit_SetAccountInfoResponse extends Google_Collection
{
    public $displayName;
    public $email;
    public $idToken;
    public $kind;
    protected $collection_key = 'providerUserInfo';
    protected $internal_gapi_mappings = [];
    protected $providerUserInfoType = 'Google_Service_IdentityToolkit_SetAccountInfoResponseProviderUserInfo';
    protected $providerUserInfoDataType = 'array';

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
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
     * @param $providerUserInfo
     */
    public function setProviderUserInfo($providerUserInfo)
    {
        $this->providerUserInfo = $providerUserInfo;
    }

    /**
     * @return mixed
     */
    public function getProviderUserInfo()
    {
        return $this->providerUserInfo;
    }
}

/**
 * Class Google_Service_IdentityToolkit_SetAccountInfoResponseProviderUserInfo
 */
class Google_Service_IdentityToolkit_SetAccountInfoResponseProviderUserInfo extends Google_Model
{
    public $displayName;
    public $photoUrl;
    public $providerId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }
}

/**
 * Class Google_Service_IdentityToolkit_UploadAccountResponse
 */
class Google_Service_IdentityToolkit_UploadAccountResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'error';
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_IdentityToolkit_UploadAccountResponseError';
    protected $errorDataType = 'array';

    /**
     * @param $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
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
 * Class Google_Service_IdentityToolkit_UploadAccountResponseError
 */
class Google_Service_IdentityToolkit_UploadAccountResponseError extends Google_Model
{
    public $index;
    public $message;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_IdentityToolkit_UserInfo
 */
class Google_Service_IdentityToolkit_UserInfo extends Google_Collection
{
    public $displayName;
    public $email;
    public $emailVerified;
    public $localId;
    public $passwordHash;
    public $passwordUpdatedAt;
    public $photoUrl;
    public $salt;
    public $version;
    protected $collection_key = 'providerUserInfo';
    protected $internal_gapi_mappings = [];
    protected $providerUserInfoType = 'Google_Service_IdentityToolkit_UserInfoProviderUserInfo';
    protected $providerUserInfoDataType = 'array';

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @param $emailVerified
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
    }

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return mixed
     */
    public function getPasswordUpdatedAt()
    {
        return $this->passwordUpdatedAt;
    }

    /**
     * @param $passwordUpdatedAt
     */
    public function setPasswordUpdatedAt($passwordUpdatedAt)
    {
        $this->passwordUpdatedAt = $passwordUpdatedAt;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @param $providerUserInfo
     */
    public function setProviderUserInfo($providerUserInfo)
    {
        $this->providerUserInfo = $providerUserInfo;
    }

    /**
     * @return mixed
     */
    public function getProviderUserInfo()
    {
        return $this->providerUserInfo;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }
}

/**
 * Class Google_Service_IdentityToolkit_UserInfoProviderUserInfo
 */
class Google_Service_IdentityToolkit_UserInfoProviderUserInfo extends Google_Model
{
    public $displayName;
    public $federatedId;
    public $photoUrl;
    public $providerId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return mixed
     */
    public function getFederatedId()
    {
        return $this->federatedId;
    }

    /**
     * @param $federatedId
     */
    public function setFederatedId($federatedId)
    {
        $this->federatedId = $federatedId;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
    }
}

/**
 * Class Google_Service_IdentityToolkit_VerifyAssertionResponse
 */
class Google_Service_IdentityToolkit_VerifyAssertionResponse extends Google_Collection
{
    public $action;
    public $appInstallationUrl;
    public $appScheme;
    public $context;
    public $dateOfBirth;
    public $displayName;
    public $email;
    public $emailRecycled;
    public $emailVerified;
    public $federatedId;
    public $firstName;
    public $fullName;
    public $idToken;
    public $inputEmail;
    public $kind;
    public $language;
    public $lastName;
    public $localId;
    public $needConfirmation;
    public $nickName;
    public $oauthAccessToken;
    public $oauthAuthorizationCode;
    public $oauthExpireIn;
    public $oauthRequestToken;
    public $oauthScope;
    public $originalEmail;
    public $photoUrl;
    public $providerId;
    public $timeZone;
    public $verifiedProvider;
    protected $collection_key = 'verifiedProvider';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAppInstallationUrl()
    {
        return $this->appInstallationUrl;
    }

    /**
     * @param $appInstallationUrl
     */
    public function setAppInstallationUrl($appInstallationUrl)
    {
        $this->appInstallationUrl = $appInstallationUrl;
    }

    /**
     * @return mixed
     */
    public function getAppScheme()
    {
        return $this->appScheme;
    }

    /**
     * @param $appScheme
     */
    public function setAppScheme($appScheme)
    {
        $this->appScheme = $appScheme;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
    public function getEmailRecycled()
    {
        return $this->emailRecycled;
    }

    /**
     * @param $emailRecycled
     */
    public function setEmailRecycled($emailRecycled)
    {
        $this->emailRecycled = $emailRecycled;
    }

    /**
     * @return mixed
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @param $emailVerified
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
    }

    /**
     * @return mixed
     */
    public function getFederatedId()
    {
        return $this->federatedId;
    }

    /**
     * @param $federatedId
     */
    public function setFederatedId($federatedId)
    {
        $this->federatedId = $federatedId;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
    }

    /**
     * @return mixed
     */
    public function getInputEmail()
    {
        return $this->inputEmail;
    }

    /**
     * @param $inputEmail
     */
    public function setInputEmail($inputEmail)
    {
        $this->inputEmail = $inputEmail;
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
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }

    /**
     * @return mixed
     */
    public function getNeedConfirmation()
    {
        return $this->needConfirmation;
    }

    /**
     * @param $needConfirmation
     */
    public function setNeedConfirmation($needConfirmation)
    {
        $this->needConfirmation = $needConfirmation;
    }

    /**
     * @return mixed
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return mixed
     */
    public function getOauthAccessToken()
    {
        return $this->oauthAccessToken;
    }

    /**
     * @param $oauthAccessToken
     */
    public function setOauthAccessToken($oauthAccessToken)
    {
        $this->oauthAccessToken = $oauthAccessToken;
    }

    /**
     * @return mixed
     */
    public function getOauthAuthorizationCode()
    {
        return $this->oauthAuthorizationCode;
    }

    /**
     * @param $oauthAuthorizationCode
     */
    public function setOauthAuthorizationCode($oauthAuthorizationCode)
    {
        $this->oauthAuthorizationCode = $oauthAuthorizationCode;
    }

    /**
     * @return mixed
     */
    public function getOauthExpireIn()
    {
        return $this->oauthExpireIn;
    }

    /**
     * @param $oauthExpireIn
     */
    public function setOauthExpireIn($oauthExpireIn)
    {
        $this->oauthExpireIn = $oauthExpireIn;
    }

    /**
     * @return mixed
     */
    public function getOauthRequestToken()
    {
        return $this->oauthRequestToken;
    }

    /**
     * @param $oauthRequestToken
     */
    public function setOauthRequestToken($oauthRequestToken)
    {
        $this->oauthRequestToken = $oauthRequestToken;
    }

    /**
     * @return mixed
     */
    public function getOauthScope()
    {
        return $this->oauthScope;
    }

    /**
     * @param $oauthScope
     */
    public function setOauthScope($oauthScope)
    {
        $this->oauthScope = $oauthScope;
    }

    /**
     * @return mixed
     */
    public function getOriginalEmail()
    {
        return $this->originalEmail;
    }

    /**
     * @param $originalEmail
     */
    public function setOriginalEmail($originalEmail)
    {
        $this->originalEmail = $originalEmail;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param $providerId
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
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
    public function getVerifiedProvider()
    {
        return $this->verifiedProvider;
    }

    /**
     * @param $verifiedProvider
     */
    public function setVerifiedProvider($verifiedProvider)
    {
        $this->verifiedProvider = $verifiedProvider;
    }
}

/**
 * Class Google_Service_IdentityToolkit_VerifyPasswordResponse
 */
class Google_Service_IdentityToolkit_VerifyPasswordResponse extends Google_Model
{
    public $displayName;
    public $email;
    public $idToken;
    public $kind;
    public $localId;
    public $photoUrl;
    public $registered;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * @param $idToken
     */
    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
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
    public function getLocalId()
    {
        return $this->localId;
    }

    /**
     * @param $localId
     */
    public function setLocalId($localId)
    {
        $this->localId = $localId;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param $registered
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;
    }
}
