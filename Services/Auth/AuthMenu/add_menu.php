<?php
include('../../../Config/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_menu = $_POST['nombre_menu'];
    $url_direcction = $_POST['url_direcction'];
    $orden_menu = $_POST['orden_menu'];

    $sql = "INSERT INTO menu (nombre_menu, url_direcction, orden_menu) VALUES (:nombre_menu, :url_direcction, :orden_menu)";

    // Obtener la conexión
    $conexion = new Conexion();
    $dbh = $conexion->getConnection();

    // Preparar la consulta
    $stmt = $dbh->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':nombre_menu', $nombre_menu, PDO::PARAM_STR);
    $stmt->bindParam(':url_direcction', $url_direcction, PDO::PARAM_STR);
    $stmt->bindParam(':orden_menu', $orden_menu, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header('Location:../../Persistence/Menu/MenuList.php');
    } else {
        echo "Error al agregar el menú.";
    }
}
?>
