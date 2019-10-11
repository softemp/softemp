<?php

namespace Mikrotik\Api\Commands\PPP;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class AAA
 * @package Mikrotik\Api\Commands\PPP
 *
 * Description  AAA
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class AAA
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * AAA constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to display all ppp aaa
     * @return type array
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ppp/aaa/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No PPP AAA To Set, Please Your Add PPP AAA";
        }
    }

    /**
     * This method is used to set ppp aaa
     * @param type $use_radius string
     * @param type $accounting string
     * @param type $interim_update string
     * @return type array
     */
    public function set($use_radius, $accounting, $interim_update)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ppp/aaa/set");
        $sentence->setAttribute("use-radius", $use_radius);
        $sentence->setAttribute("accounting", $accounting);
        $sentence->setAttribute("interim-update", $interim_update);
        $this->talker->send($sentence);
        return "Sucsess";
    }

}
