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
 * Service definition for Groupssettings (v1).
 *
 * <p>
 * Lets you manage permission levels and related settings of a group.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/groups-settings/get_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Groupssettings extends Google_Service
{
    /** View and manage the settings of a Google Apps Group. */
    const APPS_GROUPS_SETTINGS =
        "https://www.googleapis.com/auth/apps.groups.settings";

    public $groups;


    /**
     * Constructs the internal representation of the Groupssettings service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'groups/v1/groups/';
        $this->version = 'v1';
        $this->serviceName = 'groupssettings';

        $this->groups = new Google_Service_Groupssettings_Groups_Resource(
            $this,
            $this->serviceName,
            'groups',
            [
                'methods' => [
                    'get' => [
                        'path' => '{groupUniqueId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupUniqueId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{groupUniqueId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'groupUniqueId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{groupUniqueId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'groupUniqueId' => [
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
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $groupssettingsService = new Google_Service_Groupssettings(...);
 *   $groups = $groupssettingsService->groups;
 *  </code>
 */
class Google_Service_Groupssettings_Groups_Resource extends Google_Service_Resource
{

    /**
     * Gets one resource by id. (groups.get)
     *
     * @param string $groupUniqueId The resource ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($groupUniqueId, $optParams = [])
    {
        $params = ['groupUniqueId' => $groupUniqueId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Groupssettings_Groups");
    }

    /**
     * Updates an existing resource. This method supports patch semantics.
     * (groups.patch)
     *
     * @param string $groupUniqueId The resource ID
     * @param Google_Groups|Google_Service_Groupssettings_Groups $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($groupUniqueId, Google_Service_Groupssettings_Groups $postBody, $optParams = [])
    {
        $params = ['groupUniqueId' => $groupUniqueId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Groupssettings_Groups");
    }

    /**
     * Updates an existing resource. (groups.update)
     *
     * @param string $groupUniqueId The resource ID
     * @param Google_Groups|Google_Service_Groupssettings_Groups $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($groupUniqueId, Google_Service_Groupssettings_Groups $postBody, $optParams = [])
    {
        $params = ['groupUniqueId' => $groupUniqueId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Groupssettings_Groups");
    }
}


/**
 * Class Google_Service_Groupssettings_Groups
 */
class Google_Service_Groupssettings_Groups extends Google_Model
{
    public $allowExternalMembers;
    public $allowGoogleCommunication;
    public $allowWebPosting;
    public $archiveOnly;
    public $customReplyTo;
    public $defaultMessageDenyNotificationText;
    public $description;
    public $email;
    public $includeInGlobalAddressList;
    public $isArchived;
    public $kind;
    public $maxMessageBytes;
    public $membersCanPostAsTheGroup;
    public $messageDisplayFont;
    public $messageModerationLevel;
    public $name;
    public $primaryLanguage;
    public $replyTo;
    public $sendMessageDenyNotification;
    public $showInGroupDirectory;
    public $spamModerationLevel;
    public $whoCanContactOwner;
    public $whoCanInvite;
    public $whoCanJoin;
    public $whoCanLeaveGroup;
    public $whoCanPostMessage;
    public $whoCanViewGroup;
    public $whoCanViewMembership;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllowExternalMembers()
    {
        return $this->allowExternalMembers;
    }

    /**
     * @param $allowExternalMembers
     */
    public function setAllowExternalMembers($allowExternalMembers)
    {
        $this->allowExternalMembers = $allowExternalMembers;
    }

    /**
     * @return mixed
     */
    public function getAllowGoogleCommunication()
    {
        return $this->allowGoogleCommunication;
    }

    /**
     * @param $allowGoogleCommunication
     */
    public function setAllowGoogleCommunication($allowGoogleCommunication)
    {
        $this->allowGoogleCommunication = $allowGoogleCommunication;
    }

    /**
     * @return mixed
     */
    public function getAllowWebPosting()
    {
        return $this->allowWebPosting;
    }

    /**
     * @param $allowWebPosting
     */
    public function setAllowWebPosting($allowWebPosting)
    {
        $this->allowWebPosting = $allowWebPosting;
    }

    /**
     * @return mixed
     */
    public function getArchiveOnly()
    {
        return $this->archiveOnly;
    }

    /**
     * @param $archiveOnly
     */
    public function setArchiveOnly($archiveOnly)
    {
        $this->archiveOnly = $archiveOnly;
    }

    /**
     * @return mixed
     */
    public function getCustomReplyTo()
    {
        return $this->customReplyTo;
    }

    /**
     * @param $customReplyTo
     */
    public function setCustomReplyTo($customReplyTo)
    {
        $this->customReplyTo = $customReplyTo;
    }

    /**
     * @return mixed
     */
    public function getDefaultMessageDenyNotificationText()
    {
        return $this->defaultMessageDenyNotificationText;
    }

    /**
     * @param $defaultMessageDenyNotificationText
     */
    public function setDefaultMessageDenyNotificationText($defaultMessageDenyNotificationText)
    {
        $this->defaultMessageDenyNotificationText = $defaultMessageDenyNotificationText;
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
    public function getIsArchived()
    {
        return $this->isArchived;
    }

    /**
     * @param $isArchived
     */
    public function setIsArchived($isArchived)
    {
        $this->isArchived = $isArchived;
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
    public function getMaxMessageBytes()
    {
        return $this->maxMessageBytes;
    }

    /**
     * @param $maxMessageBytes
     */
    public function setMaxMessageBytes($maxMessageBytes)
    {
        $this->maxMessageBytes = $maxMessageBytes;
    }

    /**
     * @return mixed
     */
    public function getMembersCanPostAsTheGroup()
    {
        return $this->membersCanPostAsTheGroup;
    }

    /**
     * @param $membersCanPostAsTheGroup
     */
    public function setMembersCanPostAsTheGroup($membersCanPostAsTheGroup)
    {
        $this->membersCanPostAsTheGroup = $membersCanPostAsTheGroup;
    }

    /**
     * @return mixed
     */
    public function getMessageDisplayFont()
    {
        return $this->messageDisplayFont;
    }

    /**
     * @param $messageDisplayFont
     */
    public function setMessageDisplayFont($messageDisplayFont)
    {
        $this->messageDisplayFont = $messageDisplayFont;
    }

    /**
     * @return mixed
     */
    public function getMessageModerationLevel()
    {
        return $this->messageModerationLevel;
    }

    /**
     * @param $messageModerationLevel
     */
    public function setMessageModerationLevel($messageModerationLevel)
    {
        $this->messageModerationLevel = $messageModerationLevel;
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
    public function getPrimaryLanguage()
    {
        return $this->primaryLanguage;
    }

    /**
     * @param $primaryLanguage
     */
    public function setPrimaryLanguage($primaryLanguage)
    {
        $this->primaryLanguage = $primaryLanguage;
    }

    /**
     * @return mixed
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param $replyTo
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return mixed
     */
    public function getSendMessageDenyNotification()
    {
        return $this->sendMessageDenyNotification;
    }

    /**
     * @param $sendMessageDenyNotification
     */
    public function setSendMessageDenyNotification($sendMessageDenyNotification)
    {
        $this->sendMessageDenyNotification = $sendMessageDenyNotification;
    }

    /**
     * @return mixed
     */
    public function getShowInGroupDirectory()
    {
        return $this->showInGroupDirectory;
    }

    /**
     * @param $showInGroupDirectory
     */
    public function setShowInGroupDirectory($showInGroupDirectory)
    {
        $this->showInGroupDirectory = $showInGroupDirectory;
    }

    /**
     * @return mixed
     */
    public function getSpamModerationLevel()
    {
        return $this->spamModerationLevel;
    }

    /**
     * @param $spamModerationLevel
     */
    public function setSpamModerationLevel($spamModerationLevel)
    {
        $this->spamModerationLevel = $spamModerationLevel;
    }

    /**
     * @return mixed
     */
    public function getWhoCanContactOwner()
    {
        return $this->whoCanContactOwner;
    }

    /**
     * @param $whoCanContactOwner
     */
    public function setWhoCanContactOwner($whoCanContactOwner)
    {
        $this->whoCanContactOwner = $whoCanContactOwner;
    }

    /**
     * @return mixed
     */
    public function getWhoCanInvite()
    {
        return $this->whoCanInvite;
    }

    /**
     * @param $whoCanInvite
     */
    public function setWhoCanInvite($whoCanInvite)
    {
        $this->whoCanInvite = $whoCanInvite;
    }

    /**
     * @return mixed
     */
    public function getWhoCanJoin()
    {
        return $this->whoCanJoin;
    }

    /**
     * @param $whoCanJoin
     */
    public function setWhoCanJoin($whoCanJoin)
    {
        $this->whoCanJoin = $whoCanJoin;
    }

    /**
     * @return mixed
     */
    public function getWhoCanLeaveGroup()
    {
        return $this->whoCanLeaveGroup;
    }

    /**
     * @param $whoCanLeaveGroup
     */
    public function setWhoCanLeaveGroup($whoCanLeaveGroup)
    {
        $this->whoCanLeaveGroup = $whoCanLeaveGroup;
    }

    /**
     * @return mixed
     */
    public function getWhoCanPostMessage()
    {
        return $this->whoCanPostMessage;
    }

    /**
     * @param $whoCanPostMessage
     */
    public function setWhoCanPostMessage($whoCanPostMessage)
    {
        $this->whoCanPostMessage = $whoCanPostMessage;
    }

    /**
     * @return mixed
     */
    public function getWhoCanViewGroup()
    {
        return $this->whoCanViewGroup;
    }

    /**
     * @param $whoCanViewGroup
     */
    public function setWhoCanViewGroup($whoCanViewGroup)
    {
        $this->whoCanViewGroup = $whoCanViewGroup;
    }

    /**
     * @return mixed
     */
    public function getWhoCanViewMembership()
    {
        return $this->whoCanViewMembership;
    }

    /**
     * @param $whoCanViewMembership
     */
    public function setWhoCanViewMembership($whoCanViewMembership)
    {
        $this->whoCanViewMembership = $whoCanViewMembership;
    }
}
