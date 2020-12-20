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
  <section class="main" id="cambiarPass">
    <form  style="border-style: solid; border-color: #5d6d7e; " id='fpass' name='fpass' >
      <div style="color:  #eaeded ; font-size:15px;  padding: 10px; background-color:   #5d6d7e;">
      <h2> ¿Has olvidado tu contraseña?</h2>
      <p> Por favor introduce la cuenta de email usada para el registro</p></div><br>
      <input placeholder="Escribe aqui tu email" type='text' id='emailR' name='email'/><br><br>
      <input style=" font-size:15px;  width: 120px; height : 40px; background-color: #5d6d7e; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;"  type='button' id='restablecer' value='Restablecer' onClick="cambiarPass()"/><br><br>
      <label id='datos'></label>

    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>