<?php
    if(isset($_POST['emailR'])){
        $email  = "'".$_POST['emailR']."'";
        $codigo  = $_POST['codigoR'];
        $passR  = "'".$_POST['passR']."'";
        $repPass  = "'".$_POST['repPassR']."'";

        include "DbConfig.php";
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado0 </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = "SELECT * FROM Usuarios WHERE Email=$email AND Code=$codigo";


        $res = mysqli_query($mysqli, $query);


        if(!$res){
          exit('<p style="color:red;"> No se ha podido restablecer la contraseña1 </p>');
        }


        if($passR != $repPass || $passR == ""){
            exit('<p style="color:red;"> No se ha podido restablecer la contraseña2 </p>');
        }


        $newCode = time();

        $hashPass = "'".password_hash($_POST['passR'], PASSWORD_DEFAULT)."'";


        $query = "UPDATE Usuarios SET Code=$newCode, Pass=$hashPass WHERE Email=$email";


        $res = mysqli_query($mysqli, $query);

        if(!$res){
            exit('<p style="color:red;"> No se ha podido restablecer la contraseña3 </p>');
          }


        echo "Todo bien";



    }

?>
