<?php

namespace Mikrotik\Api\Commands\IP\Hotspot;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class HotspotHosts
 * @package Mikrotik\Api\Commands\IP\Hotspot
 *
 * Description of Hosts
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class HotspotHosts {

    /**
     * @var Talker
     */
    private $talker;

    /**
     * HotspotHosts constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker) {
        $this->talker = $talker;
    }

    /**
     * This method is used to delete hotspot by id
     * @param string $id 
     * @return array
     */
    public function delete($id) {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/ip/hotspot/host/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

    /**
     * This method is used to display all hotspot
     * @return type array
     */
    public function getAll() {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/host/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Host To Set, Please Your Add IP Hotspot Host";
        }
    }

    /**
     * This method is used to display hotspot host
     * in detail based on the id
     * @param string $id
     * @return type array
     *  
     */
    public function detail($id) {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/ip/hotspot/host/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No IP Hotspot Host With This id = " . $id;
        }
    }

}
