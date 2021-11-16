<?php

class Vw_Ingreso_Comunidad
{
    //Atributos
    private $id_ingreso_comunidad;
    private $kermesse;
    private $comunidad;
    private $producto;
    private $cant_productos;
    private $nom_bono;
    private $denominacion;
    private $cantidad;
    private $subtotal_bono;
    private $total_bonos;
    private $usuario_creacion;
    private $fecha_creacion;
    

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