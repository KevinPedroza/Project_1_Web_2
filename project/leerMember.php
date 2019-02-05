<?php
    require 'functions.php';

    $id = $_POST['id'];
    foreach (leerUsuarios($id) as $record) {
        print($record->identity) . "\n";
    }
?>