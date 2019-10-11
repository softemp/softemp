<?php

namespace Mikrotik\Api\ommands\System;

use MikrotikAPI\Talker\Talker;
use MikrotikAPI\Util\SentenceUtil;

/**
 * Class SystemScheduler
 * @package Mikrotik\Api\ommands\System
 *
 * Description of System_Scheduler
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class SystemScheduler
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * SystemScheduler constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for add new system scheduler
     * @param type $param array
     * @return type array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for disable system scheduler
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for enable system scheduler
     * @param type $id string
     * @return type array
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for delete system scheduler
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for detail system scheduler
     * @param type $id string
     * @return type array
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/scheduler/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No System Scheduler With This id = " . $id;
        }
    }

    /**
     * This method used for set or edit system scheduler
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/system/scheduler/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method used for get all system scheduler
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/system/scheduler/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No System Scheduler To Set, Please Your Add System Scheduler";
        }
    }

}
