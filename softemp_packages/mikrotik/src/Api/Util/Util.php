<?php

namespace Mikrotik\Api\Util;

/**
 * Class Util
 * @package Mikrotik\Api\Util
 *
 * * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class Util {

    public static function contains($string, $needle) {
        $pos = strpos($string, $needle);
        if (!($pos === FALSE)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
