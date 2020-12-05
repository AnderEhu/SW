<?php
    session_start();

    if(isset($_POST['nick'])){

        include "DbConfig.php";

        if($_POST['nick']==""){
            echo '<p style="color:red;"> El campo esta vacio</p> <br>' ;
            include "Resultados.php";
            exit();
        }

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
        exit('<p style="color:red;"> Ha ocurrido un error inesperado 1 </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $nombre = "'".$_POST['nick']."'";
        $aciertos = $_SESSION['aciertos'];
        $fallos = $_SESSION['fallos'];

        $query = "INSERT INTO Ranking(Nombre, Aciertos, Fallos) VALUES ($nombre, $aciertos, $fallos)";

        $res = mysqli_query($mysqli, $query);

        if(!$res){

            echo '<p style="color:red;"> EL usuario esta registrado en el ranking, introduce otro</p> <br>' ;
            include "Resultados.php";
            exit();
        }

    }


    include "ShowRanking.php";
?>