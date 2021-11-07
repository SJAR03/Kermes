<?php

class ArqueoDetalle {
    private $idArqueoCajaDet;
    private $id_ArqueoCaja;
    private $moneda;
    private $valorDenominacion;
    private $cantidad;
    private $subtotal;

    public function __GET($k){return $this->$k;}
    public function __SET($k, $v){return $this->$k = $v;}
}
