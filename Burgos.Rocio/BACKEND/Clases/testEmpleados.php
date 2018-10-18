<?php
/*Testear las clases empleado y persona de la parte 1 */
require "./persona.php";
require "./empleado.php";
               
    $empleado= new Empleado("marcos","ruiz",4095,"f",20000,1,"tarde");
    $idiomas=array("Ingles","Frances");
    echo "HABLAR     ".  $empleado->Hablar($idiomas)."<br>";
    echo "TO STRING ". $empleado->ToString();

    echo "<br>GET APELLIDO ". $empleado->GetApellido();
    echo "<br>GET NOMBRE ". $empleado->GetNombre();
    echo "<br>GET DNI ". $empleado->GetDNI();
    echo "<br>GET SEXO ". $empleado->GetSexo();

    echo "<br>GET SUELDO ". $empleado->GetSueldo();
    echo "<br>GET LEGAJO ". $empleado->GetLegajo();
    echo "<br>GET TURNO ". $empleado->GetTurno();





?>