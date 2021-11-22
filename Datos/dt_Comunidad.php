<?php
include_once("Conexion.php");

class Dt_Comunidad extends Conexion
{
    private $myCon;
    public function listaComunidad()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad where estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $com = new Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $com->__SET('id_comunidad', $r->id_comunidad);
                $com->__SET('nombre', $r->nombre);
                $com->__SET('responsable', $r->responsable);
                $com->__SET('desc_contribucion', $r->desc_contribucion);
                $com->__SET('estado', $r->estado);

                $result[] = $com;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regComunidad(Comunidad $com)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_comunidad(nombre, responsable, desc_contribucion, estado)
                VALUES (?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                $com->__GET('nombre'),
                $com->__GET('responsable'),
                $com->__GET('desc_contribucion'),
                $com->__GET('estado')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function getComunidad($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_comunidad where id_comunidad= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $com = new Comunidad();

                //_SET(CAMPOBD, atributoEntidad)
                $com->__SET('id_comunidad', $r->id_comunidad);
                $com->__SET('nombre', $r->nombre);
                $com->__SET('responsable', $r->responsable);
                $com->__SET('desc_contribucion', $r->desc_contribucion);
                $com->__SET('estado', $r->estado);
            

            $this->myCon = parent::desconectar();
            return $com;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editComunidad(Comunidad $com)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_comunidad SET
                    nombre= ?,
                    responsable= ?,
                    desc_contribucion=?,
                    estado=?
                WHERE id_comunidad = ?";

            $this->myCon->prepare($sql)
            ->execute(
            array(
                $com->__GET('nombre'),
                $com->__GET('responsable'),
                $com->__GET('desc_contribucion'),
                $com->__GET('estado'),
                $com->__GET('id_comunidad')          
            ));
            

            $this->myCon = parent::desconectar();
            
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteComunidad($idCom)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_comunidad SET estado = 3 WHERE id_comunidad = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idCom));
            $this->myCon = parent::desconectar();
            
        } 
        catch (Exception $e) 
        {
            var_dump($e);
            die($e->getMessage());
        }
    }



}
