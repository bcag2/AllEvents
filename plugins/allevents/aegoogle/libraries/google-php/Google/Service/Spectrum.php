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
 * Service definition for Spectrum (v1explorer).
 *
 * <p>
 * API for spectrum-management functions.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/spectrum" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Spectrum extends Google_Service
{


    public $paws;


    /**
     * Constructs the internal representation of the Spectrum service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'spectrum/v1explorer/paws/';
        $this->version = 'v1explorer';
        $this->serviceName = 'spectrum';

        $this->paws = new Google_Service_Spectrum_Paws_Resource(
            $this,
            $this->serviceName,
            'paws',
            [
                'methods' => [
                    'getSpectrum' => [
                        'path' => 'getSpectrum',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'getSpectrumBatch' => [
                        'path' => 'getSpectrumBatch',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'init' => [
                        'path' => 'init',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'notifySpectrumUse' => [
                        'path' => 'notifySpectrumUse',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'register' => [
                        'path' => 'register',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'verifyDevice' => [
                        'path' => 'verifyDevice',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "paws" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spectrumService = new Google_Service_Spectrum(...);
 *   $paws = $spectrumService->paws;
 *  </code>
 */
class Google_Service_Spectrum_Paws_Resource extends Google_Service_Resource
{

    /**
     * Requests information about the available spectrum for a device at a location.
     * Requests from a fixed-mode device must include owner information so the
     * device can be registered with the database. (paws.getSpectrum)
     *
     * @param Google_PawsGetSpectrumRequest|Google_Service_Spectrum_PawsGetSpectrumRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getSpectrum(Google_Service_Spectrum_PawsGetSpectrumRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getSpectrum', [$params], "Google_Service_Spectrum_PawsGetSpectrumResponse");
    }

    /**
     * The Google Spectrum Database does not support batch requests, so this method
     * always yields an UNIMPLEMENTED error. (paws.getSpectrumBatch)
     *
     * @param Google_PawsGetSpectrumBatchRequest|Google_Service_Spectrum_PawsGetSpectrumBatchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function getSpectrumBatch(Google_Service_Spectrum_PawsGetSpectrumBatchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('getSpectrumBatch', [$params], "Google_Service_Spectrum_PawsGetSpectrumBatchResponse");
    }

    /**
     * Initializes the connection between a white space device and the database.
     * (paws.init)
     *
     * @param Google_PawsInitRequest|Google_Service_Spectrum_PawsInitRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function init(Google_Service_Spectrum_PawsInitRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('init', [$params], "Google_Service_Spectrum_PawsInitResponse");
    }

    /**
     * Notifies the database that the device has selected certain frequency ranges
     * for transmission. Only to be invoked when required by the regulator. The
     * Google Spectrum Database does not operate in domains that require
     * notification, so this always yields an UNIMPLEMENTED error.
     * (paws.notifySpectrumUse)
     *
     * @param Google_PawsNotifySpectrumUseRequest|Google_Service_Spectrum_PawsNotifySpectrumUseRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function notifySpectrumUse(Google_Service_Spectrum_PawsNotifySpectrumUseRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('notifySpectrumUse', [$params], "Google_Service_Spectrum_PawsNotifySpectrumUseResponse");
    }

    /**
     * The Google Spectrum Database implements registration in the getSpectrum
     * method. As such this always returns an UNIMPLEMENTED error. (paws.register)
     *
     * @param Google_PawsRegisterRequest|Google_Service_Spectrum_PawsRegisterRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function register(Google_Service_Spectrum_PawsRegisterRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('register', [$params], "Google_Service_Spectrum_PawsRegisterResponse");
    }

    /**
     * Validates a device for white space use in accordance with regulatory rules.
     * The Google Spectrum Database does not support master/slave configurations, so
     * this always yields an UNIMPLEMENTED error. (paws.verifyDevice)
     *
     * @param Google_PawsVerifyDeviceRequest|Google_Service_Spectrum_PawsVerifyDeviceRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function verifyDevice(Google_Service_Spectrum_PawsVerifyDeviceRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('verifyDevice', [$params], "Google_Service_Spectrum_PawsVerifyDeviceResponse");
    }
}


/**
 * Class Google_Service_Spectrum_AntennaCharacteristics
 */
class Google_Service_Spectrum_AntennaCharacteristics extends Google_Model
{
    public $height;
    public $heightType;
    public $heightUncertainty;
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
    public function getHeightType()
    {
        return $this->heightType;
    }

    /**
     * @param $heightType
     */
    public function setHeightType($heightType)
    {
        $this->heightType = $heightType;
    }

    /**
     * @return mixed
     */
    public function getHeightUncertainty()
    {
        return $this->heightUncertainty;
    }

    /**
     * @param $heightUncertainty
     */
    public function setHeightUncertainty($heightUncertainty)
    {
        $this->heightUncertainty = $heightUncertainty;
    }
}

/**
 * Class Google_Service_Spectrum_DatabaseSpec
 */
class Google_Service_Spectrum_DatabaseSpec extends Google_Model
{
    public $name;
    public $uri;
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
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}

/**
 * Class Google_Service_Spectrum_DbUpdateSpec
 */
class Google_Service_Spectrum_DbUpdateSpec extends Google_Collection
{
    protected $collection_key = 'databases';
    protected $internal_gapi_mappings = [];
    protected $databasesType = 'Google_Service_Spectrum_DatabaseSpec';
    protected $databasesDataType = 'array';


    /**
     * @param $databases
     */
    public function setDatabases($databases)
    {
        $this->databases = $databases;
    }

    /**
     * @return mixed
     */
    public function getDatabases()
    {
        return $this->databases;
    }
}

/**
 * Class Google_Service_Spectrum_DeviceCapabilities
 */
class Google_Service_Spectrum_DeviceCapabilities extends Google_Collection
{
    protected $collection_key = 'frequencyRanges';
    protected $internal_gapi_mappings = [];
    protected $frequencyRangesType = 'Google_Service_Spectrum_FrequencyRange';
    protected $frequencyRangesDataType = 'array';


    /**
     * @param $frequencyRanges
     */
    public function setFrequencyRanges($frequencyRanges)
    {
        $this->frequencyRanges = $frequencyRanges;
    }

    /**
     * @return mixed
     */
    public function getFrequencyRanges()
    {
        return $this->frequencyRanges;
    }
}

/**
 * Class Google_Service_Spectrum_DeviceDescriptor
 */
class Google_Service_Spectrum_DeviceDescriptor extends Google_Collection
{
    public $etsiEnDeviceCategory;
    public $etsiEnDeviceEmissionsClass;
    public $etsiEnDeviceType;
    public $etsiEnTechnologyId;
    public $fccId;
    public $fccTvbdDeviceType;
    public $manufacturerId;
    public $modelId;
    public $rulesetIds;
    public $serialNumber;
    protected $collection_key = 'rulesetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEtsiEnDeviceCategory()
    {
        return $this->etsiEnDeviceCategory;
    }

    /**
     * @param $etsiEnDeviceCategory
     */
    public function setEtsiEnDeviceCategory($etsiEnDeviceCategory)
    {
        $this->etsiEnDeviceCategory = $etsiEnDeviceCategory;
    }

    /**
     * @return mixed
     */
    public function getEtsiEnDeviceEmissionsClass()
    {
        return $this->etsiEnDeviceEmissionsClass;
    }

    /**
     * @param $etsiEnDeviceEmissionsClass
     */
    public function setEtsiEnDeviceEmissionsClass($etsiEnDeviceEmissionsClass)
    {
        $this->etsiEnDeviceEmissionsClass = $etsiEnDeviceEmissionsClass;
    }

    /**
     * @return mixed
     */
    public function getEtsiEnDeviceType()
    {
        return $this->etsiEnDeviceType;
    }

    /**
     * @param $etsiEnDeviceType
     */
    public function setEtsiEnDeviceType($etsiEnDeviceType)
    {
        $this->etsiEnDeviceType = $etsiEnDeviceType;
    }

    /**
     * @return mixed
     */
    public function getEtsiEnTechnologyId()
    {
        return $this->etsiEnTechnologyId;
    }

    /**
     * @param $etsiEnTechnologyId
     */
    public function setEtsiEnTechnologyId($etsiEnTechnologyId)
    {
        $this->etsiEnTechnologyId = $etsiEnTechnologyId;
    }

    /**
     * @return mixed
     */
    public function getFccId()
    {
        return $this->fccId;
    }

    /**
     * @param $fccId
     */
    public function setFccId($fccId)
    {
        $this->fccId = $fccId;
    }

    /**
     * @return mixed
     */
    public function getFccTvbdDeviceType()
    {
        return $this->fccTvbdDeviceType;
    }

    /**
     * @param $fccTvbdDeviceType
     */
    public function setFccTvbdDeviceType($fccTvbdDeviceType)
    {
        $this->fccTvbdDeviceType = $fccTvbdDeviceType;
    }

    /**
     * @return mixed
     */
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param $manufacturerId
     */
    public function setManufacturerId($manufacturerId)
    {
        $this->manufacturerId = $manufacturerId;
    }

    /**
     * @return mixed
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * @param $modelId
     */
    public function setModelId($modelId)
    {
        $this->modelId = $modelId;
    }

    /**
     * @return mixed
     */
    public function getRulesetIds()
    {
        return $this->rulesetIds;
    }

    /**
     * @param $rulesetIds
     */
    public function setRulesetIds($rulesetIds)
    {
        $this->rulesetIds = $rulesetIds;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }
}

/**
 * Class Google_Service_Spectrum_DeviceOwner
 */
class Google_Service_Spectrum_DeviceOwner extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $operatorType = 'Google_Service_Spectrum_Vcard';
    protected $operatorDataType = '';
    protected $ownerType = 'Google_Service_Spectrum_Vcard';
    protected $ownerDataType = '';


    /**
     * @param Google_Service_Spectrum_Vcard $operator
     */
    public function setOperator(Google_Service_Spectrum_Vcard $operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param Google_Service_Spectrum_Vcard $owner
     */
    public function setOwner(Google_Service_Spectrum_Vcard $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }
}

/**
 * Class Google_Service_Spectrum_DeviceValidity
 */
class Google_Service_Spectrum_DeviceValidity extends Google_Model
{
    public $isValid;
    public $reason;
    protected $internal_gapi_mappings = [];
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @param $isValid
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
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

/**
 * Class Google_Service_Spectrum_EventTime
 */
class Google_Service_Spectrum_EventTime extends Google_Model
{
    public $startTime;
    public $stopTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getStopTime()
    {
        return $this->stopTime;
    }

    /**
     * @param $stopTime
     */
    public function setStopTime($stopTime)
    {
        $this->stopTime = $stopTime;
    }
}

/**
 * Class Google_Service_Spectrum_FrequencyRange
 */
class Google_Service_Spectrum_FrequencyRange extends Google_Model
{
    public $channelId;
    public $maxPowerDBm;
    public $startHz;
    public $stopHz;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * @param $channelId
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return mixed
     */
    public function getMaxPowerDBm()
    {
        return $this->maxPowerDBm;
    }

    /**
     * @param $maxPowerDBm
     */
    public function setMaxPowerDBm($maxPowerDBm)
    {
        $this->maxPowerDBm = $maxPowerDBm;
    }

    /**
     * @return mixed
     */
    public function getStartHz()
    {
        return $this->startHz;
    }

    /**
     * @param $startHz
     */
    public function setStartHz($startHz)
    {
        $this->startHz = $startHz;
    }

    /**
     * @return mixed
     */
    public function getStopHz()
    {
        return $this->stopHz;
    }

    /**
     * @param $stopHz
     */
    public function setStopHz($stopHz)
    {
        $this->stopHz = $stopHz;
    }
}

/**
 * Class Google_Service_Spectrum_GeoLocation
 */
class Google_Service_Spectrum_GeoLocation extends Google_Model
{
    public $confidence;
    protected $internal_gapi_mappings = [];
    protected $pointType = 'Google_Service_Spectrum_GeoLocationEllipse';
    protected $pointDataType = '';
    protected $regionType = 'Google_Service_Spectrum_GeoLocationPolygon';
    protected $regionDataType = '';

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
     * @param Google_Service_Spectrum_GeoLocationEllipse $point
     */
    public function setPoint(Google_Service_Spectrum_GeoLocationEllipse $point)
    {
        $this->point = $point;
    }

    /**
     * @return mixed
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param Google_Service_Spectrum_GeoLocationPolygon $region
     */
    public function setRegion(Google_Service_Spectrum_GeoLocationPolygon $region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }
}

/**
 * Class Google_Service_Spectrum_GeoLocationEllipse
 */
class Google_Service_Spectrum_GeoLocationEllipse extends Google_Model
{
    public $orientation;
    public $semiMajorAxis;
    public $semiMinorAxis;
    protected $internal_gapi_mappings = [];
    protected $centerType = 'Google_Service_Spectrum_GeoLocationPoint';
    protected $centerDataType = '';

    /**
     * @param Google_Service_Spectrum_GeoLocationPoint $center
     */
    public function setCenter(Google_Service_Spectrum_GeoLocationPoint $center)
    {
        $this->center = $center;
    }

    /**
     * @return mixed
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @return mixed
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param $orientation
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    /**
     * @return mixed
     */
    public function getSemiMajorAxis()
    {
        return $this->semiMajorAxis;
    }

    /**
     * @param $semiMajorAxis
     */
    public function setSemiMajorAxis($semiMajorAxis)
    {
        $this->semiMajorAxis = $semiMajorAxis;
    }

    /**
     * @return mixed
     */
    public function getSemiMinorAxis()
    {
        return $this->semiMinorAxis;
    }

    /**
     * @param $semiMinorAxis
     */
    public function setSemiMinorAxis($semiMinorAxis)
    {
        $this->semiMinorAxis = $semiMinorAxis;
    }
}

/**
 * Class Google_Service_Spectrum_GeoLocationPoint
 */
class Google_Service_Spectrum_GeoLocationPoint extends Google_Model
{
    public $latitude;
    public $longitude;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}

/**
 * Class Google_Service_Spectrum_GeoLocationPolygon
 */
class Google_Service_Spectrum_GeoLocationPolygon extends Google_Collection
{
    protected $collection_key = 'exterior';
    protected $internal_gapi_mappings = [];
    protected $exteriorType = 'Google_Service_Spectrum_GeoLocationPoint';
    protected $exteriorDataType = 'array';


    /**
     * @param $exterior
     */
    public function setExterior($exterior)
    {
        $this->exterior = $exterior;
    }

    /**
     * @return mixed
     */
    public function getExterior()
    {
        return $this->exterior;
    }
}

/**
 * Class Google_Service_Spectrum_GeoSpectrumSchedule
 */
class Google_Service_Spectrum_GeoSpectrumSchedule extends Google_Collection
{
    protected $collection_key = 'spectrumSchedules';
    protected $internal_gapi_mappings = [];
    protected $locationType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationDataType = '';
    protected $spectrumSchedulesType = 'Google_Service_Spectrum_SpectrumSchedule';
    protected $spectrumSchedulesDataType = 'array';


    /**
     * @param Google_Service_Spectrum_GeoLocation $location
     */
    public function setLocation(Google_Service_Spectrum_GeoLocation $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $spectrumSchedules
     */
    public function setSpectrumSchedules($spectrumSchedules)
    {
        $this->spectrumSchedules = $spectrumSchedules;
    }

    /**
     * @return mixed
     */
    public function getSpectrumSchedules()
    {
        return $this->spectrumSchedules;
    }
}

/**
 * Class Google_Service_Spectrum_PawsGetSpectrumBatchRequest
 */
class Google_Service_Spectrum_PawsGetSpectrumBatchRequest extends Google_Collection
{
    public $requestType;
    public $type;
    public $version;
    protected $collection_key = 'locations';
    protected $internal_gapi_mappings = [];
    protected $antennaType = 'Google_Service_Spectrum_AntennaCharacteristics';
    protected $antennaDataType = '';
    protected $capabilitiesType = 'Google_Service_Spectrum_DeviceCapabilities';
    protected $capabilitiesDataType = '';
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $locationsType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationsDataType = 'array';
    protected $masterDeviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $masterDeviceDescDataType = '';
    protected $ownerType = 'Google_Service_Spectrum_DeviceOwner';
    protected $ownerDataType = '';

    /**
     * @param Google_Service_Spectrum_AntennaCharacteristics $antenna
     */
    public function setAntenna(Google_Service_Spectrum_AntennaCharacteristics $antenna)
    {
        $this->antenna = $antenna;
    }

    /**
     * @return mixed
     */
    public function getAntenna()
    {
        return $this->antenna;
    }

    /**
     * @param Google_Service_Spectrum_DeviceCapabilities $capabilities
     */
    public function setCapabilities(Google_Service_Spectrum_DeviceCapabilities $capabilities)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * @return mixed
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param $locations
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    /**
     * @return mixed
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $masterDeviceDesc
     */
    public function setMasterDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $masterDeviceDesc)
    {
        $this->masterDeviceDesc = $masterDeviceDesc;
    }

    /**
     * @return mixed
     */
    public function getMasterDeviceDesc()
    {
        return $this->masterDeviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_DeviceOwner $owner
     */
    public function setOwner(Google_Service_Spectrum_DeviceOwner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * @param $requestType
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;
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
 * Class Google_Service_Spectrum_PawsGetSpectrumBatchResponse
 */
class Google_Service_Spectrum_PawsGetSpectrumBatchResponse extends Google_Collection
{
    public $kind;
    public $maxContiguousBwHz;
    public $maxTotalBwHz;
    public $needsSpectrumReport;
    public $timestamp;
    public $type;
    public $version;
    protected $collection_key = 'geoSpectrumSchedules';
    protected $internal_gapi_mappings = [];
    protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
    protected $databaseChangeDataType = '';
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $geoSpectrumSchedulesType = 'Google_Service_Spectrum_GeoSpectrumSchedule';
    protected $geoSpectrumSchedulesDataType = 'array';
    protected $rulesetInfoType = 'Google_Service_Spectrum_RulesetInfo';
    protected $rulesetInfoDataType = '';

    /**
     * @param Google_Service_Spectrum_DbUpdateSpec $databaseChange
     */
    public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
    {
        $this->databaseChange = $databaseChange;
    }

    /**
     * @return mixed
     */
    public function getDatabaseChange()
    {
        return $this->databaseChange;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param $geoSpectrumSchedules
     */
    public function setGeoSpectrumSchedules($geoSpectrumSchedules)
    {
        $this->geoSpectrumSchedules = $geoSpectrumSchedules;
    }

    /**
     * @return mixed
     */
    public function getGeoSpectrumSchedules()
    {
        return $this->geoSpectrumSchedules;
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
    public function getMaxContiguousBwHz()
    {
        return $this->maxContiguousBwHz;
    }

    /**
     * @param $maxContiguousBwHz
     */
    public function setMaxContiguousBwHz($maxContiguousBwHz)
    {
        $this->maxContiguousBwHz = $maxContiguousBwHz;
    }

    /**
     * @return mixed
     */
    public function getMaxTotalBwHz()
    {
        return $this->maxTotalBwHz;
    }

    /**
     * @param $maxTotalBwHz
     */
    public function setMaxTotalBwHz($maxTotalBwHz)
    {
        $this->maxTotalBwHz = $maxTotalBwHz;
    }

    /**
     * @return mixed
     */
    public function getNeedsSpectrumReport()
    {
        return $this->needsSpectrumReport;
    }

    /**
     * @param $needsSpectrumReport
     */
    public function setNeedsSpectrumReport($needsSpectrumReport)
    {
        $this->needsSpectrumReport = $needsSpectrumReport;
    }

    /**
     * @param Google_Service_Spectrum_RulesetInfo $rulesetInfo
     */
    public function setRulesetInfo(Google_Service_Spectrum_RulesetInfo $rulesetInfo)
    {
        $this->rulesetInfo = $rulesetInfo;
    }

    /**
     * @return mixed
     */
    public function getRulesetInfo()
    {
        return $this->rulesetInfo;
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
 * Class Google_Service_Spectrum_PawsGetSpectrumRequest
 */
class Google_Service_Spectrum_PawsGetSpectrumRequest extends Google_Model
{
    public $requestType;
    public $type;
    public $version;
    protected $internal_gapi_mappings = [];
    protected $antennaType = 'Google_Service_Spectrum_AntennaCharacteristics';
    protected $antennaDataType = '';
    protected $capabilitiesType = 'Google_Service_Spectrum_DeviceCapabilities';
    protected $capabilitiesDataType = '';
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $locationType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationDataType = '';
    protected $masterDeviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $masterDeviceDescDataType = '';
    protected $ownerType = 'Google_Service_Spectrum_DeviceOwner';
    protected $ownerDataType = '';

    /**
     * @param Google_Service_Spectrum_AntennaCharacteristics $antenna
     */
    public function setAntenna(Google_Service_Spectrum_AntennaCharacteristics $antenna)
    {
        $this->antenna = $antenna;
    }

    /**
     * @return mixed
     */
    public function getAntenna()
    {
        return $this->antenna;
    }

    /**
     * @param Google_Service_Spectrum_DeviceCapabilities $capabilities
     */
    public function setCapabilities(Google_Service_Spectrum_DeviceCapabilities $capabilities)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * @return mixed
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_GeoLocation $location
     */
    public function setLocation(Google_Service_Spectrum_GeoLocation $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $masterDeviceDesc
     */
    public function setMasterDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $masterDeviceDesc)
    {
        $this->masterDeviceDesc = $masterDeviceDesc;
    }

    /**
     * @return mixed
     */
    public function getMasterDeviceDesc()
    {
        return $this->masterDeviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_DeviceOwner $owner
     */
    public function setOwner(Google_Service_Spectrum_DeviceOwner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * @param $requestType
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;
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
 * Class Google_Service_Spectrum_PawsGetSpectrumResponse
 */
class Google_Service_Spectrum_PawsGetSpectrumResponse extends Google_Collection
{
    public $kind;
    public $maxContiguousBwHz;
    public $maxTotalBwHz;
    public $needsSpectrumReport;
    public $timestamp;
    public $type;
    public $version;
    protected $collection_key = 'spectrumSchedules';
    protected $internal_gapi_mappings = [];
    protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
    protected $databaseChangeDataType = '';
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $rulesetInfoType = 'Google_Service_Spectrum_RulesetInfo';
    protected $rulesetInfoDataType = '';
    protected $spectrumSchedulesType = 'Google_Service_Spectrum_SpectrumSchedule';
    protected $spectrumSchedulesDataType = 'array';

    /**
     * @param Google_Service_Spectrum_DbUpdateSpec $databaseChange
     */
    public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
    {
        $this->databaseChange = $databaseChange;
    }

    /**
     * @return mixed
     */
    public function getDatabaseChange()
    {
        return $this->databaseChange;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
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
    public function getMaxContiguousBwHz()
    {
        return $this->maxContiguousBwHz;
    }

    /**
     * @param $maxContiguousBwHz
     */
    public function setMaxContiguousBwHz($maxContiguousBwHz)
    {
        $this->maxContiguousBwHz = $maxContiguousBwHz;
    }

    /**
     * @return mixed
     */
    public function getMaxTotalBwHz()
    {
        return $this->maxTotalBwHz;
    }

    /**
     * @param $maxTotalBwHz
     */
    public function setMaxTotalBwHz($maxTotalBwHz)
    {
        $this->maxTotalBwHz = $maxTotalBwHz;
    }

    /**
     * @return mixed
     */
    public function getNeedsSpectrumReport()
    {
        return $this->needsSpectrumReport;
    }

    /**
     * @param $needsSpectrumReport
     */
    public function setNeedsSpectrumReport($needsSpectrumReport)
    {
        $this->needsSpectrumReport = $needsSpectrumReport;
    }

    /**
     * @param Google_Service_Spectrum_RulesetInfo $rulesetInfo
     */
    public function setRulesetInfo(Google_Service_Spectrum_RulesetInfo $rulesetInfo)
    {
        $this->rulesetInfo = $rulesetInfo;
    }

    /**
     * @return mixed
     */
    public function getRulesetInfo()
    {
        return $this->rulesetInfo;
    }

    /**
     * @param $spectrumSchedules
     */
    public function setSpectrumSchedules($spectrumSchedules)
    {
        $this->spectrumSchedules = $spectrumSchedules;
    }

    /**
     * @return mixed
     */
    public function getSpectrumSchedules()
    {
        return $this->spectrumSchedules;
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
 * Class Google_Service_Spectrum_PawsInitRequest
 */
class Google_Service_Spectrum_PawsInitRequest extends Google_Model
{
    public $type;
    public $version;
    protected $internal_gapi_mappings = [];
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $locationType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationDataType = '';

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_GeoLocation $location
     */
    public function setLocation(Google_Service_Spectrum_GeoLocation $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
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
 * Class Google_Service_Spectrum_PawsInitResponse
 */
class Google_Service_Spectrum_PawsInitResponse extends Google_Model
{
    public $kind;
    public $type;
    public $version;
    protected $internal_gapi_mappings = [];
    protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
    protected $databaseChangeDataType = '';
    protected $rulesetInfoType = 'Google_Service_Spectrum_RulesetInfo';
    protected $rulesetInfoDataType = '';

    /**
     * @param Google_Service_Spectrum_DbUpdateSpec $databaseChange
     */
    public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
    {
        $this->databaseChange = $databaseChange;
    }

    /**
     * @return mixed
     */
    public function getDatabaseChange()
    {
        return $this->databaseChange;
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
     * @param Google_Service_Spectrum_RulesetInfo $rulesetInfo
     */
    public function setRulesetInfo(Google_Service_Spectrum_RulesetInfo $rulesetInfo)
    {
        $this->rulesetInfo = $rulesetInfo;
    }

    /**
     * @return mixed
     */
    public function getRulesetInfo()
    {
        return $this->rulesetInfo;
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
 * Class Google_Service_Spectrum_PawsNotifySpectrumUseRequest
 */
class Google_Service_Spectrum_PawsNotifySpectrumUseRequest extends Google_Collection
{
    public $type;
    public $version;
    protected $collection_key = 'spectra';
    protected $internal_gapi_mappings = [];
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $locationType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationDataType = '';
    protected $spectraType = 'Google_Service_Spectrum_SpectrumMessage';
    protected $spectraDataType = 'array';

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_GeoLocation $location
     */
    public function setLocation(Google_Service_Spectrum_GeoLocation $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $spectra
     */
    public function setSpectra($spectra)
    {
        $this->spectra = $spectra;
    }

    /**
     * @return mixed
     */
    public function getSpectra()
    {
        return $this->spectra;
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
 * Class Google_Service_Spectrum_PawsNotifySpectrumUseResponse
 */
class Google_Service_Spectrum_PawsNotifySpectrumUseResponse extends Google_Model
{
    public $kind;
    public $type;
    public $version;
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
 * Class Google_Service_Spectrum_PawsRegisterRequest
 */
class Google_Service_Spectrum_PawsRegisterRequest extends Google_Model
{
    public $type;
    public $version;
    protected $internal_gapi_mappings = [];
    protected $antennaType = 'Google_Service_Spectrum_AntennaCharacteristics';
    protected $antennaDataType = '';
    protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescDataType = '';
    protected $deviceOwnerType = 'Google_Service_Spectrum_DeviceOwner';
    protected $deviceOwnerDataType = '';
    protected $locationType = 'Google_Service_Spectrum_GeoLocation';
    protected $locationDataType = '';

    /**
     * @param Google_Service_Spectrum_AntennaCharacteristics $antenna
     */
    public function setAntenna(Google_Service_Spectrum_AntennaCharacteristics $antenna)
    {
        $this->antenna = $antenna;
    }

    /**
     * @return mixed
     */
    public function getAntenna()
    {
        return $this->antenna;
    }

    /**
     * @param Google_Service_Spectrum_DeviceDescriptor $deviceDesc
     */
    public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
    {
        $this->deviceDesc = $deviceDesc;
    }

    /**
     * @return mixed
     */
    public function getDeviceDesc()
    {
        return $this->deviceDesc;
    }

    /**
     * @param Google_Service_Spectrum_DeviceOwner $deviceOwner
     */
    public function setDeviceOwner(Google_Service_Spectrum_DeviceOwner $deviceOwner)
    {
        $this->deviceOwner = $deviceOwner;
    }

    /**
     * @return mixed
     */
    public function getDeviceOwner()
    {
        return $this->deviceOwner;
    }

    /**
     * @param Google_Service_Spectrum_GeoLocation $location
     */
    public function setLocation(Google_Service_Spectrum_GeoLocation $location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
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
 * Class Google_Service_Spectrum_PawsRegisterResponse
 */
class Google_Service_Spectrum_PawsRegisterResponse extends Google_Model
{
    public $kind;
    public $type;
    public $version;
    protected $internal_gapi_mappings = [];
    protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
    protected $databaseChangeDataType = '';

    /**
     * @param Google_Service_Spectrum_DbUpdateSpec $databaseChange
     */
    public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
    {
        $this->databaseChange = $databaseChange;
    }

    /**
     * @return mixed
     */
    public function getDatabaseChange()
    {
        return $this->databaseChange;
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
 * Class Google_Service_Spectrum_PawsVerifyDeviceRequest
 */
class Google_Service_Spectrum_PawsVerifyDeviceRequest extends Google_Collection
{
    public $type;
    public $version;
    protected $collection_key = 'deviceDescs';
    protected $internal_gapi_mappings = [];
    protected $deviceDescsType = 'Google_Service_Spectrum_DeviceDescriptor';
    protected $deviceDescsDataType = 'array';

    /**
     * @param $deviceDescs
     */
    public function setDeviceDescs($deviceDescs)
    {
        $this->deviceDescs = $deviceDescs;
    }

    /**
     * @return mixed
     */
    public function getDeviceDescs()
    {
        return $this->deviceDescs;
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
 * Class Google_Service_Spectrum_PawsVerifyDeviceResponse
 */
class Google_Service_Spectrum_PawsVerifyDeviceResponse extends Google_Collection
{
    public $kind;
    public $type;
    public $version;
    protected $collection_key = 'deviceValidities';
    protected $internal_gapi_mappings = [];
    protected $databaseChangeType = 'Google_Service_Spectrum_DbUpdateSpec';
    protected $databaseChangeDataType = '';
    protected $deviceValiditiesType = 'Google_Service_Spectrum_DeviceValidity';
    protected $deviceValiditiesDataType = 'array';

    /**
     * @param Google_Service_Spectrum_DbUpdateSpec $databaseChange
     */
    public function setDatabaseChange(Google_Service_Spectrum_DbUpdateSpec $databaseChange)
    {
        $this->databaseChange = $databaseChange;
    }

    /**
     * @return mixed
     */
    public function getDatabaseChange()
    {
        return $this->databaseChange;
    }

    /**
     * @param $deviceValidities
     */
    public function setDeviceValidities($deviceValidities)
    {
        $this->deviceValidities = $deviceValidities;
    }

    /**
     * @return mixed
     */
    public function getDeviceValidities()
    {
        return $this->deviceValidities;
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
 * Class Google_Service_Spectrum_RulesetInfo
 */
class Google_Service_Spectrum_RulesetInfo extends Google_Collection
{
    public $authority;
    public $maxLocationChange;
    public $maxPollingSecs;
    public $rulesetIds;
    protected $collection_key = 'rulesetIds';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * @param $authority
     */
    public function setAuthority($authority)
    {
        $this->authority = $authority;
    }

    /**
     * @return mixed
     */
    public function getMaxLocationChange()
    {
        return $this->maxLocationChange;
    }

    /**
     * @param $maxLocationChange
     */
    public function setMaxLocationChange($maxLocationChange)
    {
        $this->maxLocationChange = $maxLocationChange;
    }

    /**
     * @return mixed
     */
    public function getMaxPollingSecs()
    {
        return $this->maxPollingSecs;
    }

    /**
     * @param $maxPollingSecs
     */
    public function setMaxPollingSecs($maxPollingSecs)
    {
        $this->maxPollingSecs = $maxPollingSecs;
    }

    /**
     * @return mixed
     */
    public function getRulesetIds()
    {
        return $this->rulesetIds;
    }

    /**
     * @param $rulesetIds
     */
    public function setRulesetIds($rulesetIds)
    {
        $this->rulesetIds = $rulesetIds;
    }
}

/**
 * Class Google_Service_Spectrum_SpectrumMessage
 */
class Google_Service_Spectrum_SpectrumMessage extends Google_Collection
{
    public $bandwidth;
    protected $collection_key = 'frequencyRanges';
    protected $internal_gapi_mappings = [];
    protected $frequencyRangesType = 'Google_Service_Spectrum_FrequencyRange';
    protected $frequencyRangesDataType = 'array';

    /**
     * @return mixed
     */
    public function getBandwidth()
    {
        return $this->bandwidth;
    }

    /**
     * @param $bandwidth
     */
    public function setBandwidth($bandwidth)
    {
        $this->bandwidth = $bandwidth;
    }

    /**
     * @param $frequencyRanges
     */
    public function setFrequencyRanges($frequencyRanges)
    {
        $this->frequencyRanges = $frequencyRanges;
    }

    /**
     * @return mixed
     */
    public function getFrequencyRanges()
    {
        return $this->frequencyRanges;
    }
}

/**
 * Class Google_Service_Spectrum_SpectrumSchedule
 */
class Google_Service_Spectrum_SpectrumSchedule extends Google_Collection
{
    protected $collection_key = 'spectra';
    protected $internal_gapi_mappings = [];
    protected $eventTimeType = 'Google_Service_Spectrum_EventTime';
    protected $eventTimeDataType = '';
    protected $spectraType = 'Google_Service_Spectrum_SpectrumMessage';
    protected $spectraDataType = 'array';


    /**
     * @param Google_Service_Spectrum_EventTime $eventTime
     */
    public function setEventTime(Google_Service_Spectrum_EventTime $eventTime)
    {
        $this->eventTime = $eventTime;
    }

    /**
     * @return mixed
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * @param $spectra
     */
    public function setSpectra($spectra)
    {
        $this->spectra = $spectra;
    }

    /**
     * @return mixed
     */
    public function getSpectra()
    {
        return $this->spectra;
    }
}

/**
 * Class Google_Service_Spectrum_Vcard
 */
class Google_Service_Spectrum_Vcard extends Google_Model
{
    public $fn;
    protected $internal_gapi_mappings = [];
    protected $adrType = 'Google_Service_Spectrum_VcardAddress';
    protected $adrDataType = '';
    protected $emailType = 'Google_Service_Spectrum_VcardTypedText';
    protected $emailDataType = '';
    protected $orgType = 'Google_Service_Spectrum_VcardTypedText';
    protected $orgDataType = '';
    protected $telType = 'Google_Service_Spectrum_VcardTelephone';
    protected $telDataType = '';


    /**
     * @param Google_Service_Spectrum_VcardAddress $adr
     */
    public function setAdr(Google_Service_Spectrum_VcardAddress $adr)
    {
        $this->adr = $adr;
    }

    /**
     * @return mixed
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * @param Google_Service_Spectrum_VcardTypedText $email
     */
    public function setEmail(Google_Service_Spectrum_VcardTypedText $email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * @param $fn
     */
    public function setFn($fn)
    {
        $this->fn = $fn;
    }

    /**
     * @param Google_Service_Spectrum_VcardTypedText $org
     */
    public function setOrg(Google_Service_Spectrum_VcardTypedText $org)
    {
        $this->org = $org;
    }

    /**
     * @return mixed
     */
    public function getOrg()
    {
        return $this->org;
    }

    /**
     * @param Google_Service_Spectrum_VcardTelephone $tel
     */
    public function setTel(Google_Service_Spectrum_VcardTelephone $tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }
}

/**
 * Class Google_Service_Spectrum_VcardAddress
 */
class Google_Service_Spectrum_VcardAddress extends Google_Model
{
    public $code;
    public $country;
    public $locality;
    public $pobox;
    public $region;
    public $street;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return mixed
     */
    public function getPobox()
    {
        return $this->pobox;
    }

    /**
     * @param $pobox
     */
    public function setPobox($pobox)
    {
        $this->pobox = $pobox;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }
}

/**
 * Class Google_Service_Spectrum_VcardTelephone
 */
class Google_Service_Spectrum_VcardTelephone extends Google_Model
{
    public $uri;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }
}

/**
 * Class Google_Service_Spectrum_VcardTypedText
 */
class Google_Service_Spectrum_VcardTypedText extends Google_Model
{
    public $text;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
