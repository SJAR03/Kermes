<?php
    include_once("conexion.php");

    class Dt_ArqueoDetalle extends Conexion {
        private $myCon;

        public function listarArqueoDetalle()
        {
            try {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM dbkermesse.vw_arqueo_detalle;";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $arq = new ArqueoDetalle();

                    $arq->__SET('idArqueoCajaDet', $r->id);
                    $arq->__SET('id_ArqueoCaja', $r->id_arqueo);
                    $arq->__SET('moneda', $r->moneda);
                    $arq->__SET('valorDenominacion', $r->denominacion);
                    $arq->__SET('cantidad', $r->cantidad);
                    $arq->__SET('subtotal', $r->subtotal);

                    $result[] = $arq;
                }

                $this->myCon = parent::desconectar();
                return $result;

            }catch(Exception $e){
                die($e->getMessage());
            }

        }

        public function registrarDetalleArqueo(ArqueoDetalle $ad)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $sql = "INSERT INTO dbkermesse.tbl_arqueocaja_det(idArqueoCaja, idMoneda, idDenominacion, cantidad, subtotal)
                    VALUES (?, ?, ?, ?, ?)";

                $this->myCon->prepare($sql)
                ->execute(array(
                    $ad->__GET('id_ArqueoCaja'),
                    $ad->__GET('moneda'),
                    $ad->__GET('valorDenominacion'),
                    $ad->__GET('cantidad'),
                    $ad->__GET('subtotal')));

                    $this->myCon = parent::desconectar();

            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }
    }
?>
