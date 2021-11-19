<?php

include_once("../Entidades/lista_precio.php");
include_once("../Datos/dt_lista_precio.php");

$icd = new lista_precio();
$dtICD = new dt_lista_precio();

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
                $icd->__SET('id_kermesse', $_POST['id_kermesse']);
                $icd->__SET('nombre', $_POST['nombre']);
                $icd->__SET('descripcion', $_POST['descripcion']);
                $icd->__SET('estado', $_POST['estado']);

                $dtICD-> regListaPrecio($icd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_lista_precio.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_lista_precio.php?msj=2");   
            die($e->getMessage());
        }
    }
}