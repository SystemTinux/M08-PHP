<?php
require '../config/connection.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Contraseña en texto plano

    $conn = connection();

    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, es_admin) VALUES (?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);

    if ($stmt->execute()) {
        $message = 'Usuario creado exitosamente';
    } else {
        $message = 'Error al crear el usuario: ' . $stmt->error;
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
    <title>SignUp</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1>Biblioteca - Registro</h1>
    </header>
    <div class="form-container">
        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <h2>Regístrate</h2>
        <form action="signup.php" method="post">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
