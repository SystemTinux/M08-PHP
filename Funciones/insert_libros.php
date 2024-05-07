<?php
// Habilitar el modo de depuración y mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../config/connection.php");
$con = connection();


$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$tematica = $_POST['tematica'];



$sql = "INSERT INTO biblioteca VALUES(null, '$titulo','$autor','$tematica')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ../index.php");
}else{
    echo "Error inserting book: " . mysqli_error($con);
}

?>