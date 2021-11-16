<?php
include_once("../Entidades/categoria_producto.php");
include_once("../Datos/dt_categoria_producto.php");

$cp = new Categoria_Producto();
$dtCp = new Dt_CategoriaProducto;

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) {
        case '1':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $cp->__SET('nombre', $_POST['nombre']);
                $cp->__SET('descripcion', $_POST['descripcion']);

                $dtCp->regCatProducto($cp);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=1");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=2");
                die($e->getMessage());
            }
            break;
        case '2':
            try {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $cp->__SET('nombre', $_POST['nombre']);
                $cp->__SET('descripcion', $_POST['descripcion']);
                $cp->__SET('id_categoria_producto', $_POST['id_categoria_producto']);

                $dtCp->editCatProducto($cp);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=3");
            } catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $cp->__SET('id_categoria_producto', $_GET['delCP']);
        $dtCp->desactivarCatProducto($cp->__GET('id_categoria_producto'));

        header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=5");
    } catch (Exception $e) {
        header("Location: /Kermes/pages/Catalogos/tbl_categoria_producto.php?msj=6");
        die($e->getMessage());
    }
}
