<?php
include('../../../Config/Conexion.php');

$conexion = new Conexion();
$dbh = $conexion->getConnection();   

if (isset($_GET['id_menu'])) {
    $id_menu = $_GET['id_menu'];

    $sql = "DELETE FROM menu WHERE id_menu = :id_menu";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':id_menu', $id_menu, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location:../../Persistence/Menu/MenuList.php');
        exit();
    } else {
        echo "Error al eliminar el menú.";
    }
} else {
    echo "ID del menú no especificado.";
}
?>
