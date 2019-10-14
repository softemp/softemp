<?php

namespace BotPandora\Telegram\Core;
// urls do telegram

//  https://api.telegram.org/bot{my_bot_token}/setWebhook?url={url_to_send_updates_to}
//  https://api.telegram.org/bot{my_bot_token}/deleteWebhook
//  https://api.telegram.org/bot{my_bot_token}/getWebhookInfo
class CommunicationLayer
{
    protected $token = '838141146:AAGLduHX5pNP0jEq7peX5YRzgCRrZK-nDF0';
    protected $url;

    public function __construct()
    {
        $this->url = "https://api.telegram.org/bot$this->token/";
    }

    public function getUrl($url){
        $response = file_get_contents($url);
        $result =  json_decode($response, true);
        return $result;
    }

    public function getAllMessages()
    {
        $result = $this->getUrl($this->url."getupdates");
//        $response = file_get_contents($this->url."getupdates");
//        $result =  json_decode($response, true);
        return $result['result'];
    }

    public function getMessagesWithPost($offset = null)
    {
        $content = null;

        if ($offset){
            $content = $offset + 1;
        }
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => json_encode(
                    array(
                        'allowed_updates' => "message",
                        'offset' => $content

                    )),
                'header' => [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ]
            )
        );
        $context  = stream_context_create($options);
        $send = file_get_contents($this->url.'getupdates', false, $context );
        $result = json_decode($send, true);
        return $result['result'];
    }

    public function getLastMessage()
    {
        $messages = $this->getAllMessages();

        $messages = $this->treatment($messages);

        $message = end($messages);

        return $message;

    }

    public function sendMessage($message, $chatId)
    {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => json_encode(array(
                    'chat_id' => $chatId,
                    "text" => $message)),
                'header' => [
                    'Content-Type: application/json',
                    'Accept: application/json'
                ]
            )
        );

        $context  = stream_context_create( $options );
        $send = file_get_contents($this->url.'sendMessage', false, $context );
        if ($send)
        {
            return true;
        }

        return false;
    }

    protected function treatment($arrayData)
    {

        foreach ($arrayData as $data) {
            @$response[$data['message']['message_id']] = (object)[
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
                'message' => $data['message']['text'],
                'latitude' => $data['message']['location']['latitude'],
                'longitude' => $data['message']['location']['longitude']
            ];
        }
        return $response;
    }
}
