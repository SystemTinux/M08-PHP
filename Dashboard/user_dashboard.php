<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['es_admin']) {
    header("location: ../index.php");
    exit;
}

include '../config/connection.php';
$con = connection();

$sql = "SELECT * FROM biblioteca";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Dashboard Usuario</title>
</head>
<body>
    <header>
        <h2>Bienvenido, <?= $_SESSION['username'] ?>!</h2>
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

        <div class="dashboard-box libros-table-box">
            <h1>Libros</h1>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Temática</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?= $row['titulo'] ?></td>
                            <td><?= $row['autor'] ?></td>
                            <td><?= $row['tematica'] ?></td>
                            <td>
                                <a href="../Funciones/update.php?id=<?= $row['id'] ?>" class="libros-table--edit">Editar</a>
                                <a href="../Funciones/eliminar_libros.php?id=<?= $row['id'] ?>" class="libros-table--delete">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
