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
 * Service definition for YouTubeAnalytics (v1).
 *
 * <p>
 * Retrieve your YouTube Analytics reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/youtube/analytics/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_YouTubeAnalytics extends Google_Service
{
    /** Manage your YouTube account. */
    const YOUTUBE =
        "https://www.googleapis.com/auth/youtube";
    /** View your YouTube account. */
    const YOUTUBE_READONLY =
        "https://www.googleapis.com/auth/youtube.readonly";
    /** View and manage your assets and associated content on YouTube. */
    const YOUTUBEPARTNER =
        "https://www.googleapis.com/auth/youtubepartner";
    /** View YouTube Analytics monetary reports for your YouTube content. */
    const YT_ANALYTICS_MONETARY_READONLY =
        "https://www.googleapis.com/auth/yt-analytics-monetary.readonly";
    /** View YouTube Analytics reports for your YouTube content. */
    const YT_ANALYTICS_READONLY =
        "https://www.googleapis.com/auth/yt-analytics.readonly";

    public $batchReportDefinitions;
    public $batchReports;
    public $groupItems;
    public $groups;
    public $reports;


    /**
     * Constructs the internal representation of the YouTubeAnalytics service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'youtube/analytics/v1/';
        $this->version = 'v1';
        $this->serviceName = 'youtubeAnalytics';

        $this->batchReportDefinitions = new Google_Service_YouTubeAnalytics_BatchReportDefinitions_Resource(
            $this,
            $this->serviceName,
            'batchReportDefinitions',
            [
                'methods' => [
                    'list' => [
                        'path' => 'batchReportDefinitions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->batchReports = new Google_Service_YouTubeAnalytics_BatchReports_Resource(
            $this,
            $this->serviceName,
            'batchReports',
            [
                'methods' => [
                    'list' => [
                        'path' => 'batchReports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'batchReportDefinitionId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->groupItems = new Google_Service_YouTubeAnalytics_GroupItems_Resource(
            $this,
            $this->serviceName,
            'groupItems',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'groupItems',
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
                        'path' => 'groupItems',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'groupItems',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'groupId' => [
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
        $this->groups = new Google_Service_YouTubeAnalytics_Groups_Resource(
            $this,
            $this->serviceName,
            'groups',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'groups',
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
                        'path' => 'groups',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'groups',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'onBehalfOfContentOwner' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'id' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mine' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'groups',
                        'httpMethod' => 'PUT',
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
        $this->reports = new Google_Service_YouTubeAnalytics_Reports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'query' => [
                        'path' => 'reports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'ids' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'start-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'end-date' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'metrics' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'max-results' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'dimensions' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'start-index' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'currency' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filters' => [
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
 * The "batchReportDefinitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $batchReportDefinitions = $youtubeAnalyticsService->batchReportDefinitions;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_BatchReportDefinitions_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of available batch report definitions.
     * (batchReportDefinitions.listBatchReportDefinitions)
     *
     * @param string $onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     *                                       identifies the content owner that the user is acting on behalf of.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listBatchReportDefinitions($onBehalfOfContentOwner, $optParams = [])
    {
        $params = ['onBehalfOfContentOwner' => $onBehalfOfContentOwner];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTubeAnalytics_BatchReportDefinitionList");
    }
}

/**
 * The "batchReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $batchReports = $youtubeAnalyticsService->batchReports;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_BatchReports_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of processed batch reports. (batchReports.listBatchReports)
     *
     * @param string $batchReportDefinitionId The batchReportDefinitionId parameter
     *                                        specifies the ID of the batch reportort definition for which you are
     *                                        retrieving reports.
     * @param string $onBehalfOfContentOwner The onBehalfOfContentOwner parameter
     *                                        identifies the content owner that the user is acting on behalf of.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listBatchReports($batchReportDefinitionId, $onBehalfOfContentOwner, $optParams = [])
    {
        $params = ['batchReportDefinitionId' => $batchReportDefinitionId, 'onBehalfOfContentOwner' => $onBehalfOfContentOwner];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTubeAnalytics_BatchReportList");
    }
}

/**
 * The "groupItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $groupItems = $youtubeAnalyticsService->groupItems;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_GroupItems_Resource extends Google_Service_Resource
{

    /**
     * Removes an item from a group. (groupItems.delete)
     *
     * @param string $id The id parameter specifies the YouTube group item ID for
     *                          the group that is being deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a group item. (groupItems.insert)
     *
     * @param Google_GroupItem|Google_Service_YouTubeAnalytics_GroupItem $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function insert(Google_Service_YouTubeAnalytics_GroupItem $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTubeAnalytics_GroupItem");
    }

    /**
     * Returns a collection of group items that match the API request parameters.
     * (groupItems.listGroupItems)
     *
     * @param string $groupId The id parameter specifies the unique ID of the group
     *                          for which you want to retrieve group items.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function listGroupItems($groupId, $optParams = [])
    {
        $params = ['groupId' => $groupId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTubeAnalytics_GroupItemListResponse");
    }
}

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $groups = $youtubeAnalyticsService->groups;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_Groups_Resource extends Google_Service_Resource
{

    /**
     * Deletes a group. (groups.delete)
     *
     * @param string $id The id parameter specifies the YouTube group ID for the
     *                          group that is being deleted.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function delete($id, $optParams = [])
    {
        $params = ['id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Creates a group. (groups.insert)
     *
     * @param Google_Group|Google_Service_YouTubeAnalytics_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function insert(Google_Service_YouTubeAnalytics_Group $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_YouTubeAnalytics_Group");
    }

    /**
     * Returns a collection of groups that match the API request parameters. For
     * example, you can retrieve all groups that the authenticated user owns, or you
     * can retrieve one or more groups by their unique IDs. (groups.listGroups)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
     * @opt_param string id The id parameter specifies a comma-separated list of the
     * YouTube group ID(s) for the resource(s) that are being retrieved. In a group
     * resource, the id property specifies the group's YouTube group ID.
     * @opt_param bool mine Set this parameter's value to true to instruct the API
     * to only return groups owned by the authenticated user.
     */
    public function listGroups($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_YouTubeAnalytics_GroupListResponse");
    }

    /**
     * Modifies a group. For example, you could change a group's title.
     * (groups.update)
     *
     * @param Google_Group|Google_Service_YouTubeAnalytics_Group $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
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
    public function update(Google_Service_YouTubeAnalytics_Group $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_YouTubeAnalytics_Group");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeAnalyticsService = new Google_Service_YouTubeAnalytics(...);
 *   $reports = $youtubeAnalyticsService->reports;
 *  </code>
 */
class Google_Service_YouTubeAnalytics_Reports_Resource extends Google_Service_Resource
{

    /**
     * Retrieve your YouTube Analytics reports. (reports.query)
     *
     * @param string $ids Identifies the YouTube channel or content owner for which
     *                          you are retrieving YouTube Analytics data. - To request data for a YouTube
     *                          user, set the ids parameter value to channel==CHANNEL_ID, where CHANNEL_ID
     *                          specifies the unique YouTube channel ID. - To request data for a YouTube CMS
     *                          content owner, set the ids parameter value to contentOwner==OWNER_NAME, where
     *                          OWNER_NAME is the CMS name of the content owner.
     * @param string $startDate The start date for fetching YouTube Analytics data.
     *                          The value should be in YYYY-MM-DD format.
     * @param string $endDate The end date for fetching YouTube Analytics data. The
     *                          value should be in YYYY-MM-DD format.
     * @param string $metrics A comma-separated list of YouTube Analytics metrics,
     *                          such as views or likes,dislikes. See the Available Reports document for a
     *                          list of the reports that you can retrieve and the metrics available in each
     *                          report, and see the Metrics document for definitions of those metrics.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param int max-results The maximum number of rows to include in the
     * response.
     * @opt_param string sort A comma-separated list of dimensions or metrics that
     * determine the sort order for YouTube Analytics data. By default the sort
     * order is ascending. The '-' prefix causes descending sort order.
     * @opt_param string dimensions A comma-separated list of YouTube Analytics
     * dimensions, such as views or ageGroup,gender. See the Available Reports
     * document for a list of the reports that you can retrieve and the dimensions
     * used for those reports. Also see the Dimensions document for definitions of
     * those dimensions.
     * @opt_param int start-index An index of the first entity to retrieve. Use this
     * parameter as a pagination mechanism along with the max-results parameter
     * (one-based, inclusive).
     * @opt_param string currency The currency to which financial metrics should be
     * converted. The default is US Dollar (USD). If the result contains no
     * financial metrics, this flag will be ignored. Responds with an error if the
     * specified currency is not recognized.
     * @opt_param string filters A list of filters that should be applied when
     * retrieving YouTube Analytics data. The Available Reports document identifies
     * the dimensions that can be used to filter each report, and the Dimensions
     * document defines those dimensions. If a request uses multiple filters, join
     * them together with a semicolon (;), and the returned result table will
     * satisfy both filters. For example, a filters parameter value of
     * video==dMH0bHeiRNg;country==IT restricts the result set to include data for
     * the given video in Italy.
     */
    public function query($ids, $startDate, $endDate, $metrics, $optParams = [])
    {
        $params = ['ids' => $ids, 'start-date' => $startDate, 'end-date' => $endDate, 'metrics' => $metrics];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_YouTubeAnalytics_ResultTable");
    }
}


/**
 * Class Google_Service_YouTubeAnalytics_BatchReport
 */
class Google_Service_YouTubeAnalytics_BatchReport extends Google_Collection
{
    public $id;
    public $kind;
    public $reportId;
    public $timeUpdated;
    protected $collection_key = 'outputs';
    protected $internal_gapi_mappings = [];
    protected $outputsType = 'Google_Service_YouTubeAnalytics_BatchReportOutputs';
    protected $outputsDataType = 'array';
    protected $timeSpanType = 'Google_Service_YouTubeAnalytics_BatchReportTimeSpan';
    protected $timeSpanDataType = '';

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
     * @param $outputs
     */
    public function setOutputs($outputs)
    {
        $this->outputs = $outputs;
    }

    /**
     * @return mixed
     */
    public function getOutputs()
    {
        return $this->outputs;
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
     * @param Google_Service_YouTubeAnalytics_BatchReportTimeSpan $timeSpan
     */
    public function setTimeSpan(Google_Service_YouTubeAnalytics_BatchReportTimeSpan $timeSpan)
    {
        $this->timeSpan = $timeSpan;
    }

    /**
     * @return mixed
     */
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * @return mixed
     */
    public function getTimeUpdated()
    {
        return $this->timeUpdated;
    }

    /**
     * @param $timeUpdated
     */
    public function setTimeUpdated($timeUpdated)
    {
        $this->timeUpdated = $timeUpdated;
    }
}

/**
 * Class Google_Service_YouTubeAnalytics_BatchReportDefinition
 */
class Google_Service_YouTubeAnalytics_BatchReportDefinition extends Google_Model
{
    public $id;
    public $kind;
    public $name;
    public $status;
    public $type;
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
}

/**
 * Class Google_Service_YouTubeAnalytics_BatchReportDefinitionList
 */
class Google_Service_YouTubeAnalytics_BatchReportDefinitionList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTubeAnalytics_BatchReportDefinition';
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
}

/**
 * Class Google_Service_YouTubeAnalytics_BatchReportList
 */
class Google_Service_YouTubeAnalytics_BatchReportList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTubeAnalytics_BatchReport';
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
}

