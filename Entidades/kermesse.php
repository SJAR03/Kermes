<?php

class Kermesse
{
    //Atributos
    private $id_kermesse;
    private $idParroquia;
    private $fInicio;
    private $fFinal;
    private $descripcion;
    private $estado;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;

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