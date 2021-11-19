<?php

include_once("conexion.php");

class dt_lista_precio extends Conexion
{
    private $myCon;

    public function listarlistaPrecios()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarVwlistaPrecios()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_lista_precio";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new Vw_Lista_Precio();

                $us->__SET('id_lista_precio', $r->id_lista_precio);
                $us->__SET('id_kermesse', $r->id_kermesse);
                $us->__SET('kermess', $r->kermess);
                $us->__SET('nombre', $r->nombre);
                $us->__SET('descripcion', $r->descripcion);
                $us->__SET('estado', $r->estado);


                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regListaPrecio(lista_precio $icd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_lista_precio(id_kermesse, nombre, descripcion, estado)
                VALUES (?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $icd->__GET('id_kermesse'),
                $icd->__GET('nombre'),
                $icd->__GET('descripcion'),
                $icd->__GET('estado')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getListaPrecio($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio where id_lista_precio= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $icd = new lista_precio();

                //_SET(CAMPOBD, atributoEntidad)
                $icd->__SET('id_lista_precio', $r->id_lista_precio);
                $icd->__SET('id_kermesse', $r->id_kermesse);
                $icd->__SET('nombre', $r->nombre);
                $icd->__SET('descripcion', $r->descripcion);
                $icd->__SET('estado', $r->estado);

                
                

            $this->myCon = parent::desconectar();
            return $icd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
