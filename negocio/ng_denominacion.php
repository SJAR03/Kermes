<?php
    include_once("../Entidades/denominacion.php");
    include_once("../Datos/dt_denominacion.php");

    $d = new VwDenominacion();
    $dtD = new Dt_Denominacion();

    if ($_POST)
    {
        $varAccion = $_POST['txtaccion'];

        switch ($varAccion)
        {
            case '1':
                try
                {
                    // Construir el objeto denominacion
                    $d->__SET('idMoneda', $_POST['moneda']);
                    $d->__SET('valor', $_POST['valor']);
                    $d->__SET('valor_letras', $_POST['valor_letras']);

                    $dtD->registrarDenominacion($d);
                    header("Location: /Kermes/pages/Catalogos/tbl_denominacion.php?msj=1");
                }
                catch (Exception $e)
                {
                    header("Location: /Kermes/pages/Catalogos/tbl_denominacion.php?msj=2");
                    die($e->getMessage());
                }
                break;

            default:
                // code...
                break;
        }
    }
?>
