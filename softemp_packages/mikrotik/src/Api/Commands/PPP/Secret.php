<?php

namespace Mikrotik\Api\Commands\PPP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class Secret
 * @package Mikrotik\Api\Commands\PPP
 *
 * Description of Ppp_Secret
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class Secret
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Secret constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to add ppp secret
     * @param type $param array
     * @return type array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/secret/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to disable ppp secret
     * @param type $id string
     * @return type array
     */
    public function disable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/secret/disable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to enable ppp secret
     * @param type $id string
     * @return type array
     *
     */
    public function enable($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/secret/enable");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to set or edit ppp secret
     * @param type $param array
     * @param type $id string
     * @return type array
     *
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/secret/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to delete ppp secret
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/secret/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display all ppp secret
     * @return type array
     *
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/secret/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No PPP Secret To Set, Please Your Add PPP Secret";
        }
    }

    /**
     * This method is used to display one ppp secret
     * in detail based on the id
     * @param type $id not array, harus di deklarasikan
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/secret/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No PPP Secret With This id = " . $id;
        }
    }

}
