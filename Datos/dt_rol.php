<?php

include_once("conexion.php");

class dt_rol extends Conexion
{
    private $myCon;

    public function listarVw_Rol()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol where estado <> 'Eliminado';";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vro = new Vw_Rol();

                $vro->__SET('id_rol', $r->id_rol);
                $vro->__SET('rol_descripcion', $r->rol_descripcion);
                $vro->__SET('estado', $r->estado);

                $result[] = $vro;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listaRol()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_rol where estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $ro = new rol();

                $ro->__SET('id_rol', $r->id_rol);
                $ro->__SET('rol_descripcion', $r->rol_descripcion);
                $ro->__SET('estado', $r->estado);

                $result[] = $ro;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getRol($ir)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM tbl_rol WHERE id_rol = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($ir));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $gr = new rol();

            $gr->__SET('id_rol', $r->id_rol);
            $gr->__SET('rol_descripcion', $r->rol_descripcion);
            $gr->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $gr;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registerRol(Rol $reo)
    {
        try {
            $this->myCon = parent::conectar();
            $query = "INSERT INTO tbl_rol (rol_descripcion, estado) VALUES (?, 1)";
            $this->myCon->prepare($query)->execute(array(
                $reo->__GET('rol_descripcion'),
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editarRol(rol $er)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_rol SET rol_descripcion = ?, estado = 2 WHERE id_rol = ?";

            $this->myCon->prepare($sql)->execute(array(

                $er->__GET('rol_descripcion'),
                $er->__GET('id_rol')
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRol($idR)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_rol SET estado = 3 WHERE id_rol = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idR));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
