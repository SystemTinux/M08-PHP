<?php
include("../config/connection.php");
$con = connection();

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirm"])) {
        $sql = "DELETE FROM biblioteca WHERE id='$id'";
        $query = mysqli_query($con, $sql);
        if ($query) {
            header("Location: ../Dashboard/user_dashboard.php");
            exit();
        } else {
            echo "Error al eliminar el registro.";
        }
    } else {
        header("Location: ../Dashboard/user_dashboard.php");
        exit();
    }
}
?>

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
