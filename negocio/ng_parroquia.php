<?php

include_once("../Entidades/parroquia.php");
include_once("../Datos/dt_parroquia.php");

$com = new Parroquia();
$dtComu = new Dt_Parroquia;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('direccion', $_POST['direccion']);
                $com->__SET('telefono', $_POST['telefono']);
                $com->__SET('parroco', $_POST['parroco']);
                $com->__SET('logo', $_POST['logo']);
                $com->__SET('sitio_web', $_POST['sitio_web']);

                $dtComu->regParroquia($com);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=2");
                die($e->getMessage());
            }
        case '2':
            try {
                $com->__SET('idParroquia', $_POST['idParroquia']);
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('direccion', $_POST['direccion']);
                $com->__SET('telefono', $_POST['telefono']);
                $com->__SET('parroco', $_POST['parroco']);
                $com->__SET('logo', $_POST['logo']);
                $com->__SET('sitio_web', $_POST['sitio_web']);
                $dtComu->UpdateParroquia($com);
                header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}
if($_GET){
    try{
        $com->__SET('idParroquia', $_GET['delP']);
        $dtComu->eliminarParroquia($com->__GET('idParroquia'));
        header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=5");
    }catch(Exception $e){
        header("Location: /Kermes/pages/Catalogos/tbl_parroquia.php?msj=6");
        die($e->getMessage()); 
    }  
}