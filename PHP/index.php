<?php session_start(); 
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";
include_once "conexion.php";

echo "\n";


$sql_insertar = "SELECT * FROM top_5_popular";
$sentencia_agregar=$mbd->prepare($sql_insertar);
$sentencia_agregar->execute();
$resultado = $sentencia_agregar->fetchAll();

$sql_insertar2 = "SELECT * FROM top_5_less_popular";
$sentencia_agregar2=$mbd->prepare($sql_insertar2);
$sentencia_agregar2->execute();
$resultado2 = $sentencia_agregar2->fetchAll();

$sql_insertar3 = "SELECT * FROM top_5_comentarios";
$sentencia_agregar3 =$mbd->prepare($sql_insertar3);
$sentencia_agregar3->execute();
$resultado3 = $sentencia_agregar3->fetchAll();



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
                <a class="nav-link" href="registro.php">Registrate  <span class="sr-only"></span></a>
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
                <br>
    <div class="card" >
    <h4 class="card-title">5 animes mas populares</h4>
        <?php foreach($resultado as $res): ?>
        <div class="card-body">
            <p class="card-text"><?php echo $res['nombre']." con una puntuacion media de: ".$res['rating']  ?></p>
        </div>
        <?php endforeach ?>
    </div>

    <br>
    <br>
    <br>

    <div class="card" >
    <h4 class="card-title">5 animes menos populares</h4>
        <?php foreach($resultado2 as $res2): ?>
        <div class="card-body">
            <p class="card-text"><?php echo $res2['nombre']." con una puntuacion media de: ".$res2['rating']  ?></p>
        </div>
        <?php endforeach ?>
    </div>

    
    <br>
    <br>
    <br>

    <div class="card" >
    <h4 class="card-title">5 animes con mas comentarios</h4>
        <?php foreach($resultado3 as $res3): ?>
        <div class="card-body">
            <p class="card-text"><?php echo $res3['nombre']." con: ".$res3['num_comentarios']." comentarios"  ?></p>
        </div>
        <?php endforeach ?>
    </div>



  

    </body>
</html>