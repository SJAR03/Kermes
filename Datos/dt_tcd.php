<?php

include_once("Conexion.php");
class Dt_TCD extends Conexion
{
    public function listarTasaDetalles()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM vwtasacambiodet";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tasaD = new VwTasaCambioDetalle();

                $tasaD->__SET('id', $r->id_tasaCambio_det);
                $tasaD->__SET('moneda_origen', $r->moneda_origen);
                $tasaD->__SET('moneda_cambio', $r->moneda_cambio);
                $tasaD->__SET('fecha', $r->fecha);
                $tasaD->__SET('tipo_cambio', $r->tipoCambio);
                $tasaD->__SET('estado', $r->estado);

                $result[] = $tasaD;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
