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
  <section class="main" id="s1">
    <div>

      <h2>Quiz: el juego de las preguntas</h2>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>




<?php
      session_unset();
      session_destroy();
      echo "<script>
          alert('Hasta Pronto ');
          window.location.href='Layout.php';
      </script>";
?>