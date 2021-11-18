<?php
    include_once("Conexion.php");

    class Dt_Moneda extends Conexion {
        public function listarMoneda()
        {
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

        public function listarMonedaId()
        {
            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT id_moneda FROM tbl_moneda";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $moneda = new Moneda();

                    $moneda->__SET('id', $r->id_moneda);
                    
                    $result[] = $r;
                }

                $this->myCon = parent::desconectar();
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrarMoneda(Moneda $m)
        {
            try
            {
                $this->myCon = parent::conectar();
                $query = "INSERT INTO tbl_moneda (nombre, simbolo, estado) VALUES (?, ?, 1)";
                $this->myCon->prepare($query)->execute(array(
                    $m->__GET('nombre'),
                    $m->__GET('simbolo')
                ));
                $this->myCon = parent::desconectar();
            } catch (Exception $e)
            {
                die($e->getMessage());
            }

        }
    }
?>
