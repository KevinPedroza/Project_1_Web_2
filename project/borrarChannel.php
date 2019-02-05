<?php

    require './functions.php';

    $idchannel = $_GET['id'];
    $sid;

    if (verificarService() != null){
        $sid = leerService();
    }

    borrarCanal($idchannel, $sid);

    header('Location: index.php');

?>