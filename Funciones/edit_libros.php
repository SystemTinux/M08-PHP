<?php
/**
 * En esta parte es para editar libros, primer fem la conexió i despres fem una consulta en sql
 * fem un if on retornem a la pagina principal.
 */
include("../config/connection.php");
 $con = connection();
echo "grfdfhgdgxfh";

$id=$_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$tematica = $_POST['tematica'];


$sql="UPDATE biblioteca SET titulo='$titulo', autor='$autor', tematica='$tematica' WHERE id='$id'";
$query = mysqli_query($con, $sql);


if($query){
    Header("Location: ../index.php");
}else{
    
}

?>