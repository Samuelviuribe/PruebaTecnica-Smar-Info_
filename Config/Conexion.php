<?php
class Conexion {
    protected $dbh;

    public function __construct() {
        try {
            // Usando las credenciales que me diste
            $this->dbh = new PDO('mysql:host=localhost;dbname=pruebatecnica', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    //replantear la existencia de este metodo
    public function getConnection() {
        return $this->dbh;
    }

    public function set_names() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
