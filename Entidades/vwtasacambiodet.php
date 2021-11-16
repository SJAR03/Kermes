<?php
class VwTasaCambioDetalle
{
    private $id_tasaCambio_det;
    private $id_tasaCambio;
    private $moneda_origen;
    private $moneda_cambio;
    private $fecha;
    private $tipoCambio;
    private $estado;

    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}
