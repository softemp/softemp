<?php

namespace Mikrotik\Api\Commands\Interfaces;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class Ethernet
 * @package Mikrotik\Api\Commands\Interfaces
 *
 * Description of Ethernet
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class Ethernet
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Ethernet constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to display all interface
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        return $rs->getResultArray();
    }

    /**
     * This method is used to display one interface
     * in detail based on the id
     * @param type $param array
     * @param type $id string
     * @return type array
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to enable interface by id
     * @param type $id string
     * @return type array
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/enable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to disable interface by id
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/interface/disable");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display one interafce
     * in detail based on the id
     * @param type $id string
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/interface/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Interface Ethernet With This id = " . $id;
        }
    }

}
