<?php

namespace Mikrotik\Api\Commands\IP\Firewall;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class FirewallConnection
 * @package Mikrotik\Api\Commands\IP\Firewall
 *
 * Description of Connection
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class FirewallConnection
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * FirewallConnection constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for get all firewall connection
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/connection/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Firewall Connection To Set, Please Your Add Ip Firewall Connection";
        }
    }

    /**
     * This method used for delete firewall connection
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/connection/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
