<?php

include_once("conexion.php");

class dt_opciones extends Conexion
{
    private $myCon;

    public function listarVw_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vo = new Vw_Opciones();

                $vo->__SET('id_opciones', $r->id_opciones);
                $vo->__SET('opcion_descripcion', $r->opcion_descripcion);
                $vo->__SET('estado', $r->estado);

                $result[] = $vo;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaOpc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $op = new opciones();

                $op->__SET('id_opciones', $r->id_opciones);
                $op->__SET('opcion_descripcion', $r->opcion_descripcion);
                $op->__SET('estado', $r->estado);

                $result[] = $op;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
