<?php
include_once("../BaseDatos.php");


class Auto {
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;

    public function __construct($patente="", $marca="", $modelo="", $dniDuenio="") {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->dniDuenio = $dniDuenio;
    }

    public function getPatente() { return $this->patente; }
    public function setPatente($patente) { $this->patente = $patente; }

    public function getMarca() { return $this->marca; }
    public function setMarca($marca) { $this->marca = $marca; }

    public function getModelo() { return $this->modelo; }
    public function setModelo($modelo) { $this->modelo = $modelo; }

    public function getDniDuenio() { return $this->dniDuenio; }
    public function setDniDuenio($dni) { $this->dniDuenio = $dni; }

    public function insertar() {
        $db = new baseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio)
                VALUES ('$this->patente','$this->marca','$this->modelo','$this->dniDuenio')";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public function modificar() {
        $db = new baseDatos();
        $sql = "UPDATE auto SET
                Marca='$this->marca',
                Modelo='$this->modelo',
                DniDuenio='$this->dniDuenio'
                WHERE Patente='$this->patente'";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public function eliminar() {
        $db = new baseDatos();
        $sql = "DELETE FROM auto WHERE Patente='$this->patente'";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public static function seleccionar($patente="") {
        $db = new baseDatos();
        $sql = "SELECT * FROM auto";
        if($patente != "") {
            $sql .= " WHERE Patente='$patente'";
        }
        $resultado = $db->ejecutarConsulta($sql);
        $col = [];
        while ($fila = $resultado->fetch_assoc()) {
            $col[] = new Auto(
                $fila['Patente'],
                $fila['Marca'],
                $fila['Modelo'],
                $fila['DniDuenio']
            );
        }
        $db->cerrar();
        return $col;
    }
}