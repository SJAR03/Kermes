<?php
include_once("../Entidades/tasaCambio.php");
include_once("../Datos/dt_tasaCambio.php");

$tc = new TasaCambio;
$dtTc = new Dt_TasaCambio;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $tc->__SET('id_monedaO', $_POST['id_monedaO']);
                $tc->__SET('id_monedaC', $_POST['id_monedaC']);
                $tc->__SET('mes', $_POST['mes']);
                $tc->__SET('anio', $_POST['anio']);

                $dtTc->regTasas($tc);
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
                $tc->__SET('id_monedaO', $_POST['id_monedaO']);
                $tc->__SET('id_monedaC', $_POST['id_monedaC']);
                $tc->__SET('mes', $_POST['mes']);
                $tc->__SET('anio', $_POST['anio']);

                $tc->__SET('id_tasaCambio', $_POST['id_tasaCambio']);

                $dtTc->editTasa($tc);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_tasaCambio.php?msj=3");
            } catch (Exception $e) {
                header("Location:  /Kermes/pages/Catalogos/tbl_tasaCambio.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $tc->__SET('id_tasaCambio', $_GET['delTC']);
        $dtTc->desactivarTasa($tc->__GET('id_tasaCambio'));

        header("Location: /Kermes/pages/Catalogos/tbl_tasaCambio.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_tasaCambio.php?msj=6");
        die($e->getMessage());
    }
}
