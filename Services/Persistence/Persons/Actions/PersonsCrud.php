<?php
// Incluir la clase de conexión
include('../../../../Config/Conexion.php');

// Verificar si se ha pasado el id_user a través de la URL
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    // Crear una instancia de la conexión
    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    // Consultar los datos actuales de la persona
    $sql = "SELECT * FROM personas WHERE id_user = :id_user";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtener los resultados
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la persona existe
    if (!$persona) {
        echo "Persona no encontrada.";
        exit;
    }
} else {
    echo "ID de persona no especificado.";
    exit;
}

// Si se ha enviado el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_user = $_POST['nombre_user'];
    $apellido_user = $_POST['apellido_user'];
    $user_email = $_POST['user_email'];
    $telefono = $_POST['telefono'];
    $id_departamento = $_POST['id_departamento'];

    // Actualizar los datos en la base de datos
    $update_query = "UPDATE personas SET nombre_user = :nombre_user, apellido_user = :apellido_user, user_email = :user_email, telefono = :telefono, id_departamento = :id_departamento WHERE id_user = :id_user";
    $update_stmt = $dbh->prepare($update_query);
    $update_stmt->bindParam(':nombre_user', $nombre_user, PDO::PARAM_STR);
    $update_stmt->bindParam(':apellido_user', $apellido_user, PDO::PARAM_STR);
    $update_stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $update_stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
    $update_stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
    $update_stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);

    // Ejecutar la actualización
    if ($update_stmt->execute()) {
        echo "Persona actualizada con éxito.";
    } else {
        echo "Error al actualizar la persona.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
</head>
<body>
    <h1>Editar Persona</h1>

    <form action="../../../Auth/AuthPersons/edit_persona.php?id_user=<?php echo $persona['id_user']; ?>" method="POST">

        <input type="hidden" name="id_user" value="<?php echo $persona['id_user']; ?>">

        <label for="nombre_user">Nombre:</label>
        <input type="text" id="nombre_user" name="nombre_user" value="<?php echo $persona['nombre_user']; ?>" required><br><br>

        <label for="apellido_user">Apellido:</label>
        <input type="text" id="apellido_user" name="apellido_user" value="<?php echo $persona['apellido_user']; ?>" required><br><br>

        <label for="user_email">Correo:</label>
        <input type="email" id="user_email" name="user_email" value="<?php echo $persona['user_email']; ?>" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>"><br><br>

        <label for="id_departamento">Departamento:</label>
        <input type="text" id="id_departamento" name="id_departamento" value="<?php echo $persona['id_departamento']; ?>"><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="../../../Persistence/Persons/ListPersons.php">Volver a la lista de personas</a>
</body>
</html>
