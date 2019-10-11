<?php

namespace Mikrotik\Api\Commands\PPP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class Active
 * @package Mikrotik\Api\Commands\PPP
 *
 * Description of Active
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class Active
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * Active constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to display all ppp active
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/active/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No PPP Active To Set, Please Your Add PPP Active";
        }
    }

    /**
     * This method is used to delete ppp active
     * @param type $id string
     * @return type array
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/active/remove");
        $sentence->where(".id", "=", $id);
        return $this->talker->send($sentence);
    }

    /**
     * buscando registro
     *
     * @param $key
     * @param $value
     * @return bool|string|null
     */
    public function where($key, $value)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/active/print");
        $sentence->where($key, "=", $value);

        $resultSend = $this->talker->send($sentence);

        if($resultSend) {
            $rs = $this->talker->getResult();
            $i = 0;
            if ($i < $rs->size()) {
                return $rs->getResultArray();
            } else {
                return null;
            }
        }
        return $resultSend;
    }

}
