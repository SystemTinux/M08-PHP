<?php 
ini_set("display_error", 1);
error_reporting(E_ALL);
include("../config/connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM biblioteca WHERE id='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Editar libros</title>
</head>
<body>
    <div class="libros-form">
        <form action="edit_libros.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <input type="text" name="titulo" placeholder="titulo" value="<?= $row['titulo']?>">
            <input type="text" name="autor" placeholder="autor" value="<?= $row['autor']?>">
            <input type="text" name="tematica" placeholder="tematica" value="<?= $row['tematica']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
