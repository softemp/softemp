<?php

namespace Mikrotik\Api\Commands\IP\Hotspot;

use Mikrotik\Api\Talker\Talker;

/**
 * Class Hotspot
 * @package Mikrotik\Api\Commands\IP\Hotspot
 *
 * Description of Hotspot
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property HotspotServer
 * @property HotspotServerProfiles
 * @property HotspotUsers
 * @property HotspotUserProfile
 * @property HotspotActive
 * @property HotspotHosts
 * @property HotspotIPBindings
 * @property HotspotCookie
 */
class Hotspot
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Hotspot constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * @return HotspotServer
     */
    public function server()
    {
        return new HotspotServer($this->talker);
    }

    /**
     * @return HotspotServerProfiles
     */
    public function serverProfiles()
    {
        return new HotspotServerProfiles($this->talker);
    }

    /**
     * @return HotspotUsers
     */
    public function users()
    {
        return new HotspotUsers($this->talker);
    }

    /**
     * @return HotspotUserProfile
     */
    public function userProfiles()
    {
        return new HotspotUserProfile($this->talker);
    }

    /**
     * @return HotspotActive
     */
    public function active()
    {
        return new HotspotActive($this->talker);
    }

    /**
     * @return HotspotHosts
     */
    public function hosts()
    {
        return new HotspotHosts($this->talker);
    }

    /**
     * @return HotspotIPBindings
     */
    public function IPBinding()
    {
        return new HotspotIPBindings($this->talker);
    }

    /**
     * @return HotspotCookie
     */
    public function cookie()
    {
        return new HotspotCookie($this->talker);
    }

}
