<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="../js/LoginSocial.js"></script>
  <meta name="google-signin-client_id" content="55641537043-e4d94u7k7n208s0gj8l21g2esm1our41.apps.googleusercontent.com">
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div style="border-style: solid; border-color: #5d6d7e; ">
        <form method="post">
            <h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;">Identificación de usuario </h2><br>
            <input type="email" placeholder="Escribe tu email" name="email" size="21" value="" /><br><br>
            <input type="password"   placeholder="Escribe tu contraseña" name="pass" size="21" value="" /><br><br>
            <input style="font-size:14px; width: 100px; height : 35px; background-color:  #0ec481; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;"  id="input_2" type="submit" name="submit" value="Login" /><br>

        </form><br>

        <p> Accede utilizando una cuenta de google </p><br>
        <div class="g-signin2" align="center" data-onsuccess="onSignIn"></div><br>


        <?php
                include "DbConfig.php";
                include "IncreaseGlobalCounter.php";
                include "ComprobarUsuario.php";


                if(isset($_POST['submit'])){

                    if(esUsuarioLogeado($_POST['email'])){
                        exit ('<p style="color:red;"> El usuario ya esta logeado</p> <br>');
                    }

                    $mysqli = new mysqli($server, $user, $pass, $basededatos);

                    if(!$mysqli) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $pass = $_POST['pass'];
                    $email = $mysqli->real_escape_string($_POST['email']);

                    $stmt = $mysqli->prepare("SELECT * FROM Usuarios WHERE Email = ?");

                    $stmt->bind_param('s', $email);

                    $stmt->execute();

                    $res = $stmt->get_result();
                    if(!$res) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $row =  $res->fetch_assoc();

                    if(!password_verify($pass, $row['Pass'])){
                        exit ('<p style="color:red;"> Usuario o contraseña incorrecto </p> <br>');
                    }

                    if(!$row){
                        echo('<p style="color:red;"> Los datos son incorrectos </p> <br>');
                    }else{
                        if($row['Estado'] != 'activo'){
                            exit ('<p style="color:red;"> El usuario esta bloqueado </p> <br>');
                        }
                        increaseGlobalCounter();
                        $_SESSION["email"] = $row['Email'];
                        $_SESSION["imagen"] = $row['Imagen'];
                        $_SESSION["nombre"] = $row['NombreApellidos'];
                        if($row['Email'] == 'admin@ehu.es' ){
                            $_SESSION["tipo"] = 'administrador';
                        }else{
                            $_SESSION["tipo"] = $row['TipoUser'];
                        }

                        echo "<script>window.location='Layout.php'</script>";
                    }

                    $mysqli->close();






            }

        ?>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>