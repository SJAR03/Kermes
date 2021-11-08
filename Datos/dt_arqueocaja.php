<?php
include_once("conexion.php");

class dt_arqueocaja extends Conexion {
    private $myCon;

    public function listararqueocaja(){
        try {
            $this->myCon = parent::conectar(); 
            $result = array(); 
            $querySQL = "SELECT * FROM dbkermesse.vw_arqueocaja";
            
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(); 

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $us = new Vw_Arqueo_Caja(); 

                $us->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $us->__SET('idKermesse', $r->idKermesse);
                $us->__SET('kermesse', $r->kermesse);
                $us->__SET('fechaArqueo', $r->fechaArqueo);
                $us->__SET('granTotal', $r->granTotal);
                $us->__SET('usuario_creacion', $r->usuario_creacion);
                $us->__SET('fecha_creacion', $r->fecha_creacion);
                $us->__SET('usuario_modificacion', $r->usuario_modificacion);
                $us->__SET('fecha_modificacion', $r->fecha_modificacion);
                $us->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $us->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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