<?php

class Vw_Categoria_Producto
{
    //Atributos
    private $id_categoria_producto;
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
