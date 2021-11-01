<?php

include_once("conexion.php");

class dt_usuario extends Conexion {
    private $myCon;

    public function listarUsuaios(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario";
            
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $us = new usuario(); 

                $us->__SET('id_usuario', $r->id_usuario);
                $us->__SET('usuario', $r->usuario);
                $us->__SET('pwd', $r->pwd);
                $us->__SET('nombres', $r->nombres);
                $us->__SET('apellidos', $r->apellidos);
                $us->__SET('email', $r->email);
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