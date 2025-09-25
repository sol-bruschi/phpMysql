<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nueva Persona</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="js/validaciones.js"></script>
    <script>
        function validarFormulario() {
            let campos = ['nroDni','apellido','nombre','fechaNac','telefono','domicilio'];
            for(let i=0; i<campos.length; i++) {
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
    <h1>Registrar Nueva Persona</h1>
<form action="formAccion.php" method="post" onsubmit="return validarNuevaPersona();">
    <input type="hidden" name="accion" value="nuevaPersona">

    <label for="nroDni">DNI:</label>
    <input type="text" id="nroDni" name="nroDni" maxlength="10">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" maxlength="50">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" maxlength="50">

    <label for="fechaNac">Fecha de Nacimiento:</label>
    <input type="date" id="fechaNac" name="fechaNac">

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" maxlength="20">

    <label for="domicilio">Domicilio:</label>
    <input type="text" id="domicilio" name="domicilio" maxlength="200">

    <input type="submit" value="Registrar">
</form>
</body>
</html>