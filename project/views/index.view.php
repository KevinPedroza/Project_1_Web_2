<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Chat - Kevin P.</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="../index.php">
                <i class="fab fa-korvue"></i>
                Chat - Kevin P
            </a>
            <div style="display:flex;">        
            <?php if(!empty($_SESSION)):?>
            <form action="cerrar.php" method="post">
                <button type="submit" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#exampleModal">Cerrar Sesión</button>
            </form>
            <?php else:?>
                <button type="button" class="btn btn-lg btn-primary" style="margin-right:2px;" data-toggle="modal" data-target="#exampleModal">Admin Login In</button>
            <?php endif;?>
            </div>
        </nav>
    </header>

    <?php 

        if($errores != null || $errores != ''){
            print("<div class='alert alert-danger col-sm-3 offset-sm-5' style='margin-top: 10px;' role='alert'>Datos Incorrectos!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button></div>");

            $errores = '';
        }else if($admin != null || $admin != ''){
            print("<div class='alert alert-success col-sm-3 offset-sm-5' style='margin-top: 10px;' role='alert'>Bienvenido Admin!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button></div>");
        }

    ?>
    <main>
        <?php if(!empty($_SESSION)):?>
            <button class="btn btn-lg btn-success" style="width: 100%; margin: 10px; " data-toggle="modal" data-target="#exampleModal2" style="margin-left:55px; margin-top:5px;">Crear Canal</button>
        <?php endif;?>
        <div class="row canales" style="margin-top:15px; margin-left:15px;">
            <table class="col-sm-2 table table-hover">
                <?php if(!empty($_SESSION)):?>

                <thead>
                    <tr>
                    <th scope="col">Canales</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(leerCanales() as $record):?>
                        <tr>
                        <th scope="row"><?php print($record->friendlyName);?></th>
                        <th><a style="color:white;" href="borrarChannel.php?id=<?php print($record->sid);?>" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash"></i></a>
                            <a class="btn btn-primary" href="editarChannel.php?id=<?php print($record->sid);?>&nombre=<?php print($record->friendlyName);?>" title="Editar"><i class="fas fa-edit"></i></a>
                        </th>
                        </tr>
                    <?endforeach;?>
                </tbody>
                <?php else:?>

                <thead>
                    <tr>
                    <th scope="col">Canales</th>
                    <th scope="col">Unirse</th>
                    <th>Ver Usuarios</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach(leerCanales() as $record):?>
                    <tr>
                    <th scope="row"><?php print($record->friendlyName);?></th>
                    <th scope="row"><button class="btn btn-primary" onclick="ajax('<?php print($record->sid);?>')" id="btnnick" data-toggle="modal" data-target="#exampleModal3 " title="Unirse al Canal <?php print($record->friendlyName);?>"><i class="fas fa-sign-in-alt"></i></button></th>
                    <th scope="row"><button class="btn btn-success" onclick="ajaxList('<?php print($record->sid);?>')" id="btnnick2" data-toggle="modal" data-target="#exampleModal3 " title="Ver usuarios del Canal <?php print($record->friendlyName);?>"><i class="fas fa-address-book"></i></button></th>
                    </tr>
                <?endforeach;?>
                </tbody>
                <?php endif;?>
            </table>
        <?php if(empty($_SESSION)):?>
                <div class="col-sm-2" style="text-align: center;">
                    <h4>Nickname</h4>
                    <input type="text" name="nick" id="nick" placeholder="Nickname" class="form-control">
                    <input type="hidden" name="hidenick" id="hidenick" value="">
                    <input type="hidden" name="sidcha" id="sidcha" value="">
                    <div class="user" id="user">
                    
                    </div>
                    <h6 style="margin-top:20px;">Usuarios en este Canal</h6>
                    <div class="tbody" id="tbody"> 
                    
                    </div>
                </div>

            <div class="col-md-7">
                <div class="panel panel-primary">
                <div class="panel-heading" style="background: gray;">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle">
                            
                        </button>

                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat" id="chat">

                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" id="mesa" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" onclick="ajaxSend()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </main>

    <!-- Modal Admin -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresa tus Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-10 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="email" name="username" class="form-control" id="username" placeholder="@ejemplo.com" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label" style="margin-right: 40px;">Contraseña</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" name="pass" id="pass" required placeholder="Contraseña">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Channel -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresa el Nombre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="crearChannel.php" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10 input-group mb-3">
                    <input type="text" name="nombre" class="form-control" id="staticEmail" placeholder="Nombre Canal" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <script>

        var contador = 0;

        function ajax(idcha){

            document.getElementById('sidcha').value = idcha;
            var nick = document.getElementById('nick').value;
            document.getElementById('hidenick').value = nick;

            if(nick == null || nick == ''){
                alert('Seleccione un Nombre!');
            }else {
                document.getElementById('user').innerHTML = 'Usuario: ' + nick;
                $.ajax({
                    type: "POST",
                    url: "addMember.php",
                    data: { id: idcha, name: nick}
                    }).done(function( msg ) {
                        $("#tbody").html("");
                        var newCell = document.getElementById('tbody');
                        newCell.append(msg);
                        nick = document.getElementById('nick').value = '';
                }); 
                var inter = setInterval(function(){        
                    $.ajax({
                    type: "GET",
                    url: "leerMessage.php",
                    data: { id: idcha}
                        }).done(function( msg ) {   

                                document.getElementById('chat').innerHTML = msg;
                            /*var inter = setInterval(function(){ 
                                document.getElementById('chat').innerHTML = msg;
                            }, 1000); */ 

                    }); 
        
                }, 1000);
            };  
        }

        function ajaxList(idcha){
            document.getElementById('sidcha').value = idcha;
            $.ajax({
                type: "POST",
                url: "leerMember.php",
                data: { id: idcha}
                }).done(function( msg ) {
                    $("#tbody").html("");
                    var newCell = document.getElementById('tbody');
                    newCell.append(msg);
                });    
        }

        function ajaxSend() {
            idcha = document.getElementById('sidcha').value;
            nick = document.getElementById('hidenick').value;
            message = document.getElementById('mesa').value;

            if(nick == ''){
                alert("Escriba su NickName");
            } else if(message == '') {
                alert("Escriba su Mensaje");
            } else{
                $.ajax({
                type: "POST",
                url: "sendMessage.php",
                data: { id: idcha, nick: nick, mesa: message}
                }).done(function( msg ) {
                    message = document.getElementById('mesa').value = '';
            });    
            }
        }   

    </script>

    </div>



</body>
</html>