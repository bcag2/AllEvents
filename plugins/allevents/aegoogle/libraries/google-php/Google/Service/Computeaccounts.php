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
 * Service definition for Computeaccounts (alpha).
 *
 * <p>
 * API for the Google Compute Accounts service.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/compute/docs/access/user-accounts/api/latest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Computeaccounts extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** New Service: https://www.googleapis.com/auth/computeaccounts. */
    const COMPUTEACCOUNTS =
        "https://www.googleapis.com/auth/computeaccounts";
    /** New Service: https://www.googleapis.com/auth/computeaccounts.readonly. */
    const COMPUTEACCOUNTS_READONLY =
        "https://www.googleapis.com/auth/computeaccounts.readonly";

    public $globalAccountsOperations;
    public $groups;
    public $linux;
    public $users;


    /**
     * Constructs the internal representation of the Computeaccounts service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'computeaccounts/alpha/projects/';
        $this->version = 'alpha';
        $this->serviceName = 'computeaccounts';

        $this->globalAccountsOperations = new Google_Service_Computeaccounts_GlobalAccountsOperations_Resource(
            $this,
            $this->serviceName,
            'globalAccountsOperations',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/global/operations/{operation}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'operation' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/operations/{operation}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'operation' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/operations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filter' => [
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
                        ],
                    ],
                ]
            ]
        );
        $this->groups = new Google_Service_Computeaccounts_Groups_Resource(
            $this,
            $this->serviceName,
            'groups',
            [
                'methods' => [
                    'addMember' => [
                        'path' => '{project}/global/groups/{groupName}/addMember',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'groupName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/global/groups/{groupName}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'groupName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/groups/{groupName}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'groupName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/groups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/groups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filter' => [
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
                        ],
                    ], 'removeMember' => [
                        'path' => '{project}/global/groups/{groupName}/removeMember',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'groupName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->linux = new Google_Service_Computeaccounts_Linux_Resource(
            $this,
            $this->serviceName,
            'linux',
            [
                'methods' => [
                    'getAuthorizedKeysView' => [
                        'path' => '{project}/zones/{zone}/authorizedKeysView/{user}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getLinuxAccountViews' => [
                        'path' => '{project}/zones/{zone}/linuxAccountViews',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'zone' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'instance' => [
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
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'user' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users = new Google_Service_Computeaccounts_Users_Resource(
            $this,
            $this->serviceName,
            'users',
            [
                'methods' => [
                    'addPublicKey' => [
                        'path' => '{project}/global/users/{user}/addPublicKey',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/global/users/{user}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/global/users/{user}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/global/users',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/global/users',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'filter' => [
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
                        ],
                    ], 'removePublicKey' => [
                        'path' => '{project}/global/users/{user}/removePublicKey',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'user' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fingerprint' => [
                                'location' => 'query',
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
 * The "globalAccountsOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeaccountsService = new Google_Service_Computeaccounts(...);
 *   $globalAccountsOperations = $computeaccountsService->globalAccountsOperations;
 *  </code>
 */
class Google_Service_Computeaccounts_GlobalAccountsOperations_Resource extends Google_Service_Resource
{

    /**
     * Deletes the specified operation resource. (globalAccountsOperations.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $operation Name of the operation resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the specified operation resource. (globalAccountsOperations.get)
     *
     * @param string $project Project ID for this request.
     * @param string $operation Name of the operation resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $operation, $optParams = [])
    {
        $params = ['project' => $project, 'operation' => $operation];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Retrieves the list of operation resources contained within the specified
     * project. (globalAccountsOperations.listGlobalAccountsOperations)
     *
     * @param string $project Project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     */
    public function listGlobalAccountsOperations($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Computeaccounts_OperationList");
    }
}

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeaccountsService = new Google_Service_Computeaccounts(...);
 *   $groups = $computeaccountsService->groups;
 *  </code>
 */
class Google_Service_Computeaccounts_Groups_Resource extends Google_Service_Resource
{

