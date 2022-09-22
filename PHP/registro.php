<?php
session_start();
include_once 'conexion.php';
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

if($_POST){
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];



    $sql_insertar='INSERT INTO usuario(nombre,pass) VALUES (?,?)';
    $sentencia_agregar=$mbd->prepare($sql_insertar);
    $sentencia_agregar->execute(array($nombre,$pass));
    
    header('location:index.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Registro</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2> Formulario de registro </h2>
                <form method="POST">
                    <label class="mt-3">Nombre de usuario</label>
                    <input type="text" class="form-control mb-3" name="nombre">
                    <label>Contraseña</label>
                    <input type="password" class="form-control mb-3" name="pass">
                    <label>Confirmar contraseña</label>
                    <input type="password" class="form-control mb-3" name="pass">
                    <button class="btn btn-primary mt-3">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>