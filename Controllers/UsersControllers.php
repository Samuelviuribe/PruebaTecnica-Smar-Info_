<?php
require_once "../Config/Conexion.php";

class UsersController extends Conexion {
    public function login($email, $password) {
        try {
            $this->set_names();  // Establecer la codificación de caracteres

            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $this->dbh->prepare($sql);   
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Validar contraseña
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['rol'] = $user['rol'];

                    return ["status" => "success"];
                } else {
                    return ["status" => "error", "message" => "Credenciales incorrectas"];
                }
            } else {
                return ["status" => "error", "message" => "El usuario no existe"];
            }
        } catch (Exception $e) {
            return ["status" => "error", "message" => "Error interno: " . $e->getMessage()];
        }
    }
}
?>
