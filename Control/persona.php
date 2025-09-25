<?php
include_once("../Modelo/persona.php");

class PersonaControl {

    public function listarPersonas() {
        return Persona::seleccionar();
    }

    public function buscarPersona($dni) {
        $personas = Persona::seleccionar($dni);
        return count($personas) > 0 ? $personas[0] : null;
    }

    public function agregarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
        $p = new Persona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
        $p->insertar();
    }

    public function modificarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
        $p = new Persona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
        $p->modificar();
    }

    public function eliminarPersona($nroDni) {
        $p = new Persona();
        $p->setNroDni($nroDni);
        $p->eliminar();
    }
}