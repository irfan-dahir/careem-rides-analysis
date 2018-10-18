<?php

namespace Careem\Factory;

class Client
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $passengerId;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @param int $id
     * @param string $name
     * @param int $minCapacity
     * @return Car
     */
    public static function setProperties(
        int $id,
        int $passengerId,
        string $firstName,
        string $lastName,
        string $email,
        string $phoneNumber
    ) : self
    {
        $instance = new self();

        $instance->id = $id;
        $instance->passengerId = $passengerId;
        $instance->firstName = $firstName;
        $instance->lastName = $lastName;
        $instance->email = $email;
        $instance->phoneNumber = $phoneNumber;

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
     * @return int
     */
    public function getPassengerId()
    {
        return $this->passengerId;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

}
