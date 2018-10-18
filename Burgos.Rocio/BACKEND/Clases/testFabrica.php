<?php
require_once "./fabrica.php";

echo "Creando Panaderia...<br>";
$panaderia= new Fabrica("Panaderia Inc.");

echo "Creando empleados...<br>";
echo "*************************************************************";
//$nombre,$apellido,$dni,$sexo,$sueldo,$legajo,$turno){
$empleadoUno= new Empleado("Ricardo","Boss",2020,"m",2000,1,"mañana");
$empleadoDos= new Empleado("Marcos","Grey",2021,"m",2000,2,"mañana");
$empleadoTres= new Empleado("Juana","Every",2022,"f",2000,3,"mañana");
$empleadoCuatro= new Empleado("Maria","Torres",2023,"f",2000,4,"tarde");
$empleadoCinco= new Empleado("Cali","Piot",2024,"f",2000,5,"tarde");

echo "<br><br>Agregando empleados...";

$panaderia->AgregarEmpleado($empleadoUno);
$panaderia->AgregarEmpleado($empleadoDos);
$panaderia->AgregarEmpleado($empleadoTres);
$panaderia->AgregarEmpleado($empleadoCuatro);
$panaderia->AgregarEmpleado($empleadoCinco);
echo "100%<br>";

echo $panaderia->ToString();
echo "<br><br>Intento de agregar el 6to...<br>";
if( !$panaderia->AgregarEmpleado($empleadoUno)){
    echo "No se pudo agregar el 6to.<br>";
}
echo "*************************************************************";
echo "<br><br>Calculando sueldos<br>";
echo  "Total: $". $panaderia->CalcularSueldos();
echo "<br>*************************************************************";
echo "<br><br>Eliminando empleado 5(CALI)...";
if($panaderia->EliminarEmpleado($empleadoCinco)){
    echo "100%<br>Mostrando despues de borrar<br><br>";
    echo  $panaderia->ToString();
}
echo "<br>*************************************************************";

echo "<br><br>Agrego uno repetido (Boss) ...";
if($panaderia->AgregarEmpleado($empleadoUno)){
    echo "100%<br>Mostrando (no debe haber uno repetido)<br>";
    echo $panaderia->ToString();
}

echo "*************************************************************";

?>