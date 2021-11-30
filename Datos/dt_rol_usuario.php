<?php

include_once("conexion.php");

class dt_rol_usuario extends Conexion
{
    private $myCon;

    public function listarVw_rol_usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_usuario";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_rol_usuario();

                $vu->__SET('id_rol_usuario', $r->id_rol_usuario);
                $vu->__SET('usuario', $r->usuario);
                $vu->__SET('rol', $r->rol);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaRol_usu()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.rol_usuario";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new rol_usuario();

                $us->__SET('id_rol_usuario', $r->id_rol_usuario);
                $us->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                $us->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getRolUsuario($gru)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT p.id_rol_usuario, c.usuario as usuario, r.rol_descripcion as rol
            FROM dbkermesse.rol_usuario p 
            Inner Join dbkermesse.tbl_usuario c 
            on c.id_usuario=p.tbl_usuario_id_usuario
            Inner Join dbkermesse.tbl_rol r
            on r.id_rol = p.tbl_rol_id_rol
            where p.tbl_usuario_id_usuario= ? and p.tbl_rol_id_rol=?;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($gru));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $ru = new rol_usuario();

            //_SET(CAMPOBD, atributoEntidad)
            $ru->__SET('id_rol_usuario', $r->id_rol_usuario);
            $ru->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
            $ru->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

            $this->myCon = parent::desconectar();
            return $ru;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regRolUsuario(rol_usuario $rru)
    {
        try {
            $this->myCon = parent::conectar();

            /* PRIMERA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL*/
            /* date_default_timezone_set("America/Managua");
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad(id_kermesse,id_comunidad, id_producto, cant_productos, total_bonos, usuario_creacion, fecha_creacion)
                VALUES (?, ?, ?, ?, ?, 1, '$fecha')"; */

            /* SEGUNDA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL */
            $sql = "INSERT INTO dbkermesse.rol_usuario(tbl_usuario_id_usuario, tbl_rol_id_rol)
            VALUES (?, ?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    /* $com->__GET('id_comunidad'), */
                    $rru->__GET('tbl_usuario_id_usuario'),
                    $rru->__GET('tbl_rol_id_rol')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EditRolUsuario(rol_usuario $ru)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.rol_usuario SET
            tbl_usuario_id_usuario = ?,
            tbl_rol_id_rol = ?,
            WHERE id_rol_usuario = ?";

            $this->myCon->prepare($querySQL)
                ->execute(array(
                    $ru->__GET('tbl_usuario_id_usuario'),
                    $ru->__GET('tbl_rol_id_rol'),
                    $ru->__GET('id_rol_usuario')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRolUsuario($idRU)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_usuario WHERE id_rol_usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idRU));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }
}
