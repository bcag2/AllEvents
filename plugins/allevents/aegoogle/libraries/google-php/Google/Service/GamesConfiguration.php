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
 * Service definition for GamesConfiguration (v1configuration).
 *
 * <p>
 * The Publishing API for Google Play Game Services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_GamesConfiguration extends Google_Service
{
    /** View and manage your Google Play Developer account. */
    const ANDROIDPUBLISHER =
        "https://www.googleapis.com/auth/androidpublisher";

    public $achievementConfigurations;
    public $imageConfigurations;
    public $leaderboardConfigurations;


    /**
     * Constructs the internal representation of the GamesConfiguration service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'games/v1configuration/';
        $this->version = 'v1configuration';
        $this->serviceName = 'gamesConfiguration';

        $this->achievementConfigurations = new Google_Service_GamesConfiguration_AchievementConfigurations_Resource(
            $this,
            $this->serviceName,
            'achievementConfigurations',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'achievements/{achievementId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'achievements/{achievementId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'applications/{applicationId}/achievements',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'applications/{applicationId}/achievements',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'applicationId' => [
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
                        'path' => 'achievements/{achievementId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'achievements/{achievementId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->imageConfigurations = new Google_Service_GamesConfiguration_ImageConfigurations_Resource(
            $this,
            $this->serviceName,
            'imageConfigurations',
            [
                'methods' => [
                    'upload' => [
                        'path' => 'images/{resourceId}/imageType/{imageType}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'resourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'imageType' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->leaderboardConfigurations = new Google_Service_GamesConfiguration_LeaderboardConfigurations_Resource(
            $this,
            $this->serviceName,
            'leaderboardConfigurations',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'leaderboards/{leaderboardId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'leaderboards/{leaderboardId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'applications/{applicationId}/leaderboards',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'applications/{applicationId}/leaderboards',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'applicationId' => [
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
                        'path' => 'leaderboards/{leaderboardId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'leaderboards/{leaderboardId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'leaderboardId' => [
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
 * The "achievementConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google_Service_GamesConfiguration(...);
 *   $achievementConfigurations = $gamesConfigurationService->achievementConfigurations;
 *  </code>
 */
class Google_Service_GamesConfiguration_AchievementConfigurations_Resource extends Google_Service_Resource
{

    /**
     * Delete the achievement configuration with the given ID.
     * (achievementConfigurations.delete)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the metadata of the achievement configuration with the given ID.
     * (achievementConfigurations.get)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_GamesConfiguration_AchievementConfiguration");
    }

    /**
     * Insert a new achievement configuration in this application.
     * (achievementConfigurations.insert)
     *
     * @param string $applicationId The application ID from the Google Play
     *                                                                                                                  developer console.
     * @param Google_AchievementConfiguration|Google_Service_GamesConfiguration_AchievementConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($applicationId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = [])
    {
        $params = ['applicationId' => $applicationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_GamesConfiguration_AchievementConfiguration");
    }

    /**
     * Returns a list of the achievement configurations in this application.
     * (achievementConfigurations.listAchievementConfigurations)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of resource configurations to
     * return in the response, used for paging. For any response, the actual number
     * of resources returned may be less than the specified maxResults.
     */
    public function listAchievementConfigurations($applicationId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_GamesConfiguration_AchievementConfigurationListResponse");
    }

    /**
     * Update the metadata of the achievement configuration with the given ID. This
     * method supports patch semantics. (achievementConfigurations.patch)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param Google_AchievementConfiguration|Google_Service_GamesConfiguration_AchievementConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($achievementId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = [])
    {
        $params = ['achievementId' => $achievementId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_GamesConfiguration_AchievementConfiguration");
    }

    /**
     * Update the metadata of the achievement configuration with the given ID.
     * (achievementConfigurations.update)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param Google_AchievementConfiguration|Google_Service_GamesConfiguration_AchievementConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($achievementId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = [])
    {
        $params = ['achievementId' => $achievementId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_GamesConfiguration_AchievementConfiguration");
    }
}

/**
 * The "imageConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google_Service_GamesConfiguration(...);
 *   $imageConfigurations = $gamesConfigurationService->imageConfigurations;
 *  </code>
 */
class Google_Service_GamesConfiguration_ImageConfigurations_Resource extends Google_Service_Resource
{

    /**
     * Uploads an image for a resource with the given ID and image type.
     * (imageConfigurations.upload)
     *
     * @param string $resourceId The ID of the resource used by this method.
     * @param string $imageType Selects which image in a resource for this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function upload($resourceId, $imageType, $optParams = [])
    {
        $params = ['resourceId' => $resourceId, 'imageType' => $imageType];
        $params = array_merge($params, $optParams);

        return $this->call('upload', [$params], "Google_Service_GamesConfiguration_ImageConfiguration");
    }
}

/**
 * The "leaderboardConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google_Service_GamesConfiguration(...);
 *   $leaderboardConfigurations = $gamesConfigurationService->leaderboardConfigurations;
 *  </code>
 */
class Google_Service_GamesConfiguration_LeaderboardConfigurations_Resource extends Google_Service_Resource
{

    /**
     * Delete the leaderboard configuration with the given ID.
     * (leaderboardConfigurations.delete)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($leaderboardId, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the metadata of the leaderboard configuration with the given ID.
     * (leaderboardConfigurations.get)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($leaderboardId, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_GamesConfiguration_LeaderboardConfiguration");
    }

    /**
     * Insert a new leaderboard configuration in this application.
     * (leaderboardConfigurations.insert)
     *
     * @param string $applicationId The application ID from the Google Play
     *                                                                                                                  developer console.
     * @param Google_LeaderboardConfiguration|Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($applicationId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = [])
    {
        $params = ['applicationId' => $applicationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_GamesConfiguration_LeaderboardConfiguration");
    }

    /**
     * Returns a list of the leaderboard configurations in this application.
     * (leaderboardConfigurations.listLeaderboardConfigurations)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of resource configurations to
     * return in the response, used for paging. For any response, the actual number
     * of resources returned may be less than the specified maxResults.
     */
    public function listLeaderboardConfigurations($applicationId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_GamesConfiguration_LeaderboardConfigurationListResponse");
    }

    /**
     * Update the metadata of the leaderboard configuration with the given ID. This
     * method supports patch semantics. (leaderboardConfigurations.patch)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param Google_LeaderboardConfiguration|Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($leaderboardId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_GamesConfiguration_LeaderboardConfiguration");
    }

    /**
     * Update the metadata of the leaderboard configuration with the given ID.
     * (leaderboardConfigurations.update)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param Google_LeaderboardConfiguration|Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($leaderboardId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_GamesConfiguration_LeaderboardConfiguration");
    }
}


/**
 * Class Google_Service_GamesConfiguration_AchievementConfiguration
 */
class Google_Service_GamesConfiguration_AchievementConfiguration extends Google_Model
{
    public $achievementType;
    public $id;
    public $initialState;
    public $kind;
    public $stepsToUnlock;
    public $token;
    protected $internal_gapi_mappings = [];
    protected $draftType = 'Google_Service_GamesConfiguration_AchievementConfigurationDetail';
    protected $draftDataType = '';
    protected $publishedType = 'Google_Service_GamesConfiguration_AchievementConfigurationDetail';
    protected $publishedDataType = '';

    /**
     * @return mixed
     */
    public function getAchievementType()
    {
        return $this->achievementType;
    }

    /**
     * @param $achievementType
     */
    public function setAchievementType($achievementType)
    {
        $this->achievementType = $achievementType;
    }

    /**
     * @param Google_Service_GamesConfiguration_AchievementConfigurationDetail $draft
     */
    public function setDraft(Google_Service_GamesConfiguration_AchievementConfigurationDetail $draft)
    {
        $this->draft = $draft;
    }

    /**
     * @return mixed
     */
    public function getDraft()
    {
        return $this->draft;
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
    public function getInitialState()
    {
        return $this->initialState;
    }

    /**
     * @param $initialState
     */
    public function setInitialState($initialState)
    {
        $this->initialState = $initialState;
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
     * @param Google_Service_GamesConfiguration_AchievementConfigurationDetail $published
     */
    public function setPublished(Google_Service_GamesConfiguration_AchievementConfigurationDetail $published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return mixed
     */
    public function getStepsToUnlock()
    {
        return $this->stepsToUnlock;
    }

    /**
     * @param $stepsToUnlock
     */
    public function setStepsToUnlock($stepsToUnlock)
    {
        $this->stepsToUnlock = $stepsToUnlock;
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
 * Class Google_Service_GamesConfiguration_AchievementConfigurationDetail
 */
class Google_Service_GamesConfiguration_AchievementConfigurationDetail extends Google_Model
{
    public $iconUrl;
    public $kind;
    public $pointValue;
    public $sortRank;
    protected $internal_gapi_mappings = [];
    protected $descriptionType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $descriptionDataType = '';
    protected $nameType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $nameDataType = '';

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $description
     */
    public function setDescription(Google_Service_GamesConfiguration_LocalizedStringBundle $description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $name
     */
    public function setName(Google_Service_GamesConfiguration_LocalizedStringBundle $name)
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
    public function getPointValue()
    {
        return $this->pointValue;
    }

    /**
     * @param $pointValue
     */
    public function setPointValue($pointValue)
    {
        $this->pointValue = $pointValue;
    }

    /**
     * @return mixed
     */
    public function getSortRank()
    {
        return $this->sortRank;
    }

    /**
     * @param $sortRank
     */
    public function setSortRank($sortRank)
    {
        $this->sortRank = $sortRank;
    }
}

/**
 * Class Google_Service_GamesConfiguration_AchievementConfigurationListResponse
 */
class Google_Service_GamesConfiguration_AchievementConfigurationListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_GamesConfiguration_AchievementConfiguration';
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
 * Class Google_Service_GamesConfiguration_GamesNumberAffixConfiguration
 */
class Google_Service_GamesConfiguration_GamesNumberAffixConfiguration extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $fewType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $fewDataType = '';
    protected $manyType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $manyDataType = '';
    protected $oneType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $oneDataType = '';
    protected $otherType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $otherDataType = '';
    protected $twoType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $twoDataType = '';
    protected $zeroType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $zeroDataType = '';


    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $few
     */
    public function setFew(Google_Service_GamesConfiguration_LocalizedStringBundle $few)
    {
        $this->few = $few;
    }

    /**
     * @return mixed
     */
    public function getFew()
    {
        return $this->few;
    }

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $many
     */
    public function setMany(Google_Service_GamesConfiguration_LocalizedStringBundle $many)
    {
        $this->many = $many;
    }

    /**
     * @return mixed
     */
    public function getMany()
    {
        return $this->many;
    }

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $one
     */
    public function setOne(Google_Service_GamesConfiguration_LocalizedStringBundle $one)
    {
        $this->one = $one;
    }

    /**
     * @return mixed
     */
    public function getOne()
    {
        return $this->one;
    }

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $other
     */
    public function setOther(Google_Service_GamesConfiguration_LocalizedStringBundle $other)
    {
        $this->other = $other;
    }

    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $two
     */
    public function setTwo(Google_Service_GamesConfiguration_LocalizedStringBundle $two)
    {
        $this->two = $two;
    }

    /**
     * @return mixed
     */
    public function getTwo()
    {
        return $this->two;
    }

    /**
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $zero
     */
    public function setZero(Google_Service_GamesConfiguration_LocalizedStringBundle $zero)
    {
        $this->zero = $zero;
    }

    /**
     * @return mixed
     */
    public function getZero()
    {
        return $this->zero;
    }
}

/**
 * Class Google_Service_GamesConfiguration_GamesNumberFormatConfiguration
 */
class Google_Service_GamesConfiguration_GamesNumberFormatConfiguration extends Google_Model
{
    public $currencyCode;
    public $numDecimalPlaces;
    public $numberFormatType;
    protected $internal_gapi_mappings = [];
    protected $suffixType = 'Google_Service_GamesConfiguration_GamesNumberAffixConfiguration';
    protected $suffixDataType = '';

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getNumDecimalPlaces()
    {
        return $this->numDecimalPlaces;
    }

    /**
     * @param $numDecimalPlaces
     */
    public function setNumDecimalPlaces($numDecimalPlaces)
    {
        $this->numDecimalPlaces = $numDecimalPlaces;
    }

    /**
     * @return mixed
     */
    public function getNumberFormatType()
    {
        return $this->numberFormatType;
    }

    /**
     * @param $numberFormatType
     */
    public function setNumberFormatType($numberFormatType)
    {
        $this->numberFormatType = $numberFormatType;
    }

    /**
     * @param Google_Service_GamesConfiguration_GamesNumberAffixConfiguration $suffix
     */
    public function setSuffix(Google_Service_GamesConfiguration_GamesNumberAffixConfiguration $suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @return mixed
     */
    public function getSuffix()
    {
        return $this->suffix;
    }
}

/**
 * Class Google_Service_GamesConfiguration_ImageConfiguration
 */
class Google_Service_GamesConfiguration_ImageConfiguration extends Google_Model
{
    public $imageType;
    public $kind;
    public $resourceId;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * @param $imageType
     */
    public function setImageType($imageType)
    {
        $this->imageType = $imageType;
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
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
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
 * Class Google_Service_GamesConfiguration_LeaderboardConfiguration
 */
class Google_Service_GamesConfiguration_LeaderboardConfiguration extends Google_Model
{
    public $id;
    public $kind;
    public $scoreMax;
    public $scoreMin;
    public $scoreOrder;
    public $token;
    protected $internal_gapi_mappings = [];
    protected $draftType = 'Google_Service_GamesConfiguration_LeaderboardConfigurationDetail';
    protected $draftDataType = '';
    protected $publishedType = 'Google_Service_GamesConfiguration_LeaderboardConfigurationDetail';
    protected $publishedDataType = '';

    /**
     * @param Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $draft
     */
    public function setDraft(Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $draft)
    {
        $this->draft = $draft;
    }

    /**
     * @return mixed
     */
    public function getDraft()
    {
        return $this->draft;
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
     * @param Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $published
     */
    public function setPublished(Google_Service_GamesConfiguration_LeaderboardConfigurationDetail $published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return mixed
     */
    public function getScoreMax()
    {
        return $this->scoreMax;
    }

    /**
     * @param $scoreMax
     */
    public function setScoreMax($scoreMax)
    {
        $this->scoreMax = $scoreMax;
    }

    /**
     * @return mixed
     */
    public function getScoreMin()
    {
        return $this->scoreMin;
    }

    /**
     * @param $scoreMin
     */
    public function setScoreMin($scoreMin)
    {
        $this->scoreMin = $scoreMin;
    }

    /**
     * @return mixed
     */
    public function getScoreOrder()
    {
        return $this->scoreOrder;
    }

    /**
     * @param $scoreOrder
     */
    public function setScoreOrder($scoreOrder)
    {
        $this->scoreOrder = $scoreOrder;
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
 * Class Google_Service_GamesConfiguration_LeaderboardConfigurationDetail
 */
class Google_Service_GamesConfiguration_LeaderboardConfigurationDetail extends Google_Model
{
    public $iconUrl;
    public $kind;
    public $sortRank;
    protected $internal_gapi_mappings = [];
    protected $nameType = 'Google_Service_GamesConfiguration_LocalizedStringBundle';
    protected $nameDataType = '';
    protected $scoreFormatType = 'Google_Service_GamesConfiguration_GamesNumberFormatConfiguration';
    protected $scoreFormatDataType = '';

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
     * @param Google_Service_GamesConfiguration_LocalizedStringBundle $name
     */
    public function setName(Google_Service_GamesConfiguration_LocalizedStringBundle $name)
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
     * @param Google_Service_GamesConfiguration_GamesNumberFormatConfiguration $scoreFormat
     */
    public function setScoreFormat(Google_Service_GamesConfiguration_GamesNumberFormatConfiguration $scoreFormat)
    {
        $this->scoreFormat = $scoreFormat;
    }

    /**
     * @return mixed
     */
    public function getScoreFormat()
    {
        return $this->scoreFormat;
    }

    /**
     * @return mixed
     */
    public function getSortRank()
    {
        return $this->sortRank;
    }

    /**
     * @param $sortRank
     */
    public function setSortRank($sortRank)
    {
        $this->sortRank = $sortRank;
    }
}

/**
 * Class Google_Service_GamesConfiguration_LeaderboardConfigurationListResponse
 */
class Google_Service_GamesConfiguration_LeaderboardConfigurationListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_GamesConfiguration_LeaderboardConfiguration';
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
 * Class Google_Service_GamesConfiguration_LocalizedString
 */
class Google_Service_GamesConfiguration_LocalizedString extends Google_Model
{
    public $kind;
    public $locale;
    public $value;
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
 * Class Google_Service_GamesConfiguration_LocalizedStringBundle
 */
class Google_Service_GamesConfiguration_LocalizedStringBundle extends Google_Collection
{
    public $kind;
    protected $collection_key = 'translations';
    protected $internal_gapi_mappings = [];
    protected $translationsType = 'Google_Service_GamesConfiguration_LocalizedString';
    protected $translationsDataType = 'array';

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
     * @param $translations
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
    }

    /**
     * @return mixed
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
