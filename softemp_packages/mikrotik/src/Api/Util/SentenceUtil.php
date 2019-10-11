<?php

namespace Mikrotik\Api\Util;

use Mikrotik\Api\Entity\Attribute;

/**
 * Class SentenceUtil
 * @package Mikrotik\Api\Util
 *
 *
 * Description of SentenceUtil
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property \ArrayObject
 * @property Attribute
 */
class SentenceUtil
{

    private $list;

    public function __construct()
    {
        $this->list = new \ArrayObject();
    }

    public function select($attributeName)
    {
        $name = "";
        if (Util::contains($attributeName, " ")) {
            $token = explode(" ", $attributeName);
            $a = 0;
            while ($a < count($token)) {
                $name = $name . current($token);
                next($token);
                $a++;
            }
        } else {
            $name = $attributeName;
        }

        $this->list->append(new Attribute("select", "proplist", $name));
    }

    public function where($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("where", $build, trim($value)));
        } else {
            return false;
        }
    }

    public function whereNot($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = "?" . trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("whereNot", $build, trim($value)));
            $this->list->append(new Attribute("whereNot", "?#", "!"));
            return true;
        } else {
            return false;
        }
    }

    public function orWhere($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = "?" . trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("whereNot", $build, trim($value)));
            $this->list->append(new Attribute("whereNot", "?#", "|"));
            return true;
        } else {
            return false;
        }
    }

    public function orWhereNot($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = "?" . trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("whereNot", $build, trim($value)));
            $this->list->append(new Attribute("whereNot", "?#", "!"));
            $this->list->append(new Attribute("whereNot", "?#", "|"));
            return true;
        } else {
            return false;
        }
    }

    public function andWhere($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = "?" . trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("whereNot", $build, trim($value)));
            $this->list->append(new Attribute("whereNot", "?#", "&"));
            return true;
        } else {
            return false;
        }
    }

    public function andWhereNot($name, $operand, $value)
    {
        if ($operand == "-" || $operand == "=" || $operand == "<" || $operand == ">") {
            $build = "?" . trim($operand) . trim($name) . "=";
            $this->list->append(new Attribute("whereNot", $build, trim($value)));
            $this->list->append(new Attribute("whereNot", "?#", "!"));
            $this->list->append(new Attribute("whereNot", "?#", "&"));
            return true;
        } else {
            return false;
        }
    }

    public function fromCommand($command)
    {
        $this->list->append(new Attribute("commandPrint", "command", $command));
    }

    public function addCommand($command)
    {
        $this->list->append(new Attribute("commandReguler", "command", $command));
    }

    public function setAttribute($name, $value)
    {
        $this->list->append(new Attribute("setAttribute", $name, $value));
    }

    public function getBuildCommand()
    {
        return $this->list;
    }

    public function add(Attribute $attr)
    {
        $this->list->append($attr);
    }

}
