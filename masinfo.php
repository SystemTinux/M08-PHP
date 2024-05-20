ini_set("display_error", 1);
error_reporting(E_ALL);
include("config/connection.php");
$con = connection();

$sql = "SELECT * FROM biblioteca";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Inicio</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <div class="libros-table">
        <h2>Ranking</h2>
        <h3><a href="index.php">Home</a></h3>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>titulo</th>
                    <th>autor</th>
                    <th>tematica</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['titulo'] ?></th>
                        <th><?= $row['autor'] ?></th>
                        <th><?= $row['tematica'] ?></th>
                        <th><a href="Funciones/update.php?id=<?= $row['id'] ?>" class="libros-table--edit">Editar</a></th>
                        <th><a href="Funciones/eliminar_libros.php?id=<?= $row['id'] ?>" onclick="return confir_eliminar()" class="libros-table--delete">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
