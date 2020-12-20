<?php

   if(isset($_POST['email'])){

        include "DbConfig.php";


        $code = time() + rand(1, 100);

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        $email = mysqli_real_escape_string($mysqli, $_POST['email']);


        if (!$mysqli){
        exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = mysqli_prepare($mysqli, "UPDATE Usuarios SET Code=? WHERE Email=?");

        mysqli_stmt_bind_param($query, 'is', $code, $email);

        if (mysqli_stmt_execute($query)){
            enviarEmail($email, $code);
        }


        mysqli_close($mysqli);
        echo "<img src='../images/tickverde.png' style='height: 70px; width: 70px;'>";
        echo '<h1 style="color:green;"> Correo de restablecimiento de contraseña enviado </h1>';
        echo '<p style="font-size: 12px"> Se ha envado un correo electronico a '.$email.' , sigue las instrucciones para restablecer la contraseña';


    }

    function enviarEmail($destinatario, $code){

        $asunto = "Codigo para restablecer contraseña";
        $cuerpo = '
        <html>
        <head>
           <title>Cambiar contraseña</title>
        </head>
        <body>
        <h2>
        <b> Codigo: '.$code.'</b> </h2>
        <a href="https://sw758b.000webhostapp.com/ProyectoSW2020-Alumnos/php/CambiarContrasenaConfirmationForm.php?email='.$destinatario.'&code='.$code.'" style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" >Click To Reset password</a>
        </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        mail($destinatario,$asunto,$cuerpo,$headers);

    }
?>;