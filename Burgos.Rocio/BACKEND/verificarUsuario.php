<?php

session_start();
$dni= $_POST["txtDni"];
$apellido= $_POST["txtApellido"];
$existe=false;
$archivo= fopen("./Archivos/empleados.txt","r");

while(!feof($archivo)){
        $unEmpleado= trim(fgets($archivo));

        if(strlen($unEmpleado)>0)
        {
            $empleado= explode("- ",$unEmpleado);
            $empleadoDni= $empleado[2];
            $empleadoApellido= $empleado[0];

            echo "dni ".$empleadoDni."<br>";
            echo "apellido  ".$empleadoApellido."<br>";
            
            if($empleadoDni=== $dni && $empleadoApellido===$apellido)
            {
            
                //Establecer variable de sesion.
              
                $_SESSION["DNIempleado"] = $dni;
                
                $existe=true;
                header("Location: ./mostrar.php");
            }
        }   
}
fclose($archivo);

if(!$existe){

    echo "No existe el empleado";
    echo "<br><a href='./../login.html'>Login</a>";


}



?>