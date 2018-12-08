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
 * Service definition for GamesManagement (v1management).
 *
 * <p>
 * The Management API for Google Play Game Services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_GamesManagement extends Google_Service
{
    /** Share your Google+ profile information and view and manage your game activity. */
    const GAMES =
        "https://www.googleapis.com/auth/games";
    /** Know your basic profile info and list of people in your circles.. */
    const PLUS_LOGIN =
        "https://www.googleapis.com/auth/plus.login";

    public $achievements;
    public $applications;
    public $events;
    public $players;
    public $quests;
    public $rooms;
    public $scores;
    public $turnBasedMatches;


    /**
     * Constructs the internal representation of the GamesManagement service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'games/v1management/';
        $this->version = 'v1management';
        $this->serviceName = 'gamesManagement';

        $this->achievements = new Google_Service_GamesManagement_Achievements_Resource(
            $this,
            $this->serviceName,
            'achievements',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'achievements/{achievementId}/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetAll' => [
                        'path' => 'achievements/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetAllForAllPlayers' => [
                        'path' => 'achievements/resetAllForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'achievements/{achievementId}/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetMultipleForAllPlayers' => [
                        'path' => 'achievements/resetMultipleForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->applications = new Google_Service_GamesManagement_Applications_Resource(
            $this,
            $this->serviceName,
            'applications',
            [
                'methods' => [
                    'listHidden' => [
                        'path' => 'applications/{applicationId}/players/hidden',
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
                    ],
                ]
            ]
        );
        $this->events = new Google_Service_GamesManagement_Events_Resource(
            $this,
            $this->serviceName,
            'events',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'events/{eventId}/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetAll' => [
                        'path' => 'events/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetAllForAllPlayers' => [
                        'path' => 'events/resetAllForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'events/{eventId}/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'eventId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetMultipleForAllPlayers' => [
                        'path' => 'events/resetMultipleForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->players = new Google_Service_GamesManagement_Players_Resource(
            $this,
            $this->serviceName,
            'players',
            [
                'methods' => [
                    'hide' => [
                        'path' => 'applications/{applicationId}/players/hidden/{playerId}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'playerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'unhide' => [
                        'path' => 'applications/{applicationId}/players/hidden/{playerId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'playerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->quests = new Google_Service_GamesManagement_Quests_Resource(
            $this,
            $this->serviceName,
            'quests',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'quests/{questId}/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'questId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetAll' => [
                        'path' => 'quests/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetAllForAllPlayers' => [
                        'path' => 'quests/resetAllForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'quests/{questId}/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'questId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetMultipleForAllPlayers' => [
                        'path' => 'quests/resetMultipleForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->rooms = new Google_Service_GamesManagement_Rooms_Resource(
            $this,
            $this->serviceName,
            'rooms',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'rooms/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'rooms/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->scores = new Google_Service_GamesManagement_Scores_Resource(
            $this,
            $this->serviceName,
            'scores',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'leaderboards/{leaderboardId}/scores/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetAll' => [
                        'path' => 'scores/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetAllForAllPlayers' => [
                        'path' => 'scores/resetAllForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'leaderboards/{leaderboardId}/scores/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'resetMultipleForAllPlayers' => [
                        'path' => 'scores/resetMultipleForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->turnBasedMatches = new Google_Service_GamesManagement_TurnBasedMatches_Resource(
            $this,
            $this->serviceName,
            'turnBasedMatches',
            [
                'methods' => [
                    'reset' => [
                        'path' => 'turnbasedmatches/reset',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'resetForAllPlayers' => [
                        'path' => 'turnbasedmatches/resetForAllPlayers',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $achievements = $gamesManagementService->achievements;
 *  </code>
 */
class Google_Service_GamesManagement_Achievements_Resource extends Google_Service_Resource
{

    /**
     * Resets the achievement with the given ID for the currently authenticated
     * player. This method is only accessible to whitelisted tester accounts for
     * your application. (achievements.reset)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params], "Google_Service_GamesManagement_AchievementResetResponse");
    }

    /**
     * Resets all achievements for the currently authenticated player for your
     * application. This method is only accessible to whitelisted tester accounts
     * for your application. (achievements.resetAll)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAll($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAll', [$params], "Google_Service_GamesManagement_AchievementResetAllResponse");
    }

    /**
     * Resets all draft achievements for all players. This method is only available
     * to user accounts for your developer console.
     * (achievements.resetAllForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAllForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAllForAllPlayers', [$params]);
    }

    /**
     * Resets the achievement with the given ID for all players. This method is only
     * available to user accounts for your developer console. Only draft
     * achievements can be reset. (achievements.resetForAllPlayers)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }

    /**
     * Resets achievements with the given IDs for all players. This method is only
     * available to user accounts for your developer console. Only draft
     * achievements may be reset. (achievements.resetMultipleForAllPlayers)
     *
     * @param Google_AchievementResetMultipleForAllRequest|Google_Service_GamesManagement_AchievementResetMultipleForAllRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetMultipleForAllPlayers(Google_Service_GamesManagement_AchievementResetMultipleForAllRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('resetMultipleForAllPlayers', [$params]);
    }
}

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $applications = $gamesManagementService->applications;
 *  </code>
 */
class Google_Service_GamesManagement_Applications_Resource extends Google_Service_Resource
{

    /**
     * Get the list of players hidden from the given application. This method is
     * only available to user accounts for your developer console.
     * (applications.listHidden)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of player resources to return in
     * the response, used for paging. For any response, the actual number of player
     * resources returned may be less than the specified maxResults.
     */
    public function listHidden($applicationId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId];
        $params = array_merge($params, $optParams);

        return $this->call('listHidden', [$params], "Google_Service_GamesManagement_HiddenPlayerList");
    }
}

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $events = $gamesManagementService->events;
 *  </code>
 */
class Google_Service_GamesManagement_Events_Resource extends Google_Service_Resource
{

    /**
     * Resets all player progress on the event with the given ID for the currently
     * authenticated player. This method is only accessible to whitelisted tester
     * accounts for your application. All quests for this player that use the event
     * will also be reset. (events.reset)
     *
     * @param string $eventId The ID of the event.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($eventId, $optParams = [])
    {
        $params = ['eventId' => $eventId];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params]);
    }

    /**
     * Resets all player progress on all events for the currently authenticated
     * player. This method is only accessible to whitelisted tester accounts for
     * your application. All quests for this player will also be reset.
     * (events.resetAll)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAll($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAll', [$params]);
    }

    /**
     * Resets all draft events for all players. This method is only available to
     * user accounts for your developer console. All quests that use any of these
     * events will also be reset. (events.resetAllForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAllForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAllForAllPlayers', [$params]);
    }

    /**
     * Resets the event with the given ID for all players. This method is only
     * available to user accounts for your developer console. Only draft events can
     * be reset. All quests that use the event will also be reset.
     * (events.resetForAllPlayers)
     *
     * @param string $eventId The ID of the event.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($eventId, $optParams = [])
    {
        $params = ['eventId' => $eventId];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }

    /**
     * Resets events with the given IDs for all players. This method is only
     * available to user accounts for your developer console. Only draft events may
     * be reset. All quests that use any of the events will also be reset.
     * (events.resetMultipleForAllPlayers)
     *
     * @param Google_EventsResetMultipleForAllRequest|Google_Service_GamesManagement_EventsResetMultipleForAllRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetMultipleForAllPlayers(Google_Service_GamesManagement_EventsResetMultipleForAllRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('resetMultipleForAllPlayers', [$params]);
    }
}

/**
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $players = $gamesManagementService->players;
 *  </code>
 */
class Google_Service_GamesManagement_Players_Resource extends Google_Service_Resource
{

    /**
     * Hide the given player's leaderboard scores from the given application. This
     * method is only available to user accounts for your developer console.
     * (players.hide)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param string $playerId A player ID. A value of me may be used in place of
     *                              the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function hide($applicationId, $playerId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId, 'playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('hide', [$params]);
    }

    /**
     * Unhide the given player's leaderboard scores from the given application. This
     * method is only available to user accounts for your developer console.
     * (players.unhide)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param string $playerId A player ID. A value of me may be used in place of
     *                              the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function unhide($applicationId, $playerId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId, 'playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('unhide', [$params]);
    }
}

/**
 * The "quests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $quests = $gamesManagementService->quests;
 *  </code>
 */
class Google_Service_GamesManagement_Quests_Resource extends Google_Service_Resource
{

    /**
     * Resets all player progress on the quest with the given ID for the currently
     * authenticated player. This method is only accessible to whitelisted tester
     * accounts for your application. (quests.reset)
     *
     * @param string $questId The ID of the quest.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($questId, $optParams = [])
    {
        $params = ['questId' => $questId];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params]);
    }

    /**
     * Resets all player progress on all quests for the currently authenticated
     * player. This method is only accessible to whitelisted tester accounts for
     * your application. (quests.resetAll)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAll($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAll', [$params]);
    }

    /**
     * Resets all draft quests for all players. This method is only available to
     * user accounts for your developer console. (quests.resetAllForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAllForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAllForAllPlayers', [$params]);
    }

    /**
     * Resets all player progress on the quest with the given ID for all players.
     * This method is only available to user accounts for your developer console.
     * Only draft quests can be reset. (quests.resetForAllPlayers)
     *
     * @param string $questId The ID of the quest.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($questId, $optParams = [])
    {
        $params = ['questId' => $questId];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }

    /**
     * Resets quests with the given IDs for all players. This method is only
     * available to user accounts for your developer console. Only draft quests may
     * be reset. (quests.resetMultipleForAllPlayers)
     *
     * @param Google_QuestsResetMultipleForAllRequest|Google_Service_GamesManagement_QuestsResetMultipleForAllRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetMultipleForAllPlayers(Google_Service_GamesManagement_QuestsResetMultipleForAllRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('resetMultipleForAllPlayers', [$params]);
    }
}

/**
 * The "rooms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $rooms = $gamesManagementService->rooms;
 *  </code>
 */
class Google_Service_GamesManagement_Rooms_Resource extends Google_Service_Resource
{

    /**
     * Reset all rooms for the currently authenticated player for your application.
     * This method is only accessible to whitelisted tester accounts for your
     * application. (rooms.reset)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params]);
    }

    /**
     * Deletes rooms where the only room participants are from whitelisted tester
     * accounts for your application. This method is only available to user accounts
     * for your developer console. (rooms.resetForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }
}

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $scores = $gamesManagementService->scores;
 *  </code>
 */
class Google_Service_GamesManagement_Scores_Resource extends Google_Service_Resource
{

    /**
     * Resets scores for the leaderboard with the given ID for the currently
     * authenticated player. This method is only accessible to whitelisted tester
     * accounts for your application. (scores.reset)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($leaderboardId, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params], "Google_Service_GamesManagement_PlayerScoreResetResponse");
    }

    /**
     * Resets all scores for all leaderboards for the currently authenticated
     * players. This method is only accessible to whitelisted tester accounts for
     * your application. (scores.resetAll)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAll($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAll', [$params], "Google_Service_GamesManagement_PlayerScoreResetAllResponse");
    }

    /**
     * Resets scores for all draft leaderboards for all players. This method is only
     * available to user accounts for your developer console.
     * (scores.resetAllForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetAllForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetAllForAllPlayers', [$params]);
    }

    /**
     * Resets scores for the leaderboard with the given ID for all players. This
     * method is only available to user accounts for your developer console. Only
     * draft leaderboards can be reset. (scores.resetForAllPlayers)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($leaderboardId, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }

    /**
     * Resets scores for the leaderboards with the given IDs for all players. This
     * method is only available to user accounts for your developer console. Only
     * draft leaderboards may be reset. (scores.resetMultipleForAllPlayers)
     *
     * @param Google_ScoresResetMultipleForAllRequest|Google_Service_GamesManagement_ScoresResetMultipleForAllRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetMultipleForAllPlayers(Google_Service_GamesManagement_ScoresResetMultipleForAllRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('resetMultipleForAllPlayers', [$params]);
    }
}

/**
 * The "turnBasedMatches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $turnBasedMatches = $gamesManagementService->turnBasedMatches;
 *  </code>
 */
class Google_Service_GamesManagement_TurnBasedMatches_Resource extends Google_Service_Resource
{

    /**
     * Reset all turn-based match data for a user. This method is only accessible to
     * whitelisted tester accounts for your application. (turnBasedMatches.reset)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reset($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('reset', [$params]);
    }

    /**
     * Deletes turn-based matches where the only match participants are from
     * whitelisted tester accounts for your application. This method is only
     * available to user accounts for your developer console.
     * (turnBasedMatches.resetForAllPlayers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function resetForAllPlayers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('resetForAllPlayers', [$params]);
    }
}


/**
 * Class Google_Service_GamesManagement_AchievementResetAllResponse
 */
class Google_Service_GamesManagement_AchievementResetAllResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $resultsType = 'Google_Service_GamesManagement_AchievementResetResponse';
    protected $resultsDataType = 'array';

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
     * @param $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }
}

/**
 * Class Google_Service_GamesManagement_AchievementResetMultipleForAllRequest
 */
class Google_Service_GamesManagement_AchievementResetMultipleForAllRequest extends Google_Collection
{
    public $achievementIds;
    public $kind;
    protected $collection_key = 'achievement_ids';
    protected $internal_gapi_mappings = [
        "achievementIds" => "achievement_ids",
    ];

    /**
     * @return mixed
     */
    public function getAchievementIds()
    {
        return $this->achievementIds;
    }

    /**
     * @param $achievementIds
     */
    public function setAchievementIds($achievementIds)
    {
        $this->achievementIds = $achievementIds;
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
 * Class Google_Service_GamesManagement_AchievementResetResponse
 */
class Google_Service_GamesManagement_AchievementResetResponse extends Google_Model
{
    public $currentState;
    public $definitionId;
    public $kind;
    public $updateOccurred;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentState()
    {
        return $this->currentState;
    }

    /**
     * @param $currentState
     */
    public function setCurrentState($currentState)
    {
        $this->currentState = $currentState;
    }

    /**
     * @return mixed
     */
    public function getDefinitionId()
    {
        return $this->definitionId;
    }

    /**
     * @param $definitionId
     */
    public function setDefinitionId($definitionId)
    {
        $this->definitionId = $definitionId;
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
    public function getUpdateOccurred()
    {
        return $this->updateOccurred;
    }

    /**
     * @param $updateOccurred
     */
    public function setUpdateOccurred($updateOccurred)
    {
        $this->updateOccurred = $updateOccurred;
    }
}

/**
 * Class Google_Service_GamesManagement_EventsResetMultipleForAllRequest
 */
class Google_Service_GamesManagement_EventsResetMultipleForAllRequest extends Google_Collection
{
    public $eventIds;
    public $kind;
    protected $collection_key = 'event_ids';
    protected $internal_gapi_mappings = [
        "eventIds" => "event_ids",
    ];

    /**
     * @return mixed
     */
    public function getEventIds()
    {
        return $this->eventIds;
    }

    /**
     * @param $eventIds
     */
    public function setEventIds($eventIds)
    {
        $this->eventIds = $eventIds;
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
 * Class Google_Service_GamesManagement_GamesPlayedResource
 */
class Google_Service_GamesManagement_GamesPlayedResource extends Google_Model
{
    public $autoMatched;
    public $timeMillis;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAutoMatched()
    {
        return $this->autoMatched;
    }

    /**
     * @param $autoMatched
     */
    public function setAutoMatched($autoMatched)
    {
        $this->autoMatched = $autoMatched;
    }

    /**
     * @return mixed
     */
    public function getTimeMillis()
    {
        return $this->timeMillis;
    }

    /**
     * @param $timeMillis
     */
    public function setTimeMillis($timeMillis)
    {
        $this->timeMillis = $timeMillis;
    }
}

/**
 * Class Google_Service_GamesManagement_GamesPlayerExperienceInfoResource
 */
class Google_Service_GamesManagement_GamesPlayerExperienceInfoResource extends Google_Model
{
    public $currentExperiencePoints;
    public $lastLevelUpTimestampMillis;
    protected $internal_gapi_mappings = [];
    protected $currentLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
    protected $currentLevelDataType = '';
    protected $nextLevelType = 'Google_Service_GamesManagement_GamesPlayerLevelResource';
    protected $nextLevelDataType = '';

    /**
     * @return mixed
     */
    public function getCurrentExperiencePoints()
    {
        return $this->currentExperiencePoints;
    }

    /**
     * @param $currentExperiencePoints
     */
    public function setCurrentExperiencePoints($currentExperiencePoints)
    {
        $this->currentExperiencePoints = $currentExperiencePoints;
    }

    /**
     * @param Google_Service_GamesManagement_GamesPlayerLevelResource $currentLevel
     */
    public function setCurrentLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $currentLevel)
    {
        $this->currentLevel = $currentLevel;
    }

    /**
     * @return mixed
     */
    public function getCurrentLevel()
    {
        return $this->currentLevel;
    }

    /**
     * @return mixed
     */
    public function getLastLevelUpTimestampMillis()
    {
        return $this->lastLevelUpTimestampMillis;
    }

    /**
     * @param $lastLevelUpTimestampMillis
     */
    public function setLastLevelUpTimestampMillis($lastLevelUpTimestampMillis)
    {
        $this->lastLevelUpTimestampMillis = $lastLevelUpTimestampMillis;
    }

    /**
     * @param Google_Service_GamesManagement_GamesPlayerLevelResource $nextLevel
     */
    public function setNextLevel(Google_Service_GamesManagement_GamesPlayerLevelResource $nextLevel)
    {
        $this->nextLevel = $nextLevel;
    }

    /**
     * @return mixed
     */
    public function getNextLevel()
    {
        return $this->nextLevel;
    }
}

/**
 * Class Google_Service_GamesManagement_GamesPlayerLevelResource
 */
class Google_Service_GamesManagement_GamesPlayerLevelResource extends Google_Model
{
    public $level;
    public $maxExperiencePoints;
    public $minExperiencePoints;
    protected $internal_gapi_mappings = [];

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

    /**
     * @return mixed
     */
    public function getMaxExperiencePoints()
    {
        return $this->maxExperiencePoints;
    }

    /**
     * @param $maxExperiencePoints
     */
    public function setMaxExperiencePoints($maxExperiencePoints)
    {
        $this->maxExperiencePoints = $maxExperiencePoints;
    }

    /**
     * @return mixed
     */
    public function getMinExperiencePoints()
    {
        return $this->minExperiencePoints;
    }

    /**
     * @param $minExperiencePoints
     */
    public function setMinExperiencePoints($minExperiencePoints)
    {
        $this->minExperiencePoints = $minExperiencePoints;
    }
}

/**
 * Class Google_Service_GamesManagement_HiddenPlayer
 */
class Google_Service_GamesManagement_HiddenPlayer extends Google_Model
{
    public $hiddenTimeMillis;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $playerType = 'Google_Service_GamesManagement_Player';
    protected $playerDataType = '';

    /**
     * @return mixed
     */
    public function getHiddenTimeMillis()
    {
        return $this->hiddenTimeMillis;
    }

    /**
     * @param $hiddenTimeMillis
     */
    public function setHiddenTimeMillis($hiddenTimeMillis)
    {
        $this->hiddenTimeMillis = $hiddenTimeMillis;
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
     * @param Google_Service_GamesManagement_Player $player
     */
    public function setPlayer(Google_Service_GamesManagement_Player $player)
    {
        $this->player = $player;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }
}

/**
 * Class Google_Service_GamesManagement_HiddenPlayerList
 */
class Google_Service_GamesManagement_HiddenPlayerList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_GamesManagement_HiddenPlayer';
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
 * Class Google_Service_GamesManagement_Player
 */
class Google_Service_GamesManagement_Player extends Google_Model
{
    public $avatarImageUrl;
    public $displayName;
    public $kind;
    public $playerId;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $experienceInfoType = 'Google_Service_GamesManagement_GamesPlayerExperienceInfoResource';
    protected $experienceInfoDataType = '';
    protected $lastPlayedWithType = 'Google_Service_GamesManagement_GamesPlayedResource';
    protected $lastPlayedWithDataType = '';
    protected $nameType = 'Google_Service_GamesManagement_PlayerName';
    protected $nameDataType = '';

    /**
     * @return mixed
     */
    public function getAvatarImageUrl()
    {
        return $this->avatarImageUrl;
    }

    /**
     * @param $avatarImageUrl
     */
    public function setAvatarImageUrl($avatarImageUrl)
    {
        $this->avatarImageUrl = $avatarImageUrl;
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
     * @param Google_Service_GamesManagement_GamesPlayerExperienceInfoResource $experienceInfo
     */
    public function setExperienceInfo(Google_Service_GamesManagement_GamesPlayerExperienceInfoResource $experienceInfo)
    {
        $this->experienceInfo = $experienceInfo;
    }

    /**
     * @return mixed
     */
    public function getExperienceInfo()
    {
        return $this->experienceInfo;
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
     * @param Google_Service_GamesManagement_GamesPlayedResource $lastPlayedWith
     */
    public function setLastPlayedWith(Google_Service_GamesManagement_GamesPlayedResource $lastPlayedWith)
    {
        $this->lastPlayedWith = $lastPlayedWith;
    }

    /**
     * @return mixed
     */
    public function getLastPlayedWith()
    {
        return $this->lastPlayedWith;
    }

    /**
     * @param Google_Service_GamesManagement_PlayerName $name
     */
    public function setName(Google_Service_GamesManagement_PlayerName $name)
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
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * @param $playerId
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
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
}

/**
 * Class Google_Service_GamesManagement_PlayerName
 */
class Google_Service_GamesManagement_PlayerName extends Google_Model
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
 * Class Google_Service_GamesManagement_PlayerScoreResetAllResponse
 */
class Google_Service_GamesManagement_PlayerScoreResetAllResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $resultsType = 'Google_Service_GamesManagement_PlayerScoreResetResponse';
    protected $resultsDataType = 'array';

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
     * @param $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }
}

/**
 * Class Google_Service_GamesManagement_PlayerScoreResetResponse
 */
class Google_Service_GamesManagement_PlayerScoreResetResponse extends Google_Collection
{
    public $definitionId;
    public $kind;
    public $resetScoreTimeSpans;
    protected $collection_key = 'resetScoreTimeSpans';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDefinitionId()
    {
        return $this->definitionId;
    }

    /**
     * @param $definitionId
     */
    public function setDefinitionId($definitionId)
    {
        $this->definitionId = $definitionId;
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
    public function getResetScoreTimeSpans()
    {
        return $this->resetScoreTimeSpans;
    }

    /**
     * @param $resetScoreTimeSpans
     */
    public function setResetScoreTimeSpans($resetScoreTimeSpans)
    {
        $this->resetScoreTimeSpans = $resetScoreTimeSpans;
    }
}

/**
 * Class Google_Service_GamesManagement_QuestsResetMultipleForAllRequest
 */
class Google_Service_GamesManagement_QuestsResetMultipleForAllRequest extends Google_Collection
{
    public $kind;
    public $questIds;
    protected $collection_key = 'quest_ids';
    protected $internal_gapi_mappings = [
        "questIds" => "quest_ids",
    ];

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
    public function getQuestIds()
    {
        return $this->questIds;
    }

    /**
     * @param $questIds
     */
    public function setQuestIds($questIds)
    {
        $this->questIds = $questIds;
    }
}

/**
 * Class Google_Service_GamesManagement_ScoresResetMultipleForAllRequest
 */
class Google_Service_GamesManagement_ScoresResetMultipleForAllRequest extends Google_Collection
{
    public $kind;
    public $leaderboardIds;
    protected $collection_key = 'leaderboard_ids';
    protected $internal_gapi_mappings = [
        "leaderboardIds" => "leaderboard_ids",
    ];

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
    public function getLeaderboardIds()
    {
        return $this->leaderboardIds;
    }

    /**
     * @param $leaderboardIds
     */
    public function setLeaderboardIds($leaderboardIds)
    {
        $this->leaderboardIds = $leaderboardIds;
    }
}
