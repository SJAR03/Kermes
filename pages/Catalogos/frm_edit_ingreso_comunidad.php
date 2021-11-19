<?php

error_reporting(0);

include '../../entidades/ingreso_comunidad.php';
include '../../datos/dt_ingreso_comunidad.php';

include '../../entidades/ingreso_comunidad_det.php';
include '../../datos/dt_ingreso_comunidad_det.php';

include '../../entidades/kermesse.php';
include '../../datos/dt_kermesse.php';

include '../../entidades/comunidad.php';
include '../../datos/dt_comunidad.php';

include '../../entidades/productos.php';
include '../../datos/dt_productos.php';

include '../../entidades/control_bonos.php';
include '../../datos/dt_Control_Bonos.php';

$dtICom = new Dt_Ingreso_Comunidad();
$dtICD = new Dt_Ingreso_Comunidad_Det();
$dtK = new Dt_Kermesse();
$dtCom = new Dt_Comunidad();
$dtP = new Dt_Producto();
$IC = new Ingreso_Comunidad(); 
$ICD = new Ingreso_Comunidad_Det();
$dtCb = new Dt_Control_Bonos();

$varIdIC = 0;

if (isset($varIdIC)) {
  $varIdIC = $_GET['editIC']; //RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR LA COMUNIDAD

}

$varIdICD = 0;

if (isset($varIdICD)) {
  $varIdICD = $_GET['editICD']; //RECUPERAMOS EL VALOR DE NUESTRA VARIABLE PARA EDITAR LA COMUNIDAD
}

//OBTENEMOS LOS DATOS DE LA COMUNIDAD PARA SER EDITADO
$IC = $dtICom->getIngComunidad($varIdIC);
$ICD = $dtICD->getIngComunidadDet($varIdICD);

