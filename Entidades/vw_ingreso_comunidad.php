<?php

class Vw_Ingreso_Comunidad
{
    //Atributos
    private $id_ingreso_comunidad;
    private $kermesse;
    private $comunidad;
    private $producto;
    private $cant_productos;
    private $total_bonos;
    private $fecha_creacion;
    private $fecha_modificacion;
    private $fecha_eliminacion;

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