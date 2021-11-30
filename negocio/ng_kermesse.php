<?php

include_once("../Entidades/kermesse.php");
include_once("../Datos/dt_kermesse.php");

$k = new Kermesse;
$dtk = new Dt_Kermesse;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                $k->__SET('idParroquia', $_POST['idParroquia']);
                $k->__SET('nombre', $_POST['nombre']);
                $k->__SET('fInicio', $_POST['fInicio']);
                $k->__SET('fFinal', $_POST['fFinal']);
                $k->__SET('descripcion', $_POST['descripcion']);
                //$k->__SET('usuario_creacion', $_POST['stUsuarioCreo']);
                //$k->__SET('fecha_creacion', $_POST['txtFechaCreo']);

                $dtk->regKermesse($k);
                header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=2");
                die($e->getMessage());
            }
            break;

        case '2':
            try {
                $k->__SET('id_kermesse', $_POST['id_kermesse']);
                $k->__SET('idParroquia', $_POST['idParroquia']);
                $k->__SET('nombre', $_POST['nombre']);
                $k->__SET('fInicio', $_POST['fInicio']);
                $k->__SET('fFinal', $_POST['fFinal']);
                $k->__SET('descripcion', $_POST['descripcion']);

                $dtk->UpdateKermesse($k);
                header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}
if ($_GET) {
    try {
        $k->__SET('id_kermesse', $_GET['delK']);
        $dtk->eliminarKermesse($k->__GET('id_kermesse'));
        header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_kermesse.php?msj=6");
        die($e->getMessage());
    }
}
