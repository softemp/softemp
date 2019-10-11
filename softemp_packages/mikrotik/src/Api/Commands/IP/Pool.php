<?php

namespace Mikrotik\Api\Commands\IP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class Pool
 * @package Mikrotik\Api\Commands\IP
 *
 * Description of Pool
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class Pool
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Pool constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to add pool
     * @param array $param
     * @return array
     */
    public function add($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/pool/add");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display
     * all pool
     * @return array or string
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand('/ip/pool/getall');
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Pool To Set, Please Your Add Ip Pool";
        }
    }

    /**
     * This method is used to remove the pool by id
     * @param string $id
     * @return array
     *
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/pool/remove");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to change pool based on the id
     * @param array $param
     * @param string $id
     * @return array
     *
     */
    public function set($param, $id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/pool/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display one pool
     * in detail based on the id
     * @param type $id string
     * @return type array
     *
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/pool/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Pool With This Id = " . $id;
        }
    }

}
