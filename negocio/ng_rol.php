<?php
include_once("../Entidades/rol.php");
include_once("../Datos/dt_rol.php");

$r = new rol();
$dtR = new dt_rol();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                // Construir el objeto rol
                $r->__SET('rol_descripcion', $_POST['rol_descripcion']);

                $dtR->registerRol($r);
                header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=2");
                die($e->getMessage());
            }
            break;

        case '2':
            try {
                // Construir el objeto rol
                $r->__SET('id_rol', $_POST['id_rol']);
                $r->__SET('rol_descripcion', $_POST['rol_descripcion']);

                $dtR->editarRol($r);
                header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=4");
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
        $r->__SET('id_rol', $_GET['delRol']);
        $dtR->deleteRol($r->__GET('id_rol'));
        header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_rol.php?msj=6");
        die($e->getMessage());
    }
}
