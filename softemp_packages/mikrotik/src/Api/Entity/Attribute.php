<?php

namespace Mikrotik\Api\Entity;

/**
 * Class Attribute
 * @package Mikrotik\Api\Entity
 *
 * Description of Attribute
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class Attribute
{

    private $clause;
    private $name;
    private $value;

    /**
     * Attribute constructor.
     * @param string $clause
     * @param string $name
     * @param string $value
     */
    public function __construct($clause = '', $name = '', $value = '')
    {
        $this->clause = $clause;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @param $clause
     */
    public function setClause($clause)
    {
        $this->clause = $clause;
    }

    /**
     * @return string
     */
    public function getClause()
    {
        return $this->clause;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

}
