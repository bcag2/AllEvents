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
 * Service definition for DoubleClickBidManager (v1).
 *
 * <p>
 * API for viewing and managing your reports in DoubleClick Bid Manager.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/bid-manager/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_DoubleClickBidManager extends Google_Service
{


    public $lineitems;
    public $queries;
    public $reports;


    /**
     * Constructs the internal representation of the DoubleClickBidManager
     * service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'doubleclickbidmanager/v1/';
        $this->version = 'v1';
        $this->serviceName = 'doubleclickbidmanager';

        $this->lineitems = new Google_Service_DoubleClickBidManager_Lineitems_Resource(
            $this,
            $this->serviceName,
            'lineitems',
            [
                'methods' => [
                    'downloadlineitems' => [
                        'path' => 'lineitems/downloadlineitems',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'uploadlineitems' => [
                        'path' => 'lineitems/uploadlineitems',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->queries = new Google_Service_DoubleClickBidManager_Queries_Resource(
            $this,
            $this->serviceName,
            'queries',
            [
                'methods' => [
                    'createquery' => [
                        'path' => 'query',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'deletequery' => [
                        'path' => 'query/{queryId}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'queryId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getquery' => [
                        'path' => 'query/{queryId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'queryId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'listqueries' => [
                        'path' => 'queries',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'runquery' => [
                        'path' => 'query/{queryId}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'queryId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->reports = new Google_Service_DoubleClickBidManager_Reports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'listreports' => [
                        'path' => 'queries/{queryId}/reports',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'queryId' => [
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
 * The "lineitems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google_Service_DoubleClickBidManager(...);
 *   $lineitems = $doubleclickbidmanagerService->lineitems;
 *  </code>
 */
class Google_Service_DoubleClickBidManager_Lineitems_Resource extends Google_Service_Resource
{

    /**
     * Retrieves line items in CSV format. (lineitems.downloadlineitems)
     *
     * @param Google_DownloadLineItemsRequest|Google_Service_DoubleClickBidManager_DownloadLineItemsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function downloadlineitems(Google_Service_DoubleClickBidManager_DownloadLineItemsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('downloadlineitems', [$params], "Google_Service_DoubleClickBidManager_DownloadLineItemsResponse");
    }

    /**
     * Uploads line items in CSV format. (lineitems.uploadlineitems)
     *
     * @param Google_Service_DoubleClickBidManager_UploadLineItemsRequest|Google_UploadLineItemsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function uploadlineitems(Google_Service_DoubleClickBidManager_UploadLineItemsRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('uploadlineitems', [$params], "Google_Service_DoubleClickBidManager_UploadLineItemsResponse");
    }
}

/**
 * The "queries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google_Service_DoubleClickBidManager(...);
 *   $queries = $doubleclickbidmanagerService->queries;
 *  </code>
 */
class Google_Service_DoubleClickBidManager_Queries_Resource extends Google_Service_Resource
{

    /**
     * Creates a query. (queries.createquery)
     *
     * @param Google_Query|Google_Service_DoubleClickBidManager_Query $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function createquery(Google_Service_DoubleClickBidManager_Query $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('createquery', [$params], "Google_Service_DoubleClickBidManager_Query");
    }

    /**
     * Deletes a stored query as well as the associated stored reports.
     * (queries.deletequery)
     *
     * @param string $queryId Query ID to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function deletequery($queryId, $optParams = [])
    {
        $params = ['queryId' => $queryId];
        $params = array_merge($params, $optParams);

        return $this->call('deletequery', [$params]);
    }

    /**
     * Retrieves a stored query. (queries.getquery)
     *
     * @param string $queryId Query ID to retrieve.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getquery($queryId, $optParams = [])
    {
        $params = ['queryId' => $queryId];
        $params = array_merge($params, $optParams);

        return $this->call('getquery', [$params], "Google_Service_DoubleClickBidManager_Query");
    }

    /**
     * Retrieves stored queries. (queries.listqueries)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listqueries($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('listqueries', [$params], "Google_Service_DoubleClickBidManager_ListQueriesResponse");
    }

    /**
     * Runs a stored query to generate a report. (queries.runquery)
     *
     * @param string $queryId Query ID to run.
     * @param Google_RunQueryRequest|Google_Service_DoubleClickBidManager_RunQueryRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function runquery($queryId, Google_Service_DoubleClickBidManager_RunQueryRequest $postBody, $optParams = [])
    {
        $params = ['queryId' => $queryId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('runquery', [$params]);
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google_Service_DoubleClickBidManager(...);
 *   $reports = $doubleclickbidmanagerService->reports;
 *  </code>
 */
class Google_Service_DoubleClickBidManager_Reports_Resource extends Google_Service_Resource
{

    /**
     * Retrieves stored reports. (reports.listreports)
     *
     * @param string $queryId Query ID with which the reports are associated.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listreports($queryId, $optParams = [])
    {
        $params = ['queryId' => $queryId];
        $params = array_merge($params, $optParams);

        return $this->call('listreports', [$params], "Google_Service_DoubleClickBidManager_ListReportsResponse");
    }
}


/**
 * Class Google_Service_DoubleClickBidManager_DownloadLineItemsRequest
 */
class Google_Service_DoubleClickBidManager_DownloadLineItemsRequest extends Google_Collection
{
    public $filterIds;
    public $filterType;
    public $format;
    protected $collection_key = 'filterIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFilterIds()
    {
        return $this->filterIds;
    }

    /**
     * @param $filterIds
     */
    public function setFilterIds($filterIds)
    {
        $this->filterIds = $filterIds;
    }

    /**
     * @return mixed
     */
    public function getFilterType()
    {
        return $this->filterType;
    }

    /**
     * @param $filterType
     */
    public function setFilterType($filterType)
    {
        $this->filterType = $filterType;
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
}

/**
 * Class Google_Service_DoubleClickBidManager_DownloadLineItemsResponse
 */
class Google_Service_DoubleClickBidManager_DownloadLineItemsResponse extends Google_Model
{
    public $lineItems;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_FilterPair
 */
class Google_Service_DoubleClickBidManager_FilterPair extends Google_Model
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
 * Class Google_Service_DoubleClickBidManager_ListQueriesResponse
 */
class Google_Service_DoubleClickBidManager_ListQueriesResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'queries';
    protected $internal_gapi_mappings = [];
    protected $queriesType = 'Google_Service_DoubleClickBidManager_Query';
    protected $queriesDataType = 'array';

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param $queries
     */
    public function setQueries($queries)
    {
        $this->queries = $queries;
    }

    /**
     * @return mixed
     */
    public function getQueries()
    {
        return $this->queries;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_ListReportsResponse
 */
class Google_Service_DoubleClickBidManager_ListReportsResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'reports';
    protected $internal_gapi_mappings = [];
    protected $reportsType = 'Google_Service_DoubleClickBidManager_Report';
    protected $reportsDataType = 'array';

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param $reports
     */
    public function setReports($reports)
    {
        $this->reports = $reports;
    }

    /**
     * @return mixed
     */
    public function getReports()
    {
        return $this->reports;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_Parameters
 */
class Google_Service_DoubleClickBidManager_Parameters extends Google_Collection
{
    public $groupBys;
    public $includeInviteData;
    public $metrics;
    public $type;
    protected $collection_key = 'metrics';
    protected $internal_gapi_mappings = [];
    protected $filtersType = 'Google_Service_DoubleClickBidManager_FilterPair';
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
    public function getGroupBys()
    {
        return $this->groupBys;
    }

    /**
     * @param $groupBys
     */
    public function setGroupBys($groupBys)
    {
        $this->groupBys = $groupBys;
    }

    /**
     * @return mixed
     */
    public function getIncludeInviteData()
    {
        return $this->includeInviteData;
    }

    /**
     * @param $includeInviteData
     */
    public function setIncludeInviteData($includeInviteData)
    {
        $this->includeInviteData = $includeInviteData;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
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
 * Class Google_Service_DoubleClickBidManager_Query
 */
class Google_Service_DoubleClickBidManager_Query extends Google_Model
{
    public $kind;
    public $queryId;
    public $reportDataEndTimeMs;
    public $reportDataStartTimeMs;
    public $timezoneCode;
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_DoubleClickBidManager_QueryMetadata';
    protected $metadataDataType = '';
    protected $paramsType = 'Google_Service_DoubleClickBidManager_Parameters';
    protected $paramsDataType = '';
    protected $scheduleType = 'Google_Service_DoubleClickBidManager_QuerySchedule';
    protected $scheduleDataType = '';

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_QueryMetadata $metadata
     */
    public function setMetadata(Google_Service_DoubleClickBidManager_QueryMetadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_Parameters $params
     */
    public function setParams(Google_Service_DoubleClickBidManager_Parameters $params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getQueryId()
    {
        return $this->queryId;
    }

    /**
     * @param $queryId
     */
    public function setQueryId($queryId)
    {
        $this->queryId = $queryId;
    }

    /**
     * @return mixed
     */
    public function getReportDataEndTimeMs()
    {
        return $this->reportDataEndTimeMs;
    }

    /**
     * @param $reportDataEndTimeMs
     */
    public function setReportDataEndTimeMs($reportDataEndTimeMs)
    {
        $this->reportDataEndTimeMs = $reportDataEndTimeMs;
    }

    /**
     * @return mixed
     */
    public function getReportDataStartTimeMs()
    {
        return $this->reportDataStartTimeMs;
    }

    /**
     * @param $reportDataStartTimeMs
     */
    public function setReportDataStartTimeMs($reportDataStartTimeMs)
    {
        $this->reportDataStartTimeMs = $reportDataStartTimeMs;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_QuerySchedule $schedule
     */
    public function setSchedule(Google_Service_DoubleClickBidManager_QuerySchedule $schedule)
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
    public function getTimezoneCode()
    {
        return $this->timezoneCode;
    }

    /**
     * @param $timezoneCode
     */
    public function setTimezoneCode($timezoneCode)
    {
        $this->timezoneCode = $timezoneCode;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_QueryMetadata
 */
class Google_Service_DoubleClickBidManager_QueryMetadata extends Google_Collection
{
    public $dataRange;
    public $format;
    public $googleCloudStoragePathForLatestReport;
    public $googleDrivePathForLatestReport;
    public $latestReportRunTimeMs;
    public $locale;
    public $reportCount;
    public $running;
    public $sendNotification;
    public $shareEmailAddress;
    public $title;
    protected $collection_key = 'shareEmailAddress';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataRange()
    {
        return $this->dataRange;
    }

    /**
     * @param $dataRange
     */
    public function setDataRange($dataRange)
    {
        $this->dataRange = $dataRange;
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
    public function getGoogleCloudStoragePathForLatestReport()
    {
        return $this->googleCloudStoragePathForLatestReport;
    }

    /**
     * @param $googleCloudStoragePathForLatestReport
     */
    public function setGoogleCloudStoragePathForLatestReport($googleCloudStoragePathForLatestReport)
    {
        $this->googleCloudStoragePathForLatestReport = $googleCloudStoragePathForLatestReport;
    }

    /**
     * @return mixed
     */
    public function getGoogleDrivePathForLatestReport()
    {
        return $this->googleDrivePathForLatestReport;
    }

    /**
     * @param $googleDrivePathForLatestReport
     */
    public function setGoogleDrivePathForLatestReport($googleDrivePathForLatestReport)
    {
        $this->googleDrivePathForLatestReport = $googleDrivePathForLatestReport;
    }

    /**
     * @return mixed
     */
    public function getLatestReportRunTimeMs()
    {
        return $this->latestReportRunTimeMs;
    }

    /**
     * @param $latestReportRunTimeMs
     */
    public function setLatestReportRunTimeMs($latestReportRunTimeMs)
    {
        $this->latestReportRunTimeMs = $latestReportRunTimeMs;
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
    public function getReportCount()
    {
        return $this->reportCount;
    }

    /**
     * @param $reportCount
     */
    public function setReportCount($reportCount)
    {
        $this->reportCount = $reportCount;
    }

    /**
     * @return mixed
     */
    public function getRunning()
    {
        return $this->running;
    }

    /**
     * @param $running
     */
    public function setRunning($running)
    {
        $this->running = $running;
    }

    /**
     * @return mixed
     */
    public function getSendNotification()
    {
        return $this->sendNotification;
    }

    /**
     * @param $sendNotification
     */
    public function setSendNotification($sendNotification)
    {
        $this->sendNotification = $sendNotification;
    }

    /**
     * @return mixed
     */
    public function getShareEmailAddress()
    {
        return $this->shareEmailAddress;
    }

    /**
     * @param $shareEmailAddress
     */
    public function setShareEmailAddress($shareEmailAddress)
    {
        $this->shareEmailAddress = $shareEmailAddress;
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
 * Class Google_Service_DoubleClickBidManager_QuerySchedule
 */
class Google_Service_DoubleClickBidManager_QuerySchedule extends Google_Model
{
    public $endTimeMs;
    public $frequency;
    public $nextRunMinuteOfDay;
    public $nextRunTimezoneCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEndTimeMs()
    {
        return $this->endTimeMs;
    }

    /**
     * @param $endTimeMs
     */
    public function setEndTimeMs($endTimeMs)
    {
        $this->endTimeMs = $endTimeMs;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param $frequency
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;
    }

    /**
     * @return mixed
     */
    public function getNextRunMinuteOfDay()
    {
        return $this->nextRunMinuteOfDay;
    }

    /**
     * @param $nextRunMinuteOfDay
     */
    public function setNextRunMinuteOfDay($nextRunMinuteOfDay)
    {
        $this->nextRunMinuteOfDay = $nextRunMinuteOfDay;
    }

    /**
     * @return mixed
     */
    public function getNextRunTimezoneCode()
    {
        return $this->nextRunTimezoneCode;
    }

    /**
     * @param $nextRunTimezoneCode
     */
    public function setNextRunTimezoneCode($nextRunTimezoneCode)
    {
        $this->nextRunTimezoneCode = $nextRunTimezoneCode;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_Report
 */
class Google_Service_DoubleClickBidManager_Report extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $keyType = 'Google_Service_DoubleClickBidManager_ReportKey';
    protected $keyDataType = '';
    protected $metadataType = 'Google_Service_DoubleClickBidManager_ReportMetadata';
    protected $metadataDataType = '';
    protected $paramsType = 'Google_Service_DoubleClickBidManager_Parameters';
    protected $paramsDataType = '';


    /**
     * @param Google_Service_DoubleClickBidManager_ReportKey $key
     */
    public function setKey(Google_Service_DoubleClickBidManager_ReportKey $key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_ReportMetadata $metadata
     */
    public function setMetadata(Google_Service_DoubleClickBidManager_ReportMetadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_Parameters $params
     */
    public function setParams(Google_Service_DoubleClickBidManager_Parameters $params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_ReportFailure
 */
class Google_Service_DoubleClickBidManager_ReportFailure extends Google_Model
{
    public $errorCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_ReportKey
 */
class Google_Service_DoubleClickBidManager_ReportKey extends Google_Model
{
    public $queryId;
    public $reportId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getQueryId()
    {
        return $this->queryId;
    }

    /**
     * @param $queryId
     */
    public function setQueryId($queryId)
    {
        $this->queryId = $queryId;
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
}

/**
 * Class Google_Service_DoubleClickBidManager_ReportMetadata
 */
class Google_Service_DoubleClickBidManager_ReportMetadata extends Google_Model
{
    public $googleCloudStoragePath;
    public $reportDataEndTimeMs;
    public $reportDataStartTimeMs;
    protected $internal_gapi_mappings = [];
    protected $statusType = 'Google_Service_DoubleClickBidManager_ReportStatus';
    protected $statusDataType = '';

    /**
     * @return mixed
     */
    public function getGoogleCloudStoragePath()
    {
        return $this->googleCloudStoragePath;
    }

    /**
     * @param $googleCloudStoragePath
     */
    public function setGoogleCloudStoragePath($googleCloudStoragePath)
    {
        $this->googleCloudStoragePath = $googleCloudStoragePath;
    }

    /**
     * @return mixed
     */
    public function getReportDataEndTimeMs()
    {
        return $this->reportDataEndTimeMs;
    }

    /**
     * @param $reportDataEndTimeMs
     */
    public function setReportDataEndTimeMs($reportDataEndTimeMs)
    {
        $this->reportDataEndTimeMs = $reportDataEndTimeMs;
    }

    /**
     * @return mixed
     */
    public function getReportDataStartTimeMs()
    {
        return $this->reportDataStartTimeMs;
    }

    /**
     * @param $reportDataStartTimeMs
     */
    public function setReportDataStartTimeMs($reportDataStartTimeMs)
    {
        $this->reportDataStartTimeMs = $reportDataStartTimeMs;
    }

    /**
     * @param Google_Service_DoubleClickBidManager_ReportStatus $status
     */
    public function setStatus(Google_Service_DoubleClickBidManager_ReportStatus $status)
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
 * Class Google_Service_DoubleClickBidManager_ReportStatus
 */
class Google_Service_DoubleClickBidManager_ReportStatus extends Google_Model
{
    public $finishTimeMs;
    public $format;
    public $state;
    protected $internal_gapi_mappings = [];
    protected $failureType = 'Google_Service_DoubleClickBidManager_ReportFailure';
    protected $failureDataType = '';

    /**
     * @param Google_Service_DoubleClickBidManager_ReportFailure $failure
     */
    public function setFailure(Google_Service_DoubleClickBidManager_ReportFailure $failure)
    {
        $this->failure = $failure;
    }

    /**
     * @return mixed
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * @return mixed
     */
    public function getFinishTimeMs()
    {
        return $this->finishTimeMs;
    }

    /**
     * @param $finishTimeMs
     */
    public function setFinishTimeMs($finishTimeMs)
    {
        $this->finishTimeMs = $finishTimeMs;
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
 * Class Google_Service_DoubleClickBidManager_RowStatus
 */
class Google_Service_DoubleClickBidManager_RowStatus extends Google_Collection
{
    public $changed;
    public $entityId;
    public $entityName;
    public $errors;
    public $persisted;
    public $rowNumber;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChanged()
    {
        return $this->changed;
    }

    /**
     * @param $changed
     */
    public function setChanged($changed)
    {
        $this->changed = $changed;
    }

    /**
     * @return mixed
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @param $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entityName = $entityName;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getPersisted()
    {
        return $this->persisted;
    }

    /**
     * @param $persisted
     */
    public function setPersisted($persisted)
    {
        $this->persisted = $persisted;
    }

    /**
     * @return mixed
     */
    public function getRowNumber()
    {
        return $this->rowNumber;
    }

    /**
     * @param $rowNumber
     */
    public function setRowNumber($rowNumber)
    {
        $this->rowNumber = $rowNumber;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_RunQueryRequest
 */
class Google_Service_DoubleClickBidManager_RunQueryRequest extends Google_Model
{
    public $dataRange;
    public $reportDataEndTimeMs;
    public $reportDataStartTimeMs;
    public $timezoneCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataRange()
    {
        return $this->dataRange;
    }

    /**
     * @param $dataRange
     */
    public function setDataRange($dataRange)
    {
        $this->dataRange = $dataRange;
    }

    /**
     * @return mixed
     */
    public function getReportDataEndTimeMs()
    {
        return $this->reportDataEndTimeMs;
    }

    /**
     * @param $reportDataEndTimeMs
     */
    public function setReportDataEndTimeMs($reportDataEndTimeMs)
    {
        $this->reportDataEndTimeMs = $reportDataEndTimeMs;
    }

    /**
     * @return mixed
     */
    public function getReportDataStartTimeMs()
    {
        return $this->reportDataStartTimeMs;
    }

    /**
     * @param $reportDataStartTimeMs
     */
    public function setReportDataStartTimeMs($reportDataStartTimeMs)
    {
        $this->reportDataStartTimeMs = $reportDataStartTimeMs;
    }

    /**
     * @return mixed
     */
    public function getTimezoneCode()
    {
        return $this->timezoneCode;
    }

    /**
     * @param $timezoneCode
     */
    public function setTimezoneCode($timezoneCode)
    {
        $this->timezoneCode = $timezoneCode;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_UploadLineItemsRequest
 */
class Google_Service_DoubleClickBidManager_UploadLineItemsRequest extends Google_Model
{
    public $dryRun;
    public $format;
    public $lineItems;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDryRun()
    {
        return $this->dryRun;
    }

    /**
     * @param $dryRun
     */
    public function setDryRun($dryRun)
    {
        $this->dryRun = $dryRun;
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
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_UploadLineItemsResponse
 */
class Google_Service_DoubleClickBidManager_UploadLineItemsResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $uploadStatusType = 'Google_Service_DoubleClickBidManager_UploadStatus';
    protected $uploadStatusDataType = '';


    /**
     * @param Google_Service_DoubleClickBidManager_UploadStatus $uploadStatus
     */
    public function setUploadStatus(Google_Service_DoubleClickBidManager_UploadStatus $uploadStatus)
    {
        $this->uploadStatus = $uploadStatus;
    }

    /**
     * @return mixed
     */
    public function getUploadStatus()
    {
        return $this->uploadStatus;
    }
}

/**
 * Class Google_Service_DoubleClickBidManager_UploadStatus
 */
class Google_Service_DoubleClickBidManager_UploadStatus extends Google_Collection
{
    public $errors;
    protected $collection_key = 'rowStatus';
    protected $internal_gapi_mappings = [];
    protected $rowStatusType = 'Google_Service_DoubleClickBidManager_RowStatus';
    protected $rowStatusDataType = 'array';

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param $rowStatus
     */
    public function setRowStatus($rowStatus)
    {
        $this->rowStatus = $rowStatus;
    }

    /**
     * @return mixed
     */
    public function getRowStatus()
    {
        return $this->rowStatus;
    }
}
