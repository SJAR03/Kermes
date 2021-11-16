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

    public function listaProdT()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_productos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $p = new Productos();

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

    public function regProducto(Productos $p)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_productos(
                        id_comunidad,
                        id_cat_producto,
                        nombre,
                        descripcion,
                        cantidad,
                        preciov_sugerido,
                        estado
                        )
                    VALUES (?, ?, ?, ?, ?, ?, 1)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $p->__GET('id_comunidad'),
                    $p->__GET('id_cat_producto'),
                    $p->__GET('nombre'),
                    $p->__GET('descripcion'),
                    $p->__GET('cantidad'),
                    $p->__GET('preciov_sugerido')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProducto($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_productos where id_producto= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $p = new Categoria_Producto();

            //_SET(CAMPOBD, atributoEntidad)
            $p->__SET('id_producto', $r->id_producto);
            $p->__SET('id_comunidad', $r->id_comunidad);
            $p->__SET('id_cat_producto', $r->id_cat_producto);
            $p->__SET('nombre', $r->nombre);
            $p->__SET('descripcion', $r->descripcion);
            $p->__SET('cantidad', $r->cantidad);
            $p->__SET('preciov_sugerido', $r->preciov_sugerido);
            $p->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $p;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editProducto(Productos $p)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_productos SET 
                        id_comunidad = ?,
                        id_cat_producto=?,
                        nombre = ?, 
                        descripcion=?, 
                        cantidad=?,
                        preciov_sugerido=?,
                        estado=2 
                    WHERE id_producto =?";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $p->__GET('id_comunidad'),
                        $p->__GET('id_cat_producto'),
                        $p->__GET('nombre'),
                        $p->__GET('descripcion'),
                        $p->__GET('cantidad'),
                        $p->__GET('preciov_sugerido'),
                        $p->__GET('id_producto')
                    )
                );

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function desactivarProducto($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_productos SET 
                        estado=3 
                    WHERE id_producto =?";

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
