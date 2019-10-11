<?php

namespace Mikrotik\Api\Commands\IP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class WebProxy
 * @package Mikrotik\Api\Commands\IP
 *
 * Description of WebProxy
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class WebProxy
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * WebProxy constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method used for get all web proxy config
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/proxy/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No Ip Proxy To Set, Please Your Add Ip Proxy";
        }
    }

    /**
     * This method used for set Web Proxy configuration
     * @param array $param
     * @return array
     */
    public function set($param)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/proxy/set");
        foreach ($param as $name => $value) {
            $sentence->setAttribute($name, $value);
        }
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
