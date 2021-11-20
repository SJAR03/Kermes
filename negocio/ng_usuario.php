<?php
include_once("../Entidades/usuario.php");
include_once("../Datos/dt_usuario.php");

$u = new usuario();
$dtU = new dt_usuario();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                // Construir el objeto usuario
                $u->__SET('usuario', $_POST['usuario']);
                $u->__SET('pwd', $_POST['pwd']);
                $u->__SET('nombres', $_POST['nombres']);
                $u->__SET('apellidos', $_POST['apellidos']);
                $u->__SET('email', $_POST['email']);

                $dtU->registrarUsuario($u);
                header("Location: /Kermes/pages/Catalogos/tbl_usuarios.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_usuarios.php?msj=2");
                die($e->getMessage());
            }
            break;

        case '2':
            try {
                // Construir el objeto usuario
                $u->__SET('id_usuario', $_POST['id_usuario']);
                $u->__SET('usuario', $_POST['usuario']);
                $u->__SET('nombres', $_POST['nombres']);
                $u->__SET('apellidos', $_POST['apellidos']);
                $u->__SET('email', $_POST['email']);
                $u->__SET('pwd', $_POST['pwd']);

                $dtU->editarUsuario($u);
                header("Location: /Kermes/pages/Catalogos/tbl_usuarios.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_usuario.php?msj=4");
                die($e->getMessage());
            }
            break;

        default:
            // code...
            break;
    }
}
