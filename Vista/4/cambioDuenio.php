<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Dueño de Auto</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="js/validaciones.js"></script>
    <script>
        function validarFormulario() {
            let patente = document.getElementById("patente").value.trim();
            let dni = document.getElementById("dniDuenio").value.trim();
            if(patente === "") {
                alert("Ingrese la patente del auto.");
                return false;
            }
            if(dni === "") {
                alert("Ingrese el DNI del nuevo dueño.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Cambiar Dueño de Auto</h1>
<form action="formAccion.php" method="post" onsubmit="return validarCambioDuenio();">
    <input type="hidden" name="accion" value="cambiarDuenio">

    <label for="patente">Patente del Auto:</label>
    <input type="text" id="patente" name="patente" maxlength="10">

    <label for="dniDuenio">DNI del Nuevo Dueño:</label>
    <input type="text" id="dniDuenio" name="dniDuenio" maxlength="10">

    <input type="submit" value="Cambiar Dueño">
</form>
</body>
</html>