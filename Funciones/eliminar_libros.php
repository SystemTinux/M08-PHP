<?php
/**
 * En este apartado es la parte de eliminar
 */
include("../config/connection.php");
$con = connection();

$id = $_GET["id"];

// Si se envía una solicitud POST desde el formulario de confirmación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Si se confirma la eliminación
    if (isset($_POST["confirm"])) {
        $sql = "DELETE FROM biblioteca WHERE id='$id'";
        $query = mysqli_query($con, $sql);
        if ($query) {
            header("Location: ../index.php");
            exit(); // Detiene la ejecución del script después de redirigir
        } else {
            echo "Error al eliminar el registro.";
        }
    } else {
        // Si se cancela la eliminación
        header("Location: ../index.php");
        exit(); // Detiene la ejecución del script después de redirigir
    }
}
?>

<!-- Página HTML con formulario de confirmación -->
<!DOCTYPE html>
<html>
<head>
    <title>Confirmar Eliminación</title>
</head>
<body>
    <h2>¿Estás seguro de que deseas eliminar este registro?</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
        <input type="submit" name="confirm" value="Confirmar">
        <input type="button" value="Cancelar" onclick="history.back()">
    </form>
</body>
</html>
