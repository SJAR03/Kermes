<?php

class Vw_Usuario
{
    //Atributos
    private $id_usuario;
    private $usuario;
    private $nombres;
    private $apellidos;
    private $email;
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
