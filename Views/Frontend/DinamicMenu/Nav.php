<?php
 
require_once("../../../Config/Conexion.php");
require_once("../../../Models/Menu.php");

$menu = new Menu();
$menx = $menu->get_menu();

$menuItems = [];
foreach ($menx as $item) {

   $parent_id = isset($item['parent_id']) ? $item['parent_id'] : 0;

   if ($parent_id == 0) {
      $menuItems[$item['id_menu']] = [
         'nombre_menu' => $item['nombre_menu'],
         'url_direcction' => $item['url_direcction'],
         'sub_menu' => []
      ];
   } else {
       
      if (isset($menuItems[$parent_id])) {
         $menuItems[$parent_id]['sub_menu'][] = [
            'nombre_menu' => $item['nombre_menu'],
            'url_direcction' => $item['url_direcction']
         ];
      }
   }
}
?>

  <!-- head momentaneo para aplicar algunos estilos y iconos (cambiar antes de entregar) -->
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mi Menú</title>
   <link rel="stylesheet" href="../../../Styles/Main.css">
   <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>

     <!-- insercion dinamica de el menu :D  -->

<div class="menu__content">
    <ul class="nav">
        <?php
        function render_menu($menus) {
            foreach ($menus as $menu_item) {
                echo "<li>";
                echo "<a href='{$menu_item['url_direcction']}'>";
                echo "<span class='sidebar-mini-hide'>{$menu_item['nombre_menu']}</span>";
                echo "</a>";

                // Renderizar submenús recursivamente
                if (!empty($menu_item['submenus'])) {
                    echo "<ul>";
                    render_menu($menu_item['submenus']);
                    echo "</ul>";
                }

                echo "</li>";
            }
        }

        // Renderizar el menú principal
        if (!empty($menx)) {
            render_menu($menx);
        } else {
            echo "No hay menús disponibles.";
        }
        ?>
    </ul>
    <div class="menu_edit">
        <a href="../../../Services/Persistence/MenuCrud.php">
            <i class="ri-file-edit-fill" style="font-size: 35px;"></i>
        </a>
    </div>
</div>
