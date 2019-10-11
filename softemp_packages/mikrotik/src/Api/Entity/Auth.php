<?php

namespace Mikrotik\Api\Entity;

/**
 * Class Auth
 * @package Mikrotik\Api\Entity
 *
 * Description of Auth
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class Auth
{

    /**
     * @var
     */
    private $host;

    /**
     * @var int
     */
    private $port = 8728;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var bool
     */
    private $debug = false;

    /**
     * @var int
     */
    private $attempts = 5;

    /**
     * @var int
     */
    private $delay = 2;

    /**
     * @var int
     */
    private $timeout = 2;

    /**
     * Auth constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     * @param $debug
     * @param $attempts
     * @param $delay
     * @param $timeout
     */
    public function set($host, $port, $username, $password, $debug, $attempts, $delay, $timeout)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->debug = $debug;
        $this->attempts = $attempts;
        $this->delay = $delay;
        $this->timeout = $timeout;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @return int
     */
    public function getAttempts()
    {
        return $this->attempts;
    }

    /**
     * @return int
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * @param $attempts
     */
    public function setAttempts($attempts)
    {
        $this->attempts = $attempts;
    }

    /**
     * @param $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
    }

    /**
     * @param $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

}
