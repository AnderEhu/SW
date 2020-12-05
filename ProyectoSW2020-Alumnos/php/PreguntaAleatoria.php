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

        echo '<form id="fJugar" method="get" action="">';

        echo "<h2>".$row['enunciado']."</h2><br>";

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
            echo '<input id="opTema" name="tema" type="radio" value="'.$a[$i].'" />'. $a[$i].'<br>';
        }
        echo '<br><img width="160px" height="160px" src="'.$row['imagen'].'"><br><br>';
        echo '<input type="button" value="Calificar" onclick="calificar()"> ';
        echo '<input type="button" value="Abandonar" onclick="resultados()"> ';
        echo '<input type="button" value="Otra Pregunta" onclick="otraPregunta()"> </br>';
        echo "</form>";






    }

?>