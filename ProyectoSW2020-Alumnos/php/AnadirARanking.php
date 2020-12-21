<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST['nick']) && !isset($_POST['email'])){

        include "DbConfig.php";

        if($_POST['nick']==""){
            include "Resultados.php";
            echo '<p style="color:red;"> El campo esta vacio</p> <br>' ;
            exit();
        }

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
        exit('<p style="color:red;"> Ha ocurrido un error inesperado 1 </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $nombre = mysqli_real_escape_string($mysqli, $_POST['nick']);
        $aciertos = $_SESSION['aciertos'];
        $fallos = $_SESSION['fallos'];

        $query = mysqli_prepare($mysqli, "INSERT INTO Ranking(Nombre, Aciertos, Fallos) VALUES (?, ?, ?)");

        mysqli_stmt_bind_param($query, "sii", $nombre, $aciertos, $fallos);

        $res = mysqli_stmt_execute($query);

        if(!$res){
            include "Resultados.php";
            echo '<p style="color:red;"> EL usuario esta registrado en el ranking, introduce otro</p> <br>' ;
            exit();
        }

        include "ShowRanking.php";

    }else{
        echo "<script>
        window.location.href='Layout.php';
      </script>";
    }



?>