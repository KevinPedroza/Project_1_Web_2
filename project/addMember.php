<?php
    require 'functions.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $sid;

    if (verificarService() != null){
        $sid = leerService();
    }

    addMember($id, $name, $sid);

    foreach (leerUsuarios($id, $sid) as $record) {
       print($record->identity) . "\n";
    }


?>