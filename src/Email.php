<?php
namespace Morilog\ValueObjects;

/**
 * Class Email
 * @package Morilog\ValueObjects
 * @author Morteza Parvini <m.parvini@outlook.com>
 */
class Email
{
    /**
     * @var
     */
    protected $address;

    /**
     * @var
     */
    protected $name;

    /**
     * @param $address
     * @param null $name
     */
    public function __construct($address, $name = null)
    {
        $this->setAddress($address);
        $this->setName($name);
    }

    /**
     * @author Morteza Parvini <m.parvini@outlook.com>
     * @param $address
     * @return $this
     */
    public function setAddress($address)
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Email address is not Valid');
        }

        $this->address = $address;

        return $this;
    }

    /**
     * @author Morteza Parvini <m.parvini@outlook.com>
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
    public function getName()
    {
        return $this->name;
    }


}