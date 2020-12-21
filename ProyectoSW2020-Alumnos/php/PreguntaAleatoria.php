<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION['tema'] && !isset($_SESSION['email'])){

        include "DbConfig.php";
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        $contestadas = $_SESSION['contestadas'];
        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $tema = "'".$_SESSION['tema']."'";
        $query = "SELECT * FROM Preguntas WHERE tema=$tema $contestadas";

        $res = mysqli_query($mysqli, $query);


        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $numRows = mysqli_num_rows($res);
        if($numRows <= 0){
            include "Resultados.php";
            exit();

        }

        $preguntaAleatoria = rand(0, $numRows);

        mysqli_data_seek($res, $preguntaAleatoria);

        $row = mysqli_fetch_array($res);


        $_SESSION['id'] = $row['id'];

        echo '<form id="fJugar" style="border-style: solid; border-color: #5d6d7e; " method="get" action="">';

        echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;" >'.$row["enunciado"].'</h2><br>';
        echo '<div style="font-size:20px;">';

        $a = array(
            $row['resOK'],
            $row['resF1'],
            $row['resF2'],
            $row['resF3'],
        );

        shuffle($a);
        $longitud = count($a);

        $idInt = $row['id'];




        $_SESSION['contestadas'] = $_SESSION['contestadas'] . " AND id!=$idInt ";

        //echo '<p> Opciones: </p> ';

        for($i=0; $i<$longitud; $i++){
            echo '<div style="padding: 3px;"> <input id="opTema" name="tema" type="radio" value="'.$a[$i].'" />'. $a[$i].'</div>';
        }
        echo '<br><img width="160px" height="160px" id="imgQuiz" src="'.$row['imagen'].'"><br><br>';
        echo '<input id="abandonar" style="font-size:14px; width: 120px; height : 60px; background-color:  #e74c3c; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" type="button" value="Abandonar" onclick="resultados()"> ';
        echo '<input id="calificarPreg" style="font-size:14px; width: 120px; height : 60px; background-color: #d68910 ; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" type="button" value="Calificar" onclick="calificar()"> ';
        echo '<input id="otraPreg"  style="font-size:14px; width: 120px; height : 60px; background-color: #5d6d7e; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;"type="button" value="Otra Pregunta" onclick="otraPregunta()"> </br>';
        echo "</div><br></form>";






    }else{
        echo "<script>
        window.location.href='Layout.php';
      </script>";
    }

?>