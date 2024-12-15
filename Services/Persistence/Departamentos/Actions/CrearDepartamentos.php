<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Departamento</title>
    <link rel="stylesheet" href="../../../Styles/Main.css">
</head>
<body>

    <h2>Crear un Nuevo Departamento</h2>

    <form action="../../../Auth/AuthMenu/add_menu.php" method="POST">
        <div>
            <label for="nombre_departamento">Nombre del Departamento:</label>
            <input type="text" name="nombre_departamento" id="nombre_departamento" required>
        </div>
        
        <div>
            <button type="submit">Agregar Departamento</button>
        </div>
    </form>

</body>
</html> 