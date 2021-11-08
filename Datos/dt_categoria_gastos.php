<?php

include_once("conexion.php");

class dt_categoria_gastos extends Conexion {
    private $myCon;

    public function listarCategoriaGastos(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos";
            
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $us = new Vw_Categoria_gastos(); 

                $us->__SET('id_categoria_gastos', $r->id_categoria_gastos);
                $us->__SET('nombre_categoria', $r->nombre_categoria);
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