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
 * Service definition for Webfonts (v1).
 *
 * <p>
 * The Google Fonts Developer API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fonts/docs/developer_api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Webfonts extends Google_Service
{


    public $webfonts;


    /**
     * Constructs the internal representation of the Webfonts service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'webfonts/v1/';
        $this->version = 'v1';
        $this->serviceName = 'webfonts';

        $this->webfonts = new Google_Service_Webfonts_Webfonts_Resource(
            $this,
            $this->serviceName,
            'webfonts',
            [
                'methods' => [
                    'list' => [
                        'path' => 'webfonts',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'sort' => [
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
 * The "webfonts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webfontsService = new Google_Service_Webfonts(...);
 *   $webfonts = $webfontsService->webfonts;
 *  </code>
 */
class Google_Service_Webfonts_Webfonts_Resource extends Google_Service_Resource
{

    /**
     * Retrieves the list of fonts currently served by the Google Fonts Developer
     * API (webfonts.listWebfonts)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string sort Enables sorting of the list
     */
    public function listWebfonts($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Webfonts_WebfontList");
    }
}


/**
 * Class Google_Service_Webfonts_Webfont
 */
class Google_Service_Webfonts_Webfont extends Google_Collection
{
    public $category;
    public $family;
    public $files;
    public $kind;
    public $lastModified;
    public $subsets;
    public $variants;
    public $version;
    protected $collection_key = 'variants';
    protected $internal_gapi_mappings = [];

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
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

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
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param $lastModified
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
    }

    /**
     * @return mixed
     */
    public function getSubsets()
    {
        return $this->subsets;
    }

    /**
     * @param $subsets
     */
    public function setSubsets($subsets)
    {
        $this->subsets = $subsets;
    }

    /**
     * @return mixed
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @param $variants
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;
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
}

/**
 * Class Google_Service_Webfonts_WebfontFiles
 */
class Google_Service_Webfonts_WebfontFiles extends Google_Model
{
}

/**
 * Class Google_Service_Webfonts_WebfontList
 */
class Google_Service_Webfonts_WebfontList extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Webfonts_Webfont';
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
