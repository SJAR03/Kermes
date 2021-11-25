<?php

include_once("../Entidades/comunidad.php");
include_once("../Datos/dt_Comunidad.php");

$com = new Comunidad();
$dtComu = new Dt_Comunidad;

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
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('responsable', $_POST['responsable']);
                $com->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $com->__SET('estado', $_POST['estado']);

                $dtComu-> regComunidad($com);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=1");
            }
            catch (Exception $e) {
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=2");   
                die($e->getMessage());
            }
            break;

        case '2':
            try
            {
                //EDITAR DATOS, BOTON EDITAR
                //CONSTRUIMOS OBJETOS
                //ATRIBUTO ENTIDAD  //NAME DEL CONTROL
                $com->__SET('id_comunidad', $_POST['id_comunidad']); 
                $com->__SET('nombre', $_POST['nombre']);
                $com->__SET('responsable', $_POST['responsable']);
                $com->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $com->__SET('estado', $_POST['estado']);
                
                

                $dtComu ->editComunidad($com);
                //var_dump($emp);
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=3");
            }
            catch(Exception $e)
            {
                header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=4");
                die($e -> getMessage());
            }
            break;
      /*   default:
            # code...
            break; */
    }
}

if($_GET)
{
    try
    {
        //ELIMINAR DATOS, BOTON ELIMINAR
        $com->__SET('id_comunidad', $_GET['delCom']);
        $dtComu->deleteComunidad($com->__GET('id_comunidad'));
        header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /Kermes/pages/Catalogos/tbl_comunidad.php?msj=6");
        die($e->getMessage());
    }
        
    
}