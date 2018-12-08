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
 * Service definition for Drive (v2).
 *
 * <p>
 * The API to interact with Drive.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/drive/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Drive extends Google_Service
{
    /** View and manage the files in your Google Drive. */
    const DRIVE =
        "https://www.googleapis.com/auth/drive";
    /** View and manage its own configuration data in your Google Drive. */
    const DRIVE_APPDATA =
        "https://www.googleapis.com/auth/drive.appdata";
    /** View your Google Drive apps. */
    const DRIVE_APPS_READONLY =
        "https://www.googleapis.com/auth/drive.apps.readonly";
    /** View and manage Google Drive files that you have opened or created with this app. */
    const DRIVE_FILE =
        "https://www.googleapis.com/auth/drive.file";
    /** View and manage metadata of files in your Google Drive. */
    const DRIVE_METADATA =
        "https://www.googleapis.com/auth/drive.metadata";
    /** View metadata for files in your Google Drive. */
    const DRIVE_METADATA_READONLY =
        "https://www.googleapis.com/auth/drive.metadata.readonly";
    /** View the files in your Google Drive. */
    const DRIVE_READONLY =
        "https://www.googleapis.com/auth/drive.readonly";
    /** Modify your Google Apps Script scripts' behavior. */
    const DRIVE_SCRIPTS =
        "https://www.googleapis.com/auth/drive.scripts";

    public $about;
    public $apps;
    public $changes;
    public $channels;
    public $children;
    public $comments;
    public $files;
    public $parents;
    public $permissions;
    public $properties;
    public $realtime;
    public $replies;
    public $revisions;


    /**
     * Constructs the internal representation of the Drive service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'drive/v2/';
        $this->version = 'v2';
        $this->serviceName = 'drive';

        $this->about = new Google_Service_Drive_About_Resource(
            $this,
            $this->serviceName,
            'about',
            [
                'methods' => [
                    'get' => [
                        'path' => 'about',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'includeSubscribed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'maxChangeIdCount' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startChangeId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->apps = new Google_Service_Drive_Apps_Resource(
            $this,
            $this->serviceName,
            'apps',
            [
                'methods' => [
                    'get' => [
                        'path' => 'apps/{appId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'appId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'apps',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'languageCode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'appFilterExtensions' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'appFilterMimeTypes' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->changes = new Google_Service_Drive_Changes_Resource(
            $this,
            $this->serviceName,
            'changes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'changes/{changeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'changeId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'changes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'includeSubscribed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'startChangeId' => [
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
                        ],
                    ], 'watch' => [
                        'path' => 'changes/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'includeSubscribed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'startChangeId' => [
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
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_Drive_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'stop' => [
                        'path' => 'channels/stop',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->children = new Google_Service_Drive_Children_Resource(
            $this,
            $this->serviceName,
            'children',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{folderId}/children/{childId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'folderId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'childId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{folderId}/children/{childId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'folderId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'childId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{folderId}/children',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'folderId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{folderId}/children',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'folderId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'q' => [
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
                    ],
                ]
            ]
        );
        $this->comments = new Google_Service_Drive_Comments_Resource(
            $this,
            $this->serviceName,
            'comments',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/comments/{commentId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
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
                        'path' => 'files/{fileId}/comments/{commentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{fileId}/comments',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{fileId}/comments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updatedMin' => [
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
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}/comments/{commentId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
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
                    ], 'update' => [
                        'path' => 'files/{fileId}/comments/{commentId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
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
        $this->files = new Google_Service_Drive_Files_Resource(
            $this,
            $this->serviceName,
            'files',
            [
                'methods' => [
                    'copy' => [
                        'path' => 'files/{fileId}/copy',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'convert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocrLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pinned' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocr' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timedTextTrackName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timedTextLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'files/{fileId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'emptyTrash' => [
                        'path' => 'files/trash',
                        'httpMethod' => 'DELETE',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => 'files/{fileId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'acknowledgeAbuse' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'updateViewedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'revisionId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'convert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'useContentAsIndexableText' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocrLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pinned' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocr' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timedTextTrackName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timedTextLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'corpus' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'addParents' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updateViewedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'removeParents' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'setModifiedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'convert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'useContentAsIndexableText' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocrLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pinned' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'newRevision' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocr' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timedTextLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timedTextTrackName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'touch' => [
                        'path' => 'files/{fileId}/touch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'trash' => [
                        'path' => 'files/{fileId}/trash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'untrash' => [
                        'path' => 'files/{fileId}/untrash',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'addParents' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'updateViewedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'removeParents' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'setModifiedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'convert' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'useContentAsIndexableText' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocrLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pinned' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'newRevision' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ocr' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'timedTextLanguage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'timedTextTrackName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'files/{fileId}/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'acknowledgeAbuse' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'updateViewedDate' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'revisionId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->parents = new Google_Service_Drive_Parents_Resource(
            $this,
            $this->serviceName,
            'parents',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/parents/{parentId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'parentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{fileId}/parents/{parentId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'parentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{fileId}/parents',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{fileId}/parents',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->permissions = new Google_Service_Drive_Permissions_Resource(
            $this,
            $this->serviceName,
            'permissions',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/permissions/{permissionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{fileId}/permissions/{permissionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getIdForEmail' => [
                        'path' => 'permissionIds/{email}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'email' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{fileId}/permissions',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'emailMessage' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sendNotificationEmails' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{fileId}/permissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}/permissions/{permissionId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'transferOwnership' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}/permissions/{permissionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'permissionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'transferOwnership' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->properties = new Google_Service_Drive_Properties_Resource(
            $this,
            $this->serviceName,
            'properties',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/properties/{propertyKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'propertyKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{fileId}/properties/{propertyKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'propertyKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{fileId}/properties',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{fileId}/properties',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}/properties/{propertyKey}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'propertyKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}/properties/{propertyKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'propertyKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'visibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->realtime = new Google_Service_Drive_Realtime_Resource(
            $this,
            $this->serviceName,
            'realtime',
            [
                'methods' => [
                    'get' => [
                        'path' => 'files/{fileId}/realtime',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revision' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}/realtime',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'baseRevision' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->replies = new Google_Service_Drive_Replies_Resource(
            $this,
            $this->serviceName,
            'replies',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'includeDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'fileId' => [
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
                    ], 'list' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
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
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'commentId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'replyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->revisions = new Google_Service_Drive_Revisions_Resource(
            $this,
            $this->serviceName,
            'revisions',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'files/{fileId}/revisions/{revisionId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revisionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'files/{fileId}/revisions/{revisionId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revisionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'files/{fileId}/revisions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'files/{fileId}/revisions/{revisionId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revisionId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'files/{fileId}/revisions/{revisionId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'revisionId' => [
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
 * The "about" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $about = $driveService->about;
 *  </code>
 */
class Google_Service_Drive_About_Resource extends Google_Service_Resource
{

    /**
     * Gets the information about the current user along with Drive API settings
     * (about.get)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeSubscribed When calculating the number of remaining
     * change IDs, whether to include public files the user has opened and shared
     * files. When set to false, this counts only change IDs for owned files and any
     * shared or public files that the user has explicitly added to a folder they
     * own.
     * @opt_param string maxChangeIdCount Maximum number of remaining change IDs to
     * count
     * @opt_param string startChangeId Change ID to start counting from when
     * calculating number of remaining change IDs
     */
    public function get($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_About");
    }
}

/**
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $apps = $driveService->apps;
 *  </code>
 */
class Google_Service_Drive_Apps_Resource extends Google_Service_Resource
{

    /**
     * Gets a specific app. (apps.get)
     *
     * @param string $appId The ID of the app.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($appId, $optParams = [])
    {
        $params = ['appId' => $appId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_App");
    }

    /**
     * Lists a user's installed apps. (apps.listApps)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string languageCode A language or locale code, as defined by BCP
     * 47, with some extensions from Unicode's LDML format
     * (http://www.unicode.org/reports/tr35/).
     * @opt_param string appFilterExtensions A comma-separated list of file
     * extensions for open with filtering. All apps within the given app query scope
     * which can open any of the given file extensions will be included in the
     * response. If appFilterMimeTypes are provided as well, the result is a union
     * of the two resulting app lists.
     * @opt_param string appFilterMimeTypes A comma-separated list of MIME types for
     * open with filtering. All apps within the given app query scope which can open
     * any of the given MIME types will be included in the response. If
     * appFilterExtensions are provided as well, the result is a union of the two
     * resulting app lists.
     */
    public function listApps($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_AppList");
    }
}

/**
 * The "changes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $changes = $driveService->changes;
 *  </code>
 */
class Google_Service_Drive_Changes_Resource extends Google_Service_Resource
{

    /**
     * Gets a specific change. (changes.get)
     *
     * @param string $changeId The ID of the change.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($changeId, $optParams = [])
    {
        $params = ['changeId' => $changeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_Change");
    }

    /**
     * Lists the changes for a user. (changes.listChanges)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeSubscribed Whether to include public files the user
     * has opened and shared files. When set to false, the list only includes owned
     * files plus any shared or public files the user has explicitly added to a
     * folder they own.
     * @opt_param string startChangeId Change ID to start listing changes from.
     * @opt_param bool includeDeleted Whether to include deleted items.
     * @opt_param int maxResults Maximum number of changes to return.
     * @opt_param string pageToken Page token for changes.
     */
    public function listChanges($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_ChangeList");
    }

    /**
     * Subscribe to changes for a user. (changes.watch)
     *
     * @param Google_Channel|Google_Service_Drive_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeSubscribed Whether to include public files the user
     * has opened and shared files. When set to false, the list only includes owned
     * files plus any shared or public files the user has explicitly added to a
     * folder they own.
     * @opt_param string startChangeId Change ID to start listing changes from.
     * @opt_param bool includeDeleted Whether to include deleted items.
     * @opt_param int maxResults Maximum number of changes to return.
     * @opt_param string pageToken Page token for changes.
     */
    public function watch(Google_Service_Drive_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Drive_Channel");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $channels = $driveService->channels;
 *  </code>
 */
class Google_Service_Drive_Channels_Resource extends Google_Service_Resource
{

    /**
     * Stop watching resources through this channel (channels.stop)
     *
     * @param Google_Channel|Google_Service_Drive_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop(Google_Service_Drive_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params]);
    }
}

/**
 * The "children" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $children = $driveService->children;
 *  </code>
 */
class Google_Service_Drive_Children_Resource extends Google_Service_Resource
{

    /**
     * Removes a child from a folder. (children.delete)
     *
     * @param string $folderId The ID of the folder.
     * @param string $childId The ID of the child.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($folderId, $childId, $optParams = [])
    {
        $params = ['folderId' => $folderId, 'childId' => $childId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a specific child reference. (children.get)
     *
     * @param string $folderId The ID of the folder.
     * @param string $childId The ID of the child.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($folderId, $childId, $optParams = [])
    {
        $params = ['folderId' => $folderId, 'childId' => $childId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_ChildReference");
    }

    /**
     * Inserts a file into a folder. (children.insert)
     *
     * @param string $folderId The ID of the folder.
     * @param Google_ChildReference|Google_Service_Drive_ChildReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($folderId, Google_Service_Drive_ChildReference $postBody, $optParams = [])
    {
        $params = ['folderId' => $folderId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_ChildReference");
    }

    /**
     * Lists a folder's children. (children.listChildren)
     *
     * @param string $folderId The ID of the folder.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string q Query string for searching children.
     * @opt_param string pageToken Page token for children.
     * @opt_param int maxResults Maximum number of children to return.
     */
    public function listChildren($folderId, $optParams = [])
    {
        $params = ['folderId' => $folderId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_ChildList");
    }
}

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $comments = $driveService->comments;
 *  </code>
 */
class Google_Service_Drive_Comments_Resource extends Google_Service_Resource
{

    /**
     * Deletes a comment. (comments.delete)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $commentId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a comment by ID. (comments.get)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeDeleted If set, this will succeed when retrieving a
     * deleted comment, and will include any deleted replies.
     */
    public function get($fileId, $commentId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_Comment");
    }

    /**
     * Creates a new comment on the given file. (comments.insert)
     *
     * @param string $fileId The ID of the file.
     * @param Google_Comment|Google_Service_Drive_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($fileId, Google_Service_Drive_Comment $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_Comment");
    }

    /**
     * Lists a file's comments. (comments.listComments)
     *
     * @param string $fileId The ID of the file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of "nextPageToken" from the previous response.
     * @opt_param string updatedMin Only discussions that were updated after this
     * timestamp will be returned. Formatted as an RFC 3339 timestamp.
     * @opt_param bool includeDeleted If set, all comments and replies, including
     * deleted comments and replies (with content stripped) will be returned.
     * @opt_param int maxResults The maximum number of discussions to include in the
     * response, used for paging.
     */
    public function listComments($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_CommentList");
    }

    /**
     * Updates an existing comment. This method supports patch semantics.
     * (comments.patch)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param Google_Comment|Google_Service_Drive_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($fileId, $commentId, Google_Service_Drive_Comment $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_Comment");
    }

    /**
     * Updates an existing comment. (comments.update)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param Google_Comment|Google_Service_Drive_Comment $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($fileId, $commentId, Google_Service_Drive_Comment $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_Comment");
    }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $files = $driveService->files;
 *  </code>
 */
class Google_Service_Drive_Files_Resource extends Google_Service_Resource
{

    /**
     * Creates a copy of the specified file. (files.copy)
     *
     * @param string $fileId The ID of the file to copy.
     * @param Google_DriveFile|Google_Service_Drive_DriveFile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool convert Whether to convert this file to the corresponding
     * Google Docs format.
     * @opt_param string ocrLanguage If ocr is true, hints at the language to use.
     * Valid values are ISO 639-1 codes.
     * @opt_param string visibility The visibility of the new file. This parameter
     * is only relevant when the source is not a native Google Doc and
     * convert=false.
     * @opt_param bool pinned Whether to pin the head revision of the new copy. A
     * file can have a maximum of 200 pinned revisions.
     * @opt_param bool ocr Whether to attempt OCR on .jpg, .png, .gif, or .pdf
     * uploads.
     * @opt_param string timedTextTrackName The timed text track name.
     * @opt_param string timedTextLanguage The language of the timed text.
     */
    public function copy($fileId, Google_Service_Drive_DriveFile $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('copy', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Permanently deletes a file by ID. Skips the trash. The currently
     * authenticated user must own the file. (files.delete)
     *
     * @param string $fileId The ID of the file to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Permanently deletes all of the user's trashed files. (files.emptyTrash)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function emptyTrash($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('emptyTrash', [$params]);
    }

    /**
     * Gets a file's metadata by ID. (files.get)
     *
     * @param string $fileId The ID for the file in question.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
     * of downloading known malware or other abusive files.
     * @opt_param bool updateViewedDate Whether to update the view date after
     * successfully retrieving the file.
     * @opt_param string revisionId Specifies the Revision ID that should be
     * downloaded. Ignored unless alt=media is specified.
     * @opt_param string projection This parameter is deprecated and has no
     * function.
     */
    public function get($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Insert a new file. (files.insert)
     *
     * @param Google_DriveFile|Google_Service_Drive_DriveFile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool convert Whether to convert this file to the corresponding
     * Google Docs format.
     * @opt_param bool useContentAsIndexableText Whether to use the content as
     * indexable text.
     * @opt_param string ocrLanguage If ocr is true, hints at the language to use.
     * Valid values are ISO 639-1 codes.
     * @opt_param string visibility The visibility of the new file. This parameter
     * is only relevant when convert=false.
     * @opt_param bool pinned Whether to pin the head revision of the uploaded file.
     * A file can have a maximum of 200 pinned revisions.
     * @opt_param bool ocr Whether to attempt OCR on .jpg, .png, .gif, or .pdf
     * uploads.
     * @opt_param string timedTextTrackName The timed text track name.
     * @opt_param string timedTextLanguage The language of the timed text.
     */
    public function insert(Google_Service_Drive_DriveFile $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Lists the user's files. (files.listFiles)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string q Query string for searching files.
     * @opt_param string pageToken Page token for files.
     * @opt_param string corpus The body of items (files/documents) to which the
     * query applies.
     * @opt_param string projection This parameter is deprecated and has no
     * function.
     * @opt_param int maxResults Maximum number of files to return.
     */
    public function listFiles($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_FileList");
    }

    /**
     * Updates file metadata and/or content. This method supports patch semantics.
     * (files.patch)
     *
     * @param string $fileId The ID of the file to update.
     * @param Google_DriveFile|Google_Service_Drive_DriveFile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string addParents Comma-separated list of parent IDs to add.
     * @opt_param bool updateViewedDate Whether to update the view date after
     * successfully updating the file.
     * @opt_param string removeParents Comma-separated list of parent IDs to remove.
     * @opt_param bool setModifiedDate Whether to set the modified date with the
     * supplied modified date.
     * @opt_param bool convert Whether to convert this file to the corresponding
     * Google Docs format.
     * @opt_param bool useContentAsIndexableText Whether to use the content as
     * indexable text.
     * @opt_param string ocrLanguage If ocr is true, hints at the language to use.
     * Valid values are ISO 639-1 codes.
     * @opt_param bool pinned Whether to pin the new revision. A file can have a
     * maximum of 200 pinned revisions.
     * @opt_param bool newRevision Whether a blob upload should create a new
     * revision. If false, the blob data in the current head revision is replaced.
     * If true or not set, a new blob is created as head revision, and previous
     * revisions are preserved (causing increased use of the user's data storage
     * quota).
     * @opt_param bool ocr Whether to attempt OCR on .jpg, .png, .gif, or .pdf
     * uploads.
     * @opt_param string timedTextLanguage The language of the timed text.
     * @opt_param string timedTextTrackName The timed text track name.
     */
    public function patch($fileId, Google_Service_Drive_DriveFile $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Set the file's updated time to the current server time. (files.touch)
     *
     * @param string $fileId The ID of the file to update.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function touch($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('touch', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Moves a file to the trash. (files.trash)
     *
     * @param string $fileId The ID of the file to trash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function trash($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('trash', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Restores a file from the trash. (files.untrash)
     *
     * @param string $fileId The ID of the file to untrash.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function untrash($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('untrash', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Updates file metadata and/or content. (files.update)
     *
     * @param string $fileId The ID of the file to update.
     * @param Google_DriveFile|Google_Service_Drive_DriveFile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string addParents Comma-separated list of parent IDs to add.
     * @opt_param bool updateViewedDate Whether to update the view date after
     * successfully updating the file.
     * @opt_param string removeParents Comma-separated list of parent IDs to remove.
     * @opt_param bool setModifiedDate Whether to set the modified date with the
     * supplied modified date.
     * @opt_param bool convert Whether to convert this file to the corresponding
     * Google Docs format.
     * @opt_param bool useContentAsIndexableText Whether to use the content as
     * indexable text.
     * @opt_param string ocrLanguage If ocr is true, hints at the language to use.
     * Valid values are ISO 639-1 codes.
     * @opt_param bool pinned Whether to pin the new revision. A file can have a
     * maximum of 200 pinned revisions.
     * @opt_param bool newRevision Whether a blob upload should create a new
     * revision. If false, the blob data in the current head revision is replaced.
     * If true or not set, a new blob is created as head revision, and previous
     * revisions are preserved (causing increased use of the user's data storage
     * quota).
     * @opt_param bool ocr Whether to attempt OCR on .jpg, .png, .gif, or .pdf
     * uploads.
     * @opt_param string timedTextLanguage The language of the timed text.
     * @opt_param string timedTextTrackName The timed text track name.
     */
    public function update($fileId, Google_Service_Drive_DriveFile $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_DriveFile");
    }

    /**
     * Subscribe to changes on a file (files.watch)
     *
     * @param string $fileId The ID for the file in question.
     * @param Google_Channel|Google_Service_Drive_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool acknowledgeAbuse Whether the user is acknowledging the risk
     * of downloading known malware or other abusive files.
     * @opt_param bool updateViewedDate Whether to update the view date after
     * successfully retrieving the file.
     * @opt_param string revisionId Specifies the Revision ID that should be
     * downloaded. Ignored unless alt=media is specified.
     * @opt_param string projection This parameter is deprecated and has no
     * function.
     */
    public function watch($fileId, Google_Service_Drive_Channel $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Drive_Channel");
    }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $parents = $driveService->parents;
 *  </code>
 */
class Google_Service_Drive_Parents_Resource extends Google_Service_Resource
{

    /**
     * Removes a parent from a file. (parents.delete)
     *
     * @param string $fileId The ID of the file.
     * @param string $parentId The ID of the parent.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $parentId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'parentId' => $parentId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a specific parent reference. (parents.get)
     *
     * @param string $fileId The ID of the file.
     * @param string $parentId The ID of the parent.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($fileId, $parentId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'parentId' => $parentId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_ParentReference");
    }

    /**
     * Adds a parent folder for a file. (parents.insert)
     *
     * @param string $fileId The ID of the file.
     * @param Google_ParentReference|Google_Service_Drive_ParentReference $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($fileId, Google_Service_Drive_ParentReference $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_ParentReference");
    }

    /**
     * Lists a file's parents. (parents.listParents)
     *
     * @param string $fileId The ID of the file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listParents($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_ParentList");
    }
}

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $permissions = $driveService->permissions;
 *  </code>
 */
class Google_Service_Drive_Permissions_Resource extends Google_Service_Resource
{

    /**
     * Deletes a permission from a file. (permissions.delete)
     *
     * @param string $fileId The ID for the file.
     * @param string $permissionId The ID for the permission.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $permissionId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'permissionId' => $permissionId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a permission by ID. (permissions.get)
     *
     * @param string $fileId The ID for the file.
     * @param string $permissionId The ID for the permission.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($fileId, $permissionId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'permissionId' => $permissionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_Permission");
    }

    /**
     * Returns the permission ID for an email address. (permissions.getIdForEmail)
     *
     * @param string $email The email address for which to return a permission ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getIdForEmail($email, $optParams = [])
    {
        $params = ['email' => $email];
        $params = array_merge($params, $optParams);

        return $this->call('getIdForEmail', [$params], "Google_Service_Drive_PermissionId");
    }

    /**
     * Inserts a permission for a file. (permissions.insert)
     *
     * @param string $fileId The ID for the file.
     * @param Google_Permission|Google_Service_Drive_Permission $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string emailMessage A custom message to include in notification
     * emails.
     * @opt_param bool sendNotificationEmails Whether to send notification emails
     * when sharing to users or groups. This parameter is ignored and an email is
     * sent if the role is owner.
     */
    public function insert($fileId, Google_Service_Drive_Permission $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_Permission");
    }

    /**
     * Lists a file's permissions. (permissions.listPermissions)
     *
     * @param string $fileId The ID for the file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listPermissions($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_PermissionList");
    }

    /**
     * Updates a permission. This method supports patch semantics.
     * (permissions.patch)
     *
     * @param string $fileId The ID for the file.
     * @param string $permissionId The ID for the permission.
     * @param Google_Permission|Google_Service_Drive_Permission $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool transferOwnership Whether changing a role to 'owner'
     * downgrades the current owners to writers. Does nothing if the specified role
     * is not 'owner'.
     */
    public function patch($fileId, $permissionId, Google_Service_Drive_Permission $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'permissionId' => $permissionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_Permission");
    }

    /**
     * Updates a permission. (permissions.update)
     *
     * @param string $fileId The ID for the file.
     * @param string $permissionId The ID for the permission.
     * @param Google_Permission|Google_Service_Drive_Permission $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool transferOwnership Whether changing a role to 'owner'
     * downgrades the current owners to writers. Does nothing if the specified role
     * is not 'owner'.
     */
    public function update($fileId, $permissionId, Google_Service_Drive_Permission $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'permissionId' => $permissionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_Permission");
    }
}

/**
 * The "properties" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $properties = $driveService->properties;
 *  </code>
 */
class Google_Service_Drive_Properties_Resource extends Google_Service_Resource
{

    /**
     * Deletes a property. (properties.delete)
     *
     * @param string $fileId The ID of the file.
     * @param string $propertyKey The key of the property.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string visibility The visibility of the property.
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $propertyKey, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'propertyKey' => $propertyKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a property by its key. (properties.get)
     *
     * @param string $fileId The ID of the file.
     * @param string $propertyKey The key of the property.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string visibility The visibility of the property.
     */
    public function get($fileId, $propertyKey, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'propertyKey' => $propertyKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_Property");
    }

    /**
     * Adds a property to a file. (properties.insert)
     *
     * @param string $fileId The ID of the file.
     * @param Google_Property|Google_Service_Drive_Property $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($fileId, Google_Service_Drive_Property $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_Property");
    }

    /**
     * Lists a file's properties. (properties.listProperties)
     *
     * @param string $fileId The ID of the file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listProperties($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_PropertyList");
    }

    /**
     * Updates a property. This method supports patch semantics. (properties.patch)
     *
     * @param string $fileId The ID of the file.
     * @param string $propertyKey The key of the property.
     * @param Google_Property|Google_Service_Drive_Property $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string visibility The visibility of the property.
     */
    public function patch($fileId, $propertyKey, Google_Service_Drive_Property $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'propertyKey' => $propertyKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_Property");
    }

    /**
     * Updates a property. (properties.update)
     *
     * @param string $fileId The ID of the file.
     * @param string $propertyKey The key of the property.
     * @param Google_Property|Google_Service_Drive_Property $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string visibility The visibility of the property.
     */
    public function update($fileId, $propertyKey, Google_Service_Drive_Property $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'propertyKey' => $propertyKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_Property");
    }
}

/**
 * The "realtime" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $realtime = $driveService->realtime;
 *  </code>
 */
class Google_Service_Drive_Realtime_Resource extends Google_Service_Resource
{

    /**
     * Exports the contents of the Realtime API data model associated with this file
     * as JSON. (realtime.get)
     *
     * @param string $fileId The ID of the file that the Realtime API data model is
     *                          associated with.
     * @param array $optParams Optional parameters.
     *
     * @opt_param int revision The revision of the Realtime API data model to
     * export. Revisions start at 1 (the initial empty data model) and are
     * incremented with each change. If this parameter is excluded, the most recent
     * data model will be returned.
     * @return expected_class|Google_Http_Request
     */
    public function get($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params]);
    }

    /**
     * Overwrites the Realtime API data model associated with this file with the
     * provided JSON data model. (realtime.update)
     *
     * @param string $fileId The ID of the file that the Realtime API data model is
     *                          associated with.
     * @param array $optParams Optional parameters.
     *
     * @opt_param string baseRevision The revision of the model to diff the uploaded
     * model against. If set, the uploaded model is diffed against the provided
     * revision and those differences are merged with any changes made to the model
     * after the provided revision. If not set, the uploaded model replaces the
     * current model on the server.
     * @return expected_class|Google_Http_Request
     */
    public function update($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params]);
    }
}

/**
 * The "replies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $replies = $driveService->replies;
 *  </code>
 */
class Google_Service_Drive_Replies_Resource extends Google_Service_Resource
{

    /**
     * Deletes a reply. (replies.delete)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param string $replyId The ID of the reply.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $commentId, $replyId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a reply. (replies.get)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param string $replyId The ID of the reply.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeDeleted If set, this will succeed when retrieving a
     * deleted reply.
     */
    public function get($fileId, $commentId, $replyId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_CommentReply");
    }

    /**
     * Creates a new reply to the given comment. (replies.insert)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param Google_CommentReply|Google_Service_Drive_CommentReply $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($fileId, $commentId, Google_Service_Drive_CommentReply $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Drive_CommentReply");
    }

    /**
     * Lists all of the replies to a comment. (replies.listReplies)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The continuation token, used to page through
     * large result sets. To get the next page of results, set this parameter to the
     * value of "nextPageToken" from the previous response.
     * @opt_param bool includeDeleted If set, all replies, including deleted replies
     * (with content stripped) will be returned.
     * @opt_param int maxResults The maximum number of replies to include in the
     * response, used for paging.
     */
    public function listReplies($fileId, $commentId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_CommentReplyList");
    }

    /**
     * Updates an existing reply. This method supports patch semantics.
     * (replies.patch)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param string $replyId The ID of the reply.
     * @param Google_CommentReply|Google_Service_Drive_CommentReply $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($fileId, $commentId, $replyId, Google_Service_Drive_CommentReply $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_CommentReply");
    }

    /**
     * Updates an existing reply. (replies.update)
     *
     * @param string $fileId The ID of the file.
     * @param string $commentId The ID of the comment.
     * @param string $replyId The ID of the reply.
     * @param Google_CommentReply|Google_Service_Drive_CommentReply $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($fileId, $commentId, $replyId, Google_Service_Drive_CommentReply $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'commentId' => $commentId, 'replyId' => $replyId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_CommentReply");
    }
}

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $revisions = $driveService->revisions;
 *  </code>
 */
class Google_Service_Drive_Revisions_Resource extends Google_Service_Resource
{

    /**
     * Removes a revision. (revisions.delete)
     *
     * @param string $fileId The ID of the file.
     * @param string $revisionId The ID of the revision.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($fileId, $revisionId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'revisionId' => $revisionId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets a specific revision. (revisions.get)
     *
     * @param string $fileId The ID of the file.
     * @param string $revisionId The ID of the revision.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($fileId, $revisionId, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'revisionId' => $revisionId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Drive_Revision");
    }

    /**
     * Lists a file's revisions. (revisions.listRevisions)
     *
     * @param string $fileId The ID of the file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listRevisions($fileId, $optParams = [])
    {
        $params = ['fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Drive_RevisionList");
    }

    /**
     * Updates a revision. This method supports patch semantics. (revisions.patch)
     *
     * @param string $fileId The ID for the file.
     * @param string $revisionId The ID for the revision.
     * @param Google_Revision|Google_Service_Drive_Revision $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($fileId, $revisionId, Google_Service_Drive_Revision $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'revisionId' => $revisionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Drive_Revision");
    }

    /**
     * Updates a revision. (revisions.update)
     *
     * @param string $fileId The ID for the file.
     * @param string $revisionId The ID for the revision.
     * @param Google_Revision|Google_Service_Drive_Revision $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($fileId, $revisionId, Google_Service_Drive_Revision $postBody, $optParams = [])
    {
        $params = ['fileId' => $fileId, 'revisionId' => $revisionId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Drive_Revision");
    }
}


/**
 * Class Google_Service_Drive_About
 */
class Google_Service_Drive_About extends Google_Collection
{
    public $domainSharingPolicy;
    public $etag;
    public $folderColorPalette;
    public $isCurrentAppInstalled;
    public $kind;
    public $languageCode;
    public $largestChangeId;
    public $name;
    public $permissionId;
    public $quotaBytesTotal;
    public $quotaBytesUsed;
    public $quotaBytesUsedAggregate;
    public $quotaBytesUsedInTrash;
    public $quotaType;
    public $remainingChangeIds;
    public $rootFolderId;
    public $selfLink;
    protected $collection_key = 'quotaBytesByService';
    protected $internal_gapi_mappings = [];
    protected $additionalRoleInfoType = 'Google_Service_Drive_AboutAdditionalRoleInfo';
    protected $additionalRoleInfoDataType = 'array';
    protected $exportFormatsType = 'Google_Service_Drive_AboutExportFormats';
    protected $exportFormatsDataType = 'array';
    protected $featuresType = 'Google_Service_Drive_AboutFeatures';
    protected $featuresDataType = 'array';
    protected $importFormatsType = 'Google_Service_Drive_AboutImportFormats';
    protected $importFormatsDataType = 'array';
    protected $maxUploadSizesType = 'Google_Service_Drive_AboutMaxUploadSizes';
    protected $maxUploadSizesDataType = 'array';
    protected $quotaBytesByServiceType = 'Google_Service_Drive_AboutQuotaBytesByService';
    protected $quotaBytesByServiceDataType = 'array';
    protected $userType = 'Google_Service_Drive_User';
    protected $userDataType = '';


    /**
     * @param $additionalRoleInfo
     */
    public function setAdditionalRoleInfo($additionalRoleInfo)
    {
        $this->additionalRoleInfo = $additionalRoleInfo;
    }

    /**
     * @return mixed
     */
    public function getAdditionalRoleInfo()
    {
        return $this->additionalRoleInfo;
    }

    /**
     * @return mixed
     */
    public function getDomainSharingPolicy()
    {
        return $this->domainSharingPolicy;
    }

    /**
     * @param $domainSharingPolicy
     */
    public function setDomainSharingPolicy($domainSharingPolicy)
    {
        $this->domainSharingPolicy = $domainSharingPolicy;
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
     * @param $exportFormats
     */
    public function setExportFormats($exportFormats)
    {
        $this->exportFormats = $exportFormats;
    }

    /**
     * @return mixed
     */
    public function getExportFormats()
    {
        return $this->exportFormats;
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
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @return mixed
     */
    public function getFolderColorPalette()
    {
        return $this->folderColorPalette;
    }

    /**
     * @param $folderColorPalette
     */
    public function setFolderColorPalette($folderColorPalette)
    {
        $this->folderColorPalette = $folderColorPalette;
    }

    /**
     * @param $importFormats
     */
    public function setImportFormats($importFormats)
    {
        $this->importFormats = $importFormats;
    }

    /**
     * @return mixed
     */
    public function getImportFormats()
    {
        return $this->importFormats;
    }

    /**
     * @return mixed
     */
    public function getIsCurrentAppInstalled()
    {
        return $this->isCurrentAppInstalled;
    }

    /**
     * @param $isCurrentAppInstalled
     */
    public function setIsCurrentAppInstalled($isCurrentAppInstalled)
    {
        $this->isCurrentAppInstalled = $isCurrentAppInstalled;
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
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param $languageCode
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return mixed
     */
    public function getLargestChangeId()
    {
        return $this->largestChangeId;
    }

    /**
     * @param $largestChangeId
     */
    public function setLargestChangeId($largestChangeId)
    {
        $this->largestChangeId = $largestChangeId;
    }

    /**
     * @param $maxUploadSizes
     */
    public function setMaxUploadSizes($maxUploadSizes)
    {
        $this->maxUploadSizes = $maxUploadSizes;
    }

    /**
     * @return mixed
     */
    public function getMaxUploadSizes()
    {
        return $this->maxUploadSizes;
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
    public function getPermissionId()
    {
        return $this->permissionId;
    }

    /**
     * @param $permissionId
     */
    public function setPermissionId($permissionId)
    {
        $this->permissionId = $permissionId;
    }

    /**
     * @param $quotaBytesByService
     */
    public function setQuotaBytesByService($quotaBytesByService)
    {
        $this->quotaBytesByService = $quotaBytesByService;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesByService()
    {
        return $this->quotaBytesByService;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesTotal()
    {
        return $this->quotaBytesTotal;
    }

    /**
     * @param $quotaBytesTotal
     */
    public function setQuotaBytesTotal($quotaBytesTotal)
    {
        $this->quotaBytesTotal = $quotaBytesTotal;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesUsed()
    {
        return $this->quotaBytesUsed;
    }

    /**
     * @param $quotaBytesUsed
     */
    public function setQuotaBytesUsed($quotaBytesUsed)
    {
        $this->quotaBytesUsed = $quotaBytesUsed;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesUsedAggregate()
    {
        return $this->quotaBytesUsedAggregate;
    }

    /**
     * @param $quotaBytesUsedAggregate
     */
    public function setQuotaBytesUsedAggregate($quotaBytesUsedAggregate)
    {
        $this->quotaBytesUsedAggregate = $quotaBytesUsedAggregate;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesUsedInTrash()
    {
        return $this->quotaBytesUsedInTrash;
    }

    /**
     * @param $quotaBytesUsedInTrash
     */
    public function setQuotaBytesUsedInTrash($quotaBytesUsedInTrash)
    {
        $this->quotaBytesUsedInTrash = $quotaBytesUsedInTrash;
    }

    /**
     * @return mixed
     */
    public function getQuotaType()
    {
        return $this->quotaType;
    }

    /**
     * @param $quotaType
     */
    public function setQuotaType($quotaType)
    {
        $this->quotaType = $quotaType;
    }

    /**
     * @return mixed
     */
    public function getRemainingChangeIds()
    {
        return $this->remainingChangeIds;
    }

    /**
     * @param $remainingChangeIds
     */
    public function setRemainingChangeIds($remainingChangeIds)
    {
        $this->remainingChangeIds = $remainingChangeIds;
    }

    /**
     * @return mixed
     */
    public function getRootFolderId()
    {
        return $this->rootFolderId;
    }

    /**
     * @param $rootFolderId
     */
    public function setRootFolderId($rootFolderId)
    {
        $this->rootFolderId = $rootFolderId;
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
     * @param Google_Service_Drive_User $user
     */
    public function setUser(Google_Service_Drive_User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}

/**
 * Class Google_Service_Drive_AboutAdditionalRoleInfo
 */
class Google_Service_Drive_AboutAdditionalRoleInfo extends Google_Collection
{
    public $type;
    protected $collection_key = 'roleSets';
    protected $internal_gapi_mappings = [];
    protected $roleSetsType = 'Google_Service_Drive_AboutAdditionalRoleInfoRoleSets';
    protected $roleSetsDataType = 'array';

    /**
     * @param $roleSets
     */
    public function setRoleSets($roleSets)
    {
        $this->roleSets = $roleSets;
    }

    /**
     * @return mixed
     */
    public function getRoleSets()
    {
        return $this->roleSets;
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
 * Class Google_Service_Drive_AboutAdditionalRoleInfoRoleSets
 */
class Google_Service_Drive_AboutAdditionalRoleInfoRoleSets extends Google_Collection
{
    public $additionalRoles;
    public $primaryRole;
    protected $collection_key = 'additionalRoles';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdditionalRoles()
    {
        return $this->additionalRoles;
    }

    /**
     * @param $additionalRoles
     */
    public function setAdditionalRoles($additionalRoles)
    {
        $this->additionalRoles = $additionalRoles;
    }

    /**
     * @return mixed
     */
    public function getPrimaryRole()
    {
        return $this->primaryRole;
    }

    /**
     * @param $primaryRole
     */
    public function setPrimaryRole($primaryRole)
    {
        $this->primaryRole = $primaryRole;
    }
}

/**
 * Class Google_Service_Drive_AboutExportFormats
 */
class Google_Service_Drive_AboutExportFormats extends Google_Collection
{
    public $source;
    public $targets;
    protected $collection_key = 'targets';
    protected $internal_gapi_mappings = [];

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
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * @param $targets
     */
    public function setTargets($targets)
    {
        $this->targets = $targets;
    }
}

/**
 * Class Google_Service_Drive_AboutFeatures
 */
class Google_Service_Drive_AboutFeatures extends Google_Model
{
    public $featureName;
    public $featureRate;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }

    /**
     * @param $featureName
     */
    public function setFeatureName($featureName)
    {
        $this->featureName = $featureName;
    }

    /**
     * @return mixed
     */
    public function getFeatureRate()
    {
        return $this->featureRate;
    }

    /**
     * @param $featureRate
     */
    public function setFeatureRate($featureRate)
    {
        $this->featureRate = $featureRate;
    }
}

/**
 * Class Google_Service_Drive_AboutImportFormats
 */
class Google_Service_Drive_AboutImportFormats extends Google_Collection
{
    public $source;
    public $targets;
    protected $collection_key = 'targets';
    protected $internal_gapi_mappings = [];

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
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * @param $targets
     */
    public function setTargets($targets)
    {
        $this->targets = $targets;
    }
}

/**
 * Class Google_Service_Drive_AboutMaxUploadSizes
 */
class Google_Service_Drive_AboutMaxUploadSizes extends Google_Model
{
    public $size;
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Drive_AboutQuotaBytesByService
 */
class Google_Service_Drive_AboutQuotaBytesByService extends Google_Model
{
    public $bytesUsed;
    public $serviceName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBytesUsed()
    {
        return $this->bytesUsed;
    }

    /**
     * @param $bytesUsed
     */
    public function setBytesUsed($bytesUsed)
    {
        $this->bytesUsed = $bytesUsed;
    }

    /**
     * @return mixed
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }
}

/**
 * Class Google_Service_Drive_App
 */
class Google_Service_Drive_App extends Google_Collection
{
    public $authorized;
    public $createInFolderTemplate;
    public $createUrl;
    public $hasDriveWideScope;
    public $id;
    public $installed;
    public $kind;
    public $longDescription;
    public $name;
    public $objectType;
    public $openUrlTemplate;
    public $primaryFileExtensions;
    public $primaryMimeTypes;
    public $productId;
    public $productUrl;
    public $secondaryFileExtensions;
    public $secondaryMimeTypes;
    public $shortDescription;
    public $supportsCreate;
    public $supportsImport;
    public $supportsMultiOpen;
    public $supportsOfflineCreate;
    public $useByDefault;
    protected $collection_key = 'secondaryMimeTypes';
    protected $internal_gapi_mappings = [];
    protected $iconsType = 'Google_Service_Drive_AppIcons';
    protected $iconsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAuthorized()
    {
        return $this->authorized;
    }

    /**
     * @param $authorized
     */
    public function setAuthorized($authorized)
    {
        $this->authorized = $authorized;
    }

    /**
     * @return mixed
     */
    public function getCreateInFolderTemplate()
    {
        return $this->createInFolderTemplate;
    }

    /**
     * @param $createInFolderTemplate
     */
    public function setCreateInFolderTemplate($createInFolderTemplate)
    {
        $this->createInFolderTemplate = $createInFolderTemplate;
    }

    /**
     * @return mixed
     */
    public function getCreateUrl()
    {
        return $this->createUrl;
    }

    /**
     * @param $createUrl
     */
    public function setCreateUrl($createUrl)
    {
        $this->createUrl = $createUrl;
    }

    /**
     * @return mixed
     */
    public function getHasDriveWideScope()
    {
        return $this->hasDriveWideScope;
    }

    /**
     * @param $hasDriveWideScope
     */
    public function setHasDriveWideScope($hasDriveWideScope)
    {
        $this->hasDriveWideScope = $hasDriveWideScope;
    }

    /**
     * @param $icons
     */
    public function setIcons($icons)
    {
        $this->icons = $icons;
    }

    /**
     * @return mixed
     */
    public function getIcons()
    {
        return $this->icons;
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
    public function getInstalled()
    {
        return $this->installed;
    }

    /**
     * @param $installed
     */
    public function setInstalled($installed)
    {
        $this->installed = $installed;
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
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * @param $longDescription
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;
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
    public function getOpenUrlTemplate()
    {
        return $this->openUrlTemplate;
    }

    /**
     * @param $openUrlTemplate
     */
    public function setOpenUrlTemplate($openUrlTemplate)
    {
        $this->openUrlTemplate = $openUrlTemplate;
    }

    /**
     * @return mixed
     */
    public function getPrimaryFileExtensions()
    {
        return $this->primaryFileExtensions;
    }

    /**
     * @param $primaryFileExtensions
     */
    public function setPrimaryFileExtensions($primaryFileExtensions)
    {
        $this->primaryFileExtensions = $primaryFileExtensions;
    }

    /**
     * @return mixed
     */
    public function getPrimaryMimeTypes()
    {
        return $this->primaryMimeTypes;
    }

    /**
     * @param $primaryMimeTypes
     */
    public function setPrimaryMimeTypes($primaryMimeTypes)
    {
        $this->primaryMimeTypes = $primaryMimeTypes;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductUrl()
    {
        return $this->productUrl;
    }

    /**
     * @param $productUrl
     */
    public function setProductUrl($productUrl)
    {
        $this->productUrl = $productUrl;
    }

    /**
     * @return mixed
     */
    public function getSecondaryFileExtensions()
    {
        return $this->secondaryFileExtensions;
    }

    /**
     * @param $secondaryFileExtensions
     */
    public function setSecondaryFileExtensions($secondaryFileExtensions)
    {
        $this->secondaryFileExtensions = $secondaryFileExtensions;
    }

    /**
     * @return mixed
     */
    public function getSecondaryMimeTypes()
    {
        return $this->secondaryMimeTypes;
    }

    /**
     * @param $secondaryMimeTypes
     */
    public function setSecondaryMimeTypes($secondaryMimeTypes)
    {
        $this->secondaryMimeTypes = $secondaryMimeTypes;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return mixed
     */
    public function getSupportsCreate()
    {
        return $this->supportsCreate;
    }

    /**
     * @param $supportsCreate
     */
    public function setSupportsCreate($supportsCreate)
    {
        $this->supportsCreate = $supportsCreate;
    }

    /**
     * @return mixed
     */
    public function getSupportsImport()
    {
        return $this->supportsImport;
    }

    /**
     * @param $supportsImport
     */
    public function setSupportsImport($supportsImport)
    {
        $this->supportsImport = $supportsImport;
    }

    /**
     * @return mixed
     */
    public function getSupportsMultiOpen()
    {
        return $this->supportsMultiOpen;
    }

    /**
     * @param $supportsMultiOpen
     */
    public function setSupportsMultiOpen($supportsMultiOpen)
    {
        $this->supportsMultiOpen = $supportsMultiOpen;
    }

    /**
     * @return mixed
     */
    public function getSupportsOfflineCreate()
    {
        return $this->supportsOfflineCreate;
    }

    /**
     * @param $supportsOfflineCreate
     */
    public function setSupportsOfflineCreate($supportsOfflineCreate)
    {
        $this->supportsOfflineCreate = $supportsOfflineCreate;
    }

    /**
     * @return mixed
     */
    public function getUseByDefault()
    {
        return $this->useByDefault;
    }

    /**
     * @param $useByDefault
     */
    public function setUseByDefault($useByDefault)
    {
        $this->useByDefault = $useByDefault;
    }
}

/**
 * Class Google_Service_Drive_AppIcons
 */
class Google_Service_Drive_AppIcons extends Google_Model
{
    public $category;
    public $iconUrl;
    public $size;
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
 * Class Google_Service_Drive_AppList
 */
class Google_Service_Drive_AppList extends Google_Collection
{
    public $defaultAppIds;
    public $etag;
    public $kind;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_App';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getDefaultAppIds()
    {
        return $this->defaultAppIds;
    }

    /**
     * @param $defaultAppIds
     */
    public function setDefaultAppIds($defaultAppIds)
    {
        $this->defaultAppIds = $defaultAppIds;
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
 * Class Google_Service_Drive_Change
 */
class Google_Service_Drive_Change extends Google_Model
{
    public $deleted;
    public $fileId;
    public $id;
    public $kind;
    public $modificationDate;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $fileType = 'Google_Service_Drive_DriveFile';
    protected $fileDataType = '';

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @param Google_Service_Drive_DriveFile $file
     */
    public function setFile(Google_Service_Drive_DriveFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param $fileId
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
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
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @param $modificationDate
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
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
 * Class Google_Service_Drive_ChangeList
 */
class Google_Service_Drive_ChangeList extends Google_Collection
{
    public $etag;
    public $kind;
    public $largestChangeId;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_Change';
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
    public function getLargestChangeId()
    {
        return $this->largestChangeId;
    }

    /**
     * @param $largestChangeId
     */
    public function setLargestChangeId($largestChangeId)
    {
        $this->largestChangeId = $largestChangeId;
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
}

/**
 * Class Google_Service_Drive_Channel
 */
class Google_Service_Drive_Channel extends Google_Model
{
    public $address;
    public $expiration;
    public $id;
    public $kind;
    public $params;
    public $payload;
    public $resourceId;
    public $resourceUri;
    public $token;
    public $type;
    protected $internal_gapi_mappings = [];

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
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
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
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $params
     */
    public function setParams($params)
    {
        $this->params = $params;
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
    public function getResourceUri()
    {
        return $this->resourceUri;
    }

    /**
     * @param $resourceUri
     */
    public function setResourceUri($resourceUri)
    {
        $this->resourceUri = $resourceUri;
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
 * Class Google_Service_Drive_ChannelParams
 */
class Google_Service_Drive_ChannelParams extends Google_Model
{
}

/**
 * Class Google_Service_Drive_ChildList
 */
class Google_Service_Drive_ChildList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_ChildReference';
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
}

/**
 * Class Google_Service_Drive_ChildReference
 */
class Google_Service_Drive_ChildReference extends Google_Model
{
    public $childLink;
    public $id;
    public $kind;
    public $selfLink;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChildLink()
    {
        return $this->childLink;
    }

    /**
     * @param $childLink
     */
    public function setChildLink($childLink)
    {
        $this->childLink = $childLink;
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
 * Class Google_Service_Drive_Comment
 */
class Google_Service_Drive_Comment extends Google_Collection
{
    public $anchor;
    public $commentId;
    public $content;
    public $createdDate;
    public $deleted;
    public $fileId;
    public $fileTitle;
    public $htmlContent;
    public $kind;
    public $modifiedDate;
    public $selfLink;
    public $status;
    protected $collection_key = 'replies';
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Drive_User';
    protected $authorDataType = '';
    protected $contextType = 'Google_Service_Drive_CommentContext';
    protected $contextDataType = '';
    protected $repliesType = 'Google_Service_Drive_CommentReply';
    protected $repliesDataType = 'array';

    /**
     * @return mixed
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * @param $anchor
     */
    public function setAnchor($anchor)
    {
        $this->anchor = $anchor;
    }

    /**
     * @param Google_Service_Drive_User $author
     */
    public function setAuthor(Google_Service_Drive_User $author)
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
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * @param $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
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
     * @param Google_Service_Drive_CommentContext $context
     */
    public function setContext(Google_Service_Drive_CommentContext $context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param $fileId
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * @return mixed
     */
    public function getFileTitle()
    {
        return $this->fileTitle;
    }

    /**
     * @param $fileTitle
     */
    public function setFileTitle($fileTitle)
    {
        $this->fileTitle = $fileTitle;
    }

    /**
     * @return mixed
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    /**
     * @param $htmlContent
     */
    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
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
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @param $replies
     */
    public function setReplies($replies)
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
}

/**
 * Class Google_Service_Drive_CommentContext
 */
class Google_Service_Drive_CommentContext extends Google_Model
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
 * Class Google_Service_Drive_CommentList
 */
class Google_Service_Drive_CommentList extends Google_Collection
{
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_Comment';
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
}

/**
 * Class Google_Service_Drive_CommentReply
 */
class Google_Service_Drive_CommentReply extends Google_Model
{
    public $content;
    public $createdDate;
    public $deleted;
    public $htmlContent;
    public $kind;
    public $modifiedDate;
    public $replyId;
    public $verb;
    protected $internal_gapi_mappings = [];
    protected $authorType = 'Google_Service_Drive_User';
    protected $authorDataType = '';

    /**
     * @param Google_Service_Drive_User $author
     */
    public function setAuthor(Google_Service_Drive_User $author)
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
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return mixed
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    /**
     * @param $htmlContent
     */
    public function setHtmlContent($htmlContent)
    {
        $this->htmlContent = $htmlContent;
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
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return mixed
     */
    public function getReplyId()
    {
        return $this->replyId;
    }

    /**
     * @param $replyId
     */
    public function setReplyId($replyId)
    {
        $this->replyId = $replyId;
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
 * Class Google_Service_Drive_CommentReplyList
 */
class Google_Service_Drive_CommentReplyList extends Google_Collection
{
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_CommentReply';
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
}

/**
 * Class Google_Service_Drive_DriveFile
 */
class Google_Service_Drive_DriveFile extends Google_Collection
{
    public $alternateLink;
    public $appDataContents;
    public $copyable;
    public $createdDate;
    public $defaultOpenWithLink;
    public $description;
    public $downloadUrl;
    public $editable;
    public $embedLink;
    public $etag;
    public $explicitlyTrashed;
    public $exportLinks;
    public $fileExtension;
    public $fileSize;
    public $folderColorRgb;
    public $headRevisionId;
    public $iconLink;
    public $id;
    public $kind;
    public $lastModifyingUserName;
    public $lastViewedByMeDate;
    public $markedViewedByMeDate;
    public $md5Checksum;
    public $mimeType;
    public $modifiedByMeDate;
    public $modifiedDate;
    public $openWithLinks;
    public $originalFilename;
    public $ownerNames;
    public $quotaBytesUsed;
    public $selfLink;
    public $shared;
    public $sharedWithMeDate;
    public $thumbnailLink;
    public $title;
    public $version;
    public $webContentLink;
    public $webViewLink;
    public $writersCanShare;
    protected $collection_key = 'properties';
    protected $internal_gapi_mappings = [];
    protected $imageMediaMetadataType = 'Google_Service_Drive_DriveFileImageMediaMetadata';
    protected $imageMediaMetadataDataType = '';
    protected $indexableTextType = 'Google_Service_Drive_DriveFileIndexableText';
    protected $indexableTextDataType = '';
    protected $labelsType = 'Google_Service_Drive_DriveFileLabels';
    protected $labelsDataType = '';
    protected $lastModifyingUserType = 'Google_Service_Drive_User';
    protected $lastModifyingUserDataType = '';
    protected $ownersType = 'Google_Service_Drive_User';
    protected $ownersDataType = 'array';
    protected $parentsType = 'Google_Service_Drive_ParentReference';
    protected $parentsDataType = 'array';
    protected $permissionsType = 'Google_Service_Drive_Permission';
    protected $permissionsDataType = 'array';
    protected $propertiesType = 'Google_Service_Drive_Property';
    protected $propertiesDataType = 'array';
    protected $sharingUserType = 'Google_Service_Drive_User';
    protected $sharingUserDataType = '';
    protected $thumbnailType = 'Google_Service_Drive_DriveFileThumbnail';
    protected $thumbnailDataType = '';
    protected $userPermissionType = 'Google_Service_Drive_Permission';
    protected $userPermissionDataType = '';
    protected $videoMediaMetadataType = 'Google_Service_Drive_DriveFileVideoMediaMetadata';
    protected $videoMediaMetadataDataType = '';

    /**
     * @return mixed
     */
    public function getAlternateLink()
    {
        return $this->alternateLink;
    }

    /**
     * @param $alternateLink
     */
    public function setAlternateLink($alternateLink)
    {
        $this->alternateLink = $alternateLink;
    }

    /**
     * @return mixed
     */
    public function getAppDataContents()
    {
        return $this->appDataContents;
    }

    /**
     * @param $appDataContents
     */
    public function setAppDataContents($appDataContents)
    {
        $this->appDataContents = $appDataContents;
    }

    /**
     * @return mixed
     */
    public function getCopyable()
    {
        return $this->copyable;
    }

    /**
     * @param $copyable
     */
    public function setCopyable($copyable)
    {
        $this->copyable = $copyable;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getDefaultOpenWithLink()
    {
        return $this->defaultOpenWithLink;
    }

    /**
     * @param $defaultOpenWithLink
     */
    public function setDefaultOpenWithLink($defaultOpenWithLink)
    {
        $this->defaultOpenWithLink = $defaultOpenWithLink;
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
    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

    /**
     * @param $downloadUrl
     */
    public function setDownloadUrl($downloadUrl)
    {
        $this->downloadUrl = $downloadUrl;
    }

    /**
     * @return mixed
     */
    public function getEditable()
    {
        return $this->editable;
    }

    /**
     * @param $editable
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;
    }

    /**
     * @return mixed
     */
    public function getEmbedLink()
    {
        return $this->embedLink;
    }

    /**
     * @param $embedLink
     */
    public function setEmbedLink($embedLink)
    {
        $this->embedLink = $embedLink;
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
    public function getExplicitlyTrashed()
    {
        return $this->explicitlyTrashed;
    }

    /**
     * @param $explicitlyTrashed
     */
    public function setExplicitlyTrashed($explicitlyTrashed)
    {
        $this->explicitlyTrashed = $explicitlyTrashed;
    }

    /**
     * @return mixed
     */
    public function getExportLinks()
    {
        return $this->exportLinks;
    }

    /**
     * @param $exportLinks
     */
    public function setExportLinks($exportLinks)
    {
        $this->exportLinks = $exportLinks;
    }

    /**
     * @return mixed
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * @param $fileExtension
     */
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;
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
    public function getFolderColorRgb()
    {
        return $this->folderColorRgb;
    }

    /**
     * @param $folderColorRgb
     */
    public function setFolderColorRgb($folderColorRgb)
    {
        $this->folderColorRgb = $folderColorRgb;
    }

    /**
     * @return mixed
     */
    public function getHeadRevisionId()
    {
        return $this->headRevisionId;
    }

    /**
     * @param $headRevisionId
     */
    public function setHeadRevisionId($headRevisionId)
    {
        $this->headRevisionId = $headRevisionId;
    }

    /**
     * @return mixed
     */
    public function getIconLink()
    {
        return $this->iconLink;
    }

    /**
     * @param $iconLink
     */
    public function setIconLink($iconLink)
    {
        $this->iconLink = $iconLink;
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
     * @param Google_Service_Drive_DriveFileImageMediaMetadata $imageMediaMetadata
     */
    public function setImageMediaMetadata(Google_Service_Drive_DriveFileImageMediaMetadata $imageMediaMetadata)
    {
        $this->imageMediaMetadata = $imageMediaMetadata;
    }

    /**
     * @return mixed
     */
    public function getImageMediaMetadata()
    {
        return $this->imageMediaMetadata;
    }

    /**
     * @param Google_Service_Drive_DriveFileIndexableText $indexableText
     */
    public function setIndexableText(Google_Service_Drive_DriveFileIndexableText $indexableText)
    {
        $this->indexableText = $indexableText;
    }

    /**
     * @return mixed
     */
    public function getIndexableText()
    {
        return $this->indexableText;
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
     * @param Google_Service_Drive_DriveFileLabels $labels
     */
    public function setLabels(Google_Service_Drive_DriveFileLabels $labels)
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

    /**
     * @param Google_Service_Drive_User $lastModifyingUser
     */
    public function setLastModifyingUser(Google_Service_Drive_User $lastModifyingUser)
    {
        $this->lastModifyingUser = $lastModifyingUser;
    }

    /**
     * @return mixed
     */
    public function getLastModifyingUser()
    {
        return $this->lastModifyingUser;
    }

    /**
     * @return mixed
     */
    public function getLastModifyingUserName()
    {
        return $this->lastModifyingUserName;
    }

    /**
     * @param $lastModifyingUserName
     */
    public function setLastModifyingUserName($lastModifyingUserName)
    {
        $this->lastModifyingUserName = $lastModifyingUserName;
    }

    /**
     * @return mixed
     */
    public function getLastViewedByMeDate()
    {
        return $this->lastViewedByMeDate;
    }

    /**
     * @param $lastViewedByMeDate
     */
    public function setLastViewedByMeDate($lastViewedByMeDate)
    {
        $this->lastViewedByMeDate = $lastViewedByMeDate;
    }

    /**
     * @return mixed
     */
    public function getMarkedViewedByMeDate()
    {
        return $this->markedViewedByMeDate;
    }

    /**
     * @param $markedViewedByMeDate
     */
    public function setMarkedViewedByMeDate($markedViewedByMeDate)
    {
        $this->markedViewedByMeDate = $markedViewedByMeDate;
    }

    /**
     * @return mixed
     */
    public function getMd5Checksum()
    {
        return $this->md5Checksum;
    }

    /**
     * @param $md5Checksum
     */
    public function setMd5Checksum($md5Checksum)
    {
        $this->md5Checksum = $md5Checksum;
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
    public function getModifiedByMeDate()
    {
        return $this->modifiedByMeDate;
    }

    /**
     * @param $modifiedByMeDate
     */
    public function setModifiedByMeDate($modifiedByMeDate)
    {
        $this->modifiedByMeDate = $modifiedByMeDate;
    }

    /**
     * @return mixed
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return mixed
     */
    public function getOpenWithLinks()
    {
        return $this->openWithLinks;
    }

    /**
     * @param $openWithLinks
     */
    public function setOpenWithLinks($openWithLinks)
    {
        $this->openWithLinks = $openWithLinks;
    }

    /**
     * @return mixed
     */
    public function getOriginalFilename()
    {
        return $this->originalFilename;
    }

    /**
     * @param $originalFilename
     */
    public function setOriginalFilename($originalFilename)
    {
        $this->originalFilename = $originalFilename;
    }

    /**
     * @return mixed
     */
    public function getOwnerNames()
    {
        return $this->ownerNames;
    }

    /**
     * @param $ownerNames
     */
    public function setOwnerNames($ownerNames)
    {
        $this->ownerNames = $ownerNames;
    }

    /**
     * @param $owners
     */
    public function setOwners($owners)
    {
        $this->owners = $owners;
    }

    /**
     * @return mixed
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @param $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
    }

    /**
     * @return mixed
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param $permissions
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return mixed
     */
    public function getQuotaBytesUsed()
    {
        return $this->quotaBytesUsed;
    }

    /**
     * @param $quotaBytesUsed
     */
    public function setQuotaBytesUsed($quotaBytesUsed)
    {
        $this->quotaBytesUsed = $quotaBytesUsed;
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
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * @param $shared
     */
    public function setShared($shared)
    {
        $this->shared = $shared;
    }

    /**
     * @return mixed
     */
    public function getSharedWithMeDate()
    {
        return $this->sharedWithMeDate;
    }

    /**
     * @param $sharedWithMeDate
     */
    public function setSharedWithMeDate($sharedWithMeDate)
    {
        $this->sharedWithMeDate = $sharedWithMeDate;
    }

    /**
     * @param Google_Service_Drive_User $sharingUser
     */
    public function setSharingUser(Google_Service_Drive_User $sharingUser)
    {
        $this->sharingUser = $sharingUser;
    }

    /**
     * @return mixed
     */
    public function getSharingUser()
    {
        return $this->sharingUser;
    }

    /**
     * @param Google_Service_Drive_DriveFileThumbnail $thumbnail
     */
    public function setThumbnail(Google_Service_Drive_DriveFileThumbnail $thumbnail)
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
    public function getThumbnailLink()
    {
        return $this->thumbnailLink;
    }

    /**
     * @param $thumbnailLink
     */
    public function setThumbnailLink($thumbnailLink)
    {
        $this->thumbnailLink = $thumbnailLink;
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
     * @param Google_Service_Drive_Permission $userPermission
     */
    public function setUserPermission(Google_Service_Drive_Permission $userPermission)
    {
        $this->userPermission = $userPermission;
    }

    /**
     * @return mixed
     */
    public function getUserPermission()
    {
        return $this->userPermission;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @param Google_Service_Drive_DriveFileVideoMediaMetadata $videoMediaMetadata
     */
    public function setVideoMediaMetadata(Google_Service_Drive_DriveFileVideoMediaMetadata $videoMediaMetadata)
    {
        $this->videoMediaMetadata = $videoMediaMetadata;
    }

    /**
     * @return mixed
     */
    public function getVideoMediaMetadata()
    {
        return $this->videoMediaMetadata;
    }

    /**
     * @return mixed
     */
    public function getWebContentLink()
    {
        return $this->webContentLink;
    }

    /**
     * @param $webContentLink
     */
    public function setWebContentLink($webContentLink)
    {
        $this->webContentLink = $webContentLink;
    }

    /**
     * @return mixed
     */
    public function getWebViewLink()
    {
        return $this->webViewLink;
    }

    /**
     * @param $webViewLink
     */
    public function setWebViewLink($webViewLink)
    {
        $this->webViewLink = $webViewLink;
    }

    /**
     * @return mixed
     */
    public function getWritersCanShare()
    {
        return $this->writersCanShare;
    }

    /**
     * @param $writersCanShare
     */
    public function setWritersCanShare($writersCanShare)
    {
        $this->writersCanShare = $writersCanShare;
    }
}

/**
 * Class Google_Service_Drive_DriveFileExportLinks
 */
class Google_Service_Drive_DriveFileExportLinks extends Google_Model
{
}

/**
 * Class Google_Service_Drive_DriveFileImageMediaMetadata
 */
class Google_Service_Drive_DriveFileImageMediaMetadata extends Google_Model
{
    public $aperture;
    public $cameraMake;
    public $cameraModel;
    public $colorSpace;
    public $date;
    public $exposureBias;
    public $exposureMode;
    public $exposureTime;
    public $flashUsed;
    public $focalLength;
    public $height;
    public $isoSpeed;
    public $lens;
    public $maxApertureValue;
    public $meteringMode;
    public $rotation;
    public $sensor;
    public $subjectDistance;
    public $whiteBalance;
    public $width;
    protected $internal_gapi_mappings = [];
    protected $locationType = 'Google_Service_Drive_DriveFileImageMediaMetadataLocation';
    protected $locationDataType = '';

    /**
     * @return mixed
     */
    public function getAperture()
    {
        return $this->aperture;
    }

    /**
     * @param $aperture
     */
    public function setAperture($aperture)
    {
        $this->aperture = $aperture;
    }

    /**
     * @return mixed
     */
    public function getCameraMake()
    {
        return $this->cameraMake;
    }

    /**
     * @param $cameraMake
     */
    public function setCameraMake($cameraMake)
    {
        $this->cameraMake = $cameraMake;
    }

    /**
     * @return mixed
     */
    public function getCameraModel()
    {
        return $this->cameraModel;
    }

    /**
     * @param $cameraModel
     */
    public function setCameraModel($cameraModel)
    {
        $this->cameraModel = $cameraModel;
    }

    /**
     * @return mixed
     */
    public function getColorSpace()
    {
        return $this->colorSpace;
    }

    /**
     * @param $colorSpace
     */
    public function setColorSpace($colorSpace)
    {
        $this->colorSpace = $colorSpace;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getExposureBias()
    {
        return $this->exposureBias;
    }

    /**
     * @param $exposureBias
     */
    public function setExposureBias($exposureBias)
    {
        $this->exposureBias = $exposureBias;
    }

    /**
     * @return mixed
     */
    public function getExposureMode()
    {
        return $this->exposureMode;
    }

    /**
     * @param $exposureMode
     */
    public function setExposureMode($exposureMode)
    {
        $this->exposureMode = $exposureMode;
    }

    /**
     * @return mixed
     */
    public function getExposureTime()
    {
        return $this->exposureTime;
    }

    /**
     * @param $exposureTime
     */
    public function setExposureTime($exposureTime)
    {
        $this->exposureTime = $exposureTime;
    }

    /**
     * @return mixed
     */
    public function getFlashUsed()
    {
        return $this->flashUsed;
    }

    /**
     * @param $flashUsed
     */
    public function setFlashUsed($flashUsed)
    {
        $this->flashUsed = $flashUsed;
    }

    /**
     * @return mixed
     */
    public function getFocalLength()
    {
        return $this->focalLength;
    }

    /**
     * @param $focalLength
     */
    public function setFocalLength($focalLength)
    {
        $this->focalLength = $focalLength;
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
    public function getIsoSpeed()
    {
        return $this->isoSpeed;
    }

    /**
     * @param $isoSpeed
     */
    public function setIsoSpeed($isoSpeed)
    {
        $this->isoSpeed = $isoSpeed;
    }

    /**
     * @return mixed
     */
    public function getLens()
    {
        return $this->lens;
    }

    /**
     * @param $lens
     */
    public function setLens($lens)
    {
        $this->lens = $lens;
    }

    /**
     * @param Google_Service_Drive_DriveFileImageMediaMetadataLocation $location
     */
    public function setLocation(Google_Service_Drive_DriveFileImageMediaMetadataLocation $location)
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
    public function getMaxApertureValue()
    {
        return $this->maxApertureValue;
    }

    /**
     * @param $maxApertureValue
     */
    public function setMaxApertureValue($maxApertureValue)
    {
        $this->maxApertureValue = $maxApertureValue;
    }

    /**
     * @return mixed
     */
    public function getMeteringMode()
    {
        return $this->meteringMode;
    }

    /**
     * @param $meteringMode
     */
    public function setMeteringMode($meteringMode)
    {
        $this->meteringMode = $meteringMode;
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
    public function getSensor()
    {
        return $this->sensor;
    }

    /**
     * @param $sensor
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;
    }

    /**
     * @return mixed
     */
    public function getSubjectDistance()
    {
        return $this->subjectDistance;
    }

    /**
     * @param $subjectDistance
     */
    public function setSubjectDistance($subjectDistance)
    {
        $this->subjectDistance = $subjectDistance;
    }

    /**
     * @return mixed
     */
    public function getWhiteBalance()
    {
        return $this->whiteBalance;
    }

    /**
     * @param $whiteBalance
     */
    public function setWhiteBalance($whiteBalance)
    {
        $this->whiteBalance = $whiteBalance;
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
 * Class Google_Service_Drive_DriveFileImageMediaMetadataLocation
 */
class Google_Service_Drive_DriveFileImageMediaMetadataLocation extends Google_Model
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
 * Class Google_Service_Drive_DriveFileIndexableText
 */
class Google_Service_Drive_DriveFileIndexableText extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_Drive_DriveFileLabels
 */
class Google_Service_Drive_DriveFileLabels extends Google_Model
{
    public $hidden;
    public $restricted;
    public $starred;
    public $trashed;
    public $viewed;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
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
    public function getStarred()
    {
        return $this->starred;
    }

    /**
     * @param $starred
     */
    public function setStarred($starred)
    {
        $this->starred = $starred;
    }

    /**
     * @return mixed
     */
    public function getTrashed()
    {
        return $this->trashed;
    }

    /**
     * @param $trashed
     */
    public function setTrashed($trashed)
    {
        $this->trashed = $trashed;
    }

    /**
     * @return mixed
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * @param $viewed
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
    }
}

/**
 * Class Google_Service_Drive_DriveFileOpenWithLinks
 */
class Google_Service_Drive_DriveFileOpenWithLinks extends Google_Model
{
}

/**
 * Class Google_Service_Drive_DriveFileThumbnail
 */
class Google_Service_Drive_DriveFileThumbnail extends Google_Model
{
    public $image;
    public $mimeType;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_Drive_DriveFileVideoMediaMetadata
 */
class Google_Service_Drive_DriveFileVideoMediaMetadata extends Google_Model
{
    public $durationMillis;
    public $height;
    public $width;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Drive_FileList
 */
class Google_Service_Drive_FileList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextLink;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_DriveFile';
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
}

/**
 * Class Google_Service_Drive_ParentList
 */
class Google_Service_Drive_ParentList extends Google_Collection
{
    public $etag;
    public $kind;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_ParentReference';
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
 * Class Google_Service_Drive_ParentReference
 */
class Google_Service_Drive_ParentReference extends Google_Model
{
    public $id;
    public $isRoot;
    public $kind;
    public $parentLink;
    public $selfLink;
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
    public function getIsRoot()
    {
        return $this->isRoot;
    }

    /**
     * @param $isRoot
     */
    public function setIsRoot($isRoot)
    {
        $this->isRoot = $isRoot;
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
    public function getParentLink()
    {
        return $this->parentLink;
    }

    /**
     * @param $parentLink
     */
    public function setParentLink($parentLink)
    {
        $this->parentLink = $parentLink;
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
 * Class Google_Service_Drive_Permission
 */
class Google_Service_Drive_Permission extends Google_Collection
{
    public $additionalRoles;
    public $authKey;
    public $domain;
    public $emailAddress;
    public $etag;
    public $id;
    public $kind;
    public $name;
    public $photoLink;
    public $role;
    public $selfLink;
    public $type;
    public $value;
    public $withLink;
    protected $collection_key = 'additionalRoles';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdditionalRoles()
    {
        return $this->additionalRoles;
    }

    /**
     * @param $additionalRoles
     */
    public function setAdditionalRoles($additionalRoles)
    {
        $this->additionalRoles = $additionalRoles;
    }

    /**
     * @return mixed
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param $authKey
     */
    public function setAuthKey($authKey)
    {
        $this->authKey = $authKey;
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
    public function getPhotoLink()
    {
        return $this->photoLink;
    }

    /**
     * @param $photoLink
     */
    public function setPhotoLink($photoLink)
    {
        $this->photoLink = $photoLink;
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

    /**
     * @return mixed
     */
    public function getWithLink()
    {
        return $this->withLink;
    }

    /**
     * @param $withLink
     */
    public function setWithLink($withLink)
    {
        $this->withLink = $withLink;
    }
}

/**
 * Class Google_Service_Drive_PermissionId
 */
class Google_Service_Drive_PermissionId extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Drive_PermissionList
 */
class Google_Service_Drive_PermissionList extends Google_Collection
{
    public $etag;
    public $kind;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_Permission';
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
 * Class Google_Service_Drive_Property
 */
class Google_Service_Drive_Property extends Google_Model
{
    public $etag;
    public $key;
    public $kind;
    public $selfLink;
    public $value;
    public $visibility;
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
 * Class Google_Service_Drive_PropertyList
 */
class Google_Service_Drive_PropertyList extends Google_Collection
{
    public $etag;
    public $kind;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_Property';
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
 * Class Google_Service_Drive_Revision
 */
class Google_Service_Drive_Revision extends Google_Model
{
    public $downloadUrl;
    public $etag;
    public $exportLinks;
    public $fileSize;
    public $id;
    public $kind;
    public $lastModifyingUserName;
    public $md5Checksum;
    public $mimeType;
    public $modifiedDate;
    public $originalFilename;
    public $pinned;
    public $publishAuto;
    public $published;
    public $publishedLink;
    public $publishedOutsideDomain;
    public $selfLink;
    protected $internal_gapi_mappings = [];
    protected $lastModifyingUserType = 'Google_Service_Drive_User';
    protected $lastModifyingUserDataType = '';

    /**
     * @return mixed
     */
    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

    /**
     * @param $downloadUrl
     */
    public function setDownloadUrl($downloadUrl)
    {
        $this->downloadUrl = $downloadUrl;
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
    public function getExportLinks()
    {
        return $this->exportLinks;
    }

    /**
     * @param $exportLinks
     */
    public function setExportLinks($exportLinks)
    {
        $this->exportLinks = $exportLinks;
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
     * @param Google_Service_Drive_User $lastModifyingUser
     */
    public function setLastModifyingUser(Google_Service_Drive_User $lastModifyingUser)
    {
        $this->lastModifyingUser = $lastModifyingUser;
    }

    /**
     * @return mixed
     */
    public function getLastModifyingUser()
    {
        return $this->lastModifyingUser;
    }

    /**
     * @return mixed
     */
    public function getLastModifyingUserName()
    {
        return $this->lastModifyingUserName;
    }

    /**
     * @param $lastModifyingUserName
     */
    public function setLastModifyingUserName($lastModifyingUserName)
    {
        $this->lastModifyingUserName = $lastModifyingUserName;
    }

    /**
     * @return mixed
     */
    public function getMd5Checksum()
    {
        return $this->md5Checksum;
    }

    /**
     * @param $md5Checksum
     */
    public function setMd5Checksum($md5Checksum)
    {
        $this->md5Checksum = $md5Checksum;
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
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return mixed
     */
    public function getOriginalFilename()
    {
        return $this->originalFilename;
    }

    /**
     * @param $originalFilename
     */
    public function setOriginalFilename($originalFilename)
    {
        $this->originalFilename = $originalFilename;
    }

    /**
     * @return mixed
     */
    public function getPinned()
    {
        return $this->pinned;
    }

    /**
     * @param $pinned
     */
    public function setPinned($pinned)
    {
        $this->pinned = $pinned;
    }

    /**
     * @return mixed
     */
    public function getPublishAuto()
    {
        return $this->publishAuto;
    }

    /**
     * @param $publishAuto
     */
    public function setPublishAuto($publishAuto)
    {
        $this->publishAuto = $publishAuto;
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
    public function getPublishedLink()
    {
        return $this->publishedLink;
    }

    /**
     * @param $publishedLink
     */
    public function setPublishedLink($publishedLink)
    {
        $this->publishedLink = $publishedLink;
    }

    /**
     * @return mixed
     */
    public function getPublishedOutsideDomain()
    {
        return $this->publishedOutsideDomain;
    }

    /**
     * @param $publishedOutsideDomain
     */
    public function setPublishedOutsideDomain($publishedOutsideDomain)
    {
        $this->publishedOutsideDomain = $publishedOutsideDomain;
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
 * Class Google_Service_Drive_RevisionExportLinks
 */
class Google_Service_Drive_RevisionExportLinks extends Google_Model
{
}

/**
 * Class Google_Service_Drive_RevisionList
 */
class Google_Service_Drive_RevisionList extends Google_Collection
{
    public $etag;
    public $kind;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Drive_Revision';
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
 * Class Google_Service_Drive_User
 */
class Google_Service_Drive_User extends Google_Model
{
    public $displayName;
    public $emailAddress;
    public $isAuthenticatedUser;
    public $kind;
    public $permissionId;
    protected $internal_gapi_mappings = [];
    protected $pictureType = 'Google_Service_Drive_UserPicture';
    protected $pictureDataType = '';

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
    public function getIsAuthenticatedUser()
    {
        return $this->isAuthenticatedUser;
    }

    /**
     * @param $isAuthenticatedUser
     */
    public function setIsAuthenticatedUser($isAuthenticatedUser)
    {
        $this->isAuthenticatedUser = $isAuthenticatedUser;
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
    public function getPermissionId()
    {
        return $this->permissionId;
    }

    /**
     * @param $permissionId
     */
    public function setPermissionId($permissionId)
    {
        $this->permissionId = $permissionId;
    }

    /**
     * @param Google_Service_Drive_UserPicture $picture
     */
    public function setPicture(Google_Service_Drive_UserPicture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }
}

/**
 * Class Google_Service_Drive_UserPicture
 */
class Google_Service_Drive_UserPicture extends Google_Model
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
