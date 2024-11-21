
<?php
    require_once('../config/conectar.php');

    class BaseModel {
        protected $isbn;

        public function __construct($isbn) {
            $this->isbn = $isbn;
        }
    }

    class MUpdateStockAsig extends BaseModel {
        private $stock;

        public function __construct($isbn) {
            // Llamar Constructor Padre [BaseModel]
            parent::__construct($isbn);

            // Obtener Stock Actual
            $this->selectStockAct($isbn);
        }

        private function selectStockAct($isbn){

        }

        public function transactionUpdates(){
            // Transactions | Actualización libro_reserva.asignado + libro.stock
            for ($i=0; $i < count($_POST["seleccionados"]) && $stock > 0; $i++) { 
                $mysqli->begin_transaction();
                $updLibRes = "UPDATE reserva_libro SET asignado=1 WHERE idReserva = ".$_POST['seleccionados'][$i]." AND isbn= '".$isbn."';";
                $updStock = "UPDATE libro SET stock=stock-1 WHERE isbn= '".$isbn."';";
                
                if ($mysqli->query($updLibRes) === true && $mysqli->query($updStock) === true) {
                    $mysqli->commit();
                    $stock--;
                    $estdUpd[$_POST['seleccionados'][$i]] = true;
                } else{ 
                    $mysqli->rollback();
                    $estdUpd[$_POST['seleccionados'][$i]] = false;
                }
            }
        }

    }

?>