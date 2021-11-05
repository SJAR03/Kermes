<?php 

    include_once("Conexion.php");
    class Dt_TasaCambio extends Conexion {
        public function listarTasas() {
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
    }

?>