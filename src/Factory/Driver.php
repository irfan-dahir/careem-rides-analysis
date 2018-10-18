<?php

namespace Careem\Factory;

class Driver
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $limoCompanyId;

    /**
     * @var string
     */
    private $limoCompanyName;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var int|null
     */
    private $dedicatedCarId;


    /**
     * @param int $id
     * @param string $name
     * @param int $limoCompanyId
     * @param string $limoCompanyName
     * @param string $phoneNumber
     * @param int|null $dedicatedCarId
     * @return Driver
     */
    public static function setProperties(
        int $id,
        string $name,
        int $limoCompanyId,
        string $limoCompanyName,
        string $phoneNumber,
        ?int $dedicatedCarId
    ) : self
    {
        $instance = new self();

        $instance->id = $id;
        $instance->name = $name;
        $instance->limoCompanyId = $limoCompanyId;
        $instance->limoCompanyName = $limoCompanyName;
        $instance->phoneNumber = $phoneNumber;
        $instance->dedicatedCarId;

        return $instance;
    }

    /**
     * @return int
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
     * @return int
     */
    public function getLimoCompanyId()
    {
        return $this->limoCompanyId;
    }

    /**
     * @return string
     */
    public function getLimoCompanyName()
    {
        return $this->limoCompanyName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return int|null
     */
    public function getDedicatedCarId()
    {
        return $this->dedicatedCarId;
    }

}

