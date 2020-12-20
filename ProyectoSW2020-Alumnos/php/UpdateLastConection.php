<?php

function updateLastConection(){

  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    if(!isset($_SESSION['ultimoAcceso'])){
      $_SESSION['ultimoAcceso'] = time();
      updateLastConectionDB($email);

    }else{
      if  ($_SESSION['ultimoAcceso'] < time() - 10){
        include "DeleteEmailFromXml.php";
        session_unset();
        session_destroy();
        deleteEmailFromXml($email);
        echo "<script>
            alert('Hasta Pronto la session ha expirado ');
            window.location.href='Layout.php';
        </script>";
      }else{
        $_SESSION['ultimoAcceso'] = time();
        updateLastConectionDB($email);

      }
    }
}


function updateLastConectionDB($email){

        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = mysqli_prepare($mysqli, "UPDATE Usuarios SET LastCon=? WHERE email=?");

        $time = time();

        mysqli_stmt_bind_param($query, 'is', $time, $email);

        $res =  mysqli_stmt_execute($query);



}

?>