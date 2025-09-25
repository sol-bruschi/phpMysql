<?php
include_once("../../Control/auto.php");
include_once("../../Control/persona.php");    

$objAuto = new AutoControl();
$objPersona = new PersonaControl();

$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
$resultado = "";
$exito = false;

switch ($accion) {
    case "buscarAuto":
        $patente = trim($_POST['patente'] ?? "");
        if ($patente === "") {
            $resultado = "No se ingresó ninguna patente.";
        } else {
            $auto = $objAuto->buscarAuto($patente);
            if ($auto) {
                $dueño = $objPersona->buscarPersona($auto->getDniDuenio());
                $resultado = "Auto: {$auto->getPatente()} - {$auto->getMarca()} {$auto->getModelo()}<br>Dueño: " .
                             ($dueño ? $dueño->getNombre() . " " . $dueño->getApellido() : "Desconocido");
                $exito = true;
            } else {
                $resultado = "No se encontró ningún auto con esa patente.";
            }
        }
        break;

    case "registrarPersona":
        $nroDni = trim($_POST['nroDni'] ?? "");
        $apellido = trim($_POST['apellido'] ?? "");
        $nombre = trim($_POST['nombre'] ?? "");
        $fechaNac = trim($_POST['fechaNac'] ?? "");
        $telefono = trim($_POST['telefono'] ?? "");
        $domicilio = trim($_POST['domicilio'] ?? "");
        if ($nroDni && $apellido && $nombre && $fechaNac && $telefono && $domicilio) {
            $exito = $objPersona->agregarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            $resultado = $exito ? "Persona registrada correctamente." : "No se pudo registrar la persona.";
        } else {
            $resultado = "Todos los campos son obligatorios.";
        }
        break;

    case "registrarAuto":
        $patente = trim($_POST['patente'] ?? "");
        $marca = trim($_POST['marca'] ?? "");
        $modelo = trim($_POST['modelo'] ?? "");
        $dniDuenio = trim($_POST['dniDuenio'] ?? "");
        if ($patente && $marca && $modelo && $dniDuenio) {
            $dueño = $objPersona->buscarPersona($dniDuenio);
            if ($dueño) {
                $exito = $objAuto->agregarAuto($patente, $marca, $modelo, $dniDuenio);
                $resultado = $exito ? "Auto registrado correctamente." : "No se pudo registrar el auto (patente repetida).";
            } else {
                $resultado = "El dueño no existe. Registre primero a la persona.";
            }
        } else {
            $resultado = "Todos los campos son obligatorios.";
        }
        break;

    case "cambiarDuenio":
        $patente = trim($_POST['patente'] ?? "");
        $dniNuevo = trim($_POST['dniDuenio'] ?? "");
        if ($patente && $dniNuevo) {
            $auto = $objAuto->buscarAuto($patente);
            $persona = $objPersona->buscarPersona($dniNuevo);
            if ($auto && $persona) {
                $exito = $objAuto->cambiarDuenio($patente, $dniNuevo);
                $resultado = $exito ? "Dueño cambiado correctamente." : "No se pudo cambiar el dueño.";
            } else {
                $resultado = "Auto o persona no encontrados.";
            }
        } else {
            $resultado = "Todos los campos son obligatorios.";
        }
        break;

    case "actualizarPersona":
        $nroDni = trim($_POST['nroDni'] ?? "");
        $apellido = trim($_POST['apellido'] ?? "");
        $nombre = trim($_POST['nombre'] ?? "");
        $fechaNac = trim($_POST['fechaNac'] ?? "");
        $telefono = trim($_POST['telefono'] ?? "");
        $domicilio = trim($_POST['domicilio'] ?? "");
        if ($nroDni && $apellido && $nombre && $fechaNac && $telefono && $domicilio) {
            $exito = $objPersona->actualizarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            $resultado = $exito ? "Datos actualizados correctamente." : "No se pudo actualizar la persona.";
        } else {
            $resultado = "Todos los campos son obligatorios.";
        }
        break;

    default:
        $resultado = "Acción no reconocida.";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Resultado de la operación</h1>
    <p class="<?php echo $exito ? 'success' : 'error'; ?>">
        <?php echo $resultado; ?>
    </p>
</body>
</html>