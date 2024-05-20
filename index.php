<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['es_admin']) {
        header("location: Dashboard/admin_dashboard.php");
    } else {
        header("location: Dashboard/user_dashboard.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
    </header>
    <div class="contenedor__todo">
        <div class="login-wrapper">
            <div class="login-container admin-login" id="admin-login">
                <h2>¿Eres Administrador?</h2>
                <p>Inicia sesión para acceder al panel de administración</p>
                <form action="Logguearse/login.php" method="post">
                    <input type="text" name="username" placeholder="Nombre de usuario" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="hidden" name="role" value="admin">
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
        <div class="login-wrapper">
            <div class="login-container user-login" id="user-login">
                <h2>¿Eres Usuario?</h2>
                <p>Inicia sesión para entrar en la página</p>
                <form action="Logguearse/login.php" method="post">
                    <input type="text" name="username" placeholder="Nombre de usuario" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <input type="hidden" name="role" value="user">
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
