<?php
include_once("Conexion.php");

class Dt_Control_Bonos extends Conexion
{
    private $myCon;
    public function listaControlBonos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $bon = new Control_Bonos();

                //_SET(CAMPOBD, atributoEntidad)
                $bon->__SET('id_bono', $r->id_bono);
                $bon->__SET('nombre', $r->nombre);
                $bon->__SET('valor', $r->valor);
                $bon->__SET('estado', $r->estado);

                $result[] = $bon;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function regControlBonos(Control_Bonos $bon)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_control_bonos(nombre, valor, estado)
                VALUES (?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                $bon->__GET('nombre'),
                $bon->__GET('valor'),
                $bon->__GET('estado')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getControlBonos($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos where id_bono= ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $cb = new Control_Bonos();

                //_SET(CAMPOBD, atributoEntidad)
                $cb->__SET('id_bono', $r->id_bono);
                $cb->__SET('nombre', $r->nombre);
                $cb->__SET('valor', $r->valor);
                $cb->__SET('estado', $r->estado);
            

            $this->myCon = parent::desconectar();
            return $cb;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editControlBonos(Control_Bonos $bon)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_control_bonos SET
                    nombre= ?,
                    valor= ?,
                    estado=?
                WHERE id_bono = ?";

            $this->myCon->prepare($sql)
            ->execute(
            array(
                $bon->__GET('nombre'),
                $bon->__GET('valor'),
                $bon->__GET('estado'),
                $bon->__GET('id_bono')          
            ));
            

            $this->myCon = parent::desconectar();
            
        } catch (Exception $e) {
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteControlBono($idCb)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "DELETE FROM dbkermesse.tbl_control_bonos WHERE id_bono = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idCb));
            $this->myCon = parent::desconectar();
            
        } 
        catch (Exception $e) 
        {
            var_dump($e);
            die($e->getMessage());
        }
    }
}
