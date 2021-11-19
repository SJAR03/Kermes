<?php
    include_once("../Entidades/moneda.php");
    include_once("../Datos/dt_moneda.php");

    $m = new Moneda();
    $dtM = new Dt_Moneda();

    if ($_POST)
    {
        $varAccion = $_POST['txtaccion'];

        switch ($varAccion)
        {
            case '1':
                try
                {
                    // Construir el objeto moneda
                    $m->__SET('nombre', $_POST['nombre']);
                    $m->__SET('simbolo', $_POST['simbolo']);

                    $dtM->registrarMoneda($m);
                    header("Location: /Kermes/pages/Catalogos/tbl_moneda.php?msj=1");
                }
                catch (Exception $e)
                {
                    header("Location: /Kermes/pages/Catalogos/tbl_moneda.php?msj=2");
                    die($e->getMessage());
                }
                break;

            case '2':
                try
                {
                    // Construir el objeto moneda
                    $m->__SET('id', $_POST['moneda_ID']);
                    $m->__SET('nombre', $_POST['nombre']);
                    $m->__SET('simbolo', $_POST['simbolo']);

                    $dtM->editarMoneda($m);
                    header("Location: /Kermes/pages/Catalogos/tbl_moneda.php?msj=3");
                }
                catch (Exception $e)
                {
                    header("Location: /Kermes/pages/Catalogos/tbl_moneda.php?msj=4");
                    die($e->getMessage());
                }
                break;

            default:
                // code...
                break;
        }
    }
?>
