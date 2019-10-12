<?php

namespace BotPandora\Telegram\MkBlock;

use BotPandora\Telegram\Core\CommunicationLayer;

include('../Core/CommunicationLayer.php');

class Init
{
    private $bot;
    private $lastMessageId = [];
    private $chat;
    private $permited = [];
    private $originArrayMessage;
    private $urlMkBlock;
    private $offset;

    public function __construct()
    {
        $this->urlMkBlock = 'https://gbittelecom.com.br/painel/provedor/mkblock/telegram/';
//        $this->urlMkBlock = 'http://localhost:8282/painel/provedor/mkblock/telegram/';

        $this->bot = new CommunicationLayer;
        $chatWillian = 616955662;    // Chat willian
        $chatGrupo = -1001484998585; // Id do grupo

//        $this->chat = $chatWillian;
        $this->chat = $chatGrupo;

        $this->permited[] = $chatGrupo;
        $this->permited[] = $chatWillian;
    }

    /**
     * Esse método principal obtém um array de mensagens, e faz as seguintes verificações:
     *  -> Verifica se a key message existe;
     *  -> Verifica se o remetente tem permissão de enviar comandos;
     *  -> Verifica se a mensagem é um comando ou não;
     */
    public function init($offset = null)
    {
        $arrays = $this->bot->getMessagesWithPost($offset);

        foreach ($arrays as $array) {
            if (key_exists("message", $array)) {
                if (in_array($array['message']['chat']['id'], $this->permited)) {
                    if (key_exists("entities", $array['message'])) {
                        $this->offset = $array['update_id'];
                        $this->verifyMessage();
                    }
                }
            }
        }
        $this->init($this->offset);
    }

    /**
     *
     * Método verifica se a mensagem já foi respondida ou não
     */
    private function verifyMessage()
    {
        if (in_array($this->originArrayMessage['message']['message_id'], $this->lastMessageId)) {
        } else {
            $this->lastMessageId[] = $this->originArrayMessage['message']['message_id'];
            $this->recognition($this->originArrayMessage['message']['text']);
        }
    }

    /**
     * Método recebe a mensagem e separa o comando enviado e o parâmetro
     * Verifica os parâmetros e retorna false se estive incorreto
     *
     * @param $message
     * @return bool
     */
    private function recognition($message)
    {
        $arrayMessage = explode('/', $message);

        if (empty($arrayMessage[0])) {
            $params = explode(" ", "$arrayMessage[1]");

            if (empty($params[1]) OR count($params) > 2) {

                $this->bot->sendMessage("Parâmetros incorretos:::: " . $message, $this->chat);

            } else {
                $this->commands($params[0], $params[1]);
            }

        } else {
            return false;
        }
    }

    /**
     * Recebe o comando e o parâmetro e verifica se o comando existe
     *
     * @param $command
     * @param $login
     */
    private function commands($command, $login)
    {
        if (method_exists($this, $command)) {
            $this->$command($login);
        } else {
            $this->bot->sendMessage("Comando não encontrado", $this->chat);
        }
    }

    /**
     * Recebe o login do cliente e envia o comando para liberar retornando uma mensagem de sucesso ou erro
     *
     * @param $login
     * @return bool
     */
    protected function liberar($login)
    {
        $result = $this->bot->getUrl($this->urlMkBlock . 'unlockClient/' . $login);

        //print_r($result['message']);

        $msg = $this->statusResult($result);

        $this->bot->sendMessage($msg, $this->chat);
        $this->log($msg . " por " . $this->originArrayMessage['message']['chat']['first_name']);
        return true;
    }

    /**
     * Recebe o login do cliente e envia o comando para bloquear retornando uma mensagem de sucesso ou erro
     *
     * @param $login
     * @return bool
     */
    protected function bloquear($login)
    {
        $result = $this->bot->getUrl($this->urlMkBlock . 'blockClient/' . $login);

        //print_r($result['message']);

        $msg = $this->statusResult($result);

        $this->bot->sendMessage($msg, $this->chat);
        $this->log($msg . " por " . $this->originArrayMessage['message']['chat']['first_name']);
        return true;
    }

    /**
     * Tratamento do resultado obtido no MkAuth e nos Roteadores
     *
     * @param $result
     * @return mixed|string
     */
    private function statusResult($result)
    {
        if (key_exists('success', $result['message'])) {
            $msg = $result['message']['success'];
        } elseif (key_exists('error', $result['message'])) {
            $msg = $result['message']['error'];
        } elseif (key_exists('warning', $result['message'])) {
            $msg = $result['message']['warning'];
        } elseif (key_exists('info', $result['message'])) {
            $msg = $result['message']['info'];
        } else {
            $msg = "Erro inesperado";
        }

        return $msg;
    }

    /**
     * Recebe o login do cliente e envia o comando para reiniciar retornando uma mensagem de sucesso ou erro
     *
     * @param $login
     * @return bool
     */
    protected function reiniciar($login)
    {
        $result = $this->bot->getUrl($this->urlMkBlock . 'rebootClient/' . $login);

        //print_r($result['message']);

        $msg = $this->statusResult($result);

//        $msg = "$login foi reiniciado";
        $this->bot->sendMessage($msg, $this->chat);
        $this->log($msg . " por " . $this->originArrayMessage['message']['chat']['first_name']);
        return true;
    }

    /**
     * Recebe a mensagem e excreve no arquivo de log
     *
     * @param $message
     */
    protected function log($message)
    {
        $msg = date('Y/m/d H:i:s') . ": $message";
        exec("echo $msg >> comands.log");
    }

}

$pandora = new Init();
$pandora->init();
