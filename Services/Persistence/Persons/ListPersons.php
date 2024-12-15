<?php

include_once('../../../Config/Conexion.php');

// Crear una instancia de la conexión
$conexion = new Conexion();
$dbh = $conexion->getConnection();

$sql = "SELECT * FROM personas";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$personas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
</head>
<body>
    <h1>Lista de Personas</h1>

    <a href="Actions/CrearPersonas.php">Crear nueva persona</a><br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
       
        <?php foreach ($personas as $persona): ?>
    <tr>
        <td><?php echo $persona['id_user']; ?></td>
        <td><?php echo $persona['nombre_user']; ?></td> 
        <td><?php echo $persona['apellido_user']; ?></td>
        <td><?php echo $persona['user_email']; ?></td>
        <td><?php echo $persona['telefono']; ?></td>
        <td>
        <a href="../Persons/Actions/PersonsCrud.php?id=<?php echo $persona['id_user']; ?>">Editar</a>
        <a href="../../../Services/Auth/AuthPersons/delete_persona.php?id=<?php echo $persona['id_user']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</a>
        </td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>