    /**
     * Adds users to the specified group. (groups.addMember)
     *
     * @param string $project Project ID for this request.
     * @param string $groupName Name of the group for this request.
     * @param Google_GroupsAddMemberRequest|Google_Service_Computeaccounts_GroupsAddMemberRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function addMember($project, $groupName, Google_Service_Computeaccounts_GroupsAddMemberRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'groupName' => $groupName, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addMember', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Deletes the specified group resource. (groups.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $groupName Name of the group resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $groupName, $optParams = [])
    {
        $params = ['project' => $project, 'groupName' => $groupName];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Returns the specified group resource. (groups.get)
     *
     * @param string $project Project ID for this request.
     * @param string $groupName Name of the group resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $groupName, $optParams = [])
    {
        $params = ['project' => $project, 'groupName' => $groupName];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Computeaccounts_Group");
    }

    /**
     * Creates a group resource in the specified project using the data included in
     * the request. (groups.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Group|Google_Service_Computeaccounts_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, Google_Service_Computeaccounts_Group $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Retrieves the list of groups contained within the specified project.
     * (groups.listGroups)
     *
     * @param string $project Project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     */
    public function listGroups($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Computeaccounts_GroupList");
    }

    /**
     * Removes users from the specified group. (groups.removeMember)
     *
     * @param string $project Project ID for this request.
     * @param string $groupName Name of the group for this request.
     * @param Google_GroupsRemoveMemberRequest|Google_Service_Computeaccounts_GroupsRemoveMemberRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function removeMember($project, $groupName, Google_Service_Computeaccounts_GroupsRemoveMemberRequest $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'groupName' => $groupName, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('removeMember', [$params], "Google_Service_Computeaccounts_Operation");
    }
}

/**
 * The "linux" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeaccountsService = new Google_Service_Computeaccounts(...);
 *   $linux = $computeaccountsService->linux;
 *  </code>
 */
class Google_Service_Computeaccounts_Linux_Resource extends Google_Service_Resource
{

    /**
     * Returns the AuthorizedKeysView of the specified user.
     * (linux.getAuthorizedKeysView)
     *
     * @param string $project Project ID for this request.
     * @param string $zone Name of the zone for this request.
     * @param string $user Username of the AuthorizedKeysView to return.
     * @param string $instance The fully-qualified URL of the instance requesting
     *                          the view.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function getAuthorizedKeysView($project, $zone, $user, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'user' => $user, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('getAuthorizedKeysView', [$params], "Google_Service_Computeaccounts_LinuxGetAuthorizedKeysViewResponse");
    }

    /**
     * Retrieves the Linux views for an instance contained within the specified
     * project. (linux.getLinuxAccountViews)
     *
     * @param string $project Project ID for this request.
     * @param string $zone Name of the zone for this request.
     * @param string $instance The fully-qualified URL of the instance requesting
     *                          the views.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string user If provided, the user whose login is triggering an
     * immediate refresh of the views.
     */
    public function getLinuxAccountViews($project, $zone, $instance, $optParams = [])
    {
        $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
        $params = array_merge($params, $optParams);

        return $this->call('getLinuxAccountViews', [$params], "Google_Service_Computeaccounts_LinuxGetLinuxAccountViewsResponse");
    }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeaccountsService = new Google_Service_Computeaccounts(...);
 *   $users = $computeaccountsService->users;
 *  </code>
 */
class Google_Service_Computeaccounts_Users_Resource extends Google_Service_Resource
{

