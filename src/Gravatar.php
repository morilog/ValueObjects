<?php
namespace Morilog\ValueObjects;

/**
 * Class Gravatar
 * @package Morilog\ValueObjects
 * @author Morteza Parvini <m.parvini@outlook.com>
 */
class Gravatar
{
    const GRAVATAR_BASE_URL = 'http://www.gravatar.com/avatar/';

    /**
     * @var
     */
    protected $email;

    /**
     * @var int
     */
    protected $size;

    /**
     * @param string $email
     * @param int size
     */
    public function __construct($email, $size = 40)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \Exception('Email does not valid');
        }

        if (is_numeric($size) === false || $size <= 0 || $size > 500) {
            throw new \Exception('Size must be greater than zero and smaller than 500');
        }

        $this->email = $email;

        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return self::GRAVATAR_BASE_URL . md5(strtolower(trim($this->email))). '?s=' . $this->size;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAvatarUrl();
    }

}
