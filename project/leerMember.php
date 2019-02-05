<?php
    require 'functions.php';

    $id = $_POST['id'];
    $sid;

    if (verificarService() != null){
        $sid = leerService();
    }

    foreach (leerUsuarios($id, $sid) as $record) {
        print($record->identity) . "\n";
    }
?>