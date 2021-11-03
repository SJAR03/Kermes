<?php

include_once("conexion.php");

class dt_listaprecioDet extends Conexion {
    private $myCon;

    public function listarListaPreciosDet(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio_det";
            
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $us = new listaprecio_det(); 

                $us->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $us->__SET('id_lista_precio', $r->id_lista_precio);
                $us->__SET('id_producto', $r->id_producto);
                $us->__SET('precio_venta', $r->precio_venta);
                
                
                $result[] = $us; 
            }

            $this->myCon = parent::desconectar(); 
            return $result; 

        }catch(Exception $e){
            die($e->getMessage()); 
        }

    }
}