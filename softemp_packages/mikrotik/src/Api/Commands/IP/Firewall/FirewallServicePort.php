<?php

namespace Mikrotik\Api\Commands\IP\Firewall;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class FirewallServicePort
 * @package Mikrotik\Api\Commands\IP\Firewall
 *
 * Description of ServicePort
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class FirewallServicePort
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * FirewallServicePort constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for get all Ip Firewall Service Port
     * @return array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/service-port/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall service-port To Set, Please Your Add Ip Firewall service-port";
        }
    }

    /**
     * This method used for disable Ip Firewall Service Port
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/service-port/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for enable Ip Firewall Service Port
     * @param type $id string
     * @return type array
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/service-port/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     *
     * @param type $id string
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/service-port/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall Service-Port With This id = " . $id;
        }
    }

}
