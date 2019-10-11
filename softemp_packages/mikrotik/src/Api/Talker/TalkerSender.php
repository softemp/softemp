<?php

namespace Mikrotik\Api\Talker;

use Mikrotik\Api\Core\Connector;
use Mikrotik\Api\Entity\Attribute;
use Mikrotik\Api\Util\DebugDumper;
use Mikrotik\Api\Util\SentenceUtil;
use Mikrotik\Api\Util\Util;

/**
 * Class TalkerSender
 * @package Mikrotik\Api\Talker
 *
 * Description of TalkerSender
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Connector
 * @property SentenceUtil
 * @property Attribute
 * @property Util
 * @property DebugDumper
 * @property \ArrayObject
 */
class TalkerSender
{

    private $debug = false;
    private $con;

    /**
     * TalkerSender constructor.
     * @param Connector $con
     */
    public function __construct(Connector $con)
    {
        $this->con = $con;
    }

    /**
     * @param SentenceUtil $sentence
     */
    public function send(SentenceUtil $sentence)
    {
        $cmd = $this->createSentence($sentence);
        $this->con->sendStream($cmd);
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
     * @param $str
     */
    public function runDebugger($str)
    {
        if ($this->isDebug()) {
            DebugDumper::dump($str);
        }
    }

    private function sentenceWrapper(SentenceUtil $sentence)
    {
        $it = $sentence->getBuildCommand()->getIterator();

        $attr = new Attribute();
        while ($it->valid()) {
            if (Util::contains($it->current()->getClause(), "commandPrint") ||
                Util::contains($it->current()->getClause(), "commandReguler")) {
                $attr = $it->current();
            }
            $it->next();
        }

        $it->rewind();

        $out = new \ArrayObject();
        $out->append($attr);
        while ($it->valid()) {
            if (!Util::contains($it->current()->getClause(), "commandPrint") &&
                !Util::contains($it->current()->getClause(), "commandReguler")) {
                $out->append($it->current());
            }
            $it->next();
        }
        return $out;
    }

    private function createSentence(SentenceUtil $sentence)
    {
        $build = "";
        $sentence = $this->sentenceWrapper($sentence);
        $it = $sentence->getIterator();
        $cmd = "";

        while ($it->valid()) {
            $clause = $it->current()->getClause();
            $name = $it->current()->getName();
            $value = $it->current()->getValue();

            if (Util::contains($clause, "commandPrint")) {
                $build = $build . $value;
                $cmd = "print";
            } else {
                if (Util::contains($clause, "commandReguler")) {
                    $build = $build . $value;
                    $cmd = "reguler";
                } else {
                    if (Util::contains($name, "proplist") || Util::contains($name, "tag")) {
                        $build = $build . "=." . $name . "=" . $value;
                    }

                    if ($clause == "where" && $cmd == "print") {
                        $build = $build . "?" . $name . $value;
                    }

                    if ($clause == "where" && $cmd == "reguler") {
                        $build = $build . $name . $value;
                    }

                    if ($clause == "whereNot" || $clause == "orWhere" ||
                        $clause == "orWhereNot" || $clause == "andWhere" ||
                        $clause == "andWhereNot") {
                        $build = $build . $name . $value;
                    }

                    if ($clause == "setAttribute") {
                        $build = $build . "=" . $name . "=" . $value;
                    }
                }
            }
            if ($it->valid()) {
                $build = $build . "\n";
            }
            $it->next();
        }
        $this->runDebugger($build);
        return $build;
    }

}
