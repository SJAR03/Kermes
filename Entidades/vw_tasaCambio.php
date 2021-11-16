<?php 
    class VwTasaCambio {
        private $id;
        private $origen;
        private $cambio;
        private $mes;
        private $year;
        private $estado;

        public function __GET($k){return $this->$k;}
        public function __SET($k, $v){return $this->$k = $v;}
    }
