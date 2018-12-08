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
 * Service definition for Doubleclicksearch (v2).
 *
 * <p>
 * Report and modify your advertising data in DoubleClick Search (for example,
 * campaigns, ad groups, keywords, and conversions).</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/doubleclick-search/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Doubleclicksearch extends Google_Service
{
    /** View and manage your advertising data in DoubleClick Search. */
    const DOUBLECLICKSEARCH =
        "https://www.googleapis.com/auth/doubleclicksearch";

    public $conversion;
    public $reports;
    public $savedColumns;


    /**
     * Constructs the internal representation of the Doubleclicksearch service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'doubleclicksearch/v2/';
        $this->version = 'v2';
        $this->serviceName = 'doubleclicksearch';

        $this->conversion = new Google_Service_Doubleclicksearch_Conversion_Resource(
            $this,
            $this->serviceName,
            'conversion',
            [
                'methods' => [
                    'get' => [
                        'path' => 'agency/{agencyId}/advertiser/{advertiserId}/engine/{engineAccountId}/conversion',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'agencyId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'advertiserId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'engineAccountId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'rowCount' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'startRow' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'adGroupId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'campaignId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'adId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'criterionId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'conversion',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'patch' => [
                        'path' => 'conversion',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'advertiserId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'agencyId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'endDate' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'engineAccountId' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'rowCount' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'startDate' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'startRow' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'conversion',
                        'httpMethod' => 'PUT',
                        'parameters' => [],
                    ], 'updateAvailability' => [
                        'path' => 'conversion/updateAvailability',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->reports = new Google_Service_Doubleclicksearch_Reports_Resource(
            $this,
            $this->serviceName,
            'reports',
            [
                'methods' => [
                    'generate' => [
                        'path' => 'reports/generate',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'get' => [
                        'path' => 'reports/{reportId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'getFile' => [
                        'path' => 'reports/{reportId}/files/{reportFragment}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'reportId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'reportFragment' => [
                                'location' => 'path',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'request' => [
                        'path' => 'reports',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->savedColumns = new Google_Service_Doubleclicksearch_SavedColumns_Resource(
            $this,
            $this->serviceName,
            'savedColumns',
            [
                'methods' => [
                    'list' => [
                        'path' => 'agency/{agencyId}/advertiser/{advertiserId}/savedcolumns',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'agencyId' => [
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
    }
}


/**
 * The "conversion" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google_Service_Doubleclicksearch(...);
 *   $conversion = $doubleclicksearchService->conversion;
 *  </code>
 */
class Google_Service_Doubleclicksearch_Conversion_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a list of conversions from a DoubleClick Search engine account.
     * (conversion.get)
     *
     * @param string $agencyId Numeric ID of the agency.
     * @param string $advertiserId Numeric ID of the advertiser.
     * @param string $engineAccountId Numeric ID of the engine account.
     * @param int $endDate Last date (inclusive) on which to retrieve conversions.
     *                                Format is yyyymmdd.
     * @param int $rowCount The number of conversions to return per call.
     * @param int $startDate First date (inclusive) on which to retrieve
     *                                conversions. Format is yyyymmdd.
     * @param string $startRow The 0-based starting index for retrieving conversions
     *                                results.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string adGroupId Numeric ID of the ad group.
     * @opt_param string campaignId Numeric ID of the campaign.
     * @opt_param string adId Numeric ID of the ad.
     * @opt_param string criterionId Numeric ID of the criterion.
     */
    public function get($agencyId, $advertiserId, $engineAccountId, $endDate, $rowCount, $startDate, $startRow, $optParams = [])
    {
        $params = ['agencyId' => $agencyId, 'advertiserId' => $advertiserId, 'engineAccountId' => $engineAccountId, 'endDate' => $endDate, 'rowCount' => $rowCount, 'startDate' => $startDate, 'startRow' => $startRow];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Doubleclicksearch_ConversionList");
    }

    /**
     * Inserts a batch of new conversions into DoubleClick Search.
     * (conversion.insert)
     *
     * @param Google_ConversionList|Google_Service_Doubleclicksearch_ConversionList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Doubleclicksearch_ConversionList");
    }

    /**
     * Updates a batch of conversions in DoubleClick Search. This method supports
     * patch semantics. (conversion.patch)
     *
     * @param string $advertiserId Numeric ID of the advertiser.
     * @param string $agencyId Numeric ID of the agency.
     * @param int $endDate Last date (inclusive) on which to retrieve conversions.
     *                                                                                               Format is yyyymmdd.
     * @param string $engineAccountId Numeric ID of the engine account.
     * @param int $rowCount The number of conversions to return per call.
     * @param int $startDate First date (inclusive) on which to retrieve
     *                                                                                               conversions. Format is yyyymmdd.
     * @param string $startRow The 0-based starting index for retrieving conversions
     *                                                                                               results.
     * @param Google_ConversionList|Google_Service_Doubleclicksearch_ConversionList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($advertiserId, $agencyId, $endDate, $engineAccountId, $rowCount, $startDate, $startRow, Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = [])
    {
        $params = ['advertiserId' => $advertiserId, 'agencyId' => $agencyId, 'endDate' => $endDate, 'engineAccountId' => $engineAccountId, 'rowCount' => $rowCount, 'startDate' => $startDate, 'startRow' => $startRow, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Doubleclicksearch_ConversionList");
    }

    /**
     * Updates a batch of conversions in DoubleClick Search. (conversion.update)
     *
     * @param Google_ConversionList|Google_Service_Doubleclicksearch_ConversionList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update(Google_Service_Doubleclicksearch_ConversionList $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Doubleclicksearch_ConversionList");
    }

    /**
     * Updates the availabilities of a batch of floodlight activities in DoubleClick
     * Search. (conversion.updateAvailability)
     *
     * @param Google_Service_Doubleclicksearch_UpdateAvailabilityRequest|Google_UpdateAvailabilityRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function updateAvailability(Google_Service_Doubleclicksearch_UpdateAvailabilityRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('updateAvailability', [$params], "Google_Service_Doubleclicksearch_UpdateAvailabilityResponse");
    }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google_Service_Doubleclicksearch(...);
 *   $reports = $doubleclicksearchService->reports;
 *  </code>
 */
class Google_Service_Doubleclicksearch_Reports_Resource extends Google_Service_Resource
{

    /**
     * Generates and returns a report immediately. (reports.generate)
     *
     * @param Google_ReportRequest|Google_Service_Doubleclicksearch_ReportRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function generate(Google_Service_Doubleclicksearch_ReportRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('generate', [$params], "Google_Service_Doubleclicksearch_Report");
    }

    /**
     * Polls for the status of a report request. (reports.get)
     *
     * @param string $reportId ID of the report request being polled.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($reportId, $optParams = [])
    {
        $params = ['reportId' => $reportId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Doubleclicksearch_Report");
    }

    /**
     * Downloads a report file encoded in UTF-8. (reports.getFile)
     *
     * @param string $reportId ID of the report.
     * @param int $reportFragment The index of the report fragment to download.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getFile($reportId, $reportFragment, $optParams = [])
    {
        $params = ['reportId' => $reportId, 'reportFragment' => $reportFragment];
        $params = array_merge($params, $optParams);

        return $this->call('getFile', [$params]);
    }

    /**
     * Inserts a report request into the reporting system. (reports.request)
     *
     * @param Google_ReportRequest|Google_Service_Doubleclicksearch_ReportRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function request(Google_Service_Doubleclicksearch_ReportRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('request', [$params], "Google_Service_Doubleclicksearch_Report");
    }
}

/**
 * The "savedColumns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclicksearchService = new Google_Service_Doubleclicksearch(...);
 *   $savedColumns = $doubleclicksearchService->savedColumns;
 *  </code>
 */
class Google_Service_Doubleclicksearch_SavedColumns_Resource extends Google_Service_Resource
{

    /**
     * Retrieve the list of saved columns for a specified advertiser.
     * (savedColumns.listSavedColumns)
     *
     * @param string $agencyId DS ID of the agency.
     * @param string $advertiserId DS ID of the advertiser.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listSavedColumns($agencyId, $advertiserId, $optParams = [])
    {
        $params = ['agencyId' => $agencyId, 'advertiserId' => $advertiserId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Doubleclicksearch_SavedColumnList");
    }
}


/**
 * Class Google_Service_Doubleclicksearch_Availability
 */
class Google_Service_Doubleclicksearch_Availability extends Google_Model
{
    public $advertiserId;
    public $agencyId;
    public $availabilityTimestamp;
    public $segmentationId;
    public $segmentationName;
    public $segmentationType;
    protected $internal_gapi_mappings = [];

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
    public function getAgencyId()
    {
        return $this->agencyId;
    }

    /**
     * @param $agencyId
     */
    public function setAgencyId($agencyId)
    {
        $this->agencyId = $agencyId;
    }

    /**
     * @return mixed
     */
    public function getAvailabilityTimestamp()
    {
        return $this->availabilityTimestamp;
    }

    /**
     * @param $availabilityTimestamp
     */
    public function setAvailabilityTimestamp($availabilityTimestamp)
    {
        $this->availabilityTimestamp = $availabilityTimestamp;
    }

    /**
     * @return mixed
     */
    public function getSegmentationId()
    {
        return $this->segmentationId;
    }

    /**
     * @param $segmentationId
     */
    public function setSegmentationId($segmentationId)
    {
        $this->segmentationId = $segmentationId;
    }

    /**
     * @return mixed
     */
    public function getSegmentationName()
    {
        return $this->segmentationName;
    }

    /**
     * @param $segmentationName
     */
    public function setSegmentationName($segmentationName)
    {
        $this->segmentationName = $segmentationName;
    }

    /**
     * @return mixed
     */
    public function getSegmentationType()
    {
        return $this->segmentationType;
    }

    /**
     * @param $segmentationType
     */
    public function setSegmentationType($segmentationType)
    {
        $this->segmentationType = $segmentationType;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_Conversion
 */
class Google_Service_Doubleclicksearch_Conversion extends Google_Collection
{
    public $adGroupId;
    public $adId;
    public $advertiserId;
    public $agencyId;
    public $attributionModel;
    public $campaignId;
    public $clickId;
    public $conversionId;
    public $conversionModifiedTimestamp;
    public $conversionTimestamp;
    public $countMillis;
    public $criterionId;
    public $currencyCode;
    public $dsConversionId;
    public $engineAccountId;
    public $floodlightOrderId;
    public $quantityMillis;
    public $revenueMicros;
    public $segmentationId;
    public $segmentationName;
    public $segmentationType;
    public $state;
    public $type;
    protected $collection_key = 'customMetric';
    protected $internal_gapi_mappings = [];
    protected $customDimensionType = 'Google_Service_Doubleclicksearch_CustomDimension';
    protected $customDimensionDataType = 'array';
    protected $customMetricType = 'Google_Service_Doubleclicksearch_CustomMetric';
    protected $customMetricDataType = 'array';

    /**
     * @return mixed
     */
    public function getAdGroupId()
    {
        return $this->adGroupId;
    }

    /**
     * @param $adGroupId
     */
    public function setAdGroupId($adGroupId)
    {
        $this->adGroupId = $adGroupId;
    }

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
    public function getAgencyId()
    {
        return $this->agencyId;
    }

    /**
     * @param $agencyId
     */
    public function setAgencyId($agencyId)
    {
        $this->agencyId = $agencyId;
    }

    /**
     * @return mixed
     */
    public function getAttributionModel()
    {
        return $this->attributionModel;
    }

    /**
     * @param $attributionModel
     */
    public function setAttributionModel($attributionModel)
    {
        $this->attributionModel = $attributionModel;
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
     * @return mixed
     */
    public function getClickId()
    {
        return $this->clickId;
    }

    /**
     * @param $clickId
     */
    public function setClickId($clickId)
    {
        $this->clickId = $clickId;
    }

    /**
     * @return mixed
     */
    public function getConversionId()
    {
        return $this->conversionId;
    }

    /**
     * @param $conversionId
     */
    public function setConversionId($conversionId)
    {
        $this->conversionId = $conversionId;
    }

    /**
     * @return mixed
     */
    public function getConversionModifiedTimestamp()
    {
        return $this->conversionModifiedTimestamp;
    }

    /**
     * @param $conversionModifiedTimestamp
     */
    public function setConversionModifiedTimestamp($conversionModifiedTimestamp)
    {
        $this->conversionModifiedTimestamp = $conversionModifiedTimestamp;
    }

    /**
     * @return mixed
     */
    public function getConversionTimestamp()
    {
        return $this->conversionTimestamp;
    }

    /**
     * @param $conversionTimestamp
     */
    public function setConversionTimestamp($conversionTimestamp)
    {
        $this->conversionTimestamp = $conversionTimestamp;
    }

    /**
     * @return mixed
     */
    public function getCountMillis()
    {
        return $this->countMillis;
    }

    /**
     * @param $countMillis
     */
    public function setCountMillis($countMillis)
    {
        $this->countMillis = $countMillis;
    }

    /**
     * @return mixed
     */
    public function getCriterionId()
    {
        return $this->criterionId;
    }

    /**
     * @param $criterionId
     */
    public function setCriterionId($criterionId)
    {
        $this->criterionId = $criterionId;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param $currencyCode
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @param $customDimension
     */
    public function setCustomDimension($customDimension)
    {
        $this->customDimension = $customDimension;
    }

    /**
     * @return mixed
     */
    public function getCustomDimension()
    {
        return $this->customDimension;
    }

    /**
     * @param $customMetric
     */
    public function setCustomMetric($customMetric)
    {
        $this->customMetric = $customMetric;
    }

    /**
     * @return mixed
     */
    public function getCustomMetric()
    {
        return $this->customMetric;
    }

    /**
     * @return mixed
     */
    public function getDsConversionId()
    {
        return $this->dsConversionId;
    }

    /**
     * @param $dsConversionId
     */
    public function setDsConversionId($dsConversionId)
    {
        $this->dsConversionId = $dsConversionId;
    }

    /**
     * @return mixed
     */
    public function getEngineAccountId()
    {
        return $this->engineAccountId;
    }

    /**
     * @param $engineAccountId
     */
    public function setEngineAccountId($engineAccountId)
    {
        $this->engineAccountId = $engineAccountId;
    }

    /**
     * @return mixed
     */
    public function getFloodlightOrderId()
    {
        return $this->floodlightOrderId;
    }

    /**
     * @param $floodlightOrderId
     */
    public function setFloodlightOrderId($floodlightOrderId)
    {
        $this->floodlightOrderId = $floodlightOrderId;
    }

    /**
     * @return mixed
     */
    public function getQuantityMillis()
    {
        return $this->quantityMillis;
    }

    /**
     * @param $quantityMillis
     */
    public function setQuantityMillis($quantityMillis)
    {
        $this->quantityMillis = $quantityMillis;
    }

    /**
     * @return mixed
     */
    public function getRevenueMicros()
    {
        return $this->revenueMicros;
    }

    /**
     * @param $revenueMicros
     */
    public function setRevenueMicros($revenueMicros)
    {
        $this->revenueMicros = $revenueMicros;
    }

    /**
     * @return mixed
     */
    public function getSegmentationId()
    {
        return $this->segmentationId;
    }

    /**
     * @param $segmentationId
     */
    public function setSegmentationId($segmentationId)
    {
        $this->segmentationId = $segmentationId;
    }

    /**
     * @return mixed
     */
    public function getSegmentationName()
    {
        return $this->segmentationName;
    }

    /**
     * @param $segmentationName
     */
    public function setSegmentationName($segmentationName)
    {
        $this->segmentationName = $segmentationName;
    }

    /**
     * @return mixed
     */
    public function getSegmentationType()
    {
        return $this->segmentationType;
    }

    /**
     * @param $segmentationType
     */
    public function setSegmentationType($segmentationType)
    {
        $this->segmentationType = $segmentationType;
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
 * Class Google_Service_Doubleclicksearch_ConversionList
 */
class Google_Service_Doubleclicksearch_ConversionList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'conversion';
    protected $internal_gapi_mappings = [];
    protected $conversionType = 'Google_Service_Doubleclicksearch_Conversion';
    protected $conversionDataType = 'array';

    /**
     * @param $conversion
     */
    public function setConversion($conversion)
    {
        $this->conversion = $conversion;
    }

    /**
     * @return mixed
     */
    public function getConversion()
    {
        return $this->conversion;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
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
 * Class Google_Service_Doubleclicksearch_CustomDimension
 */
class Google_Service_Doubleclicksearch_CustomDimension extends Google_Model
{
    public $name;
    public $value;
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
 * Class Google_Service_Doubleclicksearch_CustomMetric
 */
class Google_Service_Doubleclicksearch_CustomMetric extends Google_Model
{
    public $name;
    public $value;
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
 * Class Google_Service_Doubleclicksearch_Report
 */
class Google_Service_Doubleclicksearch_Report extends Google_Collection
{
    public $id;
    public $isReportReady;
    public $kind;
    public $rowCount;
    public $rows;
    public $statisticsCurrencyCode;
    public $statisticsTimeZone;
    protected $collection_key = 'rows';
    protected $internal_gapi_mappings = [];
    protected $filesType = 'Google_Service_Doubleclicksearch_ReportFiles';
    protected $filesDataType = 'array';
    protected $requestType = 'Google_Service_Doubleclicksearch_ReportRequest';
    protected $requestDataType = '';

    /**
     * @param $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
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
    public function getIsReportReady()
    {
        return $this->isReportReady;
    }

    /**
     * @param $isReportReady
     */
    public function setIsReportReady($isReportReady)
    {
        $this->isReportReady = $isReportReady;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param Google_Service_Doubleclicksearch_ReportRequest $request
     */
    public function setRequest(Google_Service_Doubleclicksearch_ReportRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @param $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
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

    /**
     * @return mixed
     */
    public function getStatisticsCurrencyCode()
    {
        return $this->statisticsCurrencyCode;
    }

    /**
     * @param $statisticsCurrencyCode
     */
    public function setStatisticsCurrencyCode($statisticsCurrencyCode)
    {
        $this->statisticsCurrencyCode = $statisticsCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getStatisticsTimeZone()
    {
        return $this->statisticsTimeZone;
    }

    /**
     * @param $statisticsTimeZone
     */
    public function setStatisticsTimeZone($statisticsTimeZone)
    {
        $this->statisticsTimeZone = $statisticsTimeZone;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_ReportApiColumnSpec
 */
class Google_Service_Doubleclicksearch_ReportApiColumnSpec extends Google_Model
{
    public $columnName;
    public $customDimensionName;
    public $customMetricName;
    public $endDate;
    public $groupByColumn;
    public $headerText;
    public $platformSource;
    public $savedColumnName;
    public $startDate;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getColumnName()
    {
        return $this->columnName;
    }

    /**
     * @param $columnName
     */
    public function setColumnName($columnName)
    {
        $this->columnName = $columnName;
    }

    /**
     * @return mixed
     */
    public function getCustomDimensionName()
    {
        return $this->customDimensionName;
    }

    /**
     * @param $customDimensionName
     */
    public function setCustomDimensionName($customDimensionName)
    {
        $this->customDimensionName = $customDimensionName;
    }

    /**
     * @return mixed
     */
    public function getCustomMetricName()
    {
        return $this->customMetricName;
    }

    /**
     * @param $customMetricName
     */
    public function setCustomMetricName($customMetricName)
    {
        $this->customMetricName = $customMetricName;
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
    public function getGroupByColumn()
    {
        return $this->groupByColumn;
    }

    /**
     * @param $groupByColumn
     */
    public function setGroupByColumn($groupByColumn)
    {
        $this->groupByColumn = $groupByColumn;
    }

    /**
     * @return mixed
     */
    public function getHeaderText()
    {
        return $this->headerText;
    }

    /**
     * @param $headerText
     */
    public function setHeaderText($headerText)
    {
        $this->headerText = $headerText;
    }

    /**
     * @return mixed
     */
    public function getPlatformSource()
    {
        return $this->platformSource;
    }

    /**
     * @param $platformSource
     */
    public function setPlatformSource($platformSource)
    {
        $this->platformSource = $platformSource;
    }

    /**
     * @return mixed
     */
    public function getSavedColumnName()
    {
        return $this->savedColumnName;
    }

    /**
     * @param $savedColumnName
     */
    public function setSavedColumnName($savedColumnName)
    {
        $this->savedColumnName = $savedColumnName;
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
 * Class Google_Service_Doubleclicksearch_ReportFiles
 */
class Google_Service_Doubleclicksearch_ReportFiles extends Google_Model
{
    public $byteCount;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getByteCount()
    {
        return $this->byteCount;
    }

    /**
     * @param $byteCount
     */
    public function setByteCount($byteCount)
    {
        $this->byteCount = $byteCount;
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
 * Class Google_Service_Doubleclicksearch_ReportRequest
 */
class Google_Service_Doubleclicksearch_ReportRequest extends Google_Collection
{
    public $downloadFormat;
    public $includeDeletedEntities;
    public $includeRemovedEntities;
    public $maxRowsPerFile;
    public $reportType;
    public $rowCount;
    public $startRow;
    public $statisticsCurrency;
    public $verifySingleTimeZone;
    protected $collection_key = 'orderBy';
    protected $internal_gapi_mappings = [];
    protected $columnsType = 'Google_Service_Doubleclicksearch_ReportApiColumnSpec';
    protected $columnsDataType = 'array';
    protected $filtersType = 'Google_Service_Doubleclicksearch_ReportRequestFilters';
    protected $filtersDataType = 'array';
    protected $orderByType = 'Google_Service_Doubleclicksearch_ReportRequestOrderBy';
    protected $orderByDataType = 'array';
    protected $reportScopeType = 'Google_Service_Doubleclicksearch_ReportRequestReportScope';
    protected $reportScopeDataType = '';
    protected $timeRangeType = 'Google_Service_Doubleclicksearch_ReportRequestTimeRange';
    protected $timeRangeDataType = '';

    /**
     * @param $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return mixed
     */
    public function getDownloadFormat()
    {
        return $this->downloadFormat;
    }

    /**
     * @param $downloadFormat
     */
    public function setDownloadFormat($downloadFormat)
    {
        $this->downloadFormat = $downloadFormat;
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
    public function getIncludeDeletedEntities()
    {
        return $this->includeDeletedEntities;
    }

    /**
     * @param $includeDeletedEntities
     */
    public function setIncludeDeletedEntities($includeDeletedEntities)
    {
        $this->includeDeletedEntities = $includeDeletedEntities;
    }

    /**
     * @return mixed
     */
    public function getIncludeRemovedEntities()
    {
        return $this->includeRemovedEntities;
    }

    /**
     * @param $includeRemovedEntities
     */
    public function setIncludeRemovedEntities($includeRemovedEntities)
    {
        $this->includeRemovedEntities = $includeRemovedEntities;
    }

    /**
     * @return mixed
     */
    public function getMaxRowsPerFile()
    {
        return $this->maxRowsPerFile;
    }

    /**
     * @param $maxRowsPerFile
     */
    public function setMaxRowsPerFile($maxRowsPerFile)
    {
        $this->maxRowsPerFile = $maxRowsPerFile;
    }

    /**
     * @param $orderBy
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param Google_Service_Doubleclicksearch_ReportRequestReportScope $reportScope
     */
    public function setReportScope(Google_Service_Doubleclicksearch_ReportRequestReportScope $reportScope)
    {
        $this->reportScope = $reportScope;
    }

    /**
     * @return mixed
     */
    public function getReportScope()
    {
        return $this->reportScope;
    }

    /**
     * @return mixed
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * @param $reportType
     */
    public function setReportType($reportType)
    {
        $this->reportType = $reportType;
    }

    /**
     * @return mixed
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @param $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

    /**
     * @return mixed
     */
    public function getStartRow()
    {
        return $this->startRow;
    }

    /**
     * @param $startRow
     */
    public function setStartRow($startRow)
    {
        $this->startRow = $startRow;
    }

    /**
     * @return mixed
     */
    public function getStatisticsCurrency()
    {
        return $this->statisticsCurrency;
    }

    /**
     * @param $statisticsCurrency
     */
    public function setStatisticsCurrency($statisticsCurrency)
    {
        $this->statisticsCurrency = $statisticsCurrency;
    }

    /**
     * @param Google_Service_Doubleclicksearch_ReportRequestTimeRange $timeRange
     */
    public function setTimeRange(Google_Service_Doubleclicksearch_ReportRequestTimeRange $timeRange)
    {
        $this->timeRange = $timeRange;
    }

    /**
     * @return mixed
     */
    public function getTimeRange()
    {
        return $this->timeRange;
    }

    /**
     * @return mixed
     */
    public function getVerifySingleTimeZone()
    {
        return $this->verifySingleTimeZone;
    }

    /**
     * @param $verifySingleTimeZone
     */
    public function setVerifySingleTimeZone($verifySingleTimeZone)
    {
        $this->verifySingleTimeZone = $verifySingleTimeZone;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_ReportRequestFilters
 */
class Google_Service_Doubleclicksearch_ReportRequestFilters extends Google_Collection
{
    public $operator;
    public $values;
    protected $collection_key = 'values';
    protected $internal_gapi_mappings = [];
    protected $columnType = 'Google_Service_Doubleclicksearch_ReportApiColumnSpec';
    protected $columnDataType = '';

    /**
     * @param Google_Service_Doubleclicksearch_ReportApiColumnSpec $column
     */
    public function setColumn(Google_Service_Doubleclicksearch_ReportApiColumnSpec $column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
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
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_ReportRequestOrderBy
 */
class Google_Service_Doubleclicksearch_ReportRequestOrderBy extends Google_Model
{
    public $sortOrder;
    protected $internal_gapi_mappings = [];
    protected $columnType = 'Google_Service_Doubleclicksearch_ReportApiColumnSpec';
    protected $columnDataType = '';

    /**
     * @param Google_Service_Doubleclicksearch_ReportApiColumnSpec $column
     */
    public function setColumn(Google_Service_Doubleclicksearch_ReportApiColumnSpec $column)
    {
        $this->column = $column;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
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
 * Class Google_Service_Doubleclicksearch_ReportRequestReportScope
 */
class Google_Service_Doubleclicksearch_ReportRequestReportScope extends Google_Model
{
    public $adGroupId;
    public $adId;
    public $advertiserId;
    public $agencyId;
    public $campaignId;
    public $engineAccountId;
    public $keywordId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdGroupId()
    {
        return $this->adGroupId;
    }

    /**
     * @param $adGroupId
     */
    public function setAdGroupId($adGroupId)
    {
        $this->adGroupId = $adGroupId;
    }

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
    public function getAgencyId()
    {
        return $this->agencyId;
    }

    /**
     * @param $agencyId
     */
    public function setAgencyId($agencyId)
    {
        $this->agencyId = $agencyId;
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
     * @return mixed
     */
    public function getEngineAccountId()
    {
        return $this->engineAccountId;
    }

    /**
     * @param $engineAccountId
     */
    public function setEngineAccountId($engineAccountId)
    {
        $this->engineAccountId = $engineAccountId;
    }

    /**
     * @return mixed
     */
    public function getKeywordId()
    {
        return $this->keywordId;
    }

    /**
     * @param $keywordId
     */
    public function setKeywordId($keywordId)
    {
        $this->keywordId = $keywordId;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_ReportRequestTimeRange
 */
class Google_Service_Doubleclicksearch_ReportRequestTimeRange extends Google_Model
{
    public $changedAttributesSinceTimestamp;
    public $changedMetricsSinceTimestamp;
    public $endDate;
    public $startDate;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChangedAttributesSinceTimestamp()
    {
        return $this->changedAttributesSinceTimestamp;
    }

    /**
     * @param $changedAttributesSinceTimestamp
     */
    public function setChangedAttributesSinceTimestamp($changedAttributesSinceTimestamp)
    {
        $this->changedAttributesSinceTimestamp = $changedAttributesSinceTimestamp;
    }

    /**
     * @return mixed
     */
    public function getChangedMetricsSinceTimestamp()
    {
        return $this->changedMetricsSinceTimestamp;
    }

    /**
     * @param $changedMetricsSinceTimestamp
     */
    public function setChangedMetricsSinceTimestamp($changedMetricsSinceTimestamp)
    {
        $this->changedMetricsSinceTimestamp = $changedMetricsSinceTimestamp;
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
 * Class Google_Service_Doubleclicksearch_ReportRow
 */
class Google_Service_Doubleclicksearch_ReportRow extends Google_Model
{
}

/**
 * Class Google_Service_Doubleclicksearch_SavedColumn
 */
class Google_Service_Doubleclicksearch_SavedColumn extends Google_Model
{
    public $kind;
    public $savedColumnName;
    public $type;
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
    public function getSavedColumnName()
    {
        return $this->savedColumnName;
    }

    /**
     * @param $savedColumnName
     */
    public function setSavedColumnName($savedColumnName)
    {
        $this->savedColumnName = $savedColumnName;
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
 * Class Google_Service_Doubleclicksearch_SavedColumnList
 */
class Google_Service_Doubleclicksearch_SavedColumnList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Doubleclicksearch_SavedColumn';
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
 * Class Google_Service_Doubleclicksearch_UpdateAvailabilityRequest
 */
class Google_Service_Doubleclicksearch_UpdateAvailabilityRequest extends Google_Collection
{
    protected $collection_key = 'availabilities';
    protected $internal_gapi_mappings = [];
    protected $availabilitiesType = 'Google_Service_Doubleclicksearch_Availability';
    protected $availabilitiesDataType = 'array';


    /**
     * @param $availabilities
     */
    public function setAvailabilities($availabilities)
    {
        $this->availabilities = $availabilities;
    }

    /**
     * @return mixed
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }
}

/**
 * Class Google_Service_Doubleclicksearch_UpdateAvailabilityResponse
 */
class Google_Service_Doubleclicksearch_UpdateAvailabilityResponse extends Google_Collection
{
    protected $collection_key = 'availabilities';
    protected $internal_gapi_mappings = [];
    protected $availabilitiesType = 'Google_Service_Doubleclicksearch_Availability';
    protected $availabilitiesDataType = 'array';


    /**
     * @param $availabilities
     */
    public function setAvailabilities($availabilities)
    {
        $this->availabilities = $availabilities;
    }

    /**
     * @return mixed
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }
}
