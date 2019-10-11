<?php

namespace BotPandora\Telegram\Core;

class CoreController
{
    private $token = '828050877:AAG07Y_H9_B9cAayAR0R4cW0iDOK4a2x1IM';
    private $url;
    private $chatId;
    private $lastMessage;

    public function __construct()
    {
        $this->url = "https://api.telegram.org/bot$this->token/";
        $treated = $this->treatment($this->getMessage());
        $this->actions($treated);
    }

    protected function treatment($data)
    {
        $response = (object)[
            'update_id' => $data['update_id'],
            'message_id' => $data['message']['message_id'],
            'from_id' => $data['message']['from']['id'],
            'from_first_name' => $data['message']['from']['first_name'],
            'from_last_name' => $data['message']['from']['last_name'],
            'from_username' => $data['message']['from']['username'],
            'chat_id' => $data['message']['chat']['id'],
            'chat_first_name' => $data['message']['chat']['first_name'],
            'chat_last_name' => $data['message']['chat']['last_name'],
            'chat_username' => $data['message']['chat']['username'],
            'chat_type' => $data['message']['chat']['type'],
            'date' => $data['message']['date'],
            'message' => $data['message']['text']
        ];

        if ($response->date == $this->lastMessage){
            return false;
        }
        $this->lastMessage = $response->date;
        return $response;

    }

    protected function getMessage()
    {
        $response = file_get_contents($this->url."getupdates");
        $result =  json_decode($response, true);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";



        $length = count($result['result']);
        return $result['result'][$length-1];
    }

    protected function actions($data)
    {
        $message = "Olá $data->from_first_name, sua mensagem foi: $data->message";
        $this->sendMessage(
            "sendMessage",
            array(
                'chat_id' => $data->chat_id,
                "text" => $message));
    }

    protected function sendMessage($method, $parameters)
    {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => json_encode($parameters),
                'header' => "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
            )
        );

        $context  = stream_context_create( $options );

        file_get_contents($this->url.$method, false, $context );

    }
}
