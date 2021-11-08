<?php

class categoria_gastos
{
    private $id_categoria_gastos;
    private $nombre_categoria;
    private $descripcion;
    private $Name_exp_4;

    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}
