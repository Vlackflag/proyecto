<?php 
session_start();
$alerta="";
if (!isset($_SESSION['rol'])) {
  header("location: index.php");
}

if (isset($_SESSION['alerta'])) {
  $alerta=$_SESSION['alerta'];
  unset($_SESSION['alerta']);
  if ($alerta=='NoExiste') {
    $nombre = $_SESSION['regresaNombre'];
    $apellidoPa = $_SESSION['regresaApellidoP'];
    $apellidoMa = $_SESSION['regresaApellidoM'];
    $password = $_SESSION['regresaPass'];
    $password2 = $_SESSION['regresaPass2'];
    $rol = $_SESSION['regresaRol'];
}else if ($alerta=='passwordsDiferentes') {
    $matricula = $_SESSION['regresaMatricula'];
    $nombre = $_SESSION['regresaNombre'];
    $apellidoPa = $_SESSION['regresaApellidoP'];
    $apellidoMa = $_SESSION['regresaApellidoM'];
    $rol = $_SESSION['regresaRol'];
}else{
    $matricula = "";
    $nombre = "";
    $apellidoPa = "";
    $apellidoMa = "";
    $pass = "";
    $pass2 = "";
    $rol = "";
  }
}

if ($_SESSION['rol']==3 or $_SESSION['rol']==2) {
  header("location: index.php");
}

