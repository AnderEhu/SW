<?php

include "DbConfig.php";
$mysqli = mysqli_connect($server, $user, $pass, $basededatos);

if (!$mysqli){
  exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
}


$query = "SELECT * FROM Ranking ORDER BY Aciertos DESC LIMIT 10";

$res = mysqli_query($mysqli, $query);


if(!$res){
  exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
}

echo '<table border=1 class="questionsTable"><tr> <th> Quizzer </th> <th> Acertadas </th> <th> Falladas </th></tr>';

while ($row = mysqli_fetch_array($res)){

     echo '<tr>
            <td>' .$row['Nombre'].'</td>
            <td>' .$row['Aciertos'].'</td>
            <td>' .$row['Fallos'].'</td>

        </tr>';
}

echo '</table>';


?>