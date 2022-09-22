<?php  
session_start(); 
include_once 'conexion.php';
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

$uid = $_SESSION['userid'];
$animeid =  $_SESSION["resultID"];

if(isset($_POST['rate'])) {
    $rate = $_POST['rate'];
    $sql = "INSERT INTO rate_anime (userid,rate,animeid) VALUES (?,?,?)";
    $sentencia_agregar=$mbd->prepare($sql);
    $sentencia_agregar->execute(array($uid,$rate,$animeid));
    $resultado = $sentencia_agregar ->fetchAll();

   $sql2 =  "select AVG(rate) as `rating` from rate_anime WHERE animeid = ?";
   $sentencia_agregar2=$mbd->prepare($sql2);
   $sentencia_agregar2->execute(array($animeid));
   $resultado2 = $sentencia_agregar2 ->fetch();

   $avg =  $resultado2['rating'];

   $sql3 =  "UPDATE anime SET rating = ?  WHERE animeid = ?  ";
   $sentencia_agregar3=$mbd->prepare($sql3);
   $sentencia_agregar3->execute(array($avg,$animeid));
   



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


  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h2> Ingresa una calificacion</h2>
                <form action="calificar.php" method="POST">
                    <label class="mt-3">Deja tu rating del 1-5 para <?php echo $_SESSION["result"] ?></label>
                    <input type="text" class="form-control mb-3" name="rate">
    
                    <button class="btn btn-primary mt-3"> Enviar</button>
                </form>
            </div>
  
    </body>
</html>