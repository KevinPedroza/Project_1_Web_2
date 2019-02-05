<?php 

   session_start();

   require './functions.php';

   $idchannel = $_GET['id'];
   $nombrechannel = $_GET['nombre'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $sid;

        if (verificarService() != null){
            $sid = leerService();
        }
    
        editarCanal($id, $nombre, $sid);

        header('Location: index.php');
    }


    require 'views/updateChannel.view.php';
?>