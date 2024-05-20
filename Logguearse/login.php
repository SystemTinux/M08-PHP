<?php
session_start();
include '../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $conn = connection();

    // Preparar la consulta SQL para obtener los datos del usuario
    $stmt = $conn->prepare("SELECT id, contrasena, es_admin FROM usuarios WHERE nombre_usuario = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_password, $es_admin);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        if ($password === $stored_password) { // Comparar contraseñas sin encriptación
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['es_admin'] = $es_admin;

            if ($role === 'admin' && $es_admin) {
                header("location: ../Dashboard/admin_dashboard.php");
            } elseif ($role === 'user' && !$es_admin) {
                header("location: ../Dashboard/user_dashboard.php");
            } else {
                $message = 'Rol incorrecto.';
            }
        } else {
            $message = 'Contraseña incorrecta.';
        }
    } else {
        $message = 'El usuario no existe.';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1>Biblioteca - Login</h1>
    </header>
    <div class="form-container">
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <h2>Inicia Sesión</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="hidden" name="role" value="admin">
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
