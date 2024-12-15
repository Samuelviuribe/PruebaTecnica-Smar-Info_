<?php
include('../../../Config/Conexion.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_departamento = $_GET['id'];

    try {
        // Conectar a la base de datos
        $conexion = new Conexion();
        $dbh = $conexion->getConnection();

        $query = "SELECT * FROM departamentos WHERE id_departamento = :id_departamento";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
        $stmt->execute();

        $departamento = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$departamento) {
            echo "Departamento no encontrado.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de departamento no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Departamento</title>
</head>
<body>
    <h1>Editar Departamento</h1>

    <form action="update_departamento.php" method="POST">
        <input type="hidden" name="id_departamento" value="<?php echo $departamento['id_departamento']; ?>">

        <label for="nombre_departamento">Nombre del Departamento:</label>
        <input type="text" id="nombre_departamento" name="nombre_departamento" value="<?php echo $departamento['nombre_departamento']; ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="ListDepartments.php">Volver a la lista de departamentos</a>
</body>
</html>
