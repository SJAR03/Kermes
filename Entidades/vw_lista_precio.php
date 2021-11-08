<?php

class Vw_Lista_Precio
{
    //Atributos
    private $id_lista_precio;
    private $id_kermesse;
    private $kermess;
    private $nombre; 
    private $descripcion;
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