/**
 * Class Google_Service_YouTubeAnalytics_BatchReportOutputs
 */
class Google_Service_YouTubeAnalytics_BatchReportOutputs extends Google_Model
{
    public $downloadUrl;
    public $format;
    public $type;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTubeAnalytics_BatchReportTimeSpan
 */
class Google_Service_YouTubeAnalytics_BatchReportTimeSpan extends Google_Model
{
    public $endTime;
    public $startTime;
    protected $internal_gapi_mappings = [];

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
}

/**
 * Class Google_Service_YouTubeAnalytics_Group
 */
class Google_Service_YouTubeAnalytics_Group extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $contentDetailsType = 'Google_Service_YouTubeAnalytics_GroupContentDetails';
    protected $contentDetailsDataType = '';
    protected $snippetType = 'Google_Service_YouTubeAnalytics_GroupSnippet';
    protected $snippetDataType = '';


    /**
     * @param Google_Service_YouTubeAnalytics_GroupContentDetails $contentDetails
     */
    public function setContentDetails(Google_Service_YouTubeAnalytics_GroupContentDetails $contentDetails)
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
     * @param Google_Service_YouTubeAnalytics_GroupSnippet $snippet
     */
    public function setSnippet(Google_Service_YouTubeAnalytics_GroupSnippet $snippet)
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
 * Class Google_Service_YouTubeAnalytics_GroupContentDetails
 */
class Google_Service_YouTubeAnalytics_GroupContentDetails extends Google_Model
{
    public $itemCount;
    public $itemType;
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

