<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear </title>
</head>
<body>
    <h1>Crear Nuevo Menu </h1>

    <form action="../../../Auth/AuthMenu/add_menu.php" method="POST">
        <label for="nombre_menu">Nombre:</label>
        <input type="text" id="nombre_menu" name="nombre_menu" required><br><br>

        <label for="url_direcction">URL:</label>
        <input type="text" id="url_direcction" name="url_direcction" required><br><br>

        <label for="orden_menu">Orden:</label>
        <input type="number" id="orden_menu" name="orden_menu" required><br><br>

        <button type="submit">Crear</button>
    </form>

    <a href="../MenuList.php">Volver a la lista de menús</a>
</body>
</html>
