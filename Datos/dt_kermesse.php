<?php
include_once("Conexion.php");

class Dt_Kermesse extends Conexion
{
    public function listaKerm()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_kermesse where estado <> 'Eliminado';";

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
            $querySQL = "SELECT * FROM dbkermesse.tbl_kermesse where estado <> 3;";

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

            /* PRIMERA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL*/
            /* date_default_timezone_set("America/Managua");
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad(id_kermesse,id_comunidad, id_producto, cant_productos, total_bonos, usuario_creacion, fecha_creacion)
                VALUES (?, ?, ?, ?, ?, 1, '$fecha')"; */

            /* SEGUNDA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL */

            $sql = "INSERT INTO dbkermesse.tbl_kermesse(idParroquia, nombre, fInicio, fFinal, descripcion, usuario_creacion, fecha_creacion, estado)
                VALUES (?, ?, ?, ?, ?, 3, now(), 1)";

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

    public function getKermesse($gk)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_kermesse where id_kermesse= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($gk));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $igk = new Kermesse();

            //_SET(CAMPOBD, atributoEntidad)
            $igk->__SET('id_kermesse', $r->id_kermesse);
            $igk->__SET('idParroquia', $r->idParroquia);
            $igk->__SET('nombre', $r->nombre);
            $igk->__SET('fInicio', $r->fInicio);
            $igk->__SET('fFinal', $r->fFinal);
            $igk->__SET('descripcion', $r->descripcion);
            $igk->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $igk;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function UpdateKermesse(Kermesse $p)
    {
        try {
            $fecha = date('Y/m/d');
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_kermesse SET
            idParroquia = ?,
            nombre = ?,
            fInicio = ?,
            fFinal = ?,
            descripcion = ?,
            usuario_modificacion = ?,
            fecha_modificacion = '$fecha',
            estado = 2
            WHERE id_kermesse = ?";


            $this->myCon->prepare($querySQL)
                ->execute(array(
                    $p->__GET('idParroquia'),
                    $p->__GET('nombre'),
                    $p->__GET('fInicio'),
                    $p->__GET('fFinal'),
                    $p->__GET('descripcion'),
                    $p->__GET('usuario_modificacion'),
                    $p->__GET('id_kermesse')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarKermesse($ek)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_kermesse SET estado=3, usuario_eliminacion = 3, fecha_eliminacion= now() WHERE id_kermesse =?";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($ek));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
