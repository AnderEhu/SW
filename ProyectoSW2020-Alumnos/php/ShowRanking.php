<?php

include "DbConfig.php";
$mysqli = mysqli_connect($server, $user, $pass, $basededatos);

if (!$mysqli){
  exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
}


$query = "SELECT * FROM Ranking ORDER BY Aciertos DESC LIMIT 10";

$res = mysqli_query($mysqli, $query);
//echo '<h2 style="color:  #eaeded ; font-size:30px;  padding: 10px; background-color:   #5d6d7e;">Top 10 Quizzers</h2><br>';
//echo '<div style="border-style: solid; border-color: #5d6d7e;" >';

if(!$res){
  exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
}
echo '<table border=0 style="border: 0;
background-color: white;
width: 100%;
text-align: center;
border-collapse: collapse;" ><tr style="border: 0; color: white;"><th style=" background-color: #eee; padding: 10px;"></th><th style=" background-color: #5d6d7e; padding: 10px;"> Quizzer </th> <th style=" background-color: #5d6d7e; padding: 10px;"> Acertadas </th> <th style="background-color: #5d6d7e; padding: 10px;"> Falladas </th></tr>';
$cont = 1;
while ($row = mysqli_fetch_array($res)){

    if ($cont == 1) {
      echo '<tr style="background-color: #6aab66; padding: 5px; ">
            <td style="padding: 10px;"> <img src="../images/oro.png" width="36px" height="53px" alt=""></td>
            <td style="padding: 10px;">' .$row['Nombre'].'</td>
            <td style="padding: 10px;">' .$row['Aciertos'].'</td>
            <td style="padding: 10px;">' .$row['Fallos'].'</td>
      </tr>';


    }else if ($cont == 2) {
      echo '<tr style="background-color: #6aab66; padding: 5px; ">
            <td style="padding: 10px;"> <img src="../images/plata.png" width="36px" height="53px" alt=""></td>
            <td style="padding: 10px;">' .$row['Nombre'].'</td>
            <td style="padding: 10px;">' .$row['Aciertos'].'</td>
            <td style="padding: 10px;">' .$row['Fallos'].'</td>
      </tr>';
    } else if ($cont == 3) {
      echo '<tr style="background-color: #6aab66; padding: 5px; ">
            <td style="padding: 10px;"> <img src="../images/bronce.png" width="36px" height="53px" alt=""></td>
            <td style="padding: 10px;">' .$row['Nombre'].'</td>
            <td style="padding: 10px;">' .$row['Aciertos'].'</td>
            <td style="padding: 10px;">' .$row['Fallos'].'</td>
      </tr>';
    }else{
      echo '<tr style="background-color: #dadbdb; padding: 5px; ">
            <td style="font-size: 25px; color: #3a3a3a; padding: 10px;">'.$cont.'</td>
            <td style="padding: 10px;">' .$row['Nombre'].'</td>
            <td style="padding: 10px;">' .$row['Aciertos'].'</td>
            <td style="padding: 10px;">' .$row['Fallos'].'</td>
      </tr>';
    }
    $cont = $cont +1;
}

echo '</table>';


?>