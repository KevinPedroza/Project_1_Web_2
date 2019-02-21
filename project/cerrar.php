<?php
    //here are starting the session and we reset all the sessions
    session_start();

    session_unset();
    session_destroy(); 

    header('Location: index.php');
?>