<?php
    session_start();
if (isset($_SESSION['admin'])) {
    echo 'Bienvenido '.$_SESSION['admin'];
    echo "\r\n";
    echo "\r\n";

}
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
        <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item active">

                <a class="nav-link" href="buscarAnime.php">Buscar Anime  <span class="sr-only"></span></a>
            </li>
            <?php endif; ?>
            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class="nav-link" href="historial.php">Historial </a>
            </li>
            <?php endif; ?>
            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href ="seguirUsuario.php"> Seguir amigos</a>
            </li>
            <?php endif; ?>

            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href ="perfil.php"> Perfil</a>
            </li>
            <?php endif; ?>

            <?php if($_SESSION['admin']) : ?> 
            <li class="nav-item">
                <a class = "nav-link" href="cerrar.php"> Cerrar Sesion </a>
            </li>
            <?php endif; ?>


        </ul>
    </nav>


  

    </body>
</html>