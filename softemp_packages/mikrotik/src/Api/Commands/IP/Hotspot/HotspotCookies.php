<?php

namespace Mikrotik\Api\Commands\IP\Hotspot;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class HotspotCookie
 * @package Mikrotik\Api\Commands\IP\Hotspot
 *
 * Description of Cookie
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class HotspotCookie
{

    /**
     * @var Talker
     */
    private $talker;

    /**
     * HotspotCookie constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to delete hotspot cookie by id
     * @param string $id
     * @return string
     */
    public function delete($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/hotspot/cookie/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display all cookie on hotspot
     * @return array or string
     */
    public function getAll()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/cookie/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Cookie To Set, Please Your Add IP Hotspot Cookie";
        }
    }

    /**
     * This method is used to display hotspot cookie
     * in detail based on the id
     * @param string $id
     * @return  array
     */
    public function detail($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/cookie/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Cookie With This id = " . $id;
        }
    }

}
