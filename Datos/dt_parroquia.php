<?php
include_once("Conexion.php");

class Dt_Parroquia extends Conexion
{
    public function listaParr()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_parroquia";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $pr = new Parroquia();

                $pr->__SET('idParroquia', $r->idParroquia);
                $pr->__SET('nombre', $r->nombre);
                $pr->__SET('direccion', $r->direccion);
                $pr->__SET('telefono', $r->telefono);
                $pr->__SET('parroco', $r->parroco);
                $pr->__SET('logo', $r->logo);
                $pr->__SET('sitio_web', $r->sitio_web);

                $result[] = $pr;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regParroquia(Parroquia $com)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_parroquia(nombre, direccion, telefono, parroco, logo, sitio_web)
                VALUES (?, ?, ?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                $com->__GET('nombre'),
                $com->__GET('direccion'),
                $com->__GET('telefono'),
                $com->__GET('parroco'),
                $com->__GET('logo'),
                $com->__GET('sitio_web')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function UpdateParroquia(Parroquia $p){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_parroquia SET
            nombre = ?,
            direccion = ?,
            telefono = ?,
            parroco = ?,
            logo = ?,
            sitio_web = ?
            WHERE idParroquia = ?";


            $this->myCon->prepare($querySQL)
            ->execute(array(
                $p->__GET('nombre'),
                $p->__GET('direccion'),
                $p->__GET('telefono'),
                $p->__GET('parroco'),
                $p->__GET('logo'),
                $p->__GET('sitio_web'),
                $p->__GET('idParroquia')
            ));

            $this->myCon = parent::desconectar();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getParroquia($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_parroquia where idParroquia= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $ic = new Parroquia();

                //_SET(CAMPOBD, atributoEntidad)
                $ic->__SET('idParroquia', $r->idParroquia);
                $ic->__SET('nombre', $r->nombre);
                $ic->__SET('direccion', $r->direccion);
                $ic->__SET('telefono', $r->telefono);
                $ic->__SET('parroco', $r->parroco);
                $ic->__SET('logo', $r->logo);
                $ic->__SET('sitio_web', $r->sitio_web);
            $this->myCon = parent::desconectar();
            return $ic;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
