<?php 

    include_once("Conexion.php");
    class Dt_Moneda extends Conexion {
        public function listarMoneda() {
            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM tbl_moneda";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $moneda = new Moneda();

                    $moneda->__SET('id', $r->id_moneda);
                    $moneda->__SET('nombre', $r->nombre);
                    $moneda->__SET('simbolo', $r->simbolo);
                    $moneda->__SET('estado', $r->estado);

                    $result[] = $moneda;
                }

                $this->myCon = parent::desconectar();
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

?>