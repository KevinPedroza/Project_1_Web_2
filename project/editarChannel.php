<?php 

   //here are starting the session 
   session_start();

   //here is getting the functions from the file
   require './functions.php';

   $idchannel = $_GET['id'];
   $nombrechannel = $_GET['nombre'];

    //here we are getting the varibles from the post
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

    //here we return the view
    require 'views/updateChannel.view.php';
?>