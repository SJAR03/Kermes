<?php
include_once("../Entidades/opciones.php");
include_once("../Datos/dt_opciones.php");

$o = new opciones();
$dtO = new dt_opciones();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                // Construir el objeto opcion
                $o->__SET('opcion_descripcion', $_POST['opcion_descripcion']);

                $dtO->registerOpciones($o);
                header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=2");
                die($e->getMessage());
            }
            break;

        case '2':
            try {
                // Construir el objeto opcion
                $o->__SET('id_opciones', $_POST['id_opciones']);
                $o->__SET('opcion_descripcion', $_POST['opcion_descripcion']);

                $dtO->editarOpciones($o);
                header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=4");
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
        $o->__SET('id_opciones', $_GET['delOpc']);
        $dtO->deleteOpciones($o->__GET('id_opciones'));
        header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_opciones.php?msj=6");
        die($e->getMessage());
    }
}
