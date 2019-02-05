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
 
    <title>Chat - Kevin P.</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">
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

    <div class="container">
        <main style="text-align:center;">
            <h3>Modifique el Canal</h3>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre Canal</label>
                    <div class="col-sm-10 input-group mb-3">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $idchannel;?>">
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $nombrechannel;?>" required>
                    </div>
            </div>
                <button class="btn btn-success">Modificar Canal</button>
            </form>
        </main>
    </div>

</body>
</html>