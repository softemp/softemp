<?php

namespace Mikrotik\Api\Talker;

use Mikrotik\Api\Core\Connector;
use Mikrotik\Api\Entity\Attribute;
use Mikrotik\Api\Util\DebugDumper;
use Mikrotik\Api\Util\ResultUtil;
use Mikrotik\Api\Util\Util;

/**
 * Class TalkerReciever
 * @package Mikrotik\Api\Talker
 *
 * Description of TalkerReciever
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Connector
 * @property ResultUtil
 * @property \ArrayObject
 * @property Attribute
 * @property DebugDumper
 * @property Util
 */
class TalkerReciever
{

    private $con;
    private $result;
    private $trap = false;
    private $done = false;
    private $re = false;
    private $debug = false;

    /**
     * TalkerReciever constructor.
     * @param Connector $con
     */
    public function __construct(Connector $con)
    {
        $this->con = $con;
        $this->result = new ResultUtil();
    }

    /**
     * @return bool
     */
    public function isTrap()
    {
        return $this->trap;
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return $this->done;
    }

    /**
     * @return bool
     */
    public function isData()
    {
        return $this->re;
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @param $boolean
     */
    public function setDebug($boolean)
    {
        $this->debug = $boolean;
    }

    /**
     * @return ResultUtil
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     *
     */
    public function doRecieving()
    {
        $this->run();
    }

    /**
     * @param $raw
     */
    private function parseRawToList($raw)
    {
        $raw = trim($raw);
        if (!empty($raw)) {
            $list = new \ArrayObject();
            $token = explode("\n", $raw);
            $a = 1;
            while ($a < count($token)) {
                next($token);
                $attr = new Attribute();
                if (!(current($token) == "!re") && !(current($token) == "!trap")) {
                    $split = explode("=", current($token));
                    $attr->setName($split[1]);
                    if (count($split) == 3) {
                        $attr->setValue($split[2]);
                    } else {
                        $attr->setValue(null);
                    }
                    $list->append($attr);
                }
                $a++;
            }
            if ($list->count() != 0) {
                $this->result->add($list);
            }
        }
    }

    /**
     * @param $string
     */
    private function runDebugger($string)
    {
        if ($this->isDebug()) {
            DebugDumper::dump($string);
        }
    }

    /**
     *
     */
    private function run()
    {
        $s = "";
        while (true) {
            $s = $this->con->recieveStream();
            if (Util::contains($s, "!re")) {
                $this->parseRawToList($s);
                $this->runDebugger($s);
                $this->re = true;
            }

            if (Util::contains($s, "!trap")) {
                $this->runDebugger($s);
                $this->trap = true;
                break;
            }

            if (Util::contains($s, "!done")) {
                $this->runDebugger($s);
                $this->done = true;
                break;
            }
        }
    }

}
