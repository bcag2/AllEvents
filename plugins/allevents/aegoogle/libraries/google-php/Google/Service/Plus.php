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
 * Service definition for Plus (v1).
 *
 * <p>
 * The Google+ API enables developers to build on top of the Google+ platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/+/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Plus extends Google_Service
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

    public $activities;
    public $comments;
    public $moments;
    public $people;


    /**
     * Constructs the internal representation of the Plus service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'plus/v1/';
        $this->version = 'v1';
        $this->serviceName = 'plus';

        $this->activities = new Google_Service_Plus_Activities_Resource(
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
                    ], 'search' => [
                        'path' => 'activities',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'query' => [
                                'location' => 'query',
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->comments = new Google_Service_Plus_Comments_Resource(
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
        $this->moments = new Google_Service_Plus_Moments_Resource(
            $this,
            $this->serviceName,
            'moments',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'people/{userId}/moments/{collection}',
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
                            'debug' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'people/{userId}/moments/{collection}',
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
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'targetUrl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'remove' => [
                        'path' => 'moments/{id}',
                        'httpMethod' => 'DELETE',
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
        $this->people = new Google_Service_Plus_People_Resource(
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
                    ], 'search' => [
                        'path' => 'people',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'query' => [
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
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
 *   $plusService = new Google_Service_Plus(...);
 *   $activities = $plusService->activities;
 *  </code>
 */
class Google_Service_Plus_Activities_Resource extends Google_Service_Resource
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

        return $this->call('get', [$params], "Google_Service_Plus_Activity");
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

        return $this->call('list', [$params], "Google_Service_Plus_ActivityFeed");
    }

    /**
     * Search public activities. (activities.search)
     *
     * @param string $query Full-text search query string.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Specifies how to order search results.
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response. This
     * token can be of any length.
     * @opt_param string maxResults The maximum number of activities to include in
     * the response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     * @opt_param string language Specify the preferred language to search with. See
     * search language codes for available values.
     */
    public function search($query, $optParams = [])
    {
        $params = ['query' => $query];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Plus_ActivityFeed");
    }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusService = new Google_Service_Plus(...);
 *   $comments = $plusService->comments;
 *  </code>
 */
class Google_Service_Plus_Comments_Resource extends Google_Service_Resource
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

        return $this->call('get', [$params], "Google_Service_Plus_Comment");
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

        return $this->call('list', [$params], "Google_Service_Plus_CommentFeed");
    }
}

/**
 * The "moments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusService = new Google_Service_Plus(...);
 *   $moments = $plusService->moments;
 *  </code>
 */
class Google_Service_Plus_Moments_Resource extends Google_Service_Resource
{

