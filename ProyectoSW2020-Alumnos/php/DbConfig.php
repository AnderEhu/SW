<?php

/* 1 => local, 0 => 000webhotst */

$local=0; //1 para la nube

if ($local==0){
    $server="localhost";
    $user="root";
    $pass="";
    $basededatos="Quiz";
} else {
    $server="localhost";
    $user="id15712055_wc20758b";
    $pass="mejordbSW12!";
    $basededatos="id15712055_sw758b";
}


?>
