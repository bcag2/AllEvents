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
 * Service definition for Mirror (v1).
 *
 * <p>
 * API for interacting with Glass users via the timeline.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/glass" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Mirror extends Google_Service
{
    /** View your location. */
    const GLASS_LOCATION =
        "https://www.googleapis.com/auth/glass.location";
    /** View and manage your Glass timeline. */
    const GLASS_TIMELINE =
        "https://www.googleapis.com/auth/glass.timeline";

    public $accounts;
    public $contacts;
    public $locations;
    public $settings;
    public $subscriptions;
    public $timeline;
    public $timeline_attachments;


    /**
     * Constructs the internal representation of the Mirror service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'mirror/v1/';
        $this->version = 'v1';
        $this->serviceName = 'mirror';

        $this->accounts = new Google_Service_Mirror_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'accounts/{userToken}/{accountType}/{accountName}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userToken' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountType' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'accountName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->contacts = new Google_Service_Mirror_Contacts_Resource(
            $this,
            $this->serviceName,
            'contacts',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'contacts/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'contacts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'contacts',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'contacts',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'contacts/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'contacts/{id}',
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
        $this->locations = new Google_Service_Mirror_Locations_Resource(
            $this,
            $this->serviceName,
            'locations',
            [
                'methods' => [
                    'get' => [
                        'path' => 'locations/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'locations',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->settings = new Google_Service_Mirror_Settings_Resource(
            $this,
            $this->serviceName,
            'settings',
            [
                'methods' => [
                    'get' => [
                        'path' => 'settings/{id}',
                        'httpMethod' => 'GET',
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
        $this->subscriptions = new Google_Service_Mirror_Subscriptions_Resource(
            $this,
            $this->serviceName,
            'subscriptions',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'subscriptions/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'subscriptions/{id}',
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
        $this->timeline = new Google_Service_Mirror_Timeline_Resource(
            $this,
            $this->serviceName,
            'timeline',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'timeline/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'timeline/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'timeline',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'timeline',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeDeleted' => [
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
                            'sourceItemId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pinnedOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'bundleId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'timeline/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'timeline/{id}',
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
        $this->timeline_attachments = new Google_Service_Mirror_TimelineAttachments_Resource(
            $this,
            $this->serviceName,
            'attachments',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'timeline/{itemId}/attachments/{attachmentId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'itemId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'attachmentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'timeline/{itemId}/attachments/{attachmentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'itemId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'attachmentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'timeline/{itemId}/attachments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'itemId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'timeline/{itemId}/attachments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'itemId' => [
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
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $accounts = $mirrorService->accounts;
 *  </code>
 */
class Google_Service_Mirror_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Inserts a new account for a user (accounts.insert)
     *
     * @param string $userToken The ID for the user.
     * @param string $accountType Account type to be passed to Android Account
     *                                                                  Manager.
     * @param string $accountName The name of the account to be passed to the
     *                                                                  Android Account Manager.
     * @param Google_Account|Google_Service_Mirror_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($userToken, $accountType, $accountName, Google_Service_Mirror_Account $postBody, $optParams = [])
    {
        $params = ['userToken' => $userToken, 'accountType' => $accountType, 'accountName' => $accountName, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Mirror_Account");
    }
}

/**
 * The "contacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $contacts = $mirrorService->contacts;
 *  </code>
 */
class Google_Service_Mirror_Contacts_Resource extends Google_Service_Resource
{

    /**
     * Deletes a contact. (contacts.delete)
     *
     * @param string $id The ID of the contact.
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
     * Gets a single contact by ID. (contacts.get)
     *
     * @param string $id The ID of the contact.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Mirror_Contact");
    }

    /**
     * Inserts a new contact. (contacts.insert)
     *
     * @param Google_Contact|Google_Service_Mirror_Contact $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Mirror_Contact $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Mirror_Contact");
    }

    /**
     * Retrieves a list of contacts for the authenticated user.
     * (contacts.listContacts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listContacts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Mirror_ContactsListResponse");
    }

    /**
     * Updates a contact in place. This method supports patch semantics.
     * (contacts.patch)
     *
     * @param string $id The ID of the contact.
     * @param Google_Contact|Google_Service_Mirror_Contact $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_Mirror_Contact $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Mirror_Contact");
    }

    /**
     * Updates a contact in place. (contacts.update)
     *
     * @param string $id The ID of the contact.
     * @param Google_Contact|Google_Service_Mirror_Contact $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($id, Google_Service_Mirror_Contact $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Mirror_Contact");
    }
}

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $locations = $mirrorService->locations;
 *  </code>
 */
class Google_Service_Mirror_Locations_Resource extends Google_Service_Resource
{

    /**
     * Gets a single location by ID. (locations.get)
     *
     * @param string $id The ID of the location or latest for the last known
     *                          location.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Mirror_Location");
    }

    /**
     * Retrieves a list of locations for the user. (locations.listLocations)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listLocations($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Mirror_LocationsListResponse");
    }
}

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $settings = $mirrorService->settings;
 *  </code>
 */
class Google_Service_Mirror_Settings_Resource extends Google_Service_Resource
{

    /**
     * Gets a single setting by ID. (settings.get)
     *
     * @param string $id The ID of the setting. The following IDs are valid: -
     *                          locale - The key to the user’s language/locale (BCP 47 identifier) that
     *                          Glassware should use to render localized content.  - timezone - The key to
     *                          the user’s current time zone region as defined in the tz database. Example:
     *                          America/Los_Angeles.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Mirror_Setting");
    }
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $subscriptions = $mirrorService->subscriptions;
 *  </code>
 */
class Google_Service_Mirror_Subscriptions_Resource extends Google_Service_Resource
{

    /**
     * Deletes a subscription. (subscriptions.delete)
     *
     * @param string $id The ID of the subscription.
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
     * Creates a new subscription. (subscriptions.insert)
     *
     * @param Google_Service_Mirror_Subscription|Google_Subscription $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Mirror_Subscription $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Mirror_Subscription");
    }

    /**
     * Retrieves a list of subscriptions for the authenticated user and service.
     * (subscriptions.listSubscriptions)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listSubscriptions($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Mirror_SubscriptionsListResponse");
    }

    /**
     * Updates an existing subscription in place. (subscriptions.update)
     *
     * @param string $id The ID of the subscription.
     * @param Google_Service_Mirror_Subscription|Google_Subscription $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($id, Google_Service_Mirror_Subscription $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Mirror_Subscription");
    }
}

/**
 * The "timeline" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $timeline = $mirrorService->timeline;
 *  </code>
 */
class Google_Service_Mirror_Timeline_Resource extends Google_Service_Resource
{

    /**
     * Deletes a timeline item. (timeline.delete)
     *
     * @param string $id The ID of the timeline item.
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
     * Gets a single timeline item by ID. (timeline.get)
     *
     * @param string $id The ID of the timeline item.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Mirror_TimelineItem");
    }

    /**
     * Inserts a new item into the timeline. (timeline.insert)
     *
     * @param Google_Service_Mirror_TimelineItem|Google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Mirror_TimelineItem $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Mirror_TimelineItem");
    }

    /**
     * Retrieves a list of timeline items for the authenticated user.
     * (timeline.listTimeline)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Controls the order in which timeline items are
     * returned.
     * @opt_param bool includeDeleted If true, tombstone records for deleted items
     * will be returned.
     * @opt_param string maxResults The maximum number of items to include in the
     * response, used for paging.
     * @opt_param string pageToken Token for the page of results to return.
     * @opt_param string sourceItemId If provided, only items with the given
     * sourceItemId will be returned.
     * @opt_param bool pinnedOnly If true, only pinned items will be returned.
     * @opt_param string bundleId If provided, only items with the given bundleId
     * will be returned.
     */
    public function listTimeline($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Mirror_TimelineListResponse");
    }

    /**
     * Updates a timeline item in place. This method supports patch semantics.
     * (timeline.patch)
     *
     * @param string $id The ID of the timeline item.
     * @param Google_Service_Mirror_TimelineItem|Google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($id, Google_Service_Mirror_TimelineItem $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Mirror_TimelineItem");
    }

    /**
     * Updates a timeline item in place. (timeline.update)
     *
     * @param string $id The ID of the timeline item.
     * @param Google_Service_Mirror_TimelineItem|Google_TimelineItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($id, Google_Service_Mirror_TimelineItem $postBody, $optParams = [])
    {
        $params = ['id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Mirror_TimelineItem");
    }
}

/**
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $attachments = $mirrorService->attachments;
 *  </code>
 */
class Google_Service_Mirror_TimelineAttachments_Resource extends Google_Service_Resource
{

    /**
     * Deletes an attachment from a timeline item. (attachments.delete)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param string $attachmentId The ID of the attachment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($itemId, $attachmentId, $optParams = [])
    {
        $params = ['itemId' => $itemId, 'attachmentId' => $attachmentId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves an attachment on a timeline item by item ID and attachment ID.
     * (attachments.get)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param string $attachmentId The ID of the attachment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($itemId, $attachmentId, $optParams = [])
    {
        $params = ['itemId' => $itemId, 'attachmentId' => $attachmentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Mirror_Attachment");
    }

    /**
     * Adds a new attachment to a timeline item. (attachments.insert)
     *
     * @param string $itemId The ID of the timeline item the attachment belongs to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($itemId, $optParams = [])
    {
        $params = ['itemId' => $itemId];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Mirror_Attachment");
    }

    /**
     * Returns a list of attachments for a timeline item.
     * (attachments.listTimelineAttachments)
     *
     * @param string $itemId The ID of the timeline item whose attachments should be
     *                          listed.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listTimelineAttachments($itemId, $optParams = [])
    {
        $params = ['itemId' => $itemId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Mirror_AttachmentsListResponse");
    }
}


/**
 * Class Google_Service_Mirror_Account
 */
class Google_Service_Mirror_Account extends Google_Collection
{
    public $features;
    public $password;
    protected $collection_key = 'userData';
    protected $internal_gapi_mappings = [];
    protected $authTokensType = 'Google_Service_Mirror_AuthToken';
    protected $authTokensDataType = 'array';
    protected $userDataType = 'Google_Service_Mirror_UserData';
    protected $userDataDataType = 'array';


    /**
     * @param $authTokens
     */
    public function setAuthTokens($authTokens)
    {
        $this->authTokens = $authTokens;
    }

    /**
     * @return mixed
     */
    public function getAuthTokens()
    {
        return $this->authTokens;
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
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
     * @param $userData
     */
    public function setUserData($userData)
    {
        $this->userData = $userData;
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        return $this->userData;
    }
}

/**
 * Class Google_Service_Mirror_Attachment
 */
class Google_Service_Mirror_Attachment extends Google_Model
{
    public $contentType;
    public $contentUrl;
    public $id;
    public $isProcessingContent;
    protected $internal_gapi_mappings = [];

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
     * @return mixed
     */
    public function getContentUrl()
    {
        return $this->contentUrl;
    }

    /**
     * @param $contentUrl
     */
    public function setContentUrl($contentUrl)
    {
        $this->contentUrl = $contentUrl;
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
    public function getIsProcessingContent()
    {
        return $this->isProcessingContent;
    }

    /**
     * @param $isProcessingContent
     */
    public function setIsProcessingContent($isProcessingContent)
    {
        $this->isProcessingContent = $isProcessingContent;
    }
}

/**
 * Class Google_Service_Mirror_AttachmentsListResponse
 */
class Google_Service_Mirror_AttachmentsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Mirror_Attachment';
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
 * Class Google_Service_Mirror_AuthToken
 */
class Google_Service_Mirror_AuthToken extends Google_Model
{
    public $authToken;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
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
 * Class Google_Service_Mirror_Command
 */
class Google_Service_Mirror_Command extends Google_Model
{
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Mirror_Contact
 */
class Google_Service_Mirror_Contact extends Google_Collection
{
    public $acceptTypes;
    public $displayName;
    public $id;
    public $imageUrls;
    public $kind;
    public $phoneNumber;
    public $priority;
    public $sharingFeatures;
    public $source;
    public $speakableName;
    public $type;
    protected $collection_key = 'sharingFeatures';
    protected $internal_gapi_mappings = [];
    protected $acceptCommandsType = 'Google_Service_Mirror_Command';
    protected $acceptCommandsDataType = 'array';

    /**
     * @param $acceptCommands
     */
    public function setAcceptCommands($acceptCommands)
    {
        $this->acceptCommands = $acceptCommands;
    }

    /**
     * @return mixed
     */
    public function getAcceptCommands()
    {
        return $this->acceptCommands;
    }

    /**
     * @return mixed
     */
    public function getAcceptTypes()
    {
        return $this->acceptTypes;
    }

    /**
     * @param $acceptTypes
     */
    public function setAcceptTypes($acceptTypes)
    {
        $this->acceptTypes = $acceptTypes;
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
    public function getImageUrls()
    {
        return $this->imageUrls;
    }

    /**
     * @param $imageUrls
     */
    public function setImageUrls($imageUrls)
    {
        $this->imageUrls = $imageUrls;
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
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getSharingFeatures()
    {
        return $this->sharingFeatures;
    }

    /**
     * @param $sharingFeatures
     */
    public function setSharingFeatures($sharingFeatures)
    {
        $this->sharingFeatures = $sharingFeatures;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSpeakableName()
    {
        return $this->speakableName;
    }

    /**
     * @param $speakableName
     */
    public function setSpeakableName($speakableName)
    {
        $this->speakableName = $speakableName;
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
 * Class Google_Service_Mirror_ContactsListResponse
 */
class Google_Service_Mirror_ContactsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Mirror_Contact';
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
 * Class Google_Service_Mirror_Location
 */
class Google_Service_Mirror_Location extends Google_Model
{
    public $accuracy;
    public $address;
    public $displayName;
    public $id;
    public $kind;
    public $latitude;
    public $longitude;
    public $timestamp;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
     * @param $accuracy
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = $accuracy;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
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
 * Class Google_Service_Mirror_LocationsListResponse
 */
class Google_Service_Mirror_LocationsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Mirror_Location';
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
 * Class Google_Service_Mirror_MenuItem
 */
class Google_Service_Mirror_MenuItem extends Google_Collection
{
    public $action;
    public $contextualCommand;
    public $id;
    public $payload;
    public $removeWhenSelected;
    protected $collection_key = 'values';
    protected $internal_gapi_mappings = [
        "contextualCommand" => "contextual_command",
    ];
    protected $valuesType = 'Google_Service_Mirror_MenuValue';
    protected $valuesDataType = 'array';

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
    public function getContextualCommand()
    {
        return $this->contextualCommand;
    }

    /**
     * @param $contextualCommand
     */
    public function setContextualCommand($contextualCommand)
    {
        $this->contextualCommand = $contextualCommand;
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
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getRemoveWhenSelected()
    {
        return $this->removeWhenSelected;
    }

    /**
     * @param $removeWhenSelected
     */
    public function setRemoveWhenSelected($removeWhenSelected)
    {
        $this->removeWhenSelected = $removeWhenSelected;
    }

    /**
     * @param $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }
}

/**
 * Class Google_Service_Mirror_MenuValue
 */
class Google_Service_Mirror_MenuValue extends Google_Model
{
    public $displayName;
    public $iconUrl;
    public $state;
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
    public function getIconUrl()
    {
        return $this->iconUrl;
    }

    /**
     * @param $iconUrl
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}

/**
 * Class Google_Service_Mirror_Notification
 */
class Google_Service_Mirror_Notification extends Google_Collection
{
    public $collection;
    public $itemId;
    public $operation;
    public $userToken;
    public $verifyToken;
    protected $collection_key = 'userActions';
    protected $internal_gapi_mappings = [];
    protected $userActionsType = 'Google_Service_Mirror_UserAction';
    protected $userActionsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

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
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    /**
     * @param $userActions
     */
    public function setUserActions($userActions)
    {
        $this->userActions = $userActions;
    }

    /**
     * @return mixed
     */
    public function getUserActions()
    {
        return $this->userActions;
    }

    /**
     * @return mixed
     */
    public function getUserToken()
    {
        return $this->userToken;
    }

    /**
     * @param $userToken
     */
    public function setUserToken($userToken)
    {
        $this->userToken = $userToken;
    }

    /**
     * @return mixed
     */
    public function getVerifyToken()
    {
        return $this->verifyToken;
    }

    /**
     * @param $verifyToken
     */
    public function setVerifyToken($verifyToken)
    {
        $this->verifyToken = $verifyToken;
    }
}

/**
 * Class Google_Service_Mirror_NotificationConfig
 */
class Google_Service_Mirror_NotificationConfig extends Google_Model
{
    public $deliveryTime;
    public $level;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * @param $deliveryTime
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
}

/**
 * Class Google_Service_Mirror_Setting
 */
class Google_Service_Mirror_Setting extends Google_Model
{
    public $id;
    public $kind;
    public $value;
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
 * Class Google_Service_Mirror_Subscription
 */
class Google_Service_Mirror_Subscription extends Google_Collection
{
    public $callbackUrl;
    public $collection;
    public $id;
    public $kind;
    public $operation;
    public $updated;
    public $userToken;
    public $verifyToken;
    protected $collection_key = 'operation';
    protected $internal_gapi_mappings = [];
    protected $notificationType = 'Google_Service_Mirror_Notification';
    protected $notificationDataType = '';

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param $callbackUrl
     */
    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
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
     * @param Google_Service_Mirror_Notification $notification
     */
    public function setNotification(Google_Service_Mirror_Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getUserToken()
    {
        return $this->userToken;
    }

    /**
     * @param $userToken
     */
    public function setUserToken($userToken)
    {
        $this->userToken = $userToken;
    }

    /**
     * @return mixed
     */
    public function getVerifyToken()
    {
        return $this->verifyToken;
    }

    /**
     * @param $verifyToken
     */
    public function setVerifyToken($verifyToken)
    {
        $this->verifyToken = $verifyToken;
    }
}

/**
 * Class Google_Service_Mirror_SubscriptionsListResponse
 */
class Google_Service_Mirror_SubscriptionsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Mirror_Subscription';
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
 * Class Google_Service_Mirror_TimelineItem
 */
class Google_Service_Mirror_TimelineItem extends Google_Collection
{
    public $bundleId;
    public $canonicalUrl;
    public $created;
    public $displayTime;
    public $etag;
    public $html;
    public $id;
    public $inReplyTo;
    public $isBundleCover;
    public $isDeleted;
    public $isPinned;
    public $kind;
    public $pinScore;
    public $selfLink;
    public $sourceItemId;
    public $speakableText;
    public $speakableType;
    public $text;
    public $title;
    public $updated;
    protected $collection_key = 'recipients';
    protected $internal_gapi_mappings = [];
    protected $attachmentsType = 'Google_Service_Mirror_Attachment';
    protected $attachmentsDataType = 'array';
    protected $creatorType = 'Google_Service_Mirror_Contact';
    protected $creatorDataType = '';
    protected $locationType = 'Google_Service_Mirror_Location';
    protected $locationDataType = '';
    protected $menuItemsType = 'Google_Service_Mirror_MenuItem';
    protected $menuItemsDataType = 'array';
    protected $notificationType = 'Google_Service_Mirror_NotificationConfig';
    protected $notificationDataType = '';
    protected $recipientsType = 'Google_Service_Mirror_Contact';
    protected $recipientsDataType = 'array';

    /**
     * @param $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @return mixed
     */
    public function getBundleId()
    {
        return $this->bundleId;
    }

    /**
     * @param $bundleId
     */
    public function setBundleId($bundleId)
    {
        $this->bundleId = $bundleId;
    }

    /**
     * @return mixed
     */
    public function getCanonicalUrl()
    {
        return $this->canonicalUrl;
    }

    /**
     * @param $canonicalUrl
     */
    public function setCanonicalUrl($canonicalUrl)
    {
        $this->canonicalUrl = $canonicalUrl;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @param Google_Service_Mirror_Contact $creator
     */
    public function setCreator(Google_Service_Mirror_Contact $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @return mixed
     */
    public function getDisplayTime()
    {
        return $this->displayTime;
    }

    /**
     * @param $displayTime
     */
    public function setDisplayTime($displayTime)
    {
        $this->displayTime = $displayTime;
    }

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
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
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
    public function getInReplyTo()
    {
        return $this->inReplyTo;
    }

    /**
     * @param $inReplyTo
     */
    public function setInReplyTo($inReplyTo)
    {
        $this->inReplyTo = $inReplyTo;
    }

    /**
     * @return mixed
     */
    public function getIsBundleCover()
    {
        return $this->isBundleCover;
    }

    /**
     * @param $isBundleCover
     */
    public function setIsBundleCover($isBundleCover)
    {
        $this->isBundleCover = $isBundleCover;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @param $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return mixed
     */
    public function getIsPinned()
    {
        return $this->isPinned;
    }

    /**
     * @param $isPinned
     */
    public function setIsPinned($isPinned)
    {
        $this->isPinned = $isPinned;
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
     * @param Google_Service_Mirror_Location $location
     */
    public function setLocation(Google_Service_Mirror_Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $menuItems
     */
    public function setMenuItems($menuItems)
    {
        $this->menuItems = $menuItems;
    }

    /**
     * @return mixed
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }

    /**
     * @param Google_Service_Mirror_NotificationConfig $notification
     */
    public function setNotification(Google_Service_Mirror_NotificationConfig $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @return mixed
     */
    public function getPinScore()
    {
        return $this->pinScore;
    }

    /**
     * @param $pinScore
     */
    public function setPinScore($pinScore)
    {
        $this->pinScore = $pinScore;
    }

    /**
     * @param $recipients
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }

    /**
     * @return mixed
     */
    public function getRecipients()
    {
        return $this->recipients;
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
    public function getSourceItemId()
    {
        return $this->sourceItemId;
    }

    /**
     * @param $sourceItemId
     */
    public function setSourceItemId($sourceItemId)
    {
        $this->sourceItemId = $sourceItemId;
    }

    /**
     * @return mixed
     */
    public function getSpeakableText()
    {
        return $this->speakableText;
    }

    /**
     * @param $speakableText
     */
    public function setSpeakableText($speakableText)
    {
        $this->speakableText = $speakableText;
    }

    /**
     * @return mixed
     */
    public function getSpeakableType()
    {
        return $this->speakableType;
    }

    /**
     * @param $speakableType
     */
    public function setSpeakableType($speakableType)
    {
        $this->speakableType = $speakableType;
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
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Mirror_TimelineListResponse
 */
class Google_Service_Mirror_TimelineListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Mirror_TimelineItem';
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
 * Class Google_Service_Mirror_UserAction
 */
class Google_Service_Mirror_UserAction extends Google_Model
{
    public $payload;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
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
 * Class Google_Service_Mirror_UserData
 */
class Google_Service_Mirror_UserData extends Google_Model
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
