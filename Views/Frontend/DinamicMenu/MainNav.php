<?php
require_once("../Config/Conexion.php");
require_once("../Models/Menu.php");

$menu = new Menu();
$menx = $menu->get_menu();

?>

<div class="menu__content">
    <ul class="nav">
        <?php
        if (!empty($menx)) {
            foreach ($menx as $menu_item) {
        ?>
            <li>
                <a href="<?php echo $menu_item['url_direcction']; ?>">
                    <span class="sidebar-mini-hide"><?php echo $menu_item['nombre_menu']; ?></span>
                </a>
            </li>
        <?php
            }
        } else {
            echo "No hay menús disponibles.";
        }
        ?>
    </ul>
</div>
