<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_POST['res']) && !isset($_SESSION['email']) && isset($_SESSION['id'])){
        include "DbConfig.php";
        $mysqli = new mysqli($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $id = $mysqli->real_escape_string($_SESSION['id']);
        $res = $mysqli->real_escape_string($_POST['res']);

        $stmt = $mysqli->prepare("SELECT * FROM Preguntas WHERE resOK=? AND id=?");

        $stmt->bind_param('ss', $res, $id);

        $stmt->execute();

        $res = $stmt->get_result();

        if(!$res){
            exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        if(mysqli_num_rows($res) > 0){
            $_SESSION['aciertos'] =  $_SESSION['aciertos'] +1;
            echo '<p  style="color: white; padding: 5px; background-color: #91cf99; "> LA RESPUESTA '.$_POST['res'].' ES CORRECTA </p>';
        }else{
            $_SESSION['fallos'] =  $_SESSION['fallos'] +1;

            if($_POST['res'] == "undefined"){
                echo '<p style="color: white; padding: 5px; background-color: #e74c3c; "> LA RESPUESTA ES INCORRECTA NO HAS SELECCIONADO NINGUNA OPCION</p>';
            }else{
                echo '<p style="color: white; padding: 5px; background-color: #e74c3c; "> LA RESPUESTA  '.$_POST['res'].' INCORRECTA </p>';
            }


        }
        echo "</br>";
        echo '<input type="button" value="Abandonar" style="width: 150px; height : 60px; background-color: #e74c3c; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" onclick="resultados()"> ';
        echo '<input type="button" value="Otra Pregunta" id="otraPreg" style="width: 150px; height : 60px; background-color: #5d6d7e; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" onclick="otraPregunta()"> </br>';
        echo '<br><img type="image" style="padding: 5px; " src="../images/like.png" width="25px" height ="25px" id ="likePreg" value="Like" onclick="meGusta('.$id.')">  ';
        echo '<img type="image" style="padding: 5px;" src="../images/dislike.png" width="25px" height ="25px" id="dislikePreg" value="Dislike" onclick="noMeGusta('.$id.')"> ';
        echo "</form>";

    }else{
        echo "<script>
        window.location.href='Layout.php';
      </script>";
    }

?>