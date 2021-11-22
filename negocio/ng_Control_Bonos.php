<?php

include_once("../Entidades/control_bonos.php");
include_once("../Datos/dt_Control_Bonos.php");

$cb = new Control_Bonos();
$dtCB = new Dt_Control_Bonos;

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
                $cb->__SET('nombre', $_POST['nombre']);
                $cb->__SET('valor', $_POST['valor']);
                $cb->__SET('estado', $_POST['estado']);

                $dtCB-> regControlBonos($cb);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=2");   
            die($e->getMessage());
            }
            break;

            case '2':
                try
                {
                    //CONSTRUIMOS OBJETOS
                    //ATRIBUTO ENTIDAD  //NAME DEL CONTROL
                    $cb->__SET('id_bono', $_POST['id_bono']); 
                    $cb->__SET('nombre', $_POST['nombre']);
                    $cb->__SET('valor', $_POST['valor']);
                    $cb->__SET('estado', $_POST['estado']);
                    
                    
    
                    $dtCB ->editControlBonos($cb);
                    //var_dump($emp);
                    header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=3");
                }
                catch(Exception $e)
                {
                    header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=4");
                    die($e -> getMessage());
                }
                break;
    }
}

if($_GET)
{
    try
    {
        $cb->__SET('id_bono', $_GET['delCb']);
        $dtCB->deleteControlBono($cb->__GET('id_bono'));
        header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermes/pages/Catalogos/tbl_control_bonos.php?msj=6");
        die($e->getMessage());
    }
        
    
}