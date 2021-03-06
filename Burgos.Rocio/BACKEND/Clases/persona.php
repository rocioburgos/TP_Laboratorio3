<?php
     abstract class Persona{
        private $_apellido;
        private $_dni;
        private $_nombre;
        private $_sexo;

         public function __construct($nombre,$apellido,$dni,$sexo){
             $this->_apellido=$apellido;
             $this->_nombre=$nombre;
             $this->_dni=$dni;
             $this->_sexo=$sexo;
        }

        public function GetApellido(){
            return $this->_apellido;
        }
        public function GetDNI(){
            return $this->_dni;
        }
        public function GetSexo(){
            return $this->_sexo;
        }
        public function GetNombre(){
            return $this->_nombre;
        }

        public abstract function Hablar($idioma);

        public function ToString(){
            return $this->_apellido."- ".$this->_nombre."- ".$this->_dni."- ".$this->_sexo;
        }
    }

?>