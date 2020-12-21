<?php
    error_reporting(0);
     include "DbConfig.php";

     $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
     if (!$mysqli){
       exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
     }

     $query = mysqli_prepare($mysqli, "SELECT Email FROM Usuarios WHERE LastCon<=?");

     $time = time()-5*60;

     mysqli_stmt_bind_param($query, 'i', $time);

     mysqli_stmt_execute($query);

     $res = mysqli_stmt_get_result($query);


     if(!file_exists("../xml/UserCounter.xml")){
       return "<p style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

     }

     $xml =  simplexml_load_file("../xml/UserCounter.xml");


     while ($fila = mysqli_fetch_array($res, MYSQLI_NUM))
     {
         foreach ($fila as $f)
         {
            //Comporbar que no esta en xml

            foreach ($xml->children() as $usuario) {
              if ($usuario == $f){
                unset($usuario[0]);
              }

            }

            //$usuario = $xml->addChild('usuario', $f);
            //echo $usuario;
         }

     }


     $xml->asXML('../xml/UserCounter.xml');


?>