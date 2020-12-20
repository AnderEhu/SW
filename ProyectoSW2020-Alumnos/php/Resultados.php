<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo '<div style="border-style: solid; border-color: #5d6d7e;"> ';
echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;" >Resultados</h2><br>';
echo '<p style="color: red; font-size:16px; "> Aciertos: '.$_SESSION["aciertos"].'</p>';
echo "<p style='color: green; font-size:16px; '> Fallos: ".$_SESSION['fallos']."</p><br>";
echo '<form id="fQuizzers" method="get" action="">';
echo '<input type="text" id="nick" name="nick">   ';
echo '<input  style="font-size:14px; width: 100px; height : 35px; background-color:  #e74c3c; cursor: pointer; padding: 5px; color: white; border: none;  border-radius: 8px;" type="button" value="Añadir Nick" onclick="anadirQuizzer()"> ';
echo '</form>';
echo '<br></div>';

?>