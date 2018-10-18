<?php

namespace Careem;

class Ride
{

    /**
     * @var int
     */
    private $bookingId;

    /**
     * @var int
     */
    private $tripId;

    /**
     * @var float
     */
    private $totalDistance;

    /**
     * @var float
     */
    private $totalMovingDistance;

    /**
     * @var int
     */
    private $pickupTime;

    /**
     * @var int
     */
    private $dropoffTime;

    /**
     * @var int
     */
    private $driverArrivalTime;

    /**
     * @var int
     */
    private $inJourneyWaitTime;

    /**
     * @var int
     */
    private $initialWaitTime;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var string
     */
    private $discountDescription;

    /**
     * @var float
     */
    private $tripPrice;

    /**
     * @var float
     */
    private $tripChargedPrice;

    /**
     * @var float
     */
    private $tripUSDPrice;

    /**
     * @var bool
     */
    private $customerVerified;

    /**
     * @var bool
     */
    private $driverVerified;

    /**
     * @var bool
     */
    private $waivedForCustomer;

    /**
     * @var Factory\TripPricingComponent[]
     */
    private $tripPricingComponents;

    /**
     * @var Factory\Car
     */
    private $car;

    /**
     * @var Factory\CarType
     */
    private $carType;

    /**
     * @var Factory\Driver
     */
    private $driver;

    /**
     * @var Factory\Client
     */
    private $client;

    /**
     * @return int
     */
    public function getBookingId()
    {
        return $this->bookingId;
    }

    /**
     * @param int $bookingId
     * @return Ride
     */
    public function setBookingId($bookingId)
    {
        $this->bookingId = $bookingId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTripId()
    {
        return $this->tripId;
    }

    /**
     * @param int $tripId
     * @return Ride
     */
    public function setTripId($tripId)
    {
        $this->tripId = $tripId;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalDistance()
    {
        return $this->totalDistance;
    }

    /**
     * @param float $totalDistance
     * @return Ride
     */
    public function setTotalDistance($totalDistance)
    {
        $this->totalDistance = $totalDistance;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalMovingDistance()
    {
        return $this->totalMovingDistance;
    }

    /**
     * @param float $totalMovingDistance
     * @return Ride
     */
    public function setTotalMovingDistance($totalMovingDistance)
    {
        $this->totalMovingDistance = $totalMovingDistance;
        return $this;
    }

    /**
     * @return int
     */
    public function getPickupTime()
    {
        return $this->pickupTime;
    }

    /**
     * @param int $pickupTime
     * @return Ride
     */
    public function setPickupTime($pickupTime)
    {
        $this->pickupTime = $pickupTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getDropoffTime()
    {
        return $this->dropoffTime;
    }

    /**
     * @param int $dropoffTime
     * @return Ride
     */
    public function setDropoffTime($dropoffTime)
    {
        $this->dropoffTime = $dropoffTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getDriverArrivalTime()
    {
        return $this->driverArrivalTime;
    }

    /**
     * @param int $driverArrivalTime
     * @return Ride
     */
    public function setDriverArrivalTime($driverArrivalTime)
    {
        $this->driverArrivalTime = $driverArrivalTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getInJourneyWaitTime()
    {
        return $this->inJourneyWaitTime;
    }

    /**
     * @param int $inJourneyWaitTime
     * @return Ride
     */
    public function setInJourneyWaitTime($inJourneyWaitTime)
    {
        $this->inJourneyWaitTime = $inJourneyWaitTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getInitialWaitTime()
    {
        return $this->initialWaitTime;
    }

    /**
     * @param int $initialWaitTime
     * @return Ride
     */
    public function setInitialWaitTime($initialWaitTime)
    {
        $this->initialWaitTime = $initialWaitTime;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return Ride
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountDescription()
    {
        return $this->discountDescription;
    }

    /**
     * @param string $discountDescription
     * @return Ride
     */
    public function setDiscountDescription($discountDescription)
    {
        $this->discountDescription = $discountDescription;
        return $this;
    }

    /**
     * @return float
     */
    public function getTripPrice()
    {
        return $this->tripPrice;
    }

    /**
     * @param float $tripPrice
     * @return Ride
     */
    public function setTripPrice($tripPrice)
    {
        $this->tripPrice = $tripPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getTripChargedPrice()
    {
        return $this->tripChargedPrice;
    }

    /**
     * @param float $tripChargedPrice
     * @return Ride
     */
    public function setTripChargedPrice($tripChargedPrice)
    {
        $this->tripChargedPrice = $tripChargedPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getTripUSDPrice()
    {
        return $this->tripUSDPrice;
    }

    /**
     * @param float $tripUSDPrice
     * @return Ride
     */
    public function setTripUSDPrice($tripUSDPrice)
    {
        $this->tripUSDPrice = $tripUSDPrice;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCustomerVerified()
    {
        return $this->customerVerified;
    }

    /**
     * @param bool $customerVerified
     * @return Ride
     */
    public function setCustomerVerified($customerVerified)
    {
        $this->customerVerified = $customerVerified;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDriverVerified()
    {
        return $this->driverVerified;
    }

    /**
     * @param bool $driverVerified
     * @return Ride
     */
    public function setDriverVerified($driverVerified)
    {
        $this->driverVerified = $driverVerified;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWaivedForCustomer()
    {
        return $this->waivedForCustomer;
    }

    /**
     * @param bool $waivedForCustomer
     * @return Ride
     */
    public function setWaivedForCustomer($waivedForCustomer)
    {
        $this->waivedForCustomer = $waivedForCustomer;
        return $this;
    }

    /**
     * @return Factory\TripPricingComponent[]
     */
    public function getTripPricingComponents()
    {
        return $this->tripPricingComponents;
    }

    /**
     * @param Factory\TripPricingComponent $tripPricingComponents[]
     * @return Ride
     */
    public function setTripPricingComponents(array $tripPricingComponents)
    {
        $this->tripPricingComponents = $tripPricingComponents;
        return $this;
    }

    /**
     * @return Factory\Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param Factory\Car $car
     * @return Ride
     */
    public function setCar($car)
    {
        $this->car = $car;
        return $this;
    }

    /**
     * @return Factory\CarType
     */
    public function getCarType()
    {
        return $this->carType;
    }

    /**
     * @param Factory\CarType $carType
     * @return Ride
     */
    public function setCarType($carType)
    {
        $this->carType = $carType;
        return $this;
    }

    /**
     * @return Factory\Driver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param Factory\Driver $driver
     * @return Ride
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * @return Factory\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Factory\Client $client
     * @return Ride
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

}
