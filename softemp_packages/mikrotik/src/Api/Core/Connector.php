<?php

namespace Mikrotik\Api\Core;

use Mikrotik\Api\Util\Util;

/**
 * Class Connector
 * @package Mikrotik\Api\Core
 *
 * Description of Connector
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property StreamSender $sender
 * @property StreamReciever $reciever
 * @property Util
 */
class Connector
{

    private $socket;
    private $sender;
    private $reciever;
    private $host;
    private $port;
    private $username;
    private $password;
    private $connected = false;
    private $login = false;

    /**
     * Connector constructor.
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     */
    public function __construct($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->initStream();
    }

    /**
     * @return bool
     */
    public function isConnected()
    {
        return $this->connected;
    }

    /**
     * @return bool
     */
    public function isLogin()
    {
        return $this->login;
    }

    /**
     *
     */
    private function initStream()
    {
        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
            die('Error');
        }
//        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $this->sender = new StreamSender($this->socket);
        $this->reciever = new StreamReciever($this->socket);
    }

    /**
     * @param $command
     * @return mixed
     */
    public function sendStream($command)
    {
        return $this->sender->send($command);
    }

    /**
     * @return mixed
     */
    public function recieveStream()
    {
        return $this->reciever->reciever();
    }

    /**
     * @param $username
     * @param $password
     * @param $challange
     * @return string
     */
    private function challanger($username, $password, $challange)
    {
        $chal = md5(chr(0) . $password . pack('H*', $challange));
        $login = "/login\n=name=" . $username . "\n=response=00" . $chal;
        return $login;
    }

    /**
     *
     */
    public function connect()
    {
//        $result = socket_connect($this->socket, $this->host, $this->port);
//        if ($result === false) {
//            $this->connected = false;
//            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
//        } else {
//            $this->sendStream("/login");
//            $rec = $this->recieveStream();
//            if (!Util::contains($rec, "!trap") && strlen($rec) > 0) {
//                $word = explode("\n", $rec);
//                if (count($word) > 1) {
//                    $split = explode("=ret=", $word[2]);
//                    $challange = $split[1];
//                    $challanger = $this->challanger($this->username, $this->password, $challange);
//                    $this->sendStream($challanger);
//                    $res = $this->recieveStream();
//                    if (Util::contains($res, "!done") && !Util::contains($res, "!trap")) {
//                        $this->login = true;
//                    }
//                }
//            }
//            $this->connected = true;
//        }

        if (socket_connect($this->socket, $this->host, $this->port)) {
            $this->sendStream("/login");
            $rec = $this->recieveStream();
            if (!Util::contains($rec, "!trap") && strlen($rec) > 0) {
                $word = explode("\n", $rec);
                if (count($word) > 1) {
                    $split = explode("=ret=", $word[2]);
                    $challange = $split[1];
                    $challanger = $this->challanger($this->username, $this->password, $challange);
                    $this->sendStream($challanger);
                    $res = $this->recieveStream();
                    if (Util::contains($res, "!done") && !Util::contains($res, "!trap")) {
                        $this->login = true;
                    }
                }
            }
            $this->connected = true;
        } else {
            $this->connected = false;
        }
    }

}
