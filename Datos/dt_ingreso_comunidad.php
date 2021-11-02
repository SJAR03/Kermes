<?php
include_once("Conexion.php");

class Dt_Ingreso_Comunidad extends Conexion
{
    private $myCon;
    public function listaIngresoComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $ic = new Ingreso_Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $ic->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $ic->__SET('id_kermesse', $r->id_kermesse);
                $ic->__SET('id_comunidad', $r->id_comunidad);
                $ic->__SET('id_producto', $r->id_producto);
                $ic->__SET('cant_productos', $r->cant_productos);
                $ic->__SET('total_bonos', $r->total_bonos);
                $ic->__SET('usuario_creacion', $r->usuario_creacion);
                $ic->__SET('fecha_creacion', $r->fecha_creacion);
                $ic->__SET('usuario_modificacion', $r->usuario_modificacion);
                $ic->__SET('fecha_modificacion', $r->fecha_modificacion);
                $ic->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $ic->__SET('fecha_eliminacion', $r->fecha_eliminacion);

                $result[] = $ic;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
