<?php session_start(); 
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";


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
                <h2>Login CrunchyUSM </h2>
                <form action=sesion2.php method="POST">
                    <label class="mt-3">Nombre de usuario</label>
                    <input type="text" class="form-control mb-3" name="nombre">
                    <label>Contraseña</label>
                    <input type="password" class="form-control mb-3" name="pass">
                    <button class="btn btn-primary mt-3">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>