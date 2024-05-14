<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['es_admin'] == false) {
    header("location: login.html");
    exit;
}

// Aquí va el contenido para los administradores
echo "<h2>Bienvenido, administrador " . $_SESSION['username'] . "!</h2>";
// Puedes incluir funcionalidades para administrar usuarios y libros aquí
?>
