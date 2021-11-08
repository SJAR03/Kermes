<?php

class Vw_Rol_usuario
{
    //Atributos
    private $id_rol_usuario;
    private $usuario;
    private $rol;

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
