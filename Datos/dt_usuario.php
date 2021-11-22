<?php

include_once("conexion.php");

class dt_usuario extends Conexion
{
    private $myCon;

    public function listarVw_Usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_usuario where estado <> 'Eliminado';";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_Usuario();

                $vu->__SET('id_usuario', $r->id_usuario);
                $vu->__SET('usuario', $r->usuario);
                $vu->__SET('pwd', $r->pwd);
                $vu->__SET('nombres', $r->nombres);
                $vu->__SET('apellidos', $r->apellidos);
                $vu->__SET('email', $r->email);
                $vu->__SET('estado', $r->estado);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaUsu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario where estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getUsuario($iu)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM tbl_usuario WHERE id_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($iu));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $gu = new Usuario();

            $gu->__SET('id_usuario', $r->id_usuario);
            $gu->__SET('usuario', $r->usuario);
            $gu->__SET('pwd', $r->pwd);
            $gu->__SET('nombres', $r->nombres);
            $gu->__SET('apellidos', $r->apellidos);
            $gu->__SET('email', $r->email);
            $gu->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $gu;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrarUsuario(usuario $ru)
    {
        try {
            $this->myCon = parent::conectar();
            $query = "INSERT INTO tbl_usuario (usuario, pwd, nombres, apellidos, email, estado) VALUES (?, ?, ?, ?, ?, 1)";
            $this->myCon->prepare($query)->execute(array(
                $ru->__GET('usuario'),
                $ru->__GET('pwd'),
                $ru->__GET('nombres'),
                $ru->__GET('apellidos'),
                $ru->__GET('email')
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editarUsuario(Usuario $eu)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE tbl_usuario SET usuario = ?, pwd = ?, nombres = ?, apellidos = ?, email = ?, estado = 2 WHERE id_usuario = ?";

            $this->myCon->prepare($sql)->execute(array(

                $eu->__GET('usuario'),
                $eu->__GET('pwd'),
                $eu->__GET('nombres'),
                $eu->__GET('apellidos'),
                $eu->__GET('email'),
                $eu->__GET('id_usuario')
            ));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($idU)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_usuario SET estado = 3 WHERE id_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idU));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
