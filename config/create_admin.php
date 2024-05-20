<?php
include 'connection.php';

// Datos del usuario administrador
$username = 'CrisAdmin';
$password = 'Alumne1234'; // Contraseña en texto plano
$es_admin = 1;

// Conexión a la base de datos
$conn = connection();

// Preparar y ejecutar la consulta SQL
$stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, es_admin) VALUES (?, ?, ?)");
$stmt->bind_param('ssi', $username, $password, $es_admin);

if ($stmt->execute()) {
    echo "Usuario admin creado.";
} else {
    echo "Error al crear el usuario admin: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
