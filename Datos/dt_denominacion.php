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

        public function getDenominacion($id)
        {
            try
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM tbl_denominacion WHERE id_Denominacion = ?";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                $r = $stm->fetch(PDO::FETCH_OBJ);
                $den = new VwDenominacion();

                $den->__SET('id', $r->id_Denominacion);
                $den->__SET('idMoneda', $r->idMoneda);
                $den->__SET('valor', $r->valor);
                $den->__SET('valor_letras', $r->valor_letras);

                $this->myCon = parent::desconectar();
                return $den;

            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrarDenominacion(VwDenominacion $d)
        {
            try
            {
                $this->myCon = parent::conectar();
                $query = "INSERT INTO tbl_denominacion (idMoneda, valor, valor_letras, estado) VALUES (?, ?, ?, 1)";
                $this->myCon->prepare($query)->execute(array(
                    $d->__GET('idMoneda'),
                    $d->__GET('valor'),
                    $d->__GET('valor_letras'),
                ));
                $this->myCon = parent::desconectar();
            } catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function editarDenominacion(VwDenominacion $d)
        {
            try
            {
                $this->myCon = parent::conectar();
                $query = "UPDATE tbl_denominacion SET idMoneda = ?, valor = ?, valor_letras = ?, estado = 2 WHERE id_Denominacion = ?";
                $this->myCon->prepare($query)->execute(array(
                    $d->__GET('idMoneda'),
                    $d->__GET('valor'),
                    $d->__GET('valor_letras'),
                    $d->__GET('id')
                ));
                $this->myCon = parent::desconectar();
            } catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

    }

?>
