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
 * Service definition for Appsactivity (v1).
 *
 * <p>
 * Provides a historical view of activity.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/activity/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Appsactivity extends Google_Service
{
    /** View the activity history of your Google Apps. */
    const ACTIVITY =
        "https://www.googleapis.com/auth/activity";
    /** View and manage the files in your Google Drive. */
    const DRIVE =
        "https://www.googleapis.com/auth/drive";
    /** View metadata for files in your Google Drive. */
    const DRIVE_METADATA_READONLY =
        "https://www.googleapis.com/auth/drive.metadata.readonly";
    /** View the files in your Google Drive. */
    const DRIVE_READONLY =
        "https://www.googleapis.com/auth/drive.readonly";

    public $activities;


    /**
     * Constructs the internal representation of the Appsactivity service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'appsactivity/v1/';
        $this->version = 'v1';
        $this->serviceName = 'appsactivity';

        $this->activities = new Google_Service_Appsactivity_Activities_Resource(
            $this,
            $this->serviceName,
            'activities',
            [
                'methods' => [
                    'list' => [
                        'path' => 'activities',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'drive.ancestorId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'userId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'groupingStrategy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'drive.fileId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'source' => [
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
 *   $appsactivityService = new Google_Service_Appsactivity(...);
 *   $activities = $appsactivityService->activities;
 *  </code>
 */
class Google_Service_Appsactivity_Activities_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of activities visible to the current logged in user. Visible
     * activities are determined by the visiblity settings of the object that was
     * acted on, e.g. Drive files a user can see. An activity is a record of past
     * events. Multiple events may be merged if they are similar. A request is
     * scoped to activities from a given Google service using the source parameter.
     * (activities.listActivities)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string drive.ancestorId Identifies the Drive folder containing the
     * items for which to return activities.
     * @opt_param int pageSize The maximum number of events to return on a page. The
     * response includes a continuation token if there are more events.
     * @opt_param string pageToken A token to retrieve a specific page of results.
     * @opt_param string userId Indicates the user to return activity for. Use the
     * special value me to indicate the currently authenticated user.
     * @opt_param string groupingStrategy Indicates the strategy to use when
     * grouping singleEvents items in the associated combinedEvent object.
     * @opt_param string drive.fileId Identifies the Drive item to return activities
     * for.
     * @opt_param string source The Google service from which to return activities.
     * Possible values of source are: - drive.google.com
     */
    public function listActivities($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Appsactivity_ListActivitiesResponse");
    }
}


/**
 * Class Google_Service_Appsactivity_Activity
 */
class Google_Service_Appsactivity_Activity extends Google_Collection
{
    protected $collection_key = 'singleEvents';
    protected $internal_gapi_mappings = [];
    protected $combinedEventType = 'Google_Service_Appsactivity_Event';
    protected $combinedEventDataType = '';
    protected $singleEventsType = 'Google_Service_Appsactivity_Event';
    protected $singleEventsDataType = 'array';


    /**
     * @param Google_Service_Appsactivity_Event $combinedEvent
     */
    public function setCombinedEvent(Google_Service_Appsactivity_Event $combinedEvent)
    {
        $this->combinedEvent = $combinedEvent;
    }

    /**
     * @return mixed
     */
    public function getCombinedEvent()
    {
        return $this->combinedEvent;
    }

    /**
     * @param $singleEvents
     */
    public function setSingleEvents($singleEvents)
    {
        $this->singleEvents = $singleEvents;
    }

    /**
     * @return mixed
     */
    public function getSingleEvents()
    {
        return $this->singleEvents;
    }
}

/**
 * Class Google_Service_Appsactivity_Event
 */
class Google_Service_Appsactivity_Event extends Google_Collection
{
    public $additionalEventTypes;
    public $eventTimeMillis;
    public $fromUserDeletion;
    public $primaryEventType;
    protected $collection_key = 'permissionChanges';
    protected $internal_gapi_mappings = [];
    protected $moveType = 'Google_Service_Appsactivity_Move';
    protected $moveDataType = '';
    protected $permissionChangesType = 'Google_Service_Appsactivity_PermissionChange';
    protected $permissionChangesDataType = 'array';
    protected $renameType = 'Google_Service_Appsactivity_Rename';
    protected $renameDataType = '';
    protected $targetType = 'Google_Service_Appsactivity_Target';
    protected $targetDataType = '';
    protected $userType = 'Google_Service_Appsactivity_User';
    protected $userDataType = '';

    /**
     * @return mixed
     */
    public function getAdditionalEventTypes()
    {
        return $this->additionalEventTypes;
    }

    /**
     * @param $additionalEventTypes
     */
    public function setAdditionalEventTypes($additionalEventTypes)
    {
        $this->additionalEventTypes = $additionalEventTypes;
    }

    /**
     * @return mixed
     */
    public function getEventTimeMillis()
    {
        return $this->eventTimeMillis;
    }

    /**
     * @param $eventTimeMillis
     */
    public function setEventTimeMillis($eventTimeMillis)
    {
        $this->eventTimeMillis = $eventTimeMillis;
    }

    /**
     * @return mixed
     */
    public function getFromUserDeletion()
    {
        return $this->fromUserDeletion;
    }

    /**
     * @param $fromUserDeletion
     */
    public function setFromUserDeletion($fromUserDeletion)
    {
        $this->fromUserDeletion = $fromUserDeletion;
    }

    /**
     * @param Google_Service_Appsactivity_Move $move
     */
    public function setMove(Google_Service_Appsactivity_Move $move)
    {
        $this->move = $move;
    }

