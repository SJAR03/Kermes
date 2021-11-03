<?php

class Vw_Productos
{
    //Atributos
    private $id_producto;
    private $id_comunidad;
    private $comunidad;
    private $id_cat_producto;
    private $categoria;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $preciov_sugerido;
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
