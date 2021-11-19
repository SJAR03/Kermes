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

        public function getMoneda($id)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_moneda WHERE id_moneda = ?";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                $r = $stm->fetch(PDO::FETCH_OBJ);
                $m = new Moneda();

                $m->__SET('id', $r->id_moneda);
                $m->__SET('nombre', $r->nombre);
                $m->__SET('simbolo', $r->simbolo);
                $m->__SET('estado', $r->estado);

                $this->myCon = parent::desconectar();
                return $m;

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

        public function editarMoneda(Moneda $m)
        {
            try {
                $this->myCon = parent::conectar();
                $sql = "UPDATE tbl_moneda SET nombre = ?, simbolo = ?, estado = 2 WHERE id_moneda = ?";

                $this->myCon->prepare($sql)->execute(array(
                    $m->__GET('nombre'),
                    $m->__GET('simbolo'),
                    $m->__GET('id')
                ));
                $this->myCon = parent::desconectar();
            } catch (Exception $e) {
                die($e->getMessage());
            }

        }

    }
?>
