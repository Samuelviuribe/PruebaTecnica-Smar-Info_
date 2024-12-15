<?php
 
include('../../../Config/Conexion.php');

 
$conexion = new Conexion();
$dbh = $conexion->getConnection();   

 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $id_menu = $_POST['id_menu'];
    $nombre_menu = $_POST['nombre_menu'];
    $url_direcction = $_POST['url_direcction'];
    $orden_menu = $_POST['orden_menu'];

    
    $sql = "UPDATE menu SET nombre_menu = :nombre_menu, url_direcction = :url_direcction, orden_menu = :orden_menu WHERE id_menu = :id_menu";

    
    $stmt = $dbh->prepare($sql);

     
    $stmt->bindParam(':id_menu', $id_menu, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_menu', $nombre_menu, PDO::PARAM_STR);
    $stmt->bindParam(':url_direcction', $url_direcction, PDO::PARAM_STR);
    $stmt->bindParam(':orden_menu', $orden_menu, PDO::PARAM_INT);

     
    if ($stmt->execute()) {
        header('Location:../../Persistence/Menu/MenuList.php');
    } else {    
        echo "Error al actualizar el menú.";
    }
}
?>