    /**
     * Adds a public key to the specified user using the data included in the
     * request. (users.addPublicKey)
     *
     * @param string $project Project ID for this request.
     * @param string $user Name of the user for this request.
     * @param Google_PublicKey|Google_Service_Computeaccounts_PublicKey $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function addPublicKey($project, $user, Google_Service_Computeaccounts_PublicKey $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'user' => $user, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('addPublicKey', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Deletes the specified user resource. (users.delete)
     *
     * @param string $project Project ID for this request.
     * @param string $user Name of the user resource to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($project, $user, $optParams = [])
    {
        $params = ['project' => $project, 'user' => $user];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Returns the specified user resource. (users.get)
     *
     * @param string $project Project ID for this request.
     * @param string $user Name of the user resource to return.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($project, $user, $optParams = [])
    {
        $params = ['project' => $project, 'user' => $user];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Computeaccounts_User");
    }

    /**
     * Creates a user resource in the specified project using the data included in
     * the request. (users.insert)
     *
     * @param string $project Project ID for this request.
     * @param Google_Service_Computeaccounts_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($project, Google_Service_Computeaccounts_User $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Computeaccounts_Operation");
    }

    /**
     * Retrieves the list of users contained within the specified project.
     * (users.listUsers)
     *
     * @param string $project Project ID for this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string filter Optional. Filter expression for filtering listed
     * resources.
     * @opt_param string pageToken Optional. Tag returned by a previous list request
     * truncated by maxResults. Used to continue a previous list request.
     * @opt_param string maxResults Optional. Maximum count of results to be
     * returned. Maximum value is 500 and default value is 500.
     */
    public function listUsers($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Computeaccounts_UserList");
    }

    /**
     * Removes the specified public key from the user. (users.removePublicKey)
     *
     * @param string $project Project ID for this request.
     * @param string $user Name of the user for this request.
     * @param string $fingerprint The fingerprint of the public key to delete.
     *                            Public keys are identified by their fingerprint, which is defined by RFC4716
     *                            to be the MD5 digest of the public key.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function removePublicKey($project, $user, $fingerprint, $optParams = [])
    {
        $params = ['project' => $project, 'user' => $user, 'fingerprint' => $fingerprint];
        $params = array_merge($params, $optParams);

        return $this->call('removePublicKey', [$params], "Google_Service_Computeaccounts_Operation");
    }
}


/**
 * Class Google_Service_Computeaccounts_AuthorizedKeysView
 */
class Google_Service_Computeaccounts_AuthorizedKeysView extends Google_Collection
{
    public $keys;
    protected $collection_key = 'keys';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }
}

/**
 * Class Google_Service_Computeaccounts_Group
 */
class Google_Service_Computeaccounts_Group extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $id;
    public $kind;
    public $members;
    public $name;
    public $selfLink;
    protected $collection_key = 'members';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
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
 * Class Google_Service_Computeaccounts_GroupList
 */
class Google_Service_Computeaccounts_GroupList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Computeaccounts_Group';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_Computeaccounts_GroupsAddMemberRequest
 */
class Google_Service_Computeaccounts_GroupsAddMemberRequest extends Google_Collection
{
    public $users;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}

/**
 * Class Google_Service_Computeaccounts_GroupsRemoveMemberRequest
 */
class Google_Service_Computeaccounts_GroupsRemoveMemberRequest extends Google_Collection
{
    public $users;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
}

/**
 * Class Google_Service_Computeaccounts_LinuxAccountViews
 */
class Google_Service_Computeaccounts_LinuxAccountViews extends Google_Collection
{
    public $kind;
    protected $collection_key = 'userViews';
    protected $internal_gapi_mappings = [];
    protected $groupViewsType = 'Google_Service_Computeaccounts_LinuxGroupView';
    protected $groupViewsDataType = 'array';
    protected $userViewsType = 'Google_Service_Computeaccounts_LinuxUserView';
    protected $userViewsDataType = 'array';


    /**
     * @param $groupViews
     */
    public function setGroupViews($groupViews)
    {
        $this->groupViews = $groupViews;
    }

    /**
     * @return mixed
     */
    public function getGroupViews()
    {
        return $this->groupViews;
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
     * @param $userViews
     */
    public function setUserViews($userViews)
    {
        $this->userViews = $userViews;
    }

    /**
     * @return mixed
     */
    public function getUserViews()
    {
        return $this->userViews;
    }
}

/**
 * Class Google_Service_Computeaccounts_LinuxGetAuthorizedKeysViewResponse
 */
class Google_Service_Computeaccounts_LinuxGetAuthorizedKeysViewResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceType = 'Google_Service_Computeaccounts_AuthorizedKeysView';
    protected $resourceDataType = '';


