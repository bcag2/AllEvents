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
 * Service definition for PlusDomains (v1).
 *
 * <p>
 * The Google+ API enables developers to build on top of the Google+ platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/+/domains/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_PlusDomains extends Google_Service
{
    /** View your circles and the people and pages in them. */
    const PLUS_CIRCLES_READ =
        "https://www.googleapis.com/auth/plus.circles.read";
    /** Manage your circles and add people and pages. People and pages you add to your circles will be notified. Others may see this information publicly. People you add to circles can use Hangouts with you.. */
    const PLUS_CIRCLES_WRITE =
        "https://www.googleapis.com/auth/plus.circles.write";
    /** Know your basic profile info and list of people in your circles.. */
    const PLUS_LOGIN =
        "https://www.googleapis.com/auth/plus.login";
    /** Know who you are on Google. */
    const PLUS_ME =
        "https://www.googleapis.com/auth/plus.me";
    /** Send your photos and videos to Google+. */
    const PLUS_MEDIA_UPLOAD =
        "https://www.googleapis.com/auth/plus.media.upload";
    /** View your own Google+ profile and profiles visible to you. */
    const PLUS_PROFILES_READ =
        "https://www.googleapis.com/auth/plus.profiles.read";
    /** View your Google+ posts, comments, and stream. */
    const PLUS_STREAM_READ =
        "https://www.googleapis.com/auth/plus.stream.read";
    /** Manage your Google+ posts, comments, and stream. */
    const PLUS_STREAM_WRITE =
        "https://www.googleapis.com/auth/plus.stream.write";
    /** View your email address. */
    const USERINFO_EMAIL =
        "https://www.googleapis.com/auth/userinfo.email";
    /** View your basic profile info. */
    const USERINFO_PROFILE =
        "https://www.googleapis.com/auth/userinfo.profile";

    public $activities;
    public $audiences;
    public $circles;
    public $comments;
    public $media;
    public $people;


    /**
     * Constructs the internal representation of the PlusDomains service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'plusDomains/v1/';
        $this->version = 'v1';
        $this->serviceName = 'plusDomains';

        $this->activities = new Google_Service_PlusDomains_Activities_Resource(
            $this,
            $this->serviceName,
            'activities',
            [
                'methods' => [
                    'get' => [
                        'path' => 'activities/{activityId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'activityId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'people/{userId}/activities',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'preview' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'people/{userId}/activities/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
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
        $this->audiences = new Google_Service_PlusDomains_Audiences_Resource(
            $this,
            $this->serviceName,
            'audiences',
            [
                'methods' => [
                    'list' => [
                        'path' => 'people/{userId}/audiences',
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
                    ],
                ]
            ]
        );
        $this->circles = new Google_Service_PlusDomains_Circles_Resource(
            $this,
            $this->serviceName,
            'circles',
            [
                'methods' => [
                    'addPeople' => [
                        'path' => 'circles/{circleId}/people',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'userId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'email' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'circles/{circleId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'people/{userId}/circles',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'people/{userId}/circles',
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
                    ], 'patch' => [
                        'path' => 'circles/{circleId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'remove' => [
                        'path' => 'circles/{circleId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'removePeople' => [
                        'path' => 'circles/{circleId}/people',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'userId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'email' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'circles/{circleId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'circleId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->comments = new Google_Service_PlusDomains_Comments_Resource(
            $this,
            $this->serviceName,
            'comments',
            [
                'methods' => [
                    'get' => [
                        'path' => 'comments/{commentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'activities/{activityId}/comments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'activityId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'activities/{activityId}/comments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'activityId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
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
        $this->media = new Google_Service_PlusDomains_Media_Resource(
            $this,
            $this->serviceName,
            'media',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'people/{userId}/media/{collection}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->people = new Google_Service_PlusDomains_People_Resource(
            $this,
            $this->serviceName,
            'people',
            [
                'methods' => [
                    'get' => [
                        'path' => 'people/{userId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'people/{userId}/people/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
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
                    ], 'listByActivity' => [
                        'path' => 'activities/{activityId}/people/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'activityId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
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
                    ], 'listByCircle' => [
                        'path' => 'circles/{circleId}/people',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'circleId' => [
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
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $activities = $plusDomainsService->activities;
 *  </code>
 */
class Google_Service_PlusDomains_Activities_Resource extends Google_Service_Resource
{

    /**
     * Get an activity. (activities.get)
     *
     * @param string $activityId The ID of the activity to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($activityId, $optParams = [])
    {
        $params = ['activityId' => $activityId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_PlusDomains_Activity");
    }

    /**
     * Create a new activity for the authenticated user. (activities.insert)
     *
     * @param string $userId The ID of the user to create the activity on behalf of.
     *                                                                       Its value should be "me", to indicate the authenticated user.
     * @param Google_Activity|Google_Service_PlusDomains_Activity $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool preview If "true", extract the potential media attachments
     * for a URL. The response will include all possible attachments for a URL,
     * including video, photos, and articles based on the content of the page.
     */
    public function insert($userId, Google_Service_PlusDomains_Activity $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_PlusDomains_Activity");
    }

    /**
     * List all of the activities in the specified collection for a particular user.
     * (activities.listActivities)
     *
     * @param string $userId The ID of the user to get activities for. The special
     *                           value "me" can be used to indicate the authenticated user.
     * @param string $collection The collection of activities to list.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of activities to include in
     * the response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listActivities($userId, $collection, $optParams = [])
    {
        $params = ['userId' => $userId, 'collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_PlusDomains_ActivityFeed");
    }
}

/**
 * The "audiences" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $audiences = $plusDomainsService->audiences;
 *  </code>
 */
class Google_Service_PlusDomains_Audiences_Resource extends Google_Service_Resource
{

    /**
     * List all of the audiences to which a user can share.
     * (audiences.listAudiences)
     *
     * @param string $userId The ID of the user to get audiences for. The special
     *                          value "me" can be used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of circles to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listAudiences($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_PlusDomains_AudiencesFeed");
    }
}

/**
 * The "circles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $circles = $plusDomainsService->circles;
 *  </code>
 */
class Google_Service_PlusDomains_Circles_Resource extends Google_Service_Resource
{

    /**
     * Add a person to a circle. Google+ limits certain circle operations, including
     * the number of circle adds. Learn More. (circles.addPeople)
     *
     * @param string $circleId The ID of the circle to add the person to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string userId IDs of the people to add to the circle. Optional,
     * can be repeated.
     * @opt_param string email Email of the people to add to the circle. Optional,
     * can be repeated.
     */
    public function addPeople($circleId, $optParams = [])
    {
        $params = ['circleId' => $circleId];
        $params = array_merge($params, $optParams);

        return $this->call('addPeople', [$params], "Google_Service_PlusDomains_Circle");
    }

    /**
     * Get a circle. (circles.get)
     *
     * @param string $circleId The ID of the circle to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($circleId, $optParams = [])
    {
        $params = ['circleId' => $circleId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_PlusDomains_Circle");
    }

    /**
     * Create a new circle for the authenticated user. (circles.insert)
     *
     * @param string $userId The ID of the user to create the circle on behalf of.
     *                                                                   The value "me" can be used to indicate the authenticated user.
     * @param Google_Circle|Google_Service_PlusDomains_Circle $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($userId, Google_Service_PlusDomains_Circle $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_PlusDomains_Circle");
    }

    /**
     * List all of the circles for a user. (circles.listCircles)
     *
     * @param string $userId The ID of the user to get circles for. The special
     *                          value "me" can be used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of circles to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listCircles($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_PlusDomains_CircleFeed");
    }

    /**
     * Update a circle's description. This method supports patch semantics.
     * (circles.patch)
     *
     * @param string $circleId The ID of the circle to update.
     * @param Google_Circle|Google_Service_PlusDomains_Circle $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($circleId, Google_Service_PlusDomains_Circle $postBody, $optParams = [])
    {
        $params = ['circleId' => $circleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_PlusDomains_Circle");
    }

    /**
     * Delete a circle. (circles.remove)
     *
     * @param string $circleId The ID of the circle to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function remove($circleId, $optParams = [])
    {
        $params = ['circleId' => $circleId];
        $params = array_merge($params, $optParams);

        return $this->call('remove', [$params]);
    }

    /**
     * Remove a person from a circle. (circles.removePeople)
     *
     * @param string $circleId The ID of the circle to remove the person from.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string userId IDs of the people to remove from the circle.
     * Optional, can be repeated.
     * @opt_param string email Email of the people to add to the circle. Optional,
     * can be repeated.
     * @return expected_class|Google_Http_Request
     */
    public function removePeople($circleId, $optParams = [])
    {
        $params = ['circleId' => $circleId];
        $params = array_merge($params, $optParams);

        return $this->call('removePeople', [$params]);
    }

    /**
     * Update a circle's description. (circles.update)
     *
     * @param string $circleId The ID of the circle to update.
     * @param Google_Circle|Google_Service_PlusDomains_Circle $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($circleId, Google_Service_PlusDomains_Circle $postBody, $optParams = [])
    {
        $params = ['circleId' => $circleId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_PlusDomains_Circle");
    }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $comments = $plusDomainsService->comments;
 *  </code>
 */
class Google_Service_PlusDomains_Comments_Resource extends Google_Service_Resource
{

    /**
     * Get a comment. (comments.get)
     *
     * @param string $commentId The ID of the comment to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($commentId, $optParams = [])
    {
        $params = ['commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_PlusDomains_Comment");
    }

    /**
     * Create a new comment in reply to an activity. (comments.insert)
     *
     * @param string $activityId The ID of the activity to reply to.
     * @param Google_Comment|Google_Service_PlusDomains_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($activityId, Google_Service_PlusDomains_Comment $postBody, $optParams = [])
    {
        $params = ['activityId' => $activityId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_PlusDomains_Comment");
    }

    /**
     * List all of the comments for an activity. (comments.listComments)
     *
     * @param string $activityId The ID of the activity to get comments for.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string sortOrder The order in which to sort the list of comments.
     * @opt_param string maxResults The maximum number of comments to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listComments($activityId, $optParams = [])
    {
        $params = ['activityId' => $activityId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_PlusDomains_CommentFeed");
    }
}

/**
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $media = $plusDomainsService->media;
 *  </code>
 */
class Google_Service_PlusDomains_Media_Resource extends Google_Service_Resource
{

    /**
     * Add a new media item to an album. The current upload size limitations are
     * 36MB for a photo and 1GB for a video. Uploads do not count against quota if
     * photos are less than 2048 pixels on their longest side or videos are less
     * than 15 minutes in length. (media.insert)
     *
     * @param string $userId The ID of the user to create the activity on behalf of.
     * @param string $collection
     * @param Google_Media|Google_Service_PlusDomains_Media $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($userId, $collection, Google_Service_PlusDomains_Media $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'collection' => $collection, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_PlusDomains_Media");
    }
}

/**
 * The "people" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $people = $plusDomainsService->people;
 *  </code>
 */
class Google_Service_PlusDomains_People_Resource extends Google_Service_Resource
{

    /**
     * Get a person's profile. (people.get)
     *
     * @param string $userId The ID of the person to get the profile for. The
     *                          special value "me" can be used to indicate the authenticated user.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_PlusDomains_Person");
    }

    /**
     * List all of the people in the specified collection. (people.listPeople)
     *
     * @param string $userId Get the collection of people for the person identified.
     *                           Use "me" to indicate the authenticated user.
     * @param string $collection The collection of people to list.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy The order to return people in.
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of people to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listPeople($userId, $collection, $optParams = [])
    {
        $params = ['userId' => $userId, 'collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_PlusDomains_PeopleFeed");
    }

    /**
     * List all of the people in the specified collection for a particular activity.
     * (people.listByActivity)
     *
     * @param string $activityId The ID of the activity to get the list of people
     *                           for.
     * @param string $collection The collection of people to list.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of people to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listByActivity($activityId, $collection, $optParams = [])
    {
        $params = ['activityId' => $activityId, 'collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('listByActivity', [$params], "Google_Service_PlusDomains_PeopleFeed");
    }

    /**
     * List all of the people who are members of a circle. (people.listByCircle)
     *
     * @param string $circleId The ID of the circle to get the members of.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string maxResults The maximum number of people to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     */
    public function listByCircle($circleId, $optParams = [])
    {
        $params = ['circleId' => $circleId];
        $params = array_merge($params, $optParams);

        return $this->call('listByCircle', [$params], "Google_Service_PlusDomains_PeopleFeed");
    }
}


/**
 * Class Google_Service_PlusDomains_Acl
 */
class Google_Service_PlusDomains_Acl extends Google_Collection
{
    public $description;
    public $domainRestricted;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_PlusDomainsAclentryResource';
    protected $itemsDataType = 'array';

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
    public function getDomainRestricted()
    {
        return $this->domainRestricted;
    }

    /**
     * @param $domainRestricted
     */
    public function setDomainRestricted($domainRestricted)
    {
        $this->domainRestricted = $domainRestricted;
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
}

/**
 * Class Google_Service_PlusDomains_Activity
 */
class Google_Service_PlusDomains_Activity extends Google_Model
{
    public $address;
    public $annotation;
    public $crosspostSource;
    public $etag;
    public $geocode;
    public $id;
    public $kind;
    public $placeId;
    public $placeName;
    public $published;
    public $radius;
    public $title;
    public $updated;
    public $url;
    public $verb;
    protected $internal_gapi_mappings = [];
    protected $accessType = 'Google_Service_PlusDomains_Acl';
    protected $accessDataType = '';
    protected $actorType = 'Google_Service_PlusDomains_ActivityActor';
    protected $actorDataType = '';
    protected $locationType = 'Google_Service_PlusDomains_Place';
    protected $locationDataType = '';
    protected $objectType = 'Google_Service_PlusDomains_ActivityObject';
    protected $objectDataType = '';
    protected $providerType = 'Google_Service_PlusDomains_ActivityProvider';
    protected $providerDataType = '';

    /**
     * @param Google_Service_PlusDomains_Acl $access
     */
    public function setAccess(Google_Service_PlusDomains_Acl $access)
    {
        $this->access = $access;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityActor $actor
     */
    public function setActor(Google_Service_PlusDomains_ActivityActor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
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
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     * @return mixed
     */
    public function getCrosspostSource()
    {
        return $this->crosspostSource;
    }

    /**
     * @param $crosspostSource
     */
    public function setCrosspostSource($crosspostSource)
    {
        $this->crosspostSource = $crosspostSource;
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
    public function getGeocode()
    {
        return $this->geocode;
    }

    /**
     * @param $geocode
     */
    public function setGeocode($geocode)
    {
        $this->geocode = $geocode;
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
     * @param Google_Service_PlusDomains_Place $location
     */
    public function setLocation(Google_Service_PlusDomains_Place $location)
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
     * @param Google_Service_PlusDomains_ActivityObject $object
     */
    public function setObject(Google_Service_PlusDomains_ActivityObject $object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @return mixed
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * @param $placeId
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
    }

    /**
     * @return mixed
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * @param $placeName
     */
    public function setPlaceName($placeName)
    {
        $this->placeName = $placeName;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityProvider $provider
     */
    public function setProvider(Google_Service_PlusDomains_ActivityProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
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

    /**
     * @return mixed
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * @param $verb
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
    }
}

/**
 * Class Google_Service_PlusDomains_ActivityActor
 */
class Google_Service_PlusDomains_ActivityActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_PlusDomains_ActivityActorImage';
    protected $imageDataType = '';
    protected $nameType = 'Google_Service_PlusDomains_ActivityActorName';
    protected $nameDataType = '';

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
     * @param Google_Service_PlusDomains_ActivityActorImage $image
     */
    public function setImage(Google_Service_PlusDomains_ActivityActorImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityActorName $name
     */
    public function setName(Google_Service_PlusDomains_ActivityActorName $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
 * Class Google_Service_PlusDomains_ActivityActorImage
 */
class Google_Service_PlusDomains_ActivityActorImage extends Google_Model
{
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_ActivityActorName
 */
class Google_Service_PlusDomains_ActivityActorName extends Google_Model
{
    public $familyName;
    public $givenName;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_PlusDomains_ActivityFeed
 */
class Google_Service_PlusDomains_ActivityFeed extends Google_Collection
{
    public $etag;
    public $id;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    public $title;
    public $updated;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_Activity';
    protected $itemsDataType = 'array';

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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
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
 * Class Google_Service_PlusDomains_ActivityObject
 */
class Google_Service_PlusDomains_ActivityObject extends Google_Collection
{
    public $content;
    public $id;
    public $objectType;
    public $originalContent;
    public $url;
    protected $collection_key = 'attachments';
    protected $internal_gapi_mappings = [];
    protected $actorType = 'Google_Service_PlusDomains_ActivityObjectActor';
    protected $actorDataType = '';
    protected $attachmentsType = 'Google_Service_PlusDomains_ActivityObjectAttachments';
    protected $attachmentsDataType = 'array';
    protected $plusonersType = 'Google_Service_PlusDomains_ActivityObjectPlusoners';
    protected $plusonersDataType = '';
    protected $repliesType = 'Google_Service_PlusDomains_ActivityObjectReplies';
    protected $repliesDataType = '';
    protected $resharersType = 'Google_Service_PlusDomains_ActivityObjectResharers';
    protected $resharersDataType = '';
    protected $statusForViewerType = 'Google_Service_PlusDomains_ActivityObjectStatusForViewer';
    protected $statusForViewerDataType = '';

    /**
     * @param Google_Service_PlusDomains_ActivityObjectActor $actor
     */
    public function setActor(Google_Service_PlusDomains_ActivityObjectActor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
    }

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
    public function getContent()
    {
        return $this->content;
    }

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
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }

    /**
     * @return mixed
     */
    public function getOriginalContent()
    {
        return $this->originalContent;
    }

    /**
     * @param $originalContent
     */
    public function setOriginalContent($originalContent)
    {
        $this->originalContent = $originalContent;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityObjectPlusoners $plusoners
     */
    public function setPlusoners(Google_Service_PlusDomains_ActivityObjectPlusoners $plusoners)
    {
        $this->plusoners = $plusoners;
    }

    /**
     * @return mixed
     */
    public function getPlusoners()
    {
        return $this->plusoners;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityObjectReplies $replies
     */
    public function setReplies(Google_Service_PlusDomains_ActivityObjectReplies $replies)
    {
        $this->replies = $replies;
    }

    /**
     * @return mixed
     */
    public function getReplies()
    {
        return $this->replies;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityObjectResharers $resharers
     */
    public function setResharers(Google_Service_PlusDomains_ActivityObjectResharers $resharers)
    {
        $this->resharers = $resharers;
    }

    /**
     * @return mixed
     */
    public function getResharers()
    {
        return $this->resharers;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityObjectStatusForViewer $statusForViewer
     */
    public function setStatusForViewer(Google_Service_PlusDomains_ActivityObjectStatusForViewer $statusForViewer)
    {
        $this->statusForViewer = $statusForViewer;
    }

    /**
     * @return mixed
     */
    public function getStatusForViewer()
    {
        return $this->statusForViewer;
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
 * Class Google_Service_PlusDomains_ActivityObjectActor
 */
class Google_Service_PlusDomains_ActivityObjectActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_PlusDomains_ActivityObjectActorImage';
    protected $imageDataType = '';

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
     * @param Google_Service_PlusDomains_ActivityObjectActorImage $image
     */
    public function setImage(Google_Service_PlusDomains_ActivityObjectActorImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
 * Class Google_Service_PlusDomains_ActivityObjectActorImage
 */
class Google_Service_PlusDomains_ActivityObjectActorImage extends Google_Model
{
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_ActivityObjectAttachments
 */
class Google_Service_PlusDomains_ActivityObjectAttachments extends Google_Collection
{
    public $content;
    public $displayName;
    public $id;
    public $objectType;
    public $url;
    protected $collection_key = 'thumbnails';
    protected $internal_gapi_mappings = [];
    protected $embedType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsEmbed';
    protected $embedDataType = '';
    protected $fullImageType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsFullImage';
    protected $fullImageDataType = '';
    protected $imageType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsImage';
    protected $imageDataType = '';
    protected $previewThumbnailsType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsPreviewThumbnails';
    protected $previewThumbnailsDataType = 'array';
    protected $thumbnailsType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnails';
    protected $thumbnailsDataType = 'array';

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

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
     * @param Google_Service_PlusDomains_ActivityObjectAttachmentsEmbed $embed
     */
    public function setEmbed(Google_Service_PlusDomains_ActivityObjectAttachmentsEmbed $embed)
    {
        $this->embed = $embed;
    }

    /**
     * @return mixed
     */
    public function getEmbed()
    {
        return $this->embed;
    }

    /**
     * @param Google_Service_PlusDomains_ActivityObjectAttachmentsFullImage $fullImage
     */
    public function setFullImage(Google_Service_PlusDomains_ActivityObjectAttachmentsFullImage $fullImage)
    {
        $this->fullImage = $fullImage;
    }

    /**
     * @return mixed
     */
    public function getFullImage()
    {
        return $this->fullImage;
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
     * @param Google_Service_PlusDomains_ActivityObjectAttachmentsImage $image
     */
    public function setImage(Google_Service_PlusDomains_ActivityObjectAttachmentsImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }

    /**
     * @param $previewThumbnails
     */
    public function setPreviewThumbnails($previewThumbnails)
    {
        $this->previewThumbnails = $previewThumbnails;
    }

    /**
     * @return mixed
     */
    public function getPreviewThumbnails()
    {
        return $this->previewThumbnails;
    }

    /**
     * @param $thumbnails
     */
    public function setThumbnails($thumbnails)
    {
        $this->thumbnails = $thumbnails;
    }

    /**
     * @return mixed
     */
    public function getThumbnails()
    {
        return $this->thumbnails;
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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsEmbed
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsEmbed extends Google_Model
{
    public $type;
    public $url;
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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsFullImage
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsFullImage extends Google_Model
{
    public $height;
    public $type;
    public $url;
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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsImage
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsImage extends Google_Model
{
    public $height;
    public $type;
    public $url;
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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsPreviewThumbnails
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsPreviewThumbnails extends Google_Model
{
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnails
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnails extends Google_Model
{
    public $description;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnailsImage';
    protected $imageDataType = '';

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
     * @param Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnailsImage $image
     */
    public function setImage(Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnailsImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
 * Class Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnailsImage
 */
class Google_Service_PlusDomains_ActivityObjectAttachmentsThumbnailsImage extends Google_Model
{
    public $height;
    public $type;
    public $url;
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
 * Class Google_Service_PlusDomains_ActivityObjectPlusoners
 */
class Google_Service_PlusDomains_ActivityObjectPlusoners extends Google_Model
{
    public $selfLink;
    public $totalItems;
    protected $internal_gapi_mappings = [];

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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_ActivityObjectReplies
 */
class Google_Service_PlusDomains_ActivityObjectReplies extends Google_Model
{
    public $selfLink;
    public $totalItems;
    protected $internal_gapi_mappings = [];

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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_ActivityObjectResharers
 */
class Google_Service_PlusDomains_ActivityObjectResharers extends Google_Model
{
    public $selfLink;
    public $totalItems;
    protected $internal_gapi_mappings = [];

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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_ActivityObjectStatusForViewer
 */
class Google_Service_PlusDomains_ActivityObjectStatusForViewer extends Google_Model
{
    public $canComment;
    public $canPlusone;
    public $canUpdate;
    public $isPlusOned;
    public $resharingDisabled;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCanComment()
    {
        return $this->canComment;
    }

    /**
     * @param $canComment
     */
    public function setCanComment($canComment)
    {
        $this->canComment = $canComment;
    }

    /**
     * @return mixed
     */
    public function getCanPlusone()
    {
        return $this->canPlusone;
    }

    /**
     * @param $canPlusone
     */
    public function setCanPlusone($canPlusone)
    {
        $this->canPlusone = $canPlusone;
    }

    /**
     * @return mixed
     */
    public function getCanUpdate()
    {
        return $this->canUpdate;
    }

    /**
     * @param $canUpdate
     */
    public function setCanUpdate($canUpdate)
    {
        $this->canUpdate = $canUpdate;
    }

    /**
     * @return mixed
     */
    public function getIsPlusOned()
    {
        return $this->isPlusOned;
    }

    /**
     * @param $isPlusOned
     */
    public function setIsPlusOned($isPlusOned)
    {
        $this->isPlusOned = $isPlusOned;
    }

    /**
     * @return mixed
     */
    public function getResharingDisabled()
    {
        return $this->resharingDisabled;
    }

    /**
     * @param $resharingDisabled
     */
    public function setResharingDisabled($resharingDisabled)
    {
        $this->resharingDisabled = $resharingDisabled;
    }
}

/**
 * Class Google_Service_PlusDomains_ActivityProvider
 */
class Google_Service_PlusDomains_ActivityProvider extends Google_Model
{
    public $title;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_Audience
 */
class Google_Service_PlusDomains_Audience extends Google_Model
{
    public $etag;
    public $kind;
    public $memberCount;
    public $visibility;
    protected $internal_gapi_mappings = [];
    protected $itemType = 'Google_Service_PlusDomains_PlusDomainsAclentryResource';
    protected $itemDataType = '';

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
     * @param Google_Service_PlusDomains_PlusDomainsAclentryResource $item
     */
    public function setItem(Google_Service_PlusDomains_PlusDomainsAclentryResource $item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
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
    public function getMemberCount()
    {
        return $this->memberCount;
    }

    /**
     * @param $memberCount
     */
    public function setMemberCount($memberCount)
    {
        $this->memberCount = $memberCount;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
}

/**
 * Class Google_Service_PlusDomains_AudiencesFeed
 */
class Google_Service_PlusDomains_AudiencesFeed extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_Audience';
    protected $itemsDataType = 'array';

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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_Circle
 */
class Google_Service_PlusDomains_Circle extends Google_Model
{
    public $description;
    public $displayName;
    public $etag;
    public $id;
    public $kind;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $peopleType = 'Google_Service_PlusDomains_CirclePeople';
    protected $peopleDataType = '';

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
     * @param Google_Service_PlusDomains_CirclePeople $people
     */
    public function setPeople(Google_Service_PlusDomains_CirclePeople $people)
    {
        $this->people = $people;
    }

    /**
     * @return mixed
     */
    public function getPeople()
    {
        return $this->people;
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
 * Class Google_Service_PlusDomains_CircleFeed
 */
class Google_Service_PlusDomains_CircleFeed extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    public $title;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_Circle';
    protected $itemsDataType = 'array';

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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_CirclePeople
 */
class Google_Service_PlusDomains_CirclePeople extends Google_Model
{
    public $totalItems;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_Comment
 */
class Google_Service_PlusDomains_Comment extends Google_Collection
{
    public $etag;
    public $id;
    public $kind;
    public $published;
    public $selfLink;
    public $updated;
    public $verb;
    protected $collection_key = 'inReplyTo';
    protected $internal_gapi_mappings = [];
    protected $actorType = 'Google_Service_PlusDomains_CommentActor';
    protected $actorDataType = '';
    protected $inReplyToType = 'Google_Service_PlusDomains_CommentInReplyTo';
    protected $inReplyToDataType = 'array';
    protected $objectType = 'Google_Service_PlusDomains_CommentObject';
    protected $objectDataType = '';
    protected $plusonersType = 'Google_Service_PlusDomains_CommentPlusoners';
    protected $plusonersDataType = '';

    /**
     * @param Google_Service_PlusDomains_CommentActor $actor
     */
    public function setActor(Google_Service_PlusDomains_CommentActor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * @return mixed
     */
    public function getActor()
    {
        return $this->actor;
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
     * @param $inReplyTo
     */
    public function setInReplyTo($inReplyTo)
    {
        $this->inReplyTo = $inReplyTo;
    }

    /**
     * @return mixed
     */
    public function getInReplyTo()
    {
        return $this->inReplyTo;
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
     * @param Google_Service_PlusDomains_CommentObject $object
     */
    public function setObject(Google_Service_PlusDomains_CommentObject $object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param Google_Service_PlusDomains_CommentPlusoners $plusoners
     */
    public function setPlusoners(Google_Service_PlusDomains_CommentPlusoners $plusoners)
    {
        $this->plusoners = $plusoners;
    }

    /**
     * @return mixed
     */
    public function getPlusoners()
    {
        return $this->plusoners;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
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
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * @param $verb
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
    }
}

/**
 * Class Google_Service_PlusDomains_CommentActor
 */
class Google_Service_PlusDomains_CommentActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_PlusDomains_CommentActorImage';
    protected $imageDataType = '';

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
     * @param Google_Service_PlusDomains_CommentActorImage $image
     */
    public function setImage(Google_Service_PlusDomains_CommentActorImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
 * Class Google_Service_PlusDomains_CommentActorImage
 */
class Google_Service_PlusDomains_CommentActorImage extends Google_Model
{
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_CommentFeed
 */
class Google_Service_PlusDomains_CommentFeed extends Google_Collection
{
    public $etag;
    public $id;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $title;
    public $updated;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_Comment';
    protected $itemsDataType = 'array';

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
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param $nextLink
     */
    public function setNextLink($nextLink)
    {
        $this->nextLink = $nextLink;
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
 * Class Google_Service_PlusDomains_CommentInReplyTo
 */
class Google_Service_PlusDomains_CommentInReplyTo extends Google_Model
{
    public $id;
    public $url;
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
 * Class Google_Service_PlusDomains_CommentObject
 */
class Google_Service_PlusDomains_CommentObject extends Google_Model
{
    public $content;
    public $objectType;
    public $originalContent;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

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
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }

    /**
     * @return mixed
     */
    public function getOriginalContent()
    {
        return $this->originalContent;
    }

    /**
     * @param $originalContent
     */
    public function setOriginalContent($originalContent)
    {
        $this->originalContent = $originalContent;
    }
}

/**
 * Class Google_Service_PlusDomains_CommentPlusoners
 */
class Google_Service_PlusDomains_CommentPlusoners extends Google_Model
{
    public $totalItems;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_Media
 */
class Google_Service_PlusDomains_Media extends Google_Collection
{
    public $displayName;
    public $etag;
    public $height;
    public $id;
    public $kind;
    public $mediaCreatedTime;
    public $mediaUrl;
    public $published;
    public $sizeBytes;
    public $summary;
    public $updated;
    public $url;
    public $videoDuration;
    public $videoStatus;
    public $width;
    protected $collection_key = 'streams';
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_PlusDomains_MediaAuthor';
    protected $authorDataType = '';
    protected $exifType = 'Google_Service_PlusDomains_MediaExif';
    protected $exifDataType = '';
    protected $streamsType = 'Google_Service_PlusDomains_Videostream';
    protected $streamsDataType = 'array';

    /**
     * @param Google_Service_PlusDomains_MediaAuthor $author
     */
    public function setAuthor(Google_Service_PlusDomains_MediaAuthor $author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
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
     * @param Google_Service_PlusDomains_MediaExif $exif
     */
    public function setExif(Google_Service_PlusDomains_MediaExif $exif)
    {
        $this->exif = $exif;
    }

    /**
     * @return mixed
     */
    public function getExif()
    {
        return $this->exif;
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
    public function getMediaCreatedTime()
    {
        return $this->mediaCreatedTime;
    }

    /**
     * @param $mediaCreatedTime
     */
    public function setMediaCreatedTime($mediaCreatedTime)
    {
        $this->mediaCreatedTime = $mediaCreatedTime;
    }

    /**
     * @return mixed
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getSizeBytes()
    {
        return $this->sizeBytes;
    }

    /**
     * @param $sizeBytes
     */
    public function setSizeBytes($sizeBytes)
    {
        $this->sizeBytes = $sizeBytes;
    }

    /**
     * @param $streams
     */
    public function setStreams($streams)
    {
        $this->streams = $streams;
    }

    /**
     * @return mixed
     */
    public function getStreams()
    {
        return $this->streams;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
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

    /**
     * @return mixed
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * @param $videoDuration
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;
    }

    /**
     * @return mixed
     */
    public function getVideoStatus()
    {
        return $this->videoStatus;
    }

    /**
     * @param $videoStatus
     */
    public function setVideoStatus($videoStatus)
    {
        $this->videoStatus = $videoStatus;
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
 * Class Google_Service_PlusDomains_MediaAuthor
 */
class Google_Service_PlusDomains_MediaAuthor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_PlusDomains_MediaAuthorImage';
    protected $imageDataType = '';

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
     * @param Google_Service_PlusDomains_MediaAuthorImage $image
     */
    public function setImage(Google_Service_PlusDomains_MediaAuthorImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
 * Class Google_Service_PlusDomains_MediaAuthorImage
 */
class Google_Service_PlusDomains_MediaAuthorImage extends Google_Model
{
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_PlusDomains_MediaExif
 */
class Google_Service_PlusDomains_MediaExif extends Google_Model
{
    public $time;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
}

/**
 * Class Google_Service_PlusDomains_PeopleFeed
 */
class Google_Service_PlusDomains_PeopleFeed extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    public $title;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_PlusDomains_Person';
    protected $itemsDataType = 'array';

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
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * @param $totalItems
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
    }
}

/**
 * Class Google_Service_PlusDomains_Person
 */
class Google_Service_PlusDomains_Person extends Google_Collection
{
    public $aboutMe;
    public $birthday;
    public $braggingRights;
    public $circledByCount;
    public $currentLocation;
    public $displayName;
    public $domain;
    public $etag;
    public $gender;
    public $id;
    public $isPlusUser;
    public $kind;
    public $nickname;
    public $objectType;
    public $occupation;
    public $plusOneCount;
    public $relationshipStatus;
    public $skills;
    public $tagline;
    public $url;
    public $verified;
    protected $collection_key = 'urls';
    protected $internal_gapi_mappings = [];
    protected $coverType = 'Google_Service_PlusDomains_PersonCover';
    protected $coverDataType = '';
    protected $emailsType = 'Google_Service_PlusDomains_PersonEmails';
    protected $emailsDataType = 'array';
    protected $imageType = 'Google_Service_PlusDomains_PersonImage';
    protected $imageDataType = '';
    protected $nameType = 'Google_Service_PlusDomains_PersonName';
    protected $nameDataType = '';
    protected $organizationsType = 'Google_Service_PlusDomains_PersonOrganizations';
    protected $organizationsDataType = 'array';
    protected $placesLivedType = 'Google_Service_PlusDomains_PersonPlacesLived';
    protected $placesLivedDataType = 'array';
    protected $urlsType = 'Google_Service_PlusDomains_PersonUrls';
    protected $urlsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * @param $aboutMe
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBraggingRights()
    {
        return $this->braggingRights;
    }

    /**
     * @param $braggingRights
     */
    public function setBraggingRights($braggingRights)
    {
        $this->braggingRights = $braggingRights;
    }

    /**
     * @return mixed
     */
    public function getCircledByCount()
    {
        return $this->circledByCount;
    }

    /**
     * @param $circledByCount
     */
    public function setCircledByCount($circledByCount)
    {
        $this->circledByCount = $circledByCount;
    }

    /**
     * @param Google_Service_PlusDomains_PersonCover $cover
     */
    public function setCover(Google_Service_PlusDomains_PersonCover $cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @return mixed
     */
    public function getCurrentLocation()
    {
        return $this->currentLocation;
    }

    /**
     * @param $currentLocation
     */
    public function setCurrentLocation($currentLocation)
    {
        $this->currentLocation = $currentLocation;
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
     * @param $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
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
     * @param Google_Service_PlusDomains_PersonImage $image
     */
    public function setImage(Google_Service_PlusDomains_PersonImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getIsPlusUser()
    {
        return $this->isPlusUser;
    }

    /**
     * @param $isPlusUser
     */
    public function setIsPlusUser($isPlusUser)
    {
        $this->isPlusUser = $isPlusUser;
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
     * @param Google_Service_PlusDomains_PersonName $name
     */
    public function setName(Google_Service_PlusDomains_PersonName $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @param $organizations
     */
    public function setOrganizations($organizations)
    {
        $this->organizations = $organizations;
    }

    /**
     * @return mixed
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }

    /**
     * @param $placesLived
     */
    public function setPlacesLived($placesLived)
    {
        $this->placesLived = $placesLived;
    }

    /**
     * @return mixed
     */
    public function getPlacesLived()
    {
        return $this->placesLived;
    }

    /**
     * @return mixed
     */
    public function getPlusOneCount()
    {
        return $this->plusOneCount;
    }

    /**
     * @param $plusOneCount
     */
    public function setPlusOneCount($plusOneCount)
    {
        $this->plusOneCount = $plusOneCount;
    }

    /**
     * @return mixed
     */
    public function getRelationshipStatus()
    {
        return $this->relationshipStatus;
    }

    /**
     * @param $relationshipStatus
     */
    public function setRelationshipStatus($relationshipStatus)
    {
        $this->relationshipStatus = $relationshipStatus;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /**
     * @return mixed
     */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
     * @param $tagline
     */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;
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

    /**
     * @param $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return mixed
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @param $verified
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;
    }
}

/**
 * Class Google_Service_PlusDomains_PersonCover
 */
class Google_Service_PlusDomains_PersonCover extends Google_Model
{
    public $layout;
    protected $internal_gapi_mappings = [];
    protected $coverInfoType = 'Google_Service_PlusDomains_PersonCoverCoverInfo';
    protected $coverInfoDataType = '';
    protected $coverPhotoType = 'Google_Service_PlusDomains_PersonCoverCoverPhoto';
    protected $coverPhotoDataType = '';

    /**
     * @param Google_Service_PlusDomains_PersonCoverCoverInfo $coverInfo
     */
    public function setCoverInfo(Google_Service_PlusDomains_PersonCoverCoverInfo $coverInfo)
    {
        $this->coverInfo = $coverInfo;
    }

    /**
     * @return mixed
     */
    public function getCoverInfo()
    {
        return $this->coverInfo;
    }

    /**
     * @param Google_Service_PlusDomains_PersonCoverCoverPhoto $coverPhoto
     */
    public function setCoverPhoto(Google_Service_PlusDomains_PersonCoverCoverPhoto $coverPhoto)
    {
        $this->coverPhoto = $coverPhoto;
    }

    /**
     * @return mixed
     */
    public function getCoverPhoto()
    {
        return $this->coverPhoto;
    }

    /**
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
}

/**
 * Class Google_Service_PlusDomains_PersonCoverCoverInfo
 */
class Google_Service_PlusDomains_PersonCoverCoverInfo extends Google_Model
{
    public $leftImageOffset;
    public $topImageOffset;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLeftImageOffset()
    {
        return $this->leftImageOffset;
    }

    /**
     * @param $leftImageOffset
     */
    public function setLeftImageOffset($leftImageOffset)
    {
        $this->leftImageOffset = $leftImageOffset;
    }

    /**
     * @return mixed
     */
    public function getTopImageOffset()
    {
        return $this->topImageOffset;
    }

    /**
     * @param $topImageOffset
     */
    public function setTopImageOffset($topImageOffset)
    {
        $this->topImageOffset = $topImageOffset;
    }
}

/**
 * Class Google_Service_PlusDomains_PersonCoverCoverPhoto
 */
class Google_Service_PlusDomains_PersonCoverCoverPhoto extends Google_Model
{
    public $height;
    public $url;
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
 * Class Google_Service_PlusDomains_PersonEmails
 */
class Google_Service_PlusDomains_PersonEmails extends Google_Model
{
    public $type;
    public $value;
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
 * Class Google_Service_PlusDomains_PersonImage
 */
class Google_Service_PlusDomains_PersonImage extends Google_Model
{
    public $isDefault;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
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
 * Class Google_Service_PlusDomains_PersonName
 */
class Google_Service_PlusDomains_PersonName extends Google_Model
{
    public $familyName;
    public $formatted;
    public $givenName;
    public $honorificPrefix;
    public $honorificSuffix;
    public $middleName;
    protected $internal_gapi_mappings = [];

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
    public function getFormatted()
    {
        return $this->formatted;
    }

    /**
     * @param $formatted
     */
    public function setFormatted($formatted)
    {
        $this->formatted = $formatted;
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
    public function getHonorificPrefix()
    {
        return $this->honorificPrefix;
    }

    /**
     * @param $honorificPrefix
     */
    public function setHonorificPrefix($honorificPrefix)
    {
        $this->honorificPrefix = $honorificPrefix;
    }

    /**
     * @return mixed
     */
    public function getHonorificSuffix()
    {
        return $this->honorificSuffix;
    }

    /**
     * @param $honorificSuffix
     */
    public function setHonorificSuffix($honorificSuffix)
    {
        $this->honorificSuffix = $honorificSuffix;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }
}

/**
 * Class Google_Service_PlusDomains_PersonOrganizations
 */
class Google_Service_PlusDomains_PersonOrganizations extends Google_Model
{
    public $department;
    public $description;
    public $endDate;
    public $location;
    public $name;
    public $primary;
    public $startDate;
    public $title;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
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
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
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
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param $primary
     */
    public function setPrimary($primary)
    {
        $this->primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
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
 * Class Google_Service_PlusDomains_PersonPlacesLived
 */
class Google_Service_PlusDomains_PersonPlacesLived extends Google_Model
{
    public $primary;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param $primary
     */
    public function setPrimary($primary)
    {
        $this->primary = $primary;
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
 * Class Google_Service_PlusDomains_PersonUrls
 */
class Google_Service_PlusDomains_PersonUrls extends Google_Model
{
    public $label;
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
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
 * Class Google_Service_PlusDomains_Place
 */
class Google_Service_PlusDomains_Place extends Google_Model
{
    public $displayName;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $addressType = 'Google_Service_PlusDomains_PlaceAddress';
    protected $addressDataType = '';
    protected $positionType = 'Google_Service_PlusDomains_PlacePosition';
    protected $positionDataType = '';


    /**
     * @param Google_Service_PlusDomains_PlaceAddress $address
     */
    public function setAddress(Google_Service_PlusDomains_PlaceAddress $address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
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
     * @param Google_Service_PlusDomains_PlacePosition $position
     */
    public function setPosition(Google_Service_PlusDomains_PlacePosition $position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }
}

/**
 * Class Google_Service_PlusDomains_PlaceAddress
 */
class Google_Service_PlusDomains_PlaceAddress extends Google_Model
{
    public $formatted;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormatted()
    {
        return $this->formatted;
    }

    /**
     * @param $formatted
     */
    public function setFormatted($formatted)
    {
        $this->formatted = $formatted;
    }
}

/**
 * Class Google_Service_PlusDomains_PlacePosition
 */
class Google_Service_PlusDomains_PlacePosition extends Google_Model
{
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_PlusDomains_PlusDomainsAclentryResource
 */
class Google_Service_PlusDomains_PlusDomainsAclentryResource extends Google_Model
{
    public $displayName;
    public $id;
    public $type;
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
 * Class Google_Service_PlusDomains_Videostream
 */
class Google_Service_PlusDomains_Videostream extends Google_Model
{
    public $height;
    public $type;
    public $url;
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
