<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_POST['emailSocial'])){
        include "IncreaseGlobalCounter.php";
        include "UpdateLastConection.php";
        $_SESSION["email"] = $_POST['emailSocial'];
        $_SESSION["imagen"] =$_POST['imagenSocial'];
        $_SESSION["nombre"] = $_POST['nombreSocial'];
        $_SESSION["tipo"] = 'alumno';
        $_SESSION["social"] = "si";
        $email = $_POST['emailSocial'];
        echo "<p> h </p>";
        //Incrementar counter
        if (!estaRegistrado($email)){
            registrar($email, $_SESSION["nombre"],$_SESSION["nombre"]);
        }else{
            updateLastConection($email);
        }
       increaseGlobalCounterByEmail($_POST['emailSocial']);


    }

    function registrar($email, $path, $nombre){

        include "DbConfig.php";
        $mysqli = new mysqli($server, $user, $pass, $basededatos);

        if (!$mysqli){
            return '<p style="color:red;"> Ha ocurrido un error inesperado </p>';
        }

        $query = "INSERT INTO Usuarios(Email, TipoUser, NombreApellidos, Pass, Imagen, Estado, LastCon, Code)
        VALUES (?,'social',?,'najkdfabksdbvlweva',?,'activo', ?,?)";

        $stmt = $mysqli->prepare($query);

        $time = time();

        $stmt->bind_param('sssss', $email, $nombre, $path, $time, $time);

        if(!$stmt->execute()){
            return '<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>';
        }

        $mysqli->close();
    }


    function estaRegistrado($email){

        include "DbConfig.php";

        $mysqli = new mysqli($server, $user, $pass, $basededatos);

        if (!$mysqli){
            return '<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>';
        }

        $email = $mysqli->real_escape_string($email);

        $stmt = $mysqli->prepare("SELECT Email FROM Usuarios WHERE Email = ?");

        $stmt->bind_param('s', $email);

        $stmt->execute();

        $checkEmail = $stmt->get_result();

        if ($checkEmail->num_rows > 0) {
            return true;
        }else{
            return false;
        }

        $mysqli->close();
    }

?>