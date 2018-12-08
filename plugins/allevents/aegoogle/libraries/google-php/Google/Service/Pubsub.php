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
 * Service definition for Pubsub (v1beta2).
 *
 * <p>
 * Provides reliable, many-to-many, asynchronous messaging between applications.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Pubsub extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage Pub/Sub topics and subscriptions. */
    const PUBSUB =
        "https://www.googleapis.com/auth/pubsub";

    public $projects_subscriptions;
    public $projects_topics;
    public $projects_topics_subscriptions;


    /**
     * Constructs the internal representation of the Pubsub service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'v1beta2/';
        $this->version = 'v1beta2';
        $this->serviceName = 'pubsub';

        $this->projects_subscriptions = new Google_Service_Pubsub_ProjectsSubscriptions_Resource(
            $this,
            $this->serviceName,
            'subscriptions',
            [
                'methods' => [
                    'acknowledge' => [
                        'path' => '{+subscription}:acknowledge',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'create' => [
                        'path' => '{+name}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'name' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{+subscription}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{+subscription}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{+project}/subscriptions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'modifyAckDeadline' => [
                        'path' => '{+subscription}:modifyAckDeadline',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'modifyPushConfig' => [
                        'path' => '{+subscription}:modifyPushConfig',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'pull' => [
                        'path' => '{+subscription}:pull',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'subscription' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_topics = new Google_Service_Pubsub_ProjectsTopics_Resource(
            $this,
            $this->serviceName,
            'topics',
            [
                'methods' => [
                    'create' => [
                        'path' => '{+name}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'name' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{+topic}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'topic' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{+topic}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'topic' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{+project}/topics',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'publish' => [
                        'path' => '{+topic}:publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'topic' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_topics_subscriptions = new Google_Service_Pubsub_ProjectsTopicsSubscriptions_Resource(
            $this,
            $this->serviceName,
            'subscriptions',
            [
                'methods' => [
                    'list' => [
                        'path' => '{+topic}/subscriptions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'topic' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $projects = $pubsubService->projects;
 *  </code>
 */
class Google_Service_Pubsub_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsSubscriptions_Resource extends Google_Service_Resource
{

    /**
     * Acknowledges the messages associated with the ack tokens in the
     * AcknowledgeRequest. The Pub/Sub system can remove the relevant messages from
     * the subscription. Acknowledging a message whose ack deadline has expired may
     * succeed, but such a message may be redelivered later. Acknowledging a message
     * more than once will not result in an error. (subscriptions.acknowledge)
     *
     * @param string $subscription
     * @param Google_AcknowledgeRequest|Google_Service_Pubsub_AcknowledgeRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function acknowledge($subscription, Google_Service_Pubsub_AcknowledgeRequest $postBody, $optParams = [])
    {
        $params = ['subscription' => $subscription, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('acknowledge', [$params], "Google_Service_Pubsub_Empty");
    }

    /**
     * Creates a subscription to a given topic for a given subscriber. If the
     * subscription already exists, returns ALREADY_EXISTS. If the corresponding
     * topic doesn't exist, returns NOT_FOUND. If the name is not provided in the
     * request, the server will assign a random name for this subscription on the
     * same project as the topic. (subscriptions.create)
     *
     * @param string $name
     * @param Google_Service_Pubsub_Subscription|Google_Subscription $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($name, Google_Service_Pubsub_Subscription $postBody, $optParams = [])
    {
        $params = ['name' => $name, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Pubsub_Subscription");
    }

    /**
     * Deletes an existing subscription. All pending messages in the subscription
     * are immediately dropped. Calls to Pull after deletion will return NOT_FOUND.
     * After a subscription is deleted, a new one may be created with the same name,
     * but the new one has no association with the old subscription, or its topic
     * unless the same topic is specified. (subscriptions.delete)
     *
     * @param string $subscription
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($subscription, $optParams = [])
    {
        $params = ['subscription' => $subscription];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Pubsub_Empty");
    }

    /**
     * Gets the configuration details of a subscription. (subscriptions.get)
     *
     * @param string $subscription
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($subscription, $optParams = [])
    {
        $params = ['subscription' => $subscription];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Pubsub_Subscription");
    }

    /**
     * Lists matching subscriptions. (subscriptions.listProjectsSubscriptions)
     *
     * @param string $project
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken
     * @opt_param int pageSize
     */
    public function listProjectsSubscriptions($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Pubsub_ListSubscriptionsResponse");
    }

