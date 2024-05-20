<?php
session_start();
include '../config/connection.php';

if (!isset($_SESSION['loggedin']) || !$_SESSION['es_admin']) {
    header("location: ../index.php");
    exit;
}

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $es_admin = isset($_POST['es_admin']) ? 1 : 0;

    $conn = connection();

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contrasena, es_admin) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $username, $password, $es_admin); 

    if ($stmt->execute()) {
        $message = 'Usuario creado exitosamente';
    } else {
        $message = 'Lo siento, hubo un problema al crear el usuario';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1>Gestionar Usuarios</h1>
    </header>
    <div class="form-container">
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <h2>Registrar Nuevo Usuario</h2>
        <form action="gestion_usuarios.php" method="post">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <label>
                <input type="checkbox" name="es_admin"> Administrador
            </label>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
