<?php

include_once("../Entidades/ingreso_comunidad_det.php");
include_once("../Datos/dt_ingreso_comunidad_det.php");

$icd = new Ingreso_Comunidad_Det();
$dtICD = new Dt_Ingreso_Comunidad_Det;

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion)
    {
        case '1':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $icd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);
                $icd->__SET('id_bono', $_POST['id_bono']);
                $icd->__SET('denominacion', $_POST['denominacion']);
                $icd->__SET('cantidad', $_POST['cantidad']);
                $icd->__SET('subtotal_bono', $_POST['subtotal_bono']);

                $dtICD-> regIngComunidadDet($icd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad_det.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad_det.php?msj=2");   
            die($e->getMessage());
        }
    }
}