    /**
     * Modifies the ack deadline for a specific message. This method is useful to
     * indicate that more time is needed to process a message by the subscriber, or
     * to make the message available for redelivery if the processing was
     * interrupted. (subscriptions.modifyAckDeadline)
     *
     * @param string $subscription
     * @param Google_ModifyAckDeadlineRequest|Google_Service_Pubsub_ModifyAckDeadlineRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function modifyAckDeadline($subscription, Google_Service_Pubsub_ModifyAckDeadlineRequest $postBody, $optParams = [])
    {
        $params = ['subscription' => $subscription, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('modifyAckDeadline', [$params], "Google_Service_Pubsub_Empty");
    }

    /**
     * Modifies the PushConfig for a specified subscription. This may be used to
     * change a push subscription to a pull one (signified by an empty PushConfig)
     * or vice versa, or change the endpoint URL and other attributes of a push
     * subscription. Messages will accumulate for delivery continuously through the
     * call regardless of changes to the PushConfig.
     * (subscriptions.modifyPushConfig)
     *
     * @param string $subscription
     * @param Google_ModifyPushConfigRequest|Google_Service_Pubsub_ModifyPushConfigRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function modifyPushConfig($subscription, Google_Service_Pubsub_ModifyPushConfigRequest $postBody, $optParams = [])
    {
        $params = ['subscription' => $subscription, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('modifyPushConfig', [$params], "Google_Service_Pubsub_Empty");
    }

    /**
     * Pulls messages from the server. Returns an empty list if there are no
     * messages available in the backlog. The server may return UNAVAILABLE if there
     * are too many concurrent pull requests pending for the given subscription.
     * (subscriptions.pull)
     *
     * @param string $subscription
     * @param Google_PullRequest|Google_Service_Pubsub_PullRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function pull($subscription, Google_Service_Pubsub_PullRequest $postBody, $optParams = [])
    {
        $params = ['subscription' => $subscription, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('pull', [$params], "Google_Service_Pubsub_PullResponse");
    }
}

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $topics = $pubsubService->topics;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsTopics_Resource extends Google_Service_Resource
{

    /**
     * Creates the given topic with the given name. (topics.create)
     *
     * @param string $name
     * @param Google_Service_Pubsub_Topic|Google_Topic $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function create($name, Google_Service_Pubsub_Topic $postBody, $optParams = [])
    {
        $params = ['name' => $name, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Pubsub_Topic");
    }

    /**
     * Deletes the topic with the given name. Returns NOT_FOUND if the topic does
     * not exist. After a topic is deleted, a new topic may be created with the same
     * name; this is an entirely new topic with none of the old configuration or
     * subscriptions. Existing subscriptions to this topic are not deleted.
     * (topics.delete)
     *
     * @param string $topic
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($topic, $optParams = [])
    {
        $params = ['topic' => $topic];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params], "Google_Service_Pubsub_Empty");
    }

    /**
     * Gets the configuration of a topic. (topics.get)
     *
     * @param string $topic
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($topic, $optParams = [])
    {
        $params = ['topic' => $topic];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Pubsub_Topic");
    }

    /**
     * Lists matching topics. (topics.listProjectsTopics)
     *
     * @param string $project
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken
     * @opt_param int pageSize
     */
    public function listProjectsTopics($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Pubsub_ListTopicsResponse");
    }

    /**
     * Adds one or more messages to the topic. Returns NOT_FOUND if the topic does
     * not exist. (topics.publish)
     *
     * @param string $topic
     * @param Google_PublishRequest|Google_Service_Pubsub_PublishRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function publish($topic, Google_Service_Pubsub_PublishRequest $postBody, $optParams = [])
    {
        $params = ['topic' => $topic, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_Pubsub_PublishResponse");
    }
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $subscriptions = $pubsubService->subscriptions;
 *  </code>
 */
class Google_Service_Pubsub_ProjectsTopicsSubscriptions_Resource extends Google_Service_Resource
{

