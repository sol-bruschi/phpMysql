<?php
include_once("/../../Control/auto.php");
include_once("/../../Control/persona.php");    

$personaCtrl = new PersonaControl();
$autosCtrl = new AutoControl();

$personas = $personaCtrl->listarPersonas(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="js/validaciones.js"></script>
</head>
<body>
    <h1>Lista de Personas</h1>

    <?php if(count($personas) > 0): ?>
        <table>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
            <?php foreach($personas as $persona): ?>
            <tr>
                <td><?php echo $persona->getNroDni(); ?></td>
                <td><?php echo $persona->getNombre(); ?></td>
                <td><?php echo $persona->getApellido(); ?></td>
                <td>
                    <a href="autosPersona.php?dni=<?php echo $persona->getNroDni(); ?>">Ver Autos</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center; color:red;">No hay personas cargadas en la base de datos.</p>
    <?php endif; ?>
</body>
</html>