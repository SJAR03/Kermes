<?php

include_once("conexion.php");

class dt_opciones extends Conexion
{
    private $myCon;

    public function listarVw_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_opciones where estado <> 'Eliminado';";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vo = new Vw_Opciones();

                $vo->__SET('id_opciones', $r->id_opciones);
                $vo->__SET('opcion_descripcion', $r->opcion_descripcion);
                $vo->__SET('estado', $r->estado);

                $result[] = $vo;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaOpc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_opciones where estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $op = new opciones();

                $op->__SET('id_opciones', $r->id_opciones);
                $op->__SET('opcion_descripcion', $r->opcion_descripcion);
                $op->__SET('estado', $r->estado);

                $result[] = $op;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getOpcion($io)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM tbl_opciones WHERE id_opciones = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($io));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $go = new opciones();

            $go->__SET('id_opciones', $r->id_opciones);
            $go->__SET('opcion_descripcion', $r->opcion_descripcion);
            $go->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $go;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registerOpciones(opciones $ro)
    {
        try {
            $this->myCon = parent::conectar();
            $query = "INSERT INTO tbl_opciones (opcion_descripcion, estado) VALUES (?, 1)";
            $this->myCon->prepare($query)->execute(array(
                $ro->__GET('opcion_descripcion'),
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editarOpciones(opciones $eo)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_opciones SET opcion_descripcion = ?, estado = 2 WHERE id_opciones = ?";

            $this->myCon->prepare($sql)->execute(array(

                $eo->__GET('opcion_descripcion'),
                $eo->__GET('id_opciones')
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteOpciones($idO)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_opciones SET estado = 3 WHERE id_opciones = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idO));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getOpciones($rol)
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT opcion_descripcion FROM dbkermesse.vw_rol_opciones WHERE id_rol= :id_rol;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':id_rol', $rol, PDO::PARAM_INT);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $opc = new Opciones();
                //_SET(CAMPOBD, atributoEntidad)			
                $opc->__SET('opcion_descripcion', $r->opcion_descripcion);
                $result[] = $opc;
                //var_dump($result);
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
