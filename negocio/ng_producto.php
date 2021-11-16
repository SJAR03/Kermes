<?php
include_once("../Entidades/productos.php");
include_once("../Datos/dt_productos.php");

$p = new Productos();
$dtP = new Dt_Producto;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $p->__SET('id_comunidad', $_POST['id_comunidad']);
                $p->__SET('id_cat_producto', $_POST['id_cat_producto']);
                $p->__SET('nombre', $_POST['nombre']);
                $p->__SET('descripcion', $_POST['descripcion']);
                $p->__SET('cantidad', $_POST['cantidad']);
                $p->__SET('preciov_sugerido', $_POST['preciov_sugerido']);

                $dtP->regProducto($p);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=2");
                die($e->getMessage());
            }
            break;
        case '2':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $p->__SET('id_comunidad', $_POST['id_comunidad']);
                $p->__SET('id_cat_producto', $_POST['id_cat_producto']);
                $p->__SET('nombre', $_POST['nombre']);
                $p->__SET('descripcion', $_POST['descripcion']);
                $p->__SET('cantidad', $_POST['cantidad']);
                $p->__SET('preciov_sugerido', $_POST['preciov_sugerido']);

                $p->__SET('id_producto', $_POST['id_producto']);
                $dtP->editProducto($p);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_productos.php?msj=4");
                die($e->getMessage());
            }
            break;
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
