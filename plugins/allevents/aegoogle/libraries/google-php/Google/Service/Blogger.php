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
 * Service definition for Blogger (v3).
 *
 * <p>
 * API for access to the data within Blogger.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/blogger/docs/3.0/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Blogger extends Google_Service
{
    /** Manage your Blogger account. */
    const BLOGGER =
        "https://www.googleapis.com/auth/blogger";
    /** View your Blogger account. */
    const BLOGGER_READONLY =
        "https://www.googleapis.com/auth/blogger.readonly";

    public $blogUserInfos;
    public $blogs;
    public $comments;
    public $pageViews;
    public $pages;
    public $postUserInfos;
    public $posts;
    public $users;


    /**
     * Constructs the internal representation of the Blogger service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'blogger/v3/';
        $this->version = 'v3';
        $this->serviceName = 'blogger';

        $this->blogUserInfos = new Google_Service_Blogger_BlogUserInfos_Resource(
            $this,
            $this->serviceName,
            'blogUserInfos',
            [
                'methods' => [
                    'get' => [
                        'path' => 'users/{userId}/blogs/{blogId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxPosts' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->blogs = new Google_Service_Blogger_Blogs_Resource(
            $this,
            $this->serviceName,
            'blogs',
            [
                'methods' => [
                    'get' => [
                        'path' => 'blogs/{blogId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxPosts' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getByUrl' => [
                        'path' => 'blogs/byurl',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'url' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listByUser' => [
                        'path' => 'users/{userId}/blogs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fetchUserInfo' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'role' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->comments = new Google_Service_Blogger_Comments_Resource(
            $this,
            $this->serviceName,
            'comments',
            [
                'methods' => [
                    'approve' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments/{commentId}/approve',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments/{commentId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments/{commentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endDate' => [
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
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'listByBlog' => [
                        'path' => 'blogs/{blogId}/comments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endDate' => [
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
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'markAsSpam' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments/{commentId}/spam',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'removeContent' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/comments/{commentId}/removecontent',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->pageViews = new Google_Service_Blogger_PageViews_Resource(
            $this,
            $this->serviceName,
            'pageViews',
            [
                'methods' => [
                    'get' => [
                        'path' => 'blogs/{blogId}/pageviews',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'range' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->pages = new Google_Service_Blogger_Pages_Resource(
            $this,
            $this->serviceName,
            'pages',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'blogs/{blogId}/pages',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'isDraft' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'blogs/{blogId}/pages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'publish' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'publish' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}/publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'revert' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}/revert',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'blogs/{blogId}/pages/{pageId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'publish' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->postUserInfos = new Google_Service_Blogger_PostUserInfos_Resource(
            $this,
            $this->serviceName,
            'postUserInfos',
            [
                'methods' => [
                    'get' => [
                        'path' => 'users/{userId}/blogs/{blogId}/posts/{postId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxComments' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userId}/blogs/{blogId}/posts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'labels' => [
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
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->posts = new Google_Service_Blogger_Posts_Resource(
            $this,
            $this->serviceName,
            'posts',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'blogs/{blogId}/posts/{postId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'blogs/{blogId}/posts/{postId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fetchBody' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxComments' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'fetchImages' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getByPath' => [
                        'path' => 'blogs/{blogId}/posts/bypath',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'path' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'maxComments' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'blogs/{blogId}/posts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fetchImages' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'isDraft' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'fetchBody' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'blogs/{blogId}/posts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'labels' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'fetchImages' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'blogs/{blogId}/posts/{postId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'publish' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'fetchBody' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxComments' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'fetchImages' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'publish' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/publish',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'publishDate' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'revert' => [
                        'path' => 'blogs/{blogId}/posts/{postId}/revert',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'blogs/{blogId}/posts/search',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'fetchBodies' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'blogs/{blogId}/posts/{postId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'blogId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'postId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'publish' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'fetchBody' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxComments' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'fetchImages' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users = new Google_Service_Blogger_Users_Resource(
            $this,
            $this->serviceName,
            'users',
            [
                'methods' => [
                    'get' => [
                        'path' => 'users/{userId}',
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
    }
}


/**
 * The "blogUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogUserInfos = $bloggerService->blogUserInfos;
 *  </code>
 */
class Google_Service_Blogger_BlogUserInfos_Resource extends Google_Service_Resource
{

    /**
     * Gets one blog and user info pair by blogId and userId. (blogUserInfos.get)
     *
     * @param string $userId ID of the user whose blogs are to be fetched. Either
     *                          the word 'self' (sans quote marks) or the user's profile identifier.
     * @param string $blogId The ID of the blog to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxPosts Maximum number of posts to pull back with the
     * blog.
     */
    public function get($userId, $blogId, $optParams = [])
    {
        $params = ['userId' => $userId, 'blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_BlogUserInfo");
    }
}

/**
 * The "blogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $blogs = $bloggerService->blogs;
 *  </code>
 */
class Google_Service_Blogger_Blogs_Resource extends Google_Service_Resource
{

    /**
     * Gets one blog by ID. (blogs.get)
     *
     * @param string $blogId The ID of the blog to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxPosts Maximum number of posts to pull back with the
     * blog.
     * @opt_param string view Access level with which to view the blog. Note that
     * some fields require elevated access.
     */
    public function get($blogId, $optParams = [])
    {
        $params = ['blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_Blog");
    }

    /**
     * Retrieve a Blog by URL. (blogs.getByUrl)
     *
     * @param string $url The URL of the blog to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string view Access level with which to view the blog. Note that
     * some fields require elevated access.
     */
    public function getByUrl($url, $optParams = [])
    {
        $params = ['url' => $url];
        $params = array_merge($params, $optParams);

        return $this->call('getByUrl', [$params], "Google_Service_Blogger_Blog");
    }

    /**
     * Retrieves a list of blogs, possibly filtered. (blogs.listByUser)
     *
     * @param string $userId ID of the user whose blogs are to be fetched. Either
     *                          the word 'self' (sans quote marks) or the user's profile identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool fetchUserInfo Whether the response is a list of blogs with
     * per-user information instead of just blogs.
     * @opt_param string status Blog statuses to include in the result (default:
     * Live blogs only). Note that ADMIN access is required to view deleted blogs.
     * @opt_param string role User access types for blogs to include in the results,
     * e.g. AUTHOR will return blogs where the user has author level access. If no
     * roles are specified, defaults to ADMIN and AUTHOR roles.
     * @opt_param string view Access level with which to view the blogs. Note that
     * some fields require elevated access.
     */
    public function listByUser($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('listByUser', [$params], "Google_Service_Blogger_BlogList");
    }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $comments = $bloggerService->comments;
 *  </code>
 */
class Google_Service_Blogger_Comments_Resource extends Google_Service_Resource
{

    /**
     * Marks a comment as not spam. (comments.approve)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param string $commentId The ID of the comment to mark as not spam.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function approve($blogId, $postId, $commentId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('approve', [$params], "Google_Service_Blogger_Comment");
    }

    /**
     * Delete a comment by ID. (comments.delete)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param string $commentId The ID of the comment to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($blogId, $postId, $commentId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one comment by ID. (comments.get)
     *
     * @param string $blogId ID of the blog to containing the comment.
     * @param string $postId ID of the post to fetch posts from.
     * @param string $commentId The ID of the comment to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string view Access level for the requested comment (default:
     * READER). Note that some comments will require elevated permissions, for
     * example comments where the parent posts which is in a draft state, or
     * comments that are pending moderation.
     */
    public function get($blogId, $postId, $commentId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_Comment");
    }

    /**
     * Retrieves the comments for a post, possibly filtered. (comments.listComments)
     *
     * @param string $blogId ID of the blog to fetch comments from.
     * @param string $postId ID of the post to fetch posts from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string status
     * @opt_param string startDate Earliest date of comment to fetch, a date-time
     * with RFC 3339 formatting.
     * @opt_param string endDate Latest date of comment to fetch, a date-time with
     * RFC 3339 formatting.
     * @opt_param string maxResults Maximum number of comments to include in the
     * result.
     * @opt_param string pageToken Continuation token if request is paged.
     * @opt_param bool fetchBodies Whether the body content of the comments is
     * included.
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require elevated access.
     */
    public function listComments($blogId, $postId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Blogger_CommentList");
    }

    /**
     * Retrieves the comments for a blog, across all posts, possibly filtered.
     * (comments.listByBlog)
     *
     * @param string $blogId ID of the blog to fetch comments from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string status
     * @opt_param string startDate Earliest date of comment to fetch, a date-time
     * with RFC 3339 formatting.
     * @opt_param string endDate Latest date of comment to fetch, a date-time with
     * RFC 3339 formatting.
     * @opt_param string maxResults Maximum number of comments to include in the
     * result.
     * @opt_param string pageToken Continuation token if request is paged.
     * @opt_param bool fetchBodies Whether the body content of the comments is
     * included.
     */
    public function listByBlog($blogId, $optParams = [])
    {
        $params = ['blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('listByBlog', [$params], "Google_Service_Blogger_CommentList");
    }

    /**
     * Marks a comment as spam. (comments.markAsSpam)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param string $commentId The ID of the comment to mark as spam.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function markAsSpam($blogId, $postId, $commentId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('markAsSpam', [$params], "Google_Service_Blogger_Comment");
    }

    /**
     * Removes the content of a comment. (comments.removeContent)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param string $commentId The ID of the comment to delete content from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function removeContent($blogId, $postId, $commentId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('removeContent', [$params], "Google_Service_Blogger_Comment");
    }
}

/**
 * The "pageViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $pageViews = $bloggerService->pageViews;
 *  </code>
 */
class Google_Service_Blogger_PageViews_Resource extends Google_Service_Resource
{

    /**
     * Retrieve pageview stats for a Blog. (pageViews.get)
     *
     * @param string $blogId The ID of the blog to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string range
     */
    public function get($blogId, $optParams = [])
    {
        $params = ['blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_Pageviews");
    }
}

/**
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $pages = $bloggerService->pages;
 *  </code>
 */
class Google_Service_Blogger_Pages_Resource extends Google_Service_Resource
{

    /**
     * Delete a page by ID. (pages.delete)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $pageId The ID of the Page.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($blogId, $pageId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one blog page by ID. (pages.get)
     *
     * @param string $blogId ID of the blog containing the page.
     * @param string $pageId The ID of the page to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string view
     */
    public function get($blogId, $pageId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_Page");
    }

    /**
     * Add a page. (pages.insert)
     *
     * @param string $blogId ID of the blog to add the page to.
     * @param Google_Page|Google_Service_Blogger_Page $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool isDraft Whether to create the page as a draft (default:
     * false).
     */
    public function insert($blogId, Google_Service_Blogger_Page $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Blogger_Page");
    }

    /**
     * Retrieves the pages for a blog, optionally including non-LIVE statuses.
     * (pages.listPages)
     *
     * @param string $blogId ID of the blog to fetch Pages from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string status
     * @opt_param string maxResults Maximum number of Pages to fetch.
     * @opt_param string pageToken Continuation token if the request is paged.
     * @opt_param bool fetchBodies Whether to retrieve the Page bodies.
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require elevated access.
     */
    public function listPages($blogId, $optParams = [])
    {
        $params = ['blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Blogger_PageList");
    }

    /**
     * Update a page. This method supports patch semantics. (pages.patch)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $pageId The ID of the Page.
     * @param Google_Page|Google_Service_Blogger_Page $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool revert Whether a revert action should be performed when the
     * page is updated (default: false).
     * @opt_param bool publish Whether a publish action should be performed when the
     * page is updated (default: false).
     */
    public function patch($blogId, $pageId, Google_Service_Blogger_Page $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Blogger_Page");
    }

    /**
     * Publishes a draft page. (pages.publish)
     *
     * @param string $blogId The ID of the blog.
     * @param string $pageId The ID of the page.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function publish($blogId, $pageId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_Blogger_Page");
    }

    /**
     * Revert a published or scheduled page to draft state. (pages.revert)
     *
     * @param string $blogId The ID of the blog.
     * @param string $pageId The ID of the page.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function revert($blogId, $pageId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId];
        $params = array_merge($params, $optParams);

        return $this->call('revert', [$params], "Google_Service_Blogger_Page");
    }

    /**
     * Update a page. (pages.update)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $pageId The ID of the Page.
     * @param Google_Page|Google_Service_Blogger_Page $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool revert Whether a revert action should be performed when the
     * page is updated (default: false).
     * @opt_param bool publish Whether a publish action should be performed when the
     * page is updated (default: false).
     */
    public function update($blogId, $pageId, Google_Service_Blogger_Page $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'pageId' => $pageId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Blogger_Page");
    }
}

/**
 * The "postUserInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $postUserInfos = $bloggerService->postUserInfos;
 *  </code>
 */
class Google_Service_Blogger_PostUserInfos_Resource extends Google_Service_Resource
{

    /**
     * Gets one post and user info pair, by post ID and user ID. The post user info
     * contains per-user information about the post, such as access rights, specific
     * to the user. (postUserInfos.get)
     *
     * @param string $userId ID of the user for the per-user information to be
     *                          fetched. Either the word 'self' (sans quote marks) or the user's profile
     *                          identifier.
     * @param string $blogId The ID of the blog.
     * @param string $postId The ID of the post to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxComments Maximum number of comments to pull back on a
     * post.
     */
    public function get($userId, $blogId, $postId, $optParams = [])
    {
        $params = ['userId' => $userId, 'blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_PostUserInfo");
    }

    /**
     * Retrieves a list of post and post user info pairs, possibly filtered. The
     * post user info contains per-user information about the post, such as access
     * rights, specific to the user. (postUserInfos.listPostUserInfos)
     *
     * @param string $userId ID of the user for the per-user information to be
     *                          fetched. Either the word 'self' (sans quote marks) or the user's profile
     *                          identifier.
     * @param string $blogId ID of the blog to fetch posts from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Sort order applied to search results. Default is
     * published.
     * @opt_param string startDate Earliest post date to fetch, a date-time with RFC
     * 3339 formatting.
     * @opt_param string endDate Latest post date to fetch, a date-time with RFC
     * 3339 formatting.
     * @opt_param string labels Comma-separated list of labels to search for.
     * @opt_param string maxResults Maximum number of posts to fetch.
     * @opt_param string pageToken Continuation token if the request is paged.
     * @opt_param string status
     * @opt_param bool fetchBodies Whether the body content of posts is included.
     * Default is false.
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require elevated access.
     */
    public function listPostUserInfos($userId, $blogId, $optParams = [])
    {
        $params = ['userId' => $userId, 'blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Blogger_PostUserInfosList");
    }
}

/**
 * The "posts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $posts = $bloggerService->posts;
 *  </code>
 */
class Google_Service_Blogger_Posts_Resource extends Google_Service_Resource
{

    /**
     * Delete a post by ID. (posts.delete)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($blogId, $postId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Get a post by ID. (posts.get)
     *
     * @param string $blogId ID of the blog to fetch the post from.
     * @param string $postId The ID of the post
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool fetchBody Whether the body content of the post is included
     * (default: true). This should be set to false when the post bodies are not
     * required, to help minimize traffic.
     * @opt_param string maxComments Maximum number of comments to pull back on a
     * post.
     * @opt_param bool fetchImages Whether image URL metadata for each post is
     * included (default: false).
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require elevated access.
     */
    public function get($blogId, $postId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Retrieve a Post by Path. (posts.getByPath)
     *
     * @param string $blogId ID of the blog to fetch the post from.
     * @param string $path Path of the Post to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string maxComments Maximum number of comments to pull back on a
     * post.
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require elevated access.
     */
    public function getByPath($blogId, $path, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'path' => $path];
        $params = array_merge($params, $optParams);

        return $this->call('getByPath', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Add a post. (posts.insert)
     *
     * @param string $blogId ID of the blog to add the post to.
     * @param Google_Post|Google_Service_Blogger_Post $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool fetchImages Whether image URL metadata for each post is
     * included in the returned result (default: false).
     * @opt_param bool isDraft Whether to create the post as a draft (default:
     * false).
     * @opt_param bool fetchBody Whether the body content of the post is included
     * with the result (default: true).
     */
    public function insert($blogId, Google_Service_Blogger_Post $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Retrieves a list of posts, possibly filtered. (posts.listPosts)
     *
     * @param string $blogId ID of the blog to fetch posts from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Sort search results
     * @opt_param string startDate Earliest post date to fetch, a date-time with RFC
     * 3339 formatting.
     * @opt_param string endDate Latest post date to fetch, a date-time with RFC
     * 3339 formatting.
     * @opt_param string labels Comma-separated list of labels to search for.
     * @opt_param string maxResults Maximum number of posts to fetch.
     * @opt_param bool fetchImages Whether image URL metadata for each post is
     * included.
     * @opt_param string pageToken Continuation token if the request is paged.
     * @opt_param string status Statuses to include in the results.
     * @opt_param bool fetchBodies Whether the body content of posts is included
     * (default: true). This should be set to false when the post bodies are not
     * required, to help minimize traffic.
     * @opt_param string view Access level with which to view the returned result.
     * Note that some fields require escalated access.
     */
    public function listPosts($blogId, $optParams = [])
    {
        $params = ['blogId' => $blogId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Blogger_PostList");
    }

    /**
     * Update a post. This method supports patch semantics. (posts.patch)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param Google_Post|Google_Service_Blogger_Post $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool revert Whether a revert action should be performed when the
     * post is updated (default: false).
     * @opt_param bool publish Whether a publish action should be performed when the
     * post is updated (default: false).
     * @opt_param bool fetchBody Whether the body content of the post is included
     * with the result (default: true).
     * @opt_param string maxComments Maximum number of comments to retrieve with the
     * returned post.
     * @opt_param bool fetchImages Whether image URL metadata for each post is
     * included in the returned result (default: false).
     */
    public function patch($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Publishes a draft post, optionally at the specific time of the given
     * publishDate parameter. (posts.publish)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string publishDate Optional date and time to schedule the
     * publishing of the Blog. If no publishDate parameter is given, the post is
     * either published at the a previously saved schedule date (if present), or the
     * current time. If a future date is given, the post will be scheduled to be
     * published.
     */
    public function publish($blogId, $postId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('publish', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Revert a published or scheduled post to draft state. (posts.revert)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function revert($blogId, $postId, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId];
        $params = array_merge($params, $optParams);

        return $this->call('revert', [$params], "Google_Service_Blogger_Post");
    }

    /**
     * Search for a post. (posts.search)
     *
     * @param string $blogId ID of the blog to fetch the post from.
     * @param string $q Query terms to search this blog for matching posts.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Sort search results
     * @opt_param bool fetchBodies Whether the body content of posts is included
     * (default: true). This should be set to false when the post bodies are not
     * required, to help minimize traffic.
     */
    public function search($blogId, $q, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'q' => $q];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_Blogger_PostList");
    }

    /**
     * Update a post. (posts.update)
     *
     * @param string $blogId The ID of the Blog.
     * @param string $postId The ID of the Post.
     * @param Google_Post|Google_Service_Blogger_Post $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool revert Whether a revert action should be performed when the
     * post is updated (default: false).
     * @opt_param bool publish Whether a publish action should be performed when the
     * post is updated (default: false).
     * @opt_param bool fetchBody Whether the body content of the post is included
     * with the result (default: true).
     * @opt_param string maxComments Maximum number of comments to retrieve with the
     * returned post.
     * @opt_param bool fetchImages Whether image URL metadata for each post is
     * included in the returned result (default: false).
     */
    public function update($blogId, $postId, Google_Service_Blogger_Post $postBody, $optParams = [])
    {
        $params = ['blogId' => $blogId, 'postId' => $postId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Blogger_Post");
    }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bloggerService = new Google_Service_Blogger(...);
 *   $users = $bloggerService->users;
 *  </code>
 */
class Google_Service_Blogger_Users_Resource extends Google_Service_Resource
{

    /**
     * Gets one user by ID. (users.get)
     *
     * @param string $userId The ID of the user to get.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userId, $optParams = [])
    {
        $params = ['userId' => $userId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Blogger_User");
    }
}


/**
 * Class Google_Service_Blogger_Blog
 */
class Google_Service_Blogger_Blog extends Google_Model
{
    public $customMetaData;
    public $description;
    public $id;
    public $kind;
    public $name;
    public $published;
    public $selfLink;
    public $status;
    public $updated;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $localeType = 'Google_Service_Blogger_BlogLocale';
    protected $localeDataType = '';
    protected $pagesType = 'Google_Service_Blogger_BlogPages';
    protected $pagesDataType = '';
    protected $postsType = 'Google_Service_Blogger_BlogPosts';
    protected $postsDataType = '';

    /**
     * @return mixed
     */
    public function getCustomMetaData()
    {
        return $this->customMetaData;
    }

    /**
     * @param $customMetaData
     */
    public function setCustomMetaData($customMetaData)
    {
        $this->customMetaData = $customMetaData;
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
     * @param Google_Service_Blogger_BlogLocale $locale
     */
    public function setLocale(Google_Service_Blogger_BlogLocale $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
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
     * @param Google_Service_Blogger_BlogPages $pages
     */
    public function setPages(Google_Service_Blogger_BlogPages $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param Google_Service_Blogger_BlogPosts $posts
     */
    public function setPosts(Google_Service_Blogger_BlogPosts $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
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
}

/**
 * Class Google_Service_Blogger_BlogList
 */
class Google_Service_Blogger_BlogList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $blogUserInfosType = 'Google_Service_Blogger_BlogUserInfo';
    protected $blogUserInfosDataType = 'array';
    protected $itemsType = 'Google_Service_Blogger_Blog';
    protected $itemsDataType = 'array';

    /**
     * @param $blogUserInfos
     */
    public function setBlogUserInfos($blogUserInfos)
    {
        $this->blogUserInfos = $blogUserInfos;
    }

    /**
     * @return mixed
     */
    public function getBlogUserInfos()
    {
        return $this->blogUserInfos;
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
 * Class Google_Service_Blogger_BlogLocale
 */
class Google_Service_Blogger_BlogLocale extends Google_Model
{
    public $country;
    public $language;
    public $variant;
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
 * Class Google_Service_Blogger_BlogPages
 */
class Google_Service_Blogger_BlogPages extends Google_Model
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
 * Class Google_Service_Blogger_BlogPerUserInfo
 */
class Google_Service_Blogger_BlogPerUserInfo extends Google_Model
{
    public $blogId;
    public $hasAdminAccess;
    public $kind;
    public $photosAlbumKey;
    public $role;
    public $userId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * @param $blogId
     */
    public function setBlogId($blogId)
    {
        $this->blogId = $blogId;
    }

    /**
     * @return mixed
     */
    public function getHasAdminAccess()
    {
        return $this->hasAdminAccess;
    }

    /**
     * @param $hasAdminAccess
     */
    public function setHasAdminAccess($hasAdminAccess)
    {
        $this->hasAdminAccess = $hasAdminAccess;
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
    public function getPhotosAlbumKey()
    {
        return $this->photosAlbumKey;
    }

    /**
     * @param $photosAlbumKey
     */
    public function setPhotosAlbumKey($photosAlbumKey)
    {
        $this->photosAlbumKey = $photosAlbumKey;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}

/**
 * Class Google_Service_Blogger_BlogPosts
 */
class Google_Service_Blogger_BlogPosts extends Google_Collection
{
    public $selfLink;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_Post';
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
 * Class Google_Service_Blogger_BlogUserInfo
 */
class Google_Service_Blogger_BlogUserInfo extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [
        "blogUserInfo" => "blog_user_info",
    ];
    protected $blogType = 'Google_Service_Blogger_Blog';
    protected $blogDataType = '';
    protected $blogUserInfoType = 'Google_Service_Blogger_BlogPerUserInfo';
    protected $blogUserInfoDataType = '';

    /**
     * @param Google_Service_Blogger_Blog $blog
     */
    public function setBlog(Google_Service_Blogger_Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * @param Google_Service_Blogger_BlogPerUserInfo $blogUserInfo
     */
    public function setBlogUserInfo(Google_Service_Blogger_BlogPerUserInfo $blogUserInfo)
    {
        $this->blogUserInfo = $blogUserInfo;
    }

    /**
     * @return mixed
     */
    public function getBlogUserInfo()
    {
        return $this->blogUserInfo;
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
 * Class Google_Service_Blogger_Comment
 */
class Google_Service_Blogger_Comment extends Google_Model
{
    public $content;
    public $id;
    public $kind;
    public $published;
    public $selfLink;
    public $status;
    public $updated;
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Blogger_CommentAuthor';
    protected $authorDataType = '';
    protected $blogType = 'Google_Service_Blogger_CommentBlog';
    protected $blogDataType = '';
    protected $inReplyToType = 'Google_Service_Blogger_CommentInReplyTo';
    protected $inReplyToDataType = '';
    protected $postType = 'Google_Service_Blogger_CommentPost';
    protected $postDataType = '';

    /**
     * @param Google_Service_Blogger_CommentAuthor $author
     */
    public function setAuthor(Google_Service_Blogger_CommentAuthor $author)
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
     * @param Google_Service_Blogger_CommentBlog $blog
     */
    public function setBlog(Google_Service_Blogger_CommentBlog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
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
     * @param Google_Service_Blogger_CommentInReplyTo $inReplyTo
     */
    public function setInReplyTo(Google_Service_Blogger_CommentInReplyTo $inReplyTo)
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
     * @param Google_Service_Blogger_CommentPost $post
     */
    public function setPost(Google_Service_Blogger_CommentPost $post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
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
 * Class Google_Service_Blogger_CommentAuthor
 */
class Google_Service_Blogger_CommentAuthor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Blogger_CommentAuthorImage';
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
     * @param Google_Service_Blogger_CommentAuthorImage $image
     */
    public function setImage(Google_Service_Blogger_CommentAuthorImage $image)
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
 * Class Google_Service_Blogger_CommentAuthorImage
 */
class Google_Service_Blogger_CommentAuthorImage extends Google_Model
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
 * Class Google_Service_Blogger_CommentBlog
 */
class Google_Service_Blogger_CommentBlog extends Google_Model
{
    public $id;
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
}

/**
 * Class Google_Service_Blogger_CommentInReplyTo
 */
class Google_Service_Blogger_CommentInReplyTo extends Google_Model
{
    public $id;
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
}

/**
 * Class Google_Service_Blogger_CommentList
 */
class Google_Service_Blogger_CommentList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $prevPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_Comment';
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
 * Class Google_Service_Blogger_CommentPost
 */
class Google_Service_Blogger_CommentPost extends Google_Model
{
    public $id;
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
}

/**
 * Class Google_Service_Blogger_Page
 */
class Google_Service_Blogger_Page extends Google_Model
{
    public $content;
    public $etag;
    public $id;
    public $kind;
    public $published;
    public $selfLink;
    public $status;
    public $title;
    public $updated;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Blogger_PageAuthor';
    protected $authorDataType = '';
    protected $blogType = 'Google_Service_Blogger_PageBlog';
    protected $blogDataType = '';

    /**
     * @param Google_Service_Blogger_PageAuthor $author
     */
    public function setAuthor(Google_Service_Blogger_PageAuthor $author)
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
     * @param Google_Service_Blogger_PageBlog $blog
     */
    public function setBlog(Google_Service_Blogger_PageBlog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
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
}

/**
 * Class Google_Service_Blogger_PageAuthor
 */
class Google_Service_Blogger_PageAuthor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Blogger_PageAuthorImage';
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
     * @param Google_Service_Blogger_PageAuthorImage $image
     */
    public function setImage(Google_Service_Blogger_PageAuthorImage $image)
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
 * Class Google_Service_Blogger_PageAuthorImage
 */
class Google_Service_Blogger_PageAuthorImage extends Google_Model
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
 * Class Google_Service_Blogger_PageBlog
 */
class Google_Service_Blogger_PageBlog extends Google_Model
{
    public $id;
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
}

/**
 * Class Google_Service_Blogger_PageList
 */
class Google_Service_Blogger_PageList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_Page';
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
}

/**
 * Class Google_Service_Blogger_Pageviews
 */
class Google_Service_Blogger_Pageviews extends Google_Collection
{
    public $blogId;
    public $kind;
    protected $collection_key = 'counts';
    protected $internal_gapi_mappings = [];
    protected $countsType = 'Google_Service_Blogger_PageviewsCounts';
    protected $countsDataType = 'array';

    /**
     * @return mixed
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * @param $blogId
     */
    public function setBlogId($blogId)
    {
        $this->blogId = $blogId;
    }

    /**
     * @param $counts
     */
    public function setCounts($counts)
    {
        $this->counts = $counts;
    }

    /**
     * @return mixed
     */
    public function getCounts()
    {
        return $this->counts;
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
 * Class Google_Service_Blogger_PageviewsCounts
 */
class Google_Service_Blogger_PageviewsCounts extends Google_Model
{
    public $count;
    public $timeRange;
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
    public function getTimeRange()
    {
        return $this->timeRange;
    }

    /**
     * @param $timeRange
     */
    public function setTimeRange($timeRange)
    {
        $this->timeRange = $timeRange;
    }
}

/**
 * Class Google_Service_Blogger_Post
 */
class Google_Service_Blogger_Post extends Google_Collection
{
    public $content;
    public $customMetaData;
    public $etag;
    public $id;
    public $kind;
    public $labels;
    public $published;
    public $readerComments;
    public $selfLink;
    public $status;
    public $title;
    public $titleLink;
    public $updated;
    public $url;
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Blogger_PostAuthor';
    protected $authorDataType = '';
    protected $blogType = 'Google_Service_Blogger_PostBlog';
    protected $blogDataType = '';
    protected $imagesType = 'Google_Service_Blogger_PostImages';
    protected $imagesDataType = 'array';
    protected $locationType = 'Google_Service_Blogger_PostLocation';
    protected $locationDataType = '';
    protected $repliesType = 'Google_Service_Blogger_PostReplies';
    protected $repliesDataType = '';

    /**
     * @param Google_Service_Blogger_PostAuthor $author
     */
    public function setAuthor(Google_Service_Blogger_PostAuthor $author)
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
     * @param Google_Service_Blogger_PostBlog $blog
     */
    public function setBlog(Google_Service_Blogger_PostBlog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
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
    public function getCustomMetaData()
    {
        return $this->customMetaData;
    }

    /**
     * @param $customMetaData
     */
    public function setCustomMetaData($customMetaData)
    {
        $this->customMetaData = $customMetaData;
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
     * @param $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
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
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @param Google_Service_Blogger_PostLocation $location
     */
    public function setLocation(Google_Service_Blogger_PostLocation $location)
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
    public function getReaderComments()
    {
        return $this->readerComments;
    }

    /**
     * @param $readerComments
     */
    public function setReaderComments($readerComments)
    {
        $this->readerComments = $readerComments;
    }

    /**
     * @param Google_Service_Blogger_PostReplies $replies
     */
    public function setReplies(Google_Service_Blogger_PostReplies $replies)
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
    public function getTitleLink()
    {
        return $this->titleLink;
    }

    /**
     * @param $titleLink
     */
    public function setTitleLink($titleLink)
    {
        $this->titleLink = $titleLink;
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
}

/**
 * Class Google_Service_Blogger_PostAuthor
 */
class Google_Service_Blogger_PostAuthor extends Google_Model
{
    public $displayName;
    public $id;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Blogger_PostAuthorImage';
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
     * @param Google_Service_Blogger_PostAuthorImage $image
     */
    public function setImage(Google_Service_Blogger_PostAuthorImage $image)
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
 * Class Google_Service_Blogger_PostAuthorImage
 */
class Google_Service_Blogger_PostAuthorImage extends Google_Model
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
 * Class Google_Service_Blogger_PostBlog
 */
class Google_Service_Blogger_PostBlog extends Google_Model
{
    public $id;
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
}

/**
 * Class Google_Service_Blogger_PostImages
 */
class Google_Service_Blogger_PostImages extends Google_Model
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
 * Class Google_Service_Blogger_PostList
 */
class Google_Service_Blogger_PostList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_Post';
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
}

/**
 * Class Google_Service_Blogger_PostLocation
 */
class Google_Service_Blogger_PostLocation extends Google_Model
{
    public $lat;
    public $lng;
    public $name;
    public $span;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
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
    public function getSpan()
    {
        return $this->span;
    }

    /**
     * @param $span
     */
    public function setSpan($span)
    {
        $this->span = $span;
    }
}

/**
 * Class Google_Service_Blogger_PostPerUserInfo
 */
class Google_Service_Blogger_PostPerUserInfo extends Google_Model
{
    public $blogId;
    public $hasEditAccess;
    public $kind;
    public $postId;
    public $userId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * @param $blogId
     */
    public function setBlogId($blogId)
    {
        $this->blogId = $blogId;
    }

    /**
     * @return mixed
     */
    public function getHasEditAccess()
    {
        return $this->hasEditAccess;
    }

    /**
     * @param $hasEditAccess
     */
    public function setHasEditAccess($hasEditAccess)
    {
        $this->hasEditAccess = $hasEditAccess;
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
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}

/**
 * Class Google_Service_Blogger_PostReplies
 */
class Google_Service_Blogger_PostReplies extends Google_Collection
{
    public $selfLink;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_Comment';
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
 * Class Google_Service_Blogger_PostUserInfo
 */
class Google_Service_Blogger_PostUserInfo extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [
        "postUserInfo" => "post_user_info",
    ];
    protected $postType = 'Google_Service_Blogger_Post';
    protected $postDataType = '';
    protected $postUserInfoType = 'Google_Service_Blogger_PostPerUserInfo';
    protected $postUserInfoDataType = '';

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
     * @param Google_Service_Blogger_Post $post
     */
    public function setPost(Google_Service_Blogger_Post $post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Google_Service_Blogger_PostPerUserInfo $postUserInfo
     */
    public function setPostUserInfo(Google_Service_Blogger_PostPerUserInfo $postUserInfo)
    {
        $this->postUserInfo = $postUserInfo;
    }

    /**
     * @return mixed
     */
    public function getPostUserInfo()
    {
        return $this->postUserInfo;
    }
}

/**
 * Class Google_Service_Blogger_PostUserInfosList
 */
class Google_Service_Blogger_PostUserInfosList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Blogger_PostUserInfo';
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
 * Class Google_Service_Blogger_User
 */
class Google_Service_Blogger_User extends Google_Model
{
    public $about;
    public $created;
    public $displayName;
    public $id;
    public $kind;
    public $selfLink;
    public $url;
    protected $internal_gapi_mappings = [];
    protected $blogsType = 'Google_Service_Blogger_UserBlogs';
    protected $blogsDataType = '';
    protected $localeType = 'Google_Service_Blogger_UserLocale';
    protected $localeDataType = '';

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param $about
     */
    public function setAbout($about)
    {
        $this->about = $about;
    }

    /**
     * @param Google_Service_Blogger_UserBlogs $blogs
     */
    public function setBlogs(Google_Service_Blogger_UserBlogs $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * @return mixed
     */
    public function getBlogs()
    {
        return $this->blogs;
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
     * @param Google_Service_Blogger_UserLocale $locale
     */
    public function setLocale(Google_Service_Blogger_UserLocale $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
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
 * Class Google_Service_Blogger_UserBlogs
 */
class Google_Service_Blogger_UserBlogs extends Google_Model
{
    public $selfLink;
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
}

/**
 * Class Google_Service_Blogger_UserLocale
 */
class Google_Service_Blogger_UserLocale extends Google_Model
{
    public $country;
    public $language;
    public $variant;
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
