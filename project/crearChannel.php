<?php 

    //here is getting the functions from the file
    require './functions.php';
    
    //here we are getting the varibles from the post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        
        $sid;

        if (verificarService() != null){
            $sid = leerService();
        }
    
        crearCanal($nombre, $sid);

        header('Location: index.php');
    }

?>