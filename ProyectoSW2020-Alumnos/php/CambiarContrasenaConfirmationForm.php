<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <script src="../js/GetQuestionAjax.js"></script>
  <section class="main" id="s1">
    <form id='fResPass' name='fquestion' style="border-style: solid; border-color: #5d6d7e; ">
    <h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;">Restablecer constraseña  </h2><br>
    <?php

      if(isset($_GET['email'])){
        echo " <label> Email </label>
        <input type='text' id='emailR' name='emailR' value='".$_GET['email']."'><br><br>";
      }else{
        echo " <label> Email </label>
        <input type='text' id='emailR' name='emailR'><br><br>";
      }

      if(isset($_GET['code'])){
        echo "<label> Codigo </label>
        <input type='text' id='codigoR' name='codigoR' value='".$_GET['code']."'><br><br>";
      }else{
          echo " <label> Codigo </label>
          <input type='text' id='codigoR' name='codigoR'><br><br>";
      }


    ?>

      <label> Nueva contrasena </label>
      <input type='password' id='passR' name='passR'/><br><br>
      <label> Repetir nueva contrasena </label>
      <input type='password' id='repPassR' name='repPassR'/><br><br>

      <input type='button' style="font-size:14px; width: 100px; height : 35px; background-color:  #0ec481; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" id='restablecer' value="Cambiar" onClick="cambiarPassConfirmation()"/><br><br>

    </form>
    <label id='datos'></label>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>