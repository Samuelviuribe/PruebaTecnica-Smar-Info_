<?php
include('../../Models/Personas.php');
include('../../Config/Conexion.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['clave'];

    $conexion = new Conexion();

    // Validar 
    $user = Personas::validarUsuario($email, $password, $conexion); 
    if ($user !== null) {
        session_start(); // Inicia la sesión

        
        $_SESSION['user_id'] = $user->id_user;  
        $_SESSION['user_nombre'] = $user->nombre_user; 
        $_SESSION['user_rol'] = $user->rol ?? 'usuario';  

        header("Location:../../Views/Frontend/Principal/Home.php");
        exit(); // Detiene la ejecución del código después de la redirección
    } else {
        echo "Credenciales incorrectas.";
    }
}
 
?>
