<?php
    require_once('../modelos/mMostrarSeleccion.php');

    class CMostrarSeleccion{ 
        private $isbn;

        public function __construct($isbn) {
            $this->isbn = $isbn;
        }

        public function validarResultSelect(){
            $datos = $this->recibirResultado();
            if(!empty($datos))
                return $datos;       
        }

        private function recibirResultado(){
            $objMmostrSelect = new MmostrarSeleccion();
            $datos = $objMmostrSelect->selectCampos($this->isbn);   
            return $datos;  
        }
    }
?>