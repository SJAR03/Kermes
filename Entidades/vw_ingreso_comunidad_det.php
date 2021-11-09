<?php

class VwIngreso_Comunidad_Det
{
    //Atributos
    private $id_ingreso_comunidad_det;
    private $cantproducto;
    private $nombono;
    private $denominacion;
    private $cantidad;
    private $subtotal_bono;

    //METODOS
    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}