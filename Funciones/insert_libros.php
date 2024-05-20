<?php
include '../config/connection.php';
$con = connection();

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$tematica = $_POST['tematica'];
$modificaUser = isset($_POST['modificaUser']) ? $_POST['modificaUser'] : NULL; // Permitir valores nulos

$sql = "INSERT INTO biblioteca (titulo, autor, tematica, modificaUser) VALUES (?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param('sssi', $titulo, $autor, $tematica, $modificaUser);

if ($stmt->execute()) {
    header("Location: ../Dashboard/user_dashboard.php");
} else {
    echo "Error al insertar el libro: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
