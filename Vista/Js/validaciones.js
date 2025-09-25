function validarBuscarAuto() {
    let patente = document.getElementById("patente").value.trim();
    if (patente === "") {
        alert("Debe ingresar la patente del auto.");
        return false;
    }
    return true;
}

function validarBuscarPersona() {
    let nroDni = document.getElementById('nroDni').value.trim();
    if (nroDni === '') {
        alert('Por favor ingrese un número de documento.');
        return false;
    }
    if (!/^\d+$/.test(nroDni)) {
        alert('El número de documento debe contener solo números.');
        return false;
    }
    return true;
}

function validarNuevaPersona() {
    let campos = ["nroDni", "apellido", "nombre", "fechaNac", "telefono", "domicilio"];
    for (let i = 0; i < campos.length; i++) {
        let valor = document.getElementById(campos[i]).value.trim();
        if (valor === "") {
            alert("Por favor complete el campo: " + campos[i]);
            return false;
        }
    }
    return true;
}

function validarNuevoAuto() {
    let campos = ["patente", "marca", "modelo", "dniDuenio"];
    for (let i = 0; i < campos.length; i++) {
        let valor = document.getElementById(campos[i]).value.trim();
        if (valor === "") {
            alert("Por favor complete el campo: " + campos[i]);
            return false;
        }
    }
    let modelo = parseInt(document.getElementById("modelo").value);
    if (isNaN(modelo) || modelo < 1900 || modelo > 2099) {
        alert("El año del modelo debe estar entre 1900 y 2099.");
        return false;
    }
    return true;
}

function validarCambioDuenio() {
    let patente = document.getElementById("patente").value.trim();
    let dni = document.getElementById("dniDuenio").value.trim();
    if (patente === "" || dni === "") {
        alert("Debe completar ambos campos: patente y DNI del nuevo dueño.");
        return false;
    }
    return true;
}

function validarActualizarPersona() {
    let campos = ["apellido", "nombre", "fechaNac", "telefono", "domicilio"];
    for (let i = 0; i < campos.length; i++) {
        let valor = document.getElementById(campos[i]).value.trim();
        if (valor === "") {
            alert("Por favor complete el campo: " + campos[i]);
            return false;
        }
    }
    return true;
}