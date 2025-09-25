<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Auto</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="js/validaciones.js"></script>
    <script>
        function validarFormulario() {
            let campos = ['patente','marca','modelo','dniDuenio'];
            for(let i=0;i<campos.length;i++) {
                let valor = document.getElementById(campos[i]).value.trim();
                if(valor === "") {
                    alert("Por favor complete el campo: " + campos[i]);
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Registrar Nuevo Auto</h1>
<form action="formAccion.php" method="post" onsubmit="return validarNuevoAuto();">
    <input type="hidden" name="accion" value="nuevoAuto">

    <label for="patente">Patente:</label>
    <input type="text" id="patente" name="patente" maxlength="10">

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" maxlength="50">

    <label for="modelo">Modelo:</label>
    <input type="number" id="modelo" name="modelo" min="1900" max="2099">

    <label for="dniDuenio">DNI del Dueño:</label>
    <input type="text" id="dniDuenio" name="dniDuenio" maxlength="10">

    <input type="submit" value="Registrar Auto">
</form>
</body>
</html>