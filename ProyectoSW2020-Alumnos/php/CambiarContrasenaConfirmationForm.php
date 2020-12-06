<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <script src="../js/GetQuestionAjax.js"></script>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion' >

      <label> Email </label>
      <input type='text' id='emailR' name='emailR'/><br><br>
      <label> Codigo </label>
      <input type='text' id='codigoR' name='codigoR'/><br><br>
      <label> Nueva contrasena </label>
      <input type='text' id='passR' name='passR'/><br><br>
      <label> Repetir nueva contrasena </label>
      <input type='text' id='repPassR' name='repPassR'/><br><br>

      <input type='button' id='restablecer' value="Cambiar" onClick="cambiarPassConfirmation()"/><br>
      <label id='datos'></label>

    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>