<?php

namespace Mikrotik\Api\Commands\PPP;

use Mikrotik\Api\Talker\Talker;

/**
 * Class PPP
 * @package Mikrotik\Api\Commands\PPP
 *
 * Description of Ppp
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property Profile
 * @property Secret
 * @property AAA
 * @property Active
 */
class PPP
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * PPP constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method for call class Profile
     * @return Object of Profile class
     */
    public function profile()
    {
        return new Profile($this->talker);
    }

    /**
     * This method for call class Secret
     * @return Object of Secret
     */
    public function secret()
    {
        return new Secret($this->talker);
    }

    /**
     * This method for call class Aaa
     * @access public
     * @return object of Aaa class
     */
    public function AAA()
    {
        return new AAA($this->talker);
    }

    /**
     * This method for call class Active
     * @return Object of Active class
     */
    public function active()
    {
        return new Active($this->talker);
    }

}
