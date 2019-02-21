<?php
    //here are starting the session 
    session_start();

    //here is getting the functions from the file
    require './functions.php';

    $errores = '';
    $admin = '';

    //here we are getting the varibles from the post
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

    //here we return the view
    require 'views/index.view.php';

?>