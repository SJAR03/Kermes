<?php

include_once("../Entidades/comunidad.php");
include_once("../Datos/dt_Comunidad.php");

$com = new Comunidad();
$dtComu = new Dt_Comunidad;

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
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('responsable', $_POST['responsable']);
                $com->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $com->__SET('estado', $_POST['estado']);

                $dtComu-> regComunidad($com);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=2");   
            die($e->getMessage());
        }
    }
}