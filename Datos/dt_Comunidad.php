<?php
include_once("Conexion.php");

class Dt_Comunidad extends Conexion
{
    private $myCon;
    public function listaComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad order by nombre";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $com = new Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $com->__SET('id_comunidad', $r->id_comunidad);
                $com->__SET('nombre', $r->nombre);
                $com->__SET('responsable', $r->responsable);
                $com->__SET('desc_contribucion', $r->desc_contribucion);
                $com->__SET('estado', $r->estado);

                $result[] = $com;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
