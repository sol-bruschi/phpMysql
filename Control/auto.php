<?php
include_once("../Modelo/auto.php");

class AutoControl {

    public function listarAutos() {
        return Auto::seleccionar();
    }

    public function buscarAuto($patente) {
        $autos = Auto::seleccionar($patente);
        return count($autos) > 0 ? $autos[0] : null;
    }

    public function agregarAuto($patente, $marca, $modelo, $dniDuenio) {
        $a = new Auto($patente, $marca, $modelo, $dniDuenio);
        $a->insertar();
    }

    public function modificarAuto($patente, $marca, $modelo, $dniDuenio) {
        $a = new Auto($patente, $marca, $modelo, $dniDuenio);
        $a->modificar();
    }

    public function eliminarAuto($patente) {
        $a = new Auto();
        $a->setPatente($patente);
        $a->eliminar();
    }
}