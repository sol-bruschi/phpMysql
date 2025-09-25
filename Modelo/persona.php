<?php
include_once("../BaseDatos.php");

class Persona {
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;

    public function __construct($nroDni="", $apellido="", $nombre="", $fechaNac="", $telefono="", $domicilio="") {
        $this->nroDni = $nroDni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    public function getNroDni() { return $this->nroDni; }
    public function setNroDni($dni) { $this->nroDni = $dni; }

    public function getApellido() { return $this->apellido; }
    public function setApellido($apellido) { $this->apellido = $apellido; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getFechaNac() { return $this->fechaNac; }
    public function setFechaNac($fechaNac) { $this->fechaNac = $fechaNac; }

    public function getTelefono() { return $this->telefono; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }

    public function getDomicilio() { return $this->domicilio; }
    public function setDomicilio($domicilio) { $this->domicilio = $domicilio; }

    public function insertar() {
        $db = new baseDatos();
        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)
                VALUES ('$this->nroDni','$this->apellido','$this->nombre','$this->fechaNac','$this->telefono','$this->domicilio')";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public function modificar() {
        $db = new baseDatos();
        $sql = "UPDATE persona SET
                Apellido='$this->apellido',
                Nombre='$this->nombre',
                fechaNac='$this->fechaNac',
                Telefono='$this->telefono',
                Domicilio='$this->domicilio'
                WHERE NroDni='$this->nroDni'";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public function eliminar() {
        $db = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni='$this->nroDni'";
        $db->ejecutar($sql);
        $db->cerrar();
    }

    public static function seleccionar($dni="") {
        $db = new baseDatos();
        $sql = "SELECT * FROM persona";
        if($dni != "") {
            $sql .= " WHERE NroDni='$dni'";
        }
        $resultado = $db->ejecutarConsulta($sql);
        $col = [];
        while ($fila = $resultado->fetch_assoc()) {
            $col[] = new Persona(
                $fila['NroDni'],
                $fila['Apellido'],
                $fila['Nombre'],
                $fila['fechaNac'],
                $fila['Telefono'],
                $fila['Domicilio']
            );
        }
        $db->cerrar();
        return $col;
    }
}