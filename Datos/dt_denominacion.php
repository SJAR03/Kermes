<?php 

    include_once("Conexion.php");
    class Dt_Denominacion extends Conexion {
        public function listarDenominaciones() {
            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM vwDenominacion";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $den = new VwDenominacion();

                    $den->__SET('id', $r->id_Denominacion);
                    $den->__SET('nombre', $r->nombre);
                    $den->__SET('valor', $r->valor);
                    $den->__SET('valor_letras', $r->valor_letras);
                    $den->__SET('estado', $r->estado);

                    $result[] = $den;
                }

                $this->myCon = parent::desconectar();
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

?>