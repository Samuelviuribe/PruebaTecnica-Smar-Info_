<?php
require_once(__DIR__ . "/../Config/Conexion.php");

class Menu extends Conexion {
    public function get_menu() {
        $this->set_names();

        // Consulta SQL para obtener todos los menús
        $sql = "SELECT id_menu, nombre_menu, url_direcction, parent_id 
                FROM Menu 
                WHERE estado_menu = 1 
                ORDER BY orden_menu";

        $query = $this->dbh->prepare($sql);
        $query->execute();

        // Obtener todos los menús en un array
        $menus = $query->fetchAll(PDO::FETCH_ASSOC);

        // Construir la jerarquía del menú
        return $this->build_menu_hierarchy($menus);
    }

    private function build_menu_hierarchy(array $menus, $parent_id = null) {
        $hierarchy = [];

        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $parent_id) {
                // Llamada recursiva para encontrar submenús
                $menu['submenus'] = $this->build_menu_hierarchy($menus, $menu['id_menu']);
                $hierarchy[] = $menu;
            }
        }

        return $hierarchy;
    }
}
?>
