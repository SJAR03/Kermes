<?php
include_once("conexion.php");

class dt_arqueocaja extends Conexion
{
    private $myCon;

    public function listararqueocaja()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Arqueo_Caja();

                $us->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $us->__SET('idKermesse', $r->idKermesse);
                $us->__SET('kermesse', $r->kermesse);
                $us->__SET('fechaArqueo', $r->fechaArqueo);
                $us->__SET('granTotal', $r->granTotal);
                $us->__SET('usuario_creacion', $r->usuario_creacion);
                $us->__SET('fecha_creacion', $r->fecha_creacion);
                $us->__SET('usuario_modificacion', $r->usuario_modificacion);
                $us->__SET('fecha_modificacion', $r->fecha_modificacion);
                $us->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $us->__SET('fecha_eliminacion', $r->fecha_eliminacion);
                $us->__SET('estado', $r->estado);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regarqueocaja(Vw_Arqueo_Caja $ic)
    {
        try {
            /* Establecer la hora y fecha actual usando date() de PHP
            date_default_timezone_set("America/Managua");
            $fecha = date("Y-m-d: H:i:s"); */

            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_arqueocaja(idKermesse,kermesse, fechaArqueo, granTotal, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion,estado)
                VALUES (?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $ic->__GET('idKermesse'),
                $ic->__GET('kermesse'),
                $ic->__GET('fechaArqueo'),
                $ic->__GET('granTotal'),
                $ic->__GET('usuario_creacion'),
                $ic->__GET('fecha_creacion'),
                $ic->__GET('usuario_modificacion'),
                $ic->__GET('fecha_modificacion'),
                $ic->__GET('usuario_eliminacion'),
                $ic->__GET('fecha_eliminacion'),
                $ic->__GET('estado')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*public function eliminarArqueo($ic)
    {
        try{
            $this->myCon = parent::conectar();
            $qSQL = "UPDATE tbl_arqueocaja SET estado = 3, fecha_eliminacion = NOW(), usuario_eliminacion = 1 WHERE id_ArqueoCaja = ?";
            $stm = $this->myCon->prepare($qSQL);
            $stm->execute($qSQL);
            $this->myCon = parent::desconectar();
        }
    }
*/
    public function getarqueocaja($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja where id_ArqueoCaja= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $ic = new Vw_Arqueo_Caja();

            //_SET(CAMPOBD, atributoEntidad)
            $ic->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
            $ic->__SET('idKermesse', $r->idKermesse);
            $ic->__SET('kermesse', $r->kermesse);
            $ic->__SET('fechaArqueo', $r->fechaArqueo);
            $ic->__SET('granTotal', $r->granTotal);
            $ic->__SET('usuario_creacion', $r->usuario_creacion);
            $ic->__SET('fecha_creacion', $r->fecha_creacion);
            $ic->__SET('usuario_modificacion', $r->usuario_modificacion);
            $ic->__SET('fecha_modificacion', $r->fecha_modificacion);
            $ic->__SET('usuario_eliminacion', $r->usuario_eliminacion);
            $ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);
            $ic->__SET('estado', $r->estado);


            $this->myCon = parent::desconectar();
            return $ic;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}