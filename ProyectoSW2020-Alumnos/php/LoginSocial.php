<?php
    session_start();
    if($_POST['emailSocial']){
        $_SESSION["email"] = $_POST['emailSocial'];
        $_SESSION["imagen"] =$_POST['imagenSocial'];
        $_SESSION["nombre"] = $_POST['nombreSocial'];
        $_SESSION["tipo"] = 'alumno';
    }

?>