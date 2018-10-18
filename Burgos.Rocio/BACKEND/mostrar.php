<?php

require "./Clases/fabrica.php";
require "./validarSesion.php";


echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>   
  <title>HTML 5 – Listado de Empleados </title>
  
        <h2>Listado de Empleados</h2>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script language='JavaScript' type='text/javascript' src='./.././Javascript/funciones.js'></script>
</head>";

echo "<body><table align='center'>
    <form action='./index.php' method='POST' id='frmModificar'>
      <input type='hidden' id='hidModificar' name='hidModificar'>
    </form>
          <tr>
            <td>
              <h2>Info</h2>
            </td>
          </tr>
          <tr><td colspan='10'><hr></td></tr>          
          ";

$archivoEmpleados=fopen("./Archivos/empleados.txt",'r');

while(!feof($archivoEmpleados))
{
    $unEmpleado= trim(fgets($archivoEmpleados));

    if(strlen($unEmpleado)>0)
    { 
       $empleado= explode("- ",$unEmpleado);
      
        $empleadoLeido= new Empleado($empleado[1],$empleado[0],$empleado[2],$empleado[3],$empleado[5],$empleado[4],$empleado[6]);
        $empleadoLeido->SetPathFoto($empleado[7]);
        $foto=$empleadoLeido->GetPathFoto();
       
        echo "<br><br>";
        echo "<tr>
              <td>";
                echo  $empleadoLeido->ToString();
                
        echo" 
              </td>
              <td> <img src='". $foto ."' style='width:90px;height:90px;'></td>
              <td><a href='eliminar.php?id=".$empleadoLeido->GetLegajo()."'>Eliminar</a></td>
              <td><input type='button' value='Modificar' onclick='AdministrarModificar(".$empleadoLeido->GetDNI().")'></td>
          ";
            
              
    }
}
fclose($archivoEmpleados);

echo " <tr><td colspan='10'><hr></td></tr>    
      </table>
  <br><a href='./index.php'>Alta empleados</a>
  <br><a href='./cerrarSesion.php'>Cerrar Sesion</a>";
echo "</body>
</html>";
?> 