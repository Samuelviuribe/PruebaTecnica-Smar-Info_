<?php
include('../../Config/Conexion.php');

// Establecer la conexión con la base de datos usando PDO
$conexion = new Conexion();
$dbh = $conexion->getConnection();

// Consulta usando PDO
$query = "SELECT * FROM menu ORDER BY orden_menu ASC";
$stmt = $dbh->prepare($query);
$stmt->execute();

// Obtener todos los resultados
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Menu</title>
</head>
<body>
    <h1>Elementos del Menu</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>URL</th>
                <th>Orden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $menu_item) { ?>
                <tr>
                    <td><?php echo $menu_item['id_menu']; ?></td>
                    <td><?php echo $menu_item['nombre_menu']; ?></td>
                    <td><?php echo $menu_item['url_direcction']; ?></td>
                    <td><?php echo $menu_item['orden_menu']; ?></td>
                    <td>
                    <a href="edit_menu.php?id=<?php echo $menu_item['id_menu']; ?>">Editar</a> | 
                        <a href="delete_menu.php?id=<?php echo $menu_item['id_menu']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
