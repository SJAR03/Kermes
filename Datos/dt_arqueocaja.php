<?php
    include_once("conexion.php");

    class dt_arqueocaja extends Conexion
    {
        private $myCon;

        public function listarArqueo()
        {
            try 
            {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja";

                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();

                foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $arq = new Vw_Arqueo_Caja();

                    $arq->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                    $arq->__SET('nombreKermesse', $r->kermesse);
                    $arq->__SET('fechaArqueo', $r->fechaArqueo);
                    $arq->__SET('granTotal', $r->granTotal);
                    $arq->__SET('estado', $r->estado);

                    $result[] = $arq;
                }

                $this->myCon = parent::desconectar();
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrarArqueo(Vw_Arqueo_Caja $ic)
        {
            try {
                /* Establecer la hora y fecha actual usando date() de PHP
                date_default_timezone_set("America/Managua");
                $fecha = date("Y-m-d: H:i:s"); */

                $this->myCon = parent::conectar();
                $sql = "INSERT INTO dbkermesse.tbl_arqueocaja(idKermesse, fechaArqueo, granTotal, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion)
                    VALUES (?, ?, ?, 1, NOW(), ?, ?, ?, ?, 1)";

                $this->myCon->prepare($sql)
                ->execute(array(
                    $ic->__GET('idKermesse'),
                    $ic->__GET('fechaArqueo'),
                    $ic->__GET('granTotal'),
                    $ic->__GET('usuario_modificacion'),
                    $ic->__GET('fecha_modificacion'),
                    $ic->__GET('usuario_eliminacion'),
                    $ic->__GET('fecha_eliminacion')));

                    $this->myCon = parent::desconectar();

            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function getArqueoById($id)
        {
            try 
            {
                $this->myCon = parent::conectar();
                $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja WHERE id_ArqueoCaja= ?";
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute(array($id));

                $r = $stm->fetch(PDO::FETCH_OBJ);

                $arq = new Vw_Arqueo_Caja();

                //_SET(CAMPOBD, atributoEntidad)
                $arq->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $arq->__SET('idKermesse', $r->idKermesse);
                $arq->__SET('fechaArqueo', $r->fechaArqueo);
                $arq->__SET('granTotal', $r->granTotal);
                $arq->__SET('estado', $r->estado);


                $this->myCon = parent::desconectar();
                return $arq;
            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }
    }
?>