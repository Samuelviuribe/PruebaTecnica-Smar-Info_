<?php
include('../../../../Config/Conexion.php');

if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];

    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    $query = "SELECT * FROM menu WHERE id_menu = :id_menu";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id_menu', $id_menu, PDO::PARAM_INT);
    $stmt->execute();
    $menu_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$menu_item) {
        echo "Elemento no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_menu = $_POST['nombre_menu'];
    $url_direcction = $_POST['url_direcction'];
    $orden_menu = $_POST['orden_menu'];

    $update_query = "UPDATE menu SET nombre_menu = :nombre_menu, url_direcction = :url_direcction, orden_menu = :orden_menu WHERE id_menu = :id_menu";
    $update_stmt = $dbh->prepare($update_query);
    $update_stmt->bindParam(':nombre_menu', $nombre_menu, PDO::PARAM_STR);
    $update_stmt->bindParam(':url_direcction', $url_direcction, PDO::PARAM_STR);
    $update_stmt->bindParam(':orden_menu', $orden_menu, PDO::PARAM_INT);
    $update_stmt->bindParam(':id_menu', $id_menu, PDO::PARAM_INT);

    if ($update_stmt->execute()) {
        echo "Menú actualizado con éxito.";
    } else {
        echo "Error al actualizar el menú.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Menú</title>
</head>
<body>
    <h1>Editar Menú</h1>

    <form action="../../../Auth/AuthMenu/edit_menu.php" method="POST">

        <input type="hidden" name="id_menu" value="<?php echo $menu_item['id_menu']; ?>">

        <label for="nombre_menu">Nombre:</label>
        <input type="text" id="nombre_menu" name="nombre_menu" value="<?php echo $menu_item['nombre_menu']; ?>" required><br><br>

        <label for="url_direcction">URL:</label>
        <input type="text" id="url_direcction" name="url_direcction" value="<?php echo $menu_item['url_direcction']; ?>" required><br><br>

        <label for="orden_menu">Orden:</label>
        <input type="number" id="orden_menu" name="orden_menu" value="<?php echo $menu_item['orden_menu']; ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="../../Persistence/Menu/MenuList.php">Volver a la lista de menús</a>
</body>
</html>
