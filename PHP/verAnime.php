<?php
    session_start(); 
    include_once 'conexion.php';

    $userNow  = $_SESSION['admin'];
    echo "Usuario activo: ".$userNow."            ";
    
    $nom_anime =  $_SESSION["result"];
    $userid = $_SESSION['userid'];
    $animeid =  $_SESSION['resultID'];


    $sql = 'INSERT INTO historial(userid,animeid,nombre_anime) VALUES(?,?,?)';

    $sentencia_agregar=$mbd->prepare($sql);
    $sentencia_agregar->execute(array($userid,$animeid,$nom_anime));

    if(isset($_POST['comentario'])) {
        echo "CHINCHING";
        $comentario = $_POST['comentario'];
        $sql2 = 'INSERT INTO comment_anime(animeid,content,userid) VALUES(?,?,?)';
        $sentence = $mbd ->prepare($sql2);
        $sentence->execute(array($animeid,$comentario,$userid));
    }    
    
    ?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizacion</title>
    <link rel="stylesheet " href = "../css/bootstrap.min.css" />
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="buscarAnime.php">Volver a Buscar  <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Volver al inicio </a>
            </li>
            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href ="protegido.php"> Contenido Protegido</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>

      <br>
      <br>
      <br>
      <br>          
    <i class="fa fa-align-center" aria-hidden="true"></i>
    <div class="alert alert-success" role="alert">
    Viste con exito <?php echo $_SESSION["result"] ?>
    </div>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h2> Ingresa un comentario </h2>
                <form action="verAnime.php" method="POST">
                    <label class="mt-3">Deja tu comentario</label>
                    <input type="text" class="form-control mb-3" name="comentario">
    
                    <button class="btn btn-primary mt-3"> Enviar</button>
                </form>
            </div>
  
    </body>
</html>