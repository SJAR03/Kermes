<?php
include_once("conexion.php");

class dt_gastos extends Conexion
{
    private $myCon;

    public function listarGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_gastos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Gastos();


                $us->__SET('id_registro_gastos', $r->id_registro_gastos);
                $us->__SET('idKermesse', $r->idKermesse);
                $us->__SET('idCatGastos', $r->idCatGastos);
                $us->__SET('fechaGasto', $r->fechaGasto);
                $us->__SET('concepto', $r->concepto);
                $us->__SET('monto', $r->monto);
                $us->__SET('usuario_creacion', $r->usuario_creacion);
                $us->__SET('fecha_creacion', $r->fecha_creacion);
                $us->__SET('usuario_modificacion', $r->usuario_modificacion);
                $us->__SET('fecha_modificacion', $r->fecha_modificacion);
                $us->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $us->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $us->__SET('estado', $r->estado);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarVwGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_gastos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Gastos();

                
                $us->__SET('id_registro_gastos', $r->id_registro_gastos);
                $us->__SET('idKermesse', $r->idKermesse);
                $us->__SET('kermesse', $r->kermesse);
                $us->__SET('idCatGastos', $r->idCatGastos);
                $us->__SET('categoria_gastos', $r->categoria_gastos);
                $us->__SET('fechaGasto', $r->fechaGasto);
                $us->__SET('concepto', $r->concepto);
                $us->__SET('monto', $r->monto);
                $us->__SET('usuario_creacion', $r->usuario_creacion);
                $us->__SET('fecha_creacion', $r->fecha_creacion);
                $us->__SET('usuario_modificacion', $r->usuario_modificacion);
                $us->__SET('fecha_modificacion', $r->fecha_modificacion);
                $us->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $us->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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
