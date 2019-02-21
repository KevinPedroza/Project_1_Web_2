<?php
    //here is getting the functions from the file
    require 'functions.php';

    //here we are getting the varibles from the post
    $id = $_POST['id'];
    $sid;

    //here we verify if there is a service
    if (verificarService() != null){
        $sid = leerService();
    }
    
    //here we are returning the tag li to the front
    foreach (leerUsuarios($id, $sid) as $record) {
        print($record->identity) . "\n";
    }
?>