<?php
include_once("Conexion.php");

class Dt_CategoriaProducto extends Conexion
{
    public function listaCat()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $cp = new Categoria_Producto();

                $cp->__SET('id_categoria_producto', $r->id_categoria_producto);
                $cp->__SET('nombre', $r->nombre);
                $cp->__SET('descripcion', $r->descripcion);
                $cp->__SET('estado', $r->estado);

                $result[] = $cp;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
