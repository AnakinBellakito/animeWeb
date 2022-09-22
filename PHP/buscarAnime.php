<?php 

session_start(); 
$userNow  = $_SESSION['admin'];
echo "Usuario activo: ".$userNow."            ";

include_once 'conexion.php';

if(isset($_POST['nombre'])) {
$nombre = $_POST['nombre'];
$result = " ";
}
$sql_insertar = "SELECT * FROM anime WHERE nombre = ?";

$sentencia_agregar=$mbd->prepare($sql_insertar);
$sentencia_agregar->execute(array($nombre));
$resultado = $sentencia_agregar ->fetchAll();




foreach ($resultado as $res) {
    
    $val =  $res['nombre'];
    $_SESSION["result"] = $res['nombre'];
    $_SESSION["resultID"] = $res['animeid'];
    



    if ($val === 'Trigun') {
        $src  = "../img/trigun.jpg";
    }

    if ($val === 'Cowboy Bebop') {
        $src  = "../img/cowboy.jpg";
    }
    if ($val === 'Monster') {
        $src  = "../img/monster.jpg";
    }
    if ($val === 'Naruto') {
        $src  = "../img/naruto.jpg";

    }
    if ($val === 'Akira') {
        $src  = "../img/akira.jpg";
    }
    if ($val === 'One Piece') {
        $src  = "../img/one_piece.jpeg";
    }
    if ($val === 'Rurouni Kenshin: Meiji Kenkaku Romantan') {
        $src  = "../img/Rurouni.jpg";
    }
    if ($val === 'Hunter x Hunter') {
        $src  = "../img/hxh.jpg";
    }
    if ($val === 'Mobile Suit Gundam: Chars Counterattack') {
        $src  = "../img/mobileSuit.jpg";
    }
    if ($val === 'Fullmetal Alchemist') {
        $src  = "../img/fullmetal.jpg";
    }
    


}

$sql_insertar2 = "SELECT * FROM comment_anime WHERE animeid = ?";

$sentencia_agregar2=$mbd->prepare($sql_insertar2);
$sentencia_agregar2->execute(array($_SESSION["resultID"]));
$resultado2 = $sentencia_agregar2 ->fetchAll();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Iniciar Sesion</title>
  </head>
<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <h2> Buscar Animes</A> </h2>
                <form action="buscarAnime.php" method="POST">
                    <label class="mt-3">Nombre anime</label>
                    <input type="text" class="form-control mb-3" name="nombre">
    
                    <button class="btn btn-primary mt-3">Buscar</button>
                </form>
            </div>
            
            <div class="col-md-7" >
                <h2> Resultados</h2>

                <?php foreach($resultado as $res):?>
                    <div class="card">
                        <img class="card-img-top" src=<?php echo $src ?> width="150" height="250" alt="./img/image.jpg">
                        <div class="card-body">
                            <h4 class="card-title"> <?php echo $res['nombre'];  ?> </h4>
                            <p class="card-text">Emitido: <?php echo $res['aired'] ?></p>
                            <p class="card-text">Tipo: <?php echo $res['tipo'] ?></p>
                            <p class="card-text">Generos: <?php echo $res['genero'] ?></p>
                            <p class="card-text">Calificacion: <?php echo $res['rating'] ?></p>
                            <p class="card-text">Studio: <?php echo $res['studio'] ?></p>
                            <p class="card-text">Duracion: <?php echo $res['duration'] ?></p>
                            <a name="test" id="test_view" class="btn btn-primary" href="verAnime.php" role="button" >Ver Anime</a>
                            <a name="rate" id="test_view2" class="btn btn-primary" href="calificar.php" role="button" >Dar rating</a>
                 
                        </div>
                    </div>
                    
                       
                
                <?php endforeach          ?>

            </div>
            <h4 class="card-title">Comentarios</h4>
            <?php foreach($resultado2 as $res2): ?>
            <div class="card">
            
                <div class="card-body">
                
                    <p class="card-text"><?php echo $res2['content'];  ?></p>
                    <p class="card-text"> <?php echo "Creado por userId: ".$res2['userid']; ?> </p>
                </div>

            </div>
            <?php endforeach ?>


                

      
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


  </body>

                </html>