<?php
include('../../Models/Personas.php');
include('../../Config/Conexion.php'); // Asegúrate de incluir la clase de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['clave'];

    // Crear una instancia de la conexión
    $conexion = new Conexion();

    // Validar usuario
    $user = Personas::validarUsuario($email, $password, $conexion); // Usamos la clase Personas

    if ($user !== null) {
        session_start(); // Inicia la sesión

        // Guardar los datos del usuario en la sesión
        $_SESSION['user_id'] = $user->id_user; // Asegúrate de usar el nombre correcto de la propiedad
        $_SESSION['user_nombre'] = $user->nombre_user; // Asegúrate de usar el nombre correcto de la propiedad
        $_SESSION['user_rol'] = $user->rol ?? 'usuario'; // Si no tiene rol, asignar 'usuario'

        // Redirigir al dashboard
        header("Location:../../Views/Frontend/Principal/Home.php");
        exit(); // Detiene la ejecución del código después de la redirección
    } else {
        echo "Credenciales incorrectas.";
    }
}
 
?>
