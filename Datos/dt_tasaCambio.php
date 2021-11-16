<?php

include_once("Conexion.php");
class Dt_TasaCambio extends Conexion
{
    public function listarvwTasas()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM vwTasaCambio";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $tasa = new VwTasaCambio();

                $tasa->__SET('id', $r->id_tasaCambio);
                $tasa->__SET('origen', $r->moneda_origen);
                $tasa->__SET('cambio', $r->moneda_cambio);
                $tasa->__SET('mes', $r->mes);
                $tasa->__SET('year', $r->anio);
                $tasa->__SET('estado', $r->estado);

                $result[] = $tasa;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regTasas(TasaCambio $tc)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_tasaCambio(
                        id_monedaO, 
                        id_monedaC,
                        mes,
                        anio,
                        estado)
                VALUES (?, ?, ?, ?, 1)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $tc->__GET('id_monedaO'),
                    $tc->__GET('id_monedaC'),
                    $tc->__GET('mes'),
                    $tc->__GET('anio')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getIdTasa()
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT id_tasaCambio from dbkermesse.tbl_tasacambio Order by id_tasaCambio DESC Limit 1";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            $tc = new TasaCambio;
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tc->__SET('id_tasaCambio', $r->id_tasaCambio);
            $this->myCon = parent::desconectar();

            return $tc->__GET('id_tasaCambio');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getTasa()
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT * from dbkermesse.tbl_tasacambio Order by id_tasaCambio DESC Limit 1";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            $tc = new TasaCambio;
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tc->__SET('id_tasaCambio', $r->id_tasaCambio);
            $tc->__SET('id_monedaO', $r->id_monedaO);
            $tc->__SET('id_monedaC', $r->id_monedaC);
            $tc->__SET('mes', $r->mes);
            $tc->__SET('anio', $r->anio);
            $tc->__SET('estado', $r->estado);


            $this->myCon = parent::desconectar();

            return $tc;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
