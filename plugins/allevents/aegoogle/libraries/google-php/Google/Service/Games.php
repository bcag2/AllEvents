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
 * Service definition for Games (v1).
 *
 * <p>
 * The API for Google Play Game Services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/services/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Games extends Google_Service
{
    /** View and manage its own configuration data in your Google Drive. */
    const DRIVE_APPDATA =
        "https://www.googleapis.com/auth/drive.appdata";
    /** Share your Google+ profile information and view and manage your game activity. */
    const GAMES =
        "https://www.googleapis.com/auth/games";
    /** Know your basic profile info and list of people in your circles.. */
    const PLUS_LOGIN =
        "https://www.googleapis.com/auth/plus.login";

    public $achievementDefinitions;
    public $achievements;
    public $applications;
    public $events;
    public $leaderboards;
    public $metagame;
    public $players;
    public $pushtokens;
    public $questMilestones;
    public $quests;
    public $revisions;
    public $rooms;
    public $scores;
    public $snapshots;
    public $turnBasedMatches;


    /**
     * Constructs the internal representation of the Games service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'games/v1/';
        $this->version = 'v1';
        $this->serviceName = 'games';

        $this->achievementDefinitions = new Google_Service_Games_AchievementDefinitions_Resource(
            $this,
            $this->serviceName,
            'achievementDefinitions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'achievements',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
        $this->achievements = new Google_Service_Games_Achievements_Resource(
            $this,
            $this->serviceName,
            'achievements',
            [
                'methods' => [
                    'increment' => [
                        'path' => 'achievements/{achievementId}/increment',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'stepsToIncrement' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'requestId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'players/{playerId}/achievements',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'state' => [
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
                    ], 'reveal' => [
                        'path' => 'achievements/{achievementId}/reveal',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setStepsAtLeast' => [
                        'path' => 'achievements/{achievementId}/setStepsAtLeast',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'steps' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'unlock' => [
                        'path' => 'achievements/{achievementId}/unlock',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'achievementId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'updateMultiple' => [
                        'path' => 'achievements/updateMultiple',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->applications = new Google_Service_Games_Applications_Resource(
            $this,
            $this->serviceName,
            'applications',
            [
                'methods' => [
                    'get' => [
                        'path' => 'applications/{applicationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'applicationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'platformType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'played' => [
                        'path' => 'applications/played',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->events = new Google_Service_Games_Events_Resource(
            $this,
            $this->serviceName,
            'events',
            [
                'methods' => [
                    'listByPlayer' => [
                        'path' => 'events',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
                    ], 'listDefinitions' => [
                        'path' => 'eventDefinitions',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
                    ], 'record' => [
                        'path' => 'events',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->leaderboards = new Google_Service_Games_Leaderboards_Resource(
            $this,
            $this->serviceName,
            'leaderboards',
            [
                'methods' => [
                    'get' => [
                        'path' => 'leaderboards/{leaderboardId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'leaderboards',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
        $this->metagame = new Google_Service_Games_Metagame_Resource(
            $this,
            $this->serviceName,
            'metagame',
            [
                'methods' => [
                    'getMetagameConfig' => [
                        'path' => 'metagameConfig',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'listCategoriesByPlayer' => [
                        'path' => 'players/{playerId}/categories/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->players = new Google_Service_Games_Players_Resource(
            $this,
            $this->serviceName,
            'players',
            [
                'methods' => [
                    'get' => [
                        'path' => 'players/{playerId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'players/me/players/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->pushtokens = new Google_Service_Games_Pushtokens_Resource(
            $this,
            $this->serviceName,
            'pushtokens',
            [
                'methods' => [
                    'remove' => [
                        'path' => 'pushtokens/remove',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'update' => [
                        'path' => 'pushtokens',
                        'httpMethod' => 'PUT',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->questMilestones = new Google_Service_Games_QuestMilestones_Resource(
            $this,
            $this->serviceName,
            'questMilestones',
            [
                'methods' => [
                    'claim' => [
                        'path' => 'quests/{questId}/milestones/{milestoneId}/claim',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'questId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'milestoneId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'requestId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->quests = new Google_Service_Games_Quests_Resource(
            $this,
            $this->serviceName,
            'quests',
            [
                'methods' => [
                    'accept' => [
                        'path' => 'quests/{questId}/accept',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'questId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'players/{playerId}/quests',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->revisions = new Google_Service_Games_Revisions_Resource(
            $this,
            $this->serviceName,
            'revisions',
            [
                'methods' => [
                    'check' => [
                        'path' => 'revisions/check',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'clientRevision' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->rooms = new Google_Service_Games_Rooms_Resource(
            $this,
            $this->serviceName,
            'rooms',
            [
                'methods' => [
                    'create' => [
                        'path' => 'rooms/create',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'decline' => [
                        'path' => 'rooms/{roomId}/decline',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'dismiss' => [
                        'path' => 'rooms/{roomId}/dismiss',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'rooms/{roomId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'join' => [
                        'path' => 'rooms/{roomId}/join',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'leave' => [
                        'path' => 'rooms/{roomId}/leave',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'rooms',
                        'httpMethod' => 'GET',
                        'parameters' => [
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
                    ], 'reportStatus' => [
                        'path' => 'rooms/{roomId}/reportstatus',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'roomId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
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
        $this->scores = new Google_Service_Games_Scores_Resource(
            $this,
            $this->serviceName,
            'scores',
            [
                'methods' => [
                    'get' => [
                        'path' => 'players/{playerId}/leaderboards/{leaderboardId}/scores/{timeSpan}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timeSpan' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeRankType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'leaderboards/{leaderboardId}/scores/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timeSpan' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listWindow' => [
                        'path' => 'leaderboards/{leaderboardId}/window/{collection}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'collection' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'timeSpan' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'returnTopIfAbsent' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'resultsAbove' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'submit' => [
                        'path' => 'leaderboards/{leaderboardId}/scores',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'leaderboardId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'score' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'scoreTag' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'submitMultiple' => [
                        'path' => 'leaderboards/scores',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->snapshots = new Google_Service_Games_Snapshots_Resource(
            $this,
            $this->serviceName,
            'snapshots',
            [
                'methods' => [
                    'get' => [
                        'path' => 'snapshots/{snapshotId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'snapshotId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'players/{playerId}/snapshots',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'playerId' => [
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
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->turnBasedMatches = new Google_Service_Games_TurnBasedMatches_Resource(
            $this,
            $this->serviceName,
            'turnBasedMatches',
            [
                'methods' => [
                    'cancel' => [
                        'path' => 'turnbasedmatches/{matchId}/cancel',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'create' => [
                        'path' => 'turnbasedmatches/create',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'decline' => [
                        'path' => 'turnbasedmatches/{matchId}/decline',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'dismiss' => [
                        'path' => 'turnbasedmatches/{matchId}/dismiss',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'finish' => [
                        'path' => 'turnbasedmatches/{matchId}/finish',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'turnbasedmatches/{matchId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeMatchData' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'join' => [
                        'path' => 'turnbasedmatches/{matchId}/join',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'leave' => [
                        'path' => 'turnbasedmatches/{matchId}/leave',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'leaveTurn' => [
                        'path' => 'turnbasedmatches/{matchId}/leaveTurn',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'matchVersion' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pendingParticipantId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'turnbasedmatches',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxCompletedMatches' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeMatchData' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'rematch' => [
                        'path' => 'turnbasedmatches/{matchId}/rematch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'requestId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'sync' => [
                        'path' => 'turnbasedmatches/sync',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxCompletedMatches' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'language' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeMatchData' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'takeTurn' => [
                        'path' => 'turnbasedmatches/{matchId}/turn',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'matchId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
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
 * The "achievementDefinitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $achievementDefinitions = $gamesService->achievementDefinitions;
 *  </code>
 */
class Google_Service_Games_AchievementDefinitions_Resource extends Google_Service_Resource
{

    /**
     * Lists all the achievement definitions for your application.
     * (achievementDefinitions.listAchievementDefinitions)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of achievement resources to
     * return in the response, used for paging. For any response, the actual number
     * of achievement resources returned may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listAchievementDefinitions($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_AchievementDefinitionsListResponse");
    }
}

/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $achievements = $gamesService->achievements;
 *  </code>
 */
class Google_Service_Games_Achievements_Resource extends Google_Service_Resource
{

    /**
     * Increments the steps of the achievement with the given ID for the currently
     * authenticated player. (achievements.increment)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param int $stepsToIncrement The number of steps to increment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string requestId A randomly generated numeric ID for each request
     * specified by the caller. This number is used at the server to ensure that the
     * request is handled correctly across retries.
     */
    public function increment($achievementId, $stepsToIncrement, $optParams = [])
    {
        $params = ['achievementId' => $achievementId, 'stepsToIncrement' => $stepsToIncrement];
        $params = array_merge($params, $optParams);

        return $this->call('increment', [$params], "Google_Service_Games_AchievementIncrementResponse");
    }

    /**
     * Lists the progress for all your application's achievements for the currently
     * authenticated player. (achievements.listAchievements)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                          the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param string state Tells the server to return only achievements with the
     * specified state. If this parameter isn't specified, all achievements are
     * returned.
     * @opt_param int maxResults The maximum number of achievement resources to
     * return in the response, used for paging. For any response, the actual number
     * of achievement resources returned may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listAchievements($playerId, $optParams = [])
    {
        $params = ['playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_PlayerAchievementListResponse");
    }

    /**
     * Sets the state of the achievement with the given ID to REVEALED for the
     * currently authenticated player. (achievements.reveal)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function reveal($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('reveal', [$params], "Google_Service_Games_AchievementRevealResponse");
    }

    /**
     * Sets the steps for the currently authenticated player towards unlocking an
     * achievement. If the steps parameter is less than the current number of steps
     * that the player already gained for the achievement, the achievement is not
     * modified. (achievements.setStepsAtLeast)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param int $steps The minimum value to set the steps to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function setStepsAtLeast($achievementId, $steps, $optParams = [])
    {
        $params = ['achievementId' => $achievementId, 'steps' => $steps];
        $params = array_merge($params, $optParams);

        return $this->call('setStepsAtLeast', [$params], "Google_Service_Games_AchievementSetStepsAtLeastResponse");
    }

    /**
     * Unlocks this achievement for the currently authenticated player.
     * (achievements.unlock)
     *
     * @param string $achievementId The ID of the achievement used by this method.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function unlock($achievementId, $optParams = [])
    {
        $params = ['achievementId' => $achievementId];
        $params = array_merge($params, $optParams);

        return $this->call('unlock', [$params], "Google_Service_Games_AchievementUnlockResponse");
    }

    /**
     * Updates multiple achievements for the currently authenticated player.
     * (achievements.updateMultiple)
     *
     * @param Google_AchievementUpdateMultipleRequest|Google_Service_Games_AchievementUpdateMultipleRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function updateMultiple(Google_Service_Games_AchievementUpdateMultipleRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('updateMultiple', [$params], "Google_Service_Games_AchievementUpdateMultipleResponse");
    }
}

/**
 * The "applications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $applications = $gamesService->applications;
 *  </code>
 */
class Google_Service_Games_Applications_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the metadata of the application with the given ID. If the requested
     * application is not available for the specified platformType, the returned
     * response will not include any instance data. (applications.get)
     *
     * @param string $applicationId The application ID from the Google Play
     *                              developer console.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string platformType Restrict application details returned to the
     * specific platform.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function get($applicationId, $optParams = [])
    {
        $params = ['applicationId' => $applicationId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_Application");
    }

    /**
     * Indicate that the the currently authenticated user is playing your
     * application. (applications.played)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function played($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('played', [$params]);
    }
}

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $events = $gamesService->events;
 *  </code>
 */
class Google_Service_Games_Events_Resource extends Google_Service_Resource
{

    /**
     * Returns a list showing the current progress on events in this application for
     * the currently authenticated user. (events.listByPlayer)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of events to return in the
     * response, used for paging. For any response, the actual number of events to
     * return may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listByPlayer($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listByPlayer', [$params], "Google_Service_Games_PlayerEventListResponse");
    }

    /**
     * Returns a list of the event definitions in this application.
     * (events.listDefinitions)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of event definitions to return
     * in the response, used for paging. For any response, the actual number of
     * event definitions to return may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listDefinitions($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listDefinitions', [$params], "Google_Service_Games_EventDefinitionListResponse");
    }

    /**
     * Records a batch of changes to the number of times events have occurred for
     * the currently authenticated user of this application. (events.record)
     *
     * @param Google_EventRecordRequest|Google_Service_Games_EventRecordRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function record(Google_Service_Games_EventRecordRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('record', [$params], "Google_Service_Games_EventUpdateResponse");
    }
}

/**
 * The "leaderboards" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $leaderboards = $gamesService->leaderboards;
 *  </code>
 */
class Google_Service_Games_Leaderboards_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the metadata of the leaderboard with the given ID.
     * (leaderboards.get)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function get($leaderboardId, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_Leaderboard");
    }

    /**
     * Lists all the leaderboard metadata for your application.
     * (leaderboards.listLeaderboards)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of leaderboards to return in the
     * response. For any response, the actual number of leaderboards returned may be
     * less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listLeaderboards($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_LeaderboardListResponse");
    }
}

/**
 * The "metagame" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $metagame = $gamesService->metagame;
 *  </code>
 */
class Google_Service_Games_Metagame_Resource extends Google_Service_Resource
{

    /**
     * Return the metagame configuration data for the calling application.
     * (metagame.getMetagameConfig)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getMetagameConfig($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('getMetagameConfig', [$params], "Google_Service_Games_MetagameConfig");
    }

    /**
     * List play data aggregated per category for the player corresponding to
     * playerId. (metagame.listCategoriesByPlayer)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                           the authenticated player's ID.
     * @param string $collection The collection of categories for which data will be
     *                           returned.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of category resources to return
     * in the response, used for paging. For any response, the actual number of
     * category resources returned may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listCategoriesByPlayer($playerId, $collection, $optParams = [])
    {
        $params = ['playerId' => $playerId, 'collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('listCategoriesByPlayer', [$params], "Google_Service_Games_CategoryListResponse");
    }
}

/**
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $players = $gamesService->players;
 *  </code>
 */
class Google_Service_Games_Players_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the Player resource with the given ID. To retrieve the player for
     * the currently authenticated user, set playerId to me. (players.get)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                          the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function get($playerId, $optParams = [])
    {
        $params = ['playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_Player");
    }

    /**
     * Get the collection of players for the currently authenticated user.
     * (players.listPlayers)
     *
     * @param string $collection Collection of players being retrieved
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of player resources to return in
     * the response, used for paging. For any response, the actual number of player
     * resources returned may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listPlayers($collection, $optParams = [])
    {
        $params = ['collection' => $collection];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_PlayerListResponse");
    }
}

/**
 * The "pushtokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $pushtokens = $gamesService->pushtokens;
 *  </code>
 */
class Google_Service_Games_Pushtokens_Resource extends Google_Service_Resource
{

    /**
     * Removes a push token for the current user and application. Removing a non-
     * existent push token will report success. (pushtokens.remove)
     *
     * @param Google_PushTokenId|Google_Service_Games_PushTokenId $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function remove(Google_Service_Games_PushTokenId $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('remove', [$params]);
    }

    /**
     * Registers a push token for the current user and application.
     * (pushtokens.update)
     *
     * @param Google_PushToken|Google_Service_Games_PushToken $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update(Google_Service_Games_PushToken $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params]);
    }
}

/**
 * The "questMilestones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $questMilestones = $gamesService->questMilestones;
 *  </code>
 */
class Google_Service_Games_QuestMilestones_Resource extends Google_Service_Resource
{

    /**
     * Report that a reward for the milestone corresponding to milestoneId for the
     * quest corresponding to questId has been claimed by the currently authorized
     * user. (questMilestones.claim)
     *
     * @param string $questId The ID of the quest.
     * @param string $milestoneId The ID of the milestone.
     * @param string $requestId A numeric ID to ensure that the request is handled
     *                            correctly across retries. Your client application must generate this ID
     *                            randomly.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function claim($questId, $milestoneId, $requestId, $optParams = [])
    {
        $params = ['questId' => $questId, 'milestoneId' => $milestoneId, 'requestId' => $requestId];
        $params = array_merge($params, $optParams);

        return $this->call('claim', [$params]);
    }
}

/**
 * The "quests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $quests = $gamesService->quests;
 *  </code>
 */
class Google_Service_Games_Quests_Resource extends Google_Service_Resource
{

    /**
     * Indicates that the currently authorized user will participate in the quest.
     * (quests.accept)
     *
     * @param string $questId The ID of the quest.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function accept($questId, $optParams = [])
    {
        $params = ['questId' => $questId];
        $params = array_merge($params, $optParams);

        return $this->call('accept', [$params], "Google_Service_Games_Quest");
    }

    /**
     * Get a list of quests for your application and the currently authenticated
     * player. (quests.listQuests)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                          the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of quest resources to return in
     * the response, used for paging. For any response, the actual number of quest
     * resources returned may be less than the specified maxResults. Acceptable
     * values are 1 to 50, inclusive. (Default: 50).
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listQuests($playerId, $optParams = [])
    {
        $params = ['playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_QuestListResponse");
    }
}

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $revisions = $gamesService->revisions;
 *  </code>
 */
class Google_Service_Games_Revisions_Resource extends Google_Service_Resource
{

    /**
     * Checks whether the games client is out of date. (revisions.check)
     *
     * @param string $clientRevision The revision of the client SDK used by your
     *                               application. Format: [PLATFORM_TYPE]:[VERSION_NUMBER]. Possible values of
     *                               PLATFORM_TYPE are:   - "ANDROID" - Client is running the Android SDK.  -
     *                               "IOS" - Client is running the iOS SDK.  - "WEB_APP" - Client is running as a
     *                               Web App.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function check($clientRevision, $optParams = [])
    {
        $params = ['clientRevision' => $clientRevision];
        $params = array_merge($params, $optParams);

        return $this->call('check', [$params], "Google_Service_Games_RevisionCheckResponse");
    }
}

/**
 * The "rooms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $rooms = $gamesService->rooms;
 *  </code>
 */
class Google_Service_Games_Rooms_Resource extends Google_Service_Resource
{

    /**
     * Create a room. For internal use by the Games SDK only. Calling this method
     * directly is unsupported. (rooms.create)
     *
     * @param Google_RoomCreateRequest|Google_Service_Games_RoomCreateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function create(Google_Service_Games_RoomCreateRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Games_Room");
    }

    /**
     * Decline an invitation to join a room. For internal use by the Games SDK only.
     * Calling this method directly is unsupported. (rooms.decline)
     *
     * @param string $roomId The ID of the room.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function decline($roomId, $optParams = [])
    {
        $params = ['roomId' => $roomId];
        $params = array_merge($params, $optParams);

        return $this->call('decline', [$params], "Google_Service_Games_Room");
    }

    /**
     * Dismiss an invitation to join a room. For internal use by the Games SDK only.
     * Calling this method directly is unsupported. (rooms.dismiss)
     *
     * @param string $roomId The ID of the room.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function dismiss($roomId, $optParams = [])
    {
        $params = ['roomId' => $roomId];
        $params = array_merge($params, $optParams);

        return $this->call('dismiss', [$params]);
    }

    /**
     * Get the data for a room. (rooms.get)
     *
     * @param string $roomId The ID of the room.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function get($roomId, $optParams = [])
    {
        $params = ['roomId' => $roomId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_Room");
    }

    /**
     * Join a room. For internal use by the Games SDK only. Calling this method
     * directly is unsupported. (rooms.join)
     *
     * @param string $roomId The ID of the room.
     * @param Google_RoomJoinRequest|Google_Service_Games_RoomJoinRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function join($roomId, Google_Service_Games_RoomJoinRequest $postBody, $optParams = [])
    {
        $params = ['roomId' => $roomId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('join', [$params], "Google_Service_Games_Room");
    }

    /**
     * Leave a room. For internal use by the Games SDK only. Calling this method
     * directly is unsupported. (rooms.leave)
     *
     * @param string $roomId The ID of the room.
     * @param Google_RoomLeaveRequest|Google_Service_Games_RoomLeaveRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function leave($roomId, Google_Service_Games_RoomLeaveRequest $postBody, $optParams = [])
    {
        $params = ['roomId' => $roomId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('leave', [$params], "Google_Service_Games_Room");
    }

    /**
     * Returns invitations to join rooms. (rooms.listRooms)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of rooms to return in the
     * response, used for paging. For any response, the actual number of rooms to
     * return may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listRooms($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_RoomList");
    }

    /**
     * Updates sent by a client reporting the status of peers in a room. For
     * internal use by the Games SDK only. Calling this method directly is
     * unsupported. (rooms.reportStatus)
     *
     * @param string $roomId The ID of the room.
     * @param Google_RoomP2PStatuses|Google_Service_Games_RoomP2PStatuses $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function reportStatus($roomId, Google_Service_Games_RoomP2PStatuses $postBody, $optParams = [])
    {
        $params = ['roomId' => $roomId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('reportStatus', [$params], "Google_Service_Games_RoomStatus");
    }
}

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $scores = $gamesService->scores;
 *  </code>
 */
class Google_Service_Games_Scores_Resource extends Google_Service_Resource
{

    /**
     * Get high scores, and optionally ranks, in leaderboards for the currently
     * authenticated player. For a specific time span, leaderboardId can be set to
     * ALL to retrieve data for all leaderboards in a given time span. NOTE: You
     * cannot ask for 'ALL' leaderboards and 'ALL' timeSpans in the same request;
     * only one parameter may be set to 'ALL'. (scores.get)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                              the authenticated player's ID.
     * @param string $leaderboardId The ID of the leaderboard. Can be set to 'ALL'
     *                              to retrieve data for all leaderboards for this application.
     * @param string $timeSpan The time span for the scores and ranks you're
     *                              requesting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string includeRankType The types of ranks to return. If the
     * parameter is omitted, no ranks will be returned.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param int maxResults The maximum number of leaderboard scores to return
     * in the response. For any response, the actual number of leaderboard scores
     * returned may be less than the specified maxResults.
     * @opt_param string pageToken The token returned by the previous request.
     */
    public function get($playerId, $leaderboardId, $timeSpan, $optParams = [])
    {
        $params = ['playerId' => $playerId, 'leaderboardId' => $leaderboardId, 'timeSpan' => $timeSpan];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_PlayerLeaderboardScoreListResponse");
    }

    /**
     * Lists the scores in a leaderboard, starting from the top. (scores.listScores)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param string $collection The collection of scores you're requesting.
     * @param string $timeSpan The time span for the scores and ranks you're
     *                              requesting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param int maxResults The maximum number of leaderboard scores to return
     * in the response. For any response, the actual number of leaderboard scores
     * returned may be less than the specified maxResults.
     * @opt_param string pageToken The token returned by the previous request.
     */
    public function listScores($leaderboardId, $collection, $timeSpan, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_LeaderboardScores");
    }

    /**
     * Lists the scores in a leaderboard around (and including) a player's score.
     * (scores.listWindow)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param string $collection The collection of scores you're requesting.
     * @param string $timeSpan The time span for the scores and ranks you're
     *                              requesting.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param bool returnTopIfAbsent True if the top scores should be returned
     * when the player is not in the leaderboard. Defaults to true.
     * @opt_param int resultsAbove The preferred number of scores to return above
     * the player's score. More scores may be returned if the player is at the
     * bottom of the leaderboard; fewer may be returned if the player is at the top.
     * Must be less than or equal to maxResults.
     * @opt_param int maxResults The maximum number of leaderboard scores to return
     * in the response. For any response, the actual number of leaderboard scores
     * returned may be less than the specified maxResults.
     * @opt_param string pageToken The token returned by the previous request.
     */
    public function listWindow($leaderboardId, $collection, $timeSpan, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan];
        $params = array_merge($params, $optParams);

        return $this->call('listWindow', [$params], "Google_Service_Games_LeaderboardScores");
    }

    /**
     * Submits a score to the specified leaderboard. (scores.submit)
     *
     * @param string $leaderboardId The ID of the leaderboard.
     * @param string $score The score you're submitting. The submitted score is
     *                              ignored if it is worse than a previously submitted score, where worse depends
     *                              on the leaderboard sort order. The meaning of the score value depends on the
     *                              leaderboard format type. For fixed-point, the score represents the raw value.
     *                              For time, the score represents elapsed time in milliseconds. For currency,
     *                              the score represents a value in micro units.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param string scoreTag Additional information about the score you're
     * submitting. Values must contain no more than 64 URI-safe characters as
     * defined by section 2.3 of RFC 3986.
     */
    public function submit($leaderboardId, $score, $optParams = [])
    {
        $params = ['leaderboardId' => $leaderboardId, 'score' => $score];
        $params = array_merge($params, $optParams);

        return $this->call('submit', [$params], "Google_Service_Games_PlayerScoreResponse");
    }

    /**
     * Submits multiple scores to leaderboards. (scores.submitMultiple)
     *
     * @param Google_PlayerScoreSubmissionList|Google_Service_Games_PlayerScoreSubmissionList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function submitMultiple(Google_Service_Games_PlayerScoreSubmissionList $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('submitMultiple', [$params], "Google_Service_Games_PlayerScoreListResponse");
    }
}

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $snapshots = $gamesService->snapshots;
 *  </code>
 */
class Google_Service_Games_Snapshots_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the metadata for a given snapshot ID. (snapshots.get)
     *
     * @param string $snapshotId The ID of the snapshot.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function get($snapshotId, $optParams = [])
    {
        $params = ['snapshotId' => $snapshotId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_Snapshot");
    }

    /**
     * Retrieves a list of snapshots created by your application for the player
     * corresponding to the player ID. (snapshots.listSnapshots)
     *
     * @param string $playerId A player ID. A value of me may be used in place of
     *                          the authenticated player's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxResults The maximum number of snapshot resources to return
     * in the response, used for paging. For any response, the actual number of
     * snapshot resources returned may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function listSnapshots($playerId, $optParams = [])
    {
        $params = ['playerId' => $playerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_SnapshotListResponse");
    }
}

/**
 * The "turnBasedMatches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $turnBasedMatches = $gamesService->turnBasedMatches;
 *  </code>
 */
class Google_Service_Games_TurnBasedMatches_Resource extends Google_Service_Resource
{

    /**
     * Cancel a turn-based match. (turnBasedMatches.cancel)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function cancel($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('cancel', [$params]);
    }

    /**
     * Create a turn-based match. (turnBasedMatches.create)
     *
     * @param Google_Service_Games_TurnBasedMatchCreateRequest|Google_TurnBasedMatchCreateRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function create(Google_Service_Games_TurnBasedMatchCreateRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Decline an invitation to play a turn-based match. (turnBasedMatches.decline)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function decline($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('decline', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Dismiss a turn-based match from the match list. The match will no longer show
     * up in the list and will not generate notifications.
     * (turnBasedMatches.dismiss)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function dismiss($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('dismiss', [$params]);
    }

    /**
     * Finish a turn-based match. Each player should make this call once, after all
     * results are in. Only the player whose turn it is may make the first call to
     * Finish, and can pass in the final match state. (turnBasedMatches.finish)
     *
     * @param string $matchId The ID of the match.
     * @param Google_Service_Games_TurnBasedMatchResults|Google_TurnBasedMatchResults $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function finish($matchId, Google_Service_Games_TurnBasedMatchResults $postBody, $optParams = [])
    {
        $params = ['matchId' => $matchId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('finish', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Get the data for a turn-based match. (turnBasedMatches.get)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param bool includeMatchData Get match data along with metadata.
     */
    public function get($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Join a turn-based match. (turnBasedMatches.join)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function join($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('join', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Leave a turn-based match when it is not the current player's turn, without
     * canceling the match. (turnBasedMatches.leave)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function leave($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('leave', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Leave a turn-based match during the current player's turn, without canceling
     * the match. (turnBasedMatches.leaveTurn)
     *
     * @param string $matchId The ID of the match.
     * @param int $matchVersion The version of the match being updated.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param string pendingParticipantId The ID of another participant who
     * should take their turn next. If not set, the match will wait for other
     * player(s) to join via automatching; this is only valid if automatch criteria
     * is set on the match with remaining slots for automatched players.
     */
    public function leaveTurn($matchId, $matchVersion, $optParams = [])
    {
        $params = ['matchId' => $matchId, 'matchVersion' => $matchVersion];
        $params = array_merge($params, $optParams);

        return $this->call('leaveTurn', [$params], "Google_Service_Games_TurnBasedMatch");
    }

    /**
     * Returns turn-based matches the player is or was involved in.
     * (turnBasedMatches.listTurnBasedMatches)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxCompletedMatches The maximum number of completed or
     * canceled matches to return in the response. If not set, all matches returned
     * could be completed or canceled.
     * @opt_param int maxResults The maximum number of matches to return in the
     * response, used for paging. For any response, the actual number of matches to
     * return may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param bool includeMatchData True if match data should be returned in the
     * response. Note that not all data will necessarily be returned if
     * include_match_data is true; the server may decide to only return data for
     * some of the matches to limit download size for the client. The remainder of
     * the data for these matches will be retrievable on request.
     */
    public function listTurnBasedMatches($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Games_TurnBasedMatchList");
    }

    /**
     * Create a rematch of a match that was previously completed, with the same
     * participants. This can be called by only one player on a match still in their
     * list; the player must have called Finish first. Returns the newly created
     * match; it will be the caller's turn. (turnBasedMatches.rematch)
     *
     * @param string $matchId The ID of the match.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string requestId A randomly generated numeric ID for each request
     * specified by the caller. This number is used at the server to ensure that the
     * request is handled correctly across retries.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function rematch($matchId, $optParams = [])
    {
        $params = ['matchId' => $matchId];
        $params = array_merge($params, $optParams);

        return $this->call('rematch', [$params], "Google_Service_Games_TurnBasedMatchRematch");
    }

    /**
     * Returns turn-based matches the player is or was involved in that changed
     * since the last sync call, with the least recent changes coming first. Matches
     * that should be removed from the local cache will have a status of
     * MATCH_DELETED. (turnBasedMatches.sync)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token returned by the previous request.
     * @opt_param int maxCompletedMatches The maximum number of completed or
     * canceled matches to return in the response. If not set, all matches returned
     * could be completed or canceled.
     * @opt_param int maxResults The maximum number of matches to return in the
     * response, used for paging. For any response, the actual number of matches to
     * return may be less than the specified maxResults.
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     * @opt_param bool includeMatchData True if match data should be returned in the
     * response. Note that not all data will necessarily be returned if
     * include_match_data is true; the server may decide to only return data for
     * some of the matches to limit download size for the client. The remainder of
     * the data for these matches will be retrievable on request.
     */
    public function sync($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('sync', [$params], "Google_Service_Games_TurnBasedMatchSync");
    }

    /**
     * Commit the results of a player turn. (turnBasedMatches.takeTurn)
     *
     * @param string $matchId The ID of the match.
     * @param Google_Service_Games_TurnBasedMatchTurn|Google_TurnBasedMatchTurn $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string language The preferred language to use for strings returned
     * by this method.
     */
    public function takeTurn($matchId, Google_Service_Games_TurnBasedMatchTurn $postBody, $optParams = [])
    {
        $params = ['matchId' => $matchId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('takeTurn', [$params], "Google_Service_Games_TurnBasedMatch");
    }
}


/**
 * Class Google_Service_Games_AchievementDefinition
 */
class Google_Service_Games_AchievementDefinition extends Google_Model
{
    public $achievementType;
    public $description;
    public $experiencePoints;
    public $formattedTotalSteps;
    public $id;
    public $initialState;
    public $isRevealedIconUrlDefault;
    public $isUnlockedIconUrlDefault;
    public $kind;
    public $name;
    public $revealedIconUrl;
    public $totalSteps;
    public $unlockedIconUrl;
    protected $internal_gapi_mappings = [];

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
    public function getExperiencePoints()
    {
        return $this->experiencePoints;
    }

    /**
     * @param $experiencePoints
     */
    public function setExperiencePoints($experiencePoints)
    {
        $this->experiencePoints = $experiencePoints;
    }

    /**
     * @return mixed
     */
    public function getFormattedTotalSteps()
    {
        return $this->formattedTotalSteps;
    }

    /**
     * @param $formattedTotalSteps
     */
    public function setFormattedTotalSteps($formattedTotalSteps)
    {
        $this->formattedTotalSteps = $formattedTotalSteps;
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
    public function getIsRevealedIconUrlDefault()
    {
        return $this->isRevealedIconUrlDefault;
    }

    /**
     * @param $isRevealedIconUrlDefault
     */
    public function setIsRevealedIconUrlDefault($isRevealedIconUrlDefault)
    {
        $this->isRevealedIconUrlDefault = $isRevealedIconUrlDefault;
    }

    /**
     * @return mixed
     */
    public function getIsUnlockedIconUrlDefault()
    {
        return $this->isUnlockedIconUrlDefault;
    }

    /**
     * @param $isUnlockedIconUrlDefault
     */
    public function setIsUnlockedIconUrlDefault($isUnlockedIconUrlDefault)
    {
        $this->isUnlockedIconUrlDefault = $isUnlockedIconUrlDefault;
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
    public function getRevealedIconUrl()
    {
        return $this->revealedIconUrl;
    }

    /**
     * @param $revealedIconUrl
     */
    public function setRevealedIconUrl($revealedIconUrl)
    {
        $this->revealedIconUrl = $revealedIconUrl;
    }

    /**
     * @return mixed
     */
    public function getTotalSteps()
    {
        return $this->totalSteps;
    }

    /**
     * @param $totalSteps
     */
    public function setTotalSteps($totalSteps)
    {
        $this->totalSteps = $totalSteps;
    }

    /**
     * @return mixed
     */
    public function getUnlockedIconUrl()
    {
        return $this->unlockedIconUrl;
    }

    /**
     * @param $unlockedIconUrl
     */
    public function setUnlockedIconUrl($unlockedIconUrl)
    {
        $this->unlockedIconUrl = $unlockedIconUrl;
    }
}

/**
 * Class Google_Service_Games_AchievementDefinitionsListResponse
 */
class Google_Service_Games_AchievementDefinitionsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_AchievementDefinition';
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
 * Class Google_Service_Games_AchievementIncrementResponse
 */
class Google_Service_Games_AchievementIncrementResponse extends Google_Model
{
    public $currentSteps;
    public $kind;
    public $newlyUnlocked;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentSteps()
    {
        return $this->currentSteps;
    }

    /**
     * @param $currentSteps
     */
    public function setCurrentSteps($currentSteps)
    {
        $this->currentSteps = $currentSteps;
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
    public function getNewlyUnlocked()
    {
        return $this->newlyUnlocked;
    }

    /**
     * @param $newlyUnlocked
     */
    public function setNewlyUnlocked($newlyUnlocked)
    {
        $this->newlyUnlocked = $newlyUnlocked;
    }
}

/**
 * Class Google_Service_Games_AchievementRevealResponse
 */
class Google_Service_Games_AchievementRevealResponse extends Google_Model
{
    public $currentState;
    public $kind;
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
 * Class Google_Service_Games_AchievementSetStepsAtLeastResponse
 */
class Google_Service_Games_AchievementSetStepsAtLeastResponse extends Google_Model
{
    public $currentSteps;
    public $kind;
    public $newlyUnlocked;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentSteps()
    {
        return $this->currentSteps;
    }

    /**
     * @param $currentSteps
     */
    public function setCurrentSteps($currentSteps)
    {
        $this->currentSteps = $currentSteps;
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
    public function getNewlyUnlocked()
    {
        return $this->newlyUnlocked;
    }

    /**
     * @param $newlyUnlocked
     */
    public function setNewlyUnlocked($newlyUnlocked)
    {
        $this->newlyUnlocked = $newlyUnlocked;
    }
}

/**
 * Class Google_Service_Games_AchievementUnlockResponse
 */
class Google_Service_Games_AchievementUnlockResponse extends Google_Model
{
    public $kind;
    public $newlyUnlocked;
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
    public function getNewlyUnlocked()
    {
        return $this->newlyUnlocked;
    }

    /**
     * @param $newlyUnlocked
     */
    public function setNewlyUnlocked($newlyUnlocked)
    {
        $this->newlyUnlocked = $newlyUnlocked;
    }
}

/**
 * Class Google_Service_Games_AchievementUpdateMultipleRequest
 */
class Google_Service_Games_AchievementUpdateMultipleRequest extends Google_Collection
{
    public $kind;
    protected $collection_key = 'updates';
    protected $internal_gapi_mappings = [];
    protected $updatesType = 'Google_Service_Games_AchievementUpdateRequest';
    protected $updatesDataType = 'array';

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
     * @param $updates
     */
    public function setUpdates($updates)
    {
        $this->updates = $updates;
    }

    /**
     * @return mixed
     */
    public function getUpdates()
    {
        return $this->updates;
    }
}

/**
 * Class Google_Service_Games_AchievementUpdateMultipleResponse
 */
class Google_Service_Games_AchievementUpdateMultipleResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'updatedAchievements';
    protected $internal_gapi_mappings = [];
    protected $updatedAchievementsType = 'Google_Service_Games_AchievementUpdateResponse';
    protected $updatedAchievementsDataType = 'array';

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
     * @param $updatedAchievements
     */
    public function setUpdatedAchievements($updatedAchievements)
    {
        $this->updatedAchievements = $updatedAchievements;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAchievements()
    {
        return $this->updatedAchievements;
    }
}

/**
 * Class Google_Service_Games_AchievementUpdateRequest
 */
class Google_Service_Games_AchievementUpdateRequest extends Google_Model
{
    public $achievementId;
    public $kind;
    public $updateType;
    protected $internal_gapi_mappings = [];
    protected $incrementPayloadType = 'Google_Service_Games_GamesAchievementIncrement';
    protected $incrementPayloadDataType = '';
    protected $setStepsAtLeastPayloadType = 'Google_Service_Games_GamesAchievementSetStepsAtLeast';
    protected $setStepsAtLeastPayloadDataType = '';

    /**
     * @return mixed
     */
    public function getAchievementId()
    {
        return $this->achievementId;
    }

    /**
     * @param $achievementId
     */
    public function setAchievementId($achievementId)
    {
        $this->achievementId = $achievementId;
    }

    /**
     * @param Google_Service_Games_GamesAchievementIncrement $incrementPayload
     */
    public function setIncrementPayload(Google_Service_Games_GamesAchievementIncrement $incrementPayload)
    {
        $this->incrementPayload = $incrementPayload;
    }

    /**
     * @return mixed
     */
    public function getIncrementPayload()
    {
        return $this->incrementPayload;
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
     * @param Google_Service_Games_GamesAchievementSetStepsAtLeast $setStepsAtLeastPayload
     */
    public function setSetStepsAtLeastPayload(Google_Service_Games_GamesAchievementSetStepsAtLeast $setStepsAtLeastPayload)
    {
        $this->setStepsAtLeastPayload = $setStepsAtLeastPayload;
    }

    /**
     * @return mixed
     */
    public function getSetStepsAtLeastPayload()
    {
        return $this->setStepsAtLeastPayload;
    }

    /**
     * @return mixed
     */
    public function getUpdateType()
    {
        return $this->updateType;
    }

    /**
     * @param $updateType
     */
    public function setUpdateType($updateType)
    {
        $this->updateType = $updateType;
    }
}

/**
 * Class Google_Service_Games_AchievementUpdateResponse
 */
class Google_Service_Games_AchievementUpdateResponse extends Google_Model
{
    public $achievementId;
    public $currentState;
    public $currentSteps;
    public $kind;
    public $newlyUnlocked;
    public $updateOccurred;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAchievementId()
    {
        return $this->achievementId;
    }

    /**
     * @param $achievementId
     */
    public function setAchievementId($achievementId)
    {
        $this->achievementId = $achievementId;
    }

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
    public function getCurrentSteps()
    {
        return $this->currentSteps;
    }

    /**
     * @param $currentSteps
     */
    public function setCurrentSteps($currentSteps)
    {
        $this->currentSteps = $currentSteps;
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
    public function getNewlyUnlocked()
    {
        return $this->newlyUnlocked;
    }

    /**
     * @param $newlyUnlocked
     */
    public function setNewlyUnlocked($newlyUnlocked)
    {
        $this->newlyUnlocked = $newlyUnlocked;
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
 * Class Google_Service_Games_AggregateStats
 */
class Google_Service_Games_AggregateStats extends Google_Model
{
    public $count;
    public $kind;
    public $max;
    public $min;
    public $sum;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
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

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }
}

/**
 * Class Google_Service_Games_AnonymousPlayer
 */
class Google_Service_Games_AnonymousPlayer extends Google_Model
{
    public $avatarImageUrl;
    public $displayName;
    public $kind;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Games_Application
 */
class Google_Service_Games_Application extends Google_Collection
{
    public $achievementCount;
    public $author;
    public $description;
    public $enabledFeatures;
    public $id;
    public $kind;
    public $lastUpdatedTimestamp;
    public $leaderboardCount;
    public $name;
    public $themeColor;
    protected $collection_key = 'instances';
    protected $internal_gapi_mappings = [
        "achievementCount" => "achievement_count",
        "leaderboardCount" => "leaderboard_count",
    ];
    protected $assetsType = 'Google_Service_Games_ImageAsset';
    protected $assetsDataType = 'array';
    protected $categoryType = 'Google_Service_Games_ApplicationCategory';
    protected $categoryDataType = '';
    protected $instancesType = 'Google_Service_Games_Instance';
    protected $instancesDataType = 'array';

    /**
     * @return mixed
     */
    public function getAchievementCount()
    {
        return $this->achievementCount;
    }

    /**
     * @param $achievementCount
     */
    public function setAchievementCount($achievementCount)
    {
        $this->achievementCount = $achievementCount;
    }

    /**
     * @param $assets
     */
    public function setAssets($assets)
    {
        $this->assets = $assets;
    }

    /**
     * @return mixed
     */
    public function getAssets()
    {
        return $this->assets;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param Google_Service_Games_ApplicationCategory $category
     */
    public function setCategory(Google_Service_Games_ApplicationCategory $category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
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
    public function getEnabledFeatures()
    {
        return $this->enabledFeatures;
    }

    /**
     * @param $enabledFeatures
     */
    public function setEnabledFeatures($enabledFeatures)
    {
        $this->enabledFeatures = $enabledFeatures;
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
     * @param $instances
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    }

    /**
     * @return mixed
     */
    public function getInstances()
    {
        return $this->instances;
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
    public function getLastUpdatedTimestamp()
    {
        return $this->lastUpdatedTimestamp;
    }

    /**
     * @param $lastUpdatedTimestamp
     */
    public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
    {
        $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
    }

    /**
     * @return mixed
     */
    public function getLeaderboardCount()
    {
        return $this->leaderboardCount;
    }

    /**
     * @param $leaderboardCount
     */
    public function setLeaderboardCount($leaderboardCount)
    {
        $this->leaderboardCount = $leaderboardCount;
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
    public function getThemeColor()
    {
        return $this->themeColor;
    }

    /**
     * @param $themeColor
     */
    public function setThemeColor($themeColor)
    {
        $this->themeColor = $themeColor;
    }
}

/**
 * Class Google_Service_Games_ApplicationCategory
 */
class Google_Service_Games_ApplicationCategory extends Google_Model
{
    public $kind;
    public $primary;
    public $secondary;
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
    public function getSecondary()
    {
        return $this->secondary;
    }

    /**
     * @param $secondary
     */
    public function setSecondary($secondary)
    {
        $this->secondary = $secondary;
    }
}

/**
 * Class Google_Service_Games_Category
 */
class Google_Service_Games_Category extends Google_Model
{
    public $category;
    public $experiencePoints;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getExperiencePoints()
    {
        return $this->experiencePoints;
    }

    /**
     * @param $experiencePoints
     */
    public function setExperiencePoints($experiencePoints)
    {
        $this->experiencePoints = $experiencePoints;
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
 * Class Google_Service_Games_CategoryListResponse
 */
class Google_Service_Games_CategoryListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Category';
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
 * Class Google_Service_Games_EventBatchRecordFailure
 */
class Google_Service_Games_EventBatchRecordFailure extends Google_Model
{
    public $failureCause;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $rangeType = 'Google_Service_Games_EventPeriodRange';
    protected $rangeDataType = '';

    /**
     * @return mixed
     */
    public function getFailureCause()
    {
        return $this->failureCause;
    }

    /**
     * @param $failureCause
     */
    public function setFailureCause($failureCause)
    {
        $this->failureCause = $failureCause;
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
     * @param Google_Service_Games_EventPeriodRange $range
     */
    public function setRange(Google_Service_Games_EventPeriodRange $range)
    {
        $this->range = $range;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }
}

/**
 * Class Google_Service_Games_EventChild
 */
class Google_Service_Games_EventChild extends Google_Model
{
    public $childId;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChildId()
    {
        return $this->childId;
    }

    /**
     * @param $childId
     */
    public function setChildId($childId)
    {
        $this->childId = $childId;
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
 * Class Google_Service_Games_EventDefinition
 */
class Google_Service_Games_EventDefinition extends Google_Collection
{
    public $description;
    public $displayName;
    public $id;
    public $imageUrl;
    public $isDefaultImageUrl;
    public $kind;
    public $visibility;
    protected $collection_key = 'childEvents';
    protected $internal_gapi_mappings = [];
    protected $childEventsType = 'Google_Service_Games_EventChild';
    protected $childEventsDataType = 'array';

    /**
     * @param $childEvents
     */
    public function setChildEvents($childEvents)
    {
        $this->childEvents = $childEvents;
    }

    /**
     * @return mixed
     */
    public function getChildEvents()
    {
        return $this->childEvents;
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
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getIsDefaultImageUrl()
    {
        return $this->isDefaultImageUrl;
    }

    /**
     * @param $isDefaultImageUrl
     */
    public function setIsDefaultImageUrl($isDefaultImageUrl)
    {
        $this->isDefaultImageUrl = $isDefaultImageUrl;
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
 * Class Google_Service_Games_EventDefinitionListResponse
 */
class Google_Service_Games_EventDefinitionListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_EventDefinition';
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
 * Class Google_Service_Games_EventPeriodRange
 */
class Google_Service_Games_EventPeriodRange extends Google_Model
{
    public $kind;
    public $periodEndMillis;
    public $periodStartMillis;
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
    public function getPeriodEndMillis()
    {
        return $this->periodEndMillis;
    }

    /**
     * @param $periodEndMillis
     */
    public function setPeriodEndMillis($periodEndMillis)
    {
        $this->periodEndMillis = $periodEndMillis;
    }

    /**
     * @return mixed
     */
    public function getPeriodStartMillis()
    {
        return $this->periodStartMillis;
    }

    /**
     * @param $periodStartMillis
     */
    public function setPeriodStartMillis($periodStartMillis)
    {
        $this->periodStartMillis = $periodStartMillis;
    }
}

/**
 * Class Google_Service_Games_EventPeriodUpdate
 */
class Google_Service_Games_EventPeriodUpdate extends Google_Collection
{
    public $kind;
    protected $collection_key = 'updates';
    protected $internal_gapi_mappings = [];
    protected $timePeriodType = 'Google_Service_Games_EventPeriodRange';
    protected $timePeriodDataType = '';
    protected $updatesType = 'Google_Service_Games_EventUpdateRequest';
    protected $updatesDataType = 'array';

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
     * @param Google_Service_Games_EventPeriodRange $timePeriod
     */
    public function setTimePeriod(Google_Service_Games_EventPeriodRange $timePeriod)
    {
        $this->timePeriod = $timePeriod;
    }

    /**
     * @return mixed
     */
    public function getTimePeriod()
    {
        return $this->timePeriod;
    }

    /**
     * @param $updates
     */
    public function setUpdates($updates)
    {
        $this->updates = $updates;
    }

    /**
     * @return mixed
     */
    public function getUpdates()
    {
        return $this->updates;
    }
}

/**
 * Class Google_Service_Games_EventRecordFailure
 */
class Google_Service_Games_EventRecordFailure extends Google_Model
{
    public $eventId;
    public $failureCause;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param $eventId
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @return mixed
     */
    public function getFailureCause()
    {
        return $this->failureCause;
    }

    /**
     * @param $failureCause
     */
    public function setFailureCause($failureCause)
    {
        $this->failureCause = $failureCause;
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
 * Class Google_Service_Games_EventRecordRequest
 */
class Google_Service_Games_EventRecordRequest extends Google_Collection
{
    public $currentTimeMillis;
    public $kind;
    public $requestId;
    protected $collection_key = 'timePeriods';
    protected $internal_gapi_mappings = [];
    protected $timePeriodsType = 'Google_Service_Games_EventPeriodUpdate';
    protected $timePeriodsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCurrentTimeMillis()
    {
        return $this->currentTimeMillis;
    }

    /**
     * @param $currentTimeMillis
     */
    public function setCurrentTimeMillis($currentTimeMillis)
    {
        $this->currentTimeMillis = $currentTimeMillis;
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
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @param $timePeriods
     */
    public function setTimePeriods($timePeriods)
    {
        $this->timePeriods = $timePeriods;
    }

    /**
     * @return mixed
     */
    public function getTimePeriods()
    {
        return $this->timePeriods;
    }
}

/**
 * Class Google_Service_Games_EventUpdateRequest
 */
class Google_Service_Games_EventUpdateRequest extends Google_Model
{
    public $definitionId;
    public $kind;
    public $updateCount;
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
    public function getUpdateCount()
    {
        return $this->updateCount;
    }

    /**
     * @param $updateCount
     */
    public function setUpdateCount($updateCount)
    {
        $this->updateCount = $updateCount;
    }
}

/**
 * Class Google_Service_Games_EventUpdateResponse
 */
class Google_Service_Games_EventUpdateResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'playerEvents';
    protected $internal_gapi_mappings = [];
    protected $batchFailuresType = 'Google_Service_Games_EventBatchRecordFailure';
    protected $batchFailuresDataType = 'array';
    protected $eventFailuresType = 'Google_Service_Games_EventRecordFailure';
    protected $eventFailuresDataType = 'array';
    protected $playerEventsType = 'Google_Service_Games_PlayerEvent';
    protected $playerEventsDataType = 'array';


    /**
     * @param $batchFailures
     */
    public function setBatchFailures($batchFailures)
    {
        $this->batchFailures = $batchFailures;
    }

    /**
     * @return mixed
     */
    public function getBatchFailures()
    {
        return $this->batchFailures;
    }

    /**
     * @param $eventFailures
     */
    public function setEventFailures($eventFailures)
    {
        $this->eventFailures = $eventFailures;
    }

    /**
     * @return mixed
     */
    public function getEventFailures()
    {
        return $this->eventFailures;
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
     * @param $playerEvents
     */
    public function setPlayerEvents($playerEvents)
    {
        $this->playerEvents = $playerEvents;
    }

    /**
     * @return mixed
     */
    public function getPlayerEvents()
    {
        return $this->playerEvents;
    }
}

/**
 * Class Google_Service_Games_GamesAchievementIncrement
 */
class Google_Service_Games_GamesAchievementIncrement extends Google_Model
{
    public $kind;
    public $requestId;
    public $steps;
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
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return mixed
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * @param $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
    }
}

/**
 * Class Google_Service_Games_GamesAchievementSetStepsAtLeast
 */
class Google_Service_Games_GamesAchievementSetStepsAtLeast extends Google_Model
{
    public $kind;
    public $steps;
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
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * @param $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
    }
}

/**
 * Class Google_Service_Games_ImageAsset
 */
class Google_Service_Games_ImageAsset extends Google_Model
{
    public $height;
    public $kind;
    public $name;
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
 * Class Google_Service_Games_Instance
 */
class Google_Service_Games_Instance extends Google_Model
{
    public $acquisitionUri;
    public $kind;
    public $name;
    public $platformType;
    public $realtimePlay;
    public $turnBasedPlay;
    protected $internal_gapi_mappings = [];
    protected $androidInstanceType = 'Google_Service_Games_InstanceAndroidDetails';
    protected $androidInstanceDataType = '';
    protected $iosInstanceType = 'Google_Service_Games_InstanceIosDetails';
    protected $iosInstanceDataType = '';
    protected $webInstanceType = 'Google_Service_Games_InstanceWebDetails';
    protected $webInstanceDataType = '';

    /**
     * @return mixed
     */
    public function getAcquisitionUri()
    {
        return $this->acquisitionUri;
    }

    /**
     * @param $acquisitionUri
     */
    public function setAcquisitionUri($acquisitionUri)
    {
        $this->acquisitionUri = $acquisitionUri;
    }

    /**
     * @param Google_Service_Games_InstanceAndroidDetails $androidInstance
     */
    public function setAndroidInstance(Google_Service_Games_InstanceAndroidDetails $androidInstance)
    {
        $this->androidInstance = $androidInstance;
    }

    /**
     * @return mixed
     */
    public function getAndroidInstance()
    {
        return $this->androidInstance;
    }

    /**
     * @param Google_Service_Games_InstanceIosDetails $iosInstance
     */
    public function setIosInstance(Google_Service_Games_InstanceIosDetails $iosInstance)
    {
        $this->iosInstance = $iosInstance;
    }

    /**
     * @return mixed
     */
    public function getIosInstance()
    {
        return $this->iosInstance;
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
    public function getPlatformType()
    {
        return $this->platformType;
    }

    /**
     * @param $platformType
     */
    public function setPlatformType($platformType)
    {
        $this->platformType = $platformType;
    }

    /**
     * @return mixed
     */
    public function getRealtimePlay()
    {
        return $this->realtimePlay;
    }

    /**
     * @param $realtimePlay
     */
    public function setRealtimePlay($realtimePlay)
    {
        $this->realtimePlay = $realtimePlay;
    }

    /**
     * @return mixed
     */
    public function getTurnBasedPlay()
    {
        return $this->turnBasedPlay;
    }

    /**
     * @param $turnBasedPlay
     */
    public function setTurnBasedPlay($turnBasedPlay)
    {
        $this->turnBasedPlay = $turnBasedPlay;
    }

    /**
     * @param Google_Service_Games_InstanceWebDetails $webInstance
     */
    public function setWebInstance(Google_Service_Games_InstanceWebDetails $webInstance)
    {
        $this->webInstance = $webInstance;
    }

    /**
     * @return mixed
     */
    public function getWebInstance()
    {
        return $this->webInstance;
    }
}

/**
 * Class Google_Service_Games_InstanceAndroidDetails
 */
class Google_Service_Games_InstanceAndroidDetails extends Google_Model
{
    public $enablePiracyCheck;
    public $kind;
    public $packageName;
    public $preferred;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnablePiracyCheck()
    {
        return $this->enablePiracyCheck;
    }

    /**
     * @param $enablePiracyCheck
     */
    public function setEnablePiracyCheck($enablePiracyCheck)
    {
        $this->enablePiracyCheck = $enablePiracyCheck;
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
    public function getPackageName()
    {
        return $this->packageName;
    }

    /**
     * @param $packageName
     */
    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;
    }

    /**
     * @return mixed
     */
    public function getPreferred()
    {
        return $this->preferred;
    }

    /**
     * @param $preferred
     */
    public function setPreferred($preferred)
    {
        $this->preferred = $preferred;
    }
}

/**
 * Class Google_Service_Games_InstanceIosDetails
 */
class Google_Service_Games_InstanceIosDetails extends Google_Model
{
    public $bundleIdentifier;
    public $itunesAppId;
    public $kind;
    public $preferredForIpad;
    public $preferredForIphone;
    public $supportIpad;
    public $supportIphone;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBundleIdentifier()
    {
        return $this->bundleIdentifier;
    }

    /**
     * @param $bundleIdentifier
     */
    public function setBundleIdentifier($bundleIdentifier)
    {
        $this->bundleIdentifier = $bundleIdentifier;
    }

    /**
     * @return mixed
     */
    public function getItunesAppId()
    {
        return $this->itunesAppId;
    }

    /**
     * @param $itunesAppId
     */
    public function setItunesAppId($itunesAppId)
    {
        $this->itunesAppId = $itunesAppId;
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
    public function getPreferredForIpad()
    {
        return $this->preferredForIpad;
    }

    /**
     * @param $preferredForIpad
     */
    public function setPreferredForIpad($preferredForIpad)
    {
        $this->preferredForIpad = $preferredForIpad;
    }

    /**
     * @return mixed
     */
    public function getPreferredForIphone()
    {
        return $this->preferredForIphone;
    }

    /**
     * @param $preferredForIphone
     */
    public function setPreferredForIphone($preferredForIphone)
    {
        $this->preferredForIphone = $preferredForIphone;
    }

    /**
     * @return mixed
     */
    public function getSupportIpad()
    {
        return $this->supportIpad;
    }

    /**
     * @param $supportIpad
     */
    public function setSupportIpad($supportIpad)
    {
        $this->supportIpad = $supportIpad;
    }

    /**
     * @return mixed
     */
    public function getSupportIphone()
    {
        return $this->supportIphone;
    }

    /**
     * @param $supportIphone
     */
    public function setSupportIphone($supportIphone)
    {
        $this->supportIphone = $supportIphone;
    }
}

/**
 * Class Google_Service_Games_InstanceWebDetails
 */
class Google_Service_Games_InstanceWebDetails extends Google_Model
{
    public $kind;
    public $launchUrl;
    public $preferred;
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
    public function getLaunchUrl()
    {
        return $this->launchUrl;
    }

    /**
     * @param $launchUrl
     */
    public function setLaunchUrl($launchUrl)
    {
        $this->launchUrl = $launchUrl;
    }

    /**
     * @return mixed
     */
    public function getPreferred()
    {
        return $this->preferred;
    }

    /**
     * @param $preferred
     */
    public function setPreferred($preferred)
    {
        $this->preferred = $preferred;
    }
}

/**
 * Class Google_Service_Games_Leaderboard
 */
class Google_Service_Games_Leaderboard extends Google_Model
{
    public $iconUrl;
    public $id;
    public $isIconUrlDefault;
    public $kind;
    public $name;
    public $order;
    protected $internal_gapi_mappings = [];

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
    public function getIsIconUrlDefault()
    {
        return $this->isIconUrlDefault;
    }

    /**
     * @param $isIconUrlDefault
     */
    public function setIsIconUrlDefault($isIconUrlDefault)
    {
        $this->isIconUrlDefault = $isIconUrlDefault;
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
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}

/**
 * Class Google_Service_Games_LeaderboardEntry
 */
class Google_Service_Games_LeaderboardEntry extends Google_Model
{
    public $formattedScore;
    public $formattedScoreRank;
    public $kind;
    public $scoreRank;
    public $scoreTag;
    public $scoreValue;
    public $timeSpan;
    public $writeTimestampMillis;
    protected $internal_gapi_mappings = [];
    protected $playerType = 'Google_Service_Games_Player';
    protected $playerDataType = '';

    /**
     * @return mixed
     */
    public function getFormattedScore()
    {
        return $this->formattedScore;
    }

    /**
     * @param $formattedScore
     */
    public function setFormattedScore($formattedScore)
    {
        $this->formattedScore = $formattedScore;
    }

    /**
     * @return mixed
     */
    public function getFormattedScoreRank()
    {
        return $this->formattedScoreRank;
    }

    /**
     * @param $formattedScoreRank
     */
    public function setFormattedScoreRank($formattedScoreRank)
    {
        $this->formattedScoreRank = $formattedScoreRank;
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
     * @param Google_Service_Games_Player $player
     */
    public function setPlayer(Google_Service_Games_Player $player)
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

    /**
     * @return mixed
     */
    public function getScoreRank()
    {
        return $this->scoreRank;
    }

    /**
     * @param $scoreRank
     */
    public function setScoreRank($scoreRank)
    {
        $this->scoreRank = $scoreRank;
    }

    /**
     * @return mixed
     */
    public function getScoreTag()
    {
        return $this->scoreTag;
    }

    /**
     * @param $scoreTag
     */
    public function setScoreTag($scoreTag)
    {
        $this->scoreTag = $scoreTag;
    }

    /**
     * @return mixed
     */
    public function getScoreValue()
    {
        return $this->scoreValue;
    }

    /**
     * @param $scoreValue
     */
    public function setScoreValue($scoreValue)
    {
        $this->scoreValue = $scoreValue;
    }

    /**
     * @return mixed
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * @param $timeSpan
     */
    public function setTimeSpan($timeSpan)
    {
        $this->timeSpan = $timeSpan;
    }

    /**
     * @return mixed
     */
    public function getWriteTimestampMillis()
    {
        return $this->writeTimestampMillis;
    }

    /**
     * @param $writeTimestampMillis
     */
    public function setWriteTimestampMillis($writeTimestampMillis)
    {
        $this->writeTimestampMillis = $writeTimestampMillis;
    }
}

/**
 * Class Google_Service_Games_LeaderboardListResponse
 */
class Google_Service_Games_LeaderboardListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Leaderboard';
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
 * Class Google_Service_Games_LeaderboardScoreRank
 */
class Google_Service_Games_LeaderboardScoreRank extends Google_Model
{
    public $formattedNumScores;
    public $formattedRank;
    public $kind;
    public $numScores;
    public $rank;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormattedNumScores()
    {
        return $this->formattedNumScores;
    }

    /**
     * @param $formattedNumScores
     */
    public function setFormattedNumScores($formattedNumScores)
    {
        $this->formattedNumScores = $formattedNumScores;
    }

    /**
     * @return mixed
     */
    public function getFormattedRank()
    {
        return $this->formattedRank;
    }

    /**
     * @param $formattedRank
     */
    public function setFormattedRank($formattedRank)
    {
        $this->formattedRank = $formattedRank;
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
    public function getNumScores()
    {
        return $this->numScores;
    }

    /**
     * @param $numScores
     */
    public function setNumScores($numScores)
    {
        $this->numScores = $numScores;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }
}

/**
 * Class Google_Service_Games_LeaderboardScores
 */
class Google_Service_Games_LeaderboardScores extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $numScores;
    public $prevPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_LeaderboardEntry';
    protected $itemsDataType = 'array';
    protected $playerScoreType = 'Google_Service_Games_LeaderboardEntry';
    protected $playerScoreDataType = '';

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
    public function getNumScores()
    {
        return $this->numScores;
    }

    /**
     * @param $numScores
     */
    public function setNumScores($numScores)
    {
        $this->numScores = $numScores;
    }

    /**
     * @param Google_Service_Games_LeaderboardEntry $playerScore
     */
    public function setPlayerScore(Google_Service_Games_LeaderboardEntry $playerScore)
    {
        $this->playerScore = $playerScore;
    }

    /**
     * @return mixed
     */
    public function getPlayerScore()
    {
        return $this->playerScore;
    }

    /**
     * @return mixed
     */
    public function getPrevPageToken()
    {
        return $this->prevPageToken;
    }

    /**
     * @param $prevPageToken
     */
    public function setPrevPageToken($prevPageToken)
    {
        $this->prevPageToken = $prevPageToken;
    }
}

/**
 * Class Google_Service_Games_MetagameConfig
 */
class Google_Service_Games_MetagameConfig extends Google_Collection
{
    public $currentVersion;
    public $kind;
    protected $collection_key = 'playerLevels';
    protected $internal_gapi_mappings = [];
    protected $playerLevelsType = 'Google_Service_Games_PlayerLevel';
    protected $playerLevelsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }

    /**
     * @param $currentVersion
     */
    public function setCurrentVersion($currentVersion)
    {
        $this->currentVersion = $currentVersion;
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
     * @param $playerLevels
     */
    public function setPlayerLevels($playerLevels)
    {
        $this->playerLevels = $playerLevels;
    }

    /**
     * @return mixed
     */
    public function getPlayerLevels()
    {
        return $this->playerLevels;
    }
}

/**
 * Class Google_Service_Games_NetworkDiagnostics
 */
class Google_Service_Games_NetworkDiagnostics extends Google_Model
{
    public $androidNetworkSubtype;
    public $androidNetworkType;
    public $iosNetworkType;
    public $kind;
    public $networkOperatorCode;
    public $networkOperatorName;
    public $registrationLatencyMillis;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAndroidNetworkSubtype()
    {
        return $this->androidNetworkSubtype;
    }

    /**
     * @param $androidNetworkSubtype
     */
    public function setAndroidNetworkSubtype($androidNetworkSubtype)
    {
        $this->androidNetworkSubtype = $androidNetworkSubtype;
    }

    /**
     * @return mixed
     */
    public function getAndroidNetworkType()
    {
        return $this->androidNetworkType;
    }

    /**
     * @param $androidNetworkType
     */
    public function setAndroidNetworkType($androidNetworkType)
    {
        $this->androidNetworkType = $androidNetworkType;
    }

    /**
     * @return mixed
     */
    public function getIosNetworkType()
    {
        return $this->iosNetworkType;
    }

    /**
     * @param $iosNetworkType
     */
    public function setIosNetworkType($iosNetworkType)
    {
        $this->iosNetworkType = $iosNetworkType;
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
    public function getNetworkOperatorCode()
    {
        return $this->networkOperatorCode;
    }

    /**
     * @param $networkOperatorCode
     */
    public function setNetworkOperatorCode($networkOperatorCode)
    {
        $this->networkOperatorCode = $networkOperatorCode;
    }

    /**
     * @return mixed
     */
    public function getNetworkOperatorName()
    {
        return $this->networkOperatorName;
    }

    /**
     * @param $networkOperatorName
     */
    public function setNetworkOperatorName($networkOperatorName)
    {
        $this->networkOperatorName = $networkOperatorName;
    }

    /**
     * @return mixed
     */
    public function getRegistrationLatencyMillis()
    {
        return $this->registrationLatencyMillis;
    }

    /**
     * @param $registrationLatencyMillis
     */
    public function setRegistrationLatencyMillis($registrationLatencyMillis)
    {
        $this->registrationLatencyMillis = $registrationLatencyMillis;
    }
}

/**
 * Class Google_Service_Games_ParticipantResult
 */
class Google_Service_Games_ParticipantResult extends Google_Model
{
    public $kind;
    public $participantId;
    public $placing;
    public $result;
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
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * @param $participantId
     */
    public function setParticipantId($participantId)
    {
        $this->participantId = $participantId;
    }

    /**
     * @return mixed
     */
    public function getPlacing()
    {
        return $this->placing;
    }

    /**
     * @param $placing
     */
    public function setPlacing($placing)
    {
        $this->placing = $placing;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
}

/**
 * Class Google_Service_Games_PeerChannelDiagnostics
 */
class Google_Service_Games_PeerChannelDiagnostics extends Google_Model
{
    public $kind;
    public $numMessagesLost;
    public $numMessagesReceived;
    public $numMessagesSent;
    public $numSendFailures;
    protected $internal_gapi_mappings = [];
    protected $bytesReceivedType = 'Google_Service_Games_AggregateStats';
    protected $bytesReceivedDataType = '';
    protected $bytesSentType = 'Google_Service_Games_AggregateStats';
    protected $bytesSentDataType = '';
    protected $roundtripLatencyMillisType = 'Google_Service_Games_AggregateStats';
    protected $roundtripLatencyMillisDataType = '';


    /**
     * @param Google_Service_Games_AggregateStats $bytesReceived
     */
    public function setBytesReceived(Google_Service_Games_AggregateStats $bytesReceived)
    {
        $this->bytesReceived = $bytesReceived;
    }

    /**
     * @return mixed
     */
    public function getBytesReceived()
    {
        return $this->bytesReceived;
    }

    /**
     * @param Google_Service_Games_AggregateStats $bytesSent
     */
    public function setBytesSent(Google_Service_Games_AggregateStats $bytesSent)
    {
        $this->bytesSent = $bytesSent;
    }

    /**
     * @return mixed
     */
    public function getBytesSent()
    {
        return $this->bytesSent;
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
    public function getNumMessagesLost()
    {
        return $this->numMessagesLost;
    }

    /**
     * @param $numMessagesLost
     */
    public function setNumMessagesLost($numMessagesLost)
    {
        $this->numMessagesLost = $numMessagesLost;
    }

    /**
     * @return mixed
     */
    public function getNumMessagesReceived()
    {
        return $this->numMessagesReceived;
    }

    /**
     * @param $numMessagesReceived
     */
    public function setNumMessagesReceived($numMessagesReceived)
    {
        $this->numMessagesReceived = $numMessagesReceived;
    }

    /**
     * @return mixed
     */
    public function getNumMessagesSent()
    {
        return $this->numMessagesSent;
    }

    /**
     * @param $numMessagesSent
     */
    public function setNumMessagesSent($numMessagesSent)
    {
        $this->numMessagesSent = $numMessagesSent;
    }

    /**
     * @return mixed
     */
    public function getNumSendFailures()
    {
        return $this->numSendFailures;
    }

    /**
     * @param $numSendFailures
     */
    public function setNumSendFailures($numSendFailures)
    {
        $this->numSendFailures = $numSendFailures;
    }

    /**
     * @param Google_Service_Games_AggregateStats $roundtripLatencyMillis
     */
    public function setRoundtripLatencyMillis(Google_Service_Games_AggregateStats $roundtripLatencyMillis)
    {
        $this->roundtripLatencyMillis = $roundtripLatencyMillis;
    }

    /**
     * @return mixed
     */
    public function getRoundtripLatencyMillis()
    {
        return $this->roundtripLatencyMillis;
    }
}

/**
 * Class Google_Service_Games_PeerSessionDiagnostics
 */
class Google_Service_Games_PeerSessionDiagnostics extends Google_Model
{
    public $connectedTimestampMillis;
    public $kind;
    public $participantId;
    protected $internal_gapi_mappings = [];
    protected $reliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
    protected $reliableChannelDataType = '';
    protected $unreliableChannelType = 'Google_Service_Games_PeerChannelDiagnostics';
    protected $unreliableChannelDataType = '';

    /**
     * @return mixed
     */
    public function getConnectedTimestampMillis()
    {
        return $this->connectedTimestampMillis;
    }

    /**
     * @param $connectedTimestampMillis
     */
    public function setConnectedTimestampMillis($connectedTimestampMillis)
    {
        $this->connectedTimestampMillis = $connectedTimestampMillis;
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
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * @param $participantId
     */
    public function setParticipantId($participantId)
    {
        $this->participantId = $participantId;
    }

    /**
     * @param Google_Service_Games_PeerChannelDiagnostics $reliableChannel
     */
    public function setReliableChannel(Google_Service_Games_PeerChannelDiagnostics $reliableChannel)
    {
        $this->reliableChannel = $reliableChannel;
    }

    /**
     * @return mixed
     */
    public function getReliableChannel()
    {
        return $this->reliableChannel;
    }

    /**
     * @param Google_Service_Games_PeerChannelDiagnostics $unreliableChannel
     */
    public function setUnreliableChannel(Google_Service_Games_PeerChannelDiagnostics $unreliableChannel)
    {
        $this->unreliableChannel = $unreliableChannel;
    }

    /**
     * @return mixed
     */
    public function getUnreliableChannel()
    {
        return $this->unreliableChannel;
    }
}

/**
 * Class Google_Service_Games_Played
 */
class Google_Service_Games_Played extends Google_Model
{
    public $autoMatched;
    public $kind;
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
 * Class Google_Service_Games_Player
 */
class Google_Service_Games_Player extends Google_Model
{
    public $avatarImageUrl;
    public $displayName;
    public $kind;
    public $playerId;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $experienceInfoType = 'Google_Service_Games_PlayerExperienceInfo';
    protected $experienceInfoDataType = '';
    protected $lastPlayedWithType = 'Google_Service_Games_Played';
    protected $lastPlayedWithDataType = '';
    protected $nameType = 'Google_Service_Games_PlayerName';
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
     * @param Google_Service_Games_PlayerExperienceInfo $experienceInfo
     */
    public function setExperienceInfo(Google_Service_Games_PlayerExperienceInfo $experienceInfo)
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
     * @param Google_Service_Games_Played $lastPlayedWith
     */
    public function setLastPlayedWith(Google_Service_Games_Played $lastPlayedWith)
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
     * @param Google_Service_Games_PlayerName $name
     */
    public function setName(Google_Service_Games_PlayerName $name)
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
 * Class Google_Service_Games_PlayerAchievement
 */
class Google_Service_Games_PlayerAchievement extends Google_Model
{
    public $achievementState;
    public $currentSteps;
    public $experiencePoints;
    public $formattedCurrentStepsString;
    public $id;
    public $kind;
    public $lastUpdatedTimestamp;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAchievementState()
    {
        return $this->achievementState;
    }

    /**
     * @param $achievementState
     */
    public function setAchievementState($achievementState)
    {
        $this->achievementState = $achievementState;
    }

    /**
     * @return mixed
     */
    public function getCurrentSteps()
    {
        return $this->currentSteps;
    }

    /**
     * @param $currentSteps
     */
    public function setCurrentSteps($currentSteps)
    {
        $this->currentSteps = $currentSteps;
    }

    /**
     * @return mixed
     */
    public function getExperiencePoints()
    {
        return $this->experiencePoints;
    }

    /**
     * @param $experiencePoints
     */
    public function setExperiencePoints($experiencePoints)
    {
        $this->experiencePoints = $experiencePoints;
    }

    /**
     * @return mixed
     */
    public function getFormattedCurrentStepsString()
    {
        return $this->formattedCurrentStepsString;
    }

    /**
     * @param $formattedCurrentStepsString
     */
    public function setFormattedCurrentStepsString($formattedCurrentStepsString)
    {
        $this->formattedCurrentStepsString = $formattedCurrentStepsString;
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
    public function getLastUpdatedTimestamp()
    {
        return $this->lastUpdatedTimestamp;
    }

    /**
     * @param $lastUpdatedTimestamp
     */
    public function setLastUpdatedTimestamp($lastUpdatedTimestamp)
    {
        $this->lastUpdatedTimestamp = $lastUpdatedTimestamp;
    }
}

/**
 * Class Google_Service_Games_PlayerAchievementListResponse
 */
class Google_Service_Games_PlayerAchievementListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_PlayerAchievement';
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
 * Class Google_Service_Games_PlayerEvent
 */
class Google_Service_Games_PlayerEvent extends Google_Model
{
    public $definitionId;
    public $formattedNumEvents;
    public $kind;
    public $numEvents;
    public $playerId;
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
    public function getFormattedNumEvents()
    {
        return $this->formattedNumEvents;
    }

    /**
     * @param $formattedNumEvents
     */
    public function setFormattedNumEvents($formattedNumEvents)
    {
        $this->formattedNumEvents = $formattedNumEvents;
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
    public function getNumEvents()
    {
        return $this->numEvents;
    }

    /**
     * @param $numEvents
     */
    public function setNumEvents($numEvents)
    {
        $this->numEvents = $numEvents;
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
}

/**
 * Class Google_Service_Games_PlayerEventListResponse
 */
class Google_Service_Games_PlayerEventListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_PlayerEvent';
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
 * Class Google_Service_Games_PlayerExperienceInfo
 */
class Google_Service_Games_PlayerExperienceInfo extends Google_Model
{
    public $currentExperiencePoints;
    public $kind;
    public $lastLevelUpTimestampMillis;
    protected $internal_gapi_mappings = [];
    protected $currentLevelType = 'Google_Service_Games_PlayerLevel';
    protected $currentLevelDataType = '';
    protected $nextLevelType = 'Google_Service_Games_PlayerLevel';
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
     * @param Google_Service_Games_PlayerLevel $currentLevel
     */
    public function setCurrentLevel(Google_Service_Games_PlayerLevel $currentLevel)
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
     * @param Google_Service_Games_PlayerLevel $nextLevel
     */
    public function setNextLevel(Google_Service_Games_PlayerLevel $nextLevel)
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
 * Class Google_Service_Games_PlayerLeaderboardScore
 */
class Google_Service_Games_PlayerLeaderboardScore extends Google_Model
{
    public $kind;
    public $leaderboardId;
    public $scoreString;
    public $scoreTag;
    public $scoreValue;
    public $timeSpan;
    public $writeTimestamp;
    protected $internal_gapi_mappings = [
        "leaderboardId" => "leaderboard_id",
    ];
    protected $publicRankType = 'Google_Service_Games_LeaderboardScoreRank';
    protected $publicRankDataType = '';
    protected $socialRankType = 'Google_Service_Games_LeaderboardScoreRank';
    protected $socialRankDataType = '';

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
    public function getLeaderboardId()
    {
        return $this->leaderboardId;
    }

    /**
     * @param $leaderboardId
     */
    public function setLeaderboardId($leaderboardId)
    {
        $this->leaderboardId = $leaderboardId;
    }

    /**
     * @param Google_Service_Games_LeaderboardScoreRank $publicRank
     */
    public function setPublicRank(Google_Service_Games_LeaderboardScoreRank $publicRank)
    {
        $this->publicRank = $publicRank;
    }

    /**
     * @return mixed
     */
    public function getPublicRank()
    {
        return $this->publicRank;
    }

    /**
     * @return mixed
     */
    public function getScoreString()
    {
        return $this->scoreString;
    }

    /**
     * @param $scoreString
     */
    public function setScoreString($scoreString)
    {
        $this->scoreString = $scoreString;
    }

    /**
     * @return mixed
     */
    public function getScoreTag()
    {
        return $this->scoreTag;
    }

    /**
     * @param $scoreTag
     */
    public function setScoreTag($scoreTag)
    {
        $this->scoreTag = $scoreTag;
    }

    /**
     * @return mixed
     */
    public function getScoreValue()
    {
        return $this->scoreValue;
    }

    /**
     * @param $scoreValue
     */
    public function setScoreValue($scoreValue)
    {
        $this->scoreValue = $scoreValue;
    }

    /**
     * @param Google_Service_Games_LeaderboardScoreRank $socialRank
     */
    public function setSocialRank(Google_Service_Games_LeaderboardScoreRank $socialRank)
    {
        $this->socialRank = $socialRank;
    }

    /**
     * @return mixed
     */
    public function getSocialRank()
    {
        return $this->socialRank;
    }

    /**
     * @return mixed
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * @param $timeSpan
     */
    public function setTimeSpan($timeSpan)
    {
        $this->timeSpan = $timeSpan;
    }

    /**
     * @return mixed
     */
    public function getWriteTimestamp()
    {
        return $this->writeTimestamp;
    }

    /**
     * @param $writeTimestamp
     */
    public function setWriteTimestamp($writeTimestamp)
    {
        $this->writeTimestamp = $writeTimestamp;
    }
}

/**
 * Class Google_Service_Games_PlayerLeaderboardScoreListResponse
 */
class Google_Service_Games_PlayerLeaderboardScoreListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_PlayerLeaderboardScore';
    protected $itemsDataType = 'array';
    protected $playerType = 'Google_Service_Games_Player';
    protected $playerDataType = '';


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
     * @param Google_Service_Games_Player $player
     */
    public function setPlayer(Google_Service_Games_Player $player)
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
 * Class Google_Service_Games_PlayerLevel
 */
class Google_Service_Games_PlayerLevel extends Google_Model
{
    public $kind;
    public $level;
    public $maxExperiencePoints;
    public $minExperiencePoints;
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
 * Class Google_Service_Games_PlayerListResponse
 */
class Google_Service_Games_PlayerListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Player';
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
 * Class Google_Service_Games_PlayerName
 */
class Google_Service_Games_PlayerName extends Google_Model
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
 * Class Google_Service_Games_PlayerScore
 */
class Google_Service_Games_PlayerScore extends Google_Model
{
    public $formattedScore;
    public $kind;
    public $score;
    public $scoreTag;
    public $timeSpan;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormattedScore()
    {
        return $this->formattedScore;
    }

    /**
     * @param $formattedScore
     */
    public function setFormattedScore($formattedScore)
    {
        $this->formattedScore = $formattedScore;
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
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScoreTag()
    {
        return $this->scoreTag;
    }

    /**
     * @param $scoreTag
     */
    public function setScoreTag($scoreTag)
    {
        $this->scoreTag = $scoreTag;
    }

    /**
     * @return mixed
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * @param $timeSpan
     */
    public function setTimeSpan($timeSpan)
    {
        $this->timeSpan = $timeSpan;
    }
}

/**
 * Class Google_Service_Games_PlayerScoreListResponse
 */
class Google_Service_Games_PlayerScoreListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'submittedScores';
    protected $internal_gapi_mappings = [];
    protected $submittedScoresType = 'Google_Service_Games_PlayerScoreResponse';
    protected $submittedScoresDataType = 'array';

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
     * @param $submittedScores
     */
    public function setSubmittedScores($submittedScores)
    {
        $this->submittedScores = $submittedScores;
    }

    /**
     * @return mixed
     */
    public function getSubmittedScores()
    {
        return $this->submittedScores;
    }
}

/**
 * Class Google_Service_Games_PlayerScoreResponse
 */
class Google_Service_Games_PlayerScoreResponse extends Google_Collection
{
    public $beatenScoreTimeSpans;
    public $formattedScore;
    public $kind;
    public $leaderboardId;
    public $scoreTag;
    protected $collection_key = 'unbeatenScores';
    protected $internal_gapi_mappings = [];
    protected $unbeatenScoresType = 'Google_Service_Games_PlayerScore';
    protected $unbeatenScoresDataType = 'array';

    /**
     * @return mixed
     */
    public function getBeatenScoreTimeSpans()
    {
        return $this->beatenScoreTimeSpans;
    }

    /**
     * @param $beatenScoreTimeSpans
     */
    public function setBeatenScoreTimeSpans($beatenScoreTimeSpans)
    {
        $this->beatenScoreTimeSpans = $beatenScoreTimeSpans;
    }

    /**
     * @return mixed
     */
    public function getFormattedScore()
    {
        return $this->formattedScore;
    }

    /**
     * @param $formattedScore
     */
    public function setFormattedScore($formattedScore)
    {
        $this->formattedScore = $formattedScore;
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
    public function getLeaderboardId()
    {
        return $this->leaderboardId;
    }

    /**
     * @param $leaderboardId
     */
    public function setLeaderboardId($leaderboardId)
    {
        $this->leaderboardId = $leaderboardId;
    }

    /**
     * @return mixed
     */
    public function getScoreTag()
    {
        return $this->scoreTag;
    }

    /**
     * @param $scoreTag
     */
    public function setScoreTag($scoreTag)
    {
        $this->scoreTag = $scoreTag;
    }

    /**
     * @param $unbeatenScores
     */
    public function setUnbeatenScores($unbeatenScores)
    {
        $this->unbeatenScores = $unbeatenScores;
    }

    /**
     * @return mixed
     */
    public function getUnbeatenScores()
    {
        return $this->unbeatenScores;
    }
}

/**
 * Class Google_Service_Games_PlayerScoreSubmissionList
 */
class Google_Service_Games_PlayerScoreSubmissionList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'scores';
    protected $internal_gapi_mappings = [];
    protected $scoresType = 'Google_Service_Games_ScoreSubmission';
    protected $scoresDataType = 'array';

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
     * @param $scores
     */
    public function setScores($scores)
    {
        $this->scores = $scores;
    }

    /**
     * @return mixed
     */
    public function getScores()
    {
        return $this->scores;
    }
}

/**
 * Class Google_Service_Games_PushToken
 */
class Google_Service_Games_PushToken extends Google_Model
{
    public $clientRevision;
    public $kind;
    public $language;
    protected $internal_gapi_mappings = [];
    protected $idType = 'Google_Service_Games_PushTokenId';
    protected $idDataType = '';

    /**
     * @return mixed
     */
    public function getClientRevision()
    {
        return $this->clientRevision;
    }

    /**
     * @param $clientRevision
     */
    public function setClientRevision($clientRevision)
    {
        $this->clientRevision = $clientRevision;
    }

    /**
     * @param Google_Service_Games_PushTokenId $id
     */
    public function setId(Google_Service_Games_PushTokenId $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
}

/**
 * Class Google_Service_Games_PushTokenId
 */
class Google_Service_Games_PushTokenId extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $iosType = 'Google_Service_Games_PushTokenIdIos';
    protected $iosDataType = '';

    /**
     * @param Google_Service_Games_PushTokenIdIos $ios
     */
    public function setIos(Google_Service_Games_PushTokenIdIos $ios)
    {
        $this->ios = $ios;
    }

    /**
     * @return mixed
     */
    public function getIos()
    {
        return $this->ios;
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
 * Class Google_Service_Games_PushTokenIdIos
 */
class Google_Service_Games_PushTokenIdIos extends Google_Model
{
    public $apnsDeviceToken;
    public $apnsEnvironment;
    protected $internal_gapi_mappings = [
        "apnsDeviceToken" => "apns_device_token",
        "apnsEnvironment" => "apns_environment",
    ];

    /**
     * @return mixed
     */
    public function getApnsDeviceToken()
    {
        return $this->apnsDeviceToken;
    }

    /**
     * @param $apnsDeviceToken
     */
    public function setApnsDeviceToken($apnsDeviceToken)
    {
        $this->apnsDeviceToken = $apnsDeviceToken;
    }

    /**
     * @return mixed
     */
    public function getApnsEnvironment()
    {
        return $this->apnsEnvironment;
    }

    /**
     * @param $apnsEnvironment
     */
    public function setApnsEnvironment($apnsEnvironment)
    {
        $this->apnsEnvironment = $apnsEnvironment;
    }
}

/**
 * Class Google_Service_Games_Quest
 */
class Google_Service_Games_Quest extends Google_Collection
{
    public $acceptedTimestampMillis;
    public $applicationId;
    public $bannerUrl;
    public $description;
    public $endTimestampMillis;
    public $iconUrl;
    public $id;
    public $isDefaultBannerUrl;
    public $isDefaultIconUrl;
    public $kind;
    public $lastUpdatedTimestampMillis;
    public $name;
    public $notifyTimestampMillis;
    public $startTimestampMillis;
    public $state;
    protected $collection_key = 'milestones';
    protected $internal_gapi_mappings = [];
    protected $milestonesType = 'Google_Service_Games_QuestMilestone';
    protected $milestonesDataType = 'array';

    /**
     * @return mixed
     */
    public function getAcceptedTimestampMillis()
    {
        return $this->acceptedTimestampMillis;
    }

    /**
     * @param $acceptedTimestampMillis
     */
    public function setAcceptedTimestampMillis($acceptedTimestampMillis)
    {
        $this->acceptedTimestampMillis = $acceptedTimestampMillis;
    }

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @return mixed
     */
    public function getBannerUrl()
    {
        return $this->bannerUrl;
    }

    /**
     * @param $bannerUrl
     */
    public function setBannerUrl($bannerUrl)
    {
        $this->bannerUrl = $bannerUrl;
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
    public function getEndTimestampMillis()
    {
        return $this->endTimestampMillis;
    }

    /**
     * @param $endTimestampMillis
     */
    public function setEndTimestampMillis($endTimestampMillis)
    {
        $this->endTimestampMillis = $endTimestampMillis;
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
    public function getIsDefaultBannerUrl()
    {
        return $this->isDefaultBannerUrl;
    }

    /**
     * @param $isDefaultBannerUrl
     */
    public function setIsDefaultBannerUrl($isDefaultBannerUrl)
    {
        $this->isDefaultBannerUrl = $isDefaultBannerUrl;
    }

    /**
     * @return mixed
     */
    public function getIsDefaultIconUrl()
    {
        return $this->isDefaultIconUrl;
    }

    /**
     * @param $isDefaultIconUrl
     */
    public function setIsDefaultIconUrl($isDefaultIconUrl)
    {
        $this->isDefaultIconUrl = $isDefaultIconUrl;
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
    public function getLastUpdatedTimestampMillis()
    {
        return $this->lastUpdatedTimestampMillis;
    }

    /**
     * @param $lastUpdatedTimestampMillis
     */
    public function setLastUpdatedTimestampMillis($lastUpdatedTimestampMillis)
    {
        $this->lastUpdatedTimestampMillis = $lastUpdatedTimestampMillis;
    }

    /**
     * @param $milestones
     */
    public function setMilestones($milestones)
    {
        $this->milestones = $milestones;
    }

    /**
     * @return mixed
     */
    public function getMilestones()
    {
        return $this->milestones;
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
    public function getNotifyTimestampMillis()
    {
        return $this->notifyTimestampMillis;
    }

    /**
     * @param $notifyTimestampMillis
     */
    public function setNotifyTimestampMillis($notifyTimestampMillis)
    {
        $this->notifyTimestampMillis = $notifyTimestampMillis;
    }

    /**
     * @return mixed
     */
    public function getStartTimestampMillis()
    {
        return $this->startTimestampMillis;
    }

    /**
     * @param $startTimestampMillis
     */
    public function setStartTimestampMillis($startTimestampMillis)
    {
        $this->startTimestampMillis = $startTimestampMillis;
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
 * Class Google_Service_Games_QuestContribution
 */
class Google_Service_Games_QuestContribution extends Google_Model
{
    public $formattedValue;
    public $kind;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormattedValue()
    {
        return $this->formattedValue;
    }

    /**
     * @param $formattedValue
     */
    public function setFormattedValue($formattedValue)
    {
        $this->formattedValue = $formattedValue;
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
 * Class Google_Service_Games_QuestCriterion
 */
class Google_Service_Games_QuestCriterion extends Google_Model
{
    public $eventId;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $completionContributionType = 'Google_Service_Games_QuestContribution';
    protected $completionContributionDataType = '';
    protected $currentContributionType = 'Google_Service_Games_QuestContribution';
    protected $currentContributionDataType = '';
    protected $initialPlayerProgressType = 'Google_Service_Games_QuestContribution';
    protected $initialPlayerProgressDataType = '';

    /**
     * @param Google_Service_Games_QuestContribution $completionContribution
     */
    public function setCompletionContribution(Google_Service_Games_QuestContribution $completionContribution)
    {
        $this->completionContribution = $completionContribution;
    }

    /**
     * @return mixed
     */
    public function getCompletionContribution()
    {
        return $this->completionContribution;
    }

    /**
     * @param Google_Service_Games_QuestContribution $currentContribution
     */
    public function setCurrentContribution(Google_Service_Games_QuestContribution $currentContribution)
    {
        $this->currentContribution = $currentContribution;
    }

    /**
     * @return mixed
     */
    public function getCurrentContribution()
    {
        return $this->currentContribution;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param $eventId
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @param Google_Service_Games_QuestContribution $initialPlayerProgress
     */
    public function setInitialPlayerProgress(Google_Service_Games_QuestContribution $initialPlayerProgress)
    {
        $this->initialPlayerProgress = $initialPlayerProgress;
    }

    /**
     * @return mixed
     */
    public function getInitialPlayerProgress()
    {
        return $this->initialPlayerProgress;
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
 * Class Google_Service_Games_QuestListResponse
 */
class Google_Service_Games_QuestListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Quest';
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
 * Class Google_Service_Games_QuestMilestone
 */
class Google_Service_Games_QuestMilestone extends Google_Collection
{
    public $completionRewardData;
    public $id;
    public $kind;
    public $state;
    protected $collection_key = 'criteria';
    protected $internal_gapi_mappings = [];
    protected $criteriaType = 'Google_Service_Games_QuestCriterion';
    protected $criteriaDataType = 'array';

    /**
     * @return mixed
     */
    public function getCompletionRewardData()
    {
        return $this->completionRewardData;
    }

    /**
     * @param $completionRewardData
     */
    public function setCompletionRewardData($completionRewardData)
    {
        $this->completionRewardData = $completionRewardData;
    }

    /**
     * @param $criteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->criteria;
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
 * Class Google_Service_Games_RevisionCheckResponse
 */
class Google_Service_Games_RevisionCheckResponse extends Google_Model
{
    public $apiVersion;
    public $kind;
    public $revisionStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @param $apiVersion
     */
    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
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
    public function getRevisionStatus()
    {
        return $this->revisionStatus;
    }

    /**
     * @param $revisionStatus
     */
    public function setRevisionStatus($revisionStatus)
    {
        $this->revisionStatus = $revisionStatus;
    }
}

/**
 * Class Google_Service_Games_Room
 */
class Google_Service_Games_Room extends Google_Collection
{
    public $applicationId;
    public $description;
    public $inviterId;
    public $kind;
    public $roomId;
    public $roomStatusVersion;
    public $status;
    public $variant;
    protected $collection_key = 'participants';
    protected $internal_gapi_mappings = [];
    protected $autoMatchingCriteriaType = 'Google_Service_Games_RoomAutoMatchingCriteria';
    protected $autoMatchingCriteriaDataType = '';
    protected $autoMatchingStatusType = 'Google_Service_Games_RoomAutoMatchStatus';
    protected $autoMatchingStatusDataType = '';
    protected $creationDetailsType = 'Google_Service_Games_RoomModification';
    protected $creationDetailsDataType = '';
    protected $lastUpdateDetailsType = 'Google_Service_Games_RoomModification';
    protected $lastUpdateDetailsDataType = '';
    protected $participantsType = 'Google_Service_Games_RoomParticipant';
    protected $participantsDataType = 'array';

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @param Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria
     */
    public function setAutoMatchingCriteria(Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria)
    {
        $this->autoMatchingCriteria = $autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingCriteria()
    {
        return $this->autoMatchingCriteria;
    }

    /**
     * @param Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus
     */
    public function setAutoMatchingStatus(Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus)
    {
        $this->autoMatchingStatus = $autoMatchingStatus;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingStatus()
    {
        return $this->autoMatchingStatus;
    }

    /**
     * @param Google_Service_Games_RoomModification $creationDetails
     */
    public function setCreationDetails(Google_Service_Games_RoomModification $creationDetails)
    {
        $this->creationDetails = $creationDetails;
    }

    /**
     * @return mixed
     */
    public function getCreationDetails()
    {
        return $this->creationDetails;
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
    public function getInviterId()
    {
        return $this->inviterId;
    }

    /**
     * @param $inviterId
     */
    public function setInviterId($inviterId)
    {
        $this->inviterId = $inviterId;
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
     * @param Google_Service_Games_RoomModification $lastUpdateDetails
     */
    public function setLastUpdateDetails(Google_Service_Games_RoomModification $lastUpdateDetails)
    {
        $this->lastUpdateDetails = $lastUpdateDetails;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateDetails()
    {
        return $this->lastUpdateDetails;
    }

    /**
     * @param $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
    }

    /**
     * @return mixed
     */
    public function getRoomStatusVersion()
    {
        return $this->roomStatusVersion;
    }

    /**
     * @param $roomStatusVersion
     */
    public function setRoomStatusVersion($roomStatusVersion)
    {
        $this->roomStatusVersion = $roomStatusVersion;
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
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }
}

/**
 * Class Google_Service_Games_RoomAutoMatchStatus
 */
class Google_Service_Games_RoomAutoMatchStatus extends Google_Model
{
    public $kind;
    public $waitEstimateSeconds;
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
    public function getWaitEstimateSeconds()
    {
        return $this->waitEstimateSeconds;
    }

    /**
     * @param $waitEstimateSeconds
     */
    public function setWaitEstimateSeconds($waitEstimateSeconds)
    {
        $this->waitEstimateSeconds = $waitEstimateSeconds;
    }
}

/**
 * Class Google_Service_Games_RoomAutoMatchingCriteria
 */
class Google_Service_Games_RoomAutoMatchingCriteria extends Google_Model
{
    public $exclusiveBitmask;
    public $kind;
    public $maxAutoMatchingPlayers;
    public $minAutoMatchingPlayers;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExclusiveBitmask()
    {
        return $this->exclusiveBitmask;
    }

    /**
     * @param $exclusiveBitmask
     */
    public function setExclusiveBitmask($exclusiveBitmask)
    {
        $this->exclusiveBitmask = $exclusiveBitmask;
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
    public function getMaxAutoMatchingPlayers()
    {
        return $this->maxAutoMatchingPlayers;
    }

    /**
     * @param $maxAutoMatchingPlayers
     */
    public function setMaxAutoMatchingPlayers($maxAutoMatchingPlayers)
    {
        $this->maxAutoMatchingPlayers = $maxAutoMatchingPlayers;
    }

    /**
     * @return mixed
     */
    public function getMinAutoMatchingPlayers()
    {
        return $this->minAutoMatchingPlayers;
    }

    /**
     * @param $minAutoMatchingPlayers
     */
    public function setMinAutoMatchingPlayers($minAutoMatchingPlayers)
    {
        $this->minAutoMatchingPlayers = $minAutoMatchingPlayers;
    }
}

/**
 * Class Google_Service_Games_RoomClientAddress
 */
class Google_Service_Games_RoomClientAddress extends Google_Model
{
    public $kind;
    public $xmppAddress;
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
    public function getXmppAddress()
    {
        return $this->xmppAddress;
    }

    /**
     * @param $xmppAddress
     */
    public function setXmppAddress($xmppAddress)
    {
        $this->xmppAddress = $xmppAddress;
    }
}

/**
 * Class Google_Service_Games_RoomCreateRequest
 */
class Google_Service_Games_RoomCreateRequest extends Google_Collection
{
    public $capabilities;
    public $invitedPlayerIds;
    public $kind;
    public $requestId;
    public $variant;
    protected $collection_key = 'invitedPlayerIds';
    protected $internal_gapi_mappings = [];
    protected $autoMatchingCriteriaType = 'Google_Service_Games_RoomAutoMatchingCriteria';
    protected $autoMatchingCriteriaDataType = '';
    protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
    protected $clientAddressDataType = '';
    protected $networkDiagnosticsType = 'Google_Service_Games_NetworkDiagnostics';
    protected $networkDiagnosticsDataType = '';

    /**
     * @param Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria
     */
    public function setAutoMatchingCriteria(Google_Service_Games_RoomAutoMatchingCriteria $autoMatchingCriteria)
    {
        $this->autoMatchingCriteria = $autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingCriteria()
    {
        return $this->autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @param $capabilities
     */
    public function setCapabilities($capabilities)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * @param Google_Service_Games_RoomClientAddress $clientAddress
     */
    public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
    {
        $this->clientAddress = $clientAddress;
    }

    /**
     * @return mixed
     */
    public function getClientAddress()
    {
        return $this->clientAddress;
    }

    /**
     * @return mixed
     */
    public function getInvitedPlayerIds()
    {
        return $this->invitedPlayerIds;
    }

    /**
     * @param $invitedPlayerIds
     */
    public function setInvitedPlayerIds($invitedPlayerIds)
    {
        $this->invitedPlayerIds = $invitedPlayerIds;
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
     * @param Google_Service_Games_NetworkDiagnostics $networkDiagnostics
     */
    public function setNetworkDiagnostics(Google_Service_Games_NetworkDiagnostics $networkDiagnostics)
    {
        $this->networkDiagnostics = $networkDiagnostics;
    }

    /**
     * @return mixed
     */
    public function getNetworkDiagnostics()
    {
        return $this->networkDiagnostics;
    }

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return mixed
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }
}

/**
 * Class Google_Service_Games_RoomJoinRequest
 */
class Google_Service_Games_RoomJoinRequest extends Google_Collection
{
    public $capabilities;
    public $kind;
    protected $collection_key = 'capabilities';
    protected $internal_gapi_mappings = [];
    protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
    protected $clientAddressDataType = '';
    protected $networkDiagnosticsType = 'Google_Service_Games_NetworkDiagnostics';
    protected $networkDiagnosticsDataType = '';

    /**
     * @return mixed
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @param $capabilities
     */
    public function setCapabilities($capabilities)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * @param Google_Service_Games_RoomClientAddress $clientAddress
     */
    public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
    {
        $this->clientAddress = $clientAddress;
    }

    /**
     * @return mixed
     */
    public function getClientAddress()
    {
        return $this->clientAddress;
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
     * @param Google_Service_Games_NetworkDiagnostics $networkDiagnostics
     */
    public function setNetworkDiagnostics(Google_Service_Games_NetworkDiagnostics $networkDiagnostics)
    {
        $this->networkDiagnostics = $networkDiagnostics;
    }

    /**
     * @return mixed
     */
    public function getNetworkDiagnostics()
    {
        return $this->networkDiagnostics;
    }
}

/**
 * Class Google_Service_Games_RoomLeaveDiagnostics
 */
class Google_Service_Games_RoomLeaveDiagnostics extends Google_Collection
{
    public $androidNetworkSubtype;
    public $androidNetworkType;
    public $iosNetworkType;
    public $kind;
    public $networkOperatorCode;
    public $networkOperatorName;
    public $socketsUsed;
    protected $collection_key = 'peerSession';
    protected $internal_gapi_mappings = [];
    protected $peerSessionType = 'Google_Service_Games_PeerSessionDiagnostics';
    protected $peerSessionDataType = 'array';

    /**
     * @return mixed
     */
    public function getAndroidNetworkSubtype()
    {
        return $this->androidNetworkSubtype;
    }

    /**
     * @param $androidNetworkSubtype
     */
    public function setAndroidNetworkSubtype($androidNetworkSubtype)
    {
        $this->androidNetworkSubtype = $androidNetworkSubtype;
    }

    /**
     * @return mixed
     */
    public function getAndroidNetworkType()
    {
        return $this->androidNetworkType;
    }

    /**
     * @param $androidNetworkType
     */
    public function setAndroidNetworkType($androidNetworkType)
    {
        $this->androidNetworkType = $androidNetworkType;
    }

    /**
     * @return mixed
     */
    public function getIosNetworkType()
    {
        return $this->iosNetworkType;
    }

    /**
     * @param $iosNetworkType
     */
    public function setIosNetworkType($iosNetworkType)
    {
        $this->iosNetworkType = $iosNetworkType;
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
    public function getNetworkOperatorCode()
    {
        return $this->networkOperatorCode;
    }

    /**
     * @param $networkOperatorCode
     */
    public function setNetworkOperatorCode($networkOperatorCode)
    {
        $this->networkOperatorCode = $networkOperatorCode;
    }

    /**
     * @return mixed
     */
    public function getNetworkOperatorName()
    {
        return $this->networkOperatorName;
    }

    /**
     * @param $networkOperatorName
     */
    public function setNetworkOperatorName($networkOperatorName)
    {
        $this->networkOperatorName = $networkOperatorName;
    }

    /**
     * @param $peerSession
     */
    public function setPeerSession($peerSession)
    {
        $this->peerSession = $peerSession;
    }

    /**
     * @return mixed
     */
    public function getPeerSession()
    {
        return $this->peerSession;
    }

    /**
     * @return mixed
     */
    public function getSocketsUsed()
    {
        return $this->socketsUsed;
    }

    /**
     * @param $socketsUsed
     */
    public function setSocketsUsed($socketsUsed)
    {
        $this->socketsUsed = $socketsUsed;
    }
}

/**
 * Class Google_Service_Games_RoomLeaveRequest
 */
class Google_Service_Games_RoomLeaveRequest extends Google_Model
{
    public $kind;
    public $reason;
    protected $internal_gapi_mappings = [];
    protected $leaveDiagnosticsType = 'Google_Service_Games_RoomLeaveDiagnostics';
    protected $leaveDiagnosticsDataType = '';

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
     * @param Google_Service_Games_RoomLeaveDiagnostics $leaveDiagnostics
     */
    public function setLeaveDiagnostics(Google_Service_Games_RoomLeaveDiagnostics $leaveDiagnostics)
    {
        $this->leaveDiagnostics = $leaveDiagnostics;
    }

    /**
     * @return mixed
     */
    public function getLeaveDiagnostics()
    {
        return $this->leaveDiagnostics;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}

/**
 * Class Google_Service_Games_RoomList
 */
class Google_Service_Games_RoomList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Room';
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
 * Class Google_Service_Games_RoomModification
 */
class Google_Service_Games_RoomModification extends Google_Model
{
    public $kind;
    public $modifiedTimestampMillis;
    public $participantId;
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
    public function getModifiedTimestampMillis()
    {
        return $this->modifiedTimestampMillis;
    }

    /**
     * @param $modifiedTimestampMillis
     */
    public function setModifiedTimestampMillis($modifiedTimestampMillis)
    {
        $this->modifiedTimestampMillis = $modifiedTimestampMillis;
    }

    /**
     * @return mixed
     */
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * @param $participantId
     */
    public function setParticipantId($participantId)
    {
        $this->participantId = $participantId;
    }
}

/**
 * Class Google_Service_Games_RoomP2PStatus
 */
class Google_Service_Games_RoomP2PStatus extends Google_Model
{
    public $connectionSetupLatencyMillis;
    public $error;
    public $errorReason;
    public $kind;
    public $participantId;
    public $status;
    public $unreliableRoundtripLatencyMillis;
    protected $internal_gapi_mappings = [
        "errorReason" => "error_reason",
    ];

    /**
     * @return mixed
     */
    public function getConnectionSetupLatencyMillis()
    {
        return $this->connectionSetupLatencyMillis;
    }

    /**
     * @param $connectionSetupLatencyMillis
     */
    public function setConnectionSetupLatencyMillis($connectionSetupLatencyMillis)
    {
        $this->connectionSetupLatencyMillis = $connectionSetupLatencyMillis;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

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
    public function getErrorReason()
    {
        return $this->errorReason;
    }

    /**
     * @param $errorReason
     */
    public function setErrorReason($errorReason)
    {
        $this->errorReason = $errorReason;
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
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * @param $participantId
     */
    public function setParticipantId($participantId)
    {
        $this->participantId = $participantId;
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
    public function getUnreliableRoundtripLatencyMillis()
    {
        return $this->unreliableRoundtripLatencyMillis;
    }

    /**
     * @param $unreliableRoundtripLatencyMillis
     */
    public function setUnreliableRoundtripLatencyMillis($unreliableRoundtripLatencyMillis)
    {
        $this->unreliableRoundtripLatencyMillis = $unreliableRoundtripLatencyMillis;
    }
}

/**
 * Class Google_Service_Games_RoomP2PStatuses
 */
class Google_Service_Games_RoomP2PStatuses extends Google_Collection
{
    public $kind;
    protected $collection_key = 'updates';
    protected $internal_gapi_mappings = [];
    protected $updatesType = 'Google_Service_Games_RoomP2PStatus';
    protected $updatesDataType = 'array';

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
     * @param $updates
     */
    public function setUpdates($updates)
    {
        $this->updates = $updates;
    }

    /**
     * @return mixed
     */
    public function getUpdates()
    {
        return $this->updates;
    }
}

/**
 * Class Google_Service_Games_RoomParticipant
 */
class Google_Service_Games_RoomParticipant extends Google_Collection
{
    public $autoMatched;
    public $capabilities;
    public $connected;
    public $id;
    public $kind;
    public $leaveReason;
    public $status;
    protected $collection_key = 'capabilities';
    protected $internal_gapi_mappings = [];
    protected $autoMatchedPlayerType = 'Google_Service_Games_AnonymousPlayer';
    protected $autoMatchedPlayerDataType = '';
    protected $clientAddressType = 'Google_Service_Games_RoomClientAddress';
    protected $clientAddressDataType = '';
    protected $playerType = 'Google_Service_Games_Player';
    protected $playerDataType = '';

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
     * @param Google_Service_Games_AnonymousPlayer $autoMatchedPlayer
     */
    public function setAutoMatchedPlayer(Google_Service_Games_AnonymousPlayer $autoMatchedPlayer)
    {
        $this->autoMatchedPlayer = $autoMatchedPlayer;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchedPlayer()
    {
        return $this->autoMatchedPlayer;
    }

    /**
     * @return mixed
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @param $capabilities
     */
    public function setCapabilities($capabilities)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * @param Google_Service_Games_RoomClientAddress $clientAddress
     */
    public function setClientAddress(Google_Service_Games_RoomClientAddress $clientAddress)
    {
        $this->clientAddress = $clientAddress;
    }

    /**
     * @return mixed
     */
    public function getClientAddress()
    {
        return $this->clientAddress;
    }

    /**
     * @return mixed
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * @param $connected
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;
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
    public function getLeaveReason()
    {
        return $this->leaveReason;
    }

    /**
     * @param $leaveReason
     */
    public function setLeaveReason($leaveReason)
    {
        $this->leaveReason = $leaveReason;
    }

    /**
     * @param Google_Service_Games_Player $player
     */
    public function setPlayer(Google_Service_Games_Player $player)
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
}

/**
 * Class Google_Service_Games_RoomStatus
 */
class Google_Service_Games_RoomStatus extends Google_Collection
{
    public $kind;
    public $roomId;
    public $status;
    public $statusVersion;
    protected $collection_key = 'participants';
    protected $internal_gapi_mappings = [];
    protected $autoMatchingStatusType = 'Google_Service_Games_RoomAutoMatchStatus';
    protected $autoMatchingStatusDataType = '';
    protected $participantsType = 'Google_Service_Games_RoomParticipant';
    protected $participantsDataType = 'array';

    /**
     * @param Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus
     */
    public function setAutoMatchingStatus(Google_Service_Games_RoomAutoMatchStatus $autoMatchingStatus)
    {
        $this->autoMatchingStatus = $autoMatchingStatus;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingStatus()
    {
        return $this->autoMatchingStatus;
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
     * @param $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
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
    public function getStatusVersion()
    {
        return $this->statusVersion;
    }

    /**
     * @param $statusVersion
     */
    public function setStatusVersion($statusVersion)
    {
        $this->statusVersion = $statusVersion;
    }
}

/**
 * Class Google_Service_Games_ScoreSubmission
 */
class Google_Service_Games_ScoreSubmission extends Google_Model
{
    public $kind;
    public $leaderboardId;
    public $score;
    public $scoreTag;
    public $signature;
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
    public function getLeaderboardId()
    {
        return $this->leaderboardId;
    }

    /**
     * @param $leaderboardId
     */
    public function setLeaderboardId($leaderboardId)
    {
        $this->leaderboardId = $leaderboardId;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScoreTag()
    {
        return $this->scoreTag;
    }

    /**
     * @param $scoreTag
     */
    public function setScoreTag($scoreTag)
    {
        $this->scoreTag = $scoreTag;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }
}

/**
 * Class Google_Service_Games_Snapshot
 */
class Google_Service_Games_Snapshot extends Google_Model
{
    public $description;
    public $driveId;
    public $durationMillis;
    public $id;
    public $kind;
    public $lastModifiedMillis;
    public $progressValue;
    public $title;
    public $type;
    public $uniqueName;
    protected $internal_gapi_mappings = [];
    protected $coverImageType = 'Google_Service_Games_SnapshotImage';
    protected $coverImageDataType = '';

    /**
     * @param Google_Service_Games_SnapshotImage $coverImage
     */
    public function setCoverImage(Google_Service_Games_SnapshotImage $coverImage)
    {
        $this->coverImage = $coverImage;
    }

    /**
     * @return mixed
     */
    public function getCoverImage()
    {
        return $this->coverImage;
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
    public function getDriveId()
    {
        return $this->driveId;
    }

    /**
     * @param $driveId
     */
    public function setDriveId($driveId)
    {
        $this->driveId = $driveId;
    }

    /**
     * @return mixed
     */
    public function getDurationMillis()
    {
        return $this->durationMillis;
    }

    /**
     * @param $durationMillis
     */
    public function setDurationMillis($durationMillis)
    {
        $this->durationMillis = $durationMillis;
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
    public function getLastModifiedMillis()
    {
        return $this->lastModifiedMillis;
    }

    /**
     * @param $lastModifiedMillis
     */
    public function setLastModifiedMillis($lastModifiedMillis)
    {
        $this->lastModifiedMillis = $lastModifiedMillis;
    }

    /**
     * @return mixed
     */
    public function getProgressValue()
    {
        return $this->progressValue;
    }

    /**
     * @param $progressValue
     */
    public function setProgressValue($progressValue)
    {
        $this->progressValue = $progressValue;
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

    /**
     * @return mixed
     */
    public function getUniqueName()
    {
        return $this->uniqueName;
    }

    /**
     * @param $uniqueName
     */
    public function setUniqueName($uniqueName)
    {
        $this->uniqueName = $uniqueName;
    }
}

/**
 * Class Google_Service_Games_SnapshotImage
 */
class Google_Service_Games_SnapshotImage extends Google_Model
{
    public $height;
    public $kind;
    public $mimeType;
    public $url;
    public $width;
    protected $internal_gapi_mappings = [
        "mimeType" => "mime_type",
    ];

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
 * Class Google_Service_Games_SnapshotListResponse
 */
class Google_Service_Games_SnapshotListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_Snapshot';
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
 * Class Google_Service_Games_TurnBasedAutoMatchingCriteria
 */
class Google_Service_Games_TurnBasedAutoMatchingCriteria extends Google_Model
{
    public $exclusiveBitmask;
    public $kind;
    public $maxAutoMatchingPlayers;
    public $minAutoMatchingPlayers;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExclusiveBitmask()
    {
        return $this->exclusiveBitmask;
    }

    /**
     * @param $exclusiveBitmask
     */
    public function setExclusiveBitmask($exclusiveBitmask)
    {
        $this->exclusiveBitmask = $exclusiveBitmask;
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
    public function getMaxAutoMatchingPlayers()
    {
        return $this->maxAutoMatchingPlayers;
    }

    /**
     * @param $maxAutoMatchingPlayers
     */
    public function setMaxAutoMatchingPlayers($maxAutoMatchingPlayers)
    {
        $this->maxAutoMatchingPlayers = $maxAutoMatchingPlayers;
    }

    /**
     * @return mixed
     */
    public function getMinAutoMatchingPlayers()
    {
        return $this->minAutoMatchingPlayers;
    }

    /**
     * @param $minAutoMatchingPlayers
     */
    public function setMinAutoMatchingPlayers($minAutoMatchingPlayers)
    {
        $this->minAutoMatchingPlayers = $minAutoMatchingPlayers;
    }
}

/**
 * Class Google_Service_Games_TurnBasedMatch
 */
class Google_Service_Games_TurnBasedMatch extends Google_Collection
{
    public $applicationId;
    public $description;
    public $inviterId;
    public $kind;
    public $matchId;
    public $matchNumber;
    public $matchVersion;
    public $pendingParticipantId;
    public $rematchId;
    public $status;
    public $userMatchStatus;
    public $variant;
    public $withParticipantId;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $autoMatchingCriteriaType = 'Google_Service_Games_TurnBasedAutoMatchingCriteria';
    protected $autoMatchingCriteriaDataType = '';
    protected $creationDetailsType = 'Google_Service_Games_TurnBasedMatchModification';
    protected $creationDetailsDataType = '';
    protected $dataType = 'Google_Service_Games_TurnBasedMatchData';
    protected $dataDataType = '';
    protected $lastUpdateDetailsType = 'Google_Service_Games_TurnBasedMatchModification';
    protected $lastUpdateDetailsDataType = '';
    protected $participantsType = 'Google_Service_Games_TurnBasedMatchParticipant';
    protected $participantsDataType = 'array';
    protected $previousMatchDataType = 'Google_Service_Games_TurnBasedMatchData';
    protected $previousMatchDataDataType = '';
    protected $resultsType = 'Google_Service_Games_ParticipantResult';
    protected $resultsDataType = 'array';

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @param Google_Service_Games_TurnBasedAutoMatchingCriteria $autoMatchingCriteria
     */
    public function setAutoMatchingCriteria(Google_Service_Games_TurnBasedAutoMatchingCriteria $autoMatchingCriteria)
    {
        $this->autoMatchingCriteria = $autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingCriteria()
    {
        return $this->autoMatchingCriteria;
    }

    /**
     * @param Google_Service_Games_TurnBasedMatchModification $creationDetails
     */
    public function setCreationDetails(Google_Service_Games_TurnBasedMatchModification $creationDetails)
    {
        $this->creationDetails = $creationDetails;
    }

    /**
     * @return mixed
     */
    public function getCreationDetails()
    {
        return $this->creationDetails;
    }

    /**
     * @param Google_Service_Games_TurnBasedMatchData $data
     */
    public function setData(Google_Service_Games_TurnBasedMatchData $data)
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
    public function getInviterId()
    {
        return $this->inviterId;
    }

    /**
     * @param $inviterId
     */
    public function setInviterId($inviterId)
    {
        $this->inviterId = $inviterId;
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
     * @param Google_Service_Games_TurnBasedMatchModification $lastUpdateDetails
     */
    public function setLastUpdateDetails(Google_Service_Games_TurnBasedMatchModification $lastUpdateDetails)
    {
        $this->lastUpdateDetails = $lastUpdateDetails;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateDetails()
    {
        return $this->lastUpdateDetails;
    }

    /**
     * @return mixed
     */
    public function getMatchId()
    {
        return $this->matchId;
    }

    /**
     * @param $matchId
     */
    public function setMatchId($matchId)
    {
        $this->matchId = $matchId;
    }

    /**
     * @return mixed
     */
    public function getMatchNumber()
    {
        return $this->matchNumber;
    }

    /**
     * @param $matchNumber
     */
    public function setMatchNumber($matchNumber)
    {
        $this->matchNumber = $matchNumber;
    }

    /**
     * @return mixed
     */
    public function getMatchVersion()
    {
        return $this->matchVersion;
    }

    /**
     * @param $matchVersion
     */
    public function setMatchVersion($matchVersion)
    {
        $this->matchVersion = $matchVersion;
    }

    /**
     * @param $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @return mixed
     */
    public function getPendingParticipantId()
    {
        return $this->pendingParticipantId;
    }

    /**
     * @param $pendingParticipantId
     */
    public function setPendingParticipantId($pendingParticipantId)
    {
        $this->pendingParticipantId = $pendingParticipantId;
    }

    /**
     * @param Google_Service_Games_TurnBasedMatchData $previousMatchData
     */
    public function setPreviousMatchData(Google_Service_Games_TurnBasedMatchData $previousMatchData)
    {
        $this->previousMatchData = $previousMatchData;
    }

    /**
     * @return mixed
     */
    public function getPreviousMatchData()
    {
        return $this->previousMatchData;
    }

    /**
     * @return mixed
     */
    public function getRematchId()
    {
        return $this->rematchId;
    }

    /**
     * @param $rematchId
     */
    public function setRematchId($rematchId)
    {
        $this->rematchId = $rematchId;
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
    public function getUserMatchStatus()
    {
        return $this->userMatchStatus;
    }

    /**
     * @param $userMatchStatus
     */
    public function setUserMatchStatus($userMatchStatus)
    {
        $this->userMatchStatus = $userMatchStatus;
    }

    /**
     * @return mixed
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }

    /**
     * @return mixed
     */
    public function getWithParticipantId()
    {
        return $this->withParticipantId;
    }

    /**
     * @param $withParticipantId
     */
    public function setWithParticipantId($withParticipantId)
    {
        $this->withParticipantId = $withParticipantId;
    }
}

/**
 * Class Google_Service_Games_TurnBasedMatchCreateRequest
 */
class Google_Service_Games_TurnBasedMatchCreateRequest extends Google_Collection
{
    public $invitedPlayerIds;
    public $kind;
    public $requestId;
    public $variant;
    protected $collection_key = 'invitedPlayerIds';
    protected $internal_gapi_mappings = [];
    protected $autoMatchingCriteriaType = 'Google_Service_Games_TurnBasedAutoMatchingCriteria';
    protected $autoMatchingCriteriaDataType = '';

    /**
     * @param Google_Service_Games_TurnBasedAutoMatchingCriteria $autoMatchingCriteria
     */
    public function setAutoMatchingCriteria(Google_Service_Games_TurnBasedAutoMatchingCriteria $autoMatchingCriteria)
    {
        $this->autoMatchingCriteria = $autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchingCriteria()
    {
        return $this->autoMatchingCriteria;
    }

    /**
     * @return mixed
     */
    public function getInvitedPlayerIds()
    {
        return $this->invitedPlayerIds;
    }

    /**
     * @param $invitedPlayerIds
     */
    public function setInvitedPlayerIds($invitedPlayerIds)
    {
        $this->invitedPlayerIds = $invitedPlayerIds;
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
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @return mixed
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }
}

/**
 * Class Google_Service_Games_TurnBasedMatchData
 */
class Google_Service_Games_TurnBasedMatchData extends Google_Model
{
    public $data;
    public $dataAvailable;
    public $kind;
    protected $internal_gapi_mappings = [];

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
    public function getDataAvailable()
    {
        return $this->dataAvailable;
    }

    /**
     * @param $dataAvailable
     */
    public function setDataAvailable($dataAvailable)
    {
        $this->dataAvailable = $dataAvailable;
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
 * Class Google_Service_Games_TurnBasedMatchDataRequest
 */
class Google_Service_Games_TurnBasedMatchDataRequest extends Google_Model
{
    public $data;
    public $kind;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Games_TurnBasedMatchList
 */
class Google_Service_Games_TurnBasedMatchList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_TurnBasedMatch';
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
 * Class Google_Service_Games_TurnBasedMatchModification
 */
class Google_Service_Games_TurnBasedMatchModification extends Google_Model
{
    public $kind;
    public $modifiedTimestampMillis;
    public $participantId;
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
    public function getModifiedTimestampMillis()
    {
        return $this->modifiedTimestampMillis;
    }

    /**
     * @param $modifiedTimestampMillis
     */
    public function setModifiedTimestampMillis($modifiedTimestampMillis)
    {
        $this->modifiedTimestampMillis = $modifiedTimestampMillis;
    }

    /**
     * @return mixed
     */
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * @param $participantId
     */
    public function setParticipantId($participantId)
    {
        $this->participantId = $participantId;
    }
}

/**
 * Class Google_Service_Games_TurnBasedMatchParticipant
 */
class Google_Service_Games_TurnBasedMatchParticipant extends Google_Model
{
    public $autoMatched;
    public $id;
    public $kind;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $autoMatchedPlayerType = 'Google_Service_Games_AnonymousPlayer';
    protected $autoMatchedPlayerDataType = '';
    protected $playerType = 'Google_Service_Games_Player';
    protected $playerDataType = '';

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
     * @param Google_Service_Games_AnonymousPlayer $autoMatchedPlayer
     */
    public function setAutoMatchedPlayer(Google_Service_Games_AnonymousPlayer $autoMatchedPlayer)
    {
        $this->autoMatchedPlayer = $autoMatchedPlayer;
    }

    /**
     * @return mixed
     */
    public function getAutoMatchedPlayer()
    {
        return $this->autoMatchedPlayer;
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
     * @param Google_Service_Games_Player $player
     */
    public function setPlayer(Google_Service_Games_Player $player)
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
}

/**
 * Class Google_Service_Games_TurnBasedMatchRematch
 */
class Google_Service_Games_TurnBasedMatchRematch extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $previousMatchType = 'Google_Service_Games_TurnBasedMatch';
    protected $previousMatchDataType = '';
    protected $rematchType = 'Google_Service_Games_TurnBasedMatch';
    protected $rematchDataType = '';

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
     * @param Google_Service_Games_TurnBasedMatch $previousMatch
     */
    public function setPreviousMatch(Google_Service_Games_TurnBasedMatch $previousMatch)
    {
        $this->previousMatch = $previousMatch;
    }

    /**
     * @return mixed
     */
    public function getPreviousMatch()
    {
        return $this->previousMatch;
    }

    /**
     * @param Google_Service_Games_TurnBasedMatch $rematch
     */
    public function setRematch(Google_Service_Games_TurnBasedMatch $rematch)
    {
        $this->rematch = $rematch;
    }

    /**
     * @return mixed
     */
    public function getRematch()
    {
        return $this->rematch;
    }
}

/**
 * Class Google_Service_Games_TurnBasedMatchResults
 */
class Google_Service_Games_TurnBasedMatchResults extends Google_Collection
{
    public $kind;
    public $matchVersion;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Games_TurnBasedMatchDataRequest';
    protected $dataDataType = '';
    protected $resultsType = 'Google_Service_Games_ParticipantResult';
    protected $resultsDataType = 'array';


    /**
     * @param Google_Service_Games_TurnBasedMatchDataRequest $data
     */
    public function setData(Google_Service_Games_TurnBasedMatchDataRequest $data)
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
    public function getMatchVersion()
    {
        return $this->matchVersion;
    }

    /**
     * @param $matchVersion
     */
    public function setMatchVersion($matchVersion)
    {
        $this->matchVersion = $matchVersion;
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
 * Class Google_Service_Games_TurnBasedMatchSync
 */
class Google_Service_Games_TurnBasedMatchSync extends Google_Collection
{
    public $kind;
    public $moreAvailable;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Games_TurnBasedMatch';
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
    public function getMoreAvailable()
    {
        return $this->moreAvailable;
    }

    /**
     * @param $moreAvailable
     */
    public function setMoreAvailable($moreAvailable)
    {
        $this->moreAvailable = $moreAvailable;
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
 * Class Google_Service_Games_TurnBasedMatchTurn
 */
class Google_Service_Games_TurnBasedMatchTurn extends Google_Collection
{
    public $kind;
    public $matchVersion;
    public $pendingParticipantId;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_Games_TurnBasedMatchDataRequest';
    protected $dataDataType = '';
    protected $resultsType = 'Google_Service_Games_ParticipantResult';
    protected $resultsDataType = 'array';


    /**
     * @param Google_Service_Games_TurnBasedMatchDataRequest $data
     */
    public function setData(Google_Service_Games_TurnBasedMatchDataRequest $data)
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
    public function getMatchVersion()
    {
        return $this->matchVersion;
    }

    /**
     * @param $matchVersion
     */
    public function setMatchVersion($matchVersion)
    {
        $this->matchVersion = $matchVersion;
    }

    /**
     * @return mixed
     */
    public function getPendingParticipantId()
    {
        return $this->pendingParticipantId;
    }

    /**
     * @param $pendingParticipantId
     */
    public function setPendingParticipantId($pendingParticipantId)
    {
        $this->pendingParticipantId = $pendingParticipantId;
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
