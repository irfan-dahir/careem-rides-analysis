<?php

namespace Careem\Factory;

class CarType
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
    private $minCapacity;


    /**
     * @param int $id
     * @param string $name
     * @param int $minCapacity
     * @return Car
     */
    public static function setProperties(
        int $id,
        string $name,
        int $minCapacity
    ) : self
    {
        $instance = new self();

        $instance->id = $id;
        $instance->name = $name;
        $instance->minCapacity = $minCapacity;

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
    public function getMinCapacity()
    {
        return $this->minCapacity;
    }

}
