<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['es_admin'] == true) {
    header("location: login.html");
    exit;
}

// Aquí va el contenido para los usuarios normales
echo "<h2>Bienvenido, usuario " . $_SESSION['username'] . "!</h2>";
// Puedes incluir funcionalidades para modificar libros aquí
?>
