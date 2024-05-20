<?php
include("../config/connection.php");
$con = connection();

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$tematica = $_POST['tematica'];

$sql = "UPDATE biblioteca SET titulo='$titulo', autor='$autor', tematica='$tematica' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: ../Dashboard/user_dashboard.php");
} else {
    echo "Error al actualizar el libro: " . mysqli_error($con);
}
?>