    /**
     * @return mixed
     */
    public function getItemType()
    {
        return $this->itemType;
    }

    /**
     * @param $itemType
     */
    public function setItemType($itemType)
    {
        $this->itemType = $itemType;
    }
}

/**
 * Class Google_Service_YouTubeAnalytics_GroupItem
 */
class Google_Service_YouTubeAnalytics_GroupItem extends Google_Model
{
    public $etag;
    public $groupId;
    public $id;
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $resourceType = 'Google_Service_YouTubeAnalytics_GroupItemResource';
    protected $resourceDataType = '';

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
     * @param Google_Service_YouTubeAnalytics_GroupItemResource $resource
     */
    public function setResource(Google_Service_YouTubeAnalytics_GroupItemResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }
}

/**
 * Class Google_Service_YouTubeAnalytics_GroupItemListResponse
 */
class Google_Service_YouTubeAnalytics_GroupItemListResponse extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTubeAnalytics_GroupItem';
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
 * Class Google_Service_YouTubeAnalytics_GroupItemResource
 */
class Google_Service_YouTubeAnalytics_GroupItemResource extends Google_Model
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
 * Class Google_Service_YouTubeAnalytics_GroupListResponse
 */
class Google_Service_YouTubeAnalytics_GroupListResponse extends Google_Collection
{
    public $etag;
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_YouTubeAnalytics_Group';
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
 * Class Google_Service_YouTubeAnalytics_GroupSnippet
 */
class Google_Service_YouTubeAnalytics_GroupSnippet extends Google_Model
{
    public $publishedAt;
    public $title;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_YouTubeAnalytics_ResultTable
 */
class Google_Service_YouTubeAnalytics_ResultTable extends Google_Collection
{
    public $kind;
    public $rows;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $columnHeadersType = 'Google_Service_YouTubeAnalytics_ResultTableColumnHeaders';
    protected $columnHeadersDataType = 'array';

    /**
     * @param $columnHeaders
     */
    public function setColumnHeaders($columnHeaders)
    {
        $this->columnHeaders = $columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getColumnHeaders()
    {
        return $this->columnHeaders;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
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
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }
}

/**
 * Class Google_Service_YouTubeAnalytics_ResultTableColumnHeaders
 */
class Google_Service_YouTubeAnalytics_ResultTableColumnHeaders extends Google_Model
{
    public $columnType;
    public $dataType;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    /**
     * @param $columnType
     */
    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;
    }

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