    /**
     * @param Google_Service_Computeaccounts_AuthorizedKeysView $resource
     */
    public function setResource(Google_Service_Computeaccounts_AuthorizedKeysView $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }
}

/**
 * Class Google_Service_Computeaccounts_LinuxGetLinuxAccountViewsResponse
 */
class Google_Service_Computeaccounts_LinuxGetLinuxAccountViewsResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceType = 'Google_Service_Computeaccounts_LinuxAccountViews';
    protected $resourceDataType = '';


    /**
     * @param Google_Service_Computeaccounts_LinuxAccountViews $resource
     */
    public function setResource(Google_Service_Computeaccounts_LinuxAccountViews $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }
}

/**
 * Class Google_Service_Computeaccounts_LinuxGroupView
 */
class Google_Service_Computeaccounts_LinuxGroupView extends Google_Collection
{
    public $gid;
    public $groupName;
    public $members;
    protected $collection_key = 'members';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getGid()
    {
        return $this->gid;
    }

    /**
     * @param $gid
     */
    public function setGid($gid)
    {
        $this->gid = $gid;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param $groupName
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }
}

/**
 * Class Google_Service_Computeaccounts_LinuxUserView
 */
class Google_Service_Computeaccounts_LinuxUserView extends Google_Model
{
    public $gecos;
    public $gid;
    public $homeDirectory;
    public $shell;
    public $uid;
    public $username;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getGecos()
    {
        return $this->gecos;
    }

    /**
     * @param $gecos
     */
    public function setGecos($gecos)
    {
        $this->gecos = $gecos;
    }

    /**
     * @return mixed
     */
    public function getGid()
    {
        return $this->gid;
    }

    /**
     * @param $gid
     */
    public function setGid($gid)
    {
        $this->gid = $gid;
    }

    /**
     * @return mixed
     */
    public function getHomeDirectory()
    {
        return $this->homeDirectory;
    }

    /**
     * @param $homeDirectory
     */
    public function setHomeDirectory($homeDirectory)
    {
        $this->homeDirectory = $homeDirectory;
    }

    /**
     * @return mixed
     */
    public function getShell()
    {
        return $this->shell;
    }

