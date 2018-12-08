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
 * Service definition for CivicInfo (v2).
 *
 * <p>
 * An API for accessing civic information.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/civic-information" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CivicInfo extends Google_Service
{


    public $divisions;
    public $elections;
    public $representatives;


    /**
     * Constructs the internal representation of the CivicInfo service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'civicinfo/v2/';
        $this->version = 'v2';
        $this->serviceName = 'civicinfo';

        $this->divisions = new Google_Service_CivicInfo_Divisions_Resource(
            $this,
            $this->serviceName,
            'divisions',
            [
                'methods' => [
                    'search' => [
                        'path' => 'divisions',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'query' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->elections = new Google_Service_CivicInfo_Elections_Resource(
            $this,
            $this->serviceName,
            'elections',
            [
                'methods' => [
                    'electionQuery' => [
                        'path' => 'elections',
                        'httpMethod' => 'GET',
                        'parameters' => [],
                    ], 'voterInfoQuery' => [
                        'path' => 'voterinfo',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'address' => [
                                'location' => 'query',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'electionId' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'officialOnly' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->representatives = new Google_Service_CivicInfo_Representatives_Resource(
            $this,
            $this->serviceName,
            'representatives',
            [
                'methods' => [
                    'representativeInfoByAddress' => [
                        'path' => 'representatives',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'includeOffices' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'levels' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'roles' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'address' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'representativeInfoByDivision' => [
                        'path' => 'representatives/{ocdId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'ocdId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'levels' => [
                                'location' => 'query',
                                'type' => 'string',
                                'repeated' => true,
                            ],
                            'recursive' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'roles' => [
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
 * The "divisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $civicinfoService = new Google_Service_CivicInfo(...);
 *   $divisions = $civicinfoService->divisions;
 *  </code>
 */
class Google_Service_CivicInfo_Divisions_Resource extends Google_Service_Resource
{

    /**
     * Searches for political divisions by their natural name or OCD ID.
     * (divisions.search)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string query The search query. Queries can cover any parts of a
     * OCD ID or a human readable division name. All words given in the query are
     * treated as required patterns. In addition to that, most query operators of
     * the Apache Lucene library are supported. See
     * http://lucene.apache.org/core/2_9_4/queryparsersyntax.html
     */
    public function search($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_CivicInfo_DivisionSearchResponse");
    }
}

/**
 * The "elections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $civicinfoService = new Google_Service_CivicInfo(...);
 *   $elections = $civicinfoService->elections;
 *  </code>
 */
class Google_Service_CivicInfo_Elections_Resource extends Google_Service_Resource
{

    /**
     * List of available elections to query. (elections.electionQuery)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function electionQuery($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('electionQuery', [$params], "Google_Service_CivicInfo_ElectionsQueryResponse");
    }

    /**
     * Looks up information relevant to a voter based on the voter's registered
     * address. (elections.voterInfoQuery)
     *
     * @param string $address The registered address of the voter to look up.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string electionId The unique ID of the election to look up. A list
     * of election IDs can be obtained at
     * https://www.googleapis.com/civicinfo/{version}/elections
     * @opt_param bool officialOnly If set to true, only data from official state
     * sources will be returned.
     */
    public function voterInfoQuery($address, $optParams = [])
    {
        $params = ['address' => $address];
        $params = array_merge($params, $optParams);

        return $this->call('voterInfoQuery', [$params], "Google_Service_CivicInfo_VoterInfoResponse");
    }
}

/**
 * The "representatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $civicinfoService = new Google_Service_CivicInfo(...);
 *   $representatives = $civicinfoService->representatives;
 *  </code>
 */
class Google_Service_CivicInfo_Representatives_Resource extends Google_Service_Resource
{

    /**
     * Looks up political geography and representative information for a single
     * address. (representatives.representativeInfoByAddress)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool includeOffices Whether to return information about offices
     * and officials. If false, only the top-level district information will be
     * returned.
     * @opt_param string levels A list of office levels to filter by. Only offices
     * that serve at least one of these levels will be returned. Divisions that
     * don't contain a matching office will not be returned.
     * @opt_param string roles A list of office roles to filter by. Only offices
     * fulfilling one of these roles will be returned. Divisions that don't contain
     * a matching office will not be returned.
     * @opt_param string address The address to look up. May only be specified if
     * the field ocdId is not given in the URL.
     */
    public function representativeInfoByAddress($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('representativeInfoByAddress', [$params], "Google_Service_CivicInfo_RepresentativeInfoResponse");
    }

    /**
     * Looks up representative information for a single geographic division.
     * (representatives.representativeInfoByDivision)
     *
     * @param string $ocdId The Open Civic Data division identifier of the division
     *                          to look up.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string levels A list of office levels to filter by. Only offices
     * that serve at least one of these levels will be returned. Divisions that
     * don't contain a matching office will not be returned.
     * @opt_param bool recursive If true, information about all divisions contained
     * in the division requested will be included as well. For example, if querying
     * ocd-division/country:us/district:dc, this would also return all DC's wards
     * and ANCs.
     * @opt_param string roles A list of office roles to filter by. Only offices
     * fulfilling one of these roles will be returned. Divisions that don't contain
     * a matching office will not be returned.
     */
    public function representativeInfoByDivision($ocdId, $optParams = [])
    {
        $params = ['ocdId' => $ocdId];
        $params = array_merge($params, $optParams);

        return $this->call('representativeInfoByDivision', [$params], "Google_Service_CivicInfo_RepresentativeInfoData");
    }
}


/**
 * Class Google_Service_CivicInfo_AdministrationRegion
 */
class Google_Service_CivicInfo_AdministrationRegion extends Google_Collection
{
    public $id;
    public $name;
    protected $collection_key = 'sources';
    protected $internal_gapi_mappings = [
        "localJurisdiction" => "local_jurisdiction",
    ];
    protected $electionAdministrationBodyType = 'Google_Service_CivicInfo_AdministrativeBody';
    protected $electionAdministrationBodyDataType = '';
    protected $localJurisdictionType = 'Google_Service_CivicInfo_AdministrationRegion';
    protected $localJurisdictionDataType = '';
    protected $sourcesType = 'Google_Service_CivicInfo_Source';
    protected $sourcesDataType = 'array';


    /**
     * @param Google_Service_CivicInfo_AdministrativeBody $electionAdministrationBody
     */
    public function setElectionAdministrationBody(Google_Service_CivicInfo_AdministrativeBody $electionAdministrationBody)
    {
        $this->electionAdministrationBody = $electionAdministrationBody;
    }

    /**
     * @return mixed
     */
    public function getElectionAdministrationBody()
    {
        return $this->electionAdministrationBody;
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
     * @param Google_Service_CivicInfo_AdministrationRegion $localJurisdiction
     */
    public function setLocalJurisdiction(Google_Service_CivicInfo_AdministrationRegion $localJurisdiction)
    {
        $this->localJurisdiction = $localJurisdiction;
    }

    /**
     * @return mixed
     */
    public function getLocalJurisdiction()
    {
        return $this->localJurisdiction;
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
     * @param $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return mixed
     */
    public function getSources()
    {
        return $this->sources;
    }
}

/**
 * Class Google_Service_CivicInfo_AdministrativeBody
 */
class Google_Service_CivicInfo_AdministrativeBody extends Google_Collection
{
    public $absenteeVotingInfoUrl;
    public $ballotInfoUrl;
    public $electionInfoUrl;
    public $electionRegistrationConfirmationUrl;
    public $electionRegistrationUrl;
    public $electionRulesUrl;
    public $hoursOfOperation;
    public $name;
    public $voterServices;
    public $votingLocationFinderUrl;
    protected $collection_key = 'voter_services';
    protected $internal_gapi_mappings = [
        "voterServices" => "voter_services",
    ];
    protected $correspondenceAddressType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $correspondenceAddressDataType = '';
    protected $electionOfficialsType = 'Google_Service_CivicInfo_ElectionOfficial';
    protected $electionOfficialsDataType = 'array';
    protected $physicalAddressType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $physicalAddressDataType = '';

    /**
     * @return mixed
     */
    public function getAbsenteeVotingInfoUrl()
    {
        return $this->absenteeVotingInfoUrl;
    }

    /**
     * @param $absenteeVotingInfoUrl
     */
    public function setAbsenteeVotingInfoUrl($absenteeVotingInfoUrl)
    {
        $this->absenteeVotingInfoUrl = $absenteeVotingInfoUrl;
    }

    /**
     * @return mixed
     */
    public function getBallotInfoUrl()
    {
        return $this->ballotInfoUrl;
    }

    /**
     * @param $ballotInfoUrl
     */
    public function setBallotInfoUrl($ballotInfoUrl)
    {
        $this->ballotInfoUrl = $ballotInfoUrl;
    }

    /**
     * @param Google_Service_CivicInfo_SimpleAddressType $correspondenceAddress
     */
    public function setCorrespondenceAddress(Google_Service_CivicInfo_SimpleAddressType $correspondenceAddress)
    {
        $this->correspondenceAddress = $correspondenceAddress;
    }

    /**
     * @return mixed
     */
    public function getCorrespondenceAddress()
    {
        return $this->correspondenceAddress;
    }

    /**
     * @return mixed
     */
    public function getElectionInfoUrl()
    {
        return $this->electionInfoUrl;
    }

    /**
     * @param $electionInfoUrl
     */
    public function setElectionInfoUrl($electionInfoUrl)
    {
        $this->electionInfoUrl = $electionInfoUrl;
    }

    /**
     * @param $electionOfficials
     */
    public function setElectionOfficials($electionOfficials)
    {
        $this->electionOfficials = $electionOfficials;
    }

    /**
     * @return mixed
     */
    public function getElectionOfficials()
    {
        return $this->electionOfficials;
    }

    /**
     * @return mixed
     */
    public function getElectionRegistrationConfirmationUrl()
    {
        return $this->electionRegistrationConfirmationUrl;
    }

    /**
     * @param $electionRegistrationConfirmationUrl
     */
    public function setElectionRegistrationConfirmationUrl($electionRegistrationConfirmationUrl)
    {
        $this->electionRegistrationConfirmationUrl = $electionRegistrationConfirmationUrl;
    }

    /**
     * @return mixed
     */
    public function getElectionRegistrationUrl()
    {
        return $this->electionRegistrationUrl;
    }

    /**
     * @param $electionRegistrationUrl
     */
    public function setElectionRegistrationUrl($electionRegistrationUrl)
    {
        $this->electionRegistrationUrl = $electionRegistrationUrl;
    }

    /**
     * @return mixed
     */
    public function getElectionRulesUrl()
    {
        return $this->electionRulesUrl;
    }

    /**
     * @param $electionRulesUrl
     */
    public function setElectionRulesUrl($electionRulesUrl)
    {
        $this->electionRulesUrl = $electionRulesUrl;
    }

    /**
     * @return mixed
     */
    public function getHoursOfOperation()
    {
        return $this->hoursOfOperation;
    }

    /**
     * @param $hoursOfOperation
     */
    public function setHoursOfOperation($hoursOfOperation)
    {
        $this->hoursOfOperation = $hoursOfOperation;
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
     * @param Google_Service_CivicInfo_SimpleAddressType $physicalAddress
     */
    public function setPhysicalAddress(Google_Service_CivicInfo_SimpleAddressType $physicalAddress)
    {
        $this->physicalAddress = $physicalAddress;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAddress()
    {
        return $this->physicalAddress;
    }

    /**
     * @return mixed
     */
    public function getVoterServices()
    {
        return $this->voterServices;
    }

    /**
     * @param $voterServices
     */
    public function setVoterServices($voterServices)
    {
        $this->voterServices = $voterServices;
    }

    /**
     * @return mixed
     */
    public function getVotingLocationFinderUrl()
    {
        return $this->votingLocationFinderUrl;
    }

    /**
     * @param $votingLocationFinderUrl
     */
    public function setVotingLocationFinderUrl($votingLocationFinderUrl)
    {
        $this->votingLocationFinderUrl = $votingLocationFinderUrl;
    }
}

/**
 * Class Google_Service_CivicInfo_Candidate
 */
class Google_Service_CivicInfo_Candidate extends Google_Collection
{
    public $candidateUrl;
    public $email;
    public $name;
    public $orderOnBallot;
    public $party;
    public $phone;
    public $photoUrl;
    protected $collection_key = 'channels';
    protected $internal_gapi_mappings = [];
    protected $channelsType = 'Google_Service_CivicInfo_Channel';
    protected $channelsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCandidateUrl()
    {
        return $this->candidateUrl;
    }

    /**
     * @param $candidateUrl
     */
    public function setCandidateUrl($candidateUrl)
    {
        $this->candidateUrl = $candidateUrl;
    }

    /**
     * @param $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return mixed
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getOrderOnBallot()
    {
        return $this->orderOnBallot;
    }

    /**
     * @param $orderOnBallot
     */
    public function setOrderOnBallot($orderOnBallot)
    {
        $this->orderOnBallot = $orderOnBallot;
    }

    /**
     * @return mixed
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * @param $party
     */
    public function setParty($party)
    {
        $this->party = $party;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }
}

/**
 * Class Google_Service_CivicInfo_Channel
 */
class Google_Service_CivicInfo_Channel extends Google_Model
{
    public $id;
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
 * Class Google_Service_CivicInfo_Contest
 */
class Google_Service_CivicInfo_Contest extends Google_Collection
{
    public $ballotPlacement;
    public $electorateSpecifications;
    public $id;
    public $level;
    public $numberElected;
    public $numberVotingFor;
    public $office;
    public $primaryParty;
    public $referendumSubtitle;
    public $referendumTitle;
    public $referendumUrl;
    public $roles;
    public $special;
    public $type;
    protected $collection_key = 'sources';
    protected $internal_gapi_mappings = [];
    protected $candidatesType = 'Google_Service_CivicInfo_Candidate';
    protected $candidatesDataType = 'array';
    protected $districtType = 'Google_Service_CivicInfo_ElectoralDistrict';
    protected $districtDataType = '';
    protected $sourcesType = 'Google_Service_CivicInfo_Source';
    protected $sourcesDataType = 'array';

    /**
     * @return mixed
     */
    public function getBallotPlacement()
    {
        return $this->ballotPlacement;
    }

    /**
     * @param $ballotPlacement
     */
    public function setBallotPlacement($ballotPlacement)
    {
        $this->ballotPlacement = $ballotPlacement;
    }

    /**
     * @param $candidates
     */
    public function setCandidates($candidates)
    {
        $this->candidates = $candidates;
    }

    /**
     * @return mixed
     */
    public function getCandidates()
    {
        return $this->candidates;
    }

    /**
     * @param Google_Service_CivicInfo_ElectoralDistrict $district
     */
    public function setDistrict(Google_Service_CivicInfo_ElectoralDistrict $district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return mixed
     */
    public function getElectorateSpecifications()
    {
        return $this->electorateSpecifications;
    }

    /**
     * @param $electorateSpecifications
     */
    public function setElectorateSpecifications($electorateSpecifications)
    {
        $this->electorateSpecifications = $electorateSpecifications;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getNumberElected()
    {
        return $this->numberElected;
    }

    /**
     * @param $numberElected
     */
    public function setNumberElected($numberElected)
    {
        $this->numberElected = $numberElected;
    }

    /**
     * @return mixed
     */
    public function getNumberVotingFor()
    {
        return $this->numberVotingFor;
    }

    /**
     * @param $numberVotingFor
     */
    public function setNumberVotingFor($numberVotingFor)
    {
        $this->numberVotingFor = $numberVotingFor;
    }

    /**
     * @return mixed
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @param $office
     */
    public function setOffice($office)
    {
        $this->office = $office;
    }

    /**
     * @return mixed
     */
    public function getPrimaryParty()
    {
        return $this->primaryParty;
    }

    /**
     * @param $primaryParty
     */
    public function setPrimaryParty($primaryParty)
    {
        $this->primaryParty = $primaryParty;
    }

    /**
     * @return mixed
     */
    public function getReferendumSubtitle()
    {
        return $this->referendumSubtitle;
    }

    /**
     * @param $referendumSubtitle
     */
    public function setReferendumSubtitle($referendumSubtitle)
    {
        $this->referendumSubtitle = $referendumSubtitle;
    }

    /**
     * @return mixed
     */
    public function getReferendumTitle()
    {
        return $this->referendumTitle;
    }

    /**
     * @param $referendumTitle
     */
    public function setReferendumTitle($referendumTitle)
    {
        $this->referendumTitle = $referendumTitle;
    }

    /**
     * @return mixed
     */
    public function getReferendumUrl()
    {
        return $this->referendumUrl;
    }

    /**
     * @param $referendumUrl
     */
    public function setReferendumUrl($referendumUrl)
    {
        $this->referendumUrl = $referendumUrl;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return mixed
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * @return mixed
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;
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
 * Class Google_Service_CivicInfo_DivisionSearchResponse
 */
class Google_Service_CivicInfo_DivisionSearchResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'results';
    protected $internal_gapi_mappings = [];
    protected $resultsType = 'Google_Service_CivicInfo_DivisionSearchResult';
    protected $resultsDataType = 'array';

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
     * @param $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }
}

/**
 * Class Google_Service_CivicInfo_DivisionSearchResult
 */
class Google_Service_CivicInfo_DivisionSearchResult extends Google_Collection
{
    public $aliases;
    public $name;
    public $ocdId;
    protected $collection_key = 'aliases';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @param $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
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
    public function getOcdId()
    {
        return $this->ocdId;
    }

    /**
     * @param $ocdId
     */
    public function setOcdId($ocdId)
    {
        $this->ocdId = $ocdId;
    }
}

/**
 * Class Google_Service_CivicInfo_Election
 */
class Google_Service_CivicInfo_Election extends Google_Model
{
    public $electionDay;
    public $id;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getElectionDay()
    {
        return $this->electionDay;
    }

    /**
     * @param $electionDay
     */
    public function setElectionDay($electionDay)
    {
        $this->electionDay = $electionDay;
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
 * Class Google_Service_CivicInfo_ElectionOfficial
 */
class Google_Service_CivicInfo_ElectionOfficial extends Google_Model
{
    public $emailAddress;
    public $faxNumber;
    public $name;
    public $officePhoneNumber;
    public $title;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param $faxNumber
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
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
    public function getOfficePhoneNumber()
    {
        return $this->officePhoneNumber;
    }

    /**
     * @param $officePhoneNumber
     */
    public function setOfficePhoneNumber($officePhoneNumber)
    {
        $this->officePhoneNumber = $officePhoneNumber;
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
 * Class Google_Service_CivicInfo_ElectionsQueryResponse
 */
class Google_Service_CivicInfo_ElectionsQueryResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'elections';
    protected $internal_gapi_mappings = [];
    protected $electionsType = 'Google_Service_CivicInfo_Election';
    protected $electionsDataType = 'array';

    /**
     * @param $elections
     */
    public function setElections($elections)
    {
        $this->elections = $elections;
    }

    /**
     * @return mixed
     */
    public function getElections()
    {
        return $this->elections;
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
 * Class Google_Service_CivicInfo_ElectoralDistrict
 */
class Google_Service_CivicInfo_ElectoralDistrict extends Google_Model
{
    public $id;
    public $name;
    public $scope;
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

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }
}

/**
 * Class Google_Service_CivicInfo_GeographicDivision
 */
class Google_Service_CivicInfo_GeographicDivision extends Google_Collection
{
    public $alsoKnownAs;
    public $name;
    public $officeIndices;
    protected $collection_key = 'officeIndices';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlsoKnownAs()
    {
        return $this->alsoKnownAs;
    }

    /**
     * @param $alsoKnownAs
     */
    public function setAlsoKnownAs($alsoKnownAs)
    {
        $this->alsoKnownAs = $alsoKnownAs;
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
    public function getOfficeIndices()
    {
        return $this->officeIndices;
    }

    /**
     * @param $officeIndices
     */
    public function setOfficeIndices($officeIndices)
    {
        $this->officeIndices = $officeIndices;
    }
}

/**
 * Class Google_Service_CivicInfo_Office
 */
class Google_Service_CivicInfo_Office extends Google_Collection
{
    public $divisionId;
    public $levels;
    public $name;
    public $officialIndices;
    public $roles;
    protected $collection_key = 'sources';
    protected $internal_gapi_mappings = [];
    protected $sourcesType = 'Google_Service_CivicInfo_Source';
    protected $sourcesDataType = 'array';

    /**
     * @return mixed
     */
    public function getDivisionId()
    {
        return $this->divisionId;
    }

    /**
     * @param $divisionId
     */
    public function setDivisionId($divisionId)
    {
        $this->divisionId = $divisionId;
    }

    /**
     * @return mixed
     */
    public function getLevels()
    {
        return $this->levels;
    }

    /**
     * @param $levels
     */
    public function setLevels($levels)
    {
        $this->levels = $levels;
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
    public function getOfficialIndices()
    {
        return $this->officialIndices;
    }

    /**
     * @param $officialIndices
     */
    public function setOfficialIndices($officialIndices)
    {
        $this->officialIndices = $officialIndices;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return mixed
     */
    public function getSources()
    {
        return $this->sources;
    }
}

/**
 * Class Google_Service_CivicInfo_Official
 */
class Google_Service_CivicInfo_Official extends Google_Collection
{
    public $emails;
    public $name;
    public $party;
    public $phones;
    public $photoUrl;
    public $urls;
    protected $collection_key = 'urls';
    protected $internal_gapi_mappings = [];
    protected $addressType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $addressDataType = 'array';
    protected $channelsType = 'Google_Service_CivicInfo_Channel';
    protected $channelsDataType = 'array';

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return mixed
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
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
    public function getParty()
    {
        return $this->party;
    }

    /**
     * @param $party
     */
    public function setParty($party)
    {
        $this->party = $party;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }
}

/**
 * Class Google_Service_CivicInfo_PollingLocation
 */
class Google_Service_CivicInfo_PollingLocation extends Google_Collection
{
    public $endDate;
    public $id;
    public $name;
    public $notes;
    public $pollingHours;
    public $startDate;
    public $voterServices;
    protected $collection_key = 'sources';
    protected $internal_gapi_mappings = [];
    protected $addressType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $addressDataType = '';
    protected $sourcesType = 'Google_Service_CivicInfo_Source';
    protected $sourcesDataType = 'array';

    /**
     * @param Google_Service_CivicInfo_SimpleAddressType $address
     */
    public function setAddress(Google_Service_CivicInfo_SimpleAddressType $address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
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

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getPollingHours()
    {
        return $this->pollingHours;
    }

    /**
     * @param $pollingHours
     */
    public function setPollingHours($pollingHours)
    {
        $this->pollingHours = $pollingHours;
    }

    /**
     * @param $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return mixed
     */
    public function getSources()
    {
        return $this->sources;
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

    /**
     * @return mixed
     */
    public function getVoterServices()
    {
        return $this->voterServices;
    }

    /**
     * @param $voterServices
     */
    public function setVoterServices($voterServices)
    {
        $this->voterServices = $voterServices;
    }
}

/**
 * Class Google_Service_CivicInfo_RepresentativeInfoData
 */
class Google_Service_CivicInfo_RepresentativeInfoData extends Google_Collection
{
    protected $collection_key = 'officials';
    protected $internal_gapi_mappings = [];
    protected $divisionsType = 'Google_Service_CivicInfo_GeographicDivision';
    protected $divisionsDataType = 'map';
    protected $officesType = 'Google_Service_CivicInfo_Office';
    protected $officesDataType = 'array';
    protected $officialsType = 'Google_Service_CivicInfo_Official';
    protected $officialsDataType = 'array';


    /**
     * @param $divisions
     */
    public function setDivisions($divisions)
    {
        $this->divisions = $divisions;
    }

    /**
     * @return mixed
     */
    public function getDivisions()
    {
        return $this->divisions;
    }

    /**
     * @param $offices
     */
    public function setOffices($offices)
    {
        $this->offices = $offices;
    }

    /**
     * @return mixed
     */
    public function getOffices()
    {
        return $this->offices;
    }

    /**
     * @param $officials
     */
    public function setOfficials($officials)
    {
        $this->officials = $officials;
    }

    /**
     * @return mixed
     */
    public function getOfficials()
    {
        return $this->officials;
    }
}

/**
 * Class Google_Service_CivicInfo_RepresentativeInfoDataDivisions
 */
class Google_Service_CivicInfo_RepresentativeInfoDataDivisions extends Google_Model
{
}

/**
 * Class Google_Service_CivicInfo_RepresentativeInfoResponse
 */
class Google_Service_CivicInfo_RepresentativeInfoResponse extends Google_Collection
{
    public $kind;
    protected $collection_key = 'officials';
    protected $internal_gapi_mappings = [];
    protected $divisionsType = 'Google_Service_CivicInfo_GeographicDivision';
    protected $divisionsDataType = 'map';
    protected $normalizedInputType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $normalizedInputDataType = '';
    protected $officesType = 'Google_Service_CivicInfo_Office';
    protected $officesDataType = 'array';
    protected $officialsType = 'Google_Service_CivicInfo_Official';
    protected $officialsDataType = 'array';


    /**
     * @param $divisions
     */
    public function setDivisions($divisions)
    {
        $this->divisions = $divisions;
    }

    /**
     * @return mixed
     */
    public function getDivisions()
    {
        return $this->divisions;
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
     * @param Google_Service_CivicInfo_SimpleAddressType $normalizedInput
     */
    public function setNormalizedInput(Google_Service_CivicInfo_SimpleAddressType $normalizedInput)
    {
        $this->normalizedInput = $normalizedInput;
    }

    /**
     * @return mixed
     */
    public function getNormalizedInput()
    {
        return $this->normalizedInput;
    }

    /**
     * @param $offices
     */
    public function setOffices($offices)
    {
        $this->offices = $offices;
    }

    /**
     * @return mixed
     */
    public function getOffices()
    {
        return $this->offices;
    }

    /**
     * @param $officials
     */
    public function setOfficials($officials)
    {
        $this->officials = $officials;
    }

    /**
     * @return mixed
     */
    public function getOfficials()
    {
        return $this->officials;
    }
}

/**
 * Class Google_Service_CivicInfo_RepresentativeInfoResponseDivisions
 */
class Google_Service_CivicInfo_RepresentativeInfoResponseDivisions extends Google_Model
{
}

/**
 * Class Google_Service_CivicInfo_SimpleAddressType
 */
class Google_Service_CivicInfo_SimpleAddressType extends Google_Model
{
    public $city;
    public $line1;
    public $line2;
    public $line3;
    public $locationName;
    public $state;
    public $zip;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param $line1
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
    }

    /**
     * @return mixed
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param $line2
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
    }

    /**
     * @return mixed
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * @param $line3
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;
    }

    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param $locationName
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
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
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }
}

/**
 * Class Google_Service_CivicInfo_Source
 */
class Google_Service_CivicInfo_Source extends Google_Model
{
    public $name;
    public $official;
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
    public function getOfficial()
    {
        return $this->official;
    }

    /**
     * @param $official
     */
    public function setOfficial($official)
    {
        $this->official = $official;
    }
}

/**
 * Class Google_Service_CivicInfo_VoterInfoResponse
 */
class Google_Service_CivicInfo_VoterInfoResponse extends Google_Collection
{
    public $kind;
    public $precinctId;
    protected $collection_key = 'state';
    protected $internal_gapi_mappings = [];
    protected $contestsType = 'Google_Service_CivicInfo_Contest';
    protected $contestsDataType = 'array';
    protected $dropOffLocationsType = 'Google_Service_CivicInfo_PollingLocation';
    protected $dropOffLocationsDataType = 'array';
    protected $earlyVoteSitesType = 'Google_Service_CivicInfo_PollingLocation';
    protected $earlyVoteSitesDataType = 'array';
    protected $electionType = 'Google_Service_CivicInfo_Election';
    protected $electionDataType = '';
    protected $normalizedInputType = 'Google_Service_CivicInfo_SimpleAddressType';
    protected $normalizedInputDataType = '';
    protected $otherElectionsType = 'Google_Service_CivicInfo_Election';
    protected $otherElectionsDataType = 'array';
    protected $pollingLocationsType = 'Google_Service_CivicInfo_PollingLocation';
    protected $pollingLocationsDataType = 'array';
    protected $stateType = 'Google_Service_CivicInfo_AdministrationRegion';
    protected $stateDataType = 'array';


    /**
     * @param $contests
     */
    public function setContests($contests)
    {
        $this->contests = $contests;
    }

    /**
     * @return mixed
     */
    public function getContests()
    {
        return $this->contests;
    }

    /**
     * @param $dropOffLocations
     */
    public function setDropOffLocations($dropOffLocations)
    {
        $this->dropOffLocations = $dropOffLocations;
    }

    /**
     * @return mixed
     */
    public function getDropOffLocations()
    {
        return $this->dropOffLocations;
    }

    /**
     * @param $earlyVoteSites
     */
    public function setEarlyVoteSites($earlyVoteSites)
    {
        $this->earlyVoteSites = $earlyVoteSites;
    }

    /**
     * @return mixed
     */
    public function getEarlyVoteSites()
    {
        return $this->earlyVoteSites;
    }

    /**
     * @param Google_Service_CivicInfo_Election $election
     */
    public function setElection(Google_Service_CivicInfo_Election $election)
    {
        $this->election = $election;
    }

    /**
     * @return mixed
     */
    public function getElection()
    {
        return $this->election;
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
     * @param Google_Service_CivicInfo_SimpleAddressType $normalizedInput
     */
    public function setNormalizedInput(Google_Service_CivicInfo_SimpleAddressType $normalizedInput)
    {
        $this->normalizedInput = $normalizedInput;
    }

    /**
     * @return mixed
     */
    public function getNormalizedInput()
    {
        return $this->normalizedInput;
    }

    /**
     * @param $otherElections
     */
    public function setOtherElections($otherElections)
    {
        $this->otherElections = $otherElections;
    }

    /**
     * @return mixed
     */
    public function getOtherElections()
    {
        return $this->otherElections;
    }

    /**
     * @param $pollingLocations
     */
    public function setPollingLocations($pollingLocations)
    {
        $this->pollingLocations = $pollingLocations;
    }

    /**
     * @return mixed
     */
    public function getPollingLocations()
    {
        return $this->pollingLocations;
    }

    /**
     * @return mixed
     */
    public function getPrecinctId()
    {
        return $this->precinctId;
    }

    /**
     * @param $precinctId
     */
    public function setPrecinctId($precinctId)
    {
        $this->precinctId = $precinctId;
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
    public function getState()
    {
        return $this->state;
    }
}
