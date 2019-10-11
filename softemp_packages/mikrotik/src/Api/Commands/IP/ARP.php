<?php

namespace Mikrotik\Api\Commands\IP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class ARP
 * @package Mikrotik\Api\Commands\IP
 *
 * Description of ARP
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class ARP
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * ARP constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to add arp
     * @param type $param array
     * @return type array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/arp/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to delete arp by id
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/arp/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to enable arp by id
     * @param type $id string
     * @return type array
     *
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/arp/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to disable arp by id
     * @param type $id string
     * @return type array
     *
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/arp/disable");
        $sentence->where(".id", "=", $id);
        $disable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to set or edit by id
     * @param type $param array
     * @param type $id string
     * @return type array
     *
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/arp/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display all arp
     * @return type array
     *
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/arp/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip ARP To Set, Please Your Add Ip ARP";
        }
    }

    /**
     * This method is used to display arp
     * in detail based on the id
     * @param type $id string
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/arp/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip ARP With This id = " . $id;
        }
    }

}
