<?php
    require 'functions.php';

    $id = $_POST['id'];
    $name = $_POST['name'];

    addMember($id, $name);

    foreach (leerUsuarios($id) as $record) {
       print($record->identity) . "\n";
    }


?>