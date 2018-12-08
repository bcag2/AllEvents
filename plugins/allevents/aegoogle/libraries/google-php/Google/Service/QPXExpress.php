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
 * Service definition for QPXExpress (v1).
 *
 * <p>
 * Lets you find the least expensive flights between an origin and a
 * destination.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/qpx-express" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_QPXExpress extends Google_Service
{


    public $trips;


    /**
     * Constructs the internal representation of the QPXExpress service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'qpxExpress/v1/trips/';
        $this->version = 'v1';
        $this->serviceName = 'qpxExpress';

        $this->trips = new Google_Service_QPXExpress_Trips_Resource(
            $this,
            $this->serviceName,
            'trips',
            [
                'methods' => [
                    'search' => [
                        'path' => 'search',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "trips" collection of methods.
 * Typical usage is:
 *  <code>
 *   $qpxExpressService = new Google_Service_QPXExpress(...);
 *   $trips = $qpxExpressService->trips;
 *  </code>
 */
class Google_Service_QPXExpress_Trips_Resource extends Google_Service_Resource
{

    /**
     * Returns a list of flights. (trips.search)
     *
     * @param Google_Service_QPXExpress_TripsSearchRequest|Google_TripsSearchRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function search(Google_Service_QPXExpress_TripsSearchRequest $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('search', [$params], "Google_Service_QPXExpress_TripsSearchResponse");
    }
}


/**
 * Class Google_Service_QPXExpress_AircraftData
 */
class Google_Service_QPXExpress_AircraftData extends Google_Model
{
    public $code;
    public $kind;
    public $name;
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
 * Class Google_Service_QPXExpress_AirportData
 */
class Google_Service_QPXExpress_AirportData extends Google_Model
{
    public $city;
    public $code;
    public $kind;
    public $name;
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
 * Class Google_Service_QPXExpress_BagDescriptor
 */
class Google_Service_QPXExpress_BagDescriptor extends Google_Collection
{
    public $commercialName;
    public $count;
    public $description;
    public $kind;
    public $subcode;
    protected $collection_key = 'description';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommercialName()
    {
        return $this->commercialName;
    }

    /**
     * @param $commercialName
     */
    public function setCommercialName($commercialName)
    {
        $this->commercialName = $commercialName;
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getSubcode()
    {
        return $this->subcode;
    }

    /**
     * @param $subcode
     */
    public function setSubcode($subcode)
    {
        $this->subcode = $subcode;
    }
}

/**
 * Class Google_Service_QPXExpress_CarrierData
 */
class Google_Service_QPXExpress_CarrierData extends Google_Model
{
    public $code;
    public $kind;
    public $name;
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
 * Class Google_Service_QPXExpress_CityData
 */
class Google_Service_QPXExpress_CityData extends Google_Model
{
    public $code;
    public $country;
    public $kind;
    public $name;
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
 * Class Google_Service_QPXExpress_Data
 */
class Google_Service_QPXExpress_Data extends Google_Collection
{
    public $kind;
    protected $collection_key = 'tax';
    protected $internal_gapi_mappings = [];
    protected $aircraftType = 'Google_Service_QPXExpress_AircraftData';
    protected $aircraftDataType = 'array';
    protected $airportType = 'Google_Service_QPXExpress_AirportData';
    protected $airportDataType = 'array';
    protected $carrierType = 'Google_Service_QPXExpress_CarrierData';
    protected $carrierDataType = 'array';
    protected $cityType = 'Google_Service_QPXExpress_CityData';
    protected $cityDataType = 'array';
    protected $taxType = 'Google_Service_QPXExpress_TaxData';
    protected $taxDataType = 'array';


    /**
     * @param $aircraft
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;
    }

    /**
     * @return mixed
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @param $airport
     */
    public function setAirport($airport)
    {
        $this->airport = $airport;
    }

    /**
     * @return mixed
     */
    public function getAirport()
    {
        return $this->airport;
    }

    /**
     * @param $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return mixed
     */
    public function getCarrier()
    {
        return $this->carrier;
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
    public function getCity()
    {
        return $this->city;
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
     * @param $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }
}

/**
 * Class Google_Service_QPXExpress_FareInfo
 */
class Google_Service_QPXExpress_FareInfo extends Google_Model
{
    public $basisCode;
    public $carrier;
    public $destination;
    public $id;
    public $kind;
    public $origin;
    public $private;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBasisCode()
    {
        return $this->basisCode;
    }

    /**
     * @param $basisCode
     */
    public function setBasisCode($basisCode)
    {
        $this->basisCode = $basisCode;
    }

    /**
     * @return mixed
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
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
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }
}

/**
 * Class Google_Service_QPXExpress_FlightInfo
 */
class Google_Service_QPXExpress_FlightInfo extends Google_Model
{
    public $carrier;
    public $number;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}

/**
 * Class Google_Service_QPXExpress_FreeBaggageAllowance
 */
class Google_Service_QPXExpress_FreeBaggageAllowance extends Google_Collection
{
    public $kilos;
    public $kilosPerPiece;
    public $kind;
    public $pieces;
    public $pounds;
    protected $collection_key = 'bagDescriptor';
    protected $internal_gapi_mappings = [];
    protected $bagDescriptorType = 'Google_Service_QPXExpress_BagDescriptor';
    protected $bagDescriptorDataType = 'array';

    /**
     * @param $bagDescriptor
     */
    public function setBagDescriptor($bagDescriptor)
    {
        $this->bagDescriptor = $bagDescriptor;
    }

    /**
     * @return mixed
     */
    public function getBagDescriptor()
    {
        return $this->bagDescriptor;
    }

    /**
     * @return mixed
     */
    public function getKilos()
    {
        return $this->kilos;
    }

    /**
     * @param $kilos
     */
    public function setKilos($kilos)
    {
        $this->kilos = $kilos;
    }

    /**
     * @return mixed
     */
    public function getKilosPerPiece()
    {
        return $this->kilosPerPiece;
    }

    /**
     * @param $kilosPerPiece
     */
    public function setKilosPerPiece($kilosPerPiece)
    {
        $this->kilosPerPiece = $kilosPerPiece;
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
    public function getPieces()
    {
        return $this->pieces;
    }

    /**
     * @param $pieces
     */
    public function setPieces($pieces)
    {
        $this->pieces = $pieces;
    }

    /**
     * @return mixed
     */
    public function getPounds()
    {
        return $this->pounds;
    }

    /**
     * @param $pounds
     */
    public function setPounds($pounds)
    {
        $this->pounds = $pounds;
    }
}

/**
 * Class Google_Service_QPXExpress_LegInfo
 */
class Google_Service_QPXExpress_LegInfo extends Google_Model
{
    public $aircraft;
    public $arrivalTime;
    public $changePlane;
    public $connectionDuration;
    public $departureTime;
    public $destination;
    public $destinationTerminal;
    public $duration;
    public $id;
    public $kind;
    public $meal;
    public $mileage;
    public $onTimePerformance;
    public $operatingDisclosure;
    public $origin;
    public $originTerminal;
    public $secure;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @param $aircraft
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @param $arrivalTime
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @return mixed
     */
    public function getChangePlane()
    {
        return $this->changePlane;
    }

    /**
     * @param $changePlane
     */
    public function setChangePlane($changePlane)
    {
        $this->changePlane = $changePlane;
    }

    /**
     * @return mixed
     */
    public function getConnectionDuration()
    {
        return $this->connectionDuration;
    }

    /**
     * @param $connectionDuration
     */
    public function setConnectionDuration($connectionDuration)
    {
        $this->connectionDuration = $connectionDuration;
    }

    /**
     * @return mixed
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param $departureTime
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDestinationTerminal()
    {
        return $this->destinationTerminal;
    }

    /**
     * @param $destinationTerminal
     */
    public function setDestinationTerminal($destinationTerminal)
    {
        $this->destinationTerminal = $destinationTerminal;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param $meal
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;
    }

    /**
     * @return mixed
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @param $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * @return mixed
     */
    public function getOnTimePerformance()
    {
        return $this->onTimePerformance;
    }

    /**
     * @param $onTimePerformance
     */
    public function setOnTimePerformance($onTimePerformance)
    {
        $this->onTimePerformance = $onTimePerformance;
    }

    /**
     * @return mixed
     */
    public function getOperatingDisclosure()
    {
        return $this->operatingDisclosure;
    }

    /**
     * @param $operatingDisclosure
     */
    public function setOperatingDisclosure($operatingDisclosure)
    {
        $this->operatingDisclosure = $operatingDisclosure;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getOriginTerminal()
    {
        return $this->originTerminal;
    }

    /**
     * @param $originTerminal
     */
    public function setOriginTerminal($originTerminal)
    {
        $this->originTerminal = $originTerminal;
    }

    /**
     * @return mixed
     */
    public function getSecure()
    {
        return $this->secure;
    }

    /**
     * @param $secure
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
    }
}

/**
 * Class Google_Service_QPXExpress_PassengerCounts
 */
class Google_Service_QPXExpress_PassengerCounts extends Google_Model
{
    public $adultCount;
    public $childCount;
    public $infantInLapCount;
    public $infantInSeatCount;
    public $kind;
    public $seniorCount;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdultCount()
    {
        return $this->adultCount;
    }

    /**
     * @param $adultCount
     */
    public function setAdultCount($adultCount)
    {
        $this->adultCount = $adultCount;
    }

    /**
     * @return mixed
     */
    public function getChildCount()
    {
        return $this->childCount;
    }

    /**
     * @param $childCount
     */
    public function setChildCount($childCount)
    {
        $this->childCount = $childCount;
    }

    /**
     * @return mixed
     */
    public function getInfantInLapCount()
    {
        return $this->infantInLapCount;
    }

    /**
     * @param $infantInLapCount
     */
    public function setInfantInLapCount($infantInLapCount)
    {
        $this->infantInLapCount = $infantInLapCount;
    }

    /**
     * @return mixed
     */
    public function getInfantInSeatCount()
    {
        return $this->infantInSeatCount;
    }

    /**
     * @param $infantInSeatCount
     */
    public function setInfantInSeatCount($infantInSeatCount)
    {
        $this->infantInSeatCount = $infantInSeatCount;
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
    public function getSeniorCount()
    {
        return $this->seniorCount;
    }

    /**
     * @param $seniorCount
     */
    public function setSeniorCount($seniorCount)
    {
        $this->seniorCount = $seniorCount;
    }
}

/**
 * Class Google_Service_QPXExpress_PricingInfo
 */
class Google_Service_QPXExpress_PricingInfo extends Google_Collection
{
    public $baseFareTotal;
    public $fareCalculation;
    public $kind;
    public $latestTicketingTime;
    public $ptc;
    public $refundable;
    public $saleFareTotal;
    public $saleTaxTotal;
    public $saleTotal;
    protected $collection_key = 'tax';
    protected $internal_gapi_mappings = [];
    protected $fareType = 'Google_Service_QPXExpress_FareInfo';
    protected $fareDataType = 'array';
    protected $passengersType = 'Google_Service_QPXExpress_PassengerCounts';
    protected $passengersDataType = '';
    protected $segmentPricingType = 'Google_Service_QPXExpress_SegmentPricing';
    protected $segmentPricingDataType = 'array';
    protected $taxType = 'Google_Service_QPXExpress_TaxInfo';
    protected $taxDataType = 'array';

    /**
     * @return mixed
     */
    public function getBaseFareTotal()
    {
        return $this->baseFareTotal;
    }

    /**
     * @param $baseFareTotal
     */
    public function setBaseFareTotal($baseFareTotal)
    {
        $this->baseFareTotal = $baseFareTotal;
    }

    /**
     * @param $fare
     */
    public function setFare($fare)
    {
        $this->fare = $fare;
    }

    /**
     * @return mixed
     */
    public function getFare()
    {
        return $this->fare;
    }

    /**
     * @return mixed
     */
    public function getFareCalculation()
    {
        return $this->fareCalculation;
    }

    /**
     * @param $fareCalculation
     */
    public function setFareCalculation($fareCalculation)
    {
        $this->fareCalculation = $fareCalculation;
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
    public function getLatestTicketingTime()
    {
        return $this->latestTicketingTime;
    }

    /**
     * @param $latestTicketingTime
     */
    public function setLatestTicketingTime($latestTicketingTime)
    {
        $this->latestTicketingTime = $latestTicketingTime;
    }

    /**
     * @param Google_Service_QPXExpress_PassengerCounts $passengers
     */
    public function setPassengers(Google_Service_QPXExpress_PassengerCounts $passengers)
    {
        $this->passengers = $passengers;
    }

    /**
     * @return mixed
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * @return mixed
     */
    public function getPtc()
    {
        return $this->ptc;
    }

    /**
     * @param $ptc
     */
    public function setPtc($ptc)
    {
        $this->ptc = $ptc;
    }

    /**
     * @return mixed
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * @param $refundable
     */
    public function setRefundable($refundable)
    {
        $this->refundable = $refundable;
    }

    /**
     * @return mixed
     */
    public function getSaleFareTotal()
    {
        return $this->saleFareTotal;
    }

    /**
     * @param $saleFareTotal
     */
    public function setSaleFareTotal($saleFareTotal)
    {
        $this->saleFareTotal = $saleFareTotal;
    }

    /**
     * @return mixed
     */
    public function getSaleTaxTotal()
    {
        return $this->saleTaxTotal;
    }

    /**
     * @param $saleTaxTotal
     */
    public function setSaleTaxTotal($saleTaxTotal)
    {
        $this->saleTaxTotal = $saleTaxTotal;
    }

    /**
     * @return mixed
     */
    public function getSaleTotal()
    {
        return $this->saleTotal;
    }

    /**
     * @param $saleTotal
     */
    public function setSaleTotal($saleTotal)
    {
        $this->saleTotal = $saleTotal;
    }

    /**
     * @param $segmentPricing
     */
    public function setSegmentPricing($segmentPricing)
    {
        $this->segmentPricing = $segmentPricing;
    }

    /**
     * @return mixed
     */
    public function getSegmentPricing()
    {
        return $this->segmentPricing;
    }

    /**
     * @param $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }
}

/**
 * Class Google_Service_QPXExpress_SegmentInfo
 */
class Google_Service_QPXExpress_SegmentInfo extends Google_Collection
{
    public $bookingCode;
    public $bookingCodeCount;
    public $cabin;
    public $connectionDuration;
    public $duration;
    public $id;
    public $kind;
    public $marriedSegmentGroup;
    public $subjectToGovernmentApproval;
    protected $collection_key = 'leg';
    protected $internal_gapi_mappings = [];
    protected $flightType = 'Google_Service_QPXExpress_FlightInfo';
    protected $flightDataType = '';
    protected $legType = 'Google_Service_QPXExpress_LegInfo';
    protected $legDataType = 'array';

    /**
     * @return mixed
     */
    public function getBookingCode()
    {
        return $this->bookingCode;
    }

    /**
     * @param $bookingCode
     */
    public function setBookingCode($bookingCode)
    {
        $this->bookingCode = $bookingCode;
    }

    /**
     * @return mixed
     */
    public function getBookingCodeCount()
    {
        return $this->bookingCodeCount;
    }

    /**
     * @param $bookingCodeCount
     */
    public function setBookingCodeCount($bookingCodeCount)
    {
        $this->bookingCodeCount = $bookingCodeCount;
    }

    /**
     * @return mixed
     */
    public function getCabin()
    {
        return $this->cabin;
    }

    /**
     * @param $cabin
     */
    public function setCabin($cabin)
    {
        $this->cabin = $cabin;
    }

    /**
     * @return mixed
     */
    public function getConnectionDuration()
    {
        return $this->connectionDuration;
    }

    /**
     * @param $connectionDuration
     */
    public function setConnectionDuration($connectionDuration)
    {
        $this->connectionDuration = $connectionDuration;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @param Google_Service_QPXExpress_FlightInfo $flight
     */
    public function setFlight(Google_Service_QPXExpress_FlightInfo $flight)
    {
        $this->flight = $flight;
    }

    /**
     * @return mixed
     */
    public function getFlight()
    {
        return $this->flight;
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
     * @param $leg
     */
    public function setLeg($leg)
    {
        $this->leg = $leg;
    }

    /**
     * @return mixed
     */
    public function getLeg()
    {
        return $this->leg;
    }

    /**
     * @return mixed
     */
    public function getMarriedSegmentGroup()
    {
        return $this->marriedSegmentGroup;
    }

    /**
     * @param $marriedSegmentGroup
     */
    public function setMarriedSegmentGroup($marriedSegmentGroup)
    {
        $this->marriedSegmentGroup = $marriedSegmentGroup;
    }

    /**
     * @return mixed
     */
    public function getSubjectToGovernmentApproval()
    {
        return $this->subjectToGovernmentApproval;
    }

    /**
     * @param $subjectToGovernmentApproval
     */
    public function setSubjectToGovernmentApproval($subjectToGovernmentApproval)
    {
        $this->subjectToGovernmentApproval = $subjectToGovernmentApproval;
    }
}

/**
 * Class Google_Service_QPXExpress_SegmentPricing
 */
class Google_Service_QPXExpress_SegmentPricing extends Google_Collection
{
    public $fareId;
    public $kind;
    public $segmentId;
    protected $collection_key = 'freeBaggageOption';
    protected $internal_gapi_mappings = [];
    protected $freeBaggageOptionType = 'Google_Service_QPXExpress_FreeBaggageAllowance';
    protected $freeBaggageOptionDataType = 'array';

    /**
     * @return mixed
     */
    public function getFareId()
    {
        return $this->fareId;
    }

    /**
     * @param $fareId
     */
    public function setFareId($fareId)
    {
        $this->fareId = $fareId;
    }

    /**
     * @param $freeBaggageOption
     */
    public function setFreeBaggageOption($freeBaggageOption)
    {
        $this->freeBaggageOption = $freeBaggageOption;
    }

    /**
     * @return mixed
     */
    public function getFreeBaggageOption()
    {
        return $this->freeBaggageOption;
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
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @param $segmentId
     */
    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;
    }
}

/**
 * Class Google_Service_QPXExpress_SliceInfo
 */
class Google_Service_QPXExpress_SliceInfo extends Google_Collection
{
    public $duration;
    public $kind;
    protected $collection_key = 'segment';
    protected $internal_gapi_mappings = [];
    protected $segmentType = 'Google_Service_QPXExpress_SegmentInfo';
    protected $segmentDataType = 'array';

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * @param $segment
     */
    public function setSegment($segment)
    {
        $this->segment = $segment;
    }

    /**
     * @return mixed
     */
    public function getSegment()
    {
        return $this->segment;
    }
}

/**
 * Class Google_Service_QPXExpress_SliceInput
 */
class Google_Service_QPXExpress_SliceInput extends Google_Collection
{
    public $alliance;
    public $date;
    public $destination;
    public $kind;
    public $maxConnectionDuration;
    public $maxStops;
    public $origin;
    public $permittedCarrier;
    public $preferredCabin;
    public $prohibitedCarrier;
    protected $collection_key = 'prohibitedCarrier';
    protected $internal_gapi_mappings = [];
    protected $permittedDepartureTimeType = 'Google_Service_QPXExpress_TimeOfDayRange';
    protected $permittedDepartureTimeDataType = '';

    /**
     * @return mixed
     */
    public function getAlliance()
    {
        return $this->alliance;
    }

    /**
     * @param $alliance
     */
    public function setAlliance($alliance)
    {
        $this->alliance = $alliance;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
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
    public function getMaxConnectionDuration()
    {
        return $this->maxConnectionDuration;
    }

    /**
     * @param $maxConnectionDuration
     */
    public function setMaxConnectionDuration($maxConnectionDuration)
    {
        $this->maxConnectionDuration = $maxConnectionDuration;
    }

    /**
     * @return mixed
     */
    public function getMaxStops()
    {
        return $this->maxStops;
    }

    /**
     * @param $maxStops
     */
    public function setMaxStops($maxStops)
    {
        $this->maxStops = $maxStops;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getPermittedCarrier()
    {
        return $this->permittedCarrier;
    }

    /**
     * @param $permittedCarrier
     */
    public function setPermittedCarrier($permittedCarrier)
    {
        $this->permittedCarrier = $permittedCarrier;
    }

    /**
     * @param Google_Service_QPXExpress_TimeOfDayRange $permittedDepartureTime
     */
    public function setPermittedDepartureTime(Google_Service_QPXExpress_TimeOfDayRange $permittedDepartureTime)
    {
        $this->permittedDepartureTime = $permittedDepartureTime;
    }

    /**
     * @return mixed
     */
    public function getPermittedDepartureTime()
    {
        return $this->permittedDepartureTime;
    }

    /**
     * @return mixed
     */
    public function getPreferredCabin()
    {
        return $this->preferredCabin;
    }

    /**
     * @param $preferredCabin
     */
    public function setPreferredCabin($preferredCabin)
    {
        $this->preferredCabin = $preferredCabin;
    }

    /**
     * @return mixed
     */
    public function getProhibitedCarrier()
    {
        return $this->prohibitedCarrier;
    }

    /**
     * @param $prohibitedCarrier
     */
    public function setProhibitedCarrier($prohibitedCarrier)
    {
        $this->prohibitedCarrier = $prohibitedCarrier;
    }
}

/**
 * Class Google_Service_QPXExpress_TaxData
 */
class Google_Service_QPXExpress_TaxData extends Google_Model
{
    public $id;
    public $kind;
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
 * Class Google_Service_QPXExpress_TaxInfo
 */
class Google_Service_QPXExpress_TaxInfo extends Google_Model
{
    public $chargeType;
    public $code;
    public $country;
    public $id;
    public $kind;
    public $salePrice;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getChargeType()
    {
        return $this->chargeType;
    }

    /**
     * @param $chargeType
     */
    public function setChargeType($chargeType)
    {
        $this->chargeType = $chargeType;
    }

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
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @param $salePrice
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;
    }
}

/**
 * Class Google_Service_QPXExpress_TimeOfDayRange
 */
class Google_Service_QPXExpress_TimeOfDayRange extends Google_Model
{
    public $earliestTime;
    public $kind;
    public $latestTime;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEarliestTime()
    {
        return $this->earliestTime;
    }

    /**
     * @param $earliestTime
     */
    public function setEarliestTime($earliestTime)
    {
        $this->earliestTime = $earliestTime;
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
    public function getLatestTime()
    {
        return $this->latestTime;
    }

    /**
     * @param $latestTime
     */
    public function setLatestTime($latestTime)
    {
        $this->latestTime = $latestTime;
    }
}

/**
 * Class Google_Service_QPXExpress_TripOption
 */
class Google_Service_QPXExpress_TripOption extends Google_Collection
{
    public $id;
    public $kind;
    public $saleTotal;
    protected $collection_key = 'slice';
    protected $internal_gapi_mappings = [];
    protected $pricingType = 'Google_Service_QPXExpress_PricingInfo';
    protected $pricingDataType = 'array';
    protected $sliceType = 'Google_Service_QPXExpress_SliceInfo';
    protected $sliceDataType = 'array';

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
     * @param $pricing
     */
    public function setPricing($pricing)
    {
        $this->pricing = $pricing;
    }

    /**
     * @return mixed
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * @return mixed
     */
    public function getSaleTotal()
    {
        return $this->saleTotal;
    }

    /**
     * @param $saleTotal
     */
    public function setSaleTotal($saleTotal)
    {
        $this->saleTotal = $saleTotal;
    }

    /**
     * @param $slice
     */
    public function setSlice($slice)
    {
        $this->slice = $slice;
    }

    /**
     * @return mixed
     */
    public function getSlice()
    {
        return $this->slice;
    }
}

/**
 * Class Google_Service_QPXExpress_TripOptionsRequest
 */
class Google_Service_QPXExpress_TripOptionsRequest extends Google_Collection
{
    public $maxPrice;
    public $refundable;
    public $saleCountry;
    public $solutions;
    protected $collection_key = 'slice';
    protected $internal_gapi_mappings = [];
    protected $passengersType = 'Google_Service_QPXExpress_PassengerCounts';
    protected $passengersDataType = '';
    protected $sliceType = 'Google_Service_QPXExpress_SliceInput';
    protected $sliceDataType = 'array';

    /**
     * @return mixed
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * @param $maxPrice
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    /**
     * @param Google_Service_QPXExpress_PassengerCounts $passengers
     */
    public function setPassengers(Google_Service_QPXExpress_PassengerCounts $passengers)
    {
        $this->passengers = $passengers;
    }

    /**
     * @return mixed
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * @return mixed
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * @param $refundable
     */
    public function setRefundable($refundable)
    {
        $this->refundable = $refundable;
    }

    /**
     * @return mixed
     */
    public function getSaleCountry()
    {
        return $this->saleCountry;
    }

    /**
     * @param $saleCountry
     */
    public function setSaleCountry($saleCountry)
    {
        $this->saleCountry = $saleCountry;
    }

    /**
     * @param $slice
     */
    public function setSlice($slice)
    {
        $this->slice = $slice;
    }

    /**
     * @return mixed
     */
    public function getSlice()
    {
        return $this->slice;
    }

    /**
     * @return mixed
     */
    public function getSolutions()
    {
        return $this->solutions;
    }

    /**
     * @param $solutions
     */
    public function setSolutions($solutions)
    {
        $this->solutions = $solutions;
    }
}

/**
 * Class Google_Service_QPXExpress_TripOptionsResponse
 */
class Google_Service_QPXExpress_TripOptionsResponse extends Google_Collection
{
    public $kind;
    public $requestId;
    protected $collection_key = 'tripOption';
    protected $internal_gapi_mappings = [];
    protected $dataType = 'Google_Service_QPXExpress_Data';
    protected $dataDataType = '';
    protected $tripOptionType = 'Google_Service_QPXExpress_TripOption';
    protected $tripOptionDataType = 'array';


    /**
     * @param Google_Service_QPXExpress_Data $data
     */
    public function setData(Google_Service_QPXExpress_Data $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * @param $tripOption
     */
    public function setTripOption($tripOption)
    {
        $this->tripOption = $tripOption;
    }

    /**
     * @return mixed
     */
    public function getTripOption()
    {
        return $this->tripOption;
    }
}

/**
 * Class Google_Service_QPXExpress_TripsSearchRequest
 */
class Google_Service_QPXExpress_TripsSearchRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $requestType = 'Google_Service_QPXExpress_TripOptionsRequest';
    protected $requestDataType = '';


    /**
     * @param Google_Service_QPXExpress_TripOptionsRequest $request
     */
    public function setRequest(Google_Service_QPXExpress_TripOptionsRequest $request)
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
}

/**
 * Class Google_Service_QPXExpress_TripsSearchResponse
 */
class Google_Service_QPXExpress_TripsSearchResponse extends Google_Model
{
    public $kind;
    protected $internal_gapi_mappings = [];
    protected $tripsType = 'Google_Service_QPXExpress_TripOptionsResponse';
    protected $tripsDataType = '';

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
     * @param Google_Service_QPXExpress_TripOptionsResponse $trips
     */
    public function setTrips(Google_Service_QPXExpress_TripOptionsResponse $trips)
    {
        $this->trips = $trips;
    }

    /**
     * @return mixed
     */
    public function getTrips()
    {
        return $this->trips;
    }
}
