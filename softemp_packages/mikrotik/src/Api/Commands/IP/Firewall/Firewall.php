<?php

namespace Mikrotik\Api\Commands\IP\Firewall;

use Mikrotik\Api\Talker\Talker;

/**
 * Class Firewall
 * @package Mikrotik\Api\Commands\IP\Firewall
 *
 * Description of Firewall
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property FirewallFilter
 * @property FirewallNAT
 * @property FirewallMangle
 * @property FirewallServicePort
 * @property FirewallConnection
 * @property FirewallAddressList
 * @property FirewallLayer7Protocol
 */
class Firewall
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Firewall constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * @return FirewallFilter
     */
    public function filter()
    {
        return new FirewallFilter($this->talker);
    }

    /**
     * @return FirewallNAT
     */
    public function NAT()
    {
        return new FirewallNAT($this->talker);
    }

    /**
     * @return FirewallMangle
     */
    public function mangle()
    {
        return new FirewallMangle($this->talker);
    }

    /**
     * @return FirewallServicePort
     */
    public function servicePort()
    {
        return new FirewallServicePort($this->talker);
    }

    /**
     * @return FirewallConnection
     */
    public function connection()
    {
        return new FirewallConnection($this->talker);
    }

    /**
     * @return FirewallAddressList
     */
    public function addressList()
    {
        return new FirewallAddressList($this->talker);
    }

    /**
     * @return FirewallLayer7Protocol
     */
    public function layer7Protocol()
    {
        return new FirewallLayer7Protocol($this->talker);
    }

}
