<?php

include_once("../Entidades/rol_opciones.php");
include_once("../Datos/dt_rol_opciones.php");

include_once("../Entidades/opciones.php");
include_once("../Datos/dt_opciones.php");

include_once("../Entidades/rol.php");
include_once("../Datos/dt_rol.php");

$rou = new rol_opciones();
$dtRO = new dt_rol_opciones();

$o = new opciones();
$dtO = new dt_opciones();

$r = new rol();
$dtR = new dt_rol();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //GUARDAR DATOS, BOTON INGRESAR
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $rou->__SET('tbl_opciones_id_opciones', $_POST['id_opciones']);
                $rou->__SET('tbl_rol_id_rol', $_POST['id_rol']);

                $dtRO->regRolOpcion($rou);
                header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=2");
                die($e->getMessage());
            }
            break;


        case '2':
            try {
                //CONSTRUIMOS OBJETOS
                //ATRIBUTO ENTIDAD  //NAME DEL CONTROL
                $rou->__SET('id_rol_opciones', $_POST['id_rol_opciones']);
                $rou->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $rou->__SET('tbl_opciones_id_opciones', $_POST['tbl_opciones_id_opciones']);

                $dtRO->editRolOpciones($rou);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=4");
                die($e->getMessage());
            }
            break;

        default:
            // code...
            break;
    }
}

if ($_GET) {
    try {
        $rou->__SET('id_rol_opciones', $_GET['delRO']);
        $dtRO->deleteRolOpciones($rou->__GET('id_rol_opciones'));
        header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_rol_opciones.php?msj=6");
        die($e->getMessage());
    }
}
