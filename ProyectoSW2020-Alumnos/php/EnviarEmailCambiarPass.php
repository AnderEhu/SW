<?php
    $email = "'".$_POST['email']."'";
    /*include "DbConfig.php";
    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

    if (!$mysqli){
        exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
    }

    $code = time();
    $query = "UPDATE Usuarios SET Code=$code WHERE Email=$email";
    $res = mysqli_query($mysqli, $query);


    echo $query;*/

    echo mail($email,"asuntillo","Este es el cuerpo del mensaje");
?>