<?php
include_once("Conexion.php");

class Dt_Ingreso_Comunidad_Det extends Conexion
{
    private $myCon;
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
}