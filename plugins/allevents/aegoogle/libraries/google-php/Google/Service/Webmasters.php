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
 * Service definition for Webmasters (v3).
 *
 * <p>
 * Lets you view Google Webmaster Tools data for your verified sites.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/webmaster-tools/v3/welcome" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Webmasters extends Google_Service
{
    /** View and modify Webmaster Tools data for your verified sites. */
    const WEBMASTERS =
        "https://www.googleapis.com/auth/webmasters";
    /** View Webmaster Tools data for your verified sites. */
    const WEBMASTERS_READONLY =
        "https://www.googleapis.com/auth/webmasters.readonly";

    public $sitemaps;
    public $sites;
    public $urlcrawlerrorscounts;
    public $urlcrawlerrorssamples;


    /**
     * Constructs the internal representation of the Webmasters service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'webmasters/v3/';
        $this->version = 'v3';
        $this->serviceName = 'webmasters';

        $this->sitemaps = new Google_Service_Webmasters_Sitemaps_Resource(
            $this,
            $this->serviceName,
            'sitemaps',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'feedpath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'feedpath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'sites/{siteUrl}/sitemaps',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sitemapIndex' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'submit' => [
                        'path' => 'sites/{siteUrl}/sitemaps/{feedpath}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'feedpath' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->sites = new Google_Service_Webmasters_Sites_Resource(
            $this,
            $this->serviceName,
            'sites',
            [
                'methods' => [
                    'add' => [
                        'path' => 'sites/{siteUrl}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'sites/{siteUrl}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'sites/{siteUrl}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'sites',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ],
                ]
            ]
        );
        $this->urlcrawlerrorscounts = new Google_Service_Webmasters_Urlcrawlerrorscounts_Resource(
            $this,
            $this->serviceName,
            'urlcrawlerrorscounts',
            [
                'methods' => [
                    'query' => [
                        'path' => 'sites/{siteUrl}/urlCrawlErrorsCounts/query',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'category' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'platform' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'latestCountsOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->urlcrawlerrorssamples = new Google_Service_Webmasters_Urlcrawlerrorssamples_Resource(
            $this,
            $this->serviceName,
            'urlcrawlerrorssamples',
            [
                'methods' => [
                    'get' => [
                        'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples/{url}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'url' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'category' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'platform' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'category' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'platform' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'markAsFixed' => [
                        'path' => 'sites/{siteUrl}/urlCrawlErrorsSamples/{url}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'siteUrl' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'url' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'category' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'platform' => [
                                'location' => 'query',
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
 * The "sitemaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $sitemaps = $webmastersService->sitemaps;
 *  </code>
 */
class Google_Service_Webmasters_Sitemaps_Resource extends Google_Service_Resource
{

    /**
     * Deletes a sitemap from this site. (sitemaps.delete)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $feedpath The URL of the actual sitemap (for example
     *                          http://www.example.com/sitemap.xml).
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($siteUrl, $feedpath, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'feedpath' => $feedpath];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves information about a specific sitemap. (sitemaps.get)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $feedpath The URL of the actual sitemap (for example
     *                          http://www.example.com/sitemap.xml).
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($siteUrl, $feedpath, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'feedpath' => $feedpath];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Webmasters_WmxSitemap");
    }

    /**
     * Lists sitemaps uploaded to the site. (sitemaps.listSitemaps)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sitemapIndex A URL of a site's sitemap index.
     */
    public function listSitemaps($siteUrl, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Webmasters_SitemapsListResponse");
    }

    /**
     * Submits a sitemap for a site. (sitemaps.submit)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $feedpath The URL of the sitemap to add.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function submit($siteUrl, $feedpath, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'feedpath' => $feedpath];
        $params = array_merge($params, $optParams);

        return $this->call('submit', [$params]);
    }
}

/**
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $sites = $webmastersService->sites;
 *  </code>
 */
class Google_Service_Webmasters_Sites_Resource extends Google_Service_Resource
{

    /**
     * Adds a site to the set of the user's sites in Webmaster Tools. (sites.add)
     *
     * @param string $siteUrl The URL of the site to add.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function add($siteUrl, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('add', [$params]);
    }

    /**
     * Removes a site from the set of the user's Webmaster Tools sites.
     * (sites.delete)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($siteUrl, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Retrieves information about specific site. (sites.get)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($siteUrl, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Webmasters_WmxSite");
    }

    /**
     * Lists your Webmaster Tools sites. (sites.listSites)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listSites($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Webmasters_SitesListResponse");
    }
}

/**
 * The "urlcrawlerrorscounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $urlcrawlerrorscounts = $webmastersService->urlcrawlerrorscounts;
 *  </code>
 */
class Google_Service_Webmasters_Urlcrawlerrorscounts_Resource extends Google_Service_Resource
{

    /**
     * Retrieves a time series of the number of URL crawl errors per error category
     * and platform. (urlcrawlerrorscounts.query)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string category The crawl error category, for example
     * 'serverError'. If not specified, we return results for all categories.
     * @opt_param string platform The user agent type (platform) that made the
     * request, for example 'web'. If not specified, we return results for all
     * platforms.
     * @opt_param bool latestCountsOnly If true, returns only the latest crawl error
     * counts.
     */
    public function query($siteUrl, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl];
        $params = array_merge($params, $optParams);

        return $this->call('query', [$params], "Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse");
    }
}

/**
 * The "urlcrawlerrorssamples" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webmastersService = new Google_Service_Webmasters(...);
 *   $urlcrawlerrorssamples = $webmastersService->urlcrawlerrorssamples;
 *  </code>
 */
class Google_Service_Webmasters_Urlcrawlerrorssamples_Resource extends Google_Service_Resource
{

    /**
     * Retrieves details about crawl errors for a site's sample URL.
     * (urlcrawlerrorssamples.get)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $url The relative path (without the site) of the sample URL;
     *                          must be one of the URLs returned by list
     * @param string $category The crawl error category, for example
     *                          'authPermissions'
     * @param string $platform The user agent type (platform) that made the request,
     *                          for example 'web'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($siteUrl, $url, $category, $platform, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Webmasters_UrlCrawlErrorsSample");
    }

    /**
     * Lists a site's sample URLs for the specified crawl error category and
     * platform. (urlcrawlerrorssamples.listUrlcrawlerrorssamples)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $category The crawl error category, for example
     *                          'authPermissions'
     * @param string $platform The user agent type (platform) that made the request,
     *                          for example 'web'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listUrlcrawlerrorssamples($siteUrl, $category, $platform, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'category' => $category, 'platform' => $platform];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse");
    }

    /**
     * Marks the provided site's sample URL as fixed, and removes it from the
     * samples list. (urlcrawlerrorssamples.markAsFixed)
     *
     * @param string $siteUrl The site's URL, including protocol, for example
     *                          'http://www.example.com/'
     * @param string $url The relative path (without the site) of the sample URL;
     *                          must be one of the URLs returned by list
     * @param string $category The crawl error category, for example
     *                          'authPermissions'
     * @param string $platform The user agent type (platform) that made the request,
     *                          for example 'web'
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function markAsFixed($siteUrl, $url, $category, $platform, $optParams = [])
    {
        $params = ['siteUrl' => $siteUrl, 'url' => $url, 'category' => $category, 'platform' => $platform];
        $params = array_merge($params, $optParams);

        return $this->call('markAsFixed', [$params]);
    }
}


/**
 * Class Google_Service_Webmasters_SitemapsListResponse
 */
class Google_Service_Webmasters_SitemapsListResponse extends Google_Collection
{
    protected $collection_key = 'sitemap';
    protected $internal_gapi_mappings = [];
    protected $sitemapType = 'Google_Service_Webmasters_WmxSitemap';
    protected $sitemapDataType = 'array';


    /**
     * @param $sitemap
     */
    public function setSitemap($sitemap)
    {
        $this->sitemap = $sitemap;
    }

    /**
     * @return mixed
     */
    public function getSitemap()
    {
        return $this->sitemap;
    }
}

/**
 * Class Google_Service_Webmasters_SitesListResponse
 */
class Google_Service_Webmasters_SitesListResponse extends Google_Collection
{
    protected $collection_key = 'siteEntry';
    protected $internal_gapi_mappings = [];
    protected $siteEntryType = 'Google_Service_Webmasters_WmxSite';
    protected $siteEntryDataType = 'array';


    /**
     * @param $siteEntry
     */
    public function setSiteEntry($siteEntry)
    {
        $this->siteEntry = $siteEntry;
    }

    /**
     * @return mixed
     */
    public function getSiteEntry()
    {
        return $this->siteEntry;
    }
}

/**
 * Class Google_Service_Webmasters_UrlCrawlErrorCount
 */
class Google_Service_Webmasters_UrlCrawlErrorCount extends Google_Model
{
    public $count;
    public $timestamp;
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
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
}

/**
 * Class Google_Service_Webmasters_UrlCrawlErrorCountsPerType
 */
class Google_Service_Webmasters_UrlCrawlErrorCountsPerType extends Google_Collection
{
    public $category;
    public $platform;
    protected $collection_key = 'entries';
    protected $internal_gapi_mappings = [];
    protected $entriesType = 'Google_Service_Webmasters_UrlCrawlErrorCount';
    protected $entriesDataType = 'array';

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
     * @param $entries
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return mixed
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return mixed
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }
}

/**
 * Class Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse
 */
class Google_Service_Webmasters_UrlCrawlErrorsCountsQueryResponse extends Google_Collection
{
    protected $collection_key = 'countPerTypes';
    protected $internal_gapi_mappings = [];
    protected $countPerTypesType = 'Google_Service_Webmasters_UrlCrawlErrorCountsPerType';
    protected $countPerTypesDataType = 'array';


    /**
     * @param $countPerTypes
     */
    public function setCountPerTypes($countPerTypes)
    {
        $this->countPerTypes = $countPerTypes;
    }

    /**
     * @return mixed
     */
    public function getCountPerTypes()
    {
        return $this->countPerTypes;
    }
}

/**
 * Class Google_Service_Webmasters_UrlCrawlErrorsSample
 */
class Google_Service_Webmasters_UrlCrawlErrorsSample extends Google_Model
{
    public $firstDetected;
    public $lastCrawled;
    public $pageUrl;
    public $responseCode;
    protected $internal_gapi_mappings = [
        "firstDetected" => "first_detected",
        "lastCrawled" => "last_crawled",
    ];
    protected $urlDetailsType = 'Google_Service_Webmasters_UrlSampleDetails';
    protected $urlDetailsDataType = '';

    /**
     * @return mixed
     */
    public function getFirstDetected()
    {
        return $this->firstDetected;
    }

    /**
     * @param $firstDetected
     */
    public function setFirstDetected($firstDetected)
    {
        $this->firstDetected = $firstDetected;
    }

    /**
     * @return mixed
     */
    public function getLastCrawled()
    {
        return $this->lastCrawled;
    }

    /**
     * @param $lastCrawled
     */
    public function setLastCrawled($lastCrawled)
    {
        $this->lastCrawled = $lastCrawled;
    }

    /**
     * @return mixed
     */
    public function getPageUrl()
    {
        return $this->pageUrl;
    }

    /**
     * @param $pageUrl
     */
    public function setPageUrl($pageUrl)
    {
        $this->pageUrl = $pageUrl;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @param $responseCode
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    /**
     * @param Google_Service_Webmasters_UrlSampleDetails $urlDetails
     */
    public function setUrlDetails(Google_Service_Webmasters_UrlSampleDetails $urlDetails)
    {
        $this->urlDetails = $urlDetails;
    }

    /**
     * @return mixed
     */
    public function getUrlDetails()
    {
        return $this->urlDetails;
    }
}

/**
 * Class Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse
 */
class Google_Service_Webmasters_UrlCrawlErrorsSamplesListResponse extends Google_Collection
{
    protected $collection_key = 'urlCrawlErrorSample';
    protected $internal_gapi_mappings = [];
    protected $urlCrawlErrorSampleType = 'Google_Service_Webmasters_UrlCrawlErrorsSample';
    protected $urlCrawlErrorSampleDataType = 'array';


    /**
     * @param $urlCrawlErrorSample
     */
    public function setUrlCrawlErrorSample($urlCrawlErrorSample)
    {
        $this->urlCrawlErrorSample = $urlCrawlErrorSample;
    }

    /**
     * @return mixed
     */
    public function getUrlCrawlErrorSample()
    {
        return $this->urlCrawlErrorSample;
    }
}

/**
 * Class Google_Service_Webmasters_UrlSampleDetails
 */
class Google_Service_Webmasters_UrlSampleDetails extends Google_Collection
{
    public $containingSitemaps;
    public $linkedFromUrls;
    protected $collection_key = 'linkedFromUrls';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContainingSitemaps()
    {
        return $this->containingSitemaps;
    }

    /**
     * @param $containingSitemaps
     */
    public function setContainingSitemaps($containingSitemaps)
    {
        $this->containingSitemaps = $containingSitemaps;
    }

    /**
     * @return mixed
     */
    public function getLinkedFromUrls()
    {
        return $this->linkedFromUrls;
    }

    /**
     * @param $linkedFromUrls
     */
    public function setLinkedFromUrls($linkedFromUrls)
    {
        $this->linkedFromUrls = $linkedFromUrls;
    }
}

/**
 * Class Google_Service_Webmasters_WmxSite
 */
class Google_Service_Webmasters_WmxSite extends Google_Model
{
    public $permissionLevel;
    public $siteUrl;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getPermissionLevel()
    {
        return $this->permissionLevel;
    }

    /**
     * @param $permissionLevel
     */
    public function setPermissionLevel($permissionLevel)
    {
        $this->permissionLevel = $permissionLevel;
    }

    /**
     * @return mixed
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * @param $siteUrl
     */
    public function setSiteUrl($siteUrl)
    {
        $this->siteUrl = $siteUrl;
    }
}

/**
 * Class Google_Service_Webmasters_WmxSitemap
 */
class Google_Service_Webmasters_WmxSitemap extends Google_Collection
{
    public $errors;
    public $isPending;
    public $isSitemapsIndex;
    public $lastDownloaded;
    public $lastSubmitted;
    public $path;
    public $type;
    public $warnings;
    protected $collection_key = 'contents';
    protected $internal_gapi_mappings = [];
    protected $contentsType = 'Google_Service_Webmasters_WmxSitemapContent';
    protected $contentsDataType = 'array';

    /**
     * @param $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
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
    public function getIsPending()
    {
        return $this->isPending;
    }

    /**
     * @param $isPending
     */
    public function setIsPending($isPending)
    {
        $this->isPending = $isPending;
    }

    /**
     * @return mixed
     */
    public function getIsSitemapsIndex()
    {
        return $this->isSitemapsIndex;
    }

    /**
     * @param $isSitemapsIndex
     */
    public function setIsSitemapsIndex($isSitemapsIndex)
    {
        $this->isSitemapsIndex = $isSitemapsIndex;
    }

    /**
     * @return mixed
     */
    public function getLastDownloaded()
    {
        return $this->lastDownloaded;
    }

    /**
     * @param $lastDownloaded
     */
    public function setLastDownloaded($lastDownloaded)
    {
        $this->lastDownloaded = $lastDownloaded;
    }

    /**
     * @return mixed
     */
    public function getLastSubmitted()
    {
        return $this->lastSubmitted;
    }

    /**
     * @param $lastSubmitted
     */
    public function setLastSubmitted($lastSubmitted)
    {
        $this->lastSubmitted = $lastSubmitted;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
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
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * @param $warnings
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;
    }
}

/**
 * Class Google_Service_Webmasters_WmxSitemapContent
 */
class Google_Service_Webmasters_WmxSitemapContent extends Google_Model
{
    public $indexed;
    public $submitted;
    public $type;
    protected $internal_gapi_mappings = [];

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
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * @param $submitted
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;
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
