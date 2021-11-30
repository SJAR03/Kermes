<?php

include_once("../Entidades/ingreso_comunidad.php");
include_once("../Datos/dt_ingreso_comunidad.php");

include_once("../Entidades/ingreso_comunidad_det.php");
include_once("../Datos/dt_ingreso_comunidad_det.php");

$ic = new Ingreso_Comunidad();
$dtIC = new Dt_Ingreso_Comunidad;

$icd = new Ingreso_Comunidad_Det();
$dtICD = new Dt_Ingreso_Comunidad_Det;

if ($_POST)
{
    $varAccion = $_POST['txtaccion'];

    switch($varAccion)
    {
        case '1':
            try
            {
                //GUARDAR DATOS, BOTON INGRESAR
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $ic->__SET('id_kermesse', $_POST['id_kermesse']);
                $ic->__SET('id_comunidad', $_POST['id_comunidad']);
                $ic->__SET('id_producto', $_POST['id_producto']);
                $ic->__SET('cant_productos', $_POST['cant_productos']);
                /* $icd->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']); */
                /* $icd->__SET('id_bono', $_POST['id_bono']);
                $icd->__SET('denominacion', $_POST['denominacion']);
                $icd->__SET('cantidad', $_POST['cantidad']);
                $icd->__SET('subtotal_bono', $_POST['subtotal_bono']);*/
                $ic->__SET('total_bonos', $_POST['total_bonos']);
                /* $ic->__SET('estado', $_POST['estado']); 
                $ic->__SET('usuario_creacion', $_POST['usuario_creacion']); 
                $ic->__SET('fecha_creacion', $_POST['fecha_creacion']); */ 
                /* $ic->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                $ic->__SET('fecha_modificacion', $_POST['fecha_modificacion']);
                $ic->__SET('usuario_eliminacion', $_POST['usuario_eliminacion']);
                $ic->__SET('fecha_eliminacion', $_POST['fecha_eliminacion']); */
                
                
                $dtIC-> regIngComunidad($ic);
                /* $dtICD-> regIngComunidadDet($icd);  */
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/frm_ingreso_comunidad.php?msj=1");
                /* header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad_det.php?msj=1");  */
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/frm_ingreso_comunidad.php?msj=2");
                /* header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad_det.php?msj=2");   */ 
            die($e->getMessage());
            }
            break;
            
        
            case '2':
                try
                {
                    //EDITAR DATOS, BOTON EDITAR
                    //CONSTRUIMOS OBJETOS
                    //ATRIBUTO ENTIDAD  //NAME DEL CONTROL
                    $ic->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']); 
                    $ic->__SET('id_kermesse', $_POST['id_kermesse']);
                    $ic->__SET('id_comunidad', $_POST['id_comunidad']);
                    $ic->__SET('id_producto', $_POST['id_producto']);
                    $ic->__SET('cant_productos', $_POST['cant_productos']);
                    /* $ic->__SET('id_ingreso_comunidad', $_POST['id_ingreso_comunidad']);  */
                    /* $ic->__SET('id_bono', $_POST['id_bono']);
                    $ic->__SET('denominacion', $_POST['denominacion']);
                    $ic->__SET('cantidad', $_POST['cantidad']);
                    $ic->__SET('subtotal_bono', $_POST['subtotal_bono']); */
                    $ic->__SET('total_bonos', $_POST['total_bonos']);
                    $ic->__SET('estado', $_POST['estado']);
                   /*  $ic->__SET('usuario_modificacion', $_POST['usuario_modificacion']);
                    $ic->__SET('fecha_modificacion', $_POST['fecha_modificacion']); */
                    
    
                    $dtIC ->editIngComunidad($ic);
                    //var_dump($emp);
                    header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad.php?msj=3");
                }
                catch(Exception $e)
                {
                    header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad.php?msj=4");
                    die($e -> getMessage());
                }
                break;
        

    }
}

if($_GET)
{
    try
    {
        //ELIMINAR DATOS, BOTON ELIMINAR
        $ic->__SET('id_ingreso_comunidad', $_GET['delIC']);
        $dtIC->deleteIngComunidad($ic->__GET('id_ingreso_comunidad'));
        header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermes/pages/Catalogos/tbl_ingreso_comunidad.php?msj=6");
        die($e->getMessage());
    }
        
    
}