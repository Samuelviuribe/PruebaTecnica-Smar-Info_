<?php
include('../../../Config/Conexion.php');
$conexion = new Conexion();
$dbh = $conexion->getConnection();

$query = "SELECT * FROM menu ORDER BY orden_menu ASC";
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
        rel="stylesheet" />
    <title>Lista de Menu</title>
</head>

<body>
    <a href="../../../Views/Frontend/Principal/Home.php">
        <i class="ri-arrow-go-back-line"></i>
    </a>
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
                        <!-- formulario para actulizar -->
                        <a href="Actions/MenuCrud.php?id=<?php echo $menu_item['id_menu']; ?>">Editar</a>

                        <a href="../../Auth/AuthMenu/delete_menu.php?id_menu=<?php echo $menu_item['id_menu']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">Eliminar</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Crear  -->
    <a href="Actions/CrearMenu.php">
        <i class="ri-add-circle-fill" style="font-size: 30px;">añadir</i>
    </a>

</body>

</html>