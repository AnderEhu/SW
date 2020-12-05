<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/AJugarAjax.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="ajugar">
    <?php

      if(!isset($_SESSION['email'])){

        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }


        $query = "SELECT DISTINCT tema FROM Preguntas";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        echo '<form id="fJugar" method="get" action="">';
        echo '<h2> Elige un tema para jugar </h2><br> ';
        $checked = false;
        while ($row = mysqli_fetch_array($res)){
          if ($checked){
            echo '<input id="opTema" name="tema" type="radio" value="'.$row['tema'].'" />'. $row['tema'].'<br>';
          }else{
            echo '<input id="opTema" name="tema" type="radio" value="'.$row['tema'].'" checked="checked" />'. $row['tema'].'<br>';
            $checked = true;
          }

        }
        echo '<br><input type="button" value="Jugar" onclick="aJugar()"> ';
        echo '</form>';

        mysqli_close($mysqli);



      }else{

        echo "<script>
              window.location.href='Layout.php';
            </script>";
      }
      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
