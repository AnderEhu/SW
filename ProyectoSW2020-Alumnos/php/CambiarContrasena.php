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
      <input type='text' id='emailR' name='email'/>
      <input type='button' id='restablecer' value='Restablecer' onClick="cambiarPass()"/><br>
      <label id='datos'></label>

    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>