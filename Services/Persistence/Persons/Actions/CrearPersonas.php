<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
</head>
<body>
<form action="../../../Auth/AuthPersons/add_persona.php" method="POST">
    <label for="nombre_user">Nombre:</label>
    <input type="text" id="nombre_user" name="nombre_user" required><br><br>

    <label for="apellido_user">Apellido:</label>
    <input type="text" id="apellido_user" name="apellido_user" required><br><br>

    <label for="user_email">Correo:</label>
    <input type="email" id="user_email" name="user_email" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono"><br><br>

    <label for="id_departamento">Departamento:</label>
    <input type="text" id="id_departamento" name="id_departamento"><br><br>

    <button type="submit">Crear</button>
</form>

</body>
</html>
