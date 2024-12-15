<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="../../Services/Auth/AuthService.php" method="POST">
            <div class="form" style="text-align: center;">
                <label for="email" i >Correo Electrónico</label>
                <input type="text" id="email" name="email" required>  
                
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name="clave" required>
                
                <button type="submit">Ingresar</button>
            </div>
        </form>
    </main>
</body>
</html>
