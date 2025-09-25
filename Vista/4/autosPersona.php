<?php
include_once("/../../Control/auto.php");
include_once("/../../Control/persona.php");    

$personaCtrl = new PersonaControl();
$autoCtrl = new AutoControl();

$dni = isset($_GET['dni']) ? trim($_GET['dni']) : "";

if($dni === "") {
    echo "<p style='color:red; text-align:center;'>No se recibió ningún DNI.</p>";
    exit;
}
$persona = $personaCtrl->buscarPersona($dni);
$autos = $autoCtrl->listarAutos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autos de Persona</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<?php if($persona): ?>
    <h1>Datos de <?php echo $persona->getNombre() . " " . $persona->getApellido(); ?></h1>
    <p><strong>DNI:</strong> <?php echo $persona->getNroDni(); ?></p>
    <p><strong>Teléfono:</strong> <?php echo $persona->getTelefono(); ?></p>
    <p><strong>Domicilio:</strong> <?php echo $persona->getDomicilio(); ?></p>

    <h2>Autos asociados</h2>

    <?php
    $autosPersona = array_filter($autos, function($a) use ($dni){
        return $a->getDniDuenio() == $dni;
    });
    ?>

    <?php if(count($autosPersona) > 0): ?>
        <table>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
            </tr>
            <?php foreach($autosPersona as $auto): ?>
            <tr>
                <td><?php echo $auto->getPatente(); ?></td>
                <td><?php echo $auto->getMarca(); ?></td>
                <td><?php echo $auto->getModelo(); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="color:red;">Esta persona no tiene autos registrados.</p>
    <?php endif; ?>

<?php else: ?>
    <p style="color:red;">No se encontró ninguna persona con el DNI ingresado.</p>
<?php endif; ?>

</body>
</html>