    /**
     * Record a moment representing a user's action such as making a purchase or
     * commenting on a blog. (moments.insert)
     *
     * @param string $userId The ID of the user to record actions for. The only
     *                                                             valid values are "me" and the ID of the authenticated user.
     * @param string $collection The collection to which to write moments.
     * @param Google_Moment|Google_Service_Plus_Moment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool debug Return the moment as written. Should be used only for
     * debugging.
     */
    public function insert($userId, $collection, Google_Service_Plus_Moment $postBody, $optParams = [])
    {
        $params = ['userId' => $userId, 'collection' => $collection, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Plus_Moment");
    }

    /**
     * List all of the moments for a particular user. (moments.listMoments)
     *
     * @param string $userId The ID of the user to get moments for. The special
     *                           value "me" can be used to indicate the authenticated user.
     * @param string $collection The collection of moments to list.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxResults The maximum number of moments to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response.
     * @opt_param string targetUrl Only moments containing this targetUrl will be
     * returned.
     * @opt_param string type Only moments of this type will be returned.
     */
    public function listMoments($userId, $collection, $optParams = [])
    {
        $params = ['userId' => $userId, 'collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Plus_MomentsFeed");
    }

    /**
     * Delete a moment. (moments.remove)
     *
     * @param string $id The ID of the moment to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function remove($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('remove', [$params]);
    }
}

/**
 * The "people" collection of methods.
 * Typical usage is:
 *  <code>
 *   $plusService = new Google_Service_Plus(...);
 *   $people = $plusService->people;
 *  </code>
 */
class Google_Service_Plus_People_Resource extends Google_Service_Resource
{

    /**
     * Get a person's profile. If your app uses scope
     * https://www.googleapis.com/auth/plus.login, this method is guaranteed to
     * return ageRange and language. (people.get)
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

        return $this->call('get', [$params], "Google_Service_Plus_Person");
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

        return $this->call('list', [$params], "Google_Service_Plus_PeopleFeed");
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

        return $this->call('listByActivity', [$params], "Google_Service_Plus_PeopleFeed");
    }

    /**
     * Search all public profiles. (people.search)
     *
     * @param string $query Specify a query string for full text search of public
     *                          text in all profiles.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, which is used to page
     * through large result sets. To get the next page of results, set this
     * parameter to the value of "nextPageToken" from the previous response. This
     * token can be of any length.
     * @opt_param string maxResults The maximum number of people to include in the
     * response, which is used for paging. For any response, the actual number
     * returned might be less than the specified maxResults.
     * @opt_param string language Specify the preferred language to search with. See
     * search language codes for available values.
     */
    public function search($query, $optParams = [])
    {
        $params = ['query' => $query];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Plus_PeopleFeed");
    }
}


/**
 * Class Google_Service_Plus_Acl
 */
class Google_Service_Plus_Acl extends Google_Collection
{
    public $description;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Plus_PlusAclentryResource';
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
 * Class Google_Service_Plus_Activity
 */
class Google_Service_Plus_Activity extends Google_Model
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
    protected $accessType = 'Google_Service_Plus_Acl';
    protected $accessDataType = '';
    protected $actorType = 'Google_Service_Plus_ActivityActor';
    protected $actorDataType = '';
    protected $locationType = 'Google_Service_Plus_Place';
    protected $locationDataType = '';
    protected $objectType = 'Google_Service_Plus_ActivityObject';
    protected $objectDataType = '';
    protected $providerType = 'Google_Service_Plus_ActivityProvider';
    protected $providerDataType = '';

    /**
     * @param Google_Service_Plus_Acl $access
     */
    public function setAccess(Google_Service_Plus_Acl $access)
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
     * @param Google_Service_Plus_ActivityActor $actor
     */
    public function setActor(Google_Service_Plus_ActivityActor $actor)
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
     * @param Google_Service_Plus_Place $location
     */
    public function setLocation(Google_Service_Plus_Place $location)
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
     * @param Google_Service_Plus_ActivityObject $object
     */
    public function setObject(Google_Service_Plus_ActivityObject $object)
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
     * @param Google_Service_Plus_ActivityProvider $provider
     */
    public function setProvider(Google_Service_Plus_ActivityProvider $provider)
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
 * Class Google_Service_Plus_ActivityActor
 */
class Google_Service_Plus_ActivityActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Plus_ActivityActorImage';
    protected $imageDataType = '';
    protected $nameType = 'Google_Service_Plus_ActivityActorName';
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
     * @param Google_Service_Plus_ActivityActorImage $image
     */
    public function setImage(Google_Service_Plus_ActivityActorImage $image)
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
     * @param Google_Service_Plus_ActivityActorName $name
     */
    public function setName(Google_Service_Plus_ActivityActorName $name)
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
 * Class Google_Service_Plus_ActivityActorImage
 */
class Google_Service_Plus_ActivityActorImage extends Google_Model
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
 * Class Google_Service_Plus_ActivityActorName
 */
class Google_Service_Plus_ActivityActorName extends Google_Model
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
 * Class Google_Service_Plus_ActivityFeed
 */
class Google_Service_Plus_ActivityFeed extends Google_Collection
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
    protected $itemsType = 'Google_Service_Plus_Activity';
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
 * Class Google_Service_Plus_ActivityObject
 */
class Google_Service_Plus_ActivityObject extends Google_Collection
{
    public $content;
    public $id;
    public $objectType;
    public $originalContent;
    public $url;
    protected $collection_key = 'attachments';
    protected $internal_gapi_mappings = [];
    protected $actorType = 'Google_Service_Plus_ActivityObjectActor';
    protected $actorDataType = '';
    protected $attachmentsType = 'Google_Service_Plus_ActivityObjectAttachments';
    protected $attachmentsDataType = 'array';
    protected $plusonersType = 'Google_Service_Plus_ActivityObjectPlusoners';
    protected $plusonersDataType = '';
    protected $repliesType = 'Google_Service_Plus_ActivityObjectReplies';
    protected $repliesDataType = '';
    protected $resharersType = 'Google_Service_Plus_ActivityObjectResharers';
    protected $resharersDataType = '';

    /**
     * @param Google_Service_Plus_ActivityObjectActor $actor
     */
    public function setActor(Google_Service_Plus_ActivityObjectActor $actor)
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
     * @param Google_Service_Plus_ActivityObjectPlusoners $plusoners
     */
    public function setPlusoners(Google_Service_Plus_ActivityObjectPlusoners $plusoners)
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
     * @param Google_Service_Plus_ActivityObjectReplies $replies
     */
    public function setReplies(Google_Service_Plus_ActivityObjectReplies $replies)
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
     * @param Google_Service_Plus_ActivityObjectResharers $resharers
     */
    public function setResharers(Google_Service_Plus_ActivityObjectResharers $resharers)
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
 * Class Google_Service_Plus_ActivityObjectActor
 */
class Google_Service_Plus_ActivityObjectActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Plus_ActivityObjectActorImage';
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
     * @param Google_Service_Plus_ActivityObjectActorImage $image
     */
    public function setImage(Google_Service_Plus_ActivityObjectActorImage $image)
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
 * Class Google_Service_Plus_ActivityObjectActorImage
 */
class Google_Service_Plus_ActivityObjectActorImage extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectAttachments
 */
class Google_Service_Plus_ActivityObjectAttachments extends Google_Collection
{
    public $content;
    public $displayName;
    public $id;
    public $objectType;
    public $url;
    protected $collection_key = 'thumbnails';
    protected $internal_gapi_mappings = [];
    protected $embedType = 'Google_Service_Plus_ActivityObjectAttachmentsEmbed';
    protected $embedDataType = '';
    protected $fullImageType = 'Google_Service_Plus_ActivityObjectAttachmentsFullImage';
    protected $fullImageDataType = '';
    protected $imageType = 'Google_Service_Plus_ActivityObjectAttachmentsImage';
    protected $imageDataType = '';
    protected $thumbnailsType = 'Google_Service_Plus_ActivityObjectAttachmentsThumbnails';
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
     * @param Google_Service_Plus_ActivityObjectAttachmentsEmbed $embed
     */
    public function setEmbed(Google_Service_Plus_ActivityObjectAttachmentsEmbed $embed)
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
     * @param Google_Service_Plus_ActivityObjectAttachmentsFullImage $fullImage
     */
    public function setFullImage(Google_Service_Plus_ActivityObjectAttachmentsFullImage $fullImage)
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
     * @param Google_Service_Plus_ActivityObjectAttachmentsImage $image
     */
    public function setImage(Google_Service_Plus_ActivityObjectAttachmentsImage $image)
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
 * Class Google_Service_Plus_ActivityObjectAttachmentsEmbed
 */
class Google_Service_Plus_ActivityObjectAttachmentsEmbed extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectAttachmentsFullImage
 */
class Google_Service_Plus_ActivityObjectAttachmentsFullImage extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectAttachmentsImage
 */
class Google_Service_Plus_ActivityObjectAttachmentsImage extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectAttachmentsThumbnails
 */
class Google_Service_Plus_ActivityObjectAttachmentsThumbnails extends Google_Model
{
    public $description;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Plus_ActivityObjectAttachmentsThumbnailsImage';
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
     * @param Google_Service_Plus_ActivityObjectAttachmentsThumbnailsImage $image
     */
    public function setImage(Google_Service_Plus_ActivityObjectAttachmentsThumbnailsImage $image)
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
 * Class Google_Service_Plus_ActivityObjectAttachmentsThumbnailsImage
 */
class Google_Service_Plus_ActivityObjectAttachmentsThumbnailsImage extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectPlusoners
 */
class Google_Service_Plus_ActivityObjectPlusoners extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectReplies
 */
class Google_Service_Plus_ActivityObjectReplies extends Google_Model
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
 * Class Google_Service_Plus_ActivityObjectResharers
 */
class Google_Service_Plus_ActivityObjectResharers extends Google_Model
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
 * Class Google_Service_Plus_ActivityProvider
 */
class Google_Service_Plus_ActivityProvider extends Google_Model
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
 * Class Google_Service_Plus_Comment
 */
class Google_Service_Plus_Comment extends Google_Collection
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
    protected $actorType = 'Google_Service_Plus_CommentActor';
    protected $actorDataType = '';
    protected $inReplyToType = 'Google_Service_Plus_CommentInReplyTo';
    protected $inReplyToDataType = 'array';
    protected $objectType = 'Google_Service_Plus_CommentObject';
    protected $objectDataType = '';
    protected $plusonersType = 'Google_Service_Plus_CommentPlusoners';
    protected $plusonersDataType = '';

    /**
     * @param Google_Service_Plus_CommentActor $actor
     */
    public function setActor(Google_Service_Plus_CommentActor $actor)
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
     * @param Google_Service_Plus_CommentObject $object
     */
    public function setObject(Google_Service_Plus_CommentObject $object)
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
     * @param Google_Service_Plus_CommentPlusoners $plusoners
     */
    public function setPlusoners(Google_Service_Plus_CommentPlusoners $plusoners)
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
 * Class Google_Service_Plus_CommentActor
 */
class Google_Service_Plus_CommentActor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Plus_CommentActorImage';
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
     * @param Google_Service_Plus_CommentActorImage $image
     */
    public function setImage(Google_Service_Plus_CommentActorImage $image)
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
 * Class Google_Service_Plus_CommentActorImage
 */
class Google_Service_Plus_CommentActorImage extends Google_Model
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
 * Class Google_Service_Plus_CommentFeed
 */
class Google_Service_Plus_CommentFeed extends Google_Collection
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
    protected $itemsType = 'Google_Service_Plus_Comment';
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
 * Class Google_Service_Plus_CommentInReplyTo
 */
class Google_Service_Plus_CommentInReplyTo extends Google_Model
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
 * Class Google_Service_Plus_CommentObject
 */
class Google_Service_Plus_CommentObject extends Google_Model
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
 * Class Google_Service_Plus_CommentPlusoners
 */
class Google_Service_Plus_CommentPlusoners extends Google_Model
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
 * Class Google_Service_Plus_ItemScope
 */
class Google_Service_Plus_ItemScope extends Google_Collection
{
    public $additionalName;
    public $addressCountry;
    public $addressLocality;
    public $addressRegion;
    public $attendeeCount;
    public $bestRating;
    public $birthDate;
    public $caption;
    public $contentSize;
    public $contentUrl;
    public $dateCreated;
    public $dateModified;
    public $datePublished;
    public $description;
    public $duration;
    public $embedUrl;
    public $endDate;
    public $familyName;
    public $gender;
    public $givenName;
    public $height;
    public $id;
    public $image;
    public $kind;
    public $latitude;
    public $longitude;
    public $name;
    public $playerType;
    public $postOfficeBoxNumber;
    public $postalCode;
    public $ratingValue;
    public $startDate;
    public $streetAddress;
    public $text;
    public $thumbnailUrl;
    public $tickerSymbol;
    public $type;
    public $url;
    public $width;
    public $worstRating;
    protected $collection_key = 'performers';
    protected $internal_gapi_mappings = [
        "associatedMedia" => "associated_media",
    ];
    protected $aboutType = 'Google_Service_Plus_ItemScope';
    protected $aboutDataType = '';
    protected $addressType = 'Google_Service_Plus_ItemScope';
    protected $addressDataType = '';
    protected $associatedMediaType = 'Google_Service_Plus_ItemScope';
    protected $associatedMediaDataType = 'array';
    protected $attendeesType = 'Google_Service_Plus_ItemScope';
    protected $attendeesDataType = 'array';
    protected $audioType = 'Google_Service_Plus_ItemScope';
    protected $audioDataType = '';
    protected $authorType = 'Google_Service_Plus_ItemScope';
    protected $authorDataType = 'array';
    protected $byArtistType = 'Google_Service_Plus_ItemScope';
    protected $byArtistDataType = '';
    protected $contributorType = 'Google_Service_Plus_ItemScope';
    protected $contributorDataType = 'array';
    protected $geoType = 'Google_Service_Plus_ItemScope';
    protected $geoDataType = '';
    protected $inAlbumType = 'Google_Service_Plus_ItemScope';
    protected $inAlbumDataType = '';
    protected $locationType = 'Google_Service_Plus_ItemScope';
    protected $locationDataType = '';
    protected $partOfTVSeriesType = 'Google_Service_Plus_ItemScope';
    protected $partOfTVSeriesDataType = '';
    protected $performersType = 'Google_Service_Plus_ItemScope';
    protected $performersDataType = 'array';
    protected $reviewRatingType = 'Google_Service_Plus_ItemScope';
    protected $reviewRatingDataType = '';
    protected $thumbnailType = 'Google_Service_Plus_ItemScope';
    protected $thumbnailDataType = '';

    /**
     * @param Google_Service_Plus_ItemScope $about
     */
    public function setAbout(Google_Service_Plus_ItemScope $about)
    {
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @return mixed
     */
    public function getAdditionalName()
    {
        return $this->additionalName;
    }

    /**
     * @param $additionalName
     */
    public function setAdditionalName($additionalName)
    {
        $this->additionalName = $additionalName;
    }

    /**
     * @param Google_Service_Plus_ItemScope $address
     */
    public function setAddress(Google_Service_Plus_ItemScope $address)
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
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param $addressCountry
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;
    }

    /**
     * @return mixed
     */
    public function getAddressLocality()
    {
        return $this->addressLocality;
    }

    /**
     * @param $addressLocality
     */
    public function setAddressLocality($addressLocality)
    {
        $this->addressLocality = $addressLocality;
    }

    /**
     * @return mixed
     */
    public function getAddressRegion()
    {
        return $this->addressRegion;
    }

    /**
     * @param $addressRegion
     */
    public function setAddressRegion($addressRegion)
    {
        $this->addressRegion = $addressRegion;
    }

    /**
     * @param $associatedMedia
     */
    public function setAssociatedMedia($associatedMedia)
    {
        $this->associatedMedia = $associatedMedia;
    }

    /**
     * @return mixed
     */
    public function getAssociatedMedia()
    {
        return $this->associatedMedia;
    }

    /**
     * @return mixed
     */
    public function getAttendeeCount()
    {
        return $this->attendeeCount;
    }

    /**
     * @param $attendeeCount
     */
    public function setAttendeeCount($attendeeCount)
    {
        $this->attendeeCount = $attendeeCount;
    }

    /**
     * @param $attendees
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;
    }

    /**
     * @return mixed
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * @param Google_Service_Plus_ItemScope $audio
     */
    public function setAudio(Google_Service_Plus_ItemScope $audio)
    {
        $this->audio = $audio;
    }

    /**
     * @return mixed
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param $author
     */
    public function setAuthor($author)
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
    public function getBestRating()
    {
        return $this->bestRating;
    }

    /**
     * @param $bestRating
     */
    public function setBestRating($bestRating)
    {
        $this->bestRating = $bestRating;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @param Google_Service_Plus_ItemScope $byArtist
     */
    public function setByArtist(Google_Service_Plus_ItemScope $byArtist)
    {
        $this->byArtist = $byArtist;
    }

    /**
     * @return mixed
     */
    public function getByArtist()
    {
        return $this->byArtist;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return mixed
     */
    public function getContentSize()
    {
        return $this->contentSize;
    }

    /**
     * @param $contentSize
     */
    public function setContentSize($contentSize)
    {
        $this->contentSize = $contentSize;
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
     * @param $contributor
     */
    public function setContributor($contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * @return mixed
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @param $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @return mixed
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @param $datePublished
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;
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
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getEmbedUrl()
    {
        return $this->embedUrl;
    }

    /**
     * @param $embedUrl
     */
    public function setEmbedUrl($embedUrl)
    {
        $this->embedUrl = $embedUrl;
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
     * @param Google_Service_Plus_ItemScope $geo
     */
    public function setGeo(Google_Service_Plus_ItemScope $geo)
    {
        $this->geo = $geo;
    }

    /**
     * @return mixed
     */
    public function getGeo()
    {
        return $this->geo;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param Google_Service_Plus_ItemScope $inAlbum
     */
    public function setInAlbum(Google_Service_Plus_ItemScope $inAlbum)
    {
        $this->inAlbum = $inAlbum;
    }

    /**
     * @return mixed
     */
    public function getInAlbum()
    {
        return $this->inAlbum;
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
     * @param Google_Service_Plus_ItemScope $location
     */
    public function setLocation(Google_Service_Plus_ItemScope $location)
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
     * @param Google_Service_Plus_ItemScope $partOfTVSeries
     */
    public function setPartOfTVSeries(Google_Service_Plus_ItemScope $partOfTVSeries)
    {
        $this->partOfTVSeries = $partOfTVSeries;
    }

    /**
     * @return mixed
     */
    public function getPartOfTVSeries()
    {
        return $this->partOfTVSeries;
    }

    /**
     * @param $performers
     */
    public function setPerformers($performers)
    {
        $this->performers = $performers;
    }

    /**
     * @return mixed
     */
    public function getPerformers()
    {
        return $this->performers;
    }

    /**
     * @return mixed
     */
    public function getPlayerType()
    {
        return $this->playerType;
    }

    /**
     * @param $playerType
     */
    public function setPlayerType($playerType)
    {
        $this->playerType = $playerType;
    }

    /**
     * @return mixed
     */
    public function getPostOfficeBoxNumber()
    {
        return $this->postOfficeBoxNumber;
    }

    /**
     * @param $postOfficeBoxNumber
     */
    public function setPostOfficeBoxNumber($postOfficeBoxNumber)
    {
        $this->postOfficeBoxNumber = $postOfficeBoxNumber;
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
    public function getRatingValue()
    {
        return $this->ratingValue;
    }

    /**
     * @param $ratingValue
     */
    public function setRatingValue($ratingValue)
    {
        $this->ratingValue = $ratingValue;
    }

    /**
     * @param Google_Service_Plus_ItemScope $reviewRating
     */
    public function setReviewRating(Google_Service_Plus_ItemScope $reviewRating)
    {
        $this->reviewRating = $reviewRating;
    }

    /**
     * @return mixed
     */
    public function getReviewRating()
    {
        return $this->reviewRating;
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
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
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
     * @param Google_Service_Plus_ItemScope $thumbnail
     */
    public function setThumbnail(Google_Service_Plus_ItemScope $thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @return mixed
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param $thumbnailUrl
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }

    /**
     * @return mixed
     */
    public function getTickerSymbol()
    {
        return $this->tickerSymbol;
    }

    /**
     * @param $tickerSymbol
     */
    public function setTickerSymbol($tickerSymbol)
    {
        $this->tickerSymbol = $tickerSymbol;
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

    /**
     * @return mixed
     */
    public function getWorstRating()
    {
        return $this->worstRating;
    }

    /**
     * @param $worstRating
     */
    public function setWorstRating($worstRating)
    {
        $this->worstRating = $worstRating;
    }
}

/**
 * Class Google_Service_Plus_Moment
 */
class Google_Service_Plus_Moment extends Google_Model
{
    public $id;
    public $kind;
    public $startDate;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $objectType = 'Google_Service_Plus_ItemScope';
    protected $objectDataType = '';
    protected $resultType = 'Google_Service_Plus_ItemScope';
    protected $resultDataType = '';
    protected $targetType = 'Google_Service_Plus_ItemScope';
    protected $targetDataType = '';

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
     * @param Google_Service_Plus_ItemScope $object
     */
    public function setObject(Google_Service_Plus_ItemScope $object)
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
     * @param Google_Service_Plus_ItemScope $result
     */
    public function setResult(Google_Service_Plus_ItemScope $result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
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
     * @param Google_Service_Plus_ItemScope $target
     */
    public function setTarget(Google_Service_Plus_ItemScope $target)
    {
        $this->target = $target;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
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
 * Class Google_Service_Plus_MomentsFeed
 */
class Google_Service_Plus_MomentsFeed extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    public $title;
    public $updated;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Plus_Moment';
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
 * Class Google_Service_Plus_PeopleFeed
 */
class Google_Service_Plus_PeopleFeed extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $selfLink;
    public $title;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Plus_Person';
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
 * Class Google_Service_Plus_Person
 */
class Google_Service_Plus_Person extends Google_Collection
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
    public $language;
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
    protected $ageRangeType = 'Google_Service_Plus_PersonAgeRange';
    protected $ageRangeDataType = '';
    protected $coverType = 'Google_Service_Plus_PersonCover';
    protected $coverDataType = '';
    protected $emailsType = 'Google_Service_Plus_PersonEmails';
    protected $emailsDataType = 'array';
    protected $imageType = 'Google_Service_Plus_PersonImage';
    protected $imageDataType = '';
    protected $nameType = 'Google_Service_Plus_PersonName';
    protected $nameDataType = '';
    protected $organizationsType = 'Google_Service_Plus_PersonOrganizations';
    protected $organizationsDataType = 'array';
    protected $placesLivedType = 'Google_Service_Plus_PersonPlacesLived';
    protected $placesLivedDataType = 'array';
    protected $urlsType = 'Google_Service_Plus_PersonUrls';
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
     * @param Google_Service_Plus_PersonAgeRange $ageRange
     */
    public function setAgeRange(Google_Service_Plus_PersonAgeRange $ageRange)
    {
        $this->ageRange = $ageRange;
    }

    /**
     * @return mixed
     */
    public function getAgeRange()
    {
        return $this->ageRange;
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
     * @param Google_Service_Plus_PersonCover $cover
     */
    public function setCover(Google_Service_Plus_PersonCover $cover)
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
     * @param Google_Service_Plus_PersonImage $image
     */
    public function setImage(Google_Service_Plus_PersonImage $image)
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
     * @param Google_Service_Plus_PersonName $name
     */
    public function setName(Google_Service_Plus_PersonName $name)
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
 * Class Google_Service_Plus_PersonAgeRange
 */
class Google_Service_Plus_PersonAgeRange extends Google_Model
{
    public $max;
    public $min;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }
}

/**
 * Class Google_Service_Plus_PersonCover
 */
class Google_Service_Plus_PersonCover extends Google_Model
{
    public $layout;
    protected $internal_gapi_mappings = [];
    protected $coverInfoType = 'Google_Service_Plus_PersonCoverCoverInfo';
    protected $coverInfoDataType = '';
    protected $coverPhotoType = 'Google_Service_Plus_PersonCoverCoverPhoto';
    protected $coverPhotoDataType = '';

    /**
     * @param Google_Service_Plus_PersonCoverCoverInfo $coverInfo
     */
    public function setCoverInfo(Google_Service_Plus_PersonCoverCoverInfo $coverInfo)
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
     * @param Google_Service_Plus_PersonCoverCoverPhoto $coverPhoto
     */
    public function setCoverPhoto(Google_Service_Plus_PersonCoverCoverPhoto $coverPhoto)
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
 * Class Google_Service_Plus_PersonCoverCoverInfo
 */
class Google_Service_Plus_PersonCoverCoverInfo extends Google_Model
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
 * Class Google_Service_Plus_PersonCoverCoverPhoto
 */
class Google_Service_Plus_PersonCoverCoverPhoto extends Google_Model
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
 * Class Google_Service_Plus_PersonEmails
 */
class Google_Service_Plus_PersonEmails extends Google_Model
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
 * Class Google_Service_Plus_PersonImage
 */
class Google_Service_Plus_PersonImage extends Google_Model
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
 * Class Google_Service_Plus_PersonName
 */
class Google_Service_Plus_PersonName extends Google_Model
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
 * Class Google_Service_Plus_PersonOrganizations
 */
class Google_Service_Plus_PersonOrganizations extends Google_Model
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
 * Class Google_Service_Plus_PersonPlacesLived
 */
class Google_Service_Plus_PersonPlacesLived extends Google_Model
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
 * Class Google_Service_Plus_PersonUrls
 */
class Google_Service_Plus_PersonUrls extends Google_Model
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
 * Class Google_Service_Plus_Place
 */
class Google_Service_Plus_Place extends Google_Model
{
    public $displayName;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $addressType = 'Google_Service_Plus_PlaceAddress';
    protected $addressDataType = '';
    protected $positionType = 'Google_Service_Plus_PlacePosition';
    protected $positionDataType = '';


    /**
     * @param Google_Service_Plus_PlaceAddress $address
     */
    public function setAddress(Google_Service_Plus_PlaceAddress $address)
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
     * @param Google_Service_Plus_PlacePosition $position
     */
    public function setPosition(Google_Service_Plus_PlacePosition $position)
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
 * Class Google_Service_Plus_PlaceAddress
 */
class Google_Service_Plus_PlaceAddress extends Google_Model
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
 * Class Google_Service_Plus_PlacePosition
 */
class Google_Service_Plus_PlacePosition extends Google_Model
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
 * Class Google_Service_Plus_PlusAclentryResource
 */
class Google_Service_Plus_PlusAclentryResource extends Google_Model
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
