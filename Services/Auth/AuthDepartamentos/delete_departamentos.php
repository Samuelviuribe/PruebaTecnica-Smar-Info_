<?php
require_once("../../../Config/Conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos
    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    // Capturar el nombre del departamento desde el formulario
    $nombre_departamento = $_POST['nombre_departamento'];

    // Consulta SQL para insertar el nuevo departamento
    $sql = "INSERT INTO departamentos (nombre_departamento) VALUES (:nombre_departamento)";
    $stmt = $dbh->prepare($sql);

    // Enlazar parámetros
    $stmt->bindParam(':nombre_departamento', $nombre_departamento, PDO::PARAM_STR);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la lista de departamentos o mostrar mensaje de éxito
        header("Location: ../../../Services/Persistence/Departamentos/DepartamentosList.php");
        exit();
    } else {
        echo "Error al crear el departamento.";
    }
}
?>