if (isset($_SESSION['rol'])) {
  $rol = $_SESSION['rol'];
  $nombreUsuario = $_SESSION['nombreUsuario'];
}
unset($_SESSION['regresaMatricula'],$_SESSION['regresaNombre'],$_SESSION['regresaApellidoP'],$_SESSION['regresaApellidoM'],$_SESSION['regresaPass'],$_SESSION['regresaPass2'],$_SESSION['regresaRol']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualiza empleado</title>
  <!-- Link que agrega los estilos de bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Link que agrega los estilos de bootstrap -->
  <link rel="stylesheet" href="bootstrap_4_5_3/css/bootstrap.min.css">
  <!-- Link a mis stilos css -->
  <link rel="stylesheet" type="text/css" href="css/estilo_global_formulario.css">
  


</head>
<body  background="img/bg-1.jpg">
  <!-- icono, nombre de pagina Iniciar sesión y navbar-->
  <!-- .............................................. -->
  <header class="container-fluid bg-n" id="header">
    <div class="row g-0">
      <div class="col-sm-6 col-md-6 col-lg-3">
        <center><a href="index.php"><img style="margin-top: 10px;border-radius: 10%;" src="img/icon.png" width="30%"></a></center>
        <h1 class="text texto">Plug In Plus +</h1>
        <center>
          <a class="login" href="cerrarSesion.php">Cerrar sesi&oacute;n</a>
        </center>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 offset-md-5 align-self-center">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#marcas" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventario</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <!-- ayudante -->
                  <a class="dropdown-item" href="inventario.php">Visualizar inventario</a>
                  <a class="dropdown-item" href="venta.php">Registrar ventas</a>
                  <!-- ayudante -->

                  <?php if ($rol == 1 or $rol == 2) { ?>
                    <!-- empleado -->
                    <a class="dropdown-item" href="registraProducto.php">Registrar nuevo producto</a>
                    <a class="dropdown-item" href="actualizaProducto.php">Actualizar producto</a>
                    <a class="dropdown-item" href="eliminaProducto.php">Eliminar producto</a>
                    <!-- empleado --> 
                  <?php } ?>


                </div>
              </li>

              <?php if ($rol == 1) { ?>
                <!-- administrador -->                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#marcas" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empleados</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="tablaEmpleados.php">Visualizar empleados</a>
                    <a class="dropdown-item" href="registraEmpleado.php">Registrar empleado</a>
                    <a class="dropdown-item disabled" href="actualizaEmpleado.php">Actualiza empleado</a>
                    <a class="dropdown-item" href="eliminaEmpleado.php">Elimina empleado</a>
                  </div>
                </li>
                <!-- administrador -->
              <?php } ?>


            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>


  <div class="container-fluid bg-migas fix text-aling-rigth">
    <div class="row justify-content-center">
      <div class="col-12 mr-auto">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item">
                <a class="nav-link" href="gestionInventario.php">Gestion de empleados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Actualiza empleado</a>
              </li>
            </ul>
          </div>
          <?php if (isset($_SESSION['rol'])) {?>
            <h6 class="text-white">Sesi&oacute;n iniciada como: <a href="perfil.php"><?php echo $_SESSION['nombreUsuario'].'.'; ?></a></h6>
          <?php } ?>
        </nav>
      </div>
    </div>
  </div>

  <!-- .............................................. -->
  <!-- icono, nombre de pagina Iniciar sesión y navbar-->
</br>
</br></br>

<div class="container-fluid text-white text-center">
  <div class="row">
    <div class="col-12">
      <a type="button" class="btn btn-dark texto margin" href="gestionEmpleados.php">Regresa.</a>
    </div>
  </div>
</div>

<?php if (!$alerta == "") { ?>
</br>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-10 col-sm-auto font-weight-bold">
      <?php if ($alerta == "exitoAlModificar") { ?>
        <div class="alert alert-info text-info alert-dismissible fade show">
          Exito al modificar al empleado.
          <button class="close bg-info text-white" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
          <?php } else if ($alerta == "NoExiste") { ?>
            <div class="alert alert-warning text-secondary alert-dismissible fade show">
              Error, la <b>Matricula</b> ingresada no existe.
              <button class="close bg-warning text-white" data-dismiss="alert" aria-label="Close">
                <span>&times;</span>
              <?php } else if ($alerta == "passwordsDiferentes") { ?>
            <div class="alert alert-warning text-secondary alert-dismissible fade show">
              Error, las <b>Passwords</b> ingresadas no coinciden.
              <button class="close bg-warning text-white" data-dismiss="alert" aria-label="Close">
                <span>&times;</span>
              <?php } ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>




  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="contact_form">
          <div class="formulario">      
            <h1 class="h1">Complete los campos del empleado a actualizar</h1>
            <form action="actualizaEmpleadoA.php" method="POST" enctype="multipart/form-data">
              <p class="p">
                <label class="label" for="matricula">Matricula.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($matricula != "") {echo "value='".$matricula."'";}?> type="text" id="matricula" name="matricula" required="" placeholder="Escribe la matricula del empleado">
              </p>

              <p class="p">
                <label class="label" for="nombre">Nombre nuevo.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($nombre != "") {echo "value='".$nombre."'";}?> type="text" id="nombre" name="nombre" required="" placeholder="Escribe el nombre del producto">
              </p>

              <p class="p">
                <label class="label" for="apellidoPa">Apellido Paterno nuevo.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($apellidoPa != "") {echo "value='".$apellidoPa."'";}?> type="text" id="apellidoPa" name="apellidoPa" required="" placeholder="Escribe el apellido paterno del empleado">
              </p>

              <p class="p">
                <label class="label" for="apellidoMa">Apellido materno nuevo.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($apellidoMa != "") {echo "value='".$apellidoMa."'";}?> type="text" id="apellidoMa" name="apellidoMa" required="" placeholder="Escribe el epellido materno del empleado">
              </p>

              <p class="p">
                <label class="label" for="password">Password nueva
                  <span class="span">*</span>
                </label>
                <input class="input"  <?php if ($password != "") {echo "value='".$password."'";}?> type="password" name="password" id="password" required="" placeholder="Password">
              </p>

              <p class="p">
                <label class="label" for="password">Verifica la password nueva
                  <span class="span">*</span>
                </label>
                <input class="input"  <?php if ($password2 != "") {echo "value='".$password2."'";}?> type="password" name="password2" id="password2" required="" placeholder="Password"></br>
                <input type="checkbox" onclick="myFunction()">Mostrar contraseñas
              </p>

              <p class="p">
                <label class="label" for="rol">Rol nuevo
                  <span class="span">*</span>
                  <select class="input" id="rol" name="rol">
                    <option selected hidden value="3">Seleccione una opci&oacute;n</option>
                    <option value="2">Empleado</option>
                    <option value="3">Ayudante</option>
                    <option value="1">Administrador</option>
                  </select>
                </p>

              <button class="button" type="submit"><p class="p">Enviar</p></button>
              <p class="aviso">
                <span class="span"> * </span>los campos son obligatorios.
              </p>          
            </form>
          </div>
        </div>  
      </div>
    </div>
  </div>
</br>


<!-- Footer -->
<!-- ...... -->
<footer class="container-fluid text-white text-center  bg-n">
  <div class="row">
    <div class="col-12">
      <p> Plug In Plus + "6 Años Conectando Ideas." </p>
      <p>© 2022 Copyright: Plug In Plus +</p>
    </div>
  </div>
</footer>
<!-- ...... -->
<!-- Footer -->


<!-- JQuery -->
<script src="bootstrap_4_5_3/js/jquery-3.5.1.min.js"></script>
<!-- Poppers.js -->
<script src="bootstrap_4_5_3/js/popper.min.js"></script>
<!-- JS Bootsratp -->
<script src="bootstrap_4_5_3/js/bootstrap.min.js"></script>

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

<script type="text/javascript">
  
  function myFunction() {
    var x = document.getElementById("password");
    var a = document.getElementById("password2");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

    if (a.type === "password") {
      a.type = "text";
    } else {
      a.type = "password";
    }
  }
</script>

</body>


</html>