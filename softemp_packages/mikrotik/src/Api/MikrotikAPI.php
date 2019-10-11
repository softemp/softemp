<?php

namespace Mikrotik\Api;

use Mikrotik\Api\Commands\Interfaces\Interfaces;
use Mikrotik\Api\Commands\IP\IP;
use Mikrotik\Api\Commands\PPP\PPP;
use Mikrotik\Api\Entity\Auth;
use Mikrotik\Api\Talker\Talker;

/**
 * Class Mikrotik\Api
 * @package Mikrotik
 *
 * Description of Mikrotik_Api
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class MikrotikAPI
{
    private $talker;

    /**
     * MikrotikAPI constructor.
     *
     * @param $host
     * @param $username
     * @param $password
     */
    public function __construct($host, $username, $password)
    {
        $auth = new Auth();

        $auth->setHost($host);
        $auth->setUsername($username);
        $auth->setPassword($password);

        $this->talker = new Talker($auth);
    }



    public function statusConnect()
    {
        return $this->talker->statusConnect();
    }

    /**
     * @return Interfaces
     */
    public function interfaces()
    {
        return new Interfaces($this->talker);
    }

    /**
     * @return PPP
     */
    public function ppp(){
        return new PPP($this->talker);
    }

    /**
     * @return IP
     */
    public function ip(){
        return new IP($this->talker);
    }

}
