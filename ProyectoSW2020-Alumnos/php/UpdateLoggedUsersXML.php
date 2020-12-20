<?php
     include "DbConfig.php";

     $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
     if (!$mysqli){
       exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
     }

     $query = mysqli_prepare($mysqli, "SELECT Email FROM Usuarios WHERE LastCon>=?");

     $time = time()-60*5;

     mysqli_stmt_bind_param($query, 'i', $time);

     mysqli_stmt_execute($query);

     $res = mysqli_stmt_get_result($query);

     $questions_path = "../xml/UserCounter.xml";

     if(!file_exists($questions_path)){
       return "<p style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

     }

     $xml = new SimpleXMLElement("<?xml version='1.0'?><usuarios></usuarios>");


     while ($fila = mysqli_fetch_array($res, MYSQLI_NUM))
     {
         foreach ($fila as $f)
         {

            $usuario = $xml->addChild('usuario', $f);
            echo $usuario;
         }

     }


     $xml->asXML($questions_path);


?>