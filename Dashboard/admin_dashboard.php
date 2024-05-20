<?php
session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['es_admin']) {
    header("location: ../index.php");
    exit;
}

include '../config/connection.php';
$con = connection();

$sql = "SELECT * FROM biblioteca";
$query = mysqli_query($con, $sql);

$sql_users = "SELECT * FROM usuarios";
$query_users = mysqli_query($con, $sql_users);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Dashboard Administrador</title>
</head>
<body>
    <header>
        <h2>Bienvenido, admin <?= $_SESSION['username'] ?>!</h2>
        <form action="../Logguearse/logout.php" method="post" style="display:inline;">
            <input type="submit" value="Salir">
        </form>
        <a href="../index.php">Volver al Menú Principal</a>
    </header>

    <div class="dashboard-container">
        <div class="dashboard-box libros-box">
            <h1>Inserta tus libros</h1>
            <form action="../Funciones/insert_libros.php" method="POST">
                <input type="text" name="titulo" placeholder="Título" required>
                <input type="text" name="autor" placeholder="Autor" required>
                <input type="text" name="tematica" placeholder="Temática" required>
                <input type="submit" value="Agregar">
            </form>
        </div>

        <div class="dashboard-box usuarios-box">
            <h1>Crear Usuario</h1>
            <form action="../Funciones/insert_user.php" method="POST">
                <input type="text" name="username" placeholder="Nombre de usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <label>
                    <input type="checkbox" name="es_admin" value="1"> Es Admin
                </label>
                <input type="submit" value="Crear Usuario">
            </form>
        </div>
    </div>

    <div class="users-table">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Es Admin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_user = mysqli_fetch_array($query_users)): ?>
                    <tr>
                        <td><?= $row_user['nombre_usuario'] ?></td>
                        <td><?= $row_user['es_admin'] ? 'Sí' : 'No' ?></td>
                        <td>
                            <a href="../Funciones/eliminar_user.php?id=<?= $row_user['id'] ?>" class="libros-table--delete">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
