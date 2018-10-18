<?php 
//require "./BACKEND/validarSesion.php";
// require_once('./BACKEND/Clases/fabrica.php');
require "validarSesion.php";
require "Clases/fabrica.php";
if(isset( $_POST['hidModificar'])){
        $dni = $_POST['hidModificar'];
        $nuevaFabrica = new Fabrica("Panaderia", 7);
        $nuevaFabrica->TraerDeArchivo("Archivos/empleados.txt", true);
        $arrayEmpleados = $nuevaFabrica->GetEmpleados();
 

    }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="utnLogo.png" rel="icon" type="image/png" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 – Formulario Alta Empleado</title>
    <script src="./.././Javascript/funciones.js"></script>
</head>
<body>
    <h2 id='tituloForm'>Alta de Empleados</h2>

    <form action="administracion.php" method="POST" onsubmit='return AdministrarValidaciones()'   enctype='multipart/form-data'>
    <input type="hidden" id="hdnModificar" name="hdnModificar" >	 
        <table align="center">
            <tr>
                <td>
                    <h4>Datos Personales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr /></td>
            </tr>
            <tr>
                <td> <label for="">DNI: </label></td>
                <td> <input type="number" id="txtDni" name="txtDni" min="1000000" max="55000000">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td><label for="">Apellido: </label></td>
                <td><input type="text" id="txtApellido" name="txtApellido">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td><label for="">Nombre: </label></td>
                <td><input type="text" id="txtNombre" name="txtNombre">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td><label>Sexo</label></td>
                <td><select name="cboSelect" id="cboSelect">
                    <option value="---" selected>Seleccione</option>
                    <option value="F" >Femenino</option>
                    <option value="M">Masculino</option>
                </select>
                <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td>
                    <h4>Datos Laboorales</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr /></td>
            </tr>
            <tr>
                <td> <label for="">Legajo: </label></td>
                <td> <input type="number" id="txtLegajo" name="txtLegajo" min="100" max="550">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td><label for="">Sueldo: </label></td>
                <td><input type="number" id="txtSueldo" name="txtSueldo" min="8000">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td><label for="">Turno:</label></td>
                <td>
                    <input type="radio" name="rdoTurno" value="Mañana" id='rdoTurnoMañana' checked>Mañana<br>
                    <input type="radio" name="rdoTurno" value="Tarde" id='rdoTurnoTarde'>Tarde<br>
                    <input type="radio" name="rdoTurno" value="Noche" id='rdoTurnoNoche'>Noche<br>
                </td>
            </tr>
            <tr>
                <td><label>Foto:</label></td>
                <td>
                    <input type="file" id="foto" name="foto">
                    <span style="display:none">*</span></td>
            </tr>
            <tr>
                <td colspan="2"><hr /></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" value="Enviar" id='btnEnviar' ></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="reset" value="Limpiar" ></td>
            </tr>
            <tr>
                <td>
                <a href='cerrarSesion.php'>Cerrar Sesion</a>
                </td>
            </tr>
        </table>
    </form>
  
<?php

if(isset($dni))
        {
            
            foreach ($arrayEmpleados as $empleado) 
            {
                if ($empleado->GetDni() == $dni) 
                {
                    $apellido = $empleado->GetApellido();
                    $nombre = $empleado->GetNombre();
                    $sexo = $empleado->GetSexo();
                    $legajo = $empleado->GetLegajo();
                    $sueldo = $empleado->GetSueldo();
                    $turno = $empleado->GetTurno();
                    $pathFoto = $empleado->GetPathFoto();
                    echo "<script>  ModificarEmpleado('".$dni."', '".$apellido."','".$nombre."','".$sexo."','".$legajo."','".$sueldo."','".$turno."','".$pathFoto."');</script>";            
                }
            }
          
        }

?>
</body>
</html>
