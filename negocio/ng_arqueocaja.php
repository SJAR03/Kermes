<?php

    include_once("../Entidades/vw_arqueocaja.php");
    include_once("../Datos/dt_arqueocaja.php.php");

    $ic = new vw_Arqueo_Caja();
    $dtIC = new dt_arqueocaja;

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
                    $ic->__SET('id_ArqueoCaja', $_POST['id_ArqueoCaja']);
                    $ic->__SET('idKermesse', $_POST['idKermesse']);
                    $ic->__SET('kermesse', $_POST['kermesse']);
                    $ic->__SET('fechaArqueo', $_POST['fechaArqueo']);
                    $ic->__SET('granTotal', $_POST['granTotal']);
                    $ic->__SET('usuario_creacion', $_POST['usuario_creacion']);
                    $ic->__SET('fecha_creacion', $_POST['fecha_creacion']);
                    $ic->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                    $ic->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                    $ic->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                    $ic->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']);
                    $ic->__SET('estado', $_POST['estado']);
                    $dtIC-> regarqueocaja($ic);
                    //var_dump($emp);
                    header("Location: /Kermes/pages/Catalogos/tbl_arqueocaja.php?msj=1");
                }
                catch (Exception $e) {
                    header("Location: /Kermes/pages/Catalogos/tbl_arqueocaja.php?msj=2");   
                die($e->getMessage());
                }
            case '2':
                break;
            

        }
    }

    if ($__GET)
    {
        try
        {
            $ic->__SET('id_ArqueoCaja', $__GET['']);
        }
    }
?>