<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_POST['id'])){
    include "DbConfig.php";
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    $id = $_POST['id'];
    if (!$mysqli){
      exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
    }

    $query = "UPDATE Preguntas SET Likes=Likes+1 WHERE id=$id";

    $res = mysqli_query($mysqli, $query);


    if(!$res){
      exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
    }

    echo "<h3>Gracias por valorar la pregunta</h3>";

}



?>