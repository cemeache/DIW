<?php
    require_once('../modelos/mListarStock.php');

    class CSelectDatos{ 

        public function __construct() {
            //Vacio
        }

        public function validarResultSelect() {
            $datos = $this->recibirResultado();
            if (!empty($datos))
                return $datos;
            // Devolver un array vacío si no hay datos [Preguntar Isa]
            return []; 
        }
    
        private function recibirResultado() {
            $objMmostrSelect = new MSelectDatos();
            $datos = $objMmostrSelect->selectCampos();
            // Devolver un array vacío si $datos es null [condicion ? valor_true : valor_false]
            return $datos ? $datos : []; 
        }
    }
?>