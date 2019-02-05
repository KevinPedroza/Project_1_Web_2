<?php
    require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

    use Twilio\Rest\Client;

    function verificarService(){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);
        
        $services = $twilio->chat->v2->services->read();
        return $services;
    }

    function crearService(){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $service = $twilio->chat->v2->services->create("FRIENDLY_NAME");
    }

    function leerCanales(){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $channels = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels->read();
        return $channels;
    }

    function crearCanal($nombre){
        try {
            $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
            $token  = "1d8ac30d9b638b5123d740ac13a377c9";
            $twilio = new Client($sid, $token);

            $channel = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels->create(array("friendlyName" => "$nombre"));
        }catch(Exception $e){

        }
    }

    function borrarCanal($id){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")->delete();
    }

    function editarCanal($id, $nombre){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $channel = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")
        ->update(array(
                     "friendlyName" => "$nombre"
                 )
        );
    }

    function leerUsuarios($id) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $members = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")->members->read();
        
        return $members;
    }

    function addMember($id, $name){
        try {
            $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
            $token  = "1d8ac30d9b638b5123d740ac13a377c9";
            $twilio = new Client($sid, $token);

            $member = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")->members->create("$name");
        }catch(Exception $e){

        }
    }

    function sendMessage($id, $message, $name) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $message = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")->messages->create(array("body" => "$message", "from" => "$name"));

    }

    function readMessage($id) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $messages = $twilio->chat->v2->services("IS010e0c085b554fc294433fb15ef46117")->channels("$id")->messages->read();
        return $messages;
    }
?>