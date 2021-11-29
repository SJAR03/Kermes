<?php

error_reporting(0);

include '../../Entidades/moneda.php';
include '../../Datos/dt_moneda.php';

include '../../Entidades/vwtasacambiodet.php';
include '../../Datos/dt_tasaCambio_detalle.php';

include '../../Entidades/tasaCambio.php';
include '../../Datos/dt_tasaCambio.php';

//IMPORTAMOS ENTIDADES Y DATOS
include '../../Entidades/vw_usuario.php';
include '../../Entidades/usuario.php';
include '../../Entidades/rol.php';
include '../../Entidades/opciones.php';

include '../../Datos/dt_usuario.php';
include '../../Datos/dt_rol.php';
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

$dtTasaDet = new Dt_TasaCambioDet;
$dtTasa = new Dt_TasaCambio;
$dtMoneda = new Dt_Moneda();

$varMsj = 0;


if (isset($varMsj)) {
  $varMsj = $_GET['msj'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KERMESSE | Registro de tasas de cambio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/jAlert/dist/jAlert.css">
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
              <h1>Nueva Tasa de Cambio</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Registrar tasa de cambio</li>
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
                  <h3 class="card-title">Registrar tasa de cambio</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="../../negocio/ng_tasaCambio.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Moneda origen</label>
                      <select class="form-control" name="id_monedaO" id="id_monedaO">
                        <?php foreach ($dtMoneda->listarMoneda() as $r) : ?>
                          <option value="<?php echo $r->__GET('id') ?>"> <?php echo $r->__GET('nombre'); ?> </option>
                        <?php endforeach; ?>
                      </select>
                      <input type="hidden" value="1" name="txtaccion" id="txtaccion" />
                      <input type="hidden" name="id_tasaCambio" id="id_tasaCambio" />
                    </div>

                    <div class="form-group">
                      <label>Moneda cambio</label>
                      <select class="form-control" name="id_monedaC" id="id_monedaC">
                        <?php foreach ($dtMoneda->listarMoneda() as $r) : ?>
                          <option value="<?php echo $r->__GET('id'); ?>"> <?php echo $r->__GET('nombre'); ?> </option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Mes</label>
                      <input type="text" class="form-control" id="mes" name="mes" maxlength="45" placeholder="Mes" title="Ingrese el mes" required>
                    </div>

                    <div class="form-group">
                      <label>Año</label>
                      <input type="text" class="form-control" id="anio" name="anio" maxlength="45" placeholder="Año" title="Ingrese el año" required>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="gen">Guardar</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>

          </div>

          <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Registrar detalle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Fecha</label>
                      <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" />
                    </div>

                    <div class="form-group">
                      <label>Tipo de cambio</label>
                      <input type="number" class="form-control" id="tipoCambio" name="tipoCambio" maxlength="45" placeholder="Cambio" title="Ingrese el tipo de cambio required">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button id="det" type="submit" class="btn btn-primary" disabled>Guardar</button>
                  </div>
                </form>


              </div>
              <!-- /.card -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Detalles - Tasas de cambio disponibles</h3>
                </div>

                <div class="card-body">
                  <table id="tasaC_det" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Moneda origen</th>
                        <th>Moneda cambio</th>
                        <th>Fecha</th>
                        <th>Tipo de cambio</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($dtTasaDet->listarTasaDetalles($dtTasa->getIdTasa() + 1) as $r) : ?>
                        <tr>
                          <td><?php echo $r->__GET('id_tasaCambio_det'); ?></td>
                          <td><?php echo $r->__GET('moneda_origen'); ?></td>
                          <td><?php echo $r->__GET('moneda_cambio'); ?></td>
                          <td><?php echo $r->__GET('fecha'); ?></td>
                          <td><?php echo $r->__GET('tipo_cambio'); ?></td>
                          <td>
                            <a href="frm_edit_tasaCambioDetalles.php?editTCD=<?php echo $r->__GET('id_tasaCambio_det') ?>"><i class="far fa-edit fa-2x"></i></a>
                            <a href="frm_view_tasaCambioDetalle.php?viewTC=<?php echo $r->__GET('id_tasaCambio') ?>&viewTCD=<?php echo $r->__GET('id_tasaCambio_det') ?>"><i class="far fa-eye fa-2x"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Moneda origen</th>
                        <th>Moneda cambio</th>
                        <th>Fecha</th>
                        <th>Tipo de cambio</th>
                        <th>Opciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.1.0-rc
        </div>
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>

    </div>
    <!-- /.content-wrapper -->

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

  <script src="../../plugins/DT/datatables.min.js"></script>
  <script src="../../plugins/DT/Responsive-2.2.9/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/DT/Responsive-2.2.9/js/responsive.dataTables.min.js"></script>
  <script src="../../plugins/DT/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/DT/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/DT/JSZip-2.5.0/jszip.min.js"></script>
  <script src="../../plugins/DT/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="../../plugins/DT/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.html5.min.js"></script>
  <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.print.min.js"></script>
  <script src="../../plugins/DT/Buttons-2.0.0/js/buttons.colVis.min.js"></script>

  <script src="../../plugins/jAlert/dist/jAlert.min.js"></script>
  <script src="../../plugins/jAlert/dist/jAlert-functions.min.js">

  </script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Select2-->
  <script src="../../plugins/select2/js/select2.full.min.js"></script>

  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(document).ready(function() {
      var mensaje = 0;
      mensaje = "<?php echo $varMsj ?>";

      if (mensaje == "1") {
        successAlert('Exito', 'Los datos han sido registrado exitosamente!');
      }
      if (mensaje == "2" || mensaje == "4") {
        errorAlert('Error', 'Revise los datos e intente nuevamente!!!');
      }

      if (mensaje == "3") {
        successAlert('Exito', 'Los datos han sido modificados exitosamente!');
      }

      if (mensaje == "5") {
        successAlert('Exito', 'El Producto se ha desactivado exitosamente!');
      }

      if (mensaje == "6") {
        errorAlert('Error', 'No se logro desactivar la categoria');
      }

      $("#tasaC_det").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf"]
      }).buttons().container().appendTo('#tasaC_det_wrapper .col-md-6:eq(0)');
      /*
      $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
      });*/
    });
  </script>
</body>

</html>