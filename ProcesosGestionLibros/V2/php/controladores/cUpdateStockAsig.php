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
            if (!$this->validarSeleccion())
                return "Las seleccion se dejó vacia";

            $objModelo = new MUpdateStockAsig();

            $objModelo->transactionUpdates();  

        }

        private function validarSeleccionIsbn(){
            // [condicion ? valor_true : valor_false]
            return !empty($this->seleccion) && !empty($this->isbn) ? true : false
        }


    }
?>