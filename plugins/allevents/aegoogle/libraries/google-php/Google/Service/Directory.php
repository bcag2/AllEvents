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
 * Service definition for Directory (directory_v1).
 *
 * <p>
 * The Admin SDK Directory API lets you view and manage enterprise resources
 * such as users and groups, administrative notifications, security features,
 * and more.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/directory/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Directory extends Google_Service
{
    /** View and manage your Chrome OS devices' metadata. */
    const ADMIN_DIRECTORY_DEVICE_CHROMEOS =
        "https://www.googleapis.com/auth/admin.directory.device.chromeos";
    /** View your Chrome OS devices' metadata. */
    const ADMIN_DIRECTORY_DEVICE_CHROMEOS_READONLY =
        "https://www.googleapis.com/auth/admin.directory.device.chromeos.readonly";
    /** View and manage your mobile devices' metadata. */
    const ADMIN_DIRECTORY_DEVICE_MOBILE =
        "https://www.googleapis.com/auth/admin.directory.device.mobile";
    /** Manage your mobile devices by performing administrative tasks. */
    const ADMIN_DIRECTORY_DEVICE_MOBILE_ACTION =
        "https://www.googleapis.com/auth/admin.directory.device.mobile.action";
    /** View your mobile devices' metadata. */
    const ADMIN_DIRECTORY_DEVICE_MOBILE_READONLY =
        "https://www.googleapis.com/auth/admin.directory.device.mobile.readonly";
    /** View and manage the provisioning of groups on your domain. */
    const ADMIN_DIRECTORY_GROUP =
        "https://www.googleapis.com/auth/admin.directory.group";
    /** View and manage group subscriptions on your domain. */
    const ADMIN_DIRECTORY_GROUP_MEMBER =
        "https://www.googleapis.com/auth/admin.directory.group.member";
    /** View group subscriptions on your domain. */
    const ADMIN_DIRECTORY_GROUP_MEMBER_READONLY =
        "https://www.googleapis.com/auth/admin.directory.group.member.readonly";
    /** View groups on your domain. */
    const ADMIN_DIRECTORY_GROUP_READONLY =
        "https://www.googleapis.com/auth/admin.directory.group.readonly";
    /** View and manage notifications received on your domain. */
    const ADMIN_DIRECTORY_NOTIFICATIONS =
        "https://www.googleapis.com/auth/admin.directory.notifications";
    /** View and manage organization units on your domain. */
    const ADMIN_DIRECTORY_ORGUNIT =
        "https://www.googleapis.com/auth/admin.directory.orgunit";
    /** View organization units on your domain. */
    const ADMIN_DIRECTORY_ORGUNIT_READONLY =
        "https://www.googleapis.com/auth/admin.directory.orgunit.readonly";
    /** View and manage the provisioning of users on your domain. */
    const ADMIN_DIRECTORY_USER =
        "https://www.googleapis.com/auth/admin.directory.user";
    /** View and manage user aliases on your domain. */
    const ADMIN_DIRECTORY_USER_ALIAS =
        "https://www.googleapis.com/auth/admin.directory.user.alias";
    /** View user aliases on your domain. */
    const ADMIN_DIRECTORY_USER_ALIAS_READONLY =
        "https://www.googleapis.com/auth/admin.directory.user.alias.readonly";
    /** View users on your domain. */
    const ADMIN_DIRECTORY_USER_READONLY =
        "https://www.googleapis.com/auth/admin.directory.user.readonly";
    /** Manage data access permissions for users on your domain. */
    const ADMIN_DIRECTORY_USER_SECURITY =
        "https://www.googleapis.com/auth/admin.directory.user.security";
    /** View and manage the provisioning of user schemas on your domain. */
    const ADMIN_DIRECTORY_USERSCHEMA =
        "https://www.googleapis.com/auth/admin.directory.userschema";
    /** View user schemas on your domain. */
    const ADMIN_DIRECTORY_USERSCHEMA_READONLY =
        "https://www.googleapis.com/auth/admin.directory.userschema.readonly";

    public $asps;
    public $channels;
    public $chromeosdevices;
    public $groups;
    public $groups_aliases;
    public $members;
    public $mobiledevices;
    public $notifications;
    public $orgunits;
    public $schemas;
    public $tokens;
    public $users;
    public $users_aliases;
    public $users_photos;
    public $verificationCodes;


    /**
     * Constructs the internal representation of the Directory service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'admin/directory/v1/';
        $this->version = 'directory_v1';
        $this->serviceName = 'admin';

        $this->asps = new Google_Service_Directory_Asps_Resource(
            $this,
            $this->serviceName,
            'asps',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/{userKey}/asps/{codeId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'codeId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/{userKey}/asps/{codeId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'codeId' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userKey}/asps',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->channels = new Google_Service_Directory_Channels_Resource(
            $this,
            $this->serviceName,
            'channels',
            [
                'methods' => [
                    'stop' => [
                        'path' => '/admin/directory_v1/channels/stop',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->chromeosdevices = new Google_Service_Directory_Chromeosdevices_Resource(
            $this,
            $this->serviceName,
            'chromeosdevices',
            [
                'methods' => [
                    'get' => [
                        'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deviceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'customer/{customerId}/devices/chromeos',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
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
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deviceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'customer/{customerId}/devices/chromeos/{deviceId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'deviceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
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
        $this->groups = new Google_Service_Directory_Groups_Resource(
            $this,
            $this->serviceName,
            'groups',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'groups/{groupKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'groups/{groupKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'groups',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'groups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'domain' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'userKey' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'groups/{groupKey}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'groups/{groupKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->groups_aliases = new Google_Service_Directory_GroupsAliases_Resource(
            $this,
            $this->serviceName,
            'aliases',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'groups/{groupKey}/aliases/{alias}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'alias' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'groups/{groupKey}/aliases',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'groups/{groupKey}/aliases',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->members = new Google_Service_Directory_Members_Resource(
            $this,
            $this->serviceName,
            'members',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'groups/{groupKey}/members/{memberKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'memberKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'groups/{groupKey}/members/{memberKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'memberKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'groups/{groupKey}/members',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'groups/{groupKey}/members',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'roles' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'groups/{groupKey}/members/{memberKey}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'memberKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'groups/{groupKey}/members/{memberKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'groupKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'memberKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->mobiledevices = new Google_Service_Directory_Mobiledevices_Resource(
            $this,
            $this->serviceName,
            'mobiledevices',
            [
                'methods' => [
                    'action' => [
                        'path' => 'customer/{customerId}/devices/mobile/{resourceId}/action',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'resourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'customer/{customerId}/devices/mobile/{resourceId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'resourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'customer/{customerId}/devices/mobile/{resourceId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'resourceId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'customer/{customerId}/devices/mobile',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderBy' => [
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
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->notifications = new Google_Service_Directory_Notifications_Resource(
            $this,
            $this->serviceName,
            'notifications',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'customer/{customer}/notifications/{notificationId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'customer' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'notificationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'customer/{customer}/notifications/{notificationId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customer' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'notificationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'customer/{customer}/notifications',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customer' => [
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
                    ], 'patch' => [
                        'path' => 'customer/{customer}/notifications/{notificationId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'customer' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'notificationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'customer/{customer}/notifications/{notificationId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'customer' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'notificationId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->orgunits = new Google_Service_Directory_Orgunits_Resource(
            $this,
            $this->serviceName,
            'orgunits',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orgUnitPath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orgUnitPath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'customer/{customerId}/orgunits',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'customer/{customerId}/orgunits',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'orgUnitPath' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orgUnitPath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'customer/{customerId}/orgunits{/orgUnitPath*}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orgUnitPath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->schemas = new Google_Service_Directory_Schemas_Resource(
            $this,
            $this->serviceName,
            'schemas',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'customer/{customerId}/schemas/{schemaKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'schemaKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'customer/{customerId}/schemas/{schemaKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'schemaKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'customer/{customerId}/schemas',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'customer/{customerId}/schemas',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'customer/{customerId}/schemas/{schemaKey}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'schemaKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'customer/{customerId}/schemas/{schemaKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'customerId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'schemaKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tokens = new Google_Service_Directory_Tokens_Resource(
            $this,
            $this->serviceName,
            'tokens',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/{userKey}/tokens/{clientId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'clientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/{userKey}/tokens/{clientId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'clientId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userKey}/tokens',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users = new Google_Service_Directory_Users_Resource(
            $this,
            $this->serviceName,
            'users',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/{userKey}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/{userKey}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'viewType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customFieldMask' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'users',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'users',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'customer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'domain' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customFieldMask' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'viewType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'event' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'makeAdmin' => [
                        'path' => 'users/{userKey}/makeAdmin',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'users/{userKey}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'undelete' => [
                        'path' => 'users/{userKey}/undelete',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'users/{userKey}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'users/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'customer' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'orderBy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'domain' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'customFieldMask' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'viewType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'event' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_aliases = new Google_Service_Directory_UsersAliases_Resource(
            $this,
            $this->serviceName,
            'aliases',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/{userKey}/aliases/{alias}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'alias' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'users/{userKey}/aliases',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userKey}/aliases',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'event' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'watch' => [
                        'path' => 'users/{userKey}/aliases/watch',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'event' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->users_photos = new Google_Service_Directory_UsersPhotos_Resource(
            $this,
            $this->serviceName,
            'photos',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/{userKey}/photos/thumbnail',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/{userKey}/photos/thumbnail',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'users/{userKey}/photos/thumbnail',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'users/{userKey}/photos/thumbnail',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->verificationCodes = new Google_Service_Directory_VerificationCodes_Resource(
            $this,
            $this->serviceName,
            'verificationCodes',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'users/{userKey}/verificationCodes/generate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'invalidate' => [
                        'path' => 'users/{userKey}/verificationCodes/invalidate',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'userKey' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'users/{userKey}/verificationCodes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'userKey' => [
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
 * The "asps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $asps = $adminService->asps;
 *  </code>
 */
class Google_Service_Directory_Asps_Resource extends Google_Service_Resource
{

    /**
     * Delete an ASP issued by a user. (asps.delete)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param int $codeId The unique ID of the ASP to be deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userKey, $codeId, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'codeId' => $codeId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Get information about an ASP issued by a user. (asps.get)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param int $codeId The unique ID of the ASP.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userKey, $codeId, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'codeId' => $codeId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Asp");
    }

    /**
     * List the ASPs issued by a user. (asps.listAsps)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listAsps($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Asps");
    }
}

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $channels = $adminService->channels;
 *  </code>
 */
class Google_Service_Directory_Channels_Resource extends Google_Service_Resource
{

    /**
     * Stop watching resources through this channel (channels.stop)
     *
     * @param Google_Channel|Google_Service_Directory_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function stop(Google_Service_Directory_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('stop', [$params]);
    }
}

/**
 * The "chromeosdevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $chromeosdevices = $adminService->chromeosdevices;
 *  </code>
 */
class Google_Service_Directory_Chromeosdevices_Resource extends Google_Service_Resource
{

    /**
     * Retrieve Chrome OS Device (chromeosdevices.get)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $deviceId Immutable id of Chrome OS Device
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     */
    public function get($customerId, $deviceId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'deviceId' => $deviceId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_ChromeOsDevice");
    }

    /**
     * Retrieve all Chrome OS Devices of a customer (paginated)
     * (chromeosdevices.listChromeosdevices)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Column to use for sorting results
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     * @opt_param int maxResults Maximum number of results to return. Default is 100
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string sortOrder Whether to return results in ascending or
     * descending order. Only of use when orderBy is also used
     * @opt_param string query Search string in the format given at
     * http://support.google.com/chromeos/a/bin/answer.py?hl=en=1698333
     */
    public function listChromeosdevices($customerId, $optParams = [])
    {
        $params = ['customerId' => $customerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_ChromeOsDevices");
    }

    /**
     * Update Chrome OS Device. This method supports patch semantics.
     * (chromeosdevices.patch)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $deviceId Immutable id of Chrome OS Device
     * @param Google_ChromeOsDevice|Google_Service_Directory_ChromeOsDevice $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     */
    public function patch($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_ChromeOsDevice");
    }

    /**
     * Update Chrome OS Device (chromeosdevices.update)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $deviceId Immutable id of Chrome OS Device
     * @param Google_ChromeOsDevice|Google_Service_Directory_ChromeOsDevice $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     */
    public function update($customerId, $deviceId, Google_Service_Directory_ChromeOsDevice $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'deviceId' => $deviceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_ChromeOsDevice");
    }
}

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $groups = $adminService->groups;
 *  </code>
 */
class Google_Service_Directory_Groups_Resource extends Google_Service_Resource
{

    /**
     * Delete Group (groups.delete)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($groupKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve Group (groups.get)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($groupKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Group");
    }

    /**
     * Create Group (groups.insert)
     *
     * @param Google_Group|Google_Service_Directory_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Directory_Group $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_Group");
    }

    /**
     * Retrieve all groups in a domain (paginated) (groups.listGroups)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customer Immutable id of the Google Apps account. In case
     * of multi-domain, to fetch all groups for a customer, fill this field instead
     * of domain.
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string domain Name of the domain. Fill this field to get groups
     * from only this domain. To return all groups in a multi-domain fill customer
     * field instead.
     * @opt_param int maxResults Maximum number of results to return. Default is 200
     * @opt_param string userKey Email or immutable Id of the user if only those
     * groups are to be listed, the given user is a member of. If Id, it should
     * match with id of user object
     */
    public function listGroups($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Groups");
    }

    /**
     * Update Group. This method supports patch semantics. (groups.patch)
     *
     * @param string $groupKey Email or immutable Id of the group. If Id, it should
     *                                                               match with id of group object
     * @param Google_Group|Google_Service_Directory_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($groupKey, Google_Service_Directory_Group $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_Group");
    }

    /**
     * Update Group (groups.update)
     *
     * @param string $groupKey Email or immutable Id of the group. If Id, it should
     *                                                               match with id of group object
     * @param Google_Group|Google_Service_Directory_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($groupKey, Google_Service_Directory_Group $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_Group");
    }
}

/**
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $aliases = $adminService->aliases;
 *  </code>
 */
class Google_Service_Directory_GroupsAliases_Resource extends Google_Service_Resource
{

    /**
     * Remove a alias for the group (aliases.delete)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param string $alias The alias to be removed
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($groupKey, $alias, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'alias' => $alias];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Add a alias for the group (aliases.insert)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param Google_Alias|Google_Service_Directory_Alias $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($groupKey, Google_Service_Directory_Alias $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_Alias");
    }

    /**
     * List all aliases for a group (aliases.listGroupsAliases)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listGroupsAliases($groupKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Aliases");
    }
}

/**
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $members = $adminService->members;
 *  </code>
 */
class Google_Service_Directory_Members_Resource extends Google_Service_Resource
{

    /**
     * Remove membership. (members.delete)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param string $memberKey Email or immutable Id of the member
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($groupKey, $memberKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'memberKey' => $memberKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve Group Member (members.get)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param string $memberKey Email or immutable Id of the member
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($groupKey, $memberKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'memberKey' => $memberKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Member");
    }

    /**
     * Add user to the specified group. (members.insert)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param Google_Member|Google_Service_Directory_Member $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($groupKey, Google_Service_Directory_Member $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_Member");
    }

    /**
     * Retrieve all members in a group (paginated) (members.listMembers)
     *
     * @param string $groupKey Email or immutable Id of the group
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string roles Comma separated role values to filter list results
     * on.
     * @opt_param int maxResults Maximum number of results to return. Default is 200
     */
    public function listMembers($groupKey, $optParams = [])
    {
        $params = ['groupKey' => $groupKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Members");
    }

    /**
     * Update membership of a user in the specified group. This method supports
     * patch semantics. (members.patch)
     *
     * @param string $groupKey Email or immutable Id of the group. If Id, it should
     *                                                                 match with id of group object
     * @param string $memberKey Email or immutable Id of the user. If Id, it should
     *                                                                 match with id of member object
     * @param Google_Member|Google_Service_Directory_Member $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_Member");
    }

    /**
     * Update membership of a user in the specified group. (members.update)
     *
     * @param string $groupKey Email or immutable Id of the group. If Id, it should
     *                                                                 match with id of group object
     * @param string $memberKey Email or immutable Id of the user. If Id, it should
     *                                                                 match with id of member object
     * @param Google_Member|Google_Service_Directory_Member $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = [])
    {
        $params = ['groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_Member");
    }
}

/**
 * The "mobiledevices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $mobiledevices = $adminService->mobiledevices;
 *  </code>
 */
class Google_Service_Directory_Mobiledevices_Resource extends Google_Service_Resource
{

    /**
     * Take action on Mobile Device (mobiledevices.action)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $resourceId Immutable id of Mobile Device
     * @param Google_MobileDeviceAction|Google_Service_Directory_MobileDeviceAction $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function action($customerId, $resourceId, Google_Service_Directory_MobileDeviceAction $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'resourceId' => $resourceId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('action', [$params]);
    }

    /**
     * Delete Mobile Device (mobiledevices.delete)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $resourceId Immutable id of Mobile Device
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($customerId, $resourceId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'resourceId' => $resourceId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve Mobile Device (mobiledevices.get)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $resourceId Immutable id of Mobile Device
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     */
    public function get($customerId, $resourceId, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'resourceId' => $resourceId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_MobileDevice");
    }

    /**
     * Retrieve all Mobile Devices of a customer (paginated)
     * (mobiledevices.listMobiledevices)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string orderBy Column to use for sorting results
     * @opt_param string projection Restrict information returned to a set of
     * selected fields.
     * @opt_param int maxResults Maximum number of results to return. Default is 100
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string sortOrder Whether to return results in ascending or
     * descending order. Only of use when orderBy is also used
     * @opt_param string query Search string in the format given at
     * http://support.google.com/a/bin/answer.py?hl=en=1408863#search
     */
    public function listMobiledevices($customerId, $optParams = [])
    {
        $params = ['customerId' => $customerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_MobileDevices");
    }
}

/**
 * The "notifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $notifications = $adminService->notifications;
 *  </code>
 */
class Google_Service_Directory_Notifications_Resource extends Google_Service_Resource
{

    /**
     * Deletes a notification (notifications.delete)
     *
     * @param string $customer The unique ID for the customer's Google account. The
     *                               customerId is also returned as part of the Users resource.
     * @param string $notificationId The unique ID of the notification.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($customer, $notificationId, $optParams = [])
    {
        $params = ['customer' => $customer, 'notificationId' => $notificationId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a notification. (notifications.get)
     *
     * @param string $customer The unique ID for the customer's Google account. The
     *                               customerId is also returned as part of the Users resource.
     * @param string $notificationId The unique ID of the notification.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($customer, $notificationId, $optParams = [])
    {
        $params = ['customer' => $customer, 'notificationId' => $notificationId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Notification");
    }

    /**
     * Retrieves a list of notifications. (notifications.listNotifications)
     *
     * @param string $customer The unique ID for the customer's Google account.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The token to specify the page of results to
     * retrieve.
     * @opt_param string maxResults Maximum number of notifications to return per
     * page. The default is 100.
     * @opt_param string language The ISO 639-1 code of the language notifications
     * are returned in. The default is English (en).
     */
    public function listNotifications($customer, $optParams = [])
    {
        $params = ['customer' => $customer];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Notifications");
    }

    /**
     * Updates a notification. This method supports patch semantics.
     * (notifications.patch)
     *
     * @param string $customer The unique ID for the customer's Google account.
     * @param string $notificationId The unique ID of the notification.
     * @param Google_Notification|Google_Service_Directory_Notification $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = [])
    {
        $params = ['customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_Notification");
    }

    /**
     * Updates a notification. (notifications.update)
     *
     * @param string $customer The unique ID for the customer's Google account.
     * @param string $notificationId The unique ID of the notification.
     * @param Google_Notification|Google_Service_Directory_Notification $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($customer, $notificationId, Google_Service_Directory_Notification $postBody, $optParams = [])
    {
        $params = ['customer' => $customer, 'notificationId' => $notificationId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_Notification");
    }
}

/**
 * The "orgunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $orgunits = $adminService->orgunits;
 *  </code>
 */
class Google_Service_Directory_Orgunits_Resource extends Google_Service_Resource
{

    /**
     * Remove Organization Unit (orgunits.delete)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $orgUnitPath Full path of the organization unit or its Id
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($customerId, $orgUnitPath, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'orgUnitPath' => $orgUnitPath];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve Organization Unit (orgunits.get)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $orgUnitPath Full path of the organization unit or its Id
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($customerId, $orgUnitPath, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'orgUnitPath' => $orgUnitPath];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_OrgUnit");
    }

    /**
     * Add Organization Unit (orgunits.insert)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param Google_OrgUnit|Google_Service_Directory_OrgUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($customerId, Google_Service_Directory_OrgUnit $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_OrgUnit");
    }

    /**
     * Retrieve all Organization Units (orgunits.listOrgunits)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string type Whether to return all sub-organizations or just
     * immediate children
     * @opt_param string orgUnitPath the URL-encoded organization unit's path or its
     * Id
     */
    public function listOrgunits($customerId, $optParams = [])
    {
        $params = ['customerId' => $customerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_OrgUnits");
    }

    /**
     * Update Organization Unit. This method supports patch semantics.
     * (orgunits.patch)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $orgUnitPath Full path of the organization unit or its Id
     * @param Google_OrgUnit|Google_Service_Directory_OrgUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_OrgUnit");
    }

    /**
     * Update Organization Unit (orgunits.update)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $orgUnitPath Full path of the organization unit or its Id
     * @param Google_OrgUnit|Google_Service_Directory_OrgUnit $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_OrgUnit");
    }
}

/**
 * The "schemas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $schemas = $adminService->schemas;
 *  </code>
 */
class Google_Service_Directory_Schemas_Resource extends Google_Service_Resource
{

    /**
     * Delete schema (schemas.delete)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $schemaKey Name or immutable Id of the schema
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($customerId, $schemaKey, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve schema (schemas.get)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $schemaKey Name or immutable Id of the schema
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($customerId, $schemaKey, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Schema");
    }

    /**
     * Create schema. (schemas.insert)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param Google_Schema|Google_Service_Directory_Schema $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($customerId, Google_Service_Directory_Schema $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_Schema");
    }

    /**
     * Retrieve all schemas for a customer (schemas.listSchemas)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listSchemas($customerId, $optParams = [])
    {
        $params = ['customerId' => $customerId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Schemas");
    }

    /**
     * Update schema. This method supports patch semantics. (schemas.patch)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $schemaKey Name or immutable Id of the schema.
     * @param Google_Schema|Google_Service_Directory_Schema $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($customerId, $schemaKey, Google_Service_Directory_Schema $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_Schema");
    }

    /**
     * Update schema (schemas.update)
     *
     * @param string $customerId Immutable id of the Google Apps account
     * @param string $schemaKey Name or immutable Id of the schema.
     * @param Google_Schema|Google_Service_Directory_Schema $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($customerId, $schemaKey, Google_Service_Directory_Schema $postBody, $optParams = [])
    {
        $params = ['customerId' => $customerId, 'schemaKey' => $schemaKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_Schema");
    }
}

/**
 * The "tokens" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $tokens = $adminService->tokens;
 *  </code>
 */
class Google_Service_Directory_Tokens_Resource extends Google_Service_Resource
{

    /**
     * Delete all access tokens issued by a user for an application. (tokens.delete)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param string $clientId The Client ID of the application the token is issued
     *                          to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userKey, $clientId, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'clientId' => $clientId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Get information about an access token issued by a user. (tokens.get)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param string $clientId The Client ID of the application the token is issued
     *                          to.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userKey, $clientId, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'clientId' => $clientId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_Token");
    }

    /**
     * Returns the set of tokens specified user has issued to 3rd party
     * applications. (tokens.listTokens)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listTokens($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Tokens");
    }
}

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $users = $adminService->users;
 *  </code>
 */
class Google_Service_Directory_Users_Resource extends Google_Service_Resource
{

    /**
     * Delete user (users.delete)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * retrieve user (users.get)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
     * view of the user.
     * @opt_param string customFieldMask Comma-separated list of schema names. All
     * fields from these schemas are fetched. This should only be set when
     * projection=custom.
     * @opt_param string projection What subset of fields to fetch for this user.
     */
    public function get($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_User");
    }

    /**
     * create user. (users.insert)
     *
     * @param Google_Service_Directory_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Directory_User $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_User");
    }

    /**
     * Retrieve either deleted users or all users in a domain (paginated)
     * (users.listUsers)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customer Immutable id of the Google Apps account. In case
     * of multi-domain, to fetch all users for a customer, fill this field instead
     * of domain.
     * @opt_param string orderBy Column to use for sorting results
     * @opt_param string domain Name of the domain. Fill this field to get users
     * from only this domain. To return all users in a multi-domain fill customer
     * field instead.
     * @opt_param string projection What subset of fields to fetch for this user.
     * @opt_param string showDeleted If set to true retrieves the list of deleted
     * users. Default is false
     * @opt_param string customFieldMask Comma-separated list of schema names. All
     * fields from these schemas are fetched. This should only be set when
     * projection=custom.
     * @opt_param int maxResults Maximum number of results to return. Default is
     * 100. Max allowed is 500
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string sortOrder Whether to return results in ascending or
     * descending order.
     * @opt_param string query Query string search. Should be of the form "".
     * Complete documentation is at https://developers.google.com/admin-
     * sdk/directory/v1/guides/search-users
     * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
     * view of the user.
     * @opt_param string event Event on which subscription is intended (if
     * subscribing)
     */
    public function listUsers($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Users");
    }

    /**
     * change admin status of a user (users.makeAdmin)
     *
     * @param string $userKey Email or immutable Id of the user as admin
     * @param Google_Service_Directory_UserMakeAdmin|Google_UserMakeAdmin $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function makeAdmin($userKey, Google_Service_Directory_UserMakeAdmin $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('makeAdmin', [$params]);
    }

    /**
     * update user. This method supports patch semantics. (users.patch)
     *
     * @param string $userKey Email or immutable Id of the user. If Id, it should
     *                                                             match with id of user object
     * @param Google_Service_Directory_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($userKey, Google_Service_Directory_User $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_User");
    }

    /**
     * Undelete a deleted user (users.undelete)
     *
     * @param string $userKey The immutable id of the user
     * @param Google_Service_Directory_UserUndelete|Google_UserUndelete $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function undelete($userKey, Google_Service_Directory_UserUndelete $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('undelete', [$params]);
    }

    /**
     * update user (users.update)
     *
     * @param string $userKey Email or immutable Id of the user. If Id, it should
     *                                                             match with id of user object
     * @param Google_Service_Directory_User|Google_User $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($userKey, Google_Service_Directory_User $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_User");
    }

    /**
     * Watch for changes in users list (users.watch)
     *
     * @param Google_Channel|Google_Service_Directory_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string customer Immutable id of the Google Apps account. In case
     * of multi-domain, to fetch all users for a customer, fill this field instead
     * of domain.
     * @opt_param string orderBy Column to use for sorting results
     * @opt_param string domain Name of the domain. Fill this field to get users
     * from only this domain. To return all users in a multi-domain fill customer
     * field instead.
     * @opt_param string projection What subset of fields to fetch for this user.
     * @opt_param string showDeleted If set to true retrieves the list of deleted
     * users. Default is false
     * @opt_param string customFieldMask Comma-separated list of schema names. All
     * fields from these schemas are fetched. This should only be set when
     * projection=custom.
     * @opt_param int maxResults Maximum number of results to return. Default is
     * 100. Max allowed is 500
     * @opt_param string pageToken Token to specify next page in the list
     * @opt_param string sortOrder Whether to return results in ascending or
     * descending order.
     * @opt_param string query Query string search. Should be of the form "".
     * Complete documentation is at https://developers.google.com/admin-
     * sdk/directory/v1/guides/search-users
     * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
     * view of the user.
     * @opt_param string event Event on which subscription is intended (if
     * subscribing)
     */
    public function watch(Google_Service_Directory_Channel $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Directory_Channel");
    }
}

/**
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $aliases = $adminService->aliases;
 *  </code>
 */
class Google_Service_Directory_UsersAliases_Resource extends Google_Service_Resource
{

    /**
     * Remove a alias for the user (aliases.delete)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param string $alias The alias to be removed
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userKey, $alias, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'alias' => $alias];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Add a alias for the user (aliases.insert)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param Google_Alias|Google_Service_Directory_Alias $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($userKey, Google_Service_Directory_Alias $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Directory_Alias");
    }

    /**
     * List all aliases for a user (aliases.listUsersAliases)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string event Event on which subscription is intended (if
     * subscribing)
     */
    public function listUsersAliases($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_Aliases");
    }

    /**
     * Watch for changes in user aliases list (aliases.watch)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param Google_Channel|Google_Service_Directory_Channel $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string event Event on which subscription is intended (if
     * subscribing)
     */
    public function watch($userKey, Google_Service_Directory_Channel $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('watch', [$params], "Google_Service_Directory_Channel");
    }
}

/**
 * The "photos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $photos = $adminService->photos;
 *  </code>
 */
class Google_Service_Directory_UsersPhotos_Resource extends Google_Service_Resource
{

    /**
     * Remove photos for the user (photos.delete)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieve photo of a user (photos.get)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Directory_UserPhoto");
    }

    /**
     * Add a photo for the user. This method supports patch semantics.
     * (photos.patch)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param Google_Service_Directory_UserPhoto|Google_UserPhoto $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Directory_UserPhoto");
    }

    /**
     * Add a photo for the user (photos.update)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param Google_Service_Directory_UserPhoto|Google_UserPhoto $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($userKey, Google_Service_Directory_UserPhoto $postBody, $optParams = [])
    {
        $params = ['userKey' => $userKey, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Directory_UserPhoto");
    }
}

/**
 * The "verificationCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $verificationCodes = $adminService->verificationCodes;
 *  </code>
 */
class Google_Service_Directory_VerificationCodes_Resource extends Google_Service_Resource
{

    /**
     * Generate new backup verification codes for the user.
     * (verificationCodes.generate)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function generate($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params]);
    }

    /**
     * Invalidate the current backup verification codes for the user.
     * (verificationCodes.invalidate)
     *
     * @param string $userKey Email or immutable Id of the user
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function invalidate($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('invalidate', [$params]);
    }

    /**
     * Returns the current set of valid backup verification codes for the specified
     * user. (verificationCodes.listVerificationCodes)
     *
     * @param string $userKey Identifies the user in the API request. The value can
     *                          be the user's primary email address, alias email address, or unique user ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listVerificationCodes($userKey, $optParams = [])
    {
        $params = ['userKey' => $userKey];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Directory_VerificationCodes");
    }
}


/**
 * Class Google_Service_Directory_Alias
 */
class Google_Service_Directory_Alias extends Google_Model
{
    public $alias;
    public $etag;
    public $id;
    public $kind;
    public $primaryEmail;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
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
    public function getPrimaryEmail()
    {
        return $this->primaryEmail;
    }

    /**
     * @param $primaryEmail
     */
    public function setPrimaryEmail($primaryEmail)
    {
        $this->primaryEmail = $primaryEmail;
    }
}

/**
 * Class Google_Service_Directory_Aliases
 */
class Google_Service_Directory_Aliases extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'aliases';
    protected $internal_gapi_mappings = [];
    protected $aliasesType = 'Google_Service_Directory_Alias';
    protected $aliasesDataType = 'array';

    /**
     * @param $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
    }

    /**
     * @return mixed
     */
    public function getAliases()
    {
        return $this->aliases;
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
 * Class Google_Service_Directory_Asp
 */
class Google_Service_Directory_Asp extends Google_Model
{
    public $codeId;
    public $creationTime;
    public $etag;
    public $kind;
    public $lastTimeUsed;
    public $name;
    public $userKey;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCodeId()
    {
        return $this->codeId;
    }

    /**
     * @param $codeId
     */
    public function setCodeId($codeId)
    {
        $this->codeId = $codeId;
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
    public function getLastTimeUsed()
    {
        return $this->lastTimeUsed;
    }

    /**
     * @param $lastTimeUsed
     */
    public function setLastTimeUsed($lastTimeUsed)
    {
        $this->lastTimeUsed = $lastTimeUsed;
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
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param $userKey
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    }
}

/**
 * Class Google_Service_Directory_Asps
 */
class Google_Service_Directory_Asps extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Directory_Asp';
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
}

/**
 * Class Google_Service_Directory_Channel
 */
class Google_Service_Directory_Channel extends Google_Model
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
 * Class Google_Service_Directory_ChannelParams
 */
class Google_Service_Directory_ChannelParams extends Google_Model
{
}

/**
 * Class Google_Service_Directory_ChromeOsDevice
 */
class Google_Service_Directory_ChromeOsDevice extends Google_Collection
{
    public $annotatedAssetId;
    public $annotatedLocation;
    public $annotatedUser;
    public $bootMode;
    public $deviceId;
    public $etag;
    public $ethernetMacAddress;
    public $firmwareVersion;
    public $kind;
    public $lastEnrollmentTime;
    public $lastSync;
    public $macAddress;
    public $meid;
    public $model;
    public $notes;
    public $orderNumber;
    public $orgUnitPath;
    public $osVersion;
    public $platformVersion;
    public $serialNumber;
    public $status;
    public $supportEndDate;
    public $willAutoRenew;
    protected $collection_key = 'recentUsers';
    protected $internal_gapi_mappings = [];
    protected $activeTimeRangesType = 'Google_Service_Directory_ChromeOsDeviceActiveTimeRanges';
    protected $activeTimeRangesDataType = 'array';
    protected $recentUsersType = 'Google_Service_Directory_ChromeOsDeviceRecentUsers';
    protected $recentUsersDataType = 'array';

    /**
     * @param $activeTimeRanges
     */
    public function setActiveTimeRanges($activeTimeRanges)
    {
        $this->activeTimeRanges = $activeTimeRanges;
    }

    /**
     * @return mixed
     */
    public function getActiveTimeRanges()
    {
        return $this->activeTimeRanges;
    }

    /**
     * @return mixed
     */
    public function getAnnotatedAssetId()
    {
        return $this->annotatedAssetId;
    }

    /**
     * @param $annotatedAssetId
     */
    public function setAnnotatedAssetId($annotatedAssetId)
    {
        $this->annotatedAssetId = $annotatedAssetId;
    }

    /**
     * @return mixed
     */
    public function getAnnotatedLocation()
    {
        return $this->annotatedLocation;
    }

    /**
     * @param $annotatedLocation
     */
    public function setAnnotatedLocation($annotatedLocation)
    {
        $this->annotatedLocation = $annotatedLocation;
    }

    /**
     * @return mixed
     */
    public function getAnnotatedUser()
    {
        return $this->annotatedUser;
    }

    /**
     * @param $annotatedUser
     */
    public function setAnnotatedUser($annotatedUser)
    {
        $this->annotatedUser = $annotatedUser;
    }

    /**
     * @return mixed
     */
    public function getBootMode()
    {
        return $this->bootMode;
    }

    /**
     * @param $bootMode
     */
    public function setBootMode($bootMode)
    {
        $this->bootMode = $bootMode;
    }

    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
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
    public function getEthernetMacAddress()
    {
        return $this->ethernetMacAddress;
    }

    /**
     * @param $ethernetMacAddress
     */
    public function setEthernetMacAddress($ethernetMacAddress)
    {
        $this->ethernetMacAddress = $ethernetMacAddress;
    }

    /**
     * @return mixed
     */
    public function getFirmwareVersion()
    {
        return $this->firmwareVersion;
    }

    /**
     * @param $firmwareVersion
     */
    public function setFirmwareVersion($firmwareVersion)
    {
        $this->firmwareVersion = $firmwareVersion;
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
    public function getLastEnrollmentTime()
    {
        return $this->lastEnrollmentTime;
    }

    /**
     * @param $lastEnrollmentTime
     */
    public function setLastEnrollmentTime($lastEnrollmentTime)
    {
        $this->lastEnrollmentTime = $lastEnrollmentTime;
    }

    /**
     * @return mixed
     */
    public function getLastSync()
    {
        return $this->lastSync;
    }

    /**
     * @param $lastSync
     */
    public function setLastSync($lastSync)
    {
        $this->lastSync = $lastSync;
    }

    /**
     * @return mixed
     */
    public function getMacAddress()
    {
        return $this->macAddress;
    }

    /**
     * @param $macAddress
     */
    public function setMacAddress($macAddress)
    {
        $this->macAddress = $macAddress;
    }

    /**
     * @return mixed
     */
    public function getMeid()
    {
        return $this->meid;
    }

    /**
     * @param $meid
     */
    public function setMeid($meid)
    {
        $this->meid = $meid;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return mixed
     */
    public function getOrgUnitPath()
    {
        return $this->orgUnitPath;
    }

    /**
     * @param $orgUnitPath
     */
    public function setOrgUnitPath($orgUnitPath)
    {
        $this->orgUnitPath = $orgUnitPath;
    }

    /**
     * @return mixed
     */
    public function getOsVersion()
    {
        return $this->osVersion;
    }

    /**
     * @param $osVersion
     */
    public function setOsVersion($osVersion)
    {
        $this->osVersion = $osVersion;
    }

    /**
     * @return mixed
     */
    public function getPlatformVersion()
    {
        return $this->platformVersion;
    }

    /**
     * @param $platformVersion
     */
    public function setPlatformVersion($platformVersion)
    {
        $this->platformVersion = $platformVersion;
    }

    /**
     * @param $recentUsers
     */
    public function setRecentUsers($recentUsers)
    {
        $this->recentUsers = $recentUsers;
    }

    /**
     * @return mixed
     */
    public function getRecentUsers()
    {
        return $this->recentUsers;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
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
    public function getSupportEndDate()
    {
        return $this->supportEndDate;
    }

    /**
     * @param $supportEndDate
     */
    public function setSupportEndDate($supportEndDate)
    {
        $this->supportEndDate = $supportEndDate;
    }

    /**
     * @return mixed
     */
    public function getWillAutoRenew()
    {
        return $this->willAutoRenew;
    }

    /**
     * @param $willAutoRenew
     */
    public function setWillAutoRenew($willAutoRenew)
    {
        $this->willAutoRenew = $willAutoRenew;
    }
}

/**
 * Class Google_Service_Directory_ChromeOsDeviceActiveTimeRanges
 */
class Google_Service_Directory_ChromeOsDeviceActiveTimeRanges extends Google_Model
{
    public $activeTime;
    public $date;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActiveTime()
    {
        return $this->activeTime;
    }

    /**
     * @param $activeTime
     */
    public function setActiveTime($activeTime)
    {
        $this->activeTime = $activeTime;
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
}

/**
 * Class Google_Service_Directory_ChromeOsDeviceRecentUsers
 */
class Google_Service_Directory_ChromeOsDeviceRecentUsers extends Google_Model
{
    public $email;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
 * Class Google_Service_Directory_ChromeOsDevices
 */
class Google_Service_Directory_ChromeOsDevices extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'chromeosdevices';
    protected $internal_gapi_mappings = [];
    protected $chromeosdevicesType = 'Google_Service_Directory_ChromeOsDevice';
    protected $chromeosdevicesDataType = 'array';

    /**
     * @param $chromeosdevices
     */
    public function setChromeosdevices($chromeosdevices)
    {
        $this->chromeosdevices = $chromeosdevices;
    }

    /**
     * @return mixed
     */
    public function getChromeosdevices()
    {
        return $this->chromeosdevices;
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
 * Class Google_Service_Directory_Group
 */
class Google_Service_Directory_Group extends Google_Collection
{
    public $adminCreated;
    public $aliases;
    public $description;
    public $directMembersCount;
    public $email;
    public $etag;
    public $id;
    public $kind;
    public $name;
    public $nonEditableAliases;
    protected $collection_key = 'nonEditableAliases';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdminCreated()
    {
        return $this->adminCreated;
    }

    /**
     * @param $adminCreated
     */
    public function setAdminCreated($adminCreated)
    {
        $this->adminCreated = $adminCreated;
    }

    /**
     * @return mixed
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @param $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
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
    public function getDirectMembersCount()
    {
        return $this->directMembersCount;
    }

    /**
     * @param $directMembersCount
     */
    public function setDirectMembersCount($directMembersCount)
    {
        $this->directMembersCount = $directMembersCount;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getNonEditableAliases()
    {
        return $this->nonEditableAliases;
    }

    /**
     * @param $nonEditableAliases
     */
    public function setNonEditableAliases($nonEditableAliases)
    {
        $this->nonEditableAliases = $nonEditableAliases;
    }
}

/**
 * Class Google_Service_Directory_Groups
 */
class Google_Service_Directory_Groups extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'groups';
    protected $internal_gapi_mappings = [];
    protected $groupsType = 'Google_Service_Directory_Group';
    protected $groupsDataType = 'array';

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
     * @param $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
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
 * Class Google_Service_Directory_Member
 */
class Google_Service_Directory_Member extends Google_Model
{
    public $email;
    public $etag;
    public $id;
    public $kind;
    public $role;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
 * Class Google_Service_Directory_Members
 */
class Google_Service_Directory_Members extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'members';
    protected $internal_gapi_mappings = [];
    protected $membersType = 'Google_Service_Directory_Member';
    protected $membersDataType = 'array';

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
     * @param $members
     */
    public function setMembers($members)
    {
        $this->members = $members;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
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
 * Class Google_Service_Directory_MobileDevice
 */
class Google_Service_Directory_MobileDevice extends Google_Collection
{
    public $basebandVersion;
    public $buildNumber;
    public $defaultLanguage;
    public $deviceCompromisedStatus;
    public $deviceId;
    public $email;
    public $etag;
    public $firstSync;
    public $hardwareId;
    public $imei;
    public $kernelVersion;
    public $kind;
    public $lastSync;
    public $managedAccountIsOnOwnerProfile;
    public $meid;
    public $model;
    public $name;
    public $networkOperator;
    public $os;
    public $resourceId;
    public $serialNumber;
    public $status;
    public $type;
    public $userAgent;
    public $wifiMacAddress;
    protected $collection_key = 'name';
    protected $internal_gapi_mappings = [];
    protected $applicationsType = 'Google_Service_Directory_MobileDeviceApplications';
    protected $applicationsDataType = 'array';

    /**
     * @param $applications
     */
    public function setApplications($applications)
    {
        $this->applications = $applications;
    }

    /**
     * @return mixed
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * @return mixed
     */
    public function getBasebandVersion()
    {
        return $this->basebandVersion;
    }

    /**
     * @param $basebandVersion
     */
    public function setBasebandVersion($basebandVersion)
    {
        $this->basebandVersion = $basebandVersion;
    }

    /**
     * @return mixed
     */
    public function getBuildNumber()
    {
        return $this->buildNumber;
    }

    /**
     * @param $buildNumber
     */
    public function setBuildNumber($buildNumber)
    {
        $this->buildNumber = $buildNumber;
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
    public function getDeviceCompromisedStatus()
    {
        return $this->deviceCompromisedStatus;
    }

    /**
     * @param $deviceCompromisedStatus
     */
    public function setDeviceCompromisedStatus($deviceCompromisedStatus)
    {
        $this->deviceCompromisedStatus = $deviceCompromisedStatus;
    }

    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getFirstSync()
    {
        return $this->firstSync;
    }

    /**
     * @param $firstSync
     */
    public function setFirstSync($firstSync)
    {
        $this->firstSync = $firstSync;
    }

    /**
     * @return mixed
     */
    public function getHardwareId()
    {
        return $this->hardwareId;
    }

    /**
     * @param $hardwareId
     */
    public function setHardwareId($hardwareId)
    {
        $this->hardwareId = $hardwareId;
    }

    /**
     * @return mixed
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * @param $imei
     */
    public function setImei($imei)
    {
        $this->imei = $imei;
    }

    /**
     * @return mixed
     */
    public function getKernelVersion()
    {
        return $this->kernelVersion;
    }

    /**
     * @param $kernelVersion
     */
    public function setKernelVersion($kernelVersion)
    {
        $this->kernelVersion = $kernelVersion;
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
    public function getLastSync()
    {
        return $this->lastSync;
    }

    /**
     * @param $lastSync
     */
    public function setLastSync($lastSync)
    {
        $this->lastSync = $lastSync;
    }

    /**
     * @return mixed
     */
    public function getManagedAccountIsOnOwnerProfile()
    {
        return $this->managedAccountIsOnOwnerProfile;
    }

    /**
     * @param $managedAccountIsOnOwnerProfile
     */
    public function setManagedAccountIsOnOwnerProfile($managedAccountIsOnOwnerProfile)
    {
        $this->managedAccountIsOnOwnerProfile = $managedAccountIsOnOwnerProfile;
    }

    /**
     * @return mixed
     */
    public function getMeid()
    {
        return $this->meid;
    }

    /**
     * @param $meid
     */
    public function setMeid($meid)
    {
        $this->meid = $meid;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
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
    public function getNetworkOperator()
    {
        return $this->networkOperator;
    }

    /**
     * @param $networkOperator
     */
    public function setNetworkOperator($networkOperator)
    {
        $this->networkOperator = $networkOperator;
    }

    /**
     * @return mixed
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param $os
     */
    public function setOs($os)
    {
        $this->os = $os;
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
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
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
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return mixed
     */
    public function getWifiMacAddress()
    {
        return $this->wifiMacAddress;
    }

    /**
     * @param $wifiMacAddress
     */
    public function setWifiMacAddress($wifiMacAddress)
    {
        $this->wifiMacAddress = $wifiMacAddress;
    }
}

/**
 * Class Google_Service_Directory_MobileDeviceAction
 */
class Google_Service_Directory_MobileDeviceAction extends Google_Model
{
    public $action;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
}

/**
 * Class Google_Service_Directory_MobileDeviceApplications
 */
class Google_Service_Directory_MobileDeviceApplications extends Google_Collection
{
    public $displayName;
    public $packageName;
    public $permission;
    public $versionCode;
    public $versionName;
    protected $collection_key = 'permission';
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
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }

    /**
     * @return mixed
     */
    public function getVersionCode()
    {
        return $this->versionCode;
    }

    /**
     * @param $versionCode
     */
    public function setVersionCode($versionCode)
    {
        $this->versionCode = $versionCode;
    }

    /**
     * @return mixed
     */
    public function getVersionName()
    {
        return $this->versionName;
    }

    /**
     * @param $versionName
     */
    public function setVersionName($versionName)
    {
        $this->versionName = $versionName;
    }
}

/**
 * Class Google_Service_Directory_MobileDevices
 */
class Google_Service_Directory_MobileDevices extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'mobiledevices';
    protected $internal_gapi_mappings = [];
    protected $mobiledevicesType = 'Google_Service_Directory_MobileDevice';
    protected $mobiledevicesDataType = 'array';

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
     * @param $mobiledevices
     */
    public function setMobiledevices($mobiledevices)
    {
        $this->mobiledevices = $mobiledevices;
    }

    /**
     * @return mixed
     */
    public function getMobiledevices()
    {
        return $this->mobiledevices;
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
 * Class Google_Service_Directory_Notification
 */
class Google_Service_Directory_Notification extends Google_Model
{
    public $body;
    public $etag;
    public $fromAddress;
    public $isUnread;
    public $kind;
    public $notificationId;
    public $sendTime;
    public $subject;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $body
     */
    public function setBody($body)
    {
        $this->body = $body;
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
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @param $fromAddress
     */
    public function setFromAddress($fromAddress)
    {
        $this->fromAddress = $fromAddress;
    }

    /**
     * @return mixed
     */
    public function getIsUnread()
    {
        return $this->isUnread;
    }

    /**
     * @param $isUnread
     */
    public function setIsUnread($isUnread)
    {
        $this->isUnread = $isUnread;
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
    public function getNotificationId()
    {
        return $this->notificationId;
    }

    /**
     * @param $notificationId
     */
    public function setNotificationId($notificationId)
    {
        $this->notificationId = $notificationId;
    }

    /**
     * @return mixed
     */
    public function getSendTime()
    {
        return $this->sendTime;
    }

    /**
     * @param $sendTime
     */
    public function setSendTime($sendTime)
    {
        $this->sendTime = $sendTime;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}

/**
 * Class Google_Service_Directory_Notifications
 */
class Google_Service_Directory_Notifications extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $unreadNotificationsCount;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Directory_Notification';
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
    public function getUnreadNotificationsCount()
    {
        return $this->unreadNotificationsCount;
    }

    /**
     * @param $unreadNotificationsCount
     */
    public function setUnreadNotificationsCount($unreadNotificationsCount)
    {
        $this->unreadNotificationsCount = $unreadNotificationsCount;
    }
}

/**
 * Class Google_Service_Directory_OrgUnit
 */
class Google_Service_Directory_OrgUnit extends Google_Model
{
    public $blockInheritance;
    public $description;
    public $etag;
    public $kind;
    public $name;
    public $orgUnitId;
    public $orgUnitPath;
    public $parentOrgUnitId;
    public $parentOrgUnitPath;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBlockInheritance()
    {
        return $this->blockInheritance;
    }

    /**
     * @param $blockInheritance
     */
    public function setBlockInheritance($blockInheritance)
    {
        $this->blockInheritance = $blockInheritance;
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
    public function getOrgUnitId()
    {
        return $this->orgUnitId;
    }

    /**
     * @param $orgUnitId
     */
    public function setOrgUnitId($orgUnitId)
    {
        $this->orgUnitId = $orgUnitId;
    }

    /**
     * @return mixed
     */
    public function getOrgUnitPath()
    {
        return $this->orgUnitPath;
    }

    /**
     * @param $orgUnitPath
     */
    public function setOrgUnitPath($orgUnitPath)
    {
        $this->orgUnitPath = $orgUnitPath;
    }

    /**
     * @return mixed
     */
    public function getParentOrgUnitId()
    {
        return $this->parentOrgUnitId;
    }

    /**
     * @param $parentOrgUnitId
     */
    public function setParentOrgUnitId($parentOrgUnitId)
    {
        $this->parentOrgUnitId = $parentOrgUnitId;
    }

    /**
     * @return mixed
     */
    public function getParentOrgUnitPath()
    {
        return $this->parentOrgUnitPath;
    }

    /**
     * @param $parentOrgUnitPath
     */
    public function setParentOrgUnitPath($parentOrgUnitPath)
    {
        $this->parentOrgUnitPath = $parentOrgUnitPath;
    }
}

/**
 * Class Google_Service_Directory_OrgUnits
 */
class Google_Service_Directory_OrgUnits extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'organizationUnits';
    protected $internal_gapi_mappings = [];
    protected $organizationUnitsType = 'Google_Service_Directory_OrgUnit';
    protected $organizationUnitsDataType = 'array';

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
     * @param $organizationUnits
     */
    public function setOrganizationUnits($organizationUnits)
    {
        $this->organizationUnits = $organizationUnits;
    }

    /**
     * @return mixed
     */
    public function getOrganizationUnits()
    {
        return $this->organizationUnits;
    }
}

/**
 * Class Google_Service_Directory_Schema
 */
class Google_Service_Directory_Schema extends Google_Collection
{
    public $etag;
    public $kind;
    public $schemaId;
    public $schemaName;
    protected $collection_key = 'fields';
    protected $internal_gapi_mappings = [];
    protected $fieldsType = 'Google_Service_Directory_SchemaFieldSpec';
    protected $fieldsDataType = 'array';

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
     * @param $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
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
    public function getSchemaId()
    {
        return $this->schemaId;
    }

    /**
     * @param $schemaId
     */
    public function setSchemaId($schemaId)
    {
        $this->schemaId = $schemaId;
    }

    /**
     * @return mixed
     */
    public function getSchemaName()
    {
        return $this->schemaName;
    }

    /**
     * @param $schemaName
     */
    public function setSchemaName($schemaName)
    {
        $this->schemaName = $schemaName;
    }
}

/**
 * Class Google_Service_Directory_SchemaFieldSpec
 */
class Google_Service_Directory_SchemaFieldSpec extends Google_Model
{
    public $etag;
    public $fieldId;
    public $fieldName;
    public $fieldType;
    public $indexed;
    public $kind;
    public $multiValued;
    public $readAccessType;
    protected $internal_gapi_mappings = [];
    protected $numericIndexingSpecType = 'Google_Service_Directory_SchemaFieldSpecNumericIndexingSpec';
    protected $numericIndexingSpecDataType = '';

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
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * @param $fieldId
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;
    }

    /**
     * @return mixed
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param $fieldName
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
    }

    /**
     * @return mixed
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * @param $fieldType
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * @return mixed
     */
    public function getIndexed()
    {
        return $this->indexed;
    }

    /**
     * @param $indexed
     */
    public function setIndexed($indexed)
    {
        $this->indexed = $indexed;
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
    public function getMultiValued()
    {
        return $this->multiValued;
    }

    /**
     * @param $multiValued
     */
    public function setMultiValued($multiValued)
    {
        $this->multiValued = $multiValued;
    }

    /**
     * @param Google_Service_Directory_SchemaFieldSpecNumericIndexingSpec $numericIndexingSpec
     */
    public function setNumericIndexingSpec(Google_Service_Directory_SchemaFieldSpecNumericIndexingSpec $numericIndexingSpec)
    {
        $this->numericIndexingSpec = $numericIndexingSpec;
    }

    /**
     * @return mixed
     */
    public function getNumericIndexingSpec()
    {
        return $this->numericIndexingSpec;
    }

    /**
     * @return mixed
     */
    public function getReadAccessType()
    {
        return $this->readAccessType;
    }

    /**
     * @param $readAccessType
     */
    public function setReadAccessType($readAccessType)
    {
        $this->readAccessType = $readAccessType;
    }
}

/**
 * Class Google_Service_Directory_SchemaFieldSpecNumericIndexingSpec
 */
class Google_Service_Directory_SchemaFieldSpecNumericIndexingSpec extends Google_Model
{
    public $maxValue;
    public $minValue;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param $maxValue
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return mixed
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }
}

/**
 * Class Google_Service_Directory_Schemas
 */
class Google_Service_Directory_Schemas extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'schemas';
    protected $internal_gapi_mappings = [];
    protected $schemasType = 'Google_Service_Directory_Schema';
    protected $schemasDataType = 'array';

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
     * @param $schemas
     */
    public function setSchemas($schemas)
    {
        $this->schemas = $schemas;
    }

    /**
     * @return mixed
     */
    public function getSchemas()
    {
        return $this->schemas;
    }
}

/**
 * Class Google_Service_Directory_Token
 */
class Google_Service_Directory_Token extends Google_Collection
{
    public $anonymous;
    public $clientId;
    public $displayText;
    public $etag;
    public $kind;
    public $nativeApp;
    public $scopes;
    public $userKey;
    protected $collection_key = 'scopes';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAnonymous()
    {
        return $this->anonymous;
    }

    /**
     * @param $anonymous
     */
    public function setAnonymous($anonymous)
    {
        $this->anonymous = $anonymous;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getDisplayText()
    {
        return $this->displayText;
    }

    /**
     * @param $displayText
     */
    public function setDisplayText($displayText)
    {
        $this->displayText = $displayText;
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
    public function getNativeApp()
    {
        return $this->nativeApp;
    }

    /**
     * @param $nativeApp
     */
    public function setNativeApp($nativeApp)
    {
        $this->nativeApp = $nativeApp;
    }

    /**
     * @return mixed
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param $scopes
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * @return mixed
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param $userKey
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    }
}

/**
 * Class Google_Service_Directory_Tokens
 */
class Google_Service_Directory_Tokens extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Directory_Token';
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
}

/**
 * Class Google_Service_Directory_User
 */
class Google_Service_Directory_User extends Google_Collection
{
    public $addresses;
    public $agreedToTerms;
    public $aliases;
    public $changePasswordAtNextLogin;
    public $creationTime;
    public $customSchemas;
    public $customerId;
    public $deletionTime;
    public $emails;
    public $etag;
    public $externalIds;
    public $hashFunction;
    public $id;
    public $ims;
    public $includeInGlobalAddressList;
    public $ipWhitelisted;
    public $isAdmin;
    public $isDelegatedAdmin;
    public $isMailboxSetup;
    public $kind;
    public $lastLoginTime;
    public $nonEditableAliases;
    public $notes;
    public $orgUnitPath;
    public $organizations;
    public $password;
    public $phones;
    public $primaryEmail;
    public $relations;
    public $suspended;
    public $suspensionReason;
    public $thumbnailPhotoUrl;
    public $websites;
    protected $collection_key = 'nonEditableAliases';
    protected $internal_gapi_mappings = [];
    protected $nameType = 'Google_Service_Directory_UserName';
    protected $nameDataType = '';

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return mixed
     */
    public function getAgreedToTerms()
    {
        return $this->agreedToTerms;
    }

    /**
     * @param $agreedToTerms
     */
    public function setAgreedToTerms($agreedToTerms)
    {
        $this->agreedToTerms = $agreedToTerms;
    }

    /**
     * @return mixed
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @param $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
    }

    /**
     * @return mixed
     */
    public function getChangePasswordAtNextLogin()
    {
        return $this->changePasswordAtNextLogin;
    }

    /**
     * @param $changePasswordAtNextLogin
     */
    public function setChangePasswordAtNextLogin($changePasswordAtNextLogin)
    {
        $this->changePasswordAtNextLogin = $changePasswordAtNextLogin;
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
    public function getCustomSchemas()
    {
        return $this->customSchemas;
    }

    /**
     * @param $customSchemas
     */
    public function setCustomSchemas($customSchemas)
    {
        $this->customSchemas = $customSchemas;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getDeletionTime()
    {
        return $this->deletionTime;
    }

    /**
     * @param $deletionTime
     */
    public function setDeletionTime($deletionTime)
    {
        $this->deletionTime = $deletionTime;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
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
    public function getExternalIds()
    {
        return $this->externalIds;
    }

    /**
     * @param $externalIds
     */
    public function setExternalIds($externalIds)
    {
        $this->externalIds = $externalIds;
    }

    /**
     * @return mixed
     */
    public function getHashFunction()
    {
        return $this->hashFunction;
    }

    /**
     * @param $hashFunction
     */
    public function setHashFunction($hashFunction)
    {
        $this->hashFunction = $hashFunction;
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
    public function getIms()
    {
        return $this->ims;
    }

    /**
     * @param $ims
     */
    public function setIms($ims)
    {
        $this->ims = $ims;
    }

    /**
     * @return mixed
     */
    public function getIncludeInGlobalAddressList()
    {
        return $this->includeInGlobalAddressList;
    }

    /**
     * @param $includeInGlobalAddressList
     */
    public function setIncludeInGlobalAddressList($includeInGlobalAddressList)
    {
        $this->includeInGlobalAddressList = $includeInGlobalAddressList;
    }

    /**
     * @return mixed
     */
    public function getIpWhitelisted()
    {
        return $this->ipWhitelisted;
    }

    /**
     * @param $ipWhitelisted
     */
    public function setIpWhitelisted($ipWhitelisted)
    {
        $this->ipWhitelisted = $ipWhitelisted;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getIsDelegatedAdmin()
    {
        return $this->isDelegatedAdmin;
    }

    /**
     * @param $isDelegatedAdmin
     */
    public function setIsDelegatedAdmin($isDelegatedAdmin)
    {
        $this->isDelegatedAdmin = $isDelegatedAdmin;
    }

    /**
     * @return mixed
     */
    public function getIsMailboxSetup()
    {
        return $this->isMailboxSetup;
    }

    /**
     * @param $isMailboxSetup
     */
    public function setIsMailboxSetup($isMailboxSetup)
    {
        $this->isMailboxSetup = $isMailboxSetup;
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
    public function getLastLoginTime()
    {
        return $this->lastLoginTime;
    }

    /**
     * @param $lastLoginTime
     */
    public function setLastLoginTime($lastLoginTime)
    {
        $this->lastLoginTime = $lastLoginTime;
    }

    /**
     * @param Google_Service_Directory_UserName $name
     */
    public function setName(Google_Service_Directory_UserName $name)
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
    public function getNonEditableAliases()
    {
        return $this->nonEditableAliases;
    }

    /**
     * @param $nonEditableAliases
     */
    public function setNonEditableAliases($nonEditableAliases)
    {
        $this->nonEditableAliases = $nonEditableAliases;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getOrgUnitPath()
    {
        return $this->orgUnitPath;
    }

    /**
     * @param $orgUnitPath
     */
    public function setOrgUnitPath($orgUnitPath)
    {
        $this->orgUnitPath = $orgUnitPath;
    }

    /**
     * @return mixed
     */
    public function getOrganizations()
    {
        return $this->organizations;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return mixed
     */
    public function getPrimaryEmail()
    {
        return $this->primaryEmail;
    }

    /**
     * @param $primaryEmail
     */
    public function setPrimaryEmail($primaryEmail)
    {
        $this->primaryEmail = $primaryEmail;
    }

    /**
     * @return mixed
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @param $relations
     */
    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    /**
     * @return mixed
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param $suspended
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
    }

    /**
     * @return mixed
     */
    public function getSuspensionReason()
    {
        return $this->suspensionReason;
    }

    /**
     * @param $suspensionReason
     */
    public function setSuspensionReason($suspensionReason)
    {
        $this->suspensionReason = $suspensionReason;
    }

    /**
     * @return mixed
     */
    public function getThumbnailPhotoUrl()
    {
        return $this->thumbnailPhotoUrl;
    }

    /**
     * @param $thumbnailPhotoUrl
     */
    public function setThumbnailPhotoUrl($thumbnailPhotoUrl)
    {
        $this->thumbnailPhotoUrl = $thumbnailPhotoUrl;
    }

    /**
     * @return mixed
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * @param $websites
     */
    public function setWebsites($websites)
    {
        $this->websites = $websites;
    }
}

/**
 * Class Google_Service_Directory_UserAbout
 */
class Google_Service_Directory_UserAbout extends Google_Model
{
    public $contentType;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
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
 * Class Google_Service_Directory_UserAddress
 */
class Google_Service_Directory_UserAddress extends Google_Model
{
    public $country;
    public $countryCode;
    public $customType;
    public $extendedAddress;
    public $formatted;
    public $locality;
    public $poBox;
    public $postalCode;
    public $primary;
    public $region;
    public $sourceIsStructured;
    public $streetAddress;
    public $type;
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
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
    }

    /**
     * @return mixed
     */
    public function getExtendedAddress()
    {
        return $this->extendedAddress;
    }

    /**
     * @param $extendedAddress
     */
    public function setExtendedAddress($extendedAddress)
    {
        $this->extendedAddress = $extendedAddress;
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
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return mixed
     */
    public function getPoBox()
    {
        return $this->poBox;
    }

    /**
     * @param $poBox
     */
    public function setPoBox($poBox)
    {
        $this->poBox = $poBox;
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
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getSourceIsStructured()
    {
        return $this->sourceIsStructured;
    }

    /**
     * @param $sourceIsStructured
     */
    public function setSourceIsStructured($sourceIsStructured)
    {
        $this->sourceIsStructured = $sourceIsStructured;
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
 * Class Google_Service_Directory_UserCustomProperties
 */
class Google_Service_Directory_UserCustomProperties extends Google_Model
{
}

/**
 * Class Google_Service_Directory_UserCustomSchemas
 */
class Google_Service_Directory_UserCustomSchemas extends Google_Model
{
}

/**
 * Class Google_Service_Directory_UserEmail
 */
class Google_Service_Directory_UserEmail extends Google_Model
{
    public $address;
    public $customType;
    public $primary;
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
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
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
 * Class Google_Service_Directory_UserExternalId
 */
class Google_Service_Directory_UserExternalId extends Google_Model
{
    public $customType;
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
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
 * Class Google_Service_Directory_UserIm
 */
class Google_Service_Directory_UserIm extends Google_Model
{
    public $customProtocol;
    public $customType;
    public $im;
    public $primary;
    public $protocol;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomProtocol()
    {
        return $this->customProtocol;
    }

    /**
     * @param $customProtocol
     */
    public function setCustomProtocol($customProtocol)
    {
        $this->customProtocol = $customProtocol;
    }

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
    }

    /**
     * @return mixed
     */
    public function getIm()
    {
        return $this->im;
    }

    /**
     * @param $im
     */
    public function setIm($im)
    {
        $this->im = $im;
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
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
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
 * Class Google_Service_Directory_UserMakeAdmin
 */
class Google_Service_Directory_UserMakeAdmin extends Google_Model
{
    public $status;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Directory_UserName
 */
class Google_Service_Directory_UserName extends Google_Model
{
    public $familyName;
    public $fullName;
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
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
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
 * Class Google_Service_Directory_UserOrganization
 */
class Google_Service_Directory_UserOrganization extends Google_Model
{
    public $costCenter;
    public $customType;
    public $department;
    public $description;
    public $domain;
    public $location;
    public $name;
    public $primary;
    public $symbol;
    public $title;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCostCenter()
    {
        return $this->costCenter;
    }

    /**
     * @param $costCenter
     */
    public function setCostCenter($costCenter)
    {
        $this->costCenter = $costCenter;
    }

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
    }

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
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
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
 * Class Google_Service_Directory_UserPhone
 */
class Google_Service_Directory_UserPhone extends Google_Model
{
    public $customType;
    public $primary;
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
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
 * Class Google_Service_Directory_UserPhoto
 */
class Google_Service_Directory_UserPhoto extends Google_Model
{
    public $etag;
    public $height;
    public $id;
    public $kind;
    public $mimeType;
    public $photoData;
    public $primaryEmail;
    public $width;
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
    public function getPhotoData()
    {
        return $this->photoData;
    }

    /**
     * @param $photoData
     */
    public function setPhotoData($photoData)
    {
        $this->photoData = $photoData;
    }

    /**
     * @return mixed
     */
    public function getPrimaryEmail()
    {
        return $this->primaryEmail;
    }

    /**
     * @param $primaryEmail
     */
    public function setPrimaryEmail($primaryEmail)
    {
        $this->primaryEmail = $primaryEmail;
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
 * Class Google_Service_Directory_UserRelation
 */
class Google_Service_Directory_UserRelation extends Google_Model
{
    public $customType;
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
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
 * Class Google_Service_Directory_UserUndelete
 */
class Google_Service_Directory_UserUndelete extends Google_Model
{
    public $orgUnitPath;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getOrgUnitPath()
    {
        return $this->orgUnitPath;
    }

    /**
     * @param $orgUnitPath
     */
    public function setOrgUnitPath($orgUnitPath)
    {
        $this->orgUnitPath = $orgUnitPath;
    }
}

/**
 * Class Google_Service_Directory_UserWebsite
 */
class Google_Service_Directory_UserWebsite extends Google_Model
{
    public $customType;
    public $primary;
    public $type;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomType()
    {
        return $this->customType;
    }

    /**
     * @param $customType
     */
    public function setCustomType($customType)
    {
        $this->customType = $customType;
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
 * Class Google_Service_Directory_Users
 */
class Google_Service_Directory_Users extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    public $triggerEvent;
    protected $collection_key = 'users';
    protected $internal_gapi_mappings = [
        "triggerEvent" => "trigger_event",
    ];
    protected $usersType = 'Google_Service_Directory_User';
    protected $usersDataType = 'array';

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
    public function getTriggerEvent()
    {
        return $this->triggerEvent;
    }

    /**
     * @param $triggerEvent
     */
    public function setTriggerEvent($triggerEvent)
    {
        $this->triggerEvent = $triggerEvent;
    }

    /**
     * @param $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }
}

/**
 * Class Google_Service_Directory_VerificationCode
 */
class Google_Service_Directory_VerificationCode extends Google_Model
{
    public $etag;
    public $kind;
    public $userId;
    public $verificationCode;
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

    /**
     * @return mixed
     */
    public function getVerificationCode()
    {
        return $this->verificationCode;
    }

    /**
     * @param $verificationCode
     */
    public function setVerificationCode($verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }
}

/**
 * Class Google_Service_Directory_VerificationCodes
 */
class Google_Service_Directory_VerificationCodes extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Directory_VerificationCode';
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
}