    /**
     * @param $shell
     */
    public function setShell($shell)
    {
        $this->shell = $shell;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
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
 * Class Google_Service_Computeaccounts_Operation
 */
class Google_Service_Computeaccounts_Operation extends Google_Collection
{
    public $clientOperationId;
    public $creationTimestamp;
    public $endTime;
    public $httpErrorMessage;
    public $httpErrorStatusCode;
    public $id;
    public $insertTime;
    public $kind;
    public $name;
    public $operationType;
    public $progress;
    public $region;
    public $selfLink;
    public $startTime;
    public $status;
    public $statusMessage;
    public $targetId;
    public $targetLink;
    public $user;
    public $zone;
    protected $collection_key = 'warnings';
    protected $internal_gapi_mappings = [];
    protected $errorType = 'Google_Service_Computeaccounts_OperationError';
    protected $errorDataType = '';
    protected $warningsType = 'Google_Service_Computeaccounts_OperationWarnings';
    protected $warningsDataType = 'array';

    /**
     * @return mixed
     */
    public function getClientOperationId()
    {
        return $this->clientOperationId;
    }

    /**
     * @param $clientOperationId
     */
    public function setClientOperationId($clientOperationId)
    {
        $this->clientOperationId = $clientOperationId;
    }

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
     * @param Google_Service_Computeaccounts_OperationError $error
     */
    public function setError(Google_Service_Computeaccounts_OperationError $error)
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
    public function getHttpErrorMessage()
    {
        return $this->httpErrorMessage;
    }

    /**
     * @param $httpErrorMessage
     */
    public function setHttpErrorMessage($httpErrorMessage)
    {
        $this->httpErrorMessage = $httpErrorMessage;
    }

    /**
     * @return mixed
     */
    public function getHttpErrorStatusCode()
    {
        return $this->httpErrorStatusCode;
    }

    /**
     * @param $httpErrorStatusCode
     */
    public function setHttpErrorStatusCode($httpErrorStatusCode)
    {
        $this->httpErrorStatusCode = $httpErrorStatusCode;
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
    public function getInsertTime()
    {
        return $this->insertTime;
    }

    /**
     * @param $insertTime
     */
    public function setInsertTime($insertTime)
    {
        $this->insertTime = $insertTime;
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
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param $operationType
     */
    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
    }

    /**
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @param $progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
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
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * @return mixed
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @param $targetId
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
    }

    /**
     * @return mixed
     */
    public function getTargetLink()
    {
        return $this->targetLink;
    }

    /**
     * @param $targetLink
     */
    public function setTargetLink($targetLink)
    {
        $this->targetLink = $targetLink;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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

    /**
     * @return mixed
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }
}

/**
 * Class Google_Service_Computeaccounts_OperationError
 */
class Google_Service_Computeaccounts_OperationError extends Google_Collection
{
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $errorsType = 'Google_Service_Computeaccounts_OperationErrorErrors';
    protected $errorsDataType = 'array';


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
}

/**
 * Class Google_Service_Computeaccounts_OperationErrorErrors
 */
class Google_Service_Computeaccounts_OperationErrorErrors extends Google_Model
{
    public $code;
    public $location;
    public $message;
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
 * Class Google_Service_Computeaccounts_OperationList
 */
class Google_Service_Computeaccounts_OperationList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Computeaccounts_Operation';
    protected $itemsDataType = 'array';

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
 * Class Google_Service_Computeaccounts_OperationWarnings
 */
class Google_Service_Computeaccounts_OperationWarnings extends Google_Collection
{
    public $code;
    public $message;
    protected $collection_key = 'data';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Computeaccounts_OperationWarningsData';
    protected $dataDataType = 'array';

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
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
 * Class Google_Service_Computeaccounts_OperationWarningsData
 */
class Google_Service_Computeaccounts_OperationWarningsData extends Google_Model
{
    public $key;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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
 * Class Google_Service_Computeaccounts_PublicKey
 */
class Google_Service_Computeaccounts_PublicKey extends Google_Model
{
    public $creationTimestamp;
    public $description;
    public $expirationTimestamp;
    public $fingerprint;
    public $key;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
    public function getExpirationTimestamp()
    {
        return $this->expirationTimestamp;
    }

    /**
     * @param $expirationTimestamp
     */
    public function setExpirationTimestamp($expirationTimestamp)
    {
        $this->expirationTimestamp = $expirationTimestamp;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}

/**
 * Class Google_Service_Computeaccounts_User
 */
class Google_Service_Computeaccounts_User extends Google_Collection
{
    public $creationTimestamp;
    public $description;
    public $groups;
    public $id;
    public $kind;
    public $name;
    public $owner;
    public $selfLink;
    protected $collection_key = 'publicKeys';
    protected $internal_gapi_mappings = [];
    protected $publicKeysType = 'Google_Service_Computeaccounts_PublicKey';
    protected $publicKeysDataType = 'array';

    /**
     * @return mixed
     */
    public function getCreationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @param $creationTimestamp
     */
    public function setCreationTimestamp($creationTimestamp)
    {
        $this->creationTimestamp = $creationTimestamp;
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
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
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
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @param $publicKeys
     */
    public function setPublicKeys($publicKeys)
    {
        $this->publicKeys = $publicKeys;
    }

    /**
     * @return mixed
     */
    public function getPublicKeys()
    {
        return $this->publicKeys;
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
 * Class Google_Service_Computeaccounts_UserList
 */
class Google_Service_Computeaccounts_UserList extends Google_Collection
{
    public $id;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Computeaccounts_User';
    protected $itemsDataType = 'array';

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
