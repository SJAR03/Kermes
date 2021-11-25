<?php
include_once("Conexion.php");

class Dt_Ingreso_Comunidad_Det extends Conexion
{
    private $myCon;

    public function listaComunidadDet()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_ingcomdet";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $vicd = new VwIngreso_Comunidad_Det();

                //_SET(CAMPOBD, atributoEntidad)
                $vicd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
                $vicd->__SET('cantproducto', $r->cantproducto);
                $vicd->__SET('nombono', $r->nombono);
                $vicd->__SET('denominacion', $r->denominacion);
                $vicd->__SET('cantidad', $r->cantidad);
                $vicd->__SET('subtotal_bono', $r->subtotal_bono);

                $result[] = $vicd;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    
    public function listaIngresoComunidadDet()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad_det";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $icd = new Ingreso_Comunidad_Det();

                //_SET(CAMPOBD, atributoEntidad)
                $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
                $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $icd->__SET('id_bono', $r->id_bono);
                $icd->__SET('denominacion', $r->denominacion);
                $icd->__SET('cantidad', $r->cantidad);
                $icd->__SET('subtotal_bono', $r->subtotal_bono);

                $result[] = $icd;
            }

            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function regIngComunidadDet(Ingreso_Comunidad_Det $icd)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad_det(id_ingreso_comunidad,id_bono, denominacion, cantidad, subtotal_bono)
                VALUES (?, ?, ?, ?, ?)";

            $this->myCon->prepare($sql)
            ->execute(array(
                /* $com->__GET('id_comunidad'), */
                $icd->__GET('id_ingreso_comunidad'),
                $icd->__GET('id_bono'),
                $icd->__GET('denominacion'),
                $icd->__GET('cantidad'),
                $icd->__GET('subtotal_bono')));

                $this->myCon = parent::desconectar();

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getIngComunidadDet($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "INSERT INTO dbkermesse.tbl_ingreso_comunidad_det(id_ingreso_comunidad_det, id_ingreso_comunidad, id_bono, 
            denominacion, cantidad, subtotal_bono)
            VALUES (?, ?, ?, ?, ?, ?)";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            
                $icd = new Ingreso_Comunidad_Det();

                //_SET(CAMPOBD, atributoEntidad)
                $icd->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
                $icd->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
                $icd->__SET('id_bono', $r->id_bono);
                $icd->__SET('denominacion', $r->denominacion);
                $icd->__SET('cantidad', $r->cantidad);
                $icd->__SET('subtotal_bono', $r->subtotal_bono);
                
                

            $this->myCon = parent::desconectar();
            return $icd;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}