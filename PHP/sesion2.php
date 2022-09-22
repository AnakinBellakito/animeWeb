<?php
    
    include_once 'conexion.php';
    session_start();


    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];


    $sql_insertar = "SELECT * FROM usuario WHERE nombre = ?";

    $sentencia_agregar=$mbd->prepare($sql_insertar);
    $sentencia_agregar->execute(array($nombre));
    $resultado = $sentencia_agregar ->fetch();
    

    echo $resultado['nombre'];
    echo $resultado['pass'];

    if(!$resultado){
        echo "\r\n";
        echo 'No existe usuario, será redireccionado al inicio';
        header('Location:index.php');
        
        die();

    }

    if( $pass == $resultado['pass'] ){
        $_SESSION['admin']=$nombre;
        $_SESSION['userid'] = $resultado['userid'];
        echo "\r\n";
        echo 'Sesion iniciada';

        header('Location:index.php');
        
   
    }else{
        echo 'La contraseña no es correcta, será redireccionado a inicio de sesión';
        header('Location:sesion.php');
        die();
    }

?>