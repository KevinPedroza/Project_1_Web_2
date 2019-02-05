<?php 

    require './functions.php';

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