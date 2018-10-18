<?php

//require_once "./persona.php";
require "empleado.php";
require_once "interfaces.php";

    class Fabrica implements IArchivos{
        private $_cantidadMaxima;
        private $_empleados;
        private $_razonSocial;

        public function __construct($razonSocial,$cantidad=5){
                $this->_cantidadMaxima=$cantidad;
                $this->_empleados=array();
                $this->_razonSocial=$razonSocial;

        }

        public function AgregarEmpleado($empleado){
            $retorno= false;
            $cantActual=count($this->_empleados);
            if($cantActual < $this->_cantidadMaxima){
                if(array_push($this->_empleados,$empleado)==($cantActual+1)){
                    $this->EliminarElementosRepetidos();
                    $retorno= true;
                }
            }
            
            return $retorno;
        }


        public function CalcularSueldos(){
            $sueldoTotal=0.00;
            foreach ($this->_empleados as $empleado) {
                $sueldoTotal+=$empleado->GetSueldo();
            }

            return $sueldoTotal;
        }

        public function EliminarEmpleado($empleado)
        {
            $index=array_search($empleado,$this->_empleados);
            if($index!==false)
            {
                unset($this->_empleados[$index]);
                return true;
            }
            return false;
        }
        
        private function EliminarElementosRepetidos(){
            $this->_empleados= array_unique($this->_empleados,SORT_REGULAR);

        }

        public function ToString(){
            $datosEmpresa="Nombre: ".$this->_razonSocial."<br>Empleados:<br>";
            foreach ($this->_empleados as $empleado) {
                $datosEmpresa.=$empleado->ToString()."<br>";
            }

            return $datosEmpresa;
        }



        
        public function TraerDeArchivo($nombreArchivo)
        {
           
            $archivoEmpleados=fopen($nombreArchivo,'r');
            
            while(!feof($archivoEmpleados))
            {
                $unEmpleado= trim(fgets($archivoEmpleados));

                if(strlen($unEmpleado)>0)
                { 
                     $empleado= explode("- ",$unEmpleado);
                                        //($nombre,$apellido,$dni,$sexo,$sueldo,$legajo,$turno){
                    $empleadoLeido= new Empleado($empleado[1],$empleado[0],$empleado[2],$empleado[3],$empleado[5],$empleado[4],$empleado[6]);
                    $empleadoLeido->SetPathFoto($empleado[7]);
                  
                    $this->AgregarEmpleado($empleadoLeido);
                }   
            }
            fclose($archivoEmpleados);
        }

        public function GuardarEnArchivo($nombreArchivo)
        {
            //"BACKEND/Archivos/empleados.txt"
            $archivo= fopen($nombreArchivo,"w");
          
            foreach($this->_empleados as $empleado)
            {
                fwrite($archivo,$empleado->ToString()."\r\n");
            }

            fclose($archivo);
        }

        public function GetEmpleados(){
            return $this->_empleados;
        }

    }


?>