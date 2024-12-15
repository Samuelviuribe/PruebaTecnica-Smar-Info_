<?php
class Personas {
    private $id_user;
    private $nombre_user;
    private $apellido_user;
    private $user_email;
    private $user_password;
    private $telefono;
    private $id_departamento;

    // Inicializar
    public function __construct($id_user = null, $nombre_user = null, $apellido_user = null, $user_email = null,
        $user_password = null, $telefono = null, $id_departamento = null) {
        $this->id_user = $id_user;
        $this->nombre_user = $nombre_user;
        $this->apellido_user = $apellido_user;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->telefono = $telefono;
        $this->id_departamento = $id_departamento;
    }

    // Getters y Setters
    public function getIdUser() {
        return $this->id_user;
    }

    public function getNombreUser() {
        return $this->nombre_user;
    }

    public function getApellidoUser() {
        return $this->apellido_user;
    }

    public function getUserEmail() {
        return $this->user_email;
    }

    public function getUserPassword() {
        return $this->user_password;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getIdDepartamento() {
        return $this->id_departamento;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setNombreUser($nombre_user) {
        $this->nombre_user = $nombre_user;
    }

    public function setApellidoUser($apellido_user) {
        $this->apellido_user = $apellido_user;
    }

    public function setUserEmail($user_email) {
        $this->user_email = $user_email;
    }

    public function setUserPassword($user_password) {
        $this->user_password = $user_password;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setIdDepartamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }

    public function cargarDesdeArray($data) {
        $this->id_user = $data['id_user'] ?? null;
        $this->nombre_user = $data['nombre_user'] ?? null;
        $this->apellido_user = $data['apellido_user'] ?? null;
        $this->user_email = $data['user_email'] ?? null;
        $this->user_password = $data['user_password'] ?? null;
        $this->telefono = $data['telefono'] ?? null;
        $this->id_departamento = $data['id_departamento'] ?? null;
    }

    public static function validarUsuario($user_email, $user_password, $conexion) {
        try {
            $dbh = $conexion->getConnection(); // Obtén la conexión
            $sql = "SELECT * FROM Personas WHERE user_email = :user_email LIMIT 1"; // SQL
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);
    
            // Verifica si el usuario existe y la contraseña coincide
            if ($user && $user->user_password === $user_password) {
                return $user; // Retorna el objeto usuario si las credenciales son correctas
            } else {
                return null; // Si no hay coincidencia, devuelve null
            }
        } catch (PDOException $e) {
            echo "Error al validar usuario: " . $e->getMessage();
            return null;
        }
    }
    
    
}
?>

<!--  descartado hasta nuevo aviso -->