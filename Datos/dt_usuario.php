<?php

include_once("conexion.php");

class dt_usuario extends Conexion
{
    private $myCon;

    public function listarVw_Usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_usuario";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_Usuario();

                $vu->__SET('id_usuario', $r->id_usuario);
                $vu->__SET('usuario', $r->usuario);
                $vu->__SET('pwd', $r->pwd);
                $vu->__SET('nombres', $r->nombres);
                $vu->__SET('apellidos', $r->apellidos);
                $vu->__SET('email', $r->email);
                $vu->__SET('estado', $r->estado);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaUsu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuarios";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new usuario();

                $us->__SET('id_usuario', $r->id_usuario);
                $us->__SET('usuario', $r->usuario);
                $us->__SET('pwd', $r->pwd);
                $us->__SET('nombres', $r->nombres);
                $us->__SET('apellidos', $r->apellidos);
                $us->__SET('email', $r->email);
                $us->__SET('estado', $r->estado);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
