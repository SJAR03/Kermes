<?php 
    class VwTasaCambioDetalle {
        private $id;
        private $moneda_origen;
        private $moneda_cambio;
        private $fecha;
        private $tipo_cambio;
        private $estado;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}
    }
?>