<?php

include_once("../Entidades/gastos.php");
include_once("../Datos/dt_gastos.php");

$k = new gastos; 
$dtk = new dt_gastos; 

if($_POST){
    $varAccion = $_POST['txtaccion'];

    switch($varAccion){
        case '1': 
            try{
                $k->__SET('idKermesse', $_POST['idKermesse']);
                $k->__SET('idCatGastos', $_POST['idCatGastos']);
                $k->__SET('fechaGasto', $_POST['fechaGasto']);
                $k->__SET('concepto', $_POST['concepto']);
                $k->__SET('monto', $_POST['monto']);
                //$k->__SET('usuario_creacion', $_POST['stUsuarioCreo']);
                //$k->__SET('fecha_creacion', $_POST['txtFechaCreo']);

                $dtk->regGastos($k);
                header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=1");
            }catch(Exception $e){
                header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=2");
                die($e->getMessage()); 
            }    
        break; 

        case '2':
            try{
                $k->__SET('id_registro_gastos', $_POST['id_registro_gastos']);
                $k->__SET('idKermesse', $_POST['idKermesse']);
                $k->__SET('idCatGastos', $_POST['idCatGastos']);
                $k->__SET('fechaGasto', $_POST['fechaGasto']);
                $k->__SET('concepto', $_POST['concepto']);
                $k->__SET('monto', $_POST['monto']);

                $dtk->UpdateGastos($k);
                header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=3");
            }catch(Exception $e){
                header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=4");
                die($e->getMessage()); 
            }
        break;
    }
}
if($_GET){
    try{
        $k->__SET('id_registro_gastos', $_GET['delG']);
        $dtk->eliminarGasto($k->__GET('id_registro_gastos'));
        header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=5");
    }catch(Exception $e){
        header("Location: /Kermes/pages/Catalogos/tbl_gastos.php?msj=6");
        die($e->getMessage()); 
    }  
}