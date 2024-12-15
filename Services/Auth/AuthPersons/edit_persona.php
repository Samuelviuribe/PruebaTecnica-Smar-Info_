<?php

include('../../../Config/Conexion.php');

// Crear la conexión
$conexion = new Conexion();
$dbh = $conexion->getConnection();   

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir los datos del formulario
    $id_user = $_POST['id_user']; // ID de la persona a actualizar
    $nombre_user = $_POST['nombre_user']; // Nombre de la persona
    $apellido_user = $_POST['apellido_user']; // Apellido de la persona
    $user_email = $_POST['user_email']; // Correo electrónico de la persona
    $telefono = $_POST['telefono']; // Teléfono de la persona
    $id_departamento = $_POST['id_departamento']; // Departamento de la persona

    // Consulta para actualizar los datos de la persona
    $sql = "UPDATE personas SET nombre_user = :nombre_user, apellido_user = :apellido_user, 
            user_email = :user_email, telefono = :telefono, id_departamento = :id_departamento 
            WHERE id_user = :id_user";

    $stmt = $dbh->prepare($sql);

    // Vincular los parámetros a la consulta
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_user', $nombre_user, PDO::PARAM_STR);
    $stmt->bindParam(':apellido_user', $apellido_user, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);

    // Ejcutar la consulta
    if ($stmt->execute()) {
        // Si la actualización es exitosa, redirigir a la lista de personas
        header('Location: ../../../Services/Persistence/Persons/ListPersons.php');
        exit;
    } else {
        echo "Error al actualizar la persona.";
    }
}
?>
