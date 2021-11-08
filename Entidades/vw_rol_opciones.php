<?php

class Vw_Rol_opciones
{
    //Atributos
    private $id_rol_opciones;
    private $rol;
    private $opciones;

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
