<?php
class Conexion {
    protected $dbh;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=pruebatecnica', 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "fallo de conexión: " . $e->getMessage();
        }
    }

     
    public function getConnection() {
        return $this->dbh;
    }

    public function set_names() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
