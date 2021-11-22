<?php

class Ingreso_Comunidad
{
    //Atributos
    private $id_ingreso_comunidad;
    private $id_kermesse;
    private $id_comunidad;
    private $id_producto;
    private $cant_productos;
    private $id_ingreso_comunidad_det;
    /* private $id_ingreso_comunidad; */
    private $id_bono;
    private $denominacion;
    private $cantidad;
    private $subtotal_bono;
    private $total_bonos;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;
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