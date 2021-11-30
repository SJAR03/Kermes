<?php

include_once("../Entidades/listaprecio_det.php");
include_once("../Datos/dt_listaprecio_det.php");

$icd = new listaprecio_det();
$dtICD = new dt_listaprecioDet();

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
                $icd->__SET('id_lista_precio', $_POST['id_lista_precio']);
                $icd->__SET('id_producto', $_POST['id_producto']);
                $icd->__SET('precio_venta', $_POST['precio_venta']);

                $dtICD-> regListaPrecioDet($icd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_listaprecio_Det.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_lista_precio.php?msj=2");   
            die($e->getMessage());
        }
        break;
        
        case '2':
            try {
                $icd->__SET('id_listaprecio_det', $_POST['id_listaprecio_det']);
                $icd->__SET('id_lista_precio', $_POST['id_lista_precio']);
                $icd->__SET('id_producto', $_POST['id_producto']);
                $icd->__SET('precio_venta', $_POST['precio_venta']);
                $dtICD->UpdateListaPrecioDet($icd);
                header("Location: /Kermes/pages/Catalogos/tbl_lista_precio.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_lista_precio.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}