<?php

class Vw_ListaPrecio_Det
{
    //Atributos
    private $id_listaprecio_det;
    private $id_lista_precio;
    private $lista_precio;
    private $id_producto; 
    private $Producto;
    private $precio_venta;

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
