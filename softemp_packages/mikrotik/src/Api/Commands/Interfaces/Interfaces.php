<?php

namespace Mikrotik\Api\Commands\Interfaces;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\ApiCommands\Interfaces\VRRP;

/**
 * Class Interfaces
 * @package Mikrotik\Api\Commands\Interfaces
 *
 * Description of Mapi_Interfaces
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property Ethernet
 * @property PPPoEClient
 * @property PPPoEServer
 * @property EoIP
 * @property IPTunnel
 * @property VLAN
 * @property VRRP
 * @property Bonding
 * @property Bridge
 * @property L2TPClient
 * @property L2TPServer
 * @property PPPClient
 * @property PPPServer
 * @property PPTPClient
 * @property PPTPServer
 */
class Interfaces
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Interfaces constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to call class Ethetrnet
     * @return Ethernet
     */
    public function ethernet()
    {
        return new Ethernet($this->talker);
    }

    /**
     * This method is used to call class Pppoe_Client
     * @return PPPoEClient
     */
    public function PPPoEClient()
    {
        return new PPPoEClient($this->talker);
    }

    /**
     * This method is used to call class Pppoe_Server
     * @return PPPoEServer
     */
    public function PPPoEServer()
    {
        return new PPPoEServer($this->talker);
    }

    /**
     * This method is used to call class Eoip
     * @return EoIP
     */
    public function EoIP()
    {
        return new EoIP($this->talker);
    }

    /**
     * This method is used to call class Ipip
     * @return IPTunnel
     */
    public function IPTunnel()
    {
        return new IPTunnel($this->talker);
    }

    /**
     * This method is used to call class Vlan
     * @return VLAN
     */
    public function VLAN()
    {
        return new VLAN($this->talker);
    }

    /**
     * This method is used to call class Vrrp
     * @return VRRP
     */
    public function VRRP()
    {
        return new VRRP($this->talker);
    }

    /**
     * This method is used to call class Bonding
     * @return Bonding
     */
    public function bonding()
    {
        return new Bonding($this->talker);
    }

    /**
     * This method for used call class Bridge
     * @return Bridge
     */
    public function bridge()
    {
        return new Bridge($this->talker);
    }

    /**
     * This method used call class L2tp_Client
     * @return L2TPClient
     */
    public function L2TPClient()
    {
        return new L2TPClient($this->talker);
    }

    /**
     * This method used call class L2tp_Server
     * @return L2TPServer
     */
    public function L2TPServer()
    {
        return new L2TPServer($this->talker);
    }

    /**
     * This method used call class Ppp_Client
     * @return PPPClient
     */
    public function PPPClient()
    {
        return new PPPClient($this->talker);
    }

    /**
     * This method used call class Ppp_Server
     * @return PPPServer
     */
    public function PPPServer()
    {
        return new PPPServer($this->talker);
    }

    /**
     * This method used call class Pptp_Client
     * @return PPTPClient
     */
    public function PPTPClient()
    {
        return new PPTPClient($this->talker);
    }

    /**
     * This method used call class Pptp_Server
     * @return PPTPServer
     */
    public function PPTPServer()
    {
        return new PPTPServer($this->talker);
    }

}
