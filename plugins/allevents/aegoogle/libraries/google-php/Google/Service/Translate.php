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
 * Service definition for Translate (v2).
 *
 * <p>
 * Lets you translate text from one language to another</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/translate/v2/using_rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Translate extends Google_Service
{


    public $detections;
    public $languages;
    public $translations;


    /**
     * Constructs the internal representation of the Translate service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'language/translate/';
        $this->version = 'v2';
        $this->serviceName = 'translate';

        $this->detections = new Google_Service_Translate_Detections_Resource(
            $this,
            $this->serviceName,
            'detections',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v2/detect',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->languages = new Google_Service_Translate_Languages_Resource(
            $this,
            $this->serviceName,
            'languages',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v2/languages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'target' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->translations = new Google_Service_Translate_Translations_Resource(
            $this,
            $this->serviceName,
            'translations',
            [
                'methods' => [
                    'list' => [
                        'path' => 'v2',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'q' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                                'required' => true,
                            ],
                            'target' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'source' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'format' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'cid' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "detections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $detections = $translateService->detections;
 *  </code>
 */
class Google_Service_Translate_Detections_Resource extends Google_Service_Resource
{

    /**
     * Detect the language of text. (detections.listDetections)
     *
     * @param string $q The text to detect
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listDetections($q, $optParams = [])
    {
        $params = ['q' => $q];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Translate_DetectionsListResponse");
    }
}

/**
 * The "languages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $languages = $translateService->languages;
 *  </code>
 */
class Google_Service_Translate_Languages_Resource extends Google_Service_Resource
{

    /**
     * List the source/target languages supported by the API
     * (languages.listLanguages)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string target the language and collation in which the localized
     * results should be returned
     */
    public function listLanguages($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Translate_LanguagesListResponse");
    }
}

/**
 * The "translations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $translations = $translateService->translations;
 *  </code>
 */
class Google_Service_Translate_Translations_Resource extends Google_Service_Resource
{

    /**
     * Returns text translations from one language to another.
     * (translations.listTranslations)
     *
     * @param string $q The text to translate
     * @param string $target The target language into which the text should be
     *                          translated
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string source The source language of the text
     * @opt_param string format The format of the text
     * @opt_param string cid The customization id for translate
     */
    public function listTranslations($q, $target, $optParams = [])
    {
        $params = ['q' => $q, 'target' => $target];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Translate_TranslationsListResponse");
    }
}


/**
 * Class Google_Service_Translate_DetectionsListResponse
 */
class Google_Service_Translate_DetectionsListResponse extends Google_Collection
{
    protected $collection_key = 'detections';
    protected $internal_gapi_mappings = [];
    protected $detectionsType = 'Google_Service_Translate_DetectionsResourceItems';
    protected $detectionsDataType = 'array';


    /**
     * @param $detections
     */
    public function setDetections($detections)
    {
        $this->detections = $detections;
    }

    /**
     * @return mixed
     */
    public function getDetections()
    {
        return $this->detections;
    }
}

/**
 * Class Google_Service_Translate_DetectionsResourceItems
 */
class Google_Service_Translate_DetectionsResourceItems extends Google_Model
{
    public $confidence;
    public $isReliable;
    public $language;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;
    }

    /**
     * @return mixed
     */
    public function getIsReliable()
    {
        return $this->isReliable;
    }

    /**
     * @param $isReliable
     */
    public function setIsReliable($isReliable)
    {
        $this->isReliable = $isReliable;
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
}

/**
 * Class Google_Service_Translate_LanguagesListResponse
 */
class Google_Service_Translate_LanguagesListResponse extends Google_Collection
{
    protected $collection_key = 'languages';
    protected $internal_gapi_mappings = [];
    protected $languagesType = 'Google_Service_Translate_LanguagesResource';
    protected $languagesDataType = 'array';


    /**
     * @param $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }
}

/**
 * Class Google_Service_Translate_LanguagesResource
 */
class Google_Service_Translate_LanguagesResource extends Google_Model
{
    public $language;
    public $name;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Translate_TranslationsListResponse
 */
class Google_Service_Translate_TranslationsListResponse extends Google_Collection
{
    protected $collection_key = 'translations';
    protected $internal_gapi_mappings = [];
    protected $translationsType = 'Google_Service_Translate_TranslationsResource';
    protected $translationsDataType = 'array';


    /**
     * @param $translations
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
    }

    /**
     * @return mixed
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}

/**
 * Class Google_Service_Translate_TranslationsResource
 */
class Google_Service_Translate_TranslationsResource extends Google_Model
{
    public $detectedSourceLanguage;
    public $translatedText;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDetectedSourceLanguage()
    {
        return $this->detectedSourceLanguage;
    }

    /**
     * @param $detectedSourceLanguage
     */
    public function setDetectedSourceLanguage($detectedSourceLanguage)
    {
        $this->detectedSourceLanguage = $detectedSourceLanguage;
    }

    /**
     * @return mixed
     */
    public function getTranslatedText()
    {
        return $this->translatedText;
    }

    /**
     * @param $translatedText
     */
    public function setTranslatedText($translatedText)
    {
        $this->translatedText = $translatedText;
    }
}
