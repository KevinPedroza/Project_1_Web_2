<?php
    //here is getting the functions from the file
    require './functions.php';

    //here we are getting the varibles from the get
    $idchannel = $_GET['id'];
    $sid;
    
    //here we verify a service
    if (verificarService() != null){
        $sid = leerService();
    }

    //here we delete a channel
    borrarCanal($idchannel, $sid);

    header('Location: index.php');

?>