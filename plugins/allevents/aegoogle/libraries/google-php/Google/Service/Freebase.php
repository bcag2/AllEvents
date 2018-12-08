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
 * Service definition for Freebase (v1).
 *
 * <p>
 * Find Freebase entities using textual queries and other constraints.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/freebase/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Freebase extends Google_Service
{


    private $base_methods;

    /**
     * Constructs the internal representation of the Freebase service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'freebase/v1/';
        $this->version = 'v1';
        $this->serviceName = 'freebase';

        $this->base_methods = new Google_Service_Resource(
            $this,
            $this->serviceName,
            '',
            [
                'methods' => [
                    'reconcile' => [
                        'path' => 'reconcile',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'lang' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'confidence' => [
                                'location' => 'query',
                                'type' => 'number',
                            ],
                            'name' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'kind' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'prop' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'limit' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'search' => [
                        'path' => 'search',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'domain' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'help' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'scoring' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'cursor' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'prefixed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'exact' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'mid' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'encode' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'type' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'as_of_time' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'stemmed' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'format' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'spell' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'with' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'lang' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'indent' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'filter' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'callback' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'without' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'limit' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'output' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'mql_output' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
    }

    /**
     * Reconcile entities to Freebase open data. (reconcile)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string lang Languages for names and values. First language is used
     * for display. Default is 'en'.
     * @opt_param float confidence Required confidence for a candidate to match.
     * Must be between .5 and 1.0
     * @opt_param string name Name of entity.
     * @opt_param string kind Classifications of entity e.g. type, category, title.
     * @opt_param string prop Property values for entity formatted as :
     * @opt_param int limit Maximum number of candidates to return.
     */
    public function reconcile($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->base_methods->call('reconcile', [$params], "Google_Service_Freebase_ReconcileGet");
    }

    /**
     * Search Freebase open data. (search)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string domain Restrict to topics with this Freebase domain id.
     * @opt_param string help The keyword to request help on.
     * @opt_param string query Query term to search for.
     * @opt_param string scoring Relevance scoring algorithm to use.
     * @opt_param int cursor The cursor value to use for the next page of results.
     * @opt_param bool prefixed Prefix match against names and aliases.
     * @opt_param bool exact Query on exact name and keys only.
     * @opt_param string mid A mid to use instead of a query.
     * @opt_param string encode The encoding of the response. You can use this
     * parameter to enable html encoding.
     * @opt_param string type Restrict to topics with this Freebase type id.
     * @opt_param string as_of_time A mql as_of_time value to use with mql_output
     * queries.
     * @opt_param bool stemmed Query on stemmed names and aliases. May not be used
     * with prefixed.
     * @opt_param string format Structural format of the json response.
     * @opt_param string spell Request 'did you mean' suggestions
     * @opt_param string with A rule to match against.
     * @opt_param string lang The code of the language to run the query with.
     * Default is 'en'.
     * @opt_param bool indent Whether to indent the json results or not.
     * @opt_param string filter A filter to apply to the query.
     * @opt_param string callback JS method name for JSONP callbacks.
     * @opt_param string without A rule to not match against.
     * @opt_param int limit Maximum number of results to return.
     * @opt_param string output An output expression to request data from matches.
     * @opt_param string mql_output The MQL query to run againist the results to
     * extract more data.
     * @return expected_class|Google_Http_Request
     */
    public function search($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->base_methods->call('search', [$params]);
    }
}


/**
 * Class Google_Service_Freebase_ReconcileCandidate
 */
class Google_Service_Freebase_ReconcileCandidate extends Google_Model
{
    public $confidence;
    public $lang;
    public $mid;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $notableType = 'Google_Service_Freebase_ReconcileCandidateNotable';
    protected $notableDataType = '';

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
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return mixed
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param $mid
     */
    public function setMid($mid)
    {
        $this->mid = $mid;
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
     * @param Google_Service_Freebase_ReconcileCandidateNotable $notable
     */
    public function setNotable(Google_Service_Freebase_ReconcileCandidateNotable $notable)
    {
        $this->notable = $notable;
    }

    /**
     * @return mixed
     */
    public function getNotable()
    {
        return $this->notable;
    }
}

/**
 * Class Google_Service_Freebase_ReconcileCandidateNotable
 */
class Google_Service_Freebase_ReconcileCandidateNotable extends Google_Model
{
    public $id;
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
 * Class Google_Service_Freebase_ReconcileGet
 */
class Google_Service_Freebase_ReconcileGet extends Google_Collection
{
    protected $collection_key = 'warning';
    protected $internal_gapi_mappings = [];
    protected $candidateType = 'Google_Service_Freebase_ReconcileCandidate';
    protected $candidateDataType = 'array';
    protected $costsType = 'Google_Service_Freebase_ReconcileGetCosts';
    protected $costsDataType = '';
    protected $matchType = 'Google_Service_Freebase_ReconcileCandidate';
    protected $matchDataType = '';
    protected $warningType = 'Google_Service_Freebase_ReconcileGetWarning';
    protected $warningDataType = 'array';


    /**
     * @param $candidate
     */
    public function setCandidate($candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * @return mixed
     */
    public function getCandidate()
    {
        return $this->candidate;
    }

    /**
     * @param Google_Service_Freebase_ReconcileGetCosts $costs
     */
    public function setCosts(Google_Service_Freebase_ReconcileGetCosts $costs)
    {
        $this->costs = $costs;
    }

    /**
     * @return mixed
     */
    public function getCosts()
    {
        return $this->costs;
    }

    /**
     * @param Google_Service_Freebase_ReconcileCandidate $match
     */
    public function setMatch(Google_Service_Freebase_ReconcileCandidate $match)
    {
        $this->match = $match;
    }

    /**
     * @return mixed
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @param $warning
     */
    public function setWarning($warning)
    {
        $this->warning = $warning;
    }

    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }
}

/**
 * Class Google_Service_Freebase_ReconcileGetCosts
 */
class Google_Service_Freebase_ReconcileGetCosts extends Google_Model
{
    public $hits;
    public $ms;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param $hits
     */
    public function setHits($hits)
    {
        $this->hits = $hits;
    }

    /**
     * @return mixed
     */
    public function getMs()
    {
        return $this->ms;
    }

    /**
     * @param $ms
     */
    public function setMs($ms)
    {
        $this->ms = $ms;
    }
}

/**
 * Class Google_Service_Freebase_ReconcileGetWarning
 */
class Google_Service_Freebase_ReconcileGetWarning extends Google_Model
{
    public $location;
    public $message;
    public $reason;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
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
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}
