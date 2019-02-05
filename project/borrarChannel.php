<?php

    require './functions.php';

    $idchannel = $_GET['id'];
    borrarCanal($idchannel);

    header('Location: index.php');

?>