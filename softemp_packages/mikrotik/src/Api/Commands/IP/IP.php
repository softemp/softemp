<?php

namespace Mikrotik\Api\Commands\IP;

use Mikrotik\Api\Commands\IP\Firewall\Firewall;
use Mikrotik\Api\Commands\IP\Hotspot\Hotspot;
use Mikrotik\Api\Talker\Talker;

/**
 * Class IP
 * @package Mikrotik\Api\Commands\IP
 *
 * Description of IP
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property Address
 * @property Hotspot
 * @property Pool
 * @property DNS
 * @property Firewall
 * @property Accounting
 * @property ARP
 * @property DHCPClient
 * @property DHCPRelay
 * @property DHCPServer
 * @property Route
 * @property Service
 * @property WebProxy
 */
class IP
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * IP constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * @return Address
     */
    public function address()
    {
        return new Address($this->talker);
    }

    /**
     * @return Hotspot
     */
    public function hotspot()
    {
        return new Hotspot($this->talker);
    }

    /**
     * @return Pool
     */
    public function pool()
    {
        return new Pool($this->talker);
    }

    /**
     * @return DNS
     */
    public function DNS()
    {
        return new DNS($this->talker);
    }

    /**
     * @return Firewall
     */
    public function firewall()
    {
        return new Firewall($this->talker);
    }

    /**
     * @return Accounting
     */
    public function accounting()
    {
        return new Accounting($this->talker);
    }

    /**
     * @return ARP
     */
    public function ARP()
    {
        return new ARP($this->talker);
    }

    /**
     * @return DHCPClient
     */
    public function DHCPClient()
    {
        return new DHCPClient($this->talker);
    }

    /**
     * @return DHCPRelay
     */
    public function DHCPRelay()
    {
        return new DHCPRelay($this->talker);
    }

    /**
     * @return DHCPServer
     */
    public function DHCPServer()
    {
        return new DHCPServer($this->talker);
    }

    /**
     * @return Route
     */
    public function route()
    {
        return new Route($this->talker);
    }

    /**
     * @return Service
     */
    public function service()
    {
        return new Service($this->talker);
    }

    /**
     * @return WebProxy
     */
    public function proxy()
    {
        return new WebProxy($this->talker);
    }

}
