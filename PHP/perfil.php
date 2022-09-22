<?php 
session_start(); 
include_once 'conexion.php';
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

echo "\n";
echo "User id :".$_SESSION['userid'];

$sql_insertar = "SELECT * FROM usuario WHERE userid = ?";

$sentencia_agregar=$mbd->prepare($sql_insertar);
$sentencia_agregar->execute(array($_SESSION['userid']) );
$resultado = $sentencia_agregar->fetchAll();

$sql_insertar2 = "SELECT DISTINCT * FROM usuario_usuario";
$sentencia_agregar2=$mbd->prepare($sql_insertar2);
$sentencia_agregar2->execute() ;
$resultado2 = $sentencia_agregar2->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet " href = "../css/bootstrap.min.css" />
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">inicio  <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sesion.php">Iniciar Sesion </a>
            </li>
            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href ="protegido.php"> Contenido Protegido</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
  
    <div class="container mt-4">
       <div class='row'>

    <div class="card">
        <img class="card-img-top" src="../img/user.jpg" width="50" height="350" alt="">
        <?php foreach($resultado as $res): ?>
            
        <div class="card-body">
          
            <h4 class="card-title">Nombre: <?php echo $res['nombre'];  ?> </h4>
                            <p class="card-text">Numero de animes Vistos: <?php echo $res['num_animes_vistos'] ?></p>
                            
                           

        </div>
        <?php endforeach ?>
    </div>


            </div>
            </div>
            <?php foreach($resultado2 as $res): ?>
            <div class="alert alert-success" role="alert">
                <p>  Sigues a : <?php echo $res['name2']; ?> </p>
                    </div>
                    <?php endforeach ?>

    </body>
</html>