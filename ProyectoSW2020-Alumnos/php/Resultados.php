<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo "Resultados <br>";
echo "Aciertos: ".$_SESSION['aciertos'];
echo "<br> Fallos: ".$_SESSION['fallos'];
echo '<form id="fQuizzers" method="get" action="">';
echo '<input type="text" name="nick"> ';
echo '<input type="button" value="anadir" onclick="anadirQuizzer()"> ';
echo '</form>';

?>