    /**
     * Lists the name of the subscriptions for this topic.
     * (subscriptions.listProjectsTopicsSubscriptions)
     *
     * @param string $topic
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken
     * @opt_param int pageSize
     */
    public function listProjectsTopicsSubscriptions($topic, $optParams = [])
    {
        $params = ['topic' => $topic];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Pubsub_ListTopicSubscriptionsResponse");
    }
}


/**
 * Class Google_Service_Pubsub_AcknowledgeRequest
 */
class Google_Service_Pubsub_AcknowledgeRequest extends Google_Collection
{
    public $ackIds;
    protected $collection_key = 'ackIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAckIds()
    {
        return $this->ackIds;
    }

    /**
     * @param $ackIds
     */
    public function setAckIds($ackIds)
    {
        $this->ackIds = $ackIds;
    }
}

/**
 * Class Google_Service_Pubsub_Empty
 */
class Google_Service_Pubsub_Empty extends Google_Model
{
}

/**
 * Class Google_Service_Pubsub_ListSubscriptionsResponse
 */
class Google_Service_Pubsub_ListSubscriptionsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'subscriptions';
    protected $internal_gapi_mappings = [];
    protected $subscriptionsType = 'Google_Service_Pubsub_Subscription';
    protected $subscriptionsDataType = 'array';

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

/**
 * Class Google_Service_Pubsub_ListTopicSubscriptionsResponse
 */
class Google_Service_Pubsub_ListTopicSubscriptionsResponse extends Google_Collection
{
    public $nextPageToken;
    public $subscriptions;
    protected $collection_key = 'subscriptions';
    protected $internal_gapi_mappings = [];

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
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param $subscriptions
     */
    public function setSubscriptions($subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }
}

/**
 * Class Google_Service_Pubsub_ListTopicsResponse
 */
class Google_Service_Pubsub_ListTopicsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'topics';
    protected $internal_gapi_mappings = [];
    protected $topicsType = 'Google_Service_Pubsub_Topic';
    protected $topicsDataType = 'array';

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
     * @param $topics
     */
    public function setTopics($topics)
    {
        $this->topics = $topics;
    }

    /**
     * @return mixed
     */
    public function getTopics()
    {
        return $this->topics;
    }
}

/**
 * Class Google_Service_Pubsub_ModifyAckDeadlineRequest
 */
class Google_Service_Pubsub_ModifyAckDeadlineRequest extends Google_Model
{
    public $ackDeadlineSeconds;
    public $ackId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAckDeadlineSeconds()
    {
        return $this->ackDeadlineSeconds;
    }

    /**
     * @param $ackDeadlineSeconds
     */
    public function setAckDeadlineSeconds($ackDeadlineSeconds)
    {
        $this->ackDeadlineSeconds = $ackDeadlineSeconds;
    }

    /**
     * @return mixed
     */
    public function getAckId()
    {
        return $this->ackId;
    }

    /**
     * @param $ackId
     */
    public function setAckId($ackId)
    {
        $this->ackId = $ackId;
    }
}

/**
 * Class Google_Service_Pubsub_ModifyPushConfigRequest
 */
class Google_Service_Pubsub_ModifyPushConfigRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $pushConfigType = 'Google_Service_Pubsub_PushConfig';
    protected $pushConfigDataType = '';


    /**
     * @param Google_Service_Pubsub_PushConfig $pushConfig
     */
    public function setPushConfig(Google_Service_Pubsub_PushConfig $pushConfig)
    {
        $this->pushConfig = $pushConfig;
    }

    /**
     * @return mixed
     */
    public function getPushConfig()
    {
        return $this->pushConfig;
    }
}

/**
 * Class Google_Service_Pubsub_PublishRequest
 */
class Google_Service_Pubsub_PublishRequest extends Google_Collection
{
    protected $collection_key = 'messages';
    protected $internal_gapi_mappings = [];
    protected $messagesType = 'Google_Service_Pubsub_PubsubMessage';
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
}

/**
 * Class Google_Service_Pubsub_PublishResponse
 */
class Google_Service_Pubsub_PublishResponse extends Google_Collection
{
    public $messageIds;
    protected $collection_key = 'messageIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMessageIds()
    {
        return $this->messageIds;
    }

    /**
     * @param $messageIds
     */
    public function setMessageIds($messageIds)
    {
        $this->messageIds = $messageIds;
    }
}

/**
 * Class Google_Service_Pubsub_PubsubMessage
 */
