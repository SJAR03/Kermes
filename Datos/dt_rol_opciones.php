<?php

include_once("conexion.php");

class dt_rol_opciones extends Conexion
{
    private $myCon;

    public function listarVw_rol_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_rol_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vu = new Vw_rol_opciones();

                $vu->__SET('id_rol_opciones', $r->id_rol_opciones);
                $vu->__SET('rol', $r->rol);
                $vu->__SET('opciones', $r->opciones);

                $result[] = $vu;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listaRol_opc()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.rol_opciones";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $us = new rol_opciones();

                $us->__SET('id_rol_opciones', $r->id_rol_opciones);
                $us->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $us->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);

                $result[] = $us;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getRolOpcion($gro)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT p.id_rol_opcion, c.opcion_descripcion as opcion, r.rol_descripcion as rol
            FROM dbkermesse.rol_opciones p 
            Inner Join dbkermesse.tbl_opciones c 
            on c.id_opciones=p.tbl_opciones_id_opciones
            Inner Join dbkermesse.tbl_rol r
            on r.id_rol = p.tbl_rol_id_rol
            where p.tbl_opciones_id_opciones= ? and p.tbl_rol_id_rol=?;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($gro));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $ro = new rol_opciones();

            //_SET(CAMPOBD, atributoEntidad)
            $ro->__SET('id_rol_opciones', $r->id_rol_opciones);
            $ro->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
            $ro->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

            $this->myCon = parent::desconectar();
            return $ro;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regRolOpcion(rol_opciones $rro)
    {
        try {
            $this->myCon = parent::conectar();

            /* PRIMERA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL*/
            /* date_default_timezone_set("America/Managua");
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad(id_kermesse,id_comunidad, id_producto, cant_productos, total_bonos, usuario_creacion, fecha_creacion)
                VALUES (?, ?, ?, ?, ?, 1, '$fecha')"; */

            /* SEGUNDA FORMA DE ESTABLECER LA FECHA COMO FECHA ACTUAL */
            $sql = "INSERT INTO dbkermesse.rol_opciones(tbl_opciones_id_opciones, tbl_rol_id_rol)
            VALUES (?, ?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    /* $com->__GET('id_comunidad'), */
                    $rro->__GET('tbl_opciones_id_opciones'),
                    $rro->__GET('tbl_rol_id_rol')
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editRolOpciones(rol_opciones $ero)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.rol_opciones SET
            tbl_opciones_id_opciones= ?,
            tbl_rol_id_rol= ?
            WHERE id_rol_opciones = ?";
            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $ero->__GET('tbl_opciones_id_opciones'),
                        $ero->__GET('tbl_rol_id_rol')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteRolOpciones($idRO)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.rol_opciones WHERE id_rol_opciones = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idRO));
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }
}
