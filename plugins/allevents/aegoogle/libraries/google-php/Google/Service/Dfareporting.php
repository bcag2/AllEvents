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
 * Service definition for Dfareporting (v2.1).
 *
 * <p>
 * Manage your DoubleClick Campaign Manager ad campaigns and reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/doubleclick-advertisers/reporting/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dfareporting extends Google_Service
{
    /** View and manage DoubleClick for Advertisers reports. */
    const DFAREPORTING =
        "https://www.googleapis.com/auth/dfareporting";
    /** View and manage your DoubleClick Campaign Manager's (DCM) display ad campaigns. */
    const DFATRAFFICKING =
        "https://www.googleapis.com/auth/dfatrafficking";

    public $accountActiveAdSummaries;
    public $accountPermissionGroups;
    public $accountPermissions;
    public $accountUserProfiles;
    public $accounts;
    public $ads;
    public $advertiserGroups;
    public $advertisers;
    public $browsers;
    public $campaignCreativeAssociations;
    public $campaigns;
    public $changeLogs;
    public $cities;
    public $connectionTypes;
    public $contentCategories;
    public $countries;
    public $creativeAssets;
    public $creativeFieldValues;
    public $creativeFields;
    public $creativeGroups;
    public $creatives;
    public $dimensionValues;
    public $directorySiteContacts;
    public $directorySites;
    public $eventTags;
    public $files;
    public $floodlightActivities;
    public $floodlightActivityGroups;
    public $floodlightConfigurations;
    public $inventoryItems;
    public $landingPages;
    public $metros;
    public $mobileCarriers;
    public $operatingSystemVersions;
    public $operatingSystems;
    public $orderDocuments;
    public $orders;
    public $placementGroups;
    public $placementStrategies;
    public $placements;
    public $platformTypes;
    public $postalCodes;
    public $projects;
    public $regions;
    public $remarketingListShares;
    public $remarketingLists;
    public $reports;
    public $reports_compatibleFields;
    public $reports_files;
    public $sites;
    public $sizes;
    public $subaccounts;
    public $targetableRemarketingLists;
    public $userProfiles;
    public $userRolePermissionGroups;
    public $userRolePermissions;
    public $userRoles;


    /**
     * Constructs the internal representation of the Dfareporting service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'dfareporting/v2.1/';
        $this->version = 'v2.1';
        $this->serviceName = 'dfareporting';

        $this->accountActiveAdSummaries = new Google_Service_Dfareporting_AccountActiveAdSummaries_Resource(
            $this,
            $this->serviceName,
            'accountActiveAdSummaries',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/accountActiveAdSummaries/{summaryAccountId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'summaryAccountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accountPermissionGroups = new Google_Service_Dfareporting_AccountPermissionGroups_Resource(
            $this,
            $this->serviceName,
            'accountPermissionGroups',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/accountPermissionGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/accountPermissionGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accountPermissions = new Google_Service_Dfareporting_AccountPermissions_Resource(
            $this,
            $this->serviceName,
            'accountPermissions',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/accountPermissions/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/accountPermissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accountUserProfiles = new Google_Service_Dfareporting_AccountUserProfiles_Resource(
            $this,
            $this->serviceName,
            'accountUserProfiles',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/accountUserProfiles/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/accountUserProfiles',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/accountUserProfiles',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'subaccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'userRoleId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/accountUserProfiles',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/accountUserProfiles',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->accounts = new Google_Service_Dfareporting_Accounts_Resource(
            $this,
            $this->serviceName,
            'accounts',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/accounts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/accounts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/accounts',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/accounts',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->ads = new Google_Service_Dfareporting_Ads_Resource(
            $this,
            $this->serviceName,
            'ads',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/ads/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/ads',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/ads',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'landingPageIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'overriddenEventTagId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'campaignIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'archived' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'creativeOptimizationConfigurationIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sslCompliant' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sizeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sslRequired' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'creativeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'creativeType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'placementIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'compatibility' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'audienceSegmentIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'remarketingListIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'dynamicClickTracker' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/ads',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/ads',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->advertiserGroups = new Google_Service_Dfareporting_AdvertiserGroups_Resource(
            $this,
            $this->serviceName,
            'advertiserGroups',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/advertiserGroups',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->advertisers = new Google_Service_Dfareporting_Advertisers_Resource(
            $this,
            $this->serviceName,
            'advertisers',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/advertisers/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/advertisers',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/advertisers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'status' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'subaccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'includeAdvertisersWithoutGroupsOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'onlyParent' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'floodlightConfigurationIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'advertiserGroupIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/advertisers',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/advertisers',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->browsers = new Google_Service_Dfareporting_Browsers_Resource(
            $this,
            $this->serviceName,
            'browsers',
            [
                'methods' => [
                    'list' => [
                        'path' => 'userprofiles/{profileId}/browsers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->campaignCreativeAssociations = new Google_Service_Dfareporting_CampaignCreativeAssociations_Resource(
            $this,
            $this->serviceName,
            'campaignCreativeAssociations',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/campaignCreativeAssociations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
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
        $this->campaigns = new Google_Service_Dfareporting_Campaigns_Resource(
            $this,
            $this->serviceName,
            'campaigns',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/campaigns',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'defaultLandingPageName' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'defaultLandingPageUrl' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/campaigns',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'archived' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'subaccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'excludedIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserGroupIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'overriddenEventTagId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'atLeastOneOptimizationActivity' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/campaigns',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/campaigns',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->changeLogs = new Google_Service_Dfareporting_ChangeLogs_Resource(
            $this,
            $this->serviceName,
            'changeLogs',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/changeLogs/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/changeLogs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'minChangeTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxChangeTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'userProfileIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'objectIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'action' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'objectType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->cities = new Google_Service_Dfareporting_Cities_Resource(
            $this,
            $this->serviceName,
            'cities',
            [
                'methods' => [
                    'list' => [
                        'path' => 'userprofiles/{profileId}/cities',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dartIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'namePrefix' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'regionDartIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'countryDartIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->connectionTypes = new Google_Service_Dfareporting_ConnectionTypes_Resource(
            $this,
            $this->serviceName,
            'connectionTypes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/connectionTypes/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/connectionTypes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->contentCategories = new Google_Service_Dfareporting_ContentCategories_Resource(
            $this,
            $this->serviceName,
            'contentCategories',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/contentCategories/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/contentCategories/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/contentCategories',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/contentCategories',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/contentCategories',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/contentCategories',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->countries = new Google_Service_Dfareporting_Countries_Resource(
            $this,
            $this->serviceName,
            'countries',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/countries/{dartId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dartId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/countries',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creativeAssets = new Google_Service_Dfareporting_CreativeAssets_Resource(
            $this,
            $this->serviceName,
            'creativeAssets',
            [
                'methods' => [
                    'insert' => [
                        'path' => 'userprofiles/{profileId}/creativeAssets/{advertiserId}/creativeAssets',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'advertiserId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creativeFieldValues = new Google_Service_Dfareporting_CreativeFieldValues_Resource(
            $this,
            $this->serviceName,
            'creativeFieldValues',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{creativeFieldId}/creativeFieldValues',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'creativeFieldId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creativeFields = new Google_Service_Dfareporting_CreativeFields_Resource(
            $this,
            $this->serviceName,
            'creativeFields',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/creativeFields/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/creativeFields',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/creativeFields',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/creativeFields',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/creativeFields',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creativeGroups = new Google_Service_Dfareporting_CreativeGroups_Resource(
            $this,
            $this->serviceName,
            'creativeGroups',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/creativeGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/creativeGroups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/creativeGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'groupNumber' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/creativeGroups',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/creativeGroups',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->creatives = new Google_Service_Dfareporting_Creatives_Resource(
            $this,
            $this->serviceName,
            'creatives',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/creatives/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/creatives',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/creatives',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sizeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'archived' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'campaignId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'renderingIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'studioCreativeId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'companionCreativeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'creativeFieldIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'types' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/creatives',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/creatives',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->dimensionValues = new Google_Service_Dfareporting_DimensionValues_Resource(
            $this,
            $this->serviceName,
            'dimensionValues',
            [
                'methods' => [
                    'query' => [
                        'path' => 'userprofiles/{profileId}/dimensionvalues/query',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
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
        $this->directorySiteContacts = new Google_Service_Dfareporting_DirectorySiteContacts_Resource(
            $this,
            $this->serviceName,
            'directorySiteContacts',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/directorySiteContacts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/directorySiteContacts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'directorySiteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->directorySites = new Google_Service_Dfareporting_DirectorySites_Resource(
            $this,
            $this->serviceName,
            'directorySites',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/directorySites/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/directorySites',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/directorySites',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'acceptsInterstitialPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'countryId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'acceptsInStreamVideoPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ids' => [
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
                            'acceptsPublisherPaidPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'parentId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'dfp_network_code' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->eventTags = new Google_Service_Dfareporting_EventTags_Resource(
            $this,
            $this->serviceName,
            'eventTags',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/eventTags/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/eventTags/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/eventTags',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/eventTags',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'campaignId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'enabled' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'adId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'eventTagTypes' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'definitionsOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/eventTags',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/eventTags',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->files = new Google_Service_Dfareporting_Files_Resource(
            $this,
            $this->serviceName,
            'files',
            [
                'methods' => [
                    'get' => [
                        'path' => 'reports/{reportId}/files/{fileId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/files',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sortField' => [
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
                            'scope' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->floodlightActivities = new Google_Service_Dfareporting_FloodlightActivities_Resource(
            $this,
            $this->serviceName,
            'floodlightActivities',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'generatetag' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities/generatetag',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'floodlightActivityId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'floodlightActivityGroupIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'floodlightConfigurationId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'floodlightActivityGroupName' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserId' => [
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
                            'tagString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'floodlightActivityGroupTagString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'floodlightActivityGroupType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivities',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->floodlightActivityGroups = new Google_Service_Dfareporting_FloodlightActivityGroups_Resource(
            $this,
            $this->serviceName,
            'floodlightActivityGroups',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'floodlightConfigurationId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/floodlightActivityGroups',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->floodlightConfigurations = new Google_Service_Dfareporting_FloodlightConfigurations_Resource(
            $this,
            $this->serviceName,
            'floodlightConfigurations',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/floodlightConfigurations/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/floodlightConfigurations',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/floodlightConfigurations',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/floodlightConfigurations',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->inventoryItems = new Google_Service_Dfareporting_InventoryItems_Resource(
            $this,
            $this->serviceName,
            'inventoryItems',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/inventoryItems/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/inventoryItems',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
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
                            'siteId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'inPlan' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->landingPages = new Google_Service_Dfareporting_LandingPages_Resource(
            $this,
            $this->serviceName,
            'landingPages',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/campaigns/{campaignId}/landingPages',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'campaignId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->metros = new Google_Service_Dfareporting_Metros_Resource(
            $this,
            $this->serviceName,
            'metros',
            [
                'methods' => [
                    'list' => [
                        'path' => 'userprofiles/{profileId}/metros',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->mobileCarriers = new Google_Service_Dfareporting_MobileCarriers_Resource(
            $this,
            $this->serviceName,
            'mobileCarriers',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/mobileCarriers/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/mobileCarriers',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->operatingSystemVersions = new Google_Service_Dfareporting_OperatingSystemVersions_Resource(
            $this,
            $this->serviceName,
            'operatingSystemVersions',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/operatingSystemVersions/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/operatingSystemVersions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->operatingSystems = new Google_Service_Dfareporting_OperatingSystems_Resource(
            $this,
            $this->serviceName,
            'operatingSystems',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/operatingSystems/{dartId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dartId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/operatingSystems',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->orderDocuments = new Google_Service_Dfareporting_OrderDocuments_Resource(
            $this,
            $this->serviceName,
            'orderDocuments',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/orderDocuments/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/orderDocuments',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'orderId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'siteId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'approved' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->orders = new Google_Service_Dfareporting_Orders_Resource(
            $this,
            $this->serviceName,
            'orders',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/orders/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/projects/{projectId}/orders',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'siteId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->placementGroups = new Google_Service_Dfareporting_PlacementGroups_Resource(
            $this,
            $this->serviceName,
            'placementGroups',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/placementGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/placementGroups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/placementGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'placementStrategyIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'archived' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentCategoryIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'directorySiteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'placementGroupType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pricingTypes' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'siteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'campaignIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/placementGroups',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/placementGroups',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->placementStrategies = new Google_Service_Dfareporting_PlacementStrategies_Resource(
            $this,
            $this->serviceName,
            'placementStrategies',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/placementStrategies',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->placements = new Google_Service_Dfareporting_Placements_Resource(
            $this,
            $this->serviceName,
            'placements',
            [
                'methods' => [
                    'generatetags' => [
                        'path' => 'userprofiles/{profileId}/placements/generatetags',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'tagFormats' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'placementIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'campaignId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/placements/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/placements',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/placements',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'placementStrategyIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'archived' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'contentCategoryIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'directorySiteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'paymentSource' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sizeIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'compatibilities' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'groupIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'pricingTypes' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'siteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'campaignIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/placements',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/placements',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->platformTypes = new Google_Service_Dfareporting_PlatformTypes_Resource(
            $this,
            $this->serviceName,
            'platformTypes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/platformTypes/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/platformTypes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->postalCodes = new Google_Service_Dfareporting_PostalCodes_Resource(
            $this,
            $this->serviceName,
            'postalCodes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/postalCodes/{code}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'code' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/postalCodes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects = new Google_Service_Dfareporting_Projects_Resource(
            $this,
            $this->serviceName,
            'projects',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/projects/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/projects',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'advertiserIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->regions = new Google_Service_Dfareporting_Regions_Resource(
            $this,
            $this->serviceName,
            'regions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'userprofiles/{profileId}/regions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->remarketingListShares = new Google_Service_Dfareporting_RemarketingListShares_Resource(
            $this,
            $this->serviceName,
            'remarketingListShares',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/remarketingListShares/{remarketingListId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'remarketingListId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/remarketingListShares',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'remarketingListId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/remarketingListShares',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->remarketingLists = new Google_Service_Dfareporting_RemarketingLists_Resource(
            $this,
            $this->serviceName,
            'remarketingLists',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/remarketingLists/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/remarketingLists',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/remarketingLists',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
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
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'floodlightActivityId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/remarketingLists',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/remarketingLists',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports = new Google_Service_Dfareporting_Reports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/reports',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/reports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sortField' => [
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
                            'scope' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'run' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}/run',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'synchronous' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports_compatibleFields = new Google_Service_Dfareporting_ReportsCompatibleFields_Resource(
            $this,
            $this->serviceName,
            'compatibleFields',
            [
                'methods' => [
                    'query' => [
                        'path' => 'userprofiles/{profileId}/reports/compatiblefields/query',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports_files = new Google_Service_Dfareporting_ReportsFiles_Resource(
            $this,
            $this->serviceName,
            'files',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}/files/{fileId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'fileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/reports/{reportId}/files',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sortField' => [
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
                        ],
                    ],
                ]
            ]
        );
        $this->sites = new Google_Service_Dfareporting_Sites_Resource(
            $this,
            $this->serviceName,
            'sites',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/sites/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/sites',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/sites',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'acceptsInterstitialPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'subaccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'directorySiteIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'acceptsInStreamVideoPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'ids' => [
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
                            'acceptsPublisherPaidPlacements' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'adWordsSite' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'unmappedSite' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'approved' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'campaignIds' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/sites',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/sites',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->sizes = new Google_Service_Dfareporting_Sizes_Resource(
            $this,
            $this->serviceName,
            'sizes',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/sizes/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/sizes',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/sizes',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'iabStandard' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'width' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'height' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->subaccounts = new Google_Service_Dfareporting_Subaccounts_Resource(
            $this,
            $this->serviceName,
            'subaccounts',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/subaccounts/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/subaccounts',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/subaccounts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/subaccounts',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/subaccounts',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->targetableRemarketingLists = new Google_Service_Dfareporting_TargetableRemarketingLists_Resource(
            $this,
            $this->serviceName,
            'targetableRemarketingLists',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/targetableRemarketingLists/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/targetableRemarketingLists',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
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
                            'active' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->userProfiles = new Google_Service_Dfareporting_UserProfiles_Resource(
            $this,
            $this->serviceName,
            'userProfiles',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->userRolePermissionGroups = new Google_Service_Dfareporting_UserRolePermissionGroups_Resource(
            $this,
            $this->serviceName,
            'userRolePermissionGroups',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/userRolePermissionGroups/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/userRolePermissionGroups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->userRolePermissions = new Google_Service_Dfareporting_UserRolePermissions_Resource(
            $this,
            $this->serviceName,
            'userRolePermissions',
            [
                'methods' => [
                    'get' => [
                        'path' => 'userprofiles/{profileId}/userRolePermissions/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/userRolePermissions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->userRoles = new Google_Service_Dfareporting_UserRoles_Resource(
            $this,
            $this->serviceName,
            'userRoles',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'userprofiles/{profileId}/userRoles/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'userprofiles/{profileId}/userRoles/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'userprofiles/{profileId}/userRoles',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'userprofiles/{profileId}/userRoles',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'searchString' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'subaccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'sortField' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'ids' => [
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
                            'sortOrder' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'accountUserRoleOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'userprofiles/{profileId}/userRoles',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'profileId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'userprofiles/{profileId}/userRoles',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'profileId' => [
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
 * The "accountActiveAdSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accountActiveAdSummaries = $dfareportingService->accountActiveAdSummaries;
 *  </code>
 */
class Google_Service_Dfareporting_AccountActiveAdSummaries_Resource extends Google_Service_Resource
{

    /**
     * Gets the account's active ad summary by account ID.
     * (accountActiveAdSummaries.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $summaryAccountId Account ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $summaryAccountId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'summaryAccountId' => $summaryAccountId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_AccountActiveAdSummary");
    }
}

/**
 * The "accountPermissionGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accountPermissionGroups = $dfareportingService->accountPermissionGroups;
 *  </code>
 */
class Google_Service_Dfareporting_AccountPermissionGroups_Resource extends Google_Service_Resource
{

    /**
     * Gets one account permission group by ID. (accountPermissionGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Account permission group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_AccountPermissionGroup");
    }

    /**
     * Retrieves the list of account permission groups.
     * (accountPermissionGroups.listAccountPermissionGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountPermissionGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AccountPermissionGroupsListResponse");
    }
}

/**
 * The "accountPermissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accountPermissions = $dfareportingService->accountPermissions;
 *  </code>
 */
class Google_Service_Dfareporting_AccountPermissions_Resource extends Google_Service_Resource
{

    /**
     * Gets one account permission by ID. (accountPermissions.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Account permission ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_AccountPermission");
    }

    /**
     * Retrieves the list of account permissions.
     * (accountPermissions.listAccountPermissions)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listAccountPermissions($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AccountPermissionsListResponse");
    }
}

/**
 * The "accountUserProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accountUserProfiles = $dfareportingService->accountUserProfiles;
 *  </code>
 */
class Google_Service_Dfareporting_AccountUserProfiles_Resource extends Google_Service_Resource
{

    /**
     * Gets one account user profile by ID. (accountUserProfiles.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User profile ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_AccountUserProfile");
    }

    /**
     * Inserts a new account user profile. (accountUserProfiles.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_AccountUserProfile|Google_Service_Dfareporting_AccountUserProfile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_AccountUserProfile");
    }

    /**
     * Retrieves a list of account user profiles, possibly filtered.
     * (accountUserProfiles.listAccountUserProfiles)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name, ID or
     * email. Wildcards (*) are allowed. For example, "user profile*2015" will
     * return objects with names like "user profile June 2015", "user profile April
     * 2015", or simply "user profile 2015". Most of the searches also add wildcards
     * implicitly at the start and the end of the search string. For example, a
     * search string of "user profile" will match objects with name "my user
     * profile", "user profile 2015", or simply "user profile".
     * @opt_param string subaccountId Select only user profiles with the specified
     * subaccount ID.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only user profiles with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string userRoleId Select only user profiles with the specified
     * user role ID.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool active Select only active user profiles.
     */
    public function listAccountUserProfiles($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AccountUserProfilesListResponse");
    }

    /**
     * Updates an existing account user profile. This method supports patch
     * semantics. (accountUserProfiles.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User profile ID.
     * @param Google_AccountUserProfile|Google_Service_Dfareporting_AccountUserProfile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_AccountUserProfile");
    }

    /**
     * Updates an existing account user profile. (accountUserProfiles.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_AccountUserProfile|Google_Service_Dfareporting_AccountUserProfile $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_AccountUserProfile");
    }
}

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accounts = $dfareportingService->accounts;
 *  </code>
 */
class Google_Service_Dfareporting_Accounts_Resource extends Google_Service_Resource
{

    /**
     * Gets one account by ID. (accounts.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Account ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Account");
    }

    /**
     * Retrieves the list of accounts, possibly filtered. (accounts.listAccounts)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "account*2015" will return objects
     * with names like "account June 2015", "account April 2015", or simply "account
     * 2015". Most of the searches also add wildcards implicitly at the start and
     * the end of the search string. For example, a search string of "account" will
     * match objects with name "my account", "account 2015", or simply "account".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only accounts with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool active Select only active accounts. Don't set this field to
     * select both active and non-active accounts.
     */
    public function listAccounts($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AccountsListResponse");
    }

    /**
     * Updates an existing account. This method supports patch semantics.
     * (accounts.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Account ID.
     * @param Google_Account|Google_Service_Dfareporting_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Account $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Account");
    }

    /**
     * Updates an existing account. (accounts.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Account|Google_Service_Dfareporting_Account $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Account $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Account");
    }
}

/**
 * The "ads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $ads = $dfareportingService->ads;
 *  </code>
 */
class Google_Service_Dfareporting_Ads_Resource extends Google_Service_Resource
{

    /**
     * Gets one ad by ID. (ads.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Ad ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Ad");
    }

    /**
     * Inserts a new ad. (ads.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Ad|Google_Service_Dfareporting_Ad $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Ad $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Ad");
    }

    /**
     * Retrieves a list of ads, possibly filtered. (ads.listAds)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string landingPageIds Select only ads with these landing page IDs.
     * @opt_param string overriddenEventTagId Select only ads with this event tag
     * override ID.
     * @opt_param string campaignIds Select only ads with these campaign IDs.
     * @opt_param bool archived Select only archived ads.
     * @opt_param string creativeOptimizationConfigurationIds Select only ads with
     * these creative optimization configuration IDs.
     * @opt_param bool sslCompliant Select only ads that are SSL-compliant.
     * @opt_param string sizeIds Select only ads with these size IDs.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string type Select only ads with these types.
     * @opt_param bool sslRequired Select only ads that require SSL.
     * @opt_param string creativeIds Select only ads with these creative IDs
     * assigned.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string creativeType Select only ads with the specified
     * creativeType.
     * @opt_param string placementIds Select only ads with these placement IDs
     * assigned.
     * @opt_param bool active Select only active ads.
     * @opt_param string compatibility Select default ads with the specified
     * compatibility. Applicable when type is AD_SERVING_DEFAULT_AD. WEB and
     * WEB_INTERSTITIAL refer to rendering either on desktop or on mobile devices
     * for regular or interstitial ads, respectively. APP and APP_INTERSTITIAL are
     * for rendering in mobile apps. IN_STREAM_VIDEO refers to rendering an in-
     * stream video ads developed with the VAST standard.
     * @opt_param string advertiserId Select only ads with this advertiser ID.
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "ad*2015" will return objects with
     * names like "ad June 2015", "ad April 2015", or simply "ad 2015". Most of the
     * searches also add wildcards implicitly at the start and the end of the search
     * string. For example, a search string of "ad" will match objects with name "my
     * ad", "ad 2015", or simply "ad".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string audienceSegmentIds Select only ads with these audience
     * segment IDs.
     * @opt_param string ids Select only ads with these IDs.
     * @opt_param string remarketingListIds Select only ads whose list targeting
     * expression use these remarketing list IDs.
     * @opt_param bool dynamicClickTracker Select only dynamic click trackers.
     * Applicable when type is AD_SERVING_CLICK_TRACKER. If true, select dynamic
     * click trackers. If false, select static click trackers. Leave unset to select
     * both.
     */
    public function listAds($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AdsListResponse");
    }

    /**
     * Updates an existing ad. This method supports patch semantics. (ads.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Ad ID.
     * @param Google_Ad|Google_Service_Dfareporting_Ad $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Ad $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Ad");
    }

    /**
     * Updates an existing ad. (ads.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Ad|Google_Service_Dfareporting_Ad $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Ad $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Ad");
    }
}

/**
 * The "advertiserGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $advertiserGroups = $dfareportingService->advertiserGroups;
 *  </code>
 */
class Google_Service_Dfareporting_AdvertiserGroups_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing advertiser group. (advertiserGroups.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Advertiser group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one advertiser group by ID. (advertiserGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Advertiser group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_AdvertiserGroup");
    }

    /**
     * Inserts a new advertiser group. (advertiserGroups.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_AdvertiserGroup|Google_Service_Dfareporting_AdvertiserGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_AdvertiserGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_AdvertiserGroup");
    }

    /**
     * Retrieves a list of advertiser groups, possibly filtered.
     * (advertiserGroups.listAdvertiserGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "advertiser*2015" will return objects
     * with names like "advertiser group June 2015", "advertiser group April 2015",
     * or simply "advertiser group 2015". Most of the searches also add wildcards
     * implicitly at the start and the end of the search string. For example, a
     * search string of "advertisergroup" will match objects with name "my
     * advertisergroup", "advertisergroup 2015", or simply "advertisergroup".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only advertiser groups with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listAdvertiserGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AdvertiserGroupsListResponse");
    }

    /**
     * Updates an existing advertiser group. This method supports patch semantics.
     * (advertiserGroups.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Advertiser group ID.
     * @param Google_AdvertiserGroup|Google_Service_Dfareporting_AdvertiserGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_AdvertiserGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_AdvertiserGroup");
    }

    /**
     * Updates an existing advertiser group. (advertiserGroups.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_AdvertiserGroup|Google_Service_Dfareporting_AdvertiserGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_AdvertiserGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_AdvertiserGroup");
    }
}

/**
 * The "advertisers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $advertisers = $dfareportingService->advertisers;
 *  </code>
 */
class Google_Service_Dfareporting_Advertisers_Resource extends Google_Service_Resource
{

    /**
     * Gets one advertiser by ID. (advertisers.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Advertiser ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Advertiser");
    }

    /**
     * Inserts a new advertiser. (advertisers.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Advertiser|Google_Service_Dfareporting_Advertiser $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Advertiser $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Advertiser");
    }

    /**
     * Retrieves a list of advertisers, possibly filtered.
     * (advertisers.listAdvertisers)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string status Select only advertisers with the specified status.
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "advertiser*2015" will return objects
     * with names like "advertiser June 2015", "advertiser April 2015", or simply
     * "advertiser 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "advertiser" will match objects with name "my advertiser", "advertiser 2015",
     * or simply "advertiser".
     * @opt_param string subaccountId Select only advertisers with these subaccount
     * IDs.
     * @opt_param bool includeAdvertisersWithoutGroupsOnly Select only advertisers
     * which do not belong to any advertiser group.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only advertisers with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param bool onlyParent Select only advertisers which use another
     * advertiser's floodlight configuration.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string floodlightConfigurationIds Select only advertisers with
     * these floodlight configuration IDs.
     * @opt_param string advertiserGroupIds Select only advertisers with these
     * advertiser group IDs.
     */
    public function listAdvertisers($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_AdvertisersListResponse");
    }

    /**
     * Updates an existing advertiser. This method supports patch semantics.
     * (advertisers.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Advertiser ID.
     * @param Google_Advertiser|Google_Service_Dfareporting_Advertiser $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Advertiser $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Advertiser");
    }

    /**
     * Updates an existing advertiser. (advertisers.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Advertiser|Google_Service_Dfareporting_Advertiser $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Advertiser $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Advertiser");
    }
}

/**
 * The "browsers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $browsers = $dfareportingService->browsers;
 *  </code>
 */
class Google_Service_Dfareporting_Browsers_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of browsers. (browsers.listBrowsers)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listBrowsers($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_BrowsersListResponse");
    }
}

/**
 * The "campaignCreativeAssociations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $campaignCreativeAssociations = $dfareportingService->campaignCreativeAssociations;
 *  </code>
 */
class Google_Service_Dfareporting_CampaignCreativeAssociations_Resource extends Google_Service_Resource
{

    /**
     * Associates a creative with the specified campaign. This method creates a
     * default ad with dimensions matching the creative in the campaign if such a
     * default ad does not exist already. (campaignCreativeAssociations.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Campaign ID in this association.
     * @param Google_CampaignCreativeAssociation|Google_Service_Dfareporting_CampaignCreativeAssociation $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, $campaignId, Google_Service_Dfareporting_CampaignCreativeAssociation $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_CampaignCreativeAssociation");
    }

    /**
     * Retrieves the list of creative IDs associated with the specified campaign.
     * (campaignCreativeAssociations.listCampaignCreativeAssociations)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Campaign ID in this association.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param int maxResults Maximum number of results to return.
     */
    public function listCampaignCreativeAssociations($profileId, $campaignId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CampaignCreativeAssociationsListResponse");
    }
}

/**
 * The "campaigns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $campaigns = $dfareportingService->campaigns;
 *  </code>
 */
class Google_Service_Dfareporting_Campaigns_Resource extends Google_Service_Resource
{

    /**
     * Gets one campaign by ID. (campaigns.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Campaign ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Campaign");
    }

    /**
     * Inserts a new campaign. (campaigns.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $defaultLandingPageName Default landing page name for this new
     *                                                                                     campaign. Must be less than 256 characters long.
     * @param string $defaultLandingPageUrl Default landing page URL for this new
     *                                                                                     campaign.
     * @param Google_Campaign|Google_Service_Dfareporting_Campaign $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, $defaultLandingPageName, $defaultLandingPageUrl, Google_Service_Dfareporting_Campaign $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'defaultLandingPageName' => $defaultLandingPageName, 'defaultLandingPageUrl' => $defaultLandingPageUrl, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Campaign");
    }

    /**
     * Retrieves a list of campaigns, possibly filtered. (campaigns.listCampaigns)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool archived Select only archived campaigns. Don't set this field
     * to select both archived and non-archived campaigns.
     * @opt_param string searchString Allows searching for campaigns by name or ID.
     * Wildcards (*) are allowed. For example, "campaign*2015" will return campaigns
     * with names like "campaign June 2015", "campaign April 2015", or simply
     * "campaign 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "campaign" will match campaigns with name "my campaign", "campaign 2015", or
     * simply "campaign".
     * @opt_param string subaccountId Select only campaigns that belong to this
     * subaccount.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only campaigns that belong to these
     * advertisers.
     * @opt_param string ids Select only campaigns with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string excludedIds Exclude campaigns with these IDs.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string advertiserGroupIds Select only campaigns whose advertisers
     * belong to these advertiser groups.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string overriddenEventTagId Select only campaigns that have
     * overridden this event tag ID.
     * @opt_param bool atLeastOneOptimizationActivity Select only campaigns that
     * have at least one optimization activity.
     */
    public function listCampaigns($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CampaignsListResponse");
    }

    /**
     * Updates an existing campaign. This method supports patch semantics.
     * (campaigns.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Campaign ID.
     * @param Google_Campaign|Google_Service_Dfareporting_Campaign $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Campaign $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Campaign");
    }

    /**
     * Updates an existing campaign. (campaigns.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Campaign|Google_Service_Dfareporting_Campaign $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Campaign $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Campaign");
    }
}

/**
 * The "changeLogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $changeLogs = $dfareportingService->changeLogs;
 *  </code>
 */
class Google_Service_Dfareporting_ChangeLogs_Resource extends Google_Service_Resource
{

    /**
     * Gets one change log by ID. (changeLogs.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Change log ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_ChangeLog");
    }

    /**
     * Retrieves a list of change logs. (changeLogs.listChangeLogs)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string minChangeTime Select only change logs whose change time is
     * before the specified minChangeTime.The time should be formatted as an RFC3339
     * date/time string. For example, for 10:54 PM on July 18th, 2015, in the
     * America/New York time zone, the format is "2015-07-18T22:54:00-04:00". In
     * other words, the year, month, day, the letter T, the hour (24-hour clock
     * system), minute, second, and then the time zone offset.
     * @opt_param string searchString Select only change logs whose object ID, user
     * name, old or new values match the search string.
     * @opt_param string maxChangeTime Select only change logs whose change time is
     * before the specified maxChangeTime.The time should be formatted as an RFC3339
     * date/time string. For example, for 10:54 PM on July 18th, 2015, in the
     * America/New York time zone, the format is "2015-07-18T22:54:00-04:00". In
     * other words, the year, month, day, the letter T, the hour (24-hour clock
     * system), minute, second, and then the time zone offset.
     * @opt_param string userProfileIds Select only change logs with these user
     * profile IDs.
     * @opt_param string ids Select only change logs with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string objectIds Select only change logs with these object IDs.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string action Select only change logs with the specified action.
     * @opt_param string objectType Select only change logs with the specified
     * object type.
     */
    public function listChangeLogs($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_ChangeLogsListResponse");
    }
}

/**
 * The "cities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $cities = $dfareportingService->cities;
 *  </code>
 */
class Google_Service_Dfareporting_Cities_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of cities, possibly filtered. (cities.listCities)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string dartIds Select only cities with these DART IDs.
     * @opt_param string namePrefix Select only cities with names starting with this
     * prefix.
     * @opt_param string regionDartIds Select only cities from these regions.
     * @opt_param string countryDartIds Select only cities from these countries.
     */
    public function listCities($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CitiesListResponse");
    }
}

/**
 * The "connectionTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $connectionTypes = $dfareportingService->connectionTypes;
 *  </code>
 */
class Google_Service_Dfareporting_ConnectionTypes_Resource extends Google_Service_Resource
{

    /**
     * Gets one connection type by ID. (connectionTypes.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Connection type ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_ConnectionType");
    }

    /**
     * Retrieves a list of connection types. (connectionTypes.listConnectionTypes)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listConnectionTypes($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_ConnectionTypesListResponse");
    }
}

/**
 * The "contentCategories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $contentCategories = $dfareportingService->contentCategories;
 *  </code>
 */
class Google_Service_Dfareporting_ContentCategories_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing content category. (contentCategories.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Content category ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one content category by ID. (contentCategories.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Content category ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_ContentCategory");
    }

    /**
     * Inserts a new content category. (contentCategories.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_ContentCategory|Google_Service_Dfareporting_ContentCategory $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_ContentCategory $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_ContentCategory");
    }

    /**
     * Retrieves a list of content categories, possibly filtered.
     * (contentCategories.listContentCategories)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "contentcategory*2015" will return
     * objects with names like "contentcategory June 2015", "contentcategory April
     * 2015", or simply "contentcategory 2015". Most of the searches also add
     * wildcards implicitly at the start and the end of the search string. For
     * example, a search string of "contentcategory" will match objects with name
     * "my contentcategory", "contentcategory 2015", or simply "contentcategory".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only content categories with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listContentCategories($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_ContentCategoriesListResponse");
    }

    /**
     * Updates an existing content category. This method supports patch semantics.
     * (contentCategories.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Content category ID.
     * @param Google_ContentCategory|Google_Service_Dfareporting_ContentCategory $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_ContentCategory $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_ContentCategory");
    }

    /**
     * Updates an existing content category. (contentCategories.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_ContentCategory|Google_Service_Dfareporting_ContentCategory $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_ContentCategory $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_ContentCategory");
    }
}

/**
 * The "countries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $countries = $dfareportingService->countries;
 *  </code>
 */
class Google_Service_Dfareporting_Countries_Resource extends Google_Service_Resource
{

    /**
     * Gets one country by ID. (countries.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $dartId Country DART ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $dartId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'dartId' => $dartId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Country");
    }

    /**
     * Retrieves a list of countries. (countries.listCountries)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listCountries($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CountriesListResponse");
    }
}

/**
 * The "creativeAssets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creativeAssets = $dfareportingService->creativeAssets;
 *  </code>
 */
class Google_Service_Dfareporting_CreativeAssets_Resource extends Google_Service_Resource
{

    /**
     * Inserts a new creative asset. (creativeAssets.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $advertiserId Advertiser ID of this creative. This is a
     *                                                                                                     required field.
     * @param Google_CreativeAssetMetadata|Google_Service_Dfareporting_CreativeAssetMetadata $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, $advertiserId, Google_Service_Dfareporting_CreativeAssetMetadata $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_CreativeAssetMetadata");
    }
}

/**
 * The "creativeFieldValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creativeFieldValues = $dfareportingService->creativeFieldValues;
 *  </code>
 */
class Google_Service_Dfareporting_CreativeFieldValues_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing creative field value. (creativeFieldValues.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                value.
     * @param string $id Creative Field Value ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $creativeFieldId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one creative field value by ID. (creativeFieldValues.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                value.
     * @param string $id Creative Field Value ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $creativeFieldId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_CreativeFieldValue");
    }

    /**
     * Inserts a new creative field value. (creativeFieldValues.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                                                                                  value.
     * @param Google_CreativeFieldValue|Google_Service_Dfareporting_CreativeFieldValue $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, $creativeFieldId, Google_Service_Dfareporting_CreativeFieldValue $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_CreativeFieldValue");
    }

    /**
     * Retrieves a list of creative field values, possibly filtered.
     * (creativeFieldValues.listCreativeFieldValues)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                value.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for creative field values by
     * their values. Wildcards (e.g. *) are not allowed.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only creative field values with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listCreativeFieldValues($profileId, $creativeFieldId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CreativeFieldValuesListResponse");
    }

    /**
     * Updates an existing creative field value. This method supports patch
     * semantics. (creativeFieldValues.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                                                                                  value.
     * @param string $id Creative Field Value ID
     * @param Google_CreativeFieldValue|Google_Service_Dfareporting_CreativeFieldValue $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $creativeFieldId, $id, Google_Service_Dfareporting_CreativeFieldValue $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_CreativeFieldValue");
    }

    /**
     * Updates an existing creative field value. (creativeFieldValues.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $creativeFieldId Creative field ID for this creative field
     *                                                                                                  value.
     * @param Google_CreativeFieldValue|Google_Service_Dfareporting_CreativeFieldValue $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, $creativeFieldId, Google_Service_Dfareporting_CreativeFieldValue $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'creativeFieldId' => $creativeFieldId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_CreativeFieldValue");
    }
}

/**
 * The "creativeFields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creativeFields = $dfareportingService->creativeFields;
 *  </code>
 */
class Google_Service_Dfareporting_CreativeFields_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing creative field. (creativeFields.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative Field ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one creative field by ID. (creativeFields.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative Field ID
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_CreativeField");
    }

    /**
     * Inserts a new creative field. (creativeFields.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_CreativeField|Google_Service_Dfareporting_CreativeField $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_CreativeField $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_CreativeField");
    }

    /**
     * Retrieves a list of creative fields, possibly filtered.
     * (creativeFields.listCreativeFields)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for creative fields by name
     * or ID. Wildcards (*) are allowed. For example, "creativefield*2015" will
     * return creative fields with names like "creativefield June 2015",
     * "creativefield April 2015", or simply "creativefield 2015". Most of the
     * searches also add wild-cards implicitly at the start and the end of the
     * search string. For example, a search string of "creativefield" will match
     * creative fields with the name "my creativefield", "creativefield 2015", or
     * simply "creativefield".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only creative fields that belong to
     * these advertisers.
     * @opt_param string ids Select only creative fields with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listCreativeFields($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CreativeFieldsListResponse");
    }

    /**
     * Updates an existing creative field. This method supports patch semantics.
     * (creativeFields.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative Field ID
     * @param Google_CreativeField|Google_Service_Dfareporting_CreativeField $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_CreativeField $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_CreativeField");
    }

    /**
     * Updates an existing creative field. (creativeFields.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_CreativeField|Google_Service_Dfareporting_CreativeField $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_CreativeField $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_CreativeField");
    }
}

/**
 * The "creativeGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creativeGroups = $dfareportingService->creativeGroups;
 *  </code>
 */
class Google_Service_Dfareporting_CreativeGroups_Resource extends Google_Service_Resource
{

    /**
     * Gets one creative group by ID. (creativeGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_CreativeGroup");
    }

    /**
     * Inserts a new creative group. (creativeGroups.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_CreativeGroup|Google_Service_Dfareporting_CreativeGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_CreativeGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_CreativeGroup");
    }

    /**
     * Retrieves a list of creative groups, possibly filtered.
     * (creativeGroups.listCreativeGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for creative groups by name
     * or ID. Wildcards (*) are allowed. For example, "creativegroup*2015" will
     * return creative groups with names like "creativegroup June 2015",
     * "creativegroup April 2015", or simply "creativegroup 2015". Most of the
     * searches also add wild-cards implicitly at the start and the end of the
     * search string. For example, a search string of "creativegroup" will match
     * creative groups with the name "my creativegroup", "creativegroup 2015", or
     * simply "creativegroup".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only creative groups that belong to
     * these advertisers.
     * @opt_param int groupNumber Select only creative groups that belong to this
     * subgroup.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string ids Select only creative groups with these IDs.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listCreativeGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CreativeGroupsListResponse");
    }

    /**
     * Updates an existing creative group. This method supports patch semantics.
     * (creativeGroups.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative group ID.
     * @param Google_CreativeGroup|Google_Service_Dfareporting_CreativeGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_CreativeGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_CreativeGroup");
    }

    /**
     * Updates an existing creative group. (creativeGroups.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_CreativeGroup|Google_Service_Dfareporting_CreativeGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_CreativeGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_CreativeGroup");
    }
}

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $creatives = $dfareportingService->creatives;
 *  </code>
 */
class Google_Service_Dfareporting_Creatives_Resource extends Google_Service_Resource
{

    /**
     * Gets one creative by ID. (creatives.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Creative");
    }

    /**
     * Inserts a new creative. (creatives.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Creative|Google_Service_Dfareporting_Creative $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Creative $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Creative");
    }

    /**
     * Retrieves a list of creatives, possibly filtered. (creatives.listCreatives)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string sizeIds Select only creatives with these size IDs.
     * @opt_param bool archived Select only archived creatives. Leave blank to
     * select archived and unarchived creatives.
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "creative*2015" will return objects
     * with names like "creative June 2015", "creative April 2015", or simply
     * "creative 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "creative" will match objects with name "my creative", "creative 2015", or
     * simply "creative".
     * @opt_param string campaignId Select only creatives with this campaign ID.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string renderingIds Select only creatives with these rendering
     * IDs.
     * @opt_param string ids Select only creatives with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string advertiserId Select only creatives with this advertiser ID.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string studioCreativeId Select only creatives corresponding to
     * this Studio creative ID.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string companionCreativeIds Select only in-stream video creatives
     * with these companion IDs.
     * @opt_param bool active Select only active creatives. Leave blank to select
     * active and inactive creatives.
     * @opt_param string creativeFieldIds Select only creatives with these creative
     * field IDs.
     * @opt_param string types Select only creatives with these creative types.
     */
    public function listCreatives($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_CreativesListResponse");
    }

    /**
     * Updates an existing creative. This method supports patch semantics.
     * (creatives.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Creative ID.
     * @param Google_Creative|Google_Service_Dfareporting_Creative $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Creative $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Creative");
    }

    /**
     * Updates an existing creative. (creatives.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Creative|Google_Service_Dfareporting_Creative $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Creative $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Creative");
    }
}

/**
 * The "dimensionValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $dimensionValues = $dfareportingService->dimensionValues;
 *  </code>
 */
class Google_Service_Dfareporting_DimensionValues_Resource extends Google_Service_Resource
{

    /**
     * Retrieves list of report dimension values for a list of filters.
     * (dimensionValues.query)
     *
     * @param string $profileId The DFA user profile ID.
     * @param Google_DimensionValueRequest|Google_Service_Dfareporting_DimensionValueRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken The value of the nextToken from the previous
     * result page.
     * @opt_param int maxResults Maximum number of results to return.
     */
    public function query($profileId, Google_Service_Dfareporting_DimensionValueRequest $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_Dfareporting_DimensionValueList");
    }
}

/**
 * The "directorySiteContacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $directorySiteContacts = $dfareportingService->directorySiteContacts;
 *  </code>
 */
class Google_Service_Dfareporting_DirectorySiteContacts_Resource extends Google_Service_Resource
{

    /**
     * Gets one directory site contact by ID. (directorySiteContacts.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Directory site contact ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_DirectorySiteContact");
    }

    /**
     * Retrieves a list of directory site contacts, possibly filtered.
     * (directorySiteContacts.listDirectorySiteContacts)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name, ID or
     * email. Wildcards (*) are allowed. For example, "directory site contact*2015"
     * will return objects with names like "directory site contact June 2015",
     * "directory site contact April 2015", or simply "directory site contact 2015".
     * Most of the searches also add wildcards implicitly at the start and the end
     * of the search string. For example, a search string of "directory site
     * contact" will match objects with name "my directory site contact", "directory
     * site contact 2015", or simply "directory site contact".
     * @opt_param string directorySiteIds Select only directory site contacts with
     * these directory site IDs. This is a required field.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only directory site contacts with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listDirectorySiteContacts($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_DirectorySiteContactsListResponse");
    }
}

/**
 * The "directorySites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $directorySites = $dfareportingService->directorySites;
 *  </code>
 */
class Google_Service_Dfareporting_DirectorySites_Resource extends Google_Service_Resource
{

    /**
     * Gets one directory site by ID. (directorySites.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Directory site ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_DirectorySite");
    }

    /**
     * Inserts a new directory site. (directorySites.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_DirectorySite|Google_Service_Dfareporting_DirectorySite $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_DirectorySite $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_DirectorySite");
    }

    /**
     * Retrieves a list of directory sites, possibly filtered.
     * (directorySites.listDirectorySites)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool acceptsInterstitialPlacements This search filter is no longer
     * supported and will have no effect on the results returned.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string searchString Allows searching for objects by name, ID or
     * URL. Wildcards (*) are allowed. For example, "directory site*2015" will
     * return objects with names like "directory site June 2015", "directory site
     * April 2015", or simply "directory site 2015". Most of the searches also add
     * wildcards implicitly at the start and the end of the search string. For
     * example, a search string of "directory site" will match objects with name "my
     * directory site", "directory site 2015" or simply, "directory site".
     * @opt_param string countryId Select only directory sites with this country ID.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param bool acceptsInStreamVideoPlacements This search filter is no
     * longer supported and will have no effect on the results returned.
     * @opt_param string ids Select only directory sites with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param bool acceptsPublisherPaidPlacements Select only directory sites
     * that accept publisher paid placements. This field can be left blank.
     * @opt_param string parentId Select only directory sites with this parent ID.
     * @opt_param bool active Select only active directory sites. Leave blank to
     * retrieve both active and inactive directory sites.
     * @opt_param string dfp_network_code Select only directory sites with this DFP
     * network code.
     */
    public function listDirectorySites($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_DirectorySitesListResponse");
    }
}

/**
 * The "eventTags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $eventTags = $dfareportingService->eventTags;
 *  </code>
 */
class Google_Service_Dfareporting_EventTags_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing event tag. (eventTags.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Event tag ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one event tag by ID. (eventTags.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Event tag ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_EventTag");
    }

    /**
     * Inserts a new event tag. (eventTags.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_EventTag|Google_Service_Dfareporting_EventTag $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_EventTag $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_EventTag");
    }

    /**
     * Retrieves a list of event tags, possibly filtered. (eventTags.listEventTags)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "eventtag*2015" will return objects
     * with names like "eventtag June 2015", "eventtag April 2015", or simply
     * "eventtag 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "eventtag" will match objects with name "my eventtag", "eventtag 2015", or
     * simply "eventtag".
     * @opt_param string campaignId Select only event tags that belong to this
     * campaign.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param bool enabled Select only enabled event tags. When definitionsOnly
     * is set to true, only the specified advertiser or campaign's event tags'
     * enabledByDefault field is examined. When definitionsOnly is set to false, the
     * specified ad or specified campaign's parent advertiser's or parent campaign's
     * event tags' enabledByDefault and status fields are examined as well.
     * @opt_param string ids Select only event tags with these IDs.
     * @opt_param string advertiserId Select only event tags that belong to this
     * advertiser.
     * @opt_param string adId Select only event tags that belong to this ad.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string eventTagTypes Select only event tags with the specified
     * event tag types. Event tag types can be used to specify whether to use a
     * third-party pixel, a third-party JavaScript URL, or a third-party click-
     * through URL for either impression or click tracking.
     * @opt_param bool definitionsOnly Examine only the specified ad or campaign or
     * advertiser's event tags for matching selector criteria. When set to false,
     * the parent advertiser and parent campaign is examined as well. In addition,
     * when set to false, the status field is examined as well along with the
     * enabledByDefault field.
     */
    public function listEventTags($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_EventTagsListResponse");
    }

    /**
     * Updates an existing event tag. This method supports patch semantics.
     * (eventTags.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Event tag ID.
     * @param Google_EventTag|Google_Service_Dfareporting_EventTag $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_EventTag $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_EventTag");
    }

    /**
     * Updates an existing event tag. (eventTags.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_EventTag|Google_Service_Dfareporting_EventTag $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_EventTag $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_EventTag");
    }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $files = $dfareportingService->files;
 *  </code>
 */
class Google_Service_Dfareporting_Files_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a report file by its report ID and file ID. (files.get)
     *
     * @param string $reportId The ID of the report.
     * @param string $fileId The ID of the report file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($reportId, $fileId, $optParams = [])
    {
        $params = ['reportId' => $reportId, 'fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_DfareportingFile");
    }

    /**
     * Lists files for a user profile. (files.listFiles)
     *
     * @param string $profileId The DFA profile ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sortField The field by which to sort the list.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken The value of the nextToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is 'DESCENDING'.
     * @opt_param string scope The scope that defines which results are returned,
     * default is 'MINE'.
     */
    public function listFiles($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_FileList");
    }
}

/**
 * The "floodlightActivities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $floodlightActivities = $dfareportingService->floodlightActivities;
 *  </code>
 */
class Google_Service_Dfareporting_FloodlightActivities_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing floodlight activity. (floodlightActivities.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Generates a tag for a floodlight activity. (floodlightActivities.generatetag)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string floodlightActivityId Floodlight activity ID for which we
     * want to generate a tag.
     */
    public function generatetag($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('generatetag', [$params], "Google_Service_Dfareporting_FloodlightActivitiesGenerateTagResponse");
    }

    /**
     * Gets one floodlight activity by ID. (floodlightActivities.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_FloodlightActivity");
    }

    /**
     * Inserts a new floodlight activity. (floodlightActivities.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_FloodlightActivity|Google_Service_Dfareporting_FloodlightActivity $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_FloodlightActivity $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_FloodlightActivity");
    }

    /**
     * Retrieves a list of floodlight activities, possibly filtered.
     * (floodlightActivities.listFloodlightActivities)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string floodlightActivityGroupIds Select only floodlight
     * activities with the specified floodlight activity group IDs.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "floodlightactivity*2015" will return
     * objects with names like "floodlightactivity June 2015", "floodlightactivity
     * April 2015", or simply "floodlightactivity 2015". Most of the searches also
     * add wildcards implicitly at the start and the end of the search string. For
     * example, a search string of "floodlightactivity" will match objects with name
     * "my floodlightactivity activity", "floodlightactivity 2015", or simply
     * "floodlightactivity".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string floodlightConfigurationId Select only floodlight activities
     * for the specified floodlight configuration ID. Must specify either ids,
     * advertiserId, or floodlightConfigurationId for a non-empty result.
     * @opt_param string ids Select only floodlight activities with the specified
     * IDs. Must specify either ids, advertiserId, or floodlightConfigurationId for
     * a non-empty result.
     * @opt_param string floodlightActivityGroupName Select only floodlight
     * activities with the specified floodlight activity group name.
     * @opt_param string advertiserId Select only floodlight activities for the
     * specified advertiser ID. Must specify either ids, advertiserId, or
     * floodlightConfigurationId for a non-empty result.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string tagString Select only floodlight activities with the
     * specified tag string.
     * @opt_param string floodlightActivityGroupTagString Select only floodlight
     * activities with the specified floodlight activity group tag string.
     * @opt_param string floodlightActivityGroupType Select only floodlight
     * activities with the specified floodlight activity group type.
     */
    public function listFloodlightActivities($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_FloodlightActivitiesListResponse");
    }

    /**
     * Updates an existing floodlight activity. This method supports patch
     * semantics. (floodlightActivities.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity ID.
     * @param Google_FloodlightActivity|Google_Service_Dfareporting_FloodlightActivity $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_FloodlightActivity $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_FloodlightActivity");
    }

    /**
     * Updates an existing floodlight activity. (floodlightActivities.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_FloodlightActivity|Google_Service_Dfareporting_FloodlightActivity $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_FloodlightActivity $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_FloodlightActivity");
    }
}

/**
 * The "floodlightActivityGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $floodlightActivityGroups = $dfareportingService->floodlightActivityGroups;
 *  </code>
 */
class Google_Service_Dfareporting_FloodlightActivityGroups_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing floodlight activity group.
     * (floodlightActivityGroups.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity Group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one floodlight activity group by ID. (floodlightActivityGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity Group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_FloodlightActivityGroup");
    }

    /**
     * Inserts a new floodlight activity group. (floodlightActivityGroups.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_FloodlightActivityGroup|Google_Service_Dfareporting_FloodlightActivityGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_FloodlightActivityGroup");
    }

    /**
     * Retrieves a list of floodlight activity groups, possibly filtered.
     * (floodlightActivityGroups.listFloodlightActivityGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "floodlightactivitygroup*2015" will
     * return objects with names like "floodlightactivitygroup June 2015",
     * "floodlightactivitygroup April 2015", or simply "floodlightactivitygroup
     * 2015". Most of the searches also add wildcards implicitly at the start and
     * the end of the search string. For example, a search string of
     * "floodlightactivitygroup" will match objects with name "my
     * floodlightactivitygroup activity", "floodlightactivitygroup 2015", or simply
     * "floodlightactivitygroup".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string floodlightConfigurationId Select only floodlight activity
     * groups with the specified floodlight configuration ID. Must specify either
     * advertiserId, or floodlightConfigurationId for a non-empty result.
     * @opt_param string ids Select only floodlight activity groups with the
     * specified IDs. Must specify either advertiserId or floodlightConfigurationId
     * for a non-empty result.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string advertiserId Select only floodlight activity groups with
     * the specified advertiser ID. Must specify either advertiserId or
     * floodlightConfigurationId for a non-empty result.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string type Select only floodlight activity groups with the
     * specified floodlight activity group type.
     */
    public function listFloodlightActivityGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_FloodlightActivityGroupsListResponse");
    }

    /**
     * Updates an existing floodlight activity group. This method supports patch
     * semantics. (floodlightActivityGroups.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight activity Group ID.
     * @param Google_FloodlightActivityGroup|Google_Service_Dfareporting_FloodlightActivityGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_FloodlightActivityGroup");
    }

    /**
     * Updates an existing floodlight activity group.
     * (floodlightActivityGroups.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_FloodlightActivityGroup|Google_Service_Dfareporting_FloodlightActivityGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_FloodlightActivityGroup");
    }
}

/**
 * The "floodlightConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $floodlightConfigurations = $dfareportingService->floodlightConfigurations;
 *  </code>
 */
class Google_Service_Dfareporting_FloodlightConfigurations_Resource extends Google_Service_Resource
{

    /**
     * Gets one floodlight configuration by ID. (floodlightConfigurations.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight configuration ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_FloodlightConfiguration");
    }

    /**
     * Retrieves a list of floodlight configurations, possibly filtered.
     * (floodlightConfigurations.listFloodlightConfigurations)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string ids Set of IDs of floodlight configurations to retrieve.
     * Required field; otherwise an empty list will be returned.
     */
    public function listFloodlightConfigurations($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_FloodlightConfigurationsListResponse");
    }

    /**
     * Updates an existing floodlight configuration. This method supports patch
     * semantics. (floodlightConfigurations.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Floodlight configuration ID.
     * @param Google_FloodlightConfiguration|Google_Service_Dfareporting_FloodlightConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_FloodlightConfiguration $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_FloodlightConfiguration");
    }

    /**
     * Updates an existing floodlight configuration.
     * (floodlightConfigurations.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_FloodlightConfiguration|Google_Service_Dfareporting_FloodlightConfiguration $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_FloodlightConfiguration $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_FloodlightConfiguration");
    }
}

/**
 * The "inventoryItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $inventoryItems = $dfareportingService->inventoryItems;
 *  </code>
 */
class Google_Service_Dfareporting_InventoryItems_Resource extends Google_Service_Resource
{

    /**
     * Gets one inventory item by ID. (inventoryItems.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for order documents.
     * @param string $id Inventory item ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $projectId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_InventoryItem");
    }

    /**
     * Retrieves a list of inventory items, possibly filtered.
     * (inventoryItems.listInventoryItems)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for order documents.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string orderId Select only inventory items that belong to
     * specified orders.
     * @opt_param string ids Select only inventory items with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string siteId Select only inventory items that are associated with
     * these sites.
     * @opt_param bool inPlan Select only inventory items that are in plan.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listInventoryItems($profileId, $projectId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_InventoryItemsListResponse");
    }
}

/**
 * The "landingPages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $landingPages = $dfareportingService->landingPages;
 *  </code>
 */
class Google_Service_Dfareporting_LandingPages_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing campaign landing page. (landingPages.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param string $id Landing page ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $campaignId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one campaign landing page by ID. (landingPages.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param string $id Landing page ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $campaignId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_LandingPage");
    }

    /**
     * Inserts a new landing page for the specified campaign. (landingPages.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param Google_LandingPage|Google_Service_Dfareporting_LandingPage $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, $campaignId, Google_Service_Dfareporting_LandingPage $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_LandingPage");
    }

    /**
     * Retrieves the list of landing pages for the specified campaign.
     * (landingPages.listLandingPages)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listLandingPages($profileId, $campaignId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_LandingPagesListResponse");
    }

    /**
     * Updates an existing campaign landing page. This method supports patch
     * semantics. (landingPages.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param string $id Landing page ID.
     * @param Google_LandingPage|Google_Service_Dfareporting_LandingPage $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $campaignId, $id, Google_Service_Dfareporting_LandingPage $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_LandingPage");
    }

    /**
     * Updates an existing campaign landing page. (landingPages.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $campaignId Landing page campaign ID.
     * @param Google_LandingPage|Google_Service_Dfareporting_LandingPage $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, $campaignId, Google_Service_Dfareporting_LandingPage $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'campaignId' => $campaignId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_LandingPage");
    }
}

/**
 * The "metros" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $metros = $dfareportingService->metros;
 *  </code>
 */
class Google_Service_Dfareporting_Metros_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of metros. (metros.listMetros)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listMetros($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_MetrosListResponse");
    }
}

/**
 * The "mobileCarriers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $mobileCarriers = $dfareportingService->mobileCarriers;
 *  </code>
 */
class Google_Service_Dfareporting_MobileCarriers_Resource extends Google_Service_Resource
{

    /**
     * Gets one mobile carrier by ID. (mobileCarriers.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Mobile carrier ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_MobileCarrier");
    }

    /**
     * Retrieves a list of mobile carriers. (mobileCarriers.listMobileCarriers)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listMobileCarriers($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_MobileCarriersListResponse");
    }
}

/**
 * The "operatingSystemVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $operatingSystemVersions = $dfareportingService->operatingSystemVersions;
 *  </code>
 */
class Google_Service_Dfareporting_OperatingSystemVersions_Resource extends Google_Service_Resource
{

    /**
     * Gets one operating system version by ID. (operatingSystemVersions.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Operating system version ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_OperatingSystemVersion");
    }

    /**
     * Retrieves a list of operating system versions.
     * (operatingSystemVersions.listOperatingSystemVersions)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listOperatingSystemVersions($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_OperatingSystemVersionsListResponse");
    }
}

/**
 * The "operatingSystems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $operatingSystems = $dfareportingService->operatingSystems;
 *  </code>
 */
class Google_Service_Dfareporting_OperatingSystems_Resource extends Google_Service_Resource
{

    /**
     * Gets one operating system by DART ID. (operatingSystems.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $dartId Operating system DART ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $dartId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'dartId' => $dartId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_OperatingSystem");
    }

    /**
     * Retrieves a list of operating systems.
     * (operatingSystems.listOperatingSystems)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listOperatingSystems($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_OperatingSystemsListResponse");
    }
}

/**
 * The "orderDocuments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $orderDocuments = $dfareportingService->orderDocuments;
 *  </code>
 */
class Google_Service_Dfareporting_OrderDocuments_Resource extends Google_Service_Resource
{

    /**
     * Gets one order document by ID. (orderDocuments.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for order documents.
     * @param string $id Order document ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $projectId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_OrderDocument");
    }

    /**
     * Retrieves a list of order documents, possibly filtered.
     * (orderDocuments.listOrderDocuments)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for order documents.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string orderId Select only order documents for specified orders.
     * @opt_param string searchString Allows searching for order documents by name
     * or ID. Wildcards (*) are allowed. For example, "orderdocument*2015" will
     * return order documents with names like "orderdocument June 2015",
     * "orderdocument April 2015", or simply "orderdocument 2015". Most of the
     * searches also add wildcards implicitly at the start and the end of the search
     * string. For example, a search string of "orderdocument" will match order
     * documents with name "my orderdocument", "orderdocument 2015", or simply
     * "orderdocument".
     * @opt_param string ids Select only order documents with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string siteId Select only order documents that are associated with
     * these sites.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param bool approved Select only order documents that have been approved
     * by at least one user.
     */
    public function listOrderDocuments($profileId, $projectId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_OrderDocumentsListResponse");
    }
}

/**
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $orders = $dfareportingService->orders;
 *  </code>
 */
class Google_Service_Dfareporting_Orders_Resource extends Google_Service_Resource
{

    /**
     * Gets one order by ID. (orders.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for orders.
     * @param string $id Order ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $projectId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Order");
    }

    /**
     * Retrieves a list of orders, possibly filtered. (orders.listOrders)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $projectId Project ID for orders.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for orders by name or ID.
     * Wildcards (*) are allowed. For example, "order*2015" will return orders with
     * names like "order June 2015", "order April 2015", or simply "order 2015".
     * Most of the searches also add wildcards implicitly at the start and the end
     * of the search string. For example, a search string of "order" will match
     * orders with name "my order", "order 2015", or simply "order".
     * @opt_param string ids Select only orders with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string siteId Select only orders that are associated with these
     * site IDs.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string sortField Field by which to sort the list.
     */
    public function listOrders($profileId, $projectId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_OrdersListResponse");
    }
}

/**
 * The "placementGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $placementGroups = $dfareportingService->placementGroups;
 *  </code>
 */
class Google_Service_Dfareporting_PlacementGroups_Resource extends Google_Service_Resource
{

    /**
     * Gets one placement group by ID. (placementGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_PlacementGroup");
    }

    /**
     * Inserts a new placement group. (placementGroups.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_PlacementGroup|Google_Service_Dfareporting_PlacementGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_PlacementGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_PlacementGroup");
    }

    /**
     * Retrieves a list of placement groups, possibly filtered.
     * (placementGroups.listPlacementGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string placementStrategyIds Select only placement groups that are
     * associated with these placement strategies.
     * @opt_param bool archived Select only archived placements. Don't set this
     * field to select both archived and non-archived placements.
     * @opt_param string searchString Allows searching for placement groups by name
     * or ID. Wildcards (*) are allowed. For example, "placement*2015" will return
     * placement groups with names like "placement group June 2015", "placement
     * group May 2015", or simply "placements 2015". Most of the searches also add
     * wildcards implicitly at the start and the end of the search string. For
     * example, a search string of "placementgroup" will match placement groups with
     * name "my placementgroup", "placementgroup 2015", or simply "placementgroup".
     * @opt_param string contentCategoryIds Select only placement groups that are
     * associated with these content categories.
     * @opt_param string directorySiteIds Select only placement groups that are
     * associated with these directory sites.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only placement groups that belong to
     * these advertisers.
     * @opt_param string ids Select only placement groups with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string placementGroupType Select only placement groups belonging
     * with this group type. A package is a simple group of placements that acts as
     * a single pricing point for a group of tags. A roadblock is a group of
     * placements that not only acts as a single pricing point but also assumes that
     * all the tags in it will be served at the same time. A roadblock requires one
     * of its assigned placements to be marked as primary for reporting.
     * @opt_param string pricingTypes Select only placement groups with these
     * pricing types.
     * @opt_param string siteIds Select only placement groups that are associated
     * with these sites.
     * @opt_param string campaignIds Select only placement groups that belong to
     * these campaigns.
     */
    public function listPlacementGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_PlacementGroupsListResponse");
    }

    /**
     * Updates an existing placement group. This method supports patch semantics.
     * (placementGroups.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement group ID.
     * @param Google_PlacementGroup|Google_Service_Dfareporting_PlacementGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_PlacementGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_PlacementGroup");
    }

    /**
     * Updates an existing placement group. (placementGroups.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_PlacementGroup|Google_Service_Dfareporting_PlacementGroup $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_PlacementGroup $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_PlacementGroup");
    }
}

/**
 * The "placementStrategies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $placementStrategies = $dfareportingService->placementStrategies;
 *  </code>
 */
class Google_Service_Dfareporting_PlacementStrategies_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing placement strategy. (placementStrategies.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement strategy ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one placement strategy by ID. (placementStrategies.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement strategy ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_PlacementStrategy");
    }

    /**
     * Inserts a new placement strategy. (placementStrategies.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_PlacementStrategy|Google_Service_Dfareporting_PlacementStrategy $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_PlacementStrategy");
    }

    /**
     * Retrieves a list of placement strategies, possibly filtered.
     * (placementStrategies.listPlacementStrategies)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "placementstrategy*2015" will return
     * objects with names like "placementstrategy June 2015", "placementstrategy
     * April 2015", or simply "placementstrategy 2015". Most of the searches also
     * add wildcards implicitly at the start and the end of the search string. For
     * example, a search string of "placementstrategy" will match objects with name
     * "my placementstrategy", "placementstrategy 2015", or simply
     * "placementstrategy".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only placement strategies with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listPlacementStrategies($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_PlacementStrategiesListResponse");
    }

    /**
     * Updates an existing placement strategy. This method supports patch semantics.
     * (placementStrategies.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement strategy ID.
     * @param Google_PlacementStrategy|Google_Service_Dfareporting_PlacementStrategy $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_PlacementStrategy");
    }

    /**
     * Updates an existing placement strategy. (placementStrategies.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_PlacementStrategy|Google_Service_Dfareporting_PlacementStrategy $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_PlacementStrategy");
    }
}

/**
 * The "placements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $placements = $dfareportingService->placements;
 *  </code>
 */
class Google_Service_Dfareporting_Placements_Resource extends Google_Service_Resource
{

    /**
     * Generates tags for a placement. (placements.generatetags)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string tagFormats Tag formats to generate for these placements.
     * @opt_param string placementIds Generate tags for these placements.
     * @opt_param string campaignId Generate placements belonging to this campaign.
     * This is a required field.
     */
    public function generatetags($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('generatetags', [$params], "Google_Service_Dfareporting_PlacementsGenerateTagsResponse");
    }

    /**
     * Gets one placement by ID. (placements.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Placement");
    }

    /**
     * Inserts a new placement. (placements.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Placement|Google_Service_Dfareporting_Placement $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Placement $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Placement");
    }

    /**
     * Retrieves a list of placements, possibly filtered.
     * (placements.listPlacements)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string placementStrategyIds Select only placements that are
     * associated with these placement strategies.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool archived Select only archived placements. Don't set this
     * field to select both archived and non-archived placements.
     * @opt_param string searchString Allows searching for placements by name or ID.
     * Wildcards (*) are allowed. For example, "placement*2015" will return
     * placements with names like "placement June 2015", "placement May 2015", or
     * simply "placements 2015". Most of the searches also add wildcards implicitly
     * at the start and the end of the search string. For example, a search string
     * of "placement" will match placements with name "my placement", "placement
     * 2015", or simply "placement".
     * @opt_param string contentCategoryIds Select only placements that are
     * associated with these content categories.
     * @opt_param string directorySiteIds Select only placements that are associated
     * with these directory sites.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only placements that belong to these
     * advertisers.
     * @opt_param string paymentSource Select only placements with this payment
     * source.
     * @opt_param string ids Select only placements with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string sizeIds Select only placements that are associated with
     * these sizes.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string compatibilities Select only placements that are associated
     * with these compatibilities. WEB and WEB_INTERSTITIAL refer to rendering
     * either on desktop or on mobile devices for regular or interstitial ads
     * respectively. APP and APP_INTERSTITIAL are for rendering in mobile
     * apps.IN_STREAM_VIDEO refers to rendering in in-stream video ads developed
     * with the VAST standard.
     * @opt_param string groupIds Select only placements that belong to these
     * placement groups.
     * @opt_param string pricingTypes Select only placements with these pricing
     * types.
     * @opt_param string siteIds Select only placements that are associated with
     * these sites.
     * @opt_param string campaignIds Select only placements that belong to these
     * campaigns.
     */
    public function listPlacements($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_PlacementsListResponse");
    }

    /**
     * Updates an existing placement. This method supports patch semantics.
     * (placements.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Placement ID.
     * @param Google_Placement|Google_Service_Dfareporting_Placement $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Placement $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Placement");
    }

    /**
     * Updates an existing placement. (placements.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Placement|Google_Service_Dfareporting_Placement $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Placement $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Placement");
    }
}

/**
 * The "platformTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $platformTypes = $dfareportingService->platformTypes;
 *  </code>
 */
class Google_Service_Dfareporting_PlatformTypes_Resource extends Google_Service_Resource
{

    /**
     * Gets one platform type by ID. (platformTypes.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Platform type ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_PlatformType");
    }

    /**
     * Retrieves a list of platform types. (platformTypes.listPlatformTypes)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listPlatformTypes($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_PlatformTypesListResponse");
    }
}

/**
 * The "postalCodes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $postalCodes = $dfareportingService->postalCodes;
 *  </code>
 */
class Google_Service_Dfareporting_PostalCodes_Resource extends Google_Service_Resource
{

    /**
     * Gets one postal code by ID. (postalCodes.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $code Postal code ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $code, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'code' => $code];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_PostalCode");
    }

    /**
     * Retrieves a list of postal codes. (postalCodes.listPostalCodes)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listPostalCodes($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_PostalCodesListResponse");
    }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $projects = $dfareportingService->projects;
 *  </code>
 */
class Google_Service_Dfareporting_Projects_Resource extends Google_Service_Resource
{

    /**
     * Gets one project by ID. (projects.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Project ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Project");
    }

    /**
     * Retrieves a list of projects, possibly filtered. (projects.listProjects)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for projects by name or ID.
     * Wildcards (*) are allowed. For example, "project*2015" will return projects
     * with names like "project June 2015", "project April 2015", or simply "project
     * 2015". Most of the searches also add wildcards implicitly at the start and
     * the end of the search string. For example, a search string of "project" will
     * match projects with name "my project", "project 2015", or simply "project".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string advertiserIds Select only projects with these advertiser
     * IDs.
     * @opt_param string ids Select only projects with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listProjects($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_ProjectsListResponse");
    }
}

/**
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $regions = $dfareportingService->regions;
 *  </code>
 */
class Google_Service_Dfareporting_Regions_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of regions. (regions.listRegions)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listRegions($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_RegionsListResponse");
    }
}

/**
 * The "remarketingListShares" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $remarketingListShares = $dfareportingService->remarketingListShares;
 *  </code>
 */
class Google_Service_Dfareporting_RemarketingListShares_Resource extends Google_Service_Resource
{

    /**
     * Gets one remarketing list share by remarketing list ID.
     * (remarketingListShares.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $remarketingListId Remarketing list ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $remarketingListId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'remarketingListId' => $remarketingListId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_RemarketingListShare");
    }

    /**
     * Updates an existing remarketing list share. This method supports patch
     * semantics. (remarketingListShares.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $remarketingListId Remarketing list ID.
     * @param Google_RemarketingListShare|Google_Service_Dfareporting_RemarketingListShare $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $remarketingListId, Google_Service_Dfareporting_RemarketingListShare $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'remarketingListId' => $remarketingListId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_RemarketingListShare");
    }

    /**
     * Updates an existing remarketing list share. (remarketingListShares.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_RemarketingListShare|Google_Service_Dfareporting_RemarketingListShare $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_RemarketingListShare $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_RemarketingListShare");
    }
}

/**
 * The "remarketingLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $remarketingLists = $dfareportingService->remarketingLists;
 *  </code>
 */
class Google_Service_Dfareporting_RemarketingLists_Resource extends Google_Service_Resource
{

    /**
     * Gets one remarketing list by ID. (remarketingLists.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Remarketing list ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_RemarketingList");
    }

    /**
     * Inserts a new remarketing list. (remarketingLists.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_RemarketingList|Google_Service_Dfareporting_RemarketingList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_RemarketingList");
    }

    /**
     * Retrieves a list of remarketing lists, possibly filtered.
     * (remarketingLists.listRemarketingLists)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $advertiserId Select only remarketing lists owned by this
     *                             advertiser.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string name Allows searching for objects by name or ID. Wildcards
     * (*) are allowed. For example, "remarketing list*2015" will return objects
     * with names like "remarketing list June 2015", "remarketing list April 2015",
     * or simply "remarketing list 2015". Most of the searches also add wildcards
     * implicitly at the start and the end of the search string. For example, a
     * search string of "remarketing list" will match objects with name "my
     * remarketing list", "remarketing list 2015", or simply "remarketing list".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool active Select only active or only inactive remarketing lists.
     * @opt_param string floodlightActivityId Select only remarketing lists that
     * have this floodlight activity ID.
     */
    public function listRemarketingLists($profileId, $advertiserId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_RemarketingListsListResponse");
    }

    /**
     * Updates an existing remarketing list. This method supports patch semantics.
     * (remarketingLists.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Remarketing list ID.
     * @param Google_RemarketingList|Google_Service_Dfareporting_RemarketingList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_RemarketingList");
    }

    /**
     * Updates an existing remarketing list. (remarketingLists.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_RemarketingList|Google_Service_Dfareporting_RemarketingList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_RemarketingList");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $reports = $dfareportingService->reports;
 *  </code>
 */
class Google_Service_Dfareporting_Reports_Resource extends Google_Service_Resource
{

    /**
     * Deletes a report by its ID. (reports.delete)
     *
     * @param string $profileId The DFA user profile ID.
     * @param string $reportId The ID of the report.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($profileId, $reportId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves a report by its ID. (reports.get)
     *
     * @param string $profileId The DFA user profile ID.
     * @param string $reportId The ID of the report.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($profileId, $reportId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Report");
    }

    /**
     * Creates a report. (reports.insert)
     *
     * @param string $profileId The DFA user profile ID.
     * @param Google_Report|Google_Service_Dfareporting_Report $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($profileId, Google_Service_Dfareporting_Report $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Report");
    }

    /**
     * Retrieves list of reports. (reports.listReports)
     *
     * @param string $profileId The DFA user profile ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sortField The field by which to sort the list.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken The value of the nextToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is 'DESCENDING'.
     * @opt_param string scope The scope that defines which results are returned,
     * default is 'MINE'.
     */
    public function listReports($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_ReportList");
    }

    /**
     * Updates a report. This method supports patch semantics. (reports.patch)
     *
     * @param string $profileId The DFA user profile ID.
     * @param string $reportId The ID of the report.
     * @param Google_Report|Google_Service_Dfareporting_Report $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($profileId, $reportId, Google_Service_Dfareporting_Report $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Report");
    }

    /**
     * Runs a report. (reports.run)
     *
     * @param string $profileId The DFA profile ID.
     * @param string $reportId The ID of the report.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool synchronous If set and true, tries to run the report
     * synchronously.
     */
    public function run($profileId, $reportId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId];
        $params = array_merge($params, $optParams);

        return $this->call('run', [$params], "Google_Service_Dfareporting_DfareportingFile");
    }

    /**
     * Updates a report. (reports.update)
     *
     * @param string $profileId The DFA user profile ID.
     * @param string $reportId The ID of the report.
     * @param Google_Report|Google_Service_Dfareporting_Report $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($profileId, $reportId, Google_Service_Dfareporting_Report $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Report");
    }
}

/**
 * The "compatibleFields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $compatibleFields = $dfareportingService->compatibleFields;
 *  </code>
 */
class Google_Service_Dfareporting_ReportsCompatibleFields_Resource extends Google_Service_Resource
{

    /**
     * Returns the fields that are compatible to be selected in the respective
     * sections of a report criteria, given the fields already selected in the input
     * report and user permissions. (compatibleFields.query)
     *
     * @param string $profileId The DFA user profile ID.
     * @param Google_Report|Google_Service_Dfareporting_Report $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function query($profileId, Google_Service_Dfareporting_Report $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_Dfareporting_CompatibleFields");
    }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $files = $dfareportingService->files;
 *  </code>
 */
class Google_Service_Dfareporting_ReportsFiles_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a report file. (files.get)
     *
     * @param string $profileId The DFA profile ID.
     * @param string $reportId The ID of the report.
     * @param string $fileId The ID of the report file.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($profileId, $reportId, $fileId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId, 'fileId' => $fileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_DfareportingFile");
    }

    /**
     * Lists files for a report. (files.listReportsFiles)
     *
     * @param string $profileId The DFA profile ID.
     * @param string $reportId The ID of the parent report.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sortField The field by which to sort the list.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken The value of the nextToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is 'DESCENDING'.
     */
    public function listReportsFiles($profileId, $reportId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'reportId' => $reportId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_FileList");
    }
}

/**
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $sites = $dfareportingService->sites;
 *  </code>
 */
class Google_Service_Dfareporting_Sites_Resource extends Google_Service_Resource
{

    /**
     * Gets one site by ID. (sites.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Site ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Site");
    }

    /**
     * Inserts a new site. (sites.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_Site|Google_Site $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Site $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Site");
    }

    /**
     * Retrieves a list of sites, possibly filtered. (sites.listSites)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool acceptsInterstitialPlacements This search filter is no longer
     * supported and will have no effect on the results returned.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param string searchString Allows searching for objects by name, ID or
     * keyName. Wildcards (*) are allowed. For example, "site*2015" will return
     * objects with names like "site June 2015", "site April 2015", or simply "site
     * 2015". Most of the searches also add wildcards implicitly at the start and
     * the end of the search string. For example, a search string of "site" will
     * match objects with name "my site", "site 2015", or simply "site".
     * @opt_param string subaccountId Select only sites with this subaccount ID.
     * @opt_param string directorySiteIds Select only sites with these directory
     * site IDs.
     * @opt_param bool acceptsInStreamVideoPlacements This search filter is no
     * longer supported and will have no effect on the results returned.
     * @opt_param string ids Select only sites with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param bool acceptsPublisherPaidPlacements Select only sites that accept
     * publisher paid placements.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param bool adWordsSite Select only AdWords sites.
     * @opt_param bool unmappedSite Select only sites that have not been mapped to a
     * directory site.
     * @opt_param bool approved Select only approved sites.
     * @opt_param string campaignIds Select only sites with these campaign IDs.
     */
    public function listSites($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_SitesListResponse");
    }

    /**
     * Updates an existing site. This method supports patch semantics. (sites.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Site ID.
     * @param Google_Service_Dfareporting_Site|Google_Site $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Site $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Site");
    }

    /**
     * Updates an existing site. (sites.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_Site|Google_Site $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Site $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Site");
    }
}

/**
 * The "sizes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $sizes = $dfareportingService->sizes;
 *  </code>
 */
class Google_Service_Dfareporting_Sizes_Resource extends Google_Service_Resource
{

    /**
     * Gets one size by ID. (sizes.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Size ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Size");
    }

    /**
     * Inserts a new size. (sizes.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_Size|Google_Size $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Size $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Size");
    }

    /**
     * Retrieves a list of sizes, possibly filtered. (sizes.listSizes)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param bool iabStandard Select only IAB standard sizes.
     * @opt_param int width Select only sizes with this width.
     * @opt_param string ids Select only sizes with these IDs.
     * @opt_param int height Select only sizes with this height.
     */
    public function listSizes($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_SizesListResponse");
    }
}

/**
 * The "subaccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $subaccounts = $dfareportingService->subaccounts;
 *  </code>
 */
class Google_Service_Dfareporting_Subaccounts_Resource extends Google_Service_Resource
{

    /**
     * Gets one subaccount by ID. (subaccounts.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Subaccount ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_Subaccount");
    }

    /**
     * Inserts a new subaccount. (subaccounts.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_Subaccount|Google_Subaccount $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_Subaccount $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_Subaccount");
    }

    /**
     * Gets a list of subaccounts, possibly filtered. (subaccounts.listSubaccounts)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "subaccount*2015" will return objects
     * with names like "subaccount June 2015", "subaccount April 2015", or simply
     * "subaccount 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "subaccount" will match objects with name "my subaccount", "subaccount 2015",
     * or simply "subaccount".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only subaccounts with these IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     */
    public function listSubaccounts($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_SubaccountsListResponse");
    }

    /**
     * Updates an existing subaccount. This method supports patch semantics.
     * (subaccounts.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Subaccount ID.
     * @param Google_Service_Dfareporting_Subaccount|Google_Subaccount $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_Subaccount $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_Subaccount");
    }

    /**
     * Updates an existing subaccount. (subaccounts.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_Subaccount|Google_Subaccount $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_Subaccount $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_Subaccount");
    }
}

/**
 * The "targetableRemarketingLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $targetableRemarketingLists = $dfareportingService->targetableRemarketingLists;
 *  </code>
 */
class Google_Service_Dfareporting_TargetableRemarketingLists_Resource extends Google_Service_Resource
{

    /**
     * Gets one remarketing list by ID. (targetableRemarketingLists.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id Remarketing list ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_TargetableRemarketingList");
    }

    /**
     * Retrieves a list of targetable remarketing lists, possibly filtered.
     * (targetableRemarketingLists.listTargetableRemarketingLists)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $advertiserId Select only targetable remarketing lists
     *                             targetable by these advertisers.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string name Allows searching for objects by name or ID. Wildcards
     * (*) are allowed. For example, "remarketing list*2015" will return objects
     * with names like "remarketing list June 2015", "remarketing list April 2015",
     * or simply "remarketing list 2015". Most of the searches also add wildcards
     * implicitly at the start and the end of the search string. For example, a
     * search string of "remarketing list" will match objects with name "my
     * remarketing list", "remarketing list 2015", or simply "remarketing list".
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool active Select only active or only inactive targetable
     * remarketing lists.
     */
    public function listTargetableRemarketingLists($profileId, $advertiserId, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_TargetableRemarketingListsListResponse");
    }
}

/**
 * The "userProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userProfiles = $dfareportingService->userProfiles;
 *  </code>
 */
class Google_Service_Dfareporting_UserProfiles_Resource extends Google_Service_Resource
{

    /**
     * Gets one user profile by ID. (userProfiles.get)
     *
     * @param string $profileId The user profile ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_UserProfile");
    }

    /**
     * Retrieves list of user profiles for a user. (userProfiles.listUserProfiles)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listUserProfiles($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_UserProfileList");
    }
}

/**
 * The "userRolePermissionGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userRolePermissionGroups = $dfareportingService->userRolePermissionGroups;
 *  </code>
 */
class Google_Service_Dfareporting_UserRolePermissionGroups_Resource extends Google_Service_Resource
{

    /**
     * Gets one user role permission group by ID. (userRolePermissionGroups.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User role permission group ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_UserRolePermissionGroup");
    }

    /**
     * Gets a list of all supported user role permission groups.
     * (userRolePermissionGroups.listUserRolePermissionGroups)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function listUserRolePermissionGroups($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_UserRolePermissionGroupsListResponse");
    }
}

/**
 * The "userRolePermissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userRolePermissions = $dfareportingService->userRolePermissions;
 *  </code>
 */
class Google_Service_Dfareporting_UserRolePermissions_Resource extends Google_Service_Resource
{

    /**
     * Gets one user role permission by ID. (userRolePermissions.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User role permission ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_UserRolePermission");
    }

    /**
     * Gets a list of user role permissions, possibly filtered.
     * (userRolePermissions.listUserRolePermissions)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string ids Select only user role permissions with these IDs.
     */
    public function listUserRolePermissions($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_UserRolePermissionsListResponse");
    }
}

/**
 * The "userRoles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userRoles = $dfareportingService->userRoles;
 *  </code>
 */
class Google_Service_Dfareporting_UserRoles_Resource extends Google_Service_Resource
{

    /**
     * Deletes an existing user role. (userRoles.delete)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User role ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function delete($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Gets one user role by ID. (userRoles.get)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User role ID.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function get($profileId, $id, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dfareporting_UserRole");
    }

    /**
     * Inserts a new user role. (userRoles.insert)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_UserRole|Google_UserRole $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function insert($profileId, Google_Service_Dfareporting_UserRole $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Dfareporting_UserRole");
    }

    /**
     * Retrieves a list of user roles, possibly filtered. (userRoles.listUserRoles)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string searchString Allows searching for objects by name or ID.
     * Wildcards (*) are allowed. For example, "userrole*2015" will return objects
     * with names like "userrole June 2015", "userrole April 2015", or simply
     * "userrole 2015". Most of the searches also add wildcards implicitly at the
     * start and the end of the search string. For example, a search string of
     * "userrole" will match objects with name "my userrole", "userrole 2015", or
     * simply "userrole".
     * @opt_param string subaccountId Select only user roles that belong to this
     * subaccount.
     * @opt_param string sortField Field by which to sort the list.
     * @opt_param string ids Select only user roles with the specified IDs.
     * @opt_param int maxResults Maximum number of results to return.
     * @opt_param string pageToken Value of the nextPageToken from the previous
     * result page.
     * @opt_param string sortOrder Order of sorted results, default is ASCENDING.
     * @opt_param bool accountUserRoleOnly Select only account level user roles not
     * associated with any specific subaccount.
     */
    public function listUserRoles($profileId, $optParams = [])
    {
        $params = ['profileId' => $profileId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dfareporting_UserRolesListResponse");
    }

    /**
     * Updates an existing user role. This method supports patch semantics.
     * (userRoles.patch)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param string $id User role ID.
     * @param Google_Service_Dfareporting_UserRole|Google_UserRole $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($profileId, $id, Google_Service_Dfareporting_UserRole $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dfareporting_UserRole");
    }

    /**
     * Updates an existing user role. (userRoles.update)
     *
     * @param string $profileId User profile ID associated with this request.
     * @param Google_Service_Dfareporting_UserRole|Google_UserRole $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($profileId, Google_Service_Dfareporting_UserRole $postBody, $optParams = [])
    {
        $params = ['profileId' => $profileId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dfareporting_UserRole");
    }
}


/**
 * Class Google_Service_Dfareporting_Account
 */
class Google_Service_Dfareporting_Account extends Google_Collection
{
    public $accountPermissionIds;
    public $accountProfile;
    public $active;
    public $activeAdsLimitTier;
    public $activeViewOptOut;
    public $availablePermissionIds;
    public $comscoreVceEnabled;
    public $countryId;
    public $currencyId;
    public $defaultCreativeSizeId;
    public $description;
    public $id;
    public $kind;
    public $locale;
    public $maximumImageSize;
    public $name;
    public $nielsenOcrEnabled;
    public $teaserSizeLimit;
    protected $collection_key = 'availablePermissionIds';
    protected $internal_gapi_mappings = [];
    protected $reportsConfigurationType = 'Google_Service_Dfareporting_ReportsConfiguration';
    protected $reportsConfigurationDataType = '';

    /**
     * @return mixed
     */
    public function getAccountPermissionIds()
    {
        return $this->accountPermissionIds;
    }

    /**
     * @param $accountPermissionIds
     */
    public function setAccountPermissionIds($accountPermissionIds)
    {
        $this->accountPermissionIds = $accountPermissionIds;
    }

    /**
     * @return mixed
     */
    public function getAccountProfile()
    {
        return $this->accountProfile;
    }

    /**
     * @param $accountProfile
     */
    public function setAccountProfile($accountProfile)
    {
        $this->accountProfile = $accountProfile;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getActiveAdsLimitTier()
    {
        return $this->activeAdsLimitTier;
    }

    /**
     * @param $activeAdsLimitTier
     */
    public function setActiveAdsLimitTier($activeAdsLimitTier)
    {
        $this->activeAdsLimitTier = $activeAdsLimitTier;
    }

    /**
     * @return mixed
     */
    public function getActiveViewOptOut()
    {
        return $this->activeViewOptOut;
    }

    /**
     * @param $activeViewOptOut
     */
    public function setActiveViewOptOut($activeViewOptOut)
    {
        $this->activeViewOptOut = $activeViewOptOut;
    }

    /**
     * @return mixed
     */
    public function getAvailablePermissionIds()
    {
        return $this->availablePermissionIds;
    }

    /**
     * @param $availablePermissionIds
     */
    public function setAvailablePermissionIds($availablePermissionIds)
    {
        $this->availablePermissionIds = $availablePermissionIds;
    }

    /**
     * @return mixed
     */
    public function getComscoreVceEnabled()
    {
        return $this->comscoreVceEnabled;
    }

    /**
     * @param $comscoreVceEnabled
     */
    public function setComscoreVceEnabled($comscoreVceEnabled)
    {
        $this->comscoreVceEnabled = $comscoreVceEnabled;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return mixed
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return mixed
     */
    public function getDefaultCreativeSizeId()
    {
        return $this->defaultCreativeSizeId;
    }

    /**
     * @param $defaultCreativeSizeId
     */
    public function setDefaultCreativeSizeId($defaultCreativeSizeId)
    {
        $this->defaultCreativeSizeId = $defaultCreativeSizeId;
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
    public function getMaximumImageSize()
    {
        return $this->maximumImageSize;
    }

    /**
     * @param $maximumImageSize
     */
    public function setMaximumImageSize($maximumImageSize)
    {
        $this->maximumImageSize = $maximumImageSize;
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
    public function getNielsenOcrEnabled()
    {
        return $this->nielsenOcrEnabled;
    }

    /**
     * @param $nielsenOcrEnabled
     */
    public function setNielsenOcrEnabled($nielsenOcrEnabled)
    {
        $this->nielsenOcrEnabled = $nielsenOcrEnabled;
    }

    /**
     * @param Google_Service_Dfareporting_ReportsConfiguration $reportsConfiguration
     */
    public function setReportsConfiguration(Google_Service_Dfareporting_ReportsConfiguration $reportsConfiguration)
    {
        $this->reportsConfiguration = $reportsConfiguration;
    }

    /**
     * @return mixed
     */
    public function getReportsConfiguration()
    {
        return $this->reportsConfiguration;
    }

    /**
     * @return mixed
     */
    public function getTeaserSizeLimit()
    {
        return $this->teaserSizeLimit;
    }

    /**
     * @param $teaserSizeLimit
     */
    public function setTeaserSizeLimit($teaserSizeLimit)
    {
        $this->teaserSizeLimit = $teaserSizeLimit;
    }
}

/**
 * Class Google_Service_Dfareporting_AccountActiveAdSummary
 */
class Google_Service_Dfareporting_AccountActiveAdSummary extends Google_Model
{
    public $accountId;
    public $activeAds;
    public $activeAdsLimitTier;
    public $availableAds;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActiveAds()
    {
        return $this->activeAds;
    }

    /**
     * @param $activeAds
     */
    public function setActiveAds($activeAds)
    {
        $this->activeAds = $activeAds;
    }

    /**
     * @return mixed
     */
    public function getActiveAdsLimitTier()
    {
        return $this->activeAdsLimitTier;
    }

    /**
     * @param $activeAdsLimitTier
     */
    public function setActiveAdsLimitTier($activeAdsLimitTier)
    {
        $this->activeAdsLimitTier = $activeAdsLimitTier;
    }

    /**
     * @return mixed
     */
    public function getAvailableAds()
    {
        return $this->availableAds;
    }

    /**
     * @param $availableAds
     */
    public function setAvailableAds($availableAds)
    {
        $this->availableAds = $availableAds;
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
 * Class Google_Service_Dfareporting_AccountPermission
 */
class Google_Service_Dfareporting_AccountPermission extends Google_Collection
{
    public $accountProfiles;
    public $id;
    public $kind;
    public $level;
    public $name;
    public $permissionGroupId;
    protected $collection_key = 'accountProfiles';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountProfiles()
    {
        return $this->accountProfiles;
    }

    /**
     * @param $accountProfiles
     */
    public function setAccountProfiles($accountProfiles)
    {
        $this->accountProfiles = $accountProfiles;
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
    public function getPermissionGroupId()
    {
        return $this->permissionGroupId;
    }

    /**
     * @param $permissionGroupId
     */
    public function setPermissionGroupId($permissionGroupId)
    {
        $this->permissionGroupId = $permissionGroupId;
    }
}

/**
 * Class Google_Service_Dfareporting_AccountPermissionGroup
 */
class Google_Service_Dfareporting_AccountPermissionGroup extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Dfareporting_AccountPermissionGroupsListResponse
 */
class Google_Service_Dfareporting_AccountPermissionGroupsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'accountPermissionGroups';
    protected $internal_gapi_mappings = [];
    protected $accountPermissionGroupsType = 'Google_Service_Dfareporting_AccountPermissionGroup';
    protected $accountPermissionGroupsDataType = 'array';

    /**
     * @param $accountPermissionGroups
     */
    public function setAccountPermissionGroups($accountPermissionGroups)
    {
        $this->accountPermissionGroups = $accountPermissionGroups;
    }

    /**
     * @return mixed
     */
    public function getAccountPermissionGroups()
    {
        return $this->accountPermissionGroups;
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
 * Class Google_Service_Dfareporting_AccountPermissionsListResponse
 */
class Google_Service_Dfareporting_AccountPermissionsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'accountPermissions';
    protected $internal_gapi_mappings = [];
    protected $accountPermissionsType = 'Google_Service_Dfareporting_AccountPermission';
    protected $accountPermissionsDataType = 'array';

    /**
     * @param $accountPermissions
     */
    public function setAccountPermissions($accountPermissions)
    {
        $this->accountPermissions = $accountPermissions;
    }

    /**
     * @return mixed
     */
    public function getAccountPermissions()
    {
        return $this->accountPermissions;
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
 * Class Google_Service_Dfareporting_AccountUserProfile
 */
class Google_Service_Dfareporting_AccountUserProfile extends Google_Model
{
    public $accountId;
    public $active;
    public $comments;
    public $email;
    public $id;
    public $kind;
    public $locale;
    public $name;
    public $subaccountId;
    public $traffickerType;
    public $userAccessType;
    public $userRoleId;
    protected $internal_gapi_mappings = [];
    protected $advertiserFilterType = 'Google_Service_Dfareporting_ObjectFilter';
    protected $advertiserFilterDataType = '';
    protected $campaignFilterType = 'Google_Service_Dfareporting_ObjectFilter';
    protected $campaignFilterDataType = '';
    protected $siteFilterType = 'Google_Service_Dfareporting_ObjectFilter';
    protected $siteFilterDataType = '';
    protected $userRoleFilterType = 'Google_Service_Dfareporting_ObjectFilter';
    protected $userRoleFilterDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @param Google_Service_Dfareporting_ObjectFilter $advertiserFilter
     */
    public function setAdvertiserFilter(Google_Service_Dfareporting_ObjectFilter $advertiserFilter)
    {
        $this->advertiserFilter = $advertiserFilter;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserFilter()
    {
        return $this->advertiserFilter;
    }

    /**
     * @param Google_Service_Dfareporting_ObjectFilter $campaignFilter
     */
    public function setCampaignFilter(Google_Service_Dfareporting_ObjectFilter $campaignFilter)
    {
        $this->campaignFilter = $campaignFilter;
    }

    /**
     * @return mixed
     */
    public function getCampaignFilter()
    {
        return $this->campaignFilter;
    }

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
     * @param Google_Service_Dfareporting_ObjectFilter $siteFilter
     */
    public function setSiteFilter(Google_Service_Dfareporting_ObjectFilter $siteFilter)
    {
        $this->siteFilter = $siteFilter;
    }

    /**
     * @return mixed
     */
    public function getSiteFilter()
    {
        return $this->siteFilter;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTraffickerType()
    {
        return $this->traffickerType;
    }

    /**
     * @param $traffickerType
     */
    public function setTraffickerType($traffickerType)
    {
        $this->traffickerType = $traffickerType;
    }

    /**
     * @return mixed
     */
    public function getUserAccessType()
    {
        return $this->userAccessType;
    }

    /**
     * @param $userAccessType
     */
    public function setUserAccessType($userAccessType)
    {
        $this->userAccessType = $userAccessType;
    }

    /**
     * @param Google_Service_Dfareporting_ObjectFilter $userRoleFilter
     */
    public function setUserRoleFilter(Google_Service_Dfareporting_ObjectFilter $userRoleFilter)
    {
        $this->userRoleFilter = $userRoleFilter;
    }

    /**
     * @return mixed
     */
    public function getUserRoleFilter()
    {
        return $this->userRoleFilter;
    }

    /**
     * @return mixed
     */
    public function getUserRoleId()
    {
        return $this->userRoleId;
    }

    /**
     * @param $userRoleId
     */
    public function setUserRoleId($userRoleId)
    {
        $this->userRoleId = $userRoleId;
    }
}

/**
 * Class Google_Service_Dfareporting_AccountUserProfilesListResponse
 */
class Google_Service_Dfareporting_AccountUserProfilesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'accountUserProfiles';
    protected $internal_gapi_mappings = [];
    protected $accountUserProfilesType = 'Google_Service_Dfareporting_AccountUserProfile';
    protected $accountUserProfilesDataType = 'array';

    /**
     * @param $accountUserProfiles
     */
    public function setAccountUserProfiles($accountUserProfiles)
    {
        $this->accountUserProfiles = $accountUserProfiles;
    }

    /**
     * @return mixed
     */
    public function getAccountUserProfiles()
    {
        return $this->accountUserProfiles;
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
 * Class Google_Service_Dfareporting_AccountsListResponse
 */
class Google_Service_Dfareporting_AccountsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'accounts';
    protected $internal_gapi_mappings = [];
    protected $accountsType = 'Google_Service_Dfareporting_Account';
    protected $accountsDataType = 'array';

    /**
     * @param $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @return mixed
     */
    public function getAccounts()
    {
        return $this->accounts;
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
 * Class Google_Service_Dfareporting_Activities
 */
class Google_Service_Dfareporting_Activities extends Google_Collection
{
    public $kind;
    public $metricNames;
    protected $collection_key = 'metricNames';
    protected $internal_gapi_mappings = [];
    protected $filtersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $filtersDataType = 'array';

    /**
     * @param $filters
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
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
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }
}

/**
 * Class Google_Service_Dfareporting_Ad
 */
class Google_Service_Dfareporting_Ad extends Google_Collection
{
    public $accountId;
    public $active;
    public $advertiserId;
    public $archived;
    public $audienceSegmentId;
    public $campaignId;
    public $comments;
    public $compatibility;
    public $dynamicClickTracker;
    public $endTime;
    public $id;
    public $kind;
    public $name;
    public $sslCompliant;
    public $sslRequired;
    public $startTime;
    public $subaccountId;
    public $type;
    protected $collection_key = 'placementAssignments';
    protected $internal_gapi_mappings = [
        "remarketingListExpression" => "remarketing_list_expression",
    ];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $campaignIdDimensionValueDataType = '';
    protected $clickThroughUrlType = 'Google_Service_Dfareporting_ClickThroughUrl';
    protected $clickThroughUrlDataType = '';
    protected $clickThroughUrlSuffixPropertiesType = 'Google_Service_Dfareporting_ClickThroughUrlSuffixProperties';
    protected $clickThroughUrlSuffixPropertiesDataType = '';
    protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $createInfoDataType = '';
    protected $creativeGroupAssignmentsType = 'Google_Service_Dfareporting_CreativeGroupAssignment';
    protected $creativeGroupAssignmentsDataType = 'array';
    protected $creativeRotationType = 'Google_Service_Dfareporting_CreativeRotation';
    protected $creativeRotationDataType = '';
    protected $dayPartTargetingType = 'Google_Service_Dfareporting_DayPartTargeting';
    protected $dayPartTargetingDataType = '';
    protected $defaultClickThroughEventTagPropertiesType = 'Google_Service_Dfareporting_DefaultClickThroughEventTagProperties';
    protected $defaultClickThroughEventTagPropertiesDataType = '';
    protected $deliveryScheduleType = 'Google_Service_Dfareporting_DeliverySchedule';
    protected $deliveryScheduleDataType = '';
    protected $eventTagOverridesType = 'Google_Service_Dfareporting_EventTagOverride';
    protected $eventTagOverridesDataType = 'array';
    protected $geoTargetingType = 'Google_Service_Dfareporting_GeoTargeting';
    protected $geoTargetingDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $keyValueTargetingExpressionType = 'Google_Service_Dfareporting_KeyValueTargetingExpression';
    protected $keyValueTargetingExpressionDataType = '';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $placementAssignmentsType = 'Google_Service_Dfareporting_PlacementAssignment';
    protected $placementAssignmentsDataType = 'array';
    protected $remarketingListExpressionType = 'Google_Service_Dfareporting_ListTargetingExpression';
    protected $remarketingListExpressionDataType = '';
    protected $sizeType = 'Google_Service_Dfareporting_Size';
    protected $sizeDataType = '';
    protected $technologyTargetingType = 'Google_Service_Dfareporting_TechnologyTargeting';
    protected $technologyTargetingDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getAudienceSegmentId()
    {
        return $this->audienceSegmentId;
    }

    /**
     * @param $audienceSegmentId
     */
    public function setAudienceSegmentId($audienceSegmentId)
    {
        $this->audienceSegmentId = $audienceSegmentId;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue
     */
    public function setCampaignIdDimensionValue(Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue)
    {
        $this->campaignIdDimensionValue = $campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCampaignIdDimensionValue()
    {
        return $this->campaignIdDimensionValue;
    }

    /**
     * @param Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl
     */
    public function setClickThroughUrl(Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl)
    {
        $this->clickThroughUrl = $clickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrl()
    {
        return $this->clickThroughUrl;
    }

    /**
     * @param Google_Service_Dfareporting_ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties
     */
    public function setClickThroughUrlSuffixProperties(Google_Service_Dfareporting_ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties)
    {
        $this->clickThroughUrlSuffixProperties = $clickThroughUrlSuffixProperties;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrlSuffixProperties()
    {
        return $this->clickThroughUrlSuffixProperties;
    }

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
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * @param $compatibility
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $createInfo
     */
    public function setCreateInfo(Google_Service_Dfareporting_LastModifiedInfo $createInfo)
    {
        $this->createInfo = $createInfo;
    }

    /**
     * @return mixed
     */
    public function getCreateInfo()
    {
        return $this->createInfo;
    }

    /**
     * @param $creativeGroupAssignments
     */
    public function setCreativeGroupAssignments($creativeGroupAssignments)
    {
        $this->creativeGroupAssignments = $creativeGroupAssignments;
    }

    /**
     * @return mixed
     */
    public function getCreativeGroupAssignments()
    {
        return $this->creativeGroupAssignments;
    }

    /**
     * @param Google_Service_Dfareporting_CreativeRotation $creativeRotation
     */
    public function setCreativeRotation(Google_Service_Dfareporting_CreativeRotation $creativeRotation)
    {
        $this->creativeRotation = $creativeRotation;
    }

    /**
     * @return mixed
     */
    public function getCreativeRotation()
    {
        return $this->creativeRotation;
    }

    /**
     * @param Google_Service_Dfareporting_DayPartTargeting $dayPartTargeting
     */
    public function setDayPartTargeting(Google_Service_Dfareporting_DayPartTargeting $dayPartTargeting)
    {
        $this->dayPartTargeting = $dayPartTargeting;
    }

    /**
     * @return mixed
     */
    public function getDayPartTargeting()
    {
        return $this->dayPartTargeting;
    }

    /**
     * @param Google_Service_Dfareporting_DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties
     */
    public function setDefaultClickThroughEventTagProperties(Google_Service_Dfareporting_DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties)
    {
        $this->defaultClickThroughEventTagProperties = $defaultClickThroughEventTagProperties;
    }

    /**
     * @return mixed
     */
    public function getDefaultClickThroughEventTagProperties()
    {
        return $this->defaultClickThroughEventTagProperties;
    }

    /**
     * @param Google_Service_Dfareporting_DeliverySchedule $deliverySchedule
     */
    public function setDeliverySchedule(Google_Service_Dfareporting_DeliverySchedule $deliverySchedule)
    {
        $this->deliverySchedule = $deliverySchedule;
    }

    /**
     * @return mixed
     */
    public function getDeliverySchedule()
    {
        return $this->deliverySchedule;
    }

    /**
     * @return mixed
     */
    public function getDynamicClickTracker()
    {
        return $this->dynamicClickTracker;
    }

    /**
     * @param $dynamicClickTracker
     */
    public function setDynamicClickTracker($dynamicClickTracker)
    {
        $this->dynamicClickTracker = $dynamicClickTracker;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @param $eventTagOverrides
     */
    public function setEventTagOverrides($eventTagOverrides)
    {
        $this->eventTagOverrides = $eventTagOverrides;
    }

    /**
     * @return mixed
     */
    public function getEventTagOverrides()
    {
        return $this->eventTagOverrides;
    }

    /**
     * @param Google_Service_Dfareporting_GeoTargeting $geoTargeting
     */
    public function setGeoTargeting(Google_Service_Dfareporting_GeoTargeting $geoTargeting)
    {
        $this->geoTargeting = $geoTargeting;
    }

    /**
     * @return mixed
     */
    public function getGeoTargeting()
    {
        return $this->geoTargeting;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @param Google_Service_Dfareporting_KeyValueTargetingExpression $keyValueTargetingExpression
     */
    public function setKeyValueTargetingExpression(Google_Service_Dfareporting_KeyValueTargetingExpression $keyValueTargetingExpression)
    {
        $this->keyValueTargetingExpression = $keyValueTargetingExpression;
    }

    /**
     * @return mixed
     */
    public function getKeyValueTargetingExpression()
    {
        return $this->keyValueTargetingExpression;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
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
     * @param $placementAssignments
     */
    public function setPlacementAssignments($placementAssignments)
    {
        $this->placementAssignments = $placementAssignments;
    }

    /**
     * @return mixed
     */
    public function getPlacementAssignments()
    {
        return $this->placementAssignments;
    }

    /**
     * @param Google_Service_Dfareporting_ListTargetingExpression $remarketingListExpression
     */
    public function setRemarketingListExpression(Google_Service_Dfareporting_ListTargetingExpression $remarketingListExpression)
    {
        $this->remarketingListExpression = $remarketingListExpression;
    }

    /**
     * @return mixed
     */
    public function getRemarketingListExpression()
    {
        return $this->remarketingListExpression;
    }

    /**
     * @param Google_Service_Dfareporting_Size $size
     */
    public function setSize(Google_Service_Dfareporting_Size $size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param $sslRequired
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @param Google_Service_Dfareporting_TechnologyTargeting $technologyTargeting
     */
    public function setTechnologyTargeting(Google_Service_Dfareporting_TechnologyTargeting $technologyTargeting)
    {
        $this->technologyTargeting = $technologyTargeting;
    }

    /**
     * @return mixed
     */
    public function getTechnologyTargeting()
    {
        return $this->technologyTargeting;
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
 * Class Google_Service_Dfareporting_AdSlot
 */
class Google_Service_Dfareporting_AdSlot extends Google_Model
{
    public $comment;
    public $compatibility;
    public $height;
    public $linkedPlacementId;
    public $name;
    public $paymentSourceType;
    public $primary;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * @param $compatibility
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;
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
    public function getLinkedPlacementId()
    {
        return $this->linkedPlacementId;
    }

    /**
     * @param $linkedPlacementId
     */
    public function setLinkedPlacementId($linkedPlacementId)
    {
        $this->linkedPlacementId = $linkedPlacementId;
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
    public function getPaymentSourceType()
    {
        return $this->paymentSourceType;
    }

    /**
     * @param $paymentSourceType
     */
    public function setPaymentSourceType($paymentSourceType)
    {
        $this->paymentSourceType = $paymentSourceType;
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
 * Class Google_Service_Dfareporting_AdsListResponse
 */
class Google_Service_Dfareporting_AdsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'ads';
    protected $internal_gapi_mappings = [];
    protected $adsType = 'Google_Service_Dfareporting_Ad';
    protected $adsDataType = 'array';

    /**
     * @param $ads
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
    }

    /**
     * @return mixed
     */
    public function getAds()
    {
        return $this->ads;
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
 * Class Google_Service_Dfareporting_Advertiser
 */
class Google_Service_Dfareporting_Advertiser extends Google_Model
{
    public $accountId;
    public $advertiserGroupId;
    public $clickThroughUrlSuffix;
    public $defaultClickThroughEventTagId;
    public $defaultEmail;
    public $floodlightConfigurationId;
    public $id;
    public $kind;
    public $name;
    public $originalFloodlightConfigurationId;
    public $status;
    public $subaccountId;
    protected $internal_gapi_mappings = [];
    protected $floodlightConfigurationIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightConfigurationIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserGroupId()
    {
        return $this->advertiserGroupId;
    }

    /**
     * @param $advertiserGroupId
     */
    public function setAdvertiserGroupId($advertiserGroupId)
    {
        $this->advertiserGroupId = $advertiserGroupId;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrlSuffix()
    {
        return $this->clickThroughUrlSuffix;
    }

    /**
     * @param $clickThroughUrlSuffix
     */
    public function setClickThroughUrlSuffix($clickThroughUrlSuffix)
    {
        $this->clickThroughUrlSuffix = $clickThroughUrlSuffix;
    }

    /**
     * @return mixed
     */
    public function getDefaultClickThroughEventTagId()
    {
        return $this->defaultClickThroughEventTagId;
    }

    /**
     * @param $defaultClickThroughEventTagId
     */
    public function setDefaultClickThroughEventTagId($defaultClickThroughEventTagId)
    {
        $this->defaultClickThroughEventTagId = $defaultClickThroughEventTagId;
    }

    /**
     * @return mixed
     */
    public function getDefaultEmail()
    {
        return $this->defaultEmail;
    }

    /**
     * @param $defaultEmail
     */
    public function setDefaultEmail($defaultEmail)
    {
        $this->defaultEmail = $defaultEmail;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationId()
    {
        return $this->floodlightConfigurationId;
    }

    /**
     * @param $floodlightConfigurationId
     */
    public function setFloodlightConfigurationId($floodlightConfigurationId)
    {
        $this->floodlightConfigurationId = $floodlightConfigurationId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue
     */
    public function setFloodlightConfigurationIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue)
    {
        $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationIdDimensionValue()
    {
        return $this->floodlightConfigurationIdDimensionValue;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
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
    public function getOriginalFloodlightConfigurationId()
    {
        return $this->originalFloodlightConfigurationId;
    }

    /**
     * @param $originalFloodlightConfigurationId
     */
    public function setOriginalFloodlightConfigurationId($originalFloodlightConfigurationId)
    {
        $this->originalFloodlightConfigurationId = $originalFloodlightConfigurationId;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_AdvertiserGroup
 */
class Google_Service_Dfareporting_AdvertiserGroup extends Google_Model
{
    public $accountId;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
}

/**
 * Class Google_Service_Dfareporting_AdvertiserGroupsListResponse
 */
class Google_Service_Dfareporting_AdvertiserGroupsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'advertiserGroups';
    protected $internal_gapi_mappings = [];
    protected $advertiserGroupsType = 'Google_Service_Dfareporting_AdvertiserGroup';
    protected $advertiserGroupsDataType = 'array';

    /**
     * @param $advertiserGroups
     */
    public function setAdvertiserGroups($advertiserGroups)
    {
        $this->advertiserGroups = $advertiserGroups;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserGroups()
    {
        return $this->advertiserGroups;
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
 * Class Google_Service_Dfareporting_AdvertisersListResponse
 */
class Google_Service_Dfareporting_AdvertisersListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'advertisers';
    protected $internal_gapi_mappings = [];
    protected $advertisersType = 'Google_Service_Dfareporting_Advertiser';
    protected $advertisersDataType = 'array';

    /**
     * @param $advertisers
     */
    public function setAdvertisers($advertisers)
    {
        $this->advertisers = $advertisers;
    }

    /**
     * @return mixed
     */
    public function getAdvertisers()
    {
        return $this->advertisers;
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
 * Class Google_Service_Dfareporting_AudienceSegment
 */
class Google_Service_Dfareporting_AudienceSegment extends Google_Model
{
    public $allocation;
    public $id;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAllocation()
    {
        return $this->allocation;
    }

    /**
     * @param $allocation
     */
    public function setAllocation($allocation)
    {
        $this->allocation = $allocation;
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
 * Class Google_Service_Dfareporting_AudienceSegmentGroup
 */
class Google_Service_Dfareporting_AudienceSegmentGroup extends Google_Collection
{
    public $id;
    public $name;
    protected $collection_key = 'audienceSegments';
    protected $internal_gapi_mappings = [];
    protected $audienceSegmentsType = 'Google_Service_Dfareporting_AudienceSegment';
    protected $audienceSegmentsDataType = 'array';

    /**
     * @param $audienceSegments
     */
    public function setAudienceSegments($audienceSegments)
    {
        $this->audienceSegments = $audienceSegments;
    }

    /**
     * @return mixed
     */
    public function getAudienceSegments()
    {
        return $this->audienceSegments;
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
 * Class Google_Service_Dfareporting_Browser
 */
class Google_Service_Dfareporting_Browser extends Google_Model
{
    public $browserVersionId;
    public $dartId;
    public $kind;
    public $majorVersion;
    public $minorVersion;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBrowserVersionId()
    {
        return $this->browserVersionId;
    }

    /**
     * @param $browserVersionId
     */
    public function setBrowserVersionId($browserVersionId)
    {
        $this->browserVersionId = $browserVersionId;
    }

    /**
     * @return mixed
     */
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
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
    public function getMajorVersion()
    {
        return $this->majorVersion;
    }

    /**
     * @param $majorVersion
     */
    public function setMajorVersion($majorVersion)
    {
        $this->majorVersion = $majorVersion;
    }

    /**
     * @return mixed
     */
    public function getMinorVersion()
    {
        return $this->minorVersion;
    }

    /**
     * @param $minorVersion
     */
    public function setMinorVersion($minorVersion)
    {
        $this->minorVersion = $minorVersion;
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
 * Class Google_Service_Dfareporting_BrowsersListResponse
 */
class Google_Service_Dfareporting_BrowsersListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'browsers';
    protected $internal_gapi_mappings = [];
    protected $browsersType = 'Google_Service_Dfareporting_Browser';
    protected $browsersDataType = 'array';

    /**
     * @param $browsers
     */
    public function setBrowsers($browsers)
    {
        $this->browsers = $browsers;
    }

    /**
     * @return mixed
     */
    public function getBrowsers()
    {
        return $this->browsers;
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
 * Class Google_Service_Dfareporting_Campaign
 */
class Google_Service_Dfareporting_Campaign extends Google_Collection
{
    public $accountId;
    public $advertiserGroupId;
    public $advertiserId;
    public $archived;
    public $billingInvoiceCode;
    public $comment;
    public $comscoreVceEnabled;
    public $creativeGroupIds;
    public $endDate;
    public $externalId;
    public $id;
    public $kind;
    public $name;
    public $nielsenOcrEnabled;
    public $startDate;
    public $subaccountId;
    public $traffickerEmails;
    protected $collection_key = 'traffickerEmails';
    protected $internal_gapi_mappings = [];
    protected $additionalCreativeOptimizationConfigurationsType = 'Google_Service_Dfareporting_CreativeOptimizationConfiguration';
    protected $additionalCreativeOptimizationConfigurationsDataType = 'array';
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $audienceSegmentGroupsType = 'Google_Service_Dfareporting_AudienceSegmentGroup';
    protected $audienceSegmentGroupsDataType = 'array';
    protected $clickThroughUrlSuffixPropertiesType = 'Google_Service_Dfareporting_ClickThroughUrlSuffixProperties';
    protected $clickThroughUrlSuffixPropertiesDataType = '';
    protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $createInfoDataType = '';
    protected $creativeOptimizationConfigurationType = 'Google_Service_Dfareporting_CreativeOptimizationConfiguration';
    protected $creativeOptimizationConfigurationDataType = '';
    protected $defaultClickThroughEventTagPropertiesType = 'Google_Service_Dfareporting_DefaultClickThroughEventTagProperties';
    protected $defaultClickThroughEventTagPropertiesDataType = '';
    protected $eventTagOverridesType = 'Google_Service_Dfareporting_EventTagOverride';
    protected $eventTagOverridesDataType = 'array';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
    protected $lookbackConfigurationDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param $additionalCreativeOptimizationConfigurations
     */
    public function setAdditionalCreativeOptimizationConfigurations($additionalCreativeOptimizationConfigurations)
    {
        $this->additionalCreativeOptimizationConfigurations = $additionalCreativeOptimizationConfigurations;
    }

    /**
     * @return mixed
     */
    public function getAdditionalCreativeOptimizationConfigurations()
    {
        return $this->additionalCreativeOptimizationConfigurations;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserGroupId()
    {
        return $this->advertiserGroupId;
    }

    /**
     * @param $advertiserGroupId
     */
    public function setAdvertiserGroupId($advertiserGroupId)
    {
        $this->advertiserGroupId = $advertiserGroupId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @param $audienceSegmentGroups
     */
    public function setAudienceSegmentGroups($audienceSegmentGroups)
    {
        $this->audienceSegmentGroups = $audienceSegmentGroups;
    }

    /**
     * @return mixed
     */
    public function getAudienceSegmentGroups()
    {
        return $this->audienceSegmentGroups;
    }

    /**
     * @return mixed
     */
    public function getBillingInvoiceCode()
    {
        return $this->billingInvoiceCode;
    }

    /**
     * @param $billingInvoiceCode
     */
    public function setBillingInvoiceCode($billingInvoiceCode)
    {
        $this->billingInvoiceCode = $billingInvoiceCode;
    }

    /**
     * @param Google_Service_Dfareporting_ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties
     */
    public function setClickThroughUrlSuffixProperties(Google_Service_Dfareporting_ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties)
    {
        $this->clickThroughUrlSuffixProperties = $clickThroughUrlSuffixProperties;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrlSuffixProperties()
    {
        return $this->clickThroughUrlSuffixProperties;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getComscoreVceEnabled()
    {
        return $this->comscoreVceEnabled;
    }

    /**
     * @param $comscoreVceEnabled
     */
    public function setComscoreVceEnabled($comscoreVceEnabled)
    {
        $this->comscoreVceEnabled = $comscoreVceEnabled;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $createInfo
     */
    public function setCreateInfo(Google_Service_Dfareporting_LastModifiedInfo $createInfo)
    {
        $this->createInfo = $createInfo;
    }

    /**
     * @return mixed
     */
    public function getCreateInfo()
    {
        return $this->createInfo;
    }

    /**
     * @return mixed
     */
    public function getCreativeGroupIds()
    {
        return $this->creativeGroupIds;
    }

    /**
     * @param $creativeGroupIds
     */
    public function setCreativeGroupIds($creativeGroupIds)
    {
        $this->creativeGroupIds = $creativeGroupIds;
    }

    /**
     * @param Google_Service_Dfareporting_CreativeOptimizationConfiguration $creativeOptimizationConfiguration
     */
    public function setCreativeOptimizationConfiguration(Google_Service_Dfareporting_CreativeOptimizationConfiguration $creativeOptimizationConfiguration)
    {
        $this->creativeOptimizationConfiguration = $creativeOptimizationConfiguration;
    }

    /**
     * @return mixed
     */
    public function getCreativeOptimizationConfiguration()
    {
        return $this->creativeOptimizationConfiguration;
    }

    /**
     * @param Google_Service_Dfareporting_DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties
     */
    public function setDefaultClickThroughEventTagProperties(Google_Service_Dfareporting_DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties)
    {
        $this->defaultClickThroughEventTagProperties = $defaultClickThroughEventTagProperties;
    }

    /**
     * @return mixed
     */
    public function getDefaultClickThroughEventTagProperties()
    {
        return $this->defaultClickThroughEventTagProperties;
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
     * @param $eventTagOverrides
     */
    public function setEventTagOverrides($eventTagOverrides)
    {
        $this->eventTagOverrides = $eventTagOverrides;
    }

    /**
     * @return mixed
     */
    public function getEventTagOverrides()
    {
        return $this->eventTagOverrides;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
    }

    /**
     * @param Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration
     */
    public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
    {
        $this->lookbackConfiguration = $lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getLookbackConfiguration()
    {
        return $this->lookbackConfiguration;
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
    public function getNielsenOcrEnabled()
    {
        return $this->nielsenOcrEnabled;
    }

    /**
     * @param $nielsenOcrEnabled
     */
    public function setNielsenOcrEnabled($nielsenOcrEnabled)
    {
        $this->nielsenOcrEnabled = $nielsenOcrEnabled;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTraffickerEmails()
    {
        return $this->traffickerEmails;
    }

    /**
     * @param $traffickerEmails
     */
    public function setTraffickerEmails($traffickerEmails)
    {
        $this->traffickerEmails = $traffickerEmails;
    }
}

/**
 * Class Google_Service_Dfareporting_CampaignCreativeAssociation
 */
class Google_Service_Dfareporting_CampaignCreativeAssociation extends Google_Model
{
    public $creativeId;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreativeId()
    {
        return $this->creativeId;
    }

    /**
     * @param $creativeId
     */
    public function setCreativeId($creativeId)
    {
        $this->creativeId = $creativeId;
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
 * Class Google_Service_Dfareporting_CampaignCreativeAssociationsListResponse
 */
class Google_Service_Dfareporting_CampaignCreativeAssociationsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'campaignCreativeAssociations';
    protected $internal_gapi_mappings = [];
    protected $campaignCreativeAssociationsType = 'Google_Service_Dfareporting_CampaignCreativeAssociation';
    protected $campaignCreativeAssociationsDataType = 'array';

    /**
     * @param $campaignCreativeAssociations
     */
    public function setCampaignCreativeAssociations($campaignCreativeAssociations)
    {
        $this->campaignCreativeAssociations = $campaignCreativeAssociations;
    }

    /**
     * @return mixed
     */
    public function getCampaignCreativeAssociations()
    {
        return $this->campaignCreativeAssociations;
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
 * Class Google_Service_Dfareporting_CampaignsListResponse
 */
class Google_Service_Dfareporting_CampaignsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'campaigns';
    protected $internal_gapi_mappings = [];
    protected $campaignsType = 'Google_Service_Dfareporting_Campaign';
    protected $campaignsDataType = 'array';

    /**
     * @param $campaigns
     */
    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }

    /**
     * @return mixed
     */
    public function getCampaigns()
    {
        return $this->campaigns;
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
 * Class Google_Service_Dfareporting_ChangeLog
 */
class Google_Service_Dfareporting_ChangeLog extends Google_Model
{
    public $accountId;
    public $action;
    public $changeTime;
    public $fieldName;
    public $id;
    public $kind;
    public $newValue;
    public $objectId;
    public $objectType;
    public $oldValue;
    public $subaccountId;
    public $transactionId;
    public $userProfileId;
    public $userProfileName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

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

    /**
     * @return mixed
     */
    public function getChangeTime()
    {
        return $this->changeTime;
    }

    /**
     * @param $changeTime
     */
    public function setChangeTime($changeTime)
    {
        $this->changeTime = $changeTime;
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
    public function getNewValue()
    {
        return $this->newValue;
    }

    /**
     * @param $newValue
     */
    public function setNewValue($newValue)
    {
        $this->newValue = $newValue;
    }

    /**
     * @return mixed
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
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
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * @param $oldValue
     */
    public function setOldValue($oldValue)
    {
        $this->oldValue = $oldValue;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getUserProfileId()
    {
        return $this->userProfileId;
    }

    /**
     * @param $userProfileId
     */
    public function setUserProfileId($userProfileId)
    {
        $this->userProfileId = $userProfileId;
    }

    /**
     * @return mixed
     */
    public function getUserProfileName()
    {
        return $this->userProfileName;
    }

    /**
     * @param $userProfileName
     */
    public function setUserProfileName($userProfileName)
    {
        $this->userProfileName = $userProfileName;
    }
}

/**
 * Class Google_Service_Dfareporting_ChangeLogsListResponse
 */
class Google_Service_Dfareporting_ChangeLogsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'changeLogs';
    protected $internal_gapi_mappings = [];
    protected $changeLogsType = 'Google_Service_Dfareporting_ChangeLog';
    protected $changeLogsDataType = 'array';

    /**
     * @param $changeLogs
     */
    public function setChangeLogs($changeLogs)
    {
        $this->changeLogs = $changeLogs;
    }

    /**
     * @return mixed
     */
    public function getChangeLogs()
    {
        return $this->changeLogs;
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
 * Class Google_Service_Dfareporting_CitiesListResponse
 */
class Google_Service_Dfareporting_CitiesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'cities';
    protected $internal_gapi_mappings = [];
    protected $citiesType = 'Google_Service_Dfareporting_City';
    protected $citiesDataType = 'array';

    /**
     * @param $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
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
 * Class Google_Service_Dfareporting_City
 */
class Google_Service_Dfareporting_City extends Google_Model
{
    public $countryCode;
    public $countryDartId;
    public $dartId;
    public $kind;
    public $metroCode;
    public $metroDmaId;
    public $name;
    public $regionCode;
    public $regionDartId;
    protected $internal_gapi_mappings = [];

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
    public function getCountryDartId()
    {
        return $this->countryDartId;
    }

    /**
     * @param $countryDartId
     */
    public function setCountryDartId($countryDartId)
    {
        $this->countryDartId = $countryDartId;
    }

    /**
     * @return mixed
     */
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
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
    public function getMetroCode()
    {
        return $this->metroCode;
    }

    /**
     * @param $metroCode
     */
    public function setMetroCode($metroCode)
    {
        $this->metroCode = $metroCode;
    }

    /**
     * @return mixed
     */
    public function getMetroDmaId()
    {
        return $this->metroDmaId;
    }

    /**
     * @param $metroDmaId
     */
    public function setMetroDmaId($metroDmaId)
    {
        $this->metroDmaId = $metroDmaId;
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
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * @param $regionCode
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }

    /**
     * @return mixed
     */
    public function getRegionDartId()
    {
        return $this->regionDartId;
    }

    /**
     * @param $regionDartId
     */
    public function setRegionDartId($regionDartId)
    {
        $this->regionDartId = $regionDartId;
    }
}

/**
 * Class Google_Service_Dfareporting_ClickTag
 */
class Google_Service_Dfareporting_ClickTag extends Google_Model
{
    public $eventName;
    public $name;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @param $eventName
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
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
 * Class Google_Service_Dfareporting_ClickThroughUrl
 */
class Google_Service_Dfareporting_ClickThroughUrl extends Google_Model
{
    public $customClickThroughUrl;
    public $defaultLandingPage;
    public $landingPageId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomClickThroughUrl()
    {
        return $this->customClickThroughUrl;
    }

    /**
     * @param $customClickThroughUrl
     */
    public function setCustomClickThroughUrl($customClickThroughUrl)
    {
        $this->customClickThroughUrl = $customClickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getDefaultLandingPage()
    {
        return $this->defaultLandingPage;
    }

    /**
     * @param $defaultLandingPage
     */
    public function setDefaultLandingPage($defaultLandingPage)
    {
        $this->defaultLandingPage = $defaultLandingPage;
    }

    /**
     * @return mixed
     */
    public function getLandingPageId()
    {
        return $this->landingPageId;
    }

    /**
     * @param $landingPageId
     */
    public function setLandingPageId($landingPageId)
    {
        $this->landingPageId = $landingPageId;
    }
}

/**
 * Class Google_Service_Dfareporting_ClickThroughUrlSuffixProperties
 */
class Google_Service_Dfareporting_ClickThroughUrlSuffixProperties extends Google_Model
{
    public $clickThroughUrlSuffix;
    public $overrideInheritedSuffix;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getClickThroughUrlSuffix()
    {
        return $this->clickThroughUrlSuffix;
    }

    /**
     * @param $clickThroughUrlSuffix
     */
    public function setClickThroughUrlSuffix($clickThroughUrlSuffix)
    {
        $this->clickThroughUrlSuffix = $clickThroughUrlSuffix;
    }

    /**
     * @return mixed
     */
    public function getOverrideInheritedSuffix()
    {
        return $this->overrideInheritedSuffix;
    }

    /**
     * @param $overrideInheritedSuffix
     */
    public function setOverrideInheritedSuffix($overrideInheritedSuffix)
    {
        $this->overrideInheritedSuffix = $overrideInheritedSuffix;
    }
}

/**
 * Class Google_Service_Dfareporting_CompanionClickThroughOverride
 */
class Google_Service_Dfareporting_CompanionClickThroughOverride extends Google_Model
{
    public $creativeId;
    protected $internal_gapi_mappings = [];
    protected $clickThroughUrlType = 'Google_Service_Dfareporting_ClickThroughUrl';
    protected $clickThroughUrlDataType = '';

    /**
     * @param Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl
     */
    public function setClickThroughUrl(Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl)
    {
        $this->clickThroughUrl = $clickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrl()
    {
        return $this->clickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getCreativeId()
    {
        return $this->creativeId;
    }

    /**
     * @param $creativeId
     */
    public function setCreativeId($creativeId)
    {
        $this->creativeId = $creativeId;
    }
}

/**
 * Class Google_Service_Dfareporting_CompatibleFields
 */
class Google_Service_Dfareporting_CompatibleFields extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $crossDimensionReachReportCompatibleFieldsType = 'Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields';
    protected $crossDimensionReachReportCompatibleFieldsDataType = '';
    protected $floodlightReportCompatibleFieldsType = 'Google_Service_Dfareporting_FloodlightReportCompatibleFields';
    protected $floodlightReportCompatibleFieldsDataType = '';
    protected $pathToConversionReportCompatibleFieldsType = 'Google_Service_Dfareporting_PathToConversionReportCompatibleFields';
    protected $pathToConversionReportCompatibleFieldsDataType = '';
    protected $reachReportCompatibleFieldsType = 'Google_Service_Dfareporting_ReachReportCompatibleFields';
    protected $reachReportCompatibleFieldsDataType = '';
    protected $reportCompatibleFieldsType = 'Google_Service_Dfareporting_ReportCompatibleFields';
    protected $reportCompatibleFieldsDataType = '';


    /**
     * @param Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields $crossDimensionReachReportCompatibleFields
     */
    public function setCrossDimensionReachReportCompatibleFields(Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields $crossDimensionReachReportCompatibleFields)
    {
        $this->crossDimensionReachReportCompatibleFields = $crossDimensionReachReportCompatibleFields;
    }

    /**
     * @return mixed
     */
    public function getCrossDimensionReachReportCompatibleFields()
    {
        return $this->crossDimensionReachReportCompatibleFields;
    }

    /**
     * @param Google_Service_Dfareporting_FloodlightReportCompatibleFields $floodlightReportCompatibleFields
     */
    public function setFloodlightReportCompatibleFields(Google_Service_Dfareporting_FloodlightReportCompatibleFields $floodlightReportCompatibleFields)
    {
        $this->floodlightReportCompatibleFields = $floodlightReportCompatibleFields;
    }

    /**
     * @return mixed
     */
    public function getFloodlightReportCompatibleFields()
    {
        return $this->floodlightReportCompatibleFields;
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
     * @param Google_Service_Dfareporting_PathToConversionReportCompatibleFields $pathToConversionReportCompatibleFields
     */
    public function setPathToConversionReportCompatibleFields(Google_Service_Dfareporting_PathToConversionReportCompatibleFields $pathToConversionReportCompatibleFields)
    {
        $this->pathToConversionReportCompatibleFields = $pathToConversionReportCompatibleFields;
    }

    /**
     * @return mixed
     */
    public function getPathToConversionReportCompatibleFields()
    {
        return $this->pathToConversionReportCompatibleFields;
    }

    /**
     * @param Google_Service_Dfareporting_ReachReportCompatibleFields $reachReportCompatibleFields
     */
    public function setReachReportCompatibleFields(Google_Service_Dfareporting_ReachReportCompatibleFields $reachReportCompatibleFields)
    {
        $this->reachReportCompatibleFields = $reachReportCompatibleFields;
    }

    /**
     * @return mixed
     */
    public function getReachReportCompatibleFields()
    {
        return $this->reachReportCompatibleFields;
    }

    /**
     * @param Google_Service_Dfareporting_ReportCompatibleFields $reportCompatibleFields
     */
    public function setReportCompatibleFields(Google_Service_Dfareporting_ReportCompatibleFields $reportCompatibleFields)
    {
        $this->reportCompatibleFields = $reportCompatibleFields;
    }

    /**
     * @return mixed
     */
    public function getReportCompatibleFields()
    {
        return $this->reportCompatibleFields;
    }
}

/**
 * Class Google_Service_Dfareporting_ConnectionType
 */
class Google_Service_Dfareporting_ConnectionType extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Dfareporting_ConnectionTypesListResponse
 */
class Google_Service_Dfareporting_ConnectionTypesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'connectionTypes';
    protected $internal_gapi_mappings = [];
    protected $connectionTypesType = 'Google_Service_Dfareporting_ConnectionType';
    protected $connectionTypesDataType = 'array';

    /**
     * @param $connectionTypes
     */
    public function setConnectionTypes($connectionTypes)
    {
        $this->connectionTypes = $connectionTypes;
    }

    /**
     * @return mixed
     */
    public function getConnectionTypes()
    {
        return $this->connectionTypes;
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
 * Class Google_Service_Dfareporting_ContentCategoriesListResponse
 */
class Google_Service_Dfareporting_ContentCategoriesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'contentCategories';
    protected $internal_gapi_mappings = [];
    protected $contentCategoriesType = 'Google_Service_Dfareporting_ContentCategory';
    protected $contentCategoriesDataType = 'array';

    /**
     * @param $contentCategories
     */
    public function setContentCategories($contentCategories)
    {
        $this->contentCategories = $contentCategories;
    }

    /**
     * @return mixed
     */
    public function getContentCategories()
    {
        return $this->contentCategories;
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
 * Class Google_Service_Dfareporting_ContentCategory
 */
class Google_Service_Dfareporting_ContentCategory extends Google_Model
{
    public $accountId;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
}

/**
 * Class Google_Service_Dfareporting_CountriesListResponse
 */
class Google_Service_Dfareporting_CountriesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'countries';
    protected $internal_gapi_mappings = [];
    protected $countriesType = 'Google_Service_Dfareporting_Country';
    protected $countriesDataType = 'array';

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
    public function getCountries()
    {
        return $this->countries;
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
 * Class Google_Service_Dfareporting_Country
 */
class Google_Service_Dfareporting_Country extends Google_Model
{
    public $countryCode;
    public $dartId;
    public $kind;
    public $name;
    public $sslEnabled;
    protected $internal_gapi_mappings = [];

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
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
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
    public function getSslEnabled()
    {
        return $this->sslEnabled;
    }

    /**
     * @param $sslEnabled
     */
    public function setSslEnabled($sslEnabled)
    {
        $this->sslEnabled = $sslEnabled;
    }
}

/**
 * Class Google_Service_Dfareporting_Creative
 */
class Google_Service_Dfareporting_Creative extends Google_Collection
{
    public $accountId;
    public $active;
    public $adParameters;
    public $adTagKeys;
    public $advertiserId;
    public $allowScriptAccess;
    public $archived;
    public $artworkType;
    public $authoringTool;
    public $autoAdvanceImages;
    public $backgroundColor;
    public $backupImageClickThroughUrl;
    public $backupImageFeatures;
    public $backupImageReportingLabel;
    public $commercialId;
    public $companionCreatives;
    public $compatibility;
    public $convertFlashToHtml5;
    public $customKeyValues;
    public $htmlCode;
    public $htmlCodeLocked;
    public $id;
    public $kind;
    public $latestTraffickedCreativeId;
    public $name;
    public $overrideCss;
    public $redirectUrl;
    public $renderingId;
    public $requiredFlashPluginVersion;
    public $requiredFlashVersion;
    public $skippable;
    public $sslCompliant;
    public $studioAdvertiserId;
    public $studioCreativeId;
    public $studioTraffickedCreativeId;
    public $subaccountId;
    public $thirdPartyBackupImageImpressionsUrl;
    public $thirdPartyRichMediaImpressionsUrl;
    public $totalFileSize;
    public $type;
    public $version;
    public $videoDescription;
    public $videoDuration;
    protected $collection_key = 'timerCustomEvents';
    protected $internal_gapi_mappings = [
        "autoAdvanceImages" => "auto_advance_images",
    ];
    protected $backupImageTargetWindowType = 'Google_Service_Dfareporting_TargetWindow';
    protected $backupImageTargetWindowDataType = '';
    protected $clickTagsType = 'Google_Service_Dfareporting_ClickTag';
    protected $clickTagsDataType = 'array';
    protected $counterCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
    protected $counterCustomEventsDataType = 'array';
    protected $creativeAssetsType = 'Google_Service_Dfareporting_CreativeAsset';
    protected $creativeAssetsDataType = 'array';
    protected $creativeFieldAssignmentsType = 'Google_Service_Dfareporting_CreativeFieldAssignment';
    protected $creativeFieldAssignmentsDataType = 'array';
    protected $exitCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
    protected $exitCustomEventsDataType = 'array';
    protected $fsCommandType = 'Google_Service_Dfareporting_FsCommand';
    protected $fsCommandDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $renderingIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $renderingIdDimensionValueDataType = '';
    protected $sizeType = 'Google_Service_Dfareporting_Size';
    protected $sizeDataType = '';
    protected $thirdPartyUrlsType = 'Google_Service_Dfareporting_ThirdPartyTrackingUrl';
    protected $thirdPartyUrlsDataType = 'array';
    protected $timerCustomEventsType = 'Google_Service_Dfareporting_CreativeCustomEvent';
    protected $timerCustomEventsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAdParameters()
    {
        return $this->adParameters;
    }

    /**
     * @param $adParameters
     */
    public function setAdParameters($adParameters)
    {
        $this->adParameters = $adParameters;
    }

    /**
     * @return mixed
     */
    public function getAdTagKeys()
    {
        return $this->adTagKeys;
    }

    /**
     * @param $adTagKeys
     */
    public function setAdTagKeys($adTagKeys)
    {
        $this->adTagKeys = $adTagKeys;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return mixed
     */
    public function getAllowScriptAccess()
    {
        return $this->allowScriptAccess;
    }

    /**
     * @param $allowScriptAccess
     */
    public function setAllowScriptAccess($allowScriptAccess)
    {
        $this->allowScriptAccess = $allowScriptAccess;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getArtworkType()
    {
        return $this->artworkType;
    }

    /**
     * @param $artworkType
     */
    public function setArtworkType($artworkType)
    {
        $this->artworkType = $artworkType;
    }

    /**
     * @return mixed
     */
    public function getAuthoringTool()
    {
        return $this->authoringTool;
    }

    /**
     * @param $authoringTool
     */
    public function setAuthoringTool($authoringTool)
    {
        $this->authoringTool = $authoringTool;
    }

    /**
     * @return mixed
     */
    public function getAutoAdvanceImages()
    {
        return $this->autoAdvanceImages;
    }

    /**
     * @param $autoAdvanceImages
     */
    public function setAutoAdvanceImages($autoAdvanceImages)
    {
        $this->autoAdvanceImages = $autoAdvanceImages;
    }

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
    public function getBackupImageClickThroughUrl()
    {
        return $this->backupImageClickThroughUrl;
    }

    /**
     * @param $backupImageClickThroughUrl
     */
    public function setBackupImageClickThroughUrl($backupImageClickThroughUrl)
    {
        $this->backupImageClickThroughUrl = $backupImageClickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getBackupImageFeatures()
    {
        return $this->backupImageFeatures;
    }

    /**
     * @param $backupImageFeatures
     */
    public function setBackupImageFeatures($backupImageFeatures)
    {
        $this->backupImageFeatures = $backupImageFeatures;
    }

    /**
     * @return mixed
     */
    public function getBackupImageReportingLabel()
    {
        return $this->backupImageReportingLabel;
    }

    /**
     * @param $backupImageReportingLabel
     */
    public function setBackupImageReportingLabel($backupImageReportingLabel)
    {
        $this->backupImageReportingLabel = $backupImageReportingLabel;
    }

    /**
     * @param Google_Service_Dfareporting_TargetWindow $backupImageTargetWindow
     */
    public function setBackupImageTargetWindow(Google_Service_Dfareporting_TargetWindow $backupImageTargetWindow)
    {
        $this->backupImageTargetWindow = $backupImageTargetWindow;
    }

    /**
     * @return mixed
     */
    public function getBackupImageTargetWindow()
    {
        return $this->backupImageTargetWindow;
    }

    /**
     * @param $clickTags
     */
    public function setClickTags($clickTags)
    {
        $this->clickTags = $clickTags;
    }

    /**
     * @return mixed
     */
    public function getClickTags()
    {
        return $this->clickTags;
    }

    /**
     * @return mixed
     */
    public function getCommercialId()
    {
        return $this->commercialId;
    }

    /**
     * @param $commercialId
     */
    public function setCommercialId($commercialId)
    {
        $this->commercialId = $commercialId;
    }

    /**
     * @return mixed
     */
    public function getCompanionCreatives()
    {
        return $this->companionCreatives;
    }

    /**
     * @param $companionCreatives
     */
    public function setCompanionCreatives($companionCreatives)
    {
        $this->companionCreatives = $companionCreatives;
    }

    /**
     * @return mixed
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * @param $compatibility
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;
    }

    /**
     * @return mixed
     */
    public function getConvertFlashToHtml5()
    {
        return $this->convertFlashToHtml5;
    }

    /**
     * @param $convertFlashToHtml5
     */
    public function setConvertFlashToHtml5($convertFlashToHtml5)
    {
        $this->convertFlashToHtml5 = $convertFlashToHtml5;
    }

    /**
     * @param $counterCustomEvents
     */
    public function setCounterCustomEvents($counterCustomEvents)
    {
        $this->counterCustomEvents = $counterCustomEvents;
    }

    /**
     * @return mixed
     */
    public function getCounterCustomEvents()
    {
        return $this->counterCustomEvents;
    }

    /**
     * @param $creativeAssets
     */
    public function setCreativeAssets($creativeAssets)
    {
        $this->creativeAssets = $creativeAssets;
    }

    /**
     * @return mixed
     */
    public function getCreativeAssets()
    {
        return $this->creativeAssets;
    }

    /**
     * @param $creativeFieldAssignments
     */
    public function setCreativeFieldAssignments($creativeFieldAssignments)
    {
        $this->creativeFieldAssignments = $creativeFieldAssignments;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getCreativeFieldAssignments()
    {
        return $this->creativeFieldAssignments;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getCustomKeyValues()
    {
        return $this->customKeyValues;
    }

    /**
     * @param $customKeyValues
     */
    /**
     * @param $customKeyValues
     */
    public function setCustomKeyValues($customKeyValues)
    {
        $this->customKeyValues = $customKeyValues;
    }

    /**
     * @param $exitCustomEvents
     */
    /**
     * @param $exitCustomEvents
     */
    public function setExitCustomEvents($exitCustomEvents)
    {
        $this->exitCustomEvents = $exitCustomEvents;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getExitCustomEvents()
    {
        return $this->exitCustomEvents;
    }

    /**
     * @param Google_Service_Dfareporting_FsCommand $fsCommand
     */
    /**
     * @param Google_Service_Dfareporting_FsCommand $fsCommand
     */
    public function setFsCommand(Google_Service_Dfareporting_FsCommand $fsCommand)
    {
        $this->fsCommand = $fsCommand;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getFsCommand()
    {
        return $this->fsCommand;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getHtmlCode()
    {
        return $this->htmlCode;
    }

    /**
     * @param $htmlCode
     */
    /**
     * @param $htmlCode
     */
    public function setHtmlCode($htmlCode)
    {
        $this->htmlCode = $htmlCode;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getHtmlCodeLocked()
    {
        return $this->htmlCodeLocked;
    }

    /**
     * @param $htmlCodeLocked
     */
    /**
     * @param $htmlCodeLocked
     */
    public function setHtmlCodeLocked($htmlCodeLocked)
    {
        $this->htmlCodeLocked = $htmlCodeLocked;
    }

    /**
     * @return mixed
     */
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
    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    /**
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @return mixed
     */
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
    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getLatestTraffickedCreativeId()
    {
        return $this->latestTraffickedCreativeId;
    }

    /**
     * @param $latestTraffickedCreativeId
     */
    /**
     * @param $latestTraffickedCreativeId
     */
    public function setLatestTraffickedCreativeId($latestTraffickedCreativeId)
    {
        $this->latestTraffickedCreativeId = $latestTraffickedCreativeId;
    }

    /**
     * @return mixed
     */
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
    public function getOverrideCss()
    {
        return $this->overrideCss;
    }

    /**
     * @param $overrideCss
     */
    public function setOverrideCss($overrideCss)
    {
        $this->overrideCss = $overrideCss;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return mixed
     */
    public function getRenderingId()
    {
        return $this->renderingId;
    }

    /**
     * @param $renderingId
     */
    public function setRenderingId($renderingId)
    {
        $this->renderingId = $renderingId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $renderingIdDimensionValue
     */
    public function setRenderingIdDimensionValue(Google_Service_Dfareporting_DimensionValue $renderingIdDimensionValue)
    {
        $this->renderingIdDimensionValue = $renderingIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getRenderingIdDimensionValue()
    {
        return $this->renderingIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getRequiredFlashPluginVersion()
    {
        return $this->requiredFlashPluginVersion;
    }

    /**
     * @param $requiredFlashPluginVersion
     */
    public function setRequiredFlashPluginVersion($requiredFlashPluginVersion)
    {
        $this->requiredFlashPluginVersion = $requiredFlashPluginVersion;
    }

    /**
     * @return mixed
     */
    public function getRequiredFlashVersion()
    {
        return $this->requiredFlashVersion;
    }

    /**
     * @param $requiredFlashVersion
     */
    public function setRequiredFlashVersion($requiredFlashVersion)
    {
        $this->requiredFlashVersion = $requiredFlashVersion;
    }

    /**
     * @param Google_Service_Dfareporting_Size $size
     */
    public function setSize(Google_Service_Dfareporting_Size $size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getSkippable()
    {
        return $this->skippable;
    }

    /**
     * @param $skippable
     */
    public function setSkippable($skippable)
    {
        $this->skippable = $skippable;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
    }

    /**
     * @return mixed
     */
    public function getStudioAdvertiserId()
    {
        return $this->studioAdvertiserId;
    }

    /**
     * @param $studioAdvertiserId
     */
    public function setStudioAdvertiserId($studioAdvertiserId)
    {
        $this->studioAdvertiserId = $studioAdvertiserId;
    }

    /**
     * @return mixed
     */
    public function getStudioCreativeId()
    {
        return $this->studioCreativeId;
    }

    /**
     * @param $studioCreativeId
     */
    public function setStudioCreativeId($studioCreativeId)
    {
        $this->studioCreativeId = $studioCreativeId;
    }

    /**
     * @return mixed
     */
    public function getStudioTraffickedCreativeId()
    {
        return $this->studioTraffickedCreativeId;
    }

    /**
     * @param $studioTraffickedCreativeId
     */
    public function setStudioTraffickedCreativeId($studioTraffickedCreativeId)
    {
        $this->studioTraffickedCreativeId = $studioTraffickedCreativeId;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyBackupImageImpressionsUrl()
    {
        return $this->thirdPartyBackupImageImpressionsUrl;
    }

    /**
     * @param $thirdPartyBackupImageImpressionsUrl
     */
    public function setThirdPartyBackupImageImpressionsUrl($thirdPartyBackupImageImpressionsUrl)
    {
        $this->thirdPartyBackupImageImpressionsUrl = $thirdPartyBackupImageImpressionsUrl;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyRichMediaImpressionsUrl()
    {
        return $this->thirdPartyRichMediaImpressionsUrl;
    }

    /**
     * @param $thirdPartyRichMediaImpressionsUrl
     */
    public function setThirdPartyRichMediaImpressionsUrl($thirdPartyRichMediaImpressionsUrl)
    {
        $this->thirdPartyRichMediaImpressionsUrl = $thirdPartyRichMediaImpressionsUrl;
    }

    /**
     * @param $thirdPartyUrls
     */
    public function setThirdPartyUrls($thirdPartyUrls)
    {
        $this->thirdPartyUrls = $thirdPartyUrls;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyUrls()
    {
        return $this->thirdPartyUrls;
    }

    /**
     * @param $timerCustomEvents
     */
    public function setTimerCustomEvents($timerCustomEvents)
    {
        $this->timerCustomEvents = $timerCustomEvents;
    }

    /**
     * @return mixed
     */
    public function getTimerCustomEvents()
    {
        return $this->timerCustomEvents;
    }

    /**
     * @return mixed
     */
    public function getTotalFileSize()
    {
        return $this->totalFileSize;
    }

    /**
     * @param $totalFileSize
     */
    public function setTotalFileSize($totalFileSize)
    {
        $this->totalFileSize = $totalFileSize;
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
     * @return mixed
     */
    public function getVideoDescription()
    {
        return $this->videoDescription;
    }

    /**
     * @param $videoDescription
     */
    public function setVideoDescription($videoDescription)
    {
        $this->videoDescription = $videoDescription;
    }

    /**
     * @return mixed
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * @param $videoDuration
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeAsset
 */
class Google_Service_Dfareporting_CreativeAsset extends Google_Collection
{
    public $actionScript3;
    public $active;
    public $alignment;
    public $artworkType;
    public $bitRate;
    public $childAssetType;
    public $customStartTimeValue;
    public $detectedFeatures;
    public $displayType;
    public $duration;
    public $durationType;
    public $fileSize;
    public $flashVersion;
    public $hideFlashObjects;
    public $hideSelectionBoxes;
    public $horizontallyLocked;
    public $id;
    public $mimeType;
    public $originalBackup;
    public $positionLeftUnit;
    public $positionTopUnit;
    public $progressiveServingUrl;
    public $pushdown;
    public $pushdownDuration;
    public $role;
    public $sslCompliant;
    public $startTimeType;
    public $streamingServingUrl;
    public $transparency;
    public $verticallyLocked;
    public $videoDuration;
    public $windowMode;
    public $zIndex;
    public $zipFilename;
    public $zipFilesize;
    protected $collection_key = 'detectedFeatures';
    protected $internal_gapi_mappings = [];
    protected $assetIdentifierType = 'Google_Service_Dfareporting_CreativeAssetId';
    protected $assetIdentifierDataType = '';
    protected $backupImageExitType = 'Google_Service_Dfareporting_CreativeCustomEvent';
    protected $backupImageExitDataType = '';
    protected $collapsedSizeType = 'Google_Service_Dfareporting_Size';
    protected $collapsedSizeDataType = '';
    protected $expandedDimensionType = 'Google_Service_Dfareporting_Size';
    protected $expandedDimensionDataType = '';
    protected $offsetType = 'Google_Service_Dfareporting_OffsetPosition';
    protected $offsetDataType = '';
    protected $positionType = 'Google_Service_Dfareporting_OffsetPosition';
    protected $positionDataType = '';
    protected $sizeType = 'Google_Service_Dfareporting_Size';
    protected $sizeDataType = '';

    /**
     * @return mixed
     */
    public function getActionScript3()
    {
        return $this->actionScript3;
    }

    /**
     * @param $actionScript3
     */
    public function setActionScript3($actionScript3)
    {
        $this->actionScript3 = $actionScript3;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * @param $alignment
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;
    }

    /**
     * @return mixed
     */
    public function getArtworkType()
    {
        return $this->artworkType;
    }

    /**
     * @param $artworkType
     */
    public function setArtworkType($artworkType)
    {
        $this->artworkType = $artworkType;
    }

    /**
     * @param Google_Service_Dfareporting_CreativeAssetId $assetIdentifier
     */
    public function setAssetIdentifier(Google_Service_Dfareporting_CreativeAssetId $assetIdentifier)
    {
        $this->assetIdentifier = $assetIdentifier;
    }

    /**
     * @return mixed
     */
    public function getAssetIdentifier()
    {
        return $this->assetIdentifier;
    }

    /**
     * @param Google_Service_Dfareporting_CreativeCustomEvent $backupImageExit
     */
    public function setBackupImageExit(Google_Service_Dfareporting_CreativeCustomEvent $backupImageExit)
    {
        $this->backupImageExit = $backupImageExit;
    }

    /**
     * @return mixed
     */
    public function getBackupImageExit()
    {
        return $this->backupImageExit;
    }

    /**
     * @return mixed
     */
    public function getBitRate()
    {
        return $this->bitRate;
    }

    /**
     * @param $bitRate
     */
    public function setBitRate($bitRate)
    {
        $this->bitRate = $bitRate;
    }

    /**
     * @return mixed
     */
    public function getChildAssetType()
    {
        return $this->childAssetType;
    }

    /**
     * @param $childAssetType
     */
    public function setChildAssetType($childAssetType)
    {
        $this->childAssetType = $childAssetType;
    }

    /**
     * @param Google_Service_Dfareporting_Size $collapsedSize
     */
    public function setCollapsedSize(Google_Service_Dfareporting_Size $collapsedSize)
    {
        $this->collapsedSize = $collapsedSize;
    }

    /**
     * @return mixed
     */
    public function getCollapsedSize()
    {
        return $this->collapsedSize;
    }

    /**
     * @return mixed
     */
    public function getCustomStartTimeValue()
    {
        return $this->customStartTimeValue;
    }

    /**
     * @param $customStartTimeValue
     */
    public function setCustomStartTimeValue($customStartTimeValue)
    {
        $this->customStartTimeValue = $customStartTimeValue;
    }

    /**
     * @return mixed
     */
    public function getDetectedFeatures()
    {
        return $this->detectedFeatures;
    }

    /**
     * @param $detectedFeatures
     */
    public function setDetectedFeatures($detectedFeatures)
    {
        $this->detectedFeatures = $detectedFeatures;
    }

    /**
     * @return mixed
     */
    public function getDisplayType()
    {
        return $this->displayType;
    }

    /**
     * @param $displayType
     */
    public function setDisplayType($displayType)
    {
        $this->displayType = $displayType;
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
    public function getDurationType()
    {
        return $this->durationType;
    }

    /**
     * @param $durationType
     */
    public function setDurationType($durationType)
    {
        $this->durationType = $durationType;
    }

    /**
     * @param Google_Service_Dfareporting_Size $expandedDimension
     */
    public function setExpandedDimension(Google_Service_Dfareporting_Size $expandedDimension)
    {
        $this->expandedDimension = $expandedDimension;
    }

    /**
     * @return mixed
     */
    public function getExpandedDimension()
    {
        return $this->expandedDimension;
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
    public function getFlashVersion()
    {
        return $this->flashVersion;
    }

    /**
     * @param $flashVersion
     */
    public function setFlashVersion($flashVersion)
    {
        $this->flashVersion = $flashVersion;
    }

    /**
     * @return mixed
     */
    public function getHideFlashObjects()
    {
        return $this->hideFlashObjects;
    }

    /**
     * @param $hideFlashObjects
     */
    public function setHideFlashObjects($hideFlashObjects)
    {
        $this->hideFlashObjects = $hideFlashObjects;
    }

    /**
     * @return mixed
     */
    public function getHideSelectionBoxes()
    {
        return $this->hideSelectionBoxes;
    }

    /**
     * @param $hideSelectionBoxes
     */
    public function setHideSelectionBoxes($hideSelectionBoxes)
    {
        $this->hideSelectionBoxes = $hideSelectionBoxes;
    }

    /**
     * @return mixed
     */
    public function getHorizontallyLocked()
    {
        return $this->horizontallyLocked;
    }

    /**
     * @param $horizontallyLocked
     */
    public function setHorizontallyLocked($horizontallyLocked)
    {
        $this->horizontallyLocked = $horizontallyLocked;
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
     * @param Google_Service_Dfareporting_OffsetPosition $offset
     */
    public function setOffset(Google_Service_Dfareporting_OffsetPosition $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return mixed
     */
    public function getOriginalBackup()
    {
        return $this->originalBackup;
    }

    /**
     * @param $originalBackup
     */
    public function setOriginalBackup($originalBackup)
    {
        $this->originalBackup = $originalBackup;
    }

    /**
     * @param Google_Service_Dfareporting_OffsetPosition $position
     */
    public function setPosition(Google_Service_Dfareporting_OffsetPosition $position)
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
    public function getPositionLeftUnit()
    {
        return $this->positionLeftUnit;
    }

    /**
     * @param $positionLeftUnit
     */
    public function setPositionLeftUnit($positionLeftUnit)
    {
        $this->positionLeftUnit = $positionLeftUnit;
    }

    /**
     * @return mixed
     */
    public function getPositionTopUnit()
    {
        return $this->positionTopUnit;
    }

    /**
     * @param $positionTopUnit
     */
    public function setPositionTopUnit($positionTopUnit)
    {
        $this->positionTopUnit = $positionTopUnit;
    }

    /**
     * @return mixed
     */
    public function getProgressiveServingUrl()
    {
        return $this->progressiveServingUrl;
    }

    /**
     * @param $progressiveServingUrl
     */
    public function setProgressiveServingUrl($progressiveServingUrl)
    {
        $this->progressiveServingUrl = $progressiveServingUrl;
    }

    /**
     * @return mixed
     */
    public function getPushdown()
    {
        return $this->pushdown;
    }

    /**
     * @param $pushdown
     */
    public function setPushdown($pushdown)
    {
        $this->pushdown = $pushdown;
    }

    /**
     * @return mixed
     */
    public function getPushdownDuration()
    {
        return $this->pushdownDuration;
    }

    /**
     * @param $pushdownDuration
     */
    public function setPushdownDuration($pushdownDuration)
    {
        $this->pushdownDuration = $pushdownDuration;
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
     * @param Google_Service_Dfareporting_Size $size
     */
    public function setSize(Google_Service_Dfareporting_Size $size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
    }

    /**
     * @return mixed
     */
    public function getStartTimeType()
    {
        return $this->startTimeType;
    }

    /**
     * @param $startTimeType
     */
    public function setStartTimeType($startTimeType)
    {
        $this->startTimeType = $startTimeType;
    }

    /**
     * @return mixed
     */
    public function getStreamingServingUrl()
    {
        return $this->streamingServingUrl;
    }

    /**
     * @param $streamingServingUrl
     */
    public function setStreamingServingUrl($streamingServingUrl)
    {
        $this->streamingServingUrl = $streamingServingUrl;
    }

    /**
     * @return mixed
     */
    public function getTransparency()
    {
        return $this->transparency;
    }

    /**
     * @param $transparency
     */
    public function setTransparency($transparency)
    {
        $this->transparency = $transparency;
    }

    /**
     * @return mixed
     */
    public function getVerticallyLocked()
    {
        return $this->verticallyLocked;
    }

    /**
     * @param $verticallyLocked
     */
    public function setVerticallyLocked($verticallyLocked)
    {
        $this->verticallyLocked = $verticallyLocked;
    }

    /**
     * @return mixed
     */
    public function getVideoDuration()
    {
        return $this->videoDuration;
    }

    /**
     * @param $videoDuration
     */
    public function setVideoDuration($videoDuration)
    {
        $this->videoDuration = $videoDuration;
    }

    /**
     * @return mixed
     */
    public function getWindowMode()
    {
        return $this->windowMode;
    }

    /**
     * @param $windowMode
     */
    public function setWindowMode($windowMode)
    {
        $this->windowMode = $windowMode;
    }

    /**
     * @return mixed
     */
    public function getZIndex()
    {
        return $this->zIndex;
    }

    /**
     * @param $zIndex
     */
    public function setZIndex($zIndex)
    {
        $this->zIndex = $zIndex;
    }

    /**
     * @return mixed
     */
    public function getZipFilename()
    {
        return $this->zipFilename;
    }

    /**
     * @param $zipFilename
     */
    public function setZipFilename($zipFilename)
    {
        $this->zipFilename = $zipFilename;
    }

    /**
     * @return mixed
     */
    public function getZipFilesize()
    {
        return $this->zipFilesize;
    }

    /**
     * @param $zipFilesize
     */
    public function setZipFilesize($zipFilesize)
    {
        $this->zipFilesize = $zipFilesize;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeAssetId
 */
class Google_Service_Dfareporting_CreativeAssetId extends Google_Model
{
    public $name;
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Dfareporting_CreativeAssetMetadata
 */
class Google_Service_Dfareporting_CreativeAssetMetadata extends Google_Collection
{
    public $detectedFeatures;
    public $kind;
    public $warnedValidationRules;
    protected $collection_key = 'warnedValidationRules';
    protected $internal_gapi_mappings = [];
    protected $assetIdentifierType = 'Google_Service_Dfareporting_CreativeAssetId';
    protected $assetIdentifierDataType = '';
    protected $clickTagsType = 'Google_Service_Dfareporting_ClickTag';
    protected $clickTagsDataType = 'array';

    /**
     * @param Google_Service_Dfareporting_CreativeAssetId $assetIdentifier
     */
    public function setAssetIdentifier(Google_Service_Dfareporting_CreativeAssetId $assetIdentifier)
    {
        $this->assetIdentifier = $assetIdentifier;
    }

    /**
     * @return mixed
     */
    public function getAssetIdentifier()
    {
        return $this->assetIdentifier;
    }

    /**
     * @param $clickTags
     */
    public function setClickTags($clickTags)
    {
        $this->clickTags = $clickTags;
    }

    /**
     * @return mixed
     */
    public function getClickTags()
    {
        return $this->clickTags;
    }

    /**
     * @return mixed
     */
    public function getDetectedFeatures()
    {
        return $this->detectedFeatures;
    }

    /**
     * @param $detectedFeatures
     */
    public function setDetectedFeatures($detectedFeatures)
    {
        $this->detectedFeatures = $detectedFeatures;
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
    public function getWarnedValidationRules()
    {
        return $this->warnedValidationRules;
    }

    /**
     * @param $warnedValidationRules
     */
    public function setWarnedValidationRules($warnedValidationRules)
    {
        $this->warnedValidationRules = $warnedValidationRules;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeAssignment
 */
class Google_Service_Dfareporting_CreativeAssignment extends Google_Collection
{
    public $active;
    public $applyEventTags;
    public $creativeId;
    public $endTime;
    public $sequence;
    public $sslCompliant;
    public $startTime;
    public $weight;
    protected $collection_key = 'richMediaExitOverrides';
    protected $internal_gapi_mappings = [];
    protected $clickThroughUrlType = 'Google_Service_Dfareporting_ClickThroughUrl';
    protected $clickThroughUrlDataType = '';
    protected $companionCreativeOverridesType = 'Google_Service_Dfareporting_CompanionClickThroughOverride';
    protected $companionCreativeOverridesDataType = 'array';
    protected $creativeGroupAssignmentsType = 'Google_Service_Dfareporting_CreativeGroupAssignment';
    protected $creativeGroupAssignmentsDataType = 'array';
    protected $creativeIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $creativeIdDimensionValueDataType = '';
    protected $richMediaExitOverridesType = 'Google_Service_Dfareporting_RichMediaExitOverride';
    protected $richMediaExitOverridesDataType = 'array';

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getApplyEventTags()
    {
        return $this->applyEventTags;
    }

    /**
     * @param $applyEventTags
     */
    public function setApplyEventTags($applyEventTags)
    {
        $this->applyEventTags = $applyEventTags;
    }

    /**
     * @param Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl
     */
    public function setClickThroughUrl(Google_Service_Dfareporting_ClickThroughUrl $clickThroughUrl)
    {
        $this->clickThroughUrl = $clickThroughUrl;
    }

    /**
     * @return mixed
     */
    public function getClickThroughUrl()
    {
        return $this->clickThroughUrl;
    }

    /**
     * @param $companionCreativeOverrides
     */
    public function setCompanionCreativeOverrides($companionCreativeOverrides)
    {
        $this->companionCreativeOverrides = $companionCreativeOverrides;
    }

    /**
     * @return mixed
     */
    public function getCompanionCreativeOverrides()
    {
        return $this->companionCreativeOverrides;
    }

    /**
     * @param $creativeGroupAssignments
     */
    public function setCreativeGroupAssignments($creativeGroupAssignments)
    {
        $this->creativeGroupAssignments = $creativeGroupAssignments;
    }

    /**
     * @return mixed
     */
    public function getCreativeGroupAssignments()
    {
        return $this->creativeGroupAssignments;
    }

    /**
     * @return mixed
     */
    public function getCreativeId()
    {
        return $this->creativeId;
    }

    /**
     * @param $creativeId
     */
    public function setCreativeId($creativeId)
    {
        $this->creativeId = $creativeId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $creativeIdDimensionValue
     */
    public function setCreativeIdDimensionValue(Google_Service_Dfareporting_DimensionValue $creativeIdDimensionValue)
    {
        $this->creativeIdDimensionValue = $creativeIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCreativeIdDimensionValue()
    {
        return $this->creativeIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @param $richMediaExitOverrides
     */
    public function setRichMediaExitOverrides($richMediaExitOverrides)
    {
        $this->richMediaExitOverrides = $richMediaExitOverrides;
    }

    /**
     * @return mixed
     */
    public function getRichMediaExitOverrides()
    {
        return $this->richMediaExitOverrides;
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeCustomEvent
 */
class Google_Service_Dfareporting_CreativeCustomEvent extends Google_Model
{
    public $active;
    public $advertiserCustomEventName;
    public $advertiserCustomEventType;
    public $artworkLabel;
    public $artworkType;
    public $exitUrl;
    public $id;
    public $targetType;
    public $videoReportingId;
    protected $internal_gapi_mappings = [];
    protected $popupWindowPropertiesType = 'Google_Service_Dfareporting_PopupWindowProperties';
    protected $popupWindowPropertiesDataType = '';

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserCustomEventName()
    {
        return $this->advertiserCustomEventName;
    }

    /**
     * @param $advertiserCustomEventName
     */
    public function setAdvertiserCustomEventName($advertiserCustomEventName)
    {
        $this->advertiserCustomEventName = $advertiserCustomEventName;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserCustomEventType()
    {
        return $this->advertiserCustomEventType;
    }

    /**
     * @param $advertiserCustomEventType
     */
    public function setAdvertiserCustomEventType($advertiserCustomEventType)
    {
        $this->advertiserCustomEventType = $advertiserCustomEventType;
    }

    /**
     * @return mixed
     */
    public function getArtworkLabel()
    {
        return $this->artworkLabel;
    }

    /**
     * @param $artworkLabel
     */
    public function setArtworkLabel($artworkLabel)
    {
        $this->artworkLabel = $artworkLabel;
    }

    /**
     * @return mixed
     */
    public function getArtworkType()
    {
        return $this->artworkType;
    }

    /**
     * @param $artworkType
     */
    public function setArtworkType($artworkType)
    {
        $this->artworkType = $artworkType;
    }

    /**
     * @return mixed
     */
    public function getExitUrl()
    {
        return $this->exitUrl;
    }

    /**
     * @param $exitUrl
     */
    public function setExitUrl($exitUrl)
    {
        $this->exitUrl = $exitUrl;
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
     * @param Google_Service_Dfareporting_PopupWindowProperties $popupWindowProperties
     */
    public function setPopupWindowProperties(Google_Service_Dfareporting_PopupWindowProperties $popupWindowProperties)
    {
        $this->popupWindowProperties = $popupWindowProperties;
    }

    /**
     * @return mixed
     */
    public function getPopupWindowProperties()
    {
        return $this->popupWindowProperties;
    }

    /**
     * @return mixed
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @param $targetType
     */
    public function setTargetType($targetType)
    {
        $this->targetType = $targetType;
    }

    /**
     * @return mixed
     */
    public function getVideoReportingId()
    {
        return $this->videoReportingId;
    }

    /**
     * @param $videoReportingId
     */
    public function setVideoReportingId($videoReportingId)
    {
        $this->videoReportingId = $videoReportingId;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeField
 */
class Google_Service_Dfareporting_CreativeField extends Google_Model
{
    public $accountId;
    public $advertiserId;
    public $id;
    public $kind;
    public $name;
    public $subaccountId;
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeFieldAssignment
 */
class Google_Service_Dfareporting_CreativeFieldAssignment extends Google_Model
{
    public $creativeFieldId;
    public $creativeFieldValueId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreativeFieldId()
    {
        return $this->creativeFieldId;
    }

    /**
     * @param $creativeFieldId
     */
    public function setCreativeFieldId($creativeFieldId)
    {
        $this->creativeFieldId = $creativeFieldId;
    }

    /**
     * @return mixed
     */
    public function getCreativeFieldValueId()
    {
        return $this->creativeFieldValueId;
    }

    /**
     * @param $creativeFieldValueId
     */
    public function setCreativeFieldValueId($creativeFieldValueId)
    {
        $this->creativeFieldValueId = $creativeFieldValueId;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeFieldValue
 */
class Google_Service_Dfareporting_CreativeFieldValue extends Google_Model
{
    public $id;
    public $kind;
    public $value;
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
 * Class Google_Service_Dfareporting_CreativeFieldValuesListResponse
 */
class Google_Service_Dfareporting_CreativeFieldValuesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'creativeFieldValues';
    protected $internal_gapi_mappings = [];
    protected $creativeFieldValuesType = 'Google_Service_Dfareporting_CreativeFieldValue';
    protected $creativeFieldValuesDataType = 'array';

    /**
     * @param $creativeFieldValues
     */
    public function setCreativeFieldValues($creativeFieldValues)
    {
        $this->creativeFieldValues = $creativeFieldValues;
    }

    /**
     * @return mixed
     */
    public function getCreativeFieldValues()
    {
        return $this->creativeFieldValues;
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
 * Class Google_Service_Dfareporting_CreativeFieldsListResponse
 */
class Google_Service_Dfareporting_CreativeFieldsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'creativeFields';
    protected $internal_gapi_mappings = [];
    protected $creativeFieldsType = 'Google_Service_Dfareporting_CreativeField';
    protected $creativeFieldsDataType = 'array';

    /**
     * @param $creativeFields
     */
    public function setCreativeFields($creativeFields)
    {
        $this->creativeFields = $creativeFields;
    }

    /**
     * @return mixed
     */
    public function getCreativeFields()
    {
        return $this->creativeFields;
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
 * Class Google_Service_Dfareporting_CreativeGroup
 */
class Google_Service_Dfareporting_CreativeGroup extends Google_Model
{
    public $accountId;
    public $advertiserId;
    public $groupNumber;
    public $id;
    public $kind;
    public $name;
    public $subaccountId;
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @param $groupNumber
     */
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeGroupAssignment
 */
class Google_Service_Dfareporting_CreativeGroupAssignment extends Google_Model
{
    public $creativeGroupId;
    public $creativeGroupNumber;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCreativeGroupId()
    {
        return $this->creativeGroupId;
    }

    /**
     * @param $creativeGroupId
     */
    public function setCreativeGroupId($creativeGroupId)
    {
        $this->creativeGroupId = $creativeGroupId;
    }

    /**
     * @return mixed
     */
    public function getCreativeGroupNumber()
    {
        return $this->creativeGroupNumber;
    }

    /**
     * @param $creativeGroupNumber
     */
    public function setCreativeGroupNumber($creativeGroupNumber)
    {
        $this->creativeGroupNumber = $creativeGroupNumber;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeGroupsListResponse
 */
class Google_Service_Dfareporting_CreativeGroupsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'creativeGroups';
    protected $internal_gapi_mappings = [];
    protected $creativeGroupsType = 'Google_Service_Dfareporting_CreativeGroup';
    protected $creativeGroupsDataType = 'array';

    /**
     * @param $creativeGroups
     */
    public function setCreativeGroups($creativeGroups)
    {
        $this->creativeGroups = $creativeGroups;
    }

    /**
     * @return mixed
     */
    public function getCreativeGroups()
    {
        return $this->creativeGroups;
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
 * Class Google_Service_Dfareporting_CreativeOptimizationConfiguration
 */
class Google_Service_Dfareporting_CreativeOptimizationConfiguration extends Google_Collection
{
    public $id;
    public $name;
    public $optimizationModel;
    protected $collection_key = 'optimizationActivitys';
    protected $internal_gapi_mappings = [];
    protected $optimizationActivitysType = 'Google_Service_Dfareporting_OptimizationActivity';
    protected $optimizationActivitysDataType = 'array';

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
     * @param $optimizationActivitys
     */
    public function setOptimizationActivitys($optimizationActivitys)
    {
        $this->optimizationActivitys = $optimizationActivitys;
    }

    /**
     * @return mixed
     */
    public function getOptimizationActivitys()
    {
        return $this->optimizationActivitys;
    }

    /**
     * @return mixed
     */
    public function getOptimizationModel()
    {
        return $this->optimizationModel;
    }

    /**
     * @param $optimizationModel
     */
    public function setOptimizationModel($optimizationModel)
    {
        $this->optimizationModel = $optimizationModel;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeRotation
 */
class Google_Service_Dfareporting_CreativeRotation extends Google_Collection
{
    public $creativeOptimizationConfigurationId;
    public $type;
    public $weightCalculationStrategy;
    protected $collection_key = 'creativeAssignments';
    protected $internal_gapi_mappings = [];
    protected $creativeAssignmentsType = 'Google_Service_Dfareporting_CreativeAssignment';
    protected $creativeAssignmentsDataType = 'array';

    /**
     * @param $creativeAssignments
     */
    public function setCreativeAssignments($creativeAssignments)
    {
        $this->creativeAssignments = $creativeAssignments;
    }

    /**
     * @return mixed
     */
    public function getCreativeAssignments()
    {
        return $this->creativeAssignments;
    }

    /**
     * @return mixed
     */
    public function getCreativeOptimizationConfigurationId()
    {
        return $this->creativeOptimizationConfigurationId;
    }

    /**
     * @param $creativeOptimizationConfigurationId
     */
    public function setCreativeOptimizationConfigurationId($creativeOptimizationConfigurationId)
    {
        $this->creativeOptimizationConfigurationId = $creativeOptimizationConfigurationId;
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
    public function getWeightCalculationStrategy()
    {
        return $this->weightCalculationStrategy;
    }

    /**
     * @param $weightCalculationStrategy
     */
    public function setWeightCalculationStrategy($weightCalculationStrategy)
    {
        $this->weightCalculationStrategy = $weightCalculationStrategy;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativeSettings
 */
class Google_Service_Dfareporting_CreativeSettings extends Google_Model
{
    public $iFrameFooter;
    public $iFrameHeader;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIFrameFooter()
    {
        return $this->iFrameFooter;
    }

    /**
     * @param $iFrameFooter
     */
    public function setIFrameFooter($iFrameFooter)
    {
        $this->iFrameFooter = $iFrameFooter;
    }

    /**
     * @return mixed
     */
    public function getIFrameHeader()
    {
        return $this->iFrameHeader;
    }

    /**
     * @param $iFrameHeader
     */
    public function setIFrameHeader($iFrameHeader)
    {
        $this->iFrameHeader = $iFrameHeader;
    }
}

/**
 * Class Google_Service_Dfareporting_CreativesListResponse
 */
class Google_Service_Dfareporting_CreativesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'creatives';
    protected $internal_gapi_mappings = [];
    protected $creativesType = 'Google_Service_Dfareporting_Creative';
    protected $creativesDataType = 'array';

    /**
     * @param $creatives
     */
    public function setCreatives($creatives)
    {
        $this->creatives = $creatives;
    }

    /**
     * @return mixed
     */
    public function getCreatives()
    {
        return $this->creatives;
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
 * Class Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields
 */
class Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'overlapMetrics';
    protected $internal_gapi_mappings = [];
    protected $breakdownType = 'Google_Service_Dfareporting_Dimension';
    protected $breakdownDataType = 'array';
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionFiltersDataType = 'array';
    protected $metricsType = 'Google_Service_Dfareporting_Metric';
    protected $metricsDataType = 'array';
    protected $overlapMetricsType = 'Google_Service_Dfareporting_Metric';
    protected $overlapMetricsDataType = 'array';


    /**
     * @param $breakdown
     */
    public function setBreakdown($breakdown)
    {
        $this->breakdown = $breakdown;
    }

    /**
     * @return mixed
     */
    public function getBreakdown()
    {
        return $this->breakdown;
    }

    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
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
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $overlapMetrics
     */
    public function setOverlapMetrics($overlapMetrics)
    {
        $this->overlapMetrics = $overlapMetrics;
    }

    /**
     * @return mixed
     */
    public function getOverlapMetrics()
    {
        return $this->overlapMetrics;
    }
}

/**
 * Class Google_Service_Dfareporting_CustomRichMediaEvents
 */
class Google_Service_Dfareporting_CustomRichMediaEvents extends Google_Collection
{
    public $kind;
    protected $collection_key = 'filteredEventIds';
    protected $internal_gapi_mappings = [];
    protected $filteredEventIdsType = 'Google_Service_Dfareporting_DimensionValue';
    protected $filteredEventIdsDataType = 'array';

    /**
     * @param $filteredEventIds
     */
    public function setFilteredEventIds($filteredEventIds)
    {
        $this->filteredEventIds = $filteredEventIds;
    }

    /**
     * @return mixed
     */
    public function getFilteredEventIds()
    {
        return $this->filteredEventIds;
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
 * Class Google_Service_Dfareporting_DateRange
 */
class Google_Service_Dfareporting_DateRange extends Google_Model
{
    public $endDate;
    public $kind;
    public $relativeDateRange;
    public $startDate;
    protected $internal_gapi_mappings = [];

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
    public function getRelativeDateRange()
    {
        return $this->relativeDateRange;
    }

    /**
     * @param $relativeDateRange
     */
    public function setRelativeDateRange($relativeDateRange)
    {
        $this->relativeDateRange = $relativeDateRange;
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
}

/**
 * Class Google_Service_Dfareporting_DayPartTargeting
 */
class Google_Service_Dfareporting_DayPartTargeting extends Google_Collection
{
    public $daysOfWeek;
    public $hoursOfDay;
    public $userLocalTime;
    protected $collection_key = 'hoursOfDay';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDaysOfWeek()
    {
        return $this->daysOfWeek;
    }

    /**
     * @param $daysOfWeek
     */
    public function setDaysOfWeek($daysOfWeek)
    {
        $this->daysOfWeek = $daysOfWeek;
    }

    /**
     * @return mixed
     */
    public function getHoursOfDay()
    {
        return $this->hoursOfDay;
    }

    /**
     * @param $hoursOfDay
     */
    public function setHoursOfDay($hoursOfDay)
    {
        $this->hoursOfDay = $hoursOfDay;
    }

    /**
     * @return mixed
     */
    public function getUserLocalTime()
    {
        return $this->userLocalTime;
    }

    /**
     * @param $userLocalTime
     */
    public function setUserLocalTime($userLocalTime)
    {
        $this->userLocalTime = $userLocalTime;
    }
}

/**
 * Class Google_Service_Dfareporting_DefaultClickThroughEventTagProperties
 */
class Google_Service_Dfareporting_DefaultClickThroughEventTagProperties extends Google_Model
{
    public $defaultClickThroughEventTagId;
    public $overrideInheritedEventTag;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDefaultClickThroughEventTagId()
    {
        return $this->defaultClickThroughEventTagId;
    }

    /**
     * @param $defaultClickThroughEventTagId
     */
    public function setDefaultClickThroughEventTagId($defaultClickThroughEventTagId)
    {
        $this->defaultClickThroughEventTagId = $defaultClickThroughEventTagId;
    }

    /**
     * @return mixed
     */
    public function getOverrideInheritedEventTag()
    {
        return $this->overrideInheritedEventTag;
    }

    /**
     * @param $overrideInheritedEventTag
     */
    public function setOverrideInheritedEventTag($overrideInheritedEventTag)
    {
        $this->overrideInheritedEventTag = $overrideInheritedEventTag;
    }
}

/**
 * Class Google_Service_Dfareporting_DeliverySchedule
 */
class Google_Service_Dfareporting_DeliverySchedule extends Google_Model
{
    public $hardCutoff;
    public $impressionRatio;
    public $priority;
    protected $internal_gapi_mappings = [];
    protected $frequencyCapType = 'Google_Service_Dfareporting_FrequencyCap';
    protected $frequencyCapDataType = '';

    /**
     * @param Google_Service_Dfareporting_FrequencyCap $frequencyCap
     */
    public function setFrequencyCap(Google_Service_Dfareporting_FrequencyCap $frequencyCap)
    {
        $this->frequencyCap = $frequencyCap;
    }

    /**
     * @return mixed
     */
    public function getFrequencyCap()
    {
        return $this->frequencyCap;
    }

    /**
     * @return mixed
     */
    public function getHardCutoff()
    {
        return $this->hardCutoff;
    }

    /**
     * @param $hardCutoff
     */
    public function setHardCutoff($hardCutoff)
    {
        $this->hardCutoff = $hardCutoff;
    }

    /**
     * @return mixed
     */
    public function getImpressionRatio()
    {
        return $this->impressionRatio;
    }

    /**
     * @param $impressionRatio
     */
    public function setImpressionRatio($impressionRatio)
    {
        $this->impressionRatio = $impressionRatio;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
}

/**
 * Class Google_Service_Dfareporting_DfareportingFile
 */
class Google_Service_Dfareporting_DfareportingFile extends Google_Model
{
    public $etag;
    public $fileName;
    public $format;
    public $id;
    public $kind;
    public $lastModifiedTime;
    public $reportId;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $urlsType = 'Google_Service_Dfareporting_DfareportingFileUrls';
    protected $urlsDataType = '';


    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
    }

    /**
     * @return mixed
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * @param $reportId
     */
    public function setReportId($reportId)
    {
        $this->reportId = $reportId;
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
     * @param Google_Service_Dfareporting_DfareportingFileUrls $urls
     */
    public function setUrls(Google_Service_Dfareporting_DfareportingFileUrls $urls)
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
}

/**
 * Class Google_Service_Dfareporting_DfareportingFileUrls
 */
class Google_Service_Dfareporting_DfareportingFileUrls extends Google_Model
{
    public $apiUrl;
    public $browserUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return mixed
     */
    public function getBrowserUrl()
    {
        return $this->browserUrl;
    }

    /**
     * @param $browserUrl
     */
    public function setBrowserUrl($browserUrl)
    {
        $this->browserUrl = $browserUrl;
    }
}

/**
 * Class Google_Service_Dfareporting_DfpSettings
 */
class Google_Service_Dfareporting_DfpSettings extends Google_Model
{
    public $dfpNetworkCode;
    public $dfpNetworkName;
    public $programmaticPlacementAccepted;
    public $pubPaidPlacementAccepted;
    public $publisherPortalOnly;
    protected $internal_gapi_mappings = [
        "dfpNetworkCode" => "dfp_network_code",
        "dfpNetworkName" => "dfp_network_name",
    ];

    /**
     * @return mixed
     */
    public function getDfpNetworkCode()
    {
        return $this->dfpNetworkCode;
    }

    /**
     * @param $dfpNetworkCode
     */
    public function setDfpNetworkCode($dfpNetworkCode)
    {
        $this->dfpNetworkCode = $dfpNetworkCode;
    }

    /**
     * @return mixed
     */
    public function getDfpNetworkName()
    {
        return $this->dfpNetworkName;
    }

    /**
     * @param $dfpNetworkName
     */
    public function setDfpNetworkName($dfpNetworkName)
    {
        $this->dfpNetworkName = $dfpNetworkName;
    }

    /**
     * @return mixed
     */
    public function getProgrammaticPlacementAccepted()
    {
        return $this->programmaticPlacementAccepted;
    }

    /**
     * @param $programmaticPlacementAccepted
     */
    public function setProgrammaticPlacementAccepted($programmaticPlacementAccepted)
    {
        $this->programmaticPlacementAccepted = $programmaticPlacementAccepted;
    }

    /**
     * @return mixed
     */
    public function getPubPaidPlacementAccepted()
    {
        return $this->pubPaidPlacementAccepted;
    }

    /**
     * @param $pubPaidPlacementAccepted
     */
    public function setPubPaidPlacementAccepted($pubPaidPlacementAccepted)
    {
        $this->pubPaidPlacementAccepted = $pubPaidPlacementAccepted;
    }

    /**
     * @return mixed
     */
    public function getPublisherPortalOnly()
    {
        return $this->publisherPortalOnly;
    }

    /**
     * @param $publisherPortalOnly
     */
    public function setPublisherPortalOnly($publisherPortalOnly)
    {
        $this->publisherPortalOnly = $publisherPortalOnly;
    }
}

/**
 * Class Google_Service_Dfareporting_Dimension
 */
class Google_Service_Dfareporting_Dimension extends Google_Model
{
    public $kind;
    public $name;
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
 * Class Google_Service_Dfareporting_DimensionFilter
 */
class Google_Service_Dfareporting_DimensionFilter extends Google_Model
{
    public $dimensionName;
    public $kind;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDimensionName()
    {
        return $this->dimensionName;
    }

    /**
     * @param $dimensionName
     */
    public function setDimensionName($dimensionName)
    {
        $this->dimensionName = $dimensionName;
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
 * Class Google_Service_Dfareporting_DimensionValue
 */
class Google_Service_Dfareporting_DimensionValue extends Google_Model
{
    public $dimensionName;
    public $etag;
    public $id;
    public $kind;
    public $matchType;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDimensionName()
    {
        return $this->dimensionName;
    }

    /**
     * @param $dimensionName
     */
    public function setDimensionName($dimensionName)
    {
        $this->dimensionName = $dimensionName;
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
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * @param $matchType
     */
    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
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
 * Class Google_Service_Dfareporting_DimensionValueList
 */
class Google_Service_Dfareporting_DimensionValueList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Dfareporting_DimensionValue';
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
 * Class Google_Service_Dfareporting_DimensionValueRequest
 */
class Google_Service_Dfareporting_DimensionValueRequest extends Google_Collection
{
    public $dimensionName;
    public $endDate;
    public $kind;
    public $startDate;
    protected $collection_key = 'filters';
    protected $internal_gapi_mappings = [];
    protected $filtersType = 'Google_Service_Dfareporting_DimensionFilter';
    protected $filtersDataType = 'array';

    /**
     * @return mixed
     */
    public function getDimensionName()
    {
        return $this->dimensionName;
    }

    /**
     * @param $dimensionName
     */
    public function setDimensionName($dimensionName)
    {
        $this->dimensionName = $dimensionName;
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
     * @param $filters
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
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
}

/**
 * Class Google_Service_Dfareporting_DirectorySite
 */
class Google_Service_Dfareporting_DirectorySite extends Google_Collection
{
    public $active;
    public $countryId;
    public $currencyId;
    public $description;
    public $id;
    public $inpageTagFormats;
    public $interstitialTagFormats;
    public $kind;
    public $name;
    public $parentId;
    public $url;
    protected $collection_key = 'interstitialTagFormats';
    protected $internal_gapi_mappings = [];
    protected $contactAssignmentsType = 'Google_Service_Dfareporting_DirectorySiteContactAssignment';
    protected $contactAssignmentsDataType = 'array';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $settingsType = 'Google_Service_Dfareporting_DirectorySiteSettings';
    protected $settingsDataType = '';

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @param $contactAssignments
     */
    public function setContactAssignments($contactAssignments)
    {
        $this->contactAssignments = $contactAssignments;
    }

    /**
     * @return mixed
     */
    public function getContactAssignments()
    {
        return $this->contactAssignments;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * @return mixed
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getInpageTagFormats()
    {
        return $this->inpageTagFormats;
    }

    /**
     * @param $inpageTagFormats
     */
    public function setInpageTagFormats($inpageTagFormats)
    {
        $this->inpageTagFormats = $inpageTagFormats;
    }

    /**
     * @return mixed
     */
    public function getInterstitialTagFormats()
    {
        return $this->interstitialTagFormats;
    }

    /**
     * @param $interstitialTagFormats
     */
    public function setInterstitialTagFormats($interstitialTagFormats)
    {
        $this->interstitialTagFormats = $interstitialTagFormats;
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
     * @param Google_Service_Dfareporting_DirectorySiteSettings $settings
     */
    public function setSettings(Google_Service_Dfareporting_DirectorySiteSettings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
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
 * Class Google_Service_Dfareporting_DirectorySiteContact
 */
class Google_Service_Dfareporting_DirectorySiteContact extends Google_Model
{
    public $address;
    public $email;
    public $firstName;
    public $id;
    public $kind;
    public $lastName;
    public $phone;
    public $role;
    public $title;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
 * Class Google_Service_Dfareporting_DirectorySiteContactAssignment
 */
class Google_Service_Dfareporting_DirectorySiteContactAssignment extends Google_Model
{
    public $contactId;
    public $visibility;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
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
 * Class Google_Service_Dfareporting_DirectorySiteContactsListResponse
 */
class Google_Service_Dfareporting_DirectorySiteContactsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'directorySiteContacts';
    protected $internal_gapi_mappings = [];
    protected $directorySiteContactsType = 'Google_Service_Dfareporting_DirectorySiteContact';
    protected $directorySiteContactsDataType = 'array';

    /**
     * @param $directorySiteContacts
     */
    public function setDirectorySiteContacts($directorySiteContacts)
    {
        $this->directorySiteContacts = $directorySiteContacts;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteContacts()
    {
        return $this->directorySiteContacts;
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
 * Class Google_Service_Dfareporting_DirectorySiteSettings
 */
class Google_Service_Dfareporting_DirectorySiteSettings extends Google_Model
{
    public $activeViewOptOut;
    public $instreamVideoPlacementAccepted;
    public $interstitialPlacementAccepted;
    public $nielsenOcrOptOut;
    public $verificationTagOptOut;
    public $videoActiveViewOptOut;
    protected $internal_gapi_mappings = [
        "dfpSettings" => "dfp_settings",
        "instreamVideoPlacementAccepted" => "instream_video_placement_accepted",
    ];
    protected $dfpSettingsType = 'Google_Service_Dfareporting_DfpSettings';
    protected $dfpSettingsDataType = '';

    /**
     * @return mixed
     */
    public function getActiveViewOptOut()
    {
        return $this->activeViewOptOut;
    }

    /**
     * @param $activeViewOptOut
     */
    public function setActiveViewOptOut($activeViewOptOut)
    {
        $this->activeViewOptOut = $activeViewOptOut;
    }

    /**
     * @param Google_Service_Dfareporting_DfpSettings $dfpSettings
     */
    public function setDfpSettings(Google_Service_Dfareporting_DfpSettings $dfpSettings)
    {
        $this->dfpSettings = $dfpSettings;
    }

    /**
     * @return mixed
     */
    public function getDfpSettings()
    {
        return $this->dfpSettings;
    }

    /**
     * @return mixed
     */
    public function getInstreamVideoPlacementAccepted()
    {
        return $this->instreamVideoPlacementAccepted;
    }

    /**
     * @param $instreamVideoPlacementAccepted
     */
    public function setInstreamVideoPlacementAccepted($instreamVideoPlacementAccepted)
    {
        $this->instreamVideoPlacementAccepted = $instreamVideoPlacementAccepted;
    }

    /**
     * @return mixed
     */
    public function getInterstitialPlacementAccepted()
    {
        return $this->interstitialPlacementAccepted;
    }

    /**
     * @param $interstitialPlacementAccepted
     */
    public function setInterstitialPlacementAccepted($interstitialPlacementAccepted)
    {
        $this->interstitialPlacementAccepted = $interstitialPlacementAccepted;
    }

    /**
     * @return mixed
     */
    public function getNielsenOcrOptOut()
    {
        return $this->nielsenOcrOptOut;
    }

    /**
     * @param $nielsenOcrOptOut
     */
    public function setNielsenOcrOptOut($nielsenOcrOptOut)
    {
        $this->nielsenOcrOptOut = $nielsenOcrOptOut;
    }

    /**
     * @return mixed
     */
    public function getVerificationTagOptOut()
    {
        return $this->verificationTagOptOut;
    }

    /**
     * @param $verificationTagOptOut
     */
    public function setVerificationTagOptOut($verificationTagOptOut)
    {
        $this->verificationTagOptOut = $verificationTagOptOut;
    }

    /**
     * @return mixed
     */
    public function getVideoActiveViewOptOut()
    {
        return $this->videoActiveViewOptOut;
    }

    /**
     * @param $videoActiveViewOptOut
     */
    public function setVideoActiveViewOptOut($videoActiveViewOptOut)
    {
        $this->videoActiveViewOptOut = $videoActiveViewOptOut;
    }
}

/**
 * Class Google_Service_Dfareporting_DirectorySitesListResponse
 */
class Google_Service_Dfareporting_DirectorySitesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'directorySites';
    protected $internal_gapi_mappings = [];
    protected $directorySitesType = 'Google_Service_Dfareporting_DirectorySite';
    protected $directorySitesDataType = 'array';

    /**
     * @param $directorySites
     */
    public function setDirectorySites($directorySites)
    {
        $this->directorySites = $directorySites;
    }

    /**
     * @return mixed
     */
    public function getDirectorySites()
    {
        return $this->directorySites;
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
 * Class Google_Service_Dfareporting_EventTag
 */
class Google_Service_Dfareporting_EventTag extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $campaignId;
    public $enabledByDefault;
    public $id;
    public $kind;
    public $name;
    public $siteFilterType;
    public $siteIds;
    public $sslCompliant;
    public $status;
    public $subaccountId;
    public $type;
    public $url;
    public $urlEscapeLevels;
    protected $collection_key = 'siteIds';
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $campaignIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue
     */
    public function setCampaignIdDimensionValue(Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue)
    {
        $this->campaignIdDimensionValue = $campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCampaignIdDimensionValue()
    {
        return $this->campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getEnabledByDefault()
    {
        return $this->enabledByDefault;
    }

    /**
     * @param $enabledByDefault
     */
    public function setEnabledByDefault($enabledByDefault)
    {
        $this->enabledByDefault = $enabledByDefault;
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
    public function getSiteFilterType()
    {
        return $this->siteFilterType;
    }

    /**
     * @param $siteFilterType
     */
    public function setSiteFilterType($siteFilterType)
    {
        $this->siteFilterType = $siteFilterType;
    }

    /**
     * @return mixed
     */
    public function getSiteIds()
    {
        return $this->siteIds;
    }

    /**
     * @param $siteIds
     */
    public function setSiteIds($siteIds)
    {
        $this->siteIds = $siteIds;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
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
    public function getUrlEscapeLevels()
    {
        return $this->urlEscapeLevels;
    }

    /**
     * @param $urlEscapeLevels
     */
    public function setUrlEscapeLevels($urlEscapeLevels)
    {
        $this->urlEscapeLevels = $urlEscapeLevels;
    }
}

/**
 * Class Google_Service_Dfareporting_EventTagOverride
 */
class Google_Service_Dfareporting_EventTagOverride extends Google_Model
{
    public $enabled;
    public $id;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
}

/**
 * Class Google_Service_Dfareporting_EventTagsListResponse
 */
class Google_Service_Dfareporting_EventTagsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'eventTags';
    protected $internal_gapi_mappings = [];
    protected $eventTagsType = 'Google_Service_Dfareporting_EventTag';
    protected $eventTagsDataType = 'array';

    /**
     * @param $eventTags
     */
    public function setEventTags($eventTags)
    {
        $this->eventTags = $eventTags;
    }

    /**
     * @return mixed
     */
    public function getEventTags()
    {
        return $this->eventTags;
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
 * Class Google_Service_Dfareporting_FileList
 */
class Google_Service_Dfareporting_FileList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Dfareporting_DfareportingFile';
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
 * Class Google_Service_Dfareporting_Flight
 */
class Google_Service_Dfareporting_Flight extends Google_Model
{
    public $endDate;
    public $rateOrCost;
    public $startDate;
    public $units;
    protected $internal_gapi_mappings = [];

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
    public function getRateOrCost()
    {
        return $this->rateOrCost;
    }

    /**
     * @param $rateOrCost
     */
    public function setRateOrCost($rateOrCost)
    {
        $this->rateOrCost = $rateOrCost;
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
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param $units
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }
}

/**
 * Class Google_Service_Dfareporting_FloodlightActivitiesGenerateTagResponse
 */
class Google_Service_Dfareporting_FloodlightActivitiesGenerateTagResponse extends Google_Model
{
    public $floodlightActivityTag;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFloodlightActivityTag()
    {
        return $this->floodlightActivityTag;
    }

    /**
     * @param $floodlightActivityTag
     */
    public function setFloodlightActivityTag($floodlightActivityTag)
    {
        $this->floodlightActivityTag = $floodlightActivityTag;
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
 * Class Google_Service_Dfareporting_FloodlightActivitiesListResponse
 */
class Google_Service_Dfareporting_FloodlightActivitiesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'floodlightActivities';
    protected $internal_gapi_mappings = [];
    protected $floodlightActivitiesType = 'Google_Service_Dfareporting_FloodlightActivity';
    protected $floodlightActivitiesDataType = 'array';

    /**
     * @param $floodlightActivities
     */
    public function setFloodlightActivities($floodlightActivities)
    {
        $this->floodlightActivities = $floodlightActivities;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivities()
    {
        return $this->floodlightActivities;
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
 * Class Google_Service_Dfareporting_FloodlightActivity
 */
class Google_Service_Dfareporting_FloodlightActivity extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $cacheBustingType;
    public $countingMethod;
    public $expectedUrl;
    public $floodlightActivityGroupId;
    public $floodlightActivityGroupName;
    public $floodlightActivityGroupTagString;
    public $floodlightActivityGroupType;
    public $floodlightConfigurationId;
    public $hidden;
    public $id;
    public $imageTagEnabled;
    public $kind;
    public $name;
    public $notes;
    public $secure;
    public $sslCompliant;
    public $sslRequired;
    public $subaccountId;
    public $tagFormat;
    public $tagString;
    public $userDefinedVariableTypes;
    protected $collection_key = 'userDefinedVariableTypes';
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $defaultTagsType = 'Google_Service_Dfareporting_FloodlightActivityDynamicTag';
    protected $defaultTagsDataType = 'array';
    protected $floodlightConfigurationIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightConfigurationIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $publisherTagsType = 'Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag';
    protected $publisherTagsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCacheBustingType()
    {
        return $this->cacheBustingType;
    }

    /**
     * @param $cacheBustingType
     */
    public function setCacheBustingType($cacheBustingType)
    {
        $this->cacheBustingType = $cacheBustingType;
    }

    /**
     * @return mixed
     */
    public function getCountingMethod()
    {
        return $this->countingMethod;
    }

    /**
     * @param $countingMethod
     */
    public function setCountingMethod($countingMethod)
    {
        $this->countingMethod = $countingMethod;
    }

    /**
     * @param $defaultTags
     */
    public function setDefaultTags($defaultTags)
    {
        $this->defaultTags = $defaultTags;
    }

    /**
     * @return mixed
     */
    public function getDefaultTags()
    {
        return $this->defaultTags;
    }

    /**
     * @return mixed
     */
    public function getExpectedUrl()
    {
        return $this->expectedUrl;
    }

    /**
     * @param $expectedUrl
     */
    public function setExpectedUrl($expectedUrl)
    {
        $this->expectedUrl = $expectedUrl;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityGroupId()
    {
        return $this->floodlightActivityGroupId;
    }

    /**
     * @param $floodlightActivityGroupId
     */
    public function setFloodlightActivityGroupId($floodlightActivityGroupId)
    {
        $this->floodlightActivityGroupId = $floodlightActivityGroupId;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityGroupName()
    {
        return $this->floodlightActivityGroupName;
    }

    /**
     * @param $floodlightActivityGroupName
     */
    public function setFloodlightActivityGroupName($floodlightActivityGroupName)
    {
        $this->floodlightActivityGroupName = $floodlightActivityGroupName;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityGroupTagString()
    {
        return $this->floodlightActivityGroupTagString;
    }

    /**
     * @param $floodlightActivityGroupTagString
     */
    public function setFloodlightActivityGroupTagString($floodlightActivityGroupTagString)
    {
        $this->floodlightActivityGroupTagString = $floodlightActivityGroupTagString;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityGroupType()
    {
        return $this->floodlightActivityGroupType;
    }

    /**
     * @param $floodlightActivityGroupType
     */
    public function setFloodlightActivityGroupType($floodlightActivityGroupType)
    {
        $this->floodlightActivityGroupType = $floodlightActivityGroupType;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationId()
    {
        return $this->floodlightConfigurationId;
    }

    /**
     * @param $floodlightConfigurationId
     */
    public function setFloodlightConfigurationId($floodlightConfigurationId)
    {
        $this->floodlightConfigurationId = $floodlightConfigurationId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue
     */
    public function setFloodlightConfigurationIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue)
    {
        $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationIdDimensionValue()
    {
        return $this->floodlightConfigurationIdDimensionValue;
    }

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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getImageTagEnabled()
    {
        return $this->imageTagEnabled;
    }

    /**
     * @param $imageTagEnabled
     */
    public function setImageTagEnabled($imageTagEnabled)
    {
        $this->imageTagEnabled = $imageTagEnabled;
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
     * @param $publisherTags
     */
    public function setPublisherTags($publisherTags)
    {
        $this->publisherTags = $publisherTags;
    }

    /**
     * @return mixed
     */
    public function getPublisherTags()
    {
        return $this->publisherTags;
    }

    /**
     * @return mixed
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * @param $secure
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
    }

    /**
     * @return mixed
     */
    public function getSslCompliant()
    {
        return $this->sslCompliant;
    }

    /**
     * @param $sslCompliant
     */
    public function setSslCompliant($sslCompliant)
    {
        $this->sslCompliant = $sslCompliant;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param $sslRequired
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTagFormat()
    {
        return $this->tagFormat;
    }

    /**
     * @param $tagFormat
     */
    public function setTagFormat($tagFormat)
    {
        $this->tagFormat = $tagFormat;
    }

    /**
     * @return mixed
     */
    public function getTagString()
    {
        return $this->tagString;
    }

    /**
     * @param $tagString
     */
    public function setTagString($tagString)
    {
        $this->tagString = $tagString;
    }

    /**
     * @return mixed
     */
    public function getUserDefinedVariableTypes()
    {
        return $this->userDefinedVariableTypes;
    }

    /**
     * @param $userDefinedVariableTypes
     */
    public function setUserDefinedVariableTypes($userDefinedVariableTypes)
    {
        $this->userDefinedVariableTypes = $userDefinedVariableTypes;
    }
}

/**
 * Class Google_Service_Dfareporting_FloodlightActivityDynamicTag
 */
class Google_Service_Dfareporting_FloodlightActivityDynamicTag extends Google_Model
{
    public $id;
    public $name;
    public $tag;
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
 * Class Google_Service_Dfareporting_FloodlightActivityGroup
 */
class Google_Service_Dfareporting_FloodlightActivityGroup extends Google_Model
{
    public $accountId;
    public $advertiserId;
    public $floodlightConfigurationId;
    public $id;
    public $kind;
    public $name;
    public $subaccountId;
    public $tagString;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $floodlightConfigurationIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightConfigurationIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationId()
    {
        return $this->floodlightConfigurationId;
    }

    /**
     * @param $floodlightConfigurationId
     */
    public function setFloodlightConfigurationId($floodlightConfigurationId)
    {
        $this->floodlightConfigurationId = $floodlightConfigurationId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue
     */
    public function setFloodlightConfigurationIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue)
    {
        $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurationIdDimensionValue()
    {
        return $this->floodlightConfigurationIdDimensionValue;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTagString()
    {
        return $this->tagString;
    }

    /**
     * @param $tagString
     */
    public function setTagString($tagString)
    {
        $this->tagString = $tagString;
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
 * Class Google_Service_Dfareporting_FloodlightActivityGroupsListResponse
 */
class Google_Service_Dfareporting_FloodlightActivityGroupsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'floodlightActivityGroups';
    protected $internal_gapi_mappings = [];
    protected $floodlightActivityGroupsType = 'Google_Service_Dfareporting_FloodlightActivityGroup';
    protected $floodlightActivityGroupsDataType = 'array';

    /**
     * @param $floodlightActivityGroups
     */
    public function setFloodlightActivityGroups($floodlightActivityGroups)
    {
        $this->floodlightActivityGroups = $floodlightActivityGroups;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityGroups()
    {
        return $this->floodlightActivityGroups;
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
 * Class Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag
 */
class Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag extends Google_Model
{
    public $clickThrough;
    public $directorySiteId;
    public $siteId;
    public $viewThrough;
    protected $internal_gapi_mappings = [];
    protected $dynamicTagType = 'Google_Service_Dfareporting_FloodlightActivityDynamicTag';
    protected $dynamicTagDataType = '';
    protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $siteIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getClickThrough()
    {
        return $this->clickThrough;
    }

    /**
     * @param $clickThrough
     */
    public function setClickThrough($clickThrough)
    {
        $this->clickThrough = $clickThrough;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteId()
    {
        return $this->directorySiteId;
    }

    /**
     * @param $directorySiteId
     */
    public function setDirectorySiteId($directorySiteId)
    {
        $this->directorySiteId = $directorySiteId;
    }

    /**
     * @param Google_Service_Dfareporting_FloodlightActivityDynamicTag $dynamicTag
     */
    public function setDynamicTag(Google_Service_Dfareporting_FloodlightActivityDynamicTag $dynamicTag)
    {
        $this->dynamicTag = $dynamicTag;
    }

    /**
     * @return mixed
     */
    public function getDynamicTag()
    {
        return $this->dynamicTag;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue
     */
    public function setSiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue)
    {
        $this->siteIdDimensionValue = $siteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getSiteIdDimensionValue()
    {
        return $this->siteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getViewThrough()
    {
        return $this->viewThrough;
    }

    /**
     * @param $viewThrough
     */
    public function setViewThrough($viewThrough)
    {
        $this->viewThrough = $viewThrough;
    }
}

/**
 * Class Google_Service_Dfareporting_FloodlightConfiguration
 */
class Google_Service_Dfareporting_FloodlightConfiguration extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $analyticsDataSharingEnabled;
    public $exposureToConversionEnabled;
    public $firstDayOfWeek;
    public $id;
    public $kind;
    public $naturalSearchConversionAttributionOption;
    public $sslRequired;
    public $standardVariableTypes;
    public $subaccountId;
    protected $collection_key = 'userDefinedVariableConfigurations';
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
    protected $lookbackConfigurationDataType = '';
    protected $omnitureSettingsType = 'Google_Service_Dfareporting_OmnitureSettings';
    protected $omnitureSettingsDataType = '';
    protected $tagSettingsType = 'Google_Service_Dfareporting_TagSettings';
    protected $tagSettingsDataType = '';
    protected $userDefinedVariableConfigurationsType = 'Google_Service_Dfareporting_UserDefinedVariableConfiguration';
    protected $userDefinedVariableConfigurationsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAnalyticsDataSharingEnabled()
    {
        return $this->analyticsDataSharingEnabled;
    }

    /**
     * @param $analyticsDataSharingEnabled
     */
    public function setAnalyticsDataSharingEnabled($analyticsDataSharingEnabled)
    {
        $this->analyticsDataSharingEnabled = $analyticsDataSharingEnabled;
    }

    /**
     * @return mixed
     */
    public function getExposureToConversionEnabled()
    {
        return $this->exposureToConversionEnabled;
    }

    /**
     * @param $exposureToConversionEnabled
     */
    public function setExposureToConversionEnabled($exposureToConversionEnabled)
    {
        $this->exposureToConversionEnabled = $exposureToConversionEnabled;
    }

    /**
     * @return mixed
     */
    public function getFirstDayOfWeek()
    {
        return $this->firstDayOfWeek;
    }

    /**
     * @param $firstDayOfWeek
     */
    public function setFirstDayOfWeek($firstDayOfWeek)
    {
        $this->firstDayOfWeek = $firstDayOfWeek;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
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
     * @param Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration
     */
    public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
    {
        $this->lookbackConfiguration = $lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getLookbackConfiguration()
    {
        return $this->lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getNaturalSearchConversionAttributionOption()
    {
        return $this->naturalSearchConversionAttributionOption;
    }

    /**
     * @param $naturalSearchConversionAttributionOption
     */
    public function setNaturalSearchConversionAttributionOption($naturalSearchConversionAttributionOption)
    {
        $this->naturalSearchConversionAttributionOption = $naturalSearchConversionAttributionOption;
    }

    /**
     * @param Google_Service_Dfareporting_OmnitureSettings $omnitureSettings
     */
    public function setOmnitureSettings(Google_Service_Dfareporting_OmnitureSettings $omnitureSettings)
    {
        $this->omnitureSettings = $omnitureSettings;
    }

    /**
     * @return mixed
     */
    public function getOmnitureSettings()
    {
        return $this->omnitureSettings;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param $sslRequired
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
    }

    /**
     * @return mixed
     */
    public function getStandardVariableTypes()
    {
        return $this->standardVariableTypes;
    }

    /**
     * @param $standardVariableTypes
     */
    public function setStandardVariableTypes($standardVariableTypes)
    {
        $this->standardVariableTypes = $standardVariableTypes;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @param Google_Service_Dfareporting_TagSettings $tagSettings
     */
    public function setTagSettings(Google_Service_Dfareporting_TagSettings $tagSettings)
    {
        $this->tagSettings = $tagSettings;
    }

    /**
     * @return mixed
     */
    public function getTagSettings()
    {
        return $this->tagSettings;
    }

    /**
     * @param $userDefinedVariableConfigurations
     */
    public function setUserDefinedVariableConfigurations($userDefinedVariableConfigurations)
    {
        $this->userDefinedVariableConfigurations = $userDefinedVariableConfigurations;
    }

    /**
     * @return mixed
     */
    public function getUserDefinedVariableConfigurations()
    {
        return $this->userDefinedVariableConfigurations;
    }
}

/**
 * Class Google_Service_Dfareporting_FloodlightConfigurationsListResponse
 */
class Google_Service_Dfareporting_FloodlightConfigurationsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'floodlightConfigurations';
    protected $internal_gapi_mappings = [];
    protected $floodlightConfigurationsType = 'Google_Service_Dfareporting_FloodlightConfiguration';
    protected $floodlightConfigurationsDataType = 'array';

    /**
     * @param $floodlightConfigurations
     */
    public function setFloodlightConfigurations($floodlightConfigurations)
    {
        $this->floodlightConfigurations = $floodlightConfigurations;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigurations()
    {
        return $this->floodlightConfigurations;
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
 * Class Google_Service_Dfareporting_FloodlightReportCompatibleFields
 */
class Google_Service_Dfareporting_FloodlightReportCompatibleFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'metrics';
    protected $internal_gapi_mappings = [];
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionsDataType = 'array';
    protected $metricsType = 'Google_Service_Dfareporting_Metric';
    protected $metricsDataType = 'array';


    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
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
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }
}

/**
 * Class Google_Service_Dfareporting_FrequencyCap
 */
class Google_Service_Dfareporting_FrequencyCap extends Google_Model
{
    public $duration;
    public $impressions;
    protected $internal_gapi_mappings = [];

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
    public function getImpressions()
    {
        return $this->impressions;
    }

    /**
     * @param $impressions
     */
    public function setImpressions($impressions)
    {
        $this->impressions = $impressions;
    }
}

/**
 * Class Google_Service_Dfareporting_FsCommand
 */
class Google_Service_Dfareporting_FsCommand extends Google_Model
{
    public $left;
    public $positionOption;
    public $top;
    public $windowHeight;
    public $windowWidth;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return mixed
     */
    public function getPositionOption()
    {
        return $this->positionOption;
    }

    /**
     * @param $positionOption
     */
    public function setPositionOption($positionOption)
    {
        $this->positionOption = $positionOption;
    }

    /**
     * @return mixed
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }

    /**
     * @return mixed
     */
    public function getWindowHeight()
    {
        return $this->windowHeight;
    }

    /**
     * @param $windowHeight
     */
    public function setWindowHeight($windowHeight)
    {
        $this->windowHeight = $windowHeight;
    }

    /**
     * @return mixed
     */
    public function getWindowWidth()
    {
        return $this->windowWidth;
    }

    /**
     * @param $windowWidth
     */
    public function setWindowWidth($windowWidth)
    {
        $this->windowWidth = $windowWidth;
    }
}

/**
 * Class Google_Service_Dfareporting_GeoTargeting
 */
class Google_Service_Dfareporting_GeoTargeting extends Google_Collection
{
    public $excludeCountries;
    protected $collection_key = 'regions';
    protected $internal_gapi_mappings = [];
    protected $citiesType = 'Google_Service_Dfareporting_City';
    protected $citiesDataType = 'array';
    protected $countriesType = 'Google_Service_Dfareporting_Country';
    protected $countriesDataType = 'array';
    protected $metrosType = 'Google_Service_Dfareporting_Metro';
    protected $metrosDataType = 'array';
    protected $postalCodesType = 'Google_Service_Dfareporting_PostalCode';
    protected $postalCodesDataType = 'array';
    protected $regionsType = 'Google_Service_Dfareporting_Region';
    protected $regionsDataType = 'array';


    /**
     * @param $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
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
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @return mixed
     */
    public function getExcludeCountries()
    {
        return $this->excludeCountries;
    }

    /**
     * @param $excludeCountries
     */
    public function setExcludeCountries($excludeCountries)
    {
        $this->excludeCountries = $excludeCountries;
    }

    /**
     * @param $metros
     */
    public function setMetros($metros)
    {
        $this->metros = $metros;
    }

    /**
     * @return mixed
     */
    public function getMetros()
    {
        return $this->metros;
    }

    /**
     * @param $postalCodes
     */
    public function setPostalCodes($postalCodes)
    {
        $this->postalCodes = $postalCodes;
    }

    /**
     * @return mixed
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }

    /**
     * @param $regions
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;
    }

    /**
     * @return mixed
     */
    public function getRegions()
    {
        return $this->regions;
    }
}

/**
 * Class Google_Service_Dfareporting_InventoryItem
 */
class Google_Service_Dfareporting_InventoryItem extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $contentCategoryId;
    public $estimatedClickThroughRate;
    public $estimatedConversionRate;
    public $id;
    public $inPlan;
    public $kind;
    public $name;
    public $negotiationChannelId;
    public $orderId;
    public $placementStrategyId;
    public $projectId;
    public $rfpId;
    public $siteId;
    public $subaccountId;
    protected $collection_key = 'adSlots';
    protected $internal_gapi_mappings = [];
    protected $adSlotsType = 'Google_Service_Dfareporting_AdSlot';
    protected $adSlotsDataType = 'array';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $pricingType = 'Google_Service_Dfareporting_Pricing';
    protected $pricingDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param $adSlots
     */
    public function setAdSlots($adSlots)
    {
        $this->adSlots = $adSlots;
    }

    /**
     * @return mixed
     */
    public function getAdSlots()
    {
        return $this->adSlots;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return mixed
     */
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    /**
     * @param $contentCategoryId
     */
    public function setContentCategoryId($contentCategoryId)
    {
        $this->contentCategoryId = $contentCategoryId;
    }

    /**
     * @return mixed
     */
    public function getEstimatedClickThroughRate()
    {
        return $this->estimatedClickThroughRate;
    }

    /**
     * @param $estimatedClickThroughRate
     */
    public function setEstimatedClickThroughRate($estimatedClickThroughRate)
    {
        $this->estimatedClickThroughRate = $estimatedClickThroughRate;
    }

    /**
     * @return mixed
     */
    public function getEstimatedConversionRate()
    {
        return $this->estimatedConversionRate;
    }

    /**
     * @param $estimatedConversionRate
     */
    public function setEstimatedConversionRate($estimatedConversionRate)
    {
        $this->estimatedConversionRate = $estimatedConversionRate;
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
    public function getInPlan()
    {
        return $this->inPlan;
    }

    /**
     * @param $inPlan
     */
    public function setInPlan($inPlan)
    {
        $this->inPlan = $inPlan;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
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
    public function getNegotiationChannelId()
    {
        return $this->negotiationChannelId;
    }

    /**
     * @param $negotiationChannelId
     */
    public function setNegotiationChannelId($negotiationChannelId)
    {
        $this->negotiationChannelId = $negotiationChannelId;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getPlacementStrategyId()
    {
        return $this->placementStrategyId;
    }

    /**
     * @param $placementStrategyId
     */
    public function setPlacementStrategyId($placementStrategyId)
    {
        $this->placementStrategyId = $placementStrategyId;
    }

    /**
     * @param Google_Service_Dfareporting_Pricing $pricing
     */
    public function setPricing(Google_Service_Dfareporting_Pricing $pricing)
    {
        $this->pricing = $pricing;
    }

    /**
     * @return mixed
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getRfpId()
    {
        return $this->rfpId;
    }

    /**
     * @param $rfpId
     */
    public function setRfpId($rfpId)
    {
        $this->rfpId = $rfpId;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_InventoryItemsListResponse
 */
class Google_Service_Dfareporting_InventoryItemsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'inventoryItems';
    protected $internal_gapi_mappings = [];
    protected $inventoryItemsType = 'Google_Service_Dfareporting_InventoryItem';
    protected $inventoryItemsDataType = 'array';

    /**
     * @param $inventoryItems
     */
    public function setInventoryItems($inventoryItems)
    {
        $this->inventoryItems = $inventoryItems;
    }

    /**
     * @return mixed
     */
    public function getInventoryItems()
    {
        return $this->inventoryItems;
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
 * Class Google_Service_Dfareporting_KeyValueTargetingExpression
 */
class Google_Service_Dfareporting_KeyValueTargetingExpression extends Google_Model
{
    public $expression;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @param $expression
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    }
}

/**
 * Class Google_Service_Dfareporting_LandingPage
 */
class Google_Service_Dfareporting_LandingPage extends Google_Model
{
    public $default;
    public $id;
    public $kind;
    public $name;
    public $url;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Dfareporting_LandingPagesListResponse
 */
class Google_Service_Dfareporting_LandingPagesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'landingPages';
    protected $internal_gapi_mappings = [];
    protected $landingPagesType = 'Google_Service_Dfareporting_LandingPage';
    protected $landingPagesDataType = 'array';

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
     * @param $landingPages
     */
    public function setLandingPages($landingPages)
    {
        $this->landingPages = $landingPages;
    }

    /**
     * @return mixed
     */
    public function getLandingPages()
    {
        return $this->landingPages;
    }
}

/**
 * Class Google_Service_Dfareporting_LastModifiedInfo
 */
class Google_Service_Dfareporting_LastModifiedInfo extends Google_Model
{
    public $time;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
}

/**
 * Class Google_Service_Dfareporting_ListPopulationClause
 */
class Google_Service_Dfareporting_ListPopulationClause extends Google_Collection
{
    protected $collection_key = 'terms';
    protected $internal_gapi_mappings = [];
    protected $termsType = 'Google_Service_Dfareporting_ListPopulationTerm';
    protected $termsDataType = 'array';


    /**
     * @param $terms
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
    }

    /**
     * @return mixed
     */
    public function getTerms()
    {
        return $this->terms;
    }
}

/**
 * Class Google_Service_Dfareporting_ListPopulationRule
 */
class Google_Service_Dfareporting_ListPopulationRule extends Google_Collection
{
    public $floodlightActivityId;
    public $floodlightActivityName;
    protected $collection_key = 'listPopulationClauses';
    protected $internal_gapi_mappings = [];
    protected $listPopulationClausesType = 'Google_Service_Dfareporting_ListPopulationClause';
    protected $listPopulationClausesDataType = 'array';

    /**
     * @return mixed
     */
    public function getFloodlightActivityId()
    {
        return $this->floodlightActivityId;
    }

    /**
     * @param $floodlightActivityId
     */
    public function setFloodlightActivityId($floodlightActivityId)
    {
        $this->floodlightActivityId = $floodlightActivityId;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityName()
    {
        return $this->floodlightActivityName;
    }

    /**
     * @param $floodlightActivityName
     */
    public function setFloodlightActivityName($floodlightActivityName)
    {
        $this->floodlightActivityName = $floodlightActivityName;
    }

    /**
     * @param $listPopulationClauses
     */
    public function setListPopulationClauses($listPopulationClauses)
    {
        $this->listPopulationClauses = $listPopulationClauses;
    }

    /**
     * @return mixed
     */
    public function getListPopulationClauses()
    {
        return $this->listPopulationClauses;
    }
}

/**
 * Class Google_Service_Dfareporting_ListPopulationTerm
 */
class Google_Service_Dfareporting_ListPopulationTerm extends Google_Model
{
    public $contains;
    public $negation;
    public $operator;
    public $remarketingListId;
    public $type;
    public $value;
    public $variableFriendlyName;
    public $variableName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContains()
    {
        return $this->contains;
    }

    /**
     * @param $contains
     */
    public function setContains($contains)
    {
        $this->contains = $contains;
    }

    /**
     * @return mixed
     */
    public function getNegation()
    {
        return $this->negation;
    }

    /**
     * @param $negation
     */
    public function setNegation($negation)
    {
        $this->negation = $negation;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getRemarketingListId()
    {
        return $this->remarketingListId;
    }

    /**
     * @param $remarketingListId
     */
    public function setRemarketingListId($remarketingListId)
    {
        $this->remarketingListId = $remarketingListId;
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
    public function getVariableFriendlyName()
    {
        return $this->variableFriendlyName;
    }

    /**
     * @param $variableFriendlyName
     */
    public function setVariableFriendlyName($variableFriendlyName)
    {
        $this->variableFriendlyName = $variableFriendlyName;
    }

    /**
     * @return mixed
     */
    public function getVariableName()
    {
        return $this->variableName;
    }

    /**
     * @param $variableName
     */
    public function setVariableName($variableName)
    {
        $this->variableName = $variableName;
    }
}

/**
 * Class Google_Service_Dfareporting_ListTargetingExpression
 */
class Google_Service_Dfareporting_ListTargetingExpression extends Google_Model
{
    public $expression;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @param $expression
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    }
}

/**
 * Class Google_Service_Dfareporting_LookbackConfiguration
 */
class Google_Service_Dfareporting_LookbackConfiguration extends Google_Model
{
    public $clickDuration;
    public $postImpressionActivitiesDuration;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getClickDuration()
    {
        return $this->clickDuration;
    }

    /**
     * @param $clickDuration
     */
    public function setClickDuration($clickDuration)
    {
        $this->clickDuration = $clickDuration;
    }

    /**
     * @return mixed
     */
    public function getPostImpressionActivitiesDuration()
    {
        return $this->postImpressionActivitiesDuration;
    }

    /**
     * @param $postImpressionActivitiesDuration
     */
    public function setPostImpressionActivitiesDuration($postImpressionActivitiesDuration)
    {
        $this->postImpressionActivitiesDuration = $postImpressionActivitiesDuration;
    }
}

/**
 * Class Google_Service_Dfareporting_Metric
 */
class Google_Service_Dfareporting_Metric extends Google_Model
{
    public $kind;
    public $name;
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
 * Class Google_Service_Dfareporting_Metro
 */
class Google_Service_Dfareporting_Metro extends Google_Model
{
    public $countryCode;
    public $countryDartId;
    public $dartId;
    public $dmaId;
    public $kind;
    public $metroCode;
    public $name;
    protected $internal_gapi_mappings = [];

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
    public function getCountryDartId()
    {
        return $this->countryDartId;
    }

    /**
     * @param $countryDartId
     */
    public function setCountryDartId($countryDartId)
    {
        $this->countryDartId = $countryDartId;
    }

    /**
     * @return mixed
     */
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
    }

    /**
     * @return mixed
     */
    public function getDmaId()
    {
        return $this->dmaId;
    }

    /**
     * @param $dmaId
     */
    public function setDmaId($dmaId)
    {
        $this->dmaId = $dmaId;
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
    public function getMetroCode()
    {
        return $this->metroCode;
    }

    /**
     * @param $metroCode
     */
    public function setMetroCode($metroCode)
    {
        $this->metroCode = $metroCode;
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
 * Class Google_Service_Dfareporting_MetrosListResponse
 */
class Google_Service_Dfareporting_MetrosListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'metros';
    protected $internal_gapi_mappings = [];
    protected $metrosType = 'Google_Service_Dfareporting_Metro';
    protected $metrosDataType = 'array';

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
     * @param $metros
     */
    public function setMetros($metros)
    {
        $this->metros = $metros;
    }

    /**
     * @return mixed
     */
    public function getMetros()
    {
        return $this->metros;
    }
}

/**
 * Class Google_Service_Dfareporting_MobileCarrier
 */
class Google_Service_Dfareporting_MobileCarrier extends Google_Model
{
    public $countryCode;
    public $countryDartId;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];

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
    public function getCountryDartId()
    {
        return $this->countryDartId;
    }

    /**
     * @param $countryDartId
     */
    public function setCountryDartId($countryDartId)
    {
        $this->countryDartId = $countryDartId;
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
}

/**
 * Class Google_Service_Dfareporting_MobileCarriersListResponse
 */
class Google_Service_Dfareporting_MobileCarriersListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'mobileCarriers';
    protected $internal_gapi_mappings = [];
    protected $mobileCarriersType = 'Google_Service_Dfareporting_MobileCarrier';
    protected $mobileCarriersDataType = 'array';

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
     * @param $mobileCarriers
     */
    public function setMobileCarriers($mobileCarriers)
    {
        $this->mobileCarriers = $mobileCarriers;
    }

    /**
     * @return mixed
     */
    public function getMobileCarriers()
    {
        return $this->mobileCarriers;
    }
}

/**
 * Class Google_Service_Dfareporting_ObjectFilter
 */
class Google_Service_Dfareporting_ObjectFilter extends Google_Collection
{
    public $kind;
    public $objectIds;
    public $status;
    protected $collection_key = 'objectIds';
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
    public function getObjectIds()
    {
        return $this->objectIds;
    }

    /**
     * @param $objectIds
     */
    public function setObjectIds($objectIds)
    {
        $this->objectIds = $objectIds;
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
 * Class Google_Service_Dfareporting_OffsetPosition
 */
class Google_Service_Dfareporting_OffsetPosition extends Google_Model
{
    public $left;
    public $top;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param $left
     */
    public function setLeft($left)
    {
        $this->left = $left;
    }

    /**
     * @return mixed
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }
}

/**
 * Class Google_Service_Dfareporting_OmnitureSettings
 */
class Google_Service_Dfareporting_OmnitureSettings extends Google_Model
{
    public $omnitureCostDataEnabled;
    public $omnitureIntegrationEnabled;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getOmnitureCostDataEnabled()
    {
        return $this->omnitureCostDataEnabled;
    }

    /**
     * @param $omnitureCostDataEnabled
     */
    public function setOmnitureCostDataEnabled($omnitureCostDataEnabled)
    {
        $this->omnitureCostDataEnabled = $omnitureCostDataEnabled;
    }

    /**
     * @return mixed
     */
    public function getOmnitureIntegrationEnabled()
    {
        return $this->omnitureIntegrationEnabled;
    }

    /**
     * @param $omnitureIntegrationEnabled
     */
    public function setOmnitureIntegrationEnabled($omnitureIntegrationEnabled)
    {
        $this->omnitureIntegrationEnabled = $omnitureIntegrationEnabled;
    }
}

/**
 * Class Google_Service_Dfareporting_OperatingSystem
 */
class Google_Service_Dfareporting_OperatingSystem extends Google_Model
{
    public $dartId;
    public $desktop;
    public $kind;
    public $mobile;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
    }

    /**
     * @return mixed
     */
    public function getDesktop()
    {
        return $this->desktop;
    }

    /**
     * @param $desktop
     */
    public function setDesktop($desktop)
    {
        $this->desktop = $desktop;
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
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
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
 * Class Google_Service_Dfareporting_OperatingSystemVersion
 */
class Google_Service_Dfareporting_OperatingSystemVersion extends Google_Model
{
    public $id;
    public $kind;
    public $majorVersion;
    public $minorVersion;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $operatingSystemType = 'Google_Service_Dfareporting_OperatingSystem';
    protected $operatingSystemDataType = '';

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
    public function getMajorVersion()
    {
        return $this->majorVersion;
    }

    /**
     * @param $majorVersion
     */
    public function setMajorVersion($majorVersion)
    {
        $this->majorVersion = $majorVersion;
    }

    /**
     * @return mixed
     */
    public function getMinorVersion()
    {
        return $this->minorVersion;
    }

    /**
     * @param $minorVersion
     */
    public function setMinorVersion($minorVersion)
    {
        $this->minorVersion = $minorVersion;
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
     * @param Google_Service_Dfareporting_OperatingSystem $operatingSystem
     */
    public function setOperatingSystem(Google_Service_Dfareporting_OperatingSystem $operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }
}

/**
 * Class Google_Service_Dfareporting_OperatingSystemVersionsListResponse
 */
class Google_Service_Dfareporting_OperatingSystemVersionsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'operatingSystemVersions';
    protected $internal_gapi_mappings = [];
    protected $operatingSystemVersionsType = 'Google_Service_Dfareporting_OperatingSystemVersion';
    protected $operatingSystemVersionsDataType = 'array';

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
     * @param $operatingSystemVersions
     */
    public function setOperatingSystemVersions($operatingSystemVersions)
    {
        $this->operatingSystemVersions = $operatingSystemVersions;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystemVersions()
    {
        return $this->operatingSystemVersions;
    }
}

/**
 * Class Google_Service_Dfareporting_OperatingSystemsListResponse
 */
class Google_Service_Dfareporting_OperatingSystemsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'operatingSystems';
    protected $internal_gapi_mappings = [];
    protected $operatingSystemsType = 'Google_Service_Dfareporting_OperatingSystem';
    protected $operatingSystemsDataType = 'array';

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
     * @param $operatingSystems
     */
    public function setOperatingSystems($operatingSystems)
    {
        $this->operatingSystems = $operatingSystems;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystems()
    {
        return $this->operatingSystems;
    }
}

/**
 * Class Google_Service_Dfareporting_OptimizationActivity
 */
class Google_Service_Dfareporting_OptimizationActivity extends Google_Model
{
    public $floodlightActivityId;
    public $weight;
    protected $internal_gapi_mappings = [];
    protected $floodlightActivityIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightActivityIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getFloodlightActivityId()
    {
        return $this->floodlightActivityId;
    }

    /**
     * @param $floodlightActivityId
     */
    public function setFloodlightActivityId($floodlightActivityId)
    {
        $this->floodlightActivityId = $floodlightActivityId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightActivityIdDimensionValue
     */
    public function setFloodlightActivityIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightActivityIdDimensionValue)
    {
        $this->floodlightActivityIdDimensionValue = $floodlightActivityIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityIdDimensionValue()
    {
        return $this->floodlightActivityIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}

/**
 * Class Google_Service_Dfareporting_Order
 */
class Google_Service_Dfareporting_Order extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $approverUserProfileIds;
    public $buyerInvoiceId;
    public $buyerOrganizationName;
    public $comments;
    public $id;
    public $kind;
    public $name;
    public $notes;
    public $planningTermId;
    public $projectId;
    public $sellerOrderId;
    public $sellerOrganizationName;
    public $siteId;
    public $siteNames;
    public $subaccountId;
    public $termsAndConditions;
    protected $collection_key = 'siteNames';
    protected $internal_gapi_mappings = [];
    protected $contactsType = 'Google_Service_Dfareporting_OrderContact';
    protected $contactsDataType = 'array';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return mixed
     */
    public function getApproverUserProfileIds()
    {
        return $this->approverUserProfileIds;
    }

    /**
     * @param $approverUserProfileIds
     */
    public function setApproverUserProfileIds($approverUserProfileIds)
    {
        $this->approverUserProfileIds = $approverUserProfileIds;
    }

    /**
     * @return mixed
     */
    public function getBuyerInvoiceId()
    {
        return $this->buyerInvoiceId;
    }

    /**
     * @param $buyerInvoiceId
     */
    public function setBuyerInvoiceId($buyerInvoiceId)
    {
        $this->buyerInvoiceId = $buyerInvoiceId;
    }

    /**
     * @return mixed
     */
    public function getBuyerOrganizationName()
    {
        return $this->buyerOrganizationName;
    }

    /**
     * @param $buyerOrganizationName
     */
    public function setBuyerOrganizationName($buyerOrganizationName)
    {
        $this->buyerOrganizationName = $buyerOrganizationName;
    }

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
     * @param $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
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
    public function getPlanningTermId()
    {
        return $this->planningTermId;
    }

    /**
     * @param $planningTermId
     */
    public function setPlanningTermId($planningTermId)
    {
        $this->planningTermId = $planningTermId;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getSellerOrderId()
    {
        return $this->sellerOrderId;
    }

    /**
     * @param $sellerOrderId
     */
    public function setSellerOrderId($sellerOrderId)
    {
        $this->sellerOrderId = $sellerOrderId;
    }

    /**
     * @return mixed
     */
    public function getSellerOrganizationName()
    {
        return $this->sellerOrganizationName;
    }

    /**
     * @param $sellerOrganizationName
     */
    public function setSellerOrganizationName($sellerOrganizationName)
    {
        $this->sellerOrganizationName = $sellerOrganizationName;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @return mixed
     */
    public function getSiteNames()
    {
        return $this->siteNames;
    }

    /**
     * @param $siteNames
     */
    public function setSiteNames($siteNames)
    {
        $this->siteNames = $siteNames;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTermsAndConditions()
    {
        return $this->termsAndConditions;
    }

    /**
     * @param $termsAndConditions
     */
    public function setTermsAndConditions($termsAndConditions)
    {
        $this->termsAndConditions = $termsAndConditions;
    }
}

/**
 * Class Google_Service_Dfareporting_OrderContact
 */
class Google_Service_Dfareporting_OrderContact extends Google_Model
{
    public $contactInfo;
    public $contactName;
    public $contactTitle;
    public $contactType;
    public $signatureUserProfileId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContactInfo()
    {
        return $this->contactInfo;
    }

    /**
     * @param $contactInfo
     */
    public function setContactInfo($contactInfo)
    {
        $this->contactInfo = $contactInfo;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param $contactName
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    /**
     * @return mixed
     */
    public function getContactTitle()
    {
        return $this->contactTitle;
    }

    /**
     * @param $contactTitle
     */
    public function setContactTitle($contactTitle)
    {
        $this->contactTitle = $contactTitle;
    }

    /**
     * @return mixed
     */
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @param $contactType
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;
    }

    /**
     * @return mixed
     */
    public function getSignatureUserProfileId()
    {
        return $this->signatureUserProfileId;
    }

    /**
     * @param $signatureUserProfileId
     */
    public function setSignatureUserProfileId($signatureUserProfileId)
    {
        $this->signatureUserProfileId = $signatureUserProfileId;
    }
}

/**
 * Class Google_Service_Dfareporting_OrderDocument
 */
class Google_Service_Dfareporting_OrderDocument extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $amendedOrderDocumentId;
    public $approvedByUserProfileIds;
    public $cancelled;
    public $effectiveDate;
    public $id;
    public $kind;
    public $orderId;
    public $projectId;
    public $signed;
    public $subaccountId;
    public $title;
    public $type;
    protected $collection_key = 'approvedByUserProfileIds';
    protected $internal_gapi_mappings = [];
    protected $createdInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $createdInfoDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return mixed
     */
    public function getAmendedOrderDocumentId()
    {
        return $this->amendedOrderDocumentId;
    }

    /**
     * @param $amendedOrderDocumentId
     */
    public function setAmendedOrderDocumentId($amendedOrderDocumentId)
    {
        $this->amendedOrderDocumentId = $amendedOrderDocumentId;
    }

    /**
     * @return mixed
     */
    public function getApprovedByUserProfileIds()
    {
        return $this->approvedByUserProfileIds;
    }

    /**
     * @param $approvedByUserProfileIds
     */
    public function setApprovedByUserProfileIds($approvedByUserProfileIds)
    {
        $this->approvedByUserProfileIds = $approvedByUserProfileIds;
    }

    /**
     * @return mixed
     */
    public function getCancelled()
    {
        return $this->cancelled;
    }

    /**
     * @param $cancelled
     */
    public function setCancelled($cancelled)
    {
        $this->cancelled = $cancelled;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $createdInfo
     */
    public function setCreatedInfo(Google_Service_Dfareporting_LastModifiedInfo $createdInfo)
    {
        $this->createdInfo = $createdInfo;
    }

    /**
     * @return mixed
     */
    public function getCreatedInfo()
    {
        return $this->createdInfo;
    }

    /**
     * @return mixed
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @param $effectiveDate
     */
    public function setEffectiveDate($effectiveDate)
    {
        $this->effectiveDate = $effectiveDate;
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
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getSigned()
    {
        return $this->signed;
    }

    /**
     * @param $signed
     */
    public function setSigned($signed)
    {
        $this->signed = $signed;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
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
 * Class Google_Service_Dfareporting_OrderDocumentsListResponse
 */
class Google_Service_Dfareporting_OrderDocumentsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'orderDocuments';
    protected $internal_gapi_mappings = [];
    protected $orderDocumentsType = 'Google_Service_Dfareporting_OrderDocument';
    protected $orderDocumentsDataType = 'array';

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
     * @param $orderDocuments
     */
    public function setOrderDocuments($orderDocuments)
    {
        $this->orderDocuments = $orderDocuments;
    }

    /**
     * @return mixed
     */
    public function getOrderDocuments()
    {
        return $this->orderDocuments;
    }
}

/**
 * Class Google_Service_Dfareporting_OrdersListResponse
 */
class Google_Service_Dfareporting_OrdersListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'orders';
    protected $internal_gapi_mappings = [];
    protected $ordersType = 'Google_Service_Dfareporting_Order';
    protected $ordersDataType = 'array';

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
     * @param $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }
}

/**
 * Class Google_Service_Dfareporting_PathToConversionReportCompatibleFields
 */
class Google_Service_Dfareporting_PathToConversionReportCompatibleFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'perInteractionDimensions';
    protected $internal_gapi_mappings = [];
    protected $conversionDimensionsType = 'Google_Service_Dfareporting_Dimension';
    protected $conversionDimensionsDataType = 'array';
    protected $customFloodlightVariablesType = 'Google_Service_Dfareporting_Dimension';
    protected $customFloodlightVariablesDataType = 'array';
    protected $metricsType = 'Google_Service_Dfareporting_Metric';
    protected $metricsDataType = 'array';
    protected $perInteractionDimensionsType = 'Google_Service_Dfareporting_Dimension';
    protected $perInteractionDimensionsDataType = 'array';


    /**
     * @param $conversionDimensions
     */
    public function setConversionDimensions($conversionDimensions)
    {
        $this->conversionDimensions = $conversionDimensions;
    }

    /**
     * @return mixed
     */
    public function getConversionDimensions()
    {
        return $this->conversionDimensions;
    }

    /**
     * @param $customFloodlightVariables
     */
    public function setCustomFloodlightVariables($customFloodlightVariables)
    {
        $this->customFloodlightVariables = $customFloodlightVariables;
    }

    /**
     * @return mixed
     */
    public function getCustomFloodlightVariables()
    {
        return $this->customFloodlightVariables;
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
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $perInteractionDimensions
     */
    public function setPerInteractionDimensions($perInteractionDimensions)
    {
        $this->perInteractionDimensions = $perInteractionDimensions;
    }

    /**
     * @return mixed
     */
    public function getPerInteractionDimensions()
    {
        return $this->perInteractionDimensions;
    }
}

/**
 * Class Google_Service_Dfareporting_Placement
 */
class Google_Service_Dfareporting_Placement extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $archived;
    public $campaignId;
    public $comment;
    public $compatibility;
    public $contentCategoryId;
    public $directorySiteId;
    public $externalId;
    public $id;
    public $keyName;
    public $kind;
    public $name;
    public $paymentApproved;
    public $paymentSource;
    public $placementGroupId;
    public $placementStrategyId;
    public $primary;
    public $siteId;
    public $sslRequired;
    public $status;
    public $subaccountId;
    public $tagFormats;
    protected $collection_key = 'tagFormats';
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $campaignIdDimensionValueDataType = '';
    protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $createInfoDataType = '';
    protected $directorySiteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $directorySiteIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
    protected $lookbackConfigurationDataType = '';
    protected $placementGroupIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $placementGroupIdDimensionValueDataType = '';
    protected $pricingScheduleType = 'Google_Service_Dfareporting_PricingSchedule';
    protected $pricingScheduleDataType = '';
    protected $publisherUpdateInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $publisherUpdateInfoDataType = '';
    protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $siteIdDimensionValueDataType = '';
    protected $sizeType = 'Google_Service_Dfareporting_Size';
    protected $sizeDataType = '';
    protected $tagSettingType = 'Google_Service_Dfareporting_TagSetting';
    protected $tagSettingDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue
     */
    public function setCampaignIdDimensionValue(Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue)
    {
        $this->campaignIdDimensionValue = $campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCampaignIdDimensionValue()
    {
        return $this->campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * @param $compatibility
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;
    }

    /**
     * @return mixed
     */
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    /**
     * @param $contentCategoryId
     */
    public function setContentCategoryId($contentCategoryId)
    {
        $this->contentCategoryId = $contentCategoryId;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $createInfo
     */
    public function setCreateInfo(Google_Service_Dfareporting_LastModifiedInfo $createInfo)
    {
        $this->createInfo = $createInfo;
    }

    /**
     * @return mixed
     */
    public function getCreateInfo()
    {
        return $this->createInfo;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteId()
    {
        return $this->directorySiteId;
    }

    /**
     * @param $directorySiteId
     */
    public function setDirectorySiteId($directorySiteId)
    {
        $this->directorySiteId = $directorySiteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue
     */
    public function setDirectorySiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue)
    {
        $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteIdDimensionValue()
    {
        return $this->directorySiteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * @param $keyName
     */
    public function setKeyName($keyName)
    {
        $this->keyName = $keyName;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
    }

    /**
     * @param Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration
     */
    public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
    {
        $this->lookbackConfiguration = $lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getLookbackConfiguration()
    {
        return $this->lookbackConfiguration;
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
    public function getPaymentApproved()
    {
        return $this->paymentApproved;
    }

    /**
     * @param $paymentApproved
     */
    public function setPaymentApproved($paymentApproved)
    {
        $this->paymentApproved = $paymentApproved;
    }

    /**
     * @return mixed
     */
    public function getPaymentSource()
    {
        return $this->paymentSource;
    }

    /**
     * @param $paymentSource
     */
    public function setPaymentSource($paymentSource)
    {
        $this->paymentSource = $paymentSource;
    }

    /**
     * @return mixed
     */
    public function getPlacementGroupId()
    {
        return $this->placementGroupId;
    }

    /**
     * @param $placementGroupId
     */
    public function setPlacementGroupId($placementGroupId)
    {
        $this->placementGroupId = $placementGroupId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $placementGroupIdDimensionValue
     */
    public function setPlacementGroupIdDimensionValue(Google_Service_Dfareporting_DimensionValue $placementGroupIdDimensionValue)
    {
        $this->placementGroupIdDimensionValue = $placementGroupIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getPlacementGroupIdDimensionValue()
    {
        return $this->placementGroupIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getPlacementStrategyId()
    {
        return $this->placementStrategyId;
    }

    /**
     * @param $placementStrategyId
     */
    public function setPlacementStrategyId($placementStrategyId)
    {
        $this->placementStrategyId = $placementStrategyId;
    }

    /**
     * @param Google_Service_Dfareporting_PricingSchedule $pricingSchedule
     */
    public function setPricingSchedule(Google_Service_Dfareporting_PricingSchedule $pricingSchedule)
    {
        $this->pricingSchedule = $pricingSchedule;
    }

    /**
     * @return mixed
     */
    public function getPricingSchedule()
    {
        return $this->pricingSchedule;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $publisherUpdateInfo
     */
    public function setPublisherUpdateInfo(Google_Service_Dfareporting_LastModifiedInfo $publisherUpdateInfo)
    {
        $this->publisherUpdateInfo = $publisherUpdateInfo;
    }

    /**
     * @return mixed
     */
    public function getPublisherUpdateInfo()
    {
        return $this->publisherUpdateInfo;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue
     */
    public function setSiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue)
    {
        $this->siteIdDimensionValue = $siteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getSiteIdDimensionValue()
    {
        return $this->siteIdDimensionValue;
    }

    /**
     * @param Google_Service_Dfareporting_Size $size
     */
    public function setSize(Google_Service_Dfareporting_Size $size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param $sslRequired
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTagFormats()
    {
        return $this->tagFormats;
    }

    /**
     * @param $tagFormats
     */
    public function setTagFormats($tagFormats)
    {
        $this->tagFormats = $tagFormats;
    }

    /**
     * @param Google_Service_Dfareporting_TagSetting $tagSetting
     */
    public function setTagSetting(Google_Service_Dfareporting_TagSetting $tagSetting)
    {
        $this->tagSetting = $tagSetting;
    }

    /**
     * @return mixed
     */
    public function getTagSetting()
    {
        return $this->tagSetting;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementAssignment
 */
class Google_Service_Dfareporting_PlacementAssignment extends Google_Model
{
    public $active;
    public $placementId;
    public $sslRequired;
    protected $internal_gapi_mappings = [];
    protected $placementIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $placementIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getPlacementId()
    {
        return $this->placementId;
    }

    /**
     * @param $placementId
     */
    public function setPlacementId($placementId)
    {
        $this->placementId = $placementId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $placementIdDimensionValue
     */
    public function setPlacementIdDimensionValue(Google_Service_Dfareporting_DimensionValue $placementIdDimensionValue)
    {
        $this->placementIdDimensionValue = $placementIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getPlacementIdDimensionValue()
    {
        return $this->placementIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getSslRequired()
    {
        return $this->sslRequired;
    }

    /**
     * @param $sslRequired
     */
    public function setSslRequired($sslRequired)
    {
        $this->sslRequired = $sslRequired;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementGroup
 */
class Google_Service_Dfareporting_PlacementGroup extends Google_Collection
{
    public $accountId;
    public $advertiserId;
    public $archived;
    public $campaignId;
    public $childPlacementIds;
    public $comment;
    public $contentCategoryId;
    public $directorySiteId;
    public $externalId;
    public $id;
    public $kind;
    public $name;
    public $placementGroupType;
    public $placementStrategyId;
    public $primaryPlacementId;
    public $siteId;
    public $subaccountId;
    protected $collection_key = 'childPlacementIds';
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $campaignIdDimensionValueDataType = '';
    protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $createInfoDataType = '';
    protected $directorySiteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $directorySiteIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';
    protected $pricingScheduleType = 'Google_Service_Dfareporting_PricingSchedule';
    protected $pricingScheduleDataType = '';
    protected $primaryPlacementIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $primaryPlacementIdDimensionValueDataType = '';
    protected $programmaticSettingType = 'Google_Service_Dfareporting_ProgrammaticSetting';
    protected $programmaticSettingDataType = '';
    protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $siteIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue
     */
    public function setCampaignIdDimensionValue(Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue)
    {
        $this->campaignIdDimensionValue = $campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getCampaignIdDimensionValue()
    {
        return $this->campaignIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getChildPlacementIds()
    {
        return $this->childPlacementIds;
    }

    /**
     * @param $childPlacementIds
     */
    public function setChildPlacementIds($childPlacementIds)
    {
        $this->childPlacementIds = $childPlacementIds;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    /**
     * @param $contentCategoryId
     */
    public function setContentCategoryId($contentCategoryId)
    {
        $this->contentCategoryId = $contentCategoryId;
    }

    /**
     * @param Google_Service_Dfareporting_LastModifiedInfo $createInfo
     */
    public function setCreateInfo(Google_Service_Dfareporting_LastModifiedInfo $createInfo)
    {
        $this->createInfo = $createInfo;
    }

    /**
     * @return mixed
     */
    public function getCreateInfo()
    {
        return $this->createInfo;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteId()
    {
        return $this->directorySiteId;
    }

    /**
     * @param $directorySiteId
     */
    public function setDirectorySiteId($directorySiteId)
    {
        $this->directorySiteId = $directorySiteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue
     */
    public function setDirectorySiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue)
    {
        $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteIdDimensionValue()
    {
        return $this->directorySiteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
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
    public function getPlacementGroupType()
    {
        return $this->placementGroupType;
    }

    /**
     * @param $placementGroupType
     */
    public function setPlacementGroupType($placementGroupType)
    {
        $this->placementGroupType = $placementGroupType;
    }

    /**
     * @return mixed
     */
    public function getPlacementStrategyId()
    {
        return $this->placementStrategyId;
    }

    /**
     * @param $placementStrategyId
     */
    public function setPlacementStrategyId($placementStrategyId)
    {
        $this->placementStrategyId = $placementStrategyId;
    }

    /**
     * @param Google_Service_Dfareporting_PricingSchedule $pricingSchedule
     */
    public function setPricingSchedule(Google_Service_Dfareporting_PricingSchedule $pricingSchedule)
    {
        $this->pricingSchedule = $pricingSchedule;
    }

    /**
     * @return mixed
     */
    public function getPricingSchedule()
    {
        return $this->pricingSchedule;
    }

    /**
     * @return mixed
     */
    public function getPrimaryPlacementId()
    {
        return $this->primaryPlacementId;
    }

    /**
     * @param $primaryPlacementId
     */
    public function setPrimaryPlacementId($primaryPlacementId)
    {
        $this->primaryPlacementId = $primaryPlacementId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $primaryPlacementIdDimensionValue
     */
    public function setPrimaryPlacementIdDimensionValue(Google_Service_Dfareporting_DimensionValue $primaryPlacementIdDimensionValue)
    {
        $this->primaryPlacementIdDimensionValue = $primaryPlacementIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getPrimaryPlacementIdDimensionValue()
    {
        return $this->primaryPlacementIdDimensionValue;
    }

    /**
     * @param Google_Service_Dfareporting_ProgrammaticSetting $programmaticSetting
     */
    public function setProgrammaticSetting(Google_Service_Dfareporting_ProgrammaticSetting $programmaticSetting)
    {
        $this->programmaticSetting = $programmaticSetting;
    }

    /**
     * @return mixed
     */
    public function getProgrammaticSetting()
    {
        return $this->programmaticSetting;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue
     */
    public function setSiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue)
    {
        $this->siteIdDimensionValue = $siteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getSiteIdDimensionValue()
    {
        return $this->siteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementGroupsListResponse
 */
class Google_Service_Dfareporting_PlacementGroupsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'placementGroups';
    protected $internal_gapi_mappings = [];
    protected $placementGroupsType = 'Google_Service_Dfareporting_PlacementGroup';
    protected $placementGroupsDataType = 'array';

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
     * @param $placementGroups
     */
    public function setPlacementGroups($placementGroups)
    {
        $this->placementGroups = $placementGroups;
    }

    /**
     * @return mixed
     */
    public function getPlacementGroups()
    {
        return $this->placementGroups;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementStrategiesListResponse
 */
class Google_Service_Dfareporting_PlacementStrategiesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'placementStrategies';
    protected $internal_gapi_mappings = [];
    protected $placementStrategiesType = 'Google_Service_Dfareporting_PlacementStrategy';
    protected $placementStrategiesDataType = 'array';

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
     * @param $placementStrategies
     */
    public function setPlacementStrategies($placementStrategies)
    {
        $this->placementStrategies = $placementStrategies;
    }

    /**
     * @return mixed
     */
    public function getPlacementStrategies()
    {
        return $this->placementStrategies;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementStrategy
 */
class Google_Service_Dfareporting_PlacementStrategy extends Google_Model
{
    public $accountId;
    public $id;
    public $kind;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
}

/**
 * Class Google_Service_Dfareporting_PlacementTag
 */
class Google_Service_Dfareporting_PlacementTag extends Google_Collection
{
    public $placementId;
    protected $collection_key = 'tagDatas';
    protected $internal_gapi_mappings = [];
    protected $tagDatasType = 'Google_Service_Dfareporting_TagData';
    protected $tagDatasDataType = 'array';

    /**
     * @return mixed
     */
    public function getPlacementId()
    {
        return $this->placementId;
    }

    /**
     * @param $placementId
     */
    public function setPlacementId($placementId)
    {
        $this->placementId = $placementId;
    }

    /**
     * @param $tagDatas
     */
    public function setTagDatas($tagDatas)
    {
        $this->tagDatas = $tagDatas;
    }

    /**
     * @return mixed
     */
    public function getTagDatas()
    {
        return $this->tagDatas;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementsGenerateTagsResponse
 */
class Google_Service_Dfareporting_PlacementsGenerateTagsResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'placementTags';
    protected $internal_gapi_mappings = [];
    protected $placementTagsType = 'Google_Service_Dfareporting_PlacementTag';
    protected $placementTagsDataType = 'array';

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
     * @param $placementTags
     */
    public function setPlacementTags($placementTags)
    {
        $this->placementTags = $placementTags;
    }

    /**
     * @return mixed
     */
    public function getPlacementTags()
    {
        return $this->placementTags;
    }
}

/**
 * Class Google_Service_Dfareporting_PlacementsListResponse
 */
class Google_Service_Dfareporting_PlacementsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'placements';
    protected $internal_gapi_mappings = [];
    protected $placementsType = 'Google_Service_Dfareporting_Placement';
    protected $placementsDataType = 'array';

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
     * @param $placements
     */
    public function setPlacements($placements)
    {
        $this->placements = $placements;
    }

    /**
     * @return mixed
     */
    public function getPlacements()
    {
        return $this->placements;
    }
}

/**
 * Class Google_Service_Dfareporting_PlatformType
 */
class Google_Service_Dfareporting_PlatformType extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Dfareporting_PlatformTypesListResponse
 */
class Google_Service_Dfareporting_PlatformTypesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'platformTypes';
    protected $internal_gapi_mappings = [];
    protected $platformTypesType = 'Google_Service_Dfareporting_PlatformType';
    protected $platformTypesDataType = 'array';

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
     * @param $platformTypes
     */
    public function setPlatformTypes($platformTypes)
    {
        $this->platformTypes = $platformTypes;
    }

    /**
     * @return mixed
     */
    public function getPlatformTypes()
    {
        return $this->platformTypes;
    }
}

/**
 * Class Google_Service_Dfareporting_PopupWindowProperties
 */
class Google_Service_Dfareporting_PopupWindowProperties extends Google_Model
{
    public $positionType;
    public $showAddressBar;
    public $showMenuBar;
    public $showScrollBar;
    public $showStatusBar;
    public $showToolBar;
    public $title;
    protected $internal_gapi_mappings = [];
    protected $dimensionType = 'Google_Service_Dfareporting_Size';
    protected $dimensionDataType = '';
    protected $offsetType = 'Google_Service_Dfareporting_OffsetPosition';
    protected $offsetDataType = '';

    /**
     * @param Google_Service_Dfareporting_Size $dimension
     */
    public function setDimension(Google_Service_Dfareporting_Size $dimension)
    {
        $this->dimension = $dimension;
    }

    /**
     * @return mixed
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param Google_Service_Dfareporting_OffsetPosition $offset
     */
    public function setOffset(Google_Service_Dfareporting_OffsetPosition $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return mixed
     */
    public function getPositionType()
    {
        return $this->positionType;
    }

    /**
     * @param $positionType
     */
    public function setPositionType($positionType)
    {
        $this->positionType = $positionType;
    }

    /**
     * @return mixed
     */
    public function getShowAddressBar()
    {
        return $this->showAddressBar;
    }

    /**
     * @param $showAddressBar
     */
    public function setShowAddressBar($showAddressBar)
    {
        $this->showAddressBar = $showAddressBar;
    }

    /**
     * @return mixed
     */
    public function getShowMenuBar()
    {
        return $this->showMenuBar;
    }

    /**
     * @param $showMenuBar
     */
    public function setShowMenuBar($showMenuBar)
    {
        $this->showMenuBar = $showMenuBar;
    }

    /**
     * @return mixed
     */
    public function getShowScrollBar()
    {
        return $this->showScrollBar;
    }

    /**
     * @param $showScrollBar
     */
    public function setShowScrollBar($showScrollBar)
    {
        $this->showScrollBar = $showScrollBar;
    }

    /**
     * @return mixed
     */
    public function getShowStatusBar()
    {
        return $this->showStatusBar;
    }

    /**
     * @param $showStatusBar
     */
    public function setShowStatusBar($showStatusBar)
    {
        $this->showStatusBar = $showStatusBar;
    }

    /**
     * @return mixed
     */
    public function getShowToolBar()
    {
        return $this->showToolBar;
    }

    /**
     * @param $showToolBar
     */
    public function setShowToolBar($showToolBar)
    {
        $this->showToolBar = $showToolBar;
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
 * Class Google_Service_Dfareporting_PostalCode
 */
class Google_Service_Dfareporting_PostalCode extends Google_Model
{
    public $code;
    public $countryCode;
    public $countryDartId;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getCountryDartId()
    {
        return $this->countryDartId;
    }

    /**
     * @param $countryDartId
     */
    public function setCountryDartId($countryDartId)
    {
        $this->countryDartId = $countryDartId;
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
}

/**
 * Class Google_Service_Dfareporting_PostalCodesListResponse
 */
class Google_Service_Dfareporting_PostalCodesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'postalCodes';
    protected $internal_gapi_mappings = [];
    protected $postalCodesType = 'Google_Service_Dfareporting_PostalCode';
    protected $postalCodesDataType = 'array';

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
     * @param $postalCodes
     */
    public function setPostalCodes($postalCodes)
    {
        $this->postalCodes = $postalCodes;
    }

    /**
     * @return mixed
     */
    public function getPostalCodes()
    {
        return $this->postalCodes;
    }
}

/**
 * Class Google_Service_Dfareporting_Pricing
 */
class Google_Service_Dfareporting_Pricing extends Google_Collection
{
    public $capCostType;
    public $endDate;
    public $groupType;
    public $pricingType;
    public $startDate;
    protected $collection_key = 'flights';
    protected $internal_gapi_mappings = [];
    protected $flightsType = 'Google_Service_Dfareporting_Flight';
    protected $flightsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCapCostType()
    {
        return $this->capCostType;
    }

    /**
     * @param $capCostType
     */
    public function setCapCostType($capCostType)
    {
        $this->capCostType = $capCostType;
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
     * @param $flights
     */
    public function setFlights($flights)
    {
        $this->flights = $flights;
    }

    /**
     * @return mixed
     */
    public function getFlights()
    {
        return $this->flights;
    }

    /**
     * @return mixed
     */
    public function getGroupType()
    {
        return $this->groupType;
    }

    /**
     * @param $groupType
     */
    public function setGroupType($groupType)
    {
        $this->groupType = $groupType;
    }

    /**
     * @return mixed
     */
    public function getPricingType()
    {
        return $this->pricingType;
    }

    /**
     * @param $pricingType
     */
    public function setPricingType($pricingType)
    {
        $this->pricingType = $pricingType;
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
}

/**
 * Class Google_Service_Dfareporting_PricingSchedule
 */
class Google_Service_Dfareporting_PricingSchedule extends Google_Collection
{
    public $capCostOption;
    public $disregardOverdelivery;
    public $endDate;
    public $flighted;
    public $floodlightActivityId;
    public $pricingType;
    public $startDate;
    public $testingStartDate;
    protected $collection_key = 'pricingPeriods';
    protected $internal_gapi_mappings = [];
    protected $pricingPeriodsType = 'Google_Service_Dfareporting_PricingSchedulePricingPeriod';
    protected $pricingPeriodsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCapCostOption()
    {
        return $this->capCostOption;
    }

    /**
     * @param $capCostOption
     */
    public function setCapCostOption($capCostOption)
    {
        $this->capCostOption = $capCostOption;
    }

    /**
     * @return mixed
     */
    public function getDisregardOverdelivery()
    {
        return $this->disregardOverdelivery;
    }

    /**
     * @param $disregardOverdelivery
     */
    public function setDisregardOverdelivery($disregardOverdelivery)
    {
        $this->disregardOverdelivery = $disregardOverdelivery;
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
    public function getFlighted()
    {
        return $this->flighted;
    }

    /**
     * @param $flighted
     */
    public function setFlighted($flighted)
    {
        $this->flighted = $flighted;
    }

    /**
     * @return mixed
     */
    public function getFloodlightActivityId()
    {
        return $this->floodlightActivityId;
    }

    /**
     * @param $floodlightActivityId
     */
    public function setFloodlightActivityId($floodlightActivityId)
    {
        $this->floodlightActivityId = $floodlightActivityId;
    }

    /**
     * @param $pricingPeriods
     */
    public function setPricingPeriods($pricingPeriods)
    {
        $this->pricingPeriods = $pricingPeriods;
    }

    /**
     * @return mixed
     */
    public function getPricingPeriods()
    {
        return $this->pricingPeriods;
    }

    /**
     * @return mixed
     */
    public function getPricingType()
    {
        return $this->pricingType;
    }

    /**
     * @param $pricingType
     */
    public function setPricingType($pricingType)
    {
        $this->pricingType = $pricingType;
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
    public function getTestingStartDate()
    {
        return $this->testingStartDate;
    }

    /**
     * @param $testingStartDate
     */
    public function setTestingStartDate($testingStartDate)
    {
        $this->testingStartDate = $testingStartDate;
    }
}

/**
 * Class Google_Service_Dfareporting_PricingSchedulePricingPeriod
 */
class Google_Service_Dfareporting_PricingSchedulePricingPeriod extends Google_Model
{
    public $endDate;
    public $pricingComment;
    public $rateOrCostNanos;
    public $startDate;
    public $units;
    protected $internal_gapi_mappings = [];

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
    public function getPricingComment()
    {
        return $this->pricingComment;
    }

    /**
     * @param $pricingComment
     */
    public function setPricingComment($pricingComment)
    {
        $this->pricingComment = $pricingComment;
    }

    /**
     * @return mixed
     */
    public function getRateOrCostNanos()
    {
        return $this->rateOrCostNanos;
    }

    /**
     * @param $rateOrCostNanos
     */
    public function setRateOrCostNanos($rateOrCostNanos)
    {
        $this->rateOrCostNanos = $rateOrCostNanos;
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
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param $units
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }
}

/**
 * Class Google_Service_Dfareporting_ProgrammaticSetting
 */
class Google_Service_Dfareporting_ProgrammaticSetting extends Google_Collection
{
    public $adxDealIds;
    public $insertionOrderId;
    public $insertionOrderIdStatus;
    public $mediaCostNanos;
    public $programmatic;
    public $traffickerEmails;
    protected $collection_key = 'traffickerEmails';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdxDealIds()
    {
        return $this->adxDealIds;
    }

    /**
     * @param $adxDealIds
     */
    public function setAdxDealIds($adxDealIds)
    {
        $this->adxDealIds = $adxDealIds;
    }

    /**
     * @return mixed
     */
    public function getInsertionOrderId()
    {
        return $this->insertionOrderId;
    }

    /**
     * @param $insertionOrderId
     */
    public function setInsertionOrderId($insertionOrderId)
    {
        $this->insertionOrderId = $insertionOrderId;
    }

    /**
     * @return mixed
     */
    public function getInsertionOrderIdStatus()
    {
        return $this->insertionOrderIdStatus;
    }

    /**
     * @param $insertionOrderIdStatus
     */
    public function setInsertionOrderIdStatus($insertionOrderIdStatus)
    {
        $this->insertionOrderIdStatus = $insertionOrderIdStatus;
    }

    /**
     * @return mixed
     */
    public function getMediaCostNanos()
    {
        return $this->mediaCostNanos;
    }

    /**
     * @param $mediaCostNanos
     */
    public function setMediaCostNanos($mediaCostNanos)
    {
        $this->mediaCostNanos = $mediaCostNanos;
    }

    /**
     * @return mixed
     */
    public function getProgrammatic()
    {
        return $this->programmatic;
    }

    /**
     * @param $programmatic
     */
    public function setProgrammatic($programmatic)
    {
        $this->programmatic = $programmatic;
    }

    /**
     * @return mixed
     */
    public function getTraffickerEmails()
    {
        return $this->traffickerEmails;
    }

    /**
     * @param $traffickerEmails
     */
    public function setTraffickerEmails($traffickerEmails)
    {
        $this->traffickerEmails = $traffickerEmails;
    }
}

/**
 * Class Google_Service_Dfareporting_Project
 */
class Google_Service_Dfareporting_Project extends Google_Model
{
    public $accountId;
    public $advertiserId;
    public $audienceAgeGroup;
    public $audienceGender;
    public $budget;
    public $clientBillingCode;
    public $clientName;
    public $endDate;
    public $id;
    public $kind;
    public $name;
    public $overview;
    public $startDate;
    public $subaccountId;
    public $targetClicks;
    public $targetConversions;
    public $targetCpaNanos;
    public $targetCpcNanos;
    public $targetCpmNanos;
    public $targetImpressions;
    protected $internal_gapi_mappings = [];
    protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
    protected $lastModifiedInfoDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @return mixed
     */
    public function getAudienceAgeGroup()
    {
        return $this->audienceAgeGroup;
    }

    /**
     * @param $audienceAgeGroup
     */
    public function setAudienceAgeGroup($audienceAgeGroup)
    {
        $this->audienceAgeGroup = $audienceAgeGroup;
    }

    /**
     * @return mixed
     */
    public function getAudienceGender()
    {
        return $this->audienceGender;
    }

    /**
     * @param $audienceGender
     */
    public function setAudienceGender($audienceGender)
    {
        $this->audienceGender = $audienceGender;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getClientBillingCode()
    {
        return $this->clientBillingCode;
    }

    /**
     * @param $clientBillingCode
     */
    public function setClientBillingCode($clientBillingCode)
    {
        $this->clientBillingCode = $clientBillingCode;
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @param $clientName
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
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
     * @param Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo
     */
    public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
    {
        $this->lastModifiedInfo = $lastModifiedInfo;
    }

    /**
     * @return mixed
     */
    public function getLastModifiedInfo()
    {
        return $this->lastModifiedInfo;
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
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * @param $overview
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }

    /**
     * @return mixed
     */
    public function getTargetClicks()
    {
        return $this->targetClicks;
    }

    /**
     * @param $targetClicks
     */
    public function setTargetClicks($targetClicks)
    {
        $this->targetClicks = $targetClicks;
    }

    /**
     * @return mixed
     */
    public function getTargetConversions()
    {
        return $this->targetConversions;
    }

    /**
     * @param $targetConversions
     */
    public function setTargetConversions($targetConversions)
    {
        $this->targetConversions = $targetConversions;
    }

    /**
     * @return mixed
     */
    public function getTargetCpaNanos()
    {
        return $this->targetCpaNanos;
    }

    /**
     * @param $targetCpaNanos
     */
    public function setTargetCpaNanos($targetCpaNanos)
    {
        $this->targetCpaNanos = $targetCpaNanos;
    }

    /**
     * @return mixed
     */
    public function getTargetCpcNanos()
    {
        return $this->targetCpcNanos;
    }

    /**
     * @param $targetCpcNanos
     */
    public function setTargetCpcNanos($targetCpcNanos)
    {
        $this->targetCpcNanos = $targetCpcNanos;
    }

    /**
     * @return mixed
     */
    public function getTargetCpmNanos()
    {
        return $this->targetCpmNanos;
    }

    /**
     * @param $targetCpmNanos
     */
    public function setTargetCpmNanos($targetCpmNanos)
    {
        $this->targetCpmNanos = $targetCpmNanos;
    }

    /**
     * @return mixed
     */
    public function getTargetImpressions()
    {
        return $this->targetImpressions;
    }

    /**
     * @param $targetImpressions
     */
    public function setTargetImpressions($targetImpressions)
    {
        $this->targetImpressions = $targetImpressions;
    }
}

/**
 * Class Google_Service_Dfareporting_ProjectsListResponse
 */
class Google_Service_Dfareporting_ProjectsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'projects';
    protected $internal_gapi_mappings = [];
    protected $projectsType = 'Google_Service_Dfareporting_Project';
    protected $projectsDataType = 'array';

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
     * @param $projects
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
    }

    /**
     * @return mixed
     */
    public function getProjects()
    {
        return $this->projects;
    }
}

/**
 * Class Google_Service_Dfareporting_ReachReportCompatibleFields
 */
class Google_Service_Dfareporting_ReachReportCompatibleFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'reachByFrequencyMetrics';
    protected $internal_gapi_mappings = [];
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionsDataType = 'array';
    protected $metricsType = 'Google_Service_Dfareporting_Metric';
    protected $metricsDataType = 'array';
    protected $pivotedActivityMetricsType = 'Google_Service_Dfareporting_Metric';
    protected $pivotedActivityMetricsDataType = 'array';
    protected $reachByFrequencyMetricsType = 'Google_Service_Dfareporting_Metric';
    protected $reachByFrequencyMetricsDataType = 'array';


    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
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
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $pivotedActivityMetrics
     */
    public function setPivotedActivityMetrics($pivotedActivityMetrics)
    {
        $this->pivotedActivityMetrics = $pivotedActivityMetrics;
    }

    /**
     * @return mixed
     */
    public function getPivotedActivityMetrics()
    {
        return $this->pivotedActivityMetrics;
    }

    /**
     * @param $reachByFrequencyMetrics
     */
    public function setReachByFrequencyMetrics($reachByFrequencyMetrics)
    {
        $this->reachByFrequencyMetrics = $reachByFrequencyMetrics;
    }

    /**
     * @return mixed
     */
    public function getReachByFrequencyMetrics()
    {
        return $this->reachByFrequencyMetrics;
    }
}

/**
 * Class Google_Service_Dfareporting_Recipient
 */
class Google_Service_Dfareporting_Recipient extends Google_Model
{
    public $deliveryType;
    public $email;
    public $kind;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param $deliveryType
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
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
 * Class Google_Service_Dfareporting_Region
 */
class Google_Service_Dfareporting_Region extends Google_Model
{
    public $countryCode;
    public $countryDartId;
    public $dartId;
    public $kind;
    public $name;
    public $regionCode;
    protected $internal_gapi_mappings = [];

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
    public function getCountryDartId()
    {
        return $this->countryDartId;
    }

    /**
     * @param $countryDartId
     */
    public function setCountryDartId($countryDartId)
    {
        $this->countryDartId = $countryDartId;
    }

    /**
     * @return mixed
     */
    public function getDartId()
    {
        return $this->dartId;
    }

    /**
     * @param $dartId
     */
    public function setDartId($dartId)
    {
        $this->dartId = $dartId;
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
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * @param $regionCode
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
    }
}

/**
 * Class Google_Service_Dfareporting_RegionsListResponse
 */
class Google_Service_Dfareporting_RegionsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'regions';
    protected $internal_gapi_mappings = [];
    protected $regionsType = 'Google_Service_Dfareporting_Region';
    protected $regionsDataType = 'array';

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
     * @param $regions
     */
    public function setRegions($regions)
    {
        $this->regions = $regions;
    }

    /**
     * @return mixed
     */
    public function getRegions()
    {
        return $this->regions;
    }
}

/**
 * Class Google_Service_Dfareporting_RemarketingList
 */
class Google_Service_Dfareporting_RemarketingList extends Google_Model
{
    public $accountId;
    public $active;
    public $advertiserId;
    public $description;
    public $id;
    public $kind;
    public $lifeSpan;
    public $listSize;
    public $listSource;
    public $name;
    public $subaccountId;
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';
    protected $listPopulationRuleType = 'Google_Service_Dfareporting_ListPopulationRule';
    protected $listPopulationRuleDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
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
     * @return mixed
     */
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * @param $lifeSpan
     */
    public function setLifeSpan($lifeSpan)
    {
        $this->lifeSpan = $lifeSpan;
    }

    /**
     * @param Google_Service_Dfareporting_ListPopulationRule $listPopulationRule
     */
    public function setListPopulationRule(Google_Service_Dfareporting_ListPopulationRule $listPopulationRule)
    {
        $this->listPopulationRule = $listPopulationRule;
    }

    /**
     * @return mixed
     */
    public function getListPopulationRule()
    {
        return $this->listPopulationRule;
    }

    /**
     * @return mixed
     */
    public function getListSize()
    {
        return $this->listSize;
    }

    /**
     * @param $listSize
     */
    public function setListSize($listSize)
    {
        $this->listSize = $listSize;
    }

    /**
     * @return mixed
     */
    public function getListSource()
    {
        return $this->listSource;
    }

    /**
     * @param $listSource
     */
    public function setListSource($listSource)
    {
        $this->listSource = $listSource;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_RemarketingListShare
 */
class Google_Service_Dfareporting_RemarketingListShare extends Google_Collection
{
    public $kind;
    public $remarketingListId;
    public $sharedAccountIds;
    public $sharedAdvertiserIds;
    protected $collection_key = 'sharedAdvertiserIds';
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
    public function getRemarketingListId()
    {
        return $this->remarketingListId;
    }

    /**
     * @param $remarketingListId
     */
    public function setRemarketingListId($remarketingListId)
    {
        $this->remarketingListId = $remarketingListId;
    }

    /**
     * @return mixed
     */
    public function getSharedAccountIds()
    {
        return $this->sharedAccountIds;
    }

    /**
     * @param $sharedAccountIds
     */
    public function setSharedAccountIds($sharedAccountIds)
    {
        $this->sharedAccountIds = $sharedAccountIds;
    }

    /**
     * @return mixed
     */
    public function getSharedAdvertiserIds()
    {
        return $this->sharedAdvertiserIds;
    }

    /**
     * @param $sharedAdvertiserIds
     */
    public function setSharedAdvertiserIds($sharedAdvertiserIds)
    {
        $this->sharedAdvertiserIds = $sharedAdvertiserIds;
    }
}

/**
 * Class Google_Service_Dfareporting_RemarketingListsListResponse
 */
class Google_Service_Dfareporting_RemarketingListsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'remarketingLists';
    protected $internal_gapi_mappings = [];
    protected $remarketingListsType = 'Google_Service_Dfareporting_RemarketingList';
    protected $remarketingListsDataType = 'array';

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
     * @param $remarketingLists
     */
    public function setRemarketingLists($remarketingLists)
    {
        $this->remarketingLists = $remarketingLists;
    }

    /**
     * @return mixed
     */
    public function getRemarketingLists()
    {
        return $this->remarketingLists;
    }
}

/**
 * Class Google_Service_Dfareporting_Report
 */
class Google_Service_Dfareporting_Report extends Google_Model
{
    public $accountId;
    public $etag;
    public $fileName;
    public $format;
    public $id;
    public $kind;
    public $lastModifiedTime;
    public $name;
    public $ownerProfileId;
    public $subAccountId;
    public $type;
    protected $internal_gapi_mappings = [];
    protected $criteriaType = 'Google_Service_Dfareporting_ReportCriteria';
    protected $criteriaDataType = '';
    protected $crossDimensionReachCriteriaType = 'Google_Service_Dfareporting_ReportCrossDimensionReachCriteria';
    protected $crossDimensionReachCriteriaDataType = '';
    protected $deliveryType = 'Google_Service_Dfareporting_ReportDelivery';
    protected $deliveryDataType = '';
    protected $floodlightCriteriaType = 'Google_Service_Dfareporting_ReportFloodlightCriteria';
    protected $floodlightCriteriaDataType = '';
    protected $pathToConversionCriteriaType = 'Google_Service_Dfareporting_ReportPathToConversionCriteria';
    protected $pathToConversionCriteriaDataType = '';
    protected $reachCriteriaType = 'Google_Service_Dfareporting_ReportReachCriteria';
    protected $reachCriteriaDataType = '';
    protected $scheduleType = 'Google_Service_Dfareporting_ReportSchedule';
    protected $scheduleDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @param Google_Service_Dfareporting_ReportCriteria $criteria
     */
    public function setCriteria(Google_Service_Dfareporting_ReportCriteria $criteria)
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
     * @param Google_Service_Dfareporting_ReportCrossDimensionReachCriteria $crossDimensionReachCriteria
     */
    public function setCrossDimensionReachCriteria(Google_Service_Dfareporting_ReportCrossDimensionReachCriteria $crossDimensionReachCriteria)
    {
        $this->crossDimensionReachCriteria = $crossDimensionReachCriteria;
    }

    /**
     * @return mixed
     */
    public function getCrossDimensionReachCriteria()
    {
        return $this->crossDimensionReachCriteria;
    }

    /**
     * @param Google_Service_Dfareporting_ReportDelivery $delivery
     */
    public function setDelivery(Google_Service_Dfareporting_ReportDelivery $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
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
     * @param Google_Service_Dfareporting_ReportFloodlightCriteria $floodlightCriteria
     */
    public function setFloodlightCriteria(Google_Service_Dfareporting_ReportFloodlightCriteria $floodlightCriteria)
    {
        $this->floodlightCriteria = $floodlightCriteria;
    }

    /**
     * @return mixed
     */
    public function getFloodlightCriteria()
    {
        return $this->floodlightCriteria;
    }

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
    public function getLastModifiedTime()
    {
        return $this->lastModifiedTime;
    }

    /**
     * @param $lastModifiedTime
     */
    public function setLastModifiedTime($lastModifiedTime)
    {
        $this->lastModifiedTime = $lastModifiedTime;
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
    public function getOwnerProfileId()
    {
        return $this->ownerProfileId;
    }

    /**
     * @param $ownerProfileId
     */
    public function setOwnerProfileId($ownerProfileId)
    {
        $this->ownerProfileId = $ownerProfileId;
    }

    /**
     * @param Google_Service_Dfareporting_ReportPathToConversionCriteria $pathToConversionCriteria
     */
    public function setPathToConversionCriteria(Google_Service_Dfareporting_ReportPathToConversionCriteria $pathToConversionCriteria)
    {
        $this->pathToConversionCriteria = $pathToConversionCriteria;
    }

    /**
     * @return mixed
     */
    public function getPathToConversionCriteria()
    {
        return $this->pathToConversionCriteria;
    }

    /**
     * @param Google_Service_Dfareporting_ReportReachCriteria $reachCriteria
     */
    public function setReachCriteria(Google_Service_Dfareporting_ReportReachCriteria $reachCriteria)
    {
        $this->reachCriteria = $reachCriteria;
    }

    /**
     * @return mixed
     */
    public function getReachCriteria()
    {
        return $this->reachCriteria;
    }

    /**
     * @param Google_Service_Dfareporting_ReportSchedule $schedule
     */
    public function setSchedule(Google_Service_Dfareporting_ReportSchedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * @return mixed
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @return mixed
     */
    public function getSubAccountId()
    {
        return $this->subAccountId;
    }

    /**
     * @param $subAccountId
     */
    public function setSubAccountId($subAccountId)
    {
        $this->subAccountId = $subAccountId;
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
 * Class Google_Service_Dfareporting_ReportCompatibleFields
 */
class Google_Service_Dfareporting_ReportCompatibleFields extends Google_Collection
{
    public $kind;
    protected $collection_key = 'pivotedActivityMetrics';
    protected $internal_gapi_mappings = [];
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_Dimension';
    protected $dimensionsDataType = 'array';
    protected $metricsType = 'Google_Service_Dfareporting_Metric';
    protected $metricsDataType = 'array';
    protected $pivotedActivityMetricsType = 'Google_Service_Dfareporting_Metric';
    protected $pivotedActivityMetricsDataType = 'array';


    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
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
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * @param $pivotedActivityMetrics
     */
    public function setPivotedActivityMetrics($pivotedActivityMetrics)
    {
        $this->pivotedActivityMetrics = $pivotedActivityMetrics;
    }

    /**
     * @return mixed
     */
    public function getPivotedActivityMetrics()
    {
        return $this->pivotedActivityMetrics;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportCriteria
 */
class Google_Service_Dfareporting_ReportCriteria extends Google_Collection
{
    public $metricNames;
    protected $collection_key = 'metricNames';
    protected $internal_gapi_mappings = [];
    protected $activitiesType = 'Google_Service_Dfareporting_Activities';
    protected $activitiesDataType = '';
    protected $customRichMediaEventsType = 'Google_Service_Dfareporting_CustomRichMediaEvents';
    protected $customRichMediaEventsDataType = '';
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_SortedDimension';
    protected $dimensionsDataType = 'array';

    /**
     * @param Google_Service_Dfareporting_Activities $activities
     */
    public function setActivities(Google_Service_Dfareporting_Activities $activities)
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
     * @param Google_Service_Dfareporting_CustomRichMediaEvents $customRichMediaEvents
     */
    public function setCustomRichMediaEvents(Google_Service_Dfareporting_CustomRichMediaEvents $customRichMediaEvents)
    {
        $this->customRichMediaEvents = $customRichMediaEvents;
    }

    /**
     * @return mixed
     */
    public function getCustomRichMediaEvents()
    {
        return $this->customRichMediaEvents;
    }

    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @return mixed
     */
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportCrossDimensionReachCriteria
 */
class Google_Service_Dfareporting_ReportCrossDimensionReachCriteria extends Google_Collection
{
    public $dimension;
    public $metricNames;
    public $overlapMetricNames;
    public $pivoted;
    protected $collection_key = 'overlapMetricNames';
    protected $internal_gapi_mappings = [];
    protected $breakdownType = 'Google_Service_Dfareporting_SortedDimension';
    protected $breakdownDataType = 'array';
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $dimensionFiltersDataType = 'array';

    /**
     * @param $breakdown
     */
    public function setBreakdown($breakdown)
    {
        $this->breakdown = $breakdown;
    }

    /**
     * @return mixed
     */
    public function getBreakdown()
    {
        return $this->breakdown;
    }

    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
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
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }

    /**
     * @return mixed
     */
    public function getOverlapMetricNames()
    {
        return $this->overlapMetricNames;
    }

    /**
     * @param $overlapMetricNames
     */
    public function setOverlapMetricNames($overlapMetricNames)
    {
        $this->overlapMetricNames = $overlapMetricNames;
    }

    /**
     * @return mixed
     */
    public function getPivoted()
    {
        return $this->pivoted;
    }

    /**
     * @param $pivoted
     */
    public function setPivoted($pivoted)
    {
        $this->pivoted = $pivoted;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportDelivery
 */
class Google_Service_Dfareporting_ReportDelivery extends Google_Collection
{
    public $emailOwner;
    public $emailOwnerDeliveryType;
    public $message;
    protected $collection_key = 'recipients';
    protected $internal_gapi_mappings = [];
    protected $recipientsType = 'Google_Service_Dfareporting_Recipient';
    protected $recipientsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEmailOwner()
    {
        return $this->emailOwner;
    }

    /**
     * @param $emailOwner
     */
    public function setEmailOwner($emailOwner)
    {
        $this->emailOwner = $emailOwner;
    }

    /**
     * @return mixed
     */
    public function getEmailOwnerDeliveryType()
    {
        return $this->emailOwnerDeliveryType;
    }

    /**
     * @param $emailOwnerDeliveryType
     */
    public function setEmailOwnerDeliveryType($emailOwnerDeliveryType)
    {
        $this->emailOwnerDeliveryType = $emailOwnerDeliveryType;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param $recipients
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;
    }

    /**
     * @return mixed
     */
    public function getRecipients()
    {
        return $this->recipients;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportFloodlightCriteria
 */
class Google_Service_Dfareporting_ReportFloodlightCriteria extends Google_Collection
{
    public $metricNames;
    protected $collection_key = 'metricNames';
    protected $internal_gapi_mappings = [];
    protected $customRichMediaEventsType = 'Google_Service_Dfareporting_DimensionValue';
    protected $customRichMediaEventsDataType = 'array';
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_SortedDimension';
    protected $dimensionsDataType = 'array';
    protected $floodlightConfigIdType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightConfigIdDataType = '';
    protected $reportPropertiesType = 'Google_Service_Dfareporting_ReportFloodlightCriteriaReportProperties';
    protected $reportPropertiesDataType = '';


    /**
     * @param $customRichMediaEvents
     */
    public function setCustomRichMediaEvents($customRichMediaEvents)
    {
        $this->customRichMediaEvents = $customRichMediaEvents;
    }

    /**
     * @return mixed
     */
    public function getCustomRichMediaEvents()
    {
        return $this->customRichMediaEvents;
    }

    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightConfigId
     */
    public function setFloodlightConfigId(Google_Service_Dfareporting_DimensionValue $floodlightConfigId)
    {
        $this->floodlightConfigId = $floodlightConfigId;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigId()
    {
        return $this->floodlightConfigId;
    }

    /**
     * @return mixed
     */
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }

    /**
     * @param Google_Service_Dfareporting_ReportFloodlightCriteriaReportProperties $reportProperties
     */
    public function setReportProperties(Google_Service_Dfareporting_ReportFloodlightCriteriaReportProperties $reportProperties)
    {
        $this->reportProperties = $reportProperties;
    }

    /**
     * @return mixed
     */
    public function getReportProperties()
    {
        return $this->reportProperties;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportFloodlightCriteriaReportProperties
 */
class Google_Service_Dfareporting_ReportFloodlightCriteriaReportProperties extends Google_Model
{
    public $includeAttributedIPConversions;
    public $includeUnattributedCookieConversions;
    public $includeUnattributedIPConversions;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIncludeAttributedIPConversions()
    {
        return $this->includeAttributedIPConversions;
    }

    /**
     * @param $includeAttributedIPConversions
     */
    public function setIncludeAttributedIPConversions($includeAttributedIPConversions)
    {
        $this->includeAttributedIPConversions = $includeAttributedIPConversions;
    }

    /**
     * @return mixed
     */
    public function getIncludeUnattributedCookieConversions()
    {
        return $this->includeUnattributedCookieConversions;
    }

    /**
     * @param $includeUnattributedCookieConversions
     */
    public function setIncludeUnattributedCookieConversions($includeUnattributedCookieConversions)
    {
        $this->includeUnattributedCookieConversions = $includeUnattributedCookieConversions;
    }

    /**
     * @return mixed
     */
    public function getIncludeUnattributedIPConversions()
    {
        return $this->includeUnattributedIPConversions;
    }

    /**
     * @param $includeUnattributedIPConversions
     */
    public function setIncludeUnattributedIPConversions($includeUnattributedIPConversions)
    {
        $this->includeUnattributedIPConversions = $includeUnattributedIPConversions;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportList
 */
class Google_Service_Dfareporting_ReportList extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Dfareporting_Report';
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
 * Class Google_Service_Dfareporting_ReportPathToConversionCriteria
 */
class Google_Service_Dfareporting_ReportPathToConversionCriteria extends Google_Collection
{
    public $metricNames;
    protected $collection_key = 'perInteractionDimensions';
    protected $internal_gapi_mappings = [];
    protected $activityFiltersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $activityFiltersDataType = 'array';
    protected $conversionDimensionsType = 'Google_Service_Dfareporting_SortedDimension';
    protected $conversionDimensionsDataType = 'array';
    protected $customFloodlightVariablesType = 'Google_Service_Dfareporting_SortedDimension';
    protected $customFloodlightVariablesDataType = 'array';
    protected $customRichMediaEventsType = 'Google_Service_Dfareporting_DimensionValue';
    protected $customRichMediaEventsDataType = 'array';
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $floodlightConfigIdType = 'Google_Service_Dfareporting_DimensionValue';
    protected $floodlightConfigIdDataType = '';
    protected $perInteractionDimensionsType = 'Google_Service_Dfareporting_SortedDimension';
    protected $perInteractionDimensionsDataType = 'array';
    protected $reportPropertiesType = 'Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties';
    protected $reportPropertiesDataType = '';


    /**
     * @param $activityFilters
     */
    public function setActivityFilters($activityFilters)
    {
        $this->activityFilters = $activityFilters;
    }

    /**
     * @return mixed
     */
    public function getActivityFilters()
    {
        return $this->activityFilters;
    }

    /**
     * @param $conversionDimensions
     */
    public function setConversionDimensions($conversionDimensions)
    {
        $this->conversionDimensions = $conversionDimensions;
    }

    /**
     * @return mixed
     */
    public function getConversionDimensions()
    {
        return $this->conversionDimensions;
    }

    /**
     * @param $customFloodlightVariables
     */
    public function setCustomFloodlightVariables($customFloodlightVariables)
    {
        $this->customFloodlightVariables = $customFloodlightVariables;
    }

    /**
     * @return mixed
     */
    public function getCustomFloodlightVariables()
    {
        return $this->customFloodlightVariables;
    }

    /**
     * @param $customRichMediaEvents
     */
    public function setCustomRichMediaEvents($customRichMediaEvents)
    {
        $this->customRichMediaEvents = $customRichMediaEvents;
    }

    /**
     * @return mixed
     */
    public function getCustomRichMediaEvents()
    {
        return $this->customRichMediaEvents;
    }

    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $floodlightConfigId
     */
    public function setFloodlightConfigId(Google_Service_Dfareporting_DimensionValue $floodlightConfigId)
    {
        $this->floodlightConfigId = $floodlightConfigId;
    }

    /**
     * @return mixed
     */
    public function getFloodlightConfigId()
    {
        return $this->floodlightConfigId;
    }

    /**
     * @return mixed
     */
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }

    /**
     * @param $perInteractionDimensions
     */
    public function setPerInteractionDimensions($perInteractionDimensions)
    {
        $this->perInteractionDimensions = $perInteractionDimensions;
    }

    /**
     * @return mixed
     */
    public function getPerInteractionDimensions()
    {
        return $this->perInteractionDimensions;
    }

    /**
     * @param Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties $reportProperties
     */
    public function setReportProperties(Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties $reportProperties)
    {
        $this->reportProperties = $reportProperties;
    }

    /**
     * @return mixed
     */
    public function getReportProperties()
    {
        return $this->reportProperties;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties
 */
class Google_Service_Dfareporting_ReportPathToConversionCriteriaReportProperties extends Google_Model
{
    public $clicksLookbackWindow;
    public $impressionsLookbackWindow;
    public $includeAttributedIPConversions;
    public $includeUnattributedCookieConversions;
    public $includeUnattributedIPConversions;
    public $maximumClickInteractions;
    public $maximumImpressionInteractions;
    public $maximumInteractionGap;
    public $pivotOnInteractionPath;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getClicksLookbackWindow()
    {
        return $this->clicksLookbackWindow;
    }

    /**
     * @param $clicksLookbackWindow
     */
    public function setClicksLookbackWindow($clicksLookbackWindow)
    {
        $this->clicksLookbackWindow = $clicksLookbackWindow;
    }

    /**
     * @return mixed
     */
    public function getImpressionsLookbackWindow()
    {
        return $this->impressionsLookbackWindow;
    }

    /**
     * @param $impressionsLookbackWindow
     */
    public function setImpressionsLookbackWindow($impressionsLookbackWindow)
    {
        $this->impressionsLookbackWindow = $impressionsLookbackWindow;
    }

    /**
     * @return mixed
     */
    public function getIncludeAttributedIPConversions()
    {
        return $this->includeAttributedIPConversions;
    }

    /**
     * @param $includeAttributedIPConversions
     */
    public function setIncludeAttributedIPConversions($includeAttributedIPConversions)
    {
        $this->includeAttributedIPConversions = $includeAttributedIPConversions;
    }

    /**
     * @return mixed
     */
    public function getIncludeUnattributedCookieConversions()
    {
        return $this->includeUnattributedCookieConversions;
    }

    /**
     * @param $includeUnattributedCookieConversions
     */
    public function setIncludeUnattributedCookieConversions($includeUnattributedCookieConversions)
    {
        $this->includeUnattributedCookieConversions = $includeUnattributedCookieConversions;
    }

    /**
     * @return mixed
     */
    public function getIncludeUnattributedIPConversions()
    {
        return $this->includeUnattributedIPConversions;
    }

    /**
     * @param $includeUnattributedIPConversions
     */
    public function setIncludeUnattributedIPConversions($includeUnattributedIPConversions)
    {
        $this->includeUnattributedIPConversions = $includeUnattributedIPConversions;
    }

    /**
     * @return mixed
     */
    public function getMaximumClickInteractions()
    {
        return $this->maximumClickInteractions;
    }

    /**
     * @param $maximumClickInteractions
     */
    public function setMaximumClickInteractions($maximumClickInteractions)
    {
        $this->maximumClickInteractions = $maximumClickInteractions;
    }

    /**
     * @return mixed
     */
    public function getMaximumImpressionInteractions()
    {
        return $this->maximumImpressionInteractions;
    }

    /**
     * @param $maximumImpressionInteractions
     */
    public function setMaximumImpressionInteractions($maximumImpressionInteractions)
    {
        $this->maximumImpressionInteractions = $maximumImpressionInteractions;
    }

    /**
     * @return mixed
     */
    public function getMaximumInteractionGap()
    {
        return $this->maximumInteractionGap;
    }

    /**
     * @param $maximumInteractionGap
     */
    public function setMaximumInteractionGap($maximumInteractionGap)
    {
        $this->maximumInteractionGap = $maximumInteractionGap;
    }

    /**
     * @return mixed
     */
    public function getPivotOnInteractionPath()
    {
        return $this->pivotOnInteractionPath;
    }

    /**
     * @param $pivotOnInteractionPath
     */
    public function setPivotOnInteractionPath($pivotOnInteractionPath)
    {
        $this->pivotOnInteractionPath = $pivotOnInteractionPath;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportReachCriteria
 */
class Google_Service_Dfareporting_ReportReachCriteria extends Google_Collection
{
    public $enableAllDimensionCombinations;
    public $metricNames;
    public $reachByFrequencyMetricNames;
    protected $collection_key = 'reachByFrequencyMetricNames';
    protected $internal_gapi_mappings = [];
    protected $activitiesType = 'Google_Service_Dfareporting_Activities';
    protected $activitiesDataType = '';
    protected $customRichMediaEventsType = 'Google_Service_Dfareporting_CustomRichMediaEvents';
    protected $customRichMediaEventsDataType = '';
    protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
    protected $dateRangeDataType = '';
    protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
    protected $dimensionFiltersDataType = 'array';
    protected $dimensionsType = 'Google_Service_Dfareporting_SortedDimension';
    protected $dimensionsDataType = 'array';

    /**
     * @param Google_Service_Dfareporting_Activities $activities
     */
    public function setActivities(Google_Service_Dfareporting_Activities $activities)
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
     * @param Google_Service_Dfareporting_CustomRichMediaEvents $customRichMediaEvents
     */
    public function setCustomRichMediaEvents(Google_Service_Dfareporting_CustomRichMediaEvents $customRichMediaEvents)
    {
        $this->customRichMediaEvents = $customRichMediaEvents;
    }

    /**
     * @return mixed
     */
    public function getCustomRichMediaEvents()
    {
        return $this->customRichMediaEvents;
    }

    /**
     * @param Google_Service_Dfareporting_DateRange $dateRange
     */
    public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * @return mixed
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * @param $dimensionFilters
     */
    public function setDimensionFilters($dimensionFilters)
    {
        $this->dimensionFilters = $dimensionFilters;
    }

    /**
     * @return mixed
     */
    public function getDimensionFilters()
    {
        return $this->dimensionFilters;
    }

    /**
     * @param $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @return mixed
     */
    public function getEnableAllDimensionCombinations()
    {
        return $this->enableAllDimensionCombinations;
    }

    /**
     * @param $enableAllDimensionCombinations
     */
    public function setEnableAllDimensionCombinations($enableAllDimensionCombinations)
    {
        $this->enableAllDimensionCombinations = $enableAllDimensionCombinations;
    }

    /**
     * @return mixed
     */
    public function getMetricNames()
    {
        return $this->metricNames;
    }

    /**
     * @param $metricNames
     */
    public function setMetricNames($metricNames)
    {
        $this->metricNames = $metricNames;
    }

    /**
     * @return mixed
     */
    public function getReachByFrequencyMetricNames()
    {
        return $this->reachByFrequencyMetricNames;
    }

    /**
     * @param $reachByFrequencyMetricNames
     */
    public function setReachByFrequencyMetricNames($reachByFrequencyMetricNames)
    {
        $this->reachByFrequencyMetricNames = $reachByFrequencyMetricNames;
    }
}

/**
 * Class Google_Service_Dfareporting_ReportSchedule
 */
class Google_Service_Dfareporting_ReportSchedule extends Google_Collection
{
    public $active;
    public $every;
    public $expirationDate;
    public $repeats;
    public $repeatsOnWeekDays;
    public $runsOnDayOfMonth;
    public $startDate;
    protected $collection_key = 'repeatsOnWeekDays';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getEvery()
    {
        return $this->every;
    }

    /**
     * @param $every
     */
    public function setEvery($every)
    {
        $this->every = $every;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return mixed
     */
    public function getRepeats()
    {
        return $this->repeats;
    }

    /**
     * @param $repeats
     */
    public function setRepeats($repeats)
    {
        $this->repeats = $repeats;
    }

    /**
     * @return mixed
     */
    public function getRepeatsOnWeekDays()
    {
        return $this->repeatsOnWeekDays;
    }

    /**
     * @param $repeatsOnWeekDays
     */
    public function setRepeatsOnWeekDays($repeatsOnWeekDays)
    {
        $this->repeatsOnWeekDays = $repeatsOnWeekDays;
    }

    /**
     * @return mixed
     */
    public function getRunsOnDayOfMonth()
    {
        return $this->runsOnDayOfMonth;
    }

    /**
     * @param $runsOnDayOfMonth
     */
    public function setRunsOnDayOfMonth($runsOnDayOfMonth)
    {
        $this->runsOnDayOfMonth = $runsOnDayOfMonth;
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
}

/**
 * Class Google_Service_Dfareporting_ReportsConfiguration
 */
class Google_Service_Dfareporting_ReportsConfiguration extends Google_Model
{
    public $exposureToConversionEnabled;
    public $reportGenerationTimeZoneId;
    protected $internal_gapi_mappings = [];
    protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
    protected $lookbackConfigurationDataType = '';

    /**
     * @return mixed
     */
    public function getExposureToConversionEnabled()
    {
        return $this->exposureToConversionEnabled;
    }

    /**
     * @param $exposureToConversionEnabled
     */
    public function setExposureToConversionEnabled($exposureToConversionEnabled)
    {
        $this->exposureToConversionEnabled = $exposureToConversionEnabled;
    }

    /**
     * @param Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration
     */
    public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
    {
        $this->lookbackConfiguration = $lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getLookbackConfiguration()
    {
        return $this->lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getReportGenerationTimeZoneId()
    {
        return $this->reportGenerationTimeZoneId;
    }

    /**
     * @param $reportGenerationTimeZoneId
     */
    public function setReportGenerationTimeZoneId($reportGenerationTimeZoneId)
    {
        $this->reportGenerationTimeZoneId = $reportGenerationTimeZoneId;
    }
}

/**
 * Class Google_Service_Dfareporting_RichMediaExitOverride
 */
class Google_Service_Dfareporting_RichMediaExitOverride extends Google_Model
{
    public $customExitUrl;
    public $exitId;
    public $useCustomExitUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomExitUrl()
    {
        return $this->customExitUrl;
    }

    /**
     * @param $customExitUrl
     */
    public function setCustomExitUrl($customExitUrl)
    {
        $this->customExitUrl = $customExitUrl;
    }

    /**
     * @return mixed
     */
    public function getExitId()
    {
        return $this->exitId;
    }

    /**
     * @param $exitId
     */
    public function setExitId($exitId)
    {
        $this->exitId = $exitId;
    }

    /**
     * @return mixed
     */
    public function getUseCustomExitUrl()
    {
        return $this->useCustomExitUrl;
    }

    /**
     * @param $useCustomExitUrl
     */
    public function setUseCustomExitUrl($useCustomExitUrl)
    {
        $this->useCustomExitUrl = $useCustomExitUrl;
    }
}

/**
 * Class Google_Service_Dfareporting_Site
 */
class Google_Service_Dfareporting_Site extends Google_Collection
{
    public $accountId;
    public $approved;
    public $directorySiteId;
    public $id;
    public $keyName;
    public $kind;
    public $name;
    public $subaccountId;
    protected $collection_key = 'siteContacts';
    protected $internal_gapi_mappings = [];
    protected $directorySiteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $directorySiteIdDimensionValueDataType = '';
    protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $idDimensionValueDataType = '';
    protected $siteContactsType = 'Google_Service_Dfareporting_SiteContact';
    protected $siteContactsDataType = 'array';
    protected $siteSettingsType = 'Google_Service_Dfareporting_SiteSettings';
    protected $siteSettingsDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteId()
    {
        return $this->directorySiteId;
    }

    /**
     * @param $directorySiteId
     */
    public function setDirectorySiteId($directorySiteId)
    {
        $this->directorySiteId = $directorySiteId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue
     */
    public function setDirectorySiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue)
    {
        $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getDirectorySiteIdDimensionValue()
    {
        return $this->directorySiteIdDimensionValue;
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
     * @param Google_Service_Dfareporting_DimensionValue $idDimensionValue
     */
    public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
    {
        $this->idDimensionValue = $idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getIdDimensionValue()
    {
        return $this->idDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * @param $keyName
     */
    public function setKeyName($keyName)
    {
        $this->keyName = $keyName;
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
     * @param $siteContacts
     */
    public function setSiteContacts($siteContacts)
    {
        $this->siteContacts = $siteContacts;
    }

    /**
     * @return mixed
     */
    public function getSiteContacts()
    {
        return $this->siteContacts;
    }

    /**
     * @param Google_Service_Dfareporting_SiteSettings $siteSettings
     */
    public function setSiteSettings(Google_Service_Dfareporting_SiteSettings $siteSettings)
    {
        $this->siteSettings = $siteSettings;
    }

    /**
     * @return mixed
     */
    public function getSiteSettings()
    {
        return $this->siteSettings;
    }

    /**
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_SiteContact
 */
class Google_Service_Dfareporting_SiteContact extends Google_Model
{
    public $address;
    public $contactType;
    public $email;
    public $firstName;
    public $id;
    public $lastName;
    public $phone;
    public $title;
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
    public function getContactType()
    {
        return $this->contactType;
    }

    /**
     * @param $contactType
     */
    public function setContactType($contactType)
    {
        $this->contactType = $contactType;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
 * Class Google_Service_Dfareporting_SiteSettings
 */
class Google_Service_Dfareporting_SiteSettings extends Google_Model
{
    public $activeViewOptOut;
    public $disableBrandSafeAds;
    public $disableNewCookie;
    protected $internal_gapi_mappings = [];
    protected $creativeSettingsType = 'Google_Service_Dfareporting_CreativeSettings';
    protected $creativeSettingsDataType = '';
    protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
    protected $lookbackConfigurationDataType = '';
    protected $tagSettingType = 'Google_Service_Dfareporting_TagSetting';
    protected $tagSettingDataType = '';

    /**
     * @return mixed
     */
    public function getActiveViewOptOut()
    {
        return $this->activeViewOptOut;
    }

    /**
     * @param $activeViewOptOut
     */
    public function setActiveViewOptOut($activeViewOptOut)
    {
        $this->activeViewOptOut = $activeViewOptOut;
    }

    /**
     * @param Google_Service_Dfareporting_CreativeSettings $creativeSettings
     */
    public function setCreativeSettings(Google_Service_Dfareporting_CreativeSettings $creativeSettings)
    {
        $this->creativeSettings = $creativeSettings;
    }

    /**
     * @return mixed
     */
    public function getCreativeSettings()
    {
        return $this->creativeSettings;
    }

    /**
     * @return mixed
     */
    public function getDisableBrandSafeAds()
    {
        return $this->disableBrandSafeAds;
    }

    /**
     * @param $disableBrandSafeAds
     */
    public function setDisableBrandSafeAds($disableBrandSafeAds)
    {
        $this->disableBrandSafeAds = $disableBrandSafeAds;
    }

    /**
     * @return mixed
     */
    public function getDisableNewCookie()
    {
        return $this->disableNewCookie;
    }

    /**
     * @param $disableNewCookie
     */
    public function setDisableNewCookie($disableNewCookie)
    {
        $this->disableNewCookie = $disableNewCookie;
    }

    /**
     * @param Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration
     */
    public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
    {
        $this->lookbackConfiguration = $lookbackConfiguration;
    }

    /**
     * @return mixed
     */
    public function getLookbackConfiguration()
    {
        return $this->lookbackConfiguration;
    }

    /**
     * @param Google_Service_Dfareporting_TagSetting $tagSetting
     */
    public function setTagSetting(Google_Service_Dfareporting_TagSetting $tagSetting)
    {
        $this->tagSetting = $tagSetting;
    }

    /**
     * @return mixed
     */
    public function getTagSetting()
    {
        return $this->tagSetting;
    }
}

/**
 * Class Google_Service_Dfareporting_SitesListResponse
 */
class Google_Service_Dfareporting_SitesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'sites';
    protected $internal_gapi_mappings = [];
    protected $sitesType = 'Google_Service_Dfareporting_Site';
    protected $sitesDataType = 'array';

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
     * @param $sites
     */
    public function setSites($sites)
    {
        $this->sites = $sites;
    }

    /**
     * @return mixed
     */
    public function getSites()
    {
        return $this->sites;
    }
}

/**
 * Class Google_Service_Dfareporting_Size
 */
class Google_Service_Dfareporting_Size extends Google_Model
{
    public $height;
    public $iab;
    public $id;
    public $kind;
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
    public function getIab()
    {
        return $this->iab;
    }

    /**
     * @param $iab
     */
    public function setIab($iab)
    {
        $this->iab = $iab;
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
 * Class Google_Service_Dfareporting_SizesListResponse
 */
class Google_Service_Dfareporting_SizesListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'sizes';
    protected $internal_gapi_mappings = [];
    protected $sizesType = 'Google_Service_Dfareporting_Size';
    protected $sizesDataType = 'array';

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
     * @param $sizes
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;
    }

    /**
     * @return mixed
     */
    public function getSizes()
    {
        return $this->sizes;
    }
}

/**
 * Class Google_Service_Dfareporting_SortedDimension
 */
class Google_Service_Dfareporting_SortedDimension extends Google_Model
{
    public $kind;
    public $name;
    public $sortOrder;
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
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param $sortOrder
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }
}

/**
 * Class Google_Service_Dfareporting_Subaccount
 */
class Google_Service_Dfareporting_Subaccount extends Google_Collection
{
    public $accountId;
    public $availablePermissionIds;
    public $id;
    public $kind;
    public $name;
    protected $collection_key = 'availablePermissionIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAvailablePermissionIds()
    {
        return $this->availablePermissionIds;
    }

    /**
     * @param $availablePermissionIds
     */
    public function setAvailablePermissionIds($availablePermissionIds)
    {
        $this->availablePermissionIds = $availablePermissionIds;
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
}

/**
 * Class Google_Service_Dfareporting_SubaccountsListResponse
 */
class Google_Service_Dfareporting_SubaccountsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'subaccounts';
    protected $internal_gapi_mappings = [];
    protected $subaccountsType = 'Google_Service_Dfareporting_Subaccount';
    protected $subaccountsDataType = 'array';

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
     * @param $subaccounts
     */
    public function setSubaccounts($subaccounts)
    {
        $this->subaccounts = $subaccounts;
    }

    /**
     * @return mixed
     */
    public function getSubaccounts()
    {
        return $this->subaccounts;
    }
}

/**
 * Class Google_Service_Dfareporting_TagData
 */
class Google_Service_Dfareporting_TagData extends Google_Model
{
    public $adId;
    public $clickTag;
    public $creativeId;
    public $format;
    public $impressionTag;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdId()
    {
        return $this->adId;
    }

    /**
     * @param $adId
     */
    public function setAdId($adId)
    {
        $this->adId = $adId;
    }

    /**
     * @return mixed
     */
    public function getClickTag()
    {
        return $this->clickTag;
    }

    /**
     * @param $clickTag
     */
    public function setClickTag($clickTag)
    {
        $this->clickTag = $clickTag;
    }

    /**
     * @return mixed
     */
    public function getCreativeId()
    {
        return $this->creativeId;
    }

    /**
     * @param $creativeId
     */
    public function setCreativeId($creativeId)
    {
        $this->creativeId = $creativeId;
    }

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
     * @return mixed
     */
    public function getImpressionTag()
    {
        return $this->impressionTag;
    }

    /**
     * @param $impressionTag
     */
    public function setImpressionTag($impressionTag)
    {
        $this->impressionTag = $impressionTag;
    }
}

/**
 * Class Google_Service_Dfareporting_TagSetting
 */
class Google_Service_Dfareporting_TagSetting extends Google_Model
{
    public $additionalKeyValues;
    public $includeClickThroughUrls;
    public $includeClickTracking;
    public $keywordOption;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdditionalKeyValues()
    {
        return $this->additionalKeyValues;
    }

    /**
     * @param $additionalKeyValues
     */
    public function setAdditionalKeyValues($additionalKeyValues)
    {
        $this->additionalKeyValues = $additionalKeyValues;
    }

    /**
     * @return mixed
     */
    public function getIncludeClickThroughUrls()
    {
        return $this->includeClickThroughUrls;
    }

    /**
     * @param $includeClickThroughUrls
     */
    public function setIncludeClickThroughUrls($includeClickThroughUrls)
    {
        $this->includeClickThroughUrls = $includeClickThroughUrls;
    }

    /**
     * @return mixed
     */
    public function getIncludeClickTracking()
    {
        return $this->includeClickTracking;
    }

    /**
     * @param $includeClickTracking
     */
    public function setIncludeClickTracking($includeClickTracking)
    {
        $this->includeClickTracking = $includeClickTracking;
    }

    /**
     * @return mixed
     */
    public function getKeywordOption()
    {
        return $this->keywordOption;
    }

    /**
     * @param $keywordOption
     */
    public function setKeywordOption($keywordOption)
    {
        $this->keywordOption = $keywordOption;
    }
}

/**
 * Class Google_Service_Dfareporting_TagSettings
 */
class Google_Service_Dfareporting_TagSettings extends Google_Model
{
    public $dynamicTagEnabled;
    public $imageTagEnabled;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDynamicTagEnabled()
    {
        return $this->dynamicTagEnabled;
    }

    /**
     * @param $dynamicTagEnabled
     */
    public function setDynamicTagEnabled($dynamicTagEnabled)
    {
        $this->dynamicTagEnabled = $dynamicTagEnabled;
    }

    /**
     * @return mixed
     */
    public function getImageTagEnabled()
    {
        return $this->imageTagEnabled;
    }

    /**
     * @param $imageTagEnabled
     */
    public function setImageTagEnabled($imageTagEnabled)
    {
        $this->imageTagEnabled = $imageTagEnabled;
    }
}

/**
 * Class Google_Service_Dfareporting_TargetWindow
 */
class Google_Service_Dfareporting_TargetWindow extends Google_Model
{
    public $customHtml;
    public $targetWindowOption;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCustomHtml()
    {
        return $this->customHtml;
    }

    /**
     * @param $customHtml
     */
    public function setCustomHtml($customHtml)
    {
        $this->customHtml = $customHtml;
    }

    /**
     * @return mixed
     */
    public function getTargetWindowOption()
    {
        return $this->targetWindowOption;
    }

    /**
     * @param $targetWindowOption
     */
    public function setTargetWindowOption($targetWindowOption)
    {
        $this->targetWindowOption = $targetWindowOption;
    }
}

/**
 * Class Google_Service_Dfareporting_TargetableRemarketingList
 */
class Google_Service_Dfareporting_TargetableRemarketingList extends Google_Model
{
    public $accountId;
    public $active;
    public $advertiserId;
    public $description;
    public $id;
    public $kind;
    public $lifeSpan;
    public $listSize;
    public $listSource;
    public $name;
    public $subaccountId;
    protected $internal_gapi_mappings = [];
    protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
    protected $advertiserIdDimensionValueDataType = '';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserId()
    {
        return $this->advertiserId;
    }

    /**
     * @param $advertiserId
     */
    public function setAdvertiserId($advertiserId)
    {
        $this->advertiserId = $advertiserId;
    }

    /**
     * @param Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue
     */
    public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
    {
        $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
    }

    /**
     * @return mixed
     */
    public function getAdvertiserIdDimensionValue()
    {
        return $this->advertiserIdDimensionValue;
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
     * @return mixed
     */
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * @param $lifeSpan
     */
    public function setLifeSpan($lifeSpan)
    {
        $this->lifeSpan = $lifeSpan;
    }

    /**
     * @return mixed
     */
    public function getListSize()
    {
        return $this->listSize;
    }

    /**
     * @param $listSize
     */
    public function setListSize($listSize)
    {
        $this->listSize = $listSize;
    }

    /**
     * @return mixed
     */
    public function getListSource()
    {
        return $this->listSource;
    }

    /**
     * @param $listSource
     */
    public function setListSource($listSource)
    {
        $this->listSource = $listSource;
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
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_TargetableRemarketingListsListResponse
 */
class Google_Service_Dfareporting_TargetableRemarketingListsListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'targetableRemarketingLists';
    protected $internal_gapi_mappings = [];
    protected $targetableRemarketingListsType = 'Google_Service_Dfareporting_TargetableRemarketingList';
    protected $targetableRemarketingListsDataType = 'array';

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
     * @param $targetableRemarketingLists
     */
    public function setTargetableRemarketingLists($targetableRemarketingLists)
    {
        $this->targetableRemarketingLists = $targetableRemarketingLists;
    }

    /**
     * @return mixed
     */
    public function getTargetableRemarketingLists()
    {
        return $this->targetableRemarketingLists;
    }
}

/**
 * Class Google_Service_Dfareporting_TechnologyTargeting
 */
class Google_Service_Dfareporting_TechnologyTargeting extends Google_Collection
{
    protected $collection_key = 'platformTypes';
    protected $internal_gapi_mappings = [];
    protected $browsersType = 'Google_Service_Dfareporting_Browser';
    protected $browsersDataType = 'array';
    protected $connectionTypesType = 'Google_Service_Dfareporting_ConnectionType';
    protected $connectionTypesDataType = 'array';
    protected $mobileCarriersType = 'Google_Service_Dfareporting_MobileCarrier';
    protected $mobileCarriersDataType = 'array';
    protected $operatingSystemVersionsType = 'Google_Service_Dfareporting_OperatingSystemVersion';
    protected $operatingSystemVersionsDataType = 'array';
    protected $operatingSystemsType = 'Google_Service_Dfareporting_OperatingSystem';
    protected $operatingSystemsDataType = 'array';
    protected $platformTypesType = 'Google_Service_Dfareporting_PlatformType';
    protected $platformTypesDataType = 'array';


    /**
     * @param $browsers
     */
    public function setBrowsers($browsers)
    {
        $this->browsers = $browsers;
    }

    /**
     * @return mixed
     */
    public function getBrowsers()
    {
        return $this->browsers;
    }

    /**
     * @param $connectionTypes
     */
    public function setConnectionTypes($connectionTypes)
    {
        $this->connectionTypes = $connectionTypes;
    }

    /**
     * @return mixed
     */
    public function getConnectionTypes()
    {
        return $this->connectionTypes;
    }

    /**
     * @param $mobileCarriers
     */
    public function setMobileCarriers($mobileCarriers)
    {
        $this->mobileCarriers = $mobileCarriers;
    }

    /**
     * @return mixed
     */
    public function getMobileCarriers()
    {
        return $this->mobileCarriers;
    }

    /**
     * @param $operatingSystemVersions
     */
    public function setOperatingSystemVersions($operatingSystemVersions)
    {
        $this->operatingSystemVersions = $operatingSystemVersions;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystemVersions()
    {
        return $this->operatingSystemVersions;
    }

    /**
     * @param $operatingSystems
     */
    public function setOperatingSystems($operatingSystems)
    {
        $this->operatingSystems = $operatingSystems;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystems()
    {
        return $this->operatingSystems;
    }

    /**
     * @param $platformTypes
     */
    public function setPlatformTypes($platformTypes)
    {
        $this->platformTypes = $platformTypes;
    }

    /**
     * @return mixed
     */
    public function getPlatformTypes()
    {
        return $this->platformTypes;
    }
}

/**
 * Class Google_Service_Dfareporting_ThirdPartyTrackingUrl
 */
class Google_Service_Dfareporting_ThirdPartyTrackingUrl extends Google_Model
{
    public $thirdPartyUrlType;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getThirdPartyUrlType()
    {
        return $this->thirdPartyUrlType;
    }

    /**
     * @param $thirdPartyUrlType
     */
    public function setThirdPartyUrlType($thirdPartyUrlType)
    {
        $this->thirdPartyUrlType = $thirdPartyUrlType;
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
 * Class Google_Service_Dfareporting_UserDefinedVariableConfiguration
 */
class Google_Service_Dfareporting_UserDefinedVariableConfiguration extends Google_Model
{
    public $dataType;
    public $reportName;
    public $variableType;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param $dataType
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @return mixed
     */
    public function getReportName()
    {
        return $this->reportName;
    }

    /**
     * @param $reportName
     */
    public function setReportName($reportName)
    {
        $this->reportName = $reportName;
    }

    /**
     * @return mixed
     */
    public function getVariableType()
    {
        return $this->variableType;
    }

    /**
     * @param $variableType
     */
    public function setVariableType($variableType)
    {
        $this->variableType = $variableType;
    }
}

/**
 * Class Google_Service_Dfareporting_UserProfile
 */
class Google_Service_Dfareporting_UserProfile extends Google_Model
{
    public $accountId;
    public $accountName;
    public $etag;
    public $kind;
    public $profileId;
    public $subAccountId;
    public $subAccountName;
    public $userName;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
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
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getSubAccountId()
    {
        return $this->subAccountId;
    }

    /**
     * @param $subAccountId
     */
    public function setSubAccountId($subAccountId)
    {
        $this->subAccountId = $subAccountId;
    }

    /**
     * @return mixed
     */
    public function getSubAccountName()
    {
        return $this->subAccountName;
    }

    /**
     * @param $subAccountName
     */
    public function setSubAccountName($subAccountName)
    {
        $this->subAccountName = $subAccountName;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
}

/**
 * Class Google_Service_Dfareporting_UserProfileList
 */
class Google_Service_Dfareporting_UserProfileList extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Dfareporting_UserProfile';
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
 * Class Google_Service_Dfareporting_UserRole
 */
class Google_Service_Dfareporting_UserRole extends Google_Collection
{
    public $accountId;
    public $defaultUserRole;
    public $id;
    public $kind;
    public $name;
    public $parentUserRoleId;
    public $subaccountId;
    protected $collection_key = 'permissions';
    protected $internal_gapi_mappings = [];
    protected $permissionsType = 'Google_Service_Dfareporting_UserRolePermission';
    protected $permissionsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getDefaultUserRole()
    {
        return $this->defaultUserRole;
    }

    /**
     * @param $defaultUserRole
     */
    public function setDefaultUserRole($defaultUserRole)
    {
        $this->defaultUserRole = $defaultUserRole;
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
    public function getParentUserRoleId()
    {
        return $this->parentUserRoleId;
    }

    /**
     * @param $parentUserRoleId
     */
    public function setParentUserRoleId($parentUserRoleId)
    {
        $this->parentUserRoleId = $parentUserRoleId;
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
     * @return mixed
     */
    public function getSubaccountId()
    {
        return $this->subaccountId;
    }

    /**
     * @param $subaccountId
     */
    public function setSubaccountId($subaccountId)
    {
        $this->subaccountId = $subaccountId;
    }
}

/**
 * Class Google_Service_Dfareporting_UserRolePermission
 */
class Google_Service_Dfareporting_UserRolePermission extends Google_Model
{
    public $availability;
    public $id;
    public $kind;
    public $name;
    public $permissionGroupId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
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
    public function getPermissionGroupId()
    {
        return $this->permissionGroupId;
    }

    /**
     * @param $permissionGroupId
     */
    public function setPermissionGroupId($permissionGroupId)
    {
        $this->permissionGroupId = $permissionGroupId;
    }
}

/**
 * Class Google_Service_Dfareporting_UserRolePermissionGroup
 */
class Google_Service_Dfareporting_UserRolePermissionGroup extends Google_Model
{
    public $id;
    public $kind;
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
}

/**
 * Class Google_Service_Dfareporting_UserRolePermissionGroupsListResponse
 */
class Google_Service_Dfareporting_UserRolePermissionGroupsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'userRolePermissionGroups';
    protected $internal_gapi_mappings = [];
    protected $userRolePermissionGroupsType = 'Google_Service_Dfareporting_UserRolePermissionGroup';
    protected $userRolePermissionGroupsDataType = 'array';

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
     * @param $userRolePermissionGroups
     */
    public function setUserRolePermissionGroups($userRolePermissionGroups)
    {
        $this->userRolePermissionGroups = $userRolePermissionGroups;
    }

    /**
     * @return mixed
     */
    public function getUserRolePermissionGroups()
    {
        return $this->userRolePermissionGroups;
    }
}

/**
 * Class Google_Service_Dfareporting_UserRolePermissionsListResponse
 */
class Google_Service_Dfareporting_UserRolePermissionsListResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'userRolePermissions';
    protected $internal_gapi_mappings = [];
    protected $userRolePermissionsType = 'Google_Service_Dfareporting_UserRolePermission';
    protected $userRolePermissionsDataType = 'array';

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
     * @param $userRolePermissions
     */
    public function setUserRolePermissions($userRolePermissions)
    {
        $this->userRolePermissions = $userRolePermissions;
    }

    /**
     * @return mixed
     */
    public function getUserRolePermissions()
    {
        return $this->userRolePermissions;
    }
}

/**
 * Class Google_Service_Dfareporting_UserRolesListResponse
 */
class Google_Service_Dfareporting_UserRolesListResponse extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'userRoles';
    protected $internal_gapi_mappings = [];
    protected $userRolesType = 'Google_Service_Dfareporting_UserRole';
    protected $userRolesDataType = 'array';

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
     * @param $userRoles
     */
    public function setUserRoles($userRoles)
    {
        $this->userRoles = $userRoles;
    }

    /**
     * @return mixed
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
}
