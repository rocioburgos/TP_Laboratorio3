<?php
    require_once "persona.php";
    class Empleado extends Persona{
        protected $_legajo;
        protected $_sueldo;
        protected $_turno;
        protected $_pathFoto;

        public function __construct($nombre,$apellido,$dni,$sexo,$sueldo,$legajo,$turno){
           
            parent::__construct($nombre,$apellido,$dni,$sexo);
            $this->_legajo= $legajo;
            $this->_sueldo= $sueldo;
            $this->_turno= $turno;
        }

            public  function GetLegajo(){
                return $this->_legajo;
            }

            public  function GetTurno(){
                return $this->_turno;
            }

            public function GetSueldo(){
                return $this->_sueldo;
            }

            public function Hablar($idioma){
                $retorno="El empleado habla ";
                foreach ($idioma as $uno) {
                    $retorno.=$uno." ";
                }
                return $retorno;
            }

            public function ToString(){
               return parent::ToString()."- ".$this->_legajo."- ".$this->_sueldo."- ".$this->_turno."- ".$this->_pathFoto;
            }

            public function SetPathFoto($foto){
                $this->_pathFoto= $foto;
            }

            public function GetPathFoto(){
                 return $this->_pathFoto;
            }
    }

?>