    /**
     * @return mixed
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @param $permissionChanges
     */
    public function setPermissionChanges($permissionChanges)
    {
        $this->permissionChanges = $permissionChanges;
    }

    /**
     * @return mixed
     */
    public function getPermissionChanges()
    {
        return $this->permissionChanges;
    }

    /**
     * @return mixed
     */
    public function getPrimaryEventType()
    {
        return $this->primaryEventType;
    }

    /**
     * @param $primaryEventType
     */
    public function setPrimaryEventType($primaryEventType)
    {
        $this->primaryEventType = $primaryEventType;
    }

    /**
     * @param Google_Service_Appsactivity_Rename $rename
     */
    public function setRename(Google_Service_Appsactivity_Rename $rename)
    {
        $this->rename = $rename;
    }

    /**
     * @return mixed
     */
    public function getRename()
    {
        return $this->rename;
    }

    /**
     * @param Google_Service_Appsactivity_Target $target
     */
    public function setTarget(Google_Service_Appsactivity_Target $target)
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
     * @param Google_Service_Appsactivity_User $user
     */
    public function setUser(Google_Service_Appsactivity_User $user)
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
 * Class Google_Service_Appsactivity_ListActivitiesResponse
 */
class Google_Service_Appsactivity_ListActivitiesResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'activities';
    protected $internal_gapi_mappings = [];
    protected $activitiesType = 'Google_Service_Appsactivity_Activity';
    protected $activitiesDataType = 'array';

    /**
     * @param $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
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
 * Class Google_Service_Appsactivity_Move
 */
class Google_Service_Appsactivity_Move extends Google_Collection
{
    protected $collection_key = 'removedParents';
    protected $internal_gapi_mappings = [];
    protected $addedParentsType = 'Google_Service_Appsactivity_Parent';
    protected $addedParentsDataType = 'array';
    protected $removedParentsType = 'Google_Service_Appsactivity_Parent';
    protected $removedParentsDataType = 'array';


    /**
     * @param $addedParents
     */
    public function setAddedParents($addedParents)
    {
        $this->addedParents = $addedParents;
    }

    /**
     * @return mixed
     */
    public function getAddedParents()
    {
        return $this->addedParents;
    }

    /**
     * @param $removedParents
     */
    public function setRemovedParents($removedParents)
    {
        $this->removedParents = $removedParents;
    }

    /**
     * @return mixed
     */
    public function getRemovedParents()
    {
        return $this->removedParents;
    }
}

/**
 * Class Google_Service_Appsactivity_Parent
 */
class Google_Service_Appsactivity_Parent extends Google_Model
{
    public $id;
    public $isRoot;
    public $title;
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
 * Class Google_Service_Appsactivity_Permission
 */
class Google_Service_Appsactivity_Permission extends Google_Model
{
    public $name;
    public $permissionId;
    public $role;
    public $type;
    public $withLink;
    protected $internal_gapi_mappings = [];
    protected $userType = 'Google_Service_Appsactivity_User';
    protected $userDataType = '';

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

    /**
     * @param Google_Service_Appsactivity_User $user
     */
    public function setUser(Google_Service_Appsactivity_User $user)
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
 * Class Google_Service_Appsactivity_PermissionChange
 */
class Google_Service_Appsactivity_PermissionChange extends Google_Collection
{
    protected $collection_key = 'removedPermissions';
    protected $internal_gapi_mappings = [];
    protected $addedPermissionsType = 'Google_Service_Appsactivity_Permission';
    protected $addedPermissionsDataType = 'array';
    protected $removedPermissionsType = 'Google_Service_Appsactivity_Permission';
    protected $removedPermissionsDataType = 'array';


    /**
     * @param $addedPermissions
     */
    public function setAddedPermissions($addedPermissions)
    {
        $this->addedPermissions = $addedPermissions;
    }

    /**
     * @return mixed
     */
    public function getAddedPermissions()
    {
        return $this->addedPermissions;
    }

    /**
     * @param $removedPermissions
     */
    public function setRemovedPermissions($removedPermissions)
    {
        $this->removedPermissions = $removedPermissions;
    }

    /**
     * @return mixed
     */
    public function getRemovedPermissions()
    {
        return $this->removedPermissions;
    }
}

/**
 * Class Google_Service_Appsactivity_Photo
 */
class Google_Service_Appsactivity_Photo extends Google_Model
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
 * Class Google_Service_Appsactivity_Rename
 */
class Google_Service_Appsactivity_Rename extends Google_Model
{
    public $newTitle;
    public $oldTitle;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getNewTitle()
    {
        return $this->newTitle;
    }

    /**
     * @param $newTitle
     */
    public function setNewTitle($newTitle)
    {
        $this->newTitle = $newTitle;
    }

    /**
     * @return mixed
     */
    public function getOldTitle()
    {
        return $this->oldTitle;
    }

    /**
     * @param $oldTitle
     */
    public function setOldTitle($oldTitle)
    {
        $this->oldTitle = $oldTitle;
    }
}

/**
 * Class Google_Service_Appsactivity_Target
 */
class Google_Service_Appsactivity_Target extends Google_Model
{
    public $id;
    public $mimeType;
    public $name;
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
 * Class Google_Service_Appsactivity_User
 */
class Google_Service_Appsactivity_User extends Google_Model
{
    public $name;
    protected $internal_gapi_mappings = [];
    protected $photoType = 'Google_Service_Appsactivity_Photo';
    protected $photoDataType = '';

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
     * @param Google_Service_Appsactivity_Photo $photo
     */
    public function setPhoto(Google_Service_Appsactivity_Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
