<?php
include('../../../Config/Conexion.php');

// Conexión a la base de datos
$conexion = new Conexion();
$dbh = $conexion->getConnection();

// Consulta para obtener los departamentos
$query = "SELECT id_departamento, nombre_departamento FROM departamentos";
$stmt = $dbh->prepare($query);
$stmt->execute();
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Departamentos</title>
    <link rel="stylesheet" href="../../../Styles/Main.css"> <!-- Tu archivo de estilos -->
</head>

<body>
    <h1>Lista de Departamentos</h1>

    <a href="Actions/">Crear nueva persona</a><br><br>

    <div class="departamentos-container">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Departamento</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($departamentos)) : ?>
                    <?php foreach ($departamentos as $departamento) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($departamento['id_departamento']); ?></td>
                            <td><?php echo htmlspecialchars($departamento['nombre_departamento']); ?></td>
                            <td>
                                <a href="../Departamentos/Actions/DepartamentoCrud.php?id=<?php echo $persona['id_user']; ?>">Editar</a>
                                <a href="../../Auth/AuthDepartamentos/delete_departamentos.php?id=<?php echo $departamento['id_departamento']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este departamento?');">
                                    <i class="ri-delete-bin-line" style="font-size: 20px; color: red;"></i>
                                    Eliminar
                                </a>

                            </td
                                </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="2">No hay departamentos registrados.</td>
                        </tr>
                    <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="../../../">Volver al menú principal</a>
</body>

</html>