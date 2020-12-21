<?php
    session_start();
    if(!isset($_SESSION['tipo']) || $_SESSION['tipo']!='administrador'){
      echo "<script>
              window.location.href='Layout.php';
            </script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <script src="../js/RemoveUserAjax.js"></script>
  <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <section class="main" id="s1">
  <?php
        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = "SELECT Email, Pass, Imagen, Estado  FROM Usuarios WHERE TipoUser!= 'social' AND Email != 'admin@ehu.es' ";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }
        echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;"> Usuarios </h2> ';
        echo '<table style="border: 0;
        background-color: white;
        width: 100%;
        text-align: center;
        border-collapse: collapse;"><tr style="border: 0; color: white; background-color: #4b4b4b;"> <th style="padding: 10px;"> Email </th> <th style="padding: 10px;"> Pass </th> <th style="padding: 10px;"> Imagen </th> <th style="padding: 10px;"> Cambiar Estado </th> <th style="padding: 10px;"> Borrar </th><th style="padding: 10px;"> Estado </th></tr>';

        while ($row = mysqli_fetch_array($res)){
            $confirmBorrar = "'Estas seguro que quieres borrar a:".$row['Email']."'";
            $confirmEstado = "'Estas seguro que cambiar el estado de ".$row['Email']."'";

             echo '<tr style="background-color: #dadbdb; padding: 5px; ">
                    <td>' .$row['Email'].'</td>
                    <td>' .$row['Pass'].'</td>
                    <td> <img width="80px" height="80px" src="'.$row['Imagen'].'" ></td>
                    <td><form method="POST" action="ChangeUserState.php">
                        <input type="hidden" name="email" value="'.$row['Email'].'">
                        <input type="hidden" name="estado" value="'.$row['Estado'].'">
                        <input type="submit" value ="Cambiar Estado" onClick="return confirm('.$confirmEstado.')">
                    </form></td>
                    <td><form method="POST" action="RemoveUser.php">
                        <input type="hidden" name="email" value="'.$row['Email'].'">
                        <input type="submit" value ="Borrar" onClick="return confirm('.$confirmBorrar.')">
                    </form></td>
                    <td>' .$row['Estado'].'</td>
                </tr>';
        }

        echo '</table>';

        $query = "SELECT Email, LastCon  FROM Usuarios WHERE TipoUSer= 'social'";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }
        echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;"> Usuarios Sociales</h2> ';
        echo '<table style="border: 0;
        background-color: white;
        width: 100%;
        text-align: center;
        border-collapse: collapse;"><tr style="border: 0; color: white;  background-color: #4b4b4b;" > <th style="padding: 10px;" > Email </th> <th style="padding: 10px;" > Última conexión </th> <th style="padding: 10px;"> Borrar </th></tr>';

        while ($row = mysqli_fetch_array($res)){
            $confirmBorrar = "'Estas seguro que quieres borrar a:".$row['Email']."'";
            $confirmEstado = "'Estas seguro que cambiar el estado de ".$row['Email']."'";

             echo '<tr style="background-color: #dadbdb; padding: 5px;">
                    <td style="padding: 10px;">' .$row['Email'].'</td>
                    <td style="padding: 10px;">' .date('d-m-Y  h:i:s', $row['LastCon']) .'</td>
                    <td style="padding: 10px;" ><form method="POST" action="RemoveUser.php">
                        <input type="hidden" name="email" value="'.$row['Email'].'">
                        <input type="submit" value ="Borrar" onClick="return confirm('.$confirmBorrar.')">
                    </form></td>

                </tr>';
        }

        echo '</table>';




        mysqli_close($mysqli);


?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
