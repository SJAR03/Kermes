<?php

include_once("conexion.php");

class dt_rol extends Conexion
{
    private $myCon;

    public function listarVw_Rol()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vro = new Vw_Rol();

                $vro->__SET('id_rol', $r->id_rol);
                $vro->__SET('rol_descripcion', $r->rol_descripcion);
                $vro->__SET('estado', $r->estado);

                $result[] = $vro;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaRol()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $ro = new rol();

                $ro->__SET('id_rol', $r->id_rol);
                $ro->__SET('rol_descripcion', $r->rol_descripcion);
                $ro->__SET('estado', $r->estado);

                $result[] = $ro;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
