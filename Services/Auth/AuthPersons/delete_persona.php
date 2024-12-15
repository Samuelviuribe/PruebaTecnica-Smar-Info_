<?php
// Incluir la clase de conexión
include('../../../Config/Conexion.php');

// Verificar si el id de la persona está presente en la URL
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    // Crear la consulta SQL para eliminar el registro
    $sql = "DELETE FROM personas WHERE id_user = :id_user";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: ../../../Services/Persistence/Persons/ListPersons.php');
        exit;
    } else {
        echo "Error al eliminar la persona.";
    }
} else {
    echo "ID de persona no especificado.";
}
?>
