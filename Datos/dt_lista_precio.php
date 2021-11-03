<?php

include_once("conexion.php");

class dt_lista_precio extends Conexion {
    private $myCon;

    public function listarlistaPrecios(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio";
            
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $us = new lista_precio(); 

                $us->__SET('id_lista_precio', $r->id_lista_precio);
                $us->__SET('id_kermesse', $r->id_kermesse);
                $us->__SET('nombre', $r->nombre);
                $us->__SET('descripcion', $r->descripcion);
                $us->__SET('estado', $r->estado);
                
                
                $result[] = $us; 
            }

            $this->myCon = parent::desconectar(); 
            return $result; 

        }catch(Exception $e){
            die($e->getMessage()); 
        }

    }
}