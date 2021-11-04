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
}
