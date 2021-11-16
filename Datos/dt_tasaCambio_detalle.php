<?php
include_once("Conexion.php");

class TasaCambioDet extends Conexion
{
    public function listarTasaDetalles($id)
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_tasacambiodet ;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tc = new TasaCambio;

                $tc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tc->__SET('moneda_origen', $r->moneda_origen);
                $tc->__SET('moneda_cambio', $r->moneda_cambio);
                $tc->__SET('fecha', $r->fecha);
                $tc->__SET('tipoCambio', $r->tipoCambio);
                $tc->__SET('estado', $r->estado);


                $result[] = $tc;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
