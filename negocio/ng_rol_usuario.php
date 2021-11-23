<?php

include_once("../Entidades/rol_usuario.php");
include_once("../Datos/dt_rol_usuario.php");

include_once("../Entidades/usuario.php");
include_once("../Datos/dt_usuario.php");

include_once("../Entidades/rol.php");
include_once("../Datos/dt_rol.php");

$rou = new rol_usuario();
$dtRO = new dt_rol_usuario();

$u = new usuario();
$dtU = new dt_usuario();

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
                $rou->__SET('tbl_usuario_id_usuario', $_POST['id_usuario']);
                $rou->__SET('tbl_rol_id_rol', $_POST['id_rol']);

                $dtRO->regRolUsuario($rou);
                header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=2");
                die($e->getMessage());
            }
            break;


        case '2':
            try {
                //CONSTRUIMOS OBJETOS
                //ATRIBUTO ENTIDAD  //NAME DEL CONTROL
                $rou->__SET('tbl_rol_id_rol', $_POST['tbl_rol_id_rol']);
                $rou->__SET('tbl_usuario_id_usuario', $_POST['tbl_usuario_id_usuario']);
                $rou->__SET('id_rol_usuario', $_POST['id_rol_usuario']);



                $dtRO->editRolUsuario($rou);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=4");
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
        $rou->__SET('id_rol_usuario', $_GET['delRU']);
        $dtRO->deleteRolUsuario($rou->__GET('id_rol_usuario'));
        header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_rol_usuario.php?msj=6");
        die($e->getMessage());
    }
}
