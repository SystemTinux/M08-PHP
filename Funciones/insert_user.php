<?php
include '../config/connection.php';
$con = connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $es_admin = isset($_POST['es_admin']) ? 1 : 0;

    $stmt = $con->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, es_admin) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $username, $password, $es_admin);

    if ($stmt->execute()) {
        header("Location: ../Dashboard/admin_dashboard.php");
    } else {
        echo "Error al crear el usuario: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

