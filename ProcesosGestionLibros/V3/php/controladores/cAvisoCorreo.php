<?php

    require_once('../modelos/mAvisoCorreo.php');

    class CAvisoCorreo{
        private $header;
        private $asunto;
        private $mnsjReser;
        private $mnsjTutor;
        private $listaAsig;

        public function __construct($listaAsig) {
            $this->header = 'From: celiamorunoherrojo.guadalupe@alumnado.fundacionloyola.net'."\r\n". // From -> Quien Envia
                'Reply-To: escuelavirgendeguadalupe@fundacionloyola.es'."\r\n". // Reply-To -> A quién hay que responder
                'X-Mailer: PHP/'.phpversion(); // X-Mailer -> Software Utilizado para generar el correo
            $this->asunto = 'Reserva de Libros';
            $this->listaAsig = $listaAsig; //Array con alumnos a los que se les acaba de asignar libros
        }

        public function enviarCorreo($isbn){
            $resultMail = [];
            foreach ($this->listaAsig as $idReserva => $asig) {
                $datos = $this->vCorreos($idReserva);
                if(!is_array($datos))
                    return $datos;
                else{
                    foreach ($datos as $dato) {
                        $this->prepararMnsjs($isbn, $dato['nombre'].' '.$dato['apellidos']);
                        //@mail suprime los errores de mail
                        $resultMail[$idReserva][0] = @mail($dato['correo'], $this->asunto, $this->mnsjReser, $this->header) ? true : false;
                        $resultMail[$idReserva][1] = @mail($dato['correoTutor'], $this->asunto, $this->mnsjTutor, $this->header) ? true : false;
                    }
                }
            }
            return $resultMail;
        }
        
        private function prepararMnsjs($isbn,$nombre){
            $this->mnsjReser = 'Su libro con ISBN: '.$isbn.' está listo para su recogida.';            
            $this->mnsjTutor = 'El alumno '.$nombre.' tiene en el punto de recogida el libro con ISBN: '.$isbn.'.';            
        }

        private function vCorreos($idReserva){
            $objModelo = new MAvisoCorreo();
            $datos = $objModelo->selectCorreos($idReserva);

            return !empty($datos) ? $datos : "No se pudo obtener los correos";
        }

    }
?>