<?php

class Control_Bonos
{
    //Atributos
    private $id_bono;
    private $nombre;
    private $valor;
    private $estado;

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