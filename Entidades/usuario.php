<?php

class usuario
{
    private $id_usuario;
    private $usuario;
    private $password;
    private $pwd;
    private $nombre;
    private $apellido;
    private $email;
    private $estado;

    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }
}
