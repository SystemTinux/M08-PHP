<?php

function connection(){
    $host = "localhost";
    $user = "tina";
    $pass = "alumne";
    
    $bd = "libros";

    $connect=mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);

    return $connect;
}
?>