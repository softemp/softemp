<?php

namespace Mikrotik\Api\Commands\IP\Firewall;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class FirewallAddressList
 * @package Mikrotik\Api\Commands\IP\Firewall
 *
 * Description of AddressList
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class FirewallAddressList
{

    /**
     * @var Talker
     */
    private $talker;
    private $keys = ['address','comment'];

    /**
     * FirewallAddressList constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * @param type $param array
     * @return type array
     * This method is used to add address list
     */
    public function add(array $param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/address-list/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        return $this->talker->send($sentence);
    }

    /**
     * This method is used to display all firewall filter
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/address-list/getall");

        $resultSend = $this->talker->send($sentence);
        if($resultSend) {
            $rs = $this->talker->getResult();
            $i = 0;
            if ($i < $rs->size()) {
                return $rs->getResultArray();
            } else {
                return "No Ip Firewall Address List To Set, Please Your Add IP Firewall Address List ";
            }
        }
        return $resultSend;
    }

    /**
     * This method is used to enable firewall filter by id
     * @param type $id string
     * @return type array
     *
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/address-list/enable");
        $sentence->where(".id", "=", $id);
        return $this->talker->send($sentence);
    }

    /**
     * This method is used to disable firewall filter by id
     * @param type $id string
     * @return type array
     *
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/address-list/disable");
        $sentence->where(".id", "=", $id);

        return $this->talker->send($sentence);
    }

    /**
     * This method is used to remove firewall filter by id
     * @param type $id string
     * @return type array
     *
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/address-list/remove");
        $sentence->where(".id", "=", $id);

        return $this->talker->send($sentence);
    }

    /**
     * This method is used to change firewall nat based on the id
     * @param type $param array
     * @param type $id string
     * @return type array
     *
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/firewall/address-list/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);

        return $this->talker->send($sentence);
    }

    /**
     * This method is used to display one firewall filter
     * in detail based on the id
     * @param type $id string
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/address-list/print");
        $sentence->where(".id", "=", $id);

        $resultSend = $this->talker->send($sentence);
        if($resultSend) {
            $rs = $this->talker->getResult();
            $i = 0;
            if ($i < $rs->size()) {
                return $rs->getResultArray();
            } else {
                return "No IP Firewall Address List With This id = " . $id;
            }
        }
        return $resultSend;
    }

    public function where($key, $value)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/firewall/address-list/print");
        $sentence->where($key, "=", $value);

        $resultSend = $this->talker->send($sentence);
        if($resultSend) {
            $rs = $this->talker->getResult();
            $i = 0;
            if ($i < $rs->size()) {
                return $rs->getResultArray();
//                return $rs;
            } else {
                return null;
    //            return "No IP Firewall Address List With This {$key} = " . $value;
            }
        }
        return $resultSend;
    }

}
