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
 * Service definition for Pagespeedonline (v2).
 *
 * <p>
 * Lets you analyze the performance of a web page and get tailored suggestions
 * to make that page faster.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/speed/docs/insights/v2/getting-started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Pagespeedonline extends Google_Service
{


    public $pagespeedapi;


    /**
     * Constructs the internal representation of the Pagespeedonline service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'pagespeedonline/v2/';
        $this->version = 'v2';
        $this->serviceName = 'pagespeedonline';

        $this->pagespeedapi = new Google_Service_Pagespeedonline_Pagespeedapi_Resource(
            $this,
            $this->serviceName,
            'pagespeedapi',
            [
                'methods' => [
                    'runpagespeed' => [
                        'path' => 'runPagespeed',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'url' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'screenshot' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'locale' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'rule' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'strategy' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filter_third_party_resources' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "pagespeedapi" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pagespeedonlineService = new Google_Service_Pagespeedonline(...);
 *   $pagespeedapi = $pagespeedonlineService->pagespeedapi;
 *  </code>
 */
class Google_Service_Pagespeedonline_Pagespeedapi_Resource extends Google_Service_Resource
{

    /**
     * Runs PageSpeed analysis on the page at the specified URL, and returns
     * PageSpeed scores, a list of suggestions to make that page faster, and other
     * information. (pagespeedapi.runpagespeed)
     *
     * @param string $url The URL to fetch and analyze
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool screenshot Indicates if binary data containing a screenshot
     * should be included
     * @opt_param string locale The locale used to localize formatted results
     * @opt_param string rule A PageSpeed rule to run; if none are given, all rules
     * are run
     * @opt_param string strategy The analysis strategy to use
     * @opt_param bool filter_third_party_resources Indicates if third party
     * resources should be filtered out before PageSpeed analysis.
     */
    public function runpagespeed($url, $optParams = [])
    {
        $params = ['url' => $url];
        $params = array_merge($params, $optParams);

        return $this->call('runpagespeed', [$params], "Google_Service_Pagespeedonline_Result");
    }
}


/**
 * Class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2
 */
class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 extends Google_Collection
{
    public $format;
    protected $collection_key = 'args';
    protected $internal_gapi_mappings = [];
    protected $argsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2Args';
    protected $argsDataType = 'array';

    /**
     * @param $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    /**
     * @return mixed
     */
    public function getArgs()
    {
        return $this->args;
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
 * Class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2Args
 */
class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2Args extends Google_Collection
{
    public $key;
    public $type;
    public $value;
    protected $collection_key = 'secondary_rects';
    protected $internal_gapi_mappings = [
        "secondaryRects" => "secondary_rects",
    ];
    protected $rectsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects';
    protected $rectsDataType = 'array';
    protected $secondaryRectsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects';
    protected $secondaryRectsDataType = 'array';

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
     * @param $rects
     */
    public function setRects($rects)
    {
        $this->rects = $rects;
    }

    /**
     * @return mixed
     */
    public function getRects()
    {
        return $this->rects;
    }

    /**
     * @param $secondaryRects
     */
    public function setSecondaryRects($secondaryRects)
    {
        $this->secondaryRects = $secondaryRects;
    }

    /**
     * @return mixed
     */
    public function getSecondaryRects()
    {
        return $this->secondaryRects;
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
 * Class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects
 */
class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsRects extends Google_Model
{
    public $height;
    public $left;
    public $top;
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
 * Class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects
 */
class Google_Service_Pagespeedonline_PagespeedApiFormatStringV2ArgsSecondaryRects extends Google_Model
{
    public $height;
    public $left;
    public $top;
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
 * Class Google_Service_Pagespeedonline_PagespeedApiImageV2
 */
class Google_Service_Pagespeedonline_PagespeedApiImageV2 extends Google_Model
{
    public $data;
    public $height;
    public $key;
    public $mimeType;
    public $width;
    protected $internal_gapi_mappings = [
        "mimeType" => "mime_type",
        "pageRect" => "page_rect",
    ];
    protected $pageRectType = 'Google_Service_Pagespeedonline_PagespeedApiImageV2PageRect';
    protected $pageRectDataType = '';

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
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
     * @param Google_Service_Pagespeedonline_PagespeedApiImageV2PageRect $pageRect
     */
    public function setPageRect(Google_Service_Pagespeedonline_PagespeedApiImageV2PageRect $pageRect)
    {
        $this->pageRect = $pageRect;
    }

    /**
     * @return mixed
     */
    public function getPageRect()
    {
        return $this->pageRect;
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
 * Class Google_Service_Pagespeedonline_PagespeedApiImageV2PageRect
 */
class Google_Service_Pagespeedonline_PagespeedApiImageV2PageRect extends Google_Model
{
    public $height;
    public $left;
    public $top;
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
 * Class Google_Service_Pagespeedonline_Result
 */
class Google_Service_Pagespeedonline_Result extends Google_Collection
{
    public $id;
    public $invalidRules;
    public $kind;
    public $responseCode;
    public $title;
    protected $collection_key = 'invalidRules';
    protected $internal_gapi_mappings = [];
    protected $formattedResultsType = 'Google_Service_Pagespeedonline_ResultFormattedResults';
    protected $formattedResultsDataType = '';
    protected $pageStatsType = 'Google_Service_Pagespeedonline_ResultPageStats';
    protected $pageStatsDataType = '';
    protected $ruleGroupsType = 'Google_Service_Pagespeedonline_ResultRuleGroupsElement';
    protected $ruleGroupsDataType = 'map';
    protected $screenshotType = 'Google_Service_Pagespeedonline_PagespeedApiImageV2';
    protected $screenshotDataType = '';
    protected $versionType = 'Google_Service_Pagespeedonline_ResultVersion';
    protected $versionDataType = '';


    /**
     * @param Google_Service_Pagespeedonline_ResultFormattedResults $formattedResults
     */
    public function setFormattedResults(Google_Service_Pagespeedonline_ResultFormattedResults $formattedResults)
    {
        $this->formattedResults = $formattedResults;
    }

    /**
     * @return mixed
     */
    public function getFormattedResults()
    {
        return $this->formattedResults;
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
    public function getInvalidRules()
    {
        return $this->invalidRules;
    }

    /**
     * @param $invalidRules
     */
    public function setInvalidRules($invalidRules)
    {
        $this->invalidRules = $invalidRules;
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
     * @param Google_Service_Pagespeedonline_ResultPageStats $pageStats
     */
    public function setPageStats(Google_Service_Pagespeedonline_ResultPageStats $pageStats)
    {
        $this->pageStats = $pageStats;
    }

    /**
     * @return mixed
     */
    public function getPageStats()
    {
        return $this->pageStats;
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
     * @param $ruleGroups
     */
    public function setRuleGroups($ruleGroups)
    {
        $this->ruleGroups = $ruleGroups;
    }

    /**
     * @return mixed
     */
    public function getRuleGroups()
    {
        return $this->ruleGroups;
    }

    /**
     * @param Google_Service_Pagespeedonline_PagespeedApiImageV2 $screenshot
     */
    public function setScreenshot(Google_Service_Pagespeedonline_PagespeedApiImageV2 $screenshot)
    {
        $this->screenshot = $screenshot;
    }

    /**
     * @return mixed
     */
    public function getScreenshot()
    {
        return $this->screenshot;
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
     * @param Google_Service_Pagespeedonline_ResultVersion $version
     */
    public function setVersion(Google_Service_Pagespeedonline_ResultVersion $version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultFormattedResults
 */
class Google_Service_Pagespeedonline_ResultFormattedResults extends Google_Model
{
    public $locale;
    protected $internal_gapi_mappings = [];
    protected $ruleResultsType = 'Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElement';
    protected $ruleResultsDataType = 'map';

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
     * @param $ruleResults
     */
    public function setRuleResults($ruleResults)
    {
        $this->ruleResults = $ruleResults;
    }

    /**
     * @return mixed
     */
    public function getRuleResults()
    {
        return $this->ruleResults;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResults
 */
class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResults extends Google_Model
{
}

/**
 * Class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElement
 */
class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElement extends Google_Collection
{
    public $groups;
    public $localizedRuleName;
    public $ruleImpact;
    protected $collection_key = 'urlBlocks';
    protected $internal_gapi_mappings = [];
    protected $summaryType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
    protected $summaryDataType = '';
    protected $urlBlocksType = 'Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocks';
    protected $urlBlocksDataType = 'array';

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
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
    public function getLocalizedRuleName()
    {
        return $this->localizedRuleName;
    }

    /**
     * @param $localizedRuleName
     */
    public function setLocalizedRuleName($localizedRuleName)
    {
        $this->localizedRuleName = $localizedRuleName;
    }

    /**
     * @return mixed
     */
    public function getRuleImpact()
    {
        return $this->ruleImpact;
    }

    /**
     * @param $ruleImpact
     */
    public function setRuleImpact($ruleImpact)
    {
        $this->ruleImpact = $ruleImpact;
    }

    /**
     * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $summary
     */
    public function setSummary(Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param $urlBlocks
     */
    public function setUrlBlocks($urlBlocks)
    {
        $this->urlBlocks = $urlBlocks;
    }

    /**
     * @return mixed
     */
    public function getUrlBlocks()
    {
        return $this->urlBlocks;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocks
 */
class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocks extends Google_Collection
{
    protected $collection_key = 'urls';
    protected $internal_gapi_mappings = [];
    protected $headerType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
    protected $headerDataType = '';
    protected $urlsType = 'Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls';
    protected $urlsDataType = 'array';


    /**
     * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $header
     */
    public function setHeader(Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param $urls
     */
    public function setUrls($urls)
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
 * Class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls
 */
class Google_Service_Pagespeedonline_ResultFormattedResultsRuleResultsElementUrlBlocksUrls extends Google_Collection
{
    protected $collection_key = 'details';
    protected $internal_gapi_mappings = [];
    protected $detailsType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
    protected $detailsDataType = 'array';
    protected $resultType = 'Google_Service_Pagespeedonline_PagespeedApiFormatStringV2';
    protected $resultDataType = '';


    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $result
     */
    public function setResult(Google_Service_Pagespeedonline_PagespeedApiFormatStringV2 $result)
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultPageStats
 */
class Google_Service_Pagespeedonline_ResultPageStats extends Google_Model
{
    public $cssResponseBytes;
    public $flashResponseBytes;
    public $htmlResponseBytes;
    public $imageResponseBytes;
    public $javascriptResponseBytes;
    public $numberCssResources;
    public $numberHosts;
    public $numberJsResources;
    public $numberResources;
    public $numberStaticResources;
    public $otherResponseBytes;
    public $textResponseBytes;
    public $totalRequestBytes;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCssResponseBytes()
    {
        return $this->cssResponseBytes;
    }

    /**
     * @param $cssResponseBytes
     */
    public function setCssResponseBytes($cssResponseBytes)
    {
        $this->cssResponseBytes = $cssResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getFlashResponseBytes()
    {
        return $this->flashResponseBytes;
    }

    /**
     * @param $flashResponseBytes
     */
    public function setFlashResponseBytes($flashResponseBytes)
    {
        $this->flashResponseBytes = $flashResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getHtmlResponseBytes()
    {
        return $this->htmlResponseBytes;
    }

    /**
     * @param $htmlResponseBytes
     */
    public function setHtmlResponseBytes($htmlResponseBytes)
    {
        $this->htmlResponseBytes = $htmlResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getImageResponseBytes()
    {
        return $this->imageResponseBytes;
    }

    /**
     * @param $imageResponseBytes
     */
    public function setImageResponseBytes($imageResponseBytes)
    {
        $this->imageResponseBytes = $imageResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getJavascriptResponseBytes()
    {
        return $this->javascriptResponseBytes;
    }

    /**
     * @param $javascriptResponseBytes
     */
    public function setJavascriptResponseBytes($javascriptResponseBytes)
    {
        $this->javascriptResponseBytes = $javascriptResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getNumberCssResources()
    {
        return $this->numberCssResources;
    }

    /**
     * @param $numberCssResources
     */
    public function setNumberCssResources($numberCssResources)
    {
        $this->numberCssResources = $numberCssResources;
    }

    /**
     * @return mixed
     */
    public function getNumberHosts()
    {
        return $this->numberHosts;
    }

    /**
     * @param $numberHosts
     */
    public function setNumberHosts($numberHosts)
    {
        $this->numberHosts = $numberHosts;
    }

    /**
     * @return mixed
     */
    public function getNumberJsResources()
    {
        return $this->numberJsResources;
    }

    /**
     * @param $numberJsResources
     */
    public function setNumberJsResources($numberJsResources)
    {
        $this->numberJsResources = $numberJsResources;
    }

    /**
     * @return mixed
     */
    public function getNumberResources()
    {
        return $this->numberResources;
    }

    /**
     * @param $numberResources
     */
    public function setNumberResources($numberResources)
    {
        $this->numberResources = $numberResources;
    }

    /**
     * @return mixed
     */
    public function getNumberStaticResources()
    {
        return $this->numberStaticResources;
    }

    /**
     * @param $numberStaticResources
     */
    public function setNumberStaticResources($numberStaticResources)
    {
        $this->numberStaticResources = $numberStaticResources;
    }

    /**
     * @return mixed
     */
    public function getOtherResponseBytes()
    {
        return $this->otherResponseBytes;
    }

    /**
     * @param $otherResponseBytes
     */
    public function setOtherResponseBytes($otherResponseBytes)
    {
        $this->otherResponseBytes = $otherResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getTextResponseBytes()
    {
        return $this->textResponseBytes;
    }

    /**
     * @param $textResponseBytes
     */
    public function setTextResponseBytes($textResponseBytes)
    {
        $this->textResponseBytes = $textResponseBytes;
    }

    /**
     * @return mixed
     */
    public function getTotalRequestBytes()
    {
        return $this->totalRequestBytes;
    }

    /**
     * @param $totalRequestBytes
     */
    public function setTotalRequestBytes($totalRequestBytes)
    {
        $this->totalRequestBytes = $totalRequestBytes;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultRuleGroups
 */
class Google_Service_Pagespeedonline_ResultRuleGroups extends Google_Model
{
}

/**
 * Class Google_Service_Pagespeedonline_ResultRuleGroupsElement
 */
class Google_Service_Pagespeedonline_ResultRuleGroupsElement extends Google_Model
{
    public $score;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }
}

/**
 * Class Google_Service_Pagespeedonline_ResultVersion
 */
class Google_Service_Pagespeedonline_ResultVersion extends Google_Model
{
    public $major;
    public $minor;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * @param $major
     */
    public function setMajor($major)
    {
        $this->major = $major;
    }

    /**
     * @return mixed
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * @param $minor
     */
    public function setMinor($minor)
    {
        $this->minor = $minor;
    }
}
