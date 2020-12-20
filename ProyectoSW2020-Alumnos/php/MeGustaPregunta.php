<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['id']) && isset( $_SESSION['tema'])){
    include "DbConfig.php";
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    $id = $_POST['id'];
    if (!$mysqli){
      exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
    }

    $query = mysqli_prepare($mysqli, "UPDATE Preguntas SET Likes=Likes+1 WHERE id=?");

    mysqli_stmt_bind_param($query, 'i', $id);

    $res =  mysqli_stmt_execute($query);


    if(!$res){
      exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
    }

    echo "<p>Gracias por valorar la pregunta </p>";

}




?>