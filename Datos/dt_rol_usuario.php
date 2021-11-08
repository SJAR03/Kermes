<?php

include_once("conexion.php");

class dt_rol_usuario extends Conexion
{
    private $myCon;

    public function listarVw_rol_usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_usuario";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_rol_usuario();

                $vu->__SET('id_rol_usuario', $r->id_rol_usuario);
                $vu->__SET('usuario', $r->usuario);
                $vu->__SET('rol', $r->rol);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaRol_usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol_usuario";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new rol_usuario();

                $us->__SET('id_rol_usuario', $r->id_rol_usuario);
                $us->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                $us->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
