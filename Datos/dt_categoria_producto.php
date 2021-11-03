<?php
include_once("Conexion.php");

class Dt_CategoriaProducto extends Conexion
{
    public function listaVw_Cat()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_categoria_producto";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vcp = new Vw_Categoria_Producto();

                $vcp->__SET('id_categoria_producto', $r->id_categoria_producto);
                $vcp->__SET('nombre', $r->nombre);
                $vcp->__SET('descripcion', $r->descripcion);
                $vcp->__SET('estado', $r->estado);

                $result[] = $vcp;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaCat()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vcp = new Categoria_Producto();

                $vcp->__SET('id_categoria_producto', $r->id_categoria_producto);
                $vcp->__SET('nombre', $r->nombre);
                $vcp->__SET('descripcion', $r->descripcion);
                $vcp->__SET('estado', $r->estado);

                $result[] = $vcp;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
