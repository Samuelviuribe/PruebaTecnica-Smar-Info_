<?php
include('../../../Config/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $nombre_user = $_POST['nombre_user'];
    $apellido_user = $_POST['apellido_user'];
    $user_email = $_POST['user_email'];
    $telefono = $_POST['telefono'];
    $id_departamento = $_POST['id_departamento'];

    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    $sql = "INSERT INTO personas (nombre_user, apellido_user, user_email, telefono, id_departamento) 
            VALUES (:nombre_user, :apellido_user, :user_email, :telefono, :id_departamento)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':nombre_user', $nombre_user, PDO::PARAM_STR);
    $stmt->bindParam(':apellido_user', $apellido_user, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);

    if ($stmt->execute()) {
       header('Location:../../Persistence/Persons/ListPersons.php');
       exit;
    } else {
        echo "Error al crear la persona.";
    }
}
?>
