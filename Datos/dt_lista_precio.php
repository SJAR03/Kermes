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
            $querySQL = "SELECT * FROM dbkermesse.tbl_lista_precio where estado <> 3";

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
            $querySQL = "SELECT * FROM dbkermesse.vw_lista_precio where estado <> 3";

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
                VALUES (?, ?, ?, 1)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $icd->__GET('id_kermesse'),
                $icd->__GET('nombre'),
                $icd->__GET('descripcion')));

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

    public function UpdateListaPrecio(lista_precio $p){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_lista_precio SET
            id_kermesse = ?,
            nombre = ?,
            descripcion = ?,
            estado=2
            WHERE id_lista_precio = ?";


            $this->myCon->prepare($querySQL)
            ->execute(array(
                $p->__GET('id_kermesse'),
                $p->__GET('nombre'),
                $p->__GET('descripcion'),
                $p->__GET('id_lista_precio')
            ));

            $this->myCon = parent::desconectar();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getListaPrecioR()
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT * from dbkermesse.tbl_lista_precio where estado != 3 Order by id_lista_precio DESC Limit 1";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            $tc = new lista_precio;
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $tc->__SET('id_lista_precio', $r->id_lista_precio);
            $tc->__SET('id_kermesse', $r->id_kermesse);
            $tc->__SET('nombre', $r->nombre);
            $tc->__SET('descripcion', $r->descripcion);
            $tc->__SET('estado', $r->estado);


            $this->myCon = parent::desconectar();

            return $tc;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getIdListaPrecio()
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT id_lista_precio from dbkermesse.tbl_lista_precio where estado != 3 Order by id_lista_precio DESC Limit 1";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            $tc = new TasaCambio;
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tc->__SET('id_lista_precio', $r->id_tasaCambio);
            $this->myCon = parent::desconectar();

            return $tc->__GET('id_lista_precio');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarListaPrecio($id)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_lista_precio SET 
                        estado=3 
                    WHERE id_lista_precio =?";

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
