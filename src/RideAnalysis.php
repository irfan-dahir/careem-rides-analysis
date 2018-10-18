<?php

namespace Careem;

class RideAnalysis
{
    public $dataRaw;
    public $data;
    public $dataCount;

    public function __construct(?string $dataPath = null) {

        if (!is_null($dataPath)) {
            $this->load([$dataPath]);
        }
    }

    public function load(array $files)
    {
        $this->dataRaw = Helper\Data::merge($files, 'data/data.json');
        $this->dataCount = count($this->dataRaw);
    }

    public function parse() : array {

        foreach ($this->dataRaw as $key => &$data) {
            $this->data[$key] = (new Ride())
                ->setBookingId(
                    $data['booking']['id']
                )
                ->setTripId(
                    $data['tripId']
                )
                ->setTotalDistance(
                    $data['totalDistance']
                )
                ->setTotalMovingDistance(
                    $data['totalMovingDistance']
                )
                ->setPickupTime(
                    (int) substr($data['pickupTime'], 0, -3)
                )
                ->setDropoffTime(
                    (int) substr($data['dropoffTime'], 0, -3)
                )
                ->setDriverArrivalTime(
                    (int) substr($data['driverArrivalTime'], 0, -3)
                )
                ->setInJourneyWaitTime(
                    $data['injourneyWaitTime']
                )
                ->setInitialWaitTime(
                    $data['initialWaitTime']
                )
                ->setDiscount(
                    $data['discount']
                )
                ->setDiscountDescription(
                    $data['discountDescription']
                )
                ->setTripPrice(
                    $data['tripPrice']
                )
                ->setTripChargedPrice(
                    $data['tripChargedPrice']
                )
                ->setTripUSDPrice(
                    $data['tripUSDPrice']
                )
                ->setCustomerVerified(
                    $data['customerVerified']
                )
                ->setDriverVerified(
                    $data['driverVerified']
                )
                ->setWaivedForCustomer(
                    $data['waivedForCustomer']
                )
                ->setTripPricingComponents(
                    array_map(
                        function($data) {
                            return Factory\TripPricingComponent::setProperties(
                                $data['pricingComponentName'],
                                $data['pricingComponentDisplay'],
                                $data['amount']
                            );
                        },
                        $data['tripPricingComponents']
                    )
                )
                ->setCar(
                    Factory\Car::setProperties(
                        $data['booking']['car']['id'],
                        $data['booking']['car']['make'],
                        $data['booking']['car']['model'],
                        $data['booking']['car']['color'],
                        $data['booking']['car']['licensePlate'],
                        $data['booking']['car']['licenseAuthority'],
                        $data['booking']['car']['buildYear']
                    )
                )
                ->setCarType(
                    Factory\CarType::setProperties(
                        $data['booking']['customerCarTypeModel']['id'],
                        $data['booking']['customerCarTypeModel']['name'],
                        $data['booking']['customerCarTypeModel']['minCapacity']
                    )
                )
                ->setDriver(
                    Factory\Driver::setProperties(
                        $data['booking']['driver']['driverId'],
                        $data['booking']['driver']['name'],
                        $data['booking']['driver']['limoCompanyId'],
                        $data['booking']['driver']['limoCompanyName'],
                        $data['booking']['driver']['phoneNumber'],
                        $data['booking']['driver']['dedicatedCarId']
                    )
                )
                ->setClient(
                    Factory\Client::setProperties(
                        $data['booking']['client']['id'],
                        $data['booking']['client']['passengerId'],
                        $data['booking']['client']['firstName'],
                        $data['booking']['client']['lastName'],
                        $data['booking']['client']['email'],
                        $data['booking']['client']['phoneNumber']
                    )
                )
            ;
        }

        return $this->data;
    }
}