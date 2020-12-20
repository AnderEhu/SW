<?php
    if(isset($_POST['emailR'])){

        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<img src="../images/tickrojo.png" style="height: 70px; width: 70px;">
          <h1 style="color:red;"> No se ha podido restablecer la contraseña </h1>');
        }
        $email  =  mysqli_real_escape_string($mysqli, $_POST['emailR']);
        $codigo  = $_POST['codigoR'];
        $passR  = mysqli_real_escape_string($mysqli, $_POST['passR']);
        $repPass  = mysqli_real_escape_string($mysqli, $_POST['repPassR']);

        if($passR != $repPass || $passR == ""){
          exit('<img src="../images/tickrojo.png" style="height: 70px; width: 70px;">
          <h1 style="color:red;"> No se ha podido restablecer la contraseña </h1>');
        }


        $stmt = mysqli_prepare($mysqli, "SELECT Email FROM Usuarios WHERE Email=? AND Code=?");
        mysqli_stmt_bind_param($stmt, "si", $email, $codigo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $res);
        mysqli_stmt_fetch($stmt);

        if ($res != $email){
          exit('<img src="../images/tickrojo.png" style="height: 70px; width: 70px;">
          <h1 style="color:red;"> No se ha podido restablecer la contraseña </h1>');
        }
        mysqli_stmt_close($stmt);

        $newCode = time();

        $hashPass = password_hash($_POST['passR'], PASSWORD_DEFAULT);

        $stmt2 = mysqli_prepare($mysqli, "UPDATE Usuarios SET Code=?, Pass=? WHERE Email=?");
        mysqli_stmt_bind_param($stmt2, 'iss', $newCode, $hashPass, $email);
        if(!mysqli_stmt_execute($stmt2)){
          exit('<img src="../images/tickrojo.png" style="height: 70px; width: 70px;">
          <h1 style="color:red;"> No se ha podido restablecer la contraseña </h1>');
        }


        echo "<img src='../images/tickverde.png' style='height: 70px; width: 70px;'>";
        echo '<h1 style="color:green;"> Contraseña restablecida </h1>';


    }

?>
