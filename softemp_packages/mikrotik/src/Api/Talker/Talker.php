<?php

namespace Mikrotik\Api\Talker;

use Mikrotik\Api\Core\Connector;
use Mikrotik\Api\Entity\Auth;

/**
 * Class Talker
 * @package Mikrotik\Api\Talker
 *
 * Description of Talker
 *
 * @author Paulo Roberto da Silva <paulo@softemp.com.br>
 * @copyright Copyright (c) 2018
 * @license proprietary
 *
 * @property Auth
 * @property Connector
 * @property TalkerReciever
 * @property TalkerSender
 */
class Talker
{

    private $sender;
    private $reciever;
    private $auth;
    private $connector;

    /**
     * Talker constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
        $this->connector = new Connector($auth->getHost(), $auth->getPort(), $auth->getUsername(),
            $auth->getPassword());
        $this->connector->connect();

       // $this->statusConnect($this->connector);
//        if (!$this->connector->isConnected()){
//            echo "<br> Erro de conexão <br>";
//        } else {
//            echo "<br> Conectado com sucesso<br>";
//            if (!$this->connector->isLogin()){
//                echo "<br> Login negado! <br>";
//            } else {
//                echo "<br> Logado com sucesso<br>";
//                $this->sender = new TalkerSender($this->connector);
//                $this->reciever = new TalkerReciever($this->connector);
//            }
//        }
        //die('parou');

        $this->sender = new TalkerSender($this->connector);
        $this->reciever = new TalkerReciever($this->connector);
    }

    public function statusConnect(){
        if (!$this->connector->isConnected()){
            return "Erro de conexão!";
        } else {
            if (!$this->connector->isLogin()){
                return "Acesso negado!";
            } else {
                return true;
            }
        }
    }

    /**
     * @return type
     */
    public function isLogin()
    {
        return $this->connector->isLogin();
    }

    /**
     * @return type
     */
    /**
     * @return Connector
     */
    public function getConnector(): Connector
    {
        return $this->connector->isConnected();
    }
//    public function isConnected()
//    {
////        return parent::isConnected();
//    }

    /**
     * @return type
     */
    public function isDebug()
    {
        return $this->auth->getDebug();
    }

    /**
     * @param type $boolean
     */
    public function setDebug($boolean)
    {
        $this->auth->setDebug($boolean);
        $this->sender->setDebug($boolean);
        $this->reciever->setDebug($boolean);
    }

    /**
     * @return type
     */
    public function isTrap()
    {
        return $this->reciever->isTrap();
    }

    /**
     * @return type
     */
    public function isDone()
    {
        return $this->reciever->isDone();
    }

    /**
     * @return type
     */
    public function isData()
    {
        return $this->reciever->isData();
    }

    /**
     * @param type $sentence
     */
    public function send($sentence)
    {
//        $this->sender->send($sentence);
//        $this->reciever->doRecieving();

        if (!$this->connector->isConnected()){
            return "Erro de conexão";
        } else {
//            echo "<br> Conectado com sucesso<br>";
            if (!$this->connector->isLogin()){
                return "Acesso negado!";
            } else {
//                echo "Logado com sucesso";
                $this->sender->send($sentence);
                $this->reciever->doRecieving();

                return true;
            }
        }
    }

    /**
     * @return type
     */
    public function getResult()
    {
        return $this->reciever->getResult();
    }

}
