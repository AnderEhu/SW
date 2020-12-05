<?php
    session_start();
    if ($_POST['opcionTema'] && !isset($_SESSION['email'])){

        $_SESSION['tema'] = $_POST['opcionTema'];
        $_SESSION['aciertos'] = 0;
        $_SESSION['fallos'] = 0;
        $_SESSION['contestadas'] = "";

        include "PreguntaAleatoria.php";



    }

?>