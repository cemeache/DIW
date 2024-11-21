<?php
    require_once ('../modelos/mUpdateStockAsig.php');

    class CUpdateStockAsig{
        private $seleccion;
        private $isbn;

        public function __construct($seleccionados = '', $isbn = ''){
            $this->seleccion = $seleccionados;
            $this->isbn = $isbn;
        }

        public function validarTransactionUpdates(){
            if (!$this->validarSeleccionIsbn())
                return "Las selección se dejó vacia";

            $objModelo = new MUpdateStockAsig($this->isbn);

            $datos = $objModelo->transactionUpdates($this->seleccion);  

            return !empty($datos) ? $datos : "No hay Stock";
        }

        private function validarSeleccionIsbn(){
            // [condicion ? valor_true : valor_false]
            return !empty($this->seleccion) && !empty($this->isbn) ? true : false;
        }


    }
?>