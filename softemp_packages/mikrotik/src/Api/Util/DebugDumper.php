<?php

namespace Mikrotik\Api\Util;

/**
 * Class DebugDumper
 * @package Mikrotik\Api\Util
 *
 * Description of Debug
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class DebugDumper {

    public static function dump($var, $detail = false) {
        if (is_array($var)) {
            if ($detail == false) {
                echo "<pre>";
                print_r($var);
                echo "</pre>";
            } else {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            }
        } else {
            if ($detail == false) {
                echo "<pre>";
                echo $var;
                echo "</pre>";
            } else {
                echo "<pre>";
                var_dump($var);
                echo "</pre>";
            }
        }
    }

}
