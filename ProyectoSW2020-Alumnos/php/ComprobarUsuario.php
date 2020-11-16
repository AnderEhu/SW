<?php
function esUsuarioLogeado($email){

    $questions_path = "../xml/UserCounter.xml";

    if(!file_exists($questions_path)){
    return "<p style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

    }
    $xml = simplexml_load_file($questions_path);

    foreach($xml->children() as $usuario){
        if($usuario == $email){
            return true;
        }
    }

    return false;


}



?>