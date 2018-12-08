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
 * Service definition for YouTube (v3).
 *
 * <p>
 * Programmatic access to YouTube features.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/youtube/v3" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_YouTube extends Google_Service
{
    /** Manage your YouTube account. */
    const YOUTUBE =
        "https://www.googleapis.com/auth/youtube";
    /** Manage your YouTube account. */
    const YOUTUBE_FORCE_SSL =
        "https://www.googleapis.com/auth/youtube.force-ssl";
    /** View your YouTube account. */
    const YOUTUBE_READONLY =
        "https://www.googleapis.com/auth/youtube.readonly";
    /** Manage your YouTube videos. */
    const YOUTUBE_UPLOAD =
        "https://www.googleapis.com/auth/youtube.upload";
    /** View and manage your assets and associated content on YouTube. */
    const YOUTUBEPARTNER =
        "https://www.googleapis.com/auth/youtubepartner";
    /** View private information of your YouTube channel relevant during the audit process with a YouTube partner. */
    const YOUTUBEPARTNER_CHANNEL_AUDIT =
        "https://www.googleapis.com/auth/youtubepartner-channel-audit";

    public $activities;
    public $captions;
    public $channelBanners;
    public $channelSections;
    public $channels;
    public $commentThreads;
    public $comments;
    public $guideCategories;
    public $i18nLanguages;
    public $i18nRegions;
    public $liveBroadcasts;
    public $liveStreams;
    public $playlistItems;
    public $playlists;
    public $search;
    public $subscriptions;
    public $thumbnails;
    public $videoAbuseReportReasons;
    public $videoCategories;
    public $videos;
    public $watermarks;


    /**
     * Constructs the internal representation of the YouTube service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'youtube/v3/';
        $this->version = 'v3';
        $this->serviceName = 'youtube';

        $this->activities = new Google_Service_YouTube_Activities_Resource(
            $this,
            $this->serviceName,
            'activities',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'activities',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'activities',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'regionCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'publishedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
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
                            'home' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'publishedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->captions = new Google_Service_YouTube_Captions_Resource(
            $this,
            $this->serviceName,
            'captions',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'captions',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOf' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'debugProjectIdOverride' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'download' => [
                        'path' => 'captions/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tfmt' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOf' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'tlang' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'debugProjectIdOverride' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'captions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOf' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'debugProjectIdOverride' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sync' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'captions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'videoId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOf' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'debugProjectIdOverride' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'captions',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOf' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'debugProjectIdOverride' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sync' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channelBanners = new Google_Service_YouTube_ChannelBanners_Resource(
            $this,
            $this->serviceName,
            'channelBanners',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'channelBanners/insert',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channelSections = new Google_Service_YouTube_ChannelSections_Resource(
            $this,
            $this->serviceName,
            'channelSections',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'channelSections',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'channelSections',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'channelSections',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'channelSections',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_YouTube_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'list' => [
                        'path' => 'channels',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'managedByMe' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'forUsername' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mySubscribers' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'categoryId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'channels',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->commentThreads = new Google_Service_YouTube_CommentThreads_Resource(
            $this,
            $this->serviceName,
            'commentThreads',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'commentThreads',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'shareOnGooglePlus' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'commentThreads',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchTerms' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'allThreadsRelatedToChannelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoId' => [
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
                            'moderationStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'textFormat' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'commentThreads',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->comments = new Google_Service_YouTube_Comments_Resource(
            $this,
            $this->serviceName,
            'comments',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'comments',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'comments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'comments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
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
                            'parentId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'textFormat' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'markAsSpam' => [
                        'path' => 'comments/markAsSpam',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'setModerationStatus' => [
                        'path' => 'comments/setModerationStatus',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'moderationStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'banAuthor' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'comments',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->guideCategories = new Google_Service_YouTube_GuideCategories_Resource(
            $this,
            $this->serviceName,
            'guideCategories',
            [
                'methods' => [
                    'list' => [
                        'path' => 'guideCategories',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'regionCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->i18nLanguages = new Google_Service_YouTube_I18nLanguages_Resource(
            $this,
            $this->serviceName,
            'i18nLanguages',
            [
                'methods' => [
                    'list' => [
                        'path' => 'i18nLanguages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->i18nRegions = new Google_Service_YouTube_I18nRegions_Resource(
            $this,
            $this->serviceName,
            'i18nRegions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'i18nRegions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->liveBroadcasts = new Google_Service_YouTube_LiveBroadcasts_Resource(
            $this,
            $this->serviceName,
            'liveBroadcasts',
            [
                'methods' => [
                    'bind' => [
                        'path' => 'liveBroadcasts/bind',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'streamId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'control' => [
                        'path' => 'liveBroadcasts/control',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'displaySlate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'offsetTimeMs' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'walltime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'liveBroadcasts',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'liveBroadcasts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'liveBroadcasts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'broadcastStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
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
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'transition' => [
                        'path' => 'liveBroadcasts/transition',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'broadcastStatus' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'liveBroadcasts',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->liveStreams = new Google_Service_YouTube_LiveStreams_Resource(
            $this,
            $this->serviceName,
            'liveStreams',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'liveStreams',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'liveStreams',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'liveStreams',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
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
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'liveStreams',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->playlistItems = new Google_Service_YouTube_PlaylistItems_Resource(
            $this,
            $this->serviceName,
            'playlistItems',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'playlistItems',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'playlistItems',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'playlistItems',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'playlistId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoId' => [
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
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'playlistItems',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->playlists = new Google_Service_YouTube_Playlists_Resource(
            $this,
            $this->serviceName,
            'playlists',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'playlists',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'playlists',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'playlists',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
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
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'playlists',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->search = new Google_Service_YouTube_Search_Resource(
            $this,
            $this->serviceName,
            'search',
            [
                'methods' => [
                    'list' => [
                        'path' => 'search',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'eventType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'forDeveloper' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'videoSyndicated' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoCaption' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'publishedAfter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'forContentOwner' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'regionCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'location' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'locationRadius' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'topicId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'publishedBefore' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoDimension' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoLicense' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'relatedToVideoId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoDefinition' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoDuration' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'relevanceLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'forMine' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'safeSearch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoEmbeddable' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoCategoryId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'order' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->subscriptions = new Google_Service_YouTube_Subscriptions_Resource(
            $this,
            $this->serviceName,
            'subscriptions',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'subscriptions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'forChannelId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mySubscribers' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'order' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->thumbnails = new Google_Service_YouTube_Thumbnails_Resource(
            $this,
            $this->serviceName,
            'thumbnails',
            [
                'methods' => [
                    'set' => [
                        'path' => 'thumbnails/set',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'videoId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->videoAbuseReportReasons = new Google_Service_YouTube_VideoAbuseReportReasons_Resource(
            $this,
            $this->serviceName,
            'videoAbuseReportReasons',
            [
                'methods' => [
                    'list' => [
                        'path' => 'videoAbuseReportReasons',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->videoCategories = new Google_Service_YouTube_VideoCategories_Resource(
            $this,
            $this->serviceName,
            'videoCategories',
            [
                'methods' => [
                    'list' => [
                        'path' => 'videoCategories',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'regionCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->videos = new Google_Service_YouTube_Videos_Resource(
            $this,
            $this->serviceName,
            'videos',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'videos',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getRating' => [
                        'path' => 'videos/getRating',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'videos',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'stabilize' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'onBehalfOfContentOwnerChannel' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'notifySubscribers' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'autoLevels' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'videos',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'regionCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'videoCategoryId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'chart' => [
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
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'myRating' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'rate' => [
                        'path' => 'videos/rate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rating' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'reportAbuse' => [
                        'path' => 'videos/reportAbuse',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'videos',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'part' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->watermarks = new Google_Service_YouTube_Watermarks_Resource(
            $this,
            $this->serviceName,
            'watermarks',
            [
                'methods' => [
                    'set' => [
                        'path' => 'watermarks/set',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'unset' => [
                        'path' => 'watermarks/unset',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'channelId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
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
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $activities = $youtubeService->activities;
 *  </code>
 */
class Google_Service_YouTube_Activities_Resource extends Google_Service_Resource
{

    /**
     * Posts a bulletin for a specific channel. (The user submitting the request
     * must be authorized to act on the channel's behalf.)
     *
     * Note: Even though an activity resource can contain information about actions
     * like a user rating a video or marking a video as a favorite, you need to use
     * other API methods to generate those activity resources. For example, you
     * would use the API's videos.rate() method to rate a video and the
     * playlistItems.insert() method to mark a video as a favorite.
     * (activities.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                   It identifies the properties that the write operation will set as well as the
     *                                                                   properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * contentDetails.
     * @param Google_Activity|Google_Service_YouTube_Activity $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($part, Google_Service_YouTube_Activity $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Activity");
    }

    /**
     * Returns a list of channel activity events that match the request criteria.
     * For example, you can retrieve events associated with a particular channel,
     * events associated with the user's subscriptions and Google+ friends, or the
     * YouTube home page feed, which is customized for each user.
     * (activities.listActivities)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more activity resource properties that the API response will include.
     *                          The part names that you can include in the parameter value are id, snippet,
     *                          and contentDetails.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a activity
     * resource, the snippet property contains other properties that identify the
     * type of activity, a display title for the activity, and so forth. If you set
     * part=snippet, the API response will also contain all of those nested
     * properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string regionCode The regionCode parameter instructs the API to
     * return results for the specified country. The parameter value is an ISO
     * 3166-1 alpha-2 country code. YouTube uses this value when the authorized
     * user's previous activity on YouTube does not provide enough information to
     * generate the activity feed.
     * @opt_param string publishedBefore The publishedBefore parameter specifies the
     * date and time before which an activity must have occurred for that activity
     * to be included in the API response. If the parameter value specifies a day,
     * but not a time, then any activities that occurred that day will be excluded
     * from the result set. The value is specified in ISO 8601 (YYYY-MM-
     * DDThh:mm:ss.sZ) format.
     * @opt_param string channelId The channelId parameter specifies a unique
     * YouTube channel ID. The API will then return a list of that channel's
     * activities.
     * @opt_param bool mine Set this parameter's value to true to retrieve a feed of
     * the authenticated user's activities.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param bool home Set this parameter's value to true to retrieve the
     * activity feed that displays on the YouTube home page for the currently
     * authenticated user.
     * @opt_param string publishedAfter The publishedAfter parameter specifies the
     * earliest date and time that an activity could have occurred for that activity
     * to be included in the API response. If the parameter value specifies a day,
     * but not a time, then any activities that occurred that day will be included
     * in the result set. The value is specified in ISO 8601 (YYYY-MM-
     * DDThh:mm:ss.sZ) format.
     */
    public function listActivities($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_ActivityListResponse");
    }
}

/**
 * The "captions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $captions = $youtubeService->captions;
 *  </code>
 */
class Google_Service_YouTube_Captions_Resource extends Google_Service_Resource
{

    /**
     * Deletes a specified caption track. (captions.delete)
     *
     * @param string $id The id parameter identifies the caption track that is being
     *                          deleted. The value is a caption track ID as identified by the id property in
     *                          a caption resource.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string onBehalfOf ID of the Google+ Page for the channel that the
     * request is be on behalf of
     * @opt_param string debugProjectIdOverride The debugProjectIdOverride parameter
     * should be used for mimicking a request for a certain project ID
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Downloads a caption track. The caption track is returned in its original
     * format unless the request specifies a value for the tfmt parameter and in its
     * original language unless the request specifies a value for the tlang
     * parameter. (captions.download)
     *
     * @param string $id The id parameter identifies the caption track that is being
     *                          retrieved. The value is a caption track ID as identified by the id property
     *                          in a caption resource.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string tfmt The tfmt parameter specifies that the caption track
     * should be returned in a specific format. If the parameter is not included in
     * the request, the track is returned in its original format.
     * @opt_param string onBehalfOf ID of the Google+ Page for the channel that the
     * request is be on behalf of
     * @opt_param string tlang The tlang parameter specifies that the API response
     * should return a translation of the specified caption track. The parameter
     * value is an ISO 639-1 two-letter language code that identifies the desired
     * caption language. The translation is generated by using machine translation,
     * such as Google Translate.
     * @opt_param string debugProjectIdOverride The debugProjectIdOverride parameter
     * should be used for mimicking a request for a certain project ID
     */
    public function download($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('download', [$params]);
    }

    /**
     * Uploads a caption track. (captions.insert)
     *
     * @param string $part The part parameter specifies the caption resource parts
     *                                                                 that the API response will include. Set the parameter value to snippet.
     * @param Google_Caption|Google_Service_YouTube_Caption $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string onBehalfOf ID of the Google+ Page for the channel that the
     * request is be on behalf of
     * @opt_param string debugProjectIdOverride The debugProjectIdOverride parameter
     * should be used for mimicking a request for a certain project ID.
     * @opt_param bool sync The sync parameter indicates whether YouTube should
     * automatically synchronize the caption file with the audio track of the video.
     * If you set the value to true, YouTube will disregard any time codes that are
     * in the uploaded caption file and generate new time codes for the captions.
     *
     * You should set the sync parameter to true if you are uploading a transcript,
     * which has no time codes, or if you suspect the time codes in your file are
     * incorrect and want YouTube to try to fix them.
     */
    public function insert($part, Google_Service_YouTube_Caption $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Caption");
    }

    /**
     * Returns a list of caption tracks that are associated with a specified video.
     * Note that the API response does not contain the actual captions and that the
     * captions.download method provides the ability to retrieve a caption track.
     * (captions.listCaptions)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more caption resource parts that the API response will include. The
     *                          part names that you can include in the parameter value are id and snippet.
     * @param string $videoId The videoId parameter specifies the YouTube video ID
     *                          of the video for which the API should return caption tracks.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string onBehalfOf ID of the Google+ Page for the channel that the
     * request is on behalf of.
     * @opt_param string debugProjectIdOverride The debugProjectIdOverride parameter
     * should be used for mimicking a request for a certain project ID.
     * @opt_param string id The id parameter specifies a comma-separated list of IDs
     * that identify the caption resources that should be retrieved. Each ID must
     * identify a caption track associated with the specified video.
     */
    public function listCaptions($part, $videoId, $optParams = [])
    {
        $params = ['part' => $part, 'videoId' => $videoId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_CaptionListResponse");
    }

    /**
     * Updates a caption track. When updating a caption track, you can change the
     * track's draft status, upload a new caption file for the track, or both.
     * (captions.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                 It identifies the properties that the write operation will set as well as the
     *                                                                 properties that the API response will include. Set the property value to
     *                                                                 snippet if you are updating the track's draft status. Otherwise, set the
     *                                                                 property value to id.
     * @param Google_Caption|Google_Service_YouTube_Caption $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string onBehalfOf ID of the Google+ Page for the channel that the
     * request is be on behalf of
     * @opt_param string debugProjectIdOverride The debugProjectIdOverride parameter
     * should be used for mimicking a request for a certain project ID.
     * @opt_param bool sync Note: The API server only processes the parameter value
     * if the request contains an updated caption file.
     *
     * The sync parameter indicates whether YouTube should automatically synchronize
     * the caption file with the audio track of the video. If you set the value to
     * true, YouTube will automatically synchronize the caption track with the audio
     * track.
     */
    public function update($part, Google_Service_YouTube_Caption $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_Caption");
    }
}

/**
 * The "channelBanners" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $channelBanners = $youtubeService->channelBanners;
 *  </code>
 */
class Google_Service_YouTube_ChannelBanners_Resource extends Google_Service_Resource
{

    /**
     * Uploads a channel banner image to YouTube. This method represents the first
     * two steps in a three-step process to update the banner image for a channel:
     *
     * - Call the channelBanners.insert method to upload the binary image data to
     * YouTube. The image must have a 16:9 aspect ratio and be at least 2120x1192
     * pixels. - Extract the url property's value from the response that the API
     * returns for step 1. - Call the channels.update method to update the channel's
     * branding settings. Set the brandingSettings.image.bannerExternalUrl
     * property's value to the URL obtained in step 2. (channelBanners.insert)
     *
     * @param Google_ChannelBannerResource|Google_Service_YouTube_ChannelBannerResource $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert(Google_Service_YouTube_ChannelBannerResource $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_ChannelBannerResource");
    }
}

/**
 * The "channelSections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $channelSections = $youtubeService->channelSections;
 *  </code>
 */
class Google_Service_YouTube_ChannelSections_Resource extends Google_Service_Resource
{

    /**
     * Deletes a channelSection. (channelSections.delete)
     *
     * @param string $id The id parameter specifies the YouTube channelSection ID
     *                          for the resource that is being deleted. In a channelSection resource, the id
     *                          property specifies the YouTube channelSection ID.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Adds a channelSection for the authenticated user's channel.
     * (channelSections.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                               It identifies the properties that the write operation will set as well as the
     *                                                                               properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * contentDetails.
     * @param Google_ChannelSection|Google_Service_YouTube_ChannelSection $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert($part, Google_Service_YouTube_ChannelSection $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_ChannelSection");
    }

    /**
     * Returns channelSection resources that match the API request criteria.
     * (channelSections.listChannelSections)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more channelSection resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, and contentDetails.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a
     * channelSection resource, the snippet property contains other properties, such
     * as a display title for the channelSection. If you set part=snippet, the API
     * response will also contain all of those nested properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string channelId The channelId parameter specifies a YouTube
     * channel ID. The API will only return that channel's channelSections.
     * @opt_param bool mine Set this parameter's value to true to retrieve a feed of
     * the authenticated user's channelSections.
     * @opt_param string hl The hl parameter indicates that the snippet.localized
     * property values in the returned channelSection resources should be in the
     * specified language if localized values for that language are available. For
     * example, if the API request specifies hl=de, the snippet.localized properties
     * in the API response will contain German titles if German titles are
     * available. Channel owners can provide localized channel section titles using
     * either the channelSections.insert or channelSections.update method.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube channelSection ID(s) for the resource(s) that are being retrieved. In
     * a channelSection resource, the id property specifies the YouTube
     * channelSection ID.
     */
    public function listChannelSections($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_ChannelSectionListResponse");
    }

    /**
     * Update a channelSection. (channelSections.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                               It identifies the properties that the write operation will set as well as the
     *                                                                               properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * contentDetails.
     * @param Google_ChannelSection|Google_Service_YouTube_ChannelSection $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function update($part, Google_Service_YouTube_ChannelSection $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_ChannelSection");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $channels = $youtubeService->channels;
 *  </code>
 */
class Google_Service_YouTube_Channels_Resource extends Google_Service_Resource
{

    /**
     * Returns a collection of zero or more channel resources that match the request
     * criteria. (channels.listChannels)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more channel resource properties that the API response will include.
     *                          The part names that you can include in the parameter value are id, snippet,
     *                          contentDetails, statistics, topicDetails, and invideoPromotion.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a channel
     * resource, the contentDetails property contains other properties, such as the
     * uploads properties. As such, if you set part=contentDetails, the API response
     * will also contain all of those nested properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool managedByMe Set this parameter's value to true to instruct
     * the API to only return channels managed by the content owner that the
     * onBehalfOfContentOwner parameter specifies. The user must be authenticated as
     * a CMS account linked to the specified content owner and
     * onBehalfOfContentOwner must be provided.
     * @opt_param string onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     * indicates that the authenticated user is acting on behalf of the content
     * owner specified in the parameter value. This parameter is intended for
     * YouTube content partners that own and manage many different YouTube channels.
     * It allows content owners to authenticate once and get access to all their
     * video and channel data, without having to provide authentication credentials
     * for each individual channel. The actual CMS account that the user
     * authenticates with needs to be linked to the specified YouTube content owner.
     * @opt_param string forUsername The forUsername parameter specifies a YouTube
     * username, thereby requesting the channel associated with that username.
     * @opt_param bool mine Set this parameter's value to true to instruct the API
     * to only return channels owned by the authenticated user.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube channel ID(s) for the resource(s) that are being retrieved. In a
     * channel resource, the id property specifies the channel's YouTube channel ID.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param bool mySubscribers Set this parameter's value to true to retrieve
     * a list of channels that subscribed to the authenticated user's channel.
     * @opt_param string hl The hl parameter should be used for filter out the
     * properties that are not in the given language. Used for the brandingSettings
     * part.
     * @opt_param string categoryId The categoryId parameter specifies a YouTube
     * guide category, thereby requesting YouTube channels associated with that
     * category.
     */
    public function listChannels($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_ChannelListResponse");
    }

    /**
     * Updates a channel's metadata. (channels.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                 It identifies the properties that the write operation will set as well as the
     *                                                                 properties that the API response will include.
     *
     * The part names that you can include in the parameter value are id and
     * invideoPromotion.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies.
     * @param Google_Channel|Google_Service_YouTube_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     * indicates that the authenticated user is acting on behalf of the content
     * owner specified in the parameter value. This parameter is intended for
     * YouTube content partners that own and manage many different YouTube channels.
     * It allows content owners to authenticate once and get access to all their
     * video and channel data, without having to provide authentication credentials
     * for each individual channel. The actual CMS account that the user
     * authenticates with needs to be linked to the specified YouTube content owner.
     */
    public function update($part, Google_Service_YouTube_Channel $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_Channel");
    }
}

/**
 * The "commentThreads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $commentThreads = $youtubeService->commentThreads;
 *  </code>
 */
class Google_Service_YouTube_CommentThreads_Resource extends Google_Service_Resource
{

    /**
     * Creates a new comment thread and top level comment. (commentThreads.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                             It identifies the properties that the write operation will set as well as the
     *                                                                             properties that the API response will include.
     *
     * The part names that you can include in the parameter value are id and
     * snippet. However only snippet contains properties that can be set.
     * @param Google_CommentThread|Google_Service_YouTube_CommentThread $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool shareOnGooglePlus The shareOnGooglePlus determines whether
     * this thread should also be posted on Google+.
     */
    public function insert($part, Google_Service_YouTube_CommentThread $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_CommentThread");
    }

    /**
     * Returns a list of comment threads that match the API request parameters.
     * (commentThreads.listCommentThreads)
     *
     * @param string $part The part parameter specifies the commentThread resource
     *                          parts that the API response will include. Supported values are id, snippet
     *                          and replies.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchTerms The searchTerms parameter instructs the API to
     * limit the returned comments to those which contain the specified search
     * terms.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string allThreadsRelatedToChannelId The
     * allThreadsRelatedToChannelId parameter instructs the API to return the
     * comment threads of all videos of the channel and the channel comments as
     * well.
     * @opt_param string channelId The channelId parameter instructs the API to
     * return the comment threads for all the channel comments (not including
     * comments left on videos).
     * @opt_param string videoId The videoId parameter instructs the API to return
     * the comment threads for the video specified by the video id.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken property identifies the next page of the result that can be
     * retrieved.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string moderationStatus Set this parameter to limit the returned
     * comment threads to a particular moderation state.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string textFormat Set this parameter's value to html or plainText
     * to instruct the API to return the comments left by users in html formatted or
     * in plain text.
     * @opt_param string id The id parameter specifies a comma-separated list of
     * comment thread IDs for the resources that should be retrieved.
     */
    public function listCommentThreads($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_CommentThreadListResponse");
    }

    /**
     * Modifies an existing comment. (commentThreads.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                             It identifies the properties that the write operation will set as well as the
     *                                                                             properties that the API response will include.
     *
     * The part names that you can include in the parameter value are id, snippet
     * and replies. However only snippet contains properties that can be updated.
     * @param Google_CommentThread|Google_Service_YouTube_CommentThread $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($part, Google_Service_YouTube_CommentThread $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_CommentThread");
    }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $comments = $youtubeService->comments;
 *  </code>
 */
class Google_Service_YouTube_Comments_Resource extends Google_Service_Resource
{

    /**
     * Deletes a comment. (comments.delete)
     *
     * @param string $id The id parameter specifies the comment ID for the resource
     *                          that should be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a new comment.
     *
     * Note: to create a top level comment it is also necessary to create a comment
     * thread. Both are accomplished through the commentThreads resource.
     * (comments.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                 It identifies the properties that the write operation will set as well as the
     *                                                                 properties that the API response will include.
     *
     * The part names that you can include in the parameter value are id and
     * snippet. However only snippet contains properties that can be set.
     * @param Google_Comment|Google_Service_YouTube_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($part, Google_Service_YouTube_Comment $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Comment");
    }

    /**
     * Returns a list of comments that match the API request parameters.
     * (comments.listComments)
     *
     * @param string $part The part parameter specifies the comment resource parts
     *                          that the API response will include. Supported values are id and snippet.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken property identifies the next page of the result that can be
     * retrieved.
     *
     * Note: This parameter is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string parentId The parentId parameter specifies the ID of the
     * comment for which replies should be retrieved.
     *
     * Note: Currently YouTube features only one level of replies (ie replies to top
     * level comments). However replies to replies may be supported in the future.
     * @opt_param string textFormat Set this parameter's value to html or plainText
     * to instruct the API to return the comments left by users formatted as HTML or
     * as plain text.
     * @opt_param string id The id parameter specifies a comma-separated list of
     * comment IDs for the resources that should be retrieved.
     */
    public function listComments($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_CommentListResponse");
    }

    /**
     * Expresses the caller's opinion that a comment is spam. (comments.markAsSpam)
     *
     * @param string $id The id parameter specifies a comma-separated list of IDs of
     *                          comments which should get flagged as spam.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function markAsSpam($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('markAsSpam', [$params]);
    }

    /**
     * Sets the moderation status of one or more comments.
     * (comments.setModerationStatus)
     *
     * @param string $id The id parameter specifies a comma-separated list of IDs of
     *                                 comments whose moderation status should be updated.
     * @param string $moderationStatus Determines the new moderation status of the
     *                                 specified comments.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool banAuthor The banAuthor paramter, if set to true, adds the
     * author of the comment to the ban list. This means all future comments of the
     * author will autmomatically be rejected.
     *
     * Note: This parameter is only valid in combination with moderationStatus
     * 'rejected'.
     */
    public function setModerationStatus($id, $moderationStatus, $optParams = [])
    {
        $params = ['id' => $id, 'moderationStatus' => $moderationStatus];
        $params = array_merge($params, $optParams);

        return $this->call('setModerationStatus', [$params]);
    }

    /**
     * Modifies an existing comment. (comments.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                 It identifies the properties that the write operation will set as well as the
     *                                                                 properties that the API response will include.
     *
     * The part names that you can include in the parameter value are id and
     * snippet. However only snippet contains properties that can be updated.
     * @param Google_Comment|Google_Service_YouTube_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($part, Google_Service_YouTube_Comment $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_Comment");
    }
}

/**
 * The "guideCategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $guideCategories = $youtubeService->guideCategories;
 *  </code>
 */
class Google_Service_YouTube_GuideCategories_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of categories that can be associated with YouTube channels.
     * (guideCategories.listGuideCategories)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more guideCategory resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id
     *                          and snippet.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a
     * guideCategory resource, the snippet property contains other properties, such
     * as the category's title. If you set part=snippet, the API response will also
     * contain all of those nested properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string regionCode The regionCode parameter instructs the API to
     * return the list of guide categories available in the specified country. The
     * parameter value is an ISO 3166-1 alpha-2 country code.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube channel category ID(s) for the resource(s) that are being retrieved.
     * In a guideCategory resource, the id property specifies the YouTube channel
     * category ID.
     * @opt_param string hl The hl parameter specifies the language that will be
     * used for text values in the API response.
     */
    public function listGuideCategories($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_GuideCategoryListResponse");
    }
}

/**
 * The "i18nLanguages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $i18nLanguages = $youtubeService->i18nLanguages;
 *  </code>
 */
class Google_Service_YouTube_I18nLanguages_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of supported languages. (i18nLanguages.listI18nLanguages)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more i18nLanguage resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id
     *                          and snippet.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string hl The hl parameter specifies the language that should be
     * used for text values in the API response.
     */
    public function listI18nLanguages($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_I18nLanguageListResponse");
    }
}

/**
 * The "i18nRegions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $i18nRegions = $youtubeService->i18nRegions;
 *  </code>
 */
class Google_Service_YouTube_I18nRegions_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of supported regions. (i18nRegions.listI18nRegions)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more i18nRegion resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id
     *                          and snippet.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string hl The hl parameter specifies the language that should be
     * used for text values in the API response.
     */
    public function listI18nRegions($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_I18nRegionListResponse");
    }
}

/**
 * The "liveBroadcasts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveBroadcasts = $youtubeService->liveBroadcasts;
 *  </code>
 */
class Google_Service_YouTube_LiveBroadcasts_Resource extends Google_Service_Resource
{

    /**
     * Binds a YouTube broadcast to a stream or removes an existing binding between
     * a broadcast and a stream. A broadcast can only be bound to one video stream.
     * (liveBroadcasts.bind)
     *
     * @param string $id The id parameter specifies the unique ID of the broadcast
     *                          that is being bound to a video stream.
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more liveBroadcast resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, contentDetails, and status.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string streamId The streamId parameter specifies the unique ID of
     * the video stream that is being bound to a broadcast. If this parameter is
     * omitted, the API will remove any existing binding between the broadcast and a
     * video stream.
     */
    public function bind($id, $part, $optParams = [])
    {
        $params = ['id' => $id, 'part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('bind', [$params], "Google_Service_YouTube_LiveBroadcast");
    }

    /**
     * Controls the settings for a slate that can be displayed in the broadcast
     * stream. (liveBroadcasts.control)
     *
     * @param string $id The id parameter specifies the YouTube live broadcast ID
     *                          that uniquely identifies the broadcast in which the slate is being updated.
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more liveBroadcast resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, contentDetails, and status.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param bool displaySlate The displaySlate parameter specifies whether the
     * slate is being enabled or disabled.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string offsetTimeMs The offsetTimeMs parameter specifies a
     * positive time offset when the specified slate change will occur. The value is
     * measured in milliseconds from the beginning of the broadcast's monitor
     * stream, which is the time that the testing phase for the broadcast began.
     * Even though it is specified in milliseconds, the value is actually an
     * approximation, and YouTube completes the requested action as closely as
     * possible to that time.
     *
     * If you do not specify a value for this parameter, then YouTube performs the
     * action as soon as possible. See the Getting started guide for more details.
     *
     * Important: You should only specify a value for this parameter if your
     * broadcast stream is delayed.
     * @opt_param string walltime The walltime parameter specifies the wall clock
     * time at which the specified slate change will occur. The value is specified
     * in ISO 8601 (YYYY-MM-DDThh:mm:ss.sssZ) format.
     */
    public function control($id, $part, $optParams = [])
    {
        $params = ['id' => $id, 'part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('control', [$params], "Google_Service_YouTube_LiveBroadcast");
    }

    /**
     * Deletes a broadcast. (liveBroadcasts.delete)
     *
     * @param string $id The id parameter specifies the YouTube live broadcast ID
     *                          for the resource that is being deleted.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a broadcast. (liveBroadcasts.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                             It identifies the properties that the write operation will set as well as the
     *                                                                             properties that the API response will include.
     *
     * The part properties that you can include in the parameter value are id,
     * snippet, contentDetails, and status.
     * @param Google_LiveBroadcast|Google_Service_YouTube_LiveBroadcast $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_LiveBroadcast");
    }

    /**
     * Returns a list of YouTube broadcasts that match the API request parameters.
     * (liveBroadcasts.listLiveBroadcasts)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more liveBroadcast resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, contentDetails, and status.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string broadcastStatus The broadcastStatus parameter filters the
     * API response to only include broadcasts with the specified status.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param bool mine The mine parameter can be used to instruct the API to
     * only return broadcasts owned by the authenticated user. Set the parameter
     * value to true to only retrieve your own broadcasts.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param string id The id parameter specifies a comma-separated list of
     * YouTube broadcast IDs that identify the broadcasts being retrieved. In a
     * liveBroadcast resource, the id property specifies the broadcast's ID.
     */
    public function listLiveBroadcasts($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_LiveBroadcastListResponse");
    }

    /**
     * Changes the status of a YouTube live broadcast and initiates any processes
     * associated with the new status. For example, when you transition a
     * broadcast's status to testing, YouTube starts to transmit video to that
     * broadcast's monitor stream. Before calling this method, you should confirm
     * that the value of the status.streamStatus property for the stream bound to
     * your broadcast is active. (liveBroadcasts.transition)
     *
     * @param string $broadcastStatus The broadcastStatus parameter identifies the
     *                                state to which the broadcast is changing. Note that to transition a broadcast
     *                                to either the testing or live state, the status.streamStatus must be active
     *                                for the stream that the broadcast is bound to.
     * @param string $id The id parameter specifies the unique ID of the broadcast
     *                                that is transitioning to another status.
     * @param string $part The part parameter specifies a comma-separated list of
     *                                one or more liveBroadcast resource properties that the API response will
     *                                include. The part names that you can include in the parameter value are id,
     *                                snippet, contentDetails, and status.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function transition($broadcastStatus, $id, $part, $optParams = [])
    {
        $params = ['broadcastStatus' => $broadcastStatus, 'id' => $id, 'part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('transition', [$params], "Google_Service_YouTube_LiveBroadcast");
    }

    /**
     * Updates a broadcast. For example, you could modify the broadcast settings
     * defined in the liveBroadcast resource's contentDetails object.
     * (liveBroadcasts.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                             It identifies the properties that the write operation will set as well as the
     *                                                                             properties that the API response will include.
     *
     * The part properties that you can include in the parameter value are id,
     * snippet, contentDetails, and status.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies. For example, a broadcast's privacy status is defined in the status
     * part. As such, if your request is updating a private or unlisted broadcast,
     * and the request's part parameter value includes the status part, the
     * broadcast's privacy setting will be updated to whatever value the request
     * body specifies. If the request body does not specify a value, the existing
     * privacy setting will be removed and the broadcast will revert to the default
     * privacy setting.
     * @param Google_LiveBroadcast|Google_Service_YouTube_LiveBroadcast $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function update($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_LiveBroadcast");
    }
}

/**
 * The "liveStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveStreams = $youtubeService->liveStreams;
 *  </code>
 */
class Google_Service_YouTube_LiveStreams_Resource extends Google_Service_Resource
{

    /**
     * Deletes a video stream. (liveStreams.delete)
     *
     * @param string $id The id parameter specifies the YouTube live stream ID for
     *                          the resource that is being deleted.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a video stream. The stream enables you to send your video to YouTube,
     * which can then broadcast the video to your audience. (liveStreams.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                       It identifies the properties that the write operation will set as well as the
     *                                                                       properties that the API response will include.
     *
     * The part properties that you can include in the parameter value are id,
     * snippet, cdn, and status.
     * @param Google_LiveStream|Google_Service_YouTube_LiveStream $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert($part, Google_Service_YouTube_LiveStream $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_LiveStream");
    }

    /**
     * Returns a list of video streams that match the API request parameters.
     * (liveStreams.listLiveStreams)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more liveStream resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, cdn, and status.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param bool mine The mine parameter can be used to instruct the API to
     * only return streams owned by the authenticated user. Set the parameter value
     * to true to only retrieve your own streams.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set. Acceptable values
     * are 0 to 50, inclusive. The default value is 5.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param string id The id parameter specifies a comma-separated list of
     * YouTube stream IDs that identify the streams being retrieved. In a liveStream
     * resource, the id property specifies the stream's ID.
     */
    public function listLiveStreams($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_LiveStreamListResponse");
    }

    /**
     * Updates a video stream. If the properties that you want to change cannot be
     * updated, then you need to create a new stream with the proper settings.
     * (liveStreams.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                       It identifies the properties that the write operation will set as well as the
     *                                                                       properties that the API response will include.
     *
     * The part properties that you can include in the parameter value are id,
     * snippet, cdn, and status.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies. If the request body does not specify a value for a mutable
     * property, the existing value for that property will be removed.
     * @param Google_LiveStream|Google_Service_YouTube_LiveStream $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function update($part, Google_Service_YouTube_LiveStream $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_LiveStream");
    }
}

/**
 * The "playlistItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $playlistItems = $youtubeService->playlistItems;
 *  </code>
 */
class Google_Service_YouTube_PlaylistItems_Resource extends Google_Service_Resource
{

    /**
     * Deletes a playlist item. (playlistItems.delete)
     *
     * @param string $id The id parameter specifies the YouTube playlist item ID for
     *                          the playlist item that is being deleted. In a playlistItem resource, the id
     *                          property specifies the playlist item's ID.
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
     * Adds a resource to a playlist. (playlistItems.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                           It identifies the properties that the write operation will set as well as the
     *                                                                           properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet,
     * contentDetails, and status.
     * @param Google_PlaylistItem|Google_Service_YouTube_PlaylistItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert($part, Google_Service_YouTube_PlaylistItem $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_PlaylistItem");
    }

    /**
     * Returns a collection of playlist items that match the API request parameters.
     * You can retrieve all of the playlist items in a specified playlist or
     * retrieve one or more playlist items by their unique IDs.
     * (playlistItems.listPlaylistItems)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more playlistItem resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, contentDetails, and status.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a
     * playlistItem resource, the snippet property contains numerous fields,
     * including the title, description, position, and resourceId properties. As
     * such, if you set part=snippet, the API response will contain all of those
     * properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string playlistId The playlistId parameter specifies the unique ID
     * of the playlist for which you want to retrieve playlist items. Note that even
     * though this is an optional parameter, every request to retrieve playlist
     * items must specify a value for either the id parameter or the playlistId
     * parameter.
     * @opt_param string videoId The videoId parameter specifies that the request
     * should return only the playlist items that contain the specified video.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param string id The id parameter specifies a comma-separated list of one
     * or more unique playlist item IDs.
     */
    public function listPlaylistItems($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_PlaylistItemListResponse");
    }

    /**
     * Modifies a playlist item. For example, you could update the item's position
     * in the playlist. (playlistItems.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                           It identifies the properties that the write operation will set as well as the
     *                                                                           properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet,
     * contentDetails, and status.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies. For example, a playlist item can specify a start time and end
     * time, which identify the times portion of the video that should play when
     * users watch the video in the playlist. If your request is updating a playlist
     * item that sets these values, and the request's part parameter value includes
     * the contentDetails part, the playlist item's start and end times will be
     * updated to whatever value the request body specifies. If the request body
     * does not specify values, the existing start and end times will be removed and
     * replaced with the default settings.
     * @param Google_PlaylistItem|Google_Service_YouTube_PlaylistItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($part, Google_Service_YouTube_PlaylistItem $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_PlaylistItem");
    }
}

/**
 * The "playlists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $playlists = $youtubeService->playlists;
 *  </code>
 */
class Google_Service_YouTube_Playlists_Resource extends Google_Service_Resource
{

    /**
     * Deletes a playlist. (playlists.delete)
     *
     * @param string $id The id parameter specifies the YouTube playlist ID for the
     *                          playlist that is being deleted. In a playlist resource, the id property
     *                          specifies the playlist's ID.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a playlist. (playlists.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                   It identifies the properties that the write operation will set as well as the
     *                                                                   properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * status.
     * @param Google_Playlist|Google_Service_YouTube_Playlist $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function insert($part, Google_Service_YouTube_Playlist $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Playlist");
    }

    /**
     * Returns a collection of playlists that match the API request parameters. For
     * example, you can retrieve all playlists that the authenticated user owns, or
     * you can retrieve one or more playlists by their unique IDs.
     * (playlists.listPlaylists)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more playlist resource properties that the API response will include.
     *                          The part names that you can include in the parameter value are id, snippet,
     *                          status, and contentDetails.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a playlist
     * resource, the snippet property contains properties like author, title,
     * description, tags, and timeCreated. As such, if you set part=snippet, the API
     * response will contain all of those properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string channelId This value indicates that the API should only
     * return the specified channel's playlists.
     * @opt_param bool mine Set this parameter's value to true to instruct the API
     * to only return playlists owned by the authenticated user.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param string hl The hl parameter should be used for filter out the
     * properties that are not in the given language. Used for the snippet part.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube playlist ID(s) for the resource(s) that are being retrieved. In a
     * playlist resource, the id property specifies the playlist's YouTube playlist
     * ID.
     */
    public function listPlaylists($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_PlaylistListResponse");
    }

    /**
     * Modifies a playlist. For example, you could change a playlist's title,
     * description, or privacy status. (playlists.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                   It identifies the properties that the write operation will set as well as the
     *                                                                   properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * status.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies. For example, a playlist's privacy setting is contained in the
     * status part. As such, if your request is updating a private playlist, and the
     * request's part parameter value includes the status part, the playlist's
     * privacy setting will be updated to whatever value the request body specifies.
     * If the request body does not specify a value, the existing privacy setting
     * will be removed and the playlist will revert to the default privacy setting.
     * @param Google_Playlist|Google_Service_YouTube_Playlist $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function update($part, Google_Service_YouTube_Playlist $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_Playlist");
    }
}

/**
 * The "search" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $search = $youtubeService->search;
 *  </code>
 */
class Google_Service_YouTube_Search_Resource extends Google_Service_Resource
{

    /**
     * Returns a collection of search results that match the query parameters
     * specified in the API request. By default, a search result set identifies
     * matching video, channel, and playlist resources, but you can also configure
     * queries to only retrieve a specific type of resource. (search.listSearch)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more search resource properties that the API response will include.
     *                          The part names that you can include in the parameter value are id and
     *                          snippet.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a search
     * result, the snippet property contains other properties that identify the
     * result's title, description, and so forth. If you set part=snippet, the API
     * response will also contain all of those nested properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string eventType The eventType parameter restricts a search to
     * broadcast events.
     * @opt_param string channelId The channelId parameter indicates that the API
     * response should only contain resources created by the channel
     * @opt_param bool forDeveloper The forDeveloper parameter restricts the search
     * to only retrieve videos uploaded via the developer's application or website.
     * The API server uses the request's authorization credentials to identify the
     * developer. Therefore, a developer can restrict results to videos uploaded
     * through the developer's own app or website but not to videos uploaded through
     * other apps or sites.
     * @opt_param string videoSyndicated The videoSyndicated parameter lets you to
     * restrict a search to only videos that can be played outside youtube.com.
     * @opt_param string channelType The channelType parameter lets you restrict a
     * search to a particular type of channel.
     * @opt_param string videoCaption The videoCaption parameter indicates whether
     * the API should filter video search results based on whether they have
     * captions.
     * @opt_param string publishedAfter The publishedAfter parameter indicates that
     * the API response should only contain resources created after the specified
     * time. The value is an RFC 3339 formatted date-time value
     * (1970-01-01T00:00:00Z).
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param bool forContentOwner Note: This parameter is intended exclusively
     * for YouTube content partners.
     *
     * The forContentOwner parameter restricts the search to only retrieve resources
     * owned by the content owner specified by the onBehalfOfContentOwner parameter.
     * The user must be authenticated using a CMS account linked to the specified
     * content owner and onBehalfOfContentOwner must be provided.
     * @opt_param string regionCode The regionCode parameter instructs the API to
     * return search results for the specified country. The parameter value is an
     * ISO 3166-1 alpha-2 country code.
     * @opt_param string location The location parameter restricts a search to
     * videos that have a geographical location specified in their metadata. The
     * value is a string that specifies geographic latitude/longitude coordinates
     * e.g. (37.42307,-122.08427)
     * @opt_param string locationRadius The locationRadius, in conjunction with the
     * location parameter, defines a geographic area. If the geographic coordinates
     * associated with a video fall within that area, then the video may be included
     * in search results. This parameter value must be a floating point number
     * followed by a measurement unit. Valid measurement units are m, km, ft, and
     * mi. For example, valid parameter values include 1500m, 5km, 10000ft, and
     * 0.75mi. The API does not support locationRadius parameter values larger than
     * 1000 kilometers.
     * @opt_param string videoType The videoType parameter lets you restrict a
     * search to a particular type of videos.
     * @opt_param string type The type parameter restricts a search query to only
     * retrieve a particular type of resource. The value is a comma-separated list
     * of resource types.
     * @opt_param string topicId The topicId parameter indicates that the API
     * response should only contain resources associated with the specified topic.
     * The value identifies a Freebase topic ID.
     * @opt_param string publishedBefore The publishedBefore parameter indicates
     * that the API response should only contain resources created before the
     * specified time. The value is an RFC 3339 formatted date-time value
     * (1970-01-01T00:00:00Z).
     * @opt_param string videoDimension The videoDimension parameter lets you
     * restrict a search to only retrieve 2D or 3D videos.
     * @opt_param string videoLicense The videoLicense parameter filters search
     * results to only include videos with a particular license. YouTube lets video
     * uploaders choose to attach either the Creative Commons license or the
     * standard YouTube license to each of their videos.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string relatedToVideoId The relatedToVideoId parameter retrieves a
     * list of videos that are related to the video that the parameter value
     * identifies. The parameter value must be set to a YouTube video ID and, if you
     * are using this parameter, the type parameter must be set to video.
     * @opt_param string videoDefinition The videoDefinition parameter lets you
     * restrict a search to only include either high definition (HD) or standard
     * definition (SD) videos. HD videos are available for playback in at least
     * 720p, though higher resolutions, like 1080p, might also be available.
     * @opt_param string videoDuration The videoDuration parameter filters video
     * search results based on their duration.
     * @opt_param string relevanceLanguage The relevanceLanguage parameter instructs
     * the API to return search results that are most relevant to the specified
     * language. The parameter value is typically an ISO 639-1 two-letter language
     * code. However, you should use the values zh-Hans for simplified Chinese and
     * zh-Hant for traditional Chinese. Please note that results in other languages
     * will still be returned if they are highly relevant to the search query term.
     * @opt_param bool forMine The forMine parameter restricts the search to only
     * retrieve videos owned by the authenticated user. If you set this parameter to
     * true, then the type parameter's value must also be set to video.
     * @opt_param string q The q parameter specifies the query term to search for.
     * @opt_param string safeSearch The safeSearch parameter indicates whether the
     * search results should include restricted content as well as standard content.
     * @opt_param string videoEmbeddable The videoEmbeddable parameter lets you to
     * restrict a search to only videos that can be embedded into a webpage.
     * @opt_param string videoCategoryId The videoCategoryId parameter filters video
     * search results based on their category.
     * @opt_param string order The order parameter specifies the method that will be
     * used to order resources in the API response.
     */
    public function listSearch($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_SearchListResponse");
    }
}

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $subscriptions = $youtubeService->subscriptions;
 *  </code>
 */
class Google_Service_YouTube_Subscriptions_Resource extends Google_Service_Resource
{

    /**
     * Deletes a subscription. (subscriptions.delete)
     *
     * @param string $id The id parameter specifies the YouTube subscription ID for
     *                          the resource that is being deleted. In a subscription resource, the id
     *                          property specifies the YouTube subscription ID.
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
     * Adds a subscription for the authenticated user's channel.
     * (subscriptions.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                                           It identifies the properties that the write operation will set as well as the
     *                                                                           properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet and
     * contentDetails.
     * @param Google_Service_YouTube_Subscription|Google_Subscription $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($part, Google_Service_YouTube_Subscription $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Subscription");
    }

    /**
     * Returns subscription resources that match the API request criteria.
     * (subscriptions.listSubscriptions)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more subscription resource properties that the API response will
     *                          include. The part names that you can include in the parameter value are id,
     *                          snippet, and contentDetails.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a
     * subscription resource, the snippet property contains other properties, such
     * as a display title for the subscription. If you set part=snippet, the API
     * response will also contain all of those nested properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param string channelId The channelId parameter specifies a YouTube
     * channel ID. The API will only return that channel's subscriptions.
     * @opt_param bool mine Set this parameter's value to true to retrieve a feed of
     * the authenticated user's subscriptions.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     * @opt_param string forChannelId The forChannelId parameter specifies a comma-
     * separated list of channel IDs. The API response will then only contain
     * subscriptions matching those channels.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     * @opt_param bool mySubscribers Set this parameter's value to true to retrieve
     * a feed of the subscribers of the authenticated user.
     * @opt_param string order The order parameter specifies the method that will be
     * used to sort resources in the API response.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube subscription ID(s) for the resource(s) that are being retrieved. In a
     * subscription resource, the id property specifies the YouTube subscription ID.
     */
    public function listSubscriptions($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_SubscriptionListResponse");
    }
}

/**
 * The "thumbnails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $thumbnails = $youtubeService->thumbnails;
 *  </code>
 */
class Google_Service_YouTube_Thumbnails_Resource extends Google_Service_Resource
{

    /**
     * Uploads a custom video thumbnail to YouTube and sets it for a video.
     * (thumbnails.set)
     *
     * @param string $videoId The videoId parameter specifies a YouTube video ID for
     *                          which the custom video thumbnail is being provided.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     * indicates that the authenticated user is acting on behalf of the content
     * owner specified in the parameter value. This parameter is intended for
     * YouTube content partners that own and manage many different YouTube channels.
     * It allows content owners to authenticate once and get access to all their
     * video and channel data, without having to provide authentication credentials
     * for each individual channel. The actual CMS account that the user
     * authenticates with needs to be linked to the specified YouTube content owner.
     */
    public function set($videoId, $optParams = [])
    {
        $params = ['videoId' => $videoId];
        $params = array_merge($params, $optParams);

        return $this->call('set', [$params], "Google_Service_YouTube_ThumbnailSetResponse");
    }
}

/**
 * The "videoAbuseReportReasons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $videoAbuseReportReasons = $youtubeService->videoAbuseReportReasons;
 *  </code>
 */
class Google_Service_YouTube_VideoAbuseReportReasons_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of abuse reasons that can be used for reporting abusive
     * videos. (videoAbuseReportReasons.listVideoAbuseReportReasons)
     *
     * @param string $part The part parameter specifies the videoCategory resource
     *                          parts that the API response will include. Supported values are id and
     *                          snippet.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string hl The hl parameter specifies the language that should be
     * used for text values in the API response.
     */
    public function listVideoAbuseReportReasons($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_VideoAbuseReportReasonListResponse");
    }
}

/**
 * The "videoCategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $videoCategories = $youtubeService->videoCategories;
 *  </code>
 */
class Google_Service_YouTube_VideoCategories_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of categories that can be associated with YouTube videos.
     * (videoCategories.listVideoCategories)
     *
     * @param string $part The part parameter specifies the videoCategory resource
     *                          parts that the API response will include. Supported values are id and
     *                          snippet.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string regionCode The regionCode parameter instructs the API to
     * return the list of video categories available in the specified country. The
     * parameter value is an ISO 3166-1 alpha-2 country code.
     * @opt_param string id The id parameter specifies a comma-separated list of
     * video category IDs for the resources that you are retrieving.
     * @opt_param string hl The hl parameter specifies the language that should be
     * used for text values in the API response.
     */
    public function listVideoCategories($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_VideoCategoryListResponse");
    }
}

/**
 * The "videos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $videos = $youtubeService->videos;
 *  </code>
 */
class Google_Service_YouTube_Videos_Resource extends Google_Service_Resource
{

    /**
     * Deletes a YouTube video. (videos.delete)
     *
     * @param string $id The id parameter specifies the YouTube video ID for the
     *                          resource that is being deleted. In a video resource, the id property
     *                          specifies the video's ID.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The actual CMS
     * account that the user authenticates with must be linked to the specified
     * YouTube content owner.
     * @return expected_class|Google_Http_Request
     */
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves the ratings that the authorized user gave to a list of specified
     * videos. (videos.getRating)
     *
     * @param string $id The id parameter specifies a comma-separated list of the
     *                          YouTube video ID(s) for the resource(s) for which you are retrieving rating
     *                          data. In a video resource, the id property specifies the video's ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function getRating($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('getRating', [$params], "Google_Service_YouTube_VideoGetRatingResponse");
    }

    /**
     * Uploads a video to YouTube and optionally sets the video's metadata.
     * (videos.insert)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                             It identifies the properties that the write operation will set as well as the
     *                                                             properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet,
     * contentDetails, fileDetails, liveStreamingDetails, localizations, player,
     * processingDetails, recordingDetails, statistics, status, suggestions, and
     * topicDetails. However, not all of those parts contain properties that can be
     * set when setting or updating a video's metadata. For example, the statistics
     * object encapsulates statistics that YouTube calculates for a video and does
     * not contain values that you can set or modify. If the parameter value
     * specifies a part that does not contain mutable values, that part will still
     * be included in the API response.
     * @param Google_Service_YouTube_Video|Google_Video $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param bool stabilize The stabilize parameter indicates whether YouTube
     * should adjust the video to remove shaky camera motions.
     * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
     * used in a properly authorized request. Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwnerChannel parameter specifies the YouTube channel ID
     * of the channel to which a video is being added. This parameter is required
     * when a request specifies a value for the onBehalfOfContentOwner parameter,
     * and it can only be used in conjunction with that parameter. In addition, the
     * request must be authorized using a CMS account that is linked to the content
     * owner that the onBehalfOfContentOwner parameter specifies. Finally, the
     * channel that the onBehalfOfContentOwnerChannel parameter value specifies must
     * be linked to the content owner that the onBehalfOfContentOwner parameter
     * specifies.
     *
     * This parameter is intended for YouTube content partners that own and manage
     * many different YouTube channels. It allows content owners to authenticate
     * once and perform actions on behalf of the channel specified in the parameter
     * value, without having to provide authentication credentials for each separate
     * channel.
     * @opt_param bool notifySubscribers The notifySubscribers parameter indicates
     * whether YouTube should send notification to subscribers about the inserted
     * video.
     * @opt_param bool autoLevels The autoLevels parameter indicates whether YouTube
     * should automatically enhance the video's lighting and color.
     */
    public function insert($part, Google_Service_YouTube_Video $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTube_Video");
    }

    /**
     * Returns a list of videos that match the API request parameters.
     * (videos.listVideos)
     *
     * @param string $part The part parameter specifies a comma-separated list of
     *                          one or more video resource properties that the API response will include. The
     *                          part names that you can include in the parameter value are id, snippet,
     *                          contentDetails, fileDetails, liveStreamingDetails, localizations, player,
     *                          processingDetails, recordingDetails, statistics, status, suggestions, and
     *                          topicDetails.
     *
     * If the parameter identifies a property that contains child properties, the
     * child properties will be included in the response. For example, in a video
     * resource, the snippet property contains the channelId, title, description,
     * tags, and categoryId properties. As such, if you set part=snippet, the API
     * response will contain all of those properties.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @opt_param string regionCode The regionCode parameter instructs the API to
     * select a video chart available in the specified region. This parameter can
     * only be used in conjunction with the chart parameter. The parameter value is
     * an ISO 3166-1 alpha-2 country code.
     * @opt_param string locale DEPRECATED
     * @opt_param string videoCategoryId The videoCategoryId parameter identifies
     * the video category for which the chart should be retrieved. This parameter
     * can only be used in conjunction with the chart parameter. By default, charts
     * are not restricted to a particular category.
     * @opt_param string chart The chart parameter identifies the chart that you
     * want to retrieve.
     * @opt_param string maxResults The maxResults parameter specifies the maximum
     * number of items that should be returned in the result set.
     *
     * Note: This parameter is supported for use in conjunction with the myRating
     * parameter, but it is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string pageToken The pageToken parameter identifies a specific
     * page in the result set that should be returned. In an API response, the
     * nextPageToken and prevPageToken properties identify other pages that could be
     * retrieved.
     *
     * Note: This parameter is supported for use in conjunction with the myRating
     * parameter, but it is not supported for use in conjunction with the id
     * parameter.
     * @opt_param string hl The hl parameter instructs the API to return a localized
     * version of the video details. If localized text is nor available for the
     * requested language, the localizations object in the API response will contain
     * the requested information in the default language instead. The parameter
     * value is a BCP-47 language code. Your application can determine whether the
     * requested localization was returned by checking the value of the
     * snippet.localized.language property in the API response.
     * @opt_param string myRating Set this parameter's value to like or dislike to
     * instruct the API to only return videos liked or disliked by the authenticated
     * user.
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube video ID(s) for the resource(s) that are being retrieved. In a video
     * resource, the id property specifies the video's ID.
     */
    public function listVideos($part, $optParams = [])
    {
        $params = ['part' => $part];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTube_VideoListResponse");
    }

    /**
     * Add a like or dislike rating to a video or remove a rating from a video.
     * (videos.rate)
     *
     * @param string $id The id parameter specifies the YouTube video ID of the
     *                          video that is being rated or having its rating removed.
     * @param string $rating Specifies the rating to record.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     * @return expected_class|Google_Http_Request
     */
    public function rate($id, $rating, $optParams = [])
    {
        $params = ['id' => $id, 'rating' => $rating];
        $params = array_merge($params, $optParams);

        return $this->call('rate', [$params]);
    }

    /**
     * Report abuse for a video. (videos.reportAbuse)
     *
     * @param Google_Service_YouTube_VideoAbuseReport|Google_VideoAbuseReport $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The CMS account that
     * the user authenticates with must be linked to the specified YouTube content
     * owner.
     */
    public function reportAbuse(Google_Service_YouTube_VideoAbuseReport $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('reportAbuse', [$params]);
    }

    /**
     * Updates a video's metadata. (videos.update)
     *
     * @param string $part The part parameter serves two purposes in this operation.
     *                                                             It identifies the properties that the write operation will set as well as the
     *                                                             properties that the API response will include.
     *
     * The part names that you can include in the parameter value are snippet,
     * contentDetails, fileDetails, liveStreamingDetails, localizations, player,
     * processingDetails, recordingDetails, statistics, status, suggestions, and
     * topicDetails.
     *
     * Note that this method will override the existing values for all of the
     * mutable properties that are contained in any parts that the parameter value
     * specifies. For example, a video's privacy setting is contained in the status
     * part. As such, if your request is updating a private video, and the request's
     * part parameter value includes the status part, the video's privacy setting
     * will be updated to whatever value the request body specifies. If the request
     * body does not specify a value, the existing privacy setting will be removed
     * and the video will revert to the default privacy setting.
     *
     * In addition, not all of those parts contain properties that can be set when
     * setting or updating a video's metadata. For example, the statistics object
     * encapsulates statistics that YouTube calculates for a video and does not
     * contain values that you can set or modify. If the parameter value specifies a
     * part that does not contain mutable values, that part will still be included
     * in the API response.
     * @param Google_Service_YouTube_Video|Google_Video $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
     * exclusively for YouTube content partners.
     *
     * The onBehalfOfContentOwner parameter indicates that the request's
     * authorization credentials identify a YouTube CMS user who is acting on behalf
     * of the content owner specified in the parameter value. This parameter is
     * intended for YouTube content partners that own and manage many different
     * YouTube channels. It allows content owners to authenticate once and get
     * access to all their video and channel data, without having to provide
     * authentication credentials for each individual channel. The actual CMS
     * account that the user authenticates with must be linked to the specified
     * YouTube content owner.
     */
    public function update($part, Google_Service_YouTube_Video $postBody, $optParams = [])
    {
        $params = ['part' => $part, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTube_Video");
    }
}

/**
 * The "watermarks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $watermarks = $youtubeService->watermarks;
 *  </code>
 */
class Google_Service_YouTube_Watermarks_Resource extends Google_Service_Resource
{

    /**
     * Uploads a watermark image to YouTube and sets it for a channel.
     * (watermarks.set)
     *
     * @param string $channelId The channelId parameter specifies a YouTube channel
     *                                                                                 ID for which the watermark is being provided.
     * @param Google_InvideoBranding|Google_Service_YouTube_InvideoBranding $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     * indicates that the authenticated user is acting on behalf of the content
     * owner specified in the parameter value. This parameter is intended for
     * YouTube content partners that own and manage many different YouTube channels.
     * It allows content owners to authenticate once and get access to all their
     * video and channel data, without having to provide authentication credentials
     * for each individual channel. The actual CMS account that the user
     * authenticates with needs to be linked to the specified YouTube content owner.
     */
    public function set($channelId, Google_Service_YouTube_InvideoBranding $postBody, $optParams = [])
    {
        $params = ['channelId' => $channelId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('set', [$params]);
    }

    /**
     * Deletes a watermark. (watermarks.unsetWatermarks)
     *
     * @param string $channelId The channelId parameter specifies a YouTube channel
     *                          ID for which the watermark is being unset.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     * indicates that the authenticated user is acting on behalf of the content
     * owner specified in the parameter value. This parameter is intended for
     * YouTube content partners that own and manage many different YouTube channels.
     * It allows content owners to authenticate once and get access to all their
     * video and channel data, without having to provide authentication credentials
     * for each individual channel. The actual CMS account that the user
     * authenticates with needs to be linked to the specified YouTube content owner.
     * @return expected_class|Google_Http_Request
     */
    public function unsetWatermarks($channelId, $optParams = [])
    {
        $params = ['channelId' => $channelId];
        $params = array_merge($params, $optParams);

        return $this->call('unset', [$params]);
    }
}


/**
 * Class Google_Service_YouTube_AccessPolicy
 */
class Google_Service_YouTube_AccessPolicy extends Google_Collection
{
    public $allowed;
    public $exception;
    protected $collection_key = 'exception';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
    }

    /**
     * @param $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return mixed
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }
}

/**
 * Class Google_Service_YouTube_Activity
 */
class Google_Service_YouTube_Activity extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_ActivityContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_ActivitySnippet';
    protected $snippetDataType = '';


    /**
     * @param Google_Service_YouTube_ActivityContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_ActivityContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param Google_Service_YouTube_ActivitySnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_ActivitySnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetails
 */
class Google_Service_YouTube_ActivityContentDetails extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $bulletinType = 'Google_Service_YouTube_ActivityContentDetailsBulletin';
    protected $bulletinDataType = '';
    protected $channelItemType = 'Google_Service_YouTube_ActivityContentDetailsChannelItem';
    protected $channelItemDataType = '';
    protected $commentType = 'Google_Service_YouTube_ActivityContentDetailsComment';
    protected $commentDataType = '';
    protected $favoriteType = 'Google_Service_YouTube_ActivityContentDetailsFavorite';
    protected $favoriteDataType = '';
    protected $likeType = 'Google_Service_YouTube_ActivityContentDetailsLike';
    protected $likeDataType = '';
    protected $playlistItemType = 'Google_Service_YouTube_ActivityContentDetailsPlaylistItem';
    protected $playlistItemDataType = '';
    protected $promotedItemType = 'Google_Service_YouTube_ActivityContentDetailsPromotedItem';
    protected $promotedItemDataType = '';
    protected $recommendationType = 'Google_Service_YouTube_ActivityContentDetailsRecommendation';
    protected $recommendationDataType = '';
    protected $socialType = 'Google_Service_YouTube_ActivityContentDetailsSocial';
    protected $socialDataType = '';
    protected $subscriptionType = 'Google_Service_YouTube_ActivityContentDetailsSubscription';
    protected $subscriptionDataType = '';
    protected $uploadType = 'Google_Service_YouTube_ActivityContentDetailsUpload';
    protected $uploadDataType = '';


    /**
     * @param Google_Service_YouTube_ActivityContentDetailsBulletin $bulletin
     */
    public function setBulletin(Google_Service_YouTube_ActivityContentDetailsBulletin $bulletin)
    {
        $this->bulletin = $bulletin;
    }

    /**
     * @return mixed
     */
    public function getBulletin()
    {
        return $this->bulletin;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsChannelItem $channelItem
     */
    public function setChannelItem(Google_Service_YouTube_ActivityContentDetailsChannelItem $channelItem)
    {
        $this->channelItem = $channelItem;
    }

    /**
     * @return mixed
     */
    public function getChannelItem()
    {
        return $this->channelItem;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsComment $comment
     */
    public function setComment(Google_Service_YouTube_ActivityContentDetailsComment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsFavorite $favorite
     */
    public function setFavorite(Google_Service_YouTube_ActivityContentDetailsFavorite $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * @return mixed
     */
    public function getFavorite()
    {
        return $this->favorite;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsLike $like
     */
    public function setLike(Google_Service_YouTube_ActivityContentDetailsLike $like)
    {
        $this->like = $like;
    }

    /**
     * @return mixed
     */
    public function getLike()
    {
        return $this->like;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsPlaylistItem $playlistItem
     */
    public function setPlaylistItem(Google_Service_YouTube_ActivityContentDetailsPlaylistItem $playlistItem)
    {
        $this->playlistItem = $playlistItem;
    }

    /**
     * @return mixed
     */
    public function getPlaylistItem()
    {
        return $this->playlistItem;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsPromotedItem $promotedItem
     */
    public function setPromotedItem(Google_Service_YouTube_ActivityContentDetailsPromotedItem $promotedItem)
    {
        $this->promotedItem = $promotedItem;
    }

    /**
     * @return mixed
     */
    public function getPromotedItem()
    {
        return $this->promotedItem;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsRecommendation $recommendation
     */
    public function setRecommendation(Google_Service_YouTube_ActivityContentDetailsRecommendation $recommendation)
    {
        $this->recommendation = $recommendation;
    }

    /**
     * @return mixed
     */
    public function getRecommendation()
    {
        return $this->recommendation;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsSocial $social
     */
    public function setSocial(Google_Service_YouTube_ActivityContentDetailsSocial $social)
    {
        $this->social = $social;
    }

    /**
     * @return mixed
     */
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsSubscription $subscription
     */
    public function setSubscription(Google_Service_YouTube_ActivityContentDetailsSubscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return mixed
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @param Google_Service_YouTube_ActivityContentDetailsUpload $upload
     */
    public function setUpload(Google_Service_YouTube_ActivityContentDetailsUpload $upload)
    {
        $this->upload = $upload;
    }

    /**
     * @return mixed
     */
    public function getUpload()
    {
        return $this->upload;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsBulletin
 */
class Google_Service_YouTube_ActivityContentDetailsBulletin extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsChannelItem
 */
class Google_Service_YouTube_ActivityContentDetailsChannelItem extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsComment
 */
class Google_Service_YouTube_ActivityContentDetailsComment extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsFavorite
 */
class Google_Service_YouTube_ActivityContentDetailsFavorite extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsLike
 */
class Google_Service_YouTube_ActivityContentDetailsLike extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsPlaylistItem
 */
class Google_Service_YouTube_ActivityContentDetailsPlaylistItem extends Google_Model
{
    public $playlistId;
    public $playlistItemId;
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';

    /**
     * @return mixed
     */
    public function getPlaylistId()
    {
        return $this->playlistId;
    }

    /**
     * @param $playlistId
     */
    public function setPlaylistId($playlistId)
    {
        $this->playlistId = $playlistId;
    }

    /**
     * @return mixed
     */
    public function getPlaylistItemId()
    {
        return $this->playlistItemId;
    }

    /**
     * @param $playlistItemId
     */
    public function setPlaylistItemId($playlistItemId)
    {
        $this->playlistItemId = $playlistItemId;
    }

    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsPromotedItem
 */
class Google_Service_YouTube_ActivityContentDetailsPromotedItem extends Google_Collection
{
    public $adTag;
    public $clickTrackingUrl;
    public $creativeViewUrl;
    public $ctaType;
    public $customCtaButtonText;
    public $descriptionText;
    public $destinationUrl;
    public $forecastingUrl;
    public $impressionUrl;
    public $videoId;
    protected $collection_key = 'impressionUrl';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdTag()
    {
        return $this->adTag;
    }

    /**
     * @param $adTag
     */
    public function setAdTag($adTag)
    {
        $this->adTag = $adTag;
    }

    /**
     * @return mixed
     */
    public function getClickTrackingUrl()
    {
        return $this->clickTrackingUrl;
    }

    /**
     * @param $clickTrackingUrl
     */
    public function setClickTrackingUrl($clickTrackingUrl)
    {
        $this->clickTrackingUrl = $clickTrackingUrl;
    }

    /**
     * @return mixed
     */
    public function getCreativeViewUrl()
    {
        return $this->creativeViewUrl;
    }

    /**
     * @param $creativeViewUrl
     */
    public function setCreativeViewUrl($creativeViewUrl)
    {
        $this->creativeViewUrl = $creativeViewUrl;
    }

    /**
     * @return mixed
     */
    public function getCtaType()
    {
        return $this->ctaType;
    }

    /**
     * @param $ctaType
     */
    public function setCtaType($ctaType)
    {
        $this->ctaType = $ctaType;
    }

    /**
     * @return mixed
     */
    public function getCustomCtaButtonText()
    {
        return $this->customCtaButtonText;
    }

    /**
     * @param $customCtaButtonText
     */
    public function setCustomCtaButtonText($customCtaButtonText)
    {
        $this->customCtaButtonText = $customCtaButtonText;
    }

    /**
     * @return mixed
     */
    public function getDescriptionText()
    {
        return $this->descriptionText;
    }

    /**
     * @param $descriptionText
     */
    public function setDescriptionText($descriptionText)
    {
        $this->descriptionText = $descriptionText;
    }

    /**
     * @return mixed
     */
    public function getDestinationUrl()
    {
        return $this->destinationUrl;
    }

    /**
     * @param $destinationUrl
     */
    public function setDestinationUrl($destinationUrl)
    {
        $this->destinationUrl = $destinationUrl;
    }

    /**
     * @return mixed
     */
    public function getForecastingUrl()
    {
        return $this->forecastingUrl;
    }

    /**
     * @param $forecastingUrl
     */
    public function setForecastingUrl($forecastingUrl)
    {
        $this->forecastingUrl = $forecastingUrl;
    }

    /**
     * @return mixed
     */
    public function getImpressionUrl()
    {
        return $this->impressionUrl;
    }

    /**
     * @param $impressionUrl
     */
    public function setImpressionUrl($impressionUrl)
    {
        $this->impressionUrl = $impressionUrl;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsRecommendation
 */
class Google_Service_YouTube_ActivityContentDetailsRecommendation extends Google_Model
{
    public $reason;
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';
    protected $seedResourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $seedResourceIdDataType = '';

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

    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param Google_Service_YouTube_ResourceId $seedResourceId
     */
    public function setSeedResourceId(Google_Service_YouTube_ResourceId $seedResourceId)
    {
        $this->seedResourceId = $seedResourceId;
    }

    /**
     * @return mixed
     */
    public function getSeedResourceId()
    {
        return $this->seedResourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsSocial
 */
class Google_Service_YouTube_ActivityContentDetailsSocial extends Google_Model
{
    public $author;
    public $imageUrl;
    public $referenceUrl;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';

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
    public function getReferenceUrl()
    {
        return $this->referenceUrl;
    }

    /**
     * @param $referenceUrl
     */
    public function setReferenceUrl($referenceUrl)
    {
        $this->referenceUrl = $referenceUrl;
    }

    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
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
 * Class Google_Service_YouTube_ActivityContentDetailsSubscription
 */
class Google_Service_YouTube_ActivityContentDetailsSubscription extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';


    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityContentDetailsUpload
 */
class Google_Service_YouTube_ActivityContentDetailsUpload extends Google_Model
{
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_ActivityListResponse
 */
class Google_Service_YouTube_ActivityListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Activity';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_ActivitySnippet
 */
class Google_Service_YouTube_ActivitySnippet extends Google_Model
{
    public $channelId;
    public $channelTitle;
    public $description;
    public $groupId;
    public $publishedAt;
    public $title;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
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
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_Caption
 */
class Google_Service_YouTube_Caption extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_CaptionSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_CaptionSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_CaptionSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_CaptionListResponse
 */
class Google_Service_YouTube_CaptionListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Caption';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_CaptionSnippet
 */
class Google_Service_YouTube_CaptionSnippet extends Google_Model
{
    public $audioTrackType;
    public $failureReason;
    public $isAutoSynced;
    public $isCC;
    public $isDraft;
    public $isEasyReader;
    public $isLarge;
    public $language;
    public $lastUpdated;
    public $name;
    public $status;
    public $trackKind;
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAudioTrackType()
    {
        return $this->audioTrackType;
    }

    /**
     * @param $audioTrackType
     */
    public function setAudioTrackType($audioTrackType)
    {
        $this->audioTrackType = $audioTrackType;
    }

    /**
     * @return mixed
     */
    public function getFailureReason()
    {
        return $this->failureReason;
    }

    /**
     * @param $failureReason
     */
    public function setFailureReason($failureReason)
    {
        $this->failureReason = $failureReason;
    }

    /**
     * @return mixed
     */
    public function getIsAutoSynced()
    {
        return $this->isAutoSynced;
    }

    /**
     * @param $isAutoSynced
     */
    public function setIsAutoSynced($isAutoSynced)
    {
        $this->isAutoSynced = $isAutoSynced;
    }

    /**
     * @return mixed
     */
    public function getIsCC()
    {
        return $this->isCC;
    }

    /**
     * @param $isCC
     */
    public function setIsCC($isCC)
    {
        $this->isCC = $isCC;
    }

    /**
     * @return mixed
     */
    public function getIsDraft()
    {
        return $this->isDraft;
    }

    /**
     * @param $isDraft
     */
    public function setIsDraft($isDraft)
    {
        $this->isDraft = $isDraft;
    }

    /**
     * @return mixed
     */
    public function getIsEasyReader()
    {
        return $this->isEasyReader;
    }

    /**
     * @param $isEasyReader
     */
    public function setIsEasyReader($isEasyReader)
    {
        $this->isEasyReader = $isEasyReader;
    }

    /**
     * @return mixed
     */
    public function getIsLarge()
    {
        return $this->isLarge;
    }

    /**
     * @param $isLarge
     */
    public function setIsLarge($isLarge)
    {
        $this->isLarge = $isLarge;
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
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param $lastUpdated
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
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
    public function getTrackKind()
    {
        return $this->trackKind;
    }

    /**
     * @param $trackKind
     */
    public function setTrackKind($trackKind)
    {
        $this->trackKind = $trackKind;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_CdnSettings
 */
class Google_Service_YouTube_CdnSettings extends Google_Model
{
    public $format;
    public $ingestionType;
    protected $internal_gapi_mappings = [];
    protected $ingestionInfoType = 'Google_Service_YouTube_IngestionInfo';
    protected $ingestionInfoDataType = '';

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @param Google_Service_YouTube_IngestionInfo $ingestionInfo
     */
    public function setIngestionInfo(Google_Service_YouTube_IngestionInfo $ingestionInfo)
    {
        $this->ingestionInfo = $ingestionInfo;
    }

    /**
     * @return mixed
     */
    public function getIngestionInfo()
    {
        return $this->ingestionInfo;
    }

    /**
     * @return mixed
     */
    public function getIngestionType()
    {
        return $this->ingestionType;
    }

    /**
     * @param $ingestionType
     */
    public function setIngestionType($ingestionType)
    {
        $this->ingestionType = $ingestionType;
    }
}

/**
 * Class Google_Service_YouTube_Channel
 */
class Google_Service_YouTube_Channel extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $auditDetailsType = 'Google_Service_YouTube_ChannelAuditDetails';
    protected $auditDetailsDataType = '';
    protected $brandingSettingsType = 'Google_Service_YouTube_ChannelBrandingSettings';
    protected $brandingSettingsDataType = '';
    protected $contentDetailsType = 'Google_Service_YouTube_ChannelContentDetails';
    protected $contentDetailsDataType = '';
    protected $contentOwnerDetailsType = 'Google_Service_YouTube_ChannelContentOwnerDetails';
    protected $contentOwnerDetailsDataType = '';
    protected $conversionPingsType = 'Google_Service_YouTube_ChannelConversionPings';
    protected $conversionPingsDataType = '';
    protected $invideoPromotionType = 'Google_Service_YouTube_InvideoPromotion';
    protected $invideoPromotionDataType = '';
    protected $localizationsType = 'Google_Service_YouTube_ChannelLocalization';
    protected $localizationsDataType = 'map';
    protected $snippetType = 'Google_Service_YouTube_ChannelSnippet';
    protected $snippetDataType = '';
    protected $statisticsType = 'Google_Service_YouTube_ChannelStatistics';
    protected $statisticsDataType = '';
    protected $statusType = 'Google_Service_YouTube_ChannelStatus';
    protected $statusDataType = '';
    protected $topicDetailsType = 'Google_Service_YouTube_ChannelTopicDetails';
    protected $topicDetailsDataType = '';


    /**
     * @param Google_Service_YouTube_ChannelAuditDetails $auditDetails
     */
    public function setAuditDetails(Google_Service_YouTube_ChannelAuditDetails $auditDetails)
    {
        $this->auditDetails = $auditDetails;
    }

    /**
     * @return mixed
     */
    public function getAuditDetails()
    {
        return $this->auditDetails;
    }

    /**
     * @param Google_Service_YouTube_ChannelBrandingSettings $brandingSettings
     */
    public function setBrandingSettings(Google_Service_YouTube_ChannelBrandingSettings $brandingSettings)
    {
        $this->brandingSettings = $brandingSettings;
    }

    /**
     * @return mixed
     */
    public function getBrandingSettings()
    {
        return $this->brandingSettings;
    }

    /**
     * @param Google_Service_YouTube_ChannelContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_ChannelContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
    }

    /**
     * @param Google_Service_YouTube_ChannelContentOwnerDetails $contentOwnerDetails
     */
    public function setContentOwnerDetails(Google_Service_YouTube_ChannelContentOwnerDetails $contentOwnerDetails)
    {
        $this->contentOwnerDetails = $contentOwnerDetails;
    }

    /**
     * @return mixed
     */
    public function getContentOwnerDetails()
    {
        return $this->contentOwnerDetails;
    }

    /**
     * @param Google_Service_YouTube_ChannelConversionPings $conversionPings
     */
    public function setConversionPings(Google_Service_YouTube_ChannelConversionPings $conversionPings)
    {
        $this->conversionPings = $conversionPings;
    }

    /**
     * @return mixed
     */
    public function getConversionPings()
    {
        return $this->conversionPings;
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
     * @param Google_Service_YouTube_InvideoPromotion $invideoPromotion
     */
    public function setInvideoPromotion(Google_Service_YouTube_InvideoPromotion $invideoPromotion)
    {
        $this->invideoPromotion = $invideoPromotion;
    }

    /**
     * @return mixed
     */
    public function getInvideoPromotion()
    {
        return $this->invideoPromotion;
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
     * @param $localizations
     */
    public function setLocalizations($localizations)
    {
        $this->localizations = $localizations;
    }

    /**
     * @return mixed
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * @param Google_Service_YouTube_ChannelSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_ChannelSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_ChannelStatistics $statistics
     */
    public function setStatistics(Google_Service_YouTube_ChannelStatistics $statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param Google_Service_YouTube_ChannelStatus $status
     */
    public function setStatus(Google_Service_YouTube_ChannelStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Google_Service_YouTube_ChannelTopicDetails $topicDetails
     */
    public function setTopicDetails(Google_Service_YouTube_ChannelTopicDetails $topicDetails)
    {
        $this->topicDetails = $topicDetails;
    }

    /**
     * @return mixed
     */
    public function getTopicDetails()
    {
        return $this->topicDetails;
    }
}

/**
 * Class Google_Service_YouTube_ChannelAuditDetails
 */
class Google_Service_YouTube_ChannelAuditDetails extends Google_Model
{
    public $communityGuidelinesGoodStanding;
    public $contentIdClaimsGoodStanding;
    public $copyrightStrikesGoodStanding;
    public $overallGoodStanding;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommunityGuidelinesGoodStanding()
    {
        return $this->communityGuidelinesGoodStanding;
    }

    /**
     * @param $communityGuidelinesGoodStanding
     */
    public function setCommunityGuidelinesGoodStanding($communityGuidelinesGoodStanding)
    {
        $this->communityGuidelinesGoodStanding = $communityGuidelinesGoodStanding;
    }

    /**
     * @return mixed
     */
    public function getContentIdClaimsGoodStanding()
    {
        return $this->contentIdClaimsGoodStanding;
    }

    /**
     * @param $contentIdClaimsGoodStanding
     */
    public function setContentIdClaimsGoodStanding($contentIdClaimsGoodStanding)
    {
        $this->contentIdClaimsGoodStanding = $contentIdClaimsGoodStanding;
    }

    /**
     * @return mixed
     */
    public function getCopyrightStrikesGoodStanding()
    {
        return $this->copyrightStrikesGoodStanding;
    }

    /**
     * @param $copyrightStrikesGoodStanding
     */
    public function setCopyrightStrikesGoodStanding($copyrightStrikesGoodStanding)
    {
        $this->copyrightStrikesGoodStanding = $copyrightStrikesGoodStanding;
    }

    /**
     * @return mixed
     */
    public function getOverallGoodStanding()
    {
        return $this->overallGoodStanding;
    }

    /**
     * @param $overallGoodStanding
     */
    public function setOverallGoodStanding($overallGoodStanding)
    {
        $this->overallGoodStanding = $overallGoodStanding;
    }
}

/**
 * Class Google_Service_YouTube_ChannelBannerResource
 */
class Google_Service_YouTube_ChannelBannerResource extends Google_Model
{
    public $etag;
    public $kind;
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_ChannelBrandingSettings
 */
class Google_Service_YouTube_ChannelBrandingSettings extends Google_Collection
{
    protected $collection_key = 'hints';
    protected $internal_gapi_mappings = [];
    protected $channelType = 'Google_Service_YouTube_ChannelSettings';
    protected $channelDataType = '';
    protected $hintsType = 'Google_Service_YouTube_PropertyValue';
    protected $hintsDataType = 'array';
    protected $imageType = 'Google_Service_YouTube_ImageSettings';
    protected $imageDataType = '';
    protected $watchType = 'Google_Service_YouTube_WatchSettings';
    protected $watchDataType = '';


    /**
     * @param Google_Service_YouTube_ChannelSettings $channel
     */
    public function setChannel(Google_Service_YouTube_ChannelSettings $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param $hints
     */
    public function setHints($hints)
    {
        $this->hints = $hints;
    }

    /**
     * @return mixed
     */
    public function getHints()
    {
        return $this->hints;
    }

    /**
     * @param Google_Service_YouTube_ImageSettings $image
     */
    public function setImage(Google_Service_YouTube_ImageSettings $image)
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
     * @param Google_Service_YouTube_WatchSettings $watch
     */
    public function setWatch(Google_Service_YouTube_WatchSettings $watch)
    {
        $this->watch = $watch;
    }

    /**
     * @return mixed
     */
    public function getWatch()
    {
        return $this->watch;
    }
}

/**
 * Class Google_Service_YouTube_ChannelContentDetails
 */
class Google_Service_YouTube_ChannelContentDetails extends Google_Model
{
    public $googlePlusUserId;
    protected $internal_gapi_mappings = [];
    protected $relatedPlaylistsType = 'Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists';
    protected $relatedPlaylistsDataType = '';

    /**
     * @return mixed
     */
    public function getGooglePlusUserId()
    {
        return $this->googlePlusUserId;
    }

    /**
     * @param $googlePlusUserId
     */
    public function setGooglePlusUserId($googlePlusUserId)
    {
        $this->googlePlusUserId = $googlePlusUserId;
    }

    /**
     * @param Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists $relatedPlaylists
     */
    public function setRelatedPlaylists(Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists $relatedPlaylists)
    {
        $this->relatedPlaylists = $relatedPlaylists;
    }

    /**
     * @return mixed
     */
    public function getRelatedPlaylists()
    {
        return $this->relatedPlaylists;
    }
}

/**
 * Class Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists
 */
class Google_Service_YouTube_ChannelContentDetailsRelatedPlaylists extends Google_Model
{
    public $favorites;
    public $likes;
    public $uploads;
    public $watchHistory;
    public $watchLater;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

    /**
     * @param $favorites
     */
    public function setFavorites($favorites)
    {
        $this->favorites = $favorites;
    }

    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return mixed
     */
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * @param $uploads
     */
    public function setUploads($uploads)
    {
        $this->uploads = $uploads;
    }

    /**
     * @return mixed
     */
    public function getWatchHistory()
    {
        return $this->watchHistory;
    }

    /**
     * @param $watchHistory
     */
    public function setWatchHistory($watchHistory)
    {
        $this->watchHistory = $watchHistory;
    }

    /**
     * @return mixed
     */
    public function getWatchLater()
    {
        return $this->watchLater;
    }

    /**
     * @param $watchLater
     */
    public function setWatchLater($watchLater)
    {
        $this->watchLater = $watchLater;
    }
}

/**
 * Class Google_Service_YouTube_ChannelContentOwnerDetails
 */
class Google_Service_YouTube_ChannelContentOwnerDetails extends Google_Model
{
    public $contentOwner;
    public $timeLinked;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContentOwner()
    {
        return $this->contentOwner;
    }

    /**
     * @param $contentOwner
     */
    public function setContentOwner($contentOwner)
    {
        $this->contentOwner = $contentOwner;
    }

    /**
     * @return mixed
     */
    public function getTimeLinked()
    {
        return $this->timeLinked;
    }

    /**
     * @param $timeLinked
     */
    public function setTimeLinked($timeLinked)
    {
        $this->timeLinked = $timeLinked;
    }
}

/**
 * Class Google_Service_YouTube_ChannelConversionPing
 */
class Google_Service_YouTube_ChannelConversionPing extends Google_Model
{
    public $context;
    public $conversionUrl;
    protected $internal_gapi_mappings = [];

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
    public function getConversionUrl()
    {
        return $this->conversionUrl;
    }

    /**
     * @param $conversionUrl
     */
    public function setConversionUrl($conversionUrl)
    {
        $this->conversionUrl = $conversionUrl;
    }
}

/**
 * Class Google_Service_YouTube_ChannelConversionPings
 */
class Google_Service_YouTube_ChannelConversionPings extends Google_Collection
{
    protected $collection_key = 'pings';
    protected $internal_gapi_mappings = [];
    protected $pingsType = 'Google_Service_YouTube_ChannelConversionPing';
    protected $pingsDataType = 'array';


    /**
     * @param $pings
     */
    public function setPings($pings)
    {
        $this->pings = $pings;
    }

    /**
     * @return mixed
     */
    public function getPings()
    {
        return $this->pings;
    }
}

/**
 * Class Google_Service_YouTube_ChannelId
 */
class Google_Service_YouTube_ChannelId extends Google_Model
{
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_ChannelListResponse
 */
class Google_Service_YouTube_ChannelListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Channel';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_ChannelLocalization
 */
class Google_Service_YouTube_ChannelLocalization extends Google_Model
{
    public $description;
    public $title;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_ChannelLocalizations
 */
class Google_Service_YouTube_ChannelLocalizations extends Google_Model
{
}

/**
 * Class Google_Service_YouTube_ChannelSection
 */
class Google_Service_YouTube_ChannelSection extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_ChannelSectionContentDetails';
    protected $contentDetailsDataType = '';
    protected $localizationsType = 'Google_Service_YouTube_ChannelSectionLocalization';
    protected $localizationsDataType = 'map';
    protected $snippetType = 'Google_Service_YouTube_ChannelSectionSnippet';
    protected $snippetDataType = '';
    protected $targetingType = 'Google_Service_YouTube_ChannelSectionTargeting';
    protected $targetingDataType = '';


    /**
     * @param Google_Service_YouTube_ChannelSectionContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_ChannelSectionContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param $localizations
     */
    public function setLocalizations($localizations)
    {
        $this->localizations = $localizations;
    }

    /**
     * @return mixed
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * @param Google_Service_YouTube_ChannelSectionSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_ChannelSectionSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_ChannelSectionTargeting $targeting
     */
    public function setTargeting(Google_Service_YouTube_ChannelSectionTargeting $targeting)
    {
        $this->targeting = $targeting;
    }

    /**
     * @return mixed
     */
    public function getTargeting()
    {
        return $this->targeting;
    }
}

/**
 * Class Google_Service_YouTube_ChannelSectionContentDetails
 */
class Google_Service_YouTube_ChannelSectionContentDetails extends Google_Collection
{
    public $channels;
    public $playlists;
    protected $collection_key = 'playlists';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return mixed
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }

    /**
     * @param $playlists
     */
    public function setPlaylists($playlists)
    {
        $this->playlists = $playlists;
    }
}

/**
 * Class Google_Service_YouTube_ChannelSectionListResponse
 */
class Google_Service_YouTube_ChannelSectionListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_ChannelSection';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_ChannelSectionLocalization
 */
class Google_Service_YouTube_ChannelSectionLocalization extends Google_Model
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
 * Class Google_Service_YouTube_ChannelSectionLocalizations
 */
class Google_Service_YouTube_ChannelSectionLocalizations extends Google_Model
{
}

/**
 * Class Google_Service_YouTube_ChannelSectionSnippet
 */
class Google_Service_YouTube_ChannelSectionSnippet extends Google_Model
{
    public $channelId;
    public $defaultLanguage;
    public $position;
    public $style;
    public $title;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $localizedType = 'Google_Service_YouTube_ChannelSectionLocalization';
    protected $localizedDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
    }

    /**
     * @param Google_Service_YouTube_ChannelSectionLocalization $localized
     */
    public function setLocalized(Google_Service_YouTube_ChannelSectionLocalization $localized)
    {
        $this->localized = $localized;
    }

    /**
     * @return mixed
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
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
 * Class Google_Service_YouTube_ChannelSectionTargeting
 */
class Google_Service_YouTube_ChannelSectionTargeting extends Google_Collection
{
    public $countries;
    public $languages;
    public $regions;
    protected $collection_key = 'regions';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @param $countries
     */
    public function setCountries($countries)
    {
        $this->countries = $countries;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * @param $regions
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;
    }
}

/**
 * Class Google_Service_YouTube_ChannelSettings
 */
class Google_Service_YouTube_ChannelSettings extends Google_Collection
{
    public $country;
    public $defaultLanguage;
    public $defaultTab;
    public $description;
    public $featuredChannelsTitle;
    public $featuredChannelsUrls;
    public $keywords;
    public $moderateComments;
    public $profileColor;
    public $showBrowseView;
    public $showRelatedChannels;
    public $title;
    public $trackingAnalyticsAccountId;
    public $unsubscribedTrailer;
    protected $collection_key = 'featuredChannelsUrls';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
    }

    /**
     * @return mixed
     */
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    /**
     * @param $defaultTab
     */
    public function setDefaultTab($defaultTab)
    {
        $this->defaultTab = $defaultTab;
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
    public function getFeaturedChannelsTitle()
    {
        return $this->featuredChannelsTitle;
    }

    /**
     * @param $featuredChannelsTitle
     */
    public function setFeaturedChannelsTitle($featuredChannelsTitle)
    {
        $this->featuredChannelsTitle = $featuredChannelsTitle;
    }

    /**
     * @return mixed
     */
    public function getFeaturedChannelsUrls()
    {
        return $this->featuredChannelsUrls;
    }

    /**
     * @param $featuredChannelsUrls
     */
    public function setFeaturedChannelsUrls($featuredChannelsUrls)
    {
        $this->featuredChannelsUrls = $featuredChannelsUrls;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getModerateComments()
    {
        return $this->moderateComments;
    }

    /**
     * @param $moderateComments
     */
    public function setModerateComments($moderateComments)
    {
        $this->moderateComments = $moderateComments;
    }

    /**
     * @return mixed
     */
    public function getProfileColor()
    {
        return $this->profileColor;
    }

    /**
     * @param $profileColor
     */
    public function setProfileColor($profileColor)
    {
        $this->profileColor = $profileColor;
    }

    /**
     * @return mixed
     */
    public function getShowBrowseView()
    {
        return $this->showBrowseView;
    }

    /**
     * @param $showBrowseView
     */
    public function setShowBrowseView($showBrowseView)
    {
        $this->showBrowseView = $showBrowseView;
    }

    /**
     * @return mixed
     */
    public function getShowRelatedChannels()
    {
        return $this->showRelatedChannels;
    }

    /**
     * @param $showRelatedChannels
     */
    public function setShowRelatedChannels($showRelatedChannels)
    {
        $this->showRelatedChannels = $showRelatedChannels;
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
    public function getTrackingAnalyticsAccountId()
    {
        return $this->trackingAnalyticsAccountId;
    }

    /**
     * @param $trackingAnalyticsAccountId
     */
    public function setTrackingAnalyticsAccountId($trackingAnalyticsAccountId)
    {
        $this->trackingAnalyticsAccountId = $trackingAnalyticsAccountId;
    }

    /**
     * @return mixed
     */
    public function getUnsubscribedTrailer()
    {
        return $this->unsubscribedTrailer;
    }

    /**
     * @param $unsubscribedTrailer
     */
    public function setUnsubscribedTrailer($unsubscribedTrailer)
    {
        $this->unsubscribedTrailer = $unsubscribedTrailer;
    }
}

/**
 * Class Google_Service_YouTube_ChannelSnippet
 */
class Google_Service_YouTube_ChannelSnippet extends Google_Model
{
    public $country;
    public $defaultLanguage;
    public $description;
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $localizedType = 'Google_Service_YouTube_ChannelLocalization';
    protected $localizedDataType = '';
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
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
     * @param Google_Service_YouTube_ChannelLocalization $localized
     */
    public function setLocalized(Google_Service_YouTube_ChannelLocalization $localized)
    {
        $this->localized = $localized;
    }

    /**
     * @return mixed
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_ChannelStatistics
 */
class Google_Service_YouTube_ChannelStatistics extends Google_Model
{
    public $commentCount;
    public $hiddenSubscriberCount;
    public $subscriberCount;
    public $videoCount;
    public $viewCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * @param $commentCount
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;
    }

    /**
     * @return mixed
     */
    public function getHiddenSubscriberCount()
    {
        return $this->hiddenSubscriberCount;
    }

    /**
     * @param $hiddenSubscriberCount
     */
    public function setHiddenSubscriberCount($hiddenSubscriberCount)
    {
        $this->hiddenSubscriberCount = $hiddenSubscriberCount;
    }

    /**
     * @return mixed
     */
    public function getSubscriberCount()
    {
        return $this->subscriberCount;
    }

    /**
     * @param $subscriberCount
     */
    public function setSubscriberCount($subscriberCount)
    {
        $this->subscriberCount = $subscriberCount;
    }

    /**
     * @return mixed
     */
    public function getVideoCount()
    {
        return $this->videoCount;
    }

    /**
     * @param $videoCount
     */
    public function setVideoCount($videoCount)
    {
        $this->videoCount = $videoCount;
    }

    /**
     * @return mixed
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * @param $viewCount
     */
    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }
}

/**
 * Class Google_Service_YouTube_ChannelStatus
 */
class Google_Service_YouTube_ChannelStatus extends Google_Model
{
    public $isLinked;
    public $longUploadsStatus;
    public $privacyStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsLinked()
    {
        return $this->isLinked;
    }

    /**
     * @param $isLinked
     */
    public function setIsLinked($isLinked)
    {
        $this->isLinked = $isLinked;
    }

    /**
     * @return mixed
     */
    public function getLongUploadsStatus()
    {
        return $this->longUploadsStatus;
    }

    /**
     * @param $longUploadsStatus
     */
    public function setLongUploadsStatus($longUploadsStatus)
    {
        $this->longUploadsStatus = $longUploadsStatus;
    }

    /**
     * @return mixed
     */
    public function getPrivacyStatus()
    {
        return $this->privacyStatus;
    }

    /**
     * @param $privacyStatus
     */
    public function setPrivacyStatus($privacyStatus)
    {
        $this->privacyStatus = $privacyStatus;
    }
}

/**
 * Class Google_Service_YouTube_ChannelTopicDetails
 */
class Google_Service_YouTube_ChannelTopicDetails extends Google_Collection
{
    public $topicIds;
    protected $collection_key = 'topicIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTopicIds()
    {
        return $this->topicIds;
    }

    /**
     * @param $topicIds
     */
    public function setTopicIds($topicIds)
    {
        $this->topicIds = $topicIds;
    }
}

/**
 * Class Google_Service_YouTube_Comment
 */
class Google_Service_YouTube_Comment extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_CommentSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_CommentSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_CommentSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_CommentListResponse
 */
class Google_Service_YouTube_CommentListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Comment';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
    }

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_CommentSnippet
 */
class Google_Service_YouTube_CommentSnippet extends Google_Model
{
    public $authorChannelUrl;
    public $authorDisplayName;
    public $authorGoogleplusProfileUrl;
    public $authorProfileImageUrl;
    public $canRate;
    public $channelId;
    public $likeCount;
    public $moderationStatus;
    public $parentId;
    public $publishedAt;
    public $textDisplay;
    public $textOriginal;
    public $updatedAt;
    public $videoId;
    public $viewerRating;
    protected $internal_gapi_mappings = [];
    protected $authorChannelIdType = 'Google_Service_YouTube_ChannelId';
    protected $authorChannelIdDataType = '';

    /**
     * @param Google_Service_YouTube_ChannelId $authorChannelId
     */
    public function setAuthorChannelId(Google_Service_YouTube_ChannelId $authorChannelId)
    {
        $this->authorChannelId = $authorChannelId;
    }

    /**
     * @return mixed
     */
    public function getAuthorChannelId()
    {
        return $this->authorChannelId;
    }

    /**
     * @return mixed
     */
    public function getAuthorChannelUrl()
    {
        return $this->authorChannelUrl;
    }

    /**
     * @param $authorChannelUrl
     */
    public function setAuthorChannelUrl($authorChannelUrl)
    {
        $this->authorChannelUrl = $authorChannelUrl;
    }

    /**
     * @return mixed
     */
    public function getAuthorDisplayName()
    {
        return $this->authorDisplayName;
    }

    /**
     * @param $authorDisplayName
     */
    public function setAuthorDisplayName($authorDisplayName)
    {
        $this->authorDisplayName = $authorDisplayName;
    }

    /**
     * @return mixed
     */
    public function getAuthorGoogleplusProfileUrl()
    {
        return $this->authorGoogleplusProfileUrl;
    }

    /**
     * @param $authorGoogleplusProfileUrl
     */
    public function setAuthorGoogleplusProfileUrl($authorGoogleplusProfileUrl)
    {
        $this->authorGoogleplusProfileUrl = $authorGoogleplusProfileUrl;
    }

    /**
     * @return mixed
     */
    public function getAuthorProfileImageUrl()
    {
        return $this->authorProfileImageUrl;
    }

    /**
     * @param $authorProfileImageUrl
     */
    public function setAuthorProfileImageUrl($authorProfileImageUrl)
    {
        $this->authorProfileImageUrl = $authorProfileImageUrl;
    }

    /**
     * @return mixed
     */
    public function getCanRate()
    {
        return $this->canRate;
    }

    /**
     * @param $canRate
     */
    public function setCanRate($canRate)
    {
        $this->canRate = $canRate;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getLikeCount()
    {
        return $this->likeCount;
    }

    /**
     * @param $likeCount
     */
    public function setLikeCount($likeCount)
    {
        $this->likeCount = $likeCount;
    }

    /**
     * @return mixed
     */
    public function getModerationStatus()
    {
        return $this->moderationStatus;
    }

    /**
     * @param $moderationStatus
     */
    public function setModerationStatus($moderationStatus)
    {
        $this->moderationStatus = $moderationStatus;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return mixed
     */
    public function getTextDisplay()
    {
        return $this->textDisplay;
    }

    /**
     * @param $textDisplay
     */
    public function setTextDisplay($textDisplay)
    {
        $this->textDisplay = $textDisplay;
    }

    /**
     * @return mixed
     */
    public function getTextOriginal()
    {
        return $this->textOriginal;
    }

    /**
     * @param $textOriginal
     */
    public function setTextOriginal($textOriginal)
    {
        $this->textOriginal = $textOriginal;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }

    /**
     * @return mixed
     */
    public function getViewerRating()
    {
        return $this->viewerRating;
    }

    /**
     * @param $viewerRating
     */
    public function setViewerRating($viewerRating)
    {
        $this->viewerRating = $viewerRating;
    }
}

/**
 * Class Google_Service_YouTube_CommentThread
 */
class Google_Service_YouTube_CommentThread extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $repliesType = 'Google_Service_YouTube_CommentThreadReplies';
    protected $repliesDataType = '';
    protected $snippetType = 'Google_Service_YouTube_CommentThreadSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_CommentThreadReplies $replies
     */
    public function setReplies(Google_Service_YouTube_CommentThreadReplies $replies)
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
     * @param Google_Service_YouTube_CommentThreadSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_CommentThreadSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_CommentThreadListResponse
 */
class Google_Service_YouTube_CommentThreadListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_CommentThread';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
    }

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_CommentThreadReplies
 */
class Google_Service_YouTube_CommentThreadReplies extends Google_Collection
{
    protected $collection_key = 'comments';
    protected $internal_gapi_mappings = [];
    protected $commentsType = 'Google_Service_YouTube_Comment';
    protected $commentsDataType = 'array';


    /**
     * @param $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }
}

/**
 * Class Google_Service_YouTube_CommentThreadSnippet
 */
class Google_Service_YouTube_CommentThreadSnippet extends Google_Model
{
    public $canReply;
    public $channelId;
    public $isPublic;
    public $totalReplyCount;
    public $videoId;
    protected $internal_gapi_mappings = [];
    protected $topLevelCommentType = 'Google_Service_YouTube_Comment';
    protected $topLevelCommentDataType = '';

    /**
     * @return mixed
     */
    public function getCanReply()
    {
        return $this->canReply;
    }

    /**
     * @param $canReply
     */
    public function setCanReply($canReply)
    {
        $this->canReply = $canReply;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param $isPublic
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
    }

    /**
     * @param Google_Service_YouTube_Comment $topLevelComment
     */
    public function setTopLevelComment(Google_Service_YouTube_Comment $topLevelComment)
    {
        $this->topLevelComment = $topLevelComment;
    }

    /**
     * @return mixed
     */
    public function getTopLevelComment()
    {
        return $this->topLevelComment;
    }

    /**
     * @return mixed
     */
    public function getTotalReplyCount()
    {
        return $this->totalReplyCount;
    }

    /**
     * @param $totalReplyCount
     */
    public function setTotalReplyCount($totalReplyCount)
    {
        $this->totalReplyCount = $totalReplyCount;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_ContentRating
 */
class Google_Service_YouTube_ContentRating extends Google_Collection
{
    public $acbRating;
    public $agcomRating;
    public $anatelRating;
    public $bbfcRating;
    public $bfvcRating;
    public $bmukkRating;
    public $catvRating;
    public $catvfrRating;
    public $cbfcRating;
    public $cccRating;
    public $cceRating;
    public $chfilmRating;
    public $chvrsRating;
    public $cicfRating;
    public $cnaRating;
    public $csaRating;
    public $cscfRating;
    public $czfilmRating;
    public $djctqRating;
    public $djctqRatingReasons;
    public $eefilmRating;
    public $egfilmRating;
    public $eirinRating;
    public $fcbmRating;
    public $fcoRating;
    public $fmocRating;
    public $fpbRating;
    public $fskRating;
    public $grfilmRating;
    public $icaaRating;
    public $ifcoRating;
    public $ilfilmRating;
    public $incaaRating;
    public $kfcbRating;
    public $kijkwijzerRating;
    public $kmrbRating;
    public $lsfRating;
    public $mccaaRating;
    public $mccypRating;
    public $mdaRating;
    public $medietilsynetRating;
    public $mekuRating;
    public $mibacRating;
    public $mocRating;
    public $moctwRating;
    public $mpaaRating;
    public $mtrcbRating;
    public $nbcRating;
    public $nbcplRating;
    public $nfrcRating;
    public $nfvcbRating;
    public $nkclvRating;
    public $oflcRating;
    public $pefilmRating;
    public $rcnofRating;
    public $resorteviolenciaRating;
    public $rtcRating;
    public $rteRating;
    public $russiaRating;
    public $skfilmRating;
    public $smaisRating;
    public $smsaRating;
    public $tvpgRating;
    public $ytRating;
    protected $collection_key = 'djctqRatingReasons';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAcbRating()
    {
        return $this->acbRating;
    }

    /**
     * @param $acbRating
     */
    public function setAcbRating($acbRating)
    {
        $this->acbRating = $acbRating;
    }

    /**
     * @return mixed
     */
    public function getAgcomRating()
    {
        return $this->agcomRating;
    }

    /**
     * @param $agcomRating
     */
    public function setAgcomRating($agcomRating)
    {
        $this->agcomRating = $agcomRating;
    }

    /**
     * @return mixed
     */
    public function getAnatelRating()
    {
        return $this->anatelRating;
    }

    /**
     * @param $anatelRating
     */
    public function setAnatelRating($anatelRating)
    {
        $this->anatelRating = $anatelRating;
    }

    /**
     * @return mixed
     */
    public function getBbfcRating()
    {
        return $this->bbfcRating;
    }

    /**
     * @param $bbfcRating
     */
    public function setBbfcRating($bbfcRating)
    {
        $this->bbfcRating = $bbfcRating;
    }

    /**
     * @return mixed
     */
    public function getBfvcRating()
    {
        return $this->bfvcRating;
    }

    /**
     * @param $bfvcRating
     */
    public function setBfvcRating($bfvcRating)
    {
        $this->bfvcRating = $bfvcRating;
    }

    /**
     * @return mixed
     */
    public function getBmukkRating()
    {
        return $this->bmukkRating;
    }

    /**
     * @param $bmukkRating
     */
    public function setBmukkRating($bmukkRating)
    {
        $this->bmukkRating = $bmukkRating;
    }

    /**
     * @return mixed
     */
    public function getCatvRating()
    {
        return $this->catvRating;
    }

    /**
     * @param $catvRating
     */
    public function setCatvRating($catvRating)
    {
        $this->catvRating = $catvRating;
    }

    /**
     * @return mixed
     */
    public function getCatvfrRating()
    {
        return $this->catvfrRating;
    }

    /**
     * @param $catvfrRating
     */
    public function setCatvfrRating($catvfrRating)
    {
        $this->catvfrRating = $catvfrRating;
    }

    /**
     * @return mixed
     */
    public function getCbfcRating()
    {
        return $this->cbfcRating;
    }

    /**
     * @param $cbfcRating
     */
    public function setCbfcRating($cbfcRating)
    {
        $this->cbfcRating = $cbfcRating;
    }

    /**
     * @return mixed
     */
    public function getCccRating()
    {
        return $this->cccRating;
    }

    /**
     * @param $cccRating
     */
    public function setCccRating($cccRating)
    {
        $this->cccRating = $cccRating;
    }

    /**
     * @return mixed
     */
    public function getCceRating()
    {
        return $this->cceRating;
    }

    /**
     * @param $cceRating
     */
    public function setCceRating($cceRating)
    {
        $this->cceRating = $cceRating;
    }

    /**
     * @return mixed
     */
    public function getChfilmRating()
    {
        return $this->chfilmRating;
    }

    /**
     * @param $chfilmRating
     */
    public function setChfilmRating($chfilmRating)
    {
        $this->chfilmRating = $chfilmRating;
    }

    /**
     * @return mixed
     */
    public function getChvrsRating()
    {
        return $this->chvrsRating;
    }

    /**
     * @param $chvrsRating
     */
    public function setChvrsRating($chvrsRating)
    {
        $this->chvrsRating = $chvrsRating;
    }

    /**
     * @return mixed
     */
    public function getCicfRating()
    {
        return $this->cicfRating;
    }

    /**
     * @param $cicfRating
     */
    public function setCicfRating($cicfRating)
    {
        $this->cicfRating = $cicfRating;
    }

    /**
     * @return mixed
     */
    public function getCnaRating()
    {
        return $this->cnaRating;
    }

    /**
     * @param $cnaRating
     */
    public function setCnaRating($cnaRating)
    {
        $this->cnaRating = $cnaRating;
    }

    /**
     * @return mixed
     */
    public function getCsaRating()
    {
        return $this->csaRating;
    }

    /**
     * @param $csaRating
     */
    public function setCsaRating($csaRating)
    {
        $this->csaRating = $csaRating;
    }

    /**
     * @return mixed
     */
    public function getCscfRating()
    {
        return $this->cscfRating;
    }

    /**
     * @param $cscfRating
     */
    public function setCscfRating($cscfRating)
    {
        $this->cscfRating = $cscfRating;
    }

    /**
     * @return mixed
     */
    public function getCzfilmRating()
    {
        return $this->czfilmRating;
    }

    /**
     * @param $czfilmRating
     */
    public function setCzfilmRating($czfilmRating)
    {
        $this->czfilmRating = $czfilmRating;
    }

    /**
     * @return mixed
     */
    public function getDjctqRating()
    {
        return $this->djctqRating;
    }

    /**
     * @param $djctqRating
     */
    public function setDjctqRating($djctqRating)
    {
        $this->djctqRating = $djctqRating;
    }

    /**
     * @return mixed
     */
    public function getDjctqRatingReasons()
    {
        return $this->djctqRatingReasons;
    }

    /**
     * @param $djctqRatingReasons
     */
    public function setDjctqRatingReasons($djctqRatingReasons)
    {
        $this->djctqRatingReasons = $djctqRatingReasons;
    }

    /**
     * @return mixed
     */
    public function getEefilmRating()
    {
        return $this->eefilmRating;
    }

    /**
     * @param $eefilmRating
     */
    public function setEefilmRating($eefilmRating)
    {
        $this->eefilmRating = $eefilmRating;
    }

    /**
     * @return mixed
     */
    public function getEgfilmRating()
    {
        return $this->egfilmRating;
    }

    /**
     * @param $egfilmRating
     */
    public function setEgfilmRating($egfilmRating)
    {
        $this->egfilmRating = $egfilmRating;
    }

    /**
     * @return mixed
     */
    public function getEirinRating()
    {
        return $this->eirinRating;
    }

    /**
     * @param $eirinRating
     */
    public function setEirinRating($eirinRating)
    {
        $this->eirinRating = $eirinRating;
    }

    /**
     * @return mixed
     */
    public function getFcbmRating()
    {
        return $this->fcbmRating;
    }

    /**
     * @param $fcbmRating
     */
    public function setFcbmRating($fcbmRating)
    {
        $this->fcbmRating = $fcbmRating;
    }

    /**
     * @return mixed
     */
    public function getFcoRating()
    {
        return $this->fcoRating;
    }

    /**
     * @param $fcoRating
     */
    public function setFcoRating($fcoRating)
    {
        $this->fcoRating = $fcoRating;
    }

    /**
     * @return mixed
     */
    public function getFmocRating()
    {
        return $this->fmocRating;
    }

    /**
     * @param $fmocRating
     */
    public function setFmocRating($fmocRating)
    {
        $this->fmocRating = $fmocRating;
    }

    /**
     * @return mixed
     */
    public function getFpbRating()
    {
        return $this->fpbRating;
    }

    /**
     * @param $fpbRating
     */
    public function setFpbRating($fpbRating)
    {
        $this->fpbRating = $fpbRating;
    }

    /**
     * @return mixed
     */
    public function getFskRating()
    {
        return $this->fskRating;
    }

    /**
     * @param $fskRating
     */
    public function setFskRating($fskRating)
    {
        $this->fskRating = $fskRating;
    }

    /**
     * @return mixed
     */
    public function getGrfilmRating()
    {
        return $this->grfilmRating;
    }

    /**
     * @param $grfilmRating
     */
    public function setGrfilmRating($grfilmRating)
    {
        $this->grfilmRating = $grfilmRating;
    }

    /**
     * @return mixed
     */
    public function getIcaaRating()
    {
        return $this->icaaRating;
    }

    /**
     * @param $icaaRating
     */
    public function setIcaaRating($icaaRating)
    {
        $this->icaaRating = $icaaRating;
    }

    /**
     * @return mixed
     */
    public function getIfcoRating()
    {
        return $this->ifcoRating;
    }

    /**
     * @param $ifcoRating
     */
    public function setIfcoRating($ifcoRating)
    {
        $this->ifcoRating = $ifcoRating;
    }

    /**
     * @return mixed
     */
    public function getIlfilmRating()
    {
        return $this->ilfilmRating;
    }

    /**
     * @param $ilfilmRating
     */
    public function setIlfilmRating($ilfilmRating)
    {
        $this->ilfilmRating = $ilfilmRating;
    }

    /**
     * @return mixed
     */
    public function getIncaaRating()
    {
        return $this->incaaRating;
    }

    /**
     * @param $incaaRating
     */
    public function setIncaaRating($incaaRating)
    {
        $this->incaaRating = $incaaRating;
    }

    /**
     * @return mixed
     */
    public function getKfcbRating()
    {
        return $this->kfcbRating;
    }

    /**
     * @param $kfcbRating
     */
    public function setKfcbRating($kfcbRating)
    {
        $this->kfcbRating = $kfcbRating;
    }

    /**
     * @return mixed
     */
    public function getKijkwijzerRating()
    {
        return $this->kijkwijzerRating;
    }

    /**
     * @param $kijkwijzerRating
     */
    public function setKijkwijzerRating($kijkwijzerRating)
    {
        $this->kijkwijzerRating = $kijkwijzerRating;
    }

    /**
     * @return mixed
     */
    public function getKmrbRating()
    {
        return $this->kmrbRating;
    }

    /**
     * @param $kmrbRating
     */
    public function setKmrbRating($kmrbRating)
    {
        $this->kmrbRating = $kmrbRating;
    }

    /**
     * @return mixed
     */
    public function getLsfRating()
    {
        return $this->lsfRating;
    }

    /**
     * @param $lsfRating
     */
    public function setLsfRating($lsfRating)
    {
        $this->lsfRating = $lsfRating;
    }

    /**
     * @return mixed
     */
    public function getMccaaRating()
    {
        return $this->mccaaRating;
    }

    /**
     * @param $mccaaRating
     */
    public function setMccaaRating($mccaaRating)
    {
        $this->mccaaRating = $mccaaRating;
    }

    /**
     * @return mixed
     */
    public function getMccypRating()
    {
        return $this->mccypRating;
    }

    /**
     * @param $mccypRating
     */
    public function setMccypRating($mccypRating)
    {
        $this->mccypRating = $mccypRating;
    }

    /**
     * @return mixed
     */
    public function getMdaRating()
    {
        return $this->mdaRating;
    }

    /**
     * @param $mdaRating
     */
    public function setMdaRating($mdaRating)
    {
        $this->mdaRating = $mdaRating;
    }

    /**
     * @return mixed
     */
    public function getMedietilsynetRating()
    {
        return $this->medietilsynetRating;
    }

    /**
     * @param $medietilsynetRating
     */
    public function setMedietilsynetRating($medietilsynetRating)
    {
        $this->medietilsynetRating = $medietilsynetRating;
    }

    /**
     * @return mixed
     */
    public function getMekuRating()
    {
        return $this->mekuRating;
    }

    /**
     * @param $mekuRating
     */
    public function setMekuRating($mekuRating)
    {
        $this->mekuRating = $mekuRating;
    }

    /**
     * @return mixed
     */
    public function getMibacRating()
    {
        return $this->mibacRating;
    }

    /**
     * @param $mibacRating
     */
    public function setMibacRating($mibacRating)
    {
        $this->mibacRating = $mibacRating;
    }

    /**
     * @return mixed
     */
    public function getMocRating()
    {
        return $this->mocRating;
    }

    /**
     * @param $mocRating
     */
    public function setMocRating($mocRating)
    {
        $this->mocRating = $mocRating;
    }

    /**
     * @return mixed
     */
    public function getMoctwRating()
    {
        return $this->moctwRating;
    }

    /**
     * @param $moctwRating
     */
    public function setMoctwRating($moctwRating)
    {
        $this->moctwRating = $moctwRating;
    }

    /**
     * @return mixed
     */
    public function getMpaaRating()
    {
        return $this->mpaaRating;
    }

    /**
     * @param $mpaaRating
     */
    public function setMpaaRating($mpaaRating)
    {
        $this->mpaaRating = $mpaaRating;
    }

    /**
     * @return mixed
     */
    public function getMtrcbRating()
    {
        return $this->mtrcbRating;
    }

    /**
     * @param $mtrcbRating
     */
    public function setMtrcbRating($mtrcbRating)
    {
        $this->mtrcbRating = $mtrcbRating;
    }

    /**
     * @return mixed
     */
    public function getNbcRating()
    {
        return $this->nbcRating;
    }

    /**
     * @param $nbcRating
     */
    public function setNbcRating($nbcRating)
    {
        $this->nbcRating = $nbcRating;
    }

    /**
     * @return mixed
     */
    public function getNbcplRating()
    {
        return $this->nbcplRating;
    }

    /**
     * @param $nbcplRating
     */
    public function setNbcplRating($nbcplRating)
    {
        $this->nbcplRating = $nbcplRating;
    }

    /**
     * @return mixed
     */
    public function getNfrcRating()
    {
        return $this->nfrcRating;
    }

    /**
     * @param $nfrcRating
     */
    public function setNfrcRating($nfrcRating)
    {
        $this->nfrcRating = $nfrcRating;
    }

    /**
     * @return mixed
     */
    public function getNfvcbRating()
    {
        return $this->nfvcbRating;
    }

    /**
     * @param $nfvcbRating
     */
    public function setNfvcbRating($nfvcbRating)
    {
        $this->nfvcbRating = $nfvcbRating;
    }

    /**
     * @return mixed
     */
    public function getNkclvRating()
    {
        return $this->nkclvRating;
    }

    /**
     * @param $nkclvRating
     */
    public function setNkclvRating($nkclvRating)
    {
        $this->nkclvRating = $nkclvRating;
    }

    /**
     * @return mixed
     */
    public function getOflcRating()
    {
        return $this->oflcRating;
    }

    /**
     * @param $oflcRating
     */
    public function setOflcRating($oflcRating)
    {
        $this->oflcRating = $oflcRating;
    }

    /**
     * @return mixed
     */
    public function getPefilmRating()
    {
        return $this->pefilmRating;
    }

    /**
     * @param $pefilmRating
     */
    public function setPefilmRating($pefilmRating)
    {
        $this->pefilmRating = $pefilmRating;
    }

    /**
     * @return mixed
     */
    public function getRcnofRating()
    {
        return $this->rcnofRating;
    }

    /**
     * @param $rcnofRating
     */
    public function setRcnofRating($rcnofRating)
    {
        $this->rcnofRating = $rcnofRating;
    }

    /**
     * @return mixed
     */
    public function getResorteviolenciaRating()
    {
        return $this->resorteviolenciaRating;
    }

    /**
     * @param $resorteviolenciaRating
     */
    public function setResorteviolenciaRating($resorteviolenciaRating)
    {
        $this->resorteviolenciaRating = $resorteviolenciaRating;
    }

    /**
     * @return mixed
     */
    public function getRtcRating()
    {
        return $this->rtcRating;
    }

    /**
     * @param $rtcRating
     */
    public function setRtcRating($rtcRating)
    {
        $this->rtcRating = $rtcRating;
    }

    /**
     * @return mixed
     */
    public function getRteRating()
    {
        return $this->rteRating;
    }

    /**
     * @param $rteRating
     */
    public function setRteRating($rteRating)
    {
        $this->rteRating = $rteRating;
    }

    /**
     * @return mixed
     */
    public function getRussiaRating()
    {
        return $this->russiaRating;
    }

    /**
     * @param $russiaRating
     */
    public function setRussiaRating($russiaRating)
    {
        $this->russiaRating = $russiaRating;
    }

    /**
     * @return mixed
     */
    public function getSkfilmRating()
    {
        return $this->skfilmRating;
    }

    /**
     * @param $skfilmRating
     */
    public function setSkfilmRating($skfilmRating)
    {
        $this->skfilmRating = $skfilmRating;
    }

    /**
     * @return mixed
     */
    public function getSmaisRating()
    {
        return $this->smaisRating;
    }

    /**
     * @param $smaisRating
     */
    public function setSmaisRating($smaisRating)
    {
        $this->smaisRating = $smaisRating;
    }

    /**
     * @return mixed
     */
    public function getSmsaRating()
    {
        return $this->smsaRating;
    }

    /**
     * @param $smsaRating
     */
    public function setSmsaRating($smsaRating)
    {
        $this->smsaRating = $smsaRating;
    }

    /**
     * @return mixed
     */
    public function getTvpgRating()
    {
        return $this->tvpgRating;
    }

    /**
     * @param $tvpgRating
     */
    public function setTvpgRating($tvpgRating)
    {
        $this->tvpgRating = $tvpgRating;
    }

    /**
     * @return mixed
     */
    public function getYtRating()
    {
        return $this->ytRating;
    }

    /**
     * @param $ytRating
     */
    public function setYtRating($ytRating)
    {
        $this->ytRating = $ytRating;
    }
}

/**
 * Class Google_Service_YouTube_GeoPoint
 */
class Google_Service_YouTube_GeoPoint extends Google_Model
{
    public $altitude;
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @param $altitude
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
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
}

/**
 * Class Google_Service_YouTube_GuideCategory
 */
class Google_Service_YouTube_GuideCategory extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_GuideCategorySnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_GuideCategorySnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_GuideCategorySnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_GuideCategoryListResponse
 */
class Google_Service_YouTube_GuideCategoryListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_GuideCategory';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_GuideCategorySnippet
 */
class Google_Service_YouTube_GuideCategorySnippet extends Google_Model
{
    public $channelId;
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
 * Class Google_Service_YouTube_I18nLanguage
 */
class Google_Service_YouTube_I18nLanguage extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_I18nLanguageSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_I18nLanguageSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_I18nLanguageSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_I18nLanguageListResponse
 */
class Google_Service_YouTube_I18nLanguageListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_I18nLanguage';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_I18nLanguageSnippet
 */
class Google_Service_YouTube_I18nLanguageSnippet extends Google_Model
{
    public $hl;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHl()
    {
        return $this->hl;
    }

    /**
     * @param $hl
     */
    public function setHl($hl)
    {
        $this->hl = $hl;
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
}

/**
 * Class Google_Service_YouTube_I18nRegion
 */
class Google_Service_YouTube_I18nRegion extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_I18nRegionSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_I18nRegionSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_I18nRegionSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_I18nRegionListResponse
 */
class Google_Service_YouTube_I18nRegionListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_I18nRegion';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_I18nRegionSnippet
 */
class Google_Service_YouTube_I18nRegionSnippet extends Google_Model
{
    public $gl;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getGl()
    {
        return $this->gl;
    }

    /**
     * @param $gl
     */
    public function setGl($gl)
    {
        $this->gl = $gl;
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
}

/**
 * Class Google_Service_YouTube_ImageSettings
 */
class Google_Service_YouTube_ImageSettings extends Google_Model
{
    public $bannerExternalUrl;
    public $bannerImageUrl;
    public $bannerMobileExtraHdImageUrl;
    public $bannerMobileHdImageUrl;
    public $bannerMobileImageUrl;
    public $bannerMobileLowImageUrl;
    public $bannerMobileMediumHdImageUrl;
    public $bannerTabletExtraHdImageUrl;
    public $bannerTabletHdImageUrl;
    public $bannerTabletImageUrl;
    public $bannerTabletLowImageUrl;
    public $bannerTvHighImageUrl;
    public $bannerTvImageUrl;
    public $bannerTvLowImageUrl;
    public $bannerTvMediumImageUrl;
    public $trackingImageUrl;
    public $watchIconImageUrl;
    protected $internal_gapi_mappings = [];
    protected $backgroundImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
    protected $backgroundImageUrlDataType = '';
    protected $largeBrandedBannerImageImapScriptType = 'Google_Service_YouTube_LocalizedProperty';
    protected $largeBrandedBannerImageImapScriptDataType = '';
    protected $largeBrandedBannerImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
    protected $largeBrandedBannerImageUrlDataType = '';
    protected $smallBrandedBannerImageImapScriptType = 'Google_Service_YouTube_LocalizedProperty';
    protected $smallBrandedBannerImageImapScriptDataType = '';
    protected $smallBrandedBannerImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
    protected $smallBrandedBannerImageUrlDataType = '';

    /**
     * @param Google_Service_YouTube_LocalizedProperty $backgroundImageUrl
     */
    public function setBackgroundImageUrl(Google_Service_YouTube_LocalizedProperty $backgroundImageUrl)
    {
        $this->backgroundImageUrl = $backgroundImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBackgroundImageUrl()
    {
        return $this->backgroundImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerExternalUrl()
    {
        return $this->bannerExternalUrl;
    }

    /**
     * @param $bannerExternalUrl
     */
    public function setBannerExternalUrl($bannerExternalUrl)
    {
        $this->bannerExternalUrl = $bannerExternalUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerImageUrl()
    {
        return $this->bannerImageUrl;
    }

    /**
     * @param $bannerImageUrl
     */
    public function setBannerImageUrl($bannerImageUrl)
    {
        $this->bannerImageUrl = $bannerImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerMobileExtraHdImageUrl()
    {
        return $this->bannerMobileExtraHdImageUrl;
    }

    /**
     * @param $bannerMobileExtraHdImageUrl
     */
    public function setBannerMobileExtraHdImageUrl($bannerMobileExtraHdImageUrl)
    {
        $this->bannerMobileExtraHdImageUrl = $bannerMobileExtraHdImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerMobileHdImageUrl()
    {
        return $this->bannerMobileHdImageUrl;
    }

    /**
     * @param $bannerMobileHdImageUrl
     */
    public function setBannerMobileHdImageUrl($bannerMobileHdImageUrl)
    {
        $this->bannerMobileHdImageUrl = $bannerMobileHdImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerMobileImageUrl()
    {
        return $this->bannerMobileImageUrl;
    }

    /**
     * @param $bannerMobileImageUrl
     */
    public function setBannerMobileImageUrl($bannerMobileImageUrl)
    {
        $this->bannerMobileImageUrl = $bannerMobileImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerMobileLowImageUrl()
    {
        return $this->bannerMobileLowImageUrl;
    }

    /**
     * @param $bannerMobileLowImageUrl
     */
    public function setBannerMobileLowImageUrl($bannerMobileLowImageUrl)
    {
        $this->bannerMobileLowImageUrl = $bannerMobileLowImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerMobileMediumHdImageUrl()
    {
        return $this->bannerMobileMediumHdImageUrl;
    }

    /**
     * @param $bannerMobileMediumHdImageUrl
     */
    public function setBannerMobileMediumHdImageUrl($bannerMobileMediumHdImageUrl)
    {
        $this->bannerMobileMediumHdImageUrl = $bannerMobileMediumHdImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTabletExtraHdImageUrl()
    {
        return $this->bannerTabletExtraHdImageUrl;
    }

    /**
     * @param $bannerTabletExtraHdImageUrl
     */
    public function setBannerTabletExtraHdImageUrl($bannerTabletExtraHdImageUrl)
    {
        $this->bannerTabletExtraHdImageUrl = $bannerTabletExtraHdImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTabletHdImageUrl()
    {
        return $this->bannerTabletHdImageUrl;
    }

    /**
     * @param $bannerTabletHdImageUrl
     */
    public function setBannerTabletHdImageUrl($bannerTabletHdImageUrl)
    {
        $this->bannerTabletHdImageUrl = $bannerTabletHdImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTabletImageUrl()
    {
        return $this->bannerTabletImageUrl;
    }

    /**
     * @param $bannerTabletImageUrl
     */
    public function setBannerTabletImageUrl($bannerTabletImageUrl)
    {
        $this->bannerTabletImageUrl = $bannerTabletImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTabletLowImageUrl()
    {
        return $this->bannerTabletLowImageUrl;
    }

    /**
     * @param $bannerTabletLowImageUrl
     */
    public function setBannerTabletLowImageUrl($bannerTabletLowImageUrl)
    {
        $this->bannerTabletLowImageUrl = $bannerTabletLowImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTvHighImageUrl()
    {
        return $this->bannerTvHighImageUrl;
    }

    /**
     * @param $bannerTvHighImageUrl
     */
    public function setBannerTvHighImageUrl($bannerTvHighImageUrl)
    {
        $this->bannerTvHighImageUrl = $bannerTvHighImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTvImageUrl()
    {
        return $this->bannerTvImageUrl;
    }

    /**
     * @param $bannerTvImageUrl
     */
    public function setBannerTvImageUrl($bannerTvImageUrl)
    {
        $this->bannerTvImageUrl = $bannerTvImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTvLowImageUrl()
    {
        return $this->bannerTvLowImageUrl;
    }

    /**
     * @param $bannerTvLowImageUrl
     */
    public function setBannerTvLowImageUrl($bannerTvLowImageUrl)
    {
        $this->bannerTvLowImageUrl = $bannerTvLowImageUrl;
    }

    /**
     * @return mixed
     */
    public function getBannerTvMediumImageUrl()
    {
        return $this->bannerTvMediumImageUrl;
    }

    /**
     * @param $bannerTvMediumImageUrl
     */
    public function setBannerTvMediumImageUrl($bannerTvMediumImageUrl)
    {
        $this->bannerTvMediumImageUrl = $bannerTvMediumImageUrl;
    }

    /**
     * @param Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageImapScript
     */
    public function setLargeBrandedBannerImageImapScript(Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageImapScript)
    {
        $this->largeBrandedBannerImageImapScript = $largeBrandedBannerImageImapScript;
    }

    /**
     * @return mixed
     */
    public function getLargeBrandedBannerImageImapScript()
    {
        return $this->largeBrandedBannerImageImapScript;
    }

    /**
     * @param Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageUrl
     */
    public function setLargeBrandedBannerImageUrl(Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageUrl)
    {
        $this->largeBrandedBannerImageUrl = $largeBrandedBannerImageUrl;
    }

    /**
     * @return mixed
     */
    public function getLargeBrandedBannerImageUrl()
    {
        return $this->largeBrandedBannerImageUrl;
    }

    /**
     * @param Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageImapScript
     */
    public function setSmallBrandedBannerImageImapScript(Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageImapScript)
    {
        $this->smallBrandedBannerImageImapScript = $smallBrandedBannerImageImapScript;
    }

    /**
     * @return mixed
     */
    public function getSmallBrandedBannerImageImapScript()
    {
        return $this->smallBrandedBannerImageImapScript;
    }

    /**
     * @param Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageUrl
     */
    public function setSmallBrandedBannerImageUrl(Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageUrl)
    {
        $this->smallBrandedBannerImageUrl = $smallBrandedBannerImageUrl;
    }

    /**
     * @return mixed
     */
    public function getSmallBrandedBannerImageUrl()
    {
        return $this->smallBrandedBannerImageUrl;
    }

    /**
     * @return mixed
     */
    public function getTrackingImageUrl()
    {
        return $this->trackingImageUrl;
    }

    /**
     * @param $trackingImageUrl
     */
    public function setTrackingImageUrl($trackingImageUrl)
    {
        $this->trackingImageUrl = $trackingImageUrl;
    }

    /**
     * @return mixed
     */
    public function getWatchIconImageUrl()
    {
        return $this->watchIconImageUrl;
    }

    /**
     * @param $watchIconImageUrl
     */
    public function setWatchIconImageUrl($watchIconImageUrl)
    {
        $this->watchIconImageUrl = $watchIconImageUrl;
    }
}

/**
 * Class Google_Service_YouTube_IngestionInfo
 */
class Google_Service_YouTube_IngestionInfo extends Google_Model
{
    public $backupIngestionAddress;
    public $ingestionAddress;
    public $streamName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackupIngestionAddress()
    {
        return $this->backupIngestionAddress;
    }

    /**
     * @param $backupIngestionAddress
     */
    public function setBackupIngestionAddress($backupIngestionAddress)
    {
        $this->backupIngestionAddress = $backupIngestionAddress;
    }

    /**
     * @return mixed
     */
    public function getIngestionAddress()
    {
        return $this->ingestionAddress;
    }

    /**
     * @param $ingestionAddress
     */
    public function setIngestionAddress($ingestionAddress)
    {
        $this->ingestionAddress = $ingestionAddress;
    }

    /**
     * @return mixed
     */
    public function getStreamName()
    {
        return $this->streamName;
    }

    /**
     * @param $streamName
     */
    public function setStreamName($streamName)
    {
        $this->streamName = $streamName;
    }
}

/**
 * Class Google_Service_YouTube_InvideoBranding
 */
class Google_Service_YouTube_InvideoBranding extends Google_Model
{
    public $imageBytes;
    public $imageUrl;
    public $targetChannelId;
    protected $internal_gapi_mappings = [];
    protected $positionType = 'Google_Service_YouTube_InvideoPosition';
    protected $positionDataType = '';
    protected $timingType = 'Google_Service_YouTube_InvideoTiming';
    protected $timingDataType = '';

    /**
     * @return mixed
     */
    public function getImageBytes()
    {
        return $this->imageBytes;
    }

    /**
     * @param $imageBytes
     */
    public function setImageBytes($imageBytes)
    {
        $this->imageBytes = $imageBytes;
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
     * @param Google_Service_YouTube_InvideoPosition $position
     */
    public function setPosition(Google_Service_YouTube_InvideoPosition $position)
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

    /**
     * @return mixed
     */
    public function getTargetChannelId()
    {
        return $this->targetChannelId;
    }

    /**
     * @param $targetChannelId
     */
    public function setTargetChannelId($targetChannelId)
    {
        $this->targetChannelId = $targetChannelId;
    }

    /**
     * @param Google_Service_YouTube_InvideoTiming $timing
     */
    public function setTiming(Google_Service_YouTube_InvideoTiming $timing)
    {
        $this->timing = $timing;
    }

    /**
     * @return mixed
     */
    public function getTiming()
    {
        return $this->timing;
    }
}

/**
 * Class Google_Service_YouTube_InvideoPosition
 */
class Google_Service_YouTube_InvideoPosition extends Google_Model
{
    public $cornerPosition;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCornerPosition()
    {
        return $this->cornerPosition;
    }

    /**
     * @param $cornerPosition
     */
    public function setCornerPosition($cornerPosition)
    {
        $this->cornerPosition = $cornerPosition;
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
 * Class Google_Service_YouTube_InvideoPromotion
 */
class Google_Service_YouTube_InvideoPromotion extends Google_Collection
{
    public $useSmartTiming;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $defaultTimingType = 'Google_Service_YouTube_InvideoTiming';
    protected $defaultTimingDataType = '';
    protected $itemsType = 'Google_Service_YouTube_PromotedItem';
    protected $itemsDataType = 'array';
    protected $positionType = 'Google_Service_YouTube_InvideoPosition';
    protected $positionDataType = '';

    /**
     * @param Google_Service_YouTube_InvideoTiming $defaultTiming
     */
    public function setDefaultTiming(Google_Service_YouTube_InvideoTiming $defaultTiming)
    {
        $this->defaultTiming = $defaultTiming;
    }

    /**
     * @return mixed
     */
    public function getDefaultTiming()
    {
        return $this->defaultTiming;
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
     * @param Google_Service_YouTube_InvideoPosition $position
     */
    public function setPosition(Google_Service_YouTube_InvideoPosition $position)
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

    /**
     * @return mixed
     */
    public function getUseSmartTiming()
    {
        return $this->useSmartTiming;
    }

    /**
     * @param $useSmartTiming
     */
    public function setUseSmartTiming($useSmartTiming)
    {
        $this->useSmartTiming = $useSmartTiming;
    }
}

/**
 * Class Google_Service_YouTube_InvideoTiming
 */
class Google_Service_YouTube_InvideoTiming extends Google_Model
{
    public $durationMs;
    public $offsetMs;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDurationMs()
    {
        return $this->durationMs;
    }

    /**
     * @param $durationMs
     */
    public function setDurationMs($durationMs)
    {
        $this->durationMs = $durationMs;
    }

    /**
     * @return mixed
     */
    public function getOffsetMs()
    {
        return $this->offsetMs;
    }

    /**
     * @param $offsetMs
     */
    public function setOffsetMs($offsetMs)
    {
        $this->offsetMs = $offsetMs;
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
 * Class Google_Service_YouTube_LanguageTag
 */
class Google_Service_YouTube_LanguageTag extends Google_Model
{
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_LiveBroadcast
 */
class Google_Service_YouTube_LiveBroadcast extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_LiveBroadcastContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_LiveBroadcastSnippet';
    protected $snippetDataType = '';
    protected $statusType = 'Google_Service_YouTube_LiveBroadcastStatus';
    protected $statusDataType = '';


    /**
     * @param Google_Service_YouTube_LiveBroadcastContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_LiveBroadcastContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param Google_Service_YouTube_LiveBroadcastSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_LiveBroadcastSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_LiveBroadcastStatus $status
     */
    public function setStatus(Google_Service_YouTube_LiveBroadcastStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}

/**
 * Class Google_Service_YouTube_LiveBroadcastContentDetails
 */
class Google_Service_YouTube_LiveBroadcastContentDetails extends Google_Model
{
    public $boundStreamId;
    public $enableClosedCaptions;
    public $enableContentEncryption;
    public $enableDvr;
    public $enableEmbed;
    public $recordFromStart;
    public $startWithSlate;
    protected $internal_gapi_mappings = [];
    protected $monitorStreamType = 'Google_Service_YouTube_MonitorStreamInfo';
    protected $monitorStreamDataType = '';

    /**
     * @return mixed
     */
    public function getBoundStreamId()
    {
        return $this->boundStreamId;
    }

    /**
     * @param $boundStreamId
     */
    public function setBoundStreamId($boundStreamId)
    {
        $this->boundStreamId = $boundStreamId;
    }

    /**
     * @return mixed
     */
    public function getEnableClosedCaptions()
    {
        return $this->enableClosedCaptions;
    }

    /**
     * @param $enableClosedCaptions
     */
    public function setEnableClosedCaptions($enableClosedCaptions)
    {
        $this->enableClosedCaptions = $enableClosedCaptions;
    }

    /**
     * @return mixed
     */
    public function getEnableContentEncryption()
    {
        return $this->enableContentEncryption;
    }

    /**
     * @param $enableContentEncryption
     */
    public function setEnableContentEncryption($enableContentEncryption)
    {
        $this->enableContentEncryption = $enableContentEncryption;
    }

    /**
     * @return mixed
     */
    public function getEnableDvr()
    {
        return $this->enableDvr;
    }

    /**
     * @param $enableDvr
     */
    public function setEnableDvr($enableDvr)
    {
        $this->enableDvr = $enableDvr;
    }

    /**
     * @return mixed
     */
    public function getEnableEmbed()
    {
        return $this->enableEmbed;
    }

    /**
     * @param $enableEmbed
     */
    public function setEnableEmbed($enableEmbed)
    {
        $this->enableEmbed = $enableEmbed;
    }

    /**
     * @param Google_Service_YouTube_MonitorStreamInfo $monitorStream
     */
    public function setMonitorStream(Google_Service_YouTube_MonitorStreamInfo $monitorStream)
    {
        $this->monitorStream = $monitorStream;
    }

    /**
     * @return mixed
     */
    public function getMonitorStream()
    {
        return $this->monitorStream;
    }

    /**
     * @return mixed
     */
    public function getRecordFromStart()
    {
        return $this->recordFromStart;
    }

    /**
     * @param $recordFromStart
     */
    public function setRecordFromStart($recordFromStart)
    {
        $this->recordFromStart = $recordFromStart;
    }

    /**
     * @return mixed
     */
    public function getStartWithSlate()
    {
        return $this->startWithSlate;
    }

    /**
     * @param $startWithSlate
     */
    public function setStartWithSlate($startWithSlate)
    {
        $this->startWithSlate = $startWithSlate;
    }
}

/**
 * Class Google_Service_YouTube_LiveBroadcastListResponse
 */
class Google_Service_YouTube_LiveBroadcastListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_LiveBroadcast';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_LiveBroadcastSnippet
 */
class Google_Service_YouTube_LiveBroadcastSnippet extends Google_Model
{
    public $actualEndTime;
    public $actualStartTime;
    public $channelId;
    public $description;
    public $publishedAt;
    public $scheduledEndTime;
    public $scheduledStartTime;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getActualEndTime()
    {
        return $this->actualEndTime;
    }

    /**
     * @param $actualEndTime
     */
    public function setActualEndTime($actualEndTime)
    {
        $this->actualEndTime = $actualEndTime;
    }

    /**
     * @return mixed
     */
    public function getActualStartTime()
    {
        return $this->actualStartTime;
    }

    /**
     * @param $actualStartTime
     */
    public function setActualStartTime($actualStartTime)
    {
        $this->actualStartTime = $actualStartTime;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return mixed
     */
    public function getScheduledEndTime()
    {
        return $this->scheduledEndTime;
    }

    /**
     * @param $scheduledEndTime
     */
    public function setScheduledEndTime($scheduledEndTime)
    {
        $this->scheduledEndTime = $scheduledEndTime;
    }

    /**
     * @return mixed
     */
    public function getScheduledStartTime()
    {
        return $this->scheduledStartTime;
    }

    /**
     * @param $scheduledStartTime
     */
    public function setScheduledStartTime($scheduledStartTime)
    {
        $this->scheduledStartTime = $scheduledStartTime;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_LiveBroadcastStatus
 */
class Google_Service_YouTube_LiveBroadcastStatus extends Google_Model
{
    public $isDefaultBroadcast;
    public $lifeCycleStatus;
    public $liveBroadcastPriority;
    public $privacyStatus;
    public $recordingStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsDefaultBroadcast()
    {
        return $this->isDefaultBroadcast;
    }

    /**
     * @param $isDefaultBroadcast
     */
    public function setIsDefaultBroadcast($isDefaultBroadcast)
    {
        $this->isDefaultBroadcast = $isDefaultBroadcast;
    }

    /**
     * @return mixed
     */
    public function getLifeCycleStatus()
    {
        return $this->lifeCycleStatus;
    }

    /**
     * @param $lifeCycleStatus
     */
    public function setLifeCycleStatus($lifeCycleStatus)
    {
        $this->lifeCycleStatus = $lifeCycleStatus;
    }

    /**
     * @return mixed
     */
    public function getLiveBroadcastPriority()
    {
        return $this->liveBroadcastPriority;
    }

    /**
     * @param $liveBroadcastPriority
     */
    public function setLiveBroadcastPriority($liveBroadcastPriority)
    {
        $this->liveBroadcastPriority = $liveBroadcastPriority;
    }

    /**
     * @return mixed
     */
    public function getPrivacyStatus()
    {
        return $this->privacyStatus;
    }

    /**
     * @param $privacyStatus
     */
    public function setPrivacyStatus($privacyStatus)
    {
        $this->privacyStatus = $privacyStatus;
    }

    /**
     * @return mixed
     */
    public function getRecordingStatus()
    {
        return $this->recordingStatus;
    }

    /**
     * @param $recordingStatus
     */
    public function setRecordingStatus($recordingStatus)
    {
        $this->recordingStatus = $recordingStatus;
    }
}

/**
 * Class Google_Service_YouTube_LiveStream
 */
class Google_Service_YouTube_LiveStream extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $cdnType = 'Google_Service_YouTube_CdnSettings';
    protected $cdnDataType = '';
    protected $contentDetailsType = 'Google_Service_YouTube_LiveStreamContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_LiveStreamSnippet';
    protected $snippetDataType = '';
    protected $statusType = 'Google_Service_YouTube_LiveStreamStatus';
    protected $statusDataType = '';


    /**
     * @param Google_Service_YouTube_CdnSettings $cdn
     */
    public function setCdn(Google_Service_YouTube_CdnSettings $cdn)
    {
        $this->cdn = $cdn;
    }

    /**
     * @return mixed
     */
    public function getCdn()
    {
        return $this->cdn;
    }

    /**
     * @param Google_Service_YouTube_LiveStreamContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_LiveStreamContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param Google_Service_YouTube_LiveStreamSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_LiveStreamSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_LiveStreamStatus $status
     */
    public function setStatus(Google_Service_YouTube_LiveStreamStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}

/**
 * Class Google_Service_YouTube_LiveStreamContentDetails
 */
class Google_Service_YouTube_LiveStreamContentDetails extends Google_Model
{
    public $closedCaptionsIngestionUrl;
    public $isReusable;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getClosedCaptionsIngestionUrl()
    {
        return $this->closedCaptionsIngestionUrl;
    }

    /**
     * @param $closedCaptionsIngestionUrl
     */
    public function setClosedCaptionsIngestionUrl($closedCaptionsIngestionUrl)
    {
        $this->closedCaptionsIngestionUrl = $closedCaptionsIngestionUrl;
    }

    /**
     * @return mixed
     */
    public function getIsReusable()
    {
        return $this->isReusable;
    }

    /**
     * @param $isReusable
     */
    public function setIsReusable($isReusable)
    {
        $this->isReusable = $isReusable;
    }
}

/**
 * Class Google_Service_YouTube_LiveStreamListResponse
 */
class Google_Service_YouTube_LiveStreamListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_LiveStream';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_LiveStreamSnippet
 */
class Google_Service_YouTube_LiveStreamSnippet extends Google_Model
{
    public $channelId;
    public $description;
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
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
 * Class Google_Service_YouTube_LiveStreamStatus
 */
class Google_Service_YouTube_LiveStreamStatus extends Google_Model
{
    public $isDefaultStream;
    public $streamStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsDefaultStream()
    {
        return $this->isDefaultStream;
    }

    /**
     * @param $isDefaultStream
     */
    public function setIsDefaultStream($isDefaultStream)
    {
        $this->isDefaultStream = $isDefaultStream;
    }

    /**
     * @return mixed
     */
    public function getStreamStatus()
    {
        return $this->streamStatus;
    }

    /**
     * @param $streamStatus
     */
    public function setStreamStatus($streamStatus)
    {
        $this->streamStatus = $streamStatus;
    }
}

/**
 * Class Google_Service_YouTube_LocalizedProperty
 */
class Google_Service_YouTube_LocalizedProperty extends Google_Collection
{
    public $default;
    protected $collection_key = 'localized';
    protected $internal_gapi_mappings = [];
    protected $defaultLanguageType = 'Google_Service_YouTube_LanguageTag';
    protected $defaultLanguageDataType = '';
    protected $localizedType = 'Google_Service_YouTube_LocalizedString';
    protected $localizedDataType = 'array';

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @param Google_Service_YouTube_LanguageTag $defaultLanguage
     */
    public function setDefaultLanguage(Google_Service_YouTube_LanguageTag $defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $localized
     */
    public function setLocalized($localized)
    {
        $this->localized = $localized;
    }

    /**
     * @return mixed
     */
    public function getLocalized()
    {
        return $this->localized;
    }
}

/**
 * Class Google_Service_YouTube_LocalizedString
 */
class Google_Service_YouTube_LocalizedString extends Google_Model
{
    public $language;
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_MonitorStreamInfo
 */
class Google_Service_YouTube_MonitorStreamInfo extends Google_Model
{
    public $broadcastStreamDelayMs;
    public $embedHtml;
    public $enableMonitorStream;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBroadcastStreamDelayMs()
    {
        return $this->broadcastStreamDelayMs;
    }

    /**
     * @param $broadcastStreamDelayMs
     */
    public function setBroadcastStreamDelayMs($broadcastStreamDelayMs)
    {
        $this->broadcastStreamDelayMs = $broadcastStreamDelayMs;
    }

    /**
     * @return mixed
     */
    public function getEmbedHtml()
    {
        return $this->embedHtml;
    }

    /**
     * @param $embedHtml
     */
    public function setEmbedHtml($embedHtml)
    {
        $this->embedHtml = $embedHtml;
    }

    /**
     * @return mixed
     */
    public function getEnableMonitorStream()
    {
        return $this->enableMonitorStream;
    }

    /**
     * @param $enableMonitorStream
     */
    public function setEnableMonitorStream($enableMonitorStream)
    {
        $this->enableMonitorStream = $enableMonitorStream;
    }
}

/**
 * Class Google_Service_YouTube_PageInfo
 */
class Google_Service_YouTube_PageInfo extends Google_Model
{
    public $resultsPerPage;
    public $totalResults;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

    /**
     * @param $resultsPerPage
     */
    public function setResultsPerPage($resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_YouTube_Playlist
 */
class Google_Service_YouTube_Playlist extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_PlaylistContentDetails';
    protected $contentDetailsDataType = '';
    protected $localizationsType = 'Google_Service_YouTube_PlaylistLocalization';
    protected $localizationsDataType = 'map';
    protected $playerType = 'Google_Service_YouTube_PlaylistPlayer';
    protected $playerDataType = '';
    protected $snippetType = 'Google_Service_YouTube_PlaylistSnippet';
    protected $snippetDataType = '';
    protected $statusType = 'Google_Service_YouTube_PlaylistStatus';
    protected $statusDataType = '';


    /**
     * @param Google_Service_YouTube_PlaylistContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_PlaylistContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param $localizations
     */
    public function setLocalizations($localizations)
    {
        $this->localizations = $localizations;
    }

    /**
     * @return mixed
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * @param Google_Service_YouTube_PlaylistPlayer $player
     */
    public function setPlayer(Google_Service_YouTube_PlaylistPlayer $player)
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
     * @param Google_Service_YouTube_PlaylistSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_PlaylistSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_PlaylistStatus $status
     */
    public function setStatus(Google_Service_YouTube_PlaylistStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistContentDetails
 */
class Google_Service_YouTube_PlaylistContentDetails extends Google_Model
{
    public $itemCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @param $itemCount
     */
    public function setItemCount($itemCount)
    {
        $this->itemCount = $itemCount;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistItem
 */
class Google_Service_YouTube_PlaylistItem extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_PlaylistItemContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_PlaylistItemSnippet';
    protected $snippetDataType = '';
    protected $statusType = 'Google_Service_YouTube_PlaylistItemStatus';
    protected $statusDataType = '';


    /**
     * @param Google_Service_YouTube_PlaylistItemContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_PlaylistItemContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param Google_Service_YouTube_PlaylistItemSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_PlaylistItemSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_PlaylistItemStatus $status
     */
    public function setStatus(Google_Service_YouTube_PlaylistItemStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistItemContentDetails
 */
class Google_Service_YouTube_PlaylistItemContentDetails extends Google_Model
{
    public $endAt;
    public $note;
    public $startAt;
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param $endAt
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * @param $startAt
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistItemListResponse
 */
class Google_Service_YouTube_PlaylistItemListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_PlaylistItem';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistItemSnippet
 */
class Google_Service_YouTube_PlaylistItemSnippet extends Google_Model
{
    public $channelId;
    public $channelTitle;
    public $description;
    public $playlistId;
    public $position;
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
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
    public function getPlaylistId()
    {
        return $this->playlistId;
    }

    /**
     * @param $playlistId
     */
    public function setPlaylistId($playlistId)
    {
        $this->playlistId = $playlistId;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_PlaylistItemStatus
 */
class Google_Service_YouTube_PlaylistItemStatus extends Google_Model
{
    public $privacyStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPrivacyStatus()
    {
        return $this->privacyStatus;
    }

    /**
     * @param $privacyStatus
     */
    public function setPrivacyStatus($privacyStatus)
    {
        $this->privacyStatus = $privacyStatus;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistListResponse
 */
class Google_Service_YouTube_PlaylistListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Playlist';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistLocalization
 */
class Google_Service_YouTube_PlaylistLocalization extends Google_Model
{
    public $description;
    public $title;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_PlaylistLocalizations
 */
class Google_Service_YouTube_PlaylistLocalizations extends Google_Model
{
}

/**
 * Class Google_Service_YouTube_PlaylistPlayer
 */
class Google_Service_YouTube_PlaylistPlayer extends Google_Model
{
    public $embedHtml;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmbedHtml()
    {
        return $this->embedHtml;
    }

    /**
     * @param $embedHtml
     */
    public function setEmbedHtml($embedHtml)
    {
        $this->embedHtml = $embedHtml;
    }
}

/**
 * Class Google_Service_YouTube_PlaylistSnippet
 */
class Google_Service_YouTube_PlaylistSnippet extends Google_Collection
{
    public $channelId;
    public $channelTitle;
    public $defaultLanguage;
    public $description;
    public $publishedAt;
    public $tags;
    public $title;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];
    protected $localizedType = 'Google_Service_YouTube_PlaylistLocalization';
    protected $localizedDataType = '';
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
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
     * @param Google_Service_YouTube_PlaylistLocalization $localized
     */
    public function setLocalized(Google_Service_YouTube_PlaylistLocalization $localized)
    {
        $this->localized = $localized;
    }

    /**
     * @return mixed
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_PlaylistStatus
 */
class Google_Service_YouTube_PlaylistStatus extends Google_Model
{
    public $privacyStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPrivacyStatus()
    {
        return $this->privacyStatus;
    }

    /**
     * @param $privacyStatus
     */
    public function setPrivacyStatus($privacyStatus)
    {
        $this->privacyStatus = $privacyStatus;
    }
}

/**
 * Class Google_Service_YouTube_PromotedItem
 */
class Google_Service_YouTube_PromotedItem extends Google_Model
{
    public $customMessage;
    public $promotedByContentOwner;
    protected $internal_gapi_mappings = [];
    protected $idType = 'Google_Service_YouTube_PromotedItemId';
    protected $idDataType = '';
    protected $timingType = 'Google_Service_YouTube_InvideoTiming';
    protected $timingDataType = '';

    /**
     * @return mixed
     */
    public function getCustomMessage()
    {
        return $this->customMessage;
    }

    /**
     * @param $customMessage
     */
    public function setCustomMessage($customMessage)
    {
        $this->customMessage = $customMessage;
    }

    /**
     * @param Google_Service_YouTube_PromotedItemId $id
     */
    public function setId(Google_Service_YouTube_PromotedItemId $id)
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
    public function getPromotedByContentOwner()
    {
        return $this->promotedByContentOwner;
    }

    /**
     * @param $promotedByContentOwner
     */
    public function setPromotedByContentOwner($promotedByContentOwner)
    {
        $this->promotedByContentOwner = $promotedByContentOwner;
    }

    /**
     * @param Google_Service_YouTube_InvideoTiming $timing
     */
    public function setTiming(Google_Service_YouTube_InvideoTiming $timing)
    {
        $this->timing = $timing;
    }

    /**
     * @return mixed
     */
    public function getTiming()
    {
        return $this->timing;
    }
}

/**
 * Class Google_Service_YouTube_PromotedItemId
 */
class Google_Service_YouTube_PromotedItemId extends Google_Model
{
    public $recentlyUploadedBy;
    public $type;
    public $videoId;
    public $websiteUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getRecentlyUploadedBy()
    {
        return $this->recentlyUploadedBy;
    }

    /**
     * @param $recentlyUploadedBy
     */
    public function setRecentlyUploadedBy($recentlyUploadedBy)
    {
        $this->recentlyUploadedBy = $recentlyUploadedBy;
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
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }

    /**
     * @return mixed
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }
}

/**
 * Class Google_Service_YouTube_PropertyValue
 */
class Google_Service_YouTube_PropertyValue extends Google_Model
{
    public $property;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
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
 * Class Google_Service_YouTube_ResourceId
 */
class Google_Service_YouTube_ResourceId extends Google_Model
{
    public $channelId;
    public $kind;
    public $playlistId;
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
    public function getPlaylistId()
    {
        return $this->playlistId;
    }

    /**
     * @param $playlistId
     */
    public function setPlaylistId($playlistId)
    {
        $this->playlistId = $playlistId;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_SearchListResponse
 */
class Google_Service_YouTube_SearchListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_SearchResult';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_SearchResult
 */
class Google_Service_YouTube_SearchResult extends Google_Model
{
    public $etag;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $idType = 'Google_Service_YouTube_ResourceId';
    protected $idDataType = '';
    protected $snippetType = 'Google_Service_YouTube_SearchResultSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_ResourceId $id
     */
    public function setId(Google_Service_YouTube_ResourceId $id)
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
     * @param Google_Service_YouTube_SearchResultSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_SearchResultSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_SearchResultSnippet
 */
class Google_Service_YouTube_SearchResultSnippet extends Google_Model
{
    public $channelId;
    public $channelTitle;
    public $description;
    public $liveBroadcastContent;
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
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
    public function getLiveBroadcastContent()
    {
        return $this->liveBroadcastContent;
    }

    /**
     * @param $liveBroadcastContent
     */
    public function setLiveBroadcastContent($liveBroadcastContent)
    {
        $this->liveBroadcastContent = $liveBroadcastContent;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_Subscription
 */
class Google_Service_YouTube_Subscription extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTube_SubscriptionContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_SubscriptionSnippet';
    protected $snippetDataType = '';
    protected $subscriberSnippetType = 'Google_Service_YouTube_SubscriptionSubscriberSnippet';
    protected $subscriberSnippetDataType = '';


    /**
     * @param Google_Service_YouTube_SubscriptionContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_SubscriptionContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
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
     * @param Google_Service_YouTube_SubscriptionSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_SubscriptionSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_SubscriptionSubscriberSnippet $subscriberSnippet
     */
    public function setSubscriberSnippet(Google_Service_YouTube_SubscriptionSubscriberSnippet $subscriberSnippet)
    {
        $this->subscriberSnippet = $subscriberSnippet;
    }

    /**
     * @return mixed
     */
    public function getSubscriberSnippet()
    {
        return $this->subscriberSnippet;
    }
}

/**
 * Class Google_Service_YouTube_SubscriptionContentDetails
 */
class Google_Service_YouTube_SubscriptionContentDetails extends Google_Model
{
    public $activityType;
    public $newItemCount;
    public $totalItemCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * @param $activityType
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @return mixed
     */
    public function getNewItemCount()
    {
        return $this->newItemCount;
    }

    /**
     * @param $newItemCount
     */
    public function setNewItemCount($newItemCount)
    {
        $this->newItemCount = $newItemCount;
    }

    /**
     * @return mixed
     */
    public function getTotalItemCount()
    {
        return $this->totalItemCount;
    }

    /**
     * @param $totalItemCount
     */
    public function setTotalItemCount($totalItemCount)
    {
        $this->totalItemCount = $totalItemCount;
    }
}

/**
 * Class Google_Service_YouTube_SubscriptionListResponse
 */
class Google_Service_YouTube_SubscriptionListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Subscription';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_SubscriptionSnippet
 */
class Google_Service_YouTube_SubscriptionSnippet extends Google_Model
{
    public $channelId;
    public $channelTitle;
    public $description;
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $resourceIdType = 'Google_Service_YouTube_ResourceId';
    protected $resourceIdDataType = '';
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
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
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @param Google_Service_YouTube_ResourceId $resourceId
     */
    public function setResourceId(Google_Service_YouTube_ResourceId $resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_SubscriptionSubscriberSnippet
 */
class Google_Service_YouTube_SubscriptionSubscriberSnippet extends Google_Model
{
    public $channelId;
    public $description;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_Thumbnail
 */
class Google_Service_YouTube_Thumbnail extends Google_Model
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
 * Class Google_Service_YouTube_ThumbnailDetails
 */
class Google_Service_YouTube_ThumbnailDetails extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $defaultType = 'Google_Service_YouTube_Thumbnail';
    protected $defaultDataType = '';
    protected $highType = 'Google_Service_YouTube_Thumbnail';
    protected $highDataType = '';
    protected $maxresType = 'Google_Service_YouTube_Thumbnail';
    protected $maxresDataType = '';
    protected $mediumType = 'Google_Service_YouTube_Thumbnail';
    protected $mediumDataType = '';
    protected $standardType = 'Google_Service_YouTube_Thumbnail';
    protected $standardDataType = '';


    /**
     * @param Google_Service_YouTube_Thumbnail $default
     */
    public function setDefault(Google_Service_YouTube_Thumbnail $default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param Google_Service_YouTube_Thumbnail $high
     */
    public function setHigh(Google_Service_YouTube_Thumbnail $high)
    {
        $this->high = $high;
    }

    /**
     * @return mixed
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @param Google_Service_YouTube_Thumbnail $maxres
     */
    public function setMaxres(Google_Service_YouTube_Thumbnail $maxres)
    {
        $this->maxres = $maxres;
    }

    /**
     * @return mixed
     */
    public function getMaxres()
    {
        return $this->maxres;
    }

    /**
     * @param Google_Service_YouTube_Thumbnail $medium
     */
    public function setMedium(Google_Service_YouTube_Thumbnail $medium)
    {
        $this->medium = $medium;
    }

    /**
     * @return mixed
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * @param Google_Service_YouTube_Thumbnail $standard
     */
    public function setStandard(Google_Service_YouTube_Thumbnail $standard)
    {
        $this->standard = $standard;
    }

    /**
     * @return mixed
     */
    public function getStandard()
    {
        return $this->standard;
    }
}

/**
 * Class Google_Service_YouTube_ThumbnailSetResponse
 */
class Google_Service_YouTube_ThumbnailSetResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_ThumbnailDetails';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_TokenPagination
 */
class Google_Service_YouTube_TokenPagination extends Google_Model
{
}

/**
 * Class Google_Service_YouTube_Video
 */
class Google_Service_YouTube_Video extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $ageGatingType = 'Google_Service_YouTube_VideoAgeGating';
    protected $ageGatingDataType = '';
    protected $contentDetailsType = 'Google_Service_YouTube_VideoContentDetails';
    protected $contentDetailsDataType = '';
    protected $conversionPingsType = 'Google_Service_YouTube_VideoConversionPings';
    protected $conversionPingsDataType = '';
    protected $fileDetailsType = 'Google_Service_YouTube_VideoFileDetails';
    protected $fileDetailsDataType = '';
    protected $liveStreamingDetailsType = 'Google_Service_YouTube_VideoLiveStreamingDetails';
    protected $liveStreamingDetailsDataType = '';
    protected $localizationsType = 'Google_Service_YouTube_VideoLocalization';
    protected $localizationsDataType = 'map';
    protected $monetizationDetailsType = 'Google_Service_YouTube_VideoMonetizationDetails';
    protected $monetizationDetailsDataType = '';
    protected $playerType = 'Google_Service_YouTube_VideoPlayer';
    protected $playerDataType = '';
    protected $processingDetailsType = 'Google_Service_YouTube_VideoProcessingDetails';
    protected $processingDetailsDataType = '';
    protected $projectDetailsType = 'Google_Service_YouTube_VideoProjectDetails';
    protected $projectDetailsDataType = '';
    protected $recordingDetailsType = 'Google_Service_YouTube_VideoRecordingDetails';
    protected $recordingDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTube_VideoSnippet';
    protected $snippetDataType = '';
    protected $statisticsType = 'Google_Service_YouTube_VideoStatistics';
    protected $statisticsDataType = '';
    protected $statusType = 'Google_Service_YouTube_VideoStatus';
    protected $statusDataType = '';
    protected $suggestionsType = 'Google_Service_YouTube_VideoSuggestions';
    protected $suggestionsDataType = '';
    protected $topicDetailsType = 'Google_Service_YouTube_VideoTopicDetails';
    protected $topicDetailsDataType = '';


    /**
     * @param Google_Service_YouTube_VideoAgeGating $ageGating
     */
    public function setAgeGating(Google_Service_YouTube_VideoAgeGating $ageGating)
    {
        $this->ageGating = $ageGating;
    }

    /**
     * @return mixed
     */
    public function getAgeGating()
    {
        return $this->ageGating;
    }

    /**
     * @param Google_Service_YouTube_VideoContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTube_VideoContentDetails $contentDetails)
    {
        $this->contentDetails = $contentDetails;
    }

    /**
     * @return mixed
     */
    public function getContentDetails()
    {
        return $this->contentDetails;
    }

    /**
     * @param Google_Service_YouTube_VideoConversionPings $conversionPings
     */
    public function setConversionPings(Google_Service_YouTube_VideoConversionPings $conversionPings)
    {
        $this->conversionPings = $conversionPings;
    }

    /**
     * @return mixed
     */
    public function getConversionPings()
    {
        return $this->conversionPings;
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
     * @param Google_Service_YouTube_VideoFileDetails $fileDetails
     */
    public function setFileDetails(Google_Service_YouTube_VideoFileDetails $fileDetails)
    {
        $this->fileDetails = $fileDetails;
    }

    /**
     * @return mixed
     */
    public function getFileDetails()
    {
        return $this->fileDetails;
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
     * @param Google_Service_YouTube_VideoLiveStreamingDetails $liveStreamingDetails
     */
    public function setLiveStreamingDetails(Google_Service_YouTube_VideoLiveStreamingDetails $liveStreamingDetails)
    {
        $this->liveStreamingDetails = $liveStreamingDetails;
    }

    /**
     * @return mixed
     */
    public function getLiveStreamingDetails()
    {
        return $this->liveStreamingDetails;
    }

    /**
     * @param $localizations
     */
    public function setLocalizations($localizations)
    {
        $this->localizations = $localizations;
    }

    /**
     * @return mixed
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * @param Google_Service_YouTube_VideoMonetizationDetails $monetizationDetails
     */
    public function setMonetizationDetails(Google_Service_YouTube_VideoMonetizationDetails $monetizationDetails)
    {
        $this->monetizationDetails = $monetizationDetails;
    }

    /**
     * @return mixed
     */
    public function getMonetizationDetails()
    {
        return $this->monetizationDetails;
    }

    /**
     * @param Google_Service_YouTube_VideoPlayer $player
     */
    public function setPlayer(Google_Service_YouTube_VideoPlayer $player)
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
     * @param Google_Service_YouTube_VideoProcessingDetails $processingDetails
     */
    public function setProcessingDetails(Google_Service_YouTube_VideoProcessingDetails $processingDetails)
    {
        $this->processingDetails = $processingDetails;
    }

    /**
     * @return mixed
     */
    public function getProcessingDetails()
    {
        return $this->processingDetails;
    }

    /**
     * @param Google_Service_YouTube_VideoProjectDetails $projectDetails
     */
    public function setProjectDetails(Google_Service_YouTube_VideoProjectDetails $projectDetails)
    {
        $this->projectDetails = $projectDetails;
    }

    /**
     * @return mixed
     */
    public function getProjectDetails()
    {
        return $this->projectDetails;
    }

    /**
     * @param Google_Service_YouTube_VideoRecordingDetails $recordingDetails
     */
    public function setRecordingDetails(Google_Service_YouTube_VideoRecordingDetails $recordingDetails)
    {
        $this->recordingDetails = $recordingDetails;
    }

    /**
     * @return mixed
     */
    public function getRecordingDetails()
    {
        return $this->recordingDetails;
    }

    /**
     * @param Google_Service_YouTube_VideoSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_VideoSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param Google_Service_YouTube_VideoStatistics $statistics
     */
    public function setStatistics(Google_Service_YouTube_VideoStatistics $statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param Google_Service_YouTube_VideoStatus $status
     */
    public function setStatus(Google_Service_YouTube_VideoStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Google_Service_YouTube_VideoSuggestions $suggestions
     */
    public function setSuggestions(Google_Service_YouTube_VideoSuggestions $suggestions)
    {
        $this->suggestions = $suggestions;
    }

    /**
     * @return mixed
     */
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    /**
     * @param Google_Service_YouTube_VideoTopicDetails $topicDetails
     */
    public function setTopicDetails(Google_Service_YouTube_VideoTopicDetails $topicDetails)
    {
        $this->topicDetails = $topicDetails;
    }

    /**
     * @return mixed
     */
    public function getTopicDetails()
    {
        return $this->topicDetails;
    }
}

/**
 * Class Google_Service_YouTube_VideoAbuseReport
 */
class Google_Service_YouTube_VideoAbuseReport extends Google_Model
{
    public $comments;
    public $language;
    public $reasonId;
    public $secondaryReasonId;
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
    public function getReasonId()
    {
        return $this->reasonId;
    }

    /**
     * @param $reasonId
     */
    public function setReasonId($reasonId)
    {
        $this->reasonId = $reasonId;
    }

    /**
     * @return mixed
     */
    public function getSecondaryReasonId()
    {
        return $this->secondaryReasonId;
    }

    /**
     * @param $secondaryReasonId
     */
    public function setSecondaryReasonId($secondaryReasonId)
    {
        $this->secondaryReasonId = $secondaryReasonId;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_VideoAbuseReportReason
 */
class Google_Service_YouTube_VideoAbuseReportReason extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_VideoAbuseReportReasonSnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_VideoAbuseReportReasonSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_VideoAbuseReportReasonSnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_VideoAbuseReportReasonId
 */
class Google_Service_YouTube_VideoAbuseReportReasonId extends Google_Model
{
    public $value;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_VideoAbuseReportReasonListResponse
 */
class Google_Service_YouTube_VideoAbuseReportReasonListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_VideoAbuseReportReason';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_VideoAbuseReportReasonSnippet
 */
class Google_Service_YouTube_VideoAbuseReportReasonSnippet extends Google_Collection
{
    public $label;
    protected $collection_key = 'secondaryReasons';
    protected $internal_gapi_mappings = [];
    protected $secondaryReasonsType = 'Google_Service_YouTube_VideoAbuseReportSecondaryReason';
    protected $secondaryReasonsDataType = 'array';

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
     * @param $secondaryReasons
     */
    public function setSecondaryReasons($secondaryReasons)
    {
        $this->secondaryReasons = $secondaryReasons;
    }

    /**
     * @return mixed
     */
    public function getSecondaryReasons()
    {
        return $this->secondaryReasons;
    }
}

/**
 * Class Google_Service_YouTube_VideoAbuseReportSecondaryReason
 */
class Google_Service_YouTube_VideoAbuseReportSecondaryReason extends Google_Model
{
    public $label;
    protected $internal_gapi_mappings = [];
    protected $idType = 'Google_Service_YouTube_VideoAbuseReportReasonId';
    protected $idDataType = '';

    /**
     * @param Google_Service_YouTube_VideoAbuseReportReasonId $id
     */
    public function setId(Google_Service_YouTube_VideoAbuseReportReasonId $id)
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
}

/**
 * Class Google_Service_YouTube_VideoAgeGating
 */
class Google_Service_YouTube_VideoAgeGating extends Google_Model
{
    public $alcoholContent;
    public $restricted;
    public $videoGameRating;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlcoholContent()
    {
        return $this->alcoholContent;
    }

    /**
     * @param $alcoholContent
     */
    public function setAlcoholContent($alcoholContent)
    {
        $this->alcoholContent = $alcoholContent;
    }

    /**
     * @return mixed
     */
    public function getRestricted()
    {
        return $this->restricted;
    }

    /**
     * @param $restricted
     */
    public function setRestricted($restricted)
    {
        $this->restricted = $restricted;
    }

    /**
     * @return mixed
     */
    public function getVideoGameRating()
    {
        return $this->videoGameRating;
    }

    /**
     * @param $videoGameRating
     */
    public function setVideoGameRating($videoGameRating)
    {
        $this->videoGameRating = $videoGameRating;
    }
}

/**
 * Class Google_Service_YouTube_VideoCategory
 */
class Google_Service_YouTube_VideoCategory extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $snippetType = 'Google_Service_YouTube_VideoCategorySnippet';
    protected $snippetDataType = '';

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
     * @param Google_Service_YouTube_VideoCategorySnippet $snippet
     */
    public function setSnippet(Google_Service_YouTube_VideoCategorySnippet $snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }
}

/**
 * Class Google_Service_YouTube_VideoCategoryListResponse
 */
class Google_Service_YouTube_VideoCategoryListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_VideoCategory';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_VideoCategorySnippet
 */
class Google_Service_YouTube_VideoCategorySnippet extends Google_Model
{
    public $assignable;
    public $channelId;
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAssignable()
    {
        return $this->assignable;
    }

    /**
     * @param $assignable
     */
    public function setAssignable($assignable)
    {
        $this->assignable = $assignable;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
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
 * Class Google_Service_YouTube_VideoContentDetails
 */
class Google_Service_YouTube_VideoContentDetails extends Google_Model
{
    public $caption;
    public $definition;
    public $dimension;
    public $duration;
    public $licensedContent;
    protected $internal_gapi_mappings = [];
    protected $contentRatingType = 'Google_Service_YouTube_ContentRating';
    protected $contentRatingDataType = '';
    protected $countryRestrictionType = 'Google_Service_YouTube_AccessPolicy';
    protected $countryRestrictionDataType = '';
    protected $regionRestrictionType = 'Google_Service_YouTube_VideoContentDetailsRegionRestriction';
    protected $regionRestrictionDataType = '';

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
     * @param Google_Service_YouTube_ContentRating $contentRating
     */
    public function setContentRating(Google_Service_YouTube_ContentRating $contentRating)
    {
        $this->contentRating = $contentRating;
    }

    /**
     * @return mixed
     */
    public function getContentRating()
    {
        return $this->contentRating;
    }

    /**
     * @param Google_Service_YouTube_AccessPolicy $countryRestriction
     */
    public function setCountryRestriction(Google_Service_YouTube_AccessPolicy $countryRestriction)
    {
        $this->countryRestriction = $countryRestriction;
    }

    /**
     * @return mixed
     */
    public function getCountryRestriction()
    {
        return $this->countryRestriction;
    }

    /**
     * @return mixed
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @param $definition
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    /**
     * @return mixed
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param $dimension
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
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
    public function getLicensedContent()
    {
        return $this->licensedContent;
    }

    /**
     * @param $licensedContent
     */
    public function setLicensedContent($licensedContent)
    {
        $this->licensedContent = $licensedContent;
    }

    /**
     * @param Google_Service_YouTube_VideoContentDetailsRegionRestriction $regionRestriction
     */
    public function setRegionRestriction(Google_Service_YouTube_VideoContentDetailsRegionRestriction $regionRestriction)
    {
        $this->regionRestriction = $regionRestriction;
    }

    /**
     * @return mixed
     */
    public function getRegionRestriction()
    {
        return $this->regionRestriction;
    }
}

/**
 * Class Google_Service_YouTube_VideoContentDetailsRegionRestriction
 */
class Google_Service_YouTube_VideoContentDetailsRegionRestriction extends Google_Collection
{
    public $allowed;
    public $blocked;
    protected $collection_key = 'blocked';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowed()
    {
        return $this->allowed;
    }

    /**
     * @param $allowed
     */
    public function setAllowed($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @return mixed
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param $blocked
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;
    }
}

/**
 * Class Google_Service_YouTube_VideoConversionPing
 */
class Google_Service_YouTube_VideoConversionPing extends Google_Model
{
    public $context;
    public $conversionUrl;
    protected $internal_gapi_mappings = [];

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
    public function getConversionUrl()
    {
        return $this->conversionUrl;
    }

    /**
     * @param $conversionUrl
     */
    public function setConversionUrl($conversionUrl)
    {
        $this->conversionUrl = $conversionUrl;
    }
}

/**
 * Class Google_Service_YouTube_VideoConversionPings
 */
class Google_Service_YouTube_VideoConversionPings extends Google_Collection
{
    protected $collection_key = 'pings';
    protected $internal_gapi_mappings = [];
    protected $pingsType = 'Google_Service_YouTube_VideoConversionPing';
    protected $pingsDataType = 'array';


    /**
     * @param $pings
     */
    public function setPings($pings)
    {
        $this->pings = $pings;
    }

    /**
     * @return mixed
     */
    public function getPings()
    {
        return $this->pings;
    }
}

/**
 * Class Google_Service_YouTube_VideoFileDetails
 */
class Google_Service_YouTube_VideoFileDetails extends Google_Collection
{
    public $bitrateBps;
    public $container;
    public $creationTime;
    public $durationMs;
    public $fileName;
    public $fileSize;
    public $fileType;
    protected $collection_key = 'videoStreams';
    protected $internal_gapi_mappings = [];
    protected $audioStreamsType = 'Google_Service_YouTube_VideoFileDetailsAudioStream';
    protected $audioStreamsDataType = 'array';
    protected $recordingLocationType = 'Google_Service_YouTube_GeoPoint';
    protected $recordingLocationDataType = '';
    protected $videoStreamsType = 'Google_Service_YouTube_VideoFileDetailsVideoStream';
    protected $videoStreamsDataType = 'array';


    /**
     * @param $audioStreams
     */
    public function setAudioStreams($audioStreams)
    {
        $this->audioStreams = $audioStreams;
    }

    /**
     * @return mixed
     */
    public function getAudioStreams()
    {
        return $this->audioStreams;
    }

    /**
     * @return mixed
     */
    public function getBitrateBps()
    {
        return $this->bitrateBps;
    }

    /**
     * @param $bitrateBps
     */
    public function setBitrateBps($bitrateBps)
    {
        $this->bitrateBps = $bitrateBps;
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
    }

    /**
     * @return mixed
     */
    public function getDurationMs()
    {
        return $this->durationMs;
    }

    /**
     * @param $durationMs
     */
    public function setDurationMs($durationMs)
    {
        $this->durationMs = $durationMs;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param $fileSize
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @param Google_Service_YouTube_GeoPoint $recordingLocation
     */
    public function setRecordingLocation(Google_Service_YouTube_GeoPoint $recordingLocation)
    {
        $this->recordingLocation = $recordingLocation;
    }

    /**
     * @return mixed
     */
    public function getRecordingLocation()
    {
        return $this->recordingLocation;
    }

    /**
     * @param $videoStreams
     */
    public function setVideoStreams($videoStreams)
    {
        $this->videoStreams = $videoStreams;
    }

    /**
     * @return mixed
     */
    public function getVideoStreams()
    {
        return $this->videoStreams;
    }
}

/**
 * Class Google_Service_YouTube_VideoFileDetailsAudioStream
 */
class Google_Service_YouTube_VideoFileDetailsAudioStream extends Google_Model
{
    public $bitrateBps;
    public $channelCount;
    public $codec;
    public $vendor;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBitrateBps()
    {
        return $this->bitrateBps;
    }

    /**
     * @param $bitrateBps
     */
    public function setBitrateBps($bitrateBps)
    {
        $this->bitrateBps = $bitrateBps;
    }

    /**
     * @return mixed
     */
    public function getChannelCount()
    {
        return $this->channelCount;
    }

    /**
     * @param $channelCount
     */
    public function setChannelCount($channelCount)
    {
        $this->channelCount = $channelCount;
    }

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }
}

/**
 * Class Google_Service_YouTube_VideoFileDetailsVideoStream
 */
class Google_Service_YouTube_VideoFileDetailsVideoStream extends Google_Model
{
    public $aspectRatio;
    public $bitrateBps;
    public $codec;
    public $frameRateFps;
    public $heightPixels;
    public $rotation;
    public $vendor;
    public $widthPixels;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAspectRatio()
    {
        return $this->aspectRatio;
    }

    /**
     * @param $aspectRatio
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;
    }

    /**
     * @return mixed
     */
    public function getBitrateBps()
    {
        return $this->bitrateBps;
    }

    /**
     * @param $bitrateBps
     */
    public function setBitrateBps($bitrateBps)
    {
        $this->bitrateBps = $bitrateBps;
    }

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getFrameRateFps()
    {
        return $this->frameRateFps;
    }

    /**
     * @param $frameRateFps
     */
    public function setFrameRateFps($frameRateFps)
    {
        $this->frameRateFps = $frameRateFps;
    }

    /**
     * @return mixed
     */
    public function getHeightPixels()
    {
        return $this->heightPixels;
    }

    /**
     * @param $heightPixels
     */
    public function setHeightPixels($heightPixels)
    {
        $this->heightPixels = $heightPixels;
    }

    /**
     * @return mixed
     */
    public function getRotation()
    {
        return $this->rotation;
    }

    /**
     * @param $rotation
     */
    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
    }

    /**
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @return mixed
     */
    public function getWidthPixels()
    {
        return $this->widthPixels;
    }

    /**
     * @param $widthPixels
     */
    public function setWidthPixels($widthPixels)
    {
        $this->widthPixels = $widthPixels;
    }
}

/**
 * Class Google_Service_YouTube_VideoGetRatingResponse
 */
class Google_Service_YouTube_VideoGetRatingResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_VideoRating';
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
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_VideoListResponse
 */
class Google_Service_YouTube_VideoListResponse extends Google_Collection
{
    public $etag;
    public $eventId;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    public $visitorId;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTube_Video';
    protected $itemsDataType = 'array';
    protected $pageInfoType = 'Google_Service_YouTube_PageInfo';
    protected $pageInfoDataType = '';
    protected $tokenPaginationType = 'Google_Service_YouTube_TokenPagination';
    protected $tokenPaginationDataType = '';

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
     * @param Google_Service_YouTube_PageInfo $pageInfo
     */
    public function setPageInfo(Google_Service_YouTube_PageInfo $pageInfo)
    {
        $this->pageInfo = $pageInfo;
    }

    /**
     * @return mixed
     */
    public function getPageInfo()
    {
        return $this->pageInfo;
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

    /**
     * @param Google_Service_YouTube_TokenPagination $tokenPagination
     */
    public function setTokenPagination(Google_Service_YouTube_TokenPagination $tokenPagination)
    {
        $this->tokenPagination = $tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getTokenPagination()
    {
        return $this->tokenPagination;
    }

    /**
     * @return mixed
     */
    public function getVisitorId()
    {
        return $this->visitorId;
    }

    /**
     * @param $visitorId
     */
    public function setVisitorId($visitorId)
    {
        $this->visitorId = $visitorId;
    }
}

/**
 * Class Google_Service_YouTube_VideoLiveStreamingDetails
 */
class Google_Service_YouTube_VideoLiveStreamingDetails extends Google_Model
{
    public $actualEndTime;
    public $actualStartTime;
    public $concurrentViewers;
    public $scheduledEndTime;
    public $scheduledStartTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActualEndTime()
    {
        return $this->actualEndTime;
    }

    /**
     * @param $actualEndTime
     */
    public function setActualEndTime($actualEndTime)
    {
        $this->actualEndTime = $actualEndTime;
    }

    /**
     * @return mixed
     */
    public function getActualStartTime()
    {
        return $this->actualStartTime;
    }

    /**
     * @param $actualStartTime
     */
    public function setActualStartTime($actualStartTime)
    {
        $this->actualStartTime = $actualStartTime;
    }

    /**
     * @return mixed
     */
    public function getConcurrentViewers()
    {
        return $this->concurrentViewers;
    }

    /**
     * @param $concurrentViewers
     */
    public function setConcurrentViewers($concurrentViewers)
    {
        $this->concurrentViewers = $concurrentViewers;
    }

    /**
     * @return mixed
     */
    public function getScheduledEndTime()
    {
        return $this->scheduledEndTime;
    }

    /**
     * @param $scheduledEndTime
     */
    public function setScheduledEndTime($scheduledEndTime)
    {
        $this->scheduledEndTime = $scheduledEndTime;
    }

    /**
     * @return mixed
     */
    public function getScheduledStartTime()
    {
        return $this->scheduledStartTime;
    }

    /**
     * @param $scheduledStartTime
     */
    public function setScheduledStartTime($scheduledStartTime)
    {
        $this->scheduledStartTime = $scheduledStartTime;
    }
}

/**
 * Class Google_Service_YouTube_VideoLocalization
 */
class Google_Service_YouTube_VideoLocalization extends Google_Model
{
    public $description;
    public $title;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTube_VideoLocalizations
 */
class Google_Service_YouTube_VideoLocalizations extends Google_Model
{
}

/**
 * Class Google_Service_YouTube_VideoMonetizationDetails
 */
class Google_Service_YouTube_VideoMonetizationDetails extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $accessType = 'Google_Service_YouTube_AccessPolicy';
    protected $accessDataType = '';


    /**
     * @param Google_Service_YouTube_AccessPolicy $access
     */
    public function setAccess(Google_Service_YouTube_AccessPolicy $access)
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
}

/**
 * Class Google_Service_YouTube_VideoPlayer
 */
class Google_Service_YouTube_VideoPlayer extends Google_Model
{
    public $embedHtml;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmbedHtml()
    {
        return $this->embedHtml;
    }

    /**
     * @param $embedHtml
     */
    public function setEmbedHtml($embedHtml)
    {
        $this->embedHtml = $embedHtml;
    }
}

/**
 * Class Google_Service_YouTube_VideoProcessingDetails
 */
class Google_Service_YouTube_VideoProcessingDetails extends Google_Model
{
    public $editorSuggestionsAvailability;
    public $fileDetailsAvailability;
    public $processingFailureReason;
    public $processingIssuesAvailability;
    public $processingStatus;
    public $tagSuggestionsAvailability;
    public $thumbnailsAvailability;
    protected $internal_gapi_mappings = [];
    protected $processingProgressType = 'Google_Service_YouTube_VideoProcessingDetailsProcessingProgress';
    protected $processingProgressDataType = '';

    /**
     * @return mixed
     */
    public function getEditorSuggestionsAvailability()
    {
        return $this->editorSuggestionsAvailability;
    }

    /**
     * @param $editorSuggestionsAvailability
     */
    public function setEditorSuggestionsAvailability($editorSuggestionsAvailability)
    {
        $this->editorSuggestionsAvailability = $editorSuggestionsAvailability;
    }

    /**
     * @return mixed
     */
    public function getFileDetailsAvailability()
    {
        return $this->fileDetailsAvailability;
    }

    /**
     * @param $fileDetailsAvailability
     */
    public function setFileDetailsAvailability($fileDetailsAvailability)
    {
        $this->fileDetailsAvailability = $fileDetailsAvailability;
    }

    /**
     * @return mixed
     */
    public function getProcessingFailureReason()
    {
        return $this->processingFailureReason;
    }

    /**
     * @param $processingFailureReason
     */
    public function setProcessingFailureReason($processingFailureReason)
    {
        $this->processingFailureReason = $processingFailureReason;
    }

    /**
     * @return mixed
     */
    public function getProcessingIssuesAvailability()
    {
        return $this->processingIssuesAvailability;
    }

    /**
     * @param $processingIssuesAvailability
     */
    public function setProcessingIssuesAvailability($processingIssuesAvailability)
    {
        $this->processingIssuesAvailability = $processingIssuesAvailability;
    }

    /**
     * @param Google_Service_YouTube_VideoProcessingDetailsProcessingProgress $processingProgress
     */
    public function setProcessingProgress(Google_Service_YouTube_VideoProcessingDetailsProcessingProgress $processingProgress)
    {
        $this->processingProgress = $processingProgress;
    }

    /**
     * @return mixed
     */
    public function getProcessingProgress()
    {
        return $this->processingProgress;
    }

    /**
     * @return mixed
     */
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * @param $processingStatus
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;
    }

    /**
     * @return mixed
     */
    public function getTagSuggestionsAvailability()
    {
        return $this->tagSuggestionsAvailability;
    }

    /**
     * @param $tagSuggestionsAvailability
     */
    public function setTagSuggestionsAvailability($tagSuggestionsAvailability)
    {
        $this->tagSuggestionsAvailability = $tagSuggestionsAvailability;
    }

    /**
     * @return mixed
     */
    public function getThumbnailsAvailability()
    {
        return $this->thumbnailsAvailability;
    }

    /**
     * @param $thumbnailsAvailability
     */
    public function setThumbnailsAvailability($thumbnailsAvailability)
    {
        $this->thumbnailsAvailability = $thumbnailsAvailability;
    }
}

/**
 * Class Google_Service_YouTube_VideoProcessingDetailsProcessingProgress
 */
class Google_Service_YouTube_VideoProcessingDetailsProcessingProgress extends Google_Model
{
    public $partsProcessed;
    public $partsTotal;
    public $timeLeftMs;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPartsProcessed()
    {
        return $this->partsProcessed;
    }

    /**
     * @param $partsProcessed
     */
    public function setPartsProcessed($partsProcessed)
    {
        $this->partsProcessed = $partsProcessed;
    }

    /**
     * @return mixed
     */
    public function getPartsTotal()
    {
        return $this->partsTotal;
    }

    /**
     * @param $partsTotal
     */
    public function setPartsTotal($partsTotal)
    {
        $this->partsTotal = $partsTotal;
    }

    /**
     * @return mixed
     */
    public function getTimeLeftMs()
    {
        return $this->timeLeftMs;
    }

    /**
     * @param $timeLeftMs
     */
    public function setTimeLeftMs($timeLeftMs)
    {
        $this->timeLeftMs = $timeLeftMs;
    }
}

/**
 * Class Google_Service_YouTube_VideoProjectDetails
 */
class Google_Service_YouTube_VideoProjectDetails extends Google_Collection
{
    public $tags;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}

/**
 * Class Google_Service_YouTube_VideoRating
 */
class Google_Service_YouTube_VideoRating extends Google_Model
{
    public $rating;
    public $videoId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }
}

/**
 * Class Google_Service_YouTube_VideoRecordingDetails
 */
class Google_Service_YouTube_VideoRecordingDetails extends Google_Model
{
    public $locationDescription;
    public $recordingDate;
    protected $internal_gapi_mappings = [];
    protected $locationType = 'Google_Service_YouTube_GeoPoint';
    protected $locationDataType = '';

    /**
     * @param Google_Service_YouTube_GeoPoint $location
     */
    public function setLocation(Google_Service_YouTube_GeoPoint $location)
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
    public function getLocationDescription()
    {
        return $this->locationDescription;
    }

    /**
     * @param $locationDescription
     */
    public function setLocationDescription($locationDescription)
    {
        $this->locationDescription = $locationDescription;
    }

    /**
     * @return mixed
     */
    public function getRecordingDate()
    {
        return $this->recordingDate;
    }

    /**
     * @param $recordingDate
     */
    public function setRecordingDate($recordingDate)
    {
        $this->recordingDate = $recordingDate;
    }
}

/**
 * Class Google_Service_YouTube_VideoSnippet
 */
class Google_Service_YouTube_VideoSnippet extends Google_Collection
{
    public $categoryId;
    public $channelId;
    public $channelTitle;
    public $defaultLanguage;
    public $description;
    public $liveBroadcastContent;
    public $publishedAt;
    public $tags;
    public $title;
    protected $collection_key = 'tags';
    protected $internal_gapi_mappings = [];
    protected $localizedType = 'Google_Service_YouTube_VideoLocalization';
    protected $localizedDataType = '';
    protected $thumbnailsType = 'Google_Service_YouTube_ThumbnailDetails';
    protected $thumbnailsDataType = '';

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getChannelTitle()
    {
        return $this->channelTitle;
    }

    /**
     * @param $channelTitle
     */
    public function setChannelTitle($channelTitle)
    {
        $this->channelTitle = $channelTitle;
    }

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
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
    public function getLiveBroadcastContent()
    {
        return $this->liveBroadcastContent;
    }

    /**
     * @param $liveBroadcastContent
     */
    public function setLiveBroadcastContent($liveBroadcastContent)
    {
        $this->liveBroadcastContent = $liveBroadcastContent;
    }

    /**
     * @param Google_Service_YouTube_VideoLocalization $localized
     */
    public function setLocalized(Google_Service_YouTube_VideoLocalization $localized)
    {
        $this->localized = $localized;
    }

    /**
     * @return mixed
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * @return mixed
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @param Google_Service_YouTube_ThumbnailDetails $thumbnails
     */
    public function setThumbnails(Google_Service_YouTube_ThumbnailDetails $thumbnails)
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
 * Class Google_Service_YouTube_VideoStatistics
 */
class Google_Service_YouTube_VideoStatistics extends Google_Model
{
    public $commentCount;
    public $dislikeCount;
    public $favoriteCount;
    public $likeCount;
    public $viewCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * @param $commentCount
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;
    }

    /**
     * @return mixed
     */
    public function getDislikeCount()
    {
        return $this->dislikeCount;
    }

    /**
     * @param $dislikeCount
     */
    public function setDislikeCount($dislikeCount)
    {
        $this->dislikeCount = $dislikeCount;
    }

    /**
     * @return mixed
     */
    public function getFavoriteCount()
    {
        return $this->favoriteCount;
    }

    /**
     * @param $favoriteCount
     */
    public function setFavoriteCount($favoriteCount)
    {
        $this->favoriteCount = $favoriteCount;
    }

    /**
     * @return mixed
     */
    public function getLikeCount()
    {
        return $this->likeCount;
    }

    /**
     * @param $likeCount
     */
    public function setLikeCount($likeCount)
    {
        $this->likeCount = $likeCount;
    }

    /**
     * @return mixed
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * @param $viewCount
     */
    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }
}

/**
 * Class Google_Service_YouTube_VideoStatus
 */
class Google_Service_YouTube_VideoStatus extends Google_Model
{
    public $embeddable;
    public $failureReason;
    public $license;
    public $privacyStatus;
    public $publicStatsViewable;
    public $publishAt;
    public $rejectionReason;
    public $uploadStatus;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmbeddable()
    {
        return $this->embeddable;
    }

    /**
     * @param $embeddable
     */
    public function setEmbeddable($embeddable)
    {
        $this->embeddable = $embeddable;
    }

    /**
     * @return mixed
     */
    public function getFailureReason()
    {
        return $this->failureReason;
    }

    /**
     * @param $failureReason
     */
    public function setFailureReason($failureReason)
    {
        $this->failureReason = $failureReason;
    }

    /**
     * @return mixed
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param $license
     */
    public function setLicense($license)
    {
        $this->license = $license;
    }

    /**
     * @return mixed
     */
    public function getPrivacyStatus()
    {
        return $this->privacyStatus;
    }

    /**
     * @param $privacyStatus
     */
    public function setPrivacyStatus($privacyStatus)
    {
        $this->privacyStatus = $privacyStatus;
    }

    /**
     * @return mixed
     */
    public function getPublicStatsViewable()
    {
        return $this->publicStatsViewable;
    }

    /**
     * @param $publicStatsViewable
     */
    public function setPublicStatsViewable($publicStatsViewable)
    {
        $this->publicStatsViewable = $publicStatsViewable;
    }

    /**
     * @return mixed
     */
    public function getPublishAt()
    {
        return $this->publishAt;
    }

    /**
     * @param $publishAt
     */
    public function setPublishAt($publishAt)
    {
        $this->publishAt = $publishAt;
    }

    /**
     * @return mixed
     */
    public function getRejectionReason()
    {
        return $this->rejectionReason;
    }

    /**
     * @param $rejectionReason
     */
    public function setRejectionReason($rejectionReason)
    {
        $this->rejectionReason = $rejectionReason;
    }

    /**
     * @return mixed
     */
    public function getUploadStatus()
    {
        return $this->uploadStatus;
    }

    /**
     * @param $uploadStatus
     */
    public function setUploadStatus($uploadStatus)
    {
        $this->uploadStatus = $uploadStatus;
    }
}

/**
 * Class Google_Service_YouTube_VideoSuggestions
 */
class Google_Service_YouTube_VideoSuggestions extends Google_Collection
{
    public $editorSuggestions;
    public $processingErrors;
    public $processingHints;
    public $processingWarnings;
    protected $collection_key = 'tagSuggestions';
    protected $internal_gapi_mappings = [];
    protected $tagSuggestionsType = 'Google_Service_YouTube_VideoSuggestionsTagSuggestion';
    protected $tagSuggestionsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEditorSuggestions()
    {
        return $this->editorSuggestions;
    }

    /**
     * @param $editorSuggestions
     */
    public function setEditorSuggestions($editorSuggestions)
    {
        $this->editorSuggestions = $editorSuggestions;
    }

    /**
     * @return mixed
     */
    public function getProcessingErrors()
    {
        return $this->processingErrors;
    }

    /**
     * @param $processingErrors
     */
    public function setProcessingErrors($processingErrors)
    {
        $this->processingErrors = $processingErrors;
    }

    /**
     * @return mixed
     */
    public function getProcessingHints()
    {
        return $this->processingHints;
    }

    /**
     * @param $processingHints
     */
    public function setProcessingHints($processingHints)
    {
        $this->processingHints = $processingHints;
    }

    /**
     * @return mixed
     */
    public function getProcessingWarnings()
    {
        return $this->processingWarnings;
    }

    /**
     * @param $processingWarnings
     */
    public function setProcessingWarnings($processingWarnings)
    {
        $this->processingWarnings = $processingWarnings;
    }

    /**
     * @param $tagSuggestions
     */
    public function setTagSuggestions($tagSuggestions)
    {
        $this->tagSuggestions = $tagSuggestions;
    }

    /**
     * @return mixed
     */
    public function getTagSuggestions()
    {
        return $this->tagSuggestions;
    }
}

/**
 * Class Google_Service_YouTube_VideoSuggestionsTagSuggestion
 */
class Google_Service_YouTube_VideoSuggestionsTagSuggestion extends Google_Collection
{
    public $categoryRestricts;
    public $tag;
    protected $collection_key = 'categoryRestricts';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCategoryRestricts()
    {
        return $this->categoryRestricts;
    }

    /**
     * @param $categoryRestricts
     */
    public function setCategoryRestricts($categoryRestricts)
    {
        $this->categoryRestricts = $categoryRestricts;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
}

/**
 * Class Google_Service_YouTube_VideoTopicDetails
 */
class Google_Service_YouTube_VideoTopicDetails extends Google_Collection
{
    public $relevantTopicIds;
    public $topicIds;
    protected $collection_key = 'topicIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getRelevantTopicIds()
    {
        return $this->relevantTopicIds;
    }

    /**
     * @param $relevantTopicIds
     */
    public function setRelevantTopicIds($relevantTopicIds)
    {
        $this->relevantTopicIds = $relevantTopicIds;
    }

    /**
     * @return mixed
     */
    public function getTopicIds()
    {
        return $this->topicIds;
    }

    /**
     * @param $topicIds
     */
    public function setTopicIds($topicIds)
    {
        $this->topicIds = $topicIds;
    }
}

/**
 * Class Google_Service_YouTube_WatchSettings
 */
class Google_Service_YouTube_WatchSettings extends Google_Model
{
    public $backgroundColor;
    public $featuredPlaylistId;
    public $textColor;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param $backgroundColor
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return mixed
     */
    public function getFeaturedPlaylistId()
    {
        return $this->featuredPlaylistId;
    }

    /**
     * @param $featuredPlaylistId
     */
    public function setFeaturedPlaylistId($featuredPlaylistId)
    {
        $this->featuredPlaylistId = $featuredPlaylistId;
    }

    /**
     * @return mixed
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * @param $textColor
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }
}
