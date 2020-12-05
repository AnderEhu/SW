<?php
    session_start();
    if (isset($_POST['res']) && !isset($_SESSION['email']) && isset($_SESSION['id'])){
        include "DbConfig.php";
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $idInt = $_SESSION['id'];
        $id = "'".$_SESSION['id']."'";
        $res = "'".$_POST['res']."'";
        $query = "SELECT * FROM Preguntas WHERE resOK=$res AND id=$id";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
            exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        if(mysqli_num_rows($res) > 0){
            $_SESSION['aciertos'] =  $_SESSION['aciertos'] +1;
            echo '<p style="color:green;"> LA RESPUESTA ES CORRECTA </p>';
        }else{
            $_SESSION['fallos'] =  $_SESSION['fallos'] +1;
            echo '<p style="color:red;"> LA RESPUESTA ES INCORRECTA </p>';

        }
        echo "</br>";
        echo '<input type="button" value="Abandonar" onclick="resultados()"> ';
        echo '<input type="button" value="Otra Pregunta" onclick="otraPregunta()"> </br>';
        echo '<input type="button" id ="likePreg" value="Like" onclick="meGusta('.$id.')"> ';
        echo '<input type="button" id="dislikePreg" value="Dislike" onclick="noMeGusta('.$id.')"> ';
        echo "</form>";

    }

?>