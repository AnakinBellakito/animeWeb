<?php


$link = 'mysql:host=localhost;dbname=tarea4';
$usuario = 'ramon';
$pass = 'cajal';


try {
    $mbd = new PDO($link, $usuario, $pass);

    echo " \n";

} 
catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>