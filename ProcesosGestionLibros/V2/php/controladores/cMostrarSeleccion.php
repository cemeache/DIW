<?php
    require_once('../modelos/mMostrarSeleccion.php');

    class CMostrarSeleccion{ 
        private $isbn;

        public function __construct($isbn) {
            $this->isbn = $isbn;
        }

        public function validarResultSelect() {
            $datos = $this->recibirResultado();
            if (!empty($datos))
                return $datos;
            // Devolver un array vacío si no hay datos
            return []; 
        }
    
        private function recibirResultado() {
            $objMmostrSelect = new MmostrarSeleccion();
            $datos = $objMmostrSelect->selectCampos($this->isbn);
            // Devolver un array vacío si $datos es null [condicion ? valor_true : valor_false]
            return $datos ? $datos : []; 
        }
    }
?>