<?php

namespace Mikrotik\Api\Commands\Interfaces;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class L2TPServer
 * @package Mikrotik\Api\Commands\Interfaces
 *
 * Description of L2TPServer
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class L2TPServer
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * L2TPServer constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for add new l2tp server
     * @param type $param array
     * @return type array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for disable l2tp server
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for enable l2tp server
     * @param type $id string
     * @return type array
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for delete l2tp server
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for detail l2tp server
     * @param type $id string
     * @return type array
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server With This id = " . $id;
        }
    }

    /**
     * This method used for set or edit l2tp server
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for get all l2tp server
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server To Set, Please Your Add Interface L2TP Server";
        }
    }

    /**
     * This method used for get all l2tp server server
     * @return type array
     */
    public function getAllServer()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/l2tp-server/server/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface L2TP Server Server To Set, Please Your Add Interface L2TP Server Server";
        }
    }

    /**
     * This method used for set l2tp server server
     * @param type $param array
     * @return type array
     */
    public function setServer($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/l2tp-server/server/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
