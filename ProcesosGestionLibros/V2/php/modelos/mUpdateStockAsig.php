<?php
    require_once('../config/conectar.php');

    class MUpdateStockAsig extends Conectar{
        private $stock;
        private $isbn; //Trait [Buscar Info]

        public function __construct($isbn) {
            // Llamar Constructor Padre [Conectar]
            parent::__construct();

            $this->isbn = $isbn;

            // Obtener Stock Actual
            $this->stock = $this->selectStockAct();
        }

        private function selectStockAct(){
            $consulta = "SELECT stock FROM libro WHERE isbn = :isbn";
            $cnsltPrep = $this->pdo->prepare($consulta);
            $cnsltPrep->bindParam(':isbn', $this->isbn);
            $cnsltPrep ->execute();
            return $cnsltPrep ->fetchAll(PDO::FETCH_ASSOC);
        }

        public function transactionUpdates($seleccion){
            // Transactions | Actualización libro_reserva.asignado + libro.stock
            for ($i=0; $i < count($seleccion) && $this->stock > 0; $i++) { 
                $this->pdo->beginTransaction(); 

                // Preparado Consulta | Actualización Asignado -> 1
                $updLibRes = "UPDATE reserva_libro SET asignado=1 WHERE idReserva = :seleccionI AND isbn= :isbn;";
                $cnsltPrepLibRes = $this->pdo->prepare($updLibRes);
                $cnsltPrepLibRes->bindParam(':seleccionI', $seleccion[$i]);
                $cnsltPrepLibRes->bindParam(':isbn', $this->isbn);

                // Preparado Consulta | Actualización Stock --
                $updStock = "UPDATE libro SET stock=stock-1 WHERE isbn= :isbn;";
                $cnsltPrepStock = $this->pdo->prepare($updStock);
                $cnsltPrepStock->bindParam(':isbn', $this->isbn);
                
                if ($cnsltPrepLibRes->execute() === true && $cnsltPrepStock->execute() === true) {
                    $this->pdo->commit();
                    $this->stock--;
                    $estdUpd[$seleccion[$i]] = true;
                } else{ 
                    $this->pdo->rollBack();
                    $estdUpd[$seleccion[$i]] = false;
                }
            }
            return $estdUpd;
        }

    }

?>