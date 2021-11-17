<?php

include_once("../Entidades/categoria_gastos.php");
include_once("../Datos/dt_categoria_gastos.php");

$com = new categoria_gastos();
$dtComu = new dt_categoria_gastos;

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion)
    {
        case '1':
            try
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $com->__SET('nombre_categoria', $_POST['nombre_categoria']);
                $com->__SET('descripcion', $_POST['descripcion']);
                $com->__SET('estado', $_POST['estado']);

                $dtComu-> regCategoriaGastos($com);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_gastos.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_categoria_gastos.php?msj=2");   
            die($e->getMessage());
            }
        case '2':
            break;
    }
}