<?php
include_once("Conexion.php");

class Dt_Kermesse extends Conexion
{
    public function listaKerm()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_kermesse";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $p = new Vw_Kermesse();

                $p->__SET('id_kermesse', $r->id_kermesse);
                $p->__SET('idParroquia', $r->idParroquia);
                $p->__SET('parroquia', $r->parroquia);
                $p->__SET('nombre', $r->nombre);
                $p->__SET('fInicio', $r->fInicio);
                $p->__SET('fFinal', $r->fFinal);
                $p->__SET('descripcion', $r->descripcion);
                $p->__SET('estado', $r->estado);
                $p->__SET('usuario_creacion', $r->usuario_creacion);
                $p->__SET('fecha_creacion', $r->fecha_creacion);
                $p->__SET('usuario_modificacion', $r->usuario_modificacion);
                $p->__SET('fecha_modificacion', $r->fecha_modificacion);
                $p->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $p->__SET('fecha_eliminacion', $r->fecha_eliminacion);


                $result[] = $p;
            }


            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaKermT()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_kermesse";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $p = new Kermesse();

                $p->__SET('id_kermesse', $r->id_kermesse);
                $p->__SET('idParroquia', $r->idParroquia);
                $p->__SET('parroquia', $r->parroquia);
                $p->__SET('nombre', $r->nombre);
                $p->__SET('fInicio', $r->fInicio);
                $p->__SET('fFinal', $r->fFinal);
                $p->__SET('descripcion', $r->descripcion);
                $p->__SET('estado', $r->estado);
                $p->__SET('usuario_creacion', $r->usuario_creacion);
                $p->__SET('fecha_creacion', $r->fecha_creacion);
                $p->__SET('usuario_modificacion', $r->usuario_modificacion);
                $p->__SET('fecha_modificacion', $r->fecha_modificacion);
                $p->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $p->__SET('fecha_eliminacion', $r->fecha_eliminacion);


                $result[] = $p;
            }


            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regKermesse(Kermesse $rk)
    {
        try {
            $fecha = date('Y-m-d');
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_kermesse(idParroquia, nombre, fInicio, fFinal, descripcion, usuario_creacion, fecha_creacion, estado)
                VALUES (?, ?, ?, ?, ?, 1, '$fecha', 1)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $rk->__GET('idParroquia'),
                    $rk->__GET('nombre'),
                    $rk->__GET('fInicio'),
                    $rk->__GET('fFinal'),
                    $rk->__GET('descripcion')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getGastos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_gastos where id_registro_gastos= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $icd = new gastos();

            //_SET(CAMPOBD, atributoEntidad)
            $icd->__SET('id_registro_gastos', $r->id_registro_gastos);
            $icd->__SET('idKermesse', $r->idKermesse);
            $icd->__SET('idCatGastos', $r->idCatGastos);
            $icd->__SET('fechaGasto', $r->fechaGasto);
            $icd->__SET('concepto', $r->concepto);
            $icd->__SET('monto', $r->monto);
            $icd->__SET('estado', $r->estado);




            $this->myCon = parent::desconectar();
            return $icd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
