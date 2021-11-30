<?php

    include_once("../Entidades/vw_arqueocaja.php");
    include_once("../Datos/dt_arqueocaja.php");
    include_once("../Entidades/arqueoCajaDetalles.php");
    include_once("../Datos/dt_arqueoDetalle.php");

    $ic = new vw_Arqueo_Caja();
    $dtIC = new dt_arqueocaja;

    $arqDetalle = new ArqueoDetalle();


    if ($_POST)
    {
        $varAccion = $_POST['txtaccion'];

        switch($varAccion)
        {
            case '1':
                try
                {
                    //CONSTRUIMOS EL MAESTRO DEL ARQUEO CON EL TOTAL
                    $ic->__SET('idKermesse', $_POST['id_kermesse']);
                    $ic->__SET('granTotal', $_POST['granTotal']);

                    // CONSTRUIMOS EL DETALLE DEL ARQUEO
                    print_r($_POST['tablaDetalles']);

                    $dtIC-> regarqueocaja($ic);
                    //var_dump($emp);
                    // header("Location: /Kermes/pages/Catalogos/tbl_arqueocaja.php?msj=1");
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
    }
?>