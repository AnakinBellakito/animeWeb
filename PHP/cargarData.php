
<?php session_start(); 
include_once 'conexion.php';

$cadena = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Cowboy Bebop",26,"Action, Adventure, Comedy, Drama, Sci-Fi, Space", "1998-04-03","TV","Sunrise","24 min. per ep" )';

$cadena2 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Trigun",26,"Action, Sci-Fi, Adventure, Comedy, Drama, Shounen", "1998-04-01","TV","Madhouse","24 min. per ep" )';

$cadena3 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Monster",74,"Drama, Horror, Mystery, Police, Psychological, Seinen, Thriller", " 2004-04-07 ","TV","Madhouse","24 min. per ep" )';

$cadena4 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Naruto",220,"Action, Adventure, Comedy, Super Power, Martial Arts, Shounen", "2002-09-03","TV","Studio Pierrot","24 min. per ep" )';

$cadena5 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Akira",1,"Action, Military, Sci-Fi, Adventure, Horror, Supernatural, Seinen", "1988-07-16","Movie","Tokyo Movie Shinsha","2 hr. 4 min." )';

$cadena6 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("One Piece",1024,"Action, Adventure, Comedy, Super Power, Drama, Fantasy, Shounen", "1999-10-20","TV","Toei Animation","24 min. per ep" )';

$cadena7 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Rurouni Kenshin: Meiji Kenkaku Romantan",26,"Action, Adventure, Comedy, Historical, Romance, Samurai, Shounen", "1996-01-10","TV","Gallop, Studio Deen","24 min. per ep" )';

$cadena8 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Hunter x Hunter",62,"Action, Adventure, Super Power, Fantasy, Shounen", "1999-10-19","TV","Nippon Animation","2 hr. 4 min." )';

$cadena9 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Mobile Suit Gundam: Chars Counterattack",1,"Military, Sci-Fi, Space, Drama, Mecha", "1998-04-03","Movie","Bandai Entertainment","1 hr. 59 min." )';

$cadena10 = 'REPLACE INTO anime(nombre,capitulos,genero,aired,tipo,studio,duration)
VALUES("Fullmetal Alchemist",51,"Action, Adventure, Comedy, Drama, Fantasy, Magic, Military, Shounen", "2003-10-04","TV","Funimation","24 min. per ep" )';

try {
    $sentencia=$mbd->prepare($cadena);
    $sentencia->execute();

    $sentencia2=$mbd->prepare($cadena2);
    $sentencia2->execute();

    $sentencia3=$mbd->prepare($cadena3);
    $sentencia3->execute();

    $sentencia4=$mbd->prepare($cadena4);
    $sentencia4->execute();

    $sentencia5=$mbd->prepare($cadena5);
    $sentencia5->execute();

    $sentencia6=$mbd->prepare($cadena6);
    $sentencia6->execute();

    $sentencia7=$mbd->prepare($cadena7);
    $sentencia7->execute();

    $sentencia8=$mbd->prepare($cadena8);
    $sentencia8->execute();

    $sentencia9=$mbd->prepare($cadena9);
    $sentencia9->execute();

    $sentencia10=$mbd->prepare($cadena10);
    $sentencia10->execute();

    echo  'Success!';

} 
catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>