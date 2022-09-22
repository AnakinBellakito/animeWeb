<?php
include_once 'conexion.php'; 
session_start();
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

$userid = $_SESSION['userid'];
$animeid =  $_SESSION['resultID'];

$sql = "SELECT DISTINCT animeid,nombre_anime from historial where userid = ? ORDER BY fecha;";

$sentence = $mbd->prepare($sql);
$sentence->execute(array($userid));
$resultado = $sentence-> fetchAll();





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
            <?php endif ?>
        </ul>
    </nav>

      <br>
      <br>
      <br>
      <br>   

      <?php foreach($resultado as $res): ?>       
      <div class="alert alert-info" role="alert">
        <?php echo $res['nombre_anime'] ?>
    </div>
        <?php endforeach ?>