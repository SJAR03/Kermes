<?php

include '../../Entidades/rol_usuario.php';
include '../../Datos/dt_rol_usuario.php';

include '../../Entidades/usuario.php';
include '../../Datos/dt_usuario.php';

include '../../Entidades/rol.php';
include '../../Datos/dt_rol.php';

include '../../Entidades/opciones.php';
include '../../Datos/dt_opciones.php';

//SEGURIDAD//

$usuario = new Usuario();
$rol = new Rol();
$listOpc = new Opciones();
//DATOS
$dtr = new Dt_Rol();
$dtOpc = new Dt_Opciones();

//MANEJO Y CONTROL DE LA SESION
session_start(); // INICIAMOS LA SESION

//VALIDAMOS SI LA SESION ESTÁ VACÍA
if (empty($_SESSION['acceso'])) {
    //nos envía al inicio
    header("Location: ../../login.php?msj=2");
}

$usuario = $_SESSION['acceso']; // OBTENEMOS EL VALOR DE LA SESION

//OBTENEMOS EL ROL
$rol->__SET('id_rol', $dtr->getIdRol($usuario[0]->__GET('usuario')));

//OBTENEMOS LAS OPCIONES DEL ROL
$listOpc = $dtOpc->getOpciones($rol->__GET('id_rol'));

//OBTENEMOS LA OPCION ACTUAL
$url = $_SERVER['REQUEST_URI'];
// var_dump($url);
$inicio = strrpos($url, '/') + 1;
// var_dump($inicio); //6
// $total= strlen($url); 
// var_dump($total); //28
$fin = strripos($url, '?');
// var_dump($fin); //22
if ($fin > 0) {
    $miPagina = substr($url, $inicio, $fin - $inicio);
    // var_dump($miPagina);
} else {
    $miPagina = substr($url, $inicio);
    // var_dump($miPagina);
}

////// VALIDAMOS LA OPCIÓN ACTUAL CON LA MATRIZ DE OPCIONES //////
//obtenemos el numero de elementos
$longitud = count($listOpc);
$acceso = false; // VARIABLE DE CONTROL

//Recorro todos los elementos de la matriz de opciones
for ($i = 0; $i < $longitud; $i++) {
    //obtengo el valor de cada elemento
    $opcion = $listOpc[$i]->__GET('opcion_descripcion');
    if (strcmp($miPagina, $opcion) == 0) //COMPARO LA OPCION ACTUAL CON CADA OPCIÓN DE LA MATRIZ
    {
        $acceso = true; //ACCESO CONCEDIDO
        break;
    }
}

if (!$acceso) {
    //ACCESO NO CONCEDIDO 
    header("Location: ../../401.php"); //REDIRECCIONAMOS A LA PAGINA DE ACCESO RESTRINGIDO
}

// 

$dtU = new dt_usuario();
$dtR = new dt_rol();
$dtRU = new dt_rol_usuario();
$RU = new rol_usuario();


$varIdRU = 0;

if (isset($varIdRU)) {
    $varIdRU = $_GET['vieRoUsu'];
}

$RU = $dtRU->getRolUsuario($varIdRU);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kermesse | Visualizar de Rol Usuario</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-Message Start -->
                <!-- <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div> -->
                <!-- Message End -->
                <!-- </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">-->
                <!-- Message Start -->
                <!-- <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div> -->
                <!-- Message End -->
                <!--  </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"> -->
                <!-- Message Start -->
                <!-- <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div> -->
                <!-- Message End -->
                <!-- </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> -->
                <!-- Notifications Dropdown Menu -->
                <!--<li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../../login.php" title="Cerrar Sesión">
                        <i class="fas fa-power-off"></i>&nbsp;Cerrar Sesión
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shield-alt"></i>
                                <p>
                                    Seguridad
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_usuarios.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios (Admin Seg)</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_rol_usuario.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rol Usuario(Admin Seg)</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_rol.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rol (Admin Seg)</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_rol_opciones.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rol Opciones(Admin Seg)</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_opciones.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Opciones (Admin Seg)</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-money-bill-alt"></i>
                                <p>
                                    Gastos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_categoria_gastos.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categoría Gastos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_gastos.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gastos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Lista de Precios
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_lista_precio.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista Precios</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    Productos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_categoria_producto.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categoría Producto</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_productos.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Ingreso Comunidad
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_ingreso_comunidad.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ingreso Comunidad</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_comunidad.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Comunidad</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_control_bonos.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Control de Bonos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Control de Caja
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_arqueocaja.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Arqueo Caja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_denominacion.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Denominación</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_moneda.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Moneda</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_tasaCambio.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tasa Cambio</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-store-alt"></i>
                                <p>
                                    Kermesse
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_kermesse.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kermesse</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="../Catalogos/tbl_parroquia.php" class="nav-link" target="blank">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Parroquia</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Visualizar Rol de Usuario</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Visualizar Rol de Usuario</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Visualizar Rol de Usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="../../negocio/ng_rol_usuario.php">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="int" value="<?php echo $RU->__GET('id_rol_usuario') ?>" class="form-control" id="id_rol_usuario" name="id_rol_usuario" maxlength="45" placeholder="Ingrese ID" title="Ingrese ID " readonly required>

                                        </div>

                                        <div class="form-group">
                                            <label>Selecciona el rol</label>
                                            <select class="form-control" name="tbl_rol_id_rol" id="tbl_rol_id_rol" required disabled>
                                                <option value="">Seleccione...</option>

                                                <?php foreach ($dtR->listaRol() as $r) : ?>
                                                    <tr>
                                                        <option value="<?php echo $r->__GET('id_rol'); ?>"><?php echo $r->__GET('rol_descripcion'); ?></option>
                                                    </tr>


                                                <?php endforeach; ?>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Selecciona el usuario</label>
                                            <select class="form-control" name="tbl_usuario_id_usuario" id="tbl_usuario_id_usuario" required disabled>
                                                <option value="">Seleccione...</option>

                                                <?php foreach ($dtU->listaUsu() as $r) : ?>
                                                    <tr>
                                                        <option value="<?php echo $r->__GET('id_usuario'); ?>"><?php echo $r->__GET('usuario'); ?></option>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>

                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer" style="text-align: center;">
                                        <a href="tbl_rol_usuario.php" title="Regresar a la página anterior"><i class="fas fa-2x fa-undo-alt"></i></a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-rc
            </div>
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        ///FUNCION PARA CARGAR LOS VALORES EN LOS CONTROLES
        function setValores() {
            $("#id_rol_usuario").val("<?php echo $RU->__GET('id_rol_usuario') ?>");
            $("#tbl_usuario_id_usuario").val("<?php echo $RU->__GET('tbl_usuario_id_usuario') ?>");
            $("#tbl_rol_id_rol").val("<?php echo $RU->__GET('tbl_rol_id_rol') ?>");
        }

        $(document).ready(function() {
            ////CARGAMOS LOS VALORES EN LOS CONTROLES
            setValores();
        });
    </script>

</body>

</html>