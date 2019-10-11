<?php

namespace Mikrotik\Api\Commands\File;

use Mikrotik\Api\Talker\Talker;
use Mikrotik\Api\Util\SentenceUtil;

/**
 * Class File
 * @package Mikrotik\Api\Commands\File
 *
 * Description of Mapi_File
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Talker
 * @property SentenceUtil
 */
class File
{

    /**
     * @access private
     * @var type array
     */
    private $talker;

    /**
     * File constructor.
     * @param Talker $talker
     */
    public function __construct(Talker $talker)
    {
        $this->talker = $talker;
    }

    /**
     * This method is used to display all file in mikrotik RouterOs
     * @return type array
     */
    public function get_all_file()
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/file/getall");
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No File";
        }
    }

    /**
     * This method is used to display one file
     * in detail based on the id
     * @param type $id string
     * @return type array
     */
    public function detail_file($id)
    {
        $sentence = new SentenceUtil();
        $sentence->fromCommand("/file/print");
        $sentence->where(".id", "=", $id);
        $this->talker->send($sentence);
        $rs = $this->talker->getResult();
        $i = 0;
        if ($i < $rs->size()) {
            return $rs->getResultArray();
        } else {
            return "No File With This id = " . $id;
        }
    }

    /**
     * This method is used to delete file by id
     * @param type $id string
     * @return type array
     */
    public function delete_file($id)
    {
        $sentence = new SentenceUtil();
        $sentence->addCommand("/file/remove");
        $sentence->where(".id", "=", $id);
        $enable = $this->talker->send($sentence);
        return "Sucsess";
    }

}
