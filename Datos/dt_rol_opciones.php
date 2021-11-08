<?php

include_once("conexion.php");

class dt_rol_opciones extends Conexion
{
    private $myCon;

    public function listarVw_rol_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_rol_opciones();

                $vu->__SET('id_rol_opciones', $r->id_rol_opciones);
                $vu->__SET('rol', $r->rol);
                $vu->__SET('opciones', $r->opciones);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaRol_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.rol_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new rol_opciones();

                $us->__SET('id_rol_opciones', $r->id_rol_opciones);
                $us->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $us->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
