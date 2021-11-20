<?php
include_once("Conexion.php");

class Dt_CategoriaProducto extends Conexion
{
    public function listaVw_Cat()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_categoria_producto where estado != 'Eliminado'";

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
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto where estado <>3";

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

    public function regCatProducto(Categoria_Producto $cp)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_categoria_producto(nombre, descripcion, estado)
                VALUES (?, ?, 1)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $cp->__GET('nombre'),
                    $cp->__GET('descripcion')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getCatProducto($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_producto where id_categoria_producto= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $cp = new Categoria_Producto();

            //_SET(CAMPOBD, atributoEntidad)
            $cp->__SET('id_categoria_producto', $r->id_categoria_producto);
            $cp->__SET('nombre', $r->nombre);
            $cp->__SET('descripcion', $r->descripcion);
            $cp->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $cp;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editCatProducto(Categoria_Producto $cp)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_categoria_producto SET 
                        nombre = ?, 
                        descripcion=?, 
                        estado=2 
                    WHERE id_categoria_producto =?";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $cp->__GET('nombre'),
                    $cp->__GET('descripcion'),
                    $cp->__GET('id_categoria_producto')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function desactivarCatProducto($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_categoria_producto SET 
                        estado=3 
                    WHERE id_categoria_producto =?";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $id
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
