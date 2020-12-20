<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_POST['opcionTema'] && !isset($_SESSION['email'])){
        $_SESSION['tema'] = $_POST['opcionTema'];
        $_SESSION['aciertos'] = 0;
        $_SESSION['fallos'] = 0;
        $_SESSION['contestadas'] = "";

        include "PreguntaAleatoria.php";



    }else{
        echo "<script>
        window.location.href='Layout.php';
      </script>";
    }

?>