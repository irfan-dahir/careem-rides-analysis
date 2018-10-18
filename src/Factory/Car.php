<?php

namespace Careem\Factory;

class Car
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $make;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $licensePlate;

    /**
     * @var string|null
     */
    private $licenseAuthority;

    /**
     * @var int
     */
    private $buildYear;


    /**
     * @param int $id
     * @param string $make
     * @param string $model
     * @param string $color
     * @param string $licensePlate
     * @param string $licenseAuthority
     * @param int $buildYear
     * @return Car
     */
    public static function setProperties(
        int $id,
        string $make,
        string $model,
        string $color,
        string $licensePlate,
        string $licenseAuthority,
        int $buildYear
    ) : self
    {
        $instance = new self();

        $instance->id = $id;
        $instance->make = $make;
        $instance->model = $model;
        $instance->color = $color;
        $instance->licensePlate = $licensePlate;
        $instance->licenseAuthority = $licenseAuthority;
        $instance->buildYear = $buildYear;

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
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * @return null|string
     */
    public function getLicenseAuthority()
    {
        return $this->licenseAuthority;
    }

    /**
     * @return int
     */
    public function getBuildYear()
    {
        return $this->buildYear;
    }

}
