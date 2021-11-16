<?php
include_once("Conexion.php");

class Dt_TasaCambioDet extends Conexion
{
    public function listarTasaDetalles($id)
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vwtasacambiodet Where id_tasaCambio = {$id}";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tasaD = new VwTasaCambioDetalle();

                $tasaD->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
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

    public function regTasasDet(TasaCambioDetalle $tcd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tasaCambio_det(
                        id_tasaCambio, 
                        fecha,
                        tipoCambio,
                        estado)
                    VALUES (?, ?, ?, 1)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $tcd->__GET('id_tasaCambio'),
                    $tcd->__GET('fecha'),
                    $tcd->__GET('tipo_cambio')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
