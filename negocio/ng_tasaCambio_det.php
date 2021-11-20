<?php
include_once("../Entidades/tasaCambioDetalles.php");
include_once("../Datos/dt_tasaCambio_detalle.php");

$tcd = new TasaCambioDetalle;
$dtTcd = new Dt_TasaCambioDet;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcd->__SET('fecha', $_POST['fecha']);
                $tcd->__SET('tipo_cambio', $_POST['tipoCambio']);
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio2']);

                $dtTcd->regTasasDet($tcd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_tasaCambioDetalles.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_tasaCambio.php?msj=2");
                die($e->getMessage());
            }
            break;

        case '2':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio1']);
                $tcd->__SET('id_tasaCambio_det', $_POST['id_tasaCambio2']);
                $tcd->__SET('fecha', $_POST['fecha']);
                $tcd->__SET('tipo_cambio', $_POST['tipoCambio']);
                $dtTcd->editTasaDetalle($tcd);

                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=4");
                die($e->getMessage());
            }
            break;

            //Ingresar dentro de tasa existente
        case '3':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio2']);
                $tcd->__SET('fecha', $_POST['fecha']);
                $tcd->__SET('tipo_cambio', $_POST['tipoCambio']);

                $dtTcd->regTasasDet($tcd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=2");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $tcd->__SET('id_tasaCambio_det', $_GET['delTCD']);
        $tcd->__SET('id_tasaCambio', $_GET['TC']);
        $dtTcd->desactivarTasaDet($tcd->__GET('id_tasaCambio_det'));

        header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/frm_edit_tasaCambio.php?editTC={$tcd->__GET('id_tasaCambio')}&msj=6");
        die($e->getMessage());
    }
}
