<?php
    function actualizarLast($email){
        include "DbConfig.php";


        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }
        $date = time();

        $query = "UPDATE Usuarios SET LastCon='$date' WHERE Email='$email'";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        mysqli_close($mysqli);
    }

?>