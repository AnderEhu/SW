<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
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

        echo '<form style="border-style: solid; border-color: #5d6d7e; "  id="fJugar" method="get" action="">';
        echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;"> Elige un tema para jugar </h2><br> ';
        echo '<div style="font-size:20px; padding: 10px;">';
        $checked = false;
        while ($row = mysqli_fetch_array($res)){
          if ($checked){
            echo '<div style="padding: 5px; "> <input id="opTema" name="tema" type="radio" value="'.$row['tema'].'" />'. $row['tema'].'<br></div>';
          }else{
            echo '<div style="padding: 5px; "> <input id="opTema" name="tema" type="radio" value="'.$row['tema'].'" checked="checked" />'. $row['tema'].'<br></div>';
            $checked = true;
          }

        }
        echo '</div>';
        echo '<br><input type="button" style="font-size:30px; width: 150px; height : 60px; background-color:   #0ec481; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" value="Jugar" onclick="aJugar()"> ';
        echo '<br><br></form>';

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
