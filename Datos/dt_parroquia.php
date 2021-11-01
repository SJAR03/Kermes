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
}
