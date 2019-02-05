<?php 

    require './functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        
        crearCanal($nombre);

        header('Location: index.php');
    }

?>