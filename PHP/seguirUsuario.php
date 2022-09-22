<?php 

session_start(); 
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

include_once 'conexion.php';
if(isset($_POST['usuario'])) {
  $name = $_POST['usuario'];
}


$sql_insertar = "SELECT * FROM usuario WHERE nombre = ?";


$sentencia_agregar=$mbd->prepare($sql_insertar);
$sentencia_agregar->execute(array($name));
$resultado = $sentencia_agregar ->fetchAll();

foreach ($resultado as $res) {
    $_SESSION['user2'] = $res['nombre'];
    $_SESSION['user2id'] = $res['userid'];
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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio  <span class="sr-only"></span></a>
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
  
      

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <h2> Buscar usuario</A> </h2>
                <form action="seguirUsuario.php" method="POST">
                    <label class="mt-3">Nombre usuario</label>
                    <input type="text" class="form-control mb-3" name="usuario">
    
                    <button class="btn btn-primary mt-3">Buscar</button>
                </form>


            </div>
            </div>

            
              <?php foreach($resultado as $res): ?>
                    <div class="card">
                        
                        <div class="card-body">
                        <h4 class="card-title"> Nombre: <?php echo $res['nombre'];  ?> </h4>
                        <p class="card-text">ID: <?php echo $res['userid'] ?></p>
                        <p class="card-text">Numero de seguidores: <?php echo $res['num_seguidores'] ?></p>
                        <a name="test2" id="test_view" class="btn btn-primary" href="seguirUsuario2.php" role="button" >Seguir</a>

                          

                 
                        </div>
                    </div>
                    <?php endforeach ?>

                    
            </div>
    </body>
</html>