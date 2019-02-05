<?php
    session_start();

    require './functions.php';

    $errores;
    $admin;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        if($username == 'kevinlarios2343@gmail.com' && $pass == '123'){
            $admin = 'admin';
            $_SESSION["admin"] = "admin";

            if(verificarService() != null){
                print("<script>alert('El servicio fue creado Exitosamente!')</script>");
            }else{
                crearService();
            }
        }else {
            $errores = "Error";
        }

    }


    require 'views/index.view.php';

?>