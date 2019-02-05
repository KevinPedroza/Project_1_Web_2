<?php

    require './functions.php';

    $id = $_POST['id'];
    $nick = $_POST['nick'];
    $mesa = $_POST['mesa'];

    sendMessage($id, $mesa, $nick);
    foreach (readMessage($id) as $record) {
        echo "<li class='left clearfix'>
        <div class='dis' style='display:flex;'>
            <span class='chat-img pull-left' style='font-size:40px;'>
                <i class='fas fa-user' style='border: 1px solid black; border-radius: 10px; padding: 10px; margin-top: 5px;'></i>
            </span>
            <div class='chat-body clearfix' style='margin-left: 10px;'>
                <div class='header'>
                    <strong class='primary-font'>" . $record->from . "</strong> <small class='pull-right text-muted'>
                        <span class='glyphicon glyphicon-time'></span>" . date_format($record->dateCreated, 'Y-m-d H:i:s') . " </small>
                </div>
                <p> " .  
                    $record->body . ".
                </p>
            </div>
        </div>

        </li> ";
    }
?>