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
 * Service definition for Customsearch (v1).
 *
 * <p>
 * Lets you search over a website or collection of websites</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/custom-search/v1/using_rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Customsearch extends Google_Service
{


    public $cse;


    /**
     * Constructs the internal representation of the Customsearch service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'customsearch/';
        $this->version = 'v1';
        $this->serviceName = 'customsearch';

        $this->cse = new Google_Service_Customsearch_Cse_Resource(
            $this,
            $this->serviceName,
            'cse',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v1',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'sort' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'orTerms' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'highRange' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'num' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'cr' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'imgType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'gl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'relatedSite' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'searchType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'fileType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'start' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'imgDominantColor' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lr' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'siteSearch' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'cref' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'dateRestrict' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'safe' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'c2coff' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'googlehost' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'hq' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'exactTerms' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'hl' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'lowRange' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'imgSize' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'imgColorType' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'rights' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'excludeTerms' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'linkSite' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'cx' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'siteSearchFilter' => [
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
 * The "cse" collection of methods.
 * Typical usage is:
 *  <code>
 *   $customsearchService = new Google_Service_Customsearch(...);
 *   $cse = $customsearchService->cse;
 *  </code>
 */
class Google_Service_Customsearch_Cse_Resource extends Google_Service_Resource
{

    /**
     * Returns metadata about the search performed, metadata about the custom search
     * engine used for the search, and the search results. (cse.listCse)
     *
     * @param string $q Query
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sort The sort expression to apply to the results
     * @opt_param string orTerms Provides additional search terms to check for in a
     * document, where each document in the search results must contain at least one
     * of the additional search terms
     * @opt_param string highRange Creates a range in form as_nlo value..as_nhi
     * value and attempts to append it to query
     * @opt_param string num Number of search results to return
     * @opt_param string cr Country restrict(s).
     * @opt_param string imgType Returns images of a type, which can be one of:
     * clipart, face, lineart, news, and photo.
     * @opt_param string gl Geolocation of end user.
     * @opt_param string relatedSite Specifies that all search results should be
     * pages that are related to the specified URL
     * @opt_param string searchType Specifies the search type: image.
     * @opt_param string fileType Returns images of a specified type. Some of the
     * allowed values are: bmp, gif, png, jpg, svg, pdf, ...
     * @opt_param string start The index of the first result to return
     * @opt_param string imgDominantColor Returns images of a specific dominant
     * color: yellow, green, teal, blue, purple, pink, white, gray, black and brown.
     * @opt_param string lr The language restriction for the search results
     * @opt_param string siteSearch Specifies all search results should be pages
     * from a given site
     * @opt_param string cref The URL of a linked custom search engine
     * @opt_param string dateRestrict Specifies all search results are from a time
     * period
     * @opt_param string safe Search safety level
     * @opt_param string c2coff Turns off the translation between zh-CN and zh-TW.
     * @opt_param string googlehost The local Google domain to use to perform the
     * search.
     * @opt_param string hq Appends the extra query terms to the query.
     * @opt_param string exactTerms Identifies a phrase that all documents in the
     * search results must contain
     * @opt_param string hl Sets the user interface language.
     * @opt_param string lowRange Creates a range in form as_nlo value..as_nhi value
     * and attempts to append it to query
     * @opt_param string imgSize Returns images of a specified size, where size can
     * be one of: icon, small, medium, large, xlarge, xxlarge, and huge.
     * @opt_param string imgColorType Returns black and white, grayscale, or color
     * images: mono, gray, and color.
     * @opt_param string rights Filters based on licensing. Supported values
     * include: cc_publicdomain, cc_attribute, cc_sharealike, cc_noncommercial,
     * cc_nonderived and combinations of these.
     * @opt_param string excludeTerms Identifies a word or phrase that should not
     * appear in any documents in the search results
     * @opt_param string filter Controls turning on or off the duplicate content
     * filter.
     * @opt_param string linkSite Specifies that all search results should contain a
     * link to a particular URL
     * @opt_param string cx The custom search engine ID to scope this search query
     * @opt_param string siteSearchFilter Controls whether to include or exclude
     * results from the site named in the as_sitesearch parameter
     */
    public function listCse($q, $optParams = [])
    {
        $params = ['q' => $q];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Customsearch_Search");
    }
}


/**
 * Class Google_Service_Customsearch_Context
 */
class Google_Service_Customsearch_Context extends Google_Collection
{
    public $title;
    protected $collection_key = 'facets';
    protected $internal_gapi_mappings = [];
    protected $facetsType = 'Google_Service_Customsearch_ContextFacets';
    protected $facetsDataType = 'array';

    /**
     * @param $facets
     */
    public function setFacets($facets)
    {
        $this->facets = $facets;
    }

    /**
     * @return mixed
     */
    public function getFacets()
    {
        return $this->facets;
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
 * Class Google_Service_Customsearch_ContextFacets
 */
class Google_Service_Customsearch_ContextFacets extends Google_Model
{
    public $anchor;
    public $label;
    public $labelWithOp;
    protected $internal_gapi_mappings = [
        "labelWithOp" => "label_with_op",
    ];

    /**
     * @return mixed
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * @param $anchor
     */
    public function setAnchor($anchor)
    {
        $this->anchor = $anchor;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabelWithOp()
    {
        return $this->labelWithOp;
    }

    /**
     * @param $labelWithOp
     */
    public function setLabelWithOp($labelWithOp)
    {
        $this->labelWithOp = $labelWithOp;
    }
}

/**
 * Class Google_Service_Customsearch_Promotion
 */
class Google_Service_Customsearch_Promotion extends Google_Collection
{
    public $displayLink;
    public $htmlTitle;
    public $link;
    public $title;
    protected $collection_key = 'bodyLines';
    protected $internal_gapi_mappings = [];
    protected $bodyLinesType = 'Google_Service_Customsearch_PromotionBodyLines';
    protected $bodyLinesDataType = 'array';
    protected $imageType = 'Google_Service_Customsearch_PromotionImage';
    protected $imageDataType = '';

    /**
     * @param $bodyLines
     */
    public function setBodyLines($bodyLines)
    {
        $this->bodyLines = $bodyLines;
    }

    /**
     * @return mixed
     */
    public function getBodyLines()
    {
        return $this->bodyLines;
    }

    /**
     * @return mixed
     */
    public function getDisplayLink()
    {
        return $this->displayLink;
    }

    /**
     * @param $displayLink
     */
    public function setDisplayLink($displayLink)
    {
        $this->displayLink = $displayLink;
    }

    /**
     * @return mixed
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @param Google_Service_Customsearch_PromotionImage $image
     */
    public function setImage(Google_Service_Customsearch_PromotionImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
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
 * Class Google_Service_Customsearch_PromotionBodyLines
 */
class Google_Service_Customsearch_PromotionBodyLines extends Google_Model
{
    public $htmlTitle;
    public $link;
    public $title;
    public $url;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
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
 * Class Google_Service_Customsearch_PromotionImage
 */
class Google_Service_Customsearch_PromotionImage extends Google_Model
{
    public $height;
    public $source;
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
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param $source
     */
    public function setSource($source)
    {
        $this->source = $source;
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
 * Class Google_Service_Customsearch_Query
 */
class Google_Service_Customsearch_Query extends Google_Model
{
    public $count;
    public $cr;
    public $cref;
    public $cx;
    public $dateRestrict;
    public $disableCnTwTranslation;
    public $exactTerms;
    public $excludeTerms;
    public $fileType;
    public $filter;
    public $gl;
    public $googleHost;
    public $highRange;
    public $hl;
    public $hq;
    public $imgColorType;
    public $imgDominantColor;
    public $imgSize;
    public $imgType;
    public $inputEncoding;
    public $language;
    public $linkSite;
    public $lowRange;
    public $orTerms;
    public $outputEncoding;
    public $relatedSite;
    public $rights;
    public $safe;
    public $searchTerms;
    public $searchType;
    public $siteSearch;
    public $siteSearchFilter;
    public $sort;
    public $startIndex;
    public $startPage;
    public $title;
    public $totalResults;
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
    public function getCr()
    {
        return $this->cr;
    }

    /**
     * @param $cr
     */
    public function setCr($cr)
    {
        $this->cr = $cr;
    }

    /**
     * @return mixed
     */
    public function getCref()
    {
        return $this->cref;
    }

    /**
     * @param $cref
     */
    public function setCref($cref)
    {
        $this->cref = $cref;
    }

    /**
     * @return mixed
     */
    public function getCx()
    {
        return $this->cx;
    }

    /**
     * @param $cx
     */
    public function setCx($cx)
    {
        $this->cx = $cx;
    }

    /**
     * @return mixed
     */
    public function getDateRestrict()
    {
        return $this->dateRestrict;
    }

    /**
     * @param $dateRestrict
     */
    public function setDateRestrict($dateRestrict)
    {
        $this->dateRestrict = $dateRestrict;
    }

    /**
     * @return mixed
     */
    public function getDisableCnTwTranslation()
    {
        return $this->disableCnTwTranslation;
    }

    /**
     * @param $disableCnTwTranslation
     */
    public function setDisableCnTwTranslation($disableCnTwTranslation)
    {
        $this->disableCnTwTranslation = $disableCnTwTranslation;
    }

    /**
     * @return mixed
     */
    public function getExactTerms()
    {
        return $this->exactTerms;
    }

    /**
     * @param $exactTerms
     */
    public function setExactTerms($exactTerms)
    {
        $this->exactTerms = $exactTerms;
    }

    /**
     * @return mixed
     */
    public function getExcludeTerms()
    {
        return $this->excludeTerms;
    }

    /**
     * @param $excludeTerms
     */
    public function setExcludeTerms($excludeTerms)
    {
        $this->excludeTerms = $excludeTerms;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return mixed
     */
    public function getGl()
    {
        return $this->gl;
    }

    /**
     * @param $gl
     */
    public function setGl($gl)
    {
        $this->gl = $gl;
    }

    /**
     * @return mixed
     */
    public function getGoogleHost()
    {
        return $this->googleHost;
    }

    /**
     * @param $googleHost
     */
    public function setGoogleHost($googleHost)
    {
        $this->googleHost = $googleHost;
    }

    /**
     * @return mixed
     */
    public function getHighRange()
    {
        return $this->highRange;
    }

    /**
     * @param $highRange
     */
    public function setHighRange($highRange)
    {
        $this->highRange = $highRange;
    }

    /**
     * @return mixed
     */
    public function getHl()
    {
        return $this->hl;
    }

    /**
     * @param $hl
     */
    public function setHl($hl)
    {
        $this->hl = $hl;
    }

    /**
     * @return mixed
     */
    public function getHq()
    {
        return $this->hq;
    }

    /**
     * @param $hq
     */
    public function setHq($hq)
    {
        $this->hq = $hq;
    }

    /**
     * @return mixed
     */
    public function getImgColorType()
    {
        return $this->imgColorType;
    }

    /**
     * @param $imgColorType
     */
    public function setImgColorType($imgColorType)
    {
        $this->imgColorType = $imgColorType;
    }

    /**
     * @return mixed
     */
    public function getImgDominantColor()
    {
        return $this->imgDominantColor;
    }

    /**
     * @param $imgDominantColor
     */
    public function setImgDominantColor($imgDominantColor)
    {
        $this->imgDominantColor = $imgDominantColor;
    }

    /**
     * @return mixed
     */
    public function getImgSize()
    {
        return $this->imgSize;
    }

    /**
     * @param $imgSize
     */
    public function setImgSize($imgSize)
    {
        $this->imgSize = $imgSize;
    }

    /**
     * @return mixed
     */
    public function getImgType()
    {
        return $this->imgType;
    }

    /**
     * @param $imgType
     */
    public function setImgType($imgType)
    {
        $this->imgType = $imgType;
    }

    /**
     * @return mixed
     */
    public function getInputEncoding()
    {
        return $this->inputEncoding;
    }

    /**
     * @param $inputEncoding
     */
    public function setInputEncoding($inputEncoding)
    {
        $this->inputEncoding = $inputEncoding;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLinkSite()
    {
        return $this->linkSite;
    }

    /**
     * @param $linkSite
     */
    public function setLinkSite($linkSite)
    {
        $this->linkSite = $linkSite;
    }

    /**
     * @return mixed
     */
    public function getLowRange()
    {
        return $this->lowRange;
    }

    /**
     * @param $lowRange
     */
    public function setLowRange($lowRange)
    {
        $this->lowRange = $lowRange;
    }

    /**
     * @return mixed
     */
    public function getOrTerms()
    {
        return $this->orTerms;
    }

    /**
     * @param $orTerms
     */
    public function setOrTerms($orTerms)
    {
        $this->orTerms = $orTerms;
    }

    /**
     * @return mixed
     */
    public function getOutputEncoding()
    {
        return $this->outputEncoding;
    }

    /**
     * @param $outputEncoding
     */
    public function setOutputEncoding($outputEncoding)
    {
        $this->outputEncoding = $outputEncoding;
    }

    /**
     * @return mixed
     */
    public function getRelatedSite()
    {
        return $this->relatedSite;
    }

    /**
     * @param $relatedSite
     */
    public function setRelatedSite($relatedSite)
    {
        $this->relatedSite = $relatedSite;
    }

    /**
     * @return mixed
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * @param $rights
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * @return mixed
     */
    public function getSafe()
    {
        return $this->safe;
    }

    /**
     * @param $safe
     */
    public function setSafe($safe)
    {
        $this->safe = $safe;
    }

    /**
     * @return mixed
     */
    public function getSearchTerms()
    {
        return $this->searchTerms;
    }

    /**
     * @param $searchTerms
     */
    public function setSearchTerms($searchTerms)
    {
        $this->searchTerms = $searchTerms;
    }

    /**
     * @return mixed
     */
    public function getSearchType()
    {
        return $this->searchType;
    }

    /**
     * @param $searchType
     */
    public function setSearchType($searchType)
    {
        $this->searchType = $searchType;
    }

    /**
     * @return mixed
     */
    public function getSiteSearch()
    {
        return $this->siteSearch;
    }

    /**
     * @param $siteSearch
     */
    public function setSiteSearch($siteSearch)
    {
        $this->siteSearch = $siteSearch;
    }

    /**
     * @return mixed
     */
    public function getSiteSearchFilter()
    {
        return $this->siteSearchFilter;
    }

    /**
     * @param $siteSearchFilter
     */
    public function setSiteSearchFilter($siteSearchFilter)
    {
        $this->siteSearchFilter = $siteSearchFilter;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return mixed
     */
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * @param $startIndex
     */
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;
    }

    /**
     * @return mixed
     */
    public function getStartPage()
    {
        return $this->startPage;
    }

    /**
     * @param $startPage
     */
    public function setStartPage($startPage)
    {
        $this->startPage = $startPage;
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
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Customsearch_Result
 */
class Google_Service_Customsearch_Result extends Google_Collection
{
    public $cacheId;
    public $displayLink;
    public $fileFormat;
    public $formattedUrl;
    public $htmlFormattedUrl;
    public $htmlSnippet;
    public $htmlTitle;
    public $kind;
    public $link;
    public $mime;
    public $pagemap;
    public $snippet;
    public $title;
    protected $collection_key = 'labels';
    protected $internal_gapi_mappings = [];
    protected $imageType = 'Google_Service_Customsearch_ResultImage';
    protected $imageDataType = '';
    protected $labelsType = 'Google_Service_Customsearch_ResultLabels';
    protected $labelsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCacheId()
    {
        return $this->cacheId;
    }

    /**
     * @param $cacheId
     */
    public function setCacheId($cacheId)
    {
        $this->cacheId = $cacheId;
    }

    /**
     * @return mixed
     */
    public function getDisplayLink()
    {
        return $this->displayLink;
    }

    /**
     * @param $displayLink
     */
    public function setDisplayLink($displayLink)
    {
        $this->displayLink = $displayLink;
    }

    /**
     * @return mixed
     */
    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    /**
     * @param $fileFormat
     */
    public function setFileFormat($fileFormat)
    {
        $this->fileFormat = $fileFormat;
    }

    /**
     * @return mixed
     */
    public function getFormattedUrl()
    {
        return $this->formattedUrl;
    }

    /**
     * @param $formattedUrl
     */
    public function setFormattedUrl($formattedUrl)
    {
        $this->formattedUrl = $formattedUrl;
    }

    /**
     * @return mixed
     */
    public function getHtmlFormattedUrl()
    {
        return $this->htmlFormattedUrl;
    }

    /**
     * @param $htmlFormattedUrl
     */
    public function setHtmlFormattedUrl($htmlFormattedUrl)
    {
        $this->htmlFormattedUrl = $htmlFormattedUrl;
    }

    /**
     * @return mixed
     */
    public function getHtmlSnippet()
    {
        return $this->htmlSnippet;
    }

    /**
     * @param $htmlSnippet
     */
    public function setHtmlSnippet($htmlSnippet)
    {
        $this->htmlSnippet = $htmlSnippet;
    }

    /**
     * @return mixed
     */
    public function getHtmlTitle()
    {
        return $this->htmlTitle;
    }

    /**
     * @param $htmlTitle
     */
    public function setHtmlTitle($htmlTitle)
    {
        $this->htmlTitle = $htmlTitle;
    }

    /**
     * @param Google_Service_Customsearch_ResultImage $image
     */
    public function setImage(Google_Service_Customsearch_ResultImage $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
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
     * @param $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return mixed
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @param $mime
     */
    public function setMime($mime)
    {
        $this->mime = $mime;
    }

    /**
     * @return mixed
     */
    public function getPagemap()
    {
        return $this->pagemap;
    }

    /**
     * @param $pagemap
     */
    public function setPagemap($pagemap)
    {
        $this->pagemap = $pagemap;
    }

    /**
     * @return mixed
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @param $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
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
 * Class Google_Service_Customsearch_ResultImage
 */
class Google_Service_Customsearch_ResultImage extends Google_Model
{
    public $byteSize;
    public $contextLink;
    public $height;
    public $thumbnailHeight;
    public $thumbnailLink;
    public $thumbnailWidth;
    public $width;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getByteSize()
    {
        return $this->byteSize;
    }

    /**
     * @param $byteSize
     */
    public function setByteSize($byteSize)
    {
        $this->byteSize = $byteSize;
    }

    /**
     * @return mixed
     */
    public function getContextLink()
    {
        return $this->contextLink;
    }

    /**
     * @param $contextLink
     */
    public function setContextLink($contextLink)
    {
        $this->contextLink = $contextLink;
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
    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param $thumbnailHeight
     */
    public function setThumbnailHeight($thumbnailHeight)
    {
        $this->thumbnailHeight = $thumbnailHeight;
    }

    /**
     * @return mixed
     */
    public function getThumbnailLink()
    {
        return $this->thumbnailLink;
    }

    /**
     * @param $thumbnailLink
     */
    public function setThumbnailLink($thumbnailLink)
    {
        $this->thumbnailLink = $thumbnailLink;
    }

    /**
     * @return mixed
     */
    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param $thumbnailWidth
     */
    public function setThumbnailWidth($thumbnailWidth)
    {
        $this->thumbnailWidth = $thumbnailWidth;
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
 * Class Google_Service_Customsearch_ResultLabels
 */
class Google_Service_Customsearch_ResultLabels extends Google_Model
{
    public $displayName;
    public $labelWithOp;
    public $name;
    protected $internal_gapi_mappings = [
        "labelWithOp" => "label_with_op",
    ];

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
    public function getLabelWithOp()
    {
        return $this->labelWithOp;
    }

    /**
     * @param $labelWithOp
     */
    public function setLabelWithOp($labelWithOp)
    {
        $this->labelWithOp = $labelWithOp;
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
 * Class Google_Service_Customsearch_ResultPagemap
 */
class Google_Service_Customsearch_ResultPagemap extends Google_Model
{
}

/**
 * Class Google_Service_Customsearch_ResultPagemapItemElement
 */
class Google_Service_Customsearch_ResultPagemapItemElement extends Google_Model
{
}

/**
 * Class Google_Service_Customsearch_Search
 */
class Google_Service_Customsearch_Search extends Google_Collection
{
    public $kind;
    protected $collection_key = 'promotions';
    protected $internal_gapi_mappings = [];
    protected $contextType = 'Google_Service_Customsearch_Context';
    protected $contextDataType = '';
    protected $itemsType = 'Google_Service_Customsearch_Result';
    protected $itemsDataType = 'array';
    protected $promotionsType = 'Google_Service_Customsearch_Promotion';
    protected $promotionsDataType = 'array';
    protected $queriesType = 'Google_Service_Customsearch_Query';
    protected $queriesDataType = 'map';
    protected $searchInformationType = 'Google_Service_Customsearch_SearchSearchInformation';
    protected $searchInformationDataType = '';
    protected $spellingType = 'Google_Service_Customsearch_SearchSpelling';
    protected $spellingDataType = '';
    protected $urlType = 'Google_Service_Customsearch_SearchUrl';
    protected $urlDataType = '';


    /**
     * @param Google_Service_Customsearch_Context $context
     */
    public function setContext(Google_Service_Customsearch_Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
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
     * @param $promotions
     */
    public function setPromotions($promotions)
    {
        $this->promotions = $promotions;
    }

    /**
     * @return mixed
     */
    public function getPromotions()
    {
        return $this->promotions;
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

    /**
     * @param Google_Service_Customsearch_SearchSearchInformation $searchInformation
     */
    public function setSearchInformation(Google_Service_Customsearch_SearchSearchInformation $searchInformation)
    {
        $this->searchInformation = $searchInformation;
    }

    /**
     * @return mixed
     */
    public function getSearchInformation()
    {
        return $this->searchInformation;
    }

    /**
     * @param Google_Service_Customsearch_SearchSpelling $spelling
     */
    public function setSpelling(Google_Service_Customsearch_SearchSpelling $spelling)
    {
        $this->spelling = $spelling;
    }

    /**
     * @return mixed
     */
    public function getSpelling()
    {
        return $this->spelling;
    }

    /**
     * @param Google_Service_Customsearch_SearchUrl $url
     */
    public function setUrl(Google_Service_Customsearch_SearchUrl $url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}

/**
 * Class Google_Service_Customsearch_SearchQueries
 */
class Google_Service_Customsearch_SearchQueries extends Google_Model
{
}

/**
 * Class Google_Service_Customsearch_SearchSearchInformation
 */
class Google_Service_Customsearch_SearchSearchInformation extends Google_Model
{
    public $formattedSearchTime;
    public $formattedTotalResults;
    public $searchTime;
    public $totalResults;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getFormattedSearchTime()
    {
        return $this->formattedSearchTime;
    }

    /**
     * @param $formattedSearchTime
     */
    public function setFormattedSearchTime($formattedSearchTime)
    {
        $this->formattedSearchTime = $formattedSearchTime;
    }

    /**
     * @return mixed
     */
    public function getFormattedTotalResults()
    {
        return $this->formattedTotalResults;
    }

    /**
     * @param $formattedTotalResults
     */
    public function setFormattedTotalResults($formattedTotalResults)
    {
        $this->formattedTotalResults = $formattedTotalResults;
    }

    /**
     * @return mixed
     */
    public function getSearchTime()
    {
        return $this->searchTime;
    }

    /**
     * @param $searchTime
     */
    public function setSearchTime($searchTime)
    {
        $this->searchTime = $searchTime;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param $totalResults
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
    }
}

/**
 * Class Google_Service_Customsearch_SearchSpelling
 */
class Google_Service_Customsearch_SearchSpelling extends Google_Model
{
    public $correctedQuery;
    public $htmlCorrectedQuery;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCorrectedQuery()
    {
        return $this->correctedQuery;
    }

    /**
     * @param $correctedQuery
     */
    public function setCorrectedQuery($correctedQuery)
    {
        $this->correctedQuery = $correctedQuery;
    }

    /**
     * @return mixed
     */
    public function getHtmlCorrectedQuery()
    {
        return $this->htmlCorrectedQuery;
    }

    /**
     * @param $htmlCorrectedQuery
     */
    public function setHtmlCorrectedQuery($htmlCorrectedQuery)
    {
        $this->htmlCorrectedQuery = $htmlCorrectedQuery;
    }
}

/**
 * Class Google_Service_Customsearch_SearchUrl
 */
class Google_Service_Customsearch_SearchUrl extends Google_Model
{
    public $template;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
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
