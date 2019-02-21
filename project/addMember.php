<?php
    //here is getting the functions from the file
    require 'functions.php';

    //here we are getting the varibles from the post
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sid;

    //here we verify a service
    if (verificarService() != null){
        $sid = leerService();
    }

    //here we add a member
    addMember($id, $name, $sid);

    //here we return the view
    foreach (leerUsuarios($id, $sid) as $record) {
       print($record->identity) . "\n";
    }


?>