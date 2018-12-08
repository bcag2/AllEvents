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
 * Service definition for Urlshortener (v1).
 *
 * <p>
 * Lets you create, inspect, and manage goo.gl short URLs</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/url-shortener/v1/getting_started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Urlshortener extends Google_Service
{
    /** Manage your goo.gl short URLs. */
    const URLSHORTENER =
        "https://www.googleapis.com/auth/urlshortener";

    public $url;


    /**
     * Constructs the internal representation of the Urlshortener service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'urlshortener/v1/';
        $this->version = 'v1';
        $this->serviceName = 'urlshortener';

        $this->url = new Google_Service_Urlshortener_Url_Resource(
            $this,
            $this->serviceName,
            'url',
            [
                'methods' => [
                    'get' => [
                        'path' => 'url',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'shortUrl' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'projection' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'url',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'url/history',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'start-token' => [
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
    }
}


/**
 * The "url" collection of methods.
 * Typical usage is:
 *  <code>
 *   $urlshortenerService = new Google_Service_Urlshortener(...);
 *   $url = $urlshortenerService->url;
 *  </code>
 */
class Google_Service_Urlshortener_Url_Resource extends Google_Service_Resource
{

    /**
     * Expands a short URL or gets creation time and analytics. (url.get)
     *
     * @param string $shortUrl The short URL, including the protocol.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string projection Additional information to return.
     */
    public function get($shortUrl, $optParams = [])
    {
        $params = ['shortUrl' => $shortUrl];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Urlshortener_Url");
    }

    /**
     * Creates a new short URL. (url.insert)
     *
     * @param Google_Service_Urlshortener_Url|Google_Url $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Urlshortener_Url $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Urlshortener_Url");
    }

    /**
     * Retrieves a list of URLs shortened by a user. (url.listUrl)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string start-token Token for requesting successive pages of
     * results.
     * @opt_param string projection Additional information to return.
     */
    public function listUrl($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Urlshortener_UrlHistory");
    }
}


/**
 * Class Google_Service_Urlshortener_AnalyticsSnapshot
 */
class Google_Service_Urlshortener_AnalyticsSnapshot extends Google_Collection
{
    public $longUrlClicks;
    public $shortUrlClicks;
    protected $collection_key = 'referrers';
    protected $internal_gapi_mappings = [];
    protected $browsersType = 'Google_Service_Urlshortener_StringCount';
    protected $browsersDataType = 'array';
    protected $countriesType = 'Google_Service_Urlshortener_StringCount';
    protected $countriesDataType = 'array';
    protected $platformsType = 'Google_Service_Urlshortener_StringCount';
    protected $platformsDataType = 'array';
    protected $referrersType = 'Google_Service_Urlshortener_StringCount';
    protected $referrersDataType = 'array';

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
    public function getLongUrlClicks()
    {
        return $this->longUrlClicks;
    }

    /**
     * @param $longUrlClicks
     */
    public function setLongUrlClicks($longUrlClicks)
    {
        $this->longUrlClicks = $longUrlClicks;
    }

    /**
     * @param $platforms
     */
    public function setPlatforms($platforms)
    {
        $this->platforms = $platforms;
    }

    /**
     * @return mixed
     */
    public function getPlatforms()
    {
        return $this->platforms;
    }

    /**
     * @param $referrers
     */
    public function setReferrers($referrers)
    {
        $this->referrers = $referrers;
    }

    /**
     * @return mixed
     */
    public function getReferrers()
    {
        return $this->referrers;
    }

    /**
     * @return mixed
     */
    public function getShortUrlClicks()
    {
        return $this->shortUrlClicks;
    }

    /**
     * @param $shortUrlClicks
     */
    public function setShortUrlClicks($shortUrlClicks)
    {
        $this->shortUrlClicks = $shortUrlClicks;
    }
}

/**
 * Class Google_Service_Urlshortener_AnalyticsSummary
 */
class Google_Service_Urlshortener_AnalyticsSummary extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $allTimeType = 'Google_Service_Urlshortener_AnalyticsSnapshot';
    protected $allTimeDataType = '';
    protected $dayType = 'Google_Service_Urlshortener_AnalyticsSnapshot';
    protected $dayDataType = '';
    protected $monthType = 'Google_Service_Urlshortener_AnalyticsSnapshot';
    protected $monthDataType = '';
    protected $twoHoursType = 'Google_Service_Urlshortener_AnalyticsSnapshot';
    protected $twoHoursDataType = '';
    protected $weekType = 'Google_Service_Urlshortener_AnalyticsSnapshot';
    protected $weekDataType = '';


    /**
     * @param Google_Service_Urlshortener_AnalyticsSnapshot $allTime
     */
    public function setAllTime(Google_Service_Urlshortener_AnalyticsSnapshot $allTime)
    {
        $this->allTime = $allTime;
    }

    /**
     * @return mixed
     */
    public function getAllTime()
    {
        return $this->allTime;
    }

    /**
     * @param Google_Service_Urlshortener_AnalyticsSnapshot $day
     */
    public function setDay(Google_Service_Urlshortener_AnalyticsSnapshot $day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param Google_Service_Urlshortener_AnalyticsSnapshot $month
     */
    public function setMonth(Google_Service_Urlshortener_AnalyticsSnapshot $month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param Google_Service_Urlshortener_AnalyticsSnapshot $twoHours
     */
    public function setTwoHours(Google_Service_Urlshortener_AnalyticsSnapshot $twoHours)
    {
        $this->twoHours = $twoHours;
    }

    /**
     * @return mixed
     */
    public function getTwoHours()
    {
        return $this->twoHours;
    }

    /**
     * @param Google_Service_Urlshortener_AnalyticsSnapshot $week
     */
    public function setWeek(Google_Service_Urlshortener_AnalyticsSnapshot $week)
    {
        $this->week = $week;
    }

    /**
     * @return mixed
     */
    public function getWeek()
    {
        return $this->week;
    }
}

/**
 * Class Google_Service_Urlshortener_StringCount
 */
class Google_Service_Urlshortener_StringCount extends Google_Model
{
    public $count;
    public $id;
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
 * Class Google_Service_Urlshortener_Url
 */
class Google_Service_Urlshortener_Url extends Google_Model
{
    public $created;
    public $id;
    public $kind;
    public $longUrl;
    public $status;
    protected $internal_gapi_mappings = [];
    protected $analyticsType = 'Google_Service_Urlshortener_AnalyticsSummary';
    protected $analyticsDataType = '';

    /**
     * @param Google_Service_Urlshortener_AnalyticsSummary $analytics
     */
    public function setAnalytics(Google_Service_Urlshortener_AnalyticsSummary $analytics)
    {
        $this->analytics = $analytics;
    }

    /**
     * @return mixed
     */
    public function getAnalytics()
    {
        return $this->analytics;
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
    public function getLongUrl()
    {
        return $this->longUrl;
    }

    /**
     * @param $longUrl
     */
    public function setLongUrl($longUrl)
    {
        $this->longUrl = $longUrl;
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
 * Class Google_Service_Urlshortener_UrlHistory
 */
class Google_Service_Urlshortener_UrlHistory extends Google_Collection
{
    public $itemsPerPage;
    public $kind;
    public $nextPageToken;
    public $totalItems;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Urlshortener_Url';
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
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param $itemsPerPage
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
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
