<?php 

session_start(); 
include_once 'return_index2.php';

$nombre = $_POST['nombre'];

$sql_insertar = "SELECT * FROM anime WHERE nombre = ?";

$sentencia_agregar=$mbd->prepare($sql_insertar);
$sentencia_agregar->execute(array($nombre));
$resultado = $sentencia_agregar ->fetchAll();


var_dump($resultado);




?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login ! Animelandia</title>
  </head>        
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2> Buscar Animes</A> </h2>
                <form action=return_index2.php method="POST">
                    <label class="mt-3">Nombre anime</label>
                    <input type="text" class="form-control mb-3" name="nombre">
                    <button class="btn btn-primary mt-3">Buscar</button>
                </form>
            </div>

      
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
