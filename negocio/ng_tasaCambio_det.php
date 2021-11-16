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
                $tcd->__SET('id_tasaCambio', $_POST['id_tasaCambio2']);
                $tcd->__SET('fecha', $_POST['fecha']);
                $tcd->__SET('tipo_cambio', $_POST['tipoCambio']);

                $dtTcd->regTasasDet($tcd);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_tasaCambioDetalles.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_tasaCambio.php?msj=2");
                die($e->getMessage());
            }
            break;
            /*
        case '2':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tc->__SET('id_monedaO', $_POST['id_monedaO']);
                $tc->__SET('id_monedaC', $_POST['id_monedaC']);
                $tc->__SET('mes', $_POST['mes']);
                $tc->__SET('anio', $_POST['anio']);

                $p->__SET('id_producto', $_POST['id_producto']);
                //$dtP->editProducto($p);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=4");
                die($e->getMessage());
            }
            break;*/
    }
}

if ($_GET) {
    try {
        $p->__SET('id_producto', $_GET['delP']);
        $dtP->desactivarProducto($p->__GET('id_producto'));

        header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=6");
        die($e->getMessage());
    }
}