/* $varMsj = 0;

if (isset($varMsj)) {
    $varMsj = $_GET['msj'];
} */
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

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
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
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
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <li class="nav-item">
                  <a href="../Catalogos/tbl_listaprecio_det.php" class="nav-link" target="blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista Precios Detalles</p>
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
                  <a href="../Catalogos/tbl_ingreso_comunidad_det.php" class="nav-link" target="blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingreso Comunidad Detalles</p>
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
                  <a href="../Catalogos/tbl_arqueoCajaDetalle.php" class="nav-link" target="blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Arqueo Caja Detalle</p>
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

                <li class="nav-item">
                  <a href="../Catalogos/tbl_tasaCambioDetalles.php" class="nav-link" target="blank">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tasa Cambio Detalles</p>
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
              <h1>Editar Ingreso en la Comunidad</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Editar Ingreso en la Comunidad</li>
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
                  <h3 class="card-title">Editar Ingreso Comunidad</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="../../negocio/ng_Ingreso_Comunidad.php">
                  <div class="card-body">

                    <div class="form-group">
                      <label>Seleccione la kermesses</label>
                      <select class="form-control" id="id_kermesse" name="id_kermesse" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($dtK->listaKermT() as $r) : ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_kermesse'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php endforeach; ?>
                      </select>
                      <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                    </div>

                    <div class="form-group">
                      <label>Seleccione la Comunidad</label>
                      <select class="form-control" id="id_comunidad" name="id_comunidad" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($dtCom->listaComunidad() as $r) : ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_comunidad'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Seleccione el Producto</label>
                      <select class="form-control" id="id_producto" name="id_producto" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($dtP->listaProdT() as $r) : ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_producto'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Catidad de productos</label>
                      <input type="int" class="form-control" id="cant_productos" name="cant_productos" placeholder="Ingrese la cantidad del producto" title="Ingrese la cantidad del producto" required>
                    </div>

                    <div class="form-group">
                      <label>Seleccione el Ingreso Comunidad</label>
                      <select class="form-control" id="id_ingreso_comunidad" name="id_ingreso_comunidad" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($dtICom->listaIngresoComunidad() as $r) : ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_ingreso_comunidad'); ?>"><?php echo $r->__GET('cant_productos'); ?></option>
                          </tr>
                        <?php endforeach; ?>
                      </select>
                      <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                    </div>

                    <div class="form-group">
                      <label>Seleccione bono</label>
                      <select class="form-control" id="id_bono" name="id_bono" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($dtCb->listaControlBonos() as $r) : ?>
                          <tr>
                            <option value="<?php echo $r->__GET('id_bono'); ?>"><?php echo $r->__GET('nombre'); ?></option>
                          </tr>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Escriba la denominacion del bono</label>
                      <input type="text" class="form-control" id="denominacion" name="denominacion" maxlength="45" placeholder="Ingrese la denominacion de los Bonos" title="Ingrese la denominacion de los Bonos" required>
                    </div>

                    <div class="form-group">
                      <label>Cantidad de bonos</label>
                      <input type="int" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad de bonos" title="Ingrese la cantidad de bonos" required>
                    </div>

                    <div class="form-group">
                      <label>Subtotal de Bonos</label>
                      <input type="float" class="form-control" id="subtotal_bono" name="subtotal_bono" placeholder="Ingrese el subtotal de bonos" title="Ingrese el subtotal de bonos" required>
                    </div>


                    <div class="form-group">
                      <label>Total de bonos</label>
                      <input type="int" class="form-control" id="total_bonos" name="total_bonos" placeholder="Ingrese el total de bonos" title="Ingrese el total de bonos" required>
                    </div>

                    <div class="form-group">
                      <label>Creacion de Usuarios</label>
                      <input type="int" class="form-control" id="usuario_creacion" name="usuario_creacion" placeholder="Ingrese creacion del usuario " title="Ingrese creacion del usuario" required>
                    </div>

                    <div class="form-group">
                      <label>Fechas de creacion de Usuarios</label>
                      <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Ingrese fecha de creacion" title="Ingrese fecha de creacion" required>
                    </div>

                    <!-- <div class="form-group">
                      <label>Modificacion de Usuarios</label>
                      <input type="int" class="form-control" id="usuario_modificacion" name="usuario_modificacion" placeholder="Ingrese modificacion del usuario" title="Ingrese modificacion del usuario" required>
                    </div>

                    <div class="form-group">
                      <label>Fechas de modificacion de Usuarios</label>
                      <input type="date" class="form-control" id="fecha_modificacion" name="fecha_modificacion" placeholder="Ingrese fecha de modificacion" title="Ingrese fecha de modificacion" required>
                    </div>

                    <div class="form-group">
                      <label>Eliminacion Usuarios</label>
                      <input type="int" class="form-control" id="usuario_eliminacion" name="usuario_eliminacion" placeholder="Ingrese eliminacion del usuario" title="Ingrese eliminacion del usuario" required>
                    </div>

                    <div class="form-group">
                      <label>Fechas de eliminacion de Usuarios</label>
                      <input type="date" class="form-control" id="fecha_eliminacion" name="fecha_eliminacion" placeholder="Ingrese fecha de eliminacion" title="Ingrese fecha de eliminacion" required>
                    </div> -->

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                  </div>
                </form>
                </di v>
                <!-- /.card -->
              </div>
            </div>
          </div>
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
    ///FUNCION PARA CARGAR LOS VALORES EN LOS CONTROLES
    function setValores() {
      /* $("#id_ingreso_comunidad").val("<?php echo $IC->__GET('id_ingreso_comunidad') ?>"); */
      $("#id_kermesse").val("<?php echo $IC->__GET('id_kermesse') ?>");
      $("#id_comunidad").val("<?php echo $IC->__GET('id_comunidad') ?>");
      $("#id_producto").val("<?php echo $IC->__GET('id_producto') ?>");
      $("#cant_productos").val("<?php echo $IC->__GET('cant_productos') ?>");
      $("#id_ingreso_comunidad").val("<?php echo $ICD->__GET('id_ingreso_comunidad') ?>");
      $("#id_bono").val("<?php echo $ICD->__GET('id_bono') ?>");
      $("#denominacion").val("<?php echo $ICD->__GET('denominacion') ?>");
      $("#cantidad").val("<?php echo $ICD->__GET('cantidad') ?>");
      $("#subtotal_bono").val("<?php echo $ICD->__GET('subtotal_bono') ?>");
      $("#total_bonos").val("<?php echo $IC->__GET('total_bonos') ?>");
      $("#usuario_creacion").val("<?php echo $IC->__GET('usuario_creacion') ?>");
      $("#fecha_creacion").val("<?php echo $IC->__GET('fecha_creacion') ?>");
     /*  $("#usuario_modificacion").val("<?php echo $IC->__GET('usuario_modificacion') ?>");
      $("#fecha_modificacion").val("<?php echo $IC->__GET('fecha_modificacion') ?>");
      $("#usuario_eliminacion").val("<?php echo $IC->__GET('usuario_eliminacion') ?>");
      $("#fecha_eliminacion").val("<?php echo $IC->__GET('fecha_eliminacion') ?>");
 */
    }

    $(document).ready(function() {
      ////CARGAMOS LOS VALORES EN LOS CONTROLES
      setValores();
    });
  </script>

  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>