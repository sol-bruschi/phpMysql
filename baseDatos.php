<?php
class baseDatos {
    private $host = "localhost";
    private $user = "root";   
    private $pass = "";
    private $db = "infoautos";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function ejecutarConsulta($sql) {
        return $this->conn->query($sql);
    }

    public function ejecutar($sql) {
        return $this->conn->query($sql);
    }

    public function cerrar() {
        $this->conn->close();
    }
}
?>
