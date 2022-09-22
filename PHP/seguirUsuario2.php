<?php 

session_start(); 
$userNow  = $_SESSION['admin'];
$userNowId =  $_SESSION['userid'];
echo "Usuario activo: ".$userNow."            ";

include_once 'conexion.php';
$id = $_SESSION['user2id'];
$name2 = $_SESSION['user2'];

$sql = "INSERT INTO usuario_usuario (user_idone,user_idtwo,name1,name2) VALUES (?,?,?,?)";
$sentencia_agregar = $mbd->prepare($sql);
$sentencia_agregar->execute(array($userNowId,$id,$userNow,$name2));
$resultado = $sentencia_agregar ->fetchAll();


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
                <a class="nav-link" href="index.php">Inicio  <span class="sr-only"></span></a>
            </li>
         
            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href ="protegido.php"> Contenido Protegido</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>


    <div class="alert alert-success" role="alert">
                <p>  Seguido con exito <?php echo $_SESSION['user2']; ?> </p>
                    </div>


    </body>
</html>