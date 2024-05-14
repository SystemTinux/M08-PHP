<?php
session_start();
include 'config.php'; // Archivo que contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una conexión
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT id, contrasena, es_admin FROM usuarios WHERE nombre_usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $es_admin);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Guardar la información del usuario en la sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['es_admin'] = $es_admin;

            // Redirigir al usuario basado en su rol
            if ($es_admin) {
                header("location: admin_dashboard.php");
            } else {
                header("location: user_dashboard.php");
            }
        } else {
            echo "La contraseña es incorrecta.";
        }
    } else {
        echo "No existe una cuenta con ese nombre de usuario.";
    }

    $stmt->close();
    $conn->close();
}
?>
