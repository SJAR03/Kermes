<?php
include_once("Conexion.php");

class Dt_Producto extends Conexion
{
    public function listaProd()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_productos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $p = new Vw_Productos();

                $p->__SET('id_producto', $r->id_producto);
                $p->__SET('id_comunidad', $r->id_comunidad);
                $p->__SET('comunidad', $r->comunidad);
                $p->__SET('id_cat_producto', $r->id_cat_producto);
                $p->__SET('categoria', $r->categoria);
                $p->__SET('nombre', $r->nombre);
                $p->__SET('descripcion', $r->descripcion);
                $p->__SET('cantidad', $r->cantidad);
                $p->__SET('preciov_sugerido', $r->preciov_sugerido);
                $p->__SET('estado', $r->estado);


                $result[] = $p;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
