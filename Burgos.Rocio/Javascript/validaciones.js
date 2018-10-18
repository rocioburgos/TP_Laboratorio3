"use strict";
function AdministrarValidaciones() {
    var DNI = parseInt(document.getElementById("txtDni").value);
    var legajo = parseInt(document.getElementById("txtLegajo").value);
    var sueldo = parseInt(document.getElementById("txtSueldo").value);
    var turno = ObtenerTurnoSeleccionado();
    var retorno = true;
    if (!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(DNI, 1000000, 55000000)) {
        AdministrarSpanErrores("txtDni", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("txtDni", false);
    }
    if (!ValidarCamposVacios("txtApellido")) {
        AdministrarSpanErrores("txtApellido", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("txtApellido", false);
    }
    if (!ValidarCamposVacios("txtNombre")) {
        AdministrarSpanErrores("txtNombre", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("txtNombre", false);
    }
    if (!ValidarCombo("cboSelect", "---")) {
        AdministrarSpanErrores("cboSelect", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("cboSelect", false);
    }
    if (!ValidarCamposVacios("txtLegajo") || !ValidarRangoNumerico(legajo, 100, 550)) {
        AdministrarSpanErrores("txtLegajo", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("txtLegajo", false);
    }
    if (!ValidarCamposVacios("txtSueldo") || !ValidarRangoNumerico(sueldo, 8000, 25000) || sueldo > ObtenerSueldoMaximo(turno)) {
        AdministrarSpanErrores("txtSueldo", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("txtSueldo", false);
    }
    if (!ValidarCamposVacios("foto")) {
        AdministrarSpanErrores("foto", true);
        retorno = false;
    }
    else {
        AdministrarSpanErrores("foto", false);
    }
    return retorno;
}
function ValidarCamposVacios(idCampo) {
    var campo = document.getElementById(idCampo);
    if (campo.value == null || campo.value.length == 0) {
        return false;
    }
    return true;
}
function ValidarRangoNumerico(campo, minimo, maximo) {
    var retorno = false;
    if (campo >= minimo && campo <= maximo) {
        retorno = true;
    }
    return retorno;
}
function ValidarCombo(idCampo, noPermitido) {
    var retorno = true;
    var campo = document.getElementById(idCampo).value;
    if (campo === noPermitido) {
        retorno = false;
    }
    return retorno;
}
function ObtenerTurnoSeleccionado() {
    var retono = "";
    var turno = (document.getElementsByName("rdoTurno"));
    //me devulve un array, con losvalores del grupo de radio buttons
    for (var i = 0; i < turno.length; i++) {
        if (turno[i].checked) {
            retono = turno[i].value;
        }
    }
    return retono;
}
function ObtenerSueldoMaximo(turnoElegido) {
    var retorno;
    if (turnoElegido === "Mañana") {
        retorno = 20000;
    }
    else if (turnoElegido === "Tarde") {
        retorno = 18500;
    }
    else {
        retorno = 25000;
    }
    return retorno;
}
/********************************************************************************************/
function AdministrarValidacionesLogin() {
    var DNI = parseInt(document.getElementById("txtDni").value);
    if (!ValidarCamposVacios("txtDni") || !ValidarRangoNumerico(DNI, 1000000, 55000000)) {
        AdministrarSpanErrores("txtDni", true);
    }
    else {
        AdministrarSpanErrores("txtDni", false);
    }
    if (!ValidarCamposVacios("txtApellido")) {
        AdministrarSpanErrores("txtApellido", true);
    }
    else {
        AdministrarSpanErrores("txtApellido", false);
    }
    return VerificarValidacionesLogin();
}
function VerificarValidacionesLogin() {
    var boolRetorno = true;
    var todoSpan = document.querySelectorAll("span");
    for (var i = 0; i < todoSpan.length; i++) {
        if (todoSpan[i].style.display == "block") {
            boolRetorno = false;
            break;
        }
    }
    return boolRetorno;
}
function AdministrarSpanErrores(id, mostrar) {
    if (mostrar) {
        document.getElementById(id).nextElementSibling.style.display = "block";
    }
    else {
        document.getElementById(id).nextElementSibling.style.display = "none";
    }
}
/************************************************************************************/
function AdministrarModificar(dniEmpleado) {
    document.getElementById("hidModificar").value = dniEmpleado;
    document.getElementById("frmModificar").submit();
}
function ModificarEmpleado(dni, apellido, nombre, sexo, legajo, sueldo, turno, foto) {
    var turnoSeleccionado = turno;
    var sexoSeleccionado = 0;
    switch (sexo) {
        case "M":
            sexoSeleccionado = 2;
            break;
        case "F":
            sexoSeleccionado = 1;
            break;
    }
    switch (turno) {
        case "Mañana":
            turnoSeleccionado = "rdoTurnoMañana";
            break;
        case "Tarde":
            turnoSeleccionado = "rdoTurnoTarde";
            break;
        case "Noche":
            turnoSeleccionado = "rdoTurnoNoche";
            break;
    }
    document.title = "HTML5 Formulario Modificar Empleado";
    document.getElementById("tituloForm").innerHTML = "Modificar Empleado";
    document.getElementById("btnEnviar").value = "Modificar";
    document.getElementById("txtDni").value = dni;
    document.getElementById("txtDni").readOnly = true;
    document.getElementById("txtApellido").value = apellido;
    document.getElementById("txtNombre").value = nombre;
    document.getElementById("cboSelect").selectedIndex = sexoSeleccionado;
    document.getElementById("txtLegajo").value = legajo;
    document.getElementById("txtLegajo").readOnly = true;
    document.getElementById("txtSueldo").value = sueldo;
    document.getElementById("hdnModificar").value = dni;
    document.getElementById(turnoSeleccionado).checked = true;
    document.getElementById("foto").value = foto;
}
//# sourceMappingURL=validaciones.js.map