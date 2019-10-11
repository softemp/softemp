<?php

namespace Mikrotik\Api\Commands\Interfaces;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class PPTPServer
 * @package Mikrotik\Api\Commands\Interfaces
 *
 * Description of Mapi_Interface_Pptp_Server
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class PPTPServer
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * PPTPServer constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for add new interface pptp-server
     * @param type $param array
     * @return type array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for disable interface pptp-server
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for enable interface pptp-server
     * @param type $id string
     * @return type array
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for delete interface pptp-server
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for detail interface pptp-server
     * @param type $id string
     * @return type array
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pptp-server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface PPTP Server With This id = " . $id;
        }
    }

    /**
     * This method used for set or edit interface pptp-server
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for get all interface pptp-server
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/pptp-server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface PPTP Server To Set, Please Your Add Interface PPTP Server";
        }
    }

    /**
     * This method used for get all pptp-server server
     * @return type array
     */
    public function getAllServer()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("//interface/pptp-server/server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface PPTP Server Server To Set, Please Your Add Interface PPTP Server Server";
        }
    }

    /**
     * This method used for set pptp-server server
     * @param type $param array
     * @return type array
     */
    public function setServer($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/pptp-server/server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
