<?php
    require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

    use Twilio\Rest\Client;

    //here we verify the service
    function verificarService(){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);
        
        $services = $twilio->chat->v2->services->read();
        return $services;
    }

    //here we reed the service
    function leerService() {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);
        
        $services = $twilio->chat->v2->services->read();
        foreach ($services as $record) {
            return $record->sid;
        }
    }

    //here we create a service
    function crearService(){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $service = $twilio->chat->v2->services->create("FRIENDLY_NAME");
    }

    //here we reed channels
    function leerCanales($servicesid){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $channels = $twilio->chat->v2->services("$servicesid")->channels->read();
        return $channels;
    }

    //here we create a channel
    function crearCanal($nombre, $servicesid){
        try {
            $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
            $token  = "1d8ac30d9b638b5123d740ac13a377c9";
            $twilio = new Client($sid, $token);

            $channel = $twilio->chat->v2->services("$servicesid")->channels->create(array("friendlyName" => "$nombre"));
        }catch(Exception $e){

        }
    }

    //here we delete a channel
    function borrarCanal($id, $servicesid){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $twilio->chat->v2->services("$servicesid")->channels("$id")->delete();
    }

    //here we delete a channel
    function editarCanal($id, $nombre, $servicesid){
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $channel = $twilio->chat->v2->services("$servicesid")->channels("$id")
        ->update(array(
                     "friendlyName" => "$nombre"
                 )
        );
    }

    //here we reed users
    function leerUsuarios($id, $servicesid) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $members = $twilio->chat->v2->services("$servicesid")->channels("$id")->members->read();
        
        return $members;
    }

    //here we add a member
    function addMember($id, $name, $servicesid){
        try {
            $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
            $token  = "1d8ac30d9b638b5123d740ac13a377c9";
            $twilio = new Client($sid, $token);

            $member = $twilio->chat->v2->services("$servicesid")->channels("$id")->members->create("$name");
        }catch(Exception $e){

        }
    }

    //here we send a message
    function sendMessage($id, $message, $name, $servicesid) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $message = $twilio->chat->v2->services("$servicesid")->channels("$id")->messages->create(array("body" => "$message", "from" => "$name"));

    }

    //here we reed messages
    function readMessage($id, $servicesid) {
        $sid    = "AC2c1cb80c5696191553ddc5d5a69746e4";
        $token  = "1d8ac30d9b638b5123d740ac13a377c9";
        $twilio = new Client($sid, $token);

        $messages = $twilio->chat->v2->services("$servicesid")->channels("$id")->messages->read();
        return $messages;
    }
?>