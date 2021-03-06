<?php
    //here is getting the functions from the file
    require './functions.php';

    //here we are getting the varibles from the post
    $id = $_POST['id'];
    $nick = $_POST['nick'];
    $mesa = $_POST['mesa'];
    $sid;

    //here we verify if there is a service
    if (verificarService() != null){
        $sid = leerService();
    }

    //here we are sending the message to the function
    sendMessage($id, $mesa, $nick, $sid);
    
    //here we are returning the tag li to the front
    foreach (readMessage($id, $sid) as $record) {
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