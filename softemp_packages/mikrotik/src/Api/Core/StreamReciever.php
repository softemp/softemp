<?php

namespace Mikrotik\Api\Core;

/**
 * Class StreamReciever
 * @package Mikrotik\Api\Core
 *
 * Description of StreamReciever
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 */
class StreamReciever
{

    private $closed = false;
    private $socket;

    /**
     * StreamReciever constructor.
     * @param $socket
     */
    public function __construct($socket)
    {
        $this->socket = $socket;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return $this->closed;
    }

    /**
     * @return string
     */
    public function reciever()
    {
        $out = "";
        $i = 0;
        while (true) {
            $word = $this->protocolWordDecoder();
            if (strlen($word) != 0 && strlen($word) > 0) {
                $out = $out . "\n" . $word;
            } else {
                break;
            }
            $i++;
        }
        return $out;
    }

    /**
     * @return string
     */
    private function protocolWordDecoder()
    {
        return $this->streamReciever($this->protocolLengthDecoder());
    }

    /**
     * @param $length
     * @return string
     */
    private function streamReciever($length)
    {
        $recieved = "";
        while (strlen($recieved) < $length) {
            $len = $length - strlen($recieved);
            $str = socket_read($this->socket, $len);
            if ($str == '') {
                $this->closed = true;
                echo socket_last_error($this->socket);
                break;
            }
            $recieved = $recieved . $str;
        }
        return $recieved;
    }

    /**
     * @return bool|int
     */
    private function protocolLengthDecoder()
    {
        $byte = ord($this->streamReciever(1));
        if (($byte & 0x80) == 0x00) {
            $byte = $byte;
        } else {
            if (($byte & 0xC0) == 0x80) {
                $byte &= ~0xC0;
                $byte <<= 8;
                $byte += ord($this->streamReciever(1));
            } else {
                if (($byte & 0xE0) == 0xC0) {
                    $byte &= ~0xE0;
                    $byte <<= 8;
                    $byte += ord($this->streamReciever(1));
                    $byte <<= 8;
                    $byte += ord($this->streamReciever(1));
                } else {
                    if (($byte & 0xF0) == 0xE0) {
                        $byte &= ~0xF0;
                        $byte <<= 8;
                        $byte += ord($this->streamReciever(1));
                        $byte <<= 8;
                        $byte += ord($this->streamReciever(1));
                        $byte <<= 8;
                        $byte += ord($this->streamReciever(1));
                    } else {
                        if (($byte & 0xF8) == 0x0F0) {
                            $byte = ord($this->streamReciever(1));
                            $byte <<= 8;
                            $byte += ord($this->streamReciever(1));
                            $byte <<= 8;
                            $byte += ord($this->streamReciever(1));
                            $byte <<= 8;
                            $byte += ord($this->streamReciever(1));
                        }
                    }
                }
            }
        }
        return $byte;
    }

    /**
     * @return array
     */
    private function getSocketStatus()
    {
        return socket_get_status($this->socket);
    }

}
