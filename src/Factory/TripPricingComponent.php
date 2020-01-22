<?php

namespace Careem\Factory;

class TripPricingComponent
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $amount;


    /**
     * @param string $componentId
     * @param string $componentName
     * @param float $amount
     * @return TripPricingComponent
     *
     * @throws \InvalidArgumentException
     */
    public static function setProperties(
        string $componentId,
        string $componentName,
        float $amount
    ) : self
    {

//         if (!\in_array(
//             $componentId,
//             [
//                 'BASE_FARE',
//                 'EXTRA_TIME_FARE',
//                 'EXTRA_DISTANCE_FARE',
//                 'STARTING_FARE',
//                 'MOVING_FARE',
//                 'WAITING_FARE',
//                 'REGULATOR_FEE',
//                 'TOLLGATE',
//                 'PROMOTION_BOOKING_DISCOUNT',
//                 'USER_CREDIT_DISCOUNT',
//                 'WAIVED_DISCOUNT',
//                 'DELTA_DUE_TO_MINIMUM_CHARGE',
//                 'SURGE_DELTA',
//                 'OFFLINE_PRICING_ADJUSTMENT',
//                 'DISCOUNT',
//                 'OTHER_SURCHARGE',
//                 'CUSTOM_PRICING'
//             ]
//         )) {
//             throw new \InvalidArgumentException("Invalid Component: {$componentId}");
//         }

        $instance = new self();
        $instance->id = $componentId;
        $instance->name= $componentName;
        $instance->amount = $amount;

        return $instance;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

}
