<?php
include_once("Conexion.php");

class Dt_TasaCambioDet extends Conexion
{
    public function listarTasaDetalles($id)
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vwtasacambiodet Where id_tasaCambio = {$id} AND estadoGen<>3";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tasaD = new VwTasaCambioDetalle();

                $tasaD->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $tasaD->__SET('id_tasaCambio', $r->id_tasaCambio);
                $tasaD->__SET('moneda_origen', $r->moneda_origen);
                $tasaD->__SET('moneda_cambio', $r->moneda_cambio);
                $tasaD->__SET('fecha', $r->fecha);
                $tasaD->__SET('tipo_cambio', $r->tipoCambio);
                $tasaD->__SET('estadoGen', $r->estadoGen);


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
                        tipoCambio)
                    VALUES (?, ?, ?)";

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

    public function getTasaDetById($id)
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT * from dbkermesse.tasacambio_det where id_tasaCambio_det = {$id}";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            $tc = new TasaCambio;
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tc->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
            $tc->__SET('fecha', $r->fecha);
            $tc->__SET('tipo_cambio', $r->tipoCambio);


            $this->myCon = parent::desconectar();

            return $tc;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editTasaDetalle(TasaCambioDetalle $tcd)
    {

        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tasacambio_det SET 
                        fecha = ?,
                        tipoCambio=?
                    WHERE id_tasaCambio_det =?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $tcd->__GET('fecha'),
                        $tcd->__GET('tipo_cambio'),
                        $tcd->__GET('id_tasaCambio_det')
                    )
                );



            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function desactivarTasaDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "DELETE FROM dbkermesse.tasacambio_det 
                    WHERE id_tasaCambio_det =$id";

            $this->myCon->prepare($sql)
                ->execute();

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delByTasa($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "DELETE FROM dbkermesse.tasacambio_det 
                    WHERE id_tasaCambio =$id";

            $this->myCon->prepare($sql)
                ->execute();

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countTasas($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "SELECT count(*) FROM dbkermesse.tasacambio_det where id_tasaCambio=$id";

            $stm = $this->myCon->prepare($sql);
            $stm->execute();

            $r = $stm->fetch(PDO::FETCH_COLUMN);

            $this->myCon = parent::desconectar();

            return $r;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