class Google_Service_Pubsub_PubsubMessage extends Google_Model
{
    public $attributes;
    public $data;
    public $messageId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

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
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }
}

/**
 * Class Google_Service_Pubsub_PubsubMessageAttributes
 */
class Google_Service_Pubsub_PubsubMessageAttributes extends Google_Model
{
}

/**
 * Class Google_Service_Pubsub_PullRequest
 */
class Google_Service_Pubsub_PullRequest extends Google_Model
{
    public $maxMessages;
    public $returnImmediately;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMaxMessages()
    {
        return $this->maxMessages;
    }

    /**
     * @param $maxMessages
     */
    public function setMaxMessages($maxMessages)
    {
        $this->maxMessages = $maxMessages;
    }

    /**
     * @return mixed
     */
    public function getReturnImmediately()
    {
        return $this->returnImmediately;
    }

    /**
     * @param $returnImmediately
     */
    public function setReturnImmediately($returnImmediately)
    {
        $this->returnImmediately = $returnImmediately;
    }
}

/**
 * Class Google_Service_Pubsub_PullResponse
 */
class Google_Service_Pubsub_PullResponse extends Google_Collection
{
    protected $collection_key = 'receivedMessages';
    protected $internal_gapi_mappings = [];
    protected $receivedMessagesType = 'Google_Service_Pubsub_ReceivedMessage';
    protected $receivedMessagesDataType = 'array';


    /**
     * @param $receivedMessages
     */
    public function setReceivedMessages($receivedMessages)
    {
        $this->receivedMessages = $receivedMessages;
    }

    /**
     * @return mixed
     */
    public function getReceivedMessages()
    {
        return $this->receivedMessages;
    }
}

/**
 * Class Google_Service_Pubsub_PushConfig
 */
class Google_Service_Pubsub_PushConfig extends Google_Model
{
    public $attributes;
    public $pushEndpoint;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

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
    public function getPushEndpoint()
    {
        return $this->pushEndpoint;
    }

    /**
     * @param $pushEndpoint
     */
    public function setPushEndpoint($pushEndpoint)
    {
        $this->pushEndpoint = $pushEndpoint;
    }
}

/**
 * Class Google_Service_Pubsub_PushConfigAttributes
 */
class Google_Service_Pubsub_PushConfigAttributes extends Google_Model
{
}

/**
 * Class Google_Service_Pubsub_ReceivedMessage
 */
class Google_Service_Pubsub_ReceivedMessage extends Google_Model
{
    public $ackId;
    protected $internal_gapi_mappings = [];
    protected $messageType = 'Google_Service_Pubsub_PubsubMessage';
    protected $messageDataType = '';

    /**
     * @return mixed
     */
    public function getAckId()
    {
        return $this->ackId;
    }

    /**
     * @param $ackId
     */
    public function setAckId($ackId)
    {
        $this->ackId = $ackId;
    }

    /**
     * @param Google_Service_Pubsub_PubsubMessage $message
     */
    public function setMessage(Google_Service_Pubsub_PubsubMessage $message)
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
 * Class Google_Service_Pubsub_Subscription
 */
class Google_Service_Pubsub_Subscription extends Google_Model
{
    public $ackDeadlineSeconds;
    public $name;
    public $topic;
    protected $internal_gapi_mappings = [];
    protected $pushConfigType = 'Google_Service_Pubsub_PushConfig';
    protected $pushConfigDataType = '';

    /**
     * @return mixed
     */
    public function getAckDeadlineSeconds()
    {
        return $this->ackDeadlineSeconds;
    }

    /**
     * @param $ackDeadlineSeconds
     */
    public function setAckDeadlineSeconds($ackDeadlineSeconds)
    {
        $this->ackDeadlineSeconds = $ackDeadlineSeconds;
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
     * @param Google_Service_Pubsub_PushConfig $pushConfig
     */
    public function setPushConfig(Google_Service_Pubsub_PushConfig $pushConfig)
    {
        $this->pushConfig = $pushConfig;
    }

    /**
     * @return mixed
     */
    public function getPushConfig()
    {
        return $this->pushConfig;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }
}

/**
 * Class Google_Service_Pubsub_Topic
 */
class Google_Service_Pubsub_Topic extends Google_Model
{
    public $name;
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
}
