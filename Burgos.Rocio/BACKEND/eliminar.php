<?php
require_once "./Clases/fabrica.php";

$legajo = $_GET["id"];
$existe=false;

$archivoEmpleados= fopen("./Archivos/empleados.txt","r");

    while(!feof($archivoEmpleados))
    {
        $unEmpleado= trim(fgets($archivoEmpleados));

        if(strlen($unEmpleado)>0)
        { 
            $empleado= explode("- ",$unEmpleado);
            
            $legajoFabrica= $empleado[4];
        
            if($legajo == $legajoFabrica)
            {
                    fclose($archivoEmpleados);   
                    $existe=true; 
                    break; 
            }
        }

    }

    if($existe){
         $pathFoto= $empleado[7];
        $empleadoLeido= new Empleado($empleado[1],$empleado[0],$empleado[2],$empleado[3],$empleado[5],$empleado[4],$empleado[6]);
         $empleadoLeido->SetPathFoto($pathFoto);

        $fabrica = new Fabrica("Carrefour",7);
    
        $fabrica->TraerDeArchivo("./Archivos/empleados.txt");

        if($fabrica->EliminarEmpleado($empleadoLeido))
        {
            unlink($pathFoto);
            $fabrica->GuardarEnArchivo("./Archivos/empleados.txt");
            echo "<br>Empleado eliminado exitosamente<br>"; 
        }
    }else{
        
        fclose($archivoEmpleados);
        echo "<br>No se pudo eliminar al empleado<br>";
    }

echo "<a href='mostrar.php'>Mostrar</a>";
echo "<br><a href='.././index.html'>Inicio</a>";

?>