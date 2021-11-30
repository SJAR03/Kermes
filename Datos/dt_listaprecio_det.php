<?php

include_once("conexion.php");

class dt_listaprecioDet extends Conexion
{
    private $myCon;

    public function listarListaPreciosDet()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio_det";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_ListaPrecio_Det();

                $us->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $us->__SET('id_lista_precio', $r->id_lista_precio);
                $us->__SET('lista_precio', $r->lista_precio);
                $us->__SET('id_producto', $r->id_producto);
                $us->__SET('Producto', $r->Producto);
                $us->__SET('precio_venta', $r->precio_venta);


                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarVwListaPreciosDet()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_listaprecio_det";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_ListaPrecio_Det();

                $us->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $us->__SET('id_lista_precio', $r->id_lista_precio);
                $us->__SET('lista_precio', $r->lista_precio);
                $us->__SET('id_producto', $r->id_producto);
                $us->__SET('Producto', $r->Producto);
                $us->__SET('precio_venta', $r->precio_venta);


                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regListaPrecioDet(listaprecio_det $icd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_listaprecio_det(id_lista_precio, id_producto, precio_venta)
                VALUES (?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $icd->__GET('id_lista_precio'),
                $icd->__GET('id_producto'),
                $icd->__GET('precio_venta')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function UpdateListaPrecioDet(listaprecio_det $p){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_listaprecio_det SET
            id_lista_precio = ?,
            id_producto = ?,
            precio_venta = ?
            WHERE id_listaprecio_det = ?";


            $this->myCon->prepare($querySQL)
            ->execute(array(
                $p->__GET('id_lista_precio'),
                $p->__GET('id_producto'),
                $p->__GET('precio_venta'),
                $p->__GET('id_listaprecio_det')
            ));

            $this->myCon = parent::desconectar();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getListaPrecioDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio_det where id_listaprecio_det= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $icd = new listaprecio_det();

                //_SET(CAMPOBD, atributoEntidad)
                $icd->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $icd->__SET('id_lista_precio', $r->id_lista_precio);
                $icd->__SET('id_producto', $r->id_producto);
                $icd->__SET('precio_venta', $r->precio_venta);

            $this->myCon = parent::desconectar();
            return $icd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
