<?php
error_reporting(0);

session_start();
session_unset(); // Borrar las variables de sesión

// Destruir la sesión
if (session_destroy()) {
  //var_dump($miPagina);
  echo "Inicia Sesión";
} else {
  echo "Error al cerrar la sesión";
}

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
  <title>Acceso de Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./plugins/jAlert/dist/jAlert.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <!--<a href="./sistema-hr.php"></a>-->
      <b>Sistema Kermesse</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Ingresar datos de acceso para iniciar Sesión</p>

        <form action="./negocio/ng_usuario.php" method="post">
          <div class="input-group mb-3">
            <input type="hidden" name="txtaccion" value="3">
            <input type="text" name="user" class="form-control" placeholder="Usuario" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pwd" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="social-auth-links text-center mb-3">
            <input type="submit" class="btn btn-block btn-primary" value="Ingresar" />
            <input type="reset" class="btn btn-block btn-danger" value="Cancelar">
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- JAlert js -->
  <script src="./plugins/jAlert/dist/jAlert.min.js"></script>
  <script src="./plugins/jAlert/dist/jAlert-functions.min.js">

  </script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      /////// VARIABLE DE CONTROL MSJ ////////
      var mensaje = 0;
      mensaje = "<?php echo $varMsj ?>";

      if (mensaje == "403") {
        errorAlert('Error', 'Debe de llenar todos los campos para iniciar sesión!');
      }
      if (mensaje == "401") {
        errorAlert('Error', 'Usuario o Contraseña incorrecta!');
      }

      if (mensaje == "400") {
        errorAlert('Error', 'Revise los datos e intente nuevamente!')
      }

      if (mensaje == "2") {
        errorAlert('Error', 'Debe iniciar sesión primero')
      }
      ////////////////////////////////////////

    });
  </script>

</body>

</html>