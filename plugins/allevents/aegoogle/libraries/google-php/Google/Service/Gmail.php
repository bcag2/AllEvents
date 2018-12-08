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
 * Service definition for Gmail (v1).
 *
 * <p>
 * The Gmail REST API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/gmail/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Gmail extends Google_Service
{
    /** View and manage your mail. */
    const MAIL_GOOGLE_COM =
        "https://mail.google.com";
    /** Manage drafts and send emails. */
    const GMAIL_COMPOSE =
        "https://www.googleapis.com/auth/gmail.compose";
    /** Insert mail into your mailbox. */
    const GMAIL_INSERT =
        "https://www.googleapis.com/auth/gmail.insert";
    /** Manage mailbox labels. */
    const GMAIL_LABELS =
        "https://www.googleapis.com/auth/gmail.labels";
    /** View and modify but not delete your email. */
    const GMAIL_MODIFY =
        "https://www.googleapis.com/auth/gmail.modify";
    /** View your emails messages and settings. */
    const GMAIL_READONLY =
        "https://www.googleapis.com/auth/gmail.readonly";

    public $users;
    public $users_drafts;
    public $users_history;
    public $users_labels;
    public $users_messages;
    public $users_messages_attachments;
    public $users_threads;


    /**
     * Constructs the internal representation of the Gmail service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'gmail/v1/users/';
        $this->version = 'v1';
        $this->serviceName = 'gmail';

        $this->users = new Google_Service_Gmail_Users_Resource(
            $this,
            $this->serviceName,
            'users',
            [
                'methods' => [
                    'getProfile' => [
                        'path' => '{userId}/profile',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_drafts = new Google_Service_Gmail_UsersDrafts_Resource(
            $this,
            $this->serviceName,
            'drafts',
            [
                'methods' => [
                    'create' => [
                        'path' => '{userId}/drafts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{userId}/drafts/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/drafts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'format' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/drafts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
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
                    ], 'send' => [
                        'path' => '{userId}/drafts/send',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{userId}/drafts/{id}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->users_history = new Google_Service_Gmail_UsersHistory_Resource(
            $this,
            $this->serviceName,
            'history',
            [
                'methods' => [
                    'list' => [
                        'path' => '{userId}/history',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
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
                            'labelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startHistoryId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_labels = new Google_Service_Gmail_UsersLabels_Resource(
            $this,
            $this->serviceName,
            'labels',
            [
                'methods' => [
                    'create' => [
                        'path' => '{userId}/labels',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{userId}/labels/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/labels/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/labels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{userId}/labels/{id}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{userId}/labels/{id}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->users_messages = new Google_Service_Gmail_UsersMessages_Resource(
            $this,
            $this->serviceName,
            'messages',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{userId}/messages/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/messages/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metadataHeaders' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'format' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'import' => [
                        'path' => '{userId}/messages/import',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'processForCalendar' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'internalDateSource' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'neverMarkSpam' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{userId}/messages',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'internalDateSource' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/messages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeSpamTrash' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'labelIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'modify' => [
                        'path' => '{userId}/messages/{id}/modify',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'send' => [
                        'path' => '{userId}/messages/send',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'trash' => [
                        'path' => '{userId}/messages/{id}/trash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'untrash' => [
                        'path' => '{userId}/messages/{id}/untrash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->users_messages_attachments = new Google_Service_Gmail_UsersMessagesAttachments_Resource(
            $this,
            $this->serviceName,
            'attachments',
            [
                'methods' => [
                    'get' => [
                        'path' => '{userId}/messages/{messageId}/attachments/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'messageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
        $this->users_threads = new Google_Service_Gmail_UsersThreads_Resource(
            $this,
            $this->serviceName,
            'threads',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{userId}/threads/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{userId}/threads/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metadataHeaders' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'format' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{userId}/threads',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeSpamTrash' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'labelIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'modify' => [
                        'path' => '{userId}/threads/{id}/modify',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'trash' => [
                        'path' => '{userId}/threads/{id}/trash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'untrash' => [
                        'path' => '{userId}/threads/{id}/untrash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $users = $gmailService->users;
 *  </code>
 */
class Google_Service_Gmail_Users_Resource extends Google_Service_Resource
{

    /**
     * Gets the current user's Gmail profile. (users.getProfile)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getProfile($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('getProfile', [$params], "Google_Service_Gmail_Profile");
    }
}

/**
 * The "drafts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $drafts = $gmailService->drafts;
 *  </code>
 */
class Google_Service_Gmail_UsersDrafts_Resource extends Google_Service_Resource
{

    /**
     * Creates a new draft with the DRAFT label. (drafts.create)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param Google_Draft|Google_Service_Gmail_Draft $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create($userId, Google_Service_Gmail_Draft $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Gmail_Draft");
    }

    /**
     * Immediately and permanently deletes the specified draft. Does not simply
     * trash it. (drafts.delete)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the draft to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets the specified draft. (drafts.get)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the draft to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string format The format to return the draft in.
     */
    public function get($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Gmail_Draft");
    }

    /**
     * Lists the drafts in the user's mailbox. (drafts.listUsersDrafts)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Page token to retrieve a specific page of results
     * in the list.
     * @opt_param string maxResults Maximum number of drafts to return.
     */
    public function listUsersDrafts($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Gmail_ListDraftsResponse");
    }

    /**
     * Sends the specified, existing draft to the recipients in the To, Cc, and Bcc
     * headers. (drafts.send)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param Google_Draft|Google_Service_Gmail_Draft $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function send($userId, Google_Service_Gmail_Draft $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('send', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Replaces a draft's content. (drafts.update)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param string $id The ID of the draft to update.
     * @param Google_Draft|Google_Service_Gmail_Draft $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($userId, $id, Google_Service_Gmail_Draft $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Gmail_Draft");
    }
}

/**
 * The "history" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $history = $gmailService->history;
 *  </code>
 */
class Google_Service_Gmail_UsersHistory_Resource extends Google_Service_Resource
{

    /**
     * Lists the history of all changes to the given mailbox. History results are
     * returned in chronological order (increasing historyId).
     * (history.listUsersHistory)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Page token to retrieve a specific page of results
     * in the list.
     * @opt_param string maxResults The maximum number of history records to return.
     * @opt_param string labelId Only return messages with a label matching the ID.
     * @opt_param string startHistoryId Required. Returns history records after the
     * specified startHistoryId. The supplied startHistoryId should be obtained from
     * the historyId of a message, thread, or previous list response. History IDs
     * increase chronologically but are not contiguous with random gaps in between
     * valid IDs. Supplying an invalid or out of date startHistoryId typically
     * returns an HTTP 404 error code. A historyId is typically valid for at least a
     * week, but in some circumstances may be valid for only a few hours. If you
     * receive an HTTP 404 error response, your application should perform a full
     * sync. If you receive no nextPageToken in the response, there are no updates
     * to retrieve and you can store the returned historyId for a future request.
     */
    public function listUsersHistory($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Gmail_ListHistoryResponse");
    }
}

/**
 * The "labels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $labels = $gmailService->labels;
 *  </code>
 */
class Google_Service_Gmail_UsersLabels_Resource extends Google_Service_Resource
{

    /**
     * Creates a new label. (labels.create)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param Google_Label|Google_Service_Gmail_Label $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function create($userId, Google_Service_Gmail_Label $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Gmail_Label");
    }

    /**
     * Immediately and permanently deletes the specified label and removes it from
     * any messages and threads that it is applied to. (labels.delete)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the label to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets the specified label. (labels.get)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the label to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Gmail_Label");
    }

    /**
     * Lists all labels in the user's mailbox. (labels.listUsersLabels)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listUsersLabels($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Gmail_ListLabelsResponse");
    }

    /**
     * Updates the specified label. This method supports patch semantics.
     * (labels.patch)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param string $id The ID of the label to update.
     * @param Google_Label|Google_Service_Gmail_Label $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($userId, $id, Google_Service_Gmail_Label $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Gmail_Label");
    }

    /**
     * Updates the specified label. (labels.update)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                           used to indicate the authenticated user.
     * @param string $id The ID of the label to update.
     * @param Google_Label|Google_Service_Gmail_Label $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($userId, $id, Google_Service_Gmail_Label $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Gmail_Label");
    }
}

/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $messages = $gmailService->messages;
 *  </code>
 */
class Google_Service_Gmail_UsersMessages_Resource extends Google_Service_Resource
{

    /**
     * Immediately and permanently deletes the specified message. This operation
     * cannot be undone. Prefer messages.trash instead. (messages.delete)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the message to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets the specified message. (messages.get)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the message to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string metadataHeaders When given and format is METADATA, only
     * include headers specified.
     * @opt_param string format The format to return the message in.
     */
    public function get($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Imports a message into only this user's mailbox, with standard email delivery
     * scanning and classification similar to receiving via SMTP. Does not send a
     * message. (messages.import)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                               used to indicate the authenticated user.
     * @param Google_Message|Google_Service_Gmail_Message $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool deleted Mark the email as permanently deleted (not TRASH) and
     * only visible in Google Apps Vault to a Vault administrator. Only used for
     * Google Apps for Work accounts.
     * @opt_param bool processForCalendar Process calendar invites in the email and
     * add any extracted meetings to the Google Calendar for this user.
     * @opt_param string internalDateSource Source for Gmail's internal date of the
     * message.
     * @opt_param bool neverMarkSpam Ignore the Gmail spam classifier decision and
     * never mark this email as SPAM in the mailbox.
     */
    public function import($userId, Google_Service_Gmail_Message $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('import', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Directly inserts a message into only this user's mailbox similar to IMAP
     * APPEND, bypassing most scanning and classification. Does not send a message.
     * (messages.insert)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                               used to indicate the authenticated user.
     * @param Google_Message|Google_Service_Gmail_Message $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool deleted Mark the email as permanently deleted (not TRASH) and
     * only visible in Google Apps Vault to a Vault administrator. Only used for
     * Google Apps for Work accounts.
     * @opt_param string internalDateSource Source for Gmail's internal date of the
     * message.
     */
    public function insert($userId, Google_Service_Gmail_Message $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Lists the messages in the user's mailbox. (messages.listUsersMessages)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxResults Maximum number of messages to return.
     * @opt_param string q Only return messages matching the specified query.
     * Supports the same query format as the Gmail search box. For example,
     * "from:someuser@example.com rfc822msgid: is:unread".
     * @opt_param string pageToken Page token to retrieve a specific page of results
     * in the list.
     * @opt_param bool includeSpamTrash Include messages from SPAM and TRASH in the
     * results.
     * @opt_param string labelIds Only return messages with labels that match all of
     * the specified label IDs.
     */
    public function listUsersMessages($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Gmail_ListMessagesResponse");
    }

    /**
     * Modifies the labels on the specified message. (messages.modify)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                                                         used to indicate the authenticated user.
     * @param string $id The ID of the message to modify.
     * @param Google_ModifyMessageRequest|Google_Service_Gmail_ModifyMessageRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function modify($userId, $id, Google_Service_Gmail_ModifyMessageRequest $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('modify', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Sends the specified message to the recipients in the To, Cc, and Bcc headers.
     * (messages.send)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                               used to indicate the authenticated user.
     * @param Google_Message|Google_Service_Gmail_Message $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function send($userId, Google_Service_Gmail_Message $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('send', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Moves the specified message to the trash. (messages.trash)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the message to Trash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function trash($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('trash', [$params], "Google_Service_Gmail_Message");
    }

    /**
     * Removes the specified message from the trash. (messages.untrash)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the message to remove from Trash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function untrash($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('untrash', [$params], "Google_Service_Gmail_Message");
    }
}

/**
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $attachments = $gmailService->attachments;
 *  </code>
 */
class Google_Service_Gmail_UsersMessagesAttachments_Resource extends Google_Service_Resource
{

    /**
     * Gets the specified message attachment. (attachments.get)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $messageId The ID of the message containing the attachment.
     * @param string $id The ID of the attachment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userId, $messageId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'messageId' => $messageId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Gmail_MessagePartBody");
    }
}

/**
 * The "threads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google_Service_Gmail(...);
 *   $threads = $gmailService->threads;
 *  </code>
 */
class Google_Service_Gmail_UsersThreads_Resource extends Google_Service_Resource
{

    /**
     * Immediately and permanently deletes the specified thread. This operation
     * cannot be undone. Prefer threads.trash instead. (threads.delete)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id ID of the Thread to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets the specified thread. (threads.get)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the thread to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string metadataHeaders When given and format is METADATA, only
     * include headers specified.
     * @opt_param string format The format to return the messages in.
     */
    public function get($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Gmail_Thread");
    }

    /**
     * Lists the threads in the user's mailbox. (threads.listUsersThreads)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxResults Maximum number of threads to return.
     * @opt_param string q Only return threads matching the specified query.
     * Supports the same query format as the Gmail search box. For example,
     * "from:someuser@example.com rfc822msgid: is:unread".
     * @opt_param string pageToken Page token to retrieve a specific page of results
     * in the list.
     * @opt_param bool includeSpamTrash Include threads from SPAM and TRASH in the
     * results.
     * @opt_param string labelIds Only return threads with labels that match all of
     * the specified label IDs.
     */
    public function listUsersThreads($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Gmail_ListThreadsResponse");
    }

    /**
     * Modifies the labels applied to the thread. This applies to all messages in
     * the thread. (threads.modify)
     *
     * @param string $userId The user's email address. The special value me can be
     *                                                                                       used to indicate the authenticated user.
     * @param string $id The ID of the thread to modify.
     * @param Google_ModifyThreadRequest|Google_Service_Gmail_ModifyThreadRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function modify($userId, $id, Google_Service_Gmail_ModifyThreadRequest $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('modify', [$params], "Google_Service_Gmail_Thread");
    }

    /**
     * Moves the specified thread to the trash. (threads.trash)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the thread to Trash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function trash($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('trash', [$params], "Google_Service_Gmail_Thread");
    }

    /**
     * Removes the specified thread from the trash. (threads.untrash)
     *
     * @param string $userId The user's email address. The special value me can be
     *                          used to indicate the authenticated user.
     * @param string $id The ID of the thread to remove from Trash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function untrash($userId, $id, $optParams = [])
    {
        $params = ['userId' => $userId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('untrash', [$params], "Google_Service_Gmail_Thread");
    }
}


/**
 * Class Google_Service_Gmail_Draft
 */
class Google_Service_Gmail_Draft extends Google_Model
{
    public $id;
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Gmail_Message';
    protected $messageDataType = '';

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
     * @param Google_Service_Gmail_Message $message
     */
    public function setMessage(Google_Service_Gmail_Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}

/**
 * Class Google_Service_Gmail_History
 */
class Google_Service_Gmail_History extends Google_Collection
{
    public $id;
    protected $collection_key = 'messagesDeleted';
    protected $internal_gapi_mappings = [];
    protected $labelsAddedType = 'Google_Service_Gmail_HistoryLabelAdded';
    protected $labelsAddedDataType = 'array';
    protected $labelsRemovedType = 'Google_Service_Gmail_HistoryLabelRemoved';
    protected $labelsRemovedDataType = 'array';
    protected $messagesType = 'Google_Service_Gmail_Message';
    protected $messagesDataType = 'array';
    protected $messagesAddedType = 'Google_Service_Gmail_HistoryMessageAdded';
    protected $messagesAddedDataType = 'array';
    protected $messagesDeletedType = 'Google_Service_Gmail_HistoryMessageDeleted';
    protected $messagesDeletedDataType = 'array';

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
     * @param $labelsAdded
     */
    public function setLabelsAdded($labelsAdded)
    {
        $this->labelsAdded = $labelsAdded;
    }

    /**
     * @return mixed
     */
    public function getLabelsAdded()
    {
        return $this->labelsAdded;
    }

    /**
     * @param $labelsRemoved
     */
    public function setLabelsRemoved($labelsRemoved)
    {
        $this->labelsRemoved = $labelsRemoved;
    }

    /**
     * @return mixed
     */
    public function getLabelsRemoved()
    {
        return $this->labelsRemoved;
    }

    /**
     * @param $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param $messagesAdded
     */
    public function setMessagesAdded($messagesAdded)
    {
        $this->messagesAdded = $messagesAdded;
    }

    /**
     * @return mixed
     */
    public function getMessagesAdded()
    {
        return $this->messagesAdded;
    }

    /**
     * @param $messagesDeleted
     */
    public function setMessagesDeleted($messagesDeleted)
    {
        $this->messagesDeleted = $messagesDeleted;
    }

    /**
     * @return mixed
     */
    public function getMessagesDeleted()
    {
        return $this->messagesDeleted;
    }
}

/**
 * Class Google_Service_Gmail_HistoryLabelAdded
 */
class Google_Service_Gmail_HistoryLabelAdded extends Google_Collection
{
    public $labelIds;
    protected $collection_key = 'labelIds';
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Gmail_Message';
    protected $messageDataType = '';

    /**
     * @return mixed
     */
    public function getLabelIds()
    {
        return $this->labelIds;
    }

    /**
     * @param $labelIds
     */
    public function setLabelIds($labelIds)
    {
        $this->labelIds = $labelIds;
    }

    /**
     * @param Google_Service_Gmail_Message $message
     */
    public function setMessage(Google_Service_Gmail_Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}

/**
 * Class Google_Service_Gmail_HistoryLabelRemoved
 */
class Google_Service_Gmail_HistoryLabelRemoved extends Google_Collection
{
    public $labelIds;
    protected $collection_key = 'labelIds';
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Gmail_Message';
    protected $messageDataType = '';

    /**
     * @return mixed
     */
    public function getLabelIds()
    {
        return $this->labelIds;
    }

    /**
     * @param $labelIds
     */
    public function setLabelIds($labelIds)
    {
        $this->labelIds = $labelIds;
    }

    /**
     * @param Google_Service_Gmail_Message $message
     */
    public function setMessage(Google_Service_Gmail_Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}

/**
 * Class Google_Service_Gmail_HistoryMessageAdded
 */
class Google_Service_Gmail_HistoryMessageAdded extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Gmail_Message';
    protected $messageDataType = '';


    /**
     * @param Google_Service_Gmail_Message $message
     */
    public function setMessage(Google_Service_Gmail_Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}

/**
 * Class Google_Service_Gmail_HistoryMessageDeleted
 */
class Google_Service_Gmail_HistoryMessageDeleted extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Gmail_Message';
    protected $messageDataType = '';


    /**
     * @param Google_Service_Gmail_Message $message
     */
    public function setMessage(Google_Service_Gmail_Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}

/**
 * Class Google_Service_Gmail_Label
 */
class Google_Service_Gmail_Label extends Google_Model
{
    public $id;
    public $labelListVisibility;
    public $messageListVisibility;
    public $messagesTotal;
    public $messagesUnread;
    public $name;
    public $threadsTotal;
    public $threadsUnread;
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
    public function getLabelListVisibility()
    {
        return $this->labelListVisibility;
    }

    /**
     * @param $labelListVisibility
     */
    public function setLabelListVisibility($labelListVisibility)
    {
        $this->labelListVisibility = $labelListVisibility;
    }

    /**
     * @return mixed
     */
    public function getMessageListVisibility()
    {
        return $this->messageListVisibility;
    }

    /**
     * @param $messageListVisibility
     */
    public function setMessageListVisibility($messageListVisibility)
    {
        $this->messageListVisibility = $messageListVisibility;
    }

    /**
     * @return mixed
     */
    public function getMessagesTotal()
    {
        return $this->messagesTotal;
    }

    /**
     * @param $messagesTotal
     */
    public function setMessagesTotal($messagesTotal)
    {
        $this->messagesTotal = $messagesTotal;
    }

    /**
     * @return mixed
     */
    public function getMessagesUnread()
    {
        return $this->messagesUnread;
    }

    /**
     * @param $messagesUnread
     */
    public function setMessagesUnread($messagesUnread)
    {
        $this->messagesUnread = $messagesUnread;
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
    public function getThreadsTotal()
    {
        return $this->threadsTotal;
    }

    /**
     * @param $threadsTotal
     */
    public function setThreadsTotal($threadsTotal)
    {
        $this->threadsTotal = $threadsTotal;
    }

    /**
     * @return mixed
     */
    public function getThreadsUnread()
    {
        return $this->threadsUnread;
    }

    /**
     * @param $threadsUnread
     */
    public function setThreadsUnread($threadsUnread)
    {
        $this->threadsUnread = $threadsUnread;
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
 * Class Google_Service_Gmail_ListDraftsResponse
 */
class Google_Service_Gmail_ListDraftsResponse extends Google_Collection
{
    public $nextPageToken;
    public $resultSizeEstimate;
    protected $collection_key = 'drafts';
    protected $internal_gapi_mappings = [];
    protected $draftsType = 'Google_Service_Gmail_Draft';
    protected $draftsDataType = 'array';

    /**
     * @param $drafts
     */
    public function setDrafts($drafts)
    {
        $this->drafts = $drafts;
    }

    /**
     * @return mixed
     */
    public function getDrafts()
    {
        return $this->drafts;
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
    public function getResultSizeEstimate()
    {
        return $this->resultSizeEstimate;
    }

    /**
     * @param $resultSizeEstimate
     */
    public function setResultSizeEstimate($resultSizeEstimate)
    {
        $this->resultSizeEstimate = $resultSizeEstimate;
    }
}

/**
 * Class Google_Service_Gmail_ListHistoryResponse
 */
class Google_Service_Gmail_ListHistoryResponse extends Google_Collection
{
    public $historyId;
    public $nextPageToken;
    protected $collection_key = 'history';
    protected $internal_gapi_mappings = [];
    protected $historyType = 'Google_Service_Gmail_History';
    protected $historyDataType = 'array';

    /**
     * @param $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @return mixed
     */
    public function getHistoryId()
    {
        return $this->historyId;
    }

    /**
     * @param $historyId
     */
    public function setHistoryId($historyId)
    {
        $this->historyId = $historyId;
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
 * Class Google_Service_Gmail_ListLabelsResponse
 */
class Google_Service_Gmail_ListLabelsResponse extends Google_Collection
{
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = [];
    protected $labelsType = 'Google_Service_Gmail_Label';
    protected $labelsDataType = 'array';


    /**
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }
}

/**
 * Class Google_Service_Gmail_ListMessagesResponse
 */
class Google_Service_Gmail_ListMessagesResponse extends Google_Collection
{
    public $nextPageToken;
    public $resultSizeEstimate;
    protected $collection_key = 'messages';
    protected $internal_gapi_mappings = [];
    protected $messagesType = 'Google_Service_Gmail_Message';
    protected $messagesDataType = 'array';

    /**
     * @param $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
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
    public function getResultSizeEstimate()
    {
        return $this->resultSizeEstimate;
    }

    /**
     * @param $resultSizeEstimate
     */
    public function setResultSizeEstimate($resultSizeEstimate)
    {
        $this->resultSizeEstimate = $resultSizeEstimate;
    }
}

/**
 * Class Google_Service_Gmail_ListThreadsResponse
 */
class Google_Service_Gmail_ListThreadsResponse extends Google_Collection
{
    public $nextPageToken;
    public $resultSizeEstimate;
    protected $collection_key = 'threads';
    protected $internal_gapi_mappings = [];
    protected $threadsType = 'Google_Service_Gmail_Thread';
    protected $threadsDataType = 'array';

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
    public function getResultSizeEstimate()
    {
        return $this->resultSizeEstimate;
    }

    /**
     * @param $resultSizeEstimate
     */
    public function setResultSizeEstimate($resultSizeEstimate)
    {
        $this->resultSizeEstimate = $resultSizeEstimate;
    }

    /**
     * @param $threads
     */
    public function setThreads($threads)
    {
        $this->threads = $threads;
    }

    /**
     * @return mixed
     */
    public function getThreads()
    {
        return $this->threads;
    }
}

/**
 * Class Google_Service_Gmail_Message
 */
class Google_Service_Gmail_Message extends Google_Collection
{
    public $historyId;
    public $id;
    public $labelIds;
    public $raw;
    public $sizeEstimate;
    public $snippet;
    public $threadId;
    protected $collection_key = 'labelIds';
    protected $internal_gapi_mappings = [];
    protected $payloadType = 'Google_Service_Gmail_MessagePart';
    protected $payloadDataType = '';

    /**
     * @return mixed
     */
    public function getHistoryId()
    {
        return $this->historyId;
    }

    /**
     * @param $historyId
     */
    public function setHistoryId($historyId)
    {
        $this->historyId = $historyId;
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
    public function getLabelIds()
    {
        return $this->labelIds;
    }

    /**
     * @param $labelIds
     */
    public function setLabelIds($labelIds)
    {
        $this->labelIds = $labelIds;
    }

    /**
     * @param Google_Service_Gmail_MessagePart $payload
     */
    public function setPayload(Google_Service_Gmail_MessagePart $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return mixed
     */
    public function getSizeEstimate()
    {
        return $this->sizeEstimate;
    }

    /**
     * @param $sizeEstimate
     */
    public function setSizeEstimate($sizeEstimate)
    {
        $this->sizeEstimate = $sizeEstimate;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getThreadId()
    {
        return $this->threadId;
    }

    /**
     * @param $threadId
     */
    public function setThreadId($threadId)
    {
        $this->threadId = $threadId;
    }
}

/**
 * Class Google_Service_Gmail_MessagePart
 */
class Google_Service_Gmail_MessagePart extends Google_Collection
{
    public $filename;
    public $mimeType;
    public $partId;
    protected $collection_key = 'parts';
    protected $internal_gapi_mappings = [];
    protected $bodyType = 'Google_Service_Gmail_MessagePartBody';
    protected $bodyDataType = '';
    protected $headersType = 'Google_Service_Gmail_MessagePartHeader';
    protected $headersDataType = 'array';
    protected $partsType = 'Google_Service_Gmail_MessagePart';
    protected $partsDataType = 'array';


    /**
     * @param Google_Service_Gmail_MessagePartBody $body
     */
    public function setBody(Google_Service_Gmail_MessagePartBody $body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
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
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return mixed
     */
    public function getPartId()
    {
        return $this->partId;
    }

    /**
     * @param $partId
     */
    public function setPartId($partId)
    {
        $this->partId = $partId;
    }

    /**
     * @param $parts
     */
    public function setParts($parts)
    {
        $this->parts = $parts;
    }

    /**
     * @return mixed
     */
    public function getParts()
    {
        return $this->parts;
    }
}

/**
 * Class Google_Service_Gmail_MessagePartBody
 */
class Google_Service_Gmail_MessagePartBody extends Google_Model
{
    public $attachmentId;
    public $data;
    public $size;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAttachmentId()
    {
        return $this->attachmentId;
    }

    /**
     * @param $attachmentId
     */
    public function setAttachmentId($attachmentId)
    {
        $this->attachmentId = $attachmentId;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
 * Class Google_Service_Gmail_MessagePartHeader
 */
class Google_Service_Gmail_MessagePartHeader extends Google_Model
{
    public $name;
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
 * Class Google_Service_Gmail_ModifyMessageRequest
 */
class Google_Service_Gmail_ModifyMessageRequest extends Google_Collection
{
    public $addLabelIds;
    public $removeLabelIds;
    protected $collection_key = 'removeLabelIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAddLabelIds()
    {
        return $this->addLabelIds;
    }

    /**
     * @param $addLabelIds
     */
    public function setAddLabelIds($addLabelIds)
    {
        $this->addLabelIds = $addLabelIds;
    }

    /**
     * @return mixed
     */
    public function getRemoveLabelIds()
    {
        return $this->removeLabelIds;
    }

    /**
     * @param $removeLabelIds
     */
    public function setRemoveLabelIds($removeLabelIds)
    {
        $this->removeLabelIds = $removeLabelIds;
    }
}

/**
 * Class Google_Service_Gmail_ModifyThreadRequest
 */
class Google_Service_Gmail_ModifyThreadRequest extends Google_Collection
{
    public $addLabelIds;
    public $removeLabelIds;
    protected $collection_key = 'removeLabelIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAddLabelIds()
    {
        return $this->addLabelIds;
    }

    /**
     * @param $addLabelIds
     */
    public function setAddLabelIds($addLabelIds)
    {
        $this->addLabelIds = $addLabelIds;
    }

    /**
     * @return mixed
     */
    public function getRemoveLabelIds()
    {
        return $this->removeLabelIds;
    }

    /**
     * @param $removeLabelIds
     */
    public function setRemoveLabelIds($removeLabelIds)
    {
        $this->removeLabelIds = $removeLabelIds;
    }
}

/**
 * Class Google_Service_Gmail_Profile
 */
class Google_Service_Gmail_Profile extends Google_Model
{
    public $emailAddress;
    public $historyId;
    public $messagesTotal;
    public $threadsTotal;
    protected $internal_gapi_mappings = [];

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

    /**
     * @return mixed
     */
    public function getHistoryId()
    {
        return $this->historyId;
    }

    /**
     * @param $historyId
     */
    public function setHistoryId($historyId)
    {
        $this->historyId = $historyId;
    }

    /**
     * @return mixed
     */
    public function getMessagesTotal()
    {
        return $this->messagesTotal;
    }

    /**
     * @param $messagesTotal
     */
    public function setMessagesTotal($messagesTotal)
    {
        $this->messagesTotal = $messagesTotal;
    }

    /**
     * @return mixed
     */
    public function getThreadsTotal()
    {
        return $this->threadsTotal;
    }

    /**
     * @param $threadsTotal
     */
    public function setThreadsTotal($threadsTotal)
    {
        $this->threadsTotal = $threadsTotal;
    }
}

/**
 * Class Google_Service_Gmail_Thread
 */
class Google_Service_Gmail_Thread extends Google_Collection
{
    public $historyId;
    public $id;
    public $snippet;
    protected $collection_key = 'messages';
    protected $internal_gapi_mappings = [];
    protected $messagesType = 'Google_Service_Gmail_Message';
    protected $messagesDataType = 'array';

    /**
     * @return mixed
     */
    public function getHistoryId()
    {
        return $this->historyId;
    }

    /**
     * @param $historyId
     */
    public function setHistoryId($historyId)
    {
        $this->historyId = $historyId;
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
     * @param $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